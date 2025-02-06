<?php 
class Attendance_students_model extends CI_Model 
{ 
    function __construct()
    {
        parent::__construct();
    }
  
      
    function get_attendance_students($attendID)
    {
      try{
            $this->db->select('a.*,b.fullname,c.class_name,c.class_id,d.section_name,d.section_id');
            $this->db->from('attendance_students a' );
            $this->db->join('student b', 'b.student_id=a.student_id','inner');
            $this->db->join('class c', 'c.class_id=b.class_id','inner');
            $this->db->join('section d', 'd.section_id=b.section_id','left');
            $this->db->where('a.attendID', $attendID);
            return $this->db->get()->row_array();
          } catch (Exception $ex) {
            throw new Exception('Attendance_students_model Model : Error in get_attendance_students function - ' . $ex);
          }  
    }
    /*
      * Get All attendance_students count 
    */ 
    function get_all_attendance_students_count()
    {
      try{
          $this->db->from('attendance_students');
          return $this->db->count_all_results();
          } catch (Exception $ex) {
            throw new Exception('Attendance_students_model model : Error in get_all_attendance_students_count function - ' . $ex);
          }  
    }
    /*
        * Get all attendance_students 
    */ 
    function get_all_attendance_students($params = array())
    {
      try{
            $this->db->order_by('attendID', 'desc');
            if(isset($params) && !empty($params)){
              $this->db->limit($params['limit'], $params['offset']);
            }
              return $this->db->get('attendance_students')->result_array();
          } catch (Exception $ex) {
            throw new Exception('Attendance_students_model model : Error in get_all_attendance_students function - ' . $ex);
          }  
    } 
    /*
        * function to add new attendance_students 
    */
    function add_attendance_students($params)
    {
      try{
        $this->db->insert('attendance_students',$params);
      return $this->db->insert_id();
          } catch (Exception $ex) {
            throw new Exception('Attendance_students_model model : Error in add_attendance_students function - ' . $ex);
          }  
    }
    /* 
        * function to update attendance_students 
    */
    function update_attendance_students($attendID,$params)
    {
      try{
          $this->db->where('attendID',$attendID);
      return $this->db->update('attendance_students',$params);
          } catch (Exception $ex) {
            throw new Exception('Attendance_students_model model : Error in update_attendance_students function - ' . $ex);
          }  
      }
    /* 
        * function to delete attendance_students 
    */
      function delete_attendance_students($attendID)
      {
      try{
            return $this->db->delete('attendance_students',array('attendID'=>$attendID));
          } catch (Exception $ex) {
            throw new Exception('Attendance_students_model model : Error in delete_attendance_students function - ' . $ex);
          }  
      }

    function get_student_attendance_date($class_id=0,$section_id=0,$date,$student_id=0)
    {
      try{

        $this->db->select('a.*,b.fullname,c.class_name,d.section_name');
        $this->db->from('attendance_students a' );
        $this->db->join('student b', 'b.student_id=a.student_id','inner');
        $this->db->join('class c', 'c.class_id=b.class_id','inner');
        $this->db->join('section d', 'd.section_id=b.section_id','left');
        $this->db->order_by('a.student_id', 'asc');
        if($class_id) $this->db->where('b.class_id', $class_id);
        if($section_id) $this->db->where('b.section_id', $section_id);
        if($student_id) $this->db->where('a.student_id', $student_id);
        $this->db->where('a.date',$date);
        $this->db->where('a.statusID', 1);
        $this->db->where('b.is_active', 1);
        return $this->db->get()->result_array();
      } catch (Exception $ex) {
        throw new Exception('Attendance_students_model model : Error in get_all_attendance_students function - ' . $ex);
      }  
    }
    
    
    function get_already_marked_studentIDs($class_id,$date)
    {
      try{
        $this->db->select('a.student_id');
        $this->db->from('attendance_students a' );
        $this->db->join('student b', 'b.student_id=a.student_id','inner');
        $this->db->where('b.class_id', $class_id);
        $this->db->where('a.date',$date);
        $this->db->where('a.statusID', 1);
        $this->db->where('b.is_active', 1);
        $result = $this->db->get()->result_array();
        $column_values = array_column($result, 'student_id');
        return  $column_values;

      } catch (Exception $ex) {
        throw new Exception('Attendance_students_model model : Error in get_already_marked_studentIDs function - ' . $ex);
      }  
  
   } 

  function get_students_for_attendance($session_id,$class_id,$section_id,$date)
  {
    $markedIDs = $this->get_already_marked_studentIDs($class_id,$date);

    $this->db->select('student_id,fullname');
    $this->db->from('student');
    $this->db->where('session_id', $session_id);
    $this->db->where('class_id', $class_id);
    $this->db->where('section_id', $section_id);
    $this->db->where('is_active', 1);
    if(!empty($markedIDs)) $this->db->where_not_in('student_id',$markedIDs);
    return  $this->db->get()->result_array();
  } 

  function get_attendance_by_student_id($student_id,$date)
  {
    $this->db->select('*');
    $this->db->from('attendance_students');
    $this->db->where('student_id', $student_id);
    $this->db->where('date', $date);
    $this->db->where('statusID', 1);
    return  $this->db->get()->result_array();
  } 

  function get_attendance_by_student_month($student_id,$date)
  {
    $this->db->select('*');
    $this->db->from('attendance_students');
    $this->db->where('student_id', $student_id);
    $this->db->where("DATE_FORMAT(date,'%Y-%m')", date("Y-m", strtotime($date)));
    $this->db->where('statusID', 1);
    return  $this->db->get()->result_array();
  } 

  function get_attendance_by_student_year($student_id,$date)
  {
    $this->db->select('*');
    $this->db->from('attendance_students');
    $this->db->where('student_id', $student_id);
    $this->db->where("DATE_FORMAT(date,'%m-%d')", $date);
    $this->db->where('statusID', 1);
    return  $this->db->get()->result_array();
  }
  
  function get_attendance_count_by_student_month($student_id,$date)
  {
    $this->db->select('*');
    $this->db->from('attendance_students');
    $this->db->where('student_id', $student_id);
    $this->db->where("DATE_FORMAT(date,'%Y-%m')", date("Y-m", strtotime($date)));
    $this->db->distinct('date');
    $this->db->where('statusID', 1);
    return $this->db->get()->result_array();
  } 

      
 }
