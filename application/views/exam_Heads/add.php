<div class="card-body">
  <div class="row">
      <div class="col-md-12">
      <h3 class="box-title text-center">Add Exam Title </h3>
              <?php echo form_open('exam_Heads/add'); ?>
              <div class="col-md-6">
                <label for="examName" class="control-label"> <span class="text-danger">*</span>Exam Title</label>
                  <div class="form-group">
                    <input type="text" name="examName" value="<?php echo $this->input->post('examName'); ?>" class="form-control " id="examName" />
                    <span class="text-danger"><?php echo form_error('examName');?></span>
                </div>
              </div>
              <div class="col-md-6">
              <input type="hidden" name="statusID" value="1" class="form-control " id="statusID" />
              <!-- <label for="rte_applicable" class="control-label">Status</label>
              <br>
              <div class="form-group">
                  <div class="toggle-switch">
                      <input type="checkbox" class="toggle-switch__checkbox" name="statusID" id="statusID" value="1"  checked>
                      <i class="toggle-switch__helper"></i>
                      
                  </div>
                  <span class="text-danger"><?php echo form_error('statusID');?></span>
              </div> -->
              </div>
              
              <div class="col-md-6">
                <label for=" " class="control-label"> </label>
                  <div class="form-group">
                    <button type="submit" class="btn btn-success">  
                    <i class="fa fa-check"></i> Save 
                    </button> 
                </div>
              </div>
              <?php echo form_close(); ?>
          </div>
      </div>
  </div>
</div>
