<?php
defined('BASEPATH') OR exit('No direct script access allowed');
  class UserController extends CI_Controller {
 

  

    public function __construct() {
      parent::__construct();
        
          //$this->load->library('pagination');
      $this->load->model('UserModel');
     // $this->load->model('DashboardModel');
      $this->load->model('LoginModel');

     //  $statusTwoUsr = $this->DashboardModel->selectStatusTwoUsers(); 
     // $data['selectStatusTwoUsers'] =  $statusTwoUsr;

     // $statusTwoCustomer = $this->DashboardModel->selectStatusTwoCustomers(); 
     // $data['selectStatusTwoCustomers'] =  $statusTwoCustomer;
     // $this->load->view('admin/inc/header.php',$data);
     

    }

    function index(){
      if($this->LoginModel->is_user_loged_in()){

      // $data['allData'] = $this->UserModel->Read();
      // $data['isUsActiveOrNot'] = $this->UserModel->selectUserStatus();
        $data['page'] = 'admin/addUser';
        $data['message'] = 'Add new User';
      $this->load->view('admin/index', $data);
    }
    else{
      redirect('LoginController');
    }
    }

    public function addUserPage()
  {
    if($this->LoginModel->is_user_loged_in() && $this->session->userdata('current_user_id') == '1'){
      $data['page'] = 'admin/addUser';
      $data['message'] = 'Add new User';
     $this->load->view('admin/index',$data);
    }
    else{
      redirect('LoginController');
    }
  }

  public function create(){
    if($this->LoginModel->is_user_loged_in() && $this->session->userdata('current_user_id') == '1'){

    $this->form_validation->set_rules('userName','User Name','required');
    $this->form_validation->set_rules('email','email','required');
   // $this->form_validation->set_rules('password','Password','trim|min_length[4]');
   // $this->form_validation->set_rules('confirmPassword','Confirm Password','trim|min_length[4]|matches[password]');
    $this->form_validation->set_rules('role','role','required');

    
    if ($this->form_validation->run() == false) {
      $this->session->set_flashdata('errMsg','please check your data. data not inserted.');
      //echo "i am here"; exit;
      redirect("UserController/addUserPage");
      
    }
    else{
       $data = array(
        'fullName' => $this->input->post('fullName'),
        'userName' => $this->input->post('userName'),
        'email' => $this->input->post('email'),
        'phone' => $this->input->post('phone'),
        'password' => md5($this->input->post('password')),
        'address' => $this->input->post('address'),
        'designation' => $this->input->post('designation'),
        'role' => $this->input->post('role'),
        'user_status' => 1       

      );
    $pass = $this->input->post('password');
    $confirmPass = $this->input->post('confirmPassword');
    //echo $pass." ".$confirmPass; exit;
     if ($pass != $confirmPass){
           // echo "<script>alert('This phone number registered before. please choose another phone number. ');</script>";
              $this->session->set_flashdata('passwordExistsMsg','Both password not matched.');
              $data['page'] = 'admin/addUser';
              $data['message'] = 'Add new User';
             $this->load->view('admin/index',$data);


          // redirect("CustomerController/create",$data);
          }

    else{
        $email = $this->input->post('email');
        $name = $this->input->post('userName');
        $phone = $this->input->post('phone');
        $query = $this->UserModel->isUserExists($name,$email,$phone);
          if ($query->num_rows() > 0){
           // echo "<script>alert('This phone number registered before. please choose another phone number. ');</script>";
              $this->session->set_flashdata('emailExistsMsg','Data Not Inserted, Please choose another name or email or phone.');
              $data['page'] = 'admin/addUser';
              $data['message'] = 'Add new User';
             $this->load->view('admin/index',$data);


          // redirect("CustomerController/create",$data);
          }
        //$isPhoneNumberExists = $this->CustomerModel->isPhoneNumberExists($phone);
        else{
        $isInsert = $this->db->insert('user',$data);
        if ($isInsert) {
          //$data['insertSucess'] = 'Inserted Sucessfully';
          $this->session->set_flashdata('saveMsg','Inserted/Updated Sucessfully.');
          redirect("UserController");
        }
        else{
          //$data['insertFaild'] = 'Inserted Faild';
          $this->session->set_flashdata('saveFaildMsg','Data not inserted.');
          redirect("UserController");
        }
      }
    }
    }
    }
    else{
      redirect('LoginController');
    }
    
  }

  public function Read(){
    if($this->LoginModel->is_user_loged_in() && $this->session->userdata('current_user_id') == '1'){

    $data['allData'] = $this->UserModel->Read();
    $data['page'] = 'admin/allUser';
    $data['message'] = 'Show all User';
   $this->load->view('admin/index',$data);
  }
  else{
    redirect('LoginController');
  }
  }

  
public function editUserPage($id)
  {
    if($this->LoginModel->is_user_loged_in() && $this->session->userdata('current_user_id') == '1'){

       $select = array(
            '*'
        );
        $where = array(
            'ID' => $id
        );
        $data['get_data'] = $this->UserModel->select_single_user($select, $where);
     $data['page'] = 'admin/editUser';
     $data['message'] = 'Edit User';
     $this->load->view('admin/index',$data);
    }
    else{
      redirect('LoginController');
    }
  }
 
  public function updateUserDetails($id){
   if($this->LoginModel->is_user_loged_in() && $this->session->userdata('current_user_id') == '1'){

    $data = array(
        'fullName' => $this->input->post('fullName'),
        'userName' => $this->input->post('userName'),
        'email' => $this->input->post('email'),
        'phone' => $this->input->post('phone'),
        'address' => $this->input->post('address'),
        'designation' => $this->input->post('designation'),
        'role' => $this->input->post('role')

      );
   
     $isUpdate = $this->UserModel->updateUserDetails($id,$data);
     if($isUpdate){
      $this->session->set_flashdata('saveMsg','Inserted/Updated Sucessfully.');
          redirect("UserController");
     
     }
     else{
         $this->session->set_flashdata('saveFaildMsg','Data not inserted.');
          redirect("UserController");
     }
   }
   else{
    redirect('LoginController');
   }
   }
       
 

  public function activeUser($id){
    if($this->LoginModel->is_user_loged_in() && $this->session->userdata('current_user_id') == '1'){

      $activated = $this->UserModel->activeUser($id);
      //var_dump($activated);exit;
      redirect('UserController/Read');
      }
      else{
        redirect('LoginController');
      }
  }
  
   public function deActiveUser($id){
    if($this->LoginModel->is_user_loged_in() && $this->session->userdata('current_user_id') == '1'){

      $activated = $this->UserModel->deActiveUser($id);
      redirect('UserController/Read');
     }
     else{
      redirect('LoginController');
     }
  }
  
  // public function allActiveUsersLists(){
  //   if($this->LoginModel->is_user_loged_in()){
    
  //   $data['activeUserList'] = $this->UserModel->allActiveUsersLists();
  //   $this->load->view('admin/activeUser',$data);
  //    }
  //    else{
  //     redirect('LoginController');
  //    }
  // }

 //  public function allDeactiveUsersLists(){
 //    if($this->LoginModel->is_user_loged_in()){

 //    $status = array('status' => 0);
    
 //    $data['deActiveUserList'] = $this->UserModel->alldeActiveUsersLists($status);
 //   $this->load->view('admin/deActiveUser',$data);
 // }
 // else{
 //  redirect('LoginController');
 // }
 //  }

 public function viewSingleUserDetails($id){
  if($this->LoginModel->is_user_loged_in()){

   if ($id == '' || $id==null || !isset($id)) {
     $id = 0;
   }
    $select = array(
            '*'
        );
        $where = array(
            'ID' => $id
        );
        $data['get_data'] = $this->UserModel->select_single_user($select, $where);

         
       $this->load->view('admin/singleUserDetails',$data);
     }
     else{
      redirect('LoginController');
     }
 }



public function goToChangePasswordPage(){
  $data['page'] = 'admin/changePassword';
   $data['message'] = 'Change Password';
   $this->load->view('admin/index',$data);
}
 public function changePassword(){
   //$id = $current_user_id;
   //var_dump($id); exit;
   $changedPass = $this->UserModel->changePassword();
   //$data = $this->UserModel->changePassword();
   if ($changedPass) {
     $this->session->set_flashdata('saveMsg','Password changed Sucessfully.');
         // redirect("UserController");
    // $this->load->view('admin/changePassword');
     
   }
   else{
      $this->session->set_flashdata('errMsg','Password not changed.');
         // redirect("UserController");

   }
   $data['page'] = 'admin/changePassword';
   $data['message'] = 'Change Password';
   $this->load->view('admin/index',$data);
   
 }

}
