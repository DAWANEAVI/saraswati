<?php echo form_open('fee/feesJobProcess'); ?>
<div class="card-body">
        <h3 class="box-title text-center">Fees Automation Setup : <?php echo $academic_year_data['session'];?> </h3>
        <div class="row clearfix p-5">
        <div class="col-md-6">
            <div class="form-group">
                <!--<input type="text" name="fees_for[]"  class="form-control highcontra" value="Before July Starts" readonly="true" />-->
                <input type="text" name="fees_for[]"  class="form-control highcontra" value="Tution Fees" readonly="true" />
                <input type="hidden" name="sequence[]" value="1">
                <input type="hidden" name="session_id" value="<?php echo $academic_year_data['session_id'];?>">
                <i class="form-group__bar"></i>
                <span class="text-danger"><?php echo form_error('fees_for'); ?></span>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <input type="date" required="" name="amount[]" <?php if(!empty($job_dates)) if($job_dates[0]['date'] < date('Y-m-d')){ echo "readonly='true'"; }  ?> value="<?php  echo !empty($job_dates) ? $job_dates[0]['date']  :"";  ?>"  class="form-control"/>
                 <i class="form-group__bar"></i>
                <span class="text-danger"><?php echo form_error('amount'); ?></span>
            </div>
        </div>
        <!--
         <div class="col-md-6">
            <div class="form-group">
                <input type="text" name="fees_for[]"  class="form-control highcontra"  placeholder="Fees For" value="Befor September Starts" readonly="true"/>
                <input type="hidden" name="sequence[]" value="2">
                <i class="form-group__bar"></i>
                <span class="text-danger"><?php echo form_error('fees_for'); ?></span>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <input type="date" required="" <?php if(!empty($job_dates)) if($job_dates[1]['date'] < date('Y-m-d')){ echo "readonly='true'"; }  ?> value="<?php  echo !empty($job_dates) ? $job_dates[1]['date']  :"";  ?>" name="amount[]" class="form-control"/>
                 <i class="form-group__bar"></i>
                 
            </div>
        </div>
         <div class="col-md-6">
            <div class="form-group">
                <input type="text" name="fees_for[]"  class="form-control highcontra"  placeholder="Fees For" value="Before Diwali" readonly="true"/>
                <input type="hidden" name="sequence[]" value="3">
                <i class="form-group__bar"></i>
                <span class="text-danger"><?php echo form_error('fees_for'); ?></span>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <input type="date" required="" name="amount[]" <?php if(!empty($job_dates)) if($job_dates[2]['date'] < date('Y-m-d')){ echo "readonly='true'"; }  ?> value="<?php  echo !empty($job_dates) ? $job_dates[2]['date']  :"";  ?>"  class="form-control"  />
                 <i class="form-group__bar"></i>
                <span class="text-danger"><?php echo form_error('amount'); ?></span>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <input type="text" name="fees_for[]"  class="form-control highcontra"   value="Before Mid January" readonly="true"/>
                <input type="hidden" name="sequence[]" value="4">
                <i class="form-group__bar"></i>
                <span class="text-danger"><?php echo form_error('fees_for'); ?></span>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <input type="date" required="" name="amount[]" <?php if(!empty($job_dates)) if($job_dates[3]['date'] < date('Y-m-d')){ echo "readonly='true'"; }  ?> value="<?php  echo !empty($job_dates) ? $job_dates[3]['date']  :"";  ?>" class="form-control"/>
                 <i class="form-group__bar"></i>
                <span class="text-danger"><?php echo form_error('amount'); ?></span>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <input type="text" name="fees_for[]"  class="form-control highcontra"  value="Before Final Exam" readonly="true"/>
                <input type="hidden" name="sequence[]" value="5">
                <i class="form-group__bar"></i>
                <span class="text-danger"><?php echo form_error('fees_for'); ?></span>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <input type="date" required="" name="amount[]" <?php if(!empty($job_dates)) if($job_dates[4]['date'] < date('Y-m-d')){ echo "readonly='true'"; }  ?> value="<?php  echo !empty($job_dates) ? $job_dates[4]['date']  :"";  ?>" class="form-control"/>
                 <i class="form-group__bar"></i>
                 
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <input type="text" name="fees_for[]"  class="form-control highcontra"  value="Before Result" readonly="true"/>
                <input type="hidden" name="sequence[]" value="6">
                <i class="form-group__bar"></i>
                <span class="text-danger"><?php echo form_error('fees_for'); ?></span>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <input type="date" required="" name="amount[]" <?php if(!empty($job_dates)) if($job_dates[5]['date'] < date('Y-m-d')){ echo "readonly='true'"; }  ?> value="<?php  echo !empty($job_dates) ? $job_dates[5]['date']  :"";  ?>" class="form-control" />
                 <i class="form-group__bar"></i>
                 
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <input type="text" name="fees_for[]"  class="form-control highcontra"  value="After Result" readonly="true"/>
                <input type="hidden" name="sequence[]" value="7">
                <i class="form-group__bar"></i>
                <span class="text-danger"><?php echo form_error('fees_for'); ?></span>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <input type="date" required="" name="amount[]" <?php if(!empty($job_dates)) if($job_dates[6]['date'] < date('Y-m-d')){ echo "readonly='true'"; }  ?> value="<?php  echo !empty($job_dates) ? $job_dates[6]['date']  :"";  ?>" value="0" class="form-control"/>
                 <i class="form-group__bar"></i>
            </div>
        </div>
        -->
        </div>
        <div class="box-footer text-center">
                <button type="submit" class="btn btn-success btn-raised">
                <i class="fa fa-check"></i> Save
                </button>
        </div>      
</div>
<?php echo form_close(); ?>