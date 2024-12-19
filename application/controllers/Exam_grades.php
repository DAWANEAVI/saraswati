<?php 

class Exam_grades extends CI_Controller{
 function __construct()
 {
       parent::__construct();
      $this->load->model('Exam_grades_model');
 } 
 
  public function index()
  {
    try{
        $data['noof_page'] = 0;
        $data['exam_grades'] = $this->Exam_grades_model->get_all_exam_grades();
        $data['_view'] = 'exam_grades/index';
        $this->load->view('layouts/main',$data);
      } catch (Exception $ex) {
        throw new Exception('Exam_grades Controller : Error in index function - ' . $ex);
    }  
  }

 function add()
 {  
try{
      $params = array(
       'grade'=> $this->input->post('grade'),
       'min_grade_range'=> $this->input->post('min_grade_range'),
       'max_grade_range'=> $this->input->post('max_grade_range'),
       'class_id'=> $this->input->post('class_id') ? $this->input->post('class_id') : 0,
       'remark'=> $this->input->post('remark'),
       'created_by' => $this->session->user_id,
       'statusID'=> 1,
        );
       $this->load->library('upload');
       $this->load->library('form_validation');
       if(isset($_POST) && count($_POST) > 0)     
        {  
            $checkRecord = $this->Exam_grades_model->check_recod($this->input->post('grade'));
            if($checkRecord){
              $this->session->set_flashdata('alertType','failed' );
              $this->session->set_flashdata('message','Grade Already Exist.' );
              redirect('exam_grades/index');
            }
            $gradeID= $this->Exam_grades_model->add_exam_grades($params);
            $this->session->set_flashdata('alertType','success' );
            $this->session->set_flashdata('message','Grades Added Successfully.' );
            redirect('exam_grades/index');
        }
        else
        { 
           $data['_view'] = 'exam_grades/add';
            $this->load->view('layouts/main',$data);
        }
  } catch (Exception $ex) {
    throw new Exception('Exam_grades Controller : Error in add function - ' . $ex);
  }  
 }  
  /*
  * Editing a exam_grades
 */
 public function edit($gradeID)
 {   
  try{
   $data['exam_grades'] = $this->Exam_grades_model->get_exam_grades($gradeID);
       $this->load->library('upload');
       $this->load->library('form_validation');
     if(isset($data['exam_grades']['gradeID']))
      {
        $params = array(
           'grade'=> $this->input->post('grade'),
           'min_grade_range'=> $this->input->post('min_grade_range'),
           'max_grade_range'=> $this->input->post('max_grade_range'),
           'class_id'=> $this->input->post('class_id') ? $this->input->post('class_id') : 0,
           'remark'=> $this->input->post('remark'),
           'statusID'=> $this->input->post('statusID') ? $this->input->post('statusID') : 1,
           'modified_by' => $this->session->user_id,
        );
          if(isset($_POST) && count($_POST) > 0)     
           {  
            $checkRecord = $this->Exam_grades_model->check_recod($this->input->post('grade'));
            if(isset($checkRecord['gradeID']) && $checkRecord['gradeID'] != $data['exam_grades']['gradeID']){
              $this->session->set_flashdata('alertType','failed' );
              $this->session->set_flashdata('message','Grade Already Exist.' );
              redirect('exam_grades/index');
            }
            $this->Exam_grades_model->update_exam_grades($gradeID,$params);
            $this->session->set_flashdata('alertType','success' );
            $this->session->set_flashdata('message','Grades Added Successfully.' );
            redirect('exam_grades/index');
           }
           else
          {
              $data['_view'] = 'exam_grades/edit';
              $this->load->view('layouts/main',$data);
          }
  }
  else
  show_error('The exam_grades you are trying to edit does not exist.');
  } catch (Exception $ex) {
    throw new Exception('Exam_grades Controller : Error in edit function - ' . $ex);
  }  
} 
/*
  * Deleting exam_grades
  */
  function remove($gradeID)
   {
    try{
      $exam_grades = $this->Exam_grades_model->get_exam_grades($gradeID);
  // check if the exam_grades exists before trying to delete it
       if(isset($exam_grades['gradeID']))
       {
         $this->Exam_grades_model->delete_exam_grades($gradeID);
         $this->session->set_flashdata('alertType','success' );
         $this->session->set_flashdata('message','Grades Added Successfully.' );
         redirect('exam_grades/index');
       }
       else
       show_error('The exam_grades you are trying to delete does not exist.');
  } catch (Exception $ex) {
    throw new Exception('Exam_grades Controller : Error in remove function - ' . $ex);
  }  
  }
  /*
  * View more a exam_grades
 */
 public function view_more($gradeID)
 {   
try{
   $data['exam_grades'] = $this->Exam_grades_model->get_exam_grades($gradeID);
     if(isset($data['exam_grades']['gradeID']))
      {
              $data['_view'] = 'exam_grades/view_more';
              $this->load->view('layouts/main',$data);
      }
      else
        show_error('The exam_grades you are trying to view more does not exist.');
    } catch (Exception $ex) {
    throw new Exception('Exam_grades Controller : Error in View more function - ' . $ex);
  }  
} 
 /*
* Listing of exam_grades
 */
public function search_by_clm()
{
    $column_name= $this->input->post('column_name');
    $value_id= $this->input->post('value_id');
     $data['noof_page'] = 0;
     $params = array();
    $data['exam_grades'] = $this->Exam_grades_model->get_all_exam_grades_by_cat($column_name,$value_id);
      $data['_view'] = 'exam_grades/index';
      $this->load->view('layouts/main',$data);
}
 /*
* get search values by column- exam_grades
 */
public function get_search_values_by_clm()
{
    $clm_name= $this->input->post('clm_name');
    $value= $this->input->post('value');
    $id= $this->input->post('id');
        $params = array(
        $clm_name=>$value,
        );
           $this->Exam_grades_model->update_exam_grades($id,$params);
   $data['noof_page'] = 0;
  $data['exam_grades'] = $this->Exam_grades_model->get_all_exam_grades();
  $this->load->view('exam_grades/index',$data);
}
 }
