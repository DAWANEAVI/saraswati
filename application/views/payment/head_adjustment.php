<?php 
if($old_heads) {
$attribute = array('class'=>'form','id' =>'inputForm');
echo form_open('payment/head_adjustment_old/'.$student_id, $attribute); ?>
<div class="card-body">
    <h3 class="box-title text-center">Student Name : <?= strtoupper($student_data['fullname']) ?></h3>
    <div class="row clearfix">

        <div class="col-md-12">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Sr No</th>
                        <th>Academic Year</th>
                        <th>Total Fees</th>
                        <th>Paid Fees</th>
                        <th>Remaining Fees</th>
                    </tr>
                </thead>
                <tbody>

                    <tr>
                        <td rowspan="2"><?= 1 ?></td>
                        <td><?= 'Old Fees + Corona Session' ?></td>
                        <td><?= $student_data['old_fees'] ?></td>
                        <td><?= $student_data['paid_fees']?></td>
                        <td><?= $student_data['old_fees'] - $student_data['paid_fees'] ?></td>
                        <input type="hidden" id="old_fees_original" name="old_fees_original" value="<?php echo $student_data['old_fees']; ?>">
                        <input type="hidden" name="paid_fees_original" value="<?php echo $student_data['paid_fees']; ?>">
                    </tr>
                    <tr>
                        
                        <td>Corrections ----- ></td>
                        <td>
                            <input type="number" id="old_fees" name="old_fees" value="<?php echo $student_data['old_fees']; ?>" class="form-control amount"  placeholder="Enter <?= 'old fees' ?> Amount" data-rule-required="true">
                            <span class="text-danger"><?php echo form_error('old_fees'); ?></span></td>
                        <td>
                            <input type="number" id="paid_fees" name="paid_fees" value="<?php echo $student_data['paid_fees']; ?>" class="form-control amount"  placeholder="Enter Paid Fees Amount" data-rule-required="true">
                            <span class="text-danger"><?php echo form_error('paid_fees'); ?></span>
                        </td>
                        <td>
                            <input readonly="true" type="number" id="remaining_fees" name="remaining_fees" value="<?php echo $student_data['old_fees'] - $student_data['paid_fees']; ?>" class="form-control"  placeholder="Enter Remaining Amount" data-rule-required="true">
                            <span class="text-danger"><?php echo form_error('remaining_fees'); ?></span>
                        </td>
                    </tr>


                </tbody>

            </table>
        </div>

    </div>
    <div class="box-footer text-center">

        <button  type="submit"  class="btn btn-success btn-raised"><i class="fa fa-check"></i> Save</button>

    </div>
</div>

<?php echo form_close(); ?>

<?php }else{ ?>
<?php 
$attribute = array('class'=>'form','id' =>'inputFormNew');
echo form_open('payment/head_adjustment/'.$student_id.'/'.$payment_id, $attribute); ?>
<div class="card-body">
    <h3 class="box-title text-center">Fees Head Adjustment </h3>
    <div class="row clearfix">

        <div class="col-md-12">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Sr No</th>
                        <th>Student Name</th>
                        <th>Academic Year</th>
                        <th>Class</th>
                        <th>Total Fees</th>
                        <th>Paid Fees</th>
                        <th>Remaining Fees</th>
                    </tr>
                </thead>
                <tbody>

                    <tr>
                        <td><?= 1 ?></td>
                        <td><?= strtoupper($student_data['fullname']) ?> </td>
                        <td><?= $payment_data->academic_year ?></td>
                        <td><?php echo $this->Clas_model->get_clas_name($payment_data->class_id); ?>
                        <td><?= $payment_data->total_amount ?></td>
                        <td><?= $payment_data->paid_amount?></td>
                        <td><?= $payment_data->total_amount  - $payment_data->paid_amount ?></td>
                    </tr>


                </tbody>

            </table>

            <hr />

            <table class="table" style="overflow: hidden;">
                <thead class="thead-default">
                <th>S.N.</th>
                <th>Heads</th>
                <th>Class Fees</th>
                <th>Student Remaining Amount</th>
                <th>Adjust Remaining Amount</th>
                </thead>
                <tbody>

                    <?php
                    $count = 1;
                    $total = 0;
                    $total_class = 0;
                    foreach ($fees_data as $k => $v) {
                        $total = $total + $v['amount'];
                        ?>
                        <tr>
                            <td><?= $count ?></td>
                            <th><?= $v['fees_for'] ?></th>

                            <td>
                                <span><?php echo $v['amount'] ?>
                                <input id="<?php echo  str_replace(' ', '', $v['fees_for']).'class'; ?>" type="hidden" name="<?php echo str_replace(' ', '', $v['fees_for']).'class'; ?>" value="<?php echo $v['amount'] ?>">
                            </span></td>
                            <th>
                                <?php if ($v['fees_for'] == "Education Fee") {

                                    $x = $payment_data->education_fee;
                                } 
                                if ($v['fees_for'] == "Term Fee") {
                                $x = $payment_data->term_fee;
                                } 
                                if ($v['fees_for'] == "Exam Fee") {
                                    $x = $payment_data->exam_fee;
                                } 
                                if ($v['fees_for'] == "Sport Fee") {
                                    $x = $payment_data->sport_fee;
                                } 
                                if ($v['fees_for'] == "Computer Fee") {
                                    $x = $payment_data->computer_fee;
                                } 
                                ?>
                                <input id="<?php echo  str_replace(' ', '', $v['fees_for']).'r'; ?>" type="text" class="form-control" name="<?php echo str_replace(' ', '', $v['fees_for']).'original'; ?>" value="<?php echo $x; ?>" readonly>
                            </th>
                            <td>
                                <input type="number" id="<?php echo str_replace(' ', '', $v['fees_for']).'changed'; ?>" name="<?php echo str_replace(' ', '', $v['fees_for']).'changed'; ?>" value="<?php echo $this->input->post(str_replace(' ', '', $v['fees_for'])); ?>" class="form-control amount"  placeholder="Enter Adjusted <?= $v['fees_for'] ?>" data-rule-required="true">
                                <span class="text-danger"><?php echo form_error(str_replace(' ', '', $v['fees_for']).'changed'); ?></span>
                            </td>

                        </tr>
                        <?php
                        $total_class = $total_class + $x;
                        $count++;
                    }
                    ?>

                    <tr>
                        <th>#</th>
                        <th>Total</th>
                        <th><?= $total; ?></th>
                        <th><?= $total_class ?></th>
                        <th>
                            <input readonly="true" type="text" name="total" value="0" id="total" class="form-control highcontra">
                            <input type="hidden" name="student_id" value="<?php echo $student_id; ?>">
                            <input type="hidden" name="payment_id" value="<?php echo $payment_id; ?>">
                        </th>
                    <tr>
                        <td></td>
                        <td colspan="3">
                            <label>Remark</label>
                            <div class="form-group">
                                <input class="form-control"type="text" name="remark">
                            </div>
                        </td>
                    </tr>

                </tbody>
            </table>
        </div>




    </div>
    <div class="box-footer text-center">

        <button id="mybtn" type="submit"  class="btn btn-success btn-raised"><i class="fa fa-check"></i>  Save</button>

    </div>
</div>

<?php echo form_close(); ?>
<?php } ?>


<script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>

<?php if($old_heads) { ?>
<script>
    $(".amount").change(function(){
        var old_fees = $("#old_fees").val();
        var paid_fees = $("#paid_fees").val();
        
        // if(old_fees < paid_fees){
        //     var test = 'Enter valid paid amount';
        //     $("#paid_fees").next("span").append(test);
        // }else{
        //     $("#paid_fees").next("span").empty();
        // }

        $("#remaining_fees").val(old_fees - paid_fees);

    });
</script>
<script>
$(document).ready(function() {
  $("#inputForm").validate({
    rules: {
      old_fees: {
        required: true,
        //range: [0, $("#EducationFeer").val()]
      },
      paid_fees: {
        required: true,
        //range: [0, $("#old_fees").val()]
      },
      remaining_fees: {
        required: true,
        //range: [0, $("#old_fees").val()]
      }
    },
    messages: {		
        old_fees: {
            required: "This field is required.",
            //range: "Enter Valid Paying Amount"
        },
        paid_fees: {
            required: "This field is required.",
            range: "Enter Valid Paid Fees"
        },
        remaining_fees: {
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

<?php }else{?>

<script>
$(document).ready(function() {
  $("#inputFormNew").validate({
    rules: {
      EducationFeechanged: {
        required: true,
        range: [0, $("#EducationFeeclass").val()]
      },
      TermFeechanged: {
        required: true,
        range: [0, $("#TermFeeclass").val()]
      },
      ExamFeechanged: {
        required: true,
        range: [0, $("#ExamFeeclass").val()]
      },
      SportFeechanged: {
        required: true,
        range: [0, $("#SportFeeclass").val()]
      },
      ComputerFeechanged: {
        required: true,
        range: [0, $("#ComputerFeeclass").val()]
      }
    },
    messages: {		
        EducationFeechanged: {
            required: "This field is required.",
            range: "Enter Valid Amount"
        },
        TermFeechanged: {
            required: "This field is required.",
            range: "Enter Valid Amount"
        },
        ExamFeechanged: {
            required: "This field is required.",
            range: "Enter Valid Amount"
        },
        SportFeechanged: {
            required: "This field is required.",
            range: "Enter Valid Amount"
        },
        ComputerFeechanged: {
            required: "This field is required.",
            range: "Enter Valid Amount"
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
