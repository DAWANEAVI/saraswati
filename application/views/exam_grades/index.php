<div class="row">
    <div class="col-md-12">
       <div class="card-body">
            <div class="box-header">
                <h3 class="box-title">Grade List</h3>
              <div class="box-tools">
                <?php if(isset($this->session->userdata['submoduleAccess']->Grades_Setup) && in_array('2', $this->session->userdata['submoduleAccess']->Grades_Setup)){?><a href="<?php echo site_url('exam_grades/add'); ?>" class=" float-right btn btn-success">Add</a>  <?php } ?>
                </div>
            <?php echo $this->session->flashdata('alert_msg');?>
            <div class="box-body no-padding">
                <table id="data-table" class="table table-bordered">
                    <thead>
                    <tr>
                    <th>#</th>
                    <th>Grade</th>
                    <th>Min grade range</th>
                    <th>Max grade range</th>
                    <th>Remark</th>
                    <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $i=$noof_page+1; 
                    if(isset($exam_grades) && $exam_grades!=null)
                    {
                    foreach($exam_grades as $e){ ?>
                    <tr>
                    <td><?php echo $i++; ?></td>
                    <td><?php echo $e['grade']; ?></td>
                    <td><?php echo $e['min_grade_range']; ?></td>
                    <td><?php echo $e['max_grade_range']; ?></td>
                    <td><?php echo $e['remark']; ?></td>
                     <td>
                        <?php if(isset($this->session->userdata['submoduleAccess']->Grades_Setup) && in_array('3', $this->session->userdata['submoduleAccess']->Grades_Setup)){?><a href="<?php echo site_url('exam_grades/edit/'.$e['gradeID']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Edit</a> <?php }?>
                        <?php if(isset($this->session->userdata['submoduleAccess']->Grades_Setup) && in_array('4', $this->session->userdata['submoduleAccess']->Grades_Setup)){?> <a
                            onclick="return confirm('Are you sure You want to delete?')"
                             href="<?php echo site_url('exam_grades/remove/'.$e['gradeID']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Delete</a> <?php } ?>
                     </td>
                    </tr>
                     <?php }
                    
                           }else{
                                  echo 'No data found';
                             }

                     ?>
                    </tbody>
                </table>
                <div class="pull-right">
                      <?php echo $this->pagination->create_links(); ?> 
                </div>
            </div>

        </div>
    </div>

</div>

