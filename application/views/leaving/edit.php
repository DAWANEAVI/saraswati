<?php echo form_open('leaving_certificate/edit/'.$leaving_certificate['leaving_id'],array("class"=>"form-horizontal")); ?>
<div class="card-body">
    <h3 class="box-title">Edit Leaving</h3>
    <div class="row">
       
        <input type="hidden" name="student_id" value="<?=$leaving_certificate['student_id']?>">
        <div class="col-md-12">
	<div class="form-group">
		<label for=" fullname" class="control-label"><span class="text-danger">*</span> Fullname</label>
		
			<input type="text" name="fullname" value="<?php echo ($this->input->post('fullname') ? $this->input->post('fullname') : $leaving_certificate['fullname']); ?>" class="form-control" id=" fullname" />
                        <i class="form-group__bar"></i>
			<span class="text-danger"><?php echo form_error('fullname');?></span>
		</div>
	</div>
        <div class="col-md-4">
	<div class="form-group">
		<label for="father_name" class="  control-label"><span class="text-danger">*</span>Father Name</label>
		
			<input type="text" name="father_name" value="<?php echo ($this->input->post('father_name') ? $this->input->post('father_name') : $leaving_certificate['father_name']); ?>" class="form-control" id="father_name" />
                        <i class="form-group__bar"></i>
			<span class="text-danger"><?php echo form_error('father_name');?></span>
		</div>
	</div>
        <div class="col-md-4">
	<div class="form-group">
		<label for="mother_name" class="  control-label"><span class="text-danger">*</span>Mother Name</label>
		
			<input type="text" name="mother_name" value="<?php echo ($this->input->post('mother_name') ? $this->input->post('mother_name') : $leaving_certificate['mother_name']); ?>" class="form-control" id="mother_name" />
                        <i class="form-group__bar"></i>
			<span class="text-danger"><?php echo form_error('mother_name');?></span>
			
		</div>
	</div>
        <div class="col-md-4">
            <div class="form-group">
		<label for="surname" class="  control-label"><span class="text-danger">*</span>Surname</label>
		
			<input type="text" name="surname" value="<?php echo ($this->input->post('surname') ? $this->input->post('surname') : $leaving_certificate['surname']); ?>" class="form-control" id="surname" />
                        <i class="form-group__bar"></i>
			<span class="text-danger"><?php echo form_error('surname');?></span>
		</div>
	</div>
	<div class='col-md-6'>
                <div class='form-group'>
                    <label>Gen. Registration No</label>
                    <input type='text' name='registration_no' class='form-control' value='<?php echo ($this->input->post('registration_no')) ? $this->input->post('registration_no') : $leaving_certificate['registration_no']; ?>'>
                    <i class="form-group__bar"></i>
                    
                </div>
            </div>
         <div class="col-md-6">
              <div class="form-group">
                <label>UID NO.(Aadhar No)</label>
                <input type="text" name="aadhar_no" value="<?php echo ($this->input->post('aadhar_no')) ? $this->input->post('aadhar_no') : $leaving_certificate['aadhar_no']; ?>" class="form-control" id="fullname" placeholder="Aadhar No"/>

                <i class="form-group__bar"></i>
            </div>
         </div>
          <div class="col-md-3">
            <label><span class="text-danger">*</span>Saral ID</label>
            <div class="form-group">
                <input type="text" name="saral_id" value="<?php echo ($this->input->post('saral_id')) ? $this->input->post('saral_id') : $leaving_certificate['saral_id']; ?>" class="form-control" id="fullname" placeholder="Saral id"/>
                <i class="form-group__bar"></i>
                <span class="text-danger"><?php echo form_error('saral_id'); ?></span>
            </div>
        </div>
        <div class="col-md-3">
            <label for="nationality" class="control-label">Nationality</label>
            <div class="form-group">
                <input type="text" name="nationality" value="<?php echo ($this->input->post('nationality') ? $this->input->post('nationality') : $leaving_certificate['nationality']); ?>" class="form-control" id="nationality" />
                <i class="form-group__bar"></i>
            </div>
        </div>
        <div class="col-md-3">
            <label for="mother_tounge" class="control-label">Mother Tounge</label>
            <div class="form-group">
                <input type="text" name="mother_tounge" value="<?php echo ($this->input->post('mother_tounge') ? $this->input->post('mother_tounge') : $leaving_certificate['mother_tounge']); ?>" class="form-control" id="mother_tounge" />
                <i class="form-group__bar"></i>
            </div>
        </div>
        <div class="col-md-3">
            <label for="religion" class="control-label">Religion</label>
            <div class="form-group">
                <input type="text" name="religion" value="<?php echo ($this->input->post('religion') ? $this->input->post('religion') : $leaving_certificate['religion']); ?>" class="form-control" id="religion" />
                <i class="form-group__bar"></i>
            </div>
        </div>
        
        
        <div class="col-md-6">
            <label for="caste" class="control-label">Caste</label>
            <div class="form-group">
                <input type="text" name="caste" value="<?php echo ($this->input->post('caste') ? $this->input->post('caste') : $leaving_certificate['caste']); ?>" class="form-control" id="caste" />
                <i class="form-group__bar"></i>
            </div>
        </div>
        <div class="col-md-6">
            <label for="category" class="control-label">Sub-Caste</label>
            <div class="form-group">
                <input type="text" name="category" value="<?php echo ($this->input->post('category') ? $this->input->post('category') : $leaving_certificate['category']); ?>" class="form-control" id="category" />
                <i class="form-group__bar"></i>
            </div>
        </div>
        <div class="col-md-3">
            <label><span class="text-danger"></span>Place Of Birth<span class="text-danger">*</span></label>
            <div class="form-group">
                <input type="text" name="place_of_birth" id="place_of_birth" class="form-control" value="<?=$leaving_certificate['place_of_birth']?>"/>
                <i class="form-group__bar"></i>
                <span class="text-danger"><?php echo form_error('place_of_birth'); ?></span>
            </div>
        </div>
        <div class="col-md-3">
	<div class="form-group">
		<label for="b_tah" class="  control-label">Tahsil</label>
		
			<input type="text" name="b_tah" value="<?php echo ($this->input->post('b_tah') ? $this->input->post('b_tah') : $leaving_certificate['b_tah']); ?>" class="form-control" id="b_tah" />
                        <i class="form-group__bar"></i>
			<span class="text-danger"><?php echo form_error('b_tah');?></span>
		</div>
	</div>
        <div class="col-md-3">
	<div class="form-group">
		<label for="b_dist" class="  control-label">District</label>
		
			<input type="text" name="b_dist" value="<?php echo ($this->input->post('b_dist') ? $this->input->post('b_dist') : $leaving_certificate['b_dist']); ?>" class="form-control" id="b_dist" />
                        <i class="form-group__bar"></i>
			<span class="text-danger"><?php echo form_error('b_dist');?></span>
		</div>
	</div>
        <div class="col-md-3">
	<div class="form-group">
		<label for="b_state" class="  control-label"><span class="text-danger">*</span>State</label>
		
			<input type="text" name="b_state" value="<?php echo ($this->input->post('b_state') ? $this->input->post('b_state') : $leaving_certificate['b_state']); ?>" class="form-control" id="b_state" />
                        <i class="form-group__bar"></i>
			<span class="text-danger"><?php echo form_error('b_state');?></span>
		</div>
	</div>
        <div class="col-md-3">
	<div class="form-group">
		<label for="b_country" class="  control-label"><span class="text-danger">*</span>Country</label>
		
			<input type="text" name="b_country" value="<?php echo ($this->input->post('b_country') ? $this->input->post('b_country') : $leaving_certificate['b_country']); ?>" class="form-control" id="b_country" />
                        <i class="form-group__bar"></i>
			<span class="text-danger"><?php echo form_error('b_country');?></span>
		</div>
	</div>
	<div class="col-md-3">
            <label for="dob" class="control-label"><span class="text-danger">*</span>Date Of Birth</label>
            <div class="form-group">
                <input type="text" name="dob" value="<?php echo ($this->input->post('dob') ? $this->input->post('dob') : date('d/m/Y',strtotime($leaving_certificate['dob']))); ?>" class="form_datetime form-control" id="dob" />
                <i class="form-group__bar"></i>
                <span class="text-danger"><?php echo form_error('dob'); ?></span>
            </div>
        </div>
          <div class="col-md-3">
            <label for="last_school" class="control-label"><span class="text-danger">*</span>Last School</label>
            <div class="form-group">
                <input type="text" name="last_school" value="<?php echo ($this->input->post('last_school') ? $this->input->post('last_school') : $leaving_certificate['last_school']); ?>" class="form-control" id="last_school" />
                <i class="form-group__bar"></i>
                <span class="text-danger"><?php echo form_error('last_school'); ?></span>
            </div>
        </div>
        <div class="col-md-3">
            <label for="registration_no" class="control-label"><span class="text-danger">*</span>Date Of Admission</label>
            <div class="form-group">
                <input  name="register_date" class="form-control form_datetime" id="" value="<?php echo ($this->input->post('register_date') ? date('d/m/Y',strtotime($this->input->post('register_date'))) : date('d/m/Y',strtotime($leaving_certificate['register_date']))); ?>"/>
                <i class="form-group__bar"></i>
                <span class="text-danger"><?php echo form_error('register_date'); ?></span>
            </div>
        </div>
        <div class="col-md-3">
            <label for="sought_admission_in_class" class="control-label"><span class="text-danger">*</span>Class of admission</label>
            <div class="form-group">
                <input type="text" name="sought_admission_in_class" value="<?php echo ($this->input->post('sought_admission_in_class') ? $this->input->post('sought_admission_in_class') : $leaving_certificate['sought_admission_in_class']); ?>" class="form-control" id="sought_admission_in_class" />
                <i class="form-group__bar"></i>
                <span class="text-danger"><?php echo form_error('sought_admission_in_class'); ?></span>
            </div>
        </div>
        <div class="col-md-3">
            <label><span class="text-danger">*</span>Progress in the Study</label>
            <div class="form-group">
                <input type="text" name="progress" id="progress" class="form-control" value="<?=$leaving_certificate['progress'] ?>"/>
                <i class="form-group__bar"></i>
                <span class="text-danger"><?php echo form_error('progress'); ?></span>
            </div>
        </div>
        <div class="col-md-3">

                                    <div class="form-group">
                                        <label>Date Of Leaving</label>
                                        <input type="text" name="date_of_leave" value="<?php echo date('d/m/Y',strtotime($leaving_certificate['date_of_leave'])); ?>"  class="form-control form_datetime" placeholder="Date Of Leaving" id="dob">
                                        <i class="form-group__bar"></i>
                                        <span class="text-danger"><?php echo form_error('date_of_leave'); ?></span>
                                    </div>
    </div>
     <div class="col-md-3">

            <div class="form-group">
                 <label>From Which Class Studying<span class="text-danger">*</span></label>
                 <input type="text" name='studying_from_class' value="<?php echo $leaving_certificate['studying_from_class'] ?>" class="form-control" placeholder="From Which Class Studying" />
                  <i class="form-group__bar"></i>
                <span class="text-danger"><?php echo form_error('studying_from_class'); ?></span>
                </div>
                </div>
        <div class="col-md-3">

            <div class="form-group">
                <label>Studying Since</label>
                <input type="text" name="studying_since" value="<?php echo $leaving_certificate['studying_since'] ?>"  class="form-control form_monthyear" placeholder="Studying Since" >
                <i class="form-group__bar"></i>
                <span class="text-danger"><?php echo form_error('studying_since'); ?></span>
            </div>
        </div>
        <div class="col-md-6">

            <div class="form-group">
                <label>Date Of Issue</label>
                <input type="text" name="date_of_issue" value="<?php echo date('d/m/Y',strtotime($leaving_certificate['date_of_issueing'])); ?>"  class="form-control form_datetime" placeholder="Date Of Issue" >
                <i class="form-group__bar"></i>
                <span class="text-danger"><?php echo form_error('date_of_issue'); ?></span>
            </div>
        </div>
        <div class="col-md-12">
	<div class="form-group">
		<label for="reason" class="  control-label"><span class="text-danger">*</span>Reason</label>
		
			<input type="text" name="reason" value="<?php echo ($this->input->post('reason') ? $this->input->post('reason') : $leaving_certificate['reason']); ?>" class="form-control" id="reason" />
                        <i class="form-group__bar"></i>
			<span class="text-danger"><?php echo form_error('reason');?></span>
		</div>
	</div>
         <input type="hidden" name="academic_year" value="<?php echo $leaving_certificate['academic_year']?>" id="academic_year" />
        <div class="col-md-12">
	<div class="form-group">
		<label for="remark" class="  control-label"><span class="text-danger">*</span>Remark</label>
		
			<input type="text" name="remark" value="<?php echo ($this->input->post('remark') ? $this->input->post('remark') : $leaving_certificate['remark']); ?>" class="form-control" id="remark" />
                        <i class="form-group__bar"></i>
			<span class="text-danger"><?php echo form_error('remark');?></span>
		</div>
	</div>
	
        
               
         
	
	<div class="form-group">
		<div class="col-sm-offset-4 col-sm-8">
			<button type="submit" class="btn btn-success">Save</button>
        </div>
	</div>
    </div>
</div>
	
<?php echo form_close(); ?>