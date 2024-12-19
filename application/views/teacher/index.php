
            <div class="card-body">
                <h3 class="box-title">Teacher Listing <a style="float: right" href="<?php echo site_url('teacher/add'); ?>" class="btn btn-success btn-raised">Add</a> </h3>
                <table id="data-table" class="table table-bordered">
                    <thead class="thead-default">
                    <tr>
						
						<th>Name</th>
						<th>Contact</th>
						<th>Email</th>
						<th>Address</th>
						<th>City</th>
						<th>Image</th>
						<th>Actions</th>
                    </tr>
                </thead>
                 <tbody>
                    <?php foreach($teacher as $t){ ?>
               
                    <tr>
						<td><?php echo $t['fname']; ?> <?php echo $t['lname']; ?></td>
						<td><?php echo $t['contact']; ?></td>
						<td><?php echo $t['email']; ?></td>
						<td><?php echo $t['address']; ?></td>
						<td><?php echo $t['city']; ?></td>
                                                <td><img style="width:50px;height:50px;" src="<?=base_url('uploads/teachers/')?><?php echo $t['image']; ?>"></td>
						<td>
                            <a href="<?php echo site_url('teacher/edit/'.$t['teacher_id']); ?>" class="btn btn-info btn-xs btn-raised"><span class="fa fa-pencil"></span> Edit</a> 
                            <a onclick="return confirm('Are you sure to delete this record?')" href="<?php echo site_url('teacher/remove/'.$t['teacher_id']); ?>" class="btn btn-danger btn-xs btn-raised"><span class="fa fa-trash"></span> Delete</a>
                        </td>
                    </tr>
                
                    <?php } ?>
                    </tbody>
                </table>
                                
            </div>
        