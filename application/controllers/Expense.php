<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Expense extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Expense_model');
    } 

    /*
     * Listing of expenses
     */
    function index()
    {
        $data['expenses'] = $this->Expense_model->get_all_expenses();
        
        $data['_view'] = 'expense/index';
        $this->load->view('layouts/main',$data);
    }

    /*
     * Adding a new expense
     */
    function add()
    {   
        $this->load->library('form_validation');

		$this->form_validation->set_rules('expenses_amount','Expenses Amount','required|integer');
		$this->form_validation->set_rules('expenses_name','Expenses Name','required');
		
		if($this->form_validation->run())     
        {   
            $params = array(
				'expenses_name' => $this->input->post('expenses_name'),
				'expenses_amount' => $this->input->post('expenses_amount'),
				'expense_date' => $this->input->post('expense_date'),
            );
            
            $expense_id = $this->Expense_model->add_expense($params);
            redirect('expense/index');
        }
        else
        {            
            $data['_view'] = 'expense/add';
            $this->load->view('layouts/main',$data);
        }
    }  

    /*
     * Editing a expense
     */
    function edit($expenses_id)
    {   
        // check if the expense exists before trying to edit it
        $data['expense'] = $this->Expense_model->get_expense($expenses_id);
        
        if(isset($data['expense']['expenses_id']))
        {
            $this->load->library('form_validation');

			$this->form_validation->set_rules('expenses_amount','Expenses Amount','required|integer');
			$this->form_validation->set_rules('expenses_name','Expenses Name','required');
		
			if($this->form_validation->run())     
            {   
                $params = array(
					'expenses_name' => $this->input->post('expenses_name'),
					'expenses_amount' => $this->input->post('expenses_amount'),
					'expense_date' => $this->input->post('expense_date'),
                );

                $this->Expense_model->update_expense($expenses_id,$params);            
                redirect('expense/index');
            }
            else
            {
                $data['_view'] = 'expense/edit';
                $this->load->view('layouts/main',$data);
            }
        }
        else
            show_error('The expense you are trying to edit does not exist.');
    } 

    /*
     * Deleting expense
     */
    function remove($expenses_id)
    {
        $expense = $this->Expense_model->get_expense($expenses_id);

        // check if the expense exists before trying to delete it
        if(isset($expense['expenses_id']))
        {
            $this->Expense_model->delete_expense($expenses_id);
            redirect('expense/index');
        }
        else
            show_error('The expense you are trying to delete does not exist.');
    }
    
}
