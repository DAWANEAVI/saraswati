
			<?php echo form_open('payment_log/edit/'.$payment_log->payment_log_id); ?>
			<div class="card-body">
                            <h3 class="box-title">Payment  Edit</h3>
				<div class="row clearfix">
					 <div class="col-md-10 offset-md-1">
            
        <table class="table table-responsive">
            <thead class="thead-default">
            <th>S.N.</th>
            <th>PARTICULARS</th>
            <th>Amount</th>
            <th>Paying Amount</th>
            </thead>
            <tbody>
                
                <?php
                $count=1;
                foreach ($fee_data as $k=>$v){
                ?>
               
                 <tr>
                    <td><?php echo $count?></td>
                    <th><?=$v['fees_for']?></th>
                  
                    <td><span><?=$v['amount']?></span></td>
                      <td>
                           <?php 
                           
                               $value=0;
                              
                              if($v['fees_for']=='Education Fee'){
                                  $value= $payment_log->education_fee;
                              }
                              if($v['fees_for']=='Term Fee'){
                                  $value= $payment_log->term_fee;
                              }
                              if($v['fees_for']=='Exam Fee'){
                                  $value= $payment_log->exam_fee;
                              }
                              if($v['fees_for']=='Sport Fee'){
                                 $value=$payment_log->sport_fee;
                              }
                              if($v['fees_for']=='Miscellaneous Fee'){
                                  $value= $payment_log->misc_fee;
                              }
                              ?>
                          
                        <input type="text" name="<?php echo str_replace(' ', '', $v['fees_for']);?>"  class="form-control amount"  placeholder="Enter <?=$v['fees_for']?> Amount" value="<?=$value?>">
                        <span class="text-danger"><?php echo form_error(str_replace(' ', '', $v['fees_for'])); ?></span>
                    </td>
                    
                </tr>
                <?php
                $count++;
                }
                ?>
                <?php
                if($payment_log->old_fee>0){
                ?>
                <tr>
                    <td><?=$count?></td>
                    <th>Old Fee</th>
                    <th><?=$payment_log->old_fee?></th>
                      <td>
                        <input type="text" name="oldfee" value="<?=$payment_log->old_fee?>" class="form-control amount"  placeholder="Enter Old Fees Amount">
                    </td>
                    
                </tr>
                <?php
                }
                ?>
                 <tr>
                    <td></td>
                    <td></td>
                    <th>Total Fee</th>
                    <td style="width:80%!important;">
                        <input readonly="true" type="text" name="total" value="<?=$payment_log->total?>" id="total" class="form-control">
                        <input type="hidden" name="payment_id" value="<?php echo $payment_log->payment_id?>">
                        <input type="hidden" name="diffence" value="<?php echo $payment_log->paid_amount-$payment_log->total?>">
                       
                    </td>
                </tr>
             
                
                
            </tbody>
        </table>
        </div>
				</div>
                            <div class="box-footer">
            	<button type="submit" class="btn btn-success btn-raised">
					<i class="fa fa-check"></i> Save
				</button>
	        </div>		
			</div>
					
			<?php echo form_close(); ?>
		