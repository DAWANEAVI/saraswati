<?php echo form_open('Attendance_student/add_holiday'); ?>
<div class="card-body">
    <h3 class="box-title text-center">Add Holiday</h3>
    <div class="row clearfix">
        <div class="col-md-4">
            <label for="class" class="control-label"><span class="text-danger">*</span>Holiday Name</label>
            <div class="form-group">
            <input type="text" name="holiday_name" class="form-control highcontra" />
                <span class="text-danger"></span>
            </div>
        </div>
        <div class="col-md-4">
            <label for="section" class="control-label"><span class="text-danger">*</span>Holiday Date</label>
            <div class="form-group">
                <input type="date" name="holiday_date" class="form-control highcontra" />
                <span class="text-danger"></span>
            </div>
        </div>

        <div class="col-md-12">
        <button type="submit" class="btn btn-success btn-raised">
            		<i class="fa fa-check"></i> Save
            	</button>
        </div>
    
     

    </div>
    <div class="box-footer">
      
    </div>
</div>

<!-- <script type = "text/javascript" >  
    function preventBack() { window.history.forward(); }  
    setTimeout("preventBack()", 0);  
    window.onunload = function () { null };  
</script>  -->

