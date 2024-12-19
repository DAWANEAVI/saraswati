
<div class="card-body" style="background-color:white !important;">
    <?php
    if($this->session->flashdata('msg')!=''){
        ?>
    <div class="alert alert-success" role="alert">
        <?=$this->session->flashdata('msg')?>
    </div>
    <?php
        
    }
    ?>
    <h3 class="box-title">Outstanding Fees Report</h3>
    <table id="data-table" class="table table-bordered table-responsive">
        <thead class="thead-default">
            <tr>
                <th>Full Name</th>
                <th>Mobile No</th>
                <th>Class</th>
                <th>Section</th>
                <th>Academic Year</th>
                <th>Academic Year Total Fees</th>
                <th>Academic Year Paid Fees</th>
                <th>Academic Year Remaining Fees</th>
                <th>Total Old Fees</th>
                <th>Paid Old Fees</th>
                <th>Remaining Old Fees</th>
                <th>Total</th>
                <th>Total Paid</th>
                <th>Balance</th>

            </tr>
        </thead>
         <tbody>
        <?php
        $total_AY_balance = 0;
        $total_AY_paid_fees= 0;
        $total_AY_fees= 0;
        $total_old_fees= 0;
        $old_fees_paid = 0;
        $total =0;
        $paid =0;
        $balance =0;
        $old_balance =0;
        $this->load->model('Report_model');
        
        foreach ($result as $s) {
            $all_old_total = 0;
            $all_old_paid_total = 0;
            $paymentData = $this->Report_model->getPaymentForFinalOR($s['student_id'],$s['academic_year']);
            
            if(!empty($paymentData)){
              foreach ($paymentData as $pd) {
                  $all_old_total =$all_old_total + $pd['total_amount'];
                  $all_old_paid_total = $all_old_paid_total + $pd['paid_amount'];
                }  
            }
            
            $old_total_fees =  $all_old_total + $s['old_fees'];
            $old_total_fees_paid =  $all_old_paid_total + $s['paid_fees'];
            $remaining_old_fees =  $old_total_fees - $old_total_fees_paid;
            
            $total = $total + $s['total_amount'] + $old_total_fees;
            $paid = $paid + $s['paid_amount'] + $old_total_fees_paid;
            $balance = $balance+ ($s['total_amount']+ $old_total_fees)- ($s['paid_amount']+ $old_total_fees_paid);
            $old_balance = $old_balance + $remaining_old_fees;
            $old_fees_paid = $old_fees_paid + $old_total_fees_paid;
            $total_old_fees = $total_old_fees + $old_total_fees;
            $total_AY_fees = $total_AY_fees + $s['total_amount'];
            $total_AY_paid_fees = $total_AY_paid_fees + $s['paid_amount'];
            $total_AY_balance = $total_AY_balance + ($s['total_amount']-$s['paid_amount']);
            
            ?>
           
                <tr>
                    <td><?php echo ucfirst($s['fullname']); ?></td>
                    <td><?php echo $s['mobile_no']; ?></td>
                    <td><?php echo $s['class_name']; ?></td>
                    <td><?php echo $s['section_name']; ?></td>
                    <td><?php echo $s['academic_year']; ?></td>
                    <td><?php echo $s['total_amount']; ?></td>
                    <td><?php echo $s['paid_amount']; ?></td>
                    <td><?php echo $s['total_amount']-$s['paid_amount'] ; ?></td>
                    <td><?php echo $old_total_fees; ?></td>
                    <td><?php echo $old_total_fees_paid; ?></td>
                    <td><?php echo $remaining_old_fees;?></td>
                    <td><?php echo $s['total_amount']+ $old_total_fees; ?></td>
                    <td><?php echo $s['paid_amount']+ $old_total_fees_paid; ?></td>
                    <td><?php echo ($s['total_amount']+ $old_total_fees)- ($s['paid_amount']+ $old_total_fees_paid); ?></td>
                </tr>
           
        <?php } ?>
                
                 </tbody>
                  <tr>
                    <td colspan="5">Total</td>
                    <td><?php echo $total_AY_fees; ?></td> 
                    <td><?php echo $total_AY_paid_fees; ?></td> 
                    <td><?php echo $total_AY_balance; ?></td> 
                    
                    <td><?php echo $total_old_fees; ?></td> 
                    <td><?php echo $old_fees_paid; ?></td>                     
                    <td><?php echo $old_balance; ?></td>      
                    <td><?php echo $total ?></td>
                    <td><?php echo $paid; ?></td>
                    <td><?php echo $balance; ?></td>
                </tr>
    </table>

</div>
