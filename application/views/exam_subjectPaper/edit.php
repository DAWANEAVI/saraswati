<div class="row">
    <div class="col-md-12">
        <div class="card-body box-info">
            <div class="box-header with-border">
                <h3 class="box-title">Subject Paper Edit</h3>
            <?php echo form_open('exam_subjectPaper/edit/'.$exam_subjectPaper['paperID'].'?examID='.$acadamic_exams[0]['examID'].'&class_id='.$all_class['class_id'].'&section_id='.$this->input->get('section_id')); ?>
            <div class="box-body">
              <div class="row clearfix">
                
                <div class="col-md-4">
                <label for="exHeadID" class="control-label"> <span class="text-danger"></span> Select Exam</label>
                 <div class="form-group">
                    <input type="text"class="form-control" readonly=""  value="<?php echo $acadamic_exams[0]['examName']; ?>" >
                    <input type="hidden" name="examID" value="<?php echo $acadamic_exams[0]['examID']; ?>" >
                    <span class="text-danger"><?php echo form_error('examID');?></span>
                  </div>
              </div>
              <div class="col-md-4">
                <label for="class_id" class="control-label"> <span class="text-danger"></span>  Class</label>
                 <div class="form-group">
                    <input type="hidden" name="class_id"  value="<?php echo $all_class['class_id']; ?>" >
                    <input type="text"class="form-control" readonly="" value="<?php echo $all_class['class_name']; ?>" >
                    <span class="text-danger"><?php echo form_error('class_id');?></span>
                  </div>
              </div>
              <div class="col-md-4">
                <label for="subjectID" class="control-label">  <span class="text-danger">*</span>  Subject</label>
                <div class="form-group">
                <select name="subjectID" class="form-control select2">
                  <option value="">Select Subject</option>
                    <?php foreach($all_exam_subjects as   $exam_subjects){ 
                        $selected = ($exam_subjects['subjectID'] == $exam_subjectPaper['subjectID']) ? ' selected="selected"' : "";
                        echo '<option value="'.$exam_subjects['subjectID'].'" '.$selected.'>'.$exam_subjects['subjectName'].'</option>'; 
                    } ?>
                  </select>
                  <span class="text-danger"><?php echo form_error('subjectID');?></span>
                </div>
              </div>
              <div class="col-md-6">
                <label for="totalMarks" class="control-label">  <span class="text-danger">*</span>Total Marks</label>
                <div class="form-group">
                  <input type="text" name="totalMarks" value="<?php echo ($this->input->post('totalMarks') ? $this->input->post('totalMarks') : $exam_subjectPaper['totalMarks']); ?>" class="form-control" id="totalMarks" />
                    <span class="text-danger"><?php echo form_error('totalMarks');?></span>
                </div>
              </div> 
              <div class="col-md-6">
                <label for="passingMarks" class="control-label">  <span class="text-danger">*</span>Passing Marks</label>
                <div class="form-group">
                  <input type="text" name="passingMarks" value="<?php echo ($this->input->post('passingMarks') ? $this->input->post('passingMarks') : $exam_subjectPaper['passingMarks']); ?>" class="form-control" id="passingMarks" />
                  <span class="text-danger"><?php echo form_error('passingMarks');?></span>
                </div>
              </div> 
              <div class="col-md-6">
                <label for="date" class="control-label">  <span class="text-danger">*</span>Evaluation Type</label>
                <div class="form-group">
                    <select required="" name="evaluation" class="form-control select2">
                      <option value="">Select Evaluation</option>
                      <option <?php if($exam_subjectPaper['evaluation'] == 0) echo 'selected'; ?> value="0">Grades</option>
                      <option <?php if($exam_subjectPaper['evaluation'] == 1) echo 'selected'; ?> value="1">Percentage</option>
                    </select>
                    <span class="text-danger"><?php echo form_error('evaluation');?></span>
                </div>
              </div>
              <div class="col-md-6">
                <label for="date" class="control-label">  <span class="text-danger">*</span>Date</label>
                <div class="form-group">
                  <input type="date" name="date" value="<?php echo ($this->input->post('date') ? $this->input->post('date') : $exam_subjectPaper['date']); ?>" class="has-datepicker form-control" data-date-format='YYYY-MM-DD' id="date" />
                    <span class="text-danger"><?php echo form_error('date');?></span>
                </div>
              </div>
        </div>
      </div>
            <div class="box-footer text-center">
              <button type="submit" class="btn btn-success">
                <i class="fa fa-check"></i> Save
              </button>
            </div>
            <?php echo form_close(); ?>
        </div>
    </div>
</div>
</div>
