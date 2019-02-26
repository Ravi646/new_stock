<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Frontend_model extends CI_Model {
	public function user_login($user_data){
    	$sql = "SELECT * FROM user_master WHERE email= '".$user_data['email']."' AND password = '".$user_data['password']."'";
       $query = $this->db->query($sql)
						 ->row_array();
       	return $query;
	}
	public function num_customers(){
		$sql = "SELECT customer_id FROM customers";
	 	$query = $this->db->query($sql)
	 		           ->num_rows();
	 	return $query;
	}
	
}