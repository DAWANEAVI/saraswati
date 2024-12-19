<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Contain Details Listing</h3>
            	<div class="box-tools">
                    <a href="<?php echo site_url('contain_detail/add'); ?>" class="btn btn-success btn-sm">Add</a> 
                </div>
            </div>
            <div class="box-body">
                <table class="table table-striped">
                    <tr>
						<th>Conatin Details Id</th>
						<th>Page Name</th>
						<th>Section Title</th>
						<th>Contains</th>
						<th>Actions</th>
                    </tr>
                    <?php foreach($contain_details as $c){ ?>
                    <tr>
						<td><?php echo $c['conatin_details_id']; ?></td>
						<td><?php echo $c['page_name']; ?></td>
						<td><?php echo $c['section_title']; ?></td>
						<td><?php echo $c['contains']; ?></td>
						<td>
                            <a href="<?php echo site_url('contain_detail/edit/'.$c['conatin_details_id']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Edit</a> 
                            <a href="<?php echo site_url('contain_detail/remove/'.$c['conatin_details_id']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Delete</a>
                        </td>
                    </tr>
                    <?php } ?>
                </table>
                                
            </div>
        </div>
    </div>
</div>
