<?php
class System_job extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model("Fee_model");
        $this->load->model('Student_model');
        $this->load->model('Clas_model');
        $this->load->model('Academic_year_model');
        $this->load->model('Payment_model');
        $this->load->model('Sys_job_model');
        
    }

    function add_late_payment() {
        $currentSession = $this->Academic_year_model->check_active_session();
        $session_id = $currentSession['session_id'];
        $current_date = date("Y-m-d");
        if($session_id){
           $job_dates = $this->Fee_model->get_session_job_dates($session_id);
           foreach ($job_dates as $key => $value) {
            if($value['date'] == $current_date){
                $all_class_data = $this->Clas_model->get_all_class(); 
                foreach ($all_class_data as $ckey => $cvalue) {

                    //$initalFees = $this->Fee_model->getInitialFees($session_id, $cvalue['class_id']);
                    $currentlateFeesData = $this->Sys_job_model->get_fees_for_job($session_id,$cvalue['class_id'],$value['stage']); 
                    if($value['sequence'] == 1){
                        $lastlateFeesData = $currentlateFeesData;
                    }else{
                        $last_job_data = $this->Fee_model->get_session_job_date_by_seq($session_id,$value['sequence']-1);
                        $lastlateFeesData = $this->Sys_job_model->get_fees_for_job($session_id,$cvalue['class_id'],$last_job_data['stage']);
                    }

                    if(!empty($currentlateFeesData) && !empty($lastlateFeesData)) {
                        $studentPaymentData = $this->Sys_job_model->get_student_payment_for_job($session_id,$cvalue['class_id'],$value['sequence']);
                        foreach ($studentPaymentData as $pkey => $pvalue) {
                            // new total calculation
                            $latefee = $currentlateFeesData['amount'] - $lastlateFeesData['amount'];
                            $latefee = (int)$latefee > 0 ? (int)$latefee : 0;
                            $total_amount = (int)$pvalue['total_amount'] + $latefee;
                            //print_r($total_amount);die();
                            $params = [
                                'total_amount' => $total_amount,
                                'payment_seq' => $value['sequence'],
                                'sync_at' => date("Y-m-d h:i:s"),
                            ];
                            $this->Payment_model->update_payment($pvalue['payment_id'],$params);
    
                            $params2 = [
                                'session_id' => $session_id,
                                'payment_id' => $pvalue['payment_id'],
                                'class_id' => $pvalue['class_id'],
                                'old_total_amount' => $pvalue['total_amount'],
                                'new_total_amount' => $total_amount,
                                'payment_seq' => $value['sequence'],
                                'date' => date("Y-m-d"),
                            ];
                            $this->Sys_job_model->add_sys_payment_log($params2);
    
                        }
                    }
                }
            }

           }
        }else{
            echo 'Current Sesssion Not Set';
        }
        return print_r("OK");
        
    }

}

