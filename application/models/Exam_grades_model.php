<?php 
/*
   Generated by Manuigniter v2.0 
   www.manuigniter.com
*/
class Exam_grades_model extends CI_Model 
{ 
     function __construct()
      {
          parent::__construct();
      }

      function check_recod($grade)
      {
        try{
           return $this->db->get_where('exam_grades',array('grade'=>$grade , 'statusID' => 1))->row_array();
           } catch (Exception $ex) {
             throw new Exception('Grade Check : Error in check record function - ' . $ex);
           }  
      }
      /*
        * Get exam_grades by gradeID 
      */ 
      function get_exam_grades($gradeID)
      {
        try{
           return $this->db->get_where('exam_grades',array('gradeID'=>$gradeID))->row_array();
           } catch (Exception $ex) {
             throw new Exception('Exam_grades_model Model : Error in get_exam_grades function - ' . $ex);
           }  
      }
      /*
        * Get exam_grades by  column name
      */ 
      function get_exam_gradesbyclm_name($clm_name,$clm_value)
      {
        try{
           return $this->db->get_where('exam_grades',array($clm_name=>$clm_value))->row_array();
           } catch (Exception $ex) {
             throw new Exception('Exam_grades_model Madel : Error in get_exam_gradesbyclm_name function - ' . $ex);
           }  
      }
     /*
        * Get All exam_grades count 
      */ 
      function get_all_exam_grades_count()
      {
        try{
           $this->db->from('exam_grades');
           $this->db->where('statusID',1);
           return $this->db->count_all_results();
           } catch (Exception $ex) {
             throw new Exception('Exam_grades_model model : Error in get_all_exam_grades_count function - ' . $ex);
           }  
      }
     /*
        * Get All with associated tables join exam_gradescount 
      */ 
      function get_all_with_asso_exam_grades()
      {
        try{
          $query = $this->db->get(); 
            if($query->num_rows() != 0){
               return $query->result_array();
            }else{
                return false;
            }
           } catch (Exception $ex) {
             throw new Exception('Exam_grades_model model : Error in get_all_with_asso_exam_grades function - ' . $ex);
           }  
      }
      /*
          * Get all exam_grades 
      */ 
      function get_all_exam_grades($params = array())
      {
        try{
              $this->db->order_by('gradeID', 'asc');
              if(isset($params) && !empty($params)){
               $this->db->limit($params['limit'], $params['offset']);
              }
              $this->db->where('statusID',1);
              return $this->db->get('exam_grades')->result_array();
           } catch (Exception $ex) {
             throw new Exception('Exam_grades_model model : Error in get_all_exam_grades function - ' . $ex);
           }  
      } 
      /*
         * function to add new exam_grades 
      */
      function add_exam_grades($params)
      {
        try{
          $this->db->insert('exam_grades',$params);
        return $this->db->insert_id();
           } catch (Exception $ex) {
             throw new Exception('Exam_grades_model model : Error in add_exam_grades function - ' . $ex);
           }  
      }
      /* 
          * function to update exam_grades 
      */
      function update_exam_grades($gradeID,$params)
      {
        try{
            $this->db->where('gradeID',$gradeID);
            return $this->db->update('exam_grades',$params);
           } catch (Exception $ex) {
             throw new Exception('Exam_grades_model model : Error in update_exam_grades function - ' . $ex);
           }  
       }
     /* 
          * function to delete exam_grades 
      */
       function delete_exam_grades($gradeID)
       {
        try{
             $this->db->where('gradeID',$gradeID);
             return $this->db->update('exam_grades',['statusID'=> 0,'modified_by' => $this->session->user_id]);
           } catch (Exception $ex) {
             throw new Exception('Exam_grades_model model : Error in delete_exam_grades function - ' . $ex);
           }  
       }
      /*
        * Get exam_grades by  column name where not in particular id
      */ 
      function get_exam_gradesbyclm_name_not_id($clm_name,$clm_value,$where_cond)
      {
        try{
            $this->db->where('gradeID!=', $where_cond);
           return $this->db->get_where('exam_grades',array($clm_name=>$clm_value))->row_array();
           } catch (Exception $ex) {
             throw new Exception('Exam_grades_model model : Error in get_exam_gradesbyclm_name_not_id function - ' . $ex);
           }  
      }
     /*
        * Get All with associated tables join exam_gradescount 
      */ 
      function get_all_with_asso_exam_grades_by_cat($column_name=null,$value_id=null,$params=array())
      {
        try{
          $query = $this->db->get(); 
            if($query->num_rows() != 0){
               return $query->result_array();
            }else{
                return false;
            }
           } catch (Exception $ex) {
             throw new Exception('Exam_grades_model model : Error in get_all_with_asso_exam_grades_by_cat function - ' . $ex);
           }  
      }
      /*
          * Get all exam_grades_by_cat 
      */ 
      function get_all_exam_grades_by_cat($column_name=null,$value_id=null,$params=array())
      {
        try{
              $this->db->order_by('gradeID', 'desc');
              $this->db->where($column_name, $value_id);
              if(isset($params) && !empty($params)){
               $this->db->limit($params['limit'], $params['offset']);
              }
               return $this->db->get('exam_grades')->result_array();
           } catch (Exception $ex) {
             throw new Exception('Exam_grades_model model : Error in get_all_exam_grades_by_cat function - ' . $ex);
           }  
      } 
 }
