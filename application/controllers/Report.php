<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Report
 *
 * @author durga it
 */
class Report extends CI_Controller {

    //put your code here
    function __construct() {
        parent::__construct();
        $this->load->model('Report_model');
        $this->load->model('Clas_model');
        $this->load->model('Academic_year_model');
        $this->load->model('Attendance_students_model');
    }

    function studentInfoReport() {
        $data['all_class'] = $this->Clas_model->get_all_class();
        $data['all_sessions'] = $this->Academic_year_model->get_all_session();
        $data['_view'] = 'reports/student-information-report';
        $this->load->view('layouts/main', $data);
    }

    function getStudentInfoReport() {
        $class = $this->input->post('class');
        $section = $this->input->post('section');
        $academic_year = $this->input->post('academic_year');
        $data['fields'] = !empty($this->input->post('fields')) ? $this->input->post('fields') : array();
        $data['result'] = $this->Report_model->getStudentInfo($class, $section,$academic_year);
        $data['_view'] = 'reports/getstudent-info-report';
        $this->load->view('layouts/main', $data);
    }

    function studentReport() {
        $data['all_class'] = $this->Clas_model->get_all_class();
        $data['_view'] = 'reports/student-report';
        $this->load->view('layouts/main', $data);
    }

    function dxx() {
        $data['all_class'] = $this->Clas_model->get_all_class();
        $data['_view'] = 'reports/student-report';
        $this->load->view('layouts/main', $data);
    }

    function oldstudentReport() {
        $data['all_class'] = $this->Clas_model->get_all_class();
        $data['all_sessions'] = $this->Academic_year_model->get_all_session();
        $data['_view'] = 'reports/old-student-report';
        $this->load->view('layouts/main', $data);
    }

    function leavingCertificateReport() {
        $data['all_class'] = $this->Clas_model->get_all_class();
        $data['all_sessions'] = $this->Academic_year_model->get_all_session();
        $data['_view'] = 'reports/leaving-certificate';
        $this->load->view('layouts/main', $data);
    }

    function outStandingFeesReport() {
        $data['all_class'] = $this->Clas_model->get_all_class();
        $this->load->model('Academic_year_model');
        $data['session_data'] = $this->Academic_year_model->get_all_session();
        $data['_view'] = 'reports/outstanding-fees';
        $this->load->view('layouts/main', $data);
    }

    function allStudentReport() {
        $data['all_class'] = $this->Clas_model->get_all_class();
        $data['_view'] = 'reports/allstudentreport';
        $this->load->view('layouts/main', $data);
    }
    

    function getStudent() {
        $class = $this->input->post('class');
        $section = $this->input->post('section');

        $data['result'] = $this->Report_model->getStudent($class, $section);
        $data['_view'] = 'reports/get-stud-report';
        $this->load->view('layouts/main', $data);
    }

    function getOldStudent() {
        $class = $this->input->post('class');
        $section = $this->input->post('section');
        $academic_year = $this->input->post('academic_year');

        $data['result'] = $this->Report_model->getOldStudent($class, $section, $academic_year);
        $data['_view'] = 'reports/get-stud-report';
        $this->load->view('layouts/main', $data);
    }

    function getLeavingCertificate() {
        $class = $this->input->post('class');
        $section = $this->input->post('section');
        $academic_year = $this->input->post('academic_year');

        $data['result'] = $this->Report_model->getLeavingCertificate($class, $section, $academic_year);
        $data['_view'] = 'reports/get-stud-leaving-report';
        $this->load->view('layouts/main', $data);
    }

    function getoutstandingfees() {
        $class = $this->input->post('class');
        $section = $this->input->post('section');
        $academic_year = $this->input->post('academic_year');

        $data['result'] = $this->Report_model->getoutstandingfees($class, $section, $academic_year);
        $data['_view'] = 'reports/get-outstanding-fees';
        $this->load->view('layouts/main', $data);
    }

    function getallstudentfees() {
        $class = $this->input->post('class');
        $section = $this->input->post('section');
        $academic_year = $this->input->post('academic_year');

        $data['result'] = $this->Report_model->getallstudentsfeees($class, $section, $academic_year);
        $data['_view'] = 'reports/get-allstudentfessreport';
        $this->load->view('layouts/main', $data);
    }

    function paidfees() {
        $data['all_class'] = $this->Clas_model->get_all_class();
        $data['_view'] = 'reports/outstanding-fees';
        $data['_view'] = 'reports/paid-fees';
        $this->load->view('layouts/main', $data);
    }
    
    function getpaidfees(){
         $class = $this->input->post('class');
        $section = $this->input->post('section');
        $academic_year = $this->input->post('academic_year');

        $data['result'] = $this->Report_model->getpaidfees($class, $section, $academic_year);
        $data['_view'] = 'reports/get-paid-fees';
        $this->load->view('layouts/main', $data);
    }

    function payment() {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('from', 'From Date', 'required');
        $this->form_validation->set_rules('to', 'To Date', 'required');
        if ($this->form_validation->run() == true) {
            $from = $this->input->post('from');
            $to = $this->input->post('to');
            $this->load->model('Payment_log_model');
            $this->load->model('Academic_year_model');
            $data['payment_log'] = $this->Payment_log_model->get_all_payment_log_btween($from, $to);
            //print_r($data['payment_log']);die();
            $data['_view'] = 'reports/payment';
            $this->load->view('layouts/main', $data);
        } else {
            $data['_view'] = 'reports/payment-date-wise';
            $this->load->view('layouts/main', $data);
        }
    }

    function outstanding() {
        $this->load->model('Payment_model');
        $data['payments'] = $this->Payment_model->get_all_payments();

        $data['_view'] = 'reports/fees-pending';
        $this->load->view('layouts/main', $data);
    }
    
    function oldremainingfess() {
        //$this->load->model('Payment_model');
        $data['payments'] = $this->Report_model->get_all_old_remaining();

        $data['_view'] = 'reports/old_remaining';
        $this->load->view('layouts/main', $data);
    }
    
//--------------------------------------------------------------- new code-------------------------------------------------------------------------------------------------------//
function studentsOutstandingReport() {
    $data['all_class'] = $this->Clas_model->get_all_class();
    $data['_view'] = 'reports/section-outstanding-fees';
    $this->load->view('layouts/main', $data);
}

function getoutstandingfeesforsection() {
    $class = $this->input->post('class');
    $section = $this->input->post('section');
    
    $data['result'] = $this->Report_model->getAllSectionsOutstandingFees($class, $section, $academic_year);
    $data['_view'] = 'reports/get-section-outstanding-fee';
    $this->load->view('layouts/main', $data);
}


function getAllOutStandingFeesReport() {
    $data['all_class'] = $this->Clas_model->get_all_class();
    $data['_view'] = 'reports/get_final_outstanding_report';
    $this->load->view('layouts/main', $data);
}


function getalloutstandingfees() {
    $class = $this->input->post('class');
    $section = $this->input->post('section');
    
    $data['result'] = $this->Report_model->getallyearoutstandingfees($class, $section);
    $data['_view'] = 'reports/get-outstanding-fees-new';
    $this->load->view('layouts/main', $data);
}

//------Students Attendance Report
function students_attendance_report_old(){
    $this->load->model('Clas_model');
    $data['all_class'] = $this->Clas_model->get_all_class();

    $this->load->model('Section_model');
    $data['all_section'] = $this->Section_model->get_all_section();

    $this->load->model('Academic_year_model');
    $data['all_sessions'] = $this->Academic_year_model->get_all_session();

    $data['_view'] = 'reports/students_attendance_report';
    $this->load->view('layouts/main', $data);




    try{
        $data['noof_page'] = 0;
        $this->load->model('Academic_year_model');
        $data['all_sessions'] = $this->Academic_year_model->get_all_session();

        $data['attendance_student'] = $this->Attendance_Student_model->get_all_student_attendance();
  
        $this->load->model('Clas_model');
        $data['all_class'] = $this->Clas_model->get_all_class();

        

        if($this->input->get('session_id')!=null && $this->input->get('class_id')!= null && $this->input->get('section_id')!= null && $this->input->get('date')!= null)  
        {  
          $session_id = $this->input->get('session_id');
          $class_id = $this->input->get('class_id');
          $section_id = $this->input->get('section_id');
          $date = $this->input->get('date');
          
          $data['student_attendance'] = $this->Attendance_Student_model->get_student_attendance_with_session_class_section($session_id,$class_id,$section_id,$date);
         
          $this->load->model('Section_model');

          $data['all_section'] = $this->Section_model->getSectionByClass($class_id);

        }

        
          
        $data['_view'] = 'attendance_student/index';
        $this->load->view('layouts/main',$data);
      } catch (Exception $ex) {
        throw new Exception('Exam_acadamicExams Controller : Error in index function - ' . $ex);
    }  
}
//Demo
function students_attendance_report(){
    try{
        $data['noof_page'] = 0;
        $this->load->model('Clas_model');
        $data['all_class'] = $this->Clas_model->get_all_class();

        $this->load->model('Section_model');
        $data['all_section'] = $this->Section_model->get_all_section();

        $this->load->model('Academic_year_model');
        $data['all_sessions'] = $this->Academic_year_model->get_all_session();

        if($this->input->get('acadamic_session')!=null && $this->input->get('class')!= null && $this->input->get('section_id')!= null && $this->input->get('date')!= null)  
        {  
          $session_id = $this->input->get('acadamic_session');
          $class_id = $this->input->get('class');
          $section_id = $this->input->get('section_id');
          $date = $this->input->get('date');
          
          $data['student_attendance'] = $this->Attendance_Student_model->get_student_attendance_with_session_class_section($session_id,$class_id,$section_id,$date);
         
          $this->load->model('Section_model');

          $data['all_section'] = $this->Section_model->getSectionByClass($class_id);

        }else if($this->input->get('acadamic_session')!=null && $this->input->get('class')!= null && $this->input->get('section_id')!= null && $this->input->get('select_month')!= null){
            $session_id = $this->input->get('acadamic_session');
            $class_id = $this->input->get('class');
            $section_id = $this->input->get('section_id');
            $month = $this->input->get('select_month');
            
            $data['student_attendance'] = $this->Report_model->students_attendance_report_by_month($session_id,$class_id,$section_id,$month);
            //$data['student_absent'] = $this->Report_model->students_attendance_report_by_month_absent($session_id,$class_id,$section_id,$month);
            $data['total_date_in_month'] = $this->Report_model->total_date_in_month($session_id,$class_id,$section_id,$month);
            
            $this->load->model('Section_model');

            $data['all_section'] = $this->Section_model->getSectionByClass($class_id);
        }else if($this->input->get('acadamic_session')!=null && $this->input->get('class')!= null && $this->input->get('section_id')!= null){
            $session_id = $this->input->get('acadamic_session');
            $class_id = $this->input->get('class');
            $section_id = $this->input->get('section_id');
            
            $data['student_attendance'] = $this->Report_model->students_attendance_report_by_year($session_id,$class_id,$section_id);
            $data['total_date_in_year'] = $this->Report_model->total_date_in_year($session_id,$class_id,$section_id);
            
            $this->load->model('Section_model');

            $data['all_section'] = $this->Section_model->getSectionByClass($class_id);
        }

        $data['_view'] = 'reports/students_attendance_report';
        $this->load->view('layouts/main', $data);
        
      } catch (Exception $ex) {
        throw new Exception('Exam_acadamicExams Controller : Error in index function - ' . $ex);
    }  
}


    function students_attendance_report_by_month(){

        $class_id = $this->input->post('class');
        $section_id = $this->input->post('section');
        $session_id = $this->input->post('acadamic_session');
        $month = $this->input->post('select_month');
        
       
        $result = $this->Report_model->students_attendance_report_by_month($session_id,$class_id, $section_id, $month);
        print_r($month);
        die();
        echo json_encode($result);
    }

    function students_attendance_report_by_date(){

        $class_id = $this->input->get('class');
        $section_id = $this->input->get('section');
        $session_id = $this->input->get('acadamic_session');
        $month = $this->input->get('select_month');
        
        print_r($month);
        die();
        $result = $this->Report_model->students_attendance_report_by_month($session_id,$class_id, $section_id, $month);
        echo json_encode($result);
    }

}

