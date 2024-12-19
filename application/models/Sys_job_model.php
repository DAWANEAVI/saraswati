<?php
class Sys_job_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    function get_session_job_dates($session_id){
        $this->db->from('sys_jobdates');
        $this->db->where('session_id',$session_id);
        $this->db->where('statusID',1);
        $this->db->order_by('sequence','asc');
        $query = $this->db->get();
        return $query->result_array();
    }

    function get_fees_for_job($session_id,$class_id,$fees_for){
        $this->db->from('fees');
        $this->db->where('session_id',$session_id);
        $this->db->where('class_id',$class_id);
        $this->db->where('fees_for',$fees_for);
        $this->db->where('statusID',1);
        return $this->db->get()->row_array();
    }

    function get_student_payment_for_job($session_id,$class_id,$payment_seq)
    {
        $this->db->select('p.*');
        $this->db->from('payments p');
        $this->db->join('student s','s.student_id=p.student_id','inner');
        $this->db->where('p.total_amount > p.paid_amount');
        $this->db->where('p.session_id',$session_id);
        $this->db->where('p.class_id',$class_id);
        $this->db->where('p.payment_seq !=',$payment_seq);
        $this->db->where('p.statusID', 1);
        $this->db->where('s.is_active', 1);
        return $this->db->get()->result_array();
    }

    function add_sys_payment_log($params)
    {
        $this->db->insert('payment_joblog',$params);
        //print_r($this->db->last_query());die();
        return $this->db->insert_id();
    }

}
