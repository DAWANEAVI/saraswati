<?php echo form_open_multipart('gallery/edit/'.$gallery['id'],array("class"=>"form-horizontal")); ?>
<div class="card-body">
    <h3 class="box-title">Gallery Edit</h3>
    <div class="row clearfix">
    <div class="col-md-6">
	<div class="form-group">
		<label for="title" class=" control-label"><span class="text-danger">*</span>Title</label>
		
			<input type="text" name="title" value="<?php echo ($this->input->post('title') ? $this->input->post('title') : $gallery['title']); ?>" class="form-control" id="title" />
			<span class="text-danger"><?php echo form_error('title');?></span>
		</div>
	</div>
    <div class="col-md-6">
	<div class="form-group">
		<label for="description" class=" control-label"><span class="text-danger">*</span>Description</label>
		
			<input type="text" name="description" value="<?php echo ($this->input->post('description') ? $this->input->post('description') : $gallery['description']); ?>" class="form-control" id="description" />
			<span class="text-danger"><?php echo form_error('description');?></span>
		</div>
	</div>
    </div>
    <div class="row">
    <div class="col-md-6">
	<div class="form-group">
		<label for="image" class=" control-label"><span class="text-danger">*</span>Image</label>
		
			<input type="file" name="image" value="<?php echo ($this->input->post('image') ? $this->input->post('image') : $gallery['image']); ?>" class="form-control" id="image" />
			<span class="text-danger"><?php echo form_error('image');?></span>
                        <input type="hidden" name="old_image" value="<?=$gallery['image']?>">
		</div>
	</div>
         <div class="col-md-6">
        <div class="form-group">
            <label>Show On Home Page Gallery</label>
            <select name="show_image" class="form-control">
                <option value="">Select</option>
                <option <?=$gallery['show_image']==0?'selected':'';?> value="0">No</option>
                <option <?=$gallery['show_image']==1?'selected':'';?> value="1">Yes</option>
            </select>
            <span class="text-danger"><?php echo form_error('show_image');?></span>
        </div>
    </div>
    </div>
	
	<div class="form-group">
		<div class="col-sm-offset-4 col-sm-8">
			<button type="submit" class="btn btn-success">Save</button>
        </div>
	</div>
	
<?php echo form_close(); ?>