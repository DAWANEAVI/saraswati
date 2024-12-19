<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Contain Detail Add</h3>
            </div>
            <?php echo form_open('contain_detail/add'); ?>
          	<div class="box-body">
          		<div class="row clearfix">
					<div class="col-md-6">
						<label for="page_name" class="control-label">Page Name</label>
						<div class="form-group">
							<select name="page_name" class="form-control">
								<option value="">select</option>
								<?php 
								$page_name_values = array(
									'home'=>'Home',
									'about'=>'About',
									'contact'=>'Contact',
									'gallery'=>'Gallery',
									'news'=>'News',
								);

								foreach($page_name_values as $value => $display_text)
								{
									$selected = ($value == $this->input->post('page_name')) ? ' selected="selected"' : "";

									echo '<option value="'.$value.'" '.$selected.'>'.$display_text.'</option>';
								} 
								?>
							</select>
						</div>
					</div>
					<div class="col-md-6">
						<label for="section_title" class="control-label"><span class="text-danger">*</span>Section Title</label>
						<div class="form-group">
							<input type="text" name="section_title" value="<?php echo $this->input->post('section_title'); ?>" class="form-control" id="section_title" />
							<span class="text-danger"><?php echo form_error('section_title');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="contains" class="control-label"><span class="text-danger">*</span>Contains</label>
						<div class="form-group">
							<input type="text" name="contains" value="<?php echo $this->input->post('contains'); ?>" class="form-control" id="contains" />
							<span class="text-danger"><?php echo form_error('contains');?></span>
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