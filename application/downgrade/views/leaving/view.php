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
</style>
<style type="text/css" media="print">
    @page {
       
        margin-top:-20px!important;/* this affects the margin in the printer settings */
    }
</style>
<div class="invoice">
    <table class="table table-borderless" style="border:2px solid #000;">
       
        <tr>

            <td colspan="4" class="text-center">
                <img style="width:90px;height:90px;"class="invoice__logo" src="<?= site_url('resources/img/') ?>logo.png" alt=""><br />
                <b>SHRI KESHAVSWAMI SHIKSHAN SANSTHA</b>
                <h1 class="school-name">OXFORD ENGLISH SCHOOL MOUDA</h1>
                <h5>Tah.Mouda,Dist.Nagpur</h5>
            </td>
        </tr>
        <tr>
            <td colspan="2">Phone No. : <span class="line"><?= PHONE_NO ?></span></td>
            <td colspan="2"class="text-right"> E-mail. : <span class="line"><?= EMAIL ?></span></td>
        </tr>
        
        <tr>
           
            <td colspan="2"> <b>Sr. No.</b><span class="line"><?php echo ($leaving_certificate['leaving_id'])?></span></td>
           
            <td colspan="2"class="text-center"> <b>General /Register No.</b><span class="line"><?php echo ($student->registration_no) ?></span></span></td>
        </tr>
        
        <tr>
            <td colspan="4">School Recog. No  :  शिक्षण उपसंचालक नागपूर विभाग पत्र क्र. /ब/मान्यता 7602/2010</td>
        </tr>
        <tr>
            <td colspan="4">Medium : English</td>
        </tr>
        <tr>
            <td>UDISE NO.27090700110</td>
            <td colspan="2" class="text-center"> Board : Nagpur</td>
            <td class="text-right"> Concerned No. : 9764948351</td>
           
        </tr>
        <tr style="border-top:2px solid #000;" class="text-center">
            <td colspan="4"><h2 class="school-name">SCHOOL LEAVING CERTIFICATE</h2></td>
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
            <td colspan="2"> Full Name of the Student : <span class="line"><?= ucwords($leaving_certificate['fullname']); ?></span></td>
            <td colspan="2">Father Name <span class='line'><?php echo $leaving_certificate['father_name'] ?></span></td>
        </tr>
        <tr>
            <td colspan="4">Surname <span class='line'><?= $leaving_certificate['surname'] ?></span></td>
        </tr>
        <tr>
            <td colspan="4"> Mother's Name : <span class="line"><?= ucwords($leaving_certificate['mother_name']); ?></span></span></td>
        </tr>
        <tr>
            <td>Nationality : <b><?php echo $student->nationality ?></b></td>
            <td> Mother Tounge : <b><span class="line"><?php echo $student->mother_tounge ?></b></span></td>
            <td>Religion : <b><?php echo $student->religion ?></b></td>
            <td> Caste : <b><span class="line"><?php echo $student->caste ?></b></span></td>
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
            <td colspan="2">Date Of Birth (Christian Era) : <b><span class="line"><?php echo date('d/m/Y', strtotime($student->dob)) ?></span></b></td>
            <td colspan="2">
                <?php
                $date_data = explode('-', $student->dob);
                $convertor = new Numbertowords();
                ?>
                (In the Words) : <span class="line"><?php echo $convertor->convert_number($date_data[2]) ?> <?php echo date('F', strtotime($student->dob)) ?> <?php echo $convertor->convert_number($date_data[0]) ?></span>
            </td>
        </tr>
        
        <tr>
            <td colspan="3"> Previous School Attended : <span class="line"><?php echo $student->last_school ?></span></td>  
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
            <td colspan="3">From Which Class studying & In words : <span class="line"><?php echo ($leaving_certificate['studying_from_class']) . '<sup>' . ordinal($leaving_certificate['studying_from_class']) . '</sup>' ?></span>
                </td>
            <td>Date : <span class="line"><?php echo date('M Y', strtotime(strtr($leaving_certificate['studying_since'], '/', '-'))); ?></span>

        </tr>
        <tr>
            <td colspan="4"> In Words : <span class="line"><?php echo $convertor->convert_number($leaving_certificate['studying_from_class']) ?></span> <span class="line">Since <?php echo date('F', strtotime(strtr($leaving_certificate['studying_since'],'/','-'))) ?>  <?php echo $convertor->convert_number(date('Y',strtotime(strtr($leaving_certificate['studying_since'], '/', '-')))) ?></span></td>
            
        </tr>
        <tr>
            <td colspan="2"> Reason of leaving school : <span class="line"><?php echo $leaving_certificate['reason'] ?></span></td>
            <td colspan="2">Remark : <span class="line"><div class="line"><?php echo $leaving_certificate['remark'] ?></div></span></td>
        </tr>
        
        <tr style="border-top:2px solid #000;" class="text-center">
            <td colspan="4"> This is to Certify that the above information in the accordance with school general register No.
            <p style="text-align:left">Date :  <?= date('d/m/Y', strtotime($leaving_certificate['date_of_issueing'])); ?></p>
            </td>
        </tr>
        <tr>
          <td colspan="4"></td>  
        </tr>
        <tr>
          <td colspan="4"></td>  
        </tr>
        <tr id="sign" style="margin-top:40px!important;">
           
            
            <br />
            <br />
            <td>Class Teacher</td>
            <td class="text-center" colspan="2">Clerk</td>
            <td class="text-right">Head Master</td>
        </tr>
    </table>




</div>
<button class="btn btn-danger btn--action " data-ma-action="print"><i class="zmdi zmdi-print"></i></button>
