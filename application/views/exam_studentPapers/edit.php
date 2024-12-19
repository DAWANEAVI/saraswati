<div class="row">
    <div class="col-md-12">
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">Exam StudentPapers Edit</h3>
            <?php echo form_open('exam_studentPapers/edit/'.$exam_studentPapers['studPaperID']); ?>
            <div class="box-body">
              <div class="row clearfix">
           <div class="col-md-6">
               <label for="studPaperID" class="control-label">  <span class="text-danger">*</span>StudPaperID</label>
                <div class="form-group">
                  <input type="text" name="studPaperID" value="<?php echo ($this->input->post('studPaperID') ? $this->input->post('studPaperID') : $exam_studentPapers['studPaperID']); ?>" class="form-control" id="studPaperID" />
                    <span class="text-danger"><?php echo form_error('studPaperID');?></span>
               </div>
             </div> 
                        <div class="col-md-6">
               <label for="examID" class="control-label">  <span class="text-danger"></span>ExamID</label>
                <div class="form-group">
                  <input type="text" name="examID" value="<?php echo ($this->input->post('examID') ? $this->input->post('examID') : $exam_studentPapers['examID']); ?>" class="form-control" id="examID" />
                    <span class="text-danger"><?php echo form_error('examID');?></span>
               </div>
             </div> 
                        <div class="col-md-6">
               <label for="student_id" class="control-label">  <span class="text-danger"></span>Student id</label>
                <div class="form-group">
                  <input type="text" name="student_id" value="<?php echo ($this->input->post('student_id') ? $this->input->post('student_id') : $exam_studentPapers['student_id']); ?>" class="form-control" id="student_id" />
                    <span class="text-danger"><?php echo form_error('student_id');?></span>
               </div>
             </div> 
                        <div class="col-md-6">
               <label for="class_id" class="control-label">  <span class="text-danger"></span>Class id</label>
                <div class="form-group">
                  <input type="text" name="class_id" value="<?php echo ($this->input->post('class_id') ? $this->input->post('class_id') : $exam_studentPapers['class_id']); ?>" class="form-control" id="class_id" />
                    <span class="text-danger"><?php echo form_error('class_id');?></span>
               </div>
             </div> 
                        <div class="col-md-6">
               <label for="marks" class="control-label">  <span class="text-danger"></span>Marks</label>
                <div class="form-group">
                  <input type="text" name="marks" value="<?php echo ($this->input->post('marks') ? $this->input->post('marks') : $exam_studentPapers['marks']); ?>" class="form-control" id="marks" />
                    <span class="text-danger"><?php echo form_error('marks');?></span>
               </div>
             </div> 
                        <div class="col-md-6">
               <label for="eveluationType" class="control-label">  <span class="text-danger"></span>EveluationType</label>
                <div class="form-group">
                  <input type="radio" name="eveluationType" value="<?php echo ($this->input->post('eveluationType') ? $this->input->post('eveluationType') : $exam_studentPapers['eveluationType']); ?>" class="form-control" id="eveluationType" />
                    <span class="text-danger"><?php echo form_error('eveluationType');?></span>
               </div>
             </div> 
             <div class="col-md-6">
            <label for="studPaperID" class="control-label">  <span class="text-danger"></span>  Result</label>
            <div class="form-group">
              <select name="result" class="form-control">
                <option value="">select result</option>
                <?php  
                    $result_values = array(
                    'Pass'=>'1', 
                    'Failed'=>'2', 
                    'Default'=>'3', 
                    'Not Attended'=>'4', 
                        );
                foreach($result_values as   $value => $display_text)
                {
                            $selected = ($value == $exam_studentPapers['result'] ) ? ' selected="selected"' : "";
          echo '<option value="'.$value.'" '.$selected.'>'.$display_text.'</option>';
                } 
                ?>
              </select>
               <span class="text-danger"><?php echo form_error('result');?></span>
            </div>
          </div> 
                     <div class="col-md-6">
               <label for="grade" class="control-label">  <span class="text-danger"></span>Grade</label>
                <div class="form-group">
                  <input type="text" name="grade" value="<?php echo ($this->input->post('grade') ? $this->input->post('grade') : $exam_studentPapers['grade']); ?>" class="form-control" id="grade" />
                    <span class="text-danger"><?php echo form_error('grade');?></span>
               </div>
             </div> 
                        <div class="col-md-6">
               <label for="statusID" class="control-label">  <span class="text-danger">*</span>StatusID</label>
                <div class="form-group">
                  <input type="radio" name="statusID" value="<?php echo ($this->input->post('statusID') ? $this->input->post('statusID') : $exam_studentPapers['statusID']); ?>" class="form-control" id="statusID" />
                    <span class="text-danger"><?php echo form_error('statusID');?></span>
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
