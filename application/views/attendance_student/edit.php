
			<?php echo form_open('Attendance_student/edit/'.$this->input->get('attendance_id')); ?>
		
			<div class="card-body">
                            <h3 class="box-title">Attendance Edit</h3>
				<div class="row clearfix">
					<div class="col-md-3">
						<lab  for="session_id" class="control-label"> <span class="text-danger">*</span>  Session</label>
						<div class="form-group">
						<?php foreach($all_sessions as   $academic_session){
							
								if($academic_session['session_id'] == $this->input->get('session_id')){
								// $selected = ($session['session_id'] == $this->input->post('acadamic_session')) ? ' selected="selected"' : "";
								echo '<input type="text" name=""  class="form-control" value="'.$academic_session['session'].'" id="session_id" disabled>'; 
								echo '<input type="hidden" name="session_id"  class="" value="'.$academic_session['session_id'].'">'; 
								}

								
							}?>

							<span class="text-danger"><?php echo form_error('session_id');?></span>
						</div>
					</div>

					<div class="col-md-3">
						<label for="class_id" class="control-label"> <span class="text-danger">*</span>  Class</label>
						<div class="form-group">

						<?php foreach($all_class as   $class){
							
							if($class['class_id'] == $this->input->get('class_id')){
								echo '<input type="text" name=""  class="form-control" value="'.$class['class_name'].'" id="class_id" disabled>'; 
								echo '<input type="hidden" name="class_id"  class="" value="'.$class['class_id'].'">'; 
							}
							
							}?>

							<span class="text-danger"><?php echo form_error('class_id');?></span>
						</div>
					</div>

					<div class="col-md-3">
						<label for="section_id" class="control-label"> <span class="text-danger">*</span>  Section</label>
						<div class="form-group">

						<?php foreach($all_section as   $section){
							
							if($section['section_id'] == $this->input->get('section_id')){
								echo '<input type="text" name=""  class="form-control" value="'.$section['section_name'].'" id="section_id" disabled>'; 
								echo '<input type="hidden" name="section_id"  class="" value="'.$section['section_id'].'">'; 
							}
							
							}?>

							<span class="text-danger"><?php echo form_error('section_name');?></span>
						</div>
					</div>

					<div class="col-md-3">
						<label for="date_a" class="control-label"> <span class="text-danger">*</span>  Date</label>
						<div class="form-group">
							<!-- <input type="date" name="date"  class="form-control" value="<?php echo $this->input->post('date');?>" id="date_a" required="">-->
							<input type="date" name="date_a"  class="form-control" value="<?php echo $this->input->get('date');?>" id="date_a" readonly="True">
							
								<i class="form-group__bar"></i>
								<span class="text-danger"><?php echo form_error('date_a'); ?></span>

						</div>
					</div>
					<div class="col-md-3">
						<label for="stud_mark_attendance" class="control-label"> <span class="text-danger">*</span>  Attendance</label>
						<div class="form-group">

						<select name="stud_mark_attendance" class="select2" id='stud_mark_attendance' data-placeholder="Select a Class">
							<option value="">Select Attendance</option>
							<option value="1">P</option>
							<option value="0">A</option>
							<option value="2">L</option>
							
						</select>
							
								<span class="text-danger"><?php echo form_error('stud_mark_attendance'); ?></span>

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
		