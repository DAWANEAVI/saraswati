
<?php echo form_open('sms/sendToOne'); ?>
<div class="card-body">
    <h3 class="box-title">Send SMS</h3>
    <div class="row clearfix">
        <div class="col-md-12">
            <label for="class" class="control-label"><span class="text-danger">*</span>Class</label>
            <div class="form-group">
                <select name="class" class="select2" id="bulk_class" data-placeholder="Select a Class">
                    <option value="">select student</option>
                    <?php
                    foreach ($all_class as $clas) {
                        $selected = ($clas['class_id'] == $this->input->post('class_id')) ? ' selected="selected"' : "";

                        echo '<option value="' . $clas['class_id'] . '" ' . $selected . '>' . $clas['numeric_name'] . '</option>';
                    }
                    ?>
                </select>
            </div>
        </div>
            <div class="col-md-8 offset-md-2">
            <table class="table table-responsive table-bordered">
                <thead>
                    <tr>
                        <th>
                            <input type="checkbox" id="check_all">
                            Select All
                        </th>
                        <th style="width:80%" class="text-center">Student Name</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>   
            </table>
            </div>
        <div class="col-md-12">
            <label for="student_id" class="control-label"><span class="text-danger">*</span>Message</label>
            <div class="form-group">
                <textarea id="sms-text" name="msg" class="form-control" placeholder="Enter Message To Send"></textarea>
                 <span id="count" style="color:#f00">0</span>
                <span class="text-danger"><?php echo form_error('msg'); ?></span>
            </div>
        </div>


    </div>
    <div class="box-footer">
        <button id="send_sms_bulk" type="submit" class="btn btn-success btn-raised">
            <i class="fa fa-check"></i> Send
        </button>

    </div>
</div>

<?php echo form_close(); ?>
