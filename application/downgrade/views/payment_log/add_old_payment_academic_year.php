
            <?php echo form_open('payment_log/add_old/'.$payment_id.'/'.$student_id.'/'.$remaining.'/'.$academic_year); ?>
          	<div class="card-body">
                    <h3 class="box-title">Pay Old Fees</h3>
                    <h5 class="text-center">Remaining Amount :- <?=$remaining?></h5> <br />
                    <br />
          		<div class="row clearfix">
					<div class="col-md-6">
						<input type="text" name="amount" value="<?php echo $this->input->post('amount'); ?>" class="form-control" id="amount" placeholder="Amount Paying"/>
						<div class="form-group">
                                                   
                                                    <i class="form-group__bar"></i>
							<span class="text-danger"><?php echo form_error('amount');?></span>
						</div>
					</div>
					<div class="col-md-6">
						
						<div class="form-group">
                                                    <input type="text" name="remark" value="<?php echo $this->input->post('remark'); ?>" class="form-control" id="numeric_name" placeholder="Remark"/>
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
