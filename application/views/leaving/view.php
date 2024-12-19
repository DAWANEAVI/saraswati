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
   .headerImg{
        margin-right:18rem;
    }
</style>
<style type="text/css" media="print">
    @page {
       
        margin-top:-20px!important;/* this affects the margin in the printer settings */
    }
    .headerImg{
        margin-right:9rem;
    }
</style>
<div class="invoice">
    <table class="table table-borderless" style="border:2px solid #000;">

    <?php if ($leaving_certificate['leaving_id']==1): ?>
        <tr>
            
            <td colspan="4" style="align:right; padding:0px;" class="text-right"><span class="line"><?= 'Original Copy' ?></span></td>
        </tr>
    <?php elseif ($leaving_certificate['leaving_id']==4): ?>
        <tr>
            <td colspan="4" style="align:right; padding:0px;" class="text-right"><span class="line"><?= 'Duplicate Copy' ?></span></td>
        </tr>
    <?php elseif ($leaving_certificate['leaving_id']==5): ?>
        <tr>
            <td colspan="4" style="align:right; padding:0px;" class="text-right"><span class="line"><?= 'Triplicate Copy' ?></span></td>
        </tr>
    <?php endif; ?>

        <tr>
        
        </tr>
        <tr>
        <td colspan="1" class="text-left" style="padding:0px;">
    <img class="headerImg" style="width:90px; height:90px; display:block; margin-left:auto; margin-right:0;" class="invoice__logo" src="<?= site_url('resources/img/') ?>logo.png" alt="">
    <br style="display:block !important;">
</td>

<td colspan="2" class="text-center" style="line-height:1.5; padding:0px;">
    <b style="font-size:16px;">Sardar Patel Vidya Mandir, Yavatmal</b> 
    &nbsp;Regd No. MH 2582 (Y) F2530-1992<br>
    <h3 class="school-name" style="line-height:1.5; margin:0; white-space:nowrap;">
        SARASWATI PUBLIC ENGLISH MEDIUM SCHOOL BABHULGAON
    </h3>
    <h6><span style="font-size: 16px; line-height:1.5; text-transform: none;"><b>Dist. Yavatmal</b></span></h6>
    <h6 style="line-height:0.8;" class="text-center;">E-mail: <span class="line"><?= 'saraswatips@gmail.com' ?></span></h6>
</td>



        </tr>
       
            
            
        
        <tr>
           
            <td colspan="2"> Sr. No.<span class="line"><?php echo ($leaving_certificate['leaving_id'])?></span></td>
           
            <td colspan="2"class="text-right"> General /Register No.<span class="line"><?php echo ($student->registration_no) ?></span></span></td>
        </tr>
        
        <tr>
            <td colspan="2">School Recognition No  : </td>
            <td colspan="2" class="text-right">Medium :<b> English</b></td>
        </tr>
      
        <tr>
            <td colspan="2">UDISE NO. :<b>271402005110</b></td>
            <td colspan="2" class="text-right"> Board :<b> State Board</b></td>
           
           
        </tr>
        <tr style="border-top:2px solid #000;" class="text-center">
            <td colspan="4"><h3 class="school-name">SCHOOL LEAVING CERTIFICATE</h3></td>
        </tr>
        <tr>
            <td>STUDENT ID</td>
            <td colspan="3"> <?php
                $array = array_map('intval', str_split($student->saral_id));
                $digit_count = count($array);
                $start = 19 - $digit_count;
                $big_offset = $digit_count - 1;
                $offset = 0;
                for ($i = 1; $i <= 19; $i++) {
                    ?>
                    <span class="field <?php echo ($i == 19 ? 'field-last' : ''); ?>">
                        <?php
//                     echo $start.' '.$i;
                        if ($i > $start) {
                            echo $array[$offset];
                            $offset++;
                        } else {
                            echo '0';
                        }
                        ?>
                    </span>
                    <?php
                }
                ?></td>
        </tr>
        <tr>
            <td>UID NO.(Aadhar No.)</td>
            <td colspan="3"><?php
                $array = array_map('intval', str_split($student->aadhar_no));
                foreach ($array as $k => $v) {
                    ?>
                    <span class="field <?php echo ($k == 11 ? 'field-last' : ''); ?>"><?php echo $v ?></span>
                    <?php
                }
                ?></td>
        </tr>
        <tr>
            <td colspan="3"> Full Name of the Student : <span class="line"><?= ucwords($leaving_certificate['sname']); ?></span></td>
            
        </tr>
        <tr>
        <td colspan="2">Father Name <span class='line'><?php echo $leaving_certificate['fname'] ?></span></td>
            <td colspan="4">Surname <span class='line'><?= $leaving_certificate['suname'] ?></span></td>
        </tr>
        <tr>
            <td colspan="4"> Mother's Name : <span class="line"><?= ucwords($leaving_certificate['mname']); ?></span></span></td>
        </tr>
        <tr>
            <td>Nationality : <b><?php echo $student->nationality ?></b></td>
            <td> Mother Tounge : <b><span ><?php echo $student->mother_tounge ?></b></span></td>
            <td>Religion : <b><?php echo $student->religion ?></b></td>
            <td> Caste : <b><span ><?php echo $student->caste ?></b></span></td>
        </tr>
        <tr>
            <td>  Sub-Caste : <span class="line"><?php echo $student->category ?></span></td>
            <td> Place Of Birth : <b><?php echo $student->place_of_birth ?></b></td>
            <td> Tah : <b><span class="line"><?php echo $leaving_certificate['b_tah'] ?></b></span></td>
            <td>Dist : <b><span class="line"><?php echo $leaving_certificate['b_dist'] ?></b></span></td>
        </tr>
        <tr>
            <td colspan="2"> State : <b><span class="line"><?php echo $leaving_certificate['b_state'] ?></span></b></td>
            <td colspan="2">Country : <b><span class="line"><?php echo $leaving_certificate['b_country'] ?></b></span></td>
        </tr>
        <tr>
            <td colspan="4">Date Of Birth (Month and Year) : <b><span class="line"><?php echo date('d/m/Y', strtotime($student->dob)) ?></span></b></td>
           
        </tr>

        <tr>
           
            <td colspan="4">
                <?php
                $date_data = explode('-', $student->dob);
                $convertor = new Numbertowords();
                ?>
                (In the Words) : <span class="line"><?php echo $convertor->convert_number($date_data[2]) ?> <?php echo date('F', strtotime($student->dob)) ?> <?php echo $convertor->convert_number($date_data[0]) ?></span>
            </td>
        </tr>
        
        <tr>
            <td colspan="3"> Last School Attended : <span class="line"><?php echo $student->last_school ?></span></td>  
            <td> Class :<span class="line"><?php echo $student->last_class ?></span></td>
        </tr>
        <tr>
            <td colspan="3">  Date Of Admission : <span class="line"><?php echo date('d/m/Y', strtotime($student->register_date)) ?></span></td>
            <td> Class :<span class="line"><?php echo $student->sought_admission_in_class ?></span></td>
        </tr>
        <tr>
            <td colspan="3">Progress in the study : <span class="line"><?php echo $leaving_certificate['progress'] ?></span></td>
            <td> Conduct :<span class="line">Good</span></td>
        </tr>
        <tr>
            <td colspan="4">Date of leaving School : <span class="line"> <?= date('d/m/Y', strtotime($leaving_certificate['date_of_leave'])); ?></span></td>
        </tr>
        <tr>
            <td colspan="3">Standard in which studing : <span class="line"><?php echo ($leaving_certificate['studying_from_class']) . '<sup>' . ordinal($leaving_certificate['studying_from_class']) . '</sup>' ?></span>
                </td>
            <td>and since : <span class="line"><?php echo date('F Y', strtotime(strtr($leaving_certificate['studying_since'], '/', '-'))); ?></span>

        </tr>
        <!--
        <tr>
            <td colspan="4"> In Words : <span class="line">
            <?php 
                if($leaving_certificate['studying_from_class'] < 4) {
                    
                if($leaving_certificate['studying_from_class'] == 1 ){ echo "First"; }elseif($leaving_certificate['studying_from_class'] == 2){echo 'Second';}elseif($leaving_certificate['studying_from_class'] == 3){ echo "Third";}
                
                }else{
                    if($leaving_certificate['studying_from_class'] == 5) {echo 'Fifth';
                        
                    }elseif($leaving_certificate['studying_from_class'] == 8){echo 'Eighth';}
                    elseif($leaving_certificate['studying_from_class'] == 9){echo 'Ninth';
                        
                    }else{
                        echo $convertor->convert_number($leaving_certificate['studying_from_class']). ordinal($leaving_certificate['studying_from_class']);
                        
                    }
                    
                }
                  ?></span> 
                  <span class="line">Since <?php echo date('F', strtotime(strtr($leaving_certificate['studying_since'],'/','-'))) ?>  <?php echo $convertor->convert_number(date('Y',strtotime(strtr($leaving_certificate['studying_since'], '/', '-')))) ?></span></td>
            
        </tr>-->
        <tr>
            <td colspan="4"> Reason of leaving School : <span class="line"><?php echo $leaving_certificate['reason'] ?></span></td>
           
        </tr>

        <tr>
            <td colspan="4">Last examination Passed or Failed : <span class="line"><div class="line"><?php echo $leaving_certificate['remark'] ?></div></span></td>
        </tr>

        <tr>
            <td colspan="4">Remark : <span class="line"><div class="line"><?php echo $leaving_certificate['remark'] ?></div></span></td>
        </tr>
        
        <tr style="border-top:2px solid #000;" class="text-center">
            <td colspan="4"> Certify that the above information in the accordance with School general Register No.
            <p style="text-align:left"><br />Date :  <?= date('d/m/Y', strtotime($leaving_certificate['date_of_issueing'])); ?></p>
            </td>
        </tr>
       
        
        <tr id="sign" style="margin-top:40px!important;">
           
            
            <br />
            <br />
            <br/>
            <td colspan="2" class="text-left"><b>Class Teacher</b></td>
            
            <td colspan="2" class="text-right"><b>Head Master</b></td>
        

        </tr>
        <tr style="border-top:2px solid #000;" class="text-center">
            <td colspan="4"> <b> Note </b>:Action will be taken for Unauthorized Change. </td>
            </td>
        </tr>
              
    </table>


</div>
<button class="btn btn-danger btn--action " data-ma-action="print"><i class="zmdi zmdi-print"></i></button>
