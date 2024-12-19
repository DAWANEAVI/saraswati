<?php

class Bonafide extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('Bonafide_model');
        $this->load->model('Student_model');
        $this->load->model('Clas_model');
        $this->load->model('Payment_model');
        $this->load->model('Section_model');
    }

    // Listing of bonafide certificates
    function index() {
        $data['bonafide_certificate'] = $this->Bonafide_model->get_all_bonafide_certificate();
        $data['_view'] = 'bonafide/index';
        $this->load->view('layouts/main', $data);
    }

    // Adding a new bonafide certificate
    function add() {
        $this->load->library('form_validation');

        $this->form_validation->set_rules('fullname', 'Full Name', 'required');
        $this->form_validation->set_rules('fathername', 'Father Name', 'required');
        $this->form_validation->set_rules('session', 'Session', 'required');
        $this->form_validation->set_rules('caste', 'Caste', 'required');
        $this->form_validation->set_rules('student_id', 'Student Id', 'required');
        $this->form_validation->set_rules('dob', 'Date Of Birth', 'required');

        if ($this->form_validation->run()) {
            $params = array(
                'student_id' => $this->input->post('student_id'),
                'bona_no' => 0,
                'fullname' => $this->input->post('fullname'),
                'fathername' => $this->input->post('fathername'),
                'session' => $this->input->post('session'),
                'caste' => $this->input->post('caste'),
                'class' => $this->input->post('class'),
                'dob' => $this->input->post('dob'),
                'date' => date('Y-m-d'),
                'created_by' => $this->session->user_id,
                'statusID' => 1,
            );

            $bonafide_id = $this->Bonafide_model->add_bonafide_certificate($params);
            $bona_param = array(
                'bona_no' => 'LBEHJCS-' . $bonafide_id,
            );
            $this->Bonafide_model->update_bonafide_certificate($bonafide_id, $bona_param);

            $this->session->set_flashdata('alertType', 'success');
            $this->session->set_flashdata('message', 'Bonafide Generated Successfully.');
            redirect('bonafide/view/' . $bonafide_id);
        } else {
            if ($this->input->get('student_id')) {
                $data['student_data'] = $this->Student_model->get_student($this->input->get('student_id'));
            }
            $data['all_class'] = $this->Clas_model->get_all_class();
            $data['_view'] = 'bonafide/add';
            $this->load->view('layouts/main', $data);
        }
    }

    // Editing a bonafide certificate
    function edit($bonafide_id) {
        $data['bonafide_certificate'] = $this->Bonafide_model->get_bonafide_certificate($bonafide_id);
        
        if (isset($data['bonafide_certificate']['bonafide_id'])) {
            $this->load->library('form_validation');

            $this->form_validation->set_rules('fullname', 'Full Name', 'required');
            $this->form_validation->set_rules('fathername', 'Father Name', 'required');
            $this->form_validation->set_rules('session', 'Session', 'required');
            $this->form_validation->set_rules('caste', 'Caste', 'required');
            $this->form_validation->set_rules('student_id', 'Student Id', 'required');
            $this->form_validation->set_rules('dob', 'Date Of Birth', 'required');

            if ($this->form_validation->run()) {
                $params = array(
                    'fullname' => $this->input->post('fullname'),
                    'fathername' => $this->input->post('fathername'),
                    'session' => $this->input->post('session'),
                    'caste' => $this->input->post('caste'),
                    'class' => $this->input->post('class'),
                    'dob' => $this->input->post('dob'),
                    'statusID' => 1,
                );

                $this->Bonafide_model->update_bonafide_certificate($bonafide_id, $params);

                $this->session->set_flashdata('alertType', 'success');
                $this->session->set_flashdata('message', 'Bonafide Edited Successfully.');
                redirect('bonafide/view/' . $bonafide_id);
            } else {
                $data['all_student'] = $this->Student_model->get_all_student();
                $data['_view'] = 'bonafide/edit';
                $this->load->view('layouts/main', $data);
            }
        } else {
            show_error('The bonafide certificate you are trying to edit does not exist.');
        }
    }

    // Deleting bonafide certificate
    function remove($bonafide_id) {
        $bonafide_certificate = $this->Bonafide_model->get_bonafide_certificate($bonafide_id);

        if (isset($bonafide_certificate['bonafide_id'])) {
            $this->Bonafide_model->delete_bonafide_certificate($bonafide_id);

            $this->session->set_flashdata('alertType', 'success');
            $this->session->set_flashdata('message', 'Bonafide Deleted Successfully.');
            redirect('bonafide/index');
        } else {
            show_error('The bonafide certificate you are trying to delete does not exist.');
        }
    }

    // Viewing a bonafide certificate
    function view($bonafide_id) {
        $data['bonafide_certificate'] = $this->Bonafide_model->get_bonafide_certificate($bonafide_id);
        $data['student'] = $this->Student_model->getStudentData($data['bonafide_certificate']['student_id']);
        $data['_view'] = 'bonafide/view';
        $this->load->view('layouts/main', $data);
    }

    // AJAX function to fetch sections based on selected class
    public function getSectionsByClass($class_id) {
        $class_id = $this->input->post('class_id');
        $this->load->model('Bonafide_model'); // Load the model
    $section = $this->Bonafide_model->getSectionsByClass($class_id); // Fetch sections from the model
    echo json_encode($section); // Return sections as JSON response
        
        if ($class_id) {
            $this->load->model('Clas_model');
            $section = $this->Clas_model->get_sections_by_class($class_id);

            // Output the sections as JSON
            echo json_encode($section);
        } else {
            echo json_encode([]);
        }
    }

// Controller Function to fetch students based on section ID
public function getStudentsBySection($section_id)
{
    $this->load->model('Bonafide_model'); // Load the model
    $student = $this->Bonafide_model->getStudentsBySection($section_id); // Fetch students from the model
    echo json_encode($student); // Return students as JSON response
}

}
