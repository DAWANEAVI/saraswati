<?php echo form_open('exam_grades/add'); ?>
<div class="card-body">
    <h3 class="box-title">Add Grades</h3>
    <div class="row clearfix">
        <div class="col-md-12">
            <label for="grade" class="control-label"><span class="text-danger">*</span>Grade</label>
            <div class="form-group">
                <input required="" class="form-control" id="grade" name="grade" placeholder="Grade">
                <i class="form-group__bar"></i>
                <span class="text-danger"><?php echo form_error('grade'); ?></span>

            </div>
        </div>
        <div class="col-md-4">
            <label><span class="text-danger">*</span>Minimum Marks Range</label>
            <div class="form-group">
                <input required="" type="text" name="min_grade_range" id="min_grade_range" class="form-control" />
                <i class="form-group__bar"></i>
                <span class="text-danger"><?php echo form_error('min_grade_range'); ?></span>
            </div>
        </div>
        <div class="col-md-4">
            <label><span class="text-danger">*</span>Maximum Grade Range</label>
            <div class="form-group">
                <input required="" type="text" name="max_grade_range" id="max_grade_range" class="form-control" />
                <i class="form-group__bar"></i>
                <span class="text-danger"><?php echo form_error('max_grade_range'); ?></span>
            </div>
        </div>
        <div class="col-md-4">
            <label><span class="text-danger">*</span>Remark</label>
            <div class="form-group">
                <input required="" type="text" name="remark" id="remark" class="form-control" />
                <i class="form-group__bar"></i>
                <span class="text-danger"><?php echo form_error('remark'); ?></span>
            </div>
        </div>
        <div class="box-footer">
            <button type="submit" class="btn btn-success btn-raised">
                <i class="fa fa-check"></i> Save
            </button>
        </div>
    </div>

<?php echo form_close(); ?>
