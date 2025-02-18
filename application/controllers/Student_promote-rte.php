<?php

/*
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */

class Student_promote extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('Student_promote_model');
        $this->load->model('Payment_model');
    }

    /*
     * Listing of student_promote
     */

    function index() {
        $data['student_promote'] = $this->Student_promote_model->get_all_student_promote();

        $data['_view'] = 'student_promote/index';
        $this->load->view('layouts/main', $data);
    }

    /*
     * Adding a new student_promote
     */

    function add() {
        $this->load->library('form_validation');

        $this->form_validation->set_rules('class', 'Class', 'required');
        $this->form_validation->set_rules('section', 'Section', 'required');
//        $this->form_validation->set_rules('student', 'Student', 'required');
        $this->form_validation->set_rules('section', 'Section', 'required');
        $this->form_validation->set_rules('class_new', 'New Class', 'required');
        $this->form_validation->set_rules('section_new', 'New Section', 'required');

        if ($this->form_validation->run()) {
            $stud = $this->input->post('stud');
            foreach ($stud as $k => $v) {
                $this->load->model('Student_model');
                $old_academic_year = $this->Student_model->getAcademicYear($v);
                $academic_year = explode('-', $old_academic_year->academic_year);
                $year = $academic_year;
                $academic_year[0] ++;
                $academic_year[1] ++;
                $new_academic_year = implode('-', $academic_year);
                $old_academic_year = implode('-', $year);
                $params = array(
                    'student_id' => $v,
                    'previous_class_id' => $this->input->post('class'),
                    'new_class_id' => $this->input->post('class_new'),
                    'section_id' => $this->input->post('section_new'),
                    'promotion_date' => date('Y-m-d H:i:s'),
                    'old_academic_year'=>$old_academic_year,
                    'new_academic_year'=>$new_academic_year,
                );
                $student_promote_id = $this->Student_promote_model->add_student_promote($params);
               

                $student_param = array(
                    'class_id' => $this->input->post('class_new'),
                    'section_id' => $this->input->post('section_new'),
                    'academic_year' => $new_academic_year,
                );

                $this->Student_model->promote_student($v, $student_param);
                $this->load->model('Fee_model');
                $fees = $this->Fee_model->getTotalFeeByClass($this->input->post('class_new'));

                $payment_parameter = array(
                    'student_id' => $v,
                    'academic_year' => $new_academic_year,
                    'total_amount' => $fees->total_amount,
                    'paid_amount' => 0,
                );
                $payment_id = $this->Payment_model->add_payment($payment_parameter);
            }







            redirect('student_promote/index');
        } else {
            $this->load->model('Student_model');
            $data['all_student'] = $this->Student_model->get_all_student();

            $this->load->model('Clas_model');
            $data['all_class'] = $this->Clas_model->get_all_class();
            $data['all_class'] = $this->Clas_model->get_all_class();

            $this->load->model('Section_model');
            $data['all_section'] = $this->Section_model->get_all_section();

            $data['_view'] = 'student_promote/add';
            $this->load->view('layouts/main', $data);
        }
    }

    /*
     * Editing a student_promote
     */

    function edit($promotion_id) {
        // check if the student_promote exists before trying to edit it
        $data['student_promote'] = $this->Student_promote_model->get_student_promote($promotion_id);

        if (isset($data['student_promote']['promotion_id'])) {
            $this->load->library('form_validation');

            $this->form_validation->set_rules('student_id', 'Student Id', 'required');
            $this->form_validation->set_rules('previous_class_id', 'Previous Class Id', 'required');
            $this->form_validation->set_rules('new_class_id', 'New Class Id', 'required');
            $this->form_validation->set_rules('section_id', 'Section Id', 'required');

            if ($this->form_validation->run()) {
                $params = array(
                    'student_id' => $this->input->post('student_id'),
                    'previous_class_id' => $this->input->post('previous_class_id'),
                    'new_class_id' => $this->input->post('new_class_id'),
                    'section_id' => $this->input->post('section_id'),
                );

                $this->Student_promote_model->update_student_promote($promotion_id, $params);
                $this->load->model('Fee_model');
                $this->load->model('Payment_model');
                $fees = $this->Fee_model->getTotalFeeByClass($this->input->post('new_class_id'));
                $student = $this->Payment_model->getMaxPaymentIdByStudent($this->input->post('student_id'));
                $payment_id = $student->payment_id;
                $payment_parameter = array(
                    'total_amount' => $fees->total_amount,
                );
                $this->Payment_model->updatePaymentPromotedEdit($payment_id, $payment_parameter);


                $student_param = array(
                    'class_id' => $this->input->post('new_class_id'),
                    'section_id' => $this->input->post('section_id'),
                );
                $this->load->model('Student_model');
                $this->Student_model->promote_student($this->input->post('student_id'), $student_param);

                redirect('student_promote/index');
            } else {
                $this->load->model('Student_model');
                $data['all_student'] = $this->Student_model->get_all_student();

                $this->load->model('Clas_model');
                $data['all_class'] = $this->Clas_model->get_all_class();
                $data['all_class'] = $this->Clas_model->get_all_class();

                $this->load->model('Section_model');
                $data['all_section'] = $this->Section_model->get_all_section();

                $data['_view'] = 'student_promote/edit';
                $this->load->view('layouts/main', $data);
            }
        } else
            show_error('The student_promote you are trying to edit does not exist.');
    }

    /*
     * Deleting student_promote
     */

    function remove($promotion_id) {
        $student_promote = $this->Student_promote_model->get_student_promote($promotion_id);

        // check if the student_promote exists before trying to delete it
        if (isset($student_promote['promotion_id'])) {
            $this->Student_promote_model->delete_student_promote($promotion_id);
            redirect('student_promote/index');
        } else
            show_error('The student_promote you are trying to delete does not exist.');
    }

}
