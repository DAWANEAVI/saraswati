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
            <label><span class="text-danger">*</span>Saral ID</label>
            <div class="form-group">
                <input type="text" name="saral_id" id="saral_id" class="form-control" value="<?=$leaving_certificate['saral_id']?>" />
                <i class="form-group__bar"></i>
                <span class="text-danger"><?php echo form_error('saral_id'); ?></span>
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
	<div class="col-md-6">

                                    <div class="form-group">
                                        <label>Date Of Leaving</label>
                                        <input type="text" name="date_of_leave" value="<?php echo date('d/m/Y',strtotime($leaving_certificate['date_of_leave'])); ?>"  class="form-control form_datetime" placeholder="Date Of Leaving" id="dob">
                                        <i class="form-group__bar"></i>
                                        <span class="text-danger"><?php echo form_error('date_of_leave'); ?></span>
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
                <div class="col-md-6">

            <div class="form-group">
                 <label>From Which Class Studying<span class="text-danger">*</span></label>
                 <input type="text" name='studying_from_class' value="<?php echo $this->input->post('studying_from_class'); ?>" class="form-control" placeholder="From Which Class Studying" />
                  <i class="form-group__bar"></i>
                <span class="text-danger"><?php echo form_error('studying_from_class'); ?></span>
                </div>
                </div>
        <div class="col-md-6">

            <div class="form-group">
                <label>Studying Since</label>
                <input type="text" name="studying_since" value="<?php echo $leaving_certificate['studying_since'] ?>"  class="form-control form_monthyear" placeholder="Studying Since" >
                <i class="form-group__bar"></i>
                <span class="text-danger"><?php echo form_error('studying_since'); ?></span>
            </div>
        </div>
    <div class="col-md-6">
        </div>
	
	<div class="form-group">
		<div class="col-sm-offset-4 col-sm-8">
			<button type="submit" class="btn btn-success">Save</button>
        </div>
	</div>
    </div>
</div>
	
<?php echo form_close(); ?>