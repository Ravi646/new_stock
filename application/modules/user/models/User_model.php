<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model { 
	public function __construct(){
		parent::__construct();
		$this->load->helper('string');
	}
	public function insert_user_details($user_id = 0,$data){
		if($user_id == 0) {
		$sql = "INSERT INTO customers(customer_name,customer_email,customer_mobile,referral_code,account_no,ifsc_code,bank_name) VALUES('".$data['customer_name']."','".$data['customer_email']."','".$data['customer_mobile']."','".$data['referral_code']."','".$data['account_no']."','".$data['ifsc_code']."','".$data['bank_name']."')";
		$this->db->query($sql);
		$insert_id = $this->db->insert_id();
		$unique_code = random_string('alnum',5).$insert_id;
		$this->db->query('UPDATE customers SET unique_code = "'.$unique_code.'" WHERE customer_id = "'.$insert_id.'" ');
		$childs = $this->db->query('SELECT childs from customers WHERE unique_code = "'.$data['referral_code'].'"')
						->row_array();
		$childs_count = $childs['childs'] + 1;
		$this->db->query('UPDATE customers SET childs = "'.$childs_count.'" WHERE unique_code = "'.$data['referral_code'].'" ');
		$msg = "User Added Successfully With Code ".$unique_code;
	}else{
		$sql = "UPDATE customers SET customer_name = '".$data['customer_name']."',customer_email = '".$data['customer_email']."',customer_mobile = '".$data['customer_mobile']."',referral_code = '".$data['referral_code']."',account_no = '".$data['account_no']."',ifsc_code = '".$data['ifsc_code']."',bank_name = '".$data['bank_name']."'";
		$this->db->query($sql);
		$msg ="Details Updated Successfully";
	}
	if ($this->db->error()['code'] == 0){
			$response = array(
				'status' => true,
				'msg' => $msg,
				'class' => 'panel-success'
			 );
		}else{
			$response = array(
				'status' => false,
				'msg' => 'There was an error, Please try again',
				'class' => 'panel-danger'
			);
		}
		return $response;
	}
	public function fetch_user_details($user_id){
	$sql = "SELECT customer_name,customer_email,customer_mobile,referral_code,account_no,ifsc_code,bank_name from customers WHERE customer_id = '".$user_id."' ORDER BY customer_id DESC";
		$query = $this->db->query($sql)
						  ->row_array();
		return $query;
	}
	public function fetch_users(){
		$sql = "SELECT customer_id,customer_name,customer_email,customer_mobile,childs,total_earning,unique_code FROM customers";
		$query = $this->db->query($sql)
						  ->result_array();
		return $query;
	}
	public function check_childs_count($referral_code){
		$sql = "SELECT childs from customers where unique_code = '".$referral_code."'";
		$query = $this->db->query($sql)
						  ->row_array();
		return $query;
	}
	public function fetch_earning_details($customer_id){
	$sql = "SELECT referral_code FROM customers WHERE customer_id = '".$customer_id."'";
	$query = $this->db->query($sql)
					  ->row_array();
	if($query['referral_code'] != ''){
	$query['customer'] = $this->fetch_refers_customers($query['referral_code']);
	}
	return $query;
	}
	public function fetch_refers_customers($referral_code){
	$sql = "SELECT customer_id FROM customers WHERE unique_code = '".$referral_code."'";
	$query = $this->db->query($sql)
					->row_array();
	return $query;
	}
	public function insert_earning_details($data){
	$sql = "INSERT INTO topup_master(customer_id,topup_amount,actual_amount,topup_date,credit_date) VALUES ('".$data['customer_id']."','".$data['topup_amount']."','".$data['actual_amount']."','".$data['topup_date']."',DATE(DATE_ADD(NOW(), INTERVAL 3 MONTH)))";
	$this->db->query($sql);
	}
	public function delete_user($customer_id){
	$sql = "DELETE from customers WHERE customer_id = '".$customer_id."'";
	$this->db->query($sql);
	}
	public function fetch_user_credit_details($customer_id){
	$sql = "SELECT CST.*,TPM.topup_amount as amount,TPM.credit_date as credit_date FROM customers CST LEFT JOIN topup_master TPM ON CST.customer_id = TPM.customer_id where CST.customer_id = '".$customer_id."' AND TPM.credit_date = CURDATE()";
	$query = $this->db->query($sql)
					  ->row_array();
	return $query;
	}
	public function allcurrent_transact(){
	$sql = "SELECT CST.*,TPM.topup_amount as amount,TPM.credit_date as credit_date FROM customers CST LEFT JOIN topup_master TPM ON CST.customer_id = TPM.customer_id where TPM.credit_date = CURDATE()";
	$query = $this->db->query($sql)
					  ->result_array();
	return $query;	
	}
	}

	?>