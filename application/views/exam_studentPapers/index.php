 <!-- DataTables -->
 <link rel="stylesheet" href="<?php echo base_url('resources/plugins/datatables.net-bs');  ?>/css/dataTables.bootstrap.min.css">
<!-- DataTables -->
<script src="<?php echo base_url('resources/plugins/datatables.net');  ?>/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url('resources/plugins/datatables.net-bs');  ?>/js/dataTables.bootstrap.min.js"></script>
 <script>
                  $(function () {
                    $('#example1').DataTable()
                    $('#example2').DataTable({
                      'paging'      : true,
                      'lengthChange': false,
                      'searching'   : false,
                      'ordering'    : true,
                      'info'        : true,
                      'autoWidth'   : false
                    })
                  })
                  </script>
<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Exam_studentPapers  Listing</h3>
              <div class="box-tools">
                <a href="<?php echo site_url('exam_studentPapers/add'); ?>" class="btn btn-success btn-sm">Add</a> 
                </div>
   <?php echo $this->session->flashdata('alert_msg');?>
            <div class="box-body table-responsive no-padding">
                      <script>
                              var site_url="<?php echo site_url(); ?>";
                                  $(document).ready(function () {  
                                      $('.changeclm').on('change', function (e) { 
                                      var value = $(this).val();
                                      var clm_name = $('option:selected', this).attr('clm_name');

                                      var id = $('option:selected', this).attr('id');     
                                      // alert('>>>'+id+'<<<->>'+clm_name+'<<-->>'+value);
                                      if(value=='')
                                      {
                                        alert('select any column');
                                      }
                                      else
                                      {
                                         if(confirm('Are you sure you want to change?')){
                                                //  alert(value);
                                            $.ajax({
                                            type: 'POST',
                                            data: { value: value,clm_name:clm_name,id:id },
                                            url: site_url +"exam_studentPapers/get_search_values_by_clm",
                                            success: function (responsedata) {
                                                //  alert(responsedata);
                                                
                                                $('#view-load-id').html(responsedata); 
                                            },
                                            error: function (jqXHR, textStatus, errorThrown) {
                                                alert(jqXHR.responseText)
                                            }
                                            });  
                                          }
                                          else{
                                              return false;
                                          }

                                  
                                      }
                                      });
                                  });
                                  </script>
                <table id="example1" class="table table-striped">
                    <thead>
                    <tr>
                    <th>#</th>
                    <th>StudPaperID</th>
                    <th>ExamID</th>
                    <th>Student id</th>
                    <th>Class id</th>
                    <th>Marks</th>
                    <th>EveluationType</th>
                    <th>Result</th>
                    <th>Grade</th>
                    <th>StatusID</th>
                    <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $i=$noof_page+1; 
           if(isset($exam_studentPapers) && $exam_studentPapers!=null)
           {
           foreach($exam_studentPapers as $e){ ?>
                    <tr>
                    <td><?php echo $i++; ?></td>
                    <td><?php echo $e['studPaperID']; ?></td>
                    <td><?php echo $e['examID']; ?></td>
                    <td><?php echo $e['student_id']; ?></td>
                    <td><?php echo $e['class_id']; ?></td>
                    <td><?php echo $e['marks']; ?></td>
                    <td><?php echo $e['eveluationType']; ?></td>
                    <td>
                
                <?php //echo $e['result']; ?>
                      <select name="result" class="form-control changeclm">
                      <option value="">select result</option>
                      <?php  
                      $result_values = array(
                      'Pass'=>'1', 
                      'Failed'=>'2', 
                      'Default'=>'3', 
                      'Not Attended'=>'4', 
                          );
                      foreach($result_values as   $value => $display_text)
                      {
                          $selected = ($value == $e['result'] ) ? ' selected="selected"' : "";
                        echo '<option id='.$e['studPaperID'].' clm_name="result" value="'.$value.'" '.$selected.'>'.$display_text.'</option>';
                      } 
                      ?>
                    </select>
                </td>
                    <td><?php echo $e['grade']; ?></td>
                    <td><?php echo $e['statusID']; ?></td>
                     <td><a href="<?php echo site_url('exam_studentPapers/edit/'.$e['studPaperID']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Edit</a> 
                         <a
                            onclick="return confirm('Are you sure You want to delete?')"
                             href="<?php echo site_url('exam_studentPapers/remove/'.$e['studPaperID']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Delete</a>
                     </td>
                    </tr>
                     <?php }
                    
                           }else{
                                  echo 'No data found';
                             }

          ?>
                    </tbody>
                </table>
                <div class="pull-right">
                      <?php echo $this->pagination->create_links(); ?> 
                </div>
            </div>

        </div>
    </div>

</div>

