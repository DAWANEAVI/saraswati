
<?php echo form_open('user/edit/' . $user['user_id']); ?>
<div class="card-body">
    <h3 class="box-title">User Edit</h3>
    <div class="row clearfix">
         <div class="col-md-6">
            <label for="fname" class="control-label">First name</label>
            <div class="form-group">
                <input type="text" name="fname" value="<?php echo ($this->input->post('fname') ? $this->input->post('fname') : $user['fname']); ?>" class="form-control" id="fname" />
                <i class="form-group__bar"></i>
            </div>
        </div>
        <div class="col-md-6">
            <label for="lname" class="control-label">Last name</label>
            <div class="form-group">
                <input type="text" name="lname" value="<?php echo ($this->input->post('lname') ? $this->input->post('lname') : $user['lname']); ?>" class="form-control" id="lname" />
                <i class="form-group__bar"></i>
            </div>
        </div>
        <div class="col-md-6">
            <label for="username" class="control-label">Username</label>
            <div class="form-group">
                <input type="text" name="username" value="<?php echo ($this->input->post('username') ? $this->input->post('username') : $user['username']); ?>" class="form-control" id="username" />
                <i class="form-group__bar"></i>
            </div>
        </div>
        <div class="col-md-6">
            <label for="email" class="control-label">Email</label>
            <div class="form-group">
                <input type="text" name="email" value="<?php echo ($this->input->post('email') ? $this->input->post('email') : $user['email']); ?>" class="form-control" id="email" />
                <i class="form-group__bar"></i>
            </div>
        </div>
          <div class="col-md-6">
            <label>User Type</label>
            <div class="form-group">
                  <select class='form-control' name='user_type' >
                    <option value=''></option>
                    <option <?=$user['user-type']=='user'?'selected':'';?> value='user'>User</option>
                    <option <?=$user['user-type']=='super-user'?'selected':'';?> value='super-user'>Super User</option>
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
                                            <input type="checkbox" class="toggle-switch__checkbox" <?=$user['student']?'checked':'';?> name='student'>
                                            <i class="toggle-switch__helper"></i>
                                        </div>
                                    </div>
                                </div> 
                                    <div class="col-sm-4 col-md-3">
                                    <h3 class="card-body__title">Promotion Module</h3>

                                    <br>

                                    <div class="form-group">
                                        <div class="toggle-switch">
                                            <input <?=$user['promote']?'checked':'';?> type="checkbox" class="toggle-switch__checkbox" name='promote'>
                                            <i class="toggle-switch__helper"></i>
                                        </div>
                                    </div>
                                </div> 
                                    <div class="col-sm-4 col-md-3">
                                    <h3 class="card-body__title">Class and Section Module</h3>

                                    <br>

                                    <div class="form-group">
                                        <div class="toggle-switch">
                                            <input <?=$user['class_section']?'checked':'';?>  type="checkbox" class="toggle-switch__checkbox" name='class_section' name='teacher'>
                                            <i class="toggle-switch__helper"></i>
                                        </div>
                                    </div>
                                    </div>
                                    <div class="col-sm-4 col-md-3">
                                    <h3 class="card-body__title">Teacher Module</h3>

                                    <br>

                                    <div class="form-group">
                                        <div class="toggle-switch">
                                            <input <?=$user['teacher']?'checked':'';?> type="checkbox" class="toggle-switch__checkbox" name='teacher'>
                                            <i class="toggle-switch__helper"></i>
                                        </div>
                                    </div>
                                    </div> 
                                    <div class="col-sm-4 col-md-3">
                                    <h3 class="card-body__title">Payment Module</h3>

                                    <br>

                                    <div class="form-group">
                                        <div class="toggle-switch">
                                            <input <?=$user['payment']?'checked':'';?> type="checkbox" class="toggle-switch__checkbox" name='payment'>
                                            <i class="toggle-switch__helper"></i>
                                        </div>
                                    </div>
                                    </div> 
                                    <div class="col-sm-4 col-md-3">
                                    <h3 class="card-body__title">Fees Module</h3>

                                    <br>

                                    <div class="form-group">
                                        <div class="toggle-switch">
                                            <input <?=$user['fees']?'checked':'';?> type="checkbox" class="toggle-switch__checkbox" name='fees'>
                                            <i class="toggle-switch__helper"></i>
                                        </div>
                                    </div>
                                    </div> 
                                    <div class="col-sm-4 col-md-3">
                                    <h3 class="card-body__title">Leaving Certificate Module</h3>

                                    <br>

                                    <div class="form-group">
                                        <div class="toggle-switch">
                                            <input <?=$user['leaving_certificate']?'checked':'';?> type="checkbox" class="toggle-switch__checkbox" name='leaving_certificate'>
                                            <i class="toggle-switch__helper"></i>
                                        </div>
                                    </div>
                                    </div>
                                    <div class="col-sm-4 col-md-3">
                                    <h3 class="card-body__title">Reports Module</h3>

                                    <br>

                                    <div class="form-group">
                                        <div class="toggle-switch">
                                            <input <?=$user['reports']?'checked':'';?> type="checkbox" class="toggle-switch__checkbox" name='reports'>
                                            <i class="toggle-switch__helper"></i>
                                        </div>
                                    </div>
                                    </div>
                                     <div class="col-sm-4 col-md-3">
                                    <h3 class="card-body__title">Website Contain Module</h3>

                                    <br>

                                    <div class="form-group">
                                        <div class="toggle-switch">
                                            <input <?=$user['website_contain']?'checked':'';?> type="checkbox" class="toggle-switch__checkbox" name='website_contain'>
                                            <i class="toggle-switch__helper"></i>
                                        </div>
                                    </div>
                                    </div>
                                     <div class="col-sm-4 col-md-3">
                                    <h3 class="card-body__title">User Modules</h3>

                                    <br>

                                    <div class="form-group">
                                        <div class="toggle-switch">
                                            <input <?=$user['user']?'checked':'';?> type="checkbox" class="toggle-switch__checkbox" name='user'>
                                            <i class="toggle-switch__helper"></i>
                                        </div>
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

<?php echo form_close(); ?>
<