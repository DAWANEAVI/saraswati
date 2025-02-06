<div class="card-body">
<form action="<?php echo base_url('attendance_students/attendanceMonthlyReport'); ?>" method="get" accept-charset="utf-8">
  <h3 class="box-title p-2 text-center">Monthly Attendace Report</h3>
  <div class="row clearfix">
    <?php //if(($this->input->get('examID') == null) && ($this->input->get('class_id') == null)){ ?>
    <input type="hidden" id="session_id" value="<?php echo $academic_year_data['session_id']?>">
    
    <div class="col-md-4">
        <label for="class_id" class="control-label"> <span class="text-danger">*</span>  Class</label>
        <div class="form-group">
            <select required="" id="class_p" name="class_id" class="form-control select2"> 
                <option value="">Select Class</option>
                <?php
                    foreach($all_class as   $class)
                    {
                        $selected = ($class['class_id'] == $this->input->get('class_id')) ? ' selected="selected"' : ""; 
                            echo '<option value="'.$class['class_id'].'" '.$selected.'>'.$class['numeric_name'].'</option>'; 
                    } 
                ?>
            </select>
            <span class="text-danger"><?php echo form_error('class_id');?></span>
        </div>
    </div>
    <div class="col-md-4">
      <label for="result" class="control-label"> <span class="text-danger">*</span> Section</label>
      <div class="form-group">
        <select required="" id="section_o" name="section_id" class="form-control select2">
          <option value="">Select Section</option>
          <?php 
            if($this->input->get('section_id') != null){
                foreach($all_section as   $sec )
                {
                    $selected = ($sec['section_id'] == $this->input->get('section_id')) ? ' selected="selected"' : ""; 
                        echo '<option value="'.$sec['section_id'].'" '.$selected.'>'.$sec['section_name'].'</option>'; 
                }
            
            }
          ?>
        </select>
        <span class="text-danger"><?php echo form_error('section_id');?></span>
      </div>
    </div>
    <div class="col-md-4">
      <label for="result" class="control-label"> <span class="text-danger">*</span> Month</label>
      <div class="form-group">
        <select required="" id="month" name="month" class="form-control select2">
          <option value="">Select Month</option>
          <?php 
            foreach($months as   $key => $value )
            {
                $selected = ($key == $this->input->get('month')) ? ' selected="selected"' : "";
                echo '<option value="'.$key.'" '.$selected.'>'.$value.'</option>'; 
            }
          ?>
        </select>
        <span class="text-danger"><?php echo form_error('month');?></span>
      </div>
    </div>
    <div class="col-md-12">
        <div class="box-footer text-center">
            <button type="submit" class="btn btn-warning text-center btn-raised">
                <i class="fa fa-check text-center"></i> Get Attendance
            </button>
        </div>
    </div>
    
    <div class="col-md-12 p-4">
        
    </div>
    <?php if(($this->input->get('month') != null) && ($this->input->get('class_id') != null) && ($this->input->get('section_id') != null)){ //} else{ ?>

    <div class="col-md-12 border border-danger p-3">
    <h5 class="text-center">Monthly Attendance Report</h5>
        <table id="data-table" class="table table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Student Name</th>
                    <th>Days In Month</th>
                    <th>Total Working Days</th>
                    <th>Total Holidays</th>
                    <th>Present Days</th>
                    <th>Absent Days</th>
                    
                </tr>
            </thead>
            <tbody>
            <?php $i=1; 
                if(isset($studentAttendance) && $studentAttendance!=null){
                foreach($studentAttendance as $a){ 
            ?>
                <tr>
                    <td><?php echo $i++; ?></td>
                    <td><?php echo $a['fullname']; ?></td>
                    <td><?php echo $a['total_days']; ?></td>
                    <td><?php echo $a['working_days']; ?></td>
                    <td><?php echo $a['public_holiday_count']; ?></td>
                    <td><?php echo $a['present']; ?></td>
                    <td><?php echo $a['total_absent']; ?></td>
                </tr>
            <?php 
            }
            }

            ?>
            </tbody>
        </table>
    </div>
    <?php } ?>   
  </div>
</form>

</div>