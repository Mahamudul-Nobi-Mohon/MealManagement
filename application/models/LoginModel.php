<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LoginModel extends CI_Model{

	public function user_login_data_check(){
 		$userEmail=$this->input->post('email');
 		$userName=$this->input->post('email');
 		$password=md5($this->input->post('password'));

 		$attr=array(
 				'email' => $userEmail ,
 				'password' =>$password,
 				'user_status' => 1
 			);
 		// $this->db->where('(email',$userEmail);
 		// $this->db->or_where('userName',$userName.")");
 		// $this->db->where('password',$password);
 		// $this->db->from('user');
 		// $query = $this->db->get();
 			//var_dump($attr); exit;
 		$result = $this->db->get_where('user', $attr);

 		//var_dump($this->db->last_query()); exit;
 		if($result->num_rows() == 1){
 				$attr=array(
 				'current_user_id' => $result->row(0)->ID ,
 				'current_user_email' =>$userEmail
 			);
 				//var_dump($attr); exit();
 				$this->session->set_userdata($attr);
 				return TRUE;
 		}
 		else{
 			return FALSE;
 		}
 		}

 			//user_login_data_check end


 			//is_user_loged_in start
	 	public function is_user_loged_in(){
	 		return $this->session->userdata('current_user_id') != FALSE;
	 	}

}

?>