
<?php echo form_open('attendance_student/add'); ?>
<div class="card-body">
    <h3 class="text-center">Add Students Attendance</h3>
    <div class="row clearfix">
        <div class="col-md-3">
            <label for="acadamic_session" class="control-label"><span class="text-danger">*</span>Acadamic Session</label>
            <div class="form-group">
                <select name="acadamic_session" id="acadamic_session_a" class="select2" data-placeholder="Select Acadamic Session">
                    <?php
                    foreach ($all_sessions as $session) {
                        $selected = ($session['session_id'] == $this->input->post('acadamic_session')) ? ' selected="selected"' : "";
                        if($session['status'] == 1){
                            echo '<option value="' . $session['session_id'] . '" ' . $selected . '>' . $session['session'] . '</option>';
                        }
                        
                    }
                    ?>
                </select>
                <span class="text-danger"><?php echo form_error('acadamic_session'); ?></span>
            </div>
        </div>
        <div class="col-md-3">
            <label for="class" class="control-label"><span class="text-danger">*</span>Class</label>
            <div class="form-group">
                <select name="class" class="select2" id='class_a' data-placeholder="Select a Class">
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
        <div class="col-md-3">
            <label for="section" class="control-label"><span class="text-danger">*</span>Section</label>
            <div class="form-group">
                <select name="section" class="select2" id='section_a' data-placeholder="Select a Section">

                </select>
                <span class="text-danger"><?php echo form_error('section'); ?></span>
            </div>
        </div>

        <div class="col-md-3">
            <label for="section" class="control-label"><span class="text-danger">*</span>Date</label>
            <div class="form-group">
                <input type="date" name="date"  class="form-control" placeholder="DD-MM-YYYY" id="date_a" required="">
                <i class="form-group__bar"></i>
                <span class="text-danger"><?php echo form_error('date'); ?></span>
            </div>
        </div>
            

        <div class="col-md-12 text-right">
        <!--<input type="checkbox" id="check_all_student">-->
        Select All
        <br />
        <br />
        </div>
         <table id=""  class="table table-bordered">
            <thead class='thead-default'>
            <tr>
                <th>Sr No</th>
                <th>Student</th>
                <th>Actions</th>
            </tr>
            </thead>
            
            <tbody>
            
            </tbody>
        </table>
        <div class="box-footer text-center">
            <button type="submit" class="btn btn-success text-center btn-raised">
                <i class="fa fa-check text-center"></i> Save
            </button>
        </div>

    </div>
</div>

<?php echo form_close(); ?>
      	