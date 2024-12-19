
<?php echo form_open_multipart('student/import'); ?>
<div class="card-body">
    <h4 class="card-title">Upload Excel Student</h4>
    <div class="row clearfix">
        <div class="col-md-12">

            <div class="form-group">
                <input accept=".csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel" type="file" name="file"  class="form-control" id="fullname" placeholder="Excel File"/>
                
                <i class="form-group__bar"></i>
                <span class="text-danger"><?php echo form_error('file'); ?></span>
            </div>
           
        </div>
        
    </div>

    <div class="box-footer">
        <button type="submit" class="btn btn-success">
            <i class="fa fa-check"></i> Save
        </button>
    </div>        
</div>

<?php echo form_close(); ?>
   
