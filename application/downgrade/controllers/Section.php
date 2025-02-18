<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Section extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Section_model');
    } 

    /*
     * Listing of section
     */
    function index()
    {
        $data['section'] = $this->Section_model->get_all_section();
        
        $data['_view'] = 'section/index';
        $this->load->view('layouts/main',$data);
    }

    /*
     * Adding a new section
     */
    function add()
    {   
        $this->load->library('form_validation');

		$this->form_validation->set_rules('section_name','Section Name','required');
		$this->form_validation->set_rules('class_id','Class Id','required');
//		$this->form_validation->set_rules('teacher_id','Teacher Id','required');
		
		if($this->form_validation->run())     
        {   
            $params = array(
				'class_id' => $this->input->post('class_id'),
				'teacher_id' => $this->input->post('teacher_id'),
				'section_name' => $this->input->post('section_name'),
            );
            
            $section_id = $this->Section_model->add_section($params);
            redirect('section/index');
        }
        else
        {
			$this->load->model('Clas_model');
			$data['all_class'] = $this->Clas_model->get_all_class();

			$this->load->model('Teacher_model');
			$data['all_teacher'] = $this->Teacher_model->get_all_teachers();
            
            $data['_view'] = 'section/add';
            $this->load->view('layouts/main',$data);
        }
    }  

    /*
     * Editing a section
     */
    function edit($section_id)
    {   
        // check if the section exists before trying to edit it
        $data['section'] = $this->Section_model->get_section($section_id);
        
        if(isset($data['section']['section_id']))
        {
            $this->load->library('form_validation');

			$this->form_validation->set_rules('section_name','Section Name','required');
			$this->form_validation->set_rules('class_id','Class Id','required');
			$this->form_validation->set_rules('teacher_id','Teacher Id','required');
		
			if($this->form_validation->run())     
            {   
                $params = array(
					'class_id' => $this->input->post('class_id'),
					'teacher_id' => $this->input->post('teacher_id'),
					'section_name' => $this->input->post('section_name'),
                );

                $this->Section_model->update_section($section_id,$params);            
                redirect('section/index');
            }
            else
            {
				$this->load->model('Clas_model');
				$data['all_class'] = $this->Clas_model->get_all_class();

				$this->load->model('Teacher_model');
				$data['all_teacher'] = $this->Teacher_model->get_all_teachers();

                $data['_view'] = 'section/edit';
                $this->load->view('layouts/main',$data);
            }
        }
        else
            show_error('The section you are trying to edit does not exist.');
    } 

    /*
     * Deleting section
     */
    function remove($section_id)
    {
        $section = $this->Section_model->get_section($section_id);

        // check if the section exists before trying to delete it
        if(isset($section['section_id']))
        {
            $this->Section_model->delete_section($section_id);
            redirect('section/index');
        }
        else
            show_error('The section you are trying to delete does not exist.');
    }
    function getSectionByClass(){
        $class_id = $this->input->post('class_id');
        $result = $this->Section_model->getSectionByClass($class_id);
        echo json_encode($result);
    }
    
}
