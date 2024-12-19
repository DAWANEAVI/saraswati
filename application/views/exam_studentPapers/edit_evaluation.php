<div class="card-body">
<form action="<?php echo base_url('exam_studentPapers/edit_evaluation/'.$evaluation['studPaperID'].'?paperID='.$this->input->get('paperID').'&examID='.$this->input->get('examID').'&class_id='.$this->input->get('class_id').'&section_id='.$this->input->get('section_id').'&session_id='.$this->input->get('session_id')); ?>" method="post" accept-charset="utf-8">
  <h3 class="box-title p-2 text-center">Edit Evaluation</h3>
  <div class="row clearfix">

    <div class="col-md-3">
      <label for="fullname" class="control-label"> <span class="text-danger">*</span>Full Name Of Student</label>
        <div class="form-group">
          <input type="text" name="fullname" readonly="" value="<?php echo $evaluation['fullname']; ?>" class="form-control " id="fullname" />
          <span class="text-danger"><?php echo form_error('fullname');?></span>
      </div>
    </div>
    <div class="col-md-3">
      <label for="class" class="control-label"> <span class="text-danger">*</span>Class Name</label>
        <div class="form-group">
          <input type="text" name="class" readonly="" value="<?php echo $paper[0]['class_name']; ?>" class="form-control " id="fullname" />
          <span class="text-danger"><?php echo form_error('class');?></span>
      </div>
    </div>
    <div class="col-md-3">
      <label for="examName" class="control-label"> <span class="text-danger">*</span>Exam Name</label>
        <div class="form-group">
          <input type="text" name="examName" readonly="" value="<?php echo $paper[0]['examName']; ?>" class="form-control " id="section" />
          <span class="text-danger"><?php echo form_error('examName');?></span>
      </div>
    </div>
    <div class="col-md-3">
      <label for="subjectName" class="control-label"> <span class="text-danger">*</span>Subject Name</label>
        <div class="form-group">
          <input type="text" name="subjectName" readonly="" value="<?php echo $paper[0]['subjectName']; ?>" class="form-control " id="fullname" />
          <span class="text-danger"><?php echo form_error('subjectName');?></span>
      </div>
    </div>
    <div class="col-md-3">
      <label for="totalMarks" class="control-label"> <span class="text-danger">*</span>Total Marks</label>
        <div class="form-group">
          <input type="text" name="totalMarks" readonly="" value="<?php echo $paper[0]['totalMarks']; ?>" class="form-control " id="fullname" />
          <span class="text-danger"><?php echo form_error('totalMarks');?></span>
      </div>
    </div>
   
    <div class="col-md-3">
      <label for="marks" class="control-label"> <span class="text-danger">*</span>Obtained Marks</label>
        <div class="form-group">
          <input type="number" name="marks" value="<?php echo $evaluation['marks']; ?>" class="form-control " id="evaluation" />
          <span class="text-danger"><?php echo form_error('marks');?></span>
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
