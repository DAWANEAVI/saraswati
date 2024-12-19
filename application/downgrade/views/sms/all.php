
<?php echo form_open('sms/sendToOne'); ?>
<div class="card-body">
    <h3 class="box-title">Send SMS To All Student</h3>
    <div class="row clearfix">
       <br />
       <br />
        <div class="col-md-12">
            <label for="student_id" class="control-label"><span class="text-danger">*</span>Message</label>
            <div class="form-group">
                <textarea id="sms-text" name="msg" class="form-control" placeholder="Enter Message To Send" maxlength="160"></textarea>
                <span id="count" style="color:#f00">0</span>
                <span class="text-danger"><?php echo form_error('msg'); ?></span>
                
            </div>
        </div>


    </div>
    <div class="box-footer">
        <button id="send_sms_all" type="submit" class="btn btn-success btn-raised">
            <i class="fa fa-check"></i> Send
        </button>

    </div>
</div>

<?php echo form_close(); ?>
