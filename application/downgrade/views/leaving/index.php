<div class="card-body">
    <h3 class="box-title">Leaving Listing <a style="float:right;" href="<?php echo site_url('leaving_certificate/add'); ?>" class="btn btn-success">Add</a> </h3>
<table id="data-table" class="table table-bordered">
    <thead class="thead-default">
    <tr>
		<th>Full Name</th>
		<th>Class</th>
		<th>Academic Year</th>
		<th>Leaving Certificate</th>
		<th>Reason</th>
		<th>Remark</th>
		<th>Actions</th>
		<th>Duplicate</th>
		<th>Triplicate</th>
    </tr>
    </thead>
    <tbody>
	<?php foreach($leaving_certificate as $l){ ?>
	<?php if(empty($l['is_dl']) && empty($l['is_tl'])){ ?>
    <tr>

        <td><?php echo ucwords($l['fullname']); ?></td>
		<td><?php echo $l['class_name'] ?></td>
		<td><?php echo $l['academic_year'] ?></td>
		<td><?php echo date('d/m/Y',strtotime($l['date_of_leave'])) ?></td>
		<td><?php echo $l['reason']; ?></td>
		<td><?php echo $l['remark']; ?></td>
		<td>
            <a href="<?php echo site_url('leaving_certificate/edit/'.$l['leaving_id']); ?>" class="btn btn-info btn-xs btn-raised">Edit</a> 
            <a href="<?php echo site_url('leaving_certificate/view/'.$l['leaving_id']); ?>" class="btn btn-success btn-xs btn-raised">View</a> 
            <a href="<?php echo site_url('leaving_certificate/remove/'.$l['leaving_id']); ?>" class="btn btn-danger btn-xs btn-raised">Delete</a>
        </td>
		<td>
		<?php if(empty($l['dleaving_id'])){ ?>
			<a href="<?php echo site_url('leaving_certificate/duplicate/'.$l['leaving_id']); ?>" class="btn btn-dark btn-xs btn-raised">Create Duplicate</a> 
		<?php } else{ ?>
			<a href="<?php echo site_url('leaving_certificate/edit/'.$l['dleaving_id']); ?>" class="btn btn-info btn-xs btn-raised mb-3">Edit</a> 
            <a href="<?php echo site_url('leaving_certificate/view/'.$l['dleaving_id']); ?>" class="btn btn-success btn-xs btn-raised">View</a> 
            <!--<a href="<?php //echo site_url('leaving_certificate/remove/'.$l['dleaving_id']); ?>" class="btn btn-danger btn-xs btn-raised">Delete</a> -->
			<?php } ?>
        </td>
		<td>
		<?php if(empty($l['tleaving_id'])){ ?>
			<a href="<?php echo site_url('leaving_certificate/triplicate/'.$l['leaving_id']); ?>" class="btn btn-info btn-xs btn-raised">Create Triplicate</a> 
		<?php } else{ ?>
			<a href="<?php echo site_url('leaving_certificate/edit/'.$l['tleaving_id']); ?>" class="btn btn-info btn-xs mb-3 btn-raised">Edit</a> 
            <a href="<?php echo site_url('leaving_certificate/view/'.$l['tleaving_id']); ?>" class="btn btn-success btn-xs btn-raised">View</a> 
            <!--<a href="<?php // echo site_url('leaving_certificate/remove/'.$l ['tleaving_id']); ?>" class="btn btn-danger btn-xs btn-raised">Delete</a> -->
			<?php } ?>
        </td>
    </tr>
	<?php } ?>
	<?php } ?>
    </tbody>
</table>
</div>
