<?php 
/*
 Generated by Manuigniter v2.0 
 www.manuigniter.com
*/
class Exam_Heads extends CI_Controller{
 function __construct()
 {
       parent::__construct();
      $this->load->model('Exam_Heads_model');
 } 
 /*
* Listing of exam_Heads
 */
public function index()
{
  try{
      $data['noof_page'] = 0;
      $data['exam_Heads'] = $this->Exam_Heads_model->get_all_exam_Heads();
      $data['_view'] = 'exam_Heads/index';
      $this->load->view('layouts/main',$data);
    } catch (Exception $ex) {
      throw new Exception('Exam_Heads Controller : Error in index function - ' . $ex);
  }  
}
 /*
  * Adding a new exam_Heads
  */
 function add()
 {  
try{
      $params = array(
       'examName'=> $this->input->post('examName'),
       'statusID'=> $this->input->post('statusID'),
       'created_by' => $this->session->user_id,
        );
        //print_r($params);die();
       $this->load->library('upload');
       $this->load->library('form_validation');
       $this->form_validation->set_rules('examName','Exam Title','required');
       $this->form_validation->set_rules('statusID','Status','required');
        if($this->form_validation->run())  
        {  
            $checkRecord = $this->Exam_Heads_model->check_recod($this->input->post('examName'));
            if($checkRecord){
              $this->session->set_flashdata('alertType','failed' );
              $this->session->set_flashdata('message','Exam Title Already Exist.' );
              redirect('exam_Heads/index');
            }
            $exHeadID = $this->Exam_Heads_model->add_exam_Heads($params);
            $this->session->set_flashdata('alertType','success' );
            $this->session->set_flashdata('message','Exam Title Added Successfully.' );
            redirect('exam_Heads/index');
        }
        else
        { 
           $data['_view'] = 'exam_Heads/add';
            $this->load->view('layouts/main',$data);
        }
  } catch (Exception $ex) {
    throw new Exception('Exam_Heads Controller : Error in add function - ' . $ex);
  }  
 }  
  /*
  * Editing a exam_Heads
 */
 public function edit($exHeadID)
 {   
  try{
   $data['exam_Heads'] = $this->Exam_Heads_model->get_exam_Heads($exHeadID);
       $this->load->library('upload');
       $this->load->library('form_validation');
     if(isset($data['exam_Heads']['exHeadID']))
      {
          $params = array(
            'examName'=> $this->input->post('examName'),
            'statusID'=> $this->input->post('statusID'),
            'modified_by' => $this->session->user_id,
          );
          $this->form_validation->set_rules('examName','exam title','required');
          $this->form_validation->set_rules('statusID','statusID','required');

         if($this->form_validation->run())  
           {  
            $checkRecord = $this->Exam_Heads_model->check_recod($this->input->post('examName'));
            //print_r($checkRecord['exHeadID']);die();
            if(isset($checkRecord['exHeadID']) && $checkRecord['exHeadID'] != $data['exam_Heads']['exHeadID']){
              $this->session->set_flashdata('alertType','failed' );
              $this->session->set_flashdata('message','Exam Title Already Exist.' );
              redirect('exam_Heads/index');
            }
           $this->Exam_Heads_model->update_exam_Heads($exHeadID,$params);
           $this->session->set_flashdata('alertType','success' );
           $this->session->set_flashdata('message','Exam Title Added Successfully.' );
           redirect('exam_Heads/index');
           }
           else
          {
            $data['_view'] = 'exam_Heads/edit';
            $this->load->view('layouts/main',$data);
          }
  }
  else
  show_error('The exam_Heads you are trying to edit does not exist.');
  } catch (Exception $ex) {
    throw new Exception('Exam_Heads Controller : Error in edit function - ' . $ex);
  }  
} 
/*
  * Deleting exam_Heads
  */
  function remove($exHeadID)
   {
    try{
      $exam_Heads = $this->Exam_Heads_model->get_exam_Heads($exHeadID);
  // check if the exam_Heads exists before trying to delete it
       if(isset($exam_Heads['exHeadID']))
       {
         $this->Exam_Heads_model->delete_exam_Heads($exHeadID);
         $this->session->set_flashdata('alertType','success' );
         $this->session->set_flashdata('message','Exam Title Added Successfully.' );
         redirect('exam_Heads/index');
       }
       else
       show_error('The exam_Heads you are trying to delete does not exist.');
  } catch (Exception $ex) {
    throw new Exception('Exam_Heads Controller : Error in remove function - ' . $ex);
  }  
  }
  /*
  * View more a exam_Heads
 */
 public function view_more($exHeadID)
 {   
try{
   $data['exam_Heads'] = $this->Exam_Heads_model->get_exam_Heads($exHeadID);
     if(isset($data['exam_Heads']['exHeadID']))
      {
              $data['_view'] = 'exam_Heads/view_more';
              $this->load->view('layouts/main',$data);
      }
      else
        show_error('The exam_Heads you are trying to view more does not exist.');
    } catch (Exception $ex) {
    throw new Exception('Exam_Heads Controller : Error in View more function - ' . $ex);
  }  
} 
 /*
* Listing of exam_Heads
 */
public function search_by_clm()
{
    $column_name= $this->input->post('column_name');
    $value_id= $this->input->post('value_id');
     $data['noof_page'] = 0;
     $params = array();
    $data['exam_Heads'] = $this->Exam_Heads_model->get_all_exam_Heads_by_cat($column_name,$value_id);
      $data['_view'] = 'exam_Heads/index';
      $this->load->view('layouts/main',$data);
}
 /*
* get search values by column- exam_Heads
 */
public function get_search_values_by_clm()
{
    $clm_name= $this->input->post('clm_name');
    $value= $this->input->post('value');
    $id= $this->input->post('id');
        $params = array(
        $clm_name=>$value,
        );
           $this->Exam_Heads_model->update_exam_Heads($id,$params);
   $data['noof_page'] = 0;
  $data['exam_Heads'] = $this->Exam_Heads_model->get_all_exam_Heads();
  $this->load->view('exam_Heads/index',$data);
}
 }