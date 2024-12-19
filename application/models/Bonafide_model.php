<?php

class Bonafide_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    function get_all_bc_count()
    {
        $this->db->from('bonafide_certificate');
        return $this->db->count_all_results();
    }
    

    function get_bonafide_certificate($bonafide_id)
    {
        $this->db->select('*');
        $this->db->from('bonafide_certificate');
        $this->db->where('bonafide_id',$bonafide_id);
        $this->db->where('statusID',1);
        return $this->db->get()->row_array();
    }

    // Model function to get sections based on class ID
public function getSectionsByClass($class_id)
{
    $this->db->select('section_id, section_name');
    $this->db->from('section');
    $this->db->where('class_id', $class_id); // Filter by class ID
    $query = $this->db->get();
    return $query->result_array(); // Return result as array
}

// Model function to get students based on section ID
public function getStudentsBySection($section_id)
{
    $this->db->select('student_id, fullname');
    $this->db->from('student');
    $this->db->where('section_id', $section_id); // Filter by section ID
    $query = $this->db->get();
    return $query->result_array(); // Return result as array
}


        
    /*
     * Get all bonafide_certificate
     */
    function get_all_bonafide_certificate()
    {
        $this->db->select('*');
        $this->db->from('bonafide_certificate');
        $this->db->where('statusID',1);
        $this->db->order_by('bonafide_id', 'desc');
        return $this->db->get()->result_array();
    }
        
    /*
     * function to add new leaving_certificate
     */

    function add_bonafide_certificate($params)
    {
        $this->db->insert('bonafide_certificate',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update leaving_certificate
     */

    function update_bonafide_certificate($bonafide_id,$params)
    {
        $this->db->where('bonafide_id',$bonafide_id);
        return $this->db->update('bonafide_certificate',$params);
    }
    
    /*
     * function to delete leaving_certificate
     */
    function delete_bonafide_certificate($bonafide_id)
    {
        return $this->db->delete('bonafide_certificate',array('bonafide_id'=>$bonafide_id));
    }
    
}
