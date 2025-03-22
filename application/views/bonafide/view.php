<?php
include APPPATH . 'third_party/Numbertowords.php';
?>
<?php

function ordinal($number) {

    $last = substr($number, -1);
    if ($last > 3 || $last == 0 || ( $number >= 11 && $number <= 19 )) {
        $ext = 'th';
    } else if ($last == 3) {
        $ext = 'rd';
    } else if ($last == 2) {
        $ext = 'nd';
    } else {
        $ext = 'st';
    }
    return $ext;
}
function numberToRomanRepresentation($number) {
    $map = array('X' => 10, 'IX' => 9, 'V' => 5, 'IV' => 4, 'I' => 1);
    $returnValue = '';
    while ($number > 0) {
        foreach ($map as $roman => $int) {
            if($number >= $int) {
                $number -= $int;
                $returnValue .= $roman;
                break;
            }
        }
    }
    return $returnValue;
}
?>
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
</style>
<style type="text/css" media="print">
    @page {
       
        margin-top:-20px!important;/* this affects the margin in the printer settings */
    }
</style>
<div class="invoice">
    <table class="table table-borderless" style="border:2px solid #000;">

        <tr>
            <td  class="text-center">
    
             <img style="width:80px;height:80px;" class="invoice__logo" src="<?= site_url('resources/img/') ?>logo.png" alt=""><br style="display:block !important;">
                <br style="display:block !important;white-space:nowrap;">
                <td colspan="2" class="text-center" style="line-height:1.5; padding:0px;">
                       <span style="font-size:18px;">Run Under Sardar Patel Vidya Mandir, Yavatmal</sapn> 
                             <br>
                <h3 class="school-name" style="line-height:1.5; margin:0; white-space:nowrap;">
                         SARASWATI PUBLIC ENGLISH MEDIUM SCHOOL BABHULGAON
                </h3>
                <h6><span style="font-size: 20px; text-align: left; margin-left: -140px; line-height:1.5; text-transform: none;"><b>Dist. Yavatmal</b></span></h6>
               <!-- <h6 style="line-height:0.8; text-align: left; margin-left: 10px;" class="text-center;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;E-mail: <span class="line"><?= 'saraswatips@gmail.com' ?></span></h6> -->
               <!-- <h6 style="line-height: 0.8; text-align: left; margin-left: 170px;" class="text-center;">E-mail: <span class="line"><?= 'saraswatips@gmail.com' ?></span>
</h6> -->

            </td>
             <td colspan="2"class="text-right">&nbsp;</td>
            </td>
        </tr>
       
        
        <tr>
            <td colspan="2"><b>School Recog No : MH 2582 (Y) F2530-1992</b></td>
            <td colspan="2"class="text-right"> <b>Phone No: 9767116089</b></td>
        </tr>
        <tr>
            <td colspan="2"><b>Bonfide No : <?= $bonafide_certificate['bona_no']; ?> </b></td>
            <td colspan="2"class="text-right"> <b>UDISE NO: 271402005110</b></td>
        </tr>

        <tr>
           
            <td colspan="2" style="text-align: left; padding-right: 10px;"> <b>General /Register No : <?= $student->registration_no; ?> </b></td>
           
            <td colspan="2"class="text-right"> <b>Date : <?= date('d-m-Y', strtotime($bonafide_certificate['date'])); ?></b></td>
        </tr>
     <!--   <tr>
          <td colspan="4"></td>  
        </tr> -->

        <tr style="border-top:2px solid #000;">
          <td colspan="4"></td>  
        </tr>
    
        <tr class="text-center">
            <td colspan="4"><h2 class="school-name">BONAFIDE CERTIFICATE</h2></td>
        </tr>
        <tr>
          <td colspan="4"></td>  
        </tr>
        
        
        <tr class="text-left">
    <td colspan="3">
        <table style="width: 100%; font-size: 16px;">
            <tr>
                <!-- Left side paragraph content -->
                <td style="vertical-align: top;padding-left: 40px;">
                    <p style="line-height: 1.0em;text-indent: 40px; padding-left: 40px;"><i>&emsp;This is to Certify that <?php echo $student->gender == "Female" ? 'Kumari': 'Kumar';?><b><span class="line"><?= $bonafide_certificate['fullname']; ?></span></b>
                    is a bonafide</p>
                    <p style="line-height: 1.0em;text-indent: 40px; padding-left: 40px;">Student of this School for the Academic Session<b><span class="line"><?= $bonafide_certificate['session']; ?></span></b>.</p>
                    <p style="line-height: 1.0em;text-indent: 40px; padding-left: 40px;"><?php echo $student->gender == "Female" ? 'She': 'He';?> is in Class<b><span class="line"><?= $bonafide_certificate['class']; ?></span></b> <?php echo $student->gender == "Female" ? 'she': 'he';?> has a good character to my knowledge. </p>
                    <p style="line-height: 1.0em;text-indent: 40px; padding-left: 40px;"> According to our school record <?php echo $student->gender == "Female" ? 'her': 'his';?> caste is <b><span class="line"><?= $bonafide_certificate['caste']; ?></span></b> and <?php echo $student->gender == "Female" ? 'her': 'his';?> date of birth</p><p style="line-height: 1.0em;text-indent: 40px; padding-left: 40px;">is<b><span class="line"><?= date('d-m-Y', strtotime($bonafide_certificate['dob'])); ?></span></b>
                    (in words)<b><span class="line">
                    <?php $date_data = explode('-',  $bonafide_certificate['dob']); 
                    $convertor = new Numbertowords();?>
                    <?php echo $convertor->convert_number($date_data[2]) ?> 
                    <?php echo date('F', strtotime($bonafide_certificate['dob'])) ?> 
                    <?php echo $convertor->convert_number($date_data[0]) ?>
                    </span></b>.</i></p>
                </td>

                <!-- Right side photo content -->
                <td style="vertical-align: top; padding-left: 40px;Padding-right:40px;">
                    <img style="width:140px; height:160px; padding:3px 10px 25px 5px; border-radius:5px;" class="invoice__logo" src="<?= site_url('resources/img/') ?>photo.png" alt="">
                </td>
            </tr>
        </table>
    </td>
</tr>
      <!--  <tr>
          <td colspan="4"></td>  
        </tr>  -->
   <!--     <tr class="text-left" style="line-height: 2.1rem!important;">
           <td colspan="4">  
                <div style="display: flex; justify-content: left; font-size: 20px ;">
                <div>
                    <p><i>&emsp; &emsp; &emsp; &emsp; This is to Certify that Miss/Mast. <b><span class="line"><?= $bonafide_certificate['fullname']; ?></sapn></b></i> </p>
                    <p><i>&emsp; &emsp; &emsp; daughter / son of shri  <b><span class="line"><?= $bonafide_certificate['fathername']; ?></span></b> </i></p>
                    <p><i>&emsp; &emsp; &emsp; is bonafide student of this school for the Academic Session <b><span class="line"><?= $bonafide_certificate['session']; ?></span></b>.</i></p>
                    <p><i>&emsp; &emsp; &emsp; He / She is in Class <b><span class="line"><?= $bonafide_certificate['class']; ?> </span></b> he/she has a good moral character to my knowledge.</i></p>
                    <p><i>&emsp; &emsp; &emsp; According to our school record her / his caste is <b><span class="line"><?= $bonafide_certificate['caste'] ?></span></b> and her / his date of birth </b>.</i></p>
                    <p><i>&emsp; &emsp; &emsp; is <b><span class="line"><?= date('d-m-Y', strtotime($bonafide_certificate['dob'])); ?></span></b> in Words <b><span class="line"><?php $date_data = explode('-',  $bonafide_certificate['dob']); $convertor = new Numbertowords();?><?php echo $convertor->convert_number($date_data[2]) ?> <?php echo date('F', strtotime($bonafide_certificate['dob'])) ?> <?php echo $convertor->convert_number($date_data[0]) ?></span></b>.</i></p>
                </div>
                </div>
           </td> 
        </tr>  -->
     
     <!--   <tr>
          <td colspan="4"></td>  
        </tr>
        <tr>
          <td colspan="4"></td>  
        </tr> -->

        <tr style="border-top:2px solid #000;" class="text-center">
            
        </tr>
        <tr>
          <td colspan="4"></td>  
        </tr>
        <tr>
          <td colspan="4"></td>  
        </tr>
      <!--  <tr>
          <td colspan="4"></td>  
        </tr>-->
      <!--  <tr>
          <td colspan="4"></td>  
        </tr> -->
        <tr id="sign" style="margin-top:40px!important;">  
            <br />
            <br />
            <br/>
            
            <tr>
          <td colspan="4"></td>  
        </tr> 
        <tr>
          <td colspan="2"></td>  
        </tr> 
            
            <td colspan="2" class="text-left"><span class="ml-5">Date : <?= date('d-m-Y', strtotime($bonafide_certificate['date'])); ?></span></td>
            
            <td  colspan="2" class="text-right"><span class="mr-5">Head Master</span></td>
        </tr>
     <!--   <tr>
          <td colspan="4"></td>  
        </tr> -->
      <!--  <tr>
          <td colspan="4"></td>  
        </tr> -->
    </table>




</div>
<button class="btn btn-danger btn--action " data-ma-action="print"><i class="zmdi zmdi-print"></i></button>
