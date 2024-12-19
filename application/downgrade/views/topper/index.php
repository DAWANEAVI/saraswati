<div class="card-body">
    
    <h3>Topper Listing<a style="float:right" href="<?php echo site_url('topper/add'); ?>" class="btn btn-success">Add</a> </h3>	
<div class="row">
    <div class="col-md-12">
<table id="data-table" class="table  table-bordered">
    <thead class="thead-default">
    <tr>
		<th>Image</th>
		<th>Name</th>
		<th>Year</th>
		<th>Class</th>
		<th>Actions</th>
    </tr>
    </thead>
    <tbody>
	<?php foreach($toppers as $t){ ?>
    <tr>
        <td><img src="<?= site_url('uploads/topper/')?><?php echo $t['image']; ?>" /></td>
		<td><?php echo $t['name']; ?></td>
		<td><?php echo $t['year']; ?></td>
		<td><?php echo $t['class']; ?></td>
		<td>
            <a href="<?php echo site_url('topper/edit/'.$t['id']); ?>" class="btn btn-info btn-xs">Edit</a> 
            <a href="<?php echo site_url('topper/remove/'.$t['id']); ?>" class="btn btn-danger btn-xs">Delete</a>
        </td>
    </tr>
	<?php } ?>
    </tbody>
</table>
    </div>
    </div>
</div>