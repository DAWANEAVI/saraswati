
<div class="card-body">
    <h3 class="box-title">Payment  Report </h3>
     <?php echo form_open() ?>
    <div class="row clearfix">
       
        <div class="col-md-6">
            <label>From Date</label>
            <div class="form-group">
                <input type="text" name="from" value="<?php echo $this->input->post('from'); ?>" class="form-control form_datetime" id="fname" placeholder="From Date" />
                <span class="text-danger"><?php echo form_error('from');?></span>
                <i class="form-group__bar"></i>
            </div>
        </div>
        <div class="col-md-6">
            <label>To Date</label>
            <div class="form-group">
                <input type="text" name="to" value="<?php echo $this->input->post('to'); ?>" class="form-control form_datetime" id="lname" placeholder="To Date"/>
                <span class="text-danger"><?php echo form_error('to');?></span>
                <i class="form-group__bar"></i>
            </div>
        </div>
          <div class="box-footer">
            	<button type="submit" class="btn btn-success btn-raised">
            		<i class="fa fa-check"></i> Get Report
            	</button>
          	</div>
       
    </div>
     <?php echo form_close(); ?>
</div>

