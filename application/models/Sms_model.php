<?php 
class Sms_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    /*
     * Get fee by fees_id
     */
    function get_unsent_sms()
    {
        $this->db->where('sent',0);
        $this->db->where('statusID',1);
        return $this->db->get('sms_log')->result_array();
    }

    function update_sms_log($slog_id,$params)
    {
        $this->db->where('slog_id',$slog_id);
        return $this->db->update('sms_log',$params);
    }
        
    /*
     * function to add new fee
     */
    function add_sms($params)
    {
        $this->db->insert('sms_log',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update fee
     */
    function update_fee($fees_id,$params)
    {
        $this->db->where('fees_id',$fees_id);
        return $this->db->update('fees',$params);
    }
    
    /*
     * function to delete fee
     */
    function delete_fee($fees_id)
    {
        return $this->db->delete('fees',array('fees_id'=>$fees_id));
    }

    function get_all_sms_templates()
    {
        $this->db->where('statusID',1);
        return $this->db->get('sms_templates')->result_array();
    }

    function get_sms_template($dltTemplateID)
    {
        return $this->db->get_where('sms_templates',array('dltTemplateID'=>$dltTemplateID,'statusID'=>1))->row_array();
    }

    /*
      * Get All sms_log count 
    */ 
    function get_all_sms_log_count()
    {
    try{
        $this->db->from('sms_log');
        return $this->db->count_all_results();
        } catch (Exception $ex) {
            throw new Exception('Sms_model model : Error in get_all_sms_log_count function - ' . $ex);
        }  
    }

    /*
    * Get All with associated tables join sms_logcount 
    */ 
    function get_all_with_asso_sms_log()
    {
    try{
        $this->db->select('*');
        $this->db->from('sms_log a  ' );
        $this->db->join('academic_session b', 'b.session_id=a. session_id','left');
        $this->db->join('student c', 'c.student_id=a. student_id','left');
        $this->db->join('sms_templates d', 'd.dltTemplateID=a. template_id','left');
        $query = $this->db->get(); 
        if($query->num_rows() != 0){
            return $query->result_array();
        }else{
            return false;
        }
        } catch (Exception $ex) {
            throw new Exception('Sms_log_model model : Error in get_all_with_asso_sms_log function - ' . $ex);
        }  
    }
    /*
    * Get all sms_log 
    */ 
    function get_all_sms_log($params = array())
    {
    try{
            $this->db->select('a.mobile_no,b.session,a.message,a.sent,a.message_id,a.verified,a.template_id,c.fullname,d.dltTemplateID,a.created_at');
            $this->db->from('sms_log a' );
            $this->db->join('academic_session b', 'b.session_id=a. session_id','left');
            $this->db->join('student c', 'c.student_id=a. student_id','left');
            $this->db->join('sms_templates d', 'd.dltTemplateID=a. template_id','left');
            if(isset($params) && !empty($params)){
            $this->db->limit($params['limit'], $params['offset']);
            }
            return $this->db->get()->result_array();
        } catch (Exception $ex) {
            throw new Exception('Sms_log_model model : Error in get_all_sms_log function - ' . $ex);
        }  
    }
  
}
