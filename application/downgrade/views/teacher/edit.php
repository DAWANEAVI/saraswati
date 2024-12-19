
			<?php echo form_open_multipart('teacher/edit/'.$teacher['teacher_id']); ?>
			<div class="card-body">
                            <h3 class="box-title">Teacher Edit</h3>
				<div class="row clearfix">
					<div class="col-md-6">
						
						<div class="form-group">
                                                    <input type="text" name="fname" value="<?php echo ($this->input->post('fname') ? $this->input->post('fname') : $teacher['fname']); ?>" class="form-control" id="fname" placeholder="First Name" />
                                                    <i class="form-group__bar"></i>
							<span class="text-danger"><?php echo form_error('fname');?></span>
						</div>
					</div>
					<div class="col-md-6">
						
						<div class="form-group">
                                                    <input type="text" name="lname" value="<?php echo ($this->input->post('lname') ? $this->input->post('lname') : $teacher['lname']); ?>" class="form-control" id="lname" placeholder="Last Name"/>
                                                    <i class="form-group__bar"></i>
							<span class="text-danger"><?php echo form_error('lname');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
                                                    <input type="text" name="date_of_birth" value="<?php echo ($this->input->post('date_of_birth') ? $this->input->post('date_of_birth') : date('d/m/Y',strtotime($teacher['date_of_birth']))); ?>" class="form_datetime form-control" id="dob" placeholder="Date Of Birth"/>
							<span class="text-danger"><?php echo form_error('date_of_birth');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
                                                    <input type="text" name="age" value="<?php echo ($this->input->post('age') ? $this->input->post('age') : $teacher['age']); ?>" class="form-control" id="age" placeholder="age"/>
                                                    <i class="form-group__bar"></i>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
                                                    <input type="text" name="contact" value="<?php echo ($this->input->post('contact') ? $this->input->post('contact') : $teacher['contact']); ?>" class="form-control" id="contact" placeholder="Contact no"/>
                                                        <i class="form-group__bar"></i>
							<span class="text-danger"><?php echo form_error('contact');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
                                                    <input type="text" name="email" value="<?php echo ($this->input->post('email') ? $this->input->post('email') : $teacher['email']); ?>" class="form-control" id="email" placeholder="Email" />
                                                        <i class="form-group__bar"></i>
							<span class="text-danger"><?php echo form_error('email');?></span>
						</div>
					</div>
					<div class="col-md-6">
						
						<div class="form-group">
                                                    <input type="text" name="address" value="<?php echo ($this->input->post('address') ? $this->input->post('address') : $teacher['address']); ?>" class="form-control" id="address" placeholder="Address" />
                                                    <i class="form-group__bar"></i>
							<span class="text-danger"><?php echo form_error('address');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
                                                    <input type="text" name="city" value="<?php echo ($this->input->post('city') ? $this->input->post('city') : $teacher['city']); ?>" class="form-control" id="city" placeholder="City"/>
                                                    <i class="form-group__bar"></i>
						</div>
					</div>
                                      <div class="col-md-3">
                                <div class="form-group">
                                    <label>Category</label>
                                    <select class="form-control" name="category">
                                        <option value="">Select Category</option>
                                        <option <?=$teacher['category']=='primary techer'?'selected':''?> value="primary techer">Primary Teacher</option>
                                        <option <?=$teacher['category']=='secondary teacher'?'selected':''?> value="secondary teacher">Secondary Teacher</option>
                                        <option <?=$teacher['category']=='pre primary teacher'?'selected':''?> value="pre primary teacher">Pre Primary Teacher</option>
                                        <option <?=$teacher['category']=='account'?'selected':''?> value="account">Account</option>
                                        <option <?=$teacher['category']=='helper'?'selected':''?> value="helper">Computer Deparment</option>
                                        <option <?=$teacher['category']=='security'?'selected':''?> value="security">Sports Department</option>
                                      
                                    </select>
                                    <i class="form-group__bar"></i>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Designation</label>
                                    <input type="text" name="designation" class="form-control"  value="<?=$teacher['designation']?>"/>
                                    <i class="form-group__bar"></i>
                                </div>
                            </div>
					<div class="col-md-2">
						<label for="image" class="control-label">Old Image</label> <br/>
                                                <img style="width:50px;height:50px;" src="<?=base_url('uploads/teachers/')?><?php echo ($this->input->post('image') ? $this->input->post('image') : $teacher['image']); ?>">
                                                <input type="hidden" name="old_image" value="<?= $teacher['image']?>">
					</div>
                                    <div class="col-md-4">
                                        <label for="image" class="control-label">New Image</label> <br/>
                                            <img id="blah" src="http://placehold.it/180" alt="your image" /> 
                                            <br />
                                     <input type='file' name="image" onchange="readURL(this);" style="width:180px;"/>
						
					</div>
				</div>
                            <br />
                                <div class="box-footer">
            	<button type="submit" class="btn btn-success btn-raised">
					<i class="fa fa-check"></i> Save
				</button>
	        </div>	
			</div>
						
			<?php echo form_close(); ?>
		