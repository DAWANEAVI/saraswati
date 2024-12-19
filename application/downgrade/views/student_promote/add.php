
<?php echo form_open('student_promote/add'); ?>
<div class="card-body">
    <h3>Promote Student</h3>
    <div class="row clearfix">
        <div class="col-md-6">
            <label for="class" class="control-label"><span class="text-danger">*</span>Class</label>
            <div class="form-group">
                <select name="class" class="select2" id='class_p' data-placeholder="Select a Class">
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
        <div class="col-md-6">
            <label for="section" class="control-label"><span class="text-danger">*</span>Section</label>
            <div class="form-group">
                <select name="section" class="select2" id='section_p' data-placeholder="Select a Section">

                </select>
                <span class="text-danger"><?php echo form_error('section'); ?></span>
            </div>
        </div>
     
         <div class="col-md-6">
            <label for="class_new" class="control-label"><span class="text-danger">*</span>Promote To Class</label>
            
            <div class="form-group">
                <select name="class_new" class="select2" id='class_new' data-placeholder="Select a Class">
                    <option value="">select student</option>
                    <?php
                    foreach ($all_class as $clas) {
                        $selected = ($clas['class_id'] == $this->input->post('class_id')) ? ' selected="selected"' : "";

                        echo '<option value="' . $clas['class_id'] . '" ' . $selected . '>' . $clas['numeric_name'] . '</option>';
                    }
                    ?>
                </select>
                <span class="text-danger"><?php echo form_error('class_new'); ?></span>
            </div>
        </div>
        <div class="col-md-6">
            <label for="section_new" class="control-label"><span class="text-danger">*</span>Promote To Section</label>
            <div class="form-group">
                <select name="section_new" class="select2" id='section_new' data-placeholder="Select a Section">

                </select>
                <span class="text-danger"><?php echo form_error('section_new'); ?></span>
            </div>
        </div>
        <div class="col-md-12 text-right">
        <input type="checkbox" id="check_all_student">
                            Select All To Promote
        <br />
        <br />
        </div>
         <table id="table-student"  class="table table-bordered">
                    <thead class='thead-default'>
                    <tr>
						<th>Sr No</th>
						<th>Student</th>
						<th>Mobile No</th>
						<th>Actions</th>
                    </tr>
                    </thead>
                   
                    <tbody>
                  
                    </tbody>
                </table>
        <div class="box-footer">
            <button type="submit" class="btn btn-success btn-raised">
                <i class="fa fa-check"></i> Save
            </button>
        </div>

    </div>
</div>

<?php echo form_close(); ?>
      	