
<?php echo form_open('fee/add'); ?>
<div class="card-body">
    <h3 class="box-title">Fee Add</h3>
    <div class="row clearfix">
        <div class="col-md-12">
            <div class="form-group">
                <label>select class</label>
                <select name="class_id[]" class="select2" multiple data-placeholder="Select one or more choices">
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
                <input type="text" name="fees_for[]"  class="form-control"  placeholder="Fees For" value="Education Fee" readonly="true" />
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
         <div class="col-md-6">
            <div class="form-group">
                <input type="text" name="fees_for[]"  class="form-control"  placeholder="Fees For" value="Term Fee" readonly="true"/>
                <i class="form-group__bar"></i>
                <span class="text-danger"><?php echo form_error('fees_for'); ?></span>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <input type="text" name="amount[]" value="0" class="form-control"  placeholder="Amount"/>
                 <i class="form-group__bar"></i>
                 
            </div>
        </div>
         <div class="col-md-6">
            <div class="form-group">
                <input type="text" name="fees_for[]"  class="form-control"  placeholder="Fees For" value="Exam Fee" readonly="true"/>
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
        <div class="col-md-6">
            <div class="form-group">
                <input type="text" name="fees_for[]"  class="form-control"  placeholder="Fees For" value="Sport Fee" readonly="true"/>
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
        <div class="col-md-6">
            <div class="form-group">
                <input type="text" name="fees_for[]"  class="form-control"  placeholder="Fees For" value="Miscellaneous Fee" readonly="true"/>
                <i class="form-group__bar"></i>
                <span class="text-danger"><?php echo form_error('fees_for'); ?></span>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <input type="text" name="amount[]" value="0" class="form-control"  placeholder="Amount"/>
                 <i class="form-group__bar"></i>
                 
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
      	