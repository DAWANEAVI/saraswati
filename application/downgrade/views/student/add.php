
<?php 
$attribute = array('class'=>'form');
echo form_open_multipart('student/add',$attribute); ?>
<div class="card-body">
    <h4 class="card-title">Add Student</h4>
    <div class="row clearfix">
        <div class="col-md-8">

            <div class="form-group">
                <label>Full Name</label>
                <input type="text" name="fullname" value="<?php echo $this->input->post('fullname'); ?>" class="form-control" id="fullname" placeholder="Full Name"/>
                
                <i class="form-group__bar"></i>
                <span class="text-danger"><?php echo form_error('fullname'); ?></span>
            </div>
            <div class="form-group">
                <label>Adhar No</label>
                <input type="text" name="aadhar_no" value="<?php echo $this->input->post('aadhar_no'); ?>" class="form-control" id="fullname" placeholder="Aadhar No"  data-rule-number="true" data-rule-minlength="12" data-rule-maxlength="12"/>
                
                <i class="form-group__bar"></i>
            </div>
            <div class='row'>
            <div class='col-md-6'>
                <div class='form-group'>
                    <label>Gen. Registration No</label>
                    <input type='text' name='registration_no' class='form-control'>
                    <i class="form-group__bar"></i>
                    
                </div>
            </div>
            <div class='col-md-6'>
                <div class='form-group'>
                    <label>Saral ID</label>
                    <input type='text' name='saral_id' class='form-control'>
                     <i class="form-group__bar"></i>
                </div>
            </div>
            </div>
        </div>
        <div class="col-md-4">
             <img id="blah" src="http://placehold.it/180" alt="your image" />
            <input type='file' name="image" onchange="readURL(this);" />
               
        </div>
        <div class="col-md-4">

            <div class="form-group">
                <label>Class</label>
                <select name="class_id" id="class" class="form-control select2" placeholder="Class">
                    <option value="">select class</option>
                    <?php
                    foreach ($all_class as $clas) {
                        $selected = ($clas['class_id'] == $this->input->post('class_id')) ? ' selected="selected"' : "";

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
                                            <input type="checkbox" class="toggle-switch__checkbox" name="rte_applicable" id="rte_applicable" value="<?php echo $this->input->post('rte_applicable'); ?>" disabled="true">
                                            <i class="toggle-switch__helper"></i>
                                           
                                        </div>
                                    </div>
                                </div>
        <div class="col-md-4">
            <label>Section</label>
            <div class="form-group">
                <select name="section_id" id="section" class="form-control select2" placeholder="Section">
                    <option value="">select section</option>
                    <?php
                    foreach ($all_section as $section) {
                        $selected = ($section['section_id'] == $this->input->post('section_id')) ? ' selected="selected"' : "";

                        echo '<option value="' . $section['section_id'] . '" ' . $selected . '>' . $section['section_name'] . '</option>';
                    }
                    ?>
                </select>
                <i class="form-group__bar"></i>
                <span class="text-danger"><?php echo form_error('section_id'); ?></span>
            </div>
        </div>



        <div class="col-md-6">
            <div class="form-group">
                <label>Religion</label>
                <input type="text" name="religion" value="<?php echo $this->input->post('religion'); ?>" class="form-control" id="religion" placeholder="Religion"/>
                <i class="form-group__bar"></i>
                <span class="text-danger"><?php echo form_error('religion'); ?></span>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label>Nationality</label>
                <input type="text" name="nationality" value="<?php echo $this->input->post('nationality'); ?>" class="form-control" id="nationality" placeholder="Nationality"/>
                <i class="form-group__bar"></i>
                <span class="text-danger"><?php echo form_error('nationality'); ?></span>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label>Mother Tounge</label>
                <input type="text" name="mother_tounge" value="<?php echo $this->input->post('mother_tounge'); ?>" class="form-control" id="mother_tounge" placeholder="Mother Tounge"/>
                <i class="form-group__bar"></i>
                <span class="text-danger"><?php echo form_error('mother_tounge'); ?></span>
                
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label>Caste</label>
                <input type="text" name="caste" value="<?php echo $this->input->post('caste'); ?>" class="form-control" id="caste" placeholder="Caste"/>
                 <i class="form-group__bar"></i>
                 <span class="text-danger"><?php echo form_error('caste'); ?></span>
                
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label>Sub-caste</label>
                <input type="text" name="category" value="<?php echo $this->input->post('category'); ?>" class="form-control" id="category" placeholder="Sub-caste"/>
                <i class="form-group__bar"></i>
                <span class="text-danger"><?php echo form_error('category'); ?></span>
            </div>
        </div>
         <div class="col-md-6">

                                    <div class="form-group">
                                        <label>Date Of Birth</label>
                                        <input type="text" name="dob" value="<?php echo $this->input->post('dob'); ?>"  class="form-control form_datetime" placeholder="Date Of Birth" id="dob">
                                        <i class="form-group__bar"></i>
                                        <span class="text-danger"><?php echo form_error('dob'); ?></span>
                                    </div>
          
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label>Age</label>
                <input type="text" name="age" value="<?php echo $this->input->post('age'); ?>" class="form-control" id="age" placeholder="Age" readonly="true"/>
                <i class="form-group__bar"></i>
            </div>
        </div>
       
        <div class="col-md-9">
            <div class="form-group">
                <label>Last School Name</label>
                <input type="text" name="last_school" value="<?php echo $this->input->post('last_school'); ?>" class="form-control" id="last_school" placeholder="Last School Name"/>
                <i class="form-group__bar"></i>
                <span class="text-danger"><?php echo form_error('last_school'); ?></span>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label>Last Class</label>
                <input type="text" name="last_class" value="<?php echo $this->input->post('last_class'); ?>" class="form-control" id="last_class" placeholder="Last Class"/>
                 <i class="form-group__bar"></i>
                <span class="text-danger"><?php echo form_error('last_class'); ?></span>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label>Medium</label>
                <input type="text" name="last_medium" value="<?php echo $this->input->post('last_medium'); ?>" class="form-control" id="last_medium" placeholder="Last Medium" />
                 <i class="form-group__bar"></i>
                <span class="text-danger"><?php echo form_error('last_medium'); ?></span>
            </div>
        </div>
         <div class="col-md-3">
              <label for="is_last_school_recognize" class="control-label">Is Last School Recognize</label>
                                    <br>
                                    <div class="form-group">
                                        <div class="toggle-switch">
                                            <input type="checkbox" class="toggle-switch__checkbox" name="is_last_school_recognize" value="<?php echo $this->input->post('is_last_school_recognize'); ?>">
                                            <i class="toggle-switch__helper"></i>
                                           
                                        </div>
                                    </div>
                                </div>
        

        <div class="col-md-9">
            <div class="form-group">
                <label>Father's Name</label>
                <input type="text" name="father_name" value="<?php echo $this->input->post('father_name'); ?>" class="form-control" id="father_name" placeholder="Father Name"/>
                <i class="form-group__bar"></i>
                <span class="text-danger"><?php echo form_error('father_name'); ?></span>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label>Post</label>
                <input type="text" name="at_post" value="<?php echo $this->input->post('at_post'); ?>" class="form-control" id="at_post" placeholder="At Post"/>
                <i class="form-group__bar"></i>
                
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label>Tahsil</label>
                <input type="text" name="tahsil" value="<?php echo $this->input->post('tahsil'); ?>" class="form-control" id="tahsil" placeholder="Tahsil" />
                <i class="form-group__bar"></i>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label>District</label>
                <input type="text" name="dist" value="<?php echo $this->input->post('dist'); ?>" class="form-control" id="dist" placeholder="District"/>
                <i class="form-group__bar"></i>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label>Occupation</label>
                <input type="text" name="occupation" value="<?php echo $this->input->post('occupation'); ?>" class="form-control" id="occupation" placeholder="Fathers Occupation" />
                <i class="form-group__bar"></i>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label>Phone Number</label>
                <input type="text" name="ph_no" value="<?php echo $this->input->post('ph_no'); ?>" class="form-control" id="ph_no" placeholder="Phone Number" />
                <i class="form-group__bar"></i>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label>Mobile Number</label>
                <input type="text" name="mobile_no" value="<?php echo $this->input->post('mobile_no'); ?>" class="form-control" id="mobile_no" placeholder="Mobile No"/>
                <i class="form-group__bar"></i>
                <span class="text-danger"><?php echo form_error('mobile_no'); ?></span>
            </div>
        </div>
        <div class="col-md-3">
             <label for="is_last_school_recognize" class="control-label">Parent On Service</label>
                                    <br>
                                    <div class="form-group">
                                        <div class="toggle-switch">
                                            <input type="checkbox" class="toggle-switch__checkbox" name="parent_on_service" value="<?php echo $this->input->post('parent_on_service'); ?>" id="onservice">
                                            <i class="toggle-switch__helper"></i>
                                           
                                        </div>
                                    </div>
            
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <label>Office Address and Phone Number</label>
                <input type="text" name="office_address_phone_no" value="<?php echo $this->input->post('office_address_phone_no'); ?>" class="form-control" id="office_address_phone_no" placeholder="Office Address Phone No" disabled="true" />
                <i class="form-group__bar"></i>
                
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label>Mother's Name</label>
                <input type="text" name="mother_full_name" value="<?php echo $this->input->post('mother_full_name'); ?>" class="form-control" id="mother_full_name" placeholder="Mother Full Name"/>
                <i class="form-group__bar"></i>
                <span class="text-danger"><?php echo form_error('mother_full_name'); ?></span>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label>Annual Income</label>
                <input type="text" name="annual_income" value="<?php echo $this->input->post('annual_income'); ?>" class="form-control" id="annual_income" placeholder="Annual Income" />
                 <i class="form-group__bar"></i>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label>Local Address</label>
                <input type="text" name="local_address" value="<?php echo $this->input->post('local_address'); ?>" class="form-control" id="local_address" placeholder="Local Address"/>
                 <i class="form-group__bar"></i>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label>Relation with local parent</label>
                <input type="text" name="relation_ship_with_parent" value="<?php echo $this->input->post('relation_ship_with_parent'); ?>" class="form-control" id="relation_ship_with_parent" placeholder="Relation Ship With Local Parent"/>
                 <i class="form-group__bar"></i>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label>Academic Year</label>
                <input type="text" name="academic_year" value="<?php echo $this->input->post('academic_year'); ?>" class="form-control" id="academic_year" placeholder="Academic Year" />
                <i class="form-group__bar"></i>
                <span class="text-danger"><?php echo form_error('academic_year'); ?></span>
            </div>
        </div>
        <div class="col-md-4">
            <label>Place Of Birth</label>
            <div class="form-group">
                <input name="place_of_birth" class="form-control" id="place_of_birth" value="<?php echo $this->input->post('place_of_birth'); ?>" placeholder="Place Of Birth">
                 <i class="form-group__bar"></i>
                <span class="text-danger"><?php echo form_error('place_of_birth'); ?></span>
            </div>
        </div>
        <div class="col-md-4">
            <label>Admission Date</label>
            <div class="form-group">
                <input type="text" name="admission_date" class="form-control form_datetime" id="admission_date" value="<?php echo $this->input->post('admission_date'); ?>" placeholder="Date Of Admission">
                 <i class="form-group__bar"></i>
                <span class="text-danger"><?php echo form_error('admission_date'); ?></span>
            </div>
        </div>
        
    </div>

    <div class="box-footer">
        <button type="submit" class="btn btn-success">
            <i class="fa fa-check"></i> Save
        </button>
    </div>        
</div>

<?php echo form_close(); ?>
   
