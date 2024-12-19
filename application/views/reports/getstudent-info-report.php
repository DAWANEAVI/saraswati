
<div class="card-body" style="background-color:white !important;">
    <?php
    if($this->session->flashdata('msg')!=''){
        ?>
    <div class="alert alert-success" role="alert">
        <?=$this->session->flashdata('msg')?>
    </div>
    <?php
        
    }
    ?>
    <h3 class="box-title">Student Information Report</h3>
    <table id="data-table" class="table table-bordered table-responsive">
        <thead class="thead-default">
            <tr>
                <th>Full Name</th>
                <th>Class</th>
                <th>Section</th>
                <th>Academic Year</th>
                <?php if(in_array("mobile_no", $fields)){ ?><th>Mobile No</th> <?php } ?>
                <?php if(in_array("dob", $fields)){ ?><th>Date_of_Birth</th> <?php } ?>
                <?php if(in_array("gender", $fields)){ ?><th>Gender</th> <?php } ?>
                <?php if(in_array("registration_no", $fields)){ ?><th>GR No</th> <?php } ?>
                <?php if(in_array("aadhar_no", $fields)){ ?><th>Aadhar No</th><?php } ?>
                <?php if(in_array("saral_id", $fields)){ ?><th>Saral ID</th><?php } ?>
                <?php if(in_array("register_date", $fields)){ ?><th>Admission_Date</th><?php } ?>
                <?php if(in_array("rte_applicable", $fields)){ ?><th>RTE Applicable</th><?php } ?>
                <?php if(in_array("mother_full_name", $fields)){ ?><th>Mother Name</th><?php } ?>
                <?php if(in_array("father_name", $fields)){ ?><th>Father Name</th><?php } ?>
                <?php if(in_array("religion", $fields)){ ?><th>Religion</th><?php } ?>
                <?php if(in_array("nationality", $fields)){ ?><th>Nationality</th><?php } ?>
                <?php if(in_array("mother_tounge", $fields)){ ?><th>Mother Tounge</th><?php } ?>
                <?php if(in_array("caste", $fields)){ ?><th>Caste</th><?php } ?>
                <?php if(in_array("category", $fields)){ ?><th>Category</th><?php } ?>
                <?php if(in_array("place_of_birth", $fields)){ ?><th>Place of Birth</th><?php } ?>
                <?php if(in_array("last_school", $fields)){ ?><th>Last School Name</th><?php } ?>
                <?php if(in_array("is_last_school_recognize", $fields)){ ?><th>Last School Recognize</th><?php } ?>
                <?php if(in_array("medium", $fields)){ ?><th>Medium</th><?php } ?>
                <?php if(in_array("occupation", $fields)){ ?><th>Father Occupation</th><?php } ?>
                <?php if(in_array("address", $fields)){ ?><th>Address</th><?php } ?>

            </tr>
        </thead>
        <tbody>
        <?php foreach ($result as $s) { ?>
           
                <tr>
                    <td><?php echo ucfirst($s['fullname']); ?></td>
                    <td><?php echo $s['class_name']; ?></td>
                    <td><?php echo $s['section_name']; ?></td>
                    <td><?php echo $s['academic_year']; ?></td>
                    <?php if(in_array("mobile_no", $fields)){ ?><td><?php echo $s['mobile_no']; ?></td> <?php }?>
                    <?php if(in_array("dob", $fields)){ ?><td><?php echo $s['dob']; ?></td>  <?php }?>
                    <?php if(in_array("gender", $fields)){ ?><td><?php echo $s['gender'] ? $s['gender'] : "-"; ?></td> <?php }?>
                    <?php if(in_array("registration_no", $fields)){ ?><td><?php echo $s['registration_no']; ?></td> <?php }?>
                    <?php if(in_array("aadhar_no", $fields)){ ?><td><?php echo $s['aadhar_no']; ?></td><?php }?>
                    <?php if(in_array("saral_id", $fields)){ ?><td><?php echo $s['saral_id']; ?></td><?php }?>
                    <?php if(in_array("register_date", $fields)){ ?><td><?php echo $s['register_date']; ?></td><?php } ?>
                    <?php if(in_array("rte_applicable", $fields)){ ?><td><?php echo $s['rte_applicable'] ? 'Yes' :'No'; ?></td><?php } ?>
                    <?php if(in_array("mother_full_name", $fields)){ ?><td><?php echo $s['mother_full_name']; ?></td><?php } ?>
                    <?php if(in_array("father_name", $fields)){ ?> <td><?php echo $s['father_name']; ?></td><?php } ?>
                    <?php if(in_array("religion", $fields)){ ?><td><?php echo $s['religion']; ?></td><?php } ?>
                    <?php if(in_array("nationality", $fields)){ ?><td><?php echo $s['nationality']; ?></td><?php } ?>
                    <?php if(in_array("mother_tounge", $fields)){ ?><td><?php echo $s['mother_tounge']; ?></td><?php } ?>
                    <?php if(in_array("caste", $fields)){ ?><td><?php echo $s['caste']; ?></td><?php } ?>
                    <?php if(in_array("category", $fields)){ ?><td><?php echo $s['category']; ?></td><?php } ?>
                    <?php if(in_array("place_of_birth", $fields)){ ?><td><?php echo $s['place_of_birth']; ?></td><?php } ?>
                    <?php if(in_array("last_school", $fields)){ ?><td><?php echo $s['last_school']; ?></td><?php }?>
                    <?php if(in_array("is_last_school_recognize", $fields)){ ?><td><?php echo $s['is_last_school_recognize'] ? $s['is_last_school_recognize'] :'No'; ?></td><?php }?>
                    <?php if(in_array("medium", $fields)){ ?><td><?php echo $s['medium'] ?  $s['medium'] :'-'; ?></td> <?php }?>

                    <?php if(in_array("occupation", $fields)){ ?><td><?php echo $s['occupation']; ?></td> <?php } ?>
                    <?php if(in_array("address", $fields)){ ?><td><?php echo 'At.Post. '.$s['at_post'].' Th.'.$s['tahsil'].' Dist.'.$s['dist']; ?></td> <?php } ?>
                
                </tr>
           
        <?php } ?>
                
         </tbody>
    </table>

</div>
