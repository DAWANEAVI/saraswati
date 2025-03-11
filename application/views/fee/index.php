<div class="card-body">
        <h3 class="box-title text-center">Fees Listing of Academic Year : <?php echo $academic_year_data['session'];?>  <?php if(isset($this->session->userdata['submoduleAccess']->Manage_Fees) && in_array('2', $this->session->userdata['submoduleAccess']->Manage_Fees)){?><a style="float: right;" href="<?php echo site_url('fee/add/'.$academic_year_data['session_id']); ?>" class="btn btn-success btn-raised">Add</a><?php } ?> </h3>
        
        <table id="data-table" class="table table-bordered">
           <thead class="thead-default">
                <tr>
                <th>Class</th>
                <th>Tution Fees</th>
                <th>Actions</th>
                </tr>
            </thead>
            <?php foreach($fees as $f){ ?>
            <tbody>
                <?php if(!empty($f['class_fees'])){ ?> 
                <tr>
                <td class="highcontra"><?php echo $f['class_name']; ?></td>
                <?php foreach($f['class_fees'] as $key => $value){
                        
                        switch ($value['fees_for']) {
                                case 'Tuition Fees':
                                        $tuitionfees =  $value['amount'];
                                        break;
                                
                                default:
                        
                                        break;
                        }
                } ?>
                <td><?= $tuitionfees?></td>
                <td>
                   <?php if(isset($this->session->userdata['submoduleAccess']->Manage_Fees) && in_array('3', $this->session->userdata['submoduleAccess']->Manage_Fees)){?><a href="<?php echo site_url('fee/edit/'.$academic_year_data['session_id'].'/'.$f['class_id']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Edit</a> <?php } ?>
                   <?php if(isset($this->session->userdata['submoduleAccess']->Manage_Fees) && in_array('4', $this->session->userdata['submoduleAccess']->Manage_Fees)){?><a onclick="return confirm('Are you sure to delete this record?')" href="<?php echo site_url('fee/remove/'.$academic_year_data['session_id'].'/'.$f['class_id']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Delete</a> <?php } ?>
                </td>
                </tr>
                <?php } ?>
           <tbody>
           <?php } ?>
        </table>
                
</div>
