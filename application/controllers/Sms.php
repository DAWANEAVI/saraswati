<?php

class Sms extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('Clas_model');
        $this->load->model('Global_model');
        $this->load->model('Sms_model');
    }

    public function index()
    {
    try{
        $data['noof_page'] = 0;
        $config['total_rows'] = $this->Sms_model->get_all_sms_log_count();
        $this->pagination->initialize($config);
        $data['sms_log'] = $this->Sms_model->get_all_sms_log();
        $data['_view'] = 'sms/index';
        $this->load->view('layouts/main',$data);
        } catch (Exception $ex) {
        throw new Exception('Sms Controller : Error in index function - ' . $ex);
    }  
    }

    function sendToOne() {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('template_id', 'template_id', 'required|trim|xss_clean');
        $this->form_validation->set_rules('class_id', 'class', 'required|trim|xss_clean');
        $this->form_validation->set_rules('section_id', 'section', 'required|trim|xss_clean');
        $this->form_validation->set_rules('student_id', 'Student', 'required');
        $this->form_validation->set_rules('message[]', "message", "trim|xss_clean|max_length[160]");
        if ($this->form_validation->run()) {
            $template_id = $this->input->post('template_id');
            $class_id = $this->input->post('class_id');
            $section_id = $this->input->post('section_id');
            $student_id = $this->input->post('student_id');
            $message = $this->input->post('message');

            if(empty($message)){
                $this->session->set_flashdata('alertType','failed' );
                $this->session->set_flashdata('message','Text Message is Empty...' );
                redirect('Sms/sendToOne?'.'template_id='.$template_id);            
            }

            $textMsg = '';
            foreach ($message as $key => $value) {
                $textMsg .=$value;
            }

            if(strlen($textMsg)>160){
                $this->session->set_flashdata('alertType','failed' );
                $this->session->set_flashdata('message','Text Message Is'.strlen($textMsg).' Characters Long. Maximmum 160 Characters Allowed. Please Reduce Variable lenght.' );
                redirect('Sms/sendToOne?'.'template_id='.$template_id);            
            }

            $this->load->model('Student_model');
            $studentData = $this->Student_model->get_student($student_id);
            $this->load->model('Academic_year_model');
            $currentSession = $this->Academic_year_model->check_active_session();

            $smsCount = $this->Global_model->get_config_value('smsCount');
            $smsLimit = $this->Global_model->get_config_value('smsLimit');

            if($smsCount != 0 && $smsLimit !=0 && $smsCount < $smsLimit){ 
                $params = [
                    'session_id' =>$currentSession['session_id'],
                    'student_id' => $student_id,
                    'template_id' =>$template_id,
                    'mobile_no' => $studentData['mobile_no'],
                    'message' => str_replace("_"," ",$textMsg),
                    'sent' => 0,
                    'created_by' => $this->session->user_id,
                    'statusID' => 1,
                ];
                //print_r(str_replace("_"," ",$textMsg));die();
                $smslog_id = $this->Sms_model->add_sms($params);
                $this->session->set_flashdata('alertType','success' );
                $this->session->set_flashdata('message','Sms Added Successfully.' );
                redirect('Sms/index?'.'template_id='.$template_id);
            }else{
                $this->session->set_flashdata('alertType','failed' );
                $this->session->set_flashdata('message','Low SMS Balance ! Please Reacharge.' );
                redirect('Sms/index?'.'template_id='.$template_id);  
            }
             
        } else {
            $data['_view'] = 'sms/add';
            //$this->load->model('Clas_model');
            $data['all_class'] = $this->Clas_model->get_all_class();
            $data['all_templates'] = $this->Sms_model->get_all_sms_templates();
            $data['content_array'] = [];
            if($this->input->get('template_id') != null){
               $templateData = $this->Sms_model->get_sms_template($this->input->get('template_id'));
               if(!empty($templateData)) $data['content_array'] = explode("{#var#}",$templateData['content']);
               if(!empty($templateData)) $data['description'] = $templateData['valueDesc'];
            }
            //print_r($data['content_array']);die();
            $this->load->view('layouts/main', $data);
        }
    }

    function sendBulk() {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('template_id', 'template_id', 'required|trim|xss_clean');
        $this->form_validation->set_rules('class_id', 'class', 'required|trim|xss_clean');
       // $this->form_validation->set_rules('section_id', 'section', 'required|trim|xss_clean');
        $this->form_validation->set_rules('studentIDs[]', 'Students', 'required');
        $this->form_validation->set_rules('message[]', "message", "trim|xss_clean|max_length[160]");
        if ($this->form_validation->run()) {

            $template_id = $this->input->post('template_id');
            $class_id = $this->input->post('class_id');
            $section_id = $this->input->post('section_id');
            $studentIDs = $this->input->post('studentIDs');
            $message = $this->input->post('message');

            if(empty($message)){
                $this->session->set_flashdata('alertType','failed' );
                $this->session->set_flashdata('message','Text Message is Empty...' );
                redirect('Sms/sendBulk?'.'template_id='.$template_id);            
            }

            if(empty($studentIDs)){
                $this->session->set_flashdata('alertType','failed' );
                $this->session->set_flashdata('message','Please Select Student at least one studnet..' );
                redirect('Sms/sendBulk?'.'template_id='.$template_id);            
            }

            $textMsg = '';
            foreach ($message as $key => $value) {
                $textMsg .= $value;
            }

            if(strlen($textMsg)>160){
                $this->session->set_flashdata('alertType','failed' );
                $this->session->set_flashdata('message','Text Message Is'.strlen($textMsg).' Characters Long. Maximmum 160 Characters Allowed. Please Reduce Variable lenght.' );
                redirect('Sms/sendBulk?'.'template_id='.$template_id);            
            }

            $this->load->model('Academic_year_model');
            $currentSession = $this->Academic_year_model->check_active_session();

            foreach ($studentIDs as $key => $value) {
                $smsCount = $this->Global_model->get_config_value('smsCount');
                $smsLimit = $this->Global_model->get_config_value('smsLimit');
                if($smsCount != 0 && $smsLimit !=0 && $smsCount < $smsLimit){
                    $this->load->model('Student_model');
                    $studentData = $this->Student_model->get_student($value);

                    $params = [
                        'session_id' =>$currentSession['session_id'],
                        'student_id' => $studentData['student_id'],
                        'template_id' =>$template_id,
                        'mobile_no' => $studentData['mobile_no'],
                        'message' => str_replace("_"," ",$textMsg),
                        'sent' => 0,
                        'created_by' => $this->session->user_id,
                        'statusID' => 1,
                    ];
                    //print_r($params);die();
                    $smslog_id = $this->Sms_model->add_sms($params);
                }else{
                    $this->session->set_flashdata('alertType','failed' );
                    $this->session->set_flashdata('message','Low SMS Balance ! Please Reacharge.' );
                    redirect('Sms/index?'.'template_id='.$template_id);  
                }

            }

            $this->session->set_flashdata('alertType','success' );
            $this->session->set_flashdata('message','Sms Added Successfully.' );
            redirect('Sms/index?'.'template_id='.$template_id);   


        }else{

            $this->load->model('Clas_model');
            $data['all_class'] = $this->Clas_model->get_all_class();
            $data['all_templates'] = $this->Sms_model->get_all_sms_templates();
            $data['content_array'] = [];
            if($this->input->get('template_id') != null){
            $templateData = $this->Sms_model->get_sms_template($this->input->get('template_id'));
            if(!empty($templateData)) $data['content_array'] = explode("{#var#}",$templateData['content']);
            if(!empty($templateData)) $data['description'] = $templateData['valueDesc'];
            }
            $data['_view'] = 'sms/bulk';
            $this->load->view('layouts/main', $data);

        }
        
    }
    
    function sendAll() {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('template_id', 'template_id', 'required|trim|xss_clean');
        $this->form_validation->set_rules('message[]', "message", "trim|xss_clean|max_length[160]");

        if ($this->form_validation->run()) {

            $template_id = $this->input->post('template_id');
            $message = $this->input->post('message');

            if(empty($message)){
                $this->session->set_flashdata('alertType','failed' );
                $this->session->set_flashdata('message','Text Message is Empty...' );
                redirect('Sms/sendAll?'.'template_id='.$template_id);            
            }

            $textMsg = '';
            foreach ($message as $key => $value) {
                $textMsg .= $value;
            }

            if(strlen($textMsg)>160){
                $this->session->set_flashdata('alertType','failed' );
                $this->session->set_flashdata('message','Text Message Is'.strlen($textMsg).' Characters Long. Maximmum 160 Characters Allowed. Please Reduce Variable lenght.' );
                redirect('Sms/sendAll?'.'template_id='.$template_id);            
            }

            $this->load->model('Academic_year_model');
            $currentSession = $this->Academic_year_model->check_active_session();

            $this->load->model('Student_model');
            $studentData = $this->Student_model->get_all_student();

            foreach ($studentData as $key => $value) {
                $smsCount = $this->Global_model->get_config_value('smsCount');
                $smsLimit = $this->Global_model->get_config_value('smsLimit');
                if($smsCount != 0 && $smsLimit !=0 && $smsCount < $smsLimit){
                    $params = [
                        'session_id' =>$currentSession['session_id'],
                        'student_id' =>  $value['student_id'],
                        'template_id' =>$template_id,
                        'mobile_no' =>  $value['mobile_no'],
                        'message' => str_replace("_"," ",$textMsg),
                        'sent' => 0,
                        'created_by' => $this->session->user_id,
                        'statusID' => 1,
                    ];
                    //print_r($params);die();
                    $smslog_id = $this->Sms_model->add_sms($params);

                }else{
                    $this->session->set_flashdata('alertType','failed' );
                    $this->session->set_flashdata('message','Low SMS Balance ! Please Reacharge.' );
                    redirect('Sms/index?'.'template_id='.$template_id);  
                }

            }

            $this->session->set_flashdata('alertType','success' );
            $this->session->set_flashdata('message','Sms Added Successfully.' );
            redirect('Sms/index?'.'template_id='.$template_id);   


        }else{
            $data['all_templates'] = $this->Sms_model->get_all_sms_templates();
            $data['content_array'] = [];
            if($this->input->get('template_id') != null){
            $templateData = $this->Sms_model->get_sms_template($this->input->get('template_id'));
            if(!empty($templateData)) $data['content_array'] = explode("{#var#}",$templateData['content']);
            if(!empty($templateData)) $data['description'] = $templateData['valueDesc'];
            }
            $data['_view'] = 'sms/all';
            $this->load->view('layouts/main', $data);
        }
        
    }
    
    function increamentCounter(){
        $sms = $this->input->post('sms');
        $this->db->set('sms_send','sms_send+'.$sms,false);
        $this->db->update('web_data');
        $obj = new stdClass();
        $obj->status =true;
        echo json_encode($obj);
    }

    // function sendSMS($mobile_no,$message,$template_id){
    //     $smsCount = $this->Global_model->get_config_value('smsCount');
    //     $smsLimit = $this->Global_model->get_config_value('smsLimit');
    //     $smsKey = $this->Global_model->get_config_value('smsKey');
    //     $url = $this->Global_model->get_config_value('smsURL');
    //     $smsUsername = $this->Global_model->get_config_value('smsUsername');
    //     //$smsCount = $this->Global_model->get_config_value($smsCount);
    //     $this->load->library('guzzle');
    //     $client = new GuzzleHttp\Client();
    //     try {
    //         $response = $client->request( 'GET', $url,[ 'query' => ['foo' => 'bar'] ]);
    //         $cleanresult = preg_replace('/[[:cntrl:]]/', '', $response->getBody()->getContents());
    //         $result = json_decode($cleanresult, true);
    //         #guzzle repose for future use
    //         // echo $response->getStatusCode(); // 200
    //         // echo $response->getReasonPhrase(); // OK
    //         // echo $response->getProtocolVersion(); // 1.1
    //         echo $response->getBody();
    //     } catch (GuzzleHttp\Exception\BadResponseException $e) {
    //         #guzzle repose for future use
    //         $response = $e->getResponse();
    //         //$e->getCode();
    //         $cleanresult = preg_replace('/[[:cntrl:]]/', '', $response->getBody()->getContents());
    //         $result = json_decode($cleanresult, true);
            
    //     }

    // }

}
