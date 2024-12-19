<?php echo form_open_multipart('topper/add',array("class"=>"form-horizontal")); ?>
<div class="card-body">
    <h3>Add Topper</h3>
    <div class="row clearfix">
        <div class="col-md-6">
	<div class="form-group">
		<label for="image" class="  control-label"><span class="text-danger">*</span>Image</label>
		
			<input type="file" name="image" value="<?php echo $this->input->post('image'); ?>" class="form-control" id="image" />
			<span class="text-danger"><?php echo form_error('image');?></span>
		</div>
	</div>
        <div class="col-md-6">
	<div class="form-group">
		<label for="name" class="  control-label"><span class="text-danger">*</span>Name</label>
		
			<input type="text" name="name" value="<?php echo $this->input->post('name'); ?>" class="form-control" id="name" />
			<span class="text-danger"><?php echo form_error('name');?></span>
		</div>
	</div>
        <div class="col-md-6">
	<div class="form-group">
		<label for="year" class="  control-label"><span class="text-danger">*</span>Year</label>
		
			<input type="text" name="year" value="<?php echo $this->input->post('year'); ?>" class="form-control" id="year" />
			<span class="text-danger"><?php echo form_error('year');?></span>
		</div>
	</div>
        <div class="col-md-6">
	<div class="form-group">
            
		<label for="class" class="  control-label"><span class="text-danger">*</span>Class</label>
		
			<input type="text" name="class" value="<?php echo $this->input->post('class'); ?>" class="form-control" id="class" />
			<span class="text-danger"><?php echo form_error('class');?></span>
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