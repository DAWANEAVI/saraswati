<?php 
/*
   Generated by Manuigniter v2.0 
   www.manuigniter.com
*/
class Payment_concession_model extends CI_Model 
{ 
     function __construct()
      {
          parent::__construct();
      }
      /*
        * Get payment_concession by concID 
      */ 
      function check_recod($session_id,$payment_id,$student_id,$class_id)
      {
        try{
                $this->db->where('session_id', $session_id);
                $this->db->where('payment_id', $payment_id);
                $this->db->where('student_id', $student_id);
                $this->db->where('class_id', $class_id);
                $this->db->where('statusID', 1);
               return $this->db->get('payment_concession')->row_array();
           } catch (Exception $ex) {
             throw new Exception('Subject Paper : Error in check record function - ' . $ex);
           }  
      }

      function get_payment_concession($concID)
      {
        try{
           return $this->db->get_where('payment_concession',array('concID'=>$concID,'statusID' => 1))->row_array();
           } catch (Exception $ex) {
             throw new Exception('Payment_concession_model Model : Error in get_payment_concession function - ' . $ex);
           }  
      }
      /*
        * Get payment_concession by  column name
      */ 
      function get_payment_concessionbyclm_name($clm_name,$clm_value)
      {
        try{
           return $this->db->get_where('payment_concession',array($clm_name=>$clm_value))->row_array();
           } catch (Exception $ex) {
             throw new Exception('Payment_concession_model Madel : Error in get_payment_concessionbyclm_name function - ' . $ex);
           }  
      }
     /*
        * Get All payment_concession count 
      */ 
      function get_all_payment_concession_count()
      {
        try{
           $this->db->from('payment_concession');
           return $this->db->count_all_results();
           } catch (Exception $ex) {
             throw new Exception('Payment_concession_model model : Error in get_all_payment_concession_count function - ' . $ex);
           }  
      }

      function get_concession_by_session_and_class($session_id,$class_id)
      {
        try{
            $this->db->select('pc.created_at,pc.amount,s.fullname,s.student_id,c.numeric_name,c.class_name,p.class_id,p.academic_year');
            $this->db->from('payment_concession pc');
            $this->db->join('payments p','p.payment_id=pc.payment_id','inner');
            $this->db->join('class c','c.class_id=pc.class_id','inner');
            $this->db->join('student s','s.student_id=pc.student_id','inner');
            $this->db->where('pc.class_id',$class_id);
            $this->db->where('pc.session_id',$session_id);
            $this->db->where('pc.statusID', 1);
            $this->db->where('p.statusID', 1);
            $this->db->where('s.is_active', 1);
          return $this->db->get()->result_array();
          } catch (Exception $ex) {
            throw new Exception('Payment_concession_model model : Error in get_all_payment_concession_count function - ' . $ex);
          }  
      }
     /*
        * Get All with associated tables join payment_concessioncount 
      */ 
      function get_all_with_asso_payment_concession()
      {
        try{
          $query = $this->db->get(); 
            if($query->num_rows() != 0){
               return $query->result_array();
            }else{
                return false;
            }
           } catch (Exception $ex) {
             throw new Exception('Payment_concession_model model : Error in get_all_with_asso_payment_concession function - ' . $ex);
           }  
      }
      /*
          * Get all payment_concession 
      */ 
      function get_all_payment_concession($session_id)
      {
        try{
              $this->db->order_by('concID', 'desc');
              $this->db->select('pc.created_at,pc.amount,s.fullname,s.student_id,c.numeric_name,c.class_name,p.class_id,p.academic_year');
              $this->db->from('payment_concession pc');
              $this->db->join('payments p','p.payment_id=pc.payment_id','inner');
              $this->db->join('class c','c.class_id=pc.class_id','inner');
              $this->db->join('student s','s.student_id=pc.student_id','inner');
              $this->db->where('pc.session_id',$session_id);
              $this->db->where('pc.statusID', 1);
              $this->db->where('p.statusID', 1);
              $this->db->where('s.is_active', 1);
          return $this->db->get()->result_array();
           } catch (Exception $ex) {
             throw new Exception('Payment_concession_model model : Error in get_all_payment_concession function - ' . $ex);
           }  
      } 
      /*
         * function to add new payment_concession 
      */
      function add_payment_concession($params)
      {
        try{
          $this->db->insert('payment_concession',$params);
          return $this->db->insert_id();
          } catch (Exception $ex) {
             throw new Exception('Payment_concession_model model : Error in add_payment_concession function - ' . $ex);
          }  
      }
      /* 
          * function to update payment_concession 
      */
      function update_payment_concession($concID,$params)
      {
        try{
            $this->db->where('concID',$concID);
        return $this->db->update('payment_concession',$params);
           } catch (Exception $ex) {
             throw new Exception('Payment_concession_model model : Error in update_payment_concession function - ' . $ex);
           }  
       }
     /* 
          * function to delete payment_concession 
      */
       function delete_payment_concession($concID)
       {
        try{
             return $this->db->delete('payment_concession',array('concID'=>$concID));
           } catch (Exception $ex) {
             throw new Exception('Payment_concession_model model : Error in delete_payment_concession function - ' . $ex);
           }  
       }
      /*
        * Get payment_concession by  column name where not in particular id
      */ 
      function get_payment_concessionbyclm_name_not_id($clm_name,$clm_value,$where_cond)
      {
        try{
            $this->db->where('concID!=', $where_cond);
           return $this->db->get_where('payment_concession',array($clm_name=>$clm_value))->row_array();
           } catch (Exception $ex) {
             throw new Exception('Payment_concession_model model : Error in get_payment_concessionbyclm_name_not_id function - ' . $ex);
           }  
      }
     /*
        * Get All with associated tables join payment_concessioncount 
      */ 
      function get_all_with_asso_payment_concession_by_cat($column_name=null,$value_id=null,$params=array())
      {
        try{
          $query = $this->db->get(); 
            if($query->num_rows() != 0){
               return $query->result_array();
            }else{
                return false;
            }
           } catch (Exception $ex) {
             throw new Exception('Payment_concession_model model : Error in get_all_with_asso_payment_concession_by_cat function - ' . $ex);
           }  
      }
      /*
          * Get all payment_concession_by_cat 
      */ 
      function get_all_payment_concession_by_cat($column_name=null,$value_id=null,$params=array())
      {
        try{
              $this->db->order_by('concID', 'desc');
              $this->db->where($column_name, $value_id);
              if(isset($params) && !empty($params)){
               $this->db->limit($params['limit'], $params['offset']);
              }
               return $this->db->get('payment_concession')->result_array();
           } catch (Exception $ex) {
             throw new Exception('Payment_concession_model model : Error in get_all_payment_concession_by_cat function - ' . $ex);
           }  
      } 
 }
