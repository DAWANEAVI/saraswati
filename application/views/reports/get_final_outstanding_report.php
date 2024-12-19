<?php echo form_open(site_url('report/getalloutstandingfees'))?>
<div class="card-body">
    <h3 class="box-title">Outstanding Payment Report All A.Y Combined</h3>
    <div class="row clearfix">
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
        <button style="margin-top:20px;" id="stud-report" class="btn btn-success btn-raised">Get Report</button>
    </div>
    </div>
    
   
    
    

</div>
<?php echo form_close()?>