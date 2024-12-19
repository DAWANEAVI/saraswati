<div class="card-body">
    <h3 class="box-title text-center">SMS List</h3>
    <table id="data-table" class="table table-bordered">
        <thead>
        <tr>
        <th>#</th>
        <th>Academic Year</th>
        <th>Student Name</th>
        <!-- <th>Template ID</th> -->
        <th>Mobile no</th>
        <th>Message</th>
        <th>Sent</th>
        <th>Message ID</th>
        <!-- <th>Verified</th> -->
        <th>Created Date</th>
        </tr>
        </thead>
        <tbody>
        <?php $i=$noof_page+1; 
        if(isset($sms_log) && $sms_log!=null)
        {
        foreach($sms_log as $s){ ?>
        <tr>
        <td><?php echo $i++; ?></td>
        <td><?php echo $s['session']; ?></td>
        <td><?php echo $s['fullname']; ?></td>
        <!-- <td><?php echo $s['dltTemplateID']; ?></td> -->
        <td><?php echo $s['mobile_no']; ?></td>
        <td><?php echo $s['message']; ?></td>
        <td><?php echo $s['sent'] == 1 ? 'Success':'Pending'; ?></td>
        <td><?php echo $s['message_id']; ?></td>
        <!-- <td><?php echo $s['verified']; ?></td> -->
        <td><?php echo $s['created_at']; ?></td>

        </tr>
            <?php }
        
                }else{
                        echo 'No data found';
                    }

            ?>
        </tbody>
    </table>

</div>