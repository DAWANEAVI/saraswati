<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Notification Add</h3>
            </div>
            <?php echo form_open('notification/add'); ?>
          	<div class="box-body">
          		<div class="row clearfix">
					<div class="col-md-6">
						<div class="form-group">
							<input type="checkbox" name="is_viewed" value="1"  id="is_viewed" />
							<label for="is_viewed" class="control-label">Is Viewed</label>
						</div>
					</div>
					<div class="col-md-6">
						<label for="date" class="control-label">Date</label>
						<div class="form-group">
							<input type="text" name="date" value="<?php echo $this->input->post('date'); ?>" class="has-datetimepicker form-control" id="date" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="notification" class="control-label">Notification</label>
						<div class="form-group">
							<input type="text" name="notification" value="<?php echo $this->input->post('notification'); ?>" class="form-control" id="notification" />
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