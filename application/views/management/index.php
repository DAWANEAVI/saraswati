
<div class="card-body">
    <h3 class="box-title">Management Listing <a style="float: right;" href="<?php echo site_url('management/add'); ?>" class="btn btn-success">Add</a> </h3>
<table id="data-table"class="table table-bordered">
    <thead class="thead-default">
    <tr>
		<th>Name</th>
		<th>Designation</th>
		<th>Mobile No</th>
		<th>Image</th>
		<th>Actions</th>
    </tr>
    </thead>
    <tbody>
	<?php foreach($management as $m){ ?>
    <tr>
		<td><?php echo $m['name']; ?></td>
		<td><?php echo $m['designation']; ?></td>
		<td><?php echo $m['mobile_no']; ?></td>
		<td><img src="<?= site_url('uploads/management/')?><?php echo $m['image']; ?>" /></td>
		<td>
            <a href="<?php echo site_url('management/edit/'.$m['id']); ?>" class="btn btn-info btn-xs">Edit</a> 
            <a onclick="return confirm('Are you sure to delete this record?')" href="<?php echo site_url('management/remove/'.$m['id']); ?>" class="btn btn-danger btn-xs">Delete</a>
        </td>
    </tr>
	<?php } ?>
    </tbody>
</table>
</div>
