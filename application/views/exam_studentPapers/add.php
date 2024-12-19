<div class="card-body">
<?php echo form_open('exam_studentPapers/add'); ?>
  <h3 class="box-title p-2 text-center">Student Paper Add</h3>
  <div class="row clearfix">
    <input type="hidden" name="session_id" value="<?php echo $academic_year_data['session_id']; ?>" id="session_id" />
    <div class="col-md-4">
      <label for="result" class="control-label"> <span class="text-danger">*</span>Exam</label>
      <div class="form-group">
        <select id="exHeadID" onchange="getExamClass()" name="exHeadID" class="form-control select2">
          <option value="">Select Exam</option>
          <?php 
          foreach($exam_data as   $value => $display_text)
          {
              $selected = ($display_text['exHeadID'] == $this->input->post('exHeadID')) ? ' selected="selected"' : "";
              echo '<option value="'.$display_text['exHeadID'].'" '.$selected.'>'.$display_text['examName'].'</option>';
          } 
          ?>
        </select>
        <span class="text-danger"><?php echo form_error('exHeadID');?></span>
      </div>
    </div>
    <div class="col-md-4">
      <label for="result" class="control-label"> <span class="text-danger">*</span>Class</label>
      <div class="form-group">
        <select id="class_p" name="class_id" class="form-control select2">
          <option value="">Select Class</option>
        </select>
        <span class="text-danger"><?php echo form_error('class_id');?></span>
      </div>
    </div>
    <div class="col-md-4">
      <label for="result" class="control-label"> <span class="text-danger">*</span>Section</label>
      <div class="form-group">
        <select id="section_o" onchange="studentSelect(4)" name="section_id" class="form-control select2">
          <option value="">Select Section</option>
        </select>
        <span class="text-danger"><?php echo form_error('section_id');?></span>
      </div>
    </div>
    <!-- <div class="col-md-6">
      <label for="student_id" class="control-label"> <span class="text-danger"></span>Student id</label>
        <div class="form-group">
          <input type="text" name="student_id" value="<?php echo $this->input->post('student_id'); ?>" class="form-control " id="student_id" />
          <span class="text-danger"><?php echo form_error('student_id');?></span>
      </div>
    </div> -->
    <!-- <div class="col-md-6">
      <label for="class_id" class="control-label"> <span class="text-danger"></span>Class id</label>
        <div class="form-group">
          <input type="text" name="class_id" value="<?php echo $this->input->post('class_id'); ?>" class="form-control " id="class_id" />
          <span class="text-danger"><?php echo form_error('class_id');?></span>
      </div>
    </div> -->
    <div class="col-md-6">
      <label for="marks" class="control-label"> <span class="text-danger"></span>Marks</label>
        <div class="form-group">
          <input type="text" name="marks" value="<?php echo $this->input->post('marks'); ?>" class="form-control " id="marks" />
          <span class="text-danger"><?php echo form_error('marks');?></span>
      </div>
    </div>
    <div class="col-md-6">
      <label for="eveluationType" class="control-label"> <span class="text-danger"></span>EveluationType</label>
        <div class="form-group">
          <input type="radio" name="eveluationType" value="<?php echo $this->input->post('eveluationType'); ?>" class="form-control " id="eveluationType" />
          <span class="text-danger"><?php echo form_error('eveluationType');?></span>
      </div>
    </div>
    <div class="col-md-6">
      <label for="result" class="control-label"> <span class="text-danger">*</span>Result</label>
      <div class="form-group">
        <select name="result" class="form-control select2">
          <option value="">Select Result</option>
          <?php 

          $result_values = array(
                    '1'=>'Pass', 
                    '2'=>'Failed', 
                    '3'=>'Default', 
                    '4'=>'Not Attended', 
                      );

          foreach($result_values as   $value => $display_text)
          {
              $selected = ($value == $this->input->post('result')) ? ' selected="selected"' : "";
              echo '<option value="'.$value.'" '.$selected.'>'.$display_text.'</option>';
          } 
          ?>
        </select>
        <span class="text-danger"><?php echo form_error('result');?></span>
      </div>
    </div>
    <div class="col-md-6">
      <label for="grade" class="control-label"> <span class="text-danger"></span>Grade</label>
        <div class="form-group">
          <input type="text" name="grade" value="<?php echo $this->input->post('grade'); ?>" class="form-control " id="grade" />
          <span class="text-danger"><?php echo form_error('grade');?></span>
      </div>
    </div>
    <div class="col-md-6">
      <label for="statusID" class="control-label"> <span class="text-danger">*</span>StatusID</label>
        <div class="form-group">
          <input type="radio" name="statusID" value="<?php echo $this->input->post('statusID'); ?>" class="form-control " id="statusID" />
          <span class="text-danger"><?php echo form_error('statusID');?></span>
      </div>
    </div>
    <div class="col-md-12 text-right">
        <input type="checkbox" id="check_all_student">
        Select All To Promote
        <br />
        <br />
        </div>
         <table id="table-student"  class="table table-bordered">
            <thead class='thead-default'>
            <tr>
                <th>Sr No</th>
                <th>Class</th>
                <th>Exam</th>
                <th>Subject </th>
                <th>Actions</th>
            </tr>
            </thead>
            
            <tbody>
              <tr>
                <td>1</td>
                <td>5</td>
                <td>Term Exam</td>
                <td>Maths</td>
                <td><input type="checkbox" class="student" name="stud[]" value="97"></td>
              </tr>
            </tbody>
        </table>
        <div class="box-footer text-center">
            <button type="submit" class="btn btn-success text-center btn-raised">
                <i class="fa fa-check text-center"></i> Save
            </button>
        </div>
    </div>   
  </div>
      
</div>
<?php echo form_close(); ?>
</div>
