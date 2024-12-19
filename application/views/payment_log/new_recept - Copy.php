
<style>
    tr{
        line-height:1.4rem!important;
        color:#000!important;
    }
    .invoice br {
        display:none !important;
    }
    .line {
    padding: 0px 0px !important;
   }
   .school-name{
        margin-bottom: 0.5rem !important;
    }
</style>
<style type="text/css" media="print">
    @page {
        margin-top:-40px !important;
        margin-left:0px !important;
        margin-right:0px !important;
        margin-bottom:0px !important;
        padding:0px !important;/* this affects the margin in the printer settings */
    }
    .invoice{
        min-width: 121%;
        margin:0px !important;
        padding:0px !important;
        /* margin-top:-40px !important; */
        /* padding-top:-40px !important; */
    }
    .table .table-borderless{
        min-height: 500%;
        margin:0px !important;
        padding:0px!important;
    }
    .table td {
    padding: 0rem 1.5rem !important;
    }
    
</style>
<div class="invoice">
    <table class="table table-borderless" style="width:100% !important;">
        <tr style="width:100% !important;">
            <td style="width:50% !important; border:2px solid grey;" class="text-center">
                <div class="invoice__header" style="padding:0px;margin-bottom: 5px; margin-top: 5px;">
                    <img style="width:50px;height:50px; border-radius:50%;"class="invoice__logo" src="<?= site_url('resources/img/') ?>logo.png" alt="">
                </div>
                <!-- <b>NAVINYA MAHILA BAHUUDDESHIYA TANTRIK & SHIKSHAN SANSTHA</b> -->
                <h2 class="school-name">LITTLE BIRDS ENGLISH MEDIUM HIGH </h2>
                <h2 class="school-name">SCHOOL & JR. COLLEGE OF SCIENCE</h2>
                <h6 style="margin-top: 1rem !important; margin-bottom: 1rem !important;">Laddha Nagar, Behind Government Hospital, Darwha, Maharashtra 445202</h6>
                <h4 ><span style="border: 2px solid red; border-radius:5px; padding:0px 10px;">RECEIPT</span></h4>
                <table class="table" style="width:100% !important;">
                    <tr style="width:100% !important; background-color:#fff;">
                        <td colspan="2" style="width:50%; border: 1px solid grey;"><h5 class="text-left"><span>Receipt No : <?php echo $payment_log->reciept_no ?></span></h5></td>
                        <td colspan="2" style="width:50%; border: 1px solid grey;"><h5 class="text-left"><span>Date : <?= date('d-m-Y', strtotime($payment_log->created_at)) ?></span></h5></td>
                    </tr>
                    <tr style="width:100% !important; background-color:#fff;">
                        <td colspan="4" style="width:100%; border: 1px solid grey;"><h5 class="text-left"><span>Student Name : <?php echo strtoupper($payment_log->fullname); ?></span></h5></td>

                    </tr>
                    <tr style="width:100% !important; background-color:#fff;">
                        <td style="width:30%; border: 1px solid grey;"><h5 class="text-left"><span>Class : <?= $payment_log->numeric_name ?></span></h5></td>
                        <td style="width:30%; border: 1px solid grey;"><h5 class="text-left"><span>Section : <?= $payment_log->section_name ?></span></h5></td>
                        <td colspan="2" style="width:40%; border: 1px solid grey;"><h5 class="text-left"><span>Session : <?= $payment_log->academic_year ?></span></h5></td>
                    </tr>
                    
                </table>
                <table class="table" style="width:100% !important;">
                    <tr style="width:100% !important; background-color:#fff;">
                        <td style="width:10px; border: 1px solid grey;"><h5 class="text-left"><span>SR.NO</span></h5></td>
                        <td style=" border: 1px solid grey;"><h5 class="text-left"><span>Particulars</span></h5></td>
                        <!-- <td style=" border: 1px solid grey;"><h5 class="text-left"><span>Total</span></h5></td>
                        <td style=" border: 1px solid grey;"><h5 class="text-left"><span>Paid</span></h5></td> -->
                        <td style=" border: 1px solid grey;"><h5 class="text-left"><span>Amount</span></h5></td>
                    </tr>
                    <?php
                    $count = 1;
                    $totalMoney=0;
                    $totalPaid=0;
                    $totalUnpaid=0;
                    ?>
                            <tr style="width:100% !important; background-color:#fff;">
                                <td style=" border: 1px solid grey;"><h5 class="text-left"><span><?= $count; ?></span></h5></td>
                                <td style=" border: 1px solid grey;"><h5 class="text-left"><span><?= 'Acadamic Fees' ?></span></h5></td>
                                <td style=" border: 1px solid grey;"><h5 class="text-left"><span><?= number_format($payment_log->total, 2) ?></span></h5></td>
                            </tr>    
                        <?php 
                        $count++; 
                        $totalPaid = $totalPaid + $payment_log->total;
                       ?>


                    <tr style="width:100% !important; background-color:#fff;">
                        <td colspan="2" style=" border: 1px solid grey;"><h5 class="text-left"><span>Total</span></h5></td>
                        <td style=" border: 1px solid grey;"><h5 class="text-left"><span><?= number_format($payment_log->total, 2) ?></span></h5></td>
                    </tr>
                    <tr style="width:100% !important; background-color:#fff;">
                        <td colspan="3" style=" border: 1px solid grey;"><h5 class="text-left"><span>In Words : <?=$in_word?></span></h5></td>
                        
                    </tr>
                    <tr style="width:100% !important; background-color:#fff;">
                        <td colspan="3"><h5 class="text-left mt-5"><span>Parent's Sign</span><span class="mr-5 ml-5 mt-5 pl-4 pr-4">Student's Copy</span><span class="mt-5">Clerk's Sign</span></h5></td>
                    </tr>
                    
                </table>

            </td>
            <td style="height:100% !important;"></td>
            <td style="width:50% !important; border:2px solid grey;" class="text-center">
                <div class="invoice__header" style="padding:0px;margin-bottom: 5px; margin-top: 5px;">
                    <img style="width:50px;height:50px; border-radius:50%;"class="invoice__logo" src="<?= site_url('resources/img/') ?>logo.png" alt="">
                </div>
                <!-- <b>NAVINYA MAHILA BAHUUDDESHIYA TANTRIK & SHIKSHAN SANSTHA</b> -->
                <h2 class="school-name">LITTLE BIRDS ENGLISH MEDIUM HIGH </h2>
                <h2 class="school-name">SCHOOL & JR. COLLEGE OF SCIENCE</h2>
                <h6 style="margin-top: 1rem !important; margin-bottom: 1rem !important;">Laddha Nagar, Behind Government Hospital, Darwha, Maharashtra 445202</h6>
                <h4 ><span style="border: 2px solid red; border-radius:5px; padding:0px 10px;">RECEIPT</span></h4>
                <table class="table" style="width:100% !important;">
                    <tr style="width:100% !important; background-color:#fff;">
                        <td colspan="2" style="width:50%; border: 1px solid grey;"><h5 class="text-left"><span>Receipt No : <?php echo $payment_log->reciept_no ?></span></h5></td>
                        <td colspan="2" style="width:50%; border: 1px solid grey;"><h5 class="text-left"><span>Date : <?= date('d-m-Y', strtotime($payment_log->created_at)) ?></span></h5></td>
                    </tr>
                    <tr style="width:100% !important; background-color:#fff;">
                        <td colspan="4" style="width:100%; border: 1px solid grey;"><h5 class="text-left"><span>Student Name : <?php echo strtoupper($payment_log->fullname); ?></span></h5></td>

                    </tr>
                    <tr style="width:100% !important; background-color:#fff;">
                        <td style="width:30%; border: 1px solid grey;"><h5 class="text-left"><span>Class : <?= $payment_log->numeric_name ?></span></h5></td>
                        <td style="width:30%; border: 1px solid grey;"><h5 class="text-left"><span>Section : <?= $payment_log->section_name ?></span></h5></td>
                        <td colspan="2" style="width:40%; border: 1px solid grey;"><h5 class="text-left"><span>Session : <?= $payment_log->academic_year ?></span></h5></td>
                    </tr>
                    
                </table>
                <table class="table" style="width:100% !important;">
                    <tr style="width:100% !important; background-color:#fff;">
                        <td style="width:10px; border: 1px solid grey;"><h5 class="text-left"><span>SR.NO</span></h5></td>
                        <td style=" border: 1px solid grey;"><h5 class="text-left"><span>Particulars</span></h5></td>
                        <!-- <td style=" border: 1px solid grey;"><h5 class="text-left"><span>Total</span></h5></td>
                        <td style=" border: 1px solid grey;"><h5 class="text-left"><span>Paid</span></h5></td> -->
                        <td style=" border: 1px solid grey;"><h5 class="text-left"><span>Amount</span></h5></td>
                    </tr>
                    <?php
                    $count = 1;
                    $totalMoney=0;
                    $totalPaid=0;
                    $totalUnpaid=0;
                    ?>
                            <tr style="width:100% !important; background-color:#fff;">
                                <td style=" border: 1px solid grey;"><h5 class="text-left"><span><?= $count; ?></span></h5></td>
                                <td style=" border: 1px solid grey;"><h5 class="text-left"><span><?= 'Acadamic Fees' ?></span></h5></td>
                                <td style=" border: 1px solid grey;"><h5 class="text-left"><span><?= number_format($payment_log->total, 2) ?></span></h5></td>
                            </tr>    
                        <?php 
                        $count++; 
                        $totalPaid = $totalPaid + $payment_log->total;
                       ?>


                    <tr style="width:100% !important; background-color:#fff;">
                        <td colspan="2" style=" border: 1px solid grey;"><h5 class="text-left"><span>Total</span></h5></td>
                        <td style=" border: 1px solid grey;"><h5 class="text-left"><span><?= number_format($payment_log->total, 2) ?></span></h5></td>
                    </tr>
                    <tr style="width:100% !important; background-color:#fff;">
                        <td colspan="3" style=" border: 1px solid grey;"><h5 class="text-left"><span>In Words : <?=$in_word?></span></h5></td>
                        
                    </tr>
                    <tr style="width:100% !important; background-color:#fff;">
                        <td colspan="3"><h5 class="text-left mt-5"><span>Parent's Sign</span><span class="mr-5 ml-5 mt-5 pl-4 pr-4">School Copy</span><span class="mt-5">Clerk's Sign</span></h5></td>
                    </tr>
                    
                </table>

            </td>
        </tr>
    </table>
</div>
<button class="btn btn-danger btn--action " data-ma-action="print"><i class="zmdi zmdi-print"></i></button>
