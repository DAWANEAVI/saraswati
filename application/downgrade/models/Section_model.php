<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Section_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    /*
     * Get section by section_id
     */
    function get_section($section_id)
    {
        return $this->db->get_where('section',array('section_id'=>$section_id))->row_array();
    }
        
    /*
     * Get all section
     */
    function get_all_section()
    {
        $this->db->select('s.*,c.numeric_name,t.fname,t.lname');
        $this->db->from('section s');
        $this->db->join('class c','s.class_id=c.class_id',"inner");
        $this->db->join('teacher t','s.teacher_id=t.teacher_id',"left");
        $this->db->order_by('section_id', 'asc');
        $query = $this->db->get();
        return $query->result_array();
    }
        
    /*
     * function to add new section
     */
    function add_section($params)
    {
        $this->db->insert('section',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update section
     */
    function update_section($section_id,$params)
    {
        $this->db->where('section_id',$section_id);
        return $this->db->update('section',$params);
    }
    
    /*
     * function to delete section
     */
    function delete_section($section_id)
    {
        return $this->db->delete('section',array('section_id'=>$section_id));
    }
    function getSectionByClass($class_id){
        $this->db->select('*');
        $this->db->from('section');
        $this->db->where('class_id',$class_id);
        $query = $this->db->get();
        return $query->result_array();
    }
}