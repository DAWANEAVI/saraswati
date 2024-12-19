<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Leaving_certificate_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    function get_all_lc_count()
    {
        $this->db->from('leaving_certificate');
        return $this->db->count_all_results();
    }
    
    /*
     * Get leaving_certificate by leaving_id
     */
    function get_leaving_certificate($leaving_id)
    {
        $this->db->select('l.*,s.*');
        $this->db->from('leaving_certificate l');
        $this->db->join('student s','l.student_id=s.student_id','inner');
        $this->db->where('l.leaving_id',$leaving_id);
        return $this->db->get()->row_array();
    }
        
    /*
     * Get all leaving_certificate
     */
    function get_all_leaving_certificate()
    {
        $this->db->select('l.*,c.class_name');
        $this->db->from('leaving_certificate l');
        $this->db->join('student s','l.student_id=s.student_id','inner');
        $this->db->join('class c','s.class_id=c.class_id','inner');
        $this->db->order_by('l.leaving_id', 'desc');
        return $this->db->get()->result_array();
    }
        
    /*
     * function to add new leaving_certificate
     */
    function add_leaving_certificate($params)
    {
        $this->db->insert('leaving_certificate',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update leaving_certificate
     */
    function update_leaving_certificate($leaving_id,$params)
    {
        $this->db->where('leaving_id',$leaving_id);
        return $this->db->update('leaving_certificate',$params);
    }
    
    /*
     * function to delete leaving_certificate
     */
    function delete_leaving_certificate($leaving_id)
    {
        return $this->db->delete('leaving_certificate',array('leaving_id'=>$leaving_id));
    }
    
    function updateStudent($student_id,$params){
        $this->db->where('student_id',$student_id);
        return $this->db->update('student',$params);
    }
    function update_dl($ol_id,$params)
    {
        $this->db->where('leaving_id',$ol_id);
        return $this->db->update('leaving_certificate',$params);
    }
}
