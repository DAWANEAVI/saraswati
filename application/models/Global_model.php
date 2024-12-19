<?php
class Global_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    function get_config_value($configName){
        $this->db->select('configValue');
        $this->db->from('sys_configuration');
        $this->db->where('configName',$configName);
        $this->db->where('statusID',1);
        //return $this->db->get()->row_array();
        $query = $this->db->get(); 
        if($query->num_rows() != 0){
            $query = $query->row_array();
            return $query['configValue'] ? $query['configValue']:0;     
         }else{
             return null;
         }
    }

    function increment_sms_count(){
        $this->db->where('configName', 'smsCount');
        $this->db->where('statusID',1);
        $this->db->set('configValue', 'configValue+1', FALSE);
        $this->db->update('sys_configuration');
    }


}
