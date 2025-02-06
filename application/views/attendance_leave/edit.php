<div class="row">
    <div class="col-md-12">
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">Attendance Leave Edit</h3>
            <?php echo form_open('attendance_leave/edit/'.$attendance_leave['leaveID']); ?>
            <div class="box-body">
              <div class="row clearfix">
           <div class="col-md-6">
               <label for="leaveID" class="control-label">  <span class="text-danger"></span>LeaveID</label>
                <div class="form-group">
                  <input type="text" name="leaveID" value="<?php echo ($this->input->post('leaveID') ? $this->input->post('leaveID') : $attendance_leave['leaveID']); ?>" class="form-control" id="leaveID" />
                    <span class="text-danger"><?php echo form_error('leaveID');?></span>
               </div>
             </div> 
                        <div class="col-md-6">
               <label for="user_id" class="control-label">  <span class="text-danger"></span>User id</label>
                <div class="form-group">
                  <input type="text" name="user_id" value="<?php echo ($this->input->post('user_id') ? $this->input->post('user_id') : $attendance_leave['user_id']); ?>" class="form-control" id="user_id" />
                    <span class="text-danger"><?php echo form_error('user_id');?></span>
               </div>
             </div> 
                        <div class="col-md-6">
               <label for="user_type" class="control-label">  <span class="text-danger"></span>User type</label>
                <div class="form-group">
                  <input type="text" name="user_type" value="<?php echo ($this->input->post('user_type') ? $this->input->post('user_type') : $attendance_leave['user_type']); ?>" class="form-control" id="user_type" />
                    <span class="text-danger"><?php echo form_error('user_type');?></span>
               </div>
             </div> 
             <div class="col-md-6">
               <label for="leaveDate" class="control-label">  <span class="text-danger"></span>LeaveDate</label>
                <div class="form-group">
                  <input type="text" name="leaveDate" value="<?php echo ($this->input->post('leaveDate') ? $this->input->post('leaveDate') : $attendance_leave['leaveDate']); ?>" class="has-datepicker form-control" data-date-format='YYYY-MM-DD' id="leaveDate" />
                   <span class="text-danger"><?php echo form_error('leaveDate');?></span>
               </div>
             </div>
 <div class="col-md-6">
                <label for="leave_reasons" class="control-label">  <span class="text-danger"></span>Leave reasons</label>
                <div class="form-group">
                 <textarea name="leave_reasons" class="form-control    " id="leave_reasons"><?php echo ($this->input->post('leave_reasons') ? $this->input->post('leave_reasons') : $attendance_leave['leave_reasons']); ?></textarea>
                 <span class="text-danger"><?php echo form_error('leave_reasons');?></span>
                </div>
              </div> 
              
           <div class="col-md-6">
               <label for="status" class="control-label">  <span class="text-danger"></span>Status</label>
                <div class="form-group">
                  <input type="text" name="status" value="<?php echo ($this->input->post('status') ? $this->input->post('status') : $attendance_leave['status']); ?>" class="form-control" id="status" />
                    <span class="text-danger"><?php echo form_error('status');?></span>
               </div>
             </div> 
                        <div class="col-md-6">
               <label for="screen_by" class="control-label">  <span class="text-danger"></span>Screen by</label>
                <div class="form-group">
                  <input type="text" name="screen_by" value="<?php echo ($this->input->post('screen_by') ? $this->input->post('screen_by') : $attendance_leave['screen_by']); ?>" class="form-control" id="screen_by" />
                    <span class="text-danger"><?php echo form_error('screen_by');?></span>
               </div>
             </div> 
              <div class="col-md-6">
                <label for="remarks" class="control-label">  <span class="text-danger"></span>Remarks</label>
                <div class="form-group">
                 <textarea name="remarks" class="form-control    " id="remarks"><?php echo ($this->input->post('remarks') ? $this->input->post('remarks') : $attendance_leave['remarks']); ?></textarea>
                 <span class="text-danger"><?php echo form_error('remarks');?></span>
                </div>
              </div> 
              
           <div class="col-md-6">
               <label for="created_by" class="control-label">  <span class="text-danger"></span>Created by</label>
                <div class="form-group">
                  <input type="text" name="created_by" value="<?php echo ($this->input->post('created_by') ? $this->input->post('created_by') : $attendance_leave['created_by']); ?>" class="form-control" id="created_by" />
                    <span class="text-danger"><?php echo form_error('created_by');?></span>
               </div>
             </div> 
             <div class="col-md-6">
               <label for="created_at" class="control-label">  <span class="text-danger"></span>Created at</label>
                <div class="form-group">
                  <input type="text" name="created_at" value="<?php echo ($this->input->post('created_at') ? $this->input->post('created_at') : $attendance_leave['created_at']); ?>" class="has-datetimepicker form-control" data-date-format='YYYY-MM-DD HH:MM:SS' id="created_at" />
                   <span class="text-danger"><?php echo form_error('created_at');?></span>
               </div>
             </div>
           <div class="col-md-6">
               <label for="modified_by" class="control-label">  <span class="text-danger"></span>Modified by</label>
                <div class="form-group">
                  <input type="text" name="modified_by" value="<?php echo ($this->input->post('modified_by') ? $this->input->post('modified_by') : $attendance_leave['modified_by']); ?>" class="form-control" id="modified_by" />
                    <span class="text-danger"><?php echo form_error('modified_by');?></span>
               </div>
             </div> 
             <div class="col-md-6">
               <label for="modified_at" class="control-label">  <span class="text-danger"></span>Modified at</label>
                <div class="form-group">
                  <input type="text" name="modified_at" value="<?php echo ($this->input->post('modified_at') ? $this->input->post('modified_at') : $attendance_leave['modified_at']); ?>" class="has-datetimepicker form-control" data-date-format='YYYY-MM-DD HH:MM:SS' id="modified_at" />
                   <span class="text-danger"><?php echo form_error('modified_at');?></span>
               </div>
             </div>
        </div>
      </div>
            <div class="box-footer">
              <button type="submit" class="btn btn-success">
                <i class="fa fa-check"></i> Save
              </button>
            </div>
            <?php echo form_close(); ?>
        </div>
    </div>
</div>
</div>
