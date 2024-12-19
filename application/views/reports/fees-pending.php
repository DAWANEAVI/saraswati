
            <div class="card-body">
                <h3 class="box-title">Pending Payment</h3>
                <table id='data-table' class="table table-bordered">
                    <thead class='thead-default'>
                    <tr>
						<th>Student</th>
						<th>Class</th>
						<th>Parent Contact</th>
						<th>Academic Year</th>
						<th>Total Amount</th>
						<th>Paid Amount</th>
						<th>Remaining Amount</th>
                    </tr>
                    </thead>
                    <?php foreach($payments as $p){ ?>
                    <tbody>
                    <tr>
                        <td><?php echo ucfirst($p['fullname']); ?></td>
						<td><?php echo $p['numeric_name']; ?></td>
						<td><?php echo $p['mobile_no']; ?></td>
						<td><?php echo $p['academic_year']; ?></td>
						<td><?php echo $p['total_amount']; ?></td>
						<td><?php echo $p['paid_amount']; ?></td>
						<td><?php echo $p['total_amount']-$p['paid_amount']; ?></td>
						
                          
                        </td>
                    </tr>
                    </tbody>
                    <?php } ?>
                </table>
                                
            </div>
      