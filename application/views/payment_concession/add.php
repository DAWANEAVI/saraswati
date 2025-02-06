<?php if($this->input->get('session_id') == NULL && $this->input->get('class_id') == NULL) { ?>
<div class="card-body">
<h3 class="box-title text-center " style="font-size:15px;"><a style="float: left;" href="<?php echo site_url('payment_concession/index'); ?>" class="btn btn-warning btn-raised">Back</a> Add Fee Concession </h3>
    <div class="row clearfix">
      <div class="col-md-12">
        <label for="session_id" class="control-label"> <span class="text-danger">Rules</span></label>
        <div class="form-group text-danger" style="font-size:13px;">
          <ol>
            <li> You can apply fee concession once for a student in the accadamic year.</li>
            <li> Please Check and Verify New Total Fees Amount Before Submit</li>
          </ol>
        </div>
      </div>
      <div class="col-md-4">
          <label for="session" class="control-label">Academic Year <span class="text-danger">*</span></label>
          <div class="form-group">
              <select name="session_id" id="session_id" class="select2" data-placeholder="Select Acadamic Session">
                  <?php
                  foreach ($all_sessions as $session) {
                      if($this->input->get('session_id') != null){ $selected = ($session['session_id'] == $this->input->get('session_id')) ? ' selected="selected"' : "";}else{ $selected = $session['is_running'] == 1 ? ' selected="selected"' : ""; } 
                      if($session['status'] == 1){
                          echo '<option value="' . $session['session_id'] . '" ' . $selected . '>' . $session['session'] . '</option>';
                      }
                      
                  }
                  ?>
              </select>
              <span class="text-danger"><?php echo form_error('session'); ?></span>
          </div>
      </div>
      <div class="col-md-4">
          <label for="class_id" class="control-label">   Class <span class="text-danger">*</span></label>
          <div class="form-group">
              <select required="" onchange="studentSelect(8)" id="class_id" name="class_id" class="form-control select2"> 
                  <option value="">Select Class</option>
                  <?php
                      foreach($all_class as   $class)
                      {
                          $selected = ($class['class_id'] == $this->input->get('class_id')) ? ' selected="selected"' : ""; 
                              echo '<option value="'.$class['class_id'].'" '.$selected.'>'.$class['numeric_name'].'</option>'; 
                      } 
                  ?>
              </select>
              <span class="text-danger"><?php echo form_error('class_id');?></span>
          </div>
      </div>
      <div class="col-md-4">
        <label for="student_id" class="control-label">Student <span class="text-danger">*</span></label>
        <div class="form-group">
            <select name="student_id" id="student_id" class="select2" data-placeholder="Select Student">
              <option value="">Select Student</option>
            </select>
            <span class="text-danger"><?php echo form_error('student_id'); ?></span>
        </div>
      </div>

    </div>
</div>

<?php }else{ 
$attribute = array('class'=>'form','id' =>'inputForm');
echo form_open('payment_concession/add?session_id='.$this->input->get('session_id').'&class_id='.$this->input->get('class_id').'&student_id='.$this->input->get('student_id'), $attribute); ?>
<div class="card-body">
  <h3 class="box-title text-center " style="font-size:18px;"><a style="float: left;" href="<?php echo site_url('payment_concession/add'); ?>" class="btn btn-warning btn-raised">Back</a> Add Fee Concession </h3>
  <div class="row clearfix">
    <div class="col-md-12">
      <label for="session_id" class="control-label"> <span class="text-danger">Rules</span></label>
      <div class="form-group text-danger" style="font-size:13px;">
        <ol>
          <li> You can apply fee concession once for a student in the accadamic year.</li>
          <li> Please Check and Verify New Total Fees Amount Before Submit</li>
        </ol>
      </div>
    </div>
    <div class="col-md-4">
      <label for="session_id" class="control-label"> Academic Year <span class="text-danger">*</span></label>
      <div class="form-group">
        <input type="text" required="" readonly="" name="session" value="<?php echo $academic_session['session']; ?>" class="form-control " id="session" />
        <input type="hidden" required="" name="session_id" value="<?php echo $academic_session['session_id']; ?>" id="session_id" />
          <span class="text-danger"><?php echo form_error('session_id');?></span>
      </div>
    </div>
    <div class="col-md-4">
      <label for="class_id" class="control-label"> Class <span class="text-danger">*</span></label>
      <div class="form-group">
        <input type="text" readonly="" name="class_name" value="<?php echo $clas['class_name']; ?>" class="form-control " id="class_name" />
        <input type="hidden" required="" name="class_id" value="<?php echo $clas['class_id']; ?>" id="class_id" />
          <span class="text-danger"><?php echo form_error('class_id');?></span>
      </div>
    </div>
    <?php if($this->input->get('student_id')== NULL) {?>
    <div class="col-md-4">
        <label for="student_id" class="control-label">Student <span class="text-danger">*</span></label>
        <div class="form-group">
            <select name="student_id" onchange="studentSelect(5)" id="student_id" class="select2" data-placeholder="Select Student">
              <option value="">Select Student</option>
              <?php
              foreach ($students as $student) { 
                echo '<option value="' . $student['student_id'] . '">' . $student['fullname'] . '</option>';
              }
              ?>
            </select>
            <span class="text-danger"><?php echo form_error('student_id'); ?></span>
        </div>
    </div>
    <?php }else{ ?>
    <div class="col-md-4">
      <label for="student_id" class="control-label"> <span class="text-danger"></span>Student</label>
      <div class="form-group">
        <input type="text" readonly="" name="student_name" value="<?php echo $students['fullname']; ?>" class="form-control " id="student_name" />
        <input type="hidden" name="student_id" value="<?php echo $students['student_id']; ?>"  id="student_id" />
          <span class="text-danger"><?php echo form_error('student_id');?></span>
      </div>
    </div>
    <div class="col-md-3">
      <label for="class_fee" class="control-label"> <span class="text-danger"></span>Class Fees</label>
      <div class="form-group">
        <input type="text" readonly="" name="class_fee" value="<?php echo '0'; ?>" class="form-control " id="class_fee" />
        <span class="text-danger"><?php echo form_error('class_fee');?></span>
      </div>
    </div>
    <div class="col-md-3">
      <label for="student_total" class="control-label"> <span class="text-danger"></span>Student Total Fees</label>
      <div class="form-group">
        <input type="text" readonly="" name="student_total" value="<?php echo $students['total_amount']; ?>" class="form-control " id="student_total" />
        <span class="text-danger"><?php echo form_error('student_total');?></span>
      </div>
    </div>
    <div class="col-md-3">
      <label for="student_total" class="control-label"> <span class="text-danger"></span>Paid Amount</label>
      <div class="form-group">
        <input type="text" readonly="" name="paid_amount" value="<?php echo $students['paid_amount']?>" class="form-control " id="paid_amount" />
        <span class="text-danger"><?php echo form_error('paid_amount');?></span>
      </div>
    </div>
    <div class="col-md-3">
      <label for="remaining_fee" class="control-label"> <span class="text-danger"></span>Remaining Amount</label>
      <div class="form-group">
        <input type="number" readonly="" name="remaining_fee" value="<?php echo  $students['total_amount'] - $students['paid_amount']; ?>" class="form-control " id="remaining_fee" />
        <span class="text-danger"><?php echo form_error('late_fee');?></span>
      </div>
    </div>
    <div class="col-md-6">
      <label for="amount" class="control-label"> <span class="text-danger"></span>Concession Amount </label>
      <div class="form-group">
        <input type="number" required="" name="amount" value="0" class="form-control concession" id="amount" />
        <span class="text-danger"><?php echo form_error('initalFee');?></span>
      </div>
    </div>
    <div class="col-md-6">
      <label for="new_total" class="control-label"> <span class="text-danger"></span>New Total</label>
      <div class="form-group">
        <input type="text" readonly="" name="new_total" value="0" class="form-control " id="new_total" />
        <span class="text-danger"><?php echo form_error('new_total');?></span>
      </div>
    </div>
    <div class="col-md-12">     
      <div class="form-group text-center">
          <input type="hidden" name="payment_id" value="<?php echo $students['payment_id']?>" />
          <!-- <input type="hidden" name="paid_amount" value="<?php echo $students['paid_amount']?>"/> -->
          <input type="hidden" name="payment_seq" value="<?php echo $students['payment_seq']?>"/>
          <button type="submit" class="btn btn-success"><i class="fa fa-check"></i> Save</button> 
      </div>
    </div>
    <?php } ?>
  </div>
</div>
<?php echo form_close(); ?>

<script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>

<script>
$(document).ready(function() {
  $("#inputForm").validate({
    rules: {
      amount: {
        required: true,
        range: [1, $("#remaining_fee").val()]
      },
      session_id: {
        required: true,
      },
      class_id: {
        required: true,
      },
      student_id: {
        required: true,
      },
      class_fee: {
        required: true,
      },
      student_total: {
        required: true,
      },
      remaining_fee: {
        required: true,
      },
      new_total: {
        required: true,
      }
    },
    messages: {		
      amount: {
            required: "This field is required.",
            range: "Concession Amount should be 0 to "+$("#remaining_fee").val()
        },
      session_id: {
        required: "Session ID  field is required.",
      },
      class_id: {
        required: "Class ID field is required.",
      },
      student_id: {
        required: "Student ID field is required.",
      },
      class_fee: {
        required: "Class Fee field is required.",
      },
      student_total: {
        required: "Student Total field is required.",
      },
      remaining_fee: {
        required: "Remaining Fee Amount  field is required.",
      },
      new_total: {
        required: "New Total field is required.",
      }
	  },
    highlight: function (element, errorClass, validClass) {
      $(element).addClass('has-error');
      //$( element ).next( "span" ).html(error);
    },
    unhighlight: function (element, errorClass, validClass) {
      $(element).removeClass('has-error');
    },
    errorPlacement: function(error,element) {
      error.appendTo( element.next("span") );
    },
    submitHandler: function(form) {
      //$('#loading').css('visibility', 'visible');
      form.submit();
    }
  });
});
</script>

<?php } ?>