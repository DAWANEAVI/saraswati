<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Notification Listing</h3>
            	<div class="box-tools">
                    <a href="<?php echo site_url('notification/add'); ?>" class="btn btn-success btn-sm">Add</a> 
                </div>
            </div>
            <div class="box-body">
                <table class="table table-striped">
                    <tr>
						<th>Notification Id</th>
						<th>Is Viewed</th>
						<th>Date</th>
						<th>Notification</th>
						<th>Actions</th>
                    </tr>
                    <?php foreach($notification as $n){ ?>
                    <tr>
						<td><?php echo $n['notification_id']; ?></td>
						<td><?php echo $n['is_viewed']; ?></td>
						<td><?php echo $n['date']; ?></td>
						<td><?php echo $n['notification']; ?></td>
						<td>
                            <a href="<?php echo site_url('notification/edit/'.$n['notification_id']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Edit</a> 
                            <a href="<?php echo site_url('notification/remove/'.$n['notification_id']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Delete</a>
                        </td>
                    </tr>
                    <?php } ?>
                </table>
                                
            </div>
        </div>
    </div>
</div>
