
<div class="invoice">
    <div class="invoice__header">
        Student History
    </div>
    <style>
        .invoice__attrs__item{
            color:#000;
            font-weight: 900;
        }
        </style>
    <div class="row invoice__attrs">
        <div class="col-4">
            <div class="text-left invoice__attrs__item">
                <small>Student Name#</small>
                <h3><?php echo $student_details['fullname'] ?></h3>
            </div>
        </div>

        <div class="col-2 text-right">
            <div class="text-right invoice__attrs__item">
                <small>Studying From Class</small>
                <h3><?= $student_details['last_class'] ?></h3>
            </div>
        </div>
        <div class="col-3 text-center">
            <div class="text-right invoice__attrs__item">
                <small>Current Class & Section</small>
                <h3><?= $student_details['class_name'] ?> & <?= $student_details['section_name'] ?></h3>
            </div>
        </div>
        <div class="col-2 text-right">
            <img style="width:100%;"src="<?= site_url('uploads/student/' . $student_details['image']) ?>">
        </div>


    </div>
    <div class="row">
        <div class="col-6">
            <div class="text-left invoice__attrs__item">
                <small>Father Name#</small>
                <?= $student_details['father_name'] ?>
            </div>
        </div>
        <div class="col-6">
            <div class="text-left invoice__attrs__item">
                <small>Mother Name#</small>
                <?= $student_details['mother_full_name'] ?>

            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-3">
            <div class="text-left invoice__attrs__item">
                <small>Register No#</small>
                <?= $student_details['registration_no'] ?>
            </div>
        </div>
        <div class="col-3">
            <div class="text-left invoice__attrs__item">
                <small>Adhar No#</small>
                <?= $student_details['aadhar_no'] ?>

            </div>
        </div>
        <div class="col-3">
            <div class="text-left invoice__attrs__item">
                <small>Saral ID#</small>
                <?= $student_details['saral_id'] ?>

            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-3">
            <div class="text-left invoice__attrs__item">
                <small>Religion#</small>
                <?= $student_details['religion'] ?>
            </div>
        </div>
        <div class="col-3">
            <div class="text-left invoice__attrs__item">
                <small>Caste and Sub-caste#</small>
                <?= $student_details['caste'] ?> &
                <?= $student_details['category'] ?>

            </div>
        </div>
        <div class="col-3">
            <div class="text-left invoice__attrs__item">
                <small>Mother Tounge#</small>
                <?= $student_details['mother_tounge'] ?>

            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-3">
            <div class="text-left invoice__attrs__item">
                <small>Place Of Birth#</small>
                <?= $student_details['place_of_birth'] ?>
            </div>
        </div>
        <div class="col-3">
            <div class="text-left invoice__attrs__item">
                <small>Date Of Birth#</small>
                <?= date('d-M-Y',strtotime($student_details['dob'])) ?>

            </div>
        </div>
        <div class="col-3">
            <div class="text-left invoice__attrs__item">
                <small>Age#</small>
                <?= $student_details['age'] ?>

            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-6">
            <div class="text-left invoice__attrs__item">
                <small>Last school#</small>
                <?= $student_details['last_school'] ?>
            </div>
        </div>
        <div class="col-3">
            <div class="text-left invoice__attrs__item">
                <small>Class & Medium#</small>
                <?= $student_details['last_class'] ?> &
                <?= $student_details['last_medium'] ?>

            </div>
        </div>
        <div class="col-3">
            <div class="text-left invoice__attrs__item">
                <small>Is School Recognize#</small>
                <?php
                if ($student_details['is_last_school_recognize'] != '') {
                    ?>
                <img src="<?=site_url()?>resources/img/icons8-check-all-48.png" />
                    <?php
                }else{
                    ?>
                <img src="<?=site_url()?>resources/img/icons8-close-window-48.png" />
                <?php
                }
                ?>


            </div>
        </div>
    </div>
     <div class="row">
        <div class="col-3">
            <div class="text-left invoice__attrs__item">
                <small>At Post#</small>
                <?= $student_details['at_post'] ?>
            </div>
        </div>
        <div class="col-3">
            <div class="text-left invoice__attrs__item">
                <small>Tahsil#</small>
                <?= $student_details['tahsil'] ?>

            </div>
        </div>
        <div class="col-3">
            <div class="text-left invoice__attrs__item">
                <small>District#</small>
                <?= $student_details['dist'] ?>

            </div>
        </div>
    </div>
    <div class="row">
         <div class="col-3">
            <div class="text-left invoice__attrs__item">
                <small>Phone No#</small>
                <?= $student_details['ph_no'] ?>
            </div>
        </div>
        <div class="col-3">
            <div class="text-left invoice__attrs__item">
                <small>Mobile No#</small>
                <?= $student_details['mobile_no'] ?>

            </div>
        </div>
    </div>
    <table class="table table-bordered invoice__table">
        <thead>
            <tr class="text-uppercase">
                <th>S.R.</th>
                <th>Academic Year</th>
                <th>Total Fees</th>
                <th>Paid Fees</th>
                <th>Remaining</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $count = 1;
            foreach ($payment_history as $k => $v) {

                $value = 0;
                ?>
                <tr>
                    <td><?= $count; ?></td>
                    <td style="width: 50%"><?= $v['academic_year'] ?></td>
                    <td><?= $v['total_amount'] ?></td>
                    <td><?= $v['paid_amount'] ?></td>
                    <td><?= $v['total_amount'] - $v['paid_amount'] ?></td>
                </tr>
                <?php
                $count++;
            }
            ?>



        </tbody>
    </table>

    <h4 class='text-center'>Transaction Details</h4>
    <table class="table table-bordered invoice__table">
        <thead>
            <tr class="text-uppercase">
                <th>S.R.</th>
                <th>Edu cation Fee</th>
                <th>Term Fee</th>
                <th>Exam Fee</th>
                <th >Sport Fee</th>
                <th >Misc  Fee</th>
                <th >Old  Fee</th>
                <th >Paid On</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $count = 1;
            foreach ($transactions as $k => $v) {

                $value = 0;
                ?>
                <tr>
                    <td><?= $count; ?></td>

                    <td><?= $v['education_fee'] ?></td>
                    <td><?= $v['term_fee'] ?></td>
                    <td><?= $v['exam_fee'] ?></td>
                    <td><?= $v['sport_fee'] ?></td>
                    <td><?= $v['misc_fee'] ?></td>
                    <td><?= $v['old_fee'] ?></td>
                    <td><?= $v['created_date'] ?></td>
                </tr>
                <?php
                $count++;
            }
            ?>



        </tbody>
    </table>



    <footer class="invoice__footer text-left">


    </footer>
</div>



<button class="btn btn-danger btn--action " data-ma-action="print"><i class="zmdi zmdi-print"></i></button>
