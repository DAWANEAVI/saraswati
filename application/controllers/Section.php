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
        $this->load->model('Clas_model');
        $this->load->model('Student_model');
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
            //Retrieve form inputs
            $class_id = $this->input->post('class_id');
            $section_name = strtoupper($this->input->post('section_name')); // Ensure consistent capitalization

             // Check or load if the section name already exists for the class(i.e load the Section _model and check for duplicates)
        $this->load->model('Section_model'); // Ensure Section_model is loaded
        $existing_section = $this->Section_model->check_duplicate_section($class_id, $section_name);

        if ($existing_section) {
            // Flash error message and redirect back to the add form
            $this->session->set_flashdata('error', 'This section already exists for the selected class.');
            redirect('section/add');
        } 
        else 
        {
            // Parameters for insertion
            $params = array(
                'class_id' => $class_id,
                'teacher_id' => $this->input->post('teacher_id'),
                'section_name' => $section_name,
            );


            /*$params = array(
				'class_id' => $this->input->post('class_id'),
				'teacher_id' => $this->input->post('teacher_id'),
				'section_name' => $this->input->post('section_name'),
            ); */
            
           /* $section_id = $this->Section_model->add_section($params);
            redirect('section/index'); */
            // Insert the section
            $this->Section_model->add_section($params);
            
            // Flash success message and redirect to index
            $this->session->set_flashdata('success', 'Section added successfully.');
            redirect('section/index');
        }
    }
        else
        {  
            //load data for classes and teachers
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

        //validate input
        if (!$class_id) {
            echo json_encode(['error' => 'Invalid class ID']);
            return;
        }
       // $this->load->model('Section_model');// load the model
        $section = $this->Section_model->getSectionByClass($class_id);
       //check if section exist
       if ($section) {
        echo json_encode($section); // Return sections as JSON
    } else {
        echo json_encode([]); // Return an empty array if no sections found
    }
    }

    
    
}