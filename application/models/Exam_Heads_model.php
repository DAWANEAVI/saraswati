<?php 

class Exam_Heads_model extends CI_Model 
{ 
     function __construct()
      {
          parent::__construct();
      }

      function check_recod($examName)
      {
        try{
           return $this->db->get_where('exam_heads',array('examName'=>$examName,'statusID' => 1))->row_array();
           } catch (Exception $ex) {
             throw new Exception('Exam_Heads_model Model : Error in get_exam_Heads function - ' . $ex);
           }  
      }

      /*
        * Get exam_Heads by exHeadID 
      */ 
      function get_exam_Heads($exHeadID)
      {
        try{
           return $this->db->get_where('exam_heads',array('exHeadID'=>$exHeadID))->row_array();
           } catch (Exception $ex) {
             throw new Exception('Exam_Heads_model Model : Error in get_exam_Heads function - ' . $ex);
           }  
      }
      /*
        * Get exam_Heads by  column name
      */ 
      function get_exam_Headsbyclm_name($clm_name,$clm_value)
      {
        try{
           return $this->db->get_where('exam_heads',array($clm_name=>$clm_value))->row_array();
           } catch (Exception $ex) {
             throw new Exception('Exam_Heads_model Madel : Error in get_exam_Headsbyclm_name function - ' . $ex);
           }  
      }
     /*
        * Get All exam_Heads count 
      */ 
      function get_all_exam_Heads_count()
      {
        try{
           $this->db->from('exam_heads');
           $this->db->where('statusID',1);
           return $this->db->count_all_results();
           } catch (Exception $ex) {
             throw new Exception('Exam_Heads_model model : Error in get_all_exam_Heads_count function - ' . $ex);
           }  
      }
     /*
        * Get All with associated tables join exam_Headscount 
      */ 
      function get_all_with_asso_exam_Heads()
      {
        try{ 
             $this->db->where('exam_heads');
             $this->db->get('exam_heads');

            if($query->num_rows() != 0){
               return $query->result_array();
            }else{
                return false;
            }
           } catch (Exception $ex) {
             throw new Exception('Exam_Heads_model model : Error in get_all_with_asso_exam_Heads function - ' . $ex);
           }  
      }
      /*
          * Get all exam_Heads 
      */ 
      function get_all_exam_Heads($params = array())
      {
        try{
              $this->db->order_by('exHeadID', 'asc');
              if(isset($params) && !empty($params)){
               $this->db->limit($params['limit'], $params['offset']);
              }
              $this->db->where('statusID',1);
              return $this->db->get('exam_heads')->result_array();
           } catch (Exception $ex) {
             throw new Exception('Exam_Heads_model model : Error in get_all_exam_Heads function - ' . $ex);
           }  
      } 
      /*
         * function to add new exam_Heads 
      */
      function add_exam_Heads($params)
      {
        try{
          $this->db->insert('exam_heads',$params);
        return $this->db->insert_id();
           } catch (Exception $ex) {
             throw new Exception('Exam_Heads_model model : Error in add_exam_Heads function - ' . $ex);
           }  
      }
      /* 
          * function to update exam_Heads 
      */
      function update_exam_Heads($exHeadID,$params)
      {
        try{
            $this->db->where('exHeadID',$exHeadID);
            return $this->db->update('exam_heads',$params);
           } catch (Exception $ex) {
             throw new Exception('Exam_Heads_model model : Error in update_exam_Heads function - ' . $ex);
           }  
       }
     /* 
          * function to delete exam_Heads 
      */
       function delete_exam_Heads($exHeadID)
       {
          try{
              $this->db->where('exHeadID',$exHeadID);
              return $this->db->update('exam_heads',['statusID'=> 0,'modified_by' => $this->session->user_id]);
           } catch (Exception $ex) {
             throw new Exception('Exam_Heads_model model : Error in delete_exam_Heads function - ' . $ex);
           }  
       }
      /*
        * Get exam_Heads by  column name where not in particular id
      */ 
      function get_exam_Headsbyclm_name_not_id($clm_name,$clm_value,$where_cond)
      {
        try{
            $this->db->where('exHeadID!=', $where_cond);
           return $this->db->get_where('exam_heads',array($clm_name=>$clm_value))->row_array();
           } catch (Exception $ex) {
             throw new Exception('Exam_Heads_model model : Error in get_exam_Headsbyclm_name_not_id function - ' . $ex);
           }  
      }
     /*
        * Get All with associated tables join exam_Headscount 
      */ 
      function get_all_with_asso_exam_Heads_by_cat($column_name=null,$value_id=null,$params=array())
      {
        try{
          $query = $this->db->get(); 
            if($query->num_rows() != 0){
               return $query->result_array();
            }else{
                return false;
            }
           } catch (Exception $ex) {
             throw new Exception('Exam_Heads_model model : Error in get_all_with_asso_exam_Heads_by_cat function - ' . $ex);
           }  
      }
      /*
          * Get all exam_Heads_by_cat 
      */ 
      function get_all_exam_Heads_by_cat($column_name=null,$value_id=null,$params=array())
      {
        try{
              $this->db->order_by('exHeadID', 'desc');
              $this->db->where($column_name, $value_id);
              if(isset($params) && !empty($params)){
               $this->db->limit($params['limit'], $params['offset']);
              }
               return $this->db->get('exam_heads')->result_array();
           } catch (Exception $ex) {
             throw new Exception('Exam_Heads_model model : Error in get_all_exam_Heads_by_cat function - ' . $ex);
           }  
      } 
 }
