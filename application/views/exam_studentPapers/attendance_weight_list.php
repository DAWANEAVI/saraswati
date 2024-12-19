<div class="card-body">
  <div class="row clearfix">
    <?php //if(($this->input->get('examID') == null) && ($this->input->get('class_id') == null)){ ?>
    <!-- <div class="col-md-4">
        <label for="session" class="control-label"><span class="text-danger">*</span>Academic Year</label>
        <div class="form-group">
            <input type="text" readonly name="session_name" value="<?php echo $academic_year_data['session'];?>">
            <span class="text-danger"><?php echo form_error('session_name'); ?></span>
        </div>
    </div>
    <div class="col-md-4">
        <label for="class_id" class="control-label"> <span class="text-danger"></span>  Class</label>
        <div class="form-group">
            <input type="text" readonly name="class" value="<?php echo $clas['class_name'];?>">
            <span class="text-danger"><?php echo form_error('class_name'); ?></span>
        </div>
    </div>
    <div class="col-md-4">
      <label for="result" class="control-label"> <span class="text-danger">*</span>Section</label>
      <div class="form-group">
        <input type="text" readonly name="section_name" value="<?php echo $section['section_name'];?>">
        <span class="text-danger"><?php echo form_error('section_name'); ?></span>
      </div>
    </div>
    
    <div class="col-md-12 p-4">
        
    </div> -->
    

    <div class="col-md-12 border border-danger p-3">
    <h5 class="text-center">Attendance & Physical Parameter List <?php if(isset($this->session->userdata['submoduleAccess']->Attendance_N_Weight) && in_array('2', $this->session->userdata['submoduleAccess']->Attendance_N_Weight)){?> <a href="<?php echo site_url('Exam_studentPapers/attendanceWeight').'?session='.$this->input->get('session').'&class_id='.$this->input->get('class_id').'&section_id='.$this->input->get('section_id'); ?>" class="float-right  btn btn-success">Add</a> <?php } ?></h5>
        <table id="data-table" class="table table-bordered table-lesspadding">
            <thead>
                <tr>
                    <th class="text-center">Sr No</th>
                    <th>Student Name</th>
                    <th class="text-center">Class</th>
                    <th class="text-center">Section</th>
                    <th class="text-center">Confidance</th>
                    <th class="text-center">Discpline</th>
                    <th class="text-center">PT</th>
                    <th class="text-center">Regularity</th>
                    <th class="text-center">Action</th>
                </tr>
            </thead>
            <tbody>
            <?php
                $i=1; 
                if(isset($parameters) && $parameters!=null){
                foreach($parameters as $p){ 
            ?>
                <tr>
                    <td class="text-center"><?php echo $i++; ?></td>
                    <td><?php echo $p['fullname']; ?></td>
                    <td class="text-center"><?php echo $clas['numeric_name']; ?></td>
                    <td class="text-center"><?php echo $section['section_name']; ?></td>
                    <td class="text-center"><?php echo $p['confidance']; ?></td>
                    <td class="text-center"><?php echo $p['discpline']; ?></td>
                    <td class="text-center"><?php echo $p['pt']; ?></td>
                    <td class="text-center"><?php echo $p['regularity']; ?></td>
                    <td class="text-center">
                        <?php if(isset($this->session->userdata['submoduleAccess']->Attendance_N_Weight) && in_array('3', $this->session->userdata['submoduleAccess']->Attendance_N_Weight)){?> <a href="<?php echo site_url('Exam_studentPapers/edit_attendance_weight/'.$p['paramID']).'?class_id='.$this->input->get('class_id').'&session_id='.$this->input->get('session').'&section_id='.$this->input->get('section_id'); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Edit</a> <?php } ?>
                        <?php if(isset($this->session->userdata['submoduleAccess']->Attendance_N_Weight) && in_array('4', $this->session->userdata['submoduleAccess']->Attendance_N_Weight)){?>  <a onclick="return confirm('Are you sure You want to delete?')"
                            href="<?php echo site_url('Exam_studentPapers/remove_attendance_weight/'.$p['paramID']).'?class_id='.$this->input->get('class_id').'&session_id='.$this->input->get('session').'&section_id='.$this->input->get('section_id'); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Delete</a> <?php } ?>
                     </td>
                   
                    </td>
                </tr>
            <?php 
                }
            }

            ?>
            </tbody>
        </table>
    </div>
    
  </div>

</div>
