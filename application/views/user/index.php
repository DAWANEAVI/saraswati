
    <div class="card-body">
        <?php
        if ($this->session->flashdata('pmsg') != '') {
            ?>
            <div class="alert alert-primary" role="alert">
                <?= ($this->session->flashdata('pmsg')); ?>
            </div>
            <?php
        }
        ?>
        <h3 class="box-title">Users Listing <?php if(isset($this->session->userdata['submoduleAccess']->Manage_Users) && in_array('2', $this->session->userdata['submoduleAccess']->Manage_Users)){?><a style="float:right" href="<?php echo site_url('user/add'); ?>" class="btn btn-success btn-raised">Add</a> <?php } ?> </h3>
        <table id="data-table" class="table table-bordered">
            <thead class="thead-default">
                <tr>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    <th>Category</th>
                    <th>Designation</th>
                    <th>Username</th>
                    <th>Access Control</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <?php foreach ($users as $u) { ?>
                <tbody>
                    <tr>
                        
                        <td><?php echo $u['fname']; ?></td>
                        <td><?php echo $u['lname']; ?></td>
                        <td><?php echo $u['email']; ?></td>
                        <td><?php echo $u['category']; ?></td>
                        <td><?php echo $u['designation']; ?></td>
                        <td><?php echo $u['username']; ?></td>
                        <td>
                        <?php if(isset($this->session->userdata['submoduleAccess']->Manage_Users) && in_array('3', $this->session->userdata['submoduleAccess']->Manage_Users)){?><a href="<?php echo site_url('user/access_control/' . $u['user_id']); ?>" class="btn btn-success btn-xs btn-raised"><i class="zmdi zmdi-eye-off"></i> Access Control</a> <?php }else{echo '-';}?>
                        </td>
                        <td>
                            <?php if(isset($this->session->userdata['submoduleAccess']->Manage_Users) && in_array('3', $this->session->userdata['submoduleAccess']->Manage_Users)){?><a href="<?php echo site_url('user/edit/' . $u['user_id']); ?>" class="btn btn-info btn-xs btn-raised"><i class="zmdi zmdi-edit"></i> Edit</a>  <?php } ?>
                            <?php if(isset($this->session->userdata['submoduleAccess']->Manage_Users) && in_array('4', $this->session->userdata['submoduleAccess']->Manage_Users)){?><a onclick="return confirm('Are you sure to delete this record?')" href="<?php echo site_url('user/remove/' . $u['user_id']); ?>" class="btn btn-danger btn-xs btn-raised"><span class="fa fa-trash"></span> Delete</a> <?php }?>
                            <!-- <a href="<?php echo site_url('user/reset_password/' . $u['user_id']); ?>" class="btn btn-warning btn-xs btn-raised"><span class="fa fa-refresh"></span> Reset Password</a> -->
                        </td>
                    </tr>
                </tbody>
            <?php } ?>
        </table>

    </div>

