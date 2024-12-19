<?php

/*
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */

class Attendance_student extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('Attendance_Student_model');
        //$this->load->model('Payment_model');
    }

    /*
     * Listing of student_promote
     */

    function index() {

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

    /*
     * Adding Students attendance
     */
    function add_student_attendance() {
        $this->load->library('form_validation');

        $this->form_validation->set_rules('session_id', 'Session', 'required');
        $this->form_validation->set_rules('class_id', 'Class', 'required');
        $this->form_validation->set_rules('section_id', 'Section', 'required');
        $this->form_validation->set_rules('date_a', 'Date', 'required');
       
        if ($this->form_validation->run()) {
            $stud = $this->input->post('stud');

            $student_attendance = $this->Attendance_Student_model->get_all_student($this->input->post('session_id'),$this->input->post('class_id'),$this->input->post('section_id'));
            
            foreach ($student_attendance as $stud_att){
                
                    if(in_array($stud_att['student_id'],$stud)){
                        $params = array(
                            'student_id' => $stud_att['student_id'],
                            'class_id' => $this->input->post('class_id'),
                            'section_id' => $this->input->post('section_id'),
                            'session_id' => $this->input->post('session_id'),
                            'date' => $this->input->post('date_a'),
                            'attendance_status' => 1,
                            'statusID' => 1,
                            'created_by' => 1,
                            'created_at' => date('Y-m-d H:i:s'),
                        );
                        $student_attendance_id = $this->Attendance_Student_model->add_student_attendance($params);
                    }else{
                        $params = array(
                            'student_id' => $stud_att['student_id'],
                            'class_id' => $this->input->post('class_id'),
                            'section_id' => $this->input->post('section_id'),
                            'session_id' => $this->input->post('session_id'),
                            'date' => $this->input->post('date_a'),
                            'attendance_status' => 0,
                            'statusID' => 1,
                            'created_by' => 1,
                            'created_at' => date('Y-m-d H:i:s'),
                        );
                        $student_attendance_id = $this->Attendance_Student_model->add_student_attendance($params);
                    }
                        
                
            }
            
                $this->session->set_flashdata('alertType','success' );
                $this->session->set_flashdata('message','Students Attendance Added Successfully.' );
                redirect('attendance_student/index?session_id='.$this->input->post('session_id').'&class_id='.$this->input->post('class_id').'&section_id='.$this->input->post('section_id')."&date=".$this->input->post('date_a'));
                
            

        }else{

            $this->load->model('Clas_model');
            $data['all_class'] = $this->Clas_model->get_all_class();

            $this->load->model('Section_model');
            $data['all_section'] = $this->Section_model->get_all_section();

            $this->load->model('Academic_year_model');
            $data['all_sessions'] = $this->Academic_year_model->get_all_session();

            $this->load->model('Attendance_Student_model');
            $data['all_student'] = $this->Attendance_Student_model->get_all_student($this->input->get('session_id'), $this->input->get('class_id'), $this->input->get('section_id'));

            //print_r($this->input->get('date'));
            //die();
            $data['_view'] = 'attendance_student/add_student_attendance';
            $this->load->view('layouts/main', $data);
        }
    }

    //function edit($session_id, $class_id, $section_id, $date, $attendance_id)
    function edit($attendance_id)
    {   
        // check if the clas exists before trying to edit it
        $data['students_attendance'] = $this->Attendance_Student_model->get_student_attendance($attendance_id);
        
        if($data['students_attendance'] != null)
        {
            $this->load->library('form_validation');

			$this->form_validation->set_rules('session_id', 'Session', 'required');
            $this->form_validation->set_rules('class_id', 'Class', 'required');
            $this->form_validation->set_rules('section_id', 'Section', 'required');
            $this->form_validation->set_rules('date_a', 'Date', 'required');
            $this->form_validation->set_rules('stud_mark_attendance', 'Attendance', 'required');
		
			if($this->form_validation->run())     
            {   
                $params = array(
					'attendance_status' => $this->input->post('stud_mark_attendance'),
                );

                $this->Attendance_Student_model->update_attendance($attendance_id,$params);      
                $this->session->set_flashdata('alertType','success' );
                $this->session->set_flashdata('message','Students Attendance Updated Successfully.' );      
               
                redirect('attendance_student/index?session_id='.$this->input->post('session_id').'&class_id='.$this->input->post('class_id').'&section_id='.$this->input->post('section_id')."&date=".$this->input->post('date_a'));
            }
            else
            {
                $this->load->model('Clas_model');
                $data['all_class'] = $this->Clas_model->get_all_class();

                $this->load->model('Section_model');
                $data['all_section'] = $this->Section_model->get_all_section();

                $this->load->model('Academic_year_model');
                $data['all_sessions'] = $this->Academic_year_model->get_all_session();

                $data['_view'] = 'attendance_student/edit';
                $this->load->view('layouts/main',$data);
            }
        }
        else
            show_error('The attendance you are trying to edit does not exist.');
    } 

    /*
     * Add holiday
     */
    function add_holiday() {
        $this->load->library('form_validation');

        $this->form_validation->set_rules('holiday_name', 'Holiday Name', 'required');
        $this->form_validation->set_rules('holiday_date', 'Holiday Date', 'required');

        if ($this->form_validation->run()) {

            $data['holiday_name'] = $this->input->get('holiday_name');
            $data['holiday_date'] = $this->input->get('holiday_date');
            //print_r($data['student_payments']);die();

            $params = array(
				'holiday_name' => $this->input->post('holiday_name'),
				'holiday_date' => $this->input->post('holiday_date'),
            );
            
            $holiday_id = $this->Attendance_Student_model->add_holiday($params);
            redirect('Attendance_student/add_holiday');
        } 

        $data['_view'] = 'attendance_student/holiday';
        $this->load->view('layouts/main', $data);
    }
    
    
}