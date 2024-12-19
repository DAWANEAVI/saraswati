<?php 
/*
 Generated by Manuigniter v2.0 
 www.manuigniter.com
*/
class Exam_acadamicExams extends CI_Controller{
 function __construct()
 {
       parent::__construct();
      $this->load->model('Exam_acadamicExams_model');
 }
 /*
* Listing of exam_acadamicExams
 */
public function index()
{
  try{
      $data['noof_page'] = 0;
      $this->load->model('Academic_year_model');
      $data['all_sessions'] = $this->Academic_year_model->get_all_session();
    
      $this->load->model('Exam_Heads_model');
      $data['exams_heads'] = $this->Exam_Heads_model->get_all_exam_Heads();

      if($this->input->get('exHeadID')!=null && $this->input->get('session_id')!= null)  
      {  
        $exHeadID = $this->input->get('exHeadID');
        $session_id = $this->input->get('session_id');
        
        $data['exam_acadamicExams'] = $this->Exam_acadamicExams_model->get_all_exam_acadamicExams_with_session_exam($session_id,$exHeadID);
      }

      $data['_view'] = 'exam_acadamicExams/index';
      $this->load->view('layouts/main',$data);
    } catch (Exception $ex) {
      throw new Exception('Exam_acadamicExams Controller : Error in index function - ' . $ex);
  }  
}
 /*
  * Adding a new exam_acadamicExams
  */
function add()
{  
try{
       $this->load->library('form_validation');
       $this->form_validation->set_rules('exHeadID','ExHeadID','required');
       $this->form_validation->set_rules('class_id','Class id','required');
       $this->form_validation->set_rules('session_id','Session id','required');
       $this->form_validation->set_rules('examStartDate','ExamStartDate','required');
       $this->form_validation->set_rules('examEndDate','ExamEndDate','required');
       $this->form_validation->set_rules('evaluation','evaluation type','required');
       $this->form_validation->set_rules('examStatus','Exam Status','required');
        if($this->form_validation->run())  
        {  
            $params = array(
              'exHeadID'=> $this->input->post('exHeadID'),
              'class_id'=> $this->input->post('class_id'),
              'session_id'=> $this->input->post('session_id'),
              'evaluation'=> $this->input->post('evaluation'),
              'examStartDate'=> $this->input->post('examStartDate'),
              'examEndDate'=> $this->input->post('examEndDate'),
              'examStatus'=> $this->input->post('examStatus'),
              'statusID'=> 1,
              'created_by' => $this->session->user_id,
              );
            $this->load->model('Academic_year_model');
            $data['academic_year_data'] = $this->Academic_year_model->check_active_session();
            $checkRecord = $this->Exam_acadamicExams_model->check_recod($this->input->post('exHeadID'),$this->input->post('class_id'),$data['academic_year_data']['session_id']);
            if($checkRecord){
              $this->session->set_flashdata('alertType','failed' );
              $this->session->set_flashdata('message','Exam Already Exist.' );
              redirect('exam_acadamicExams/index?exHeadID='.$this->input->get('exHeadID').'&session_id='.$this->input->get('session_id'));
            }
            $this->Exam_acadamicExams_model->add_exam_acadamicExams($params);
            $this->session->set_flashdata('alertType','success' );
            $this->session->set_flashdata('message','Exam Added Successfully.' );
            redirect('exam_acadamicExams/index?exHeadID='.$this->input->get('exHeadID').'&session_id='.$this->input->get('session_id'));
        }
        else
        { 
         $this->load->model('Exam_Heads_model');
         $data['all_exam_Heads'] = $this->Exam_Heads_model->get_all_exam_Heads(); 
         $this->load->model('Clas_model');
         $data['all_class'] = $this->Clas_model->get_all_class(); 
         $this->load->model('Academic_year_model');
         $data['session_data'] = $this->Academic_year_model->get_all_session();
         //$data['all_academic_session'] = $this->Academic_session_model->get_all_academic_session(); 
         $data['_view'] = 'exam_acadamicExams/add';
         $this->load->view('layouts/main',$data);
        }
  } catch (Exception $ex) {
    throw new Exception('Exam_acadamicExams Controller : Error in add function - ' . $ex);
  }  
 }  
  /*
  * Editing a exam_acadamicExams
 */
 public function edit($examID)
 {   
  try{
     $data['exam_acadamicExams'] = $this->Exam_acadamicExams_model->get_exam_acadamicExams($examID);  
     if(isset($data['exam_acadamicExams']['examID']))
      {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('exHeadID','exHeadID','required');
        $this->form_validation->set_rules('class_id','class_id','required');
        $this->form_validation->set_rules('session_id','session_id','required');
        $this->form_validation->set_rules('examStartDate','examStartDate','required');
        $this->form_validation->set_rules('examEndDate','examEndDate','required');
        $this->form_validation->set_rules('evaluation','evaluation type','required');
        $this->form_validation->set_rules('examStatus','Exam Status','required');

         if($this->form_validation->run())  
           {  
              $params = array(
                'exHeadID'=> $this->input->post('exHeadID'),
                'class_id'=> $this->input->post('class_id'),
                'session_id'=> $this->input->post('session_id'),
                'evaluation'=> $this->input->post('evaluation'),
                'examStartDate'=> $this->input->post('examStartDate'),
                'examEndDate'=> $this->input->post('examEndDate'),
                'examStatus'=> $this->input->post('examStatus'),
                'modified_by' => $this->session->user_id,
                'statusID'=> 1,
            );
            $this->load->model('Academic_year_model');
            $data['academic_year_data'] = $this->Academic_year_model->check_active_session();
            $checkRecord = $this->Exam_acadamicExams_model->check_recod($this->input->post('exHeadID'),$this->input->post('class_id'),$data['academic_year_data']['session_id']);
            //print_r($checkRecord);die();
            if($checkRecord){
            if($data['exam_acadamicExams']['examID'] != $checkRecord['examID']){
              $this->session->set_flashdata('alertType','failed' );
              $this->session->set_flashdata('message','Exam Already Exist.' );
              redirect('exam_acadamicExams/index?exHeadID='.$this->input->get('exHeadID').'&session_id='.$this->input->get('session_id'));
            }
            }
            $this->Exam_acadamicExams_model->update_exam_acadamicExams($examID,$params);
            $this->session->set_flashdata('alertType','success' );
            $this->session->set_flashdata('message','Exam Saved Successfully.' );
            redirect('exam_acadamicExams/index?exHeadID='.$this->input->get('exHeadID').'&session_id='.$this->input->get('session_id'));
           }
           else
          {
             $this->load->model('Exam_Heads_model');
             $data['all_exam_Heads'] = $this->Exam_Heads_model->get_all_exam_Heads(); 
             $this->load->model('Clas_model');
             $data['all_class'] = $this->Clas_model->get_all_class(); 
             $this->load->model('Academic_year_model');
             $data['session_data'] = $this->Academic_year_model->get_all_session();
             $data['_view'] = 'exam_acadamicExams/edit';
             $this->load->view('layouts/main',$data);
          }
      }
      else
      show_error('The exam_acadamicExams you are trying to edit does not exist.');
    } catch (Exception $ex) {
      throw new Exception('Exam_acadamicExams Controller : Error in edit function - ' . $ex);
    }  
} 
/*
  * Deleting exam_acadamicExams
  */
  function remove($examID)
   {
    try{
      $exam_acadamicExams = $this->Exam_acadamicExams_model->get_exam_acadamicExams($examID);
      // check if the exam_acadamicExams exists before trying to delete it
       if(isset($exam_acadamicExams['examID']))
       {
         $this->Exam_acadamicExams_model->delete_exam_acadamicExams($examID);
         $this->session->set_flashdata('alertType','success' );
         $this->session->set_flashdata('message','Exam Saved Successfully.' );
         redirect('exam_acadamicExams/index?exHeadID='.$this->input->get('exHeadID').'&session_id='.$this->input->get('session_id'));
       }
       else
       show_error('The exam_acadamicExams you are trying to delete does not exist.');
    } catch (Exception $ex) {
      throw new Exception('Exam_acadamicExams Controller : Error in remove function - ' . $ex);
    }  
  }
  /*
  * View more a exam_acadamicExams
 */
 public function view_more($examID)
 {   
try{
   $data['exam_acadamicExams'] = $this->Exam_acadamicExams_model->get_exam_acadamicExams($examID);
     if(isset($data['exam_acadamicExams']['']))
      {
              $data['_view'] = 'exam_acadamicExams/view_more';
              $this->load->view('layouts/main',$data);
      }
      else
        show_error('The exam_acadamicExams you are trying to view more does not exist.');
    } catch (Exception $ex) {
    throw new Exception('Exam_acadamicExams Controller : Error in View more function - ' . $ex);
  }  
} 
 /*
* Listing of exam_acadamicExams
 */
public function search_by_clm()
{
    $column_name= $this->input->post('column_name');
    $value_id= $this->input->post('value_id');
     $data['noof_page'] = 0;
     $params = array();
    $data['exam_acadamicExams'] = $this->Exam_acadamicExams_model->get_all_with_asso_exam_acadamicExams_by_cat($column_name,$value_id);
      $data['_view'] = 'exam_acadamicExams/index';
      $this->load->view('layouts/main',$data);
}
  /*
  * get get_search_values_byclms by id
 */
 public function get_search_values_by_exHeadID()
 {   
     $exHeadID= $this->input->post('value');
        $this->load->model('Exam_Heads_model');
        $data['all_exam_Heads'] = $this->Exam_Heads_model->get_all_exam_Heads(); 
      $exam_acadamicExams = $this->Exam_acadamicExams_model->get_all_with_asso_exam_acadamicExams();
if(isset($data['all_exam_Heads']) && $data['all_exam_Heads']!=null)
                                              {
                                              foreach($data['all_exam_Heads'] as $e){ 
      echo          "<option value='".$e['examName']."'> ".$e['exHeadID']."</option>"; 
 } 
                                              }
                                              else{
                                                        echo '<tr>No data found</tr>';
                                              }
 } 
  /*
  * get get_search_values_byclms by id
 */
 public function get_search_values_by_class_id()
 {   
     $class_id= $this->input->post('value');
        $this->load->model('Class_model');
        $data['all_class'] = $this->Class_model->get_all_class(); 
      $exam_acadamicExams = $this->Exam_acadamicExams_model->get_all_with_asso_exam_acadamicExams();
if(isset($data['all_class']) && $data['all_class']!=null)
                                              {
                                              foreach($data['all_class'] as $e){ 
      echo          "<option value='".$e['numeric_name']."'> ".$e['class_id']."</option>"; 
 } 
                                              }
                                              else{
                                                        echo '<tr>No data found</tr>';
                                              }
 } 
  /*
  * get get_search_values_byclms by id
 */
 public function get_search_values_by_session_id()
 {   
     $session_id= $this->input->post('value');
        $this->load->model('Academic_session_model');
        $data['all_academic_session'] = $this->Academic_session_model->get_all_academic_session(); 
      $exam_acadamicExams = $this->Exam_acadamicExams_model->get_all_with_asso_exam_acadamicExams();
if(isset($data['all_academic_session']) && $data['all_academic_session']!=null)
                                              {
                                              foreach($data['all_academic_session'] as $e){ 
      echo          "<option value='".$e['session']."'> ".$e['session_id']."</option>"; 
 } 
                                              }
                                              else{
                                                        echo '<tr>No data found</tr>';
                                              }
 } 
 /*
* get search values by column- exam_acadamicExams
 */
public function get_search_values_by_clm()
{
    $clm_name= $this->input->post('clm_name');
    $value= $this->input->post('value');
    $id= $this->input->post('id');
        $params = array(
        $clm_name=>$value,
        );
           $this->Exam_acadamicExams_model->update_exam_acadamicExams($id,$params);
   $data['noof_page'] = 0;
  $data['exam_acadamicExams'] = $this->Exam_acadamicExams_model->get_all_with_asso_exam_acadamicExams();
  $this->load->view('exam_acadamicExams/index',$data);
}

function get_exams_by_class_session(){
  $class_id = $this->input->get('class_id');
  $session_id = $this->input->get('session_id');
  $result = $this->Exam_acadamicExams_model->get_exams_by_class_session($class_id,$session_id);
  echo json_encode($result);
}
 }