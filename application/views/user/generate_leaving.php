
<?php echo form_open('user/get_leaving'); ?>
<div class="card-body">
    <h3 class="box-title">Generate Leaving</h3>
    <div class="row clearfix">
        <div class="col-md-4">
            <label for="class" class="control-label"><span class="text-danger">*</span>Class</label>
            <div class="form-group">
                <select name="class" class="select2" id='class_leave' data-placeholder="Select a Class">
                    <option value="">select student</option>
                    <?php
                    foreach ($all_class as $clas) {
                        $selected = ($clas['class_id'] == $this->input->post('class_id')) ? ' selected="selected"' : "";

                        echo '<option value="' . $clas['class_id'] . '" ' . $selected . '>' . $clas['numeric_name'] . '</option>';
                    }
                    ?>
                </select>
                <i class="form-group__bar"></i>
                <span class="text-danger"><?php echo form_error('student_id'); ?></span>
            </div>
        </div>
        <div class="col-md-4">
            <label for="section" class="control-label"><span class="text-danger">*</span>Section</label>
            <div class="form-group">
                <select name="section" class="select2" id='section_leave' data-placeholder="Select a Section">
                   
                </select>
                <i class="form-group__bar"></i>
                <span class="text-danger"><?php echo form_error('student_id'); ?></span>
            </div>
        </div>
        <div class="col-md-4">
            <label for="student_id" class="control-label"><span class="text-danger">*</span>Student</label>
            <div class="form-group">
                <select name="student_id" class="select2" id='student_leave' data-placeholder="Select a Student">
                </select>
                <i class="form-group__bar"></i>
                <span class="text-danger"><?php echo form_error('student_id'); ?></span>
            </div>
        </div>
        <div class="col-md-12">
            <label for="student_id" class="control-label"><span class="text-danger">*</span>Student Full Name</label>
            <div class="form-group">
                <input class="form-control" id="fullname_stud" name="fullname" placeholder="Student Full Name">
                <i class="form-group__bar"></i>
                <span class="text-danger"><?php echo form_error('fullname'); ?></span>
                
            </div>
            </div>
        <div class="col-md-4">
            <label><span class="text-danger">*</span>Father Name</label>
            <div class="form-group">
                <input type="text" name="father_name" id="father" class="form-control" />
                <i class="form-group__bar"></i>
                <span class="text-danger"><?php echo form_error('father_name'); ?></span>
            </div>
        </div>
        <div class="col-md-4">
            <label><span class="text-danger">*</span>Mother Name</label>
            <div class="form-group">
                <input type="text" name="mother_name" id="mother_name" class="form-control" />
                <i class="form-group__bar"></i>
                <span class="text-danger"><?php echo form_error('mother_name'); ?></span>
            </div>
        </div>
        <div class="col-md-4">
            <label><span class="text-danger">*</span>Surname Name</label>
            <div class="form-group">
                <input type="text" name="surname" id="surname" class="form-control" />
                <i class="form-group__bar"></i>
                <span class="text-danger"><?php echo form_error('surname'); ?></span>
            </div>
        </div>
        <div class="col-md-3">
            <label><span class="text-danger">*</span>Place Of Birth</label>
            <div class="form-group">
                <input type="text" name="place_of_birth" id="place_of_birth" class="form-control" />
                <i class="form-group__bar"></i>
                <span class="text-danger"><?php echo form_error('place_of_birth'); ?></span>
            </div>
        </div>
        <div class="col-md-3">
            <label><span class="text-danger">*</span>Tahsil</label>
            <div class="form-group">
                <input type="text" name="tah" id="tah" class="form-control" />
                <i class="form-group__bar"></i>
                <span class="text-danger"><?php echo form_error('tah'); ?></span>
            </div>
        </div>
        <div class="col-md-3">
            <label><span class="text-danger">*</span>District</label>
            <div class="form-group">
                <input type="text" name="dist" id="dist" class="form-control" />
                <i class="form-group__bar"></i>
                <span class="text-danger"><?php echo form_error('dist'); ?></span>
            </div>
        </div>
        <div class="col-md-3">
            <label><span class="text-danger">*</span>State</label>
            <div class="form-group">
                <input type="text" name="state" id="state" class="form-control" />
                <i class="form-group__bar"></i>
                <span class="text-danger"><?php echo form_error('state'); ?></span>
            </div>
        </div>
        <div class="col-md-3">
            <label><span class="text-danger">*</span>Country</label>
            <div class="form-group">
                <input type="text" name="country" id="country" class="form-control" />
                <i class="form-group__bar"></i>
                <span class="text-danger"><?php echo form_error('country'); ?></span>
            </div>
        </div>
        <div class="col-md-12">
            <label><span class="text-danger">*</span>Reason Of Leaving School</label>
            <div class="form-group">
                <input type="text" name="reason" id="reason" class="form-control" />
                <i class="form-group__bar"></i>
                <span class="text-danger"><?php echo form_error('reason'); ?></span>
            </div>
        </div>
        <div class="col-md-12">
            <label>Remark</label>
            <div class="form-group">
                <input type="text" name="remark" id="remark" class="form-control" />
                <i class="form-group__bar"></i>
                <span class="text-danger"><?php echo form_error('remark'); ?></span>
            </div>
        </div>
    </div>
    <div class="box-footer">
      
    </div>
</div>

<?php echo form_close(); ?>
