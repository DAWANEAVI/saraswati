<div class="row">
    <div class="col-md-12">
        <div class="card-body box-info">
            <div class="box-header with-border">
                <h3 class="box-title">Subjects Edit</h3><br>
            <?php echo form_open('exam_subjects/edit/'.$exam_subjects['subjectID']); ?>
            <div class="box-body">
              <div class="row clearfix">
           
             <div class="col-md-6">
               <label for="subjectName" class="control-label">  <span class="text-danger">*</span>SubjectName</label>
                <div class="form-group">
                  <input type="text" name="subjectName" value="<?php echo ($this->input->post('subjectName') ? $this->input->post('subjectName') : $exam_subjects['subjectName']); ?>" class="form-control" id="subjectName" />
                    <span class="text-danger"><?php echo form_error('subjectName');?></span>
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
