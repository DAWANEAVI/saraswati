
            <div class="card-body">
                 <h3 class="box-title">Payment  Listing <a style="float: right;" href="<?php echo site_url('payment/add'); ?>" class="btn btn-success btn-raised">Add</a> </h3>
                <table id="data-table" class="table table-bordered">
                    <thead class="thead-default">
                    <tr>
						<th>Reciept No</th>
						<th>Student Name</th>
						<th>Class</th>
						<th>Section</th>
						<th>Amount Paid</th>
						<th>Created Date</th>
						<th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach($payment_log as $p){ ?>
                    
                    <tr>
                        <td><?php echo ucwords($p['reciept_no']); ?></td>
                        <td><?php echo ucwords($p['fullname']); ?></td>
						<td><?php echo $p['numeric_name']; ?></td>
						<td><?php echo ucwords($p['section_name']); ?></td>
						<td><?php echo $p['tuitionfees']+$p['late_fee']; ?></td>
						<td><?php echo date('d-M-Y H:i',strtotime($p['created_at'])); ?></td>
						<td>
                            
                             <a href="<?php echo site_url('payment_log/view/'.$p['payment_log_id']); ?>" class="btn btn-success btn-xs btn-raised"><span class="fa fa-pencil"></span> Receipt</a> 
                            <!-- <a onclick="return confirm('Are you sure to delete this record?')" href="<?php echo site_url('payment_log/remove/'.$p['payment_log_id']); ?>" class="btn btn-danger btn-xs btn-raised"><span class="fa fa-trash"></span> Delete</a> -->
                        </td>
                    </tr>
                    
                    <?php } ?>
                    </tbody>
                </table>
                                
            </div>
       
