<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Student_promote_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    /*
     * Get student_promote by promotion_id
     */
    function get_student_promote($promotion_id)
    {
        return $this->db->get_where('student_promote',array('promotion_id'=>$promotion_id))->row_array();
    }

    function get_student_promote_history($student_id)
    {
        $this->db->select('s.fullname,c.numeric_name as new_class,sec.section_name,d.numeric_name as old_class,p.promotion_id,p.promotion_date');
        $this->db->from('student_promote p');
        $this->db->join('student s','p.student_id=s.student_id','inner');
        $this->db->join('class c','p.new_class_id=c.class_id','inner');
        $this->db->join('class d','p.previous_class_id=d.class_id','inner');
        $this->db->join('section sec','p.section_id=sec.section_id','inner');
        $this->db->where('p.student_id', $student_id);
        return $this->db->get()->result_array();
    }
        
    /*
     * Get all student_promote
     */
    function get_all_student_promote()
    {
        $this->db->select('s.fullname,c.numeric_name as new_class,sec.section_name,d.numeric_name as old_class,p.promotion_id,p.promotion_date,p.old_academic_year,p.new_academic_year');
        $this->db->from('student_promote p');
        $this->db->join('student s','p.student_id=s.student_id','inner');
        $this->db->join('class c','p.new_class_id=c.class_id','inner');
        $this->db->join('class d','p.previous_class_id=d.class_id','inner');
        $this->db->join('section sec','p.section_id=sec.section_id','inner');
        $this->db->order_by('p.promotion_id', 'desc');
        $this->db->group_by('p.student_id');
        return $this->db->get('student_promote')->result_array();
    }
        
    /*
     * function to add new student_promote
     */
    function add_student_promote($params)
    {
        $this->db->insert('student_promote',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update student_promote
     */
    function update_student_promote($promotion_id,$params)
    {
        $this->db->where('promotion_id',$promotion_id);
        return $this->db->update('student_promote',$params);
    }
    
    /*
     * function to delete student_promote
     */
    function delete_student_promote($promotion_id)
    {
        return $this->db->delete('student_promote',array('promotion_id'=>$promotion_id));
    }
}
