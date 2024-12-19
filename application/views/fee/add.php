
<?php echo form_open('fee/add/'.$academic_year_data['session_id']); ?>
<div class="card-body">
    <h3 class="box-title text-center">Add Fees for Academic Year : <?php echo $academic_year_data['session'];?> </h3>
    <div class="row clearfix">
        <div class="col-md-12">
            <div class="form-group">
                <label>Select Class</label>
                <select name="class_id" class="select2">
                    <option value="">Select Class</option>
                    <?php
                    foreach ($all_class as $clas) {
                        $selected = ($clas['class_id'] == $this->input->post('class_id')) ? ' selected="selected"' : "";

                        echo '<option value="' . $clas['class_id'] . '" ' . $selected . '>' . $clas['class_name'] . '</option>';
                    }
                    ?>
                </select>
              
                <span class="text-danger"><?php echo form_error('class_id'); ?></span>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <input type="text" name="fees_for[]"  class="form-control highcontra" value="Tution Fees" readonly="true" />
                <i class="form-group__bar"></i>
                <span class="text-danger"><?php echo form_error('fees_for'); ?></span>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <input type="text" name="amount[]" value="0" class="form-control"  placeholder="Amount"/>
                 <i class="form-group__bar"></i>
                <span class="text-danger"><?php echo form_error('amount'); ?></span>
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
      	