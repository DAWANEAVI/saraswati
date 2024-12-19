
<?php echo form_open('user/add'); ?>
<div class="card-body">
    <h3 class="box-title text-center pb-3">Add New User </h3>
    <div class="row clearfix">
        <div class="col-md-6">
            <label for="userCatID" class="control-label"> User Category<span class="text-danger"> *</span></label>
            <div class="form-group">
                <select name="userCatID" required="" class="select2" id='class' data-placeholder="Select User Category">
                    <option value="">Select User Category</option>
                    <?php
                    foreach ($categories as $cat) {
                        $selected = ($cat['userCatID'] == $this->input->post('userCatID')) ? ' selected="selected"' : "";

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
                        $selected = ($des['userDesID'] == $this->input->post('userDesID')) ? ' selected="selected"' : "";

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
                <input type="text" required="" name="fname" value="<?php echo $this->input->post('fname'); ?>" class="form-control" id="fname" placeholder="First Name" />
                <i class="form-group__bar"></i>
            </div>
        </div>
        <div class="col-md-6">
            <label>Last Name <span class="text-danger"> *</span></label>
            <div class="form-group">
                <input type="text" required="" name="lname" value="<?php echo $this->input->post('lname'); ?>" class="form-control" id="lname" placeholder="Last Name"/>
                <i class="form-group__bar"></i>
            </div>
        </div>
        <div class="col-md-6">
            <label>Username <span class="text-danger"> *</span></label>
            <div class="form-group">
                <input type="text" required="" name="username" value="<?php echo $this->input->post('username'); ?>" class="form-control" id="username" placeholder="Username"/>
                <i class="form-group__bar"></i>
            </div>
        </div>
        <div class="col-md-6">
            <label>Email <span class="text-danger"> *</span></label>
            <div class="form-group">
                <input type="email" required="" name="email" value="<?php echo $this->input->post('email'); ?>" class="form-control" id="email" placeholder="Email" />
              
                <i class="form-group__bar"></i>
            </div>
        </div>
        <div class="col-md-6">
            <label>Password <span class="text-danger"> *</span></label>
            <div class="form-group">
                <input type="password" required="" name="password" value="<?php echo $this->input->post('password'); ?>" class="form-control" id="password" placeholder="Password"/>
                <i class="form-group__bar"></i>
            </div>
        </div>
        <div class="col-md-6">
            <label>Confirm Password <span class="text-danger"> *</span></label>
            <div class="form-group">
                <input type="password" required="" name="confirmpassword" value="<?php echo $this->input->post('password'); ?>" class="form-control" id="password" placeholder="Password"/>
                <i class="form-group__bar"></i>
            </div>
        </div>
    <div class="col-md-12 text-center">
        <button type="submit" class="btn btn-success btn-raised">
            <i class="fa fa-check"></i> Save
        </button>
    </div>
</div>
</div>

<?php echo form_close(); ?>
