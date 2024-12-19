<?php echo form_open('exam_subjects/add'); ?>
<div class="card-body">
<h3 class="box-title text-center">Add Subject</h3>
  <div class="row clearfix">
              <div class="col-md-6">
                <label for="subjectName" class="control-label"> <span class="text-danger">*</span>Subject Name</label>
                  <div class="form-group">
                    <input type="text" name="subjectName" value="<?php echo $this->input->post('subjectName'); ?>" class="form-control " id="subjectName" />
                    <span class="text-danger"><?php echo form_error('subjectName');?></span>
                </div>
              </div>
              <div class="col-md-12">
                <label for=" " class="control-label"> </label>
                  <div class="form-group">
                    <button type="submit" class="btn btn-success">  
                    <i class="fa fa-check"></i> Save 
                          </button> 
                </div>
              </div>
      </div>
  </div>
</div>
<?php echo form_close(); ?>