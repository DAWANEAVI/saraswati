

<?php echo form_open_multipart('management/add',array("class"=>"form-horizontal")); ?>
<div class="card-body">
    <h3 class="box-title">Management Add</h3>
    <div class="row clearfix">
    <div class="col-md-6">
	<div class="form-group">
		<label for="name" class=" control-label"><span class="text-danger">*</span>Name</label>
		
			<input type="text" name="name" value="<?php echo $this->input->post('name'); ?>" class="form-control" id="name" />
			<span class="text-danger"><?php echo form_error('name');?></span>
		</div>
	</div>
    <div class="col-md-6">
	<div class="form-group">
		<label for="designation" class=" control-label"><span class="text-danger">*</span>Designation</label>
			<input type="text" name="designation" value="<?php echo $this->input->post('designation'); ?>" class="form-control" id="designation" />
			<span class="text-danger"><?php echo form_error('designation');?></span>
		</div>
	</div>
    </div>
    <div class="row clearfix">
    <div class="col-md-6">
	<div class="form-group">
		<label for="mobile_no" class=" control-label"><span class="text-danger">*</span>Mobile No</label>
			<input type="text" name="mobile_no" value="<?php echo $this->input->post('mobile_no'); ?>" class="form-control" id="mobile_no" />
			<span class="text-danger"><?php echo form_error('mobile_no');?></span>
		</div>
	</div>
    <div class="col-md-6">
	<div class="form-group">
		<label for="image" class=" control-label"><span class="text-danger">*</span>Image</label>
			<input type="file" name="image" value="<?php echo $this->input->post('image'); ?>" class="form-control" id="image" />
			<span class="text-danger"><?php echo form_error('image');?></span>
		</div>
	</div>
    </div>
	
	<div class="form-group">
		<div class="col-sm-offset-4 col-sm-8">
			<button type="submit" class="btn btn-success">Save</button>
        </div>
	</div>
</div>
<?php echo form_close(); ?>