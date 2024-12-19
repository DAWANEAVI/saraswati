<div class="row">
    <div class="col-md-12">
        <div class="card-body">
            <div class="box-header">
                <h3 class="box-title">Exam Title List <?php if(isset($this->session->userdata['submoduleAccess']->Exam_Title_Setup) && in_array('2', $this->session->userdata['submoduleAccess']->Exam_Title_Setup)){?><a style="float:right;" href="<?php echo site_url('exam_Heads/add'); ?>" class="btn btn-success">Add</a> <?php } ?> </h3> 
              
                 <?php echo $this->session->flashdata('alert_msg');?>

            <div  class="">
                <table id="data-table" class="table table-bordered">
                    <thead>
                    <tr>
                    <th>#</th>
                    <th>Exam Name</th>
                    <th>Status</th>
                    <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $i=$noof_page+1; 
           if(isset($exam_Heads) && $exam_Heads!=null)
           {
           foreach($exam_Heads as $e){ ?>
                    <tr>
                    <td><?php echo $i++; ?></td>
                    <td><?php echo $e['examName']; ?></td>
                    <td><?php echo $e['statusID'] ? 'Active' : 'Inactive'; ?></td>
                     <td>
                        <?php if(isset($this->session->userdata['submoduleAccess']->Exam_Title_Setup) && in_array('3', $this->session->userdata['submoduleAccess']->Exam_Title_Setup)){?><a href="<?php echo site_url('exam_Heads/edit/'.$e['exHeadID']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Edit</a> <?php }?>
                        <?php if(isset($this->session->userdata['submoduleAccess']->Exam_Title_Setup) && in_array('4', $this->session->userdata['submoduleAccess']->Exam_Title_Setup)){?><a
                            onclick="return confirm('Are you sure You want to delete?')"
                             href="<?php echo site_url('exam_Heads/remove/'.$e['exHeadID']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Delete</a> <?php }?>
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

