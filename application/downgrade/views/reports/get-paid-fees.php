
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
    <h3 class="box-title">Paid Fees Report</h3>
    <table id="data-table" class="table table-bordered">
        <thead class="thead-default">
            <tr>
                <th>Full Name</th>
                <th>Mobile No</th>
                <th>Class</th>
                <th>Section</th>
                <th>Academic Year</th>
                <th>Total</th>
                <th>Paid</th>
                <th>Balance</th>

            </tr>
        </thead>
         <tbody>
        <?php
        $total =0;
        $paid =0;
        $balance =0;
        foreach ($result as $s) {
            $total = $total+$s['total_amount'];
            $paid = $paid+$s['paid_amount'];
            $balance = $balance+$s['total_amount']-$s['paid_amount'];
            ?>
           
                <tr>
                    <td><?php echo ucfirst($s['fullname']); ?></td>
                    <td><?php echo $s['mobile_no']; ?></td>
                    <td><?php echo $s['class_name']; ?></td>
                    <td><?php echo $s['section_name']; ?></td>
                    <td><?php echo $s['academic_year']; ?></td>
                    <td><?php echo $s['total_amount']; ?></td>
                    <td><?php echo $s['paid_amount']; ?></td>
                    <td><?php echo $s['total_amount']-$s['paid_amount']; ?></td>
                </tr>
           
        <?php } ?>
                
                 </tbody>
                  <tr>
                      <td colspan="5">Total</td>
                    <td><?php echo $total; ?></td>
                    <td><?php echo $paid; ?></td>
                    <td><?php echo $balance; ?></td>
                </tr>
    </table>

</div>
