
<div class="card-body">
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
    <table id="data-table" class="table table-bordered">
        <thead class="thead-default">
            <tr>
                <th>Full Name</th>
                <th>Mobile No</th>
                <th>Class</th>
                <th>Section</th>
                <th>Academic Year</th>
                <th>Remaining Old Fees</th>
                <th>Paid Old Fees</th>
                <th>Total</th>
                <th>Paid</th>
                <th>Balance</th>

            </tr>
        </thead>
         <tbody>
        <?php
        $old_fees = 0;
        $total =0;
        $paid =0;
        $balance =0;
        $paid_old_fees=0;
        foreach ($result as $s) {
            $old_fees = $old_fees+$s['old_fees']-$s['paid_fees'];
            $paid_old_fees = $paid_old_fees+$s['paid_fees'];
            $total = $total+$s['total_amount'];
            $paid = $paid+$s['paid_amount'];
            $balance = $balance+$s['total_amount']+$s['old_fees']-$s['paid_amount'];
            $remaining_old_fees =  $s['old_fees']-$s['paid_fees'];
            ?>
           
                <tr>
                    <td><?php echo ucfirst($s['fullname']); ?></td>
                    <td><?php echo $s['mobile_no']; ?></td>
                    <td><?php echo $s['class_name']; ?></td>
                    <td><?php echo $s['section_name']; ?></td>
                    <td><?php echo $s['academic_year']; ?></td>
                    <td><?php echo $remaining_old_fees;?></td>
                    <td><?php echo $s['paid_fees']; ?></td>
                    <td><?php echo $s['total_amount']+$s['old_fees']; ?></td>
                    <td><?php echo $s['paid_amount']+$s['paid_fees']; ?></td>
                    <td><?php echo $s['total_amount']+ $s['old_fees']-$s['paid_amount']-$s['paid_fees'];; ?></td>
                </tr>
           
        <?php } ?>
                
                 </tbody>
                  <tr>
                      <td colspan="5">Total</td>

                    <td><?php echo $old_fees; ?></td>                     
                    <td><?php echo $paid_old_fees; ?></td>      
                    
                    <td><?php echo $total + $old_fees; ?></td>
                    <td><?php echo $paid; ?></td>
                    <td><?php echo $balance; ?></td>
                </tr>
    </table>

</div>
