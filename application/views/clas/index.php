
<div class="card-body">
                 <h3 class="box-title">Class Listing  <?php if(isset($this->session->userdata['submoduleAccess']->Manage_Class_N_Section) && in_array('2', $this->session->userdata['submoduleAccess']->Manage_Class_N_Section)){?><a style="float:right" href="<?php echo site_url('clas/add'); ?>" class="btn btn-success btn--raised text-right">Add</a><?php }?></h3>
                
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
                            <?php if(isset($this->session->userdata['submoduleAccess']->Manage_Class_N_Section) && in_array('3', $this->session->userdata['submoduleAccess']->Manage_Class_N_Section)){?><a href="<?php echo site_url('clas/edit/'.$c['class_id']); ?>" class="btn btn-info btn-xs btn--raised"><span class="fa fa-pencil"></span> Edit</a> <?php } ?>
                            <?php if(isset($this->session->userdata['submoduleAccess']->Manage_Class_N_Section) && in_array('4', $this->session->userdata['submoduleAccess']->Manage_Class_N_Section)){?><a onclick="return confirm('Are you sure to delete this record?')" href="<?php echo site_url('clas/remove/'.$c['class_id']); ?>" class="btn btn-danger btn-xs "><span class="fa fa-trash"></span> Delete</a> <?php } ?>
                        </td>
                    </tr>
                    </tbody>
                    <?php } ?>
                </table>
                                
            </div>

