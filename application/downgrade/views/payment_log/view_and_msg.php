<style>
    @media print{    
    th,td{
        font-size:1rem!important;
    }
}
</style>
<input type="hidden" name="mobile" value="<?=$payment_log->mobile_no ?>" id="mobile">
<input type="hidden" name="msg" value="<?= "Dear " . $payment_log->fullname . " your  payment of " . $payment_log->total . ' Rs reciept No.'.$payment_log->reciept_no.' is Done To Oxford English School, Mouda Thank You!' ?>" id="msg">
<input type="hidden" id="page_name" value="view_and_sms">
<?php $page = "view_and_check";?>
<div class="invoice" style="padding:0px 100px;margin-bottom:30px!important;">
            <div class="invoice__header" style="padding:0px;margin-bottom: 0px;">
                <img style="width:50px;height:50px;"class="invoice__logo" src="<?= site_url('resources/img/') ?>logo.png" alt="">
            </div>

    <div class="row invoice__address" style="margin-bottom:0px;">
                <div class="col-2"></div>
                <div class="col-md-8 text-center">
                    <h3 style="font-size:14px;">Oxford English School,Mouda</h3>
                    <div class="text-center">Tah. Mouda,Dist.Nagpur

                        </address>
                       
                        Reg. No. F336 (NGP)<br/>
                        
                    </div>
                </div>
                <div class="col-2"></div>


            </div>

    <div class="row invoice__attrs" style="margin-bottom:0px;">
                <div class="col-2"></div>
                <div class="col-4">
                    <div class="text-left invoice__attrs__item" style="padding:5px 0px;">
                        <small>Receipt No#</small>
                        <h3 style="font-size:14px;"><?php echo $payment_log->numeric_name.''.$payment_log->section_name.''.$payment_log->payment_log_id ?></h3>
                    </div>
                </div>

                <div class="col-4 text-right">
                    <div class="text-right invoice__attrs__item" style="padding:5px 0px;">
                        <small>Date</small>
                        <h3 style="font-size:14px;"><?= date('d/m/Y', strtotime($payment_log->created_date)) ?></h3>
                    </div>
                </div>
                <div class="col-2"></div>


            </div>
    <div class="row invoice__attrs" style="margin-bottom:0px;">
         <div class="col-2"></div>
                <div class="col-4">
                    <div class="text-left invoice__attrs__item"  style="padding:5px 0px;">
                        <small>Name Of Student</small>
                        <h3 style="font-size:14px;"><?php echo strtoupper($payment_log->fullname); ?></h3>
                    </div>
                </div>

                <div class="col-2 text-right">
                    <div class="text-right invoice__attrs__item" style="padding:5px 0px;">
                        <small>Class</small>
                        <h3 style="font-size:14px;"><?= $payment_log->numeric_name ?></h3>
                    </div>
                </div>
                <div class="col-2 text-right">
                    <div class="text-right invoice__attrs__item" style="padding:5px 0px;">
                        <small>Fees For Month Of</small>
                        <?php
                        if($payment_log->month!=''){
                        $monthNum  = $payment_log->month;
$dateObj   = DateTime::createFromFormat('!m', $monthNum);
$monthName = $dateObj->format('F');
                        }else{
                         $monthName= '-';
                        }
                          if($payment_log->to_month!=''){
$monthNum  = $payment_log->to_month;
$dateObj   = DateTime::createFromFormat('!m', $monthNum);
$tomonth = $dateObj->format('F');
                          }else{
                              $tomonth='-';
                          }
                        ?>
                        <h3 style="font-size:14px;"><?php echo $monthName.' to '.$tomonth; ?></h3>
                    </div>
                </div>
                 <div class="col-2"></div>

            </div>

    <style>
        .table th,.table td{
            padding:2px!important;
             border-color:#000!important;
             color:#000!important;
        }
        </style>
        <div class="row">
        <div class="col-2"></div>
        <div class="col-8">
            <table class="table table-bordered invoice__table" style="margin-bottom:0px;    border: 1px solid #000;">
                <thead>
                    <tr class="text-uppercase">
                        <th>S.R.</th>
                        <th>PARTICULARS</th>
                        <th>AMOUNT</th>
                        <th class="text-right" >PAID AMOUNT</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $count = 1;
                    foreach ($fee_data as $k => $v) {

                        $value = 0;

                        if ($v['fees_for'] == 'Education Fee') {
                            $value = $payment_log->education_fee;
                        }
                        if ($v['fees_for'] == 'Term Fee') {
                            $value = $payment_log->term_fee;
                        }
                        if ($v['fees_for'] == 'Exam Fee') {
                            $value = $payment_log->exam_fee;
                        }
                        if ($v['fees_for'] == 'Sport Fee') {
                            $value = $payment_log->sport_fee;
                        }
                        if ($v['fees_for'] == 'Miscellaneous Fee') {
                            $value = $payment_log->misc_fee;
                        }
                        ?>
                        <tr>
                            <td style="padding:0px!important;"><?= $count; ?></td>

                            <td style="padding:0px!important"><?= $v['fees_for'] ?></td>
                            <td style="padding:0px!important;"><?= $v['amount'] ?></td>
                            <td class="text-right" style="padding:0px!important;"><?= $value ?></td>
                        </tr>
                        <?php
                        $count++;
                    }
                    ?>
                    <?php
                    if ($payment_log->old_fee > 0) {
                        ?>
                        <tr>
                            <td style="padding:0px!important;"><?= $count ?></td>
                            <th>Old Fee</th>
                            <th><?= $payment_log->old_fee ?></th>
                            <td  class="text-right" style="padding:0px!important;">
                                <?= $payment_log->old_fee ?>
                            </td>

                        </tr>
                        <?php
                    }
                    ?>

                    <tr>
                        <td colspan="3">Total</td>
                        <td  class="text-right" style="padding:0px!important;"><?= $payment_log->total ?></td>
                    </tr>
                    <tr>
                        <td colspan="4">
                            <small>Amount In Words</small> <br />
                            <?=$in_word?>
                        </td>
                        
                    </tr>
                    <tr>
                        <td colspan="4">
                            <small>Remarks</small> <br />
                            <?=$payment_log->remark?>
                        </td>
                        
                    </tr>
                </tbody>
            </table>
            </div>
        <div class="col-2"></div>
        </div>
           

        <footer class="invoice__footer text-center" style="margin: 1.5rem 150px 0.5rem;">
               
                <a style="float:left;" href="#">Parent's Sign</a>
                <a href="#">Reciever's Sign</a>
                <a style="float:right;"class="pull-right" href="#">Student's Copy</a>
            </footer>
        </div>

<div class="invoice" style="padding:0px 100px;margin-top:50px;">
            <div class="invoice__header" style="padding:0px;margin-bottom: 0px;">
                <img style="width:50px;height:50px;"class="invoice__logo" src="<?= site_url('resources/img/') ?>logo.png" alt="">
            </div>

    <div class="row invoice__address" style="margin-bottom:0px;">
                <div class="col-2"></div>
                <div class="col-md-8 text-center">
                    <h3 style="font-size:14px;">Oxford English School,Mouda</h3>
                    <div class="text-center">Tah. Mouda,Dist.Nagpur

                        </address>
                       
                        Reg. No. F336 (NGP)<br/>
                        
                    </div>
                </div>
                <div class="col-2"></div>


            </div>

    <div class="row invoice__attrs" style="margin-bottom:0px;">
                <div class="col-2"></div>
                <div class="col-4">
                    <div class="text-left invoice__attrs__item" style="padding:5px 0px;">
                        <small>Receipt No#</small>
                        <h3 style="font-size:14px;"><?php echo $payment_log->numeric_name.''.$payment_log->section_name.''.$payment_log->payment_log_id ?></h3>
                    </div>
                </div>

                <div class="col-4 text-right">
                    <div class="text-right invoice__attrs__item" style="padding:5px 0px;">
                        <small>Date</small>
                        <h3 style="font-size:14px;"><?= date('d/m/Y', strtotime($payment_log->created_date)) ?></h3>
                    </div>
                </div>
                <div class="col-2"></div>


            </div>
    <div class="row invoice__attrs" style="margin-bottom:0px;">
         <div class="col-2"></div>
                <div class="col-4">
                    <div class="text-left invoice__attrs__item"  style="padding:5px 0px;">
                        <small>Name Of Student</small>
                        <h3 style="font-size:14px;"><?php echo strtoupper($payment_log->fullname); ?></h3>
                    </div>
                </div>

                <div class="col-2 text-right">
                    <div class="text-right invoice__attrs__item" style="padding:5px 0px;">
                        <small>Class</small>
                        <h3 style="font-size:14px;"><?= $payment_log->numeric_name ?></h3>
                    </div>
                </div>
                <div class="col-2 text-right">
                    <div class="text-right invoice__attrs__item" style="padding:5px 0px;">
                        <small>Fees For Month Of</small>
                        <?php
                        if($payment_log->month!=''){
                        $monthNum  = $payment_log->month;
$dateObj   = DateTime::createFromFormat('!m', $monthNum);
$monthName = $dateObj->format('F');
                        }else{
                         $monthName= '-';
                        }
                          if($payment_log->to_month!=''){
$monthNum  = $payment_log->to_month;
$dateObj   = DateTime::createFromFormat('!m', $monthNum);
$tomonth = $dateObj->format('F');
                          }else{
                              $tomonth='-';
                          }
                        ?>
                        <h3 style="font-size:14px;"><?php echo $monthName.' to '.$tomonth; ?></h3>
                    </div>
                </div>
                 <div class="col-2"></div>

            </div>

    <style>
        .table th,.table td{
            padding:2px!important;
        }
        </style>
        <div class="row">
        <div class="col-2"></div>
        <div class="col-8">
            <table class="table table-bordered invoice__table" style="margin-bottom:0px;    border: 1px solid #000;">
                <thead>
                    <tr class="text-uppercase">
                        <th>S.R.</th>
                        <th>PARTICULARS</th>
                        <th>AMOUNT</th>
                        <th class="text-right" >PAID AMOUNT</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $count = 1;
                    foreach ($fee_data as $k => $v) {

                        $value = 0;

                        if ($v['fees_for'] == 'Education Fee') {
                            $value = $payment_log->education_fee;
                        }
                        if ($v['fees_for'] == 'Term Fee') {
                            $value = $payment_log->term_fee;
                        }
                        if ($v['fees_for'] == 'Exam Fee') {
                            $value = $payment_log->exam_fee;
                        }
                        if ($v['fees_for'] == 'Sport Fee') {
                            $value = $payment_log->sport_fee;
                        }
                        if ($v['fees_for'] == 'Miscellaneous Fee') {
                            $value = $payment_log->misc_fee;
                        }
                        ?>
                        <tr>
                            <td style="padding:0px!important;"><?= $count; ?></td>

                            <td style="padding:0px!important"><?= $v['fees_for'] ?></td>
                            <td style="padding:0px!important;"><?= $v['amount'] ?></td>
                            <td class="text-right" style="padding:0px!important;"><?= $value ?></td>
                        </tr>
                        <?php
                        $count++;
                    }
                    ?>
                    <?php
                    if ($payment_log->old_fee > 0) {
                        ?>
                        <tr>
                            <td style="padding:0px!important;"><?= $count ?></td>
                            <th>Old Fee</th>
                            <th><?= $payment_log->old_fee ?></th>
                            <td  class="text-right" style="padding:0px!important;">
                                <?= $payment_log->old_fee ?>
                            </td>

                        </tr>
                        <?php
                    }
                    ?>

                    <tr>
                        <td colspan="3">Total</td>
                        <td  class="text-right" style="padding:0px!important;"><?= $payment_log->total ?></td>
                    </tr>
                    <tr>
                        <td colspan="4">
                            <small>Amount In Words</small> <br />
                            <?=$in_word?>
                        </td>
                        
                    </tr>
                    <tr>
                        <td colspan="4">
                            <small>Remarks</small> <br />
                            <?=$payment_log->remark?>
                        </td>
                        
                    </tr>
                </tbody>
            </table>
            </div>
        <div class="col-2"></div>
        </div>
           

        <footer class="invoice__footer text-center" style="margin: 1.5rem 150px 0.5rem;">
               
                <a style="float:left;" href="#">Reciever's Sign</a>
                 <a href="#">Parent's Sign</a>
                <a style="float:right;"class="pull-right" href="#">School's Copy</a>
            </footer>
        </div>




<button class="btn btn-danger btn--action " data-ma-action="print"><i class="zmdi zmdi-print"></i></button>

<script>
    check();
</script>