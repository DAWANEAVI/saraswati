<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class User_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    /*
     * Get user by user_id
     */
    function checkLogin($uname,$pwd){
        $this->db->select('*');
        $this->db->from('user_users');
        $this->db->where('username',$uname);
        $this->db->where('password',$pwd);
        $query = $this->db->get();
        if($query->num_rows()>0){
            
            $data = $query->row();
            $userAccess = $this->get_user_access($data->user_id);
            //print_r($userAccess);die();
            $moduleAccess = json_decode($userAccess['modules']);
            $submoduleAccess = json_decode($userAccess['submodules']);
            $this->session->set_userdata(array(
                'name'=>$data->fname.' '.$data->lname,
                'email'=>$data->email,
                'user_id'=>$data->user_id,
                'userCatID'=>$data->userCatID,
                'userDesID'=>$data->userDesID,
                'moduleAccess' => $moduleAccess,
                'submoduleAccess' => $submoduleAccess,
                'is_login'=>true,
            ));
        
            return true;
        }else{
            return false;
        }
        
    }
    
    function get_modules()
    {
        $this->db->order_by('moduleID', 'asc');
        $this->db->where('statusID', 1);
        return $this->db->get('sys_module')->result_array();
    }

    function get_all_submodules()
    {
        $this->db->where('statusID', 1);
        return $this->db->get('sys_submodule')->result_array();
    }

    function get_submodules_by_module_id($moduleID)
    {
        $this->db->order_by('seq', 'asc');
        $this->db->where('moduleID', $moduleID);
        $this->db->where('statusID', 1);
        return $this->db->get('sys_submodule')->result_array();
    }

    function get_user_access($user_id)
    {
        return $this->db->get_where('user_access',array('user_id'=>$user_id,'statusID' => 1))->row_array();
    }

    function insert_user_access($params)
    {
        $this->db->insert('user_access',$params);
        return $this->db->insert_id();;
    }

    function update_user_access($user_id,$params)
    {
        $this->db->where('user_id',$user_id);
        return $this->db->update('user_access',$params);
    }


    function get_user($user_id)
    {
        return $this->db->get_where('user_users',array('user_id' =>$user_id,'statusID' => 1))->row_array();
    }
        
    /*
     * Get all users
     */
    function get_all_users()
    {
        $this->db->select('u.*,d.designation,c.category');
        $this->db->from('user_users u');
        $this->db->join('user_designation d','d.userDesID=u.userDesID','inner');
        $this->db->join('user_category c','c.userCatID=u.userCatID','inner');
        $this->db->where('u.statusID',1);
        $this->db->order_by('u.user_id', 'asc');
        return $this->db->get()->result_array();
    }
        
    /*
     * function to add new user
     */
    function add_user($params)
    {
        $this->db->insert('user_users',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update user
     */
    function update_user($user_id,$params)
    {
        $this->db->where('user_id',$user_id);
        return $this->db->update('user_users',$params);
    }
    
    /*
     * function to delete user
     */
    function delete_user($user_id)
    {
        return $this->db->delete('user_users',array('user_id'=>$user_id));
    }

    /*
     * Get all users
     */
    function get_designations()
    {
        $this->db->order_by('userDesID', 'asc');
        $this->db->where('statusID', 1);
        return $this->db->get('user_designation')->result_array();
    }

    function get_user_categories()
    {
        $this->db->order_by('userCatID', 'asc');
        $this->db->where('statusID', 1);
        return $this->db->get('user_category')->result_array();
    }
    
    function matchPassword($user_id,$password){
        $pass = sha1($password);
        $this->db->select('user_id');
        $this->db->from('user_users');
        $this->db->where('user_id',$user_id);
        $this->db->where('password',$pass);
        $query = $this->db->get();
        if($query->num_rows()>0){
            return true;
        }else{
            return false;
        }
    }
    function reset_password($user_id,$password){
        $this->db->where('user_id',$user_id);
        $this->db->set('password',hash('sha256',$password));
        if($this->db->update('user_users')){
            return true;
        }else{
            return false;
        }
    }
    
}
