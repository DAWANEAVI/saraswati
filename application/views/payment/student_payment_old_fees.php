<?php 
$attribute = array('class'=>'form','id' =>'inputForm');
echo form_open('payment/make_payment_old/'.$student_id, $attribute); ?>
<div class="card-body">
    <h3 class="box-title text-center">Payment For :<?= strtoupper($student_data['fullname']) ?></h3>
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
                        <td><?= 1 ?></td>
                        <td><?= 'Old Fees + Corona Session' ?></td>
                        <td><?= $student_data['old_fees'] ?></td>
                        <td><?= $student_data['paid_fees']?></td>
                        <td><?= $student_data['old_fees'] - $student_data['paid_fees'] ?></td>
                    </tr>


                </tbody>

            </table>

            <hr />

            <table class="table" style="overflow: hidden;">
                <thead class="thead-default">
                <th>S.N.</th>
                <th>PARTICULARS</th>
                <th>Paying Amount</th>
                </thead>
                <tbody>

                    <?php
                    $count = 1;
                    //$total = 0;
                    $fees_data = [
                      'Education Fee'  => 'Education Fee',
                      'Term Fee' => 'Term Fee',
                      'Exam Fee' => 'Exam Fee',
                      'Sport Fee' => 'Sport Fee',
                      'Computer Fee' => 'Computer Fee',
                    ];
                    foreach ($fees_data as $k => $v) {
                        // $total = $total + $v['amount'];
                        ?>
                        <tr>
                            <td><?= $count ?></td>
                            <th><?= $v ?></th>
                            <td>
                                <input type="number" id="<?php echo str_replace(' ', '', $v); ?>" name="<?php echo str_replace(' ', '', $v); ?>" value="<?php echo $this->input->post(str_replace(' ', '', $v)); ?>" class="form-control amount"  placeholder="Enter <?= $v ?> Amount" data-rule-required="true">
                                <span class="text-danger"><?php echo form_error(str_replace(' ', '', $v)); ?></span>
                            </td>

                        </tr>
                        <?php
                        $count++;
                    }
                    ?>

                    <tr>
                        <td></td>
                        <th>Total Fee</th>
                        <td>
                            <input readonly="true" type="text" name="total" value="0" id="total" class="form-control">
                            <input type="hidden" name="session_id" value="<?php echo $current_session_data['session_id'];?>">
                            <input type="hidden" name="student_id" value="<?php echo $student_id; ?>">
                            <input type="hidden" name="total_old_fees" value="<?php echo $student_data['old_fees']; ?>">
                            <input type="hidden" name="remaining_fees" value="<?= $student_data['old_fees'] - $student_data['paid_fees'] ?>">
                        </td>
                    </tr>

                    <tr>
                        <td></td>
                        <th>For Month</th>
                        <td>
                            <select class="form-control select2" name="from_month">
                                <option value="">Select Month</option>
                                <option value="<?php echo date("m", strtotime("-1 Months", strtotime(date('01-m-Y')))) ?>"><?php echo date("F", strtotime("-1 Months", strtotime(date('01-m-Y')))) ?></option>
                                <option value="<?php echo date("m", strtotime("-2 Months", strtotime(date('01-m-Y')))) ?>"><?php echo date("F", strtotime("-2 Months", strtotime(date('01-m-Y')))) ?></option>
                                <option value="<?php echo date("m", strtotime("-3 Months", strtotime(date('01-m-Y')))) ?>"><?php echo date("F", strtotime("-3 Months", strtotime(date('01-m-Y')))) ?></option>
                                <option value="<?php echo date("m", strtotime("-4 Months", strtotime(date('01-m-Y')))) ?>"><?php echo date("F", strtotime("-4 Months", strtotime(date('01-m-Y')))) ?></option>
                                <option value="<?php echo date("m", strtotime("-5 Months", strtotime(date('01-m-Y')))) ?>"><?php echo date("F", strtotime("-5 Months", strtotime(date('01-m-Y')))) ?></option>
                                <option value="<?php echo date("m", strtotime("-6 Months", strtotime(date('01-m-Y')))) ?>"><?php echo date("F", strtotime("-6 Months", strtotime(date('01-m-Y')))) ?></option>
                                <option value="<?php echo date("m", strtotime("-7 Months", strtotime(date('01-m-Y')))) ?>"><?php echo date("F", strtotime("-7 Months", strtotime(date('01-m-Y')))) ?></option>
                                <option value="<?php echo date("m", strtotime("-8 Months", strtotime(date('01-m-Y')))) ?>"><?php echo date("F", strtotime("-8 Months", strtotime(date('01-m-Y')))) ?></option>
                                <option value="<?php echo date("m", strtotime("-9 Months", strtotime(date('01-m-Y')))) ?>"><?php echo date("F", strtotime("-9 Months", strtotime(date('01-m-Y')))) ?> </option>
                                <option value="<?php echo date("m", strtotime("-10 Months", strtotime(date('01-m-Y')))) ?>"><?php echo date("F", strtotime("-10 Months", strtotime(date('01-m-Y')))) ?> </option>
                                <option value="<?php echo date("m", strtotime("-11 Months", strtotime(date('01-m-Y')))) ?>"><?php echo date("F", strtotime("-11 Months", strtotime(date('01-m-Y')))) ?> </option>
                                <option value="<?php echo date("m", strtotime("-12 Months", strtotime(date('01-m-Y')))) ?>"><?php echo date("F", strtotime("-12 Months", strtotime(date('01-m-Y')))); ?> </option>
                            </select>
                            <span class="text-danger"><?php echo form_error('month'); ?></span>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <th>To Month</th>
                        <td>
                            <select class="form-control select2" name="to_month">
                                <option value="">Select Month</option>
                                <option value="<?php echo date("m", strtotime("-1 Months", strtotime(date('01-m-Y')))) ?>"><?php echo date("F", strtotime("-1 Months", strtotime(date('01-m-Y')))) ?></option>
                                <option value="<?php echo date("m", strtotime("-2 Months", strtotime(date('01-m-Y')))) ?>"><?php echo date("F", strtotime("-2 Months", strtotime(date('01-m-Y')))) ?></option>
                                <option value="<?php echo date("m", strtotime("-3 Months", strtotime(date('01-m-Y')))) ?>"><?php echo date("F", strtotime("-3 Months", strtotime(date('01-m-Y')))) ?></option>
                                <option value="<?php echo date("m", strtotime("-4 Months", strtotime(date('01-m-Y')))) ?>"><?php echo date("F", strtotime("-4 Months", strtotime(date('01-m-Y')))) ?></option>
                                <option value="<?php echo date("m", strtotime("-5 Months", strtotime(date('01-m-Y')))) ?>"><?php echo date("F", strtotime("-5 Months", strtotime(date('01-m-Y')))) ?></option>
                                <option value="<?php echo date("m", strtotime("-6 Months", strtotime(date('01-m-Y')))) ?>"><?php echo date("F", strtotime("-6 Months", strtotime(date('01-m-Y')))) ?></option>
                                <option value="<?php echo date("m", strtotime("-7 Months", strtotime(date('01-m-Y')))) ?>"><?php echo date("F", strtotime("-7 Months", strtotime(date('01-m-Y')))) ?></option>
                                <option value="<?php echo date("m", strtotime("-8 Months", strtotime(date('01-m-Y')))) ?>"><?php echo date("F", strtotime("-8 Months", strtotime(date('01-m-Y')))) ?></option>
                                <option value="<?php echo date("m", strtotime("-9 Months", strtotime(date('01-m-Y')))) ?>"><?php echo date("F", strtotime("-9 Months", strtotime(date('01-m-Y')))) ?> </option>
                                <option value="<?php echo date("m", strtotime("-10 Months", strtotime(date('01-m-Y')))) ?>"><?php echo date("F", strtotime("-10 Months", strtotime(date('01-m-Y')))) ?> </option>
                                <option value="<?php echo date("m", strtotime("-11 Months", strtotime(date('01-m-Y')))) ?>"><?php echo date("F", strtotime("-11 Months", strtotime(date('01-m-Y')))) ?> </option>
                                <option value="<?php echo date("m", strtotime("-12 Months", strtotime(date('01-m-Y')))) ?>"><?php echo date("F", strtotime("-12 Months", strtotime(date('01-m-Y')))); ?> </option>
                            </select>
                            <span class="text-danger"><?php echo form_error('month'); ?></span>
                        </td>
                    </tr>
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

        <button id="mybtn" type="submit"  class="btn btn-success btn-raised"><i class="fa fa-check"></i>  Make Payment</button>

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
      EducationFee: {
        required: true,
        //range: [0, $("#EducationFeer").val()]
      },
      TermFee: {
        required: true,
        //range: [0, $("#TermFeer").val()]
      },
      ExamFee: {
        required: true,
        //range: [0, $("#ExamFeer").val()]
      },
      SportFee: {
        required: true,
        //range: [0, $("#SportFeer").val()]
      },
      ComputerFee: {
        required: true,
        //range: [0, $("#ComputerFeer").val()]
      }
    },
    messages: {		
        EducationFee: {
            required: "This field is required.",
           // range: "Enter Valid Paying Amount"
        },
        TermFee: {
            required: "This field is required.",
            //range: "Enter Valid Paying Amount"
        },
        ExamFee: {
            required: "This field is required.",
            //range: "Enter Valid Paying Amount"
        },
        SportFee: {
            required: "This field is required.",
            //range: "Enter Valid Paying Amount"
        },
        ComputerFee: {
            required: "This field is required.",
            //range: "Enter Valid Paying Amount"
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

<script>
  

// function mycheckfunction() {
//     var a1 = $('#EducationFeer').val();
//     var b1 = $('#TermFeer').val();
//     var c1 = $('#ExamFeer').val();
//     var d1 = $('#SportFeer').val();
//     var e1 = $('#ComputerFeer').val();

//     var a = $('#EducationFee').val();
//     var b = $('#TermFee').val();
//     var c = $('#ExamFee').val();
//     var d = $('#SportFee').val();
//     var e = $('#ComputerFee').val();


// if(a1>=a){ $("#EducationFee").css("background-color", "white");  } else{ $("#EducationFee").css("background-color", "red"); alert(a1+'  '+ a); }

// if(b1>=b){$("#TermFee").css("background-color", "white"); } else{ $("#TermFee").css("background-color", "red"); }

// if(c1>=c){$("#ExamFee").css("background-color", "white"); } else{ $("#ExamFee").css("background-color", "red"); }

// if(d1>=d){$("#SportFee").css("background-color", "white"); } else{ $("#SportFee").css("background-color", "red"); }

// if(e1>=e){$("#ComputerFee").css("background-color", "white"); } else{ $("#ComputerFee").css("background-color", "red"); }

// if (a1>=a && b1>=b && c1>=c && d1>=d && e1>=e) {
//     //alert("please Enter Valid Fees");
//     $("#mybtn").show();
// }else{
//     $("#mybtn").hide();
// }
  
  


  
//}
</script>
