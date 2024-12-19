<?php echo form_open(site_url('report/getStudentInfoReport'))?>
<div class="card-body">
    <h3 class="box-title">Student Information Report</h3><br>
    <div class="row clearfix">
    <div class="col-md-4">
            <label for="class" class="control-label"><span class="text-danger">*</span>Class</label>
            <div class="form-group">
                <select required="" name="class" class="select2" id='class' data-placeholder="Select a Class">
                    <option value="">select Class</option>
                    <?php
                    foreach ($all_class as $clas) {
                        $selected = ($clas['class_id'] == $this->input->post('class_id')) ? ' selected="selected"' : "";

                        echo '<option value="' . $clas['class_id'] . '" ' . $selected . '>' . $clas['numeric_name'] . '</option>';
                    }
                    ?>
                </select>
                <span class="text-danger"><?php echo form_error('class'); ?></span>
            </div>
        </div>
        <div class="col-md-4">
            <label for="section" class="control-label"><span class="text-danger">*</span>Section</label>
            <div class="form-group">
                <select required="" name="section" class="select2" id='section' data-placeholder="Select a Section">
                   
                </select>
                <span class="text-danger"><?php echo form_error('section'); ?></span>
            </div>
        </div>
         <div class="col-md-4">
            <label for="section" class="control-label"><span class="text-danger">*</span>Academic Year</label>
            <div class="form-group">
                <select required="" name="academic_year" class="select2" data-placeholder="Select Acadamic Session">
                    <?php
                    foreach ($all_sessions as $session) {
                        $selected = ($session['session_id'] == $this->input->post('academic_year')) ? ' selected="selected"' : "";
                        if($session['status'] == 1){
                            echo '<option value="' . $session['session'] . '" ' . $selected . '>' . $session['session'] . '</option>';
                        }
                        
                    }
                    ?>
                </select>
                <span class="text-danger"><?php echo form_error('academic_year'); ?></span>
            </div>
        </div>
        <br>
        <?php 
        $fields = array(
        'registration_no' =>'GR NO',
        'aadhar_no' => 'Aadhar No',
        'saral_id' => 'Saral ID',
        'register_date' => 'Admission Date',
        'rte_applicable' => 'RTE Applicable',
        'gender' => 'Gender',
        'mobile_no' => 'Mobile No',
        'mother_full_name' =>'Mother Name',
        'father_name' => 'Father Name',
        'religion' => 'Religion',
        'nationality'=>'Nationality',
        'mother_tounge' => 'Mother Tounge',
        'caste' => 'Caste',
        'category' => 'Category',
        'dob'=> 'Date of Birth',
        'place_of_birth' => 'Place of Birth',
        'last_school' => 'Last School Name',
        'is_last_school_recognize' => 'Last School Recognize',
        'medium' => 'Medium',
        'address' => 'Address',
        'occupation' => 'Father Occupation',
        ); 
        ?>
        <div class="col-md-3">
            <div class="form-group">
                <input id="check_all_field" style="width: 20px; height: 20px; float:left;" type="checkbox">
                <label style="font-weight: bold; color: red;" class="control-label ml-2">Check All Field</label>
            </div>
        </div>
        <?php foreach ($fields as $key => $value) { ?>
            <div class="col-md-3">
                <div class="form-group">
                    <input class="field" style="width: 20px; height: 20px; float:left;" type="checkbox" name="fields[]" value="<?php echo $key ;?>">
                    <label style="font-weight: bold; color: black;" class="control-label ml-2"><?php echo $value ;?></label>
                </div>
            </div>
        <?php } ?>
        
    <div class="col-md-12 text-center">
        <button style="margin-top:20px;" class="btn btn-success btn-raised">Get Report</button>
    </div>
    </div>
    
   
    
    

</div>
<?php echo form_close()?>