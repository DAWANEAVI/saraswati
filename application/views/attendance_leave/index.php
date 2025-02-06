<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Attendance_leave  Listing</h3>
              <div class="box-tools">
                <a href="<?php echo site_url('attendance_leave/add'); ?>" class="btn btn-success btn-sm">Add</a> 
                </div>
   <?php echo $this->session->flashdata('alert_msg');?>
            <div class="box-body table-responsive no-padding">
                <table id="example1" class="table table-striped">
                    <thead>
                    <tr>
                    <th>#</th>
                    <th>LeaveID</th>
                    <th>User id</th>
                    <th>User type</th>
                    <th>LeaveDate</th>
                    <th>Leave reasons</th>
                    <th>Status</th>
                    <th>Screen by</th>
                    <th>Remarks</th>
                    <th>Created by</th>
                    <th>Created at</th>
                    <th>Modified by</th>
                    <th>Modified at</th>
                    <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $i=$noof_page+1; 
           if(isset($attendance_leave) && $attendance_leave!=null)
           {
           foreach($attendance_leave as $a){ ?>
                    <tr>
                    <td><?php echo $i++; ?></td>
                    <td><?php echo $a['leaveID']; ?></td>
                    <td><?php echo $a['user_id']; ?></td>
                    <td><?php echo $a['user_type']; ?></td>
                    <td><?php echo $a['leaveDate']; ?></td>
                    <td><?php echo $a['leave_reasons']; ?></td>
                    <td><?php echo $a['status']; ?></td>
                    <td><?php echo $a['screen_by']; ?></td>
                    <td><?php echo $a['remarks']; ?></td>
                    <td><?php echo $a['created_by']; ?></td>
                    <td><?php echo $a['created_at']; ?></td>
                    <td><?php echo $a['modified_by']; ?></td>
                    <td><?php echo $a['modified_at']; ?></td>
                     <td><a href="<?php echo site_url('attendance_leave/edit/'.$a['leaveID']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Edit</a> 
                         <a
                            onclick="return confirm('Are you sure You want to delete?')"
                             href="<?php echo site_url('attendance_leave/remove/'.$a['leaveID']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Delete</a>
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

