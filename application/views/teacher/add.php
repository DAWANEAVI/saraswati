
            <?php echo form_open_multipart('teacher/add'); ?>
          	<div class="card-body">
                    <h3 class="box-title">Teacher Add</h3>
          		<div class="row clearfix">
					<div class="col-md-6">
						
						<div class="form-group">
                                                    <input type="text" name="fname" value="<?php echo $this->input->post('fname'); ?>" class="form-control" id="fname" placeholder="First Name"/>
                                                    <i class="form-group__bar"></i>
							<span class="text-danger"><?php echo form_error('fname');?></span>
						</div>
					</div>
					<div class="col-md-6">
						
						<div class="form-group">
                                                    <input type="text" name="lname" value="<?php echo $this->input->post('lname'); ?>" class="form-control" id="lname" placeholder="Last Name"/>
                                                         <i class="form-group__bar"></i>
							<span class="text-danger"><?php echo form_error('lname');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="date_of_birth" class="control-label"><span class="text-danger">*</span>Date Of Birth</label>
						<div class="form-group">
							<input type="text" name="date_of_birth" value="<?php echo $this->input->post('date_of_birth'); ?>" class="form_datetime form-control" id="dob" />
                                                         <i class="form-group__bar"></i>
							<span class="text-danger"><?php echo form_error('date_of_birth');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
                                                    <input type="text" name="age" value="<?php echo $this->input->post('age'); ?>" class="form-control" id="age" placeholder="age" readonly="true"/>
                                                         <i class="form-group__bar"></i>
						</div>
					</div>
					<div class="col-md-6">
						
						<div class="form-group">
                                                    <input type="text" name="contact" value="<?php echo $this->input->post('contact'); ?>" class="form-control" id="contact" placeholder="Contact  No"/>
                                                         <i class="form-group__bar"></i>
							<span class="text-danger"><?php echo form_error('contact');?></span>
						</div>
					</div>
					<div class="col-md-6">
						
						<div class="form-group">
                                                    <input type="text" name="email" value="<?php echo $this->input->post('email'); ?>" class="form-control" id="email" placeholder="Email"/>
                                                         <i class="form-group__bar"></i>
							<span class="text-danger"><?php echo form_error('email');?></span>
						</div>
					</div>
					<div class="col-md-6">
						
						<div class="form-group">
                                                    <input type="text" name="address" value="<?php echo $this->input->post('address'); ?>" class="form-control" id="address" placeholder="Address"/>
                                                         <i class="form-group__bar"></i>
							<span class="text-danger"><?php echo form_error('address');?></span>
						</div>
					</div>
					<div class="col-md-6">
						
						<div class="form-group">
                                                    <input type="text" name="city" value="<?php echo $this->input->post('city'); ?>" class="form-control" id="city" placeholder="City"/>
                                                         <i class="form-group__bar"></i>
						</div>
					</div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Category</label>
                                    <select class="form-control" name="category">
                                        <option value="">Select Category</option>
                                        <option value="primary techer">Primary Teacher</option>
                                        <option value="secondary teacher">Secondary Teacher</option>
                                        <option value="pre primary teacher">Pre Primary Teacher</option>
                                        <option value="account">Account</option>
                                        <option value="helper">Computer Department</option>
                                        <option value="security">Sports Department</option>
                                      
                                    </select>
                                    <i class="form-group__bar"></i>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Designation</label>
                                    <input type="text" name="designation" class="form-control" />
                                    <i class="form-group__bar"></i>
                                </div>
                            </div>
					<div class="col-md-6">
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
      	