<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UserModel extends CI_Model{

    private $table_name = 'user';  
    //private $table_name2 = 'attandance'; 

	public function Read(){
		$this->db->select('*');
		$this->db->from('user');
		$this->db->order_by('id','desc');
		$query = $this->db->get();
		//$query = $this->db->get('user');
		return $query->result();
	}
public function countAllMember(){
    $this->db->select('count(*) as allMember');
    $this->db->from('user');
    $query = $this->db->get();
   // echo $this->db->last_query(); exit;
    //$query = $this->db->get('user');
    return $query->result();
  }

    public function isUserExists($name,$email,$phone){
      $this->db->where('userName',$name);
          $this->db->or_where('email',$email);
          $this->db->or_where('phone', $phone); 
          $query = $this->db->get('user');
          return $query;
    }

 public function select_single_user($select,$where)
    {
       
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where($where);
        $query = $this->db->get();
        //$query = $this->db->get('user');
        return $query->result();
        
    }

    public function updateUserDetails($id,$data){
   
    $this->db->where('ID', $id);
    $query = $this->db->update('user', $data);
    return $query;

   
  }

  public function activeUser($id){
          $this->db->set('user_status', 1); //value that used to update column  
          $this->db->where('ID', $id); //which row want to upgrade  
          $activeAccount = $this->db->update('user'); 
        
            if($activeAccount == true){
                return '1';
            }
                
            else{
                return '0';
            }   
  }
  public function deActiveUser($id){
          $this->db->set('user_status', '0'); //value that used to update column  
          $this->db->where('ID', $id); //which row want to upgrade  
          $activeAccount = $this->db->update('user'); 
          
             if($activeAccount == true){
                return '1';
            }
                
            else{
                return '0';
            }   
  }

    public function changePassword(){
        $id = $this->session->userdata('current_user_id');
        $oldPassword = md5($this->input->post('oldPassword'));
        $newPassword = md5($this->input->post('newPassword'));
        $confirmPassword = md5($this->input->post('confirmPassword'));
        $pass = false;

        $this->db->select('*');
        $this->db->from('user');
       // $this->db->join('category', 'category.id = articles.id');
        $array =  array('ID' => $id,'password' => $oldPassword );
        $this->db->where($array);
        $query = $this->db->get();
       // $a = $this->db->last_query(); 
        //for print the sql
        //var_dump($a); exit;

        $active = $query->num_rows(); 
        if (($newPassword == $confirmPassword) && ($active>=1)) {
          
          $this->db->set('password', $newPassword); //value that used to update column  
          $this->db->where('ID', $id); //which row want to upgrade  
          $pass = $this->db->update('user'); 

         }

        if($pass == true){
        return TRUE;
       }
        
          else{
        return FALSE;
      } 
    }

}

?>