<?php 
/*
   Generated by Manuigniter v2.0 
   www.manuigniter.com
*/
class Exam_studentPapers_model extends CI_Model 
{ 
     function __construct()
      {
          parent::__construct();
      }

      function get_exam_result($examID,$class_id,$paperID,$student_id)
      {
        try{
             return $this->db->get_where('exam_studentPapers',array('examID'=>$examID,'class_id'=>$class_id,'paperID'=>$paperID,'student_id'=>$student_id,'statusID'=>1))->row_array();
           } catch (Exception $ex) {
             throw new Exception('Exam_studentPapers_model : Error in get_exam_studentPapers function - ' . $ex);
           }  
      }

      /*
        * Get exam_studentPapers by studPaperID 
      */ 
      function get_exam_studentPapers($studPaperID)
      {
        try{
           return $this->db->get_where('exam_studentPapers',array('studPaperID'=>$studPaperID))->row_array();
           } catch (Exception $ex) {
             throw new Exception('Exam_studentPapers_model Model : Error in get_exam_studentPapers function - ' . $ex);
           }  
      }
      /*
        * Get exam_studentPapers by  column name
      */ 
      function get_exam_studentPapersbyclm_name($clm_name,$clm_value)
      {
        try{
           return $this->db->get_where('exam_studentPapers',array($clm_name=>$clm_value))->row_array();
           } catch (Exception $ex) {
             throw new Exception('Exam_studentPapers_model Madel : Error in get_exam_studentPapersbyclm_name function - ' . $ex);
           }  
      }
     /*
        * Get All exam_studentPapers count 
      */ 
      function get_all_exam_studentPapers_count()
      {
        try{
           $this->db->from('exam_studentPapers');
           return $this->db->count_all_results();
           } catch (Exception $ex) {
             throw new Exception('Exam_studentPapers_model model : Error in get_all_exam_studentPapers_count function - ' . $ex);
           }  
      }
     /*
        * Get All with associated tables join exam_studentPaperscount 
      */ 
      function get_all_with_asso_exam_studentPapers()
      {
        try{
          $query = $this->db->get(); 
            if($query->num_rows() != 0){
               return $query->result_array();
            }else{
                return false;
            }
           } catch (Exception $ex) {
             throw new Exception('Exam_studentPapers_model model : Error in get_all_with_asso_exam_studentPapers function - ' . $ex);
           }  
      }
      /*
          * Get all exam_studentPapers 
      */ 
      function get_all_exam_studentPapers($paperID,$examID,$class_id,$section_id)
      {
        try{
          $this->db->select('a.*,b.fullname');
          $this->db->from('exam_studentPapers a' );
          $this->db->join('student b', 'b.student_id=a.student_id','left');
          //$this->db->join('exam_subjectPaper c', 'c.paperID=a.paperID','left');
          //$this->db->join('academic_session d', 'd.session_id=a.session_id','left');
          $this->db->where('a.paperID',$paperID);
          $this->db->where('a.examID',$examID);
          $this->db->where('a.class_id',$class_id);
          //$this->db->where('b.session_id',$session_id);
          $this->db->where('b.section_id',$section_id);
          $this->db->where('a.statusID',1);
          return $this->db->get()->result_array(); 
        } catch (Exception $ex) {
          throw new Exception('Exam_studentPapers_model model : Error in get_all_exam_studentPapers function - ' . $ex);
        }  
  
      } 

      function get_already_evaluated_studentIDs($examID,$paperID)
      {
        try{
          $this->db->select('student_id');
          $this->db->from('exam_studentPapers');
          $this->db->where('examID',$examID);
          $this->db->where('paperID',$paperID);
          $this->db->where('statusID',1);
          $result = $this->db->get()->result_array();
          $column_values = array_column($result, 'student_id');
          return  $column_values;
        } catch (Exception $ex) {
          throw new Exception('Exam_studentPapers_model model : Error in get_evaluated_record function - ' . $ex);
        }  
  
      } 

      function get_evaluated_record($studPaperID)
      {
        try{
          $this->db->select('a.*,b.fullname');
          $this->db->from('exam_studentPapers a' );
          $this->db->join('student b', 'b.student_id=a.student_id','left');
          $this->db->where('a.studPaperID',$studPaperID);
          $this->db->where('a.statusID',1);
          return $this->db->get()->row_array(); 
        } catch (Exception $ex) {
          throw new Exception('Exam_studentPapers_model model : Error in get_evaluated_record function - ' . $ex);
        }  
  
      } 

      function edit_evaluation_by_student($studPaperID,$params)
      {
        try{
             $this->db->where('studPaperID',$studPaperID);
             return $this->db->update('exam_studentPapers',$params);
           } catch (Exception $ex) {
             throw new Exception('Exam_studentPapers_model model : Error in edit_evaluation_by_student function - ' . $ex);
           }  
      }
      /*
         * function to add new exam_studentPapers 
      */
      function add_exam_studentPapers($params)
      {
        try{
          $this->db->insert('exam_studentPapers',$params);
          return $this->db->insert_id();
        } catch (Exception $ex) {
          throw new Exception('Exam_studentPapers_model model : Error in add_exam_studentPapers function - ' . $ex);
        }  
      }

      

      /* 
          * function to update exam_studentPapers 
      */
      function update_exam_studentPapers($studPaperID,$params)
      {
        try{
            $this->db->where('studPaperID',$studPaperID);
        return $this->db->update('exam_studentPapers',$params);
           } catch (Exception $ex) {
             throw new Exception('Exam_studentPapers_model model : Error in update_exam_studentPapers function - ' . $ex);
           }  
       }
     /* 
          * function to delete exam_studentPapers 
      */
       function delete_exam_studentPapers($studPaperID)
       {
        try{
             return $this->db->delete('exam_studentPapers',array('studPaperID'=>$studPaperID));
           } catch (Exception $ex) {
             throw new Exception('Exam_studentPapers_model model : Error in delete_exam_studentPapers function - ' . $ex);
           }  
       }
      /*
        * Get exam_studentPapers by  column name where not in particular id
      */ 
      function get_exam_studentPapersbyclm_name_not_id($clm_name,$clm_value,$where_cond)
      {
        try{
            $this->db->where('studPaperID!=', $where_cond);
           return $this->db->get_where('exam_studentPapers',array($clm_name=>$clm_value))->row_array();
           } catch (Exception $ex) {
             throw new Exception('Exam_studentPapers_model model : Error in get_exam_studentPapersbyclm_name_not_id function - ' . $ex);
           }  
      }
     /*
        * Get All with associated tables join exam_studentPaperscount 
      */ 
      function get_all_with_asso_exam_studentPapers_by_cat($column_name=null,$value_id=null,$params=array())
      {
        try{
          $query = $this->db->get(); 
            if($query->num_rows() != 0){
               return $query->result_array();
            }else{
                return false;
            }
           } catch (Exception $ex) {
             throw new Exception('Exam_studentPapers_model model : Error in get_all_with_asso_exam_studentPapers_by_cat function - ' . $ex);
           }  
      }
      /*
          * Get all exam_studentPapers_by_cat 
      */ 
      function get_all_exam_studentPapers_by_cat($column_name=null,$value_id=null,$params=array())
      {
        try{
              $this->db->order_by('studPaperID', 'desc');
              $this->db->where($column_name, $value_id);
              if(isset($params) && !empty($params)){
               $this->db->limit($params['limit'], $params['offset']);
              }
               return $this->db->get('exam_studentPapers')->result_array();
           } catch (Exception $ex) {
             throw new Exception('Exam_studentPapers_model model : Error in get_all_exam_studentPapers_by_cat function - ' . $ex);
           }  
      } 

      function get_exam_parameters($session_id,$class_id,$student_id)
      {
        try{
             return $this->db->get_where('exam_parameters',array('session_id'=>$session_id,'class_id'=>$class_id,'student_id'=>$student_id,'statusID'=>1))->row_array();
           } catch (Exception $ex) {
             throw new Exception('Exam_studentPapers_model : Error in get_exam_studentPapers function - ' . $ex);
           }  
      }

      function get_already_weighted_studentIDs($session_id,$class_id)
      {
        try{
          $this->db->select('student_id');
          $this->db->from('exam_parameters');
          $this->db->where('session_id',$session_id);
          $this->db->where('class_id',$class_id);
          $this->db->where('statusID',1);
          $result = $this->db->get()->result_array();
          $column_values = array_column($result, 'student_id');
          return  $column_values;
        } catch (Exception $ex) {
          throw new Exception('Exam_studentPapers_model model : Error in get_already_weighted_studentIDs function - ' . $ex);
        }  
      } 

      function add_attendance_weight_and_height($params)
      {
        try{
          $this->db->insert('exam_parameters',$params);
          //print_r($this->db->last_query());die();
          return $this->db->insert_id();
        } catch (Exception $ex) {
          throw new Exception('Exam_studentPapers_model model : Error in add_attendance_weight_and_height function - ' . $ex);
        }  
      }

      function getAttendanceWeightList($session_id,$class_id,$section_id){
        try{
           $this->db->select('a.*,b.fullname');
           $this->db->from('exam_parameters a' );
           $this->db->join('student b', 'b.student_id=a.student_id','left');
           //$this->db->join('class c', 'c.class_id=a.class_id','left');
           $this->db->join('academic_session d', 'd.session_id=a.session_id','left');
           $this->db->where('a.session_id',$session_id);
           $this->db->where('a.class_id',$class_id);
           $this->db->where('b.section_id',$section_id);
           $this->db->where('a.statusID',1);
           return $this->db->get()->result_array(); 
        } catch (Exception $ex) {
          throw new Exception('Exam_studentPapers_model model : Error in getAttendanceWeightList function - ' . $ex);
        }  
      }

      function get_attendance_weight($paramID){
        try{
           $this->db->select('a.*,b.fullname');
           $this->db->from('exam_parameters a' );
           $this->db->join('student b', 'b.student_id=a.student_id','left');
           $this->db->where('a.paramID',$paramID);
           $this->db->where('a.statusID',1);
           return $this->db->get()->row_array(); 
        } catch (Exception $ex) {
          throw new Exception('Exam_studentPapers_model model : Error in getAttendanceWeightList function - ' . $ex);
        }  
      }

      function edit_attendance_weight_and_height($paramID,$params)
      {
        try{
             $this->db->where('paramID',$paramID);
             return $this->db->update('exam_parameters',$params);
           } catch (Exception $ex) {
             throw new Exception('Exam_studentPapers_model model : Error in edit_attendance_weight_and_height function - ' . $ex);
           }  
      }

      function total_date_in_year($session_id,$class_id, $section_id){
        $this->db->select('COUNT(DISTINCT(studAtt.date)) as totalDateInYear');
    
        $this->db->from('student_attendance studAtt' );
        $this->db->join('section s','studAtt.section_id=s.section_id','inner');
        $this->db->where('studAtt.session_id',$session_id);
        $this->db->where('studAtt.class_id',$class_id);
        $this->db->where('studAtt.section_id',$section_id);
        $this->db->where('studAtt.statusID',1);
    
        $query = $this->db->get();
        $row_values  = $query->row_array();
        return $row_values['totalDateInYear'];
    
        //$query = $this->db->get();
        //return $query->result();
    }
    function total_date_in_year_by_stud($session_id,$class_id, $section_id, $student_id){
      $this->db->select('COUNT(DISTINCT(studAtt.date)) as totalDateInYearByStud');
  
      $this->db->from('student_attendance studAtt' );
      $this->db->join('section s','studAtt.section_id=s.section_id','inner');
      $this->db->where('studAtt.session_id',$session_id);
      $this->db->where('studAtt.class_id',$class_id);
      $this->db->where('studAtt.section_id',$section_id);
      $this->db->where('studAtt.student_id',$student_id);
      $this->db->where('studAtt.attendance_status',1);
      $this->db->where('studAtt.statusID',1);
  
      $query = $this->db->get();
      $row_values  = $query->row_array();
      return $row_values['totalDateInYearByStud'];
  
      //$query = $this->db->get();
      //return $query->result();
  }
 }
