<?php 
$attribute = array('class'=>'form','id' =>'inputFormNew');
echo form_open('payment/head_adjustment/'.$student_id.'/'.$payment_id, $attribute); ?>
<div class="card-body">
    <h3 class="box-title text-center">Fee Concession </h3>
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
                <th>Student Total Amount</th>
                <th>Student Remaining Amount</th>
                </thead>
                <tbody>

                    <?php
                    $count = 1;
                    $total = 0;
                    $total_class = 0;
                    $total_student = 0;
                    foreach ($fees_data as $k => $v) {
                        $total = $total + $v['amount'];
                        ?>
                        <tr>
                            <td><?= $count ?></td>
                            <th><?= $v['fees_for'] ?></th>

                            <td>
                                <input id="<?php echo  str_replace(' ', '', $v['fees_for']).'class'; ?>" type="number" class="form-control" name="<?php echo str_replace(' ', '', $v['fees_for']).'class'; ?>" value="<?php echo $v['amount'] ?>" readonly="">
                                <span class="text-danger"><?php echo form_error(str_replace(' ', '', $v['fees_for']).'class'); ?></span>
                            </span></td>
                            <th>
                                <?php 
                                switch ($v['fees_for']) {
                                    case 'Tuition Fees':
                                        $x = $payment_data->total_amount;
                                        $y = $payment_data->total_amount;
                                        break;
                                    
                                    default:
                                        # code...
                                        break;
                                }

                                ?>
                                <input id="<?php echo  str_replace(' ', '', $v['fees_for']).'CT'; ?>" type="text" class="form-control total_amount" name="<?php echo str_replace(' ', '', $v['fees_for']).'CT'; ?>" value="<?php echo $y; ?>" required="">
                                <span class="text-danger"><?php echo form_error(str_replace(' ', '', $v['fees_for']).'CT'); ?></span>
                                
                            </th>
                            <td>
                                <input type="text" id="<?php echo str_replace(' ', '', $v['fees_for']).'CR'; ?>" name="<?php echo str_replace(' ', '', $v['fees_for']).'CR'; ?>" value="<?php echo $payment_data->total_amount  - $payment_data->paid_amount; ?>" class="form-control amount"  data-rule-required="true">

                                <span class="text-danger"><?php echo form_error(str_replace(' ', '', $v['fees_for']).'CR'); ?></span>
                            </td>
                            <input type="hidden" name="<?php echo str_replace(' ', '', $v['fees_for']).'OT'; ?>"value="<?php echo $x; ?>">
                            <input type="hidden" name="<?php echo str_replace(' ', '', $v['fees_for']).'OR'; ?>" value="<?php echo $x; ?>">

                        </tr>
                        <?php
                        $total_class = $total_class + $x;
                        $total_student = $total_student + $y;
                        $count++;
                    }
                    ?>

                    <tr>
                        <th>#</th>
                        <th>Total</th>
                        <th><?= $total; ?></th>
                        <th><input readonly="true" type="text" name="total_total" value="<?= $total_student ?>" id="total_total" class="form-control highcontra"></th>
                        <th>
                            <input readonly="true" type="text" name="total_remaining" value="<?= $payment_data->total_amount  - $payment_data->paid_amount ?>" id="total" class="form-control highcontra">
                            <input type="hidden" name="student_id" value="<?php echo $student_id; ?>">
                            <input type="hidden" name="payment_id" value="<?php echo $payment_id; ?>">
                            <input type="hidden" name="session_id" value="<?php echo $payment_data->session_id; ?>">
                            <input type="hidden" name="class_id" value="<?php echo $payment_data->class_id; ?>">
                        </th>
                    <!-- <tr>
                        <td></td>
                        <td colspan="3">
                            <label>Remark</label>
                            <div class="form-group">
                                <input class="form-control"  type="text" name="remark">
                            </div>
                        </td>
                    </tr> -->

                </tbody>
            </table>
        </div>




    </div>
    <div class="box-footer text-center">

        <button id="mybtn" type="submit"  class="btn btn-success btn-raised"><i class="fa fa-check"></i>  Save</button>

    </div>
</div>

<?php echo form_close(); ?>


<script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
<script>
$(document).ready(function() {
    $(".total_amount").on('change', function () {
        var element = $(".total_amount");
        var total = 0
        $.each(element, function (index, item) {
            total = total + parseInt($(item).val() || 0);
        });
        $("#total_total").val(total)
    });


    $("#inputFormNew").validate({
    rules: {
      TuitionFeesCT: {
        required: true,
        number: true,
        range: [0, $("#TuitionFeesclass").val()]
      },
      TuitionFeesCR: {
        required: true,
        number: true,
        //range: [0, $("#TuitionFeesCT").val()]
      }
    },
    messages: {		
        TuitionFeesCT: {
            required: "This field is required.",
            range: "Enter Valid Amount",
            number: "Enter Only Numbers",
        },
        TuitionFeesCR: {
            required: "This field is required.",
            range: "Enter Valid Amount",
            number: "Enter Only Numbers",
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