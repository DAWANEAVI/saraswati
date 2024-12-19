<?php echo form_open('exam_acadamicExams/edit/'.$exam_acadamicExams['examID'].'?exHeadID='.$this->input->get('exHeadID').'&session_id='.$this->input->get('session_id')); ?>
<div class="row">
    <div class="col-md-12">
        <div class="box box-info">
            <div class="box-header with-border">
                
            
            <div class="card-body">
              <h3 class="box-title ">Acadamic Exams Edit</h3>
              <div class="row clearfix">
                <div class="col-md-6">
                  <label for="exHeadID" class="control-label">  <span class="text-danger">*</span>  Exam Title</label>
                  <div class="form-group">
                    <select name="exHeadID" class="form-control select2">
                      <option value="">Select Exam Title</option>
                      <?php  foreach($all_exam_Heads as   $exam_Heads){ 
                        $selected = ($exam_Heads['exHeadID'] == $exam_acadamicExams['exHeadID']) ? ' selected="selected"' : "";
                        echo '<option value="'.$exam_Heads['exHeadID'].'" '.$selected.'>'.$exam_Heads['examName'].'</option>'; 
                      } ?>
                    </select>
                    <span class="text-danger"><?php echo form_error('exHeadID');?></span>
                  </div>
                </div>
                <div class="col-md-6">
                  <label for="class_id" class="control-label">  <span class="text-danger">*</span> Class</label>
                  <div class="form-group">
                    <select name="class_id" class="form-control select2">
                      <option value="">Select Class</option>
                      <?php foreach($all_class as   $class){ 
                          $selected = ($class['class_id'] == $exam_acadamicExams['class_id']) ? ' selected="selected"' : "";
                          echo '<option value="'.$class['class_id'].'" '.$selected.'>'.$class['numeric_name'].'</option>'; 
                      } ?>
                    </select>
                    <span class="text-danger"><?php echo form_error('class_id');?></span>
                  </div>
                </div>
                <div class="col-md-6">
                  <label for="session_id" class="control-label">  <span class="text-danger">*</span>  Session</label>
                  <div class="form-group">
                    <select name="session_id" class="form-control select2">
                      <option value="">Select Session</option>
                      <?php foreach($session_data as   $academic_session){ 
                        $selected = ($academic_session['session_id'] == $exam_acadamicExams['session_id']) ? ' selected="selected"' : "";
                        echo '<option value="'.$academic_session['session_id'].'" '.$selected.'>'.$academic_session['session'].'</option>'; 
                      }?>
                    </select>
                    <span class="text-danger"><?php echo form_error('session_id');?></span>
                  </div>
                </div>
                <div class="col-md-6">
                  <label for="evaluation" class="control-label"> <span class="text-danger">*</span>Evaluation Type</label>
                    <div class="form-group">
                    <select name="evaluation" class="form-control select2"> 
                      <option value="">Select Evaluation Type</option>
                      <option <?php echo $exam_acadamicExams['evaluation'] == '1' ? 'selected':''; ?> value="1">Grade</option>
                      <option <?php echo $exam_acadamicExams['evaluation'] == '0' ? 'selected':''; ?> value="0">Marks</option>
                    </select>
                    <span class="text-danger"><?php echo form_error('evaluation');?></span>
                  </div>
                </div>
                <div class="col-md-3">
                  <label for="examStartDate" class="control-label">  <span class="text-danger">*</span>Exam Start Date</label>
                    <div class="form-group">
                      <input type="date" name="examStartDate" value="<?php echo ($this->input->post('examStartDate') ? $this->input->post('examStartDate') : $exam_acadamicExams['examStartDate']); ?>" class="has-datepicker form-control" data-date-format='YYYY-MM-DD' id="examStartDate" />
                      <span class="text-danger"><?php echo form_error('examStartDate');?></span>
                  </div>
                </div>
                <div class="col-md-3">
                  <label for="examEndDate" class="control-label">  <span class="text-danger">*</span>Exam End Date</label>
                  <div class="form-group">
                    <input type="date" name="examEndDate" value="<?php echo ($this->input->post('examEndDate') ? $this->input->post('examEndDate') : $exam_acadamicExams['examEndDate']); ?>" class="has-datepicker form-control" data-date-format='YYYY-MM-DD' id="examEndDate" />
                    <span class="text-danger"><?php echo form_error('examEndDate');?></span>
                  </div>
                </div>
                <div class="col-md-6">
                  <label for="examStatus" class="control-label"> <span class="text-danger">*</span>Exam Status</label>
                    <div class="form-group">
                      <select name="examStatus" class="form-control select2"> 
                        <option value="">Select Exam Status</option>
                        <option <?php echo $exam_acadamicExams['examStatus'] == '0' ? 'selected':''; ?> value="0">Pending</option>
                        <option <?php echo $exam_acadamicExams['examStatus'] == '1' ? 'selected':''; ?> value="1">Completed</option>
                      </select>
                      <span class="text-danger"><?php echo form_error('examStatus');?></span>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="box-footer">
                  <button type="submit" class="btn btn-success"><i class="fa fa-check"></i> Save</button>
                  </div>
                </div> 
              </div>
           </div>
            
            
        </div>
    </div>
</div>
</div>
<?php echo form_close(); ?>
