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
        $query = $this->db->get();
        return $query->result_array();
    }

    function getOldStudent($class_id, $section_id, $academic_year) {
        $this->db->select('s.*,c.class_name,sec.section_name');
        $this->db->from('student_promote sp');
        $this->db->join('student s', 'sp.student_id=s.student_id', 'inner');
        $this->db->join('class c', 's.class_id=c.class_id', 'inner');
        $this->db->join('section sec', 's.section_id=sec.section_id', 'inner');
        $this->db->where('s.class_id', $class_id);
        $this->db->where('s.section_id', $section_id);
        $this->db->where('sp.old_academic_year',$academic_year);
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
}
