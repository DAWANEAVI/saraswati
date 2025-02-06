<?php $attribute = array('class'=>'form','id' =>'inputForm'); echo form_open('Attendance_students/add_attendance_process',$attribute); ?>
<div class="card-body">
  <h3 class="box-title text-center">Add Attendace Of <?php echo date("d-m-Y", strtotime($date)); ?></h3>
  <div class="row clearfix">
    
    <input type="hidden" name="class_id" value="<?php echo $clas['class_id']; ?>" />
    <input type="hidden" name="section_id" value="<?php echo $section['section_id']?>" />
    <input type="hidden" name="session_id" value="<?php echo $academic_year_data['session_id']; ?>" />
    <input type="hidden" name="date" value="<?php echo $date; ?>" />
    <?php  if(isset($students) && $students!=null){ ?>
    <div class="col-md-12">
      <table id="example1" class="table table-bordered table-lesspadding">
        <thead>
          <tr>
          <th class="text-center">#</th>
          <th>Student Name</th>
          <th>Class</th>
          <th>Section</th>
          <th class="text-center">Attendace</th>
          <!-- <th>Action</th> -->
          </tr>
        </thead>
            <tbody>
            <?php
              $i=1; 
             
              foreach($students as $s){ 
            ?>
            <?php if (!in_array($s['student_id'], $already_added)) { ?>
            <tr>
            <td class="text-center"><?php echo $i++; ?></td>
            <td><?php echo $s['fullname']; ?> <input type="hidden" name="studentIDs[]" value="<?php echo $s['student_id']; ?>" /></td>
            <td><?php echo $clas['class_name']; ?></td>
            <td><?php echo $section['section_name']; ?></td>
            <td class="text-center">
              <input type="radio" checked name="<?php echo 'attendacne'.$s['student_id']; ?>" id="track" value="0" /><label for="track"> Absent</label>
              <span style="margin:0px 40px 0px 40px;"><input type="radio" name="<?php echo 'attendacne'.$s['student_id']; ?>" id="event" value="1"  /><label for="event"> Present</label></span>
              <input type="radio" name="<?php echo 'attendacne'.$s['student_id']; ?>" id="message" value="2" /><label for="message"> Leave</label>
            </td>
            </tr>
            <?php } ?>

            <!-- <tr>
            <td colspan="5" class="text-center"><?php echo 'All Student Attendance Already Added For This Date. Plz Check Attendance List' ?></td>
            </tr> -->

            <?php }
            ?>
            </tbody>
      </table>
    </div>
      <div class="col-md-12">
        <label for=" " class="control-label"> </label>
        <div class="form-group text-center">
            <button type="submit" class="btn btn-success"><i class="fa fa-check"></i> Save</button> 
        </div>
      </div>
    <?php } else{ ?>
      <h3 class="box-title text-center">All Student Attendance Already Added For This Date. Plz Check Attendance List</h3>
    <?php }?>  
    </div>
    
</div>
<?php echo form_close(); ?>
