<?php 
/*
   Generated by Manuigniter v2.0 
   www.manuigniter.com
*/
class Exam_subjectPaper_model extends CI_Model 
{ 
     function __construct()
      {
          parent::__construct();
      }
      /*
        * Get exam_subjectPaper by paperID 
      */ 
      function check_recod($examID,$class_id,$subjectID,$session_id)
      {
        try{
           return $this->db->get_where('exam_subjectPaper',array('examID'=>$examID, 'class_id'=>$class_id, 'subjectID'=>$subjectID, 'session_id' => $session_id,'statusID' => 1))->row_array();
           } catch (Exception $ex) {
             throw new Exception('Subject Paper : Error in check record function - ' . $ex);
           }  
      }

      function get_subject_id_of_exam_class_and_session($examID,$class_id,$session_id){
        try{

           $this->db->select('subjectID');
           $this->db->from('exam_subjectPaper' );
           $this->db->where('examID',$examID);
           $this->db->where('class_id',$class_id);
           $this->db->where('session_id',$session_id);
           $this->db->where('statusID',1);
           $this->db->order_by('subjectID','asc');
           $query = $this->db->get(); 
           return $query->result_array();
          } catch (Exception $ex) {
            throw new Exception('Exam_subjectPaper_model model : Error in get_papers_of_exam_class_and_session function - ' . $ex);
          }  
      }

      function get_paper_id_by_session_subject_class_exam($session_id,$subjectID,$class_id,$examID)
      {
        try{
           return $this->db->get_where('exam_subjectPaper',array('session_id'=>$session_id,'subjectID'=>$subjectID,'class_id'=>$class_id,'examID'=>$examID,'statusID'=>1))->row_array();
           } catch (Exception $ex) {
             throw new Exception('Exam_subjectPaper_model Madel : Error in get_exam_subjectPaperbyclm_name function - ' . $ex);
           }  
      }

      function get_exam_subjectPaper_by_id($paperID)
      {
        try{
           $this->db->select('*');
           $this->db->from('exam_subjectPaper a' );
           
          //  $this->db->where('a.examID',$examID);
          //  $this->db->where('a.class_id',$class_id);
          //  $this->db->where('a.session_id',$session_id);
           
           $this->db->join('exam_subjects b', 'b.subjectID=a.subjectID','inner');
           $this->db->join('class c', 'c.class_id=a.class_id','inner');
           $this->db->join('exam_acadamicExams d', 'd.examID=a.examID','inner');
           $this->db->join('exam_heads e', 'e.exHeadID=d.exHeadID','inner');
           $this->db->where('a.paperID', $paperID);
           $this->db->where('a.statusID',1);
           return $this->db->get()->result_array(); 
           } catch (Exception $ex) {
             throw new Exception('Exam_subjectPaper_model Model : Error in get_exam_subjectPaper function - ' . $ex);
           }  
      }

      function get_papers_of_exam_class_and_session($examID,$class_id,$session_id){
        try{
          $this->db->select('*,a.evaluation');
          $this->db->from('exam_subjectPaper a' );
           $this->db->join('exam_subjects b', 'b.subjectID=a.subjectID','inner');
           $this->db->join('class c', 'c.class_id=a.class_id','inner');
           $this->db->join('exam_acadamicExams d', 'd.examID=a.examID','inner');
           $this->db->join('exam_heads e', 'e.exHeadID=d.exHeadID','inner');
           $this->db->where('a.examID',$examID);
           $this->db->where('a.class_id',$class_id);
           $this->db->where('a.session_id',$session_id);
           $this->db->where('b.statusID',1);
           $this->db->where('a.statusID',1);
           $this->db->order_by('a.subjectID','asc');
           $query = $this->db->get(); 
           if($query->num_rows() != 0){
              return $query->result_array();
           }else{
               return false;
           }
          } catch (Exception $ex) {
            throw new Exception('Exam_subjectPaper_model model : Error in get_papers_of_exam_class_and_session function - ' . $ex);
          }  
      }

      function get_session_wise_exam_subjectPaper($session_id)
      {
        try{
           $this->db->select('*');
           $this->db->from('exam_subjectPaper a' );
            $this->db->join('exam_subjects b', 'b.subjectID=a.subjectID','inner');
            $this->db->join('class c', 'c.class_id=a.class_id','inner');
            $this->db->join('exam_acadamicExams d', 'd.examID=a.examID','inner');
            $this->db->join('exam_heads e', 'e.exHeadID=d.exHeadID','inner');
            $this->db->where('a.session_id',$session_id);
            $this->db->where('a.statusID',1);
          $query = $this->db->get(); 
            if($query->num_rows() != 0){
               return $query->result_array();
            }else{
                return false;
            }
           } catch (Exception $ex) {
             throw new Exception('Exam_subjectPaper_model model : Error in get_all_with_asso_exam_subjectPaper function - ' . $ex);
           }  
      }

      function get_exam_subjectPaper($paperID)
      {
        try{
           return $this->db->get_where('exam_subjectPaper',array('paperID'=>$paperID))->row_array();
           } catch (Exception $ex) {
             throw new Exception('Exam_subjectPaper_model Model : Error in get_exam_subjectPaper function - ' . $ex);
           }  
      }
      /*
        * Get exam_subjectPaper by  column name
      */ 
      function get_exam_subjectPaperbyclm_name($clm_name,$clm_value)
      {
        try{
           return $this->db->get_where('exam_subjectPaper',array($clm_name=>$clm_value))->row_array();
           } catch (Exception $ex) {
             throw new Exception('Exam_subjectPaper_model Madel : Error in get_exam_subjectPaperbyclm_name function - ' . $ex);
           }  
      }
     /*
        * Get All exam_subjectPaper count 
      */ 
      function get_all_exam_subjectPaper_count()
      {
        try{
           $this->db->from('exam_subjectPaper');
           $this->db->where('statusID',1);
           return $this->db->count_all_results();
           } catch (Exception $ex) {
             throw new Exception('Exam_subjectPaper_model model : Error in get_all_exam_subjectPaper_count function - ' . $ex);
           }  
      }
     /*
        * Get All with associated tables join exam_subjectPapercount 
      */ 
      function get_all_with_asso_exam_subjectPaper()
      {
        try{
           $this->db->select('*');
           $this->db->from('exam_subjectPaper a' );
            $this->db->join('exam_subjects b', 'b.subjectID=a.subjectID','inner');
            $this->db->join('class c', 'c.class_id=a.class_id','inner');
            $this->db->join('exam_heads d', 'd.exHeadID=a.examID','inner');
            $this->db->where('a.statusID',1);
          $query = $this->db->get(); 
            if($query->num_rows() != 0){
               return $query->result_array();
            }else{
                return false;
            }
           } catch (Exception $ex) {
             throw new Exception('Exam_subjectPaper_model model : Error in get_all_with_asso_exam_subjectPaper function - ' . $ex);
           }  
      }
      /*
          * Get all exam_subjectPaper 
      */ 
      function get_all_exam_subjectPaper($params = array())
      {
        try{
              $this->db->order_by('paperID', 'desc');
              if(isset($params) && !empty($params)){
               $this->db->limit($params['limit'], $params['offset']);
              }
               return $this->db->get('exam_subjectPaper')->result_array();
           } catch (Exception $ex) {
             throw new Exception('Exam_subjectPaper_model model : Error in get_all_exam_subjectPaper function - ' . $ex);
           }  
      } 
      /*
         * function to add new exam_subjectPaper 
      */
      function add_exam_subjectPaper($params)
      {
        try{
          $this->db->insert('exam_subjectPaper',$params);
        return $this->db->insert_id();
           } catch (Exception $ex) {
             throw new Exception('Exam_subjectPaper_model model : Error in add_exam_subjectPaper function - ' . $ex);
           }  
      }
      /* 
          * function to update exam_subjectPaper 
      */
      function update_exam_subjectPaper($paperID,$params)
      {
        try{
            $this->db->where('paperID',$paperID);
        return $this->db->update('exam_subjectPaper',$params);
           } catch (Exception $ex) {
             throw new Exception('Exam_subjectPaper_model model : Error in update_exam_subjectPaper function - ' . $ex);
           }  
       }
     /* 
          * function to delete exam_subjectPaper 
      */
       function delete_exam_subjectPaper($paperID)
       {
        try{
             $this->db->where('paperID',$paperID);
             return $this->db->update('exam_subjectPaper',['statusID'=> 0,'modified_by' => $this->session->user_id]);
           } catch (Exception $ex) {
             throw new Exception('Exam_subjectPaper_model model : Error in delete_exam_subjectPaper function - ' . $ex);
           }  
       }
      /*
        * Get exam_subjectPaper by  column name where not in particular id
      */ 
      function get_exam_subjectPaperbyclm_name_not_id($clm_name,$clm_value,$where_cond)
      {
        try{
            $this->db->where('paperID!=', $where_cond);
           return $this->db->get_where('exam_subjectPaper',array($clm_name=>$clm_value))->row_array();
           } catch (Exception $ex) {
             throw new Exception('Exam_subjectPaper_model model : Error in get_exam_subjectPaperbyclm_name_not_id function - ' . $ex);
           }  
      }
     /*
        * Get All with associated tables join exam_subjectPapercount 
      */ 
      function get_all_with_asso_exam_subjectPaper_by_cat($column_name=null,$value_id=null,$params=array())
      {
        try{
           $this->db->select('*');
           $this->db->from('exam_subjectPaper a  ' );
              //$this->db->where($column_name, $value_id);
            $this->db->join('exam_subjects b', 'b.subjectName=a. subjectID','left');
              $this->db->where('a.'.$column_name, $value_id);
            $this->db->join('class c', 'c.numeric_name=a. class_id','left');
              $this->db->where('a.'.$column_name, $value_id);
            $this->db->join('academic_session d', 'd.session=a. examID','left');
              $this->db->where('a.'.$column_name, $value_id);
          $query = $this->db->get(); 
            if($query->num_rows() != 0){
               return $query->result_array();
            }else{
                return false;
            }
           } catch (Exception $ex) {
             throw new Exception('Exam_subjectPaper_model model : Error in get_all_with_asso_exam_subjectPaper_by_cat function - ' . $ex);
           }  
      }
      /*
          * Get all exam_subjectPaper_by_cat 
      */ 
      function get_all_exam_subjectPaper_by_cat($column_name=null,$value_id=null,$params=array())
      {
        try{
              $this->db->order_by('paperID', 'desc');
              $this->db->where($column_name, $value_id);
              if(isset($params) && !empty($params)){
               $this->db->limit($params['limit'], $params['offset']);
              }
               return $this->db->get('exam_subjectPaper')->result_array();
           } catch (Exception $ex) {
             throw new Exception('Exam_subjectPaper_model model : Error in get_all_exam_subjectPaper_by_cat function - ' . $ex);
           }  
      } 
 }
