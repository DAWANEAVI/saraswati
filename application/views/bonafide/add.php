<?php
include APPPATH . 'third_party/Numbertowords.php';
?>
<?php echo form_open('bonafide/add'); ?>
<div class="card-body">
    <h3 class="box-title text-center">Generate Bonafide Certificate</h3> <hr>
    <div class="row clearfix">
    <?php if($this->input->get('student_id')) {?>
        <div class="col-md-12">
            <label for="student_id" class="control-label"><span class="text-danger">*</span>Student Full Name</label>
            <div class="form-group">
                <input class="form-control" id="fullname_stud" name="fullname" placeholder="Student Full Name" value="<?php echo $student_data['fullname']; ?>" />
                <i class="form-group__bar"></i>
                <span class="text-danger"><?php echo form_error('fullname'); ?></span>

            </div>
        </div>
        <input type="hidden" name="student_id" value="<?php echo $student_data['student_id']; ?>">
        <div class="col-md-4">
            <label><span class="text-danger">*</span>Father Name</label>
            <div class="form-group">
                <input type="text" name="fathername" id="father" class="form-control" value="<?php echo $student_data['father_name']; ?>" />
                <i class="form-group__bar"></i>
                <span class="text-danger"><?php echo form_error('fathername'); ?></span>
            </div>
        </div>
        
        <div class="col-md-4">
            <label><span class="text-danger">*</span>Session</label>
            <div class="form-group">
                <input type="text" name="session" id="session" class="form-control" value="<?php echo $student_data['academic_year']; ?>" />
                <i class="form-group__bar"></i>
                <span class="text-danger"><?php echo form_error('session'); ?></span>
            </div>
        </div>
        <div class="col-md-3">
            <label><span class="text-danger"></span>Class</label>
            <div class="form-group">
                <input type="text" name="class" id="class" class="form-control" value="<?php echo $student_data['class_name']; ?>" />
                <i class="form-group__bar"></i>
                <span class="text-danger"><?php echo form_error('class'); ?></span>
            </div>
        </div>
        <div class="col-md-4">
            <label><span class="text-danger"></span>Caste</label>
            <div class="form-group">
                <input type="text" name="caste" id="caste" class="form-control" value="<?php echo $student_data['caste']; ?>" />
                <i class="form-group__bar"></i>
                <span class="text-danger"><?php echo form_error('caste'); ?></span>
            </div>
        </div>
        <div class="col-md-4">
            <label><span class="text-danger"></span>Date Of Birth</label>
            <div class="form-group">
                <input type="date" name="dob" id="dob" class="form-control" value="<?php echo $student_data['dob']; ?>" />
                <i class="form-group__bar"></i>
                <span class="text-danger"><?php echo form_error('dob'); ?></span>
            </div>
        </div>
        <div class="col-md-4">
            <?php
            $date_data = explode('-', $student_data['dob']);
            $convertor = new Numbertowords();
            ?>
            <label><span class="text-danger">*</span>Date Of Birth (In Words)</label>
            <div class="form-group">
                <input type="text" name="db_in" id="dbw" class="form-control" value="<?php echo $convertor->convert_number($date_data[2]) ?> <?php echo date('F', strtotime($student_data['dob'])) ?> <?php echo $convertor->convert_number($date_data[0]) ?>" />
                <i class="form-group__bar"></i>
                <span class="text-danger"><?php echo form_error('dbw'); ?></span>
            </div>
        </div>
        <div class="col-md-12">
            <div class="box-footer text-center">
                <button type="submit" class="btn btn-success btn-raised">
                    <i class="fa fa-check"></i> Generate
                </button>
            </div>
        </div>

    <?php } else{ ?>
        <div class="col-md-4">
            <label for="class" class="control-label"><span class="text-danger">*</span>Class</label>
            <div class="form-group">
                <select name="class" class="select2" id='class' data-placeholder="Select a Class">
                    <option value="">select student</option>
                    <?php
                    foreach ($all_class as $clas) {
                        $selected = ($clas['class_id'] == $this->input->post('class_id')) ? ' selected="selected"' : "";

                        echo '<option value="' . $clas['class_id'] . '" ' . $selected . '>' . $clas['numeric_name'] . '</option>';
                    }
                    ?>
                </select>
                <span class="text-danger"><?php echo form_error('student_id'); ?></span>
            </div>
        </div>
        <div class="col-md-4">
            <label for="section" class="control-label"><span class="text-danger">*</span>Section</label>
            <div class="form-group">
                <select name="section" class="select2" id='section' data-placeholder="Select a Section">
                   
                </select>
                <span class="text-danger"><?php echo form_error('student_id'); ?></span>
            </div>
        </div>
        <div class="col-md-4">
            <label for="student_id" class="control-label"><span class="text-danger">*</span>Student</label>
            <div class="form-group">
                <select name="student_id" class="select2" id='student' onchange="studentSelect(3)" data-placeholder="Select a Student">
                </select>
                <span class="text-danger"><?php echo form_error('student_id'); ?></span>
            </div>
        </div>

    <?php } ?>

    </div>    
        
</div>

<?php echo form_close(); ?>
