<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Site
 *
 * @author durga it
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
        $data['topper'] = $this->Topper_model->get_all_toppers();
        $data['primary_techer'] = $this->Teacher_model->get_all_teacher('primary techer');     
        $data['secondary'] = $this->Teacher_model->get_all_teacher('secondary teacher');     
        $data['preprimary'] = $this->Teacher_model->get_all_teacher('pre primary teacher');     
        $data['account'] = $this->Teacher_model->get_all_teacher('account');     
        $data['helper'] = $this->Teacher_model->get_all_teacher('helper');     
        $data['security'] = $this->Teacher_model->get_all_teacher('security');     
        $data['gallery'] = $this->Gallery_model->get_home_page_gallery();
        $this->load->view('site/welcome',$data);
    }
    function about(){
        $data['manage'] = $this->Management_model->get_all_management();
        $this->load->view('site/about',$data);
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
        $this->load->view('site/gallery',$data);
    }
    function contacts(){
        $this->load->view('site/contacts');
    }
    
    function send_msg(){
       
        $this->load->library('form_validation');
        $this->form_validation->set_rules('name','Name','required');
        $this->form_validation->set_rules('email','Email','required');
        $this->form_validation->set_rules('subject','Subject','required');
        $this->form_validation->set_rules('message','Message','required');
        if($this->form_validation->run()==true){
            
             $this->load->library('email');
             
             $this->email->to("oxfordesm@gmail.com");
             $this->email->from("noreply@oesmouda.com");
             $this->email->subject('Email From Website');
             $this->email->message('Hi You have msg from '.$this->input->post('name').' Having Subject'.$this->input->post('subject').' And msg is'.$this->input->post('message').' You can contact on email '.$this->input->post('email'));
             //Send mail
         if($this->email->send())
            $data['msg']="Congragulation Email Send Successfully.";
          else
             $data['msg']="You have encountered an error";
             
           
           $this->load->view('site/contacts',$data);  
        }else{
            $this->load->view('site/contacts'); 
        }
        
    }
}
