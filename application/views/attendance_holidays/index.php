<div class="card-body">
  <h3 class="box-title p-2 text-center">Holiday List <a style="float:right" href="<?php echo site_url('attendance_holidays/add') ?>" class="btn btn-success btn--raised text-right">Add Holiday</a></h3>
  <div class="row clearfix">
    <div class="col-md-12">
        <table id="data-table" class="table table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Date</th>
                    <th>Holiday</th>
                    <th>StatusID</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            <?php $i=$noof_page+1; 
              if(isset($attendance_holidays) && $attendance_holidays!=null)
              {
              foreach($attendance_holidays as $a){ ?>
                <tr>
                    <td><?php echo $i++; ?></td>
                    <td><?php echo date("d-m-Y", strtotime($a['holidayDate'])); ?></td>
                    <td><?php echo $a['holiday']; ?></td>
                    <td><?php echo $a['statusID'] == 1? 'Active' :'Inactive'; ?></td>
                    <td>
                        <a href="<?php echo site_url('attendance_holidays/edit/'.$a['holidayID']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Edit</a> 
                        <a onclick="return confirm('Are you sure You want to delete?')" href="<?php echo site_url('attendance_holidays/remove/'.$a['holidayID']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Delete</a>
                    </td>
                </tr>
                <?php 
                }

                } ?>
            </tbody>
        </table>
    </div>
  </div>
</div>