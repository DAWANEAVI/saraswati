<div class="card-body">
<form action="<?php echo base_url('attendance_student/index'); ?>" method="get" accept-charset="utf-8">
  <h3 class="box-title p-2 text-center">Attendance Setup </h3>
  <div class="row clearfix">
    <?php //if(($this->input->get('examID') == null) && ($this->input->get('class_id') == null)){ ?>

    <div class="col-md-3">
        <label for="session" class="control-label"><span class="text-danger">*</span>Academic Year</label>
        <div class="form-group">
            <select name="session_id" class="select2" data-placeholder="Select Acadamic Session">
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

    <div class="col-md-3">
            <label for="class_id" class="control-label"><span class="text-danger">*</span>Class</label>
            <div class="form-group">
                <select name="class_id" class="select2" id='class_a' data-placeholder="Select a Class">
                    <option value="">select Class</option>
                    <?php
                    foreach ($all_class as $clas) {
                        $selected = ($clas['class_id'] == $this->input->get('class_id')) ? ' selected="selected"' : "";

                        echo '<option value="' . $clas['class_id'] . '" ' . $selected . '>' . $clas['numeric_name'] . '</option>';
                    }
                    ?>
                </select>
                <span class="text-danger"><?php echo form_error('class'); ?></span>
            </div>
        </div>
        <div class="col-md-3">
            <label for="section_id" class="control-label"><span class="text-danger">*</span>Section</label>
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

        <div class="col-md-3">
            <label for="date" class="control-label"><span class="text-danger">*</span>Date</label>
            <div class="form-group">
                <input type="date" name="date"  class="form-control" placeholder="DD-MM-YYYY" value="<?php echo $this->input->get('date') ?>" id="date_a" required="">
                <i class="form-group__bar"></i>
                <span class="text-danger"><?php echo form_error('date'); ?></span>
            </div>
        </div>

    <div class="col-md-12">
        <div class="box-footer text-center">
            <button type="submit" class="btn btn-success text-center btn-raised">
                <i class="fa fa-check text-center"></i> Get Details
            </button>
        </div>
    </div>

    <div class="col-md-12 p-4">
        
    </div>
    <?php if(($this->input->get('session_id') != null) && ($this->input->get('class_id') != null) && ($this->input->get('section_id') != null)){ ?>
    
        <div class="col-md-12 border border-danger p-3">
        <h5 class="text-center">Student Attendance List <?php echo $this->input->get('date') ?>
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
                        
                        <th>Action</th>
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
                                    else echo 'L'; ?></td>
                                <td>
                                    <?php if(isset($this->session->userdata['submoduleAccess']->Manage_Class_N_Section) && in_array('3', $this->session->userdata['submoduleAccess']->Manage_Class_N_Section)){?><a href="<?php echo site_url('Attendance_student/edit/'.$as['attendance_id']).'?session_id='.$this->input->get('session_id').'&class_id='.$this->input->get('class_id').'&section_id='.$this->input->get('section_id').'&date='.$this->input->get('date').'&attendance_id='.$as['attendance_id']; ?>" class="btn btn-info btn-xs btn--raised"><span class="fa fa-pencil"></span> Edit</a> <?php } ?>
                                    <!--'clas/edit/'.$c['class_id']--> 
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
    
    <?php }  ?>  
  </div>
</form>

</div>

 