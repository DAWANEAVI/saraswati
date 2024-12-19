<?php echo form_open('Exam_studentPapers/evaluateProcess'); ?>
<div class="card-body">
   <h3 class="box-title text-center">Paper Evaluation Setup</h3>
  <div class="row clearfix">
    <div class="col-md-4">
      <label for="examName" class="control-label"> <span class="text-danger"></span>Exam Name</label>
        <div class="form-group">
          <input style="color:red; opacity: 1.6 !important;" disabled=""  type="text" name="examName" value="<?php echo $paper[0]['examName']; ?>" class="form-control " id="examName" />
          <span class="text-danger"><?php echo form_error('examName');?></span>
      </div>
    </div>
    <div class="col-md-4">
      <label for="marks" class="control-label"> <span class="text-danger"></span>Subject Name</label>
        <div class="form-group">
          <input style="color:red; opacity: 1.6 !important;" disabled="" type="text" name="subjectName" value="<?php echo $paper[0]['subjectName']; ?>" class="form-control " id="marks" />
          <span class="text-danger"><?php echo form_error('subjectName');?></span>
      </div>
    </div>
    <div class="col-md-2">
      <label for="class" class="control-label"> <span class="text-danger"></span>Class</label>
        <div class="form-group">
          <input style="color:red; opacity: 1.6 !important;" disabled="" type="text" name="class" value="<?php echo $paper[0]['class_name']; ?>" class="form-control " id="class" />
          <span class="text-danger"><?php echo form_error('class');?></span>
      </div>
    </div>
    <div class="col-md-2">
      <label for="section" class="control-label"> <span class="text-danger"></span>Section</label>
        <div class="form-group">
          <input style="color:red; opacity: 1.6 !important;" disabled="" type="text" name="section" value="<?php echo $section['section_name']; ?>" class="form-control " id="section" />
          <span class="text-danger"><?php echo form_error('section_id');?></span>
      </div>
    </div> 
    
    <div class="col-md-12 border border-danger pb-3"> 
    <h5 class="text-center p-2">Add Paper Result <a href="<?php echo site_url('Exam_studentPapers/evaluate').'?paperID='.$this->input->get('paperID').'&examID='.$this->input->get('examID').'&class_id='.$this->input->get('class_id').'&section_id='.$this->input->get('section_id').'&session_id='.$this->input->get('session_id'); ?>" class="float-right  btn btn-success">Add</a> </h5>
      <table id="data-table" class="table table-bordered table-lesspadding">
        <thead>
          <tr>
          <th class="text-center">SR.NO</th>
          <th>Student Name</th>
          <th class="text-center">Total Marks</th>
          <th class="text-center">Min. Passing Marks</th>
          <th class="text-center">Obtained Marks</th>
          <th class="text-center">Percentage </th>
          <th class="text-center">Grade</th>
          <th class="text-center">Action</th>
          </tr>
        </thead>
            <tbody>
            <?php
              $i=1; 
              if(isset($studentsResult) && $studentsResult!=null){
              foreach($studentsResult as $s){ 
            ?>
            <tr>
            <td class="text-center"><?php echo $i++; ?></td>
            <td><?php echo $s['fullname']; ?></td>
            <td class="text-center"><?php echo $paper[0]['totalMarks']; ?></td>
            <td class="text-center"><?php echo $paper[0]['passingMarks']; ?></td>
            <td class="text-center"><?php echo $s['marks']; ?></td>
            <td class="text-center"><?php echo (($s['marks']/$paper[0]['totalMarks'])*100).' %'; ?></td>
            <td class="text-center"><?php echo $s['grade']; ?></td>
            <td><a href="<?php echo site_url('exam_studentPapers/edit_evaluation/'.$s['studPaperID']).'?paperID='.$this->input->get('paperID').'&examID='.$this->input->get('examID').'&class_id='.$this->input->get('class_id').'&section_id='.$this->input->get('section_id').'&session_id='.$this->input->get('session_id');; ?>" class="btn btn-info btn-xs" style="padding: 0.1rem .35rem !important;"><span class="fa fa-pencil"></span> Edit</a> 
                <a
                  onclick="return confirm('Are you sure You want to delete?')"
                  href="<?php echo site_url('exam_studentPapers/remove_evaluation/'.$s['studPaperID']).'?paperID='.$this->input->get('paperID').'&examID='.$this->input->get('examID').'&class_id='.$this->input->get('class_id').'&section_id='.$this->input->get('section_id').'&session_id='.$this->input->get('session_id');; ?>" class="btn btn-danger btn-xs" style="padding: 0.1rem .35rem !important;"><span class="fa fa-trash"></span> Delete
                </a>
            </td> 
            </tr>
            <?php }
            
                  }
            ?>
            </tbody>
        </table>
      </div>
      
    </div>
    
</div>
<?php echo form_close(); ?>
