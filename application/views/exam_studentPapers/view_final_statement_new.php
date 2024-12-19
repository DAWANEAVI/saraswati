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
    <table class="table table-bordeless" style="border:2px solid #000;">
       
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
    
</td>
        </tr>
        <tr>
        <td colspan="4" class="text-center" style="line-height:1.5;">
              <h4 class="school-name" style="line-height:1.5; padding-top: 14px;">POGRESS REPORT 2024-25</h4>
          </td>
         
         
          <td >
          </td>
        </tr>
        <tr>
          <td colspan="1">
          </td>
          <td colspan="1" class="text-left" style="line-height:1.5; border:1px solid #f2f4f5;">
            <h5  style="line-height:1.5;">Student Name :- <?php echo $studentData['fullname']; ?></h5>
          </td>
          <td colspan="1"  style="line-height:1.5; border:1px solid #f2f4f5;">
              <h5 style="line-height:1.5;">Class :- <?php echo ' '.$studentData['numeric_name'].' ( '.$studentData['section_name'].' ) ';?> </h5>
          </td>
          <td colspan="1">
              
          </td>
        </tr>
        <tr>
          <td colspan="4"></td>  
        </tr>
        <tr>
          <td colspan="4"></td>  
        </tr>
        <tr>
          <td colspan="4" style="padding:0px !important;">
           <table  class="table table-bordered" style="background-color: #ffffff; margin-bottom:0px !important;" >
              <thead>
                <tr>
                  <th>SR.No</th>
                  <th>Subject</th>
                  <?php 
                   //$examStats = [];
                   foreach ($exams as $key => $value) { ?>
                    <th <?php if($evaluation == 0) {echo 'colspan="2"';}?> ><?php
                    //  $examStats[$key] = [
                    //   'examName' => $value['examName'],
                    //   'TotalMarks' => 0,
                    //   'Marks' => 0,
                    // ]; 
                    echo $value['examName']; ?></th>
                  <?php } ?>
                  <th>Remarks</th>
                </tr>
              </thead>
              <tbody id="element">
                <?php foreach ($result as $rkey => $rvalue) { ?>
                  
                
                <tr>
                  <td><?php echo $rkey + 1;?></td>
                  <td><?php echo $rvalue['subjectName']; ?></td>
                  <?php foreach ($rvalue['subjectResult'] as $srk => $srv) { ?>
                    <?php if($evaluation  == 0) {?>
                      <td>
                        <?php 
                        // $examStats[$srk]['TotalMarks'] = $examStats[$srk]['TotalMarks'] + $srv['totalMarks']; 
                        // $examStats[$srk]['Marks'] = $examStats[$srk]['Marks'] + $srv['marks']; 
                        echo $srv['totalMarks']; ?>
                      </td>
                      <td>
                        <?php 
                        // $examStats[$srk]['TotalMarks'] = $examStats[$srk]['TotalMarks'] + $srv['totalMarks']; 
                        // $examStats[$srk]['Marks'] = $examStats[$srk]['Marks'] + $srv['marks']; 
                        echo $srv['marks']; ?>
                      </td>
                    <?php }else{ ?>
                      <td>
                        <?php 
                        // $examStats[$srk]['TotalMarks'] = $examStats[$srk]['TotalMarks'] + $srv['totalMarks']; 
                        // $examStats[$srk]['Marks'] = $examStats[$srk]['Marks'] + $srv['marks']; 
                        echo $srv['grade']; ?>
                      </td>
                    <?php } ?>
                  <?php }?>
                  <?php if($rkey == 0){?>
                  <td style="vertical-align: middle;" class="text-center" rowspan="<?php if($evaluation == 0) {echo count($result) +1;}else{echo count($result);}?>" ><h5 style="line-height:1.5;"><?php if($evaluation == 1) echo $grandGrade;?></h5><h5 style="line-height:1.5;"><?php echo $grandRemark;?></h5> </td>
                  <?php }?>
                </tr>
                <?php } ?>
                <?php if($evaluation  == 0) {?>
                <tr>
                  <td colspan="2"> Total</td>
                  <?php foreach ($examStats as $ek => $ev) { ?>
                    <th>
                      <?php //echo $ev['Marks'].'/'.$ev['TotalMarks'];
                          echo $ev['TotalMarks'];
                      ?>
                    </th>
                    <th>
                      <?php //echo $ev['Marks'].'/'.$ev['TotalMarks'];
                          echo $ev['Marks'];
                      ?>
                    </th>
                  <?php } ?>
                </tr>
                <?php } ?>
              </tbody>
              
            </table>
          </td>
        </tr>
        <!--
        <tr>
          <td colspan="4">
            <?php 
              echo $parameter['pt'];
            ?>
          </td>  
        </tr>-->
        <tr>
          <td colspan="4"></td>  
        </tr>
        
        <tr>
          <td></td>
          <td colspan="3" style="padding:0px !important;">
           <table  class="table table-bordered" style="background-color: #ffffff; margin-bottom:0px !important;" >
              <!-- <thead>
                <tr>
                  <th>PC of Marks</th>
                  <th>Grade</th>
                </tr>
              </thead> -->
              <tbody id="element">
                <tr>
                  <th>Result</th>
                  <?php foreach ($examStats as $ek => $ev) { ?>
                    <th><?php echo $ev['examName'];?></th>
                  <?php } ?>
                  <th>Total Days</th>
                  <th>Attendend Days</th>
                  <th>Attendance Percentage</th>
                </tr>
                <tr>
                  <th>
                    <?php 
                        echo $evaluation == 1 ? 'Grade' : 'Percentage';
                      ?>
                  </th>
                  <?php foreach ($examStats as $ek => $ev) { ?>
                    <th>
                      <?php //echo $ev['Marks'].'/'.$ev['TotalMarks'];
                         echo $evaluation == 1 ? $ev['Grade'] : $ev['Percentage'].' %';
                      ?>
                    </th>
                  <?php } ?>
                  <th><?php echo $total_date_in_year;?></th>
                  <th><?php echo $totalDateInYearByStud; ?></th>
                  <th>
    <?php 
    if ($total_date_in_year > 0) {
        echo round(($totalDateInYearByStud / $total_date_in_year) * 100, 2) . '%';
    } else {
        echo 'N/A'; // Or a suitable fallback value
    }
    ?>
</th>
                </tr>
              </tbody>
              
            </table>
          </td>


          
        </tr>
        <tr>
          <td colspan="4"></td>  
        </tr>
        <tr>
          <td colspan="4"></td>  
        </tr>
        <tr>
          <td colspan="4"></td>  
        </tr>
        <?php if($evaluation == 1) { ?>
        <tr>
          <td colspan="4" style="padding:0px !important;">
           <table  class="table table-bordered" style="background-color: #ffffff; margin-bottom:0px !important;" >
              <!-- <thead>
                <tr>
                  <th>PC of Marks</th>
                  <th>Grade</th>
                </tr>
              </thead> -->
              <tbody id="element">
                <tr>
                  <th>PC of Marks</th>
                  <?php foreach ($exam_grades as $gk => $gv) { ?>
                    <th><?php echo $gv['min_grade_range'].'%  to  '.$gv['max_grade_range'].'%';?></th>
                  <?php } ?>
                </tr>
                <tr>
                  <th>Grade</th>
                  <?php foreach ($exam_grades as $gk => $gv) { ?>
                    <th><?php echo $gv['grade'];?></th>
                  <?php } ?>
                </tr>
              </tbody>
              
            </table>
          </td>
        </tr>
        <?php } ?>
        <tr>
          <td colspan="4"></td>  
        </tr>
        <tr>
          <td colspan="4"></td>  
        </tr>
        <tr>
          <td colspan="4"></td>  
        </tr>
        <tr>
          <td colspan="4"></td>  
        </tr>
        <tr>
          <td colspan="4"></td>  
        </tr>
        <tr id="sign" style="margin-top:40px!important;">
            <td class="text-left">Class_Teacher</td>
            <td class="text-center" colspan="2">Principal</td>
            <td class="text-right">Parents</td>
        </tr>
        <tr>
          <td colspan="4"></td>  
        </tr>
        <tr>
          <td colspan="4"></td>  
        </tr>
    </table>




</div>
<button class="btn btn-danger btn--action " data-ma-action="print"><i class="zmdi zmdi-print"></i></button>

