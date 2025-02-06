<?php 

class Payment_concession extends CI_Controller{
 function __construct()
 {
       parent::__construct();
      $this->load->model('Payment_concession_model');
 } 
 

public function index()
{
  try{
      $this->load->model('Academic_year_model');
      $data['all_sessions'] = $this->Academic_year_model->get_all_session();

      $data['academic_year_data'] = $this->Academic_year_model->check_active_session();
      
      if($this->input->get('session_id') != NULL){
        $data['payment_concession'] = $this->Payment_concession_model->get_all_payment_concession($this->input->get('session_id'));
      }else{
        $data['payment_concession'] = $this->Payment_concession_model->get_all_payment_concession($data['academic_year_data']['session_id']);
      }
      //print_r($data['payment_concession']);die();
      $data['_view'] = 'payment_concession/index';
      $this->load->view('layouts/main',$data);
    } catch (Exception $ex) {
      throw new Exception('Payment_concession Controller : Error in index function - ' . $ex);
  }  
}
 /*
  * Adding a new payment_concession
  */
 function add()
 {  
try{
    if($this->input->get('session_id') && $this->input->get('class_id')) {
        $session_id = $this->input->get('session_id');
        $class_id = $this->input->get('class_id');

        $this->load->library('form_validation');
        if(isset($_POST) && count($_POST) > 0)     
         {  

            // check Duplicate Record
            $Record = $this->Payment_concession_model->check_recod($this->input->post('session_id'),$this->input->post('payment_id'),$this->input->post('student_id'),$this->input->post('class_id'));
            //print_r($this->input->post('session_id').'-'.$this->input->post('payment_id').'-'.$this->input->post('student_id').'-'.$this->input->post('class_id'));die();
            //print_r($Record);die();
            if(!empty($Record)) {
              $this->session->set_flashdata('alertType','failed' );
              $this->session->set_flashdata('message',' Concession Record Already Exsist For this student.' );
              redirect('Payment_concession/index?'.'session_id='.$session_id.'&class_id='.$class_id);
            }

            // if($this->input->post('payment_seq') < 3 && $this->input->post('paid_amount') != $this->input->post('new_total')) {
            //   $this->session->set_flashdata('alertType','failed' );
            //   $this->session->set_flashdata('message','Fees Automation Setup Error.Concession is Before March End. You Must Have To Pay Full Fees.' );
            //   redirect('Payment_concession/index?'.'session_id='.$session_id.'&class_id='.$class_id);
            // }

            if($this->input->post('remaining_fee') < $this->input->post('amount')) {
              $this->session->set_flashdata('alertType','failed' );
              $this->session->set_flashdata('message',' Concession Amount is Not Valid.' );
              redirect('Payment_concession/index?'.'session_id='.$session_id.'&class_id='.$class_id);
            }

            if($this->input->post('student_total') < $this->input->post('new_total')) {
              $this->session->set_flashdata('alertType','failed' );
              $this->session->set_flashdata('message',' Student Total Is Greater then New Total' );
              redirect('Payment_concession/index?'.'session_id='.$session_id.'&class_id='.$class_id);
            }

            if($this->input->post('new_total') < 0) {
              $this->session->set_flashdata('alertType','failed' );
              $this->session->set_flashdata('message',' Invalid New Total' );
              redirect('Payment_concession/index?'.'session_id='.$session_id.'&class_id='.$class_id);
            }

            $this->load->model('Payment_model');
            $this->Payment_model->update_payment($this->input->post('payment_id'), array('total_amount' => $this->input->post('new_total')));
          
            $params = array(
              'session_id'=> $this->input->post('session_id'),
              'payment_id'=> $this->input->post('payment_id'),
              'student_id'=> $this->input->post('student_id'),
              'class_id'=> $this->input->post('class_id'),
              'amount'=> $this->input->post('amount'),
              'statusID'=> 1,
              'inputs'=> json_encode($this->input->post()),
              'created_by'=> $this->session->user_id,
            );
            //print_r($params);die();
            $concID= $this->Payment_concession_model->add_payment_concession($params);
            $this->session->set_flashdata('alertType','success' );
            $this->session->set_flashdata('message',' Concession Added Successfully.' );
            redirect('Payment_concession/index?'.'session_id='.$session_id.'&class_id='.$class_id);
         }
         else
         {   
           $this->load->model('Academic_year_model');
           $data['academic_session'] = $this->Academic_year_model->get_session($session_id);
 
           $this->load->model('Clas_model');
           $data['clas'] = $this->Clas_model->get_clas($class_id);

           $this->load->model('Fee_model');
           $data['fees_data'] = $this->Fee_model->get_class_all_fees($session_id,$class_id);
           //$data['initalFee'] = $this->Fee_model->getInitialFees($session_id,$class_id);

          //  if(empty($data['initalFee'])){
          //   $this->session->set_flashdata('alertType','failed' );
          //   $this->session->set_flashdata('message','class fee not found...' );
          //   redirect('Payment_concession/index');
          //  }
           
           if($this->input->get('student_id')){
            $this->load->model('Student_model');
            $data['students'] = $this->Student_model->get_students_for_consession($session_id,$class_id,$this->input->get('student_id'));
           }else{
            $this->load->model('Student_model');
            $data['students'] = $this->Student_model->get_students_for_consession($session_id,$class_id);
           }
           
           
         }
    }else{
      $this->load->model('Academic_year_model');
      $data['all_sessions'] = $this->Academic_year_model->get_all_session();
      //print_r($data['all_sessions']);die();

      $this->load->model('Clas_model');
      $data['all_class'] = $this->Clas_model->get_all_class();
      
    }
      //print_r($data['students']);die();
      $data['_view'] = 'payment_concession/add';
      $this->load->view('layouts/main',$data);
 
  } catch (Exception $ex) {
    throw new Exception('Payment_concession Controller : Error in add function - ' . $ex);
  }  
 }
 
 function add_old()
 {  
try{
    if($this->input->get('session_id') && $this->input->get('class_id')) {
        $session_id = $this->input->get('session_id');
        $class_id = $this->input->get('class_id');

        $this->load->library('form_validation');
        if(isset($_POST) && count($_POST) > 0)     
         {  

            // check Duplicate Record
            $Record = $this->Payment_concession_model->check_recod($this->input->post('session_id'),$this->input->post('payment_id'),$this->input->post('student_id'),$this->input->post('class_id'));
            //print_r($this->input->post('session_id').'-'.$this->input->post('payment_id').'-'.$this->input->post('student_id').'-'.$this->input->post('class_id'));die();
            //print_r($Record);die();
            if(!empty($Record)) {
              $this->session->set_flashdata('alertType','failed' );
              $this->session->set_flashdata('message',' Concession Record Already Exsist For this student.' );
              redirect('Payment_concession/index?'.'session_id='.$session_id.'&class_id='.$class_id);
            }

            if($this->input->post('payment_seq') < 3 && $this->input->post('paid_amount') != $this->input->post('new_total')) {
              $this->session->set_flashdata('alertType','failed' );
              $this->session->set_flashdata('message','Fees Automation Setup Error.Concession is Before March End. You Must Have To Pay Full Fees.' );
              redirect('Payment_concession/index?'.'session_id='.$session_id.'&class_id='.$class_id);
            }

            $this->Payment_model->update_payment($payment_id, array('total_amount' => $this->input->post('new_total')));
          
            $params = array(
              'session_id'=> $this->input->post('session_id'),
              'payment_id'=> $this->input->post('payment_id'),
              'student_id'=> $this->input->post('student_id'),
              'class_id'=> $this->input->post('class_id'),
              'amount'=> $this->input->post('amount'),
              'statusID'=> 1,
              'inputs'=> json_encode($this->input->post()),
              'created_by'=> $this->session->user_id,
            );
            //print_r($params);die();
            $concID= $this->Payment_concession_model->add_payment_concession($params);
            $this->session->set_flashdata('alertType','success' );
            $this->session->set_flashdata('message',' Concession Added Successfully.' );
            redirect('Payment_concession/index?'.'session_id='.$session_id.'&class_id='.$class_id);
         }
         else
         {   
           $this->load->model('Academic_year_model');
           $data['academic_session'] = $this->Academic_year_model->get_session($session_id);
 
           $this->load->model('Clas_model');
           $data['clas'] = $this->Clas_model->get_clas($class_id);

           $this->load->model('Fee_model');
           $data['initalFee'] = $this->Fee_model->getInitialFees($session_id,$class_id);

           if(empty($data['initalFee'])){
            $this->session->set_flashdata('alertType','failed' );
            $this->session->set_flashdata('message','class fee not found...' );
            redirect('Payment_concession/index');
           }
           
           if($this->input->get('student_id')){
            $this->load->model('Student_model');
            $data['students'] = $this->Student_model->get_students_for_consession($session_id,$class_id,$this->input->get('student_id'));
           }else{
            $this->load->model('Student_model');
            $data['students'] = $this->Student_model->get_students_for_consession($session_id,$class_id);
           }
           
           //print_r($data['students']);die();
           $data['_view'] = 'payment_concession/add';
           $this->load->view('layouts/main',$data);
         }
    }else{
      $this->session->set_flashdata('alertType','failed' );
      $this->session->set_flashdata('message','Session or Class ID Not Set....' );
      redirect('Payment_concession/index');
    }
 
  } catch (Exception $ex) {
    throw new Exception('Payment_concession Controller : Error in add function - ' . $ex);
  }  
 }  
  /*
  * Editing a payment_concession
 */
 public function edit($concID)
 {   
  try{
   $data['payment_concession'] = $this->Payment_concession_model->get_payment_concession($concID);
       $this->load->library('upload');
       $this->load->library('form_validation');
     if(isset($data['payment_concession']['concID']))
      {
        $params = array(
           'session_id'=> $this->input->post('session_id'),
           'payment_id'=> $this->input->post('payment_id'),
           'student_id'=> $this->input->post('student_id'),
           'class_id'=> $this->input->post('class_id'),
           'amount'=> $this->input->post('amount'),
           'statusID'=> $this->input->post('statusID'),
           'created_by'=> $this->input->post('created_by'),
           'created_at'=> $this->input->post('created_at'),
           'modified_by'=> $this->input->post('modified_by'),
           'modified_at'=> $this->input->post('modified_at'),
        );
          if(isset($_POST) && count($_POST) > 0)     
           {  
           $this->Payment_concession_model->update_payment_concession($concID,$params);
             $this->session->set_flashdata('alert_msg','<div class="alert alert-success text-center">Succesfully updated.</div>');
                redirect('payment_concession/index');
           }
           else
          {
              $data['_view'] = 'payment_concession/edit';
              $this->load->view('layouts/main',$data);
          }
  }
  else
  show_error('The payment_concession you are trying to edit does not exist.');
  } catch (Exception $ex) {
    throw new Exception('Payment_concession Controller : Error in edit function - ' . $ex);
  }  
} 
/*
  * Deleting payment_concession
  */
  function remove($concID)
   {
    try{
      $payment_concession = $this->Payment_concession_model->get_payment_concession($concID);
  // check if the payment_concession exists before trying to delete it
       if(isset($payment_concession['concID']))
       {
         $this->Payment_concession_model->delete_payment_concession($concID);
             $this->session->set_flashdata('alert_msg','<div class="alert alert-success text-center">Succesfully Removed.</div>');
           redirect('payment_concession/index');
       }
       else
       show_error('The payment_concession you are trying to delete does not exist.');
  } catch (Exception $ex) {
    throw new Exception('Payment_concession Controller : Error in remove function - ' . $ex);
  }  
  }
  /*
  * View more a payment_concession
 */
 public function view_more($concID)
 {   
try{
   $data['payment_concession'] = $this->Payment_concession_model->get_payment_concession($concID);
     if(isset($data['payment_concession']['concID']))
      {
              $data['_view'] = 'payment_concession/view_more';
              $this->load->view('layouts/main',$data);
      }
      else
        show_error('The payment_concession you are trying to view more does not exist.');
    } catch (Exception $ex) {
    throw new Exception('Payment_concession Controller : Error in View more function - ' . $ex);
  }  
} 
 /*
* Listing of payment_concession
 */
public function search_by_clm()
{
    $column_name= $this->input->post('column_name');
    $value_id= $this->input->post('value_id');
     $data['noof_page'] = 0;
     $params = array();
    $data['payment_concession'] = $this->Payment_concession_model->get_all_payment_concession_by_cat($column_name,$value_id);
      $data['_view'] = 'payment_concession/index';
      $this->load->view('layouts/main',$data);
}
 /*
* get search values by column- payment_concession
 */
public function get_search_values_by_clm()
{
    $clm_name= $this->input->post('clm_name');
    $value= $this->input->post('value');
    $id= $this->input->post('id');
        $params = array(
        $clm_name=>$value,
        );
           $this->Payment_concession_model->update_payment_concession($id,$params);
   $data['noof_page'] = 0;
  $data['payment_concession'] = $this->Payment_concession_model->get_all_payment_concession();
  $this->load->view('payment_concession/index',$data);
}
 }
