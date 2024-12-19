<?php //echo form_open('Attendance_student/add_student_attendance?session_id='.$this->input->post('session_id')); ?>
<?php echo form_open('Attendance_student/add_student_attendance'); ?>
<div class="card-body">
<h3 class="box-title ">Add Attendance</h3>
  <div class="row clearfix">
        <div class="col-md-3">
          <lab  for="session_id" class="control-label"> <span class="text-danger">*</span>  Session</label>
          <div class="form-group">
          <?php foreach($all_sessions as   $academic_session){
              
                if($academic_session['session_id'] == $this->input->get('session_id')){
                 // $selected = ($session['session_id'] == $this->input->post('acadamic_session')) ? ' selected="selected"' : "";
                  echo '<input type="text" name=""  class="form-control" value="'.$academic_session['session'].'" id="session_id" disabled>'; 
                  echo '<input type="hidden" name="session_id"  class="" value="'.$academic_session['session_id'].'">'; 
                }
                
              }?>

            <span class="text-danger"><?php echo form_error('session_id');?></span>
          </div>
        </div>

        <div class="col-md-3">
          <label for="class_id" class="control-label"> <span class="text-danger">*</span>  Class</label>
          <div class="form-group">

          <?php foreach($all_class as   $class){
              
              if($class['class_id'] == $this->input->get('class_id')){
                echo '<input type="text" name=""  class="form-control" value="'.$class['class_name'].'" id="class_id" disabled>'; 
                echo '<input type="hidden" name="class_id"  class="" value="'.$class['class_id'].'">'; 
              }
              
            }?>

            <span class="text-danger"><?php echo form_error('class_id');?></span>
          </div>
        </div>

        <div class="col-md-3">
          <label for="section_id" class="control-label"> <span class="text-danger">*</span>  Section</label>
          <div class="form-group">

          <?php foreach($all_section as   $section){
              
              if($section['section_id'] == $this->input->get('section_id')){
                echo '<input type="text" name=""  class="form-control" value="'.$section['section_name'].'" id="section_id" disabled>'; 
                echo '<input type="hidden" name="section_id"  class="" value="'.$section['section_id'].'">'; 
              }
              
            }?>

            <span class="text-danger"><?php echo form_error('section_name');?></span>
          </div>
        </div>

        <div class="col-md-3">
          <label for="date_a" class="control-label"> <span class="text-danger">*</span>  Date</label>
          <div class="form-group">
             <!-- <input type="date" name="date"  class="form-control" value="<?php echo $this->input->post('date');?>" id="date_a" required="">-->
              <input type="date" name="date_a"  class="form-control" value="<?php echo $this->input->get('date');?>" id="date_a" readonly="True">
            
                <i class="form-group__bar"></i>
                <span class="text-danger"><?php echo form_error('date_a'); ?></span>

          </div>
        </div>

        <div class="col-md-12 text-right">
        <input type="checkbox" id="check_all_student">
        Select All
        <br />
        <br />
        </div>
         <table id="table-student"  class="table table-bordered">
            <thead class='thead-default'>
            <tr>
                <th>Sr No</th>
                <th>Student</th>
                <th>Actions</th>
            </tr>
            </thead>
            
            <tbody>
            <?php 
             $c =1;
            foreach($all_student as $stud){ ?>

              <tr>
                <td><?php echo $c ?></td>
                <td><?php echo $stud['fullname'] ?></td>
                <td><input type='checkbox' class='student' name='stud[]' value='<?php echo $stud["student_id"]?>'></td>
              </tr>
              
            <?php $c=$c+1; } ?>

            </tbody>
        </table>




        <div class="col-md-12">
          <label for=" " class="control-label"> </label>
          <div class="form-group"><button type="submit" class="btn btn-success"><i class="fa fa-check"></i> Save</button> 
          </div>
        </div>
              
      </div>
  </div>
</div>
<?php echo form_close(); ?>