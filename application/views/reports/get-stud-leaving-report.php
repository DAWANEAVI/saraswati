
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
    <h3 class="box-title">Leaving Certificate Report</h3>
    <table id="data-table" class="table table-bordered">
        <thead class="thead-default">
            <tr>
                <th>Full Name</th>
                <th>Date Of Birth</th>
                <th>Mobile No</th>
                <th>Class</th>
                <th>Section</th>
                 <th>Date Of Leaving</th>
                <th>Academic Year</th>
                <th>Action</th>

            </tr>
        </thead>
         <tbody>
        <?php foreach ($result as $s) { ?>
           
                <tr>
                    <td><?php echo ucfirst($s['fullname']); ?></td>
                    <td><?php echo date('d-m-Y', strtotime($s['dob'])); ?></td>
                    <td><?php echo $s['mobile_no']; ?></td>
                    <td><?php echo $s['class_name']; ?></td>
                    <td><?php echo $s['section_name']; ?></td>
                    <td><?php echo date('d/m/Y',strtotime($s['date_of_leave'])); ?></td>
                    <td><?php echo $s['academic_year']; ?></td>
                    <td> <a href="<?php echo site_url('leaving_certificate/view/'.$s['leaving_id']); ?>" class="btn btn-success btn-xs"><span class="fa fa-file-o"></span> Get Leaving</a></td>
                </tr>
            
        <?php } ?>
        </tbody>
    </table>

</div>
