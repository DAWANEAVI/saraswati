<div class="card-body">
        <h3 class="box-title">Academic Session  <?php if(isset($this->session->userdata['submoduleAccess']->Manage_Acadamic_Year) && in_array('2', $this->session->userdata['submoduleAccess']->Manage_Acadamic_Year)){?><a style="float:right" href="<?php echo site_url('academic_year/add'); ?>" class="btn btn-success btn--raised text-right">Add New</a> <?php } ?></h3>
        <hr>
    <table id="data-table" class="table table-bordered">
        <thead class="thead-default">
        <tr>
            <th>Sr.No</th>
            <th>Academic Year</th>
            <th>Is Current Session</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        <?php $srno=1; foreach($session_data as $sec){ ?>
        <tr>
            <td><?php echo $srno; ?></td>
            <td><?php echo $sec['session']; ?></td>
            <td><?php $running = $sec['is_running'] ? 'Yes':'No'; echo $running;?> <?php if($sec['is_running']) { ?><span style="margin-left:20px;" class="badge badge-danger">Current Session</span><?php }?></td>
            <td>
            <?php if(isset($this->session->userdata['submoduleAccess']->Manage_Acadamic_Year) && in_array('3', $this->session->userdata['submoduleAccess']->Manage_Acadamic_Year)){?> <a href="<?php echo site_url('academic_year/edit/'.$sec['session_id']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Edit</a> <?php }else{ echo '-'; }?> 
            </td>
        </tr>
        <?php $srno++; } ?>
        </tbody>
    </table>
                    
</div>

