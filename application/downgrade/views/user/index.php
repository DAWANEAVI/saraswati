
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
        <h3 class="box-title">Users Listing <a style="float:right" href="<?php echo site_url('user/add'); ?>" class="btn btn-success btn-raised">Add</a> </h3>
        <table id="data-table" class="table table-bordered">
            <thead class="thead-default">
                <tr>
                    <th>Username</th>
                    <th>Fname</th>
                    <th>Lname</th>
                    <th>Email</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <?php foreach ($users as $u) { ?>
                <tbody>
                    <tr>
                        <td><?php echo $u['username']; ?></td>
                        <td><?php echo $u['fname']; ?></td>
                        <td><?php echo $u['lname']; ?></td>
                        <td><?php echo $u['email']; ?></td>
                        <td>
                            <a href="<?php echo site_url('user/edit/' . $u['user_id']); ?>" class="btn btn-info btn-xs btn-raised"><span class="fa fa-pencil"></span> Edit</a> 
                            <a href="<?php echo site_url('user/remove/' . $u['user_id']); ?>" class="btn btn-danger btn-xs btn-raised"><span class="fa fa-trash"></span> Delete</a>
                            <a href="<?php echo site_url('user/reset_password/' . $u['user_id']); ?>" class="btn btn-warning btn-xs btn-raised"><span class="fa fa-refresh"></span> Reset Password</a>
                        </td>
                    </tr>
                </tbody>
            <?php } ?>
        </table>

    </div>

