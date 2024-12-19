
<?php echo form_open('academic_year/edit/'.$academic_session['session_id']); ?>
<div class="card-body">
	<h3 class="box-title">Edit Academic Year</h3>
	<div class="row clearfix">
		<div class="col-md-6">
			<div class="form-group">
			    <label>Academic Year</label>
				<input type="text" name="session" value="<?php echo ($this->input->post('session') ? $this->input->post('session') : $academic_session['session']); ?>" class="form-control" id="session" placeholder="Academic Year" />
				<i class="form-group__bar"></i>				
				<span class="text-danger"><?php echo form_error('session');?></span>
			</div>
		</div>
		<div class="col-md-3">
            <label for="is_running" class="control-label">Is Current Session</label>
            <br>
			<div class="form-group">
				<div class="toggle-switch">
					<input type="checkbox" class="toggle-switch__checkbox" name="is_running" value="1" <?php echo ($academic_session['is_running'] ? 'checked' : ''); ?>>
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
