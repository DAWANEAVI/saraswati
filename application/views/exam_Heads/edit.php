<div class="card-body">
<div class="row">
    <div class="col-md-12">
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">Exam Title Edit</h3>
            <?php echo form_open('exam_Heads/edit/'.$exam_Heads['exHeadID']); ?>
            <div class="box-body">
              <div class="row clearfix">
             
              <div class="col-md-6">
                <label for="examName" class="control-label">  <span class="text-danger">*</span>Exam Title</label>
                  <div class="form-group">
                    <input type="text" name="examName" value="<?php echo ($this->input->post('examName') ? $this->input->post('examName') : $exam_Heads['examName']); ?>" class="form-control" id="examName" />
                      <span class="text-danger"><?php echo form_error('examName');?></span>
                </div>
              </div> 
              <input type="hidden" name="statusID" value="1" class="form-control" id="statusID" />
             
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
</div>
