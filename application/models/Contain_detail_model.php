<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Contain_detail_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    /*
     * Get contain_detail by conatin_details_id
     */
    function get_contain_detail($conatin_details_id)
    {
        return $this->db->get_where('contain_details',array('conatin_details_id'=>$conatin_details_id))->row_array();
    }
        
    /*
     * Get all contain_details
     */
    function get_all_contain_details()
    {
        $this->db->order_by('conatin_details_id', 'desc');
        return $this->db->get('contain_details')->result_array();
    }
        
    /*
     * function to add new contain_detail
     */
    function add_contain_detail($params)
    {
        $this->db->insert('contain_details',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update contain_detail
     */
    function update_contain_detail($conatin_details_id,$params)
    {
        $this->db->where('conatin_details_id',$conatin_details_id);
        return $this->db->update('contain_details',$params);
    }
    
    /*
     * function to delete contain_detail
     */
    function delete_contain_detail($conatin_details_id)
    {
        return $this->db->delete('contain_details',array('conatin_details_id'=>$conatin_details_id));
    }
}
