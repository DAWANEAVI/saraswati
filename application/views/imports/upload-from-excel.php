
<?php echo form_open_multipart('imports/importStudents'); ?>
<div class="card-body">
    <h4 class="card-title">Upload Excel Student</h4>
    <div class="row clearfix">
        <div class="col-md-6">

            <div class="form-group">
                <input accept=".csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel" type="file" name="file"  class="form-control" id="fullname" placeholder="Excel File"/>
                
                <i class="form-group__bar"></i>
                <span class="text-danger"><?php echo form_error('file'); ?></span>
            </div>
           
        </div>
        <div class="col-md-6">

            <div class="form-group">
                <a style="color:blue !important; padding: 10px 10px; border: 1px solid blue;" href="<?= base_url() ?>resources/excel/students import excel.xlsx" target="_blank">Click Here To Download Sample Excel Sheet</a>
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
   
