<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Payment Log Add</h3>
            </div>
            <?php echo form_open('payment_log/add'); ?>
          	<div class="box-body">
          		<div class="row clearfix">
					<div class="col-md-6">
						<label for="amount" class="control-label"><span class="text-danger">*</span>Amount</label>
						<div class="form-group">
							<input type="text" name="amount" value="<?php echo $this->input->post('amount'); ?>" class="form-control" id="amount" />
							<span class="text-danger"><?php echo form_error('amount');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="payment_id" class="control-label"><span class="text-danger">*</span>Payment Id</label>
						<div class="form-group">
							<input type="text" name="payment_id" value="<?php echo $this->input->post('payment_id'); ?>" class="form-control" id="payment_id" />
							<span class="text-danger"><?php echo form_error('payment_id');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="created_date" class="control-label">Created Date</label>
						<div class="form-group">
							<input type="text" name="created_date" value="<?php echo $this->input->post('created_date'); ?>" class="has-datetimepicker form-control" id="created_date" />
						</div>
					</div>
				</div>
			</div>
          	<div class="box-footer">
            	<button type="submit" class="btn btn-success">
            		<i class="fa fa-check"></i> Save
            	</button>
          	</div>
            <?php echo form_close(); ?>
      	</div>
    </div>
</div>