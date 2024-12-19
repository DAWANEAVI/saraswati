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
    }

    function studentReport() {
        $data['all_class'] = $this->Clas_model->get_all_class();
        $data['_view'] = 'reports/student-report';
        $this->load->view('layouts/main', $data);
    }

    function oldstudentReport() {
        $data['all_class'] = $this->Clas_model->get_all_class();
        $data['_view'] = 'reports/old-student-report';
        $this->load->view('layouts/main', $data);
    }

    function leavingCertificateReport() {
        $data['all_class'] = $this->Clas_model->get_all_class();
        $data['_view'] = 'reports/leaving-certificate';
        $this->load->view('layouts/main', $data);
    }

    function outStandingFeesReport() {
        $data['all_class'] = $this->Clas_model->get_all_class();
        $data['_view'] = 'reports/outstanding-fees';
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
            $data['payment_log'] = $this->Payment_log_model->get_all_payment_log_btween($from, $to);
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

}
