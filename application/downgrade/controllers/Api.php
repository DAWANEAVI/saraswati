<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Ajax_call
 *
 * @author Technopride
 */
class Api extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('Enquiry_model');
        $this->load->model('User_model');
        $this->load->model('Crud_model');
        $this->load->model('College_model');
    }
    
    function getStartPageOption() {
        $obj = new stdClass();
        $obj->status = false;
        $obj->msg = "Something Went Wrong.";
        $obj->data['stream'] = $this->Crud_model->getAllStreams();
        $obj->data['state'] = $this->Crud_model->getAllStates();
        echo json_encode($obj);
    }
    
    function getCourseByStream(){
         $obj = new stdClass();
        $obj->status = false;
        $obj->msg = "Something Went Wrong.";
        $stream_id = $this->input->post('stream');
        $obj->data['courses'] = $this->Crud_model->getAllCourseByStream($stream_id);
        echo json_encode($obj);
    }
    function getCityByState(){
         $obj = new stdClass();
        $obj->status = false;
        $obj->msg = "Something Went Wrong.";
        $state = $this->input->post('state');
        $obj->data['cities'] = $this->Crud_model->getAllCityByState($state);
        echo json_encode($obj);
    }
    
    function getCollegesByFilter(){
        $obj = new stdClass();
        $obj->status = false;
        $obj->msg = "Something Went Wrong.";
        $state = $this->input->post('state');
        $city = $this->input->post('city');
        $course = $this->input->post('course');
        $stream = $this->input->post('stream');
        
        $obj->data['colleges'] = $this->College_model->getCollegesByFilter($state,$city,$stream,$course);
        echo json_encode($obj);
        
    }
    
    function getCollegeRating(){
         $obj = new stdClass();
        $obj->status = false;
        $obj->msg = "Something Went Wrong.";
        $college_id = $this->input->post('college_id');
         $obj->data['rating'] = $this->College_model->getCollegeReviews($college_id);
          echo json_encode($obj);
    }
        function getSubstreamByCourse(){
        $obj = new stdClass();
        $obj->status = false;
        $obj->msg = "Something Went Wrong.";
        $course = $this->input->post('course');
        $obj->data['course'] = $this->Crud_model->getSubstreamByCourse($course);
        echo json_encode($obj); 
    }
    
    
}