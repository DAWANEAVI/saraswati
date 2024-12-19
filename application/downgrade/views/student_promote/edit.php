
			<?php echo form_open('student_promote/edit/'.$student_promote['promotion_id']); ?>
			<div class="card-body">
                            <h3 class="box-title">Student Promote Edit</h3>
				<div class="row clearfix">
					<div class="col-md-6">
						<label for="student_id" class="control-label"><span class="text-danger">*</span>Student</label>
						<div class="form-group">
							<select name="student_id" id="" class="form-control select2">
								<option value="">select student</option>
								<?php 
								foreach($all_student as $student)
								{
									$selected = ($student['student_id'] == $student_promote['student_id']) ? ' selected="selected"' : "";

									echo '<option value="'.$student['student_id'].'" '.$selected.'>'.$student['fullname'].'</option>';
								} 
								?>
							</select>
							<span class="text-danger"><?php echo form_error('student_id');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="previous_class_id" class="control-label"><span class="text-danger">*</span>Clas</label>
						<div class="form-group">
							<select name="previous_class_id" class="form-control select2">
								<option value="">Previous class</option>
								<?php 
								foreach($all_class as $clas)
								{
									$selected = ($clas['class_id'] == $student_promote['previous_class_id']) ? ' selected="selected"' : "";

									echo '<option value="'.$clas['class_id'].'" '.$selected.'>'.$clas['numeric_name'].'</option>';
								} 
								?>
							</select>
							<span class="text-danger"><?php echo form_error('previous_class_id');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="new_class_id" class="control-label"><span class="text-danger">*</span>New Class</label>
						<div class="form-group">
							<select name="new_class_id" id="class_p" class="form-control select2">
								<option value="">select class</option>
								<?php 
								foreach($all_class as $clas)
								{
									$selected = ($clas['class_id'] == $student_promote['new_class_id']) ? ' selected="selected"' : "";

									echo '<option value="'.$clas['class_id'].'" '.$selected.'>'.$clas['numeric_name'].'</option>';
								} 
								?>
							</select>
							<span class="text-danger"><?php echo form_error('new_class_id');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="section_id" class="control-label"><span class="text-danger">*</span>Section</label>
						<div class="form-group">
							<select name="section_id" id="section_p" class="form-control select2">
								<option value="">select section</option>
								<?php 
								foreach($all_section as $section)
								{
									$selected = ($section['section_id'] == $student_promote['section_id']) ? ' selected="selected"' : "";
                                                                        if($section['section_id']==$student_promote['section_id']){
									echo '<option value="'.$section['section_id'].'" '.$selected.'>'.$section['section_name'].'</option>';
                                                                        }
								} 
								?>
							</select>
							<span class="text-danger"><?php echo form_error('section_id');?></span>
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
	