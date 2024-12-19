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
          <td>
          </td>
          <td  class="text-center" style="line-height:1.5;">
              <img style="width:90px;height:70px;"class="invoice__logo" src="<?= site_url('resources/img/') ?>logo.png" alt=""><br style="display:block !important;">    
          </td>
          <td  style="line-height:1.5;">
              <h3 class="school-name" style="line-height:1.5; padding-top: 14px;">POGRESS REPORT 2024-25</h3>
          </td>
          <td >
          </td>
        </tr>
        <tr>
          <td colspan="1">
          </td>
          <td colspan="2" class="text-left" style="line-height:1.5;">
            <h5  style="line-height:1.5;">Student Name :- Avinash Ganpat Dawane</h5>
          </td>
          <td colspan="1"  style="line-height:1.5;">
              <h5 style="line-height:1.5;">Class :- 2 (A)</h5>
          </td>
        </tr>
        <tr>
          <td colspan="1" style="padding:0px !important;">
           <table  class="table table-bordered" style="background-color: #ffffff; margin-bottom:0px !important;" >
              <thead>
                <tr id="element_m">
                  <th>SR.No</th>
                  <th>Subject</th>
                </tr>
              </thead>
              <tbody id="element">
                <?php foreach ($subjects as $key => $value) { ?>
                  
                
                <tr>
                  <td><?php echo $key + 1;?></td>
                  <td><?php echo $value; ?></td>
                </tr>
                <?php } ?>
              </tbody>
              
            </table>
          </td>
          <td colspan="2" style="padding:0px !important;">
            <div>
            <table class="table">
              <tr>
              <?php foreach ($examData as $key => $value) { ?>
                <td style="padding:0px !important;">
                <table class="table table-bordered" style="background-color: #ffffff; margin-bottom:0px !important; ">
                  <thead>
                    <tr>
                      <th><?php echo  $value['examName'];?></th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($value['resultData'] as $kr => $vr) { ?>
                    <tr>
                      <td><?php echo $vr['percentage']; ?></td>
                    </tr>
                    <?php } ?>
                  </tbody>
                  
                </table>

                </td>
              <?php }?>
              </tr>
            </table>
            <!-- <?php foreach ($examData as $key => $value) { ?>
            <table style="background-color: #ffffff;" class="table table-bordered">
              <thead>
                <tr>
                  <th>SR.No</th>
                  <th>Subject</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($subjects as $key => $value) { ?>
                  
                
                <tr>
                  <td><?php echo $key + 1;?></td>
                  <td><?php echo $value; ?></td>
                </tr>
                <?php } ?>
              </tbody>
              
            </table>
            <?php } ?> -->
           
            <!-- <table style="background-color: #ffffff;" class="table table-bordered">
            
              <thead>
                <tr>
                <?php foreach ($examData as $key => $value) { ?>
                  <th><?php echo  $value['examName'];?></th>
                <?php } ?>
                </tr>
              </thead>
              <tbody>
              <?php foreach ($examData as $key => $value) { ?>
                <tr>
                  <th><?php echo  $value['examName'];?></th>
                </tr>
                  <?php foreach ($value['resultData'] as $kr => $vr) { ?>
                  
                  <td><?php echo $vr['percentage']; ?></td>
                  
                  <?php } ?>
              <?php } ?>
              </tbody>
              
            </table> -->


            
            
            </div>
          </td> 
          <td style="padding:0px !important; border: 1px solid #f2f4f5;">
          <table  class="table table-bordered" style="background-color: #ffffff; margin-bottom:0rem !important;" >
              <thead>
                <tr>
                  <th>Remarks</th>
                </tr>
              </thead>
              <tbody id="remarks_div">
                <tr>
                  <td style="border: 1px solid #ffff;" class="text-center"><div style="margin-top: 80px; margin-bottom: 80px;"><h5 style="line-height:1.5;">B-2</h5><h5 style="line-height:1.5;">GOOD</h5></div></td>
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
        <tr id="sign" style="margin-top:40px!important;">
           
            
            <br />
            <br />
            <td>Class Teacher</td>
            <td class="text-center" colspan="2">Principal</td>
            <td class="text-right">Parents</td>
        </tr>
    </table>




</div>
<button class="btn btn-danger btn--action " data-ma-action="print"><i class="zmdi zmdi-print"></i></button>
<script>
  //  var element = document.getElementById('element').offsetHeight;  
  //  var element_m = document.getElementById('element_m').offsetHeight;
  //  var orignal_h = element - (2*element_m);  
  //  alert(element);             
  //  document.getElementById('remarks_div').setAttribute("style","height:"+element+"px; margin-bottom:0rem !important; padding:0px; ");         
</script>
