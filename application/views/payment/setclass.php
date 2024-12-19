<?php echo form_open('payment/setclass/'.$student_id.'/'.$payment_id); ?>
<div class="card-body">
    <h3 class="box-title text-center">Set Class For Student Acadamic Year</h3><br>
    <div class="row clearfix">
        <div class="col-md-4">
            <label for="student_id" class="control-label"><span class="text-danger">*</span>Student Full Name</label>
            <div class="form-group">
               <input type="text" name="" value="<?php echo  $student_data['fullname']; ?>" class="form-control highcontra" readonly="true" />
            </div>
        </div>
        <div class="col-md-4">
            <label for="class" class="control-label"><span class="text-danger">*</span>Acadamic Year</label>
            <div class="form-group">
              <input type="text" name="" value="<?php echo $payment_data->academic_year; ?>" class="form-control highcontra" readonly="true" />
            </div>
        </div>
        <div class="col-md-4">
            <label for="class" class="control-label"><span class="text-danger">*</span>Class</label>
            <div class="form-group">
                <select name="class" class="select2" id='class' data-placeholder="Select a Class">
                    <option value="">select student</option>
                    <?php
                    foreach ($all_class as $clas) {
                        $selected = ($clas['class_id'] == $payment_data->class_id) ? ' selected="selected"' : "";

                        echo '<option value="' . $clas['class_id'] . '" ' . $selected . '>' . $clas['numeric_name'] . '</option>';
                    }
                    ?>
                </select>
                <span class="text-danger"><?php echo form_error('class'); ?></span>
            </div>
        </div>
        

    </div>
    <div class="box-footer text-center">
    <button type="submit" class="btn btn-success btn-raised btn-xs"><span class="fa fa-pencil"></span>Save</button> 
    </div>
</div>
<?php echo form_close(); ?>

<?php if(1==2){ ?>
<hr>
<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                
            	<div class="box-tools">
                    
                </div>
            </div>
            <div class="card-body">
                <h4 class="box-title  text-center">Student Promote History</h4>
                <table class="table table-bordered">
                    <thead>
                    <tr>
						<th>Student Name</th>
						<th>Previous Class</th>
						<th>Promoted Class</th>
						<th>Promoted Section</th>
						<th>Promotion Date</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach($student_promote as $s){ ?>
                    <tr>
						<td><?php echo ucwords($s['fullname']); ?></td>
						<td><?php echo $s['old_class']; ?></td>
						<td><?php echo $s['new_class']; ?></td>
						<td><?php echo $s['section_name']; ?></td>
						<td><?php echo date('d-m-Y',strtotime($s['promotion_date'])); ?></td>
                    </tr>
                    
                    <?php } ?>
                    </tbody>
                </table>
                                
            </div>
        </div>
    </div>
</div>
<?php } ?>
