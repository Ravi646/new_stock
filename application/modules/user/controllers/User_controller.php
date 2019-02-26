<?php
defined('BASEPATH') OR exit('No direct script access allowed');
    class User_controller extends MX_Controller {
	public function __construct(){
	        parent::__construct();
	        $this->load->model('frontend/frontend_model');
          $this->load->model('user_model');
    }
    public function user_login(){
    $this->form_validation->set_rules('email','UserName','required');
    $this->form_validation->set_rules('password','Password','required');
    if ($this->form_validation->run() != FALSE){
    $user_data = array(
        'email' => $this->input->post('email'),
        'password' => md5($this->input->post('password'))
        );
    $user_login = $this->frontend_model->user_login($user_data);
      if(count($user_login)>0){
      $this->session->set_userdata('userdata',$user_login);
      redirect(base_url('user-dashboard'));
      }
      }
   }
    public function add_user($user_id = 0){
      $this->form_validation->set_rules('customer_name','Name','required|trim|xss_clean');
      $this->form_validation->set_rules('referral_code','Referral Code','callback_childs_count');
      $this->form_validation->set_rules('customer_email','Email id','valid_email|is_unique[customers.customer_email]',array('is_unique' => 'User with this email id already registered'));
       $this->form_validation->set_rules('customer_mobile','Mobile No','numeric|max_length[10]|min_length[10]|is_unique[customers.customer_mobile]',array('is_unique' => 'User with this mobile number already exist'));
       if($this->form_validation->run() != false){
        $data = array('customer_name' => $this->input->post('customer_name'),
                      'customer_email' => $this->input->post('customer_email'),
                      'customer_mobile' => $this->input->post('customer_mobile'),
                      'referral_code' => $this->input->post('referral_code'),
                      'account_no' => $this->input->post('account_no'),
                      'ifsc_code' => $this->input->post('ifsc_code'),
                      'bank_name' => $this->input->post('bank_name'),
                      'added_date' => date('Y-m-d')
                    );
        $insert_user = $this->user_model->insert_user_details($user_id,$data);
        $this->session->set_flashdata('superuserResponse',array('class' => $insert_user['class'],'msg' => $insert_user['msg']));
       }
       if($user_id != 0){
        $user_data = $this->user_model->fetch_user_details($user_id);
        foreach ($user_data as $key => $value) {
         $_POST[$key] = $value;
        }
       }
      $this->load->superuser_view('add_user');
    }
    public function user_list(){
      $data['users'] = $this->user_model->fetch_users();
      $data['add_sup_cust_js'] = base_url('assets/common/js/user_profile.js');
      $this->load->superuser_view('user_list',$data);
    }
    public function childs_count($referral_code){
      $count = $this->user_model->check_childs_count($referral_code);
      if($count['childs'] < 5){
        return TRUE ;
      } else {
        $this->form_validation->set_message('childs_count','User with  this referral code already have 5 referrals');
        return FALSE;
      }
    }
    public function add_earning() {
      $customer_id = base64_decode($this->input->post('cust_id'));
      $total_amount = $this->input->post('amount');
      $amount_wallet  = $total_amount*5/100;
      $earning_reg = $this->user_model->fetch_earning_details($customer_id);
      if($earning_reg['referral_code'] != ''){
             $insert_array = array(
        '0' => array(
          'customer_id' => $customer_id,
          'topup_amount' =>$amount_wallet,
          'actual_amount' => $total_amount 
      ),
        '1' => array(
        'customer_id'  =>$earning_reg['customer']['customer_id'] ,
        'topup_amount' =>$amount_wallet,
        'actual_amount'=>$total_amount
        )
      );
               foreach ($insert_array as $key => $insert_value){
        $data = array(
        'customer_id' => $insert_value['customer_id'],
        'topup_amount' => $insert_value['topup_amount'],
        'actual_amount' => $insert_value['actual_amount'],
        'topup_date'    => date('Y-m-d'),
        
        );
        $this->user_model->insert_earning_details($data);
      }
      }else{
        $data = array(
        'customer_id' => $customer_id,
        'topup_amount' => $amount_wallet,
        'actual_amount' => $total_amount,
        'topup_date'  => date('Y-m-d')
        );
        $this->user_model->insert_earning_details($data);
      }
    }
    public function delete_user(){
      $customer_id = base64_decode($this->input->post('cust_id'));
      $this->user_model->delete_user($customer_id);
    }
    public function particular_transact($cust_id = 0){
     $data['fetch_user_credit_details'] = $this->user_model->fetch_user_credit_details($cust_id);
     $this->load->superuser_view('particular_transact',$data);
    }
    public function allcurrent_transact(){
     $data['allcurrent_transact'] = $this->user_model->allcurrent_transact();
     $data['add_sup_cust_js'] = base_url('assets/common/js/user_profile.js');
    $this->load->superuser_view('allcurrent_transact',$data);
    }
    public function logout(){
    $this->session->unset_userdata('userdata');
    $this->session->sess_destroy();
    redirect(base_url());
  }
    
}