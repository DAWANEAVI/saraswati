<div class="card-body">
<form action="<?php echo base_url('exam_subjectPaper/index'); ?>" method="get" accept-charset="utf-8">
  <h3 class="box-title p-2 text-center">Papers Setup</h3>
  <div class="row clearfix">
    <?php //if(($this->input->get('examID') == null) && ($this->input->get('class_id') == null)){ ?>
    <input type="hidden" id="session_id" value="<?php echo $academic_year_data['session_id']?>">
    
    <div class="col-md-4">
        <label for="class_id" class="control-label"> <span class="text-danger">*</span>  Class</label>
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
            foreach($all_section as   $section )
            {
                $selected = ($section['section_id'] == $this->input->get('section_id')) ? ' selected="selected"' : ""; 
                    echo '<option value="'.$section['section_id'].'" '.$selected.'>'.$section['section_name'].'</option>'; 
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
                <i class="fa fa-check text-center"></i> Get Papers
            </button>
        </div>
    </div>
    
    <div class="col-md-12 p-4">
        
    </div>
    <?php if(($this->input->get('examID') != null) && ($this->input->get('class_id') != null) && ($this->input->get('section_id') != null)){ //} else{ ?>

    <div class="col-md-12 border border-danger p-3">
    <h5 class="text-center">Papers  Listing <?php if(isset($this->session->userdata['submoduleAccess']->Paper_Setup) && in_array('2', $this->session->userdata['submoduleAccess']->Paper_Setup)){?><a href="<?php echo site_url('exam_subjectPaper/add').'?examID='.$this->input->get('examID').'&class_id='.$this->input->get('class_id').'&section_id='.$this->input->get('section_id'); ?>" class="float-right  btn btn-success">Add</a> <?php }?> </h5>
        <table id="data-table" class="table table-bordered table-lesspadding">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Subject</th>
                    <th>Class</th>
                    <th>Exam Title</th>
                    <th>Passing Marks</th>
                    <th>Total Marks</th>
                    <th>Result Type</th>
                    <th>Date</th>
                    <th>Evaluate</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            <?php $i=1; 
                if(isset($exam_subjectPaper) && $exam_subjectPaper!=null){
                foreach($exam_subjectPaper as $e){ 
            ?>
                <tr>
                    <td><?php echo $i++; ?></td>
                    <td><?php echo $e['subjectName']; ?></td>
                    <td><?php echo $e['numeric_name']; ?></td>
                    <td><?php echo $e['examName']; ?></td>
                    <td><?php echo $e['passingMarks']; ?></td>
                    <td><?php echo $e['totalMarks']; ?></td>
                    <td><?php echo $e['evaluation']==1 ? 'Percentage':'Grade'; ?></td>
                    <td><?php echo $e['date']; ?></td>
                    <!-- <td><a href="<?php echo site_url('Exam_studentPapers/evaluate').'?paperID='.$e['paperID'].'&section_id='.$this->input->get('section_id'); ?>" class="btn btn-warning btn-xs"><span class="fa fa-pencil"></span> Evaluate</a> </td> -->
                    <td><?php if(isset($this->session->userdata['submoduleAccess']->Paper_Setup) && in_array('3', $this->session->userdata['submoduleAccess']->Paper_Setup)){?><a href="<?php echo site_url('Exam_studentPapers/evaluateSetup').'?paperID='.$e['paperID'].'&examID='.$this->input->get('examID').'&class_id='.$this->input->get('class_id').'&section_id='.$this->input->get('section_id').'&session_id='.$academic_year_data['session_id']; ?>" class="btn btn-warning btn-xs" style="padding: 0.1rem .35rem !important;"><span class="fa fa-pencil"></span> Evaluate</a> <?php }?> </td>
                    <td><?php if(isset($this->session->userdata['submoduleAccess']->Paper_Setup) && in_array('3', $this->session->userdata['submoduleAccess']->Paper_Setup)){?><a href="<?php echo site_url('exam_subjectPaper/edit/'.$e['paperID'].'?examID='.$this->input->get('examID').'&class_id='.$this->input->get('class_id').'&section_id='.$this->input->get('section_id')); ?>" class="btn btn-info btn-xs" style="padding: 0.1rem .35rem !important;"><span class="fa fa-pencil"></span> Edit</a> <?php }?>
                        <?php if(isset($this->session->userdata['submoduleAccess']->Paper_Setup) && in_array('4', $this->session->userdata['submoduleAccess']->Paper_Setup)){?><a onclick="return confirm('Are you sure You want to delete?')" href="<?php echo site_url('exam_subjectPaper/remove/'.$e['paperID'].'?examID='.$this->input->get('examID').'&class_id='.$this->input->get('class_id').'&section_id='.$this->input->get('section_id')); ?>" class="btn btn-danger btn-xs" style="padding: 0.1rem .35rem !important;"><span class="fa fa-trash"></span> Delete</a> <?php } ?>
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
