
<?php echo form_open('user/setting'); ?>
<div class="card-body">
    <h3 class="box-title">Change Password</h3>
    <?php
    if($this->session->flashdata('msg')){
        ?>
    <div class="alert alert-danger" role="alert">
                                <?=$this->session->flashdata('msg')?>
                            </div>
    <?php
    }
    ?>
    <div class="row clearfix">
        <div class="col-md-4">
            <div class="form-group">
                <input type="password" name="oldpass" value="<?php echo $this->input->post('oldpass'); ?>" class="form-control" id="fname" placeholder="Old Password" />
                <i class="form-group__bar"></i>
                <span class="text-danger"><?php echo form_error('oldpass'); ?></span>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <input type="password" name="newpass" value="<?php echo $this->input->post('newpass'); ?>" class="form-control" id="lname" placeholder="New Password"/>
                <i class="form-group__bar"></i>
                <span class="text-danger"><?php echo form_error('newpass'); ?></span>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <input type="password" name="confirmpass" value="<?php echo $this->input->post('confirmpass'); ?>" class="form-control" id="username" placeholder="Confirm Password"/>
                <i class="form-group__bar"></i>
                <span class="text-danger"><?php echo form_error('confirmpass'); ?></span>
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
