<?php 

class Exam_subjects extends CI_Controller{
 function __construct()
 {
       parent::__construct();
      $this->load->model('Exam_subjects_model');
 } 
 /*
 * Listing of exam_subjects
 */
public function index()
{
  try{
      $data['noof_page'] = 0;
      $data['exam_subjects'] = $this->Exam_subjects_model->get_all_exam_subjects();
      $data['_view'] = 'exam_subjects/index';
      $this->load->view('layouts/main',$data);
    } catch (Exception $ex) {
      throw new Exception('Exam_subjects Controller : Error in index function - ' . $ex);
  }  
}
 /*
  * Adding a new exam_subjects
  */
 function add()
 {  
  try{
        $params = array(
        'subjectName'=> $this->input->post('subjectName'),
        'created_by' => $this->session->user_id,
        'statusID'=> 1,
          );
        $this->load->library('upload');
        $this->load->library('form_validation');
        $this->form_validation->set_rules('subjectName','Subject Name','required');
          if($this->form_validation->run())  
          {  
              $checkRecord = $this->Exam_subjects_model->check_recod($this->input->post('subjectName'));
              if($checkRecord){
                $this->session->set_flashdata('alertType','failed' );
                $this->session->set_flashdata('message','Subject Name Already Exist.' );
                redirect('exam_subjects/index');
              }
              $subjectID= $this->Exam_subjects_model->add_exam_subjects($params);
              $this->session->set_flashdata('alertType','success' );
              $this->session->set_flashdata('message','Subject Added Successfully.' );
              redirect('exam_subjects/index');
          }
          else
          { 
            $data['_view'] = 'exam_subjects/add';
              $this->load->view('layouts/main',$data);
          }
    } catch (Exception $ex) {
      throw new Exception('Exam_subjects Controller : Error in add function - ' . $ex);
    }  
 }  
  /*
  * Editing a exam_subjects
 */
 public function edit($subjectID)
 {   
  try{
      $data['exam_subjects'] = $this->Exam_subjects_model->get_exam_subjects($subjectID);
      $this->load->library('upload');
      $this->load->library('form_validation');
      if(isset($data['exam_subjects']['subjectID']))
      {
          $params = array(
            'subjectName'=> $this->input->post('subjectName'),
            'statusID'=> 1,
            'modified_by' => $this->session->user_id,
          );
         $this->form_validation->set_rules('subjectName','subjectName','required');
         if($this->form_validation->run())  
           {  
              $checkRecord = $this->Exam_subjects_model->check_recod($this->input->post('subjectName'));
              if(isset($checkRecord['subjectID']) && $checkRecord['subjectID'] != $data['exam_subjects']['subjectID']){
                $this->session->set_flashdata('alertType','failed' );
                $this->session->set_flashdata('message','Subject Already Exist.' );
                redirect('exam_subjects/index');
              }

              $this->Exam_subjects_model->update_exam_subjects($subjectID,$params);
              $this->session->set_flashdata('alertType','success' );
              $this->session->set_flashdata('message','Subject Edited Successfully.' );
              redirect('exam_subjects/index');
           }
           else
          {
              $data['_view'] = 'exam_subjects/edit';
              $this->load->view('layouts/main',$data);
          }
  }
  else
  show_error('The exam_subjects you are trying to edit does not exist.');
  } catch (Exception $ex) {
    throw new Exception('Exam_subjects Controller : Error in edit function - ' . $ex);
  }  
} 
/*
  * Deleting exam_subjects
  */
  function remove($subjectID)
   {
    try{
      $exam_subjects = $this->Exam_subjects_model->get_exam_subjects($subjectID);
  // check if the exam_subjects exists before trying to delete it
       if(isset($exam_subjects['subjectID']))
       {
         $this->Exam_subjects_model->delete_exam_subjects($subjectID);
         $this->session->set_flashdata('alertType','success' );
         $this->session->set_flashdata('message','Subject Deleted Successfully.' );
         redirect('exam_subjects/index');
       }
       else
       show_error('The exam_subjects you are trying to delete does not exist.');
  } catch (Exception $ex) {
    throw new Exception('Exam_subjects Controller : Error in remove function - ' . $ex);
  }  
  }
  /*
  * View more a exam_subjects
 */
 public function view_more($subjectID)
 {   
try{
   $data['exam_subjects'] = $this->Exam_subjects_model->get_exam_subjects($subjectID);
     if(isset($data['exam_subjects']['subjectID']))
      {
              $data['_view'] = 'exam_subjects/view_more';
              $this->load->view('layouts/main',$data);
      }
      else
        show_error('The exam_subjects you are trying to view more does not exist.');
    } catch (Exception $ex) {
    throw new Exception('Exam_subjects Controller : Error in View more function - ' . $ex);
  }  
} 
 /*
* Listing of exam_subjects
 */
public function search_by_clm()
{
    $column_name= $this->input->post('column_name');
    $value_id= $this->input->post('value_id');
     $data['noof_page'] = 0;
     $params = array();
    $data['exam_subjects'] = $this->Exam_subjects_model->get_all_exam_subjects_by_cat($column_name,$value_id);
      $data['_view'] = 'exam_subjects/index';
      $this->load->view('layouts/main',$data);
}
 /*
* get search values by column- exam_subjects
 */
public function get_search_values_by_clm()
{
    $clm_name= $this->input->post('clm_name');
    $value= $this->input->post('value');
    $id= $this->input->post('id');
        $params = array(
        $clm_name=>$value,
        );
           $this->Exam_subjects_model->update_exam_subjects($id,$params);
   $data['noof_page'] = 0;
  $data['exam_subjects'] = $this->Exam_subjects_model->get_all_exam_subjects();
  $this->load->view('exam_subjects/index',$data);
}
 }
