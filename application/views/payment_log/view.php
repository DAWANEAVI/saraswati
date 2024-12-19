<style>
    @media print{    
    th,td{
        font-size:1rem!important;
    }
}
</style>

<div class="invoice" style="padding:0px 100px;">
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
        <div class="col-4 text-center">
            <div class="text-left invoice__attrs__item" style="padding:5px 0px;">
                <small>Receipt No#</small>
                <h3 style="font-size:14px;"><?php echo $payment_log->reciept_no; ?></h3>
            </div>
        </div>

        <div class="col-2">
        <div class="text-center invoice__attrs__item" style="padding:5px 0px;">
                <small>Payment Session</small>
                <h3 class="" style="font-size:14px;"><?= $payment_session ?></h3>
            </div>
        </div>
        
        <div class="col-2 text-center">
            <div class="text-center invoice__attrs__item" style="padding:5px 0px;">
                <small>Date</small>
                <h3 style="font-size:14px;"><?= date('d/m/Y', strtotime($payment_log->created_date)) ?></h3>
            </div>
        </div>

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
            <div class="text-right text-center invoice__attrs__item" style="padding:5px 0px;">
                <small>Class</small>
                <h3 style="font-size:14px;"><?= $payment_log->numeric_name ?></h3>
            </div>
        </div>
        <div class="col-2">
            <div class="text-center invoice__attrs__item" style="padding:5px 0px;">
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
                        <th class="text-center">S.R.</th>
                        <th>PARTICULARS</th>
                        <th class="text-center">TOTAL AMOUNT</th>
                        <th class="text-right" >PAID AMOUNT</th>
                        <th class="text-right" >REMAINING AMOUNT</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $count = 1;
                    $totalMoney=0;
                    $totalPaid=0;
                    $totalUnpaid=0;
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
                        if ($v['fees_for'] == 'Computer Fee') {
                            $value = $payment_log->computer_fee;
                        }
                        ?>
                        <tr>
                            <td class="text-center" style="padding:0px!important;"><?= $count; ?></td>

                            <td style="padding:0px!important"><?= $v['fees_for'] ?></td>
                            <td class="text-center" style="padding:0px!important;"><?= $v['amount'] ?></td>
                            <td class="text-center" style="padding:0px!important;"><?= $value ?></td>
                            <td class="text-center" style="padding:0px!important;"><?= $v['amount'] - $value ?></td>
                        </tr>
                        <?php
                        $totalMoney = $totalMoney + $v['amount'];
                        $totalPaid = $totalPaid + $value;
                        $totalUnpaid = $totalUnpaid + ($v['amount'] - $value);
                        $count++;
                    }
                    ?>
                    <?php
                    $oldFlag = FALSE;
                    if ($payment_log->old_fee > 0) {
                        ?>
                        <tr>
                            <td class="text-center" style="padding:0px!important;"><?= $count ?></td>
                            <th>Old Fee</th>
                            <th class="text-center"><?= '*' ?></th>
                            <th  class="text-center" style="padding:0px!important;">
                            <?= $payment_log->old_fee ?>
                            </th>
                            <th  class="text-center" style="padding:0px!important;">
                            <?= '*' ?>
                            </th>

                        </tr>
                        <?php
                        $oldFlag = True;
                        $totalPaid = $totalPaid + $payment_log->old_fee;
                    }
                    ?>

                    <tr>
                        <th colspan="2">Total</th>
                        <th  class="text-center" style="padding:0px!important;"><?php echo $oldFlag ? $totalMoney .' *' : $totalMoney; ?></th>
                        <th  class="text-center" style="padding:0px!important;"><?= $totalPaid ?></th>
                        <th  class="text-center" style="padding:0px!important;"><?php echo $oldFlag ? $totalUnpaid  .' *' : $totalUnpaid; ?></th>
                    </tr>
                    <tr>
                        <td colspan="5">
                            <small>Amount In Words</small> <br />
                            <span class="font-weight-bold"><?=$in_word?></span>
                        </td>
                        
                    </tr>
                    <tr>
                        <td colspan="5">
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
            <a style="float:left;" class="text-left" href="#">Parent's Sign</a>
        <a class="text-center" href="#">Reciever's Sign</a>
        <a style="float:right;"class="pull-right" href="#">Student's Copy</a>
    </footer>   
</div>
<div class="invoice" style="padding:0px 100px; margin-top: 50px;">
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
        <div class="col-4 text-center">
            <div class="text-left invoice__attrs__item" style="padding:5px 0px;">
                <small>Receipt No#</small>
                <h3 style="font-size:14px;"><?php echo $payment_log->numeric_name.''.$payment_log->section_name.''.$payment_log->payment_log_id ?></h3>
            </div>
        </div>

        <div class="col-2">
        <div class="text-center invoice__attrs__item" style="padding:5px 0px;">
                <small>Payment Session</small>
                <h3 style="font-size:14px;" class=""><?= $payment_session  ?></h3>
            </div>
        </div>
        
        <div class="col-2 text-center">
            <div class="text-center invoice__attrs__item" style="padding:5px 0px;">
                <small>Date</small>
                <h3 style="font-size:14px;"><?= date('d/m/Y', strtotime($payment_log->created_date)) ?></h3>
            </div>
        </div>

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
            <div class="text-right text-center invoice__attrs__item" style="padding:5px 0px;">
                <small>Class</small>
                <h3 style="font-size:14px;"><?= $payment_log->numeric_name ?></h3>
            </div>
        </div>
        <div class="col-2">
            <div class="text-center invoice__attrs__item" style="padding:5px 0px;">
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
                        <th class="text-center">S.R.</th>
                        <th>PARTICULARS</th>
                        <th class="text-center">TOTAL AMOUNT</th>
                        <th class="text-right" >PAID AMOUNT</th>
                        <th class="text-right" >REMAINING AMOUNT</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $count = 1;
                    $totalMoney=0;
                    $totalPaid=0;
                    $totalUnpaid=0;
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
                        if ($v['fees_for'] == 'Computer Fee') {
                            $value = $payment_log->computer_fee;
                        }
                        ?>
                        <tr>
                            <td class="text-center" style="padding:0px!important;"><?= $count; ?></td>

                            <td style="padding:0px!important"><?= $v['fees_for'] ?></td>
                            <td class="text-center" style="padding:0px!important;"><?= $v['amount'] ?></td>
                            <td class="text-center" style="padding:0px!important;"><?= $value ?></td>
                            <td class="text-center" style="padding:0px!important;"><?= $value ?></td>
                        </tr>
                        <?php
                        $totalMoney = $totalMoney + $v['amount'];
                        $totalPaid = $totalPaid + $value;
                        $totalUnpaid = $totalUnpaid + ($v['amount'] - $value);
                        $count++;
                    }
                    ?>
                    <?php
                    $oldFlag = FALSE;
                    if ($payment_log->old_fee > 0) {
                        ?>
                        <tr>
                            <td class="text-center" style="padding:0px!important;"><?= $count ?></td>
                            <th>Old Fee</th>
                            <th class="text-center"><?= '*' ?></th>
                            <th  class="text-center" style="padding:0px!important;">
                                <?= $payment_log->old_fee ?>
                            </th>
                            <th  class="text-center" style="padding:0px!important;">
                            <?= '*' ?>
                            </th>

                        </tr>
                        <?php
                        $oldFlag = TRUE;
                        $totalPaid = $totalPaid + $payment_log->old_fee;
                    }
                    ?>

                    <tr>
                        <th colspan="2">Total</th>
                        <th  class="text-center" style="padding:0px!important;"><?php echo $oldFlag ? $totalMoney .' *' : $totalMoney; ?></th>
                        <th  class="text-center" style="padding:0px!important;"><?= $totalPaid ?></th>
                        <th  class="text-center" style="padding:0px!important;"><?php echo $oldFlag ? $totalUnpaid  .' *' : $totalUnpaid; ?></th>
                    </tr>
                    <tr>
                        <td colspan="5">
                            <small>Amount In Words</small> <br />
                            <span class="font-weight-bold"><?=$in_word?></span>
                        </td>
                        
                    </tr>
                    <tr>
                        <td colspan="5">
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
                <a style="float:left;" class="text-left" href="#">Reciever's Sign</a>
            <a class="text-center" href="#">Parent's Sign</a>
            <a style="float:right;"class="pull-right" href="#">School's Copy</a>
        </footer>
    </div>

   


<button class="btn btn-danger btn--action " data-ma-action="print"><i class="zmdi zmdi-print"></i></button>
