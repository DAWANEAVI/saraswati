<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Payment_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    /*
     * Get payment by payment_id
     */
    function get_payment($payment_id)
    {
        return $this->db->get_where('payments',array('payment_id'=>$payment_id))->row_array();
    }
        
    /*
     * Get all payments
     */
    function get_all_payments()
    {
        $this->db->select('p.*,s.fullname,s.mobile_no,c.numeric_name');
        $this->db->from('payments p');
        $this->db->join('student s','p.student_id=s.student_id','inner');
        $this->db->join('class c','s.class_id=c.class_id','inner');
        $this->db->where('p.total_amount >p.paid_amount');
        $this->db->order_by('payment_id', 'desc');
        $this->db->group_by('s.student_id', 'desc');
        return $this->db->get('payments')->result_array();
    }
        
    /*
     * function to add new payment
     */
    function add_payment($params)
    {
        $this->db->insert('payments',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update payment
     */
    function update_payment($payment_id,$params)
    {
        $this->db->where('payment_id',$payment_id);
        return $this->db->update('payments',$params);
    }
    function updatePaymentByStudentIdAcademicYear($student_id,$academic_year,$params){
         $this->db->where('student_id',$student_id);
         $this->db->where('academic_year',$academic_year);
         return $this->db->update('payments',$params);
    }
    
    function updateEditedPayment($amount,$id){
        $this->db->set('paid_amount',$amount);
        $this->db->where('payment_id',$id);
        $this->db->update('payments');
    }
    
    /*
     * function to delete payment
     */
    function delete_payment($payment_id)
    {
        return $this->db->delete('payments',array('payment_id'=>$payment_id));
    }
    
    function getPaymentByStudent($student_id){
        $this->db->select('GROUP_CONCAT(payment_id) as id,GROUP_CONCAT(p.academic_year) as year,sum(p.total_amount) as total,sum(p.paid_amount) as paid,s.fullname,s.class_id,s.old_fees,s.paid_fees,p.education_fee,p.term_fee,p.exam_fee,p.sport_fee,p.miscellaneous_fee');
        $this->db->from('payments p');
        $this->db->join('student s','p.student_id=s.student_id','inner');
        $this->db->where('p.student_id',$student_id);
        $this->db->group_by('p.student_id');
        $query= $this->db->get();
        return $query->row();
    }
    
    function updatePayment($amt,$payment_id){
        $this->db->set('paid_amount','paid_amount+'.$amt,false);
        $this->db->where('payment_id',$payment_id);
        $this->db->update('payments');
    }
    
     function updatePastPayment($amt,$student_id){
        $this->db->set('paid_fees','paid_fees+'.$amt,false);
        $this->db->where('student_id',$student_id);
        $this->db->update('student');
    }
    function updatePaymentTypes($paramiters,$payment_id){
        $this->db->set('education_fee','education_fee-'.$paramiters["education_fee"],false);
        $this->db->set('term_fee','term_fee-'.$paramiters["term_fee"],false);
        $this->db->set('exam_fee','exam_fee-'.$paramiters["exam_fee"],false);
        $this->db->set('sport_fee','sport_fee-'.$paramiters["sport_fee"],false);
        $this->db->set('miscellaneous_fee','miscellaneous_fee-'.$paramiters["misc_fee"],false);
        $this->db->where('payment_id',$payment_id);
        $this->db->update('payments');
    }
    
    function getMaxPaymentIdByStudent($stud_id){
        $this->db->select('max(payment_id)as payment_id');
        $this->db->from('payments');
        $this->db->where('student_id',$stud_id);
        $query = $this->db->get();
        return $query->row();
    }
    
    function updatePaymentPromotedEdit($payment_id,$param){
        $this->db->where('payment_id',$payment_id);
        $this->db->update('payments',$param);
    }
    
    function getAllPaymentHistory($student_id){
        $this->db->select("pl.*,p.academic_year,p.total_amount,p.paid_amount");
        $this->db->from('payment_log pl');
        $this->db->join('payments p','pl.payment_id=p.payment_id','inner');
        $this->db->where('p.student_id',$student_id);
        $query = $this->db->get();
        return $query->result_array();
    }
    
    function getStudentAcademicYear($student_id){
         $this->db->select('academic_year');
         $this->db->from('student');
         $this->db->where('student_id',$student_id);
         $query = $this->db->get()->row();
         return $query->academic_year;
                 
    }
    function getClassNumber($class_id){
        $this->db->select('numeric_name');
        $this->db->from('class');
        $this->db->where('class_id',$class_id);
        $query = $this->db->get();
        return $query->row();
    }
    function getLastClassid($class_num){
         $this->db->select('class_id');
        $this->db->from('class');
        $this->db->where('numeric_name',$class_num);
        $query = $this->db->get();
        return $query->row();
    }
    
    function getPaymentHistory($stud_id){
        $this->db->select('*');
        $this->db->from('payments');
        $this->db->where('student_id',$stud_id);
        $query = $this->db->get();
        return $query->result_array();
    }
    
    function getTransactions($stud_id){
        $this->db->select('pl.*');
        $this->db->from('payment_log pl');
        $this->db->join('payments p','pl.payment_id=p.payment_id','inner');
        $this->db->where('p.student_id',$stud_id);
        $query = $this->db->get();
        return $query->result_array();
        
    }
    
    function getAllPaymentRecord($student_id){
        $this->db->select('payment_id,academic_year,total_amount,paid_amount');
        $this->db->from('payments');
        $this->db->where('student_id',$student_id);
        return $this->db->get()->result_array();
    }
}