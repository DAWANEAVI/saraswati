<form action="<?php echo base_url('Payment_concession/index')?>" method="get" accept-charset="utf-8">
<div class="card-body">
    <h3 class="box-title text-center mb-5"> Payment Concession List </h3>
    <div class="row clearfix">
        <div class="col-md-4">
        </div>
        <div class="col-md-4">
            <label for="session" class="control-label">Academic Year <span class="text-danger">*</span></label>
            <div class="form-group">
                <select name="session_id" onchange="studentSelect(6)" id="session_id" class="select2" data-placeholder="Select Acadamic Session">
                    <?php
                    foreach ($all_sessions as $session) {
                        if($this->input->get('session_id') != null){ $selected = ($session['session_id'] == $this->input->get('session_id')) ? ' selected="selected"' : "";}else{ $selected = ($session['session_id']['is_running'] == 1) ? ' selected="selected"' : ""; } 
                        if($session['status'] == 1){
                            echo '<option value="' . $session['session_id'] . '" ' . $selected . '>' . $session['session'] . '</option>';
                        }
                        
                    }
                    ?>
                </select>
                <span class="text-danger"><?php echo form_error('session'); ?></span>
            </div>
        </div>
        
        <div class="col-md-4">
        </div>
        <div class="col-md-12 pb-3">
            <div class="box-footer text-center">
                <button type="submit" class="btn btn-success text-center btn-raised">
                    <i class="fa fa-check text-center"></i> Get Details
                </button>
            </div>
            <!-- <hr> -->
        </div>
        <div class="col-md-12 border border-danger p-3">
        <!-- <h3 class="box-title text-center mb-5"><a style="float: left;" href="<?php echo site_url('payment_concession/index'); ?>" class="btn btn-warning btn-raised">Back</a> <a style="float: right;" href="<?php echo site_url('payment_concession/add?session_id='.$this->input->get('session_id').'&class_id='.$this->input->get('class_id')); ?>" class="btn btn-success btn-raised">Add</a> </h3> -->
    
        <!-- <div class="table-responsive no-padding"> -->
         <table id="data-table" class="table table-bordered">
             <thead>
                 <tr>
                     <th>#</th>
                     <th>Acadamic Year</th>
                     <th>Class</th>
                     <th>Student Name</th>
                     <th>Amount</th>
                     <th>Date</th>
                     <!-- <th>Action</th> -->
                 </tr>
             </thead>
             <tbody>
             <?php $i=1; 
                 if(isset($payment_concession) && $payment_concession!=null)
                 {
                 foreach($payment_concession as $p){ ?>
             <tr>
                 <td><?php echo $i++; ?></td>
                 <td><?php echo $p['academic_year']; ?></td>
                 <td><?php echo $p['class_name']; ?></td>
                 <td><?php echo $p['fullname']; ?></td>
                 <td><?php echo $p['amount']; ?></td>
                 <td><?php echo $p['created_at']; ?></td>
                 <!-- <td>
                     <a href="<?php echo site_url('payment_concession/edit/'.$p['concID']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Edit</a> 
                     <a onclick="return confirm('Are you sure You want to delete?')"  href="<?php echo site_url('payment_concession/remove/'.$p['concID']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Delete</a>
                 </td> -->
             </tr>
             <?php } ?>
             
             <?php }else { ?>
             <!-- <tr>
                 <td colspan="6"><?php echo 'No data found'; ?></td>
             </tr> -->
             <?php } ?>
             </tbody>
         </table>
         
        </div>
    </div>
</div>
</form>
