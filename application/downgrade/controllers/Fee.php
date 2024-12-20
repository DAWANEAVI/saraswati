<?php

/*
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */

class Fee extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('Fee_model');
    }

    /*
     * Listing of fees
     */

    function index() {
        $data['fees'] = $this->Fee_model->get_all_fees();
        $data['_view'] = 'fee/index';
        $this->load->view('layouts/main', $data);
    }

    /*
     * Adding a new fee
     */

    function add() {
        $this->load->library('form_validation');

        $this->form_validation->set_rules('fees_for[]', 'Fees For', 'required');
        $this->form_validation->set_rules('amount[]', 'Fees For', 'required');
        $this->form_validation->set_rules('class_id[]', 'Class Id', 'required');

        if ($this->form_validation->run()) {
            $classes = $this->input->post('class_id');
            $fees_for = $this->input->post('fees_for');
            $amount = $this->input->post('amount');
            // as iterating for each classes 
            foreach ($classes as $k => $v) {

                // as iterating for each fees type 
                foreach ($fees_for as $kk => $vv) {
                    $params = array(
                        'class_id' => $v,
                        'fees_for' => $vv,
                        'amount' => $amount[$kk],
                    );
                    $fee_id = $this->Fee_model->add_fee($params);
                }
            }

            redirect('fee/index');
        } else {
            $this->load->model('Clas_model');
            $data['all_class'] = $this->Clas_model->get_all_class();

            $data['_view'] = 'fee/add';
            $this->load->view('layouts/main', $data);
        }
    }

    /*
     * Editing a fee
     */

    function edit($class_id) {
        // check if the fee exists before trying to edit it
        $data['fee'] = $this->Fee_model->get_fee($class_id);
        if (count($data['fee'])>0) {
            $this->load->library('form_validation');

            $this->form_validation->set_rules('fees_for[]', 'Fees For', 'required');
            $this->form_validation->set_rules('amount[]', 'Amount', 'required|integer');
            $this->form_validation->set_rules('class_id', 'Class Id', 'required');

            if ($this->form_validation->run()) {
                $fees_for = $this->input->post('fees_for');
                $amount = $this->input->post('amount');
                $class_id = $this->input->post('class_id');
                $this->Fee_model->deleteClassFees($class_id);
                foreach ($fees_for as $k=>$v){
                $params = array(
                    'class_id' => $class_id,
                    'fees_for' => $v,
                    'amount' => $amount[$k],
                );
                $fee_id = $this->Fee_model->add_fee($params);
                }

                $this->Fee_model->update_fee($fees_id, $params);
                redirect('fee/index');
            } else {
                $this->load->model('Clas_model');
                $data['all_class'] = $this->Clas_model->get_all_class();

                $data['_view'] = 'fee/edit';
                $this->load->view('layouts/main', $data);
            }
        } else
            show_error('The fee you are trying to edit does not exist.');
    }

    /*
     * Deleting fee
     */

    function remove($class_id) {
        $fee = $this->Fee_model->get_fee($class_id);

        // check if the fee exists before trying to delete it
        if (isset($fee[0]['class_id'])) {
            $this->Fee_model->deleteClassFees($class_id);
            redirect('fee/index');
        } else
            show_error('The fee you are trying to delete does not exist.');
    }
    
    

}
