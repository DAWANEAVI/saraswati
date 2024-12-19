<div class="card-body">
    <div class="row clearfix">
        <div class="col-md-12">
            <h3 class="box-title">Gallery Listing <a style="float: right" href="<?php echo site_url('gallery/add'); ?>" class="btn btn-success">Add</a>  </h3> 

            <table id="data-table" class="table table-bordered">
                <thead class="thead-default">
                <tr>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Image</th>
                    <th>Should Show In Front Page</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($gallery as $g) {
                    $image = json_decode($g['image']);
                    ?>
                    <tr>
                        <td><?php echo $g['title']; ?></td>
                        <td><?php echo $g['description']; ?></td>
                        <td><img src="<?= site_url('uploads/gallery/')?><?php echo $image[0]; ?>" /></td>
                       <td><?php echo $g['show_image']; ?></td> 
                        <td>
                            <a href="<?php echo site_url('gallery/remove/' . $g['id']); ?>" class="btn btn-danger btn-xs">Delete</a>
                        </td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
