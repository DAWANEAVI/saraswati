<div class="row">
    <div class="col-md-12">
        <div class="card-body">
            <div class="box-header with-border">
                <h3 class="box-title">Exam Grades Edit</h3>
            <?php echo form_open('exam_grades/edit/'.$exam_grades['gradeID']); ?>
            <div class="card-body">
              <div class="row clearfix">
           
            <div class="col-md-12">
               <label for="grade" class="control-label">  <span class="text-danger"></span>Grade</label>
                <div class="form-group">
                  <input type="text" name="grade" value="<?php echo ($this->input->post('grade') ? $this->input->post('grade') : $exam_grades['grade']); ?>" class="form-control" id="grade" />
                    <span class="text-danger"><?php echo form_error('grade');?></span>
               </div>
             </div> 
            <div class="col-md-4">
               <label for="min_grade_range" class="control-label">  <span class="text-danger"></span>Min grade range</label>
                <div class="form-group">
                  <input type="text" name="min_grade_range" value="<?php echo ($this->input->post('min_grade_range') ? $this->input->post('min_grade_range') : $exam_grades['min_grade_range']); ?>" class="form-control" id="min_grade_range" />
                    <span class="text-danger"><?php echo form_error('min_grade_range');?></span>
               </div>
             </div> 
             <div class="col-md-4">
               <label for="max_grade_range" class="control-label">  <span class="text-danger"></span>Max grade range</label>
                <div class="form-group">
                  <input type="text" name="max_grade_range" value="<?php echo ($this->input->post('max_grade_range') ? $this->input->post('max_grade_range') : $exam_grades['max_grade_range']); ?>" class="form-control" id="max_grade_range" />
                    <span class="text-danger"><?php echo form_error('max_grade_range');?></span>
               </div>
             </div> 
             <div class="col-md-4">
              <label><span class="text-danger">*</span>Remark</label>
              <div class="form-group">
                  <input type="text" name="remark" id="remark" value="<?php echo ($this->input->post('remark') ? $this->input->post('remark') : $exam_grades['remark']); ?>" class="form-control" />
                  <i class="form-group__bar"></i>
                  <span class="text-danger"><?php echo form_error('remark'); ?></span>
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
