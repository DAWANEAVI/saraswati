
        <div class="invoice">
            <div class="invoice__header">
               Student History
            </div>
            <div class="row invoice__attrs">
                <div class="col-9">
                    <div class="text-left invoice__attrs__item">
                        <small>Student Name#</small>
                        <h3><?php echo $student_details['fullname'] ?></h3>
                    </div>
                </div>

                <div class="col-3 text-right">
                    <div class="text-right invoice__attrs__item">
                        <small>Studying From Class</small>
                        <h3><?= $student_details['last_class'] ?></h3>
                    </div>
                </div>


            </div>
            <table class="table table-bordered invoice__table">
                <thead>
                    <tr class="text-uppercase">
                        <th>S.R.</th>
                        <th>Academic Year</th>
                        <th>Total Fees</th>
                        <th >Paid Fees</th>
                        <th >Remaining</th>
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
                            <td><?= $v['total_amount']-$v['paid_amount'] ?></td>
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
                        <th>Session</th>
                        <th>Receipt No</th>
                        <th>Amount</th>
                        <th >Paid On</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $count = 1;
                    foreach ($transactions as $k => $v) {
                    
                        $acadamic_year = $this->Academic_year_model->get_session($v['payment_session']);
                        $acadamic_year = $acadamic_year['session'];
                        $value = 0;

                      
                        ?>
                        <tr>
                            <td><?= $count; ?></td>
                            <td><?= $acadamic_year; ?></td>
                            <td><?= $v['reciept_no']; ?></td>
                            <td><?= $v['tuitionfees']; ?></td>
                            <td><?= $v['created_at']?></td>
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
