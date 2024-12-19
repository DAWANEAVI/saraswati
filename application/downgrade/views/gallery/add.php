<?php echo form_open_multipart('gallery/add',array("class"=>"form-horizontal")); ?>
<div class="card-body">
    <h3 class="box-title">Gallery Add</h3>
    <div class="row clearfix">
    <div class="col-md-6">
	<div class="form-group">
		<label for="title" class=" control-label"><span class="text-danger">*</span>Title</label>
		
			<input type="text" name="title" value="<?php echo $this->input->post('title'); ?>" class="form-control" id="title" />
			<span class="text-danger"><?php echo form_error('title');?></span>
		</div>
	</div>
    <div class="col-md-6">
	<div class="form-group">
		<label for="description" class=" control-label"><span class="text-danger">*</span>Description</label>
		
			<input type="text" name="description" value="<?php echo $this->input->post('description'); ?>" class="form-control" id="description" />
			<span class="text-danger"><?php echo form_error('description');?></span>
		</div>
	</div>
    </div>
    <div class="row">
     <div class="col-md-6">
        <div class="form-group">
            <label>Show On Home Page Gallery</label>
            <select name="show_image" class="form-control" id="showonhome">
                <option value="">Select</option>
                <option value="0">No</option>
                <option value="1">Yes</option>
            </select>
            <span class="text-danger"><?php echo form_error('show_image');?></span>
        </div>
    </div>
    
        
    </div>
    <div class="col-md-12">
         <div class="file-loading">
            <input id="file-0" name="image[]" type="file" multiple>
        </div>
    </div>
	
	<div class="form-group">
		<div class="col-sm-offset-4 col-sm-8">
			<button type="submit" class="btn btn-success">Save</button>
        </div>
	</div>
    <style>
        .gallery img{
            padding:5px!important;
        }
        </style>
       
    <div class="row gallery">
        
        
    </div>
</div>
<?php echo form_close(); ?>