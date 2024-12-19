<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Site extends CI_Controller{
    //put your code here
    function __construct() {
        parent::__construct();
        $this->load->model('Topper_model');
        $this->load->model('Teacher_model');
        $this->load->model('Gallery_model');
        $this->load->model('Management_model');
    }
    function index(){
        $data['gallery_data'] = $this->Gallery_model->get_all_gallery_home();
        $this->load->view('site/include/header');
        $this->load->view('site/index',$data);
        $this->load->view('site/include/footer');
        //print_r(site_url());die();
        //$this->load->view('site/welcome');
    }
    function about(){
        $data['manage'] = $this->Management_model->get_all_management();
        $this->load->view('site/include/header');
        $this->load->view('site/aboutus',$data);
        $this->load->view('site/include/footer');
    }
    function gallery(){
         $gallery_data = $this->Gallery_model->get_all_gallery();
         $images = array();
         $title = array();
         foreach ($gallery_data as $k=>$v){
             $inside_array = json_decode($v['image']);
             foreach ($inside_array as $a=>$b){
                 array_push($images, $b);
                 array_push($title,$v['title']);
             }
         }
       $data['gallery'] = $images;
       $data['gallery_data'] = $gallery_data;
       $data['title']=$title;
        $this->load->view('site/include/header');
        $this->load->view('site/galleryn',$data);
        $this->load->view('site/include/footer');
    }
    function contacts(){
        $this->load->view('site/include/header');
        $this->load->view('site/contact');
        $this->load->view('site/include/footer');
    }
    
    function send_msg(){
       
        $this->load->library('form_validation');
        $this->form_validation->set_rules('name','Name','required');
        $this->form_validation->set_rules('email','Email','required');
        $this->form_validation->set_rules('subject','Subject','required');
        $this->form_validation->set_rules('message','Message','required');
        if($this->form_validation->run()==true){
            
            // Load PHPMailer library
            $this->load->library('phpmailer_lib');

            // PHPMailer object
            $mail = $this->phpmailer_lib->load();

            // SMTP configuration
            $mail->isSMTP();
            $mail->Host = 'smtp.hostinger.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'noreply@rrcwanadongri.in';
            $mail->Password = 'Rrcw@123';
            $mail->SMTPSecure = 'ssl';
            $mail->Port = 465;

            $mail->setFrom('noreply@rrcwanadongri.in', 'Red Rose Convent Wanadongri');
            $mail->addReplyTo('info@rrcwanadongri.in', 'Red Rose Convent Wanadongri');
    
            // Add a recipient
            $mail->addAddress('info@rrcwanadongri.in');

            // Email subject
            $mail->Subject = 'Enquiry From Website';

            // Set email format to HTML
            $mail->isHTML(true);

            // Email body content
            $mailContent = '<div>
            <p>'.ucfirst($this->input->post('name')).' Has Submitted Enquiry Form.</p>
            <p><b>Name:</b> '.$this->input->post('name').'</p>
            <p><b>Email:</b> '.$this->input->post('email').'</p>
            <p><b>Mobile:</b> '.$this->input->post('number').'</p>
            <p><b>Subject:</b> '.$this->input->post('subject').'</p>
            <p><b>Message:</b> '.$this->input->post('message').'</p>
            </div>';
            $mail->Body = $mailContent; 
             //Send mail
         if($mail->send()){
            $this->session->set_flashdata('alertType','success' );
            $this->session->set_flashdata('message','Enquiry Email Send Successfully.' );
         }else{
            $this->session->set_flashdata('alertType','failed' );
            $this->session->set_flashdata('message','Unable To Send Enquiry Email.' );
         }
         redirect('/site/contacts'); 
        }else{
            redirect('/site/contacts'); 
        }
        
    }

    function admission(){
        $this->load->view('site/include/header');
        $this->load->view('site/admission');
        $this->load->view('site/include/footer');
    }

    function email(){
        redirect('https://mail.hostinger.com'); 
    }
}
