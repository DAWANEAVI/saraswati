<div class="card-body">
        <h3 class="box-title">Manage Fess </h3>
        
        <table id="data-table" class="table table-bordered">
           <thead class="thead-default">
                <tr>
                <th>Sr.No</th>
                <th>Academic Year</th>
                <th>Actions</th>
                </tr>
            </thead>
            <?php $srno=1; foreach($session_data as $sec){ ?>
            <tbody>
                <tr>
                <td><?php echo $srno; ?></td>
                <td><?php echo  $sec['session'];?> <?php if($sec['is_running']) { ?><span style="margin-left:20px;" class="badge badge-danger">Current Session</span><?php }?></td>
                <td>
                    <a href="<?php echo site_url('fee/index/'.$sec['session_id']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Manage Fees</a> 
                </td>
                </tr>
           <tbody>
           <?php $srno++; } ?>
        </table>
                
</div>
