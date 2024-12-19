<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                
            	<div class="box-tools">
                    
                </div>
            </div>
            <div class="card-body">
                <h3 class="box-title">Student Promote Listing 
                <?php if(isset($this->session->userdata['submoduleAccess']->Manage_Pramotion) && in_array('2', $this->session->userdata['submoduleAccess']->Manage_Pramotion)){?><a style="float:right;" href="<?php echo site_url('student_promote/add'); ?>" class="btn btn-success btn-raised">Promote Student</a><?php } ?> 
                </h3>
                <table id="data-table" class="table table-bordered">
                    <thead>
                    <tr>
						<th>Student Name</th>
                        <th>Previous Session</th>
                        <th>Promoted Session</th>
						<th>Previous Class</th>
						<th>Promoted Class</th>
						<th>Promoted Section</th>
						<th>Promotion Date</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach($student_promote as $s){ ?>
                    <tr>
						<td><?php echo ucwords($s['fullname']); ?></td>
                        <td><?php echo $s['old_academic_year']; ?></td>
                        <td><?php echo $s['new_academic_year']; ?></td>
						<td><?php echo $s['old_class']; ?></td>
						<td><?php echo $s['new_class']; ?></td>
						<td><?php echo $s['section_name']; ?></td>
						<td><?php echo date('d-m-Y',strtotime($s['promotion_date'])); ?></td>
						<!-- <td>
                            <a href="#" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Edit</a> 
                            
                        </td> -->
                    </tr>
                    
                    <?php } ?>
                    </tbody>
                </table>
                                
            </div>
        </div>
    </div>
</div>
