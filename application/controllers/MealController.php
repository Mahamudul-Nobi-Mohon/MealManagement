<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MealController extends CI_Controller {

	public function __construct() {
      parent::__construct();
        
          //$this->load->library('pagination');
      $this->load->model('UserModel');
      $this->load->model('LoginModel');
      $this->load->model('MealModel');


    }

     public function addMealPage(){
      if($this->LoginModel->is_user_loged_in()){
     	$data['message'] = 'Add Meal';
    	$data['page'] = 'admin/addMeal';
    	$this->load->view('admin/index',$data);
    }
    else{
        redirect('LoginController');
    }

    }

    public function editMealPage(){
      if($this->LoginModel->is_user_loged_in()){
     	$data['message'] = 'Edit Meal';
    	$data['page'] = 'admin/editMeal';
    	$this->load->view('admin/index',$data);
    }
    else{
        redirect('LoginController');
    }

    }

    public function addMeal(){
      if($this->LoginModel->is_user_loged_in()){
    	 $number = count($_POST["name"]);
       $date = $this->input->post('cal_1');
      if($number > 0)  
    	{  
	      for($i=0; $i<$number; $i++)  
	      {  
           if(trim($_POST["name"][$i] != ''))  
           { 
             $name = $_POST["name"][$i];
       
           	$data = array(
             'name' => $name,
             'bazartk' => $_POST["bazartk"][$i],
             'meal' => $_POST["meal"][$i],
             'date' => $date,
             'user_id' => $this->session->userdata('current_user_id')
           );
           	//var_dump($data); exit;
             $this->db->where('date',$date);
             $this->db->where('name',$name);
             $q = $this->db->get('bazar');
             if ($date != '') {
               
             if ( $q->num_rows() > 0 ) 
             {
                $this->db->where('date',$date);
                $this->db->where('name',$name);
                $this->db->update('bazar',$data);
             } else {
                //$this->db->set('name', $name);
                $this->db->insert('bazar',$data);
             }
             echo json_encode("Inserted Successfully !");
           }
           else{
            echo json_encode("Not Inserted !");
           }

           	 //$this->db->insert('bazar',$data);
           }
      	 }
  	   }
  	   
    	}
      else{
        redirect('LoginController');
    }

    }

    public function updateMeal(){
      if($this->LoginModel->is_user_loged_in()){
    	$date = $this->input->post('cal_1');
    	$number = count($_POST["name"]);
    	 if($number > 0)  
    	{  
	      for($i=0; $i<$number; $i++)  
	      {  
           if(trim($_POST["name"][$i] != ''))  
           {  
           	$ID = $_POST["ID"][$i];
    	
           	$data = array(
             'name' => $_POST["name"][$i],
             'bazartk' => $_POST["bazartk"][$i],
             'meal' => $_POST["meal"][$i],
             'user_id' => $this->session->userdata('current_user_id')
           );

           //	var_dump($data); 
           	
           	$this->MealModel->updateMealByDate($ID,$date,$data);
           }
      	 }
  	   }
  	   echo json_encode("Updated Successfully !");
    	// echo $number; exit;
      
    }
    else{
        redirect('LoginController');
    }
  }


    public function editMealByDate(){
      if($this->LoginModel->is_user_loged_in()){
    	$date = $_POST['date'];
      if ($date != '') {
        $data = $this->MealModel->editMealByDate($date);
        echo json_encode($data);
      }
    	else{
      echo json_encode("Please Select Date");
      }
    }
    else{
        redirect('LoginController');
    }
  }

    public function goToShowReportPage(){
      if($this->LoginModel->is_user_loged_in()){
    	$data['message'] = 'Show Report';
    	$data['page'] = 'admin/showReport';
    	$this->load->view('admin/index',$data);
    }
    else{
        redirect('LoginController');
    }
  }

     public function showReportBySearchDate(){
      if($this->LoginModel->is_user_loged_in()){
    	$startDate = $_POST['startDate'];
    	$endDate = $_POST['endDate'];
    	$name = $_POST['name'];
    	$data = $this->MealModel->showReportBySearchDate($startDate,$endDate,$name);
    	echo json_encode($data);
    }
    else{
        redirect('LoginController');
    }
  }
    
    public function goToShowAllReportPage(){
      if($this->LoginModel->is_user_loged_in()){
    	$data['message'] = 'Show Report';
    	$data['page'] = 'admin/allReport';
    	$this->load->view('admin/index',$data);
    }
    else{
        redirect('LoginController');
    }
  }

    public function showAllMemberReportBySearchDate(){
      if($this->LoginModel->is_user_loged_in()){
    	$startDate = $_POST['startDate'];
    	$endDate = $_POST['endDate'];
    	$data = $this->MealModel->showAllMemberReportBySearchDate($startDate,$endDate);
    	echo json_encode($data);
    }
    else{
        redirect('LoginController');
    }
  }

     public function currentMonthPersonMeal(){
      if($this->LoginModel->is_user_loged_in()){
      $data = $this->MealModel->currentMonthPersonMeal();
      
      $newData =  array();
      foreach ($data as $key=>$value) {
        $newData[$key]['name'] = $value->name;
        $newData[$key]['y'] = (int) $value->y;
      } 

      echo json_encode($newData);
    }
    else{
        redirect('LoginController');
    }
  }

    public function currentMonthPersonBazar(){
      if($this->LoginModel->is_user_loged_in()){
      $data = $this->MealModel->currentMonthPersonBazar();
      
      $newData =  array();
      foreach ($data as $key=>$value) {
        $newData[$key]['name'] = $value->name;
        $newData[$key]['y'] = (int) $value->y;
      } 

      echo json_encode($newData);
    }
    else{
        redirect('LoginController');
    }
  }

    // public function giveOrGet(){

    //   $startDate = $this->input->post('cal_1');
    //   $endDate =   $this->input->post('cal_2');
    //    $allName = $this->UserModel->read();
    //     foreach ($allName as $key => $value) {
    //       //$giveOrGet = $this->MealModel->giveOrGet();
    //       var_dump($value->userName);
    //     }
    //     exit;
    // }

    public function exportReportSearchByDate(){
      if($this->LoginModel->is_user_loged_in()){
   // echo "i am here"; exit;
    if ($this->input->post('downloadPdfFile')) {
          $this->MealModel->trancate_tempTable();

          $startDate = $this->input->post('cal_1');
          $endDate =   $this->input->post('cal_2');
          //$name = $this->input->post('name');

          $allName = $this->UserModel->read();
        foreach ($allName as $key => $value) {
          //$giveOrGet = $this->MealModel->giveOrGet();
          $data =  array('name' => $value->userName );
          $insertName = $this->MealModel->insertNameIN_tmpTable($data);
          
        }

        foreach ($allName as $key => $value) {
          $dateWiseBazarTk = $this->MealModel->dateWiseBazarTk($value->userName,$startDate,$endDate);
          $userName = array('name' => $value->userName );
          foreach ($dateWiseBazarTk as $key => $value) {
            $data =  array('bazartk' => $value->bazartk);
         
             $insertName = $this->MealModel->insertBazartkIN_tmpTable($userName,$data);
          }
          
        }

        foreach ($allName as $key => $value) {
          $dateWiseEatenTk = $this->MealModel->dateWiseEatenTk($value->userName,$startDate,$endDate);
          $userName = array('name' => $value->userName );
          foreach ($dateWiseEatenTk as $key => $value) {
            $data =  array('eaten_tk' => $value->eatenTk);
            //var_dump($data);
         
             $insertName = $this->MealModel->insertEatentkIN_tmpTable($userName,$data);
          }
          
        }

        foreach ($allName as $key => $value) {
          $dateWiseGiveOrGet = $this->MealModel->dateWiseGiveOrGet($value->userName);
          $userName = array('name' => $value->userName );
          foreach ($dateWiseGiveOrGet as $key => $value) {
            if ($value->tk > 0) {
               $data =  array('will_get' => $value->tk);
              $this->MealModel->insertWillGiveOrGet_tmpTable($userName,$data);
              
            }
            else{
              $data =  array('will_give' => $value->tk);
               $this->MealModel->insertWillGiveOrGet_tmpTable($userName,$data);
            }
             //var_dump($data);
              
             
          }
          
        }

          // echo $endDate+ " "; 
          // echo $endDate; exit;
          $data['data'] = $this->MealModel->showAllMemberReportBySearchDate($startDate,$endDate);
          $data['giveGetReport'] = $this->MealModel->giveGetReport();
          $html = $this->load->view("admin/exportReportSearchByDate",$data,TRUE);  
          $this->load->library('m_pdf');
          $this->mpdf=new mPDF('utf-8','A4','','solaimanlipi',32,25,27,25,16,13);
          
          $this->mpdf->WriteHTML($html);
          $this->mpdf->Output(time().' mass_member_peport.pdf','D');
          echo json_encode("exported file.");
          //$this->load->view("customer/singleCustomerPdfReport",$data);
       }
     }
     else{
        redirect('LoginController');
    }
   }

     public function exportIndividualReportSearchByDate(){
      if($this->LoginModel->is_user_loged_in()){
   // echo "i am here"; exit;
    if ($this->input->post('downloadPdfFile')) {
          $name = $this->input->post('name');
          $startDate = $this->input->post('cal_1');
          $endDate =   $this->input->post('cal_2');
          // echo $endDate+ " "; 
          // echo $endDate; exit;
          $data['data'] = $this->MealModel->exportIndividualReportSearchByDate($name,$startDate,$endDate);
          $html = $this->load->view("admin/exportIndividualReportSearchByDate",$data,TRUE);  
          $this->load->library('m_pdf');
          $this->mpdf=new mPDF('utf-8','A4','','solaimanlipi',32,25,27,25,16,13);
          
          $this->mpdf->WriteHTML($html);
          $this->mpdf->Output(time().' mass_member_peport.pdf','D');
          echo json_encode("exported file.");
          //$this->load->view("customer/singleCustomerPdfReport",$data);
       }
     }
     else{
        redirect('LoginController');
    }
   }


}