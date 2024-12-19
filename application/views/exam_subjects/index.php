<div class="row">
    <div class="col-md-12">
        <div class="card-body">
            <div class="box-header">
                <h3 class="box-title">Subjects  Listing <?php if(isset($this->session->userdata['submoduleAccess']->Subject_Setup) && in_array('2', $this->session->userdata['submoduleAccess']->Subject_Setup)){?><a href="<?php echo site_url('exam_subjects/add'); ?>" class="float-right  btn btn-success">Add</a> <?php }?> </h3>
             
   <?php echo $this->session->flashdata('alert_msg');?>
            <div class="box-body no-padding">
                <table  id="data-table" class="table table-bordered">
                    <thead>
                    <tr>
                    <th>#</th>
                    <th>SubjectName</th>
                    <th>StatusID</th>
                    <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $i=$noof_page+1; 
           if(isset($exam_subjects) && $exam_subjects!=null)
           {
           foreach($exam_subjects as $e){ ?>
                    <tr>
                    <td><?php echo $i++; ?></td>
                    <td><?php echo $e['subjectName']; ?></td>
                    <td><?php echo $e['statusID'] ? 'Active' :'Inactive'; ?></td>
                     <td>
                         <?php if(isset($this->session->userdata['submoduleAccess']->Subject_Setup) && in_array('3', $this->session->userdata['submoduleAccess']->Subject_Setup)){?><a href="<?php echo site_url('exam_subjects/edit/'.$e['subjectID']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Edit</a> <?php }?>
                         <?php if(isset($this->session->userdata['submoduleAccess']->Subject_Setup) && in_array('4', $this->session->userdata['submoduleAccess']->Subject_Setup)){?><a
                            onclick="return confirm('Are you sure You want to delete?')"
                             href="<?php echo site_url('exam_subjects/remove/'.$e['subjectID']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Delete</a> <?php }?>
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

