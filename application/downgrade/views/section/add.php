
            <?php echo form_open('section/add'); ?>
          	<div class="card-body">
                    <h3 class="box-title">Section Add</h3>
          		<div class="row clearfix">
					<div class="col-md-6">
						
						<div class="form-group">
							<select name="class_id" class="form-control">
								<option value="">select class</option>
								<?php 
								foreach($all_class as $clas)
								{
									$selected = ($clas['class_id'] == $this->input->post('class_id')) ? ' selected="selected"' : "";

									echo '<option value="'.$clas['class_id'].'" '.$selected.'>'.$clas['numeric_name'].'</option>';
								} 
								?>
							</select>
                                                    <i class="form-group__bar"></i>
							<span class="text-danger"><?php echo form_error('class_id');?></span>
						</div>
					</div>
					<div class="col-md-6">
						
						<div class="form-group">
							<select name="teacher_id" class="form-control">
								<option value="">select teacher</option>
								<?php 
								foreach($all_teacher as $teacher)
								{
									$selected = ($teacher['teacher_id'] == $this->input->post('teacher_id')) ? ' selected="selected"' : "";

									echo '<option value="'.$teacher['teacher_id'].'" '.$selected.'>'.$teacher['fname'].'</option>';
								} 
								?>
							</select>
                                                     <i class="form-group__bar"></i>
							<span class="text-danger"><?php echo form_error('teacher_id');?></span>
						</div>
					</div>
					<div class="col-md-6">
						
						<div class="form-group">
                                                    <input type="text" name="section_name" value="<?php echo $this->input->post('section_name'); ?>" class="form-control" id="section_name" placeholder="Section Name"/>
                                                         <i class="form-group__bar"></i>
							<span class="text-danger"><?php echo form_error('section_name');?></span>
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
      