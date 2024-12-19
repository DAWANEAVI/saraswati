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
    
   function classStudent(){
       $this->db->select("c.class_name,count(s.student_id) as student");
       $this->db->from('class c');
       $this->db->join('student s','c.class_id = s.class_id','left');
       $this->db->group_by('c.class_id');
//       $this->db->where('s.is_active',1);
       $query = $this->db->get();
       return $query->result_array();
       
   }
   function getMonthFeeCollected($academic_year){
       $this->db->select("MONTHNAME(pl.created_date) as month, SUM(pl.education_fee+pl.term_fee+pl.exam_fee+pl.sport_fee+	pl.misc_fee+pl.old_fee) as total");
       $this->db->from('payment_log pl'); 
       $this->db->group_by('YEAR(created_date),MONTH(created_date)');
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
       $this->db->select('sum(education_fee+term_fee+exam_fee+sport_fee+misc_fee+old_fee) as total');
       $this->db->from('payment_log pl');
       $this->db->where('DATE(created_date) =CURDATE()');
       $query = $this->db->get()->row();
      return $query->total;
   }
   
}
