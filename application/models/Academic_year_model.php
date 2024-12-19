<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Dashboard_model
 *
 * @author durga it
 */
class Academic_year_model  extends CI_Model{
     function __construct()
    {
        parent::__construct();
    }
    //put your code here
    
    /*
     * Get clas by session
     */
    function get_session($session_id)
    {
        return $this->db->get_where('academic_session',array('session_id'=>$session_id))->row_array();
    }

    function check_active_session()
    {
        return $this->db->get_where('academic_session',array('is_running'=>1))->row_array();
    }

    function check_session_by_value($value)
    {
        return $this->db->get_where('academic_session',array('session'=>$value))->row_array();
    }

    function getSessionByAcadamicYear($session)
    {
        $this->db->where('session',$session);
        $this->db->where('status',1);
        return $this->db->get('academic_session')->row()->session_id;
    }
        
    /*
     * Get all class
     */
    function get_all_session()
    {
        $this->db->order_by('session_id', 'desc');
        $this->db->where('status',1);
        return $this->db->get('academic_session')->result_array();
    }
        
    /*
     * function to add new session
     */
    function add_session($params)
    {
        $this->db->insert('academic_session',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update session
     */
    function update_session($session_id,$params)
    {
        $this->db->where('session_id',$session_id);
        return $this->db->update('academic_session',$params);
    }
    
    /*
     * function to delete session
     */
    function delete_session($session_id)
    {
        return $this->db->delete('academic_session',array('session_id'=>$session_id));
    }
   
}
