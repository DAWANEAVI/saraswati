

<?php 
$attribute = array('class'=>'form');
echo form_open('payment_log/add/' . $student_id,$attribute); ?>
<div class="card-body">
    <h3 class="box-title text-center">Payment For :<?= strtoupper($record->fullname) ?></h3>
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
                    <?php
                    $count = 1;
                    $remaining_amount = 0;
                    $paid_amount = 0;
                    $total_amount = 0;
                    $current_year_academic_id =0;
                    foreach ($payment_record as $k => $v) {
                        if ($v['academic_year'] != $academic_year) {
                            if ($v['total_amount'] > $v['paid_amount']) {
                                ?>  

                                <tr>

                                    <td><?= $count ?></td>
                                    <td><?= $v['academic_year'] ?></td>
                                    <td><?= $v['total_amount'] ?></td>
                                    <td><?= $v['paid_amount'] ?></td>
                                    <td><?= $v['total_amount'] - $v['paid_amount'] ?></td>
                                    <?php
                                    $remaining_amount = $v['total_amount'] - $v['paid_amount'] + $remaining_amount;
                                    $total_amount = $v['total_amount'] + $total_amount;
                                    $paid_amount = $v['paid_amount'] + $paid_amount;
                                    ?>


                                </tr>

                                <?php
                                $count++;
                            }
                        }else{
                            $current_year_academic_id = $v['payment_id'];
                        }
                    }
                    ?>
                    <?php
                    if ($record->old_fees > $record->paid_fees) {
                        ?>
                        <tr>

                            <td><?= $count ?></td>
                            <td><?= '-' ?></td>
                            <td><?= $record->old_fees ?></td>
                            <td><?= $record->paid_fees ?></td>
                            <td><?= $record->old_fees - $record->paid_fees ?></td>
                            <?php
                            $remaining_amount = $record->old_fees - $record->paid_fees + $remaining_amount;
                            $total_amount = $record->old_fees + $total_amount;
                            $paid_amount = $record->paid_fees + $paid_amount;
                            ?>


                        </tr>
                    <?php }
                    ?>

                    <tr>

                        <td colspan="2">Total</td>
                        <td><?= $total_amount ?></td>
                        <td><?= $paid_amount ?></td>
                        <td><?= $remaining_amount ?></td>
                    </tr>
                </tbody>

            </table>

            <hr />

            <table class="table table-responsive" style="overflow: hidden;">
                <thead class="thead-default">
                <th>S.N.</th>
                <th>PARTICULARS</th>
                <th>Total Amount</th>
                <th>Pending Amount</th>
                <th>Paying Amount</th>
                </thead>
                <tbody>

                    <?php
                    $count = 1;
                    $total = 0;
                    foreach ($existing_fees as $k => $v) {
                        $total = $total + $v['amount'];
                        ?>
                        <tr>
                            <td><?= $count ?></td>
                            <th><?= $v['fees_for'] ?></th>

                            <td><span>
                                    <?php echo $v['amount'] ?>
                                    <?php
//                                    switch ($v['fees_for']) {
//                                        case 'Education Fee':
//                                            echo $v['amount'] - $paid_edu_fee;
//                                            break;
//                                        case 'Term Fee':
//                                            echo $v['amount'] - $paid_term_fee;
//                                            break;
//                                        case 'Exam Fee':
//                                            echo $v['amount'] - $paid_exm_fee;
//                                            break;
//                                        case 'Sport Fee':
//                                            echo $v['amount'] - $paid_sport_fee;
//                                            break;
//                                        case 'Miscellaneous Fee':
//                                            echo $v['amount'] - $paid_misc_fee;
//                                            break;
//                                    }
                                    ?>
                                </span></td>
                            <th>
<?php if ($v['fees_for'] == "Education Fee") {
    echo $record->education_fee;
} 
if ($v['fees_for'] == "Term Fee") {
    echo $record->term_fee;
} 
if ($v['fees_for'] == "Exam Fee") {
    echo $record->exam_fee;
} 
if ($v['fees_for'] == "Sport Fee") {
    echo $record->sport_fee;
} 
if ($v['fees_for'] == "Miscellaneous Fee") {
    echo $record->miscellaneous_fee;
} 
 ?></th>
                            <td>
                                <input type="text" name="<?php echo str_replace(' ', '', $v['fees_for']); ?>" value="<?php echo $this->input->post(str_replace(' ', '', $v['fees_for'])); ?>" class="form-control amount"  placeholder="Enter <?= $v['fees_for'] ?> Amount" data-rule-required="true">
                                <span class="text-danger"><?php echo form_error(str_replace(' ', '', $v['fees_for'])); ?></span>
                            </td>

                        </tr>
                        <?php
                        $count++;
                    }
                    ?>

                    <?php
                    if ($remaining_amount > 0) {
                        foreach ($payment_record as $k => $v) {
                            if ($v['academic_year'] != $academic_year) {
                                if ($v['total_amount'] > $v['paid_amount']) {
                                    ?>  

                                    <tr>

                                        <td><?= $count ?></td>
                                        <th>Old Fee Of Academic Year <?= $v['academic_year'] ?></th>
                                        <th><?=$v['total_amount']-$v['paid_amount']?></th>
                                        <td>
                                            <input type="text" name="back_year_fee[]" value="" class="form-control amount"  placeholder="Enter Paying Amount" data-rule-required="true">
                                            <input type="text" name="payment_id[]" value="<?=$v['payment_id'];?>" style="visibility: hidden;">
                                        </td>


                                    </tr>

                                    <?php
                                    $count++;
                                }
                            }
                        }
                    }
                    ?>


                    <?php
                    if ($record->old_fees > $record->paid_fees) {
                        ?>
                        <tr>
                            <td><?= $count ?></td>
                            <th>Old Fee For Past Academic Year</th>
                            <th><?= $record->old_fees - $record->paid_fees; ?></th>
                            <td>
                                <input type="text" name="oldfee" value="" class="form-control amount"  placeholder="Enter Paying Amount" data-rule-required="true">
                            </td>

                        </tr>
                        <?php
                    }
                    ?>

                    <tr>
                        <td></td>
                        <th>Total Fee</th>
                        <td>
                            <input readonly="true" type="text" name="total" value="0" id="total" class="form-control">
                            <input type="hidden" name="current_year_academic_payment_id" value="<?php echo $current_year_academic_id;?>">
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

        <button type="submit"  class="btn btn-success btn-raised"><i class="fa fa-check"></i>  Make Payment</button>

    </div>
</div>

<?php echo form_close(); ?>
