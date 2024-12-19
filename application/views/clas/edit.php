
			<?php echo form_open('clas/edit/'.$clas['class_id']); ?>
			<div class="card-body">
                            <h3 class="box-title">Class Edit</h3>
				<div class="row clearfix">
					<div class="col-md-6">
						
						<div class="form-group">
                                                    <input type="text" name="class_name" value="<?php echo ($this->input->post('class_name') ? $this->input->post('class_name') : $clas['class_name']); ?>" class="form-control" id="class_name" placeholder="Class Name" />
                                                    <i class="form-group__bar"></i>
                                                        
							<span class="text-danger"><?php echo form_error('class_name');?></span>
						</div>
					</div>
					<div class="col-md-6">
						
						<div class="form-group">
                                                    <input type="text" name="numeric_name" value="<?php echo ($this->input->post('numeric_name') ? $this->input->post('numeric_name') : $clas['numeric_name']); ?>" class="form-control" id="numeric_name" placeholder="Numeric Name"/>
                                                    <i class="form-group__bar"></i>
							<span class="text-danger"><?php echo form_error('numeric_name');?></span>
						</div>
					</div>
				</div>
                            <div class="box-footer">
            	<button type="submit" class="btn btn-success btn-raised">
					<i class="fa fa-check"></i> Save
				</button>
	        </div>		
			</div>
					
			<?php echo form_close(); ?>
		