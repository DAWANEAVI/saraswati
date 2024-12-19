
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
    <h3 class="box-title" style="text-align:center;">Student Fees Report</h3>
    <table id="data-table" class="table table-bordered table-responsive">
        <thead class="thead-default">
            <tr>
                <th>Full Name</th>
                <th>Mobile No</th>
                <th>Class</th>
                <th>Section</th>
                <th colspan="4"><span style="color:red">Old Fees * = A.Y 2018-19 Fees + Corona Offline A.Y 2021-22  </span></th>
                
            </tr>
        </thead>
         <tbody>
        <?php
        $this->load->model('Report_model');
        $old_fees = 0;
        // $total =0;
        // $paid =0;
        // $balance =0;
        $paid_old_fees=0;

        foreach ($result as $s) {
            $paymentData = $this->Report_model->getAllPaymentByStudent($s['student_id']);
            $s['rte_applicable'] == 1 ? $color="color:orange;" : $color='' ;

            ?>
           
                <tr >
                    <td style="vertical-align: middle; <?php echo $color; ?>"><?php  echo ucfirst($s['fullname']); ?></td>
                    <td style="vertical-align: middle;"><?php echo $s['mobile_no']; ?></td>
                    <td style="vertical-align: middle;"><?php echo $s['class_name']; ?></td>
                    <td style="vertical-align: middle;"><?php echo $s['section_name']; ?></td>
                    <td style="padding:0px;" colspan="4">
                    <table>
                        <tr>
                                <th style="padding:10px 14px;" >Academic Year</th>
                                <th style="padding:10px 14px;">Total Fees</th>
                                <th style="padding:10px 14px;">Paid Fees</th>
                                <th style="padding:10px 14px;">Balance Fees</th>
                        </tr>
                        <tr>
                                <td style="padding:5px 15px;" ><span style="color:red">Old Fees *</span></td>
                                <td style="padding:5px 15px;" ><span style="color:red"><?php echo $s['old_fees']; ?></span></td>
                                <td style="padding:5px 15px;" ><span style="color:red"><?php echo $s['paid_fees']; ?></span></td>
                                <td style="padding:5px 15px;" ><span style="color:red"><?php echo $s['old_fees']- $s['paid_fees'] ; ?></span></td>
                        </tr>
                        
                        <?php 
                        $total = $s['old_fees'];
                        $paid = $s['paid_fees'];
                        $balance = $s['old_fees'] - $s['paid_fees'];
                        foreach ($paymentData as $pd) { ?>
                        <tr>
                                <td style="padding:5px 15px;" ><?php echo $pd['academic_year']; ?></td>
                                <td style="padding:5px 15px;" ><?php echo $pd['total_amount']; ?></td>
                                <td style="padding:5px 15px;" ><?php echo $pd['paid_amount']; ?></td>
                                <td style="padding:5px 15px;" ><?php echo $pd['total_amount']-$pd['paid_amount'] ; ?></td>
                        </tr>
                     <?php $total =$total + $pd['total_amount'];
                        $paid =$paid + $pd['paid_amount'];;
                        $balance = $balance + $pd['total_amount']-$pd['paid_amount'] ;; } ?>
                        <tr style="color:blue;">
                                <td style="padding:5px 15px;" ><?php echo 'Total'; ?></td>
                                <td style="padding:5px 15px;" ><?php echo $total; ?></td>
                                <td style="padding:5px 15px;" ><?php echo $paid; ?></td>
                                <td style="padding:5px 15px;" ><?php echo $balance; ?></td>
                        </tr>
                    </table>
                     
                    </td>
                </tr>
           
        <?php } ?>
                
                 </tbody>
                  <tr>
                    <td style="text-align:center;" colspan="5"><button onclick="window.print();" class="btn btn-success btn-raised">Print Report</button></td>
                </tr>
    </table>

</div>
