<header class="content__title">
                    <h1>Dashboard</h1>
                    <small>Welcome Admin!</small>

                    <div class="actions">
                        <a href="#" class="actions__item zmdi zmdi-trending-up"></a>
                        <a href="#" class="actions__item zmdi zmdi-check-all"></a>

                        
                    </div>
                </header>

 <div class="row quick-stats">
                    <div class="col-sm-6 col-md-3">
                        <div class="quick-stats__item bg-blue">
                            <div class="quick-stats__info">
                                <h2><?=$no_of_student->no_of_student?></h2>
                                <small>Total Number Of  Students</small>
                            </div>

                        </div>
                    </div>

                    <div class="col-sm-6 col-md-3">
                        <div class="quick-stats__item bg-amber">
                            <div class="quick-stats__info">
                                <h2><?=$no_of_teacher->no_of_teacher?></h2>
                                <small>Total Number Of Teachers</small>
                            </div>

                        </div>
                    </div>

                    <div class="col-sm-6 col-md-3">
                        <div class="quick-stats__item bg-purple">
                            <div class="quick-stats__info">
                                <h2><?=$fees_collected_today?></h2>
                                <small>Today's Collected Fees</small>
                            </div>

                        </div>
                    </div>

                    <div class="col-sm-6 col-md-3">
                        <div class="quick-stats__item bg-red">
                            <div class="quick-stats__info">
                                <h2><?=$sms_count?></h2>
                                <small>SMS Send Yet</small>
                            </div>

                        </div>
                    </div>
     <h5 style="padding:2%;" class="text-center">Student In Class Current Academic Year</h5> 
                </div>
<div class="row quick-stats">
            <?php
            $array_color = array('bg-amber','bg-blue','bg-red','bg-purple');
            $count=0;
            foreach ($class_student as $k=>$v){
            ?>
           
             <div class="col-md-2">
                        <div class="quick-stats__item <?=$array_color[$count];?>">
                            <div class="quick-stats__info">
                                <h2><?=$v['student']?></h2>
                                <small><?=  strtoupper($v['class_name'])?></small>
                            </div>

                        </div>
                    </div>
            <?php
            if($count==3){
                $count=0;
            }
            $count++;
            }
            ?>
</div>


<div class="row">
    <div class="col-md-6">
                       <canvas id="bar-chart"></canvas>
                       
                       <div id="pieContainer"></div>
                       

    </div>
    <div class="col-md-6">
            <div id="chartContainer"></div>
        </div>
    
</div>
   
       
        
</div>
