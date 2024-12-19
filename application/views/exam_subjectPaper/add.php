<?php echo form_open('exam_subjectPaper/add?examID='.$acadamic_exams[0]['examID'].'&class_id='.$all_class['class_id'].'&section_id='.$this->input->get('section_id')); ?>
<div class="card-body">
  <h3 class="box-title text-center">Add Paper</h3>
        <div class="row clearfix">
             <div class="col-md-6">
                <label for="exHeadID" class="control-label"> <span class="text-danger"></span> Select Exam</label>
                 <div class="form-group">
                    <input type="text"class="form-control" readonly=""  value="<?php echo $acadamic_exams[0]['examName']; ?>" >
                    <input type="hidden" name="examID" value="<?php echo $acadamic_exams[0]['examID']; ?>" >
                    <span class="text-danger"><?php echo form_error('examID');?></span>
                  </div>
              </div>
              <div class="col-md-6">
                <label for="class_id" class="control-label"> <span class="text-danger"></span>  Class</label>
                 <div class="form-group">
                    <input type="hidden" name="class_id"  value="<?php echo $all_class['class_id']; ?>" >
                    <input type="text"class="form-control" readonly="" value="<?php echo $all_class['class_name']; ?>" >
                    <span class="text-danger"><?php echo form_error('class_id');?></span>
                  </div>
              </div>
              <div class="col-md-12">
                <table id="example1" class="table table-bordered table-lesspadding" style="overflow-x:auto;">
                  <thead>
                    <tr>
                    <th class="text-center">#</th>
                    <th class="text-center">Select</th>
                    <th>Subject Name</th>
                    <th class="text-center">Evaluation Type</th>
                    <th class="text-center">Total Marks</th>
                    <th class="text-center">Passing Marks</th>
                    <th class="text-center">Paper Date</th>
                    </tr>
                  </thead>
                      <tbody>
                      <?php
                        $i=1; 
                        if(isset($all_exam_subjects) && $all_exam_subjects!=null){
                        foreach($all_exam_subjects as $exam_subjects){ 
                      ?>
                      <tr>
                      <td class="text-center"><?php echo $i++; ?></td>
                      <td class="text-center"><input onchange="studentSubjectForPaper(<?php echo $exam_subjects['subjectID']; ?>)" type="checkbox" class="<?php echo 'subject'.$exam_subjects['subjectID']; ?>" name="subjectIDs[]" value="<?php echo $exam_subjects['subjectID']; ?>"></td>
                      <td><?php echo $exam_subjects['subjectName']; ?></td>
                      <td class="text-center">
                        <select disabled="" required="" name="evaluations[]" class="form-control select2 <?php echo 'evaluation'.$exam_subjects['subjectID'];?>">
                          <option value="">Select Evaluation</option>
                          <option value="0">Grades</option>
                          <option value="1">Percentage</option>
                        </select>
                        <span class="text-danger"><?php echo form_error('evaluations');?></span>
                      </td>
                      <td class="text-center"><input style="width: 100px !important;" disabled="" required="" type="number" class="<?php echo 'total_mark'.$exam_subjects['subjectID']; ?>" name="totalMarks[]" value=""></td>
                      <td class="text-center"><input style="width: 100px !important;" disabled="" required="" type="number" class="<?php echo 'passing_mark'.$exam_subjects['subjectID']; ?>" name="passingMarks[]" value=""></td>
                      <td class="text-center"><input disabled="" required="" type="date" class="<?php echo 'date'.$exam_subjects['subjectID'];?>"  name="dates[]" value="" /></td>
                      </tr>
                      <?php }
                      
                      }else{  ?>
                      <tr>
                        <td colspan="7" class="text-center">No Subject Found</td>
                      </tr>
                      <?php  } ?>
                      
                      </tbody>
                </table>
              </div>
             <div class="col-md-12 text-center">
               <input type="hidden" name="section_id" value="<?php echo $this->input->get('section_id') ? $this->input->get('section_id') : $this->input->post('section_id'); ?>" />
               <label for=" " class="control-label"> </label>
                <div class="form-group">
                   <button type="submit" class="btn btn-success"><i class="fa fa-check"></i> Save</button> 
               </div>
             </div>
           
          </div>
    
        </div>
</div>
<?php echo form_close(); ?>
