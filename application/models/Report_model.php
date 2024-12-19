<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Report_model
 *
 * @author durga it
 */
class Report_model extends CI_Model {

    //put your code here
    function __construct() {
        parent::__construct();
    }

    function getStudent($class_id, $section_id) {
        $this->db->select('s.*,c.class_name,sec.section_name');
        $this->db->from('student s');
        $this->db->join('class c', 's.class_id=c.class_id', 'inner');
        $this->db->join('section sec', 's.section_id=sec.section_id', 'inner');
        $this->db->where('s.class_id', $class_id);
        $this->db->where('s.section_id', $section_id);
        $this->db->where('s.is_active', 1);
        $query = $this->db->get();
        return $query->result_array();
    }

    function getOldStudent($class_id, $section_id, $academic_year) {
        $this->db->select('s.*,c.class_name,sec.section_name');
        $this->db->from('student s');
        $this->db->join('class c', 's.class_id=c.class_id', 'inner');
        $this->db->join('section sec', 's.section_id=sec.section_id', 'inner');
        $this->db->where('s.class_id', $class_id);
        $this->db->where('s.section_id', $section_id);
        $this->db->where('s.academic_year',$academic_year);
        $this->db->where('s.is_active',0);
        $query = $this->db->get();
        return $query->result_array();
    }

    function getStudentInfo($class_id, $section_id, $academic_year) {
        $this->db->select('s.*,c.class_name,sec.section_name');
        $this->db->from('student s');
        $this->db->join('class c', 's.class_id=c.class_id', 'inner');
        $this->db->join('section sec', 's.section_id=sec.section_id', 'inner');
        $this->db->where('s.class_id', $class_id);
        $this->db->where('s.section_id', $section_id);
        $this->db->where('s.academic_year',$academic_year);
        $this->db->where('s.is_active',1);
        $query = $this->db->get();
        return $query->result_array();
    }
    
    function getLeavingCertificate($class_id, $section_id, $academic_year) {
        $this->db->select('s.*,c.class_name,sec.section_name,l.academic_year,l.leaving_id,l.date_of_leave');
        $this->db->from('leaving_certificate l');
        $this->db->join('student s', 'l.student_id=s.student_id', 'inner');
        $this->db->join('class c', 's.class_id=c.class_id', 'inner');
        $this->db->join('section sec', 's.section_id=sec.section_id', 'inner');
        $this->db->where('s.class_id', $class_id);
        $this->db->where('s.section_id', $section_id);
        $this->db->where('l.academic_year',$academic_year);
        $query = $this->db->get();
        return $query->result_array();
    }
    
    function getoutstandingfees($class_id,$section_id,$academic_year){
        $this->db->select('s.*,c.class_name,sec.section_name,p.academic_year,p.total_amount,p.paid_amount');
        $this->db->from('payments p');
        $this->db->join('student s', 'p.student_id=s.student_id', 'inner');
        $this->db->join('class c', 's.class_id=c.class_id', 'inner');
        $this->db->join('section sec', 's.section_id=sec.section_id', 'inner');
        $this->db->where('s.class_id', $class_id);
       
        $this->db->where('s.section_id', $section_id);
        $this->db->where('p.academic_year',$academic_year);
        $this->db->where('p.total_amount > p.paid_amount');
         $this->db->where('s.is_active', 1);
        $query = $this->db->get();
        //print_r($this->db->last_query());die;
        return $query->result_array();
        
    }

    function getallstudentsfeees($class_id,$section_id,$academic_year){
        $this->db->select('s.*,c.class_name,sec.section_name,p.academic_year,p.total_amount,p.paid_amount,p.education_fee,p.term_fee,p.exam_fee,p.sport_fee,p.miscellaneous_fee');
        $this->db->from('payments p');
        $this->db->join('student s', 'p.student_id=s.student_id', 'inner');
        $this->db->join('class c', 's.class_id=c.class_id', 'inner');
        $this->db->join('section sec', 's.section_id=sec.section_id', 'inner');
        $this->db->where('s.class_id', $class_id);
        $this->db->where('s.section_id', $section_id);
        $this->db->where('p.academic_year',$academic_year);
        $query = $this->db->get();
        return $query->result_array();
        
    }
    
    function getpaidfees($class_id,$section_id,$academic_year){
        $this->db->select('s.*,c.class_name,sec.section_name,p.academic_year,p.total_amount,p.paid_amount');
        $this->db->from('payments p');
        $this->db->join('student s', 'p.student_id=s.student_id', 'inner');
        $this->db->join('class c', 's.class_id=c.class_id', 'inner');
        $this->db->join('section sec', 's.section_id=sec.section_id', 'inner');
        $this->db->where('s.class_id', $class_id);
        $this->db->where('s.section_id', $section_id);
        $this->db->where('p.academic_year',$academic_year);
        $this->db->where('p.paid_amount>0');
        $query = $this->db->get();
        return $query->result_array();
        

}
   function get_all_old_remaining()
    {
        $this->db->select('s.*,c.numeric_name,sec.section_name');
        $this->db->from('student s');
        $this->db->join('class c','s.class_id=c.class_id','inner');
        $this->db->join('section sec','s.section_id=sec.section_id','inner');
        $this->db->where('is_active',1);
        //$this->db->where('old_fees'>'paid_fees');
        $this->db->order_by('student_id', 'desc');
        return $this->db->get()->result_array();
    }
    

//-------------------------------------------------------------------- New Code -------------------------------------------------------------------------//

function getAllSectionsOutstandingFees($class_id,$section_id){
    $this->db->select('s.student_id,s.fullname,s.mobile_no,s.old_fees,s.paid_fees,s.rte_applicable,c.class_name,sec.section_name');
    $this->db->from('student s');
    $this->db->join('class c', 's.class_id=c.class_id', 'inner');
    $this->db->join('section sec', 's.section_id=sec.section_id', 'inner');
    $this->db->where('s.class_id', $class_id);
    $this->db->where('s.section_id', $section_id);
    $this->db->where('s.is_active', 1);
    $query = $this->db->get();
    //print_r($query->result_array());die;
    return $query->result_array();
    
}

function getAllPaymentByStudent($student_id){
    $this->db->select('*');
    $this->db->from('payments');
    $this->db->where('student_id', $student_id);
    $this->db->where('total_amount >= paid_amount');
    $this->db->order_by('academic_year','asc'); 
    $query = $this->db->get();
    //print_r($query->result_array());die;
    return $query->result_array();
    
}

function getallyearoutstandingfees($class_id,$section_id){
        $this->db->select('s.student_id,s.fullname,s.mobile_no,s.academic_year,s.old_fees,s.paid_fees,s.rte_applicable,c.class_name,sec.section_name,p.total_amount,p.paid_amount,');
    $this->db->from('student s');
    $this->db->join('class c', 's.class_id=c.class_id', 'inner');
    $this->db->join('section sec', 's.section_id=sec.section_id', 'inner');
    $this->db->join('payments p', 's.student_id=p.student_id', 'inner');
    $this->db->where('s.class_id', $class_id);
    $this->db->where('s.section_id', $section_id);
    $this->db->where('s.academic_year = p.academic_year');
    $this->db->where('s.is_active', 1);
    $query = $this->db->get();
    //print_r($query->result_array());die;
    return $query->result_array();
}

function getPaymentForFinalOR($student_id,$academic_year){
    $this->db->select('*');
    $this->db->from('payments');
    $this->db->where('student_id', $student_id);
    $this->db->where('total_amount >= paid_amount');
    $this->db->where('academic_year !=', $academic_year);
    $this->db->order_by('academic_year','asc'); 
    $query = $this->db->get();
    //print_r($query->result_array());die;
    return $query->result_array();
}

function students_attendance_report_by_month($session_id,$class_id, $section_id, $month){
    //$this->db->select('*, COUNT(studAtt.student_id) as countStudPresent');
    $this->db->select('*, 
        SUM(CASE WHEN studAtt.attendance_status = 1 THEN 1 ELSE 0 END) AS total_present,
        SUM(CASE WHEN studAtt.attendance_status = 0 THEN 1 ELSE 0 END) AS total_absent');
    $this->db->from('student_attendance studAtt' );
    $this->db->join('student s','studAtt.student_id=s.student_id','inner');
    $this->db->where('studAtt.session_id',$session_id);
    $this->db->where('studAtt.class_id',$class_id);
    $this->db->where('studAtt.section_id',$section_id);
    $this->db->where('MONTH(studAtt.date)',$month);
    //$this->db->where('studAtt.attendance_status',1);
    $this->db->where('studAtt.statusID',1);
    $this->db->group_by('studAtt.student_id');


    $query = $this->db->get();
    return $query->result_array();

    ///////////////////////////////////////////////////////////////////////////////
    /*$start_date = '2024-04-01';
    $end_date = '2025-03-31';
    $query = $this->db->query("
            SELECT
                (DATEDIFF('$end_date', '$start_date') + 1) 
                - (FLOOR((DATEDIFF('$end_date', '$start_date') + 1) / 7) * 2) 
                - (CASE WHEN WEEKDAY('$start_date') = 6 THEN 1 ELSE 0 END)
                - (CASE WHEN WEEKDAY('$end_date') = 6 THEN 1 ELSE 0 END)
                - (
                    SELECT COUNT(*) 
                    FROM holidays 
                    WHERE holiday_date BETWEEN '$start_date' AND '$end_date'
                    AND WEEKDAY(holiday_date) < 5 -- Exclude holidays that fall on weekends
                ) AS working_days
        ");

        // Get the result
        $result = $query->row();
        
        return $result->working_days;
        */
    
}

function total_date_in_month($session_id,$class_id, $section_id, $month){
    $this->db->select('COUNT(DISTINCT(studAtt.date)) as totalDateInMonth');

    $this->db->from('student_attendance studAtt' );
    $this->db->where('studAtt.session_id',$session_id);
    $this->db->where('studAtt.class_id',$class_id);
    $this->db->where('studAtt.section_id',$section_id);
    $this->db->where('MONTH(studAtt.date)',$month);
    $this->db->where('studAtt.statusID',1);
    $this->db->group_by('studAtt.student_id');

    $query = $this->db->get();
    $row_values  = $query->row_array();
    return $row_values['totalDateInMonth'];

    //$query = $this->db->get();
    //return $query->result();
}

function students_attendance_report_by_year($session_id,$class_id, $section_id){
    $this->db->select('studAtt.student_id as stud_id,s.fullname as stud_name, 
        SUM(CASE WHEN studAtt.attendance_status = 1 THEN 1 ELSE 0 END) AS total_present,
        SUM(CASE WHEN studAtt.attendance_status = 0 THEN 1 ELSE 0 END) AS total_absent');

    $this->db->from('student_attendance studAtt' );
    $this->db->join('student s','studAtt.student_id=s.student_id','inner');
    $this->db->where('studAtt.session_id',$session_id);
    $this->db->where('studAtt.class_id',$class_id);
    $this->db->where('studAtt.section_id',$section_id);
    $this->db->where('studAtt.statusID',1);
    $this->db->group_by('studAtt.student_id');

    $query = $this->db->get();
    return $query->result_array();
}
function total_date_in_year($session_id,$class_id, $section_id){
    $this->db->select('COUNT(DISTINCT(studAtt.date)) as totalDateInYear');

    $this->db->from('student_attendance studAtt' );
    $this->db->join('section s','studAtt.section_id=s.section_id','inner');
    $this->db->where('studAtt.session_id',$session_id);
    $this->db->where('studAtt.class_id',$class_id);
    $this->db->where('studAtt.section_id',$section_id);
    $this->db->where('studAtt.statusID',1);

    $query = $this->db->get();
    $row_values  = $query->row_array();
    return $row_values['totalDateInYear'];

    //$query = $this->db->get();
    //return $query->result();
}
}
