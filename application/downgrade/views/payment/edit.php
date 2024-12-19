<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Payment Edit</h3>
            </div>
			<?php echo form_open('payment/edit/'.$payment['payment_id']); ?>
			<div class="box-body">
				<div class="row clearfix">
					<div class="col-md-6">
						<label for="student_id" class="control-label"><span class="text-danger">*</span>Student</label>
						<div class="form-group">
							<select name="student_id" class="form-control">
								<option value="">select student</option>
								<?php 
								foreach($all_student as $student)
								{
									$selected = ($student['student_id'] == $payment['student_id']) ? ' selected="selected"' : "";

									echo '<option value="'.$student['student_id'].'" '.$selected.'>'.$student['registration_no'].'</option>';
								} 
								?>
							</select>
							<span class="text-danger"><?php echo form_error('student_id');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="academic_year" class="control-label"><span class="text-danger">*</span>Academic Year</label>
						<div class="form-group">
							<input type="text" name="academic_year" value="<?php echo ($this->input->post('academic_year') ? $this->input->post('academic_year') : $payment['academic_year']); ?>" class="form-control" id="academic_year" />
							<span class="text-danger"><?php echo form_error('academic_year');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="total_amount" class="control-label"><span class="text-danger">*</span>Total Amount</label>
						<div class="form-group">
							<input type="text" name="total_amount" value="<?php echo ($this->input->post('total_amount') ? $this->input->post('total_amount') : $payment['total_amount']); ?>" class="form-control" id="total_amount" />
							<span class="text-danger"><?php echo form_error('total_amount');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="paid_amount" class="control-label"><span class="text-danger">*</span>Paid Amount</label>
						<div class="form-group">
							<input type="text" name="paid_amount" value="<?php echo ($this->input->post('paid_amount') ? $this->input->post('paid_amount') : $payment['paid_amount']); ?>" class="form-control" id="paid_amount" />
							<span class="text-danger"><?php echo form_error('paid_amount');?></span>
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