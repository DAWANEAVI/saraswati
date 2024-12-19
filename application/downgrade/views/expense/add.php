
            <?php echo form_open('expense/add'); ?>
          	<div class="card-body">
                    <h3 class="box-title">Expense Add</h3>
          		<div class="row clearfix">
					<div class="col-md-6">
						
						<div class="form-group">
                                                    <input type="text" name="expenses_name" value="<?php echo $this->input->post('expenses_name'); ?>" class="form-control" id="expenses_name" placeholder="Expenses Name"/>
                                                    <i class="form-group__bar"></i>
							<span class="text-danger"><?php echo form_error('expenses_name');?></span>
						</div>
					</div>
					<div class="col-md-6">
						
						<div class="form-group">
                                                    <input type="text" name="expenses_amount" value="<?php echo $this->input->post('expenses_amount'); ?>" class="form-control" id="expenses_amount" placeholder="Expenses Amount" />
                                                    <i class="form-group__bar"></i>
							<span class="text-danger"><?php echo form_error('expenses_amount');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="expense_date" class="control-label"></label>
						<div class="form-group">
							<input type="date" name="expense_date" value="<?php echo $this->input->post('expense_date'); ?>" class="has-datetimepicker form-control" id="expense_date" />
                                                        <i class="form-group__bar"></i>
						</div>
					</div>
				</div>
                    <div class="box-footer">
            	<button type="submit" class="btn btn-success btn-raised">
            		<i class="fa fa-check"></i> Save
            	</button>
          	</div>
			</div>
          	
            <?php echo form_close(); ?>
      