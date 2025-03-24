
<?php echo form_open('leaving_certificate/add'); ?>
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
                        if($clas['numeric_name']>=1 && $clas['numeric_name']<=10){
                        echo '<option value="' . $clas['class_id'] . '" ' . $selected . '>' . $clas['numeric_name'] . '</option>';
                        }
                    }
                    ?>
                </select>
                <i class="form-group__bar"></i>
                <span class="text-danger"><?php echo form_error('class'); ?></span>
            </div>
        </div>
        <div class="col-md-4">
            <label for="section" class="control-label"><span class="text-danger">*</span>Section</label>
            <div class="form-group">
                <select name="section" class="select2" id='section_leave' data-placeholder="Select a Section">

                </select>
                <i class="form-group__bar"></i>
                <span class="text-danger"><?php echo form_error('section'); ?></span>
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
            <label><span class="text-danger">*</span>Surname</label>
            <div class="form-group">
                <input type="text" name="surname" id="surname" class="form-control" />
                <i class="form-group__bar"></i>
                <span class="text-danger"><?php echo form_error('surname'); ?></span>
            </div>
        </div>
        <div class="col-md-4">
            <label for="religion" class="control-label">Religion</label>
            <div class="form-group">
                <input type="text" name="religion" id="religion" value="<?php echo $this->input->post('religion') ; ?>" class="form-control" id="religion" />
                <i class="form-group__bar"></i>
            </div>
        </div>
        
        
        <div class="col-md-4">
            <label for="caste" class="control-label">Caste</label>
            <div class="form-group">
                <input type="text" name="caste" id="caste" value="<?php echo $this->input->post('caste'); ?>" class="form-control" id="caste" />
                <i class="form-group__bar"></i>
            </div>
        </div>
        <!-- <div class="col-md-4">
            <label for="category" class="control-label">Sub-Caste</label>
            <div class="form-group">
                <input type="text" name="category" value="<?php echo $this->input->post('category'); ?>" class="form-control" id="category" />
                <i class="form-group__bar"></i>
            </div>
        </div> -->
        <div class="col-md-3">
            <label><span class="text-danger"></span>Place Of Birth</label>
            <div class="form-group">
                <input type="text" name="place_of_birth" id="place_of_birth" class="form-control" />
                <i class="form-group__bar"></i>
                <span class="text-danger"><?php echo form_error('place_of_birth'); ?></span>
            </div>
        </div>
        <div class="col-md-3">
            <label><span class="text-danger"></span>Tahsil</label>
            <div class="form-group">
                <input type="text" name="b_tah" id="tah" class="form-control" />
                <i class="form-group__bar"></i>
                <span class="text-danger"><?php echo form_error('tahsil'); ?></span>
            </div>
        </div>
        <div class="col-md-3">
            <label><span class="text-danger"></span>District</label>
            <div class="form-group">
                <input type="text" name="b_dist" id="dist" class="form-control" />
                <i class="form-group__bar"></i>
                <span class="text-danger"><?php echo form_error('dist'); ?></span>
            </div>
        </div>
        <div class="col-md-3">
            <label><span class="text-danger">*</span>State</label>
            <div class="form-group">
                <input type="text" name="b_state" id="state" class="form-control" value="Maharashtra" />
                <i class="form-group__bar"></i>
                <span class="text-danger"><?php echo form_error('b_state'); ?></span>
            </div>
        </div>
        <div class="col-md-3">
            <label><span class="text-danger">*</span>Country</label>
            <div class="form-group">
                <input type="text" name="b_country" id="country" class="form-control" value="India" />
                <i class="form-group__bar"></i>
                <span class="text-danger"><?php echo form_error('b_country'); ?></span>
            </div>
        </div>
        <div class="col-md-3">
            <label><span class="text-danger">*</span>Saral ID</label>
            <div class="form-group">
                <input type="text" name="saral_id" id="saral_id" class="form-control" />
                <i class="form-group__bar"></i>
                <span class="text-danger"><?php echo form_error('saral_id'); ?></span>
            </div>
        </div>
        <div class="col-md-3">
            <label><span class="text-danger">*</span>Class Of Admission </label>
            <div class="form-group">
                <input type="text" name="sought_admission_in_class" id="sought_admission_in_class" class="form-control" />
                <i class="form-group__bar"></i>
                <span class="text-danger"><?php echo form_error('sought_admission_in_class'); ?></span>
            </div>
        </div>
        <div class="col-md-3">
            <label><span class="text-danger">*</span>Progress in the Study</label>
            <div class="form-group">
                <input type="text" name="progress" id="progress" class="form-control" />
                <i class="form-group__bar"></i>
                <span class="text-danger"><?php echo form_error('progress'); ?></span>
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
        <input type="hidden" name="academic_year" value="" id="academic_year" />
        <div class="col-md-12">
            <label>Remark<span class="text-danger">*</span></label>
            <div class="form-group">
                <input type="text" name="remark" id="remark" class="form-control" />
                <i class="form-group__bar"></i>
                <span class="text-danger"><?php echo form_error('remark'); ?></span>
            </div>
        </div>
        <div class="col-md-6">

            <div class="form-group">
                <label>Date Of Leaving<span class="text-danger">*</span></label>
                <input type="text" name="date_of_leave" value="<?php echo $this->input->post('date_of_leave'); ?>"  class="form-control form_datetime" placeholder="Date Of Leaving" id="dob">
                <i class="form-group__bar"></i>
                <span class="text-danger"><?php echo form_error('date_of_leave'); ?></span>
            </div>
        </div>
        <div class="col-md-6">

            <div class="form-group">
                <label>Date Of Issue<span class="text-danger">*</span></label>
                <input type="text" name="date_of_issue" value="<?php echo $this->input->post('date_of_issue'); ?>"  class="form-control form_datetime" placeholder="Date Of Issue" >
                <i class="form-group__bar"></i>
                <span class="text-danger"><?php echo form_error('date_of_issue'); ?></span>
            </div>
        </div>
        
        <div class="col-md-6">

            <div class="form-group">
                 <label>From Which Class Studying<span class="text-danger">*</span></label>
                 <input type="text" name='studying_from_class' value="<?php echo $this->input->post('studying_from_class'); ?>" class="form-control" placeholder="From Which Class Studying" />
                  <i class="form-group__bar"></i>
                <span class="text-danger"><?php echo form_error('studying_from_class'); ?></span>
                </div>
                </div>
                 
        
        <div class="col-md-6">

            <div class="form-group">
                <label>Studying Since<span class="text-danger">*</span></label>
                <input type="text" name="studying_since" value="<?php echo $this->input->post('studying_since'); ?>"  class="form-control form_monthyear" placeholder="Studying Since" >
                <i class="form-group__bar"></i>
                <span class="text-danger"><?php echo form_error('studying_since'); ?></span>
            </div>
        </div>
        <div class="col-md-6">
        </div>
        <div class="box-footer">
            <button type="submit" class="btn btn-success btn-raised">
                <i class="fa fa-check"></i> Save
            </button>
        </div>
    </div>

    <?php echo form_close(); ?>
