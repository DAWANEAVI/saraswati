
            <div class="card-body">
                <h3 class="box-title">Expenses Listing <?php if(isset($this->session->userdata['submoduleAccess']->Manage_Expences) && in_array('2', $this->session->userdata['submoduleAccess']->Manage_Expences)){?><a href="<?php echo site_url('payment_concession/index'); ?>"><a style="float:right" href="<?php echo site_url('expense/add'); ?>" class="btn btn-success btn-raised">Add</a> <?php } ?> </h3>
                <table id="data-table" class="table table-bordered">
                    <thead class="thead-default">
                    <tr>
						<th>Expenses Name</th>
						<th>Expenses Amount</th>
						<th>Expense Date</th>
						<th>Actions</th>
                    </tr>
                    </thead>
                    <?php foreach($expenses as $e){ ?>
                    <tbody>
                    <tr>
						<td><?php echo $e['expenses_name']; ?></td>
						<td><?php echo $e['expenses_amount']; ?></td>
						<td><?php echo $e['expense_date']; ?></td>
						<td>
                            <?php if(isset($this->session->userdata['submoduleAccess']->Manage_Expences) && in_array('3', $this->session->userdata['submoduleAccess']->Manage_Expences)){?><a href="<?php echo site_url('expense/edit/'.$e['expenses_id']); ?>" class="btn btn-info btn-xs btn-raised"><span class="fa fa-pencil"></span> Edit</a> <?php } ?>
                            <?php if(isset($this->session->userdata['submoduleAccess']->Manage_Expences) && in_array('4', $this->session->userdata['submoduleAccess']->Manage_Expences)){?><a onclick="return confirm('Are you sure to delete this record?')" href="<?php echo site_url('expense/remove/'.$e['expenses_id']); ?>" class="btn btn-danger btn-xs btn-raised"><span class="fa fa-trash"></span> Delete</a> <?php } ?>
                        </td>
                    </tr>
                    </tbody>
                    <?php } ?>
                </table>
                                
            </div>
       