<style>
    @media print{    
    th,td{
        font-size:1rem!important;
    }
}
</style>

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
        <div class="col-4 text-center">
            <div class="text-left invoice__attrs__item" style="padding:5px 0px;">
                <small>Receipt No#</small>
                <h3 style="font-size:14px;"><?php echo $payment_log['reciept_no']; ?></h3>
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
                <h3 style="font-size:14px;"><?= date('d/m/Y', strtotime($payment_log['created_date'])) ?></h3>
            </div>
        </div>

    </div>
    <div class="row invoice__attrs" style="margin-bottom:0px;">
        <div class="col-2"></div>
        <div class="col-4">
            <div class="text-left invoice__attrs__item"  style="padding:5px 0px;">
                <small>Name Of Student</small>
                <h3 style="font-size:14px;"><?php echo strtoupper($student_data['fullname']); ?></h3>
            </div>
        </div>

        <div class="col-2 text-right">
            <div class="text-right text-center invoice__attrs__item" style="padding:5px 0px;">
                <small>Class</small>
                <h3 style="font-size:14px;"><?= $student_data['class_name'] ?></h3>
            </div>
        </div>
        <div class="col-2">
            <div class="text-center invoice__attrs__item" style="padding:5px 0px;">
                <small>Fees For Month Of</small>
                <?php
                if($payment_log['month']!=''){
                    $monthNum  = $payment_log['month'];
                    $dateObj   = DateTime::createFromFormat('!m', $monthNum);
                    $monthName = $dateObj->format('F');
                }else{
                    $monthName= '-';
                }

                if($payment_log['to_month']!=''){
                    $monthNum  = $payment_log['to_month'];
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
                        <th colspan="3" class="text-center" >PAID AMOUNT</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $count = 1;
                    $totalMoney=0;
                    $totalPaid=0;
                    $totalUnpaid=0;
                    $fee_data = [
                        'Education Fee'  => 'Education Fee',
                        'Term Fee' => 'Term Fee',
                        'Exam Fee' => 'Exam Fee',
                        'Sport Fee' => 'Sport Fee',
                        'Computer Fee' => 'Computer Fee',
                    ];
                    foreach ($fee_data as $k => $v) {

                        $value = 0;

                        if ($v == 'Education Fee') {
                            $value = $payment_log['education_fee'];
                        }
                        if ($v == 'Term Fee') {
                            $value = $payment_log['term_fee'];
                        }
                        if ($v == 'Exam Fee') {
                            $value = $payment_log['exam_fee'];
                        }
                        if ($v == 'Sport Fee') {
                            $value = $payment_log['sport_fee'];
                        }
                        if ($v == 'Computer Fee') {
                            $value = $payment_log['computer_fee'];
                        }
                        ?>
                        <tr>
                            <td class="text-center" style="padding:0px!important;"><?= $count; ?></td>

                            <td style="padding:0px!important"><?= $v ?></td>
                            <td class="text-center" colspan="3" style="padding:0px!important;"><?= $value ?></td>
                        </tr>
                        <?php
                        $totalPaid = $totalPaid + $value;
                        $count++;
                    }
                    ?>
                    <tr>
                        <th class='text-center' colspan="1">#</th>
                        <th  class="text-center" style="padding:0px!important;">Total Fees = <?php echo $payment_log_data->total_old_fees; ?></th>
                        <th  class="text-center" style="padding:0px!important;">Paid Fees =<?= $payment_log_data->total ?></th>
                        <th  class="text-center" style="padding:0px!important;">Remaining Fees = <?= $payment_log_data->total_old_fees - $payment_log_data->total ?></th>
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
                            <?= $payment_log['remark']; ?>
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
        <div class="col-4 text-center">
            <div class="text-left invoice__attrs__item" style="padding:5px 0px;">
                <small>Receipt No#</small>
                <h3 style="font-size:14px;"><?php echo $payment_log['reciept_no']; ?></h3>
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
                <h3 style="font-size:14px;"><?= date('d/m/Y', strtotime($payment_log['created_date'])) ?></h3>
            </div>
        </div>

    </div>
    <div class="row invoice__attrs" style="margin-bottom:0px;">
        <div class="col-2"></div>
        <div class="col-4">
            <div class="text-left invoice__attrs__item"  style="padding:5px 0px;">
                <small>Name Of Student</small>
                <h3 style="font-size:14px;"><?php echo strtoupper($student_data['fullname']); ?></h3>
            </div>
        </div>

        <div class="col-2 text-right">
            <div class="text-right text-center invoice__attrs__item" style="padding:5px 0px;">
                <small>Class</small>
                <h3 style="font-size:14px;"><?= $student_data['class_name'] ?></h3>
            </div>
        </div>
        <div class="col-2">
            <div class="text-center invoice__attrs__item" style="padding:5px 0px;">
                <small>Fees For Month Of</small>
                <?php
                if($payment_log['month']!=''){
                    $monthNum  = $payment_log['month'];
                    $dateObj   = DateTime::createFromFormat('!m', $monthNum);
                    $monthName = $dateObj->format('F');
                }else{
                    $monthName= '-';
                }

                if($payment_log['to_month']!=''){
                    $monthNum  = $payment_log['to_month'];
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
                        <th colspan="3" class="text-center" >PAID AMOUNT</th>
                        
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $count = 1;
                    $totalMoney=0;
                    $totalPaid=0;
                    $totalUnpaid=0;
                    $fee_data = [
                        'Education Fee'  => 'Education Fee',
                        'Term Fee' => 'Term Fee',
                        'Exam Fee' => 'Exam Fee',
                        'Sport Fee' => 'Sport Fee',
                        'Computer Fee' => 'Computer Fee',
                    ];
                    foreach ($fee_data as $k => $v) {

                        $value = 0;

                        if ($v == 'Education Fee') {
                            $value = $payment_log['education_fee'];
                        }
                        if ($v == 'Term Fee') {
                            $value = $payment_log['term_fee'];
                        }
                        if ($v == 'Exam Fee') {
                            $value = $payment_log['exam_fee'];
                        }
                        if ($v == 'Sport Fee') {
                            $value = $payment_log['sport_fee'];
                        }
                        if ($v == 'Computer Fee') {
                            $value = $payment_log['computer_fee'];
                        }
                        ?>
                        <tr>
                            <td class="text-center" style="padding:0px!important;"><?= $count; ?></td>

                            <td style="padding:0px!important"><?= $v ?></td>
                            <td colspan="3" class="text-center" style="padding:0px!important;"><?= $value ?></td>
                        </tr>
                        <?php
                        $totalPaid = $totalPaid + $value;
                        $count++;
                    }
                    ?>
                    <tr>
                        <th class='text-center' colspan="1">#</th>
                        <th  class="text-center" style="padding:0px!important;">Total Fees = <?php echo $payment_log_data->total_old_fees; ?></th>
                        <th  class="text-center" style="padding:0px!important;">Paid Fees =<?= $payment_log_data->total ?></th>
                        <th  class="text-center" style="padding:0px!important;">Remaining Fees = <?= $payment_log_data->total_old_fees - $payment_log_data->total ?></th>
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
                            <?= $payment_log['remark']; ?>
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
<!-- <script type = "text/javascript" >  
    function preventBack() { window.history.forward(); }  
    setTimeout("preventBack()", 0);  
    window.onunload = function () { null };  
</script> 
<script>
      window.history.forward();
</script>
<script>
      setTimeout(() => { window.history.forward() }, 100);
</script> -->