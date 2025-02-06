<?php echo form_open('attendance_holidays/add'); ?>
<div class="card-body">
  <h3 class="box-title text-center">Add Holiday</h3>
  <div class="row clearfix">
    <div class="col-md-6">
      <label for="holiday" class="control-label"><span class="text-danger">*</span>Holiday Name</label>
      <div class="form-group">
        <input type="text" required="" name="holiday" value="<?php echo $this->input->post('holiday'); ?>" class="form-control" id="holiday" />
          <span class="text-danger"><?php echo form_error('holiday');?></span>
      </div>
    </div> 
    <div class="col-md-6">
      <label for="holidayDate" class="control-label"> <span class="text-danger">*</span>Holiday Date</label>
      <div class="form-group">
        <input type="date" required="" name="holidayDate" value="<?php echo $this->input->post('holidayDate'); ?>" class="form-control" data-date-format='YYYY-MM-DD' id="holidayDate" />
          <span class="text-danger"><?php echo form_error('holidayDate');?></span>
      </div>
    </div>
    <div class="col-md-12">
        <label for=" " class="control-label"> </label>
        <div class="form-group text-center">
            <button type="submit" class="btn btn-success"><i class="fa fa-check"></i> Save</button> 
        </div>
      </div>
  </div>
</div>
<?php echo form_close(); ?>