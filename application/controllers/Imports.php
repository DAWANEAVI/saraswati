<?php
 require FCPATH.'vendor/autoload.php';
 use PhpOffice\PhpSpreadsheet\Spreadsheet;
 use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Imports extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Imports_model');
        $this->load->model('Student_model');
        $this->load->model('Payment_model');
    }

    /*
     * Listing of AY
     */

    function index()
    {
        print_r("HIIIIII");
        // $data['session_data'] = $this->Academic_year_model->get_all_session();
        // $data['_view'] = 'academic_year/index';
        // //print_r($data['_view']);
        // $this->load->view('layouts/main',$data);
    }

    function importStudentFromExcel() {

        $data['_view'] = 'imports/upload-from-excel';
        $this->load->view('layouts/main', $data);
    }

    function importStudents() {

        $upload_file=$_FILES['file']['name'];
		$extension=pathinfo($upload_file,PATHINFO_EXTENSION);
		if($extension=='csv')
		{
			$reader= new \PhpOffice\PhpSpreadsheet\Reader\Csv();
		} else if($extension=='xls')
		{
			$reader= new \PhpOffice\PhpSpreadsheet\Reader\Xls();
		} else
		{
			$reader= new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
		}
		$spreadsheet=$reader->load($_FILES['file']['tmp_name']);
		$sheetdata=$spreadsheet->getActiveSheet()->toArray();
        // echo '<pre>';
        // print_r($sheetdata);

        $sheetcount=count($sheetdata);
		if($sheetcount>1)
		{
			$data=array();
			for ($i=1; $i < $sheetcount; $i++) { 
				$registration_no = $sheetdata[$i][0];
				$fullname = $sheetdata[$i][1];
				$father_name = $sheetdata[$i][2];
                $mother_full_name = $sheetdata[$i][3];
                //----------------- session -----------
                $session = $sheetdata[$i][4];
                //print_r($session);die();
                if(empty($session)){
                    $this->session->set_flashdata('alertType','failed' );
                    $this->session->set_flashdata('message','session value is empty on row no -'.$i );
                    redirect('imports/importStudentFromExcel');
                }
                $session_id = $this->getSessionByAcadamicYear($session);
                if(empty($session_id)){
                    $this->session->set_flashdata('alertType','failed' );
                    $this->session->set_flashdata('message','session value is not valid on row no -'.$i );
                    redirect('imports/importStudentFromExcel');
                }
                 //----------------- class-------------
                $class = $sheetdata[$i][5];
                if(empty($class)){
                    $this->session->set_flashdata('alertType','failed' );
                    $this->session->set_flashdata('message','class value is empty on row no -'.$i );
                    redirect('imports/importStudentFromExcel');
                }
                $class_id = $this->getClassByNum($class);
                if(empty($class_id)){
                    $this->session->set_flashdata('alertType','failed' );
                    $this->session->set_flashdata('message','class value is not valid on row no -'.$i );
                    redirect('imports/importStudentFromExcel');
                }
                //-----------------
                $section = $sheetdata[$i][6];
                if(empty($section)){
                    $this->session->set_flashdata('alertType','failed' );
                    $this->session->set_flashdata('message','section value is empty on row no -'.$i );
                    redirect('imports/importStudentFromExcel');
                }
                $section_id = $this->getSectionByNameAndClassId($class_id, $section);
                if(empty($section_id)){
                    $this->session->set_flashdata('alertType','failed' );
                    $this->session->set_flashdata('message','section value is not valid on row no -'.$i );
                    redirect('imports/importStudentFromExcel');
                }

                $gender = $sheetdata[$i][7];
                $aadhar_no = $sheetdata[$i][8];
                $saral_id  = $sheetdata[$i][9];
                $apar_no = $sheetdata[$i][10];
                $udic_no = $sheetdata[$i][11];
                $religion = $sheetdata[$i][12];
                $caste = $sheetdata[$i][13];
                $category = $sheetdata[$i][14];
                $nationality = $sheetdata[$i][15];
                $mother_tounge = $sheetdata[$i][16];
                $dob_raw = $sheetdata[$i][17];
                $dob = str_replace('/','-',$dob_raw);
                $place_of_birth = $sheetdata[$i][18];
                $age = $sheetdata[$i][19];
                $last_school = $sheetdata[$i][20];
                $last_class = $sheetdata[$i][21];
                $last_medium = $sheetdata[$i][22];
                $is_last_school_recognize = $sheetdata[$i][23];
                $at_post = $sheetdata[$i][24];
                $tahsil = $sheetdata[$i][25];
                $dist = $sheetdata[$i][26];
                $occupation = $sheetdata[$i][27];
                $ph_no = $sheetdata[$i][28];
                $mobile_no = $sheetdata[$i][29];
                $parent_on_service = $sheetdata[$i][30];
                $office_address_phone_no = $sheetdata[$i][31];
                $annual_income = $sheetdata[$i][32];
                $local_address = $sheetdata[$i][33];
                $relation_ship_with_parent = $sheetdata[$i][34];
                $admission_date_raw = $sheetdata[$i][35];
                $admission_date = str_replace('/','-',$admission_date_raw);
                $rte_applicable = $sheetdata[$i][36];
                if($rte_applicable == 1 || strtoupper($rte_applicable) == 'YES'){$rte= 1;}else{$rte= 0;}
                $is_active = 1;

				$data[] = array(
                    'registration_no' => $registration_no,
                    'fullname' => $fullname,
                    'father_name' => $father_name,
                    'mother_full_name' => $mother_full_name,
                    'session_id' => $session_id,
                    'academic_year' => $session,
                    'class_id' => $class_id,
                    'section_id' => $section_id,
                    'gender' => $gender,
                    'aadhar_no' => $aadhar_no,
                    'saral_id' => $saral_id,
                    // 'apar_no' => $apar_no,
                    // 'udic_no' => $udic_no,
                    'religion' => $religion,
                    'caste' => $caste,
                    'category' => $category,
                    'nationality' => $nationality,
                    'mother_tounge' => $mother_tounge,
                    'dob' => date("Y-m-d", strtotime($dob)),
                    'place_of_birth'=>$place_of_birth,
                    'age' => $age,
                    'last_school' => $last_school,
                    'last_class' => $last_class,
                    'last_medium' => $last_medium,
                    'is_last_school_recognize' => $is_last_school_recognize,
                    'at_post' => $at_post,
                    'tahsil' => $tahsil,
                    'dist' => $dist,
                    'occupation' => $occupation,
                    'ph_no' => $ph_no,
                    'mobile_no' => $mobile_no,
                    'parent_on_service' => $parent_on_service,
                    'office_address_phone_no' => $office_address_phone_no,
                    'annual_income' => $annual_income,
                    'local_address' => $local_address,
                    'relation_ship_with_parent' => $relation_ship_with_parent,
                    'register_date' => $admission_date_raw,
                    'rte_applicable'=>$rte,
                    'is_active' => $is_active,
                    'old_fees' => 0,
                    'paid_fees' => 0,
                    
                );
			}

            $count=0;
               
            // print_r($data);
            // die();
            foreach ($data as $k => $v) {
                
                //print_r($v);die();
                $student_id = $this->Student_model->add_student($v);

                $payment_parameter = array(
                    'student_id' => $student_id,
                    'session_id' => $v['session_id'],
                    'class_id' => $v['class_id'],
                    'academic_year' => $v['academic_year'],
                    'total_amount' => 0,
                    'paid_amount' => 0,
                    'education_fee' => 0,
                    'term_fee' => 0,
                    'exam_fee' => 0,
                    'sport_fee' => 0,
                    'computer_fee' => 0,
                    'statusID' => 1,
                );
                //print_r($payment_parameter);die();
                $payment_id = $this->Payment_model->add_payment($payment_parameter);
                $count++;
            }
            //$k++;
            $this->session->set_flashdata('msg', count($data) . ' Students Records Are Added');
            redirect('student/index');
			// $inserdata=$this->home_model->insert_batch($data);
			// if($inserdata)
			// {
			// 	$this->session->set_flashdata('message','<div class="alert alert-success">Successfully Added.</div>');
			// 	redirect('home');
			// } else {
			// 	$this->session->set_flashdata('message','<div class="alert alert-danger">Data Not uploaded. Please Try Again.</div>');
			// 	redirect('home');
			// }
            // echo '<pre>';
            // print_r($data);
		}
    }

    function getClassByNum($num) {
        $result = $this->Imports_model->getClassByNum($num);
        return $result->class_id;
    }

    function getSessionByAcadamicYear($session) {
       
        $session_id = $this->Imports_model->getSessionByAcadamicYear($session);
        return $session_id;
    }

    function getSectionByNameAndClassId($class_id, $section) {
        $result = $this->Imports_model->getSectionByNameAndClassId($class_id, $section);
        return $result;
    }


}
