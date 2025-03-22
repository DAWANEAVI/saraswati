<?php

/*
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */

class Payment extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('Payment_model');
        $this->load->model('Section_model');
        $this->load->model("Fee_model");
        $this->load->model('Student_model');
        $this->load->model('Clas_model');
        $this->load->model('Academic_year_model');
        $this->load->model('Payment_log_model');
        $this->load->model('Student_promote_model');
        $this->load->model('Global_model');
        
    }

    /*
     * Listing of payments
     */

    function index() {
        
        print_r(base_url());die();
        redirect(base_url().'payment_log');
    }

    /*
     * Adding a new payment
     */

     function add() {
        $this->load->library('form_validation');

        $this->form_validation->set_rules('student_id', 'Student Id', 'required');
        $this->form_validation->set_rules('academic_year', 'Academic Year', 'required');
        $this->form_validation->set_rules('total_amount', 'Total Amount', 'required');
        $this->form_validation->set_rules('paid_amount', 'Paid Amount', 'required');

        if ($this->input->get('student_id')) {
             //Fetch student and payment data based on student _id
             $student_id=$this->input->get('student_id');
            $data['student_data'] = $this->Student_model->get_student($this->input->get('student_id'));
            $data['student_payments'] = $this->Payment_model->getStudentPaymentData($this->input->get('student_id'));
            //print_r($data['student_payments']);die();
          if (empty($data['student_payments'])) {
                log_message('error', 'No payment data found for student ID: ' . $student_id);
                // Optionally, set an error message here
                $data['error'] = 'No payment data found for the student.';
            }
        } else {
            $data['all_class'] = $this->Clas_model->get_all_class();
        }
        $data['_view'] = 'payment/add';
        $this->load->view('layouts/main', $data);
    }


    function heads() {

        if ($this->input->get('student_id')) {

            $data['student_data'] = $this->Student_model->get_student($this->input->get('student_id'));
            $data['student_payments'] = $this->Payment_model->getStudentPaymentData($this->input->get('student_id'));
            //print_r($data['student_payments']);die();
        } else {
            $data['all_class'] = $this->Clas_model->get_all_class();
        }
        $data['_view'] = 'payment/heads';
        $this->load->view('layouts/main', $data);
    }

    function head_adjustment($student_id, $payment_id) {

        $this->load->library('form_validation');

       
        $this->form_validation->set_rules('TuitionFeesCT', 'Tuition Fees Total', 'required');
        $this->form_validation->set_rules('TuitionFeesCR', 'Tuition Fees Remaining', 'required');

        //print_r($this->input->post()); die();

        if ($this->form_validation->run()) {
            $total_total = $this->input->post('total_total');
            $total_remaining = $this->input->post('total_remaining');
            $total_CT =$this->input->post('TuitionFeesCT');
            $total_CR =$this->input->post('TuitionFeesCR');
            if(($total_total != $total_CT) || ($total_remaining != $total_CR)){
                $this->session->set_flashdata('alertType','failed' );
                $this->session->set_flashdata('message','Total Is Not Match With Subtotal Please Recalulate..' );
                redirect('payment/head_adjustment/'.$student_id.'/'.$payment_id);
            }
            //remaining fees validations
            
            if($this->input->post('TuitionFeesCR')>$this->input->post('TuitionFeesCT')){
                $this->session->set_flashdata('alertType','failed' );
                $this->session->set_flashdata('message','Remaining Tuition Fees should be less then Total Tuition Fees' );
                redirect('payment/head_adjustment/'.$student_id.'/'.$payment_id);
            }

            $updateData = array(
                'total_amount' => $total_total,
                'paid_amount' => $total_total - $total_remaining,
                'modified_by' => $this->session->user_id, 
            );

            $this->Payment_model->update_payment($payment_id,$updateData);

            $changed_data = $updateData;

            $total_OT =$this->input->post('TuitionFeesOT');
            $total_OR =$this->input->post('TuitionFeesOR');

            $original_data = array(
                'TuitionFeesOT' => $this->input->post('TuitionFeesOT'),
                'TuitionFeesOR' => $this->input->post('TuitionFeesOR'),
                'total_OT' => $total_OT,
                'total_OR' => $total_OR,
            );

            $params = array(
                'session_id' => $this->input->post('session_id'),
                'payment_id' => $payment_id,
                'student_id' => $student_id,
                'class_id' => $this->input->post('class_id'),
                'amount' => $total_OT - $total_remaining,
                'inputs' => json_encode(array('OD'=>$original_data,'CD' => $changed_data)),
                'created_by' => $this->session->user_id,
                'statusID' => 1,
            );

            $this->load->model('Payment_concession_model');
            if($total_OT - $total_remaining) $sys_lod_id = $this->Payment_concession_model->add_payment_concession($params);
            //print_r($sys_lod_id);die();

            $this->session->set_flashdata('alertType','success' );
            $this->session->set_flashdata('message','Payment Concession Added Successfully.' );
            redirect('payment/add?student_id='.$student_id);
        } else {

            if(empty($student_id)){
                $this->session->set_flashdata('alertType','failed' );
                $this->session->set_flashdata('message','IDs are invalid Plz contact admin support.' );
                redirect('payment/add?student_id='.$student_id);
            }

            if(!empty(validation_errors())){
                $this->session->set_flashdata('alertType','failed' );
                $this->session->set_flashdata('message',validation_errors());
                redirect('payment/add?student_id='.$student_id);
            }

            //all ids check
            $data['student_data'] = $this->Student_model->get_student($student_id); //arr
            if(empty($data['student_data'])){
                $this->session->set_flashdata('alertType','failed' );
                $this->session->set_flashdata('message','student data not found' );
                redirect('payment/add?student_id='.$student_id);
            }
            
            $data['payment_data'] = $this->Payment_model->getPaymentData($payment_id); //obj
            if(empty($data['payment_data'])){
                $this->session->set_flashdata('alertType','failed' );
                $this->session->set_flashdata('message','payment data is not found' );
                redirect('payment/add?student_id='.$student_id);
            }
            $paymentData=$data['payment_data'];
            // class id check if fails
            $data['fees_data'] = $this->Fee_model->get_class_all_fees($paymentData->session_id,$paymentData->class_id); //arr
            if(empty($data['fees_data'])){
                $this->session->set_flashdata('alertType','failed' );
                $this->session->set_flashdata('message','fees for class not set for this session plz add fess for class.' );
                redirect('payment/add?student_id='.$student_id);
            }

            $data['student_id'] = $student_id;
            $data['payment_id'] = $payment_id;
            $data['class_id'] = $paymentData->class_id;
            $data['old_heads'] = 0;

            $data['_view'] = 'payment/head_adjustment';
            $this->load->view('layouts/main', $data);
        }
    }

    function head_adjustment_old($student_id=0) {

        $this->load->library('form_validation');

        $this->form_validation->set_rules('old_fees', 'old_fees', 'required');
        $this->form_validation->set_rules('paid_fees', 'Paid Fee', 'required');

        //print_r($this->input->post()); die();

        if ($this->form_validation->run()) {

            //input fields
            $old_fees = $this->input->post('old_fees');
            $paid_fees = $this->input->post('paid_fees');
            $paid_fees_original = $this->input->post('paid_fees_original');
            $old_fees_original = $this->input->post('old_fees_original');
            $remaining_fees = $this->input->post('remaining_fees');
            
            if($old_fees < 0 || $paid_fees < 0){
                $this->session->set_flashdata('alertType','failed' );
                $this->session->set_flashdata('message','numbers should not in minus' );
                redirect('payment/add?student_id='.$student_id);
            }
            
            if($old_fees < $paid_fees){
                $this->session->set_flashdata('alertType','failed' );
                $this->session->set_flashdata('message','Paid Fees Should Be less then or equals to Total Fees !' );
                redirect('payment/add?student_id='.$student_id);
            }

            $updateData = array(
                'old_fees' => $old_fees,
                'paid_fees' => $paid_fees
            );

            $this->Payment_model->update_old_heads($student_id,$updateData);

            $changed_data = json_encode($updateData);

            $original_data = json_encode(array(
                'old_fees_original' => $old_fees_original,
                'paid_fees_original' => $paid_fees_original
            ));

            $params = array(
                'user_id' => $this->session->user_id,
                'log_type' => 1,
                'student_id' => $student_id,
                'original_data' => $original_data,
                'changed_data' => $changed_data,
                'statusID' => 1,
            );
            
            $sys_lod_id = $this->Payment_model->add_system_log($params);
            //print_r($sys_lod_id);die();

            $this->session->set_flashdata('alertType','success' );
            $this->session->set_flashdata('message','Heads Updated Successfully.' );
            redirect('payment/add?student_id='.$student_id);
        } else {

            if(empty($student_id)){
                $this->session->set_flashdata('alertType','failed' );
                $this->session->set_flashdata('message','IDs are invalid Plz contact admin support.' );
                redirect('payment/add?student_id='.$student_id);
            }
            //all ids check
            $data['student_data'] = $this->Student_model->get_student($student_id); //arr
            if(empty($data['student_data'])){
                $this->session->set_flashdata('alertType','failed' );
                $this->session->set_flashdata('message','student data not found' );
                redirect('payment/add?student_id='.$student_id);
            }
            
            $data['student_id'] = $student_id;
            $data['old_heads'] = 1;

            $data['_view'] = 'payment/head_adjustment';
            $this->load->view('layouts/main', $data);
        }
    }




    /*
     * Editing a payment
     */

    function edit($payment_id) {
        // check if the payment exists before trying to edit it
        $data['payment'] = $this->Payment_model->get_payment($payment_id);

        if (isset($data['payment']['payment_id'])) {
            $this->load->library('form_validation');

            $this->form_validation->set_rules('student_id', 'Student Id', 'required');
            $this->form_validation->set_rules('academic_year', 'Academic Year', 'required');
            $this->form_validation->set_rules('total_amount', 'Total Amount', 'required');
            $this->form_validation->set_rules('paid_amount', 'Paid Amount', 'required');

            if ($this->form_validation->run()) {
                $params = array(
                    'student_id' => $this->input->post('student_id'),
                    'academic_year' => $this->input->post('academic_year'),
                    'total_amount' => $this->input->post('total_amount'),
                    'paid_amount' => $this->input->post('paid_amount'),
                );

                $this->Payment_model->update_payment($payment_id, $params);
                redirect('payment/index');
            } else {
                
                $data['all_student'] = $this->Student_model->get_all_student();

                $data['_view'] = 'payment/edit';
                $this->load->view('layouts/main', $data);
            }
        } else
            show_error('The payment you are trying to edit does not exist.');
    }

    /*
     * Deleting payment
     */

    function remove($payment_id) {
        $payment = $this->Payment_model->get_payment($payment_id);

        // check if the payment exists before trying to delete it
        if (isset($payment['payment_id'])) {
            $this->Payment_model->delete_payment($payment_id);
            redirect('payment/index');
        } else
            show_error('The payment you are trying to delete does not exist.');
    }

    function getPaymentByStudent() {
        $student_id = $this->input->post('student_id');
        $result = $this->Payment_model->getPaymentByStudent($student_id);
        echo json_encode($result);
    }

    function make_payment($student_id=0,$payment_id=0,$session_id=0) {
        $this->load->library('form_validation');

        $this->form_validation->set_rules('tuitionfees', 'Tution Fees', 'required');
        $this->form_validation->set_rules('student_id', 'Student ID', 'required|integer');
        $this->form_validation->set_rules('payment_id', 'Payment ID', 'required|integer');
        $this->form_validation->set_rules('session_id', 'Session ID', 'required|integer');
    

        if ($this->form_validation->run()) {

            $payment_details = json_encode($this->input->post());
            $payment_id = $this->input->post('payment_id');
            $payment_session = $this->input->post('payment_session');
            $session_id = $this->input->post('session_id');
            $student_id = $this->input->post('student_id');

            //input fields
            $tuitionfees = $this->input->post('tuitionfees');
            
            $total_amount = $this->input->post('total');

            $payment_type = $this->input->post('payment_type') ? $this->input->post('payment_type') : 0 ;
           // $payment_type = $this->input->post('payment_type') ?: 0;

            $totalAmount = $tuitionfees;

            if($total_amount != $totalAmount){
                $this->session->set_flashdata('alertType','failed' );
                $this->session->set_flashdata('message','Total Amount is invalid' );
               redirect('payment/make_payment/'.$student_id.'/'.$payment_id.'/'.$session_id.'?payment_type='.$payment_type);
              // redirect("payment/make_payment/$student_id/$payment_id/$session_id?payment_type=$payment_type");
            }

            $paymentData = array(
                'paid_amount' => $totalAmount,
                'late_fee' => 0,
                );
            $this->Payment_model->updatePayment($paymentData, $payment_id);

            $reciept_no = $this->getRecieptNo($student_id);

            $params = array(
                'reciept_no' => $reciept_no,
                'payment_id' => $payment_id,
                'session_id' => $session_id,
                'payment_session' => $payment_session,
                'tuitionfees' => $tuitionfees,
                'late_fee' => 0,
                'payment_type' => $payment_type,
                'month' => $this->input->post('from_month'),
                'to_month' => $this->input->post('to_month'),
                'remark' => $this->input->post('remark'),
                'payment_details' => $payment_details,
                'created_by' => $this->session->user_id,
                'StatusID' => 1,
            );
            $payment_log_id = $this->Payment_log_model->add_payment_log($params);

            $smsCount = $this->Global_model->get_config_value('smsCount') ? $this->Global_model->get_config_value('smsCount') : 0;
            $smsLimit = $this->Global_model->get_config_value('smsLimit') ? $this->Global_model->get_config_value('smsLimit') : 0;
            if($smsCount != 0 && $smsLimit !=0 && $smsCount < $smsLimit){ 
                $studentInfo = $this->Student_model->get_student($student_id); //arr
                $PaymentSessionRes = $this->Academic_year_model->get_session($payment_session);
                $template_id = $this->Global_model->get_config_value('paymentTemplateID') ? $this->Global_model->get_config_value('paymentTemplateID') : 0;
                $message = 'Dear '.$studentInfo['fullname'].', Fee of '.$totalAmount.' for Academic Year '.$PaymentSessionRes['session'].' paid successfully. Thank you! SPEMS Babhulgaon @ Technopride Softwares.';
                $smsData =[
                    'session_id' => $session_id,
                    'student_id' => $student_id,
                    'template_id' => $template_id,
                    'mobile_no' => $studentInfo['mobile_no'],
                    'message' =>$message, 
                    'sent' =>0,
                    'created_by' => $this->session->user_id,
                    'statusID' => 1,
                ];
                //print_r($smsData);die();
                $this->load->model('Sms_model');
                $this->Sms_model->add_sms($smsData);
            }
            redirect('payment_log/view/'.$payment_log_id);
        } else {

            $data['_view'] = 'payment/student_payment';

            if(empty($student_id) && empty($payment_id) && empty($session_id)){
                $this->session->set_flashdata('alertType','failed' );
                $this->session->set_flashdata('message','IDs are invalid Plz contact admin support.' );
                redirect('payment/add?student_id='.$student_id);
            }
            //all ids check
            $data['student_data'] = $this->Student_model->get_student($student_id); //arr
            if(empty($data['student_data'])){
                $this->session->set_flashdata('alertType','failed' );
                $this->session->set_flashdata('message','student data not found' );
                redirect('payment/add?student_id='.$student_id);
            }
            $data['payment_data'] = $this->Payment_model->getPaymentData($payment_id); //obj
            if(empty($data['payment_data'])){
                $this->session->set_flashdata('alertType','failed' );
                $this->session->set_flashdata('message','payment data is not found' );
                redirect('payment/add?student_id='.$student_id);
            }
          /*  $paymentData=$data['payment_data'];

            // Log payment data
            log_message('debug', 'Payment Data: ' . print_r($paymentData, true));

            // Validate class_id
             if (!isset($paymentData->class_id)) {
                $this->session->set_flashdata('alertType', 'failed');
                $this->session->set_flashdata('message', 'Payment data is missing class ID.');
                redirect('payment/add?student_id=' . $student_id);
               }
               // Fetch fees data
        log_message('debug', "Fetching fees data for Session ID: {$session_id}, Class ID: {$paymentData->class_id}");

            // class id check if fails
            $data['fees_data'] = $this->Fee_model->get_class_all_fees($session_id,$paymentData->class_id); //arr
            log_message('debug', 'Fees Data Result: ' . print_r($data['fees_data'], true));

            if(empty($data['fees_data'])){
                log_message('error', "No fees data found for session {$session_id} and class {$paymentData->class_id}.");
                $this->session->set_flashdata('alertType','failed' );
                $this->session->set_flashdata('message','fees for class not set for this session plz add fess for class.' );
                redirect('payment/add?student_id='.$student_id);
            }*/

            $data['current_session_data'] = $this->Academic_year_model->check_active_session(); //arr
            if(empty($data['current_session_data'])){
                $this->session->set_flashdata('alertType','failed' );
                $this->session->set_flashdata('message','No session set as active. plz make current session as active' );
                redirect('payment/add?student_id='.$student_id);
            }
           $data['payment_session_data'] = $this->Academic_year_model->get_session($session_id); //arr
            //fees check
            if(empty($data['payment_session_data'])){
                $this->session->set_flashdata('alertType','failed' );
                $this->session->set_flashdata('message','payment session is not valid' );
                redirect('payment/add?student_id='.$student_id);
            }
            //print_r($data['fees_data']);die();

            $data['student_id'] = $student_id;
            $data['payment_id'] = $payment_id;
            
            $this->load->view('layouts/main', $data);
        }
    }

    function make_payment_process() {
        $this->load->library('form_validation');

       $this->form_validation->set_rules('EducationFee', 'Education Fee', 'required');
        $this->form_validation->set_rules('TermFee', 'Term Fee', 'required');
        $this->form_validation->set_rules('ExamFee', 'Exam Fee', 'required');
        $this->form_validation->set_rules('SportFee', 'Sport Fee', 'required');
        $this->form_validation->set_rules('Computer Fee', 'Computer Fee', 'required');
//        $this->form_validation->set_rules('month', 'Month', 'required');
        //print_r($this->input->post()); die();

        if ($this->form_validation->run()) {

            $payment_details = json_encode($this->input->post());
            $payment_id = $this->input->post('payment_id');
            $payment_session = $this->input->post('payment_session');
            $session_id = $this->input->post('session_id');
            $student_id = $this->input->post('student_id');
         //  $education_fee = $this->input->post('EducationFee');
            $term_fee = $this->input->post('TermFee');
            $exam_fee = $this->input->post('ExamFee');
            $sport_fee = $this->input->post('SportFee');
            $computer_fee = $this->input->post('ComputerFee');
            $total_amount = $this->input->post('total');

            $totalAmount = $computer_fee+$sport_fee+$exam_fee+$term_fee+$education_fee;

            $paymentData = array(
                'paid_amount' => $totalAmount,
               'education_fee' => $this->input->post('EducationFee'),
                'term_fee' => $this->input->post('TermFee'),
                'exam_fee' => $this->input->post('ExamFee'),
                'sport_fee' => $this->input->post('SportFee'),
                'computer_fee' => $this->input->post('ComputerFee'),
                );
            $this->Payment_model->updatePayment($paymentData, $payment_id);

            $reciept_no = $this->getRecieptNo($student_id);

            $params = array(
                'reciept_no' => $reciept_no,
                'payment_id' => $payment_id,
                'session_id' => $session_id,
                'payment_session' => $payment_session,
               'education_fee' => $education_fee,
                'term_fee' => $term_fee,
                'exam_fee' => $exam_fee,
                'sport_fee' => $sport_fee,
                'computer_fee' => $computer_fee,
                // 'old_fee' => $total_old_fee,
                'month' => $this->input->post('from_month'),
                'to_month' => $this->input->post('to_month'),
                'created_date' => date('Y-m-d H:i:s'),
                'remark' => $this->input->post('remark'),
                'payment_details' => $payment_details,
                'StatusID' => 1,
            );
            $payment_log_id = $this->Payment_log_model->add_payment_log($params);

            redirect('payment_log/view_and_msg/' . $payment_log_id);
        } else {
             //print_r(validation_errors());die();
             $this->session->set_flashdata('alertType','failed' );
             $this->session->set_flashdata('message',validation_errors());
             redirect()->previous_url();
        }
    }


    function getRecieptNo($student_id) {
    
        $student_data = $this->Student_model->getStudentDataForReciept($student_id);
        $maxid = $this->Student_model->getMaxPaymentLogId();
        $maxid++;
        $reciept_no = $student_data->numeric_name . '' . $student_data->section_name . '' . $maxid;
        return $reciept_no;
    }

    function setclass($student_id=0,$payment_id=0) {
        $this->load->library('form_validation');

        $this->form_validation->set_rules('class', 'class sesection', 'required');
//        $this->form_validation->set_rules('month', 'Month', 'required');
        //print_r($this->input->post()); die();

        if ($this->form_validation->run()) {

            $class = $this->input->post('class');
    
            if ($this->Payment_model->update_payment($payment_id, $paymentData)) {
                redirect(site_url('payment/add?student_id=' . $student_id));
            } else {
                // Handle error if update fails
                $data['error'] = 'Unable to update payment data.';
                $data['_view'] = 'payment/setclass';
                $data['student_data'] = $this->Student_model->get_student($student_id); // Fetch student data
                $data['payment_data'] = $this->Payment_model->getPaymentData($payment_id); // Fetch payment data
                $data['all_class'] = $this->Clas_model->get_all_class(); // Fetch all available classes
                $data['student_id'] = $student_id;
                $data['payment_id'] = $payment_id;
    
                $this->load->view('layouts/main', $data);
            }
        } else {

            $data['_view'] = 'payment/setclass';
            $data['student_data'] = $this->Student_model->get_student($student_id); //arr
            $data['payment_data'] = $this->Payment_model->getPaymentData($payment_id); //obj
            $data['all_class'] = $this->Clas_model->get_all_class();
            //$data['student_promote'] = $this->Student_promote_model->get_student_promote_history($student_id);
            $data['student_id'] = $student_id;
            $data['payment_id'] = $payment_id;
            
            $this->load->view('layouts/main', $data);
        }
    }

    function make_payment_old($student_id=0) {

        $this->load->library('form_validation');

        $this->form_validation->set_rules('EducationFee', 'Education Fee', 'required');
        $this->form_validation->set_rules('TermFee', 'Term Fee', 'required');
        $this->form_validation->set_rules('ExamFee', 'Exam Fee', 'required');
        $this->form_validation->set_rules('SportFee', 'Sport Fee', 'required');
        $this->form_validation->set_rules('ComputerFee', 'Computer Fee', 'required');

        // print_r($this->input->post()); die();

        if ($this->form_validation->run()) {

            $payment_details = json_encode($this->input->post());
            //$payment_id = $this->input->post('payment_id');
            //$payment_session = $this->input->post('payment_session');
            $session_id = $this->input->post('session_id');
            $student_id = $this->input->post('student_id');
            
            //input fields
            $education_fee = $this->input->post('EducationFee');
          /*  $term_fee = $this->input->post('TermFee');
            $exam_fee = $this->input->post('ExamFee');
            $sport_fee = $this->input->post('SportFee');
            $computer_fee = $this->input->post('ComputerFee'); */
            
            $total_amount = $this->input->post('total');
            $total_old_fees = $this->input->post('total_old_fees');
            $remaining_fees = $this->input->post('remaining_fees');

            $totalAmount = $computer_fee+$sport_fee+$exam_fee+$term_fee+$education_fee;
            
            if($total_amount != $totalAmount){
                $this->session->set_flashdata('alertType','failed' );
                $this->session->set_flashdata('message','Total Amount is not match !' );
                redirect('payment/make_payment_old/'.$student_id);
            }
            //print_r($total_old_fees.'>='.$totalAmount); die();
            if($total_old_fees < $totalAmount){
                $this->session->set_flashdata('alertType','failed' );
                $this->session->set_flashdata('message','Total Amount is greater then total fees !' );
                redirect('payment/make_payment_old/'.$student_id);
            }

            if($remaining_fees < $totalAmount){
                $this->session->set_flashdata('alertType','failed' );
                $this->session->set_flashdata('message','Total Amount should be less then or equals to remaining amount.' );
                redirect('payment/make_payment_old/'.$student_id);
            }
            
            $payment_id = $this->Payment_model->get_payment_id_by_session($session_id,$student_id);
            //print_r($totalAmount); die();
            $this->Payment_model->updatePastPayment($totalAmount,$student_id);

            $reciept_no = $this->getRecieptNo($student_id);

            $params = array(
                'reciept_no' => $reciept_no,
                'payment_id' => $payment_id,
                'session_id' => $session_id,
                'payment_session' => 0,
             /*   'education_fee' => $education_fee,
                'term_fee' => $term_fee,
                'exam_fee' => $exam_fee,
                'sport_fee' => $sport_fee,
                'computer_fee' => $computer_fee,*/
                'old_fee' => 0,
                'is_old_receipt' => 1,
                'month' => $this->input->post('from_month'),
                'to_month' => $this->input->post('to_month'),
                'created_date' => date('Y-m-d H:i:s'),
                'remark' => $this->input->post('remark'),
                'payment_details' => $payment_details,
                'StatusID' => 1,
            );
            //print_r($params); die();
            $payment_log_id = $this->Payment_log_model->add_payment_log($params);
            //print_r( $payment_log_id); die();

            redirect('payment_log/view_and_msg/'.$payment_log_id);
        } else {

            $data['_view'] = 'payment/student_payment_old_fees';

            if(empty($student_id)){
                $this->session->set_flashdata('alertType','failed' );
                $this->session->set_flashdata('message','IDs are invalid Plz contact admin support.' );
                redirect('payment/add?student_id='.$student_id);
            }
            //all ids check
            $data['student_data'] = $this->Student_model->get_student($student_id); //arr
            if(empty($data['student_data'])){
                $this->session->set_flashdata('alertType','failed' );
                $this->session->set_flashdata('message','student data not found' );
                redirect('payment/add?student_id='.$student_id);
            }
            // $data['payment_data'] = $this->Payment_model->getPaymentData($payment_id); //obj
            // if(empty($data['payment_data'])){
            //     $this->session->set_flashdata('alertType','failed' );
            //     $this->session->set_flashdata('message','payment data is not found' );
            //     redirect('payment/add?student_id='.$student_id);
            // }
            // $paymentData=$data['payment_data'];
            // // class id check if fails
            // $data['fees_data'] = $this->Fee_model->get_class_all_fees($session_id,$paymentData->class_id); //arr
            // if(empty($data['fees_data'])){
            //     $this->session->set_flashdata('alertType','failed' );
            //     $this->session->set_flashdata('message','fees for class not set for this session plz add fess for class.' );
            //     redirect('payment/add?student_id='.$student_id);
            // }

            $data['current_session_data'] = $this->Academic_year_model->check_active_session(); //arr
            if(empty($data['current_session_data'])){
                $this->session->set_flashdata('alertType','failed' );
                $this->session->set_flashdata('message','No session set as active. plz make current session as active' );
                redirect('payment/add?student_id='.$student_id);
            }
            // $data['payment_session_data'] = $this->Academic_year_model->get_session($session_id); //arr
            // //fees check
            // if(empty($data['payment_session_data'])){
            //     $this->session->set_flashdata('alertType','failed' );
            //     $this->session->set_flashdata('message','payment session is not valid' );
            //     redirect('payment/add?student_id='.$student_id);
            // }
            //print_r($data['fees_data']);die();

            $data['student_id'] = $student_id;
            //$data['payment_id'] = $payment_id;
            
            $this->load->view('layouts/main', $data);
        }
    }

    function insert_inital_payment_data() {
    
        $all_class = $this->Clas_model->get_all_class();
        $current_session_data = $this->Academic_year_model->check_active_session();
        $session_id = $current_session_data['session_id'];
    
        foreach ($all_class as $key => $cvalue) {
            $class_students = $this->Student_model->getStudentBySessionAndClass($session_id,$cvalue['class_id']);
            
            $fees = $this->Fee_model->getFeeBySessionClass($session_id, $cvalue['class_id']);
            if(empty($fees)){
                return print_r("Fees Not Set For Class".$cvalue['class_id']); die();
            }

            $totalfees=0;
            if (!empty($fees)) {
                foreach ($fees as $key => $value) {
                switch ($value->fees_for) {
                    // case 'Admission Fees':
                    //     $admission_fee = $value->amount;
                    //     $totalfees = $totalfees + $value->amount;
                    //     break;
                    case 'Tuition Fees':
                        $tuition_fee = $value->amount;
                        $totalfees = $totalfees + $value->amount;
                        break;
                    // case 'Term Fees':
                    //     $term_fee = $value->amount;
                    //     $totalfees = $totalfees + $value->amount;
                    //     break;
                    default:
                        # code...
                        break;
                }
                }
                
            }

            
            if(!empty($class_students)){
                foreach ($class_students as $skey => $svalue) {
                    $payment_parameter = array(
                        'student_id' => $svalue['student_id'],
                        'academic_year' => $current_session_data['session'],
                        'session_id' => $session_id,
                        'class_id' => $cvalue['class_id'],
                        'total_amount' => $totalfees,
                        'paid_amount' => 0,
                        // 'admission_fee' => $admission_fee,
                        // 'total_admission_fee' => $admission_fee,
                        // 'tuition_fee' => $tuition_fee,
                        // 'total_tuition_fee' => $tuition_fee,
                        // 'term_fee' => $term_fee,
                        // 'total_term_fee' => $term_fee,
                        'late_fee' => 0,
                        'payment_seq' => 0,
                        'sync' =>0,
                        'created_by' => $this->session->user_id,
                        'statusID' => 1,    
                    );

                    //rte fees setting

                    // if($svalue['rte_applicable'] == 1){
                    // $payment_parameter['total_amount'] = $fees->amount;
                    // }
    
                    $payment_id = $this->Payment_model->add_payment($payment_parameter);
                }

            }
            
        }

        return print_r("OK");
    }

    
    

}

