<div class="card-body">
<form action="<?php echo base_url('Exam_studentPapers/studentResult'); ?>" method="get" accept-charset="utf-8">
  <h3 class="box-title p-2 text-center">Exam Result</h3>
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
    
    <div class="col-md-12 p-4">
        
    </div>
    <?php if(($this->input->get('class_id') != null) && ($this->input->get('section_id') != null)){ //} else{ ?>

    <div class="col-md-12 border border-danger p-3">
    <h5 class="text-center">Student List</h5>
        <table id="data-table" class="table table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Student Name</th>
                    <th>Class</th>
                    <th>Section</th>
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
                    <!-- <td><a href="<?php echo site_url('Exam_studentPapers/evaluate').'?paperID='.$e['paperID'].'&section_id='.$this->input->get('section_id'); ?>" class="btn btn-warning btn-xs"><span class="fa fa-pencil"></span> Evaluate</a> </td> -->
                    <td><a href="<?php echo site_url('Exam_studentPapers/viewFinalStatement').'?student_id='.$s['student_id'].'&class_id='.$this->input->get('class_id').'&session_id='.$this->input->get('session').'&section_id='.$this->input->get('section_id'); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> View Result</a> 
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
