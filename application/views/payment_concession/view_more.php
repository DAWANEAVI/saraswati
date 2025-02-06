<div class="row">
    <div class="col-md-12">
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">Modified at View More</h3>
            <div class="box-body">
              <div class="row clearfix">
           <div class="col-md-6">
               <label for="concID" class="control-label">  <span class="text-danger"></span>ConcID</label>
                <div class="form-group">
                  <input disabled type="text" name="concID" value="<?php echo ($this->input->post('concID') ? $this->input->post('concID') : $payment_concession['concID']); ?>" class="form-control" id="concID" />
                    <span class="text-danger"><?php echo form_error('concID');?></span>
               </div>
             </div> 
                        <div class="col-md-6">
               <label for="session_id" class="control-label">  <span class="text-danger"></span>Session id</label>
                <div class="form-group">
                  <input disabled type="text" name="session_id" value="<?php echo ($this->input->post('session_id') ? $this->input->post('session_id') : $payment_concession['session_id']); ?>" class="form-control" id="session_id" />
                    <span class="text-danger"><?php echo form_error('session_id');?></span>
               </div>
             </div> 
                        <div class="col-md-6">
               <label for="payment_id" class="control-label">  <span class="text-danger"></span>Payment id</label>
                <div class="form-group">
                  <input disabled type="text" name="payment_id" value="<?php echo ($this->input->post('payment_id') ? $this->input->post('payment_id') : $payment_concession['payment_id']); ?>" class="form-control" id="payment_id" />
                    <span class="text-danger"><?php echo form_error('payment_id');?></span>
               </div>
             </div> 
                        <div class="col-md-6">
               <label for="student_id" class="control-label">  <span class="text-danger"></span>Student id</label>
                <div class="form-group">
                  <input disabled type="text" name="student_id" value="<?php echo ($this->input->post('student_id') ? $this->input->post('student_id') : $payment_concession['student_id']); ?>" class="form-control" id="student_id" />
                    <span class="text-danger"><?php echo form_error('student_id');?></span>
               </div>
             </div> 
                        <div class="col-md-6">
               <label for="class_id" class="control-label">  <span class="text-danger"></span>Class id</label>
                <div class="form-group">
                  <input disabled type="text" name="class_id" value="<?php echo ($this->input->post('class_id') ? $this->input->post('class_id') : $payment_concession['class_id']); ?>" class="form-control" id="class_id" />
                    <span class="text-danger"><?php echo form_error('class_id');?></span>
               </div>
             </div> 
                        <div class="col-md-6">
               <label for="amount" class="control-label">  <span class="text-danger"></span>Amount</label>
                <div class="form-group">
                  <input disabled type="text" name="amount" value="<?php echo ($this->input->post('amount') ? $this->input->post('amount') : $payment_concession['amount']); ?>" class="form-control" id="amount" />
                    <span class="text-danger"><?php echo form_error('amount');?></span>
               </div>
             </div> 
                        <div class="col-md-6">
               <label for="statusID" class="control-label">  <span class="text-danger"></span>StatusID</label>
                <div class="form-group">
                  <input disabled type="text" name="statusID" value="<?php echo ($this->input->post('statusID') ? $this->input->post('statusID') : $payment_concession['statusID']); ?>" class="form-control" id="statusID" />
                    <span class="text-danger"><?php echo form_error('statusID');?></span>
               </div>
             </div> 
                        <div class="col-md-6">
               <label for="created_by" class="control-label">  <span class="text-danger"></span>Created by</label>
                <div class="form-group">
                  <input disabled type="text" name="created_by" value="<?php echo ($this->input->post('created_by') ? $this->input->post('created_by') : $payment_concession['created_by']); ?>" class="form-control" id="created_by" />
                    <span class="text-danger"><?php echo form_error('created_by');?></span>
               </div>
             </div> 
             <div class="col-md-6">
               <label for="created_at" class="control-label">  <span class="text-danger"></span>Created at</label>
                <div class="form-group">
                  <input disabled type="text" name="created_at" value="<?php echo ($this->input->post('created_at') ? $this->input->post('created_at') : $payment_concession['created_at']); ?>" class="has-datetimepicker form-control" data-date-format='YYYY-MM-DD HH:MM:SS' id="created_at" />
                   <span class="text-danger"><?php echo form_error('created_at');?></span>
               </div>
             </div>
           <div class="col-md-6">
               <label for="modified_by" class="control-label">  <span class="text-danger"></span>Modified by</label>
                <div class="form-group">
                  <input disabled type="text" name="modified_by" value="<?php echo ($this->input->post('modified_by') ? $this->input->post('modified_by') : $payment_concession['modified_by']); ?>" class="form-control" id="modified_by" />
                    <span class="text-danger"><?php echo form_error('modified_by');?></span>
               </div>
             </div> 
             <div class="col-md-6">
               <label for="modified_at" class="control-label">  <span class="text-danger"></span>Modified at</label>
                <div class="form-group">
                  <input disabled type="text" name="modified_at" value="<?php echo ($this->input->post('modified_at') ? $this->input->post('modified_at') : $payment_concession['modified_at']); ?>" class="has-datetimepicker form-control" data-date-format='YYYY-MM-DD HH:MM:SS' id="modified_at" />
                   <span class="text-danger"><?php echo form_error('modified_at');?></span>
               </div>
             </div>
        </div>
      </div>
            <div class="box-footer">
            </div>
        </div>
    </div>
</div>
</div>
