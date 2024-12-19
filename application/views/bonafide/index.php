<div class="card-body">
    <h3 class="box-title">Bonafide Certificate List <?php if(isset($this->session->userdata['submoduleAccess']->Manage_Bonafide) && in_array('2', $this->session->userdata['submoduleAccess']->Manage_Bonafide)){?><a style="float:right;" href="<?php echo site_url('bonafide/add'); ?>" class="btn btn-success">Add</a><?php } ?> </h3>
<table id="data-table" class="table table-bordered">
    <thead class="thead-default">
    <tr>
		<th>SR.No</th>
		<th>Bona. No</th>
		<th>Full Name</th>
		<th>Class</th>
		<th>Academic Year</th>
		<th>Date</th>
		<th>Actions</th>
    </tr>
    </thead>
    <tbody>
	<?php foreach($bonafide_certificate as $key => $l){ ?>
    <tr>
	    <td><?php echo $key + 1; ?></td>
		<td><?php echo $l['bona_no'] ?></td>
        <td><?php echo ucwords($l['fullname']); ?></td>
		<td><?php echo $l['class'] ?></td>
		<td><?php echo $l['session'] ?></td>
		<td><?php echo date('d-m-Y',strtotime($l['date'])) ?></td>
		<td>
		    <a href="<?php echo site_url('bonafide/view/'.$l['bonafide_id']); ?>" class="btn btn-success btn-xs btn-raised">View</a> 
            <?php if(isset($this->session->userdata['submoduleAccess']->Manage_Bonafide) && in_array('3', $this->session->userdata['submoduleAccess']->Manage_Bonafide)){?><a href="<?php echo site_url('bonafide/edit/'.$l['bonafide_id']); ?>" class="btn btn-info btn-xs btn-raised">Edit</a> <?php } ?>
			<?php if(isset($this->session->userdata['submoduleAccess']->Manage_Bonafide) && in_array('4', $this->session->userdata['submoduleAccess']->Manage_Bonafide)){?><a onclick="return confirm('Are you sure to delete this record?')" href="<?php echo site_url('bonafide/remove/'.$l['bonafide_id']); ?>" class="btn btn-danger btn-xs btn-raised">Delete</a> <?php } ?>
        </td>
    </tr>
	<?php } ?>
    </tbody>
</table>
</div>
