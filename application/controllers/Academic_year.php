<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Academic_year extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Academic_year_model');
    }

    /*
     * Listing of AY
     */
    function index()
    {
        
        $data['session_data'] = $this->Academic_year_model->get_all_session();
        $data['_view'] = 'academic_year/index';
        //print_r($data['_view']);
        $this->load->view('layouts/main',$data);
    }


    function add()
    {   
        $this->load->library('form_validation');

		$this->form_validation->set_rules('session','Academic Year','required|is_unique[academic_session.session]');
        $this->form_validation->set_message('is_unique', 'The Academic Year is already Exists');
		//$this->form_validation->set_rules('is_running','Current Year Status','required');
		
		if($this->form_validation->run())     
        {   
            if($this->input->post('is_running')){
                $is_active_session = $this->Academic_year_model->check_active_session();
                //print_r($is_active_session['session']);die();
                if(count($is_active_session)){
                    $this->session->set_flashdata('alertType','failed' );
                    $this->session->set_flashdata('message','Academic Year '.$is_active_session['session'].' is already set as current  plz change it..' );
                    redirect('academic_year/index');
                }
                
            }
            $params = array(
                'session' => $this->input->post('session'),
                'is_running' => $this->input->post('is_running') ? $this->input->post('is_running') : 0,
                'status' => 1,
            );
            //print_r($params);die();
            
            $clas_id = $this->Academic_year_model->add_session($params);
            $this->session->set_flashdata('alertType','success' );
            $this->session->set_flashdata('message','Academic Year '.$this->input->post('session').' is added successfully.' );
            redirect('academic_year/index');
           
            
        }
        else
        {            
            $data['_view'] = 'academic_year/add';
            $this->load->view('layouts/main',$data);
        }
    }  

    /*
     * Editing a clas
     */
    function edit($session_id)
    {   
        // check if the clas exists before trying to edit it
        $data['academic_session'] = $this->Academic_year_model->get_session($session_id);
        
        if(isset($data['academic_session']['session_id']))
        {
            $this->load->library('form_validation');

			$this->form_validation->set_rules('session','Academic Year','required');
            //$this->form_validation->set_message('is_unique', 'The Academic Year is already Exisist');
		
			if($this->form_validation->run())     
            { 
                if($this->input->post('is_running')){
                    $is_active_session = $this->Academic_year_model->check_active_session();
                    //print_r($is_active_session);die();
                    if($is_active_session){
                        if($is_active_session['session_id'] != $data['academic_session']['session_id']){
                            $this->session->set_flashdata('alertType','failed' );
                            $this->session->set_flashdata('message','Academic Year '.$is_active_session['session'].' is already set as current  plz change it..' );
                            redirect('academic_year/index');
                        }
                    } 
                }
                $sessionResult = $this->Academic_year_model->check_session_by_value($this->input->post('session'));
                if(count($sessionResult)){
                    if($sessionResult['session_id'] !=$data['academic_session']['session_id']){
                        $this->session->set_flashdata('alertType','failed' );
                        $this->session->set_flashdata('message','Academic Year '.$this->input->post('session').' is already exsist plz check.' );
                        redirect('academic_year/index');
                    } 
                }
                 
                $params = array(
					'session' => $this->input->post('session'),
                    'is_running' => $this->input->post('is_running') ? $this->input->post('is_running') : 0,
                );

                $this->Academic_year_model->update_session($session_id,$params);            
                $this->session->set_flashdata('alertType','success' );
                $this->session->set_flashdata('message','Academic Year '.$this->input->post('session').' is Updated Successfully.' );
                redirect('academic_year/index');
            }
            else
            {
                $data['_view'] = 'academic_year/edit';
                $this->load->view('layouts/main',$data);
            }

        }else{
            $this->session->set_flashdata('alertType','failed' );
            $this->session->set_flashdata('message','Academic Year Not Found that you are trying to edit.' );
            redirect('academic_year/index');
        }
    } 

    /*
     * Deleting clas
     */
    // function remove($class_id)
    // {
    //     $clas = $this->Clas_model->get_clas($class_id);

    //     // check if the clas exists before trying to delete it
    //     if(isset($clas['class_id']))
    //     {
    //         $this->Clas_model->delete_clas($class_id);
    //         redirect('clas/index');
    //     }
    //     else
    //         show_error('The clas you are trying to delete does not exist.');
    // }

}