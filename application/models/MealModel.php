<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MealModel extends CI_Model{

   
	public function editMealByDate($date)
    {
       
        $this->db->select('*');
        $this->db->from('bazar');
        $this->db->where('date',$date);
        $query = $this->db->get();
        //echo $this->db->last_query(); exit;
        //$query = $this->db->get('user');
        return $query->result();
        
    }

    public function currentMonthPersonMeal()
    {
       //SELECT name,sum(meal) as meal FROM `bazar` WHERE YEAR(date) = YEAR(CURRENT_DATE()) AND MONTH(date) = MONTH(CURRENT_DATE()) group by name asc 
    $this->db->select('name,sum(meal) as y');
    $this->db->where('YEAR(date) = YEAR(CURRENT_DATE()) AND MONTH(date) = MONTH(CURRENT_DATE())');
    $this->db->from('bazar');
    $this->db->group_by('name');
    $query = $this->db->get();
    //echo $this->db->last_query(); exit;
    //$query = $this->db->get('user');
    return $query->result();
        
    }

    public function currentMonthPersonBazar()
    {
       //SELECT name,sum(meal) as meal FROM `bazar` WHERE YEAR(date) = YEAR(CURRENT_DATE()) AND MONTH(date) = MONTH(CURRENT_DATE()) group by name asc 
    $this->db->select('name,sum(bazartk) as y');
    $this->db->where('YEAR(date) = YEAR(CURRENT_DATE()) AND MONTH(date) = MONTH(CURRENT_DATE())');
    $this->db->from('bazar');
    $this->db->group_by('name');
    $query = $this->db->get();
    //echo $this->db->last_query(); exit;
    //$query = $this->db->get('user');
    return $query->result();
        
    }
    public function showReportBySearchDate($startDate,$endDate,$name)
    {
        $this->db->select('*');
        $this->db->from('bazar');
        if ($name != '') {
        	 $this->db->where('name',$name);
		 }
        if($endDate != '' && $startDate != ''){
        	 $this->db->where(' date >= date("'.$startDate.'")');
		     $this->db->where( 'date <= date("'.$endDate.'")'); 
        }
       
        $query = $this->db->get();
        return $query->result();
        
    }

    public function showAllMemberReportBySearchDate($startDate,$endDate)
    {
        $this->db->select('*');
        $this->db->from('bazar');
       
        if($endDate != '' && $startDate != ''){
        	 $this->db->where(' date >= date("'.$startDate.'")');
		     $this->db->where( 'date <= date("'.$endDate.'")'); 
        }
       
        $query = $this->db->get();
        //var_dump($this->db->last_query()); exit;
        return $query->result();
        
    }

    public function exportIndividualReportSearchByDate($name,$startDate,$endDate)
    {
        $this->db->select('*');
        $this->db->from('bazar');
       
        if($endDate != '' && $startDate != ''){
             $this->db->where('name',$name);
             $this->db->where(' date >= date("'.$startDate.'")');
             $this->db->where( 'date <= date("'.$endDate.'")'); 
        }
       
        $query = $this->db->get();
        //var_dump($this->db->last_query()); exit;
        return $query->result();
        
    }


    public function updateMealByDate($ID,$date,$data){
   
    $this->db->where('ID', $ID);
    $this->db->where('date', $date);
    $query = $this->db->update('bazar', $data);
    //echo $this->db->last_query(); 
    return $query;   
  }

  public function totalBazar(){
    $this->db->select('sum(bazartk) as bazartk');
    $this->db->where('YEAR(date) = YEAR(CURRENT_DATE()) AND MONTH(date) = MONTH(CURRENT_DATE())');
    $this->db->from('bazar');
    $query = $this->db->get();
   // echo $this->db->last_query(); exit;
    //$query = $this->db->get('user');
    return $query->result();
  }

  public function totalMeal(){
    $this->db->select('sum(meal) as meal');
    $this->db->where('YEAR(date) = YEAR(CURRENT_DATE()) AND MONTH(date) = MONTH(CURRENT_DATE())');
    $this->db->from('bazar');
    $query = $this->db->get();
   // echo $this->db->last_query(); exit;
    //$query = $this->db->get('user');
    return $query->result();
  }

   public function dateWiseBazarTk($name,$startDate,$endDate){
    $this->db->select('sum(bazartk) as bazartk');
        $this->db->from('bazar');
       
        if($endDate != '' && $startDate != ''){
            $this->db->where('name',$name);
             $this->db->where(' date >= date("'.$startDate.'")');
             $this->db->where( 'date <= date("'.$endDate.'")'); 
        }
       
        $query = $this->db->get();
        //var_dump($this->db->last_query()); 
        return $query->result();
        
}

public function dateWiseEatenTk($name,$startDate,$endDate){
    $this->db->select(" (((select sum(bazartk) from bazar WHERE (date BETWEEN '$startDate' AND '$endDate')) / (select sum(meal) from bazar WHERE (date BETWEEN '$startDate' AND '$endDate')) ) *
       (select sum(meal) from bazar WHERE name ='$name' and (date BETWEEN '$startDate' AND '$endDate')
       )) as eatenTk");
        //$this->db->from('bazar');
       
        // if($endDate != '' && $startDate != ''){
        //     $this->db->where('name',$name);
        //      $this->db->where(' date >= date("'.$startDate.'")');
        //      $this->db->where( 'date <= date("'.$endDate.'")'); 
        // }
       
        $query = $this->db->get();
        //var_dump($this->db->last_query()); exit;
        return $query->result();
        
}

public function dateWiseGiveOrGet($name){
    $this->db->select(" (bazartk - eaten_tk) as tk from tmp_finalcalculation  WHERE name ='$name' ");
        
        $query = $this->db->get();
        //var_dump($this->db->last_query()); exit;
        return $query->result();
        
}

public function giveGetReport(){
    $this->db->select("*");
    $this->db->from('tmp_finalcalculation');
        
        $query = $this->db->get();
        //var_dump($this->db->last_query()); exit;
        return $query->result();
        
}

  public function insertNameIN_tmpTable($name){
    return $this->db->insert('tmp_finalcalculation',$name);
    //return $query->result();
  }

  public function insertBazartkIN_tmpTable($name,$data){
   
    $this->db->where($name);
    //$this->db->where('date', $date);
    $query = $this->db->update('tmp_finalcalculation', $data);
    //echo $this->db->last_query();  exit;
    return $query;   
  }

  public function insertEatentkIN_tmpTable($name,$data){
   
    $this->db->where($name);
    //$this->db->where('date', $date);
    $query = $this->db->update('tmp_finalcalculation', $data);
    //echo $this->db->last_query();  exit;
    return $query;   
  }

  public function insertWillGiveOrGet_tmpTable($name,$data){
   
    $this->db->where($name);
    //$this->db->where('date', $date);
    $query = $this->db->update('tmp_finalcalculation', $data);
    //echo $this->db->last_query();  exit;
    return $query;   
  }

  // public function insertWillGet_tmpTable($name,$data){
   
  //   $this->db->where($name);
  //   //$this->db->where('date', $date);
  //   $query = $this->db->update('tmp_finalcalculation', $data);
  //   //echo $this->db->last_query();  exit;
  //   return $query;   
  // }

       //truncate table tmp_finalcalculation

public function trancate_tempTable(){
    $this->db->truncate('tmp_finalcalculation');
}

  public function giveOrGet(){

    


    
        // $result = "select ((select sum(bazartk) from bazar WHERE (date BETWEEN '2010-01-30' AND '2017-09-29') and name='mohon') - ((select sum(meal) from bazar WHERE (date BETWEEN '2010-01-30' AND '2017-09-29') and name='mohon') * (select ((select sum(bazartk) from bazar WHERE (date BETWEEN '2010-01-30' AND '2017-09-29')) / (select sum(meal) from bazar WHERE (date BETWEEN '2010-01-30' AND '2017-09-29')) )))  ) ";
        //$pass = $this->db->query($result);
        
  }

}