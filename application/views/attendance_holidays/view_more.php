<div class="row">
    <div class="col-md-12">
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">Modified at View More</h3>
            <div class="box-body">
              <div class="row clearfix">
           <div class="col-md-6">
               <label for="holidayID" class="control-label">  <span class="text-danger"></span>HolidayID</label>
                <div class="form-group">
                  <input disabled type="text" name="holidayID" value="<?php echo ($this->input->post('holidayID') ? $this->input->post('holidayID') : $attendance_holidays['holidayID']); ?>" class="form-control" id="holidayID" />
                    <span class="text-danger"><?php echo form_error('holidayID');?></span>
               </div>
             </div> 
              <div class="col-md-6">
                <label for="holiday" class="control-label">  <span class="text-danger"></span>Holiday</label>
                <div class="form-group">
                 <textarea disabled name="holiday" class="form-control    " id="holiday"><?php echo ($this->input->post('holiday') ? $this->input->post('holiday') : $attendance_holidays['holiday']); ?></textarea>
                 <span class="text-danger"><?php echo form_error('holiday');?></span>
                </div>
              </div> 
              
<div class="col-md-6">
               <label for="holidayDate" class="control-label">  <span class="text-danger"></span>HolidayDate</label>
                <div class="form-group">
                  <input disabled type="text" name="holidayDate" value="<?php echo ($this->input->post('holidayDate') ? $this->input->post('holidayDate') : $attendance_holidays['holidayDate']); ?>" class="has-datepicker form-control" data-date-format='YYYY-MM-DD' id="holidayDate" />
                   <span class="text-danger"><?php echo form_error('holidayDate');?></span>
               </div>
             </div>
           <div class="col-md-6">
               <label for="statusID" class="control-label">  <span class="text-danger"></span>StatusID</label>
                <div class="form-group">
                  <input disabled type="text" name="statusID" value="<?php echo ($this->input->post('statusID') ? $this->input->post('statusID') : $attendance_holidays['statusID']); ?>" class="form-control" id="statusID" />
                    <span class="text-danger"><?php echo form_error('statusID');?></span>
               </div>
             </div> 
                        <div class="col-md-6">
               <label for="created_by" class="control-label">  <span class="text-danger"></span>Created by</label>
                <div class="form-group">
                  <input disabled type="text" name="created_by" value="<?php echo ($this->input->post('created_by') ? $this->input->post('created_by') : $attendance_holidays['created_by']); ?>" class="form-control" id="created_by" />
                    <span class="text-danger"><?php echo form_error('created_by');?></span>
               </div>
             </div> 
             <div class="col-md-6">
               <label for="created_at" class="control-label">  <span class="text-danger"></span>Created at</label>
                <div class="form-group">
                  <input disabled type="text" name="created_at" value="<?php echo ($this->input->post('created_at') ? $this->input->post('created_at') : $attendance_holidays['created_at']); ?>" class="has-datetimepicker form-control" data-date-format='YYYY-MM-DD HH:MM:SS' id="created_at" />
                   <span class="text-danger"><?php echo form_error('created_at');?></span>
               </div>
             </div>
           <div class="col-md-6">
               <label for="modified_by" class="control-label">  <span class="text-danger"></span>Modified by</label>
                <div class="form-group">
                  <input disabled type="text" name="modified_by" value="<?php echo ($this->input->post('modified_by') ? $this->input->post('modified_by') : $attendance_holidays['modified_by']); ?>" class="form-control" id="modified_by" />
                    <span class="text-danger"><?php echo form_error('modified_by');?></span>
               </div>
             </div> 
             <div class="col-md-6">
               <label for="modified_at" class="control-label">  <span class="text-danger"></span>Modified at</label>
                <div class="form-group">
                  <input disabled type="text" name="modified_at" value="<?php echo ($this->input->post('modified_at') ? $this->input->post('modified_at') : $attendance_holidays['modified_at']); ?>" class="has-datetimepicker form-control" data-date-format='YYYY-MM-DD HH:MM:SS' id="modified_at" />
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
