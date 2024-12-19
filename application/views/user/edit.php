
<?php echo form_open('user/edit/' . $user['user_id']); ?>
<div class="card-body">
    <h3 class="box-title text-center"> Edit User Details</h3>
       <div class="row clearfix">
            <div class="col-md-6">
                <label for="userCatID" class="control-label"> User Category<span class="text-danger"> *</span></label>
                <div class="form-group">
                    <select name="userCatID" required="" class="select2" id='class' data-placeholder="Select User Category">
                        <option value="">Select User Category</option>
                        <?php
                        foreach ($categories as $cat) {
                            $selected = ($cat['userCatID'] == $user['userCatID']) ? ' selected="selected"' : "";

                            echo '<option value="' . $cat['userCatID'] . '" ' . $selected . '>' . $cat['category'] . '</option>';
                        }
                        ?>
                    </select>
                    <span class="text-danger"><?php echo form_error('userCatID'); ?></span>
                </div>
            </div>
            <div class="col-md-6">
                <label for="userDesID" class="control-label"> User Designation<span class="text-danger"> *</span></label>
                <div class="form-group">
                    <select name="userDesID" required="" class="select2"  data-placeholder="Select User Designation">
                        <option value="">Select User Designation</option>
                        <?php
                        foreach ($designation as $des) {
                            $selected = ($des['userDesID'] == $user['userDesID']) ? ' selected="selected"' : "";

                            echo '<option value="' . $des['userDesID'] . '" ' . $selected . '>' . $des['designation'] . '</option>';
                        }
                        ?>
                    </select>
                    <span class="text-danger"><?php echo form_error('userDesID'); ?></span>
                </div>
            </div>
            <div class="col-md-6">
                <label>First Name <span class="text-danger"> *</span></label>
                <div class="form-group">
                    <input type="text" required="" name="fname" value="<?php echo $this->input->post('fname') ? $this->input->post('fname') : $user['fname']; ?>" class="form-control" id="fname" placeholder="First Name" />
                    <i class="form-group__bar"></i>
                </div>
            </div>
            <div class="col-md-6">
                <label>Last Name <span class="text-danger"> *</span></label>
                <div class="form-group">
                    <input type="text" required="" name="lname" value="<?php echo $this->input->post('lname') ? $this->input->post('lname') :$user['lname']; ?>" class="form-control" id="lname" placeholder="Last Name"/>
                    <i class="form-group__bar"></i>
                </div>
            </div>
            <div class="col-md-6">
                <label>Username <span class="text-danger"> *</span></label>
                <div class="form-group">
                    <input type="text" readonly="" required="" name="username" value="<?php echo $this->input->post('username') ? $this->input->post('username') : $user['username']; ?>" class="form-control" id="username" placeholder="Username"/>
                    <i class="form-group__bar"></i>
                </div>
            </div>
            <div class="col-md-6">
                <label>Email <span class="text-danger"> *</span></label>
                <div class="form-group">
                    <input type="email" required="" name="email" value="<?php echo $this->input->post('email') ? $this->input->post('email') : $user['email']; ?>" class="form-control" id="email" placeholder="Email" />
                
                    <i class="form-group__bar"></i>
                </div>
            </div>
        
    </div>
    <div class="box-footer text-center">
        <button type="submit" class="btn btn-success btn-raised">
            <i class="fa fa-check"></i> Save
        </button>
    </div>		
</div>

<?php echo form_close(); ?>
<