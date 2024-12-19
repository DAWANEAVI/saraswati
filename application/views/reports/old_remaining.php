
            <div class="card-body">
                <h3 class="box-title">List of Students has Remaining Old Fees</h3>
                <table id='data-table' class="table table-bordered">
                    <thead class='thead-default'>
                    <tr>
						<th>Student</th>
						<th>Class</th>
						<th>Section</th>
						<th>Total Old Fees</th>
						<th>Paid Old Fees</th>
						<th>Remaining Old Fees</th>
						
                    </tr>
                    </thead>
                    <?php foreach($payments as $p){ ?>
                    <?php if($p['old_fees'] > $p['paid_fees']) { ?>
                    <tbody>
                    <tr>
                        <td><?php echo ucfirst($p['fullname']); ?></td>
						<td><?php echo $p['numeric_name']; ?></td>
						<td><?php echo $p['section_name']; ?></td>
						<td><?php echo $p['old_fees']; ?></td>
						<td><?php echo $p['paid_fees']; ?></td>
						<td><?php echo $p['old_fees'] - $p['paid_fees']; ?></td>
						
						
                          
                        </td>
                    </tr>
                    </tbody>
                    <?php } ?>
                    <?php } ?>
                </table>
                                
            </div>