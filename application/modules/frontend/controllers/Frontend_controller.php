<?php
defined('BASEPATH') OR exit('No direct script access allowed');
    class Frontend_controller extends MX_Controller {
	public function __construct(){
	        parent::__construct();
	        $this->load->model('frontend_model');
	  }
    public function home(){
    	$this->load->front_view('home');
    }
    public function user_dashboard(){
    	$data['num_customer'] = $this->frontend_model->num_customers();
        $this->load->superuser_view('dashboard',$data);
    }
    }

?>
