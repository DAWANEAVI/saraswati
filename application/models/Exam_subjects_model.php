<?php 

class Exam_subjects_model extends CI_Model 
{ 
     function __construct()
      {
          parent::__construct();
      }

      function check_recod($subjectName)
      {
        try{
           return $this->db->get_where('exam_subjects',array('subjectName'=>$subjectName , 'statusID' => 1))->row_array();
           } catch (Exception $ex) {
             throw new Exception('Subject Check : Error in check record function - ' . $ex);
           }  
      }
      /*
        * Get exam_subjects by subjectID 
      */ 
      function get_exam_subjects($subjectID)
      {
        try{
           return $this->db->get_where('exam_subjects',array('subjectID'=>$subjectID))->row_array();
           } catch (Exception $ex) {
             throw new Exception('Exam_subjects_model Model : Error in get_exam_subjects function - ' . $ex);
           }  
      }
      /*
        * Get exam_subjects by  column name
      */ 
      function get_exam_subjectsbyclm_name($clm_name,$clm_value)
      {
        try{
           return $this->db->get_where('exam_subjects',array($clm_name=>$clm_value))->row_array();
           } catch (Exception $ex) {
             throw new Exception('Exam_subjects_model Madel : Error in get_exam_subjectsbyclm_name function - ' . $ex);
           }  
      }
     /*
        * Get All exam_subjects count 
      */ 
      function get_all_exam_subjects_count()
      {
        try{
           $this->db->from('exam_subjects');
           $this->db->where('statusID',1);
           return $this->db->count_all_results();
           } catch (Exception $ex) {
             throw new Exception('Exam_subjects_model model : Error in get_all_exam_subjects_count function - ' . $ex);
           }  
      }
     /*
        * Get All with associated tables join exam_subjectscount 
      */ 
      function get_all_with_asso_exam_subjects()
      {
        try{
          $query = $this->db->get(); 
            if($query->num_rows() != 0){
               return $query->result_array();
            }else{
                return false;
            }
           } catch (Exception $ex) {
             throw new Exception('Exam_subjects_model model : Error in get_all_with_asso_exam_subjects function - ' . $ex);
           }  
      }
      /*
          * Get all exam_subjects 
      */ 
      function get_all_exam_subjects($params = array())
      {
        try{
              $this->db->order_by('subjectID', 'asc');
              if(isset($params) && !empty($params)){
               $this->db->limit($params['limit'], $params['offset']);
              }
              $this->db->where('statusID',1);
              return $this->db->get('exam_subjects')->result_array();
           } catch (Exception $ex) {
             throw new Exception('Exam_subjects_model model : Error in get_all_exam_subjects function - ' . $ex);
           }  
      } 
      /*
         * function to add new exam_subjects 
      */
      function add_exam_subjects($params)
      {
        try{
          $this->db->insert('exam_subjects',$params);
        return $this->db->insert_id();
           } catch (Exception $ex) {
             throw new Exception('Exam_subjects_model model : Error in add_exam_subjects function - ' . $ex);
           }  
      }
      /* 
          * function to update exam_subjects 
      */
      function update_exam_subjects($subjectID,$params)
      {
        try{
            $this->db->where('subjectID',$subjectID);
        return $this->db->update('exam_subjects',$params);
           } catch (Exception $ex) {
             throw new Exception('Exam_subjects_model model : Error in update_exam_subjects function - ' . $ex);
           }  
       }
     /* 
          * function to delete exam_subjects 
      */
       function delete_exam_subjects($subjectID)
       {
        try{

             $this->db->where('subjectID',$subjectID);
             return $this->db->update('exam_subjects',['statusID'=> 0,'modified_by' => $this->session->user_id]);
           } catch (Exception $ex) {
             throw new Exception('Exam_subjects_model model : Error in delete_exam_subjects function - ' . $ex);
           }  
       }
      /*
        * Get exam_subjects by  column name where not in particular id
      */ 
      function get_exam_subjectsbyclm_name_not_id($clm_name,$clm_value,$where_cond)
      {
        try{
            $this->db->where('subjectID!=', $where_cond);
           return $this->db->get_where('exam_subjects',array($clm_name=>$clm_value))->row_array();
           } catch (Exception $ex) {
             throw new Exception('Exam_subjects_model model : Error in get_exam_subjectsbyclm_name_not_id function - ' . $ex);
           }  
      }
     /*
        * Get All with associated tables join exam_subjectscount 
      */ 
      function get_all_with_asso_exam_subjects_by_cat($column_name=null,$value_id=null,$params=array())
      {
        try{
          $query = $this->db->get(); 
            if($query->num_rows() != 0){
               return $query->result_array();
            }else{
                return false;
            }
           } catch (Exception $ex) {
             throw new Exception('Exam_subjects_model model : Error in get_all_with_asso_exam_subjects_by_cat function - ' . $ex);
           }  
      }
      /*
          * Get all exam_subjects_by_cat 
      */ 
      function get_all_exam_subjects_by_cat($column_name=null,$value_id=null,$params=array())
      {
        try{
              $this->db->order_by('subjectID', 'desc');
              $this->db->where($column_name, $value_id);
              if(isset($params) && !empty($params)){
               $this->db->limit($params['limit'], $params['offset']);
              }
               return $this->db->get('exam_subjects')->result_array();
           } catch (Exception $ex) {
             throw new Exception('Exam_subjects_model model : Error in get_all_exam_subjects_by_cat function - ' . $ex);
           }  
      } 
 }
