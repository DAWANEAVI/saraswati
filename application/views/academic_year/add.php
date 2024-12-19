
<?php echo form_open('academic_year/add'); ?>
<div class="card-body">

	<h3 class="box-title"> Add Academic Year</h3>

	<div class="row clearfix">

		<div class="col-md-6">
			<div class="form-group">
			    <label>Academic Year</label>
				<input type="text" name="session" value="<?php echo $this->input->post('session'); ?>" class="form-control" id="session" placeholder="Session i.e 2020-22"/>
				<i class="form-group__bar"></i>
				<span class="text-danger"><?php echo form_error('session');?></span>
			</div>
		</div>

		<div class="col-md-3">
            <label for="is_running" class="control-label">Is Current Session</label>
            <br>
			<div class="form-group">
				<div class="toggle-switch">
					<input type="checkbox" class="toggle-switch__checkbox" name="is_running" value="1">
					<i class="toggle-switch__helper"></i>
					
				</div>
			</div>
		</div>
        

	</div>

	<div class="box-footer">
		<button type="submit" class="btn btn-success btn-raised"><i class="fa fa-check"></i> Save</button>
    </div>

</div>

<?php echo form_close(); ?>
