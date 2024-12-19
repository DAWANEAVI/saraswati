
<?php echo form_open('payment/add'); ?>
<div class="card-body">
    <h3 class="box-title">Payment Add</h3>
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
            <label for="student_id" class="control-label"><span class="text-danger">*</span>Student</label>
            <div class="form-group">
                <select name="student_id" class="select2" id='student' data-placeholder="Select a Student">
                </select>
                <span class="text-danger"><?php echo form_error('student_id'); ?></span>
            </div>
        </div>
        
        <div class="col-md-6">
            <label for="total_amount" class="control-label"><span class="text-danger">*</span>Total Fees</label>
            <div class="form-group">
                <input type="text" name="total_amount" value="<?php echo $this->input->post('total_amount'); ?>" class="form-control" id="total_amount" readonly="true"/>
                <span class="text-danger"><?php echo form_error('total_amount'); ?></span>
            </div>
        </div>
        <div class="col-md-6">
            <label for="paid_amount" class="control-label"><span class="text-danger">*</span>Remaining Fees</label>
            <div class="form-group">
                <input type="text" name="paid_amount" value="<?php echo $this->input->post('paid_amount'); ?>" class="form-control" id="paid_amount" readonly="true"/>
                <span class="text-danger"><?php echo form_error('paid_amount'); ?></span>
            </div>
        </div>
    </div>
    <div class="box-footer">
      
    </div>
</div>

<?php echo form_close(); ?>
