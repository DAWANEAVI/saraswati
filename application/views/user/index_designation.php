
    <div class="card-body">
        <!-- <h3 class="box-title">Designation List <a style="float:right" href="<?php echo site_url('user/add'); ?>" class="btn btn-success btn-raised">Add</a> </h3> -->
        <table id="data-table" class="table table-bordered">
            <thead class="thead-default">
                <tr>
                    <th>#</th>
                    <th>Designation</th>
                    <!-- <th>Actions</th> -->
                </tr>
            </thead>
            <?php foreach ($designations as $key => $value) { ?>
                <tbody>
                    <tr>
                        <td><?php echo $key +1; ?></td>
                        <td><?php echo $value['designation']; ?></td>
                        <!-- <td>
                            <a href="<?php echo site_url('user/edit_designation/' . $value['userDesID']); ?>" class="btn btn-info btn-xs btn-raised"><span class="fa fa-pencil"></span> Edit</a> 
                            <a onclick="return confirm('Are you sure to delete this record?')" href="<?php echo site_url('user/remove_designation/' . $value['userDesID']); ?>" class="btn btn-danger btn-xs btn-raised"><span class="fa fa-trash"></span> Delete</a>
                        </td> -->
                    </tr>
                </tbody>
            <?php } ?>
        </table>

    </div>

