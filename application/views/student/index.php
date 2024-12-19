
<div class="card-body">
    <?php
    if($this->session->flashdata('msg')!=''){
        ?>
    <div class="alert alert-success" role="alert">
                                <?=$this->session->flashdata('msg')?>
                            </div>
    <?php
        
    }
    ?>
    <h3 class="box-title">Student Listing <?php if(isset($this->session->userdata['submoduleAccess']->Manage_Student) && in_array('2', $this->session->userdata['submoduleAccess']->Manage_Student)){?><a style="float:right" href="<?php echo site_url('student/add'); ?>" class="btn btn-success btn-raised">Add</a> <?php } ?> </h3>
    <table id="data-table" class="table table-bordered">
        <thead class="thead-default">
            <tr>
                <th>Registration No</th>
                <th>Full Name</th>
                <th>Date Of Birth</th>
                <th>RTE Applicable</th>
                <th>Mobile No</th>
                <th>Class</th>
                <th>Section</th>

                <th>Actions</th>
            </tr>
        </thead>
         <tbody>
        <?php foreach ($student as $s) { ?>
           
                <tr>
                    <td class="text-center"><?php echo ucfirst($s['registration_no']); ?></td>
                    <td><?php echo ucfirst($s['fullname']); ?></td>
                    <td><?php echo date('d-m-Y', strtotime($s['dob'])); ?></td>
                    <td><?php echo ($s['rte_applicable']?'Yes':'No') ?></td>
                    <td><?php echo $s['mobile_no']; ?></td>
                    <td><?php echo $s['numeric_name']; ?></td>
                    <td><?php echo $s['section_name']; ?></td>

                    <td>
                        <a style="margin-bottom:5px;" href="<?php echo site_url('student/history/' . $s['student_id']); ?>" class="btn btn-warning btn-xs"><span class="fa fa-usd" ></span> Payment History</a>
                        <?php if(isset($this->session->userdata['submoduleAccess']->Manage_Student) && in_array('3', $this->session->userdata['submoduleAccess']->Manage_Student)){?><a href="<?php echo site_url('student/edit/' . $s['student_id']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Edit</a> <?php } ?> 
                        <?php if(isset($this->session->userdata['submoduleAccess']->Manage_Student) && in_array('4', $this->session->userdata['submoduleAccess']->Manage_Student)){?><a onclick="return confirm('Are you sure to delete this student?')" href="<?php echo site_url('student/remove/' . $s['student_id']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Delete</a> <?php }?>
                        
                    </td>
                </tr>
            
        <?php } ?>
        </tbody>
    </table>

</div>
