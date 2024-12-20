<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Topper_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    /*
     * Get topper by id
     */
    function get_topper($id)
    {
        return $this->db->get_where('toppers',array('id'=>$id))->row_array();
    }
        
    /*
     * Get all toppers
     */
    function get_all_toppers()
    {
        $this->db->order_by('id', 'desc');
        return $this->db->get('toppers')->result_array();
    }
        
    /*
     * function to add new topper
     */
    function add_topper($params)
    {
        $this->db->insert('toppers',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update topper
     */
    function update_topper($id,$params)
    {
        $this->db->where('id',$id);
        return $this->db->update('toppers',$params);
    }
    
    /*
     * function to delete topper
     */
    function delete_topper($id)
    {
        return $this->db->delete('toppers',array('id'=>$id));
    }
}
