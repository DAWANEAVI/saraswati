
            <div class="card-body">
                <h3 class="box-title">Fees Listing <a style="float: right;" href="<?php echo site_url('fee/add'); ?>" class="btn btn-success btn-raised">Add</a> </h3>
                <table id="data-table" class="table table-bordered">
                    <thead class="thead-default">
                    <tr>
						<th>Class</th>
						<th>Education Fee</th>
                                                <th>Term Fee</th>
                                                <th>Exam Fee</th>
                                                <th>Sport Fee</th>
                                                <th>Miscellaneous Fee</th>
						<th>Amount</th>
						<th>Actions</th>
                    </tr>
                    </thead>
                    <?php foreach($fees as $f){ ?>
                    <?php
                    
                    ?>
                    <tbody>
                    <tr>
						<td><?php echo $f['numeric_name']; ?></td>
						<td><?php 
                                                $fees = explode(",",$f['fees_for']);
                                                echo str_replace("Education Fee-",' ', $fees[0]); ?></td>
						<td><?php 
                                                $fees = explode(",",$f['fees_for']);
                                                echo str_replace("Term Fee-",' ', $fees[1]); ?></td>
						<td><?php 
                                                $fees = explode(",",$f['fees_for']);
                                                echo str_replace("Exam Fee-",' ', $fees[2]); ?></td>
						<td><?php 
                                                $fees = explode(",",$f['fees_for']);
                                                echo str_replace("Sport Fee-",' ', $fees[3]); ?></td>
						<td><?php 
                                                $fees = explode(",",$f['fees_for']);
                                                echo str_replace("Miscellaneous Fee-",' ', $fees[4]); ?></td>
						<td><?php echo $f['total_fee']; ?></td>
						<td>
                            <a href="<?php echo site_url('fee/edit/'.$f['class_id']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Edit</a> 
                            <a href="<?php echo site_url('fee/remove/'.$f['class_id']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Delete</a>
                        </td>
                    </tr>
                    <tbody>
                    <?php } ?>
                </table>
                                
            </div>
      