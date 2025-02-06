<?php echo form_open('attendance_students/edit_attendance_process/'.$attendance_students['attendID']); ?>
<div class="card-body">
  <h3 class="box-title text-center">Edit Student Attendace</h3>
  <div class="row clearfix">
    <div class="col-md-6">
      <label for="student_name" class="control-label">  <span class="text-danger"></span>Student Name</label>
      <div class="form-group">
        <input readonly="" type="text" name="student_name" value="<?php echo ($this->input->post('student_name') ? $this->input->post('student_name') : $attendance_students['fullname']); ?>" class="form-control" id="student_name" />
          <span class="text-danger"><?php echo form_error('student_name');?></span>
      </div>
    </div> 
    <div class="col-md-3">
      <label for="class_name" class="control-label">  <span class="text-danger"></span>Class</label>
      <div class="form-group">
        <input readonly="" type="text" name="class_name" value="<?php echo ($this->input->post('class_name') ? $this->input->post('class_name') : $attendance_students['class_name']); ?>" class="form-control" id="class_name" />
          <span class="text-danger"><?php echo form_error('class_name');?></span>
      </div>
    </div> 
    <div class="col-md-3">
      <label for="date" class="control-label">  <span class="text-danger">*</span>Date</label>
      <div class="form-group">
        <input readonly="" type="text" name="date" value="<?php echo ($this->input->post('date') ? $this->input->post('date') : $attendance_students['date']); ?>" class="has-datepicker form-control" data-date-format='YYYY-MM-DD' id="date" />
          <span class="text-danger"><?php echo form_error('date');?></span>
      </div>
    </div>
    <div class="col-md-6">
      <label for="date" class="control-label">  <span class="text-danger">*</span>Attendance</label>
      <div class="form-group">
        <input type="radio" <?php if($attendance_students['attendance'] == 0){ echo "checked"; }?> name="attendance" value="0" /><label for=""> Absent</label>
        <span style="margin:0px 40px 0px 40px;"><input type="radio" <?php if($attendance_students['attendance'] == 1){ echo "checked"; }?> name="attendance" value="1" /><label for="event"> Present</label></span>
        <input type="radio" <?php if($attendance_students['attendance'] == 2){ echo "checked"; }?> name="attendance" value="2" /><label for="message"> Leave</label>
      </div>
    </div>
    <div class="col-md-12">
        <label for=" " class="control-label"> </label>
        <div class="form-group text-center">
            <button type="submit" class="btn btn-success"><i class="fa fa-check"></i> Save</button> 
        </div>
      </div>
  </div>
</div>
<?php echo form_close(); ?>
