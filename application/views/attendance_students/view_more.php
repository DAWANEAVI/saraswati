<div class="row">
    <div class="col-md-12">
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">Modified at View More</h3>
            <div class="box-body">
              <div class="row clearfix">
           <div class="col-md-6">
               <label for="attendID" class="control-label">  <span class="text-danger"></span>AttendID</label>
                <div class="form-group">
                  <input disabled type="text" name="attendID" value="<?php echo ($this->input->post('attendID') ? $this->input->post('attendID') : $attendance_students['attendID']); ?>" class="form-control" id="attendID" />
                    <span class="text-danger"><?php echo form_error('attendID');?></span>
               </div>
             </div> 
                        <div class="col-md-6">
               <label for="student_id" class="control-label">  <span class="text-danger"></span>Student id</label>
                <div class="form-group">
                  <input disabled type="text" name="student_id" value="<?php echo ($this->input->post('student_id') ? $this->input->post('student_id') : $attendance_students['student_id']); ?>" class="form-control" id="student_id" />
                    <span class="text-danger"><?php echo form_error('student_id');?></span>
               </div>
             </div> 
             <div class="col-md-6">
               <label for="date" class="control-label">  <span class="text-danger">*</span>Date</label>
                <div class="form-group">
                  <input disabled type="text" name="date" value="<?php echo ($this->input->post('date') ? $this->input->post('date') : $attendance_students['date']); ?>" class="has-datepicker form-control" data-date-format='YYYY-MM-DD' id="date" />
                   <span class="text-danger"><?php echo form_error('date');?></span>
               </div>
             </div>
           <div class="col-md-6">
               <label for="attendance" class="control-label">  <span class="text-danger"></span>Attendance</label>
                <div class="form-group">
                  <input disabled type="text" name="attendance" value="<?php echo ($this->input->post('attendance') ? $this->input->post('attendance') : $attendance_students['attendance']); ?>" class="form-control" id="attendance" />
                    <span class="text-danger"><?php echo form_error('attendance');?></span>
               </div>
             </div> 
              <div class="col-md-6">
                <label for="remarks" class="control-label">  <span class="text-danger"></span>Remarks</label>
                <div class="form-group">
                 <textarea disabled name="remarks" class="form-control    " id="remarks"><?php echo ($this->input->post('remarks') ? $this->input->post('remarks') : $attendance_students['remarks']); ?></textarea>
                 <span class="text-danger"><?php echo form_error('remarks');?></span>
                </div>
              </div> 
              
           <div class="col-md-6">
               <label for="statusID" class="control-label">  <span class="text-danger"></span>StatusID</label>
                <div class="form-group">
                  <input disabled type="text" name="statusID" value="<?php echo ($this->input->post('statusID') ? $this->input->post('statusID') : $attendance_students['statusID']); ?>" class="form-control" id="statusID" />
                    <span class="text-danger"><?php echo form_error('statusID');?></span>
               </div>
             </div> 
                        <div class="col-md-6">
               <label for="created_by" class="control-label">  <span class="text-danger"></span>Created by</label>
                <div class="form-group">
                  <input disabled type="text" name="created_by" value="<?php echo ($this->input->post('created_by') ? $this->input->post('created_by') : $attendance_students['created_by']); ?>" class="form-control" id="created_by" />
                    <span class="text-danger"><?php echo form_error('created_by');?></span>
               </div>
             </div> 
             <div class="col-md-6">
               <label for="created_at" class="control-label">  <span class="text-danger"></span>Created at</label>
                <div class="form-group">
                  <input disabled type="text" name="created_at" value="<?php echo ($this->input->post('created_at') ? $this->input->post('created_at') : $attendance_students['created_at']); ?>" class="has-datetimepicker form-control" data-date-format='YYYY-MM-DD HH:MM:SS' id="created_at" />
                   <span class="text-danger"><?php echo form_error('created_at');?></span>
               </div>
             </div>
           <div class="col-md-6">
               <label for="modified_by" class="control-label">  <span class="text-danger"></span>Modified by</label>
                <div class="form-group">
                  <input disabled type="text" name="modified_by" value="<?php echo ($this->input->post('modified_by') ? $this->input->post('modified_by') : $attendance_students['modified_by']); ?>" class="form-control" id="modified_by" />
                    <span class="text-danger"><?php echo form_error('modified_by');?></span>
               </div>
             </div> 
             <div class="col-md-6">
               <label for="modified_at" class="control-label">  <span class="text-danger"></span>Modified at</label>
                <div class="form-group">
                  <input disabled type="text" name="modified_at" value="<?php echo ($this->input->post('modified_at') ? $this->input->post('modified_at') : $attendance_students['modified_at']); ?>" class="has-datetimepicker form-control" data-date-format='YYYY-MM-DD HH:MM:SS' id="modified_at" />
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
