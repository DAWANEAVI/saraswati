
<?php echo form_open('user/add'); ?>
<div class="card-body">
    <h3 class="box-title">Users Add</h3>
    <div class="row clearfix">
        <div class="col-md-6">
            <label>First Name</label>
            <div class="form-group">
                <input type="text" name="fname" value="<?php echo $this->input->post('fname'); ?>" class="form-control" id="fname" placeholder="First Name" />
                <i class="form-group__bar"></i>
            </div>
        </div>
        <div class="col-md-6">
            <label>Last Name</label>
            <div class="form-group">
                <input type="text" name="lname" value="<?php echo $this->input->post('lname'); ?>" class="form-control" id="lname" placeholder="Last Name"/>
                <i class="form-group__bar"></i>
            </div>
        </div>
        <div class="col-md-6">
            <label>Username</label>
            <div class="form-group">
                <input type="text" name="username" value="<?php echo $this->input->post('username'); ?>" class="form-control" id="username" placeholder="Username"/>
                <i class="form-group__bar"></i>
            </div>
        </div>
        <div class="col-md-6">
            <label>Password</label>
            <div class="form-group">
                <input type="password" name="password" value="<?php echo $this->input->post('password'); ?>" class="form-control" id="password" placeholder="Password"/>
                <i class="form-group__bar"></i>
            </div>
        </div>
        <div class="col-md-6">
            <label>Confirm Password</label>
            <div class="form-group">
                <input type="password" name="confirmpassword" value="<?php echo $this->input->post('password'); ?>" class="form-control" id="password" placeholder="Password"/>
                <i class="form-group__bar"></i>
            </div>
        </div>
        <div class="col-md-6">
            <label>Email</label>
            <div class="form-group">
                <input type="text" name="email" value="<?php echo $this->input->post('email'); ?>" class="form-control" id="email" placeholder="Email" />
              
                <i class="form-group__bar"></i>
            </div>
        </div>
        <div class="col-md-6">
            <label>User Type</label>
            <div class="form-group">
                  <select class='form-control' name='user_type' >
                    <option value=''></option>
                    <option value='user'>User</option>
                    <option value='super-user'>Super User</option>
                </select>
                <i class="form-group__bar"></i>
            </div>
        </div>
        <div class='col-md-12 text-center'>
            <h5 class='text-center'>Select User Right</h5>
            
            <div class="row">
                                    
                                    <div class="col-sm-4 col-md-3">
                                    <h3 class="card-body__title">Student Module</h3>

                                    <br>

                                    <div class="form-group">
                                        <div class="toggle-switch">
                                            <input type="checkbox" class="toggle-switch__checkbox" name='student'>
                                            <i class="toggle-switch__helper"></i>
                                        </div>
                                    </div>
                                </div> 
                                    <div class="col-sm-4 col-md-3">
                                    <h3 class="card-body__title">Promotion Module</h3>

                                    <br>

                                    <div class="form-group">
                                        <div class="toggle-switch">
                                            <input type="checkbox" class="toggle-switch__checkbox" name='promote'>
                                            <i class="toggle-switch__helper"></i>
                                        </div>
                                    </div>
                                </div> 
                                    <div class="col-sm-4 col-md-3">
                                    <h3 class="card-body__title">Class and Section Module</h3>

                                    <br>

                                    <div class="form-group">
                                        <div class="toggle-switch">
                                            <input type="checkbox" class="toggle-switch__checkbox" name='class_section' name='teacher'>
                                            <i class="toggle-switch__helper"></i>
                                        </div>
                                    </div>
                                    </div>
                                    <div class="col-sm-4 col-md-3">
                                    <h3 class="card-body__title">Teacher Module</h3>

                                    <br>

                                    <div class="form-group">
                                        <div class="toggle-switch">
                                            <input type="checkbox" class="toggle-switch__checkbox" name='teacher'>
                                            <i class="toggle-switch__helper"></i>
                                        </div>
                                    </div>
                                    </div> 
                                    <div class="col-sm-4 col-md-3">
                                    <h3 class="card-body__title">Payment Module</h3>

                                    <br>

                                    <div class="form-group">
                                        <div class="toggle-switch">
                                            <input type="checkbox" class="toggle-switch__checkbox" name='payment'>
                                            <i class="toggle-switch__helper"></i>
                                        </div>
                                    </div>
                                    </div> 
                                    <div class="col-sm-4 col-md-3">
                                    <h3 class="card-body__title">Fees Module</h3>

                                    <br>

                                    <div class="form-group">
                                        <div class="toggle-switch">
                                            <input type="checkbox" class="toggle-switch__checkbox" name='fees'>
                                            <i class="toggle-switch__helper"></i>
                                        </div>
                                    </div>
                                    </div> 
                                    <div class="col-sm-4 col-md-3">
                                    <h3 class="card-body__title">Leaving Certificate Module</h3>

                                    <br>

                                    <div class="form-group">
                                        <div class="toggle-switch">
                                            <input type="checkbox" class="toggle-switch__checkbox" name='leaving_certificate'>
                                            <i class="toggle-switch__helper"></i>
                                        </div>
                                    </div>
                                    </div>
                                    <div class="col-sm-4 col-md-3">
                                    <h3 class="card-body__title">Reports Module</h3>

                                    <br>

                                    <div class="form-group">
                                        <div class="toggle-switch">
                                            <input type="checkbox" class="toggle-switch__checkbox" name='reports'>
                                            <i class="toggle-switch__helper"></i>
                                        </div>
                                    </div>
                                    </div>
                                     <div class="col-sm-4 col-md-3">
                                    <h3 class="card-body__title">Website Contain Module</h3>

                                    <br>

                                    <div class="form-group">
                                        <div class="toggle-switch">
                                            <input type="checkbox" class="toggle-switch__checkbox" name='website_contain'>
                                            <i class="toggle-switch__helper"></i>
                                        </div>
                                    </div>
                                    </div>
                                     <div class="col-sm-4 col-md-3">
                                    <h3 class="card-body__title">User Modules</h3>

                                    <br>

                                    <div class="form-group">
                                        <div class="toggle-switch">
                                            <input type="checkbox" class="toggle-switch__checkbox" name='user'>
                                            <i class="toggle-switch__helper"></i>
                                        </div>
                                    </div>
                                    </div>
                </div>
        </div>
    <div class="box-footer">
        <button type="submit" class="btn btn-success btn-raised">
            <i class="fa fa-check"></i> Save
        </button>
    </div>
</div>
</div>

<?php echo form_close(); ?>
