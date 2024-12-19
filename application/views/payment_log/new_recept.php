<?php $convertor = new Numbertowords();?>
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
    @import url('https://fonts.googleapis.com/css2?family=Young+Serif&display=swap');
    .platypi-schoolName {
      font-family: "Young Serif", serif;
      font-weight: bolder; !important;
      font-style: normal;
    }

    .extra-big{
        font-size: 30px !important;
    }
</style>

<style type="text/css" media="print">
    @page {
        margin-top:-65px !important;
        margin-left:0px !important;
        margin-right:0px !important;
        margin-bottom:0px !important;
        padding:0px !important;       /* this affects the margin in the printer settings */
    }
    .invoice{
        min-width: 80%;
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
    padding: 0.1rem 0.1rem !important;
    }

    
</style>
</style>


        
           
<div class="invoice">
    <table class="table table-borderless" style="width:100% !important;">
        
        

        <tr class="text-justify" style="line-height: 3.1rem!important; background-color:#fff;">
        
            <td style="width:100% !important; border:2px solid grey;" class="text-center">
            <h6 class="text-right">Students Copy</h6>
            <table style="margin-top: 0px;margin-bottom: -10px;">
                    <tbody>
                        <tr>
                            <td>
                                <div class="invoice__header" style="padding:5px;margin-bottom: 0px; margin-top: 0px;">
                                    <img style="width:100px;height:80px; border-radius:38%;"class="invoice__logo" src="<?= site_url('resources/img/') ?>logo.png" alt="">
                                </div>
                            </td>

                            <td colspan="2" class="text-center" style="line-height:1.5; padding:0px;">
                            <b style="font-size:16px;">Sardar Patel Vidya Mandir, Yavatmal</b>  &nbsp;Regd No. MH 2582 (Y) F2530-1992<br>
                              <h3 class="school-name" style="line-height:1.5; margin:0; white-space:nowrap;">&nbsp;&nbsp;SARASWATI PUBLIC ENGLISH MEDIUM SCHOOL BABHULGAON
                              </h3>
                              <h6><span style="font-size: 16px; line-height:1.0; text-transform: none;"><b>Dist. Yavatmal</b></span></h6>
                            </td>

                           <!-- <td colspan="4" style="text-align:right;padding:0px 0px 0px 130px;">
                                <h6 class="text-right">Parents Copy</h6>
                            </td> -->
                        </tr>
                        
                    </tbody>
                </table>
                <hr style="height:2px;border-width:0;color:gray;background-color:gray">
               
                <table style="margin-left: auto; margin-right: auto; margin-top: 10px; width: 100%;">
    <tbody>
        <tr style="width: 100%; background-color: #fff;">
            <!-- Date and Serial Number -->
            <td style="width: 33%; text-align: left; padding: 0.5rem;">
                <div style="text-align: left;">
                    <!-- Date -->
                    <h5 class="text-left">
                        <span class="line">Date: <?= date('d-m-Y', strtotime($payment_log->created_at)) ?></span>
                    </h5>
                    <!-- Serial Number -->
                    <h5 class="text-left" style="margin-top: 0.5rem;">
                        <span class="line">No: <?= $payment_log->payment_log_id ?></span>
                    </h5>
                </div>
            </td>
            <!-- Receipt (Center) -->
            <td style="width: 33%; text-align: center;">
                <h4>
                    <span style="border: 2px solid red; padding: 0.1rem 0.5rem;">RECEIPT</span>
                </h4>
            </td>
            <!-- Contact Number -->
            <td style="width: 33%; text-align: right; padding: 0.5rem;">
                <h5>
                    <span>
                        <img src="<?= site_url('resources/img/') ?>smartphone-call.png" style="vertical-align: middle; width: 16px; height: 16px; margin-right: 5px;">
                        9767116089
                    </span>
                </h5>
            </td>
        </tr>
    </tbody>
</table>


                    


<!-- <table class="serialNo" style="width: 90% !important; margin: 0 auto;">
    <tr style="width: 100% !important; background-color: #fff;">-->
        <!-- Date and Serial No Container -->
      <!--  <td style="text-align: left; padding: 0.5rem;">
            <div style="display: inline-block; text-align: left;">-->
                
                <!-- Serial Number -->
           <!--     <h5 class="text-left" style="margin-top: 0.5rem;">
                    <span class="line">No: <?= $payment_log->payment_log_id ?></span>
                </h5>
            </div>
        </td>
    </tr>
</table> -->

                <table class="table" style="margin:0px auto; width:95% !important;">
                    
                    <tr class="text-justify" style="background-color:#fff; margin: 0px 30px; line-height: 2.1rem!important;">
                        <td colspan="4">
                            
                            <div style="margin:0px 60px; display: flex; justify-content: center; ">
                            
                                <i>&emsp; &emsp; &emsp; &emsp;The name of student  <b><span class="line"><?php echo strtoupper($payment_log->fullname); ?> </span></b>
                                Std. <b><span class="line"><?= $payment_log->numeric_name ?> </span></b> Term fees/ Tution fees for the month of  in words Rs. <b><span class="line"><?php echo $convertor->convert_number($payment_log->tuitionfees); ?> </span></b>.
                        
                            </i>
                            
                            </div>
                        </td>
                        <tr style="background-color:#fff;">
                       <td colspan="4"></td>  
                       </tr>     
                       

                    <tr style="background-color:#fff;">
                    <td colspan="4"></td>  
                       </tr> 


                    <tr style="width:100% !important; background-color:#fff;">
                        <td rowspan="4" width="30%"  style="vertical-align: top !important; padding: 0.2rem 1rem;" class="text-left">&ensp;
                        <h4 class="text-center"> <span style="border: 1px solid black; padding:5px 20px;">&#x20b9; &ensp;<?php echo $payment_log->tuitionfees; ?></span></h4>
                        </td>

                        <tr style="background-color:#fff;">
          <td colspan="4"></td>  
        </tr> 
        <tr>
          <td colspan="2" style="background-color:#fff;"></td>  
        </tr>
       
    <tr style="width: 100% !important; background-color: #fff;">
       
        <td rowspan="2" style="vertical-align: middle !important; padding: 0.2rem 1rem;">
        <br />
            <h4 class="text-left">
                <span style="margin-left: 150px; font-style: italic; font-weight: bold; font-size: 25px;">Thanks</span>
            </h4>
        </td>
    </tr>


<table class="headerfooter" style="margin-top: 1rem; width: 100%;">
    <tbody>
        <tr>
            <td style="padding: 0;">
                <h6 class="text-right" style="margin-left: 3rem;">H.M. / Clerk Signature</h6>
            </td>
        </tr>
    </tbody>
</table>

                    
              

                
            </table>
</div>

<!-- 2nd Receipt  -->

<div class="invoice">
    <table class="table table-borderless" style="width:100% !important;">
    <tr class="text-justify" style="line-height: 3.1rem!important; background-color:#fff;">
        
        <td style="width:100% !important; border:2px solid grey;" class="text-center">
        <h6 class="text-right">Parents Copy</h6>
        <table style="margin-top: 0px;margin-bottom: -10px;">
                <tbody>
                    <tr>
                        <td>
                            <div class="invoice__header" style="padding:5px;margin-bottom: 0px; margin-top: 0px;">
                                <img style="width:100px;height:80px; border-radius:38%;"class="invoice__logo" src="<?= site_url('resources/img/') ?>logo.png" alt="">
                            </div>
                        </td>

                        <td colspan="2" class="text-center" style="line-height:1.5; padding:0px;">
                        <b style="font-size:16px;">Sardar Patel Vidya Mandir, Yavatmal</b>  &nbsp;Regd No. MH 2582 (Y) F2530-1992<br>
                          <h3 class="school-name" style="line-height:1.5; margin:0; white-space:nowrap;">&nbsp;&nbsp;SARASWATI PUBLIC ENGLISH MEDIUM SCHOOL BABHULGAON
                          </h3>
                          <h6><span style="font-size: 16px; line-height:1.0; text-transform: none;"><b>Dist. Yavatmal</b></span></h6>
                        </td>

                       <!-- <td colspan="4" style="text-align:right;padding:0px 0px 0px 130px;">
                            <h6 class="text-right">Parents Copy</h6>
                        </td> -->
                    </tr>
                    
                </tbody>
            </table>
            <hr style="height:2px;border-width:0;color:gray;background-color:gray">
           
            <table style="margin-left: auto; margin-right: auto; margin-top: 10px; width: 100%;">
<tbody>
    <tr style="width: 100%; background-color: #fff;">
        <!-- Date and Serial Number -->
        <td style="width: 33%; text-align: left; padding: 0.5rem;">
            <div style="text-align: left;">
                <!-- Date -->
                <h5 class="text-left">
                    <span class="line">Date: <?= date('d-m-Y', strtotime($payment_log->created_at)) ?></span>
                </h5>
                <!-- Serial Number -->
                <h5 class="text-left" style="margin-top: 0.5rem;">
                    <span class="line">No: <?= $payment_log->payment_log_id ?></span>
                </h5>
            </div>
        </td>
        <!-- Receipt (Center) -->
        <td style="width: 33%; text-align: center;">
            <h4>
                <span style="border: 2px solid red; padding: 0.1rem 0.5rem;">RECEIPT</span>
            </h4>
        </td>
        <!-- Contact Number -->
        <td style="width: 33%; text-align: right; padding: 0.5rem;">
            <h5>
                <span>
                    <img src="<?= site_url('resources/img/') ?>smartphone-call.png" style="vertical-align: middle; width: 16px; height: 16px; margin-right: 5px;">
                    9767116089
                </span>
            </h5>
        </td>
    </tr>
</tbody>
</table>


                


<!-- <table class="serialNo" style="width: 90% !important; margin: 0 auto;">
<tr style="width: 100% !important; background-color: #fff;">-->
    <!-- Date and Serial No Container -->
  <!--  <td style="text-align: left; padding: 0.5rem;">
        <div style="display: inline-block; text-align: left;">-->
            
            <!-- Serial Number -->
       <!--     <h5 class="text-left" style="margin-top: 0.5rem;">
                <span class="line">No: <?= $payment_log->payment_log_id ?></span>
            </h5>
        </div>
    </td>
</tr>
</table> -->

            <table class="table" style="margin:0px auto; width:95% !important;">
                
                <tr class="text-justify" style="background-color:#fff; margin: 0px 30px; line-height: 2.1rem!important;">
                    <td colspan="4">
                        
                        <div style="margin:0px 60px; display: flex; justify-content: center; ">
                        
                            <i>&emsp; &emsp; &emsp; &emsp;The name of student  <b><span class="line"><?php echo strtoupper($payment_log->fullname); ?> </span></b>
                            Std. <b><span class="line"><?= $payment_log->numeric_name ?> </span></b> Term fees/ Tution fees for the month of  in words Rs. <b><span class="line"><?php echo $convertor->convert_number($payment_log->tuitionfees); ?> </span></b>.
                    
                        </i>
                        
                        </div>
                    </td>
                    <tr style="background-color:#fff;">
                   <td colspan="4"></td>  
                   </tr>     
                   

                <tr style="background-color:#fff;">
                <td colspan="4"></td>  
                   </tr> 


                <tr style="width:100% !important; background-color:#fff;">
                    <td rowspan="4" width="30%"  style="vertical-align: top !important; padding: 0.2rem 1rem;" class="text-left">&ensp;
                    <h4 class="text-center"> <span style="border: 1px solid black; padding:5px 20px;">&#x20b9; &ensp;<?php echo $payment_log->tuitionfees; ?></span></h4>
                    </td>

                    <tr style="background-color:#fff;">
      <td colspan="4"></td>  
    </tr> 
    <tr>
      <td colspan="2" style="background-color:#fff;"></td>  
    </tr>
   
<tr style="width: 100% !important; background-color: #fff;">
   
    <td rowspan="2" style="vertical-align: middle !important; padding: 0.2rem 1rem;">
    <br />
        <h4 class="text-left">
            <span style="margin-left: 150px; font-style: italic; font-weight: bold; font-size: 25px;">Thanks</span>
        </h4>
    </td>
</tr>


<table class="headerfooter" style="margin-top: 1rem; width: 100%;">
<tbody>
    <tr>
        <td style="padding: 0;">
            <h6 class="text-right" style="margin-left: 3rem;">H.M. / Clerk Signature</h6>
        </td>
    </tr>
</tbody>
</table>

                
          

            
        </table>
</div>

            </table>
</div>
<button class="btn btn-danger btn--action " data-ma-action="print"><i class="zmdi zmdi-print"></i></button>




                
                



                        
                   
                        
                
               



