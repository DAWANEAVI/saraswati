<div class="card-body">
<form action="<?php echo base_url('Exam_studentPapers/examResult'); ?>" method="get" accept-charset="utf-8">
  <h3 class="box-title p-2 text-center">Exam Result</h3>
  <div class="row clearfix">
    <?php //if(($this->input->get('examID') == null) && ($this->input->get('class_id') == null)){ ?>
    <input type="hidden" id="session_id" value="<?php echo $academic_year_data['session_id']?>">
    
    <div class="col-md-4">
        <label for="class_id" class="control-label"> <span class="text-danger"></span>  Class</label>
        <div class="form-group">
            <select required="" onchange="get_exams_by_class()" id="class_p" name="class_id" class="form-control select2"> 
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
    <div class="col-md-4">
        <label for="exHeadID" class="control-label"> <span class="text-danger">*</span> Select Exam</label>
        <div class="form-group">
            <select required="" id="examID" name="examID" class="form-control select2"> 
            <option value="">Select Exam</option>
            <?php foreach($acadamic_exams as  $exams){
            $selected = ($exams['examID'] == $this->input->get('examID')) ? ' selected="selected"' : ""; 
            echo '<option value="'.$exams['examID'].'" '.$selected.'>'.$exams['examName'].'</option>'; 
            } ?>
            </select>
            <span class="text-danger"><?php echo form_error('examID');?></span>
        </div>
    </div>
    <div class="col-md-12">
        <div class="box-footer text-center">
            <button type="submit" class="btn btn-success text-center btn-raised">
                <i class="fa fa-check text-center"></i> Get Result
            </button>
        </div>
    </div>
    
    <div class="col-md-12 p-4">
        
    </div>
    <?php if(($this->input->get('examID') != null) && ($this->input->get('class_id') != null) && ($this->input->get('section_id') != null)){ //} else{ ?>

    <div class="col-md-12 border border-danger p-3">
    <h5 class="text-center">Student List</h5>
        <table id="data-table" class="table table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Student Name</th>
                    <th>Class</th>
                    <th>Section</th>
                    <th>Exam Title</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            <?php $i=1; 
                if(isset($students) && $students!=null){
                foreach($students as $s){ 
            ?>
                <tr>
                    <td><?php echo $i++; ?></td>
                    <td><?php echo $s['fullname']; ?></td>
                    <td><?php echo $clas['numeric_name']; ?></td>
                    <td><?php echo $section['section_name']; ?></td>
                    <td><?php echo $exam[0]['examName']; ?></td>
                    <!-- <td><a href="<?php echo site_url('Exam_studentPapers/evaluate').'?paperID='.$e['paperID'].'&section_id='.$this->input->get('section_id'); ?>" class="btn btn-warning btn-xs"><span class="fa fa-pencil"></span> Evaluate</a> </td> -->
                    <td><a href="<?php echo site_url('Exam_studentPapers/view_exam_result?'.'student_id='.$s['student_id'].'&examID='.$exam[0]['examID'].'&class_id='.$clas['class_id'].'&section_id='.$this->input->get('section_id')); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> View Result</a> 
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
