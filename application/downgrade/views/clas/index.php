
            <div class="card-body">
                 <h3 class="box-title">Class Listing  <a style="float:right" href="<?php echo site_url('clas/add'); ?>" class="btn btn-success btn--raised text-right">Add</a></h3>
                
                <table id="data-table" class="table table-bordered">
                    <thead class="thead-default">
                    <tr>
						<th>Class Name</th>
						<th>Numeric Name</th>
						<th>Actions</th>
                    </tr>
                    </thead>
                    <?php foreach($class as $c){ ?>
                    <tbody>
                    <tr>
						<td><?php echo $c['class_name']; ?></td>
						<td><?php echo $c['numeric_name']; ?></td>
						<td>
                            <a href="<?php echo site_url('clas/edit/'.$c['class_id']); ?>" class="btn btn-info btn-xs btn--raised"><span class="fa fa-pencil"></span> Edit</a> 
                            <a href="<?php echo site_url('clas/remove/'.$c['class_id']); ?>" class="btn btn-danger btn-xs "><span class="fa fa-trash"></span> Delete</a>
                        </td>
                    </tr>
                    </tbody>
                    <?php } ?>
                </table>
                                
            </div>

