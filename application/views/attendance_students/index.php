<div class="card-body">
<form action="<?php echo base_url('attendance_students/index'); ?>" method="get" accept-charset="utf-8">
  <h3 class="box-title p-2 text-center">Student Attendance</h3>
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
        <label for="date" class="control-label"> <span class="text-danger">*</span> Date</label>
        <div class="form-group">
            <input type="date" required name="date" value="<?php echo $this->input->get('date'); ?>" class="form-control " id="date" />
            <span class="text-danger"><?php echo form_error('date');?></span>
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
    <?php if(($this->input->get('date') != null) && ($this->input->get('class_id') != null) && ($this->input->get('section_id') != null)){ //} else{ ?>

    <div class="col-md-12 border border-danger p-3">
    <h5 class="text-center">Student Attendace List <a style="float:right" href="<?php echo site_url('Attendance_students/add/').$this->input->get('class_id').'/'.$this->input->get('section_id').'/'.$this->input->get('date'); ?>" class="btn btn-success btn--raised text-right">Add Attendance</a></h5>
        <table id="data-table" class="table table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Student Name</th>
                    <th>Class</th>
                    <th>Section</th>
                    <th>Date</th>
                    <th>Attendance</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            <?php $i=1; 
                if(isset($attendance_students) && $attendance_students!=null){
                foreach($attendance_students as $a){ 
            ?>
                <tr>
                    <td><?php echo $i++; ?></td>
                    <td><?php echo $a['fullname']; ?></td>
                    <td><?php echo $clas['numeric_name']; ?></td>
                    <td><?php echo $section['section_name']; ?></td>
                    <td><?php echo $a['date']; ?></td>
                    <td><?php 
                    switch ($a['attendance']) {
                        case '0':
                            $attendance = "Absent";
                            break;
                        case '1':
                            $attendance = "Present";
                            break;
                        case '2':
                            $attendance = "On Leave";
                            break;
                        
                        default:
                            $attendance = "Absent";
                            break;
                    } echo $attendance; ?></td>
                    <td>
                    <?php if(isset($this->session->userdata['submoduleAccess']->Exam_Title_Setup) && in_array('3', $this->session->userdata['submoduleAccess']->Exam_Title_Setup)){?><a href="<?php echo site_url('Attendance_students/edit/'.$a['attendID']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Edit</a> <?php }?>
                    </td>
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