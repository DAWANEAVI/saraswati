
<?php echo form_open('sms/sendBulk',array('class'=>'form','id' =>'inputForm')); ?>
<div class="card-body">
    <h3 class="box-title">Send SMS</h3>
    <div class="row clearfix">
        <input type="hidden" id="redirectTo" name="redirectTo" value="sendBulk">
        <div class="col-md-6">
            <label for="class" class="control-label"><span class="text-danger">*</span>Select Template</label>
            <div class="form-group">
                <select name="template_id" class="select2" id='template_id' onchange="studentSelect(7)"data-placeholder="Select a Template">
                    <option value="">Select Template</option>
                    <?php
                    foreach ($all_templates as $template) {
                        $selected = ($template['dltTemplateID'] == $this->input->post('template_id')) ? ' selected="selected"' : "";
                        $selected = ($template['dltTemplateID'] == $this->input->get('template_id')) ? ' selected="selected"' : "";

                        echo '<option value="'. $template['dltTemplateID'].'" ' . $selected . '>' .$template['templateName']. '</option>';
                    }
                    ?>
                    <!-- <option value="1207162244592146254">Online Class</option>
                    <option value="1207162244584844133">Fees Reminder</option>
                    <option value="1207162244579223311">Meeting SMS</option>
                    <option value="1207162244565442941">Holiday SMS</option> -->
                       
                </select>
                <span class="text-danger"><?php echo form_error('template_id'); ?></span>
            </div>
        </div>
        <div class="col-md-6">
            <label for="class" class="control-label"><span class="text-danger">*</span>Class</label>
            <div class="form-group">
                <select name="class_id" class="select2" id='bulk_class' data-placeholder="Select a Class">
                    <option value="">select class</option>
                    <?php
                    foreach ($all_class as $clas) {
                        $selected = ($clas['class_id'] == $this->input->post('class_id')) ? ' selected="selected"' : "";

                        echo '<option value="' . $clas['class_id'] . '" ' . $selected . '>' . $clas['numeric_name'] . '</option>';
                    }
                    ?>
                </select>
                <span class="text-danger"><?php echo form_error('class_id'); ?></span>
            </div>
        </div>

        <div class="col-md-12 pb-3">
            <label for="student_id" class="control-label"><span class="text-danger">Variable Value Description :</span></label><br>
            <span style="color:green;"><?php echo isset($description) ? $description:'';?></span>
            <br>
        </div>
        
        <div class="col-md-12">
             <label for="message" class="control-label"><span class="text-danger">*</span>Message</label>
             <?php $k=-1; foreach ($content_array as $key => $value) { ?>
                
                 
                 <div class="form-group" style="margin-bottom: 0rem;">
                  <input <?php if($key==0){echo 'type="hidden"';}else{echo 'type="text"';} ?> required="true" name="message[<?php $k++; echo $k;?>]" class="form-control" value="" placeholder="Variable Value" maxlength="30">
                  <span class="text-danger"><?php echo form_error('message[]'); ?></span>
                  </div>
                
                 <div class="form-group" style="margin-bottom: 0rem;">
                    <input readonly="" required="true" style="color:black; opacity: 1; border:1px solid #ffffff;" type="text" name="message[<?php $k++; echo $k;?>]" class="form-control" value="<?php echo $value; ?>">
                    <span class="text-danger"><?php echo form_error('message[]'); ?></span>
                </div>
                    
                
             
             <?php  }?>
             
        </div>

        <div class="col-md-12 offset-md-12">
            <table  class="table  table-bordered">
                <thead>
                    <tr>
                        <th>
                            <input type="checkbox" id="check_all">
                            Select All
                        </th>
                        <th style="width:50%" class="text-center">Student Name</th>
                        <th style="width:30%" class="text-center">Mobile No</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>   
            </table>
        </div>
        

    </div>
    <div class="box-footer text-center">
        <button type="submit" class="btn btn-success btn-raised">
            <i class="fa fa-check"></i> Send
        </button>

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
      template_id: {
        required: true,
        //range: [0, $("#EducationFeer").val()]
      },
      class_id: {
        required: true,
      },
      section_id: {
        required: true,
      },
      'message[]':{
        required: true,
        //range: [0, 160]
      }
    },
    messages: {		
        template_id: {
            required: "This field is required.",
            //range: "Enter Valid Paying Amount"
        },
        class_id: {
            required: "This field is required.",
            range: "Enter Valid Paid Fees"
        },
        section_id: {
            required: "This field is required.",
            range: "Enter Valid Remaining Fees"
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

