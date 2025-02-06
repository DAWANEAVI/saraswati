<?php 

class Attendance_students extends CI_Controller{
 function __construct()
 {
       parent::__construct();
      $this->load->model('Attendance_students_model');
 } 

 /*
 * Listing of attendance_students
 */
public function index()
{
  try{
      $this->load->model('Academic_year_model');
      $data['academic_year_data'] = $this->Academic_year_model->check_active_session();

      if($this->input->get('date')!=null && $this->input->get('class_id')!= null && $this->input->get('section_id')!= null)  
      {  
        $date = $this->input->get('date');
        $class_id = $this->input->get('class_id');
        $section_id = $this->input->get('section_id');
        $session_id = $data['academic_year_data']['session_id'];

        $this->load->model('Section_model');
        $data['section'] = $this->Section_model->get_section($section_id);

        $this->load->model('Clas_model');
        $data['clas'] = $this->Clas_model->get_clas($class_id); 

        $data['attendance_students'] = $this->Attendance_students_model->get_student_attendance_date($class_id,$section_id,$date);
        //print_r($data['attendance_students']);die();
        
      }
      
      $this->load->model('Clas_model');
      $data['all_class'] = $this->Clas_model->get_all_class(); 

      $this->load->model('Section_model');
      if($this->input->get('class_id') != null){
        $data['all_section'] = $this->Section_model->getSectionByClass($this->input->get('class_id'));
      }
  
      $data['_view'] = 'attendance_students/index';
      $this->load->view('layouts/main',$data);
    } catch (Exception $ex) {
      throw new Exception('Attendance_students Controller : Error in index function - ' . $ex);
  }  
}
 /*
  * Adding a new attendance_students
  */
 function add($class_id,$section_id,$date)
 {  
  try{
    $this->load->model('Academic_year_model');
    $data['academic_year_data'] = $this->Academic_year_model->check_active_session();
    $session_id = $data['academic_year_data']['session_id'];

    $this->load->model('Student_model');
    $data['students'] = $this->Student_model->getStudentBySessionClassAndSection($session_id,$class_id,$section_id);

    $data['already_added'] = $this->Attendance_students_model->get_already_marked_studentIDs($class_id,$date);

    $this->load->model('Section_model');
    $data['section'] = $this->Section_model->get_section($section_id);

    $this->load->model('Clas_model');
    $data['clas'] = $this->Clas_model->get_clas($class_id);

    $data['date'] = $date;

    $data['_view'] = 'attendance_students/add';
    $this->load->view('layouts/main',$data);
  } catch (Exception $ex) {
    throw new Exception('Attendance_students Controller : Error in add function - ' . $ex);
  }  
 } 
 
 function add_attendance_process()
 {  
  try{
      $date = $this->input->post('date');
      $class_id = $this->input->post('class_id');
      $section_id = $this->input->post('section_id');
      $students = $this->input->post('studentIDs');
      foreach ($students as $key => $value) {
        $params = array(
          'student_id'=> $value,
          'date'=> $date,
          'attendance'=> $this->input->post('attendacne'.$value) ? $this->input->post('attendacne'.$value):0,
          'remarks'=> "",
          'created_by' => $this->session->user_id,
          'statusID'=> 1,
        );
        //print_r($params);die();
        $this->Attendance_students_model->add_attendance_students($params);
      }
      $this->session->set_flashdata('alertType','success' );
      $this->session->set_flashdata('message','Attendance Added Successfully.' );
      redirect('Attendance_students/index?class_id='.$class_id.'&section_id='.$section_id.'&date='.$date);
  } catch (Exception $ex) {
    throw new Exception('Attendance_students Controller : Error in add function - ' . $ex);
  }  
 }  
  /*
  * Editing a attendance_students
 */
  public function edit($attendID)
  {   
    try{
      $data['attendance_students'] = $this->Attendance_students_model->get_attendance_students($attendID);
      if(isset($data['attendance_students']['attendID']))
        {   
        $data['_view'] = 'attendance_students/edit';
        $this->load->view('layouts/main',$data);
        }
    else
      show_error('The attendance_students you are trying to edit does not exist.');
    } catch (Exception $ex) {
      throw new Exception('Attendance_students Controller : Error in edit function - ' . $ex);
    }  
  }

  public function edit_attendance_process($attendID)
  {   
  try{
      $data['attendance_students'] = $this->Attendance_students_model->get_attendance_students($attendID);
      if(isset($data['attendance_students']['attendID']))
      {
        $params = array(
          'attendance'=> $this->input->post('attendance'),
          'modified_by'=> $this->session->user_id,
        );
              
        $this->Attendance_students_model->update_attendance_students($attendID,$params);
        $this->session->set_flashdata('alertType','success' );
        $this->session->set_flashdata('message','Attendance Added Successfully.' );
        redirect('Attendance_students/index?class_id='.$data['attendance_students']['class_id'].'&section_id='.$data['attendance_students']['section_id'].'&date='.$data['attendance_students']['date']);
  }
  else
  show_error('The attendance_students you are trying to edit does not exist.');
  } catch (Exception $ex) {
    throw new Exception('Attendance_students Controller : Error in edit function - ' . $ex);
  }  
  }
  /*
  * Deleting attendance_students
  */
  function remove($attendID)
   {
    try{
      $attendance_students = $this->Attendance_students_model->get_attendance_students($attendID);
  // check if the attendance_students exists before trying to delete it
       if(isset($attendance_students['attendID']))
       {
         $this->Attendance_students_model->delete_attendance_students($attendID);
             $this->session->set_flashdata('alert_msg','<div class="alert alert-success text-center">Succesfully Removed.</div>');
           redirect('attendance_students/index');
       }
       else
       show_error('The attendance_students you are trying to delete does not exist.');
  } catch (Exception $ex) {
    throw new Exception('Attendance_students Controller : Error in remove function - ' . $ex);
  }  
  }
  /*
  * View more a attendance_students
 */
 public function view_more($attendID)
 {   
try{
   $data['attendance_students'] = $this->Attendance_students_model->get_attendance_students($attendID);
     if(isset($data['attendance_students']['attendID']))
      {
              $data['_view'] = 'attendance_students/view_more';
              $this->load->view('layouts/main',$data);
      }
      else
        show_error('The attendance_students you are trying to view more does not exist.');
    } catch (Exception $ex) {
    throw new Exception('Attendance_students Controller : Error in View more function - ' . $ex);
  }  
} 
 /*
* Listing of attendance_students
 */
public function search_by_clm()
{
    $column_name= $this->input->post('column_name');
    $value_id= $this->input->post('value_id');
     $data['noof_page'] = 0;
     $params = array();
    $data['attendance_students'] = $this->Attendance_students_model->get_all_attendance_students_by_cat($column_name,$value_id);
      $data['_view'] = 'attendance_students/index';
      $this->load->view('layouts/main',$data);
}
 /*
* get search values by column- attendance_students
 */
public function get_search_values_by_clm()
{
    $clm_name= $this->input->post('clm_name');
    $value= $this->input->post('value');
    $id= $this->input->post('id');
        $params = array(
        $clm_name=>$value,
        );
           $this->Attendance_students_model->update_attendance_students($id,$params);
   $data['noof_page'] = 0;
  $data['attendance_students'] = $this->Attendance_students_model->get_all_attendance_students();
  $this->load->view('attendance_students/index',$data);
}

public function attendanceMonthlyReport()
{
  try{
      $this->load->model('Academic_year_model');
      $data['academic_year_data'] = $this->Academic_year_model->check_active_session();
      $data['months'] = array(1 => 'January', 2 => 'February', 3 => 'March', 4 => 'April', 5 => 'May', 6 => 'June', 7 => 'July', 8 => 'August', 9 => 'September', 10 => 'October', 11 => 'November', 12 => 'December');


      if($this->input->get('month')!=null && $this->input->get('class_id')!= null && $this->input->get('section_id')!= null)  
      {  
        $date =$this->input->get('month');
        if($date < 10){
          $date = '0'.$date;
        }

        $date = $date.'-'.$this->input->get('year');
        $sessionArray = explode("-",$data['academic_year_data']['session']);
        if($date > 04){
          $date = '01-'.$date.'-'.$sessionArray[0];
        }else{  
          $date = '01-'.$date.'20'.$sessionArray[1];
        }

        $class_id = $this->input->get('class_id');
        $section_id = $this->input->get('section_id');
        $session_id = $data['academic_year_data']['session_id'];

        $this->load->model('Section_model');
        $data['section'] = $this->Section_model->get_section($section_id);

        $this->load->model('Clas_model');
        $data['clas'] = $this->Clas_model->get_clas($class_id); 

        $year = date("Y", strtotime($date));
        $month = date("m", strtotime($date));
        $days = cal_days_in_month(CAL_GREGORIAN, $month, $year);
        //print_r($days);die();
        $sundays = $this->countSundaysInMonth($month, $year);

        // total holidays calculation
        $this->load->model('Attendance_holidays_model');
        $holidayResult = $this->Attendance_holidays_model->get_all_attendance_holidays_by_month($session_id,$date);
        $public_holiday_count = empty($holidayResult) ? 0 :count($holidayResult);
        $public_holiday_count = $sundays + $public_holiday_count;
        $working_days = $days - $public_holiday_count;

        $this->load->model('Student_model');
        $classStudents = $this->Student_model->getStudentBySessionClassAndSection($session_id,$class_id,$section_id);

        $studentAttendance = array();
        // get attendance count by student
        foreach($classStudents as $key => $student){
          $student_id = $student['student_id'];
          $attendanceResult = $this->Attendance_students_model->get_attendance_count_by_student_month($student_id,$date);

          if(!empty($attendanceResult)){

            $present = !empty(array_count_values(array_column($attendanceResult, 'attendance'))[1]) ? array_count_values(array_column($attendanceResult, 'attendance'))[1] : 0;
            $absent = !empty(array_count_values(array_column($attendanceResult, 'attendance'))[0]) ? array_count_values(array_column($attendanceResult, 'attendance'))[0] : 0;
            $onleave = !empty(array_count_values(array_column($attendanceResult, 'attendance'))[2]) ? array_count_values(array_column($attendanceResult, 'attendance'))[2] : 0;
      
            $total_attendance_added_days = $present + $absent + $onleave;
          }else{
            $present = 0;
            $absent = 0;
            $onleave = 0;
            $total_attendance_added_days = 0;
          }
          
          $studentAttendance[$key] = array(
            'student_id' => $student_id,
            'fullname' => $student['fullname'],
            'present' => $present,
            'absent' => $absent,
            'onleave' => $onleave,
            'total_absent' => $absent + $onleave,
            'total_attendance_added_days' => $total_attendance_added_days,
            'working_days' => $working_days,
            'public_holiday_count' => $public_holiday_count,
            'total_days' => $days,
          );

        }

        $data['studentAttendance'] = $studentAttendance;
        
      }
      
      $this->load->model('Clas_model');
      $data['all_class'] = $this->Clas_model->get_all_class(); 

      $this->load->model('Section_model');
      if($this->input->get('class_id') != null){
        $data['all_section'] = $this->Section_model->getSectionByClass($this->input->get('class_id'));
      }
  
      $data['_view'] = 'attendance_students/monthlyReport';
      $this->load->view('layouts/main',$data);
    } catch (Exception $ex) {
      throw new Exception('Attendance_students Controller : Error in index function - ' . $ex);
  }  
}

function countSundaysInMonth($month, $year) {
  $sundays = 0;
  $daysInMonth = cal_days_in_month(CAL_GREGORIAN, $month, $year); // Get number of days in the month
  
  for ($day = 1; $day <= $daysInMonth; $day++) {
    $date = date('w', strtotime("$year-$month-$day")); // Get day of the week (0 = Sunday)
    if ($date == 0) {
      $sundays++;
    }
  }
  return $sundays;
}

}
