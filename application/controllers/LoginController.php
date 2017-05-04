<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LoginController extends CI_Controller {

	public function __construct() {
      parent::__construct();
        
          //$this->load->library('pagination');
      $this->load->model('UserModel');
      $this->load->model('LoginModel');


    }

	Public function index(){
		if($this->LoginModel->is_user_loged_in()){
			redirect('DashboardController');
		}
	else{
	 $this->load->view('admin/loginPage');
	}
	}

	public function user_login_data_check(){
		$this->form_validation->set_rules('email','Email','min_length[3]');
		//$this->form_validation->set_rules('password','Password','trim');
		
		if($this->form_validation->run() == FALSE){
			$this->load->view('admin/loginPage');
		}

		else{
			//$this->load->model('User_model');
			$result=$this->LoginModel->user_login_data_check();
			
			if($result){
				redirect('DashboardController');
			}
			else{
				 $data['errorLogin'] ='Email or Password is Invalid.';
				 $this->load->view('admin/loginPage',$data);
			}
		}

	}

	public function logout(){
		$this->session->unset_userdata('current_user_id');
		$this->session->unset_userdata('current_user_name');
		$this->session->sess_destroy();
		redirect('LoginController');
		//redirect('Login/?logout=success');

	}
}
