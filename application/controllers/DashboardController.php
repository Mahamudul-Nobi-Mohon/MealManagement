<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DashboardController extends CI_Controller {

	public function __construct() {
      parent::__construct();
        
          //$this->load->library('pagination');
      $this->load->model('UserModel');
      $this->load->model('LoginModel');
       $this->load->model('MealModel');

    }

	Public function index(){
        $loginDataCheck = $this->LoginModel->is_user_loged_in();
       // var_dump($loginDataCheck); exit;
		if($this->LoginModel->is_user_loged_in()){

    $data['message'] = "Admin Dashboard";
    $data['page'] = "admin/welcomePage";
    $this->load->view('admin/index',$data);
	}
    else{
        redirect('LoginController');
    }
}


}

?>