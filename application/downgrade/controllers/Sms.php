<?php

class Sms extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('Clas_model');
    }

    function sendToOne() {
        $this->load->library('form_validation');

        $this->form_validation->set_rules('student', 'Student', 'required');
        $this->form_validation->set_rules('msg', 'Message', 'required');
        if ($this->form_validation->run()) {
            
        } else {
            $data['_view'] = 'sms/add';
            $this->load->model('Clas_model');
            $data['all_class'] = $this->Clas_model->get_all_class();
            $this->load->view('layouts/main', $data);
        }
    }

    function sendBulk() {
       $data['_view'] = 'sms/bulk';
        $this->load->model('Clas_model');
        $data['all_class'] = $this->Clas_model->get_all_class();
        $this->load->view('layouts/main', $data);
    }
    
    function sendAll() {
         $data['_view'] = 'sms/all';
        $this->load->view('layouts/main', $data);
    }
    
    function increamentCounter(){
        $sms = $this->input->post('sms');
        $this->db->set('sms_send','sms_send+'.$sms,false);
        $this->db->update('web_data');
        $obj = new stdClass();
        $obj->status =true;
        echo json_encode($obj);
    }

}
