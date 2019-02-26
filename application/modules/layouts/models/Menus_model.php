<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Menus_model extends CI_Model {
public function fetch_total_menus_count(){
		$query = $this->db->get('menu_master')
						  ->num_rows();
		return $query;
	}

	public function fetch_panel_menus(){
		$userdata = $this->session->userdata('userdata');
		if($userdata['user_type'] != '1'){
			$fetch_accessible_menus = $this->db->select('accessible_menus')
											   ->from('user_master')
											   ->where('user_id',$userdata['user_id'])
							  				   ->get()
							  				   ->row_array();

			// $accessible_modules = json_decode($fetch_accessible_menus['accessible_modules'],true);
			$accessible_menus = json_decode($fetch_accessible_menus['accessible_menus'],true);

			if (count($accessible_menus) > 0) {
				sortBy('menu_id',$accessible_menus, 'asc');
			}

			$menu_id = '';
			for ($j=0; $j <count($accessible_menus) ; $j++) { 
				$menu_id .= $accessible_menus[$j]['menu_id'];
				$menu_id .= ($j == count($accessible_menus) - 1)?'':',';
			}
			
			$fetch_menus = $this->db->where_in('menu_id',explode(",", $menu_id));
		}
		else{
			$accessible_modules = $this->db->select('menu_id')
									       ->from('panel_menu_master')
										   ->where('is_module','1')
										   ->get()
										   ->result_array();
		}

		if (!empty($accessible_modules)) {
			sortBy('menu_id',$accessible_modules, 'asc');
		}

		if ($userdata['user_type'] == '1') {
			$fetch_menus = $this->db->where('parent_menu_id','0');
		}

		$fetch_menus = $this->db->where('is_module !=','1')
								->get('panel_menu_master')
					  			->result_array();

		if ($userdata['user_type'] == '1') {
			for ($i=0; $i <count($fetch_menus) ; $i++) { 
				$fetch_menus[$i]['sub_menus'] = $this->fetch_panel_sub_menus(array($fetch_menus[$i]['menu_id']));
			}
		}else{
			for ($k=0; $k <count($accessible_menus) ; $k++) {
				$fetch_menus[$k]['sub_menus'] = array();
				if (isset($accessible_menus[$k]['sub_menus'])) {
					$sub_menus = $this->fetch_panel_custom_sub_menus($accessible_menus[$k]['sub_menus']);
					if (!empty($sub_menus)) {
						$fetch_menus[$k]['sub_menus'] = $this->fetch_panel_custom_sub_menus($sub_menus);
					}
				}
			}
		}
		
		if (!empty($accessible_modules)) {
			$unset_array_values = '';
			for ($l=0; $l <count($accessible_modules) ; $l++) {
				$fetch_modules = $this->db->where('menu_id',$accessible_modules[$l]['menu_id'])
										  ->get('panel_menu_master')
										  ->row_array();
				for ($m=0; $m <count($fetch_menus) ; $m++) {
					if (isset($fetch_menus[$m])) {
						if($fetch_menus[$m]['parent_module_id'] == $accessible_modules[$l]['menu_id']){

							$fetch_modules['sub_menus'][] = $fetch_menus[$m];
							$unset_array_values .= $m.',';
						}
					}
				}
				array_push($fetch_menus, $fetch_modules);
			}
			$unset_array_values = explode(",",rtrim($unset_array_values,","));

			for ($n=0; $n <count($unset_array_values) ; $n++) { 
				$values = $unset_array_values[$n];
				unset($fetch_menus[$values]);
			}
		}

		return array_values($fetch_menus);
	}

	public function fetch_panel_sub_menus($menu_id){
		$query = $this->db->where_in('parent_menu_id',$menu_id)
						  ->get('panel_menu_master')
						  ->result_array();

		if (count($query) > 0) {
			for ($i=0; $i <count($query) ; $i++) { 
				$query[$i]['sub_menus'] = $this->fetch_panel_sub_menus($query[$i]['menu_id']);
			}
		}

		return $query;
	}

	public function fetch_panel_custom_sub_menus($sub_menus){
		$menu_id = '';
		for ($i=0; $i <count($sub_menus) ; $i++) { 
			$menu_id .= $sub_menus[$i]['menu_id'];
			$menu_id .= ($i == count($sub_menus) - 1)?'':',';
		}
		$query = $this->db->where_in('menu_id',explode(",", $menu_id))
						  ->get('panel_menu_master')
						  ->result_array();

		for ($j=0; $j <count($sub_menus) ; $j++) { 
			if (isset($sub_menus[$j]['sub_menus'])) {
				$query[$j]['sub_menus'] = $this->fetch_panel_custom_sub_menus($sub_menus[$j]['sub_menus']);
			}
		}
		return $query;
	}
	public function fetch_today_topups(){
		$sql = "SELECT TM.customer_id as customer_id,TM.topup_amount as topup_amount,TM.credit_date as credit_date,CM.customer_name as customer_name FROM topup_master TM LEFT JOIN customers CM ON TM.customer_id = CM.customer_id
		    WHERE TM.credit_date = CURDATE()";
		$query = $this->db->query($sql)
						  ->result_array();
		return $query;
	}		

}