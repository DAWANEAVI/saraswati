<?php
include APPPATH . 'third_party/Numbertowords.php';
?>
<?php echo form_open('bonafide/edit/'.$bonafide_certificate['bonafide_id'],array("class"=>"form-horizontal")); ?>
<div class="card-body">
    <h3 class="box-title text-center">Edit Bonafide Certificate</h3> <hr>
    <div class="row">
        <div class="col-md-12">
            <label for="student_id" class="control-label"><span class="text-danger">*</span>Student Full Name</label>
            <div class="form-group">
                <input class="form-control" id="fullname_stud" name="fullname" placeholder="Student Full Name" value="<?php echo $bonafide_certificate['fullname']; ?>" />
                <i class="form-group__bar"></i>
                <span class="text-danger"><?php echo form_error('fullname'); ?></span>

            </div>
        </div>
        <input type="hidden" name="student_id" value="<?php echo $bonafide_certificate['student_id']; ?>">
        <div class="col-md-4">
            <label><span class="text-danger">*</span>Father Name</label>
            <div class="form-group">
                <input type="text" name="fathername" id="father" class="form-control" value="<?php echo $bonafide_certificate['fathername']; ?>" />
                <i class="form-group__bar"></i>
                <span class="text-danger"><?php echo form_error('fathername'); ?></span>
            </div>
        </div>
        
        <div class="col-md-4">
            <label><span class="text-danger">*</span>Session</label>
            <div class="form-group">
                <input type="text" name="session" id="session" class="form-control" value="<?php echo $bonafide_certificate['session']; ?>" />
                <i class="form-group__bar"></i>
                <span class="text-danger"><?php echo form_error('session'); ?></span>
            </div>
        </div>
        <div class="col-md-3">
            <label><span class="text-danger"></span>Class</label>
            <div class="form-group">
                <input type="text" name="class" id="class" class="form-control" value="<?php echo $bonafide_certificate['class']; ?>" />
                <i class="form-group__bar"></i>
                <span class="text-danger"><?php echo form_error('class'); ?></span>
            </div>
        </div>
        <div class="col-md-4">
            <label><span class="text-danger"></span>Caste</label>
            <div class="form-group">
                <input type="text" name="caste" id="caste" class="form-control" value="<?php echo $bonafide_certificate['caste']; ?>" />
                <i class="form-group__bar"></i>
                <span class="text-danger"><?php echo form_error('caste'); ?></span>
            </div>
        </div>
        <div class="col-md-4">
            <label><span class="text-danger"></span>Date Of Birth</label>
            <div class="form-group">
                <input type="date" name="dob" id="dob" class="form-control" value="<?php echo $bonafide_certificate['dob']; ?>" />
                <i class="form-group__bar"></i>
                <span class="text-danger"><?php echo form_error('dob'); ?></span>
            </div>
        </div>
        <div class="col-md-4">
            <?php
            $date_data = explode('-', $bonafide_certificate['dob']);
            $convertor = new Numbertowords();
            ?>
            <label><span class="text-danger">*</span>Date Of Birth (In Words)</label>
            <div class="form-group">
                <input type="text" name="db_in" id="dbw" class="form-control" value="<?php echo $convertor->convert_number($date_data[2]) ?> <?php echo date('F', strtotime($bonafide_certificate['dob'])) ?> <?php echo $convertor->convert_number($date_data[0]) ?>" />
                <i class="form-group__bar"></i>
                <span class="text-danger"><?php echo form_error('dbw'); ?></span>
            </div>
        </div>
	
        
               
         
	
        <div class="col-md-12">
            <div class="box-footer text-center">
                <button type="submit" class="btn btn-success btn-raised">
                    <i class="fa fa-check"></i> Save
                </button>
            </div>
        </div>
    </div>
</div>
	
<?php echo form_close(); ?>