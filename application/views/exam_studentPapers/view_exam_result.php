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
    
</td>
        </tr>
        <tr>
          <!--<td  class="text-center" style="line-height:1.5;">
              <img style="width:90px;height:70px;"class="invoice__logo" src="<?= site_url('resources/img/') ?>logo.png" alt=""><br style="display:block !important;">    
          </td>-->
          <td colspan="4" class="text-center" style="line-height:1.5;">
              <h4 class="school-name" style="line-height:1.5; padding-top: 14px;"><?php echo strtoupper($examName) ;?> RESULT</h4>
          </td>
          <td >
          </td>
        </tr>
       
        <tr>
          <td colspan="1">
          </td>
          <td colspan="1" class="text-left" style="line-height:1.5; border:1px solid #f2f4f5;">
            <h5  style="line-height:1.5;">Student Name :- <?php echo $student['fullname']; ?></h5>
          </td>
          <td colspan="1"  style="line-height:1.5; border:1px solid #f2f4f5;">
              <h5 style="line-height:1.5;">Class :- <?php echo ' '.$student['numeric_name'].' ( '.$student['section_name'].' ) ';?> </h5>
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
          <table id="table-student"  class="table table-bordered" style="background-color: #ffffff; margin-bottom:0px; margin-left:12px !important;">
            <thead class='thead-default'>
            <tr>
                <th>Sr No</th>
                <th>Subject Name</th>
                <th>Paper Date</th>
                <th>Total Marks </th>
                <!-- <th>Passing Marks </th> -->
                <th>Obtained Marks</th>
                <?php if($exam_acadamicExams['evaluation']  == 0) {?><th>Percentage</th><?php } ?> 
                <?php if($exam_acadamicExams['evaluation']  == 1) {?><th>Grades</th> <?php } ?>
            </tr>
            </thead>
            
            <tbody>
              <?php foreach ($paperData as $key => $value) { ?>
                <tr>
                  <td><?php echo $key+1;?></td> 
                  <td><?php echo $value['subjectName']; ?></td>
                  <td><?php echo $value['date']; ?></td>
                  <td><?php echo $value['totalMarks']; ?></td>
                  <!-- <td><?php echo $value['passingMarks']; ?></td> -->
                  <td><?php echo $value['obtainedMarks']; ?></td>
                  <?php if($exam_acadamicExams['evaluation']  == 0) {?><td><?php echo $value['percentage'] .' %'; ?></td> <?php }?>
                  <?php if($exam_acadamicExams['evaluation']  == 1) {?><td><?php echo $value['grade']; ?></td> <?php }?>
                </tr>
              <?php } ?>
               <tr>
                <th colspan="3">Total</th>
                <th><?php echo $total_marks; ?></th>
                <th><?php echo $obtained_total; ?></th>
                <th><?php if($exam_acadamicExams['evaluation']  == 0) {echo $total_percentage.' %';}else{echo $total_grade;}?></th>
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
        <?php if($exam_acadamicExams['evaluation']  == 1) {?>
        <tr>
          <td colspan="4" style="padding:0px !important;">
           <table  class="table table-bordered" style="background-color: #ffffff; margin-bottom:0px; margin-left:12px !important;" >
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
        <?php }?>
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
