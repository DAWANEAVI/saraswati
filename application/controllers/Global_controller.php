<?php
class Global_controller extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('Sms_model');
        $this->load->model('Global_model');
    }

    function sendSMS(){
        //Set Global Variables
        $smsCount = $this->Global_model->get_config_value('smsCount');
        $smsLimit = $this->Global_model->get_config_value('smsLimit');
        $smsKey = $this->Global_model->get_config_value('smsKey');
        $headerID = $this->Global_model->get_config_value('headerID');
        $routeName = $this->Global_model->get_config_value('routeName');
        $url = $this->Global_model->get_config_value('smsURL');
        $smsUsername = $this->Global_model->get_config_value('smsUsername');
        // Variable Validations
        if($smsCount == null) {echo json_encode(['message'=>'Global Error Sms Count Missing']);die();}
        if($smsLimit == null) {echo json_encode(['message'=>'Global Error Sms Limit Count Missing']); die();}
        if($smsKey == null) {echo json_encode(['message'=>'Global Error Sms Key Missing']); die();}
        if($headerID == null) {echo json_encode(['message'=>'Global Error Sms headerID Missing']); die();}
        if($routeName == null) {echo json_encode(['message'=>'Global Error Sms routeName Missing']); die();}
        if($url == null) {echo json_encode(['message'=>'Global Error Sms URL Missing']); die();}
        if($smsUsername == null) { echo json_encode(['message'=>'Global Error Sms Username Missing']); die();}
        // Sms Count Validation
        if($smsCount > $smsLimit){ echo json_encode(['message'=>'Sms Acount Balance Is Low Please Recharge.']); die();}

        $smsData = $this->Sms_model->get_unsent_sms();
        if(!empty($smsData)){
            $this->load->library('guzzle');
            $client = new GuzzleHttp\Client();
            foreach ($smsData as $key => $value) {
                $body=[
                    'username' => $smsUsername,
                    'apikey' => $smsKey,
                    'apirequest' => 'Text',
                    'sender' => $headerID,
                    'mobile' =>$value['mobile_no'],
                    'message' =>$value['message'],
                    'route' => $routeName,
                    'TemplateID' =>$value['template_id'],
                    'format' =>'JSON',
                ];

                try {
                    $response = $client->request( 'GET', $url,[ 'query' => $body ]);
                    $statusCode = $response->getStatusCode();
                    $respMsg = $response->getReasonPhrase();

                    if($statusCode == 200){
                        $cleanresult = preg_replace('/[[:cntrl:]]/', '', $response->getBody()->getContents());
                        $result = json_decode($cleanresult, true);
                        $message_id = $error_msg = '';
                        $status = 0;
    
                        if($result['status'] == 'success'){
                            $message_id = $result['message-id'][0];  
                            $status = 1;
                            // Increment Sms Count
                            $this->Global_model->increment_sms_count();
                        }else{
                            $error_msg = $result['message'];
                            $status = 2;
                        }
                        $params = ['sent' => $status,'message_id' => $message_id,'error_message' => $error_msg];
                        //print_r($result);die();
                        $this->Sms_model->update_sms_log($value['slog_id'],$params); 
                    }
                    
                    //$respBody = $response->getBody();
                    #guzzle repose for future use
                    //echo $response->getStatusCode(); // 200
                    echo json_encode(['statusCode' => $response->getStatusCode(),'message' => $response->getReasonPhrase()]); // OK
                    // echo $response->getProtocolVersion(); // 1.1
                    //echo $response->getBody();
                } catch (GuzzleHttp\Exception\BadResponseException $e) {
                    #guzzle repose for future use
                    $response = $e->getResponse();
                    //$e->getCode();
                    $cleanresult = preg_replace('/[[:cntrl:]]/', '', $response->getBody()->getContents());
                    $result = json_decode($cleanresult, true);
                    echo json_encode($response->getReasonPhrase($result));
                    
                }
            } 
        }else{
          echo json_encode(['message'=>'No Data Found']); 
          die();
        }

    }

}
