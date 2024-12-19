
			<?php echo form_open('fee/edit/'.$fee[0]['class_id']); ?>
					
					
<div class="card-body">
    <h3 class="box-title">Fee Add</h3>
    <div class="row clearfix">
        <div class="col-md-12">
						<label for="class_id" class="control-label"><span class="text-danger">*</span>Class</label>
						<div class="form-group">
                                                    <select name="class_id" class="form-control" readonly="true">
								<option value="">select class</option>
								<?php 
								foreach($all_class as $clas)
								{
									$selected = ($clas['class_id'] == $fee[0]['class_id']) ? ' selected="selected"' : "";

									echo '<option value="'.$clas['class_id'].'" '.$selected.'>'.$clas['class_name'].'</option>';
								} 
								?>
							</select>
							<span class="text-danger"><?php echo form_error('class_id');?></span>
						</div>
	
        </div>
            <?php
             foreach ($fee as $k=>$v){
        ?>
        <div class="col-md-6">
            <div class="form-group">
                <input type="text" name="fees_for[]"  class="form-control"  placeholder="Fees For" value="<?=$v['fees_for']?>" readonly="true" />
                <i class="form-group__bar"></i>
                <span class="text-danger"><?php echo form_error('fees_for'); ?></span>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <input type="text" name="amount[]" value="<?=$v['amount']?>" class="form-control"  placeholder="Amount"/>
                 <i class="form-group__bar"></i>
                <span class="text-danger"><?php echo form_error('amount'); ?></span>
            </div>
        </div>
        <?php
                                    }
        ?>
       
    </div>
    <div class="box-footer">
        <button type="submit" class="btn btn-success btn-raised">
            <i class="fa fa-check"></i> Save
        </button>
    </div>
</div>

<?php echo form_close(); ?>
				</div>
			</div>
			<div class="box-footer">
            	<button type="submit" class="btn btn-success">
					<i class="fa fa-check"></i> Save
				</button>
	        </div>				
			<?php echo form_close(); ?>
		