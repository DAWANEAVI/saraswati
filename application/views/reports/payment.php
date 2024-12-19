
<div class="card-body">
     <h3 class="box-title">Payment  Report </h3>
    <table id="data-table" class="table table-bordered">
        <thead class="thead-default">
        <tr>
			<th>Student Name</th>
			<th>Session</th>
			<th>Class</th>
			<th>Section</th>
			<th>Reciept No</th>
			<th>Tution Fees</th>
			<th>Amount Paid</th>
			<th>Created Date</th>
        </tr>
        </thead>
        <tbody>
            <?php
            $total =0;
            $tuitionfees =0;
            ?>
        <?php 
        foreach($payment_log as $p){
                $acadamic_year = $this->Academic_year_model->get_session($p['payment_session']);
                $acadamic_year = $acadamic_year['session']; 
        ?>
        
        <tr>
            <td><?php echo ucwords($p['fullname']); ?></td>
            <td><?php echo $acadamic_year; ?></td>
			<td><?php echo $p['numeric_name']; ?></td>
			<td><?php echo $p['section_name']; ?></td>
			<td><?php echo $p['reciept_no']; ?></td>
			<td><?php echo $p['total']; ?></td>
			<td><?php echo $p['total']; ?></td>
			<td><?php echo date('d-M-Y H:i',strtotime($p['created_at'])); ?></td>
			
        </tr>
        
        <?php 
        $total = $total+$p['total'];
        $tuitionfees =$tuitionfees +$p['total'];
        } ?>
        </tbody>
        <tr>
            <td colspan="5">Total</td>
            <td><?=$tuitionfees?></td>
            <td><?=$total?></td>
        </tr>
    </table>
                    
</div>

