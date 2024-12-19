<div class="card-body">
<?php if(($this->input->get('class_id') == null) && ($this->input->get('section_id') == null)){ //} else{ ?>
<form action="<?php echo base_url('Exam_studentPapers/attendanceList'); ?>" method="get" accept-charset="utf-8">
  <h3 class="box-title p-2 text-center">Student Attendance & Physical Parameter Setup</h3>
  <div class="row clearfix">
    <?php //if(($this->input->get('examID') == null) && ($this->input->get('class_id') == null)){ ?>
    <div class="col-md-4">
        <label for="session" class="control-label"><span class="text-danger">*</span>Academic Year</label>
        <div class="form-group">
            <select name="session" class="select2" data-placeholder="Select Acadamic Session">
                <?php
                foreach ($all_sessions as $session) {
                    if($this->input->get('session') != null){ $selected = ($session['session_id'] == $this->input->get('session')) ? ' selected="selected"' : "";}else{ $selected = ($session['session_id']['is_running'] == 1) ? ' selected="selected"' : ""; } 
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
        <label for="class_id" class="control-label"> <span class="text-danger"></span>  Class</label>
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
      <label for="result" class="control-label"> <span class="text-danger">*</span>Section</label>
      <div class="form-group">
        <select required="" id="section_o" name="section_id" class="form-control select2">
          <option value="">Select Section</option>
          <?php
            foreach($all_section as   $sec )
            {
                $selected = ($sec['section_id'] == $this->input->get('section_id')) ? ' selected="selected"' : ""; 
                    echo '<option value="'.$sec['section_id'].'" '.$selected.'>'.$sec['section_name'].'</option>'; 
            } 
          ?>
        </select>
        <span class="text-danger"><?php echo form_error('section_id');?></span>
      </div>
    </div>
    <div class="col-md-12">
        <div class="box-footer text-center">
            <button type="submit" class="btn btn-success text-center btn-raised">
                <i class="fa fa-check text-center"></i> Get Result
            </button>
        </div>
    </div>
</form>
</div>
<?php } else{ ?>
<h3 class="box-title p-2 text-center">Add Attendance & Physical Parameter</h3>
<form action="<?php echo base_url('Exam_studentPapers/attendanceWeightProcess'); ?>" method="post" accept-charset="utf-8">
  <div class="row clearfix">
    <input type="hidden" name="session_id" value="<?php echo $this->input->get('session') ;?>">
    <input type="hidden" name="class_id" value="<?php echo $this->input->get('class_id'); ?>">
    <input type="hidden" name="section_id" value="<?php echo $this->input->get('section_id'); ?>">
  <div class="col-md-12">
      <table id="example1" class="table table-bordered table-lesspadding table-responsive">
        <thead>
          <tr>
          <th class="text-center">Sr No</th>
          <th>Select <!--All <input type="checkbox" id="check_all_student_weight">--></th>
          <th>Student Name</th>
          <th class="text-center">Class</th>
          <th class="text-center">Section</th> 
          <th class="text-center">Confidance</th>
          <th class="text-center">Discpline</th>
          <th class="text-center">PT</th>
          <th class="text-center">Regularity</th>
          <!-- <th>Action</th> -->
          </tr>
        </thead>
                      <tbody>
                      <?php
                        $i=1; 
                        if(isset($students) && $students!=null){
                        foreach($students as $s){ 
                      ?>
                      <tr>
                        
                      <td class="text-center"><?php echo $i++; ?></td>
                      <td class="text-center"><input onchange="studentSelectForWeight(<?php echo $s['student_id']; ?>)" type="checkbox" class="student <?php echo 'student'.$s['student_id']; ?>" name="studentIDs[]" value="<?php echo $s['student_id']; ?>"></td>
                      <td><?php echo $s['fullname']; ?></td>
                      <td class="text-center"><?php echo $clas['class_name']; ?></td>
                      <td class="text-center"><?php echo $section['section_name']; ?></td>
                     
                      <td>
                        <select id="confidance" name="confidance[]" class="form-control select2">
                          <option value="">Select Section</option>
                          <option value="Excellent">Excellent</option>
                          <option value="Good">Good</option>
                          <option value="Average">Average</option>
                          <option value="Poor">Poor</option>
                        </select>
                      </td>
                      <td>
                        <select id="discpline" name="discpline[]" class="form-control select2">
                          <option value="">Select Section</option>
                          <option value="Excellent">Excellent</option>
                          <option value="Good">Good</option>
                          <option value="Average">Average</option>
                          <option value="Poor">Poor</option>
                        </select>
                      </td>
                      <td>
                        <select  id="pt" name="pt[]" class="form-control select2">
                          <option value="">Select Section</option>
                          <option value="Excellent">Excellent</option>
                          <option value="Good">Good</option>
                          <option value="Average">Average</option>
                          <option value="Poor">Poor</option>
                        </select>
                      </td>
                      <td>
                        <select id="regularity" name="regularity[]" class="form-control select2">
                          <option value="">Select Section</option>
                          <option value="Excellent">Excellent</option>
                          <option value="Good">Good</option>
                          <option value="Average">Average</option>
                          <option value="Poor">Poor</option>
                        </select>
                      </td>
                      <!--<td><input required="" type="number" disabled class="weights <?php echo 'weights'.$s['student_id']; ?>" name="weights[]" value="<?php echo $this->input->post('weights') ? $this->input->post('weights') : 0; ?>" /></td>-->
                      
                      </tr>
                      
                      <?php }
                      
                            }else{ ?>
                              <tr>
                        
                      <td colspan="9" class="text-center"><?php echo 'No Data Found'; ?></td>
                      
                      </tr>
                          
                      <?php  }?>
                      </tbody>
        </table>
    </div>
      <div class="col-md-12">
        
        <div class="form-group text-center">
            <button type="submit" class="btn btn-success"><i class="fa fa-check"></i> Save</button> 
        </div>
      </div>
    
  </div>
  </form>
  <?php } ?>   


</div>
