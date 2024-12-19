<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Dashboard_model
 *
 * @author durga it
 */
class Dashboard_model  extends CI_Model{
     function __construct()
    {
        parent::__construct();
    }
    //put your code here
    
    function getCountActiveStudent(){
         $this->db->select('count(student_id) as no_of_student');
         $this->db->from('student');
         $this->db->where('is_active',1);
         return $this->db->get()->row();
    }
    function getCountActiveTeacher(){
         $this->db->select('count(teacher_id) as no_of_teacher');
         $this->db->from('teacher');
         return $this->db->get()->row();
    }
    
    function getCurrentYearCount($acd){
         $this->db->select('count(student_id) as ac_no_of_student');
         $this->db->from('student');
          $this->db->where('academic_year',$acd);
           $this->db->where('is_active',1);
         return $this->db->get()->row();
    }
    function getCurrentYearFees($acd){
         $this->db->select('sum(paid_amount) as total');
         $this->db->from('payments');
          $this->db->where('academic_year',$acd);
         return $this->db->get()->row();
    }

     function getoldfees(){
         $this->db->select('sum(old_fees) as old_fees');
         $this->db->select('sum(paid_fees) as paid_fees');
         $this->db->from('student');
         $query = $this->db->get()->row();
          
         return $query->old_fees - $query->paid_fees;

    }

    function getpaid_oldfees(){
         $this->db->select('sum(paid_fees) as paid_fees');
         $this->db->from('student');
         $query = $this->db->get()->row();
          
         return $query->paid_fees;

    }

    function getoldfeesCurrentyr(){
         $this->db->select('sum(total_amount) as old_fees');
         $this->db->select('sum(paid_amount) as paid_fees');
         $this->db->from('payments');
         $query = $this->db->get()->row();
          
         return $query->old_fees - $query->paid_fees;

    }

    function getpaid_oldfeesCurrentyr(){
         
         $this->db->select('sum(paid_amount) as paid_fees');
         $this->db->from('payments');
         $query = $this->db->get()->row();
          
         return $query->paid_fees;

    }
    
    
    function getYearWisePaymentInfo(){
         
        $this->db->select('sum(p.total_amount) as total,sum(p.paid_amount) as paid,p.academic_year');
        $this->db->from('payments p');
        $this->db->join('student s','p.student_id = s.student_id','inner');
        $this->db->group_by('p.academic_year');
        $this->db->where('s.is_active',1);
        $query = $this->db->get();
        return $query->result_array();

    }
    
    function getOldFeesInfo(){
        $this->db->select('sum(old_fees) as old_fees,sum(paid_fees) as paid_fees');
        $this->db->from('student');
        $this->db->where('is_active',1);
        $query = $this->db->get();
        return $query->result_array();

    }
    
   function classStudent(){
       $this->db->select("c.class_name,count(s.student_id) as student");
       $this->db->from('class c');
       $this->db->join('student s','c.class_id = s.class_id','left');
       $this->db->group_by('c.class_id');
       $this->db->where('s.is_active',1);
       $query = $this->db->get();
       return $query->result_array();
       
   }
   function getMonthFeeCollected($academic_year){
       $this->db->select("MONTHNAME(pl.created_at) as month, SUM(pl.tuitionfees+pl.late_fee) as total");
       $this->db->from('payment_log pl'); 
       $this->db->group_by('YEAR(created_at),MONTH(created_at)');
       $query = $this->db->get();
       return $query->result_array();
   }
   
   function getFeesData(){
       $this->db->select('sum(total_amount) as total,sum(paid_amount) as paid');
       $this->db->from('payments');
       $query = $this->db->get();
       return $query->row();
   }
   function getSmsCount(){
       $sms_row = $this->db->get('web_data')->row();
       return $sms_row->sms_send;
   }
    
   function getPaymentCount(){
       $this->db->select('sum(tuitionfees+late_fee) as total');
       $this->db->from('payment_log pl');
       $this->db->where('DATE(created_at) =CURDATE()');
       $query = $this->db->get()->row();
      return $query->total;
   }
   
}
