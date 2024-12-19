<?php $attribute = array('class'=>'form','id' =>'inputForm'); echo form_open('Exam_studentPapers/evaluateProcess',$attribute); ?>
<div class="card-body">
  <h3 class="box-title text-center">Evaluate Paper</h3>
  <div class="row clearfix">
    <div class="col-md-6">
      <label for="examName" class="control-label"> <span class="text-danger"></span>Exam Name</label>
        <div class="form-group">
          <input style="color:red; opacity: 1.6 !important;" disabled=""  type="text" name="examName" value="<?php echo $paper[0]['examName']; ?>" class="form-control " id="examName" />
          <span class="text-danger"><?php echo form_error('examName');?></span>
      </div>
    </div>
    <div class="col-md-6">
      <label for="marks" class="control-label"> <span class="text-danger"></span>Subject Name</label>
        <div class="form-group">
          <input style="color:red; opacity: 1.6 !important;" disabled="" type="text" name="subjectName" value="<?php echo $paper[0]['subjectName']; ?>" class="form-control " id="marks" />
          <span class="text-danger"><?php echo form_error('subjectName');?></span>
      </div>
    </div>
    <div class="col-md-6">
      <label for="class" class="control-label"> <span class="text-danger"></span>Class</label>
        <div class="form-group">
          <input style="color:red; opacity: 1.6 !important;" disabled="" type="text" name="class" value="<?php echo $paper[0]['class_name']; ?>" class="form-control " id="class" />
          <span class="text-danger"><?php echo form_error('class');?></span>
      </div>
    </div>
    <div class="col-md-6">
      <label for="section" class="control-label"> <span class="text-danger"></span>Section</label>
        <div class="form-group">
          <input style="color:red; opacity: 1.6 !important;" disabled="" type="text" name="section" value="<?php echo $section['section_name']; ?>" class="form-control " id="section" />
          <span class="text-danger"><?php echo form_error('section_id');?></span>
      </div>
    </div>
    <input type="hidden" name="class_id" value="<?php echo $this->input->get('class_id'); ?>" />
    <input type="hidden" name="paperID" value="<?php echo $this->input->get('paperID'); ?>" />
    <input type="hidden" name="examID" value="<?php echo $this->input->get('examID'); ?>" />
    <input type="hidden" name="section_id" value="<?php echo $section['section_id']; ?>" />
    <input type="hidden" name="passingMarks" value="<?php echo $paper[0]['passingMarks']; ?>" />
    <input type="hidden" name="totalMarks" id="totalMarks" value="<?php echo $paper[0]['totalMarks']; ?>" />
    <input type="hidden" name="session_id" value="<?php echo $this->input->get('session_id'); ?>" />
    
    <div class="col-md-12">
      <table id="example1" class="table table-bordered table-lesspadding">
        <thead>
          <tr>
          <th class="text-center">#</th>
          <th class="text-center">Select <!--All <input type="checkbox" id="check_all_student_weight">--></th>
          <th>Student Name</th>
          <!-- <th>Class</th>
          <th>Section</th> -->
          <th class="text-center">Total Marks</th>
          <th class="text-center">Min. Passing Marks</th>
          <th class="text-center">Obtained Marks</th>
          <!-- <th>Action</th> -->
          </tr>
        </thead>
            <tbody>
            <?php
              $i=1; 
              if(isset($students) && $students!=null){
              foreach($students as $s){ 
            ?>
            <?php if (!in_array($s['student_id'], $already_evaluated)) { ?>
            <tr>
            <td class="text-center"><?php echo $i++; ?></td>
            <td class="text-center"><input onchange="studentSelectForEvaluation(<?php echo $s['student_id']; ?>)" type="checkbox" class="student <?php echo 'student'.$s['student_id']; ?>" name="studentIDs[]" value="<?php echo $s['student_id']; ?>"></td>
            <td><?php echo $s['fullname']; ?></td>
            <!-- <td><?php echo $s['class_id']; ?></td>
            <td><?php echo $s['section_id']; ?></td> -->
            <td class="text-center"><?php echo $paper[0]['totalMarks']; ?></td>
            <td class="text-center"><?php echo $paper[0]['passingMarks']; ?></td>
            <td class="text-center"><input onchange="input_validation(<?php echo $s['student_id']; ?>)" disabled="" required="" class="<?php echo 'obtainedMarks'.$s['student_id'];?>" id="<?php echo 'obtainedMarks'.$s['student_id'];?>" type="number" name="obtainedMarks[]" value="<?php echo $this->input->post('obtainedMarks') ? $this->input->post('obtainedMarks') : 0; ?>" /><span class="<?php echo 'span'.$s['student_id'].' ';?> text-danger"></span></td>
            <!-- <td><a href="<?php echo site_url('exam_studentPapers/edit/'.$s['student_id']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Edit</a> 
                <a
                    onclick="return confirm('Are you sure You want to delete?')"
                    href="<?php echo site_url('exam_studentPapers/remove/'.$s['student_id']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Delete</a>
            </td> -->
            </tr>
            <?php } ?>

            <?php }
            
                  }else{
                          echo 'No data found';
                    }

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
      
    </div>
    
</div>
<?php echo form_close(); ?>
