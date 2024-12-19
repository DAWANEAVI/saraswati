<?php 
/*
 Generated by Manuigniter v2.0 
 www.manuigniter.com
*/
class Exam_subjectPaper extends CI_Controller{
 function __construct()
 {
       parent::__construct();
      $this->load->model('Exam_subjectPaper_model');
 } 
 /*
* Listing of exam_subjectPaper
 */
public function index()
{
  try{
      
      $this->load->model('Clas_model');
      $data['all_class'] = $this->Clas_model->get_all_class(); 

      $this->load->model('Section_model');
      if($this->input->get('class_id') != null){
        $data['all_section'] = $this->Section_model->getSectionByClass($this->input->get('class_id'));
      }

      $this->load->model('Academic_year_model');
      $data['academic_year_data'] = $this->Academic_year_model->check_active_session();

      if($this->input->get('examID') != null){
        $this->load->model('Exam_acadamicExams_model');
        $data['acadamic_exams'] = $this->Exam_acadamicExams_model->get_exams_by_class_session($this->input->get('class_id'),$data['academic_year_data']['session_id']);
      }
      
      $data['exam_subjectPaper'] = $this->Exam_subjectPaper_model->get_papers_of_exam_class_and_session($this->input->get('examID'),$this->input->get('class_id'),$data['academic_year_data']['session_id']);
      //print_r($data['exam_subjectPaper']);die();
      $data['_view'] = 'exam_subjectPaper/index';
      $this->load->view('layouts/main',$data);
    } catch (Exception $ex) {
      throw new Exception('Exam_subjectPaper Controller : Error in index function - ' . $ex);
  }  
}
 /*
  * Adding a new exam_subjectPaper
  */
 function add()
 {  
try{
  $examID = $this->input->get('examID');
  $class_id = $this->input->get('class_id');
  $section_id = $this->input->get('section_id');

  if($examID!=null && $class_id !=null && $section_id !=null){
    $this->load->library('form_validation');
    $this->form_validation->set_rules('class_id','Class','required');
    $this->form_validation->set_rules('examID','Exam','required');
    $this->form_validation->set_rules('subjectIDs[]','Subject','required');
    $this->form_validation->set_rules('passingMarks[]','Passing Marks','required');
    $this->form_validation->set_rules('totalMarks[]','Total Marks','required');
    $this->form_validation->set_rules('dates[]','Exam Date','required');
    $this->form_validation->set_rules('evaluations[]','Evaluation Type','required');

    if($this->form_validation->run())  
    {     
       $this->load->model('Academic_year_model');
       $data['academic_year_data'] = $this->Academic_year_model->check_active_session();
 
       $subjectIDs = $this->input->post('subjectIDs');
       $passingMarks = $this->input->post('passingMarks');
       $totalMarks = $this->input->post('totalMarks');
       $dates = $this->input->post('dates');
       $evaluations = $this->input->post('evaluations');

       $count=0;

       foreach ($subjectIDs as $key => $value) {

        $checkRecord = $this->Exam_subjectPaper_model->check_recod($examID,$class_id,$value,$data['academic_year_data']['session_id']);
        if($checkRecord){
          $this->load->model('Exam_subjects_model');
          $subjectResult = $this->Exam_subjects_model->get_exam_subjects($value);
          $this->session->set_flashdata('alertType','failed' );
          $this->session->set_flashdata('message',$subjectResult['subjectName'].' Paper Already Exist.' );
          redirect('exam_subjectPaper/index?'.'examID='.$examID.'&class_id='.$class_id.'&section_id='.$section_id);
        }

        $params = array(
          'session_id' => $data['academic_year_data']['session_id'],
          'class_id'=> $this->input->post('class_id'),
          'examID'=> $this->input->post('examID'),
          'subjectID'=> $value,
          'passingMarks'=> $passingMarks[$key],
          'totalMarks'=> $totalMarks[$key],
          'date'=> $dates[$key],
          'created_by' => $this->session->user_id,
          'statusID'=> 1,
        );

        $paperID = $this->Exam_subjectPaper_model->add_exam_subjectPaper($params);
        if($paperID){
          $count = $count + 1;
        }else{
          $count = $count;
        } 

       }
      $this->session->set_flashdata('alertType','success' );
      $this->session->set_flashdata('message',$count.' Paper Added Successfully' );
      redirect('exam_subjectPaper/index?'.'examID='.$this->input->post('examID').'&class_id='.$this->input->post('class_id').'&section_id='.$this->input->post('section_id'));
     }
     else
     { 

      if(!empty(validation_errors())){
        $this->session->set_flashdata('alertType','failed' );
        $this->session->set_flashdata('message',validation_errors() );
        redirect('exam_subjectPaper/add?'.'examID='.$examID.'&class_id='.$class_id.'&section_id='.$section_id);
      }
      $this->load->model('Exam_subjects_model');
      $data['all_exam_subjects'] = $this->Exam_subjects_model->get_all_exam_subjects(); 
      $this->load->model('Clas_model');
      $data['all_class'] = $this->Clas_model->get_clas($class_id);
      $this->load->model('Exam_acadamicExams_model');
      $data['acadamic_exams'] = $this->Exam_acadamicExams_model->get_exam_by_exam_id($examID);
      //print_r($data['acadamic_exams']);die(); 
      $this->load->model('Academic_year_model');
      $data['all_academic_session'] = $this->Academic_year_model->get_all_session(); 
      $data['_view'] = 'exam_subjectPaper/add';
      $this->load->view('layouts/main',$data);

     }
    

  } else{
    $this->session->set_flashdata('alertType','failed' );
    $this->session->set_flashdata('message','Somthing Went Wrong !');
    redirect('exam_subjectPaper/index');
  }
       //print_r($params);die();
       
  } catch (Exception $ex) {
    throw new Exception('Exam_subjectPaper Controller : Error in add function - ' . $ex);
  }  
 }  
  /*
  * Editing a exam_subjectPaper
 */
 public function edit($paperID)
 {   
  try{
      $data['exam_subjectPaper'] = $this->Exam_subjectPaper_model->get_exam_subjectPaper($paperID);
      //print_r($data['exam_subjectPaper']);die();
      if(isset($data['exam_subjectPaper']['paperID']))
      {
        $examID = $this->input->get('examID');
        $class_id = $this->input->get('class_id');
        $section_id = $this->input->get('section_id');

        if($examID!=null && $class_id !=null && $section_id !=null){
          $this->load->library('form_validation');
          $this->form_validation->set_rules('subjectID','Subject','required');
          $this->form_validation->set_rules('class_id','Class','required');
          $this->form_validation->set_rules('examID','Exam','required');
          $this->form_validation->set_rules('passingMarks','Passing Marks','required');
          $this->form_validation->set_rules('totalMarks','Total Marks','required');
          $this->form_validation->set_rules('date','Exam Date','required');
          if($this->form_validation->run())  
          {   
              $this->load->model('Academic_year_model');
              $data['academic_year_data'] = $this->Academic_year_model->check_active_session();

              $checkRecord = $this->Exam_subjectPaper_model->check_recod($this->input->post('examID'),$this->input->post('class_id'),$this->input->post('subjectID'),$data['academic_year_data']['session_id']);
              //print_r($checkRecord);die();
              if($checkRecord['paperID']){
                if(isset($checkRecord['paperID']) && $data['exam_subjectPaper']['paperID'] != $checkRecord['paperID']){
                  $this->session->set_flashdata('alertType','failed' );
                  $this->session->set_flashdata('message','Paper Already Exist.' );
                  redirect('exam_subjectPaper/index?'.'examID='.$examID.'&class_id='.$class_id.'&section_id='.$section_id);
                }
              }
              $params = array(
                'subjectID'=> $this->input->post('subjectID'),
                'class_id'=> $this->input->post('class_id'),
                'examID'=> $this->input->post('examID'),
                'passingMarks'=> $this->input->post('passingMarks'),
                'totalMarks'=> $this->input->post('totalMarks'),
                'date'=> $this->input->post('date'),
                'evaluation'=> $this->input->post('evaluation'),
                'modified_by' => $this->session->user_id,
                'statusID'=> 1,
              );
              //print_r($params);die();
              $this->Exam_subjectPaper_model->update_exam_subjectPaper($paperID,$params);
              $this->session->set_flashdata('alertType','success' );
              $this->session->set_flashdata('message','Paper Saved Successfully.' );
              redirect('exam_subjectPaper/index?'.'examID='.$examID.'&class_id='.$class_id.'&section_id='.$section_id);
          }else{

            $this->load->model('Clas_model');
            $data['all_class'] = $this->Clas_model->get_clas($class_id);
            $this->load->model('Exam_acadamicExams_model');
            $data['acadamic_exams'] = $this->Exam_acadamicExams_model->get_exam_by_exam_id($examID);
            $this->load->model('Exam_subjects_model');
            $data['all_exam_subjects'] = $this->Exam_subjects_model->get_all_exam_subjects(); 
            $this->load->model('Academic_year_model');
            $data['all_academic_session'] = $this->Academic_year_model->get_all_session(); 
            $data['_view'] = 'exam_subjectPaper/edit';
            $this->load->view('layouts/main',$data);
          }
        }else{
          $this->session->set_flashdata('alertType','failed' );
          $this->session->set_flashdata('message','Somthing Went Wrong !');
          redirect('exam_subjectPaper/index');
        }
      }
      else
      show_error('The exam_subjectPaper you are trying to edit does not exist.');
  } catch (Exception $ex) {
    throw new Exception('Exam_subjectPaper Controller : Error in edit function - ' . $ex);
  }  
} 
/*
  * Deleting exam_subjectPaper
  */
  function remove($paperID)
   {
    try{
      $exam_subjectPaper = $this->Exam_subjectPaper_model->get_exam_subjectPaper($paperID);
  // check if the exam_subjectPaper exists before trying to delete it
       if(isset($exam_subjectPaper['paperID']))
       {
        $examID = $this->input->get('examID');
        $class_id = $this->input->get('class_id');
        $section_id = $this->input->get('section_id');

        if($examID!=null && $class_id !=null && $section_id !=null){
         $this->Exam_subjectPaper_model->delete_exam_subjectPaper($paperID);
         $this->session->set_flashdata('alertType','success' );
         $this->session->set_flashdata('message','Paper Deleted Successfully.' );
         redirect('exam_subjectPaper/index?'.'examID='.$examID.'&class_id='.$class_id.'&section_id='.$section_id);
        }else{
          $this->session->set_flashdata('alertType','failed' );
          $this->session->set_flashdata('message','Somthing Went Wrong !');
          redirect('exam_subjectPaper/index');
        }
       }
       else
       show_error('The exam_subjectPaper you are trying to delete does not exist.');
  } catch (Exception $ex) {
    throw new Exception('Exam_subjectPaper Controller : Error in remove function - ' . $ex);
  }  
  }
  /*
  * View more a exam_subjectPaper
 */
 public function view_more($paperID)
 {   
try{
   $data['exam_subjectPaper'] = $this->Exam_subjectPaper_model->get_exam_subjectPaper($paperID);
     if(isset($data['exam_subjectPaper']['paperID']))
      {
              $data['_view'] = 'exam_subjectPaper/view_more';
              $this->load->view('layouts/main',$data);
      }
      else
        show_error('The exam_subjectPaper you are trying to view more does not exist.');
    } catch (Exception $ex) {
    throw new Exception('Exam_subjectPaper Controller : Error in View more function - ' . $ex);
  }  
} 
 /*
* Listing of exam_subjectPaper
 */
public function search_by_clm()
{
    $column_name= $this->input->post('column_name');
    $value_id= $this->input->post('value_id');
     $data['noof_page'] = 0;
     $params = array();
    $data['exam_subjectPaper'] = $this->Exam_subjectPaper_model->get_all_with_asso_exam_subjectPaper_by_cat($column_name,$value_id);
      $data['_view'] = 'exam_subjectPaper/index';
      $this->load->view('layouts/main',$data);
}
  /*
  * get get_search_values_byclms by id
 */
 public function get_search_values_by_subjectID()
 {   
     $subjectID= $this->input->post('value');
        $this->load->model('Exam_subjects_model');
        $data['all_exam_subjects'] = $this->Exam_subjects_model->get_all_exam_subjects(); 
      $exam_subjectPaper = $this->Exam_subjectPaper_model->get_all_with_asso_exam_subjectPaper();
if(isset($data['all_exam_subjects']) && $data['all_exam_subjects']!=null)
                                              {
                                              foreach($data['all_exam_subjects'] as $e){ 
      echo          "<option value='".$e['subjectName']."'> ".$e['subjectID']."</option>"; 
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
      $exam_subjectPaper = $this->Exam_subjectPaper_model->get_all_with_asso_exam_subjectPaper();
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
 public function get_search_values_by_examID()
 {   
     $examID= $this->input->post('value');
        $this->load->model('Academic_session_model');
        $data['all_academic_session'] = $this->Academic_session_model->get_all_academic_session(); 
      $exam_subjectPaper = $this->Exam_subjectPaper_model->get_all_with_asso_exam_subjectPaper();
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
* get search values by column- exam_subjectPaper
 */
public function get_search_values_by_clm()
{
    $clm_name= $this->input->post('clm_name');
    $value= $this->input->post('value');
    $id= $this->input->post('id');
        $params = array(
        $clm_name=>$value,
        );
           $this->Exam_subjectPaper_model->update_exam_subjectPaper($id,$params);
   $data['noof_page'] = 0;
  $data['exam_subjectPaper'] = $this->Exam_subjectPaper_model->get_all_with_asso_exam_subjectPaper();
  $this->load->view('exam_subjectPaper/index',$data);
}
 }
