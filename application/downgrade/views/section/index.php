
            <div class="card-body">
                <h3 class="box-title">Section Listing <a style="float:right" href="<?php echo site_url('section/add'); ?>" class="btn btn-success btn-raised">Add</a> </h3>
                <table id="data-table" class="table table-bordered">
                    <thead class="thead-default">
                    <tr>
						<th>Class</th>
						<th>Teacher</th>
						<th>Section Name</th>
						<th>Actions</th>
                    </tr>
                    </thead>
                    <?php foreach($section as $s){ ?>
                    <tbody>
                    <tr>
						<td><?php echo $s['numeric_name']; ?></td>
						<td><?php echo $s['fname'].' '.$s['lname']; ?></td>
						<td><?php echo $s['section_name']; ?></td>
						<td>
                            <a href="<?php echo site_url('section/edit/'.$s['section_id']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Edit</a> 
                            <a href="<?php echo site_url('section/remove/'.$s['section_id']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Delete</a>
                        </td>
                    </tr>
                    </tbody>
                    <?php } ?>
                </table>
                                
            </div>
      
