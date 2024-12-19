<div class="card-body">
<form action="<?php echo base_url('exam_studentPapers/edit_attendance_weight/'.$parameter['paramID'].'?session_id='.$this->input->get('session_id').'&class_id='.$this->input->get('class_id').'&section_id='.$this->input->get('section_id')); ?>" method="post" accept-charset="utf-8">
  <h3 class="box-title p-2 text-center">Edit Attendance & Physical Parameters</h3>
  <div class="row clearfix">

    <div class="col-md-6">
      <label for="fullname" class="control-label"> <span class="text-danger">*</span>Full Name Of Student</label>
        <div class="form-group">
          <input type="text" name="fullname" readonly="" value="<?php echo $parameter['fullname']; ?>" class="form-control " id="fullname" />
          <span class="text-danger"><?php echo form_error('fullname');?></span>
      </div>
    </div>
    <div class="col-md-3">
      <label for="class" class="control-label"> <span class="text-danger">*</span>Class</label>
        <div class="form-group">
          <input type="text" name="class" readonly="" value="<?php echo $clas['class_name']; ?>" class="form-control " id="fullname" />
          <span class="text-danger"><?php echo form_error('class');?></span>
      </div>
    </div>
    <div class="col-md-3">
      <label for="section" class="control-label"> <span class="text-danger">*</span>Section</label>
        <div class="form-group">
          <input type="text" name="section" readonly="" value="<?php echo $section['section_name']; ?>" class="form-control " id="section" />
          <span class="text-danger"><?php echo form_error('section');?></span>
      </div>
    </div>
    <div class="col-md-3">
      <label for="confidance" class="control-label"> <span class="text-danger">*</span>Confidance</label>
        <div class="form-group">
          <input type="text" name="confidance" value="<?php echo $parameter['confidance']; ?>" class="form-control " id="confidance" />
          <span class="text-danger"><?php echo form_error('confidance');?></span>
      </div>
    </div>
    <div class="col-md-3">
      <label for="discpline" class="control-label"> <span class="text-danger">*</span>Discpline</label>
        <div class="form-group">
          <input type="text" name="discpline" value="<?php echo $parameter['discpline']; ?>" class="form-control " id="discpline" />
          <span class="text-danger"><?php echo form_error('discpline');?></span>
      </div>
    </div>
    <div class="col-md-3">
      <label for="pt" class="control-label"> <span class="text-danger">*</span>PT</label>
        <div class="form-group">
          <input type="text" name="pt" value="<?php echo $parameter['pt']; ?>" class="form-control " id="pt" />
          <span class="text-danger"><?php echo form_error('pt');?></span>
      </div>
    </div>
    <div class="col-md-3">
      <label for="regularity" class="control-label"> <span class="text-danger">*</span>Regularity</label>
        <div class="form-group">
          <input type="text" name="regularity" value="<?php echo $parameter['regularity']; ?>" class="form-control " id="regularity" />
          <span class="text-danger"><?php echo form_error('regularity');?></span>
      </div>
    </div>
    <div class="col-md-12">
      <div class="form-group text-center">
          <button type="submit" class="btn btn-success"><i class="fa fa-check"></i> Save</button> 
      </div>
    </div>
 </div>
</from>
</div>
