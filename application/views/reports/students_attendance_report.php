
<div class="card-body">
<form action="<?php echo base_url('Report/students_attendance_report'); ?>" method="get" accept-charset="utf-8">
    <h3 class="text-center">Students Attendance Report</h3>
    <div class="row clearfix">
        <div class="col-md-4">
            <label for="acadamic_session" class="control-label"><span class="text-danger">*</span>Acadamic Session</label>
            <div class="form-group">
                <select name="acadamic_session" id="acadamic_session" class="select2" data-placeholder="Select Acadamic Session">
                    <?php
                    foreach ($all_sessions as $session) {
                        $selected = ($session['session_id'] == $this->input->get('acadamic_session')) ? ' selected="selected"' : "";
                        if($session['status'] == 1){
                            echo '<option value="' . $session['session_id'] . '" ' . $selected . '>' . $session['session'] . '</option>';
                        }
                        
                    }
                    ?>
                </select>
                <span class="text-danger"><?php echo form_error('acadamic_session'); ?></span>
            </div>
        </div>
        <div class="col-md-4">
            <label for="class" class="control-label"><span class="text-danger">*</span>Class</label>
            <div class="form-group">
                <select required="" name="class" class="form-control select2" id='class_a' data-placeholder="Select a Class">
                    <option value="">select Class</option>
                    <?php
                    foreach ($all_class as $clas) {
                        $selected = ($clas['class_id'] == $this->input->get('class')) ? ' selected="selected"' : "";

                        echo '<option value="' . $clas['class_id'] . '" ' . $selected . '>' . $clas['numeric_name'] . '</option>';
                    }
                    ?>
                </select>
                <span class="text-danger"><?php echo form_error('class'); ?></span>
            </div>
        </div>

          





        <div class="col-md-4">
            <label for="section" class="control-label"><span class="text-danger">*</span>Section</label>
            <div class="form-group">
                <?php if ($this->input->get('section_id')){ ?>

                    <select name="section_id" class="select2" id='section_a' data-placeholder="Select a Section">
                        <option value="">select Section</option>
                        <?php
                        foreach ($all_section as $section) {
                            $selected = ($section['section_id'] == $this->input->get('section_id')) ? ' selected="selected"' : "";

                            echo '<option value="' . $section['section_id'] . '" ' . $selected . '>' . $section['section_name'] . '</option>';
                        }
                        ?>
                    </select>
                    <?php } else { ?>
                    <select name="section_id" class="select2" id='section_a' data-placeholder="Select a Section">
                    </select>
                <?php }?>
                <span class="text-danger"><?php echo form_error('section'); ?></span>
            </div>
        </div>
       
        <div class="col-md-4">
            <input type="radio" id="daily" name="report_type" onchange="select_attendance_report_type();" value="daily">
            <label for="daily">Daily</label>
        </div>

        <div class="col-md-4">
            <input type="radio" id="monthly" name="report_type" onchange="select_attendance_report_type();" value="monthly">
            <label for="monthly">Monthly</label>
        </div>

        <div class="col-md-4">
            <input type="radio" id="yearly" name="report_type" onchange="select_attendance_report_type();" value="yearly">
            <label for="yearly">Yearly</label>
        </div>
       
        
        <div class="col-md-3" id="show_date" style="display:none">
        
            <label for="date" class="control-label"><span class="text-danger">*</span>Date</label>
            <div class="form-group">
                <input type="date" name="date"  class="form-control" placeholder="DD-MM-YYYY" value="<?php echo $this->input->get('date') ?>" id="date_a">
                <i class="form-group__bar"></i>
                <span class="text-danger"><?php echo form_error('date'); ?></span>
            </div>
        </div>
        <div class="col-md-4" id="show_month" style="display:none">
            <label for="select_month" class="control-label"><span class="text-danger">*</span>Month</label>
            <div class="form-group">
                <select name="select_month"  id="select_month" class="select2" data-placeholder="Select Month">
                    <option value="">Select Month</option>
                    <option value="1">January</option>
                    <option value="2">February</option>
                    <option value="3">March</option>
                    <option value="4">April</option>
                    <option value="5">May</option>
                    <option value="6">June</option>
                    <option value="7">July</option>
                    <option value="8">August</option>
                    <option value="9">September</option>
                    <option value="10">October</option>
                    <option value="11">November</option>
                    <option value="12">December</option>
                </select>
                <span class="text-danger"><?php echo form_error('select_month'); ?></span>
            </div>
        </div>

        <div class="col-md-12">
            <div class="box-footer text-center">
                <button type="submit" class="btn btn-success text-center btn-raised">
                    <i class="fa fa-check text-center"></i> Get Details
                </button>
            </div>
        </div>
        
      



        <?php if(($this->input->get('acadamic_session') != null) && ($this->input->get('class') != null) && ($this->input->get('section_id') != null) && ($this->input->get('date') != null)){ ?>
    
            <div class="col-md-12 border border-danger p-3">
            <h5 class="text-center">Student Attendance List on <?php echo $this->input->get('date') ?>
                <?php if(empty($student_attendance)){?>
                    <a href="<?php echo site_url('Attendance_student/add_student_attendance').'?session_id='.$this->input->get('session_id').'&class_id='.$this->input->get('class_id').'&section_id='.$this->input->get('section_id').'&date='.$this->input->get('date'); ?>" class="float-right  btn btn-success">Add</a> </h5>
                <?php } ?>
                
                <table id="data-table" class="table table-bordered">
                    <thead>
                        <tr class="text-center">
                            <th>#</th>
                            <!-- <th>Session</th> -->
                            <th>Student Name</th>
                            
                            <th>Attendance</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php $i=$noof_page+1; 
                    if(isset($student_attendance) && !empty($student_attendance)){
                        foreach($student_attendance as $as){ 
                                
                                {?>
                                <tr class="text-center">
                                    <td><?php echo $i++; ?></td>

                                    <td><?php echo $as['fullname']; ?></td>
                                
                                    <td><?php if ($as['attendance_status']==1) 
                                            echo 'P';
                                        else if ($as['attendance_status']==0)
                                            echo 'A';
                                        else echo 'L'; ?>
                                    </td>
                                    
                                </tr>
                                <?php 
                                }
                            }
                    
                    
                    }

                    ?>
                    </tbody>
                </table>
            </div>

        <?php } else if(($this->input->get('acadamic_session') != null) && ($this->input->get('class') != null) && ($this->input->get('section_id') != null) && ($this->input->get('select_month') != null))  {?>
        
            <div class="col-md-12 border border-danger p-3">

            <?php if($this->input->get('select_month')==1){
                $month = "January";
            }else if($this->input->get('select_month')==2){
                $month = "February";
            }else if($this->input->get('select_month')==3){
                $month = "March";
            }else if($this->input->get('select_month')==4){
                $month = "April";
            }else if($this->input->get('select_month')==5){
                $month = "May";
            }else if($this->input->get('select_month')==6){
                $month = "June";
            }else if($this->input->get('select_month')==7){
                $month = "July";
            }else if($this->input->get('select_month')==8){
                $month = "August";
            }else if($this->input->get('select_month')==9){
                $month = "September";
            }else if($this->input->get('select_month')==10){
                $month = "October";
            }else if($this->input->get('select_month')==11){
                $month = "November";
            }else if($this->input->get('select_month')==12){
                $month = "December";
            }
            ?>

            <h5 class="text-center">Student Attendance List of <?php echo $month ?>
                
                <table id="data-table" class="table table-bordered">
                    <thead>
                        <tr class="text-center">
                            <th>#</th>
                            <!-- <th>Session</th> -->
                            <th>Student Name</th>
                            <th>Total days</th>
                            <th>Present</th>
                            <th>Absent</th>
                            <th>Attendance Percentage</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php $i=$noof_page+1; 
                    if(isset($student_attendance) && !empty($student_attendance)){
                        foreach($student_attendance as $as){ 
                                
                                {?>
                                <tr class="text-center">
                                    <td><?php echo $i++; ?></td>

                                    <td><?php echo $as['fullname']; ?></td>
                                
                                    <td><?php echo $total_date_in_month; ?></td>
                                    <td><?php echo $as['total_present']; ?></td>
                                    <td><?php echo $as['total_absent']; ?></td>
                                    <td><?php echo round(($as['total_present']/$total_date_in_month)*100,2).' %'; ?></td>
                                    
                                </tr>
                                <?php 
                                }
                            }
                    
                    }
                    ?>
                    </tbody>
                </table>
            </div>
        <?php } else if(($this->input->get('acadamic_session') != null) && ($this->input->get('class') != null) && ($this->input->get('section_id') != null))  {?>
        
            <div class="col-md-12 border border-danger p-3">
            <?php 
            foreach ($all_sessions as $session) {
                if($session['session_id'] == $this->input->get('acadamic_session')){
                    $sessionId = $session['session'];
                } 
            }
            ?>
            <h5 class="text-center">Student Attendance List of <?php echo $sessionId ?>
                
                <table id="data-table" class="table table-bordered">
                    <thead>
                        <tr class="text-center">
                            <th>#</th>
                            <!-- <th>Session</th> -->
                            <th>Student Name</th>
                            <th>Total days</th>
                            <th>Present</th>
                            <th>Absent</th>
                            <th>Attendance Percentage</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php $i=$noof_page+1; 
                    if(isset($student_attendance) && !empty($student_attendance)){
                        foreach($student_attendance as $as){ 
                                
                                {?>
                                <tr class="text-center">
                                    <td><?php echo $i++; ?></td>

                                    <td><?php echo $as['stud_name']; ?></td>
                                
                                    <td><?php echo $total_date_in_year; ?></td>
                                    <td><?php echo $as['total_present']; ?></td>
                                    <td><?php echo $as['total_absent']; ?></td>
                                    <td><?php echo round(($as['total_present']/$total_date_in_year)*100,2).' %'; ?> </td>
                                
                                    
                                </tr>
                                <?php 
                                }
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

      	