<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Clas extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Clas_model');
    } 

    /*
     * Listing of class
     */
    function index()
    {
        $data['class'] = $this->Clas_model->get_all_class();
        
        $data['_view'] = 'clas/index';
        $this->load->view('layouts/main',$data);
    }

    /*
     * Adding a new clas
     */
    function add()
    {    
        $this->load->library('form_validation');

        //form validation rules
		$this->form_validation->set_rules('class_name','Class Name','required');
		$this->form_validation->set_rules('numeric_name','Numeric Name','required');
		
        //if the form validation is successful
		if($this->form_validation->run())     
        {   
            //prepare the data for insertion
            $params = array(
				'class_name' => $this->input->post('class_name'),
				'numeric_name' => $this->input->post('numeric_name'),
            );
            
            //Add the class to the database
            $clas_id = $this->Clas_model->add_clas($params);
            redirect('clas/index');
        }
        else
        {    
            $data['all_class'] = $this->Clas_model->get_all_class();  // Fetch classes from model        
            $data['_view'] = 'clas/add';
            $this->load->view('layouts/main',$data);
        }
    }  

    /*
     * Editing a clas
     */
    function edit($class_id)
    {   
        // check if the clas exists before trying to edit it
        $data['clas'] = $this->Clas_model->get_clas($class_id);
        
        if(isset($data['clas']['class_id']))
        {
            $this->load->library('form_validation');

			$this->form_validation->set_rules('class_name','Class Name','required');
			$this->form_validation->set_rules('numeric_name','Numeric Name','required');
		
			if($this->form_validation->run())     
            {   
                $params = array(
					'class_name' => $this->input->post('class_name'),
					'numeric_name' => $this->input->post('numeric_name'),
                );

                $this->Clas_model->update_clas($class_id,$params);            
                redirect('clas/index');
            }
            else
            {
                $data['_view'] = 'clas/edit';
                $this->load->view('layouts/main',$data);
            }
        }
        else
            show_error('The clas you are trying to edit does not exist.');
    } 

    /*
     * Deleting clas
     */
    function remove($class_id)
    {
        $clas = $this->Clas_model->get_clas($class_id);

        // check if the clas exists before trying to delete it
        if(isset($clas['class_id']))
        {
            $this->Clas_model->delete_clas($class_id);
            redirect('clas/index');
        }
        else
            show_error('The clas you are trying to delete does not exist.');
    }
    
}
