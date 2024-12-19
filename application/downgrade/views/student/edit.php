
<?php echo form_open_multipart('student/edit/' . $student['student_id']); ?>
<div class="card-body">
    <h3 class="box-title">Student Edit</h3>
    <div class="row clearfix">

        <div class="col-md-8">
            <label for="fullname" class="control-label"><span class="text-danger">*</span>Fullname</label>
            <div class="form-group">
                 <label>Full Name</label>
                <input type="text" name="fullname" value="<?php echo ($this->input->post('fullname') ? $this->input->post('fullname') : $student['fullname']); ?>" class="form-control" id="fullname" />
                <i class="form-group__bar"></i>
                <span class="text-danger"><?php echo form_error('fullname'); ?></span>
            </div>
            <div class="form-group">
                <label>Adhar No</label>
                <input type="text" name="aadhar_no" value="<?php echo ($this->input->post('aadhar_no')) ? $this->input->post('aadhar_no') : $student['aadhar_no']; ?>" class="form-control" id="fullname" placeholder="Aadhar No"/>

                <i class="form-group__bar"></i>
            </div>
             <div class='row'>
            <div class='col-md-6'>
                <div class='form-group'>
                    <label>Gen. Registration No</label>
                    <input type='text' name='registration_no' class='form-control' value='<?=$student['registration_no']?>'>
                    <i class="form-group__bar"></i>
                    
                </div>
            </div>
            <div class='col-md-6'>
                <div class='form-group'>
                    <label>Saral ID</label>
                    <input type='text' name='saral_id' class='form-control' value='<?=$student['saral_id']?>'>
                     <i class="form-group__bar"></i>
                </div>
            </div>
            </div>
        </div>
        <div class="col-md-2">
            <label>Image</label> <br />
            <img id="blah" style="width:90px;height:90px;" src="<?= base_url() ?>uploads/student/<?= $student['image'] ?>" alt="your image" />
            <input type="hidden" name="old_image" value="<?= $student['image'] ?>">


        </div>
        <div class="col-md-2">
            <label>Change Image</label> <br />
            <img id="blah" style="width:90px;height:90px;" src="http://placehold.it/180" alt="your image" />
            <input type='file' name="image" onchange="readURL(this);" />

        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="section_id" class="control-label"><span class="text-danger">*</span>Class</label>
            <select name="class_id" id="class"class="form-control" placeholder="Class">
                    <option value="">select class</option>
                    <?php
                    foreach ($all_class as $clas) {
                        $selected = ($clas['class_id'] == $student['class_id']) ? ' selected="selected"' : "";
                        
                        echo '<option value="' . $clas['class_id'] . '" ' . $selected . '>' . $clas['numeric_name'] . '</option>';
                    }
                    ?>
                </select>
                <i class="form-group__bar"></i>
            <span class="text-danger"><?php echo form_error('class_id'); ?></span>
            </div>
            
        </div>
         <div class="col-md-3">
              <label for="rte_applicable" class="control-label">RTE Applicable</label>
                                    <br>
                                    <div class="form-group">
                                        <div class="toggle-switch">
                                            <input type="checkbox" class="toggle-switch__checkbox" name="rte_applicable" id="rte_applicable" value="<?php echo $this->input->post('rte_applicable'); ?>"  <?=$student['rte_applicable']?'checked':''?>>
                                            <i class="toggle-switch__helper"></i>
                                           
                                        </div>
                                    </div>
                                </div>
        <div class="col-md-4">
            
            
            <div class="form-group">
                <label for="section_id"  class="control-label"><span class="text-danger">*</span>Section</label>
                 <select name="section_id" id="section" class="form-control" placeholder="Section">
                    <option value="">select section</option>
                    <?php
                    foreach ($all_section as $section) {
                        $selected = ($section['section_id'] == $student['section_id']) ? ' selected="selected"' : "";

                        echo '<option value="' . $section['section_id'] . '" ' . $selected . '>' . $section['section_name'] . '</option>';
                    }
                    ?>
                </select>
                <i class="form-group__bar"></i>
                <span class="text-danger"><?php echo form_error('section_id'); ?></span>
            </div>
        </div>

        <div class="col-md-6">
            <label for="religion" class="control-label">Religion</label>
            <div class="form-group">
                <input type="text" name="religion" value="<?php echo ($this->input->post('religion') ? $this->input->post('religion') : $student['religion']); ?>" class="form-control" id="religion" />
                <i class="form-group__bar"></i>
            </div>
        </div>
        <div class="col-md-6">
            <label for="nationality" class="control-label">Nationality</label>
            <div class="form-group">
                <input type="text" name="nationality" value="<?php echo ($this->input->post('nationality') ? $this->input->post('nationality') : $student['nationality']); ?>" class="form-control" id="nationality" />
                <i class="form-group__bar"></i>
            </div>
        </div>
        <div class="col-md-6">
            <label for="mother_tounge" class="control-label">Mother Tounge</label>
            <div class="form-group">
                <input type="text" name="mother_tounge" value="<?php echo ($this->input->post('mother_tounge') ? $this->input->post('mother_tounge') : $student['mother_tounge']); ?>" class="form-control" id="mother_tounge" />
                <i class="form-group__bar"></i>
            </div>
        </div>
        <div class="col-md-6">
            <label for="caste" class="control-label">Caste</label>
            <div class="form-group">
                <input type="text" name="caste" value="<?php echo ($this->input->post('caste') ? $this->input->post('caste') : $student['caste']); ?>" class="form-control" id="caste" />
                <i class="form-group__bar"></i>
            </div>
        </div>
        <div class="col-md-6">
            <label for="category" class="control-label">Sub-caste</label>
            <div class="form-group">
                <input type="text" name="category" value="<?php echo ($this->input->post('category') ? $this->input->post('category') : $student['category']); ?>" class="form-control" id="category" />
                <i class="form-group__bar"></i>
            </div>
        </div>
        <div class="col-md-6">
            <label for="dob" class="control-label"><span class="text-danger">*</span>Date Of Birth</label>
            <div class="form-group">
                <input type="text" name="dob" value="<?php echo ($this->input->post('dob') ? $this->input->post('dob') : date('d/m/Y',strtotime($student['dob']))); ?>" class="form_datetime form-control" id="dob" />
                <i class="form-group__bar"></i>
                <span class="text-danger"><?php echo form_error('dob'); ?></span>
            </div>
        </div>
        <div class="col-md-6">
            <label for="age" class="control-label">Age</label>
            <div class="form-group">
                <input type="text" name="age" value="<?php echo ($this->input->post('age') ? $this->input->post('age') : $student['age']); ?>" class="form-control" id="age"  readonly="true"/>
                <i class="form-group__bar"></i>
            </div>
        </div>

        <div class="col-md-6">
            <label for="last_school" class="control-label"><span class="text-danger">*</span>Last School</label>
            <div class="form-group">
                <input type="text" name="last_school" value="<?php echo ($this->input->post('last_school') ? $this->input->post('last_school') : $student['last_school']); ?>" class="form-control" id="last_school" />
                <i class="form-group__bar"></i>
                <span class="text-danger"><?php echo form_error('last_school'); ?></span>
            </div>
        </div>
        <div class="col-md-6">
            <label for="last_class" class="control-label"><span class="text-danger">*</span>Last Class</label>
            <div class="form-group">
                <input type="text" name="last_class" value="<?php echo ($this->input->post('last_class') ? $this->input->post('last_class') : $student['last_class']); ?>" class="form-control" id="last_class" />
                <i class="form-group__bar"></i>
                <span class="text-danger"><?php echo form_error('last_class'); ?></span>
            </div>
        </div>
        <div class="col-md-6">
            <label for="last_medium" class="control-label"><span class="text-danger">*</span>Last Medium</label>
            <div class="form-group">
                <input type="text" name="last_medium" value="<?php echo ($this->input->post('last_medium') ? $this->input->post('last_medium') : $student['last_medium']); ?>" class="form-control" id="last_medium" />
                <i class="form-group__bar"></i>
                <span class="text-danger"><?php echo form_error('last_medium'); ?></span>
            </div>
        </div>
        <div class="col-md-4">
            <label for="is_last_school_recognize" class="control-label">Is Last School Recognize</label>
            <br>
            <div class="form-group">
                <div class="toggle-switch">
                    <input type="checkbox" class="toggle-switch__checkbox" name="is_last_school_recognize" value="<?php echo $this->input->post('is_last_school_recognize'); ?>" <?php echo ($student['is_last_school_recognize'] ? 'checked' : ''); ?>>
                    <i class="toggle-switch__helper"></i>

                </div>
            </div>

        </div>

        <div class="col-md-8">
            <label for="father_name" class="control-label"><span class="text-danger">*</span>Father Name</label>
            <div class="form-group">
                <input type="text" name="father_name" value="<?php echo ($this->input->post('father_name') ? $this->input->post('father_name') : $student['father_name']); ?>" class="form-control" id="father_name" />
                <i class="form-group__bar"></i>
                <span class="text-danger"><?php echo form_error('father_name'); ?></span>
            </div>
        </div>
        <div class="col-md-6">
            <label for="at_post" class="control-label">At Post</label>
            <div class="form-group">
                <input type="text" name="at_post" value="<?php echo ($this->input->post('at_post') ? $this->input->post('at_post') : $student['at_post']); ?>" class="form-control" id="at_post" />
                <i class="form-group__bar"></i>
            </div>
        </div>
        <div class="col-md-6">
            <label for="tahsil" class="control-label">Tahsil</label>
            <div class="form-group">
                <input type="text" name="tahsil" value="<?php echo ($this->input->post('tahsil') ? $this->input->post('tahsil') : $student['tahsil']); ?>" class="form-control" id="tahsil" />
                <i class="form-group__bar"></i>
            </div>
        </div>
        <div class="col-md-6">
            <label for="dist" class="control-label">Dist</label>
            <div class="form-group">
                <input type="text" name="dist" value="<?php echo ($this->input->post('dist') ? $this->input->post('dist') : $student['dist']); ?>" class="form-control" id="dist" />
                <i class="form-group__bar"></i>
            </div>
        </div>
        <div class="col-md-6">
            <label for="occupation" class="control-label">Occupation</label>
            <div class="form-group">
                <input type="text" name="occupation" value="<?php echo ($this->input->post('occupation') ? $this->input->post('occupation') : $student['occupation']); ?>" class="form-control" id="occupation" />
                <i class="form-group__bar"></i>
            </div>
        </div>
        <div class="col-md-6">
            <label for="ph_no" class="control-label">Ph No</label>
            <div class="form-group">
                <input type="text" name="ph_no" value="<?php echo ($this->input->post('ph_no') ? $this->input->post('ph_no') : $student['ph_no']); ?>" class="form-control" id="ph_no" />
                <i class="form-group__bar"></i>
            </div>
        </div>
        <div class="col-md-6">
            <label for="mobile_no" class="control-label"><span class="text-danger">*</span>Mobile No</label>
            <div class="form-group">
                <input type="text" name="mobile_no" value="<?php echo ($this->input->post('mobile_no') ? $this->input->post('mobile_no') : $student['mobile_no']); ?>" class="form-control" id="mobile_no" />
                <i class="form-group__bar"></i>
                <span class="text-danger"><?php echo form_error('mobile_no'); ?></span>
            </div>
        </div>
        <div class="col-md-3">
            <label for="is_last_school_recognize" class="control-label">Parent On Service</label>
            <br>
            <div class="form-group">
                <div class="toggle-switch">
                    <input type="checkbox" class="toggle-switch__checkbox" name="parent_on_service" value="<?php echo $this->input->post('parent_on_service'); ?>" id="onservice" <?php echo ($student['parent_on_service'] ? 'checked' : ''); ?>>
                    <i class="toggle-switch__helper"></i>

                </div>
            </div>

        </div>
        <div class="col-md-9">
            <label for="office_address_phone_no" class="control-label">Office Address Phone No</label>
            <div class="form-group">
                <input type="text" name="office_address_phone_no" value="<?php echo ($this->input->post('office_address_phone_no') ? $this->input->post('office_address_phone_no') : $student['office_address_phone_no']); ?>" class="form-control" id="office_address_phone_no" readonly="true"/>
                <i class="form-group__bar"></i>
            </div>
        </div>
        <div class="col-md-6">
            <label for="mother_full_name" class="control-label"><span class="text-danger">*</span>Mother Full Name</label>
            <div class="form-group">
                <input type="text" name="mother_full_name" value="<?php echo ($this->input->post('mother_full_name') ? $this->input->post('mother_full_name') : $student['mother_full_name']); ?>" class="form-control" id="mother_full_name" />
                <span class="text-danger"><?php echo form_error('mother_full_name'); ?></span>
                <i class="form-group__bar"></i>
            </div>
        </div>
        <div class="col-md-6">
            <label for="annual_income" class="control-label">Annual Income</label>
            <div class="form-group">
                <input type="text" name="annual_income" value="<?php echo ($this->input->post('annual_income') ? $this->input->post('annual_income') : $student['annual_income']); ?>" class="form-control" id="annual_income" />
                <i class="form-group__bar"></i>
            </div>
        </div>
        <div class="col-md-6">
            <label for="local_address" class="control-label">Local Address</label>
            <div class="form-group">
                <input type="text" name="local_address" value="<?php echo ($this->input->post('local_address') ? $this->input->post('local_address') : $student['local_address']); ?>" class="form-control" id="local_address" />
                <i class="form-group__bar"></i>
            </div>
        </div>
        <div class="col-md-6">
            <label for="relation_ship_with_parent" class="control-label">Relation Ship With Parent</label>
            <div class="form-group">
                <input type="text" name="relation_ship_with_parent" value="<?php echo ($this->input->post('relation_ship_with_parent') ? $this->input->post('relation_ship_with_parent') : $student['relation_ship_with_parent']); ?>" class="form-control" id="relation_ship_with_parent" />
                <i class="form-group__bar"></i>
            </div>
        </div>
        <div class="col-md-4">
            <label for="academic_year" class="control-label"><span class="text-danger">*</span>Academic Year</label>
            <div class="form-group">
                <input type="text" name="academic_year" value="<?php echo ($this->input->post('academic_year') ? $this->input->post('academic_year') : $student['academic_year']); ?>" class="form-control" id="academic_year" />
                <i class="form-group__bar"></i>
                <span class="text-danger"><?php echo form_error('academic_year'); ?></span>
            </div>
        </div>
        <div class="col-md-4">
            <label for="place_of_birth" class="control-label"><span class="text-danger">*</span>Place Of Birth</label>
            <div class="form-group">
                <input type="text" name="place_of_birth" class="form-control" id="place_of_birth" value="<?php echo ($this->input->post('place_of_birth') ? $this->input->post('place_of_birth') : $student['place_of_birth']); ?>"/>
                <i class="form-group__bar"></i>
                <span class="text-danger"><?php echo form_error('place_of_birth'); ?></span>
            </div>
        </div>
        <div class="col-md-4">
            <label for="registration_no" class="control-label"><span class="text-danger">*</span>Admission Date</label>
            <div class="form-group">
                <input  name="register_date" class="form-control form_datetime" id="" value="<?php echo ($this->input->post('register_date') ? date('d/m/Y',strtotime($this->input->post('register_date'))) : date('d/m/Y',strtotime($student['register_date']))); ?>"/>
                <i class="form-group__bar"></i>
                <span class="text-danger"><?php echo form_error('register_date'); ?></span>
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
		