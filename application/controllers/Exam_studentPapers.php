<?php 

class Exam_studentPapers extends CI_Controller{
 function __construct()
 {
       parent::__construct();
      $this->load->model('Exam_studentPapers_model');
      $this->load->model('Report_model');
 } 
 /*
* Listing of exam_studentPapers
 */

 public function evaluateSetup()
{
  $paperID = $this->input->get('paperID');
  $class_id = $this->input->get('class_id');
  $examID = $this->input->get('examID');
  $section_id = $this->input->get('section_id');
  $session_id = $this->input->get('session_id');

  $this->load->model('Section_model');
  $data['section'] = $this->Section_model->get_section($section_id);

  $this->load->model('Exam_subjectPaper_model');
  $data['paper'] = $this->Exam_subjectPaper_model->get_exam_subjectPaper_by_id($paperID);

  $this->load->model('Exam_studentPapers_model');
  $data['studentsResult'] = $this->Exam_studentPapers_model->get_all_exam_studentPapers($paperID,$examID,$class_id,$section_id);
  
  //print_r($data['studentsResult']);die();

  $data['_view'] = 'exam_studentPapers/evaluateSetup';
  $this->load->view('layouts/main',$data);
  
}

public function evaluate()
{
  $paperID = $this->input->get('paperID');
  $examID = $this->input->get('examID');
  $class_id = $this->input->get('class_id');
  $section_id = $this->input->get('section_id');
  $session_id = $this->input->get('session_id');

  //   $this->load->model('Exam_acadamicExams_model');
  //   $data['exam'] = $this->Exam_acadamicExams_model->get_exam_by_exam_id($examID); 

  //   $this->load->model('Clas_model');
  //   $data['clas'] = $this->Clas_model->get_clas($class_id); 

  $this->load->model('Section_model');
  $data['section'] = $this->Section_model->get_section($section_id);

  $this->load->model('Exam_subjectPaper_model');
  $data['paper'] = $this->Exam_subjectPaper_model->get_exam_subjectPaper_by_id($paperID);

  //print_r($data['paper']);die();

  $this->load->model('Student_model');
  $data['students'] = $this->Student_model->getStudentBySessionClassAndSection($session_id,$class_id,$section_id);

  $data['already_evaluated'] = $this->Exam_studentPapers_model->get_already_evaluated_studentIDs($examID,$paperID);
  //print_r( $data['students']);die();

  $data['_view'] = 'exam_studentPapers/evaluate';
  $this->load->view('layouts/main',$data);
  
}

public function evaluateProcess()
{
  $paperID = $this->input->post('paperID');
  $examID = $this->input->post('examID');
  $class_id = $this->input->post('class_id');
  $section_id = $this->input->post('section_id');
  $student_id = $this->input->post('studentIDs');
  $obtainedMarks = $this->input->post('obtainedMarks');
  $session_id = $this->input->post('session_id');
  $totalMarks = $this->input->post('totalMarks');
  //print_r($this->input->post());die();
  $this->load->library('form_validation');
  $this->form_validation->set_rules('paperID','paperID','required');
  $this->form_validation->set_rules('class_id','class_id','required');
  $this->form_validation->set_rules('section_id','section_id','required');
  $this->form_validation->set_rules('studentIDs[]','studentIDs','required');
  $this->form_validation->set_rules('examID','examID','required');
  $this->form_validation->set_rules('obtainedMarks[]','obtainedMarks','required');
  $this->form_validation->set_rules('totalMarks','totalMarks','required');

  if($this->form_validation->run())  
  {
    if((count($student_id)!=count($obtainedMarks))) {
      $this->session->set_flashdata('alertType','failed' );
      $this->session->set_flashdata('message',"Array Count Not Match.." );
      redirect('Exam_studentPapers/evaluate?'.'paperID='.$paperID.'&examID='.$examID.'&class_id='.$class_id.'&section_id='.$section_id.'&session_id='.$session_id);
    }
    $count=0;
    foreach ($student_id as $key => $value) {

      $studentPaperResult = $this->Exam_studentPapers_model->get_exam_result($examID,$class_id,$paperID,$value);
      if(!empty($studentPaperResult)) {
        $this->session->set_flashdata('alertType','failed' );
        $this->session->set_flashdata('message',$value." Student ID Record Already Exist.." );
        redirect('Exam_studentPapers/evaluate?'.'paperID='.$paperID.'&examID='.$examID.'&class_id='.$class_id.'&section_id='.$section_id.'&session_id='.$session_id);
      }

      if($obtainedMarks[$key] > $totalMarks){
        $this->session->set_flashdata('alertType','failed' );
        $this->session->set_flashdata('message',"Obtained Marks are greater then Total Marks" );
        redirect('Exam_studentPapers/evaluate?'.'paperID='.$paperID.'&examID='.$examID.'&class_id='.$class_id.'&section_id='.$section_id.'&session_id='.$session_id);
      }

      $this->load->model('Exam_grades_model');
      $gradesResult = $this->Exam_grades_model->get_all_exam_grades();
      if(empty($gradesResult)) {
        $this->session->set_flashdata('alertType','failed' );
        $this->session->set_flashdata('message',"Grades Setup Not Found..." );
        redirect('Exam_studentPapers/evaluate?'.'paperID='.$paperID.'&examID='.$examID.'&class_id='.$class_id.'&section_id='.$section_id.'&session_id='.$session_id);
      }

      $percentage = 0;
      $grade = '';

      foreach ($gradesResult as $gk => $gv) {
        (int) $percentage = ($obtainedMarks[$key]/$totalMarks)*100;
        if(((int)$gv['min_grade_range'] <= $percentage) && ($percentage <= (int)$gv['max_grade_range'])){
          $grade = $gv['grade'];
        }
      }

      $params = array(
        'examID'=> $this->input->post('examID'),
        'paperID' => $this->input->post('paperID'),
        'class_id'=> $this->input->post('class_id'),
        'student_id'=> $value,
        'marks'=> $obtainedMarks[$key],
        'eveluationType'=> $this->input->post('eveluationType'),
        'result'=> ($this->input->post('passingMarks')>$obtainedMarks[$key]) ? 0 : 1,
        'grade'=> $grade,
        'created_by' => $this->session->user_id,
        'statusID'=> 1,
      );
      //print_r($params);die();
      $studPaperID = $this->Exam_studentPapers_model->add_exam_studentPapers($params);
      $studPaperID ? $count= $count+1 :'';
    }
    //print_r($params);die();
    $this->session->set_flashdata('alertType','success' );
    $this->session->set_flashdata('message',$count.' Records Evaluation Added Successfully.' );
    redirect('Exam_studentPapers/evaluateSetup?'.'paperID='.$paperID.'&examID='.$examID.'&class_id='.$class_id.'&section_id='.$section_id.'&session_id='.$session_id);

  }else{
    $this->session->set_flashdata('alertType','failed' );
    $this->session->set_flashdata('message',validation_errors() );
    redirect('Exam_studentPapers/evaluateSetup?'.'paperID='.$paperID.'&examID='.$examID.'&class_id='.$class_id.'&section_id='.$section_id.'&session_id='.$session_id);
  } 
  
}

function edit_evaluation($studPaperID){
  $student_id = $this->input->get('student_id');
  $paperID = $this->input->get('paperID');
  $class_id = $this->input->get('class_id');
  $examID = $this->input->get('examID');
  $section_id = $this->input->get('section_id');
  $session_id = $this->input->get('session_id');

  $data['evaluation'] = $this->Exam_studentPapers_model->get_evaluated_record($studPaperID);
   
  if(isset($data['evaluation']['studPaperID']))
  {
    $this->load->library('form_validation');
    $this->form_validation->set_rules('totalMarks','totalMarks','required');
    $this->form_validation->set_rules('marks','marks','required');
    if($this->form_validation->run())  
    {
      $totalMarks = $this->input->post('totalMarks');
      $marks = $this->input->post('marks') ? $this->input->post('marks'):0;
      $percentage = ($marks/$totalMarks)*100;
      $grade = 'E';

      if($marks>$totalMarks) {
        $this->session->set_flashdata('alertType','failed' );
        $this->session->set_flashdata('message',"Marks Should be less Then Total Marks." );
        redirect('Exam_studentPapers/edit_evaluation?'.'paperID='.$paperID.'&examID='.$examID.'&class_id='.$class_id.'&section_id='.$section_id.'&session_id='.$session_id);
      }

      $this->load->model('Exam_grades_model');
      $gradesResult = $this->Exam_grades_model->get_all_exam_grades();
      
      if(empty($gradesResult)) {
        $this->session->set_flashdata('alertType','failed' );
        $this->session->set_flashdata('message',"Grades Setup Not Found..." );
        redirect('Exam_studentPapers/edit_evaluation?'.'paperID='.$paperID.'&examID='.$examID.'&class_id='.$class_id.'&section_id='.$section_id.'&session_id='.$session_id);
      }

      foreach ($gradesResult as $gk => $gv) {
        if(((int)$gv['min_grade_range'] <= (int) $percentage) && ((int) $percentage <= (int)$gv['max_grade_range'])){
          $grade = $gv['grade'];
        }
      }


      $params = array(
        'marks'=> $marks,
        'grade'=> $grade,
        'modified_by' => $this->session->user_id,
      );
      //print_r($params);die();
      $this->Exam_studentPapers_model->edit_evaluation_by_student($data['evaluation']['studPaperID'],$params);
      $this->session->set_flashdata('alertType','success' );
      $this->session->set_flashdata('message', 'Record Edited Successfully.' );
      redirect('Exam_studentPapers/evaluateSetup?'.'paperID='.$paperID.'&examID='.$examID.'&class_id='.$class_id.'&section_id='.$section_id.'&session_id='.$session_id);
    }else{

      $this->load->model('Exam_subjectPaper_model');
      $data['paper'] = $this->Exam_subjectPaper_model->get_exam_subjectPaper_by_id($paperID);
      
      $data['_view'] = 'exam_studentPapers/edit_evaluation';
      $this->load->view('layouts/main',$data);
    }
  }
  else
  show_error('The attendance and physical parameter you are trying to edit does not exist.');
}

function remove_evaluation($studPaperID){
  try{
    $student_id = $this->input->get('student_id');
    $paperID = $this->input->get('paperID');
    $class_id = $this->input->get('class_id');
    $examID = $this->input->get('examID');
    $section_id = $this->input->get('section_id');
    $session_id = $this->input->get('session_id');
    
    $evaluation = $this->Exam_studentPapers_model->get_evaluated_record($studPaperID);
    // check if the exam_studentPapers exists before trying to delete it
    if(isset($evaluation))
    {
      $params = array(
        'statusID'=> 0,
        'modified_by' => $this->session->user_id,
      );
      //print_r($params);die();
      $this->Exam_studentPapers_model->edit_evaluation_by_student($evaluation['studPaperID'],$params);
      $this->session->set_flashdata('alertType','success' );
      $this->session->set_flashdata('message', 'Record Deleted Successfully.' );
      redirect('Exam_studentPapers/evaluateSetup?'.'paperID='.$paperID.'&examID='.$examID.'&class_id='.$class_id.'&section_id='.$section_id.'&session_id='.$session_id);
    }
    else
    {
      $this->session->set_flashdata('alertType','failed' );
      $this->session->set_flashdata('message', 'Record Not Found' );
      redirect('Exam_studentPapers/evaluateSetup?'.'paperID='.$paperID.'&examID='.$examID.'&class_id='.$class_id.'&section_id='.$section_id.'&session_id='.$session_id);
    }
  } catch (Exception $ex) {
    throw new Exception('Exam_studentPapers Controller : Error in remove function - ' . $ex);
  }  
}

public function index()
{
  try{
      $data['noof_page'] = 0;
     $data['exam_studentPapers'] = $this->Exam_studentPapers_model->get_all_exam_studentPapers();
      $data['_view'] = 'exam_studentPapers/index';
      $this->load->view('layouts/main',$data);
    } catch (Exception $ex) {
      throw new Exception('Exam_studentPapers Controller : Error in index function - ' . $ex);
  }  
}

function examResult()
{  
try{
     $this->load->model('Academic_year_model');
     $data['academic_year_data'] = $this->Academic_year_model->check_active_session();

    if($this->input->get('examID')!=null && $this->input->get('class_id')!= null && $this->input->get('section_id')!= null)  
    {  
      $examID = $this->input->get('examID');
      $class_id = $this->input->get('class_id');
      $section_id = $this->input->get('section_id');
      $session_id = $data['academic_year_data']['session_id'];

      $this->load->model('Section_model');
      $data['section'] = $this->Section_model->get_section($section_id);

      $this->load->model('Clas_model');
      $data['clas'] = $this->Clas_model->get_clas($class_id); 

      $this->load->model('Exam_acadamicExams_model');
      $data['exam'] = $this->Exam_acadamicExams_model->get_exam_by_exam_id($examID); 

      $this->load->model('Student_model');
      $data['students'] = $this->Student_model->getStudentBySessionClassAndSection($session_id,$class_id,$section_id);
      //print_r($data['students']);die();
      
      $this->load->model('Exam_acadamicExams_model');
      $data['acadamic_exams'] = $this->Exam_acadamicExams_model->get_exams_by_class_session($this->input->get('class_id'),$data['academic_year_data']['session_id']);
    }
    
    $this->load->model('Clas_model');
    $data['all_class'] = $this->Clas_model->get_all_class(); 

    $this->load->model('Section_model');
    if($this->input->get('class_id') != null){
      $data['all_section'] = $this->Section_model->getSectionByClass($this->input->get('class_id'));
    }
  
    


    $data['_view'] = 'exam_studentPapers/examresult';
    $this->load->view('layouts/main',$data);
 } catch (Exception $ex) {
   throw new Exception('Exam_studentPapers Controller : Error in add function - ' . $ex);
 }  
}

function view_exam_result(){
  $examID = $this->input->get('examID');
  $class_id = $this->input->get('class_id');
  $student_id = $this->input->get('student_id');
  $section_id = $this->input->get('section_id');

  $this->load->model('Student_model');
  $data['student'] = $this->Student_model->get_student($student_id);

  $this->load->model('Academic_year_model');
  $data['academic_year_data'] = $this->Academic_year_model->check_active_session();

  $this->load->model('Exam_subjectPaper_model');
  $data['exam_subjectPaper'] = $this->Exam_subjectPaper_model->get_papers_of_exam_class_and_session($this->input->get('examID'),$this->input->get('class_id'),$data['academic_year_data']['session_id']);
  //print_r($data['exam_subjectPaper']);die();
  if(empty($data['exam_subjectPaper'])){
    $this->session->set_flashdata('alertType','failed' );
    $this->session->set_flashdata('message','No papers found for this class and exam . Please add papers.' );
    redirect('exam_studentPapers/examResult?'.'examID='.$examID.'&class_id='.$class_id.'&section_id='.$section_id);
  }
  
  $resultData = [];
  $this->load->model('Exam_acadamicExams_model');
  $data['exam_acadamicExams'] = $this->Exam_acadamicExams_model->get_exam_acadamicExams($examID); 
  //print_r($data['exam_acadamicExams']);die();
  $data['examName'] = '';
  $total_marks = $obtained_total = 0;

  foreach ($data['exam_subjectPaper'] as $key => $value) {
    $paperResult = $this->Exam_studentPapers_model->get_exam_result($examID,$class_id,$value['paperID'],$student_id);
    $data['examName'] = $value['examName'];
    $resultData[$key] = [
      'subjectName'=>$value['subjectName'],
      'date' => $value['date'],
      'totalMarks' =>$value['totalMarks'],
      'passingMarks' => $value['passingMarks'],
      'obtainedMarks' => !empty($paperResult) ? $paperResult['marks'] :'N.E',
      'percentage' => !empty($paperResult) ? ($paperResult['marks']/$value['totalMarks'])*100 :'N.E',
      'grade' => !empty($paperResult) ? $paperResult['grade'] :'N.E',
      'result' =>!empty($paperResult) ? $paperResult['result'] :'N.E',
    ];
    !empty($paperResult) ? $obtained_total = $obtained_total + $paperResult['marks'] :0;
    $total_marks = $total_marks + $value['totalMarks'];
    //print_r($resultData[$key]);die();
  }
  $data['total_marks'] = $total_marks;
  $data['obtained_total'] = $obtained_total;
  $grandPercentage = ($obtained_total/$total_marks)*100;
  $data['total_percentage'] = number_format((float)$grandPercentage, 2,'.','');
  $data['total_grade'] = "E";


  $this->load->model('Exam_grades_model');
  $data['exam_grades'] = $this->Exam_grades_model->get_all_exam_grades();
  foreach ($data['exam_grades'] as $gk => $gv) {
    if(((int)$gv['min_grade_range'] <= (int) $grandPercentage) && ((int) $grandPercentage <= (int)$gv['max_grade_range'])){
      $data['total_grade'] = $gv['grade'];
    }
  }

  
  $data['paperData'] = $resultData;
  //print_r($resultData);die();
  $data['_view'] = 'exam_studentPapers/view_exam_result';
  $this->load->view('layouts/main',$data);
}


function studentResult()
{  
try{
     $this->load->model('Academic_year_model');
     $data['academic_year_data'] = $this->Academic_year_model->check_active_session();

    if($this->input->get('class_id')!= null && $this->input->get('section_id')!= null)  
    {  
      $class_id = $this->input->get('class_id');
      $section_id = $this->input->get('section_id');
      $session_id = $data['academic_year_data']['session_id'];

      $this->load->model('Section_model');
      $data['section'] = $this->Section_model->get_section($section_id);
      //print_r($data['section']);die();
      $this->load->model('Clas_model');
      $data['clas'] = $this->Clas_model->get_clas($class_id); 

      $this->load->model('Student_model');
      $data['students'] = $this->Student_model->getStudentBySessionClassAndSection($session_id,$class_id,$section_id);
      //print_r($data['students']);die();

    }

    $this->load->model('Academic_year_model');
    $data['all_sessions'] = $this->Academic_year_model->get_all_session();
    
    $this->load->model('Clas_model');
    $data['all_class'] = $this->Clas_model->get_all_class(); 

    $this->load->model('Section_model');
    if($this->input->get('class_id') != null){
      $data['all_section'] = $this->Section_model->getSectionByClass($this->input->get('class_id'));
    }
 //print_r($data);die();
    $data['_view'] = 'exam_studentPapers/all_exam_result';
    $this->load->view('layouts/main',$data);
 } catch (Exception $ex) {
   throw new Exception('Exam_studentPapers Controller : Error in add function - ' . $ex);
 }  
}

function viewStatement(){

  $student_id = $this->input->get('student_id');
  $class_id = $this->input->get('class_id');
  $session_id = $this->input->get('session_id');

  $this->load->model('Exam_subjects_model');
  $this->load->model('Exam_subjectPaper_model');

  $this->load->model('Exam_acadamicExams_model');
  $data['exams'] = $this->Exam_acadamicExams_model->get_all_exam_by_class_session($session_id,$class_id);
  $examData = array();
  $subjectIDs = array();
  $subjects = array();

  foreach ($data['exams'] as $key => $value) {
    $papers = $this->Exam_subjectPaper_model->get_subject_id_of_exam_class_and_session($value['examID'],$class_id,$session_id);
    if(!empty($papers)) $papers = array_column($papers,"subjectID");
    if(!empty($papers)) $subjectIDs = array_merge($subjectIDs,$papers);
  }
  if(!empty($subjectIDs)) $subjectIDs = array_unique($subjectIDs);

 // print_r($subjectIDs);die();

 foreach ($subjectIDs as $k => $v) {
   $sub = $this->Exam_subjects_model->get_exam_subjects($v);
   $subjects[$k] = $sub['subjectName'];
 }

  foreach ($data['exams'] as $key => $value) {

    $resultData = [];
    foreach ($subjectIDs as $skey => $svalue) {
      //print_r($value['examID']);die();
      $paper = $this->Exam_subjectPaper_model->get_paper_id_by_session_subject_class_exam($session_id,$svalue,$class_id,$value['examID']);
      $paperResult = $this->Exam_studentPapers_model->get_exam_result($value['examID'],$class_id,$paper['paperID'],$student_id);
      $resultData[$skey] = [
        'totalMarks' =>$paper['totalMarks'],
        'passingMarks' => $paper['passingMarks'],
        'obtainedMarks' => $paperResult['marks'],
        'percentage' => ($paperResult['marks']/$paper['totalMarks'])*100,
        'grade' =>$paperResult['grade'],
        'result' =>$paperResult['result'],
      ];
    }

    $examData[$key] = [
      'examName' => $value['examName'],
      'resultData' => $resultData,
      'remarks' =>'',
    ];
    
  }

  //print_r($subjects);die();
  $data['examData'] = $examData;
  $data['subjects'] = $subjects;
  $data['_view'] = 'exam_studentPapers/view_final_statement';
  $this->load->view('layouts/main',$data);

}

function viewFinalStatement(){

  $student_id = $this->input->get('student_id');
  $class_id = $this->input->get('class_id');
  $session_id = $this->input->get('session_id');
  $section_id = $this->input->get('section_id');

  $this->load->model('Exam_subjects_model');
  $this->load->model('Exam_subjectPaper_model');

  $this->load->model('Exam_acadamicExams_model');
  $data['exams'] = $this->Exam_acadamicExams_model->get_all_exam_by_class_session($session_id,$class_id);

  $data['parameter'] = $this->Exam_acadamicExams_model->get_all_extra_parameter($session_id,$class_id,$student_id);

  if(empty($data['exams'])){
    $this->session->set_flashdata('alertType','failed' );
    $this->session->set_flashdata('message','No Exam Found . Please Add Exams.' );
    redirect('exam_studentPapers/studentResult?'.'session='.$session_id.'&class_id='.$class_id.'&section_id='.$section_id);
  }
  
  $examStats = array();
  $subjectIDs = array();
  $subjects = array();
  $subjectResult = array();
  //$extraParameter = $this->Exam_subjectPaper_model->get_paper_id_by_session_subject_class_exam($session_id,$class_id,$value['examID']);

  $data['evaluation'] = 1;
  foreach ($data['exams'] as $key => $value) {
    $examStats[$key] = [
      'examName' => $value['examName'],
      'TotalMarks' => 0,
      'Percentage' => 0,
      'Marks' => 0,
      'Grade' => 'E',
    ];
    if($value['evaluation'] == 0) $data['evaluation'] = 0;
    $papers = $this->Exam_subjectPaper_model->get_subject_id_of_exam_class_and_session($value['examID'],$class_id,$session_id);
    if(!empty($papers)) $papers = array_column($papers,"subjectID");
    if(!empty($papers)) $subjectIDs = array_merge($subjectIDs,$papers);
  }
  if(!empty($subjectIDs)) $subjectIDs = array_unique($subjectIDs);

  if(empty($subjectIDs)){
    $this->session->set_flashdata('alertType','failed' );
    $this->session->set_flashdata('message','No Subject Papers . Please Add Subject Papers.' );
    redirect('exam_studentPapers/studentResult?'.'session='.$session_id.'&class_id='.$class_id.'&section_id='.$section_id);
  }
  // grades , student and parameter loading

  $this->load->model('Exam_grades_model');
  $data['exam_grades'] = $this->Exam_grades_model->get_all_exam_grades();

  $data['parameters'] = $this->Exam_studentPapers_model->get_exam_parameters($session_id,$class_id,$student_id);

  $this->load->model('Student_model');
  $data['studentData'] = $this->Student_model->get_student($student_id);

  // Subject wise exam marks Calculation

 foreach ($subjectIDs as $k => $v) {
   
   $sub = $this->Exam_subjects_model->get_exam_subjects($v);
   $subjectResult = array();

   foreach ($data['exams'] as $key => $value) {

    $paper = $this->Exam_subjectPaper_model->get_paper_id_by_session_subject_class_exam($session_id,$v,$class_id,$value['examID']);
    if($paper) $paperResult = $this->Exam_studentPapers_model->get_exam_result($value['examID'],$class_id,$paper['paperID'],$student_id);
    
     if(isset($paper) && !empty($paperResult)) {
      $subjectResult[$key] = [
        'totalMarks' => $paper['totalMarks'],
        'marks' => $paperResult['marks'],
        'percentage' => number_format((float)($paperResult['marks']/$paper['totalMarks'])*100, 2,'.',''),
        'grade' => $paperResult['grade'],
      ];
      // total calulation exam wise
      $examStats[$key]['TotalMarks'] = $examStats[$key]['TotalMarks'] + $paper['totalMarks']; 
      $examStats[$key]['Marks'] = $examStats[$key]['Marks'] + $paperResult['marks'];
    }else{
      $subjectResult[$key] = [
        'totalMarks' => 0,
        'marks' => 0,
        'percentage' => 0,
        'grade' => 'E',
      ];
      // total calulation exam wise
      $examStats[$key]['TotalMarks'] = $examStats[$key]['TotalMarks'] + 0; 
      $examStats[$key]['Marks'] = $examStats[$key]['Marks'] + 0;
    }

   }

   $subjects[$k] =[
    'subjectName'=>$sub['subjectName'],
    'subjectResult' => $subjectResult,
   ];
    

 }

 // Grand Total Calculation
 $grandTotalMarks = $grandMarks = $grandPercentage= 0;
 $grandGrade = "E";
 $grandRemark = 'Good';
//print_r($examStats);die();
 foreach ($examStats as $key => $value) { 
  // Exam Grade Calulation
  if($value['TotalMarks']==0){
    $examPercentage = 0;
  }else{
    $examPercentage = ($value['Marks']/$value['TotalMarks'])*100;
  }
  
  foreach ($data['exam_grades'] as $gk => $gv) {
    if(((int)$gv['min_grade_range'] <= (int) $examPercentage) && ((int) $examPercentage <= (int)$gv['max_grade_range'])){
      $examStats[$key]['Grade'] = $gv['grade'];
    }
    $examStats[$key]['Percentage'] = number_format((float)$examPercentage, 2,'.','');
  }
  // Grand Marks Sum 
  $grandTotalMarks = $grandTotalMarks + $value['TotalMarks'];
  $grandMarks = $grandMarks + $value['Marks'];
 }

 $grandPercentage = ($grandMarks/$grandTotalMarks)*100;

 foreach ($data['exam_grades'] as $gk => $gv) {
    if(((int)$gv['min_grade_range'] <= (int) $grandPercentage) && ((int) $grandPercentage <= (int)$gv['max_grade_range'])){
      $grandGrade = $gv['grade'];
      $grandRemark = $gv['remark'] ? $gv['remark'] :'Good';
    }
  }
  // foreach ($data['exams'] as $key => $value) {

  //   $resultData = [];
  //   foreach ($subjectIDs as $skey => $svalue) {
  //     //print_r($value['examID']);die();
  //     $paper = $this->Exam_subjectPaper_model->get_paper_id_by_session_subject_class_exam($session_id,$svalue,$class_id,$value['examID']);
  //     $paperResult = $this->Exam_studentPapers_model->get_exam_result($value['examID'],$class_id,$paper['paperID'],$student_id);
  //     $resultData[$skey] = [
  //       'totalMarks' =>$paper['totalMarks'],
  //       'passingMarks' => $paper['passingMarks'],
  //       'obtainedMarks' => $paperResult['marks'],
  //       'percentage' => ($paperResult['marks']/$paper['totalMarks'])*100,
  //       'grade' =>$paperResult['grade'],
  //       'result' =>$paperResult['result'],
  //     ];
  //   }

  //   $examData[$key] = [
  //     'examName' => $value['examName'],
  //     'resultData' => $resultData,
  //     'remarks' =>'',
  //   ];
    
  // }

  //print_r($subjects);die();
  $data['result'] = $subjects;
  $data['examStats'] = $examStats;
  $data['grandTotalMarks'] = $grandTotalMarks;
  $data['grandMarks'] = $grandMarks;
  $data['grandPercentage'] = $grandPercentage;
  $data['grandGrade'] = $grandGrade;
  $data['grandRemark'] = $grandRemark;
  $data['totalDateInYearByStud'] = $this->Exam_studentPapers_model->total_date_in_year_by_stud($session_id,$class_id,$section_id, $student_id);
  $data['total_date_in_year'] = $this->Exam_studentPapers_model->total_date_in_year($session_id,$class_id,$section_id);
  $data['_view'] = 'exam_studentPapers/view_final_statement_new';
  $this->load->view('layouts/main',$data);

}

function attendanceList()
{  
try{
     $this->load->model('Academic_year_model');
     $data['academic_year_data'] = $this->Academic_year_model->check_active_session();

    $class_id = $this->input->get('class_id');
    $section_id = $this->input->get('section_id');
    $session_id = $data['academic_year_data']['session_id'];

    $this->load->model('Section_model');
    $data['section'] = $this->Section_model->get_section($section_id);

    $this->load->model('Clas_model');
    $data['clas'] = $this->Clas_model->get_clas($class_id); 

    $data['parameters'] = $this->Exam_studentPapers_model->getAttendanceWeightList($session_id,$class_id,$section_id);
    //print_r($data['parameters']);die();

    //print_r($data);die();
    $data['_view'] = 'exam_studentPapers/attendance_weight_list';
    $this->load->view('layouts/main',$data);
 } catch (Exception $ex) {
   throw new Exception('Exam_studentPapers Controller : Error in add function - ' . $ex);
 }  
}

function attendanceWeight()
{  
try{
     $this->load->model('Academic_year_model');
     $data['academic_year_data'] = $this->Academic_year_model->check_active_session();

    if($this->input->get('class_id')!= null && $this->input->get('section_id')!= null)  
    {  
      $class_id = $this->input->get('class_id');
      $section_id = $this->input->get('section_id');
      $session_id = $data['academic_year_data']['session_id'];

      $this->load->model('Section_model');
      $data['section'] = $this->Section_model->get_section($section_id);
      //print_r($data['section']);die();
      $this->load->model('Clas_model');
      $data['clas'] = $this->Clas_model->get_clas($class_id); 

      $this->load->model('Student_model');
      $studentRecords = $this->Student_model->getStudentBySessionClassAndSection($session_id,$class_id,$section_id);
      //print_r($data['students']);die();

      $recordedIDs = $this->Exam_studentPapers_model->get_already_weighted_studentIDs($session_id,$class_id);
      $data['students'] = [];
      // remove already added records
      foreach ($studentRecords as $key => $value) {
        if(!in_array($value['student_id'], $recordedIDs)){
          array_push($data['students'],$value);
        }
      }

    }

    $this->load->model('Academic_year_model');
    $data['all_sessions'] = $this->Academic_year_model->get_all_session();
    
    $this->load->model('Clas_model');
    $data['all_class'] = $this->Clas_model->get_all_class(); 

    $this->load->model('Section_model');
    if($this->input->get('class_id') != null){
      $data['all_section'] = $this->Section_model->getSectionByClass($this->input->get('class_id'));
    }
 //print_r($data);die();
    $data['_view'] = 'exam_studentPapers/attendance_weight';
    $this->load->view('layouts/main',$data);
 } catch (Exception $ex) {
   throw new Exception('Exam_studentPapers Controller : Error in add function - ' . $ex);
 }  
}

public function attendanceWeightProcess()
{
  $this->load->library('form_validation');
  $this->form_validation->set_rules('session_id','session_id','required');
  $this->form_validation->set_rules('class_id','class_id','required');
  $this->form_validation->set_rules('section_id','section_id','required');
  $this->form_validation->set_rules('studentIDs[]','studentIDs','required');
  $this->form_validation->set_rules('confidance[]','confidance','required');
  $this->form_validation->set_rules('discpline[]','discpline','required');
  $this->form_validation->set_rules('pt[]','pt','required');
  $this->form_validation->set_rules('regularity[]','regularity','required');
  if($this->form_validation->run())  
  {
    $session_id = $this->input->post('session_id');
    $class_id = $this->input->post('class_id');
    $section_id = $this->input->post('section_id');
    $student_ids = $this->input->post('studentIDs');
    $confidance = $this->input->post('confidance');
    $discpline = $this->input->post('discpline');
    $pt = $this->input->post('pt');
    $regularity = $this->input->post('regularity');

    if((count($student_ids)!=count($confidance))&&(count($confidance)!=count($discpline)) && (count($student_ids)!= count($pt)) && (count($regularity)!= count($pt))) {
      $this->session->set_flashdata('alertType','failed' );
      $this->session->set_flashdata('message',"Array Count Not Match.." );
      redirect('Exam_studentPapers/attendanceWeight?'.'session='.$session_id.'&class_id='.$class_id.'&section_id='.$section_id);
    }


    $record = 0;
    foreach ($student_ids as $key => $value) {

      $paramResult = $this->Exam_studentPapers_model->get_exam_parameters($session_id,$class_id,$value);
      if(!empty($paramResult)) {
        $this->session->set_flashdata('alertType','failed' );
        $this->session->set_flashdata('message',$value." Student ID Record Already Exist.." );
        redirect('Exam_studentPapers/attendanceWeight?'.'session='.$session_id.'&class_id='.$class_id.'&section_id='.$section_id);
      }

      $params = array(
        'session_id'=> $this->input->post('session_id'),
        'class_id' => $this->input->post('class_id'),
        'student_id'=> $value,
        'confidance'=> $confidance[$key],
        'discpline'=> $discpline[$key],
        'pt'=> $pt[$key],
        'regularity'=> $regularity[$key],
        'created_by' => $this->session->user_id,
        'statusID'=> 1,
      );
      //print_r($params);die();
      $paramID = $this->Exam_studentPapers_model->add_attendance_weight_and_height($params);
      $paramID ? $record = $record + 1 : '';
    }
    $this->session->set_flashdata('alertType','success' );
    $this->session->set_flashdata('message', $record.' Records Added Successfully.' );
    redirect('Exam_studentPapers/attendanceList?'.'session='.$session_id.'&class_id='.$class_id.'&section_id='.$section_id);
    
  }else{
    $this->session->set_flashdata('alertType','failed' );
    $this->session->set_flashdata('message',validation_errors() );
    redirect('Exam_studentPapers/attendanceWeight?'.'session='.$session_id.'&class_id='.$class_id.'&section_id='.$section_id);
    //print_r(validation_errors());die();
  }  
  
}

function edit_attendance_weight($paramID){
  $session_id = $this->input->get('session_id');
  $class_id = $this->input->get('class_id');
  $section_id = $this->input->get('section_id');

  $data['parameter'] = $this->Exam_studentPapers_model->get_attendance_weight($paramID);
  //print_r($data['parameter']);die();
  if(isset($data['parameter']['paramID']))
  {
    $this->load->library('form_validation');
    $this->form_validation->set_rules('totalDay','totalDays','required');
    $this->form_validation->set_rules('attendendedDays','attenDays','required');
    $this->form_validation->set_rules('weight','weights','required');
    $this->form_validation->set_rules('height','heights','required');
    if($this->form_validation->run())  
    {
      $totalDay = $this->input->post('totalDay');
      $attendendedDays = $this->input->post('attendendedDays');
      $weight = $this->input->post('weight');
      $height = $this->input->post('height');

      $params = array(
        'total_days'=> $totalDay,
        'attended_days'=> $attendendedDays,
        'weight'=> $weight,
        'height'=> $height,
        'modified_by' => $this->session->user_id,
      );
      //print_r($params);die();
      $this->Exam_studentPapers_model->edit_attendance_weight_and_height($data['parameter']['paramID'],$params);
      $this->session->set_flashdata('alertType','success' );
      $this->session->set_flashdata('message', 'Record Edited Successfully.' );
      redirect('Exam_studentPapers/attendanceList?'.'session='.$session_id.'&class_id='.$class_id.'&section_id='.$section_id);
    }else{

      $this->load->model('Section_model');
      $data['section'] = $this->Section_model->get_section($section_id);
      //print_r($data['section']);die();

      $this->load->model('Clas_model');
      $data['clas'] = $this->Clas_model->get_clas($class_id);
      
      $data['_view'] = 'exam_studentPapers/edit_attendance_weight';
      $this->load->view('layouts/main',$data);
    }
  }
  else
  show_error('The attendance and physical parameter you are trying to edit does not exist.');
}

function remove_attendance_weight($paramID){
  try{
    $session_id = $this->input->get('session_id');
    $class_id = $this->input->get('class_id');
    $section_id = $this->input->get('section_id');

    $parameter = $this->Exam_studentPapers_model->get_attendance_weight($paramID);
    // check if the exam_studentPapers exists before trying to delete it
    if(isset($parameter['paramID']))
    {
      $params = array(
        'statusID'=> 0,
        'modified_by' => $this->session->user_id,
      );
      //print_r($params);die();
      $this->Exam_studentPapers_model->edit_attendance_weight_and_height($parameter['paramID'],$params);
      $this->session->set_flashdata('alertType','success' );
      $this->session->set_flashdata('message', 'Record Deleted Successfully.' );
      redirect('Exam_studentPapers/attendanceList?'.'session='.$session_id.'&class_id='.$class_id.'&section_id='.$section_id);
    }
    else
    {
      $this->session->set_flashdata('alertType','failed' );
      $this->session->set_flashdata('message', 'Record Not Found' );
      redirect('Exam_studentPapers/attendanceList?'.'session='.$session_id.'&class_id='.$class_id.'&section_id='.$section_id);
    }
  } catch (Exception $ex) {
    throw new Exception('Exam_studentPapers Controller : Error in remove function - ' . $ex);
  }  
  }
 /*
  * Adding a new exam_studentPapers
  */
 function add()
 {  
try{
      $this->load->model('Academic_year_model');
      $data['academic_year_data'] = $this->Academic_year_model->check_active_session();
      $params = array(
       'examID'=> $this->input->post('examID'),
       'session_id' => $data['academic_year_data']['session_id'],
       'student_id'=> $this->input->post('student_id'),
       'class_id'=> $this->input->post('class_id'),
       'marks'=> $this->input->post('marks'),
       'eveluationType'=> $this->input->post('eveluationType'),
       'result'=> $this->input->post('result'),
       'grade'=> $this->input->post('grade'),
       'statusID'=> $this->input->post('statusID'),
        );
       $this->load->library('upload');
       $this->load->library('form_validation');
       $this->form_validation->set_rules('studPaperID','StudPaperID','required');
       $this->form_validation->set_rules('statusID','StatusID','required');
        if($this->form_validation->run())  
        {  
            $studPaperID= $this->Exam_studentPapers_model->add_exam_studentPapers($params);
             $this->session->set_flashdata('alert_msg','<div class="alert alert-success text-center">Succesfully added.</div>');
              redirect('exam_studentPapers/index');
        }
        else
        { 
           $data['_view'] = 'exam_studentPapers/add';
            $this->load->view('layouts/main',$data);
        }
  } catch (Exception $ex) {
    throw new Exception('Exam_studentPapers Controller : Error in add function - ' . $ex);
  }  
 }  
  /*
  * Editing a exam_studentPapers
 */
 public function edit($studPaperID)
 {   
  try{
   $data['exam_studentPapers'] = $this->Exam_studentPapers_model->get_exam_studentPapers($studPaperID);
       $this->load->library('upload');
       $this->load->library('form_validation');
     if(isset($data['exam_studentPapers']['studPaperID']))
      {
        $params = array(
           'examID'=> $this->input->post('examID'),
           'student_id'=> $this->input->post('student_id'),
           'class_id'=> $this->input->post('class_id'),
           'marks'=> $this->input->post('marks'),
           'eveluationType'=> $this->input->post('eveluationType'),
           'result'=> $this->input->post('result'),
           'grade'=> $this->input->post('grade'),
           'statusID'=> $this->input->post('statusID'),
        );
               $this->form_validation->set_rules('studPaperID','studPaperID','required');
               $this->form_validation->set_rules('statusID','statusID','required');
         if($this->form_validation->run())  
           {  
           $this->Exam_studentPapers_model->update_exam_studentPapers($studPaperID,$params);
             $this->session->set_flashdata('alert_msg','<div class="alert alert-success text-center">Succesfully updated.</div>');
             redirect('exam_studentPapers/index');
           }
           else
          {
              $data['_view'] = 'exam_studentPapers/edit';
              $this->load->view('layouts/main',$data);
          }
  }
  else
  show_error('The exam_studentPapers you are trying to edit does not exist.');
  } catch (Exception $ex) {
    throw new Exception('Exam_studentPapers Controller : Error in edit function - ' . $ex);
  }  
} 
/*
  * Deleting exam_studentPapers
  */
  function remove($studPaperID)
   {
    try{
      $exam_studentPapers = $this->Exam_studentPapers_model->get_exam_studentPapers($studPaperID);
  // check if the exam_studentPapers exists before trying to delete it
       if(isset($exam_studentPapers['studPaperID']))
       {
         $this->Exam_studentPapers_model->delete_exam_studentPapers($studPaperID);
             $this->session->set_flashdata('alert_msg','<div class="alert alert-success text-center">Succesfully Removed.</div>');
           redirect('exam_studentPapers/index');
       }
       else
       show_error('The exam_studentPapers you are trying to delete does not exist.');
  } catch (Exception $ex) {
    throw new Exception('Exam_studentPapers Controller : Error in remove function - ' . $ex);
  }  
  }
  /*
  * View more a exam_studentPapers
 */
 public function view_more($studPaperID)
 {   
try{
   $data['exam_studentPapers'] = $this->Exam_studentPapers_model->get_exam_studentPapers($studPaperID);
     if(isset($data['exam_studentPapers']['studPaperID']))
      {
              $data['_view'] = 'exam_studentPapers/view_more';
              $this->load->view('layouts/main',$data);
      }
      else
        show_error('The exam_studentPapers you are trying to view more does not exist.');
    } catch (Exception $ex) {
    throw new Exception('Exam_studentPapers Controller : Error in View more function - ' . $ex);
  }  
} 
 /*
* Listing of exam_studentPapers
 */
public function search_by_clm()
{
    $column_name= $this->input->post('column_name');
    $value_id= $this->input->post('value_id');
     $data['noof_page'] = 0;
     $params = array();
    $data['exam_studentPapers'] = $this->Exam_studentPapers_model->get_all_exam_studentPapers_by_cat($column_name,$value_id);
      $data['_view'] = 'exam_studentPapers/index';
      $this->load->view('layouts/main',$data);
}
 /*
* get search values by column- exam_studentPapers
 */
public function get_search_values_by_clm()
{
    $clm_name= $this->input->post('clm_name');
    $value= $this->input->post('value');
    $id= $this->input->post('id');
        $params = array(
        $clm_name=>$value,
        );
           $this->Exam_studentPapers_model->update_exam_studentPapers($id,$params);
   $data['noof_page'] = 0;
  $data['exam_studentPapers'] = $this->Exam_studentPapers_model->get_all_exam_studentPapers();
  $this->load->view('exam_studentPapers/index',$data);
}
 }
