<div class="card-body">
<form action="<?php echo base_url('Exam_acadamicExams/index'); ?>" method="get" accept-charset="utf-8">
  <h3 class="box-title p-2 text-center">Acadamic Exam Setup </h3>
  <div class="row clearfix">
    <?php //if(($this->input->get('examID') == null) && ($this->input->get('class_id') == null)){ ?>

    <div class="col-md-6">
        <label for="session" class="control-label"><span class="text-danger">*</span>Academic Year</label>
        <div class="form-group">
            <select name="session_id" class="select2" data-placeholder="Select Acadamic Session">
                <?php
                foreach ($all_sessions as $session) {
                    if($this->input->get('session_id') != null){ $selected = ($session['session_id'] == $this->input->get('session_id')) ? ' selected="selected"' : "";}else{ $selected = ($session['session_id']['is_running'] == 1) ? ' selected="selected"' : ""; } 
                    if($session['status'] == 1){
                        echo '<option value="' . $session['session_id'] . '" ' . $selected . '>' . $session['session'] . '</option>';
                    }
                    
                }
                ?>
            </select>
            <span class="text-danger"><?php echo form_error('session'); ?></span>
        </div>
    </div>
    <div class="col-md-6">
        <label for="exHeadID" class="control-label"> <span class="text-danger">*</span> Select Exam Title</label>
        <div class="form-group">
            <select required="" id="exHeadID" name="exHeadID" class="form-control select2"> 
            <option value="">Select Exam </option>
            <?php foreach($exams_heads as  $title){
            $selected = ($title['exHeadID'] == $this->input->get('exHeadID')) ? ' selected="selected"' : ""; 
            echo '<option value="'.$title['exHeadID'].'" '.$selected.'>'.$title['examName'].'</option>'; 
            } ?>
            </select>
            <span class="text-danger"><?php echo form_error('exHeadID');?></span>
        </div>
    </div>
    <div class="col-md-12">
        <div class="box-footer text-center">
            <button type="submit" class="btn btn-success text-center btn-raised">
                <i class="fa fa-check text-center"></i> Get Details
            </button>
        </div>
    </div>
    
    <div class="col-md-12 p-4">
        
    </div>
    <?php if(($this->input->get('exHeadID') != null) && ($this->input->get('session_id') != null)){ //} else{ ?>

    <div class="col-md-12 border border-danger p-3">
    <h5 class="text-center">Acadamic Exam List <?php if(isset($this->session->userdata['submoduleAccess']->Acadamic_Exam_Setup) && in_array('2', $this->session->userdata['submoduleAccess']->Acadamic_Exam_Setup)){?><a href="<?php echo site_url('Exam_acadamicExams/add').'?exHeadID='.$this->input->get('exHeadID').'&session_id='.$this->input->get('session_id'); ?>" class="float-right  btn btn-success">Add</a> <?php } ?></h5>
        <table id="data-table" class="table table-bordered">
            <thead>
                <tr class="text-center">
                    <th>#</th>
                    <th>Class</th>
                    <!-- <th>Session</th> -->
                    <th>Evaluation</th>
                    <th>Exam Start Date</th>
                    <th>Exam End Date</th>
                    <th>Exam Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            <?php $i=$noof_page+1; 
           if(isset($exam_acadamicExams) && $exam_acadamicExams!=null)
           {
           foreach($exam_acadamicExams as $e){ ?>
                <tr class="text-center">
                    <td><?php echo $i++; ?></td>
                    <td><?php echo $e['numeric_name']; ?></td>
                    <!-- <td><?php echo $e['session']; ?></td> -->
                    <td><?php echo $e['evaluation'] ? 'Grades' : 'Marks'; ?></td>
                    <td><?php echo $e['examStartDate']; ?></td>
                    <td><?php echo $e['examEndDate']; ?></td>
                    <td><?php echo $e['examStatus'] ? 'Completed' : 'Pending'; ?></td>
                     <td>
                        <?php if(isset($this->session->userdata['submoduleAccess']->Acadamic_Exam_Setup) && in_array('3', $this->session->userdata['submoduleAccess']->Acadamic_Exam_Setup)){?><a href="<?php echo site_url('exam_acadamicExams/edit/'.$e['examID']).'?exHeadID='.$this->input->get('exHeadID').'&session_id='.$this->input->get('session_id');?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Edit</a> <?php } ?> 
                        <?php if(isset($this->session->userdata['submoduleAccess']->Acadamic_Exam_Setup) && in_array('4', $this->session->userdata['submoduleAccess']->Acadamic_Exam_Setup)){?> <a onclick="return confirm('Are you sure You want to delete?')"
                             href="<?php echo site_url('exam_acadamicExams/remove/'.$e['examID']).'?exHeadID='.$this->input->get('exHeadID').'&session_id='.$this->input->get('session_id');?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Delete</a> <?php } ?>
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

 