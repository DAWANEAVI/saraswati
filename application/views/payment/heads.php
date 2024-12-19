<?php if($this->input->get('student_id')) {?>
<div class="card-body">
    <h3 class="box-title text-center">Adjust Head</h3>
    <div class="row clearfix">
        <div class="col-md-4">
            <label for="student_id" class="control-label"><span class="text-danger">*</span>Student Full Name</label>
            <div class="form-group">
               <input type="text" name="" value="<?php echo  $student_data['fullname']; ?>" class="form-control highcontra" readonly="true" />
            </div>
        </div>
        <div class="col-md-4">
            <label for="class" class="control-label"><span class="text-danger">*</span>Class</label>
            <div class="form-group">
              <input type="text" name="" value="<?php echo $student_data['class_name']; ?>" class="form-control highcontra" readonly="true" />
            </div>
        </div>
        <div class="col-md-4">
            <label for="section" class="control-label"><span class="text-danger">*</span>Section</label>
            <div class="form-group">
              <input type="text" name="" value="<?php echo  $student_data['section_name']; ?>" class="form-control highcontra" readonly="true" />
            </div>
        </div>

        <table class="table table-bordered">
            <thead class='thead-default'>
                <tr>
                    <th>SR.No</th>
                    <th>Acadamic Year</th>
                    <th>Class</th>
                    <th>Total Amount</th>
                    <th>Paid Amount</th>
                    <th>Remaining Amount</th>
                    <th>Actions</th>
                </tr>
            </thead>
            
            <tbody>
                <tr>
                    <td>*</td>
                    <td class="highcontra">Old Fees + Corona Session</td>
                    <td class="highcontra">-</td>
                    <td><?php $oldfees = $student_data['old_fees'] ? $student_data['old_fees'] : 0; echo $oldfees; ?></td>
                    <td><?php $paid_old_fees = $student_data['paid_fees'] ? $student_data['paid_fees'] : 0;  echo $paid_old_fees; ?></td>
                    <td><?php echo $oldfees - $paid_old_fees; ?></td>
                    <td> <?php if($oldfees - $paid_old_fees) { ; ?><a href="<?php echo site_url('payment/make_payment_old/'.$student_data['student_id']); ?>" class="btn btn-success btn-raised btn-xs"><span class="fa fa-pencil"></span>Pay Now</a> <?php } else{ ?> <div class="btn btn-danger btn-raised btn-xs">Fully Paid</div> <?php }?></td>
                </tr>
                <?php $srno = 1; foreach($student_payments as $p){ ?>
                <tr>
                    <td><?php echo $srno; ?></td>
                    <td><?php echo $p['academic_year']; ?></td>
                    <td><?php echo $p['class_id'] ? $this->Clas_model->get_clas_name($p['class_id']) : 'Not Set'; ?></td>
                    <td><?php echo $p['total_amount']; ?></td>
                    <td><?php echo $p['paid_amount']; ?></td>
                    <td><?php echo $p['total_amount'] - $p['paid_amount']; ?></td>
                    <td>
                    <?php if($p['class_id'] != 0) { ?>
                    <?php if($p['total_amount'] - $p['paid_amount']) { ; ?> 
                        <a href="<?php echo site_url('payment/make_payment/'.$p['student_id'].'/'.$p['payment_id'].'/'.$p['session_id']); ?>" class="btn btn-success btn-raised btn-xs"><span class="fa fa-pencil"></span> Pay Now</a> 
                    <?php } else{ ?>
                        <div class="btn btn-danger btn-raised btn-xs">Fully Paid</div>
                    <?php }?>
                    <?php }else{ ?>
                        <a href="<?php echo site_url('payment/setclass/'.$p['student_id'].'/'.$p['payment_id']); ?>" class="btn btn-info btn-raised btn-xs"><span class="fa fa-pencil"></span> Set Class</a> 
                    <?php }?>
                        
                        
                    </td>
                </tr>
                <?php $srno++; } ?>
            </tbody>
            
        </table>
        

    </div>
    <div class="box-footer text-center">
    <a href="<?php echo site_url('payment/add'); ?>" class="btn btn-warning btn-raised btn-xs"><span class="fa fa-pencil"></span>Back</a> 
    </div>
</div>

<?php } else{?>
<div class="card-body">
    <h3 class="box-title text-center">Select Student</h3>
    <div class="row clearfix">
        <div class="col-md-4">
            <label for="class" class="control-label"><span class="text-danger">*</span>Class</label>
            <div class="form-group">
                <select name="class" class="select2" id='class' data-placeholder="Select a Class">
                    <option value="">select student</option>
                    <?php
                    foreach ($all_class as $clas) {
                        $selected = ($clas['class_id'] == $this->input->post('class_id')) ? ' selected="selected"' : "";

                        echo '<option value="' . $clas['class_id'] . '" ' . $selected . '>' . $clas['numeric_name'] . '</option>';
                    }
                    ?>
                </select>
                <span class="text-danger"><?php echo form_error('student_id'); ?></span>
            </div>
        </div>
        <div class="col-md-4">
            <label for="section" class="control-label"><span class="text-danger">*</span>Section</label>
            <div class="form-group">
                <select name="section" class="select2" id='section' data-placeholder="Select a Section">
                   
                </select>
                <span class="text-danger"><?php echo form_error('student_id'); ?></span>
            </div>
        </div>
        <div class="col-md-4">
            <label for="student_id" class="control-label"><span class="text-danger">*</span>Student</label>
            <div class="form-group">
                <select name="student_id" class="select2" id='student' onchange="studentSelect(2)" data-placeholder="Select a Student">
                </select>
                <span class="text-danger"><?php echo form_error('student_id'); ?></span>
            </div>
        </div>

    </div>
    <div class="box-footer">
      
    </div>
</div>

<?php }?>
<!-- <script type = "text/javascript" >  
    function preventBack() { window.history.forward(); }  
    setTimeout("preventBack()", 0);  
    window.onunload = function () { null };  
</script>  -->

