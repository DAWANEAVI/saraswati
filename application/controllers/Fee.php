<?php

/*
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */

class Fee extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('Fee_model');
        $this->load->model('Academic_year_model');
        $this->load->model('Clas_model');
    }

    /*
     * Listing of fees
     */
    function manage() {
        $data['session_data'] = $this->Academic_year_model->get_all_session();
        $data['_view'] = 'fee/session_list';
        $this->load->view('layouts/main', $data);
    }

    function index($session_id = 0) {
        if(!$session_id){
            $data['academic_year_data'] = $this->Academic_year_model->check_active_session();
            //print_r($data['academic_year_data']);die();
            $session_id = $data['academic_year_data']['session_id'];
        }else{
            $data['academic_year_data'] = $this->Academic_year_model->get_session($session_id);
            //$session_id = $sessionResult['session_id'];
        }
        $data['fees'] = [];
        $class = $this->Clas_model->get_all_class();
        foreach ($class as $key => $value) {
            $class_fees = $this->Fee_model->get_class_all_fees($session_id,$value['class_id']);
            $data['fees'][$key] = [
                'class_name' => $value['numeric_name'],
                'class_id' => $value['class_id'],
                'class_fees' => $class_fees,
            ];
        }
        
        //$data['fees'] = $this->Fee_model->get_all_fees($session_id);
       // print_r($data['fees']);die();
        $data['_view'] = 'fee/index';
        $this->load->view('layouts/main', $data);
    }

    /*
     * Adding a new fee
     */

    function add($session_id) {

        $this->load->library('form_validation');

        $this->form_validation->set_rules('fees_for[]', 'Fees For', 'required');
        $this->form_validation->set_rules('amount[]', 'Fees For', 'required');
        $this->form_validation->set_rules('class_id', 'Class ID', 'required');

        if ($this->form_validation->run()) {
            $classes = $this->input->post('class_id');
            $fees_for = $this->input->post('fees_for');
            $amount = $this->input->post('amount');
            $classResult = $this->Clas_model->get_clas($classes);
        
            if(isset($classResult['class_id']))
            {
                $feesResult= $this->Fee_model->get_class_all_fees($session_id,$classResult['class_id']);
                // as iterating for each fees type 
                if(!count($feesResult)){
                    foreach ($fees_for as $key => $value) {
                        $params = array(
                            'session_id' => $session_id,
                            'class_id' => $classes,
                            'fees_for' => $value,
                            'amount' => $amount[$key],
                            'created_by'=> $this->session->user_id,
                            'statusID' => 1,
                        );
                        $fee_id = $this->Fee_model->add_fee($params);
                    }
                    $this->session->set_flashdata('alertType','success' );
                    $this->session->set_flashdata('message','Fess added Successfully' );
                    redirect('fee/index/'.$session_id);

                }else{
                    $this->session->set_flashdata('alertType','failed' );
                    $this->session->set_flashdata('message','Fees for this session and class is already Exist plz edit it.' );
                    redirect('fee/add/'.$session_id);
                }
                

            }else{
                $this->session->set_flashdata('alertType','failed' );
                $this->session->set_flashdata('message','Class Not Found Plz Select Proper Class' );
                redirect('fee/add/'.$session_id);
            }
            
        
        } else {
            $data['academic_year_data'] = $this->Academic_year_model->get_session($session_id);
            // print_r($data['academic_year_data']);die();
            $this->load->model('Clas_model');
            $data['all_class'] = $this->Clas_model->get_all_class();

            $data['_view'] = 'fee/add';
            $this->load->view('layouts/main', $data);
        }
    }

    /*
     * Editing a fee
     */

    function edit($session_id,$class_id) {
        // check if the fee exists before trying to edit it
        $data['fee'] = $this->Fee_model->get_class_all_fees($session_id,$class_id);
        if (count($data['fee'])>0) {
            $this->load->library('form_validation');

            $this->form_validation->set_rules('fees_for[]', 'Fees For', 'required');
            $this->form_validation->set_rules('amount[]', 'Amount', 'required|integer');
            //$this->form_validation->set_rules('class_id', 'Class Id', 'required');

            if ($this->form_validation->run()) {
                $fees_for = $this->input->post('fees_for');
                $amount = $this->input->post('amount');
                //$class_id = $this->input->post('class_id');
                //$this->Fee_model->deleteClassFees($class_id);
                foreach ($fees_for as $k=>$v){
                $fee_id = $this->Fee_model->get_fee_headwise($session_id,$class_id,$v);
                
                if($fee_id) {

                    $params = array(
                        'fees_for' => $v,
                        'amount' => $amount[$k],
                        'modified_by'=> $this->session->user_id,
                        'modified_at'=> date("Y-m-d h:i:s"),
                    );

                    $this->Fee_model->update_fee($fee_id, $params);
                }else{

                    $params = array(
                        'session_id' => $session_id,
                        'class_id' => $classes,
                        'fees_for' => $v,
                        'amount' => $amount[$k],
                        'created_by'=> $this->session->user_id,
                        'statusID' => 1,
                    );
                    $fee_id = $this->Fee_model->add_fee($params);

                }
                
                
                }
                $this->session->set_flashdata('alertType','success' );
                $this->session->set_flashdata('message','Fess Updated Successfully' );
                redirect('fee/index/'.$session_id);

            } else {
                
                $data['academic_year_data'] = $this->Academic_year_model->get_session($session_id);
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

    function remove($session_id,$class_id) {
        $fee = $this->Fee_model->get_class_all_fees($session_id,$class_id);
        $classResult = $this->Clas_model->get_clas($class_id);
        // check if the fee exists before trying to delete it
        if (isset($fee[0]['class_id'])) {
            $this->Fee_model->deleteClassFees($session_id,$class_id);
            $this->session->set_flashdata('alertType','success' );
            $this->session->set_flashdata('message','Fess for '.$classResult['class_name'].' Deleted Successfully' );
            redirect('fee/index/'.$session_id);
        } else
            show_error('The fee you are trying to delete does not exist.');
    }

    function setup($session_id = 0) {

        $data['job_dates'] = [];
        $data['academic_year_data'] = $this->Academic_year_model->check_active_session();
        $session_id = $data['academic_year_data']['session_id'];
        if($session_id){
            $data['job_dates'] = $this->Fee_model->get_session_job_dates($session_id);
            //print_r($data['job_dates'][1]['date']);die();
        }
        $data['_view'] = 'fee/setup';
        $this->load->view('layouts/main', $data);
    }

    function feesJobProcess(){
        $fees_for = $this->input->post('fees_for');
        $amount = $this->input->post('amount');
        $sequence = $this->input->post('sequence');
        $session_id = $this->input->post('session_id');
        //$this->Fee_model->deleteClassFees($class_id);
        foreach ($fees_for as $k=>$v){
        $fee_id = $this->Fee_model->get_fees_job_details($session_id,$v);
        
        if(isset($fee_id['sysJobDatID'])) {

            $params = array(
                'stage' => $v,
                'date' => $amount[$k],
                'sequence' => $sequence[$k],
                'modified_by'=> $this->session->user_id,
                'modified_at'=> date("Y-m-d h:i:s"),
            );

            $this->Fee_model->update_fees_job_date($fee_id['sysJobDatID'], $params);
        }else{

            $params = array(
                'session_id' => $session_id,
                'stage' => $v,
                'date' => $amount[$k],
                'sequence' => $sequence[$k],
                'created_by'=> $this->session->user_id,
                'statusID' => 1,
            );
            $this->Fee_model->add_fees_job_date($params);

        }
        
        
        }
        $this->session->set_flashdata('alertType','success' );
        $this->session->set_flashdata('message','Fees Automation Setup Added Successfully' );
        redirect('fee/setup');
    }
    
    

}