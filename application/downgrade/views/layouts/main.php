<?php
if (!$this->session->userdata('is_login')) {
    $this->session->set_flashdata('msg', 'Your Session Is Over , Please Login!');
    $this->session->set_flashdata('msg_type', 'warning');
    redirect(base_url('user/login'));
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title><?php //echo $title;       ?></title>

        <link rel="stylesheet" href="<?= base_url() ?>resources/vendors/material-design-iconic-font/css/material-design-iconic-font.min.css">
        <link rel="stylesheet" href="<?= base_url() ?>resources/vendors/animate.css/animate.min.css">
        <link rel="stylesheet" href="<?= base_url() ?>resources/vendors/jquery-scrollbar/jquery.scrollbar.css">
        <link rel="stylesheet" href="<?= base_url() ?>resources/vendors/fullcalendar/fullcalendar.min.css">
        <link rel="stylesheet" href="<?= base_url() ?>resources/vendors/flatpickr/flatpickr.min.css" />
        <link rel="stylesheet" href="<?= base_url() ?>resources/vendors/select2/css/select2.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/gijgo/1.9.13/combined/css/gijgo.min.css">
         <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" crossorigin="anonymous">
        <link href="https://fonts.googleapis.com/css?family=Cinzel&display=swap" rel="stylesheet">

        <!-- App styles -->
        <link rel="stylesheet" href="<?= base_url() ?>resources/css/app.min.css">
        <link rel="stylesheet" href="<?= base_url() ?>resources/css/style.css">
        <link rel="stylesheet" href="<?= base_url() ?>resources/css/fileinput.css">


    </head>

    <body data-ma-theme="green">
        <main class="main">
            <!--            <div class="page-loader">
                            <div class="page-loader__spinner">
                                <svg viewBox="25 25 50 50">
                                    <circle cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" />
                                </svg>
                            </div>
                        </div>-->

            <header class="header">
                <div class="navigation-trigger hidden-xl-up" data-ma-action="aside-open" data-ma-target=".sidebar">
                    <div class="navigation-trigger__inner">
                        <i class="navigation-trigger__line"></i>
                        <i class="navigation-trigger__line"></i>
                        <i class="navigation-trigger__line"></i>
                    </div>
                </div>

                <div class="header__logo hidden-sm-down">
                    <h1><a href="<?= base_url(); ?>">Oxford English School Mouda</a></h1>
                </div>

                <form class="search">
                    <div class="search__inner">
                        <input type="text" class="search__text" placeholder="Search for people, files, documents...">
                        <i class="zmdi zmdi-search search__helper" data-ma-action="search-close"></i>
                    </div>
                </form>

                <ul class="top-nav">
                    <li class="hidden-xl-up"><a href="#" data-ma-action="search-open"><i class="zmdi zmdi-search"></i></a></li>






                </ul>
            </header>

            <aside class="sidebar">
                <div class="scrollbar-inner">
                    <div class="user">
                        <div class="user__info" data-toggle="dropdown">
                            <img class="user__img" src="<?= base_url() ?>resources/img/logo.png" alt="">

                            <div>
                                <div class="user__name"><?= $this->session->userdata['name'] ?></div>
                                <div class="user__email"><?= $this->session->userdata['email'] ?></div>
                            </div>
                        </div>

                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="<?php echo site_url('user/setting'); ?>">Settings</a>
                            <a class="dropdown-item" href="<?php echo site_url('user/logout'); ?>">Logout</a>
                        </div>
                    </div>

                    <ul class="navigation">
                        <li class="navigation__active"><a href="<?php echo site_url('dashboard'); ?>"><i class="zmdi zmdi-home"></i> Dashboard</a></li>
                        <?php if ($this->session->userdata('student')) { ?>
                            <li class="navigation__sub">
                                <a href="#"><i class="zmdi zmdi-view-week"></i> Students</a>

                                <ul>
                                    <li><a href="<?php echo site_url('student/add'); ?>">Add Student</a></li>
                                    <li><a href="<?php echo site_url('student/uploadStudentFromExcel'); ?>">Add Bulk Student</a></li>
                                    <li><a href="<?php echo site_url('student/index'); ?>">Manage Student</a></li>

                                </ul>
                            </li>
                        <?php } ?>
                        <?php if ($this->session->userdata('promote')) { ?>
                            <li class="navigation__sub">
                                <a href="#"><i class="zmdi zmdi-triangle-up"></i> Promote Student</a>

                                <ul>
                                    <li><a href="<?php echo site_url('student_promote/add'); ?>">Promote Student</a></li>
                                    <li><a href="<?php echo site_url('student_promote/index'); ?>">Manage Student</a></li>

                                </ul>
                            </li>
                        <?php } ?>
                        <?php if ($this->session->userdata('class_section')) { ?>
                            <li class="navigation__sub">
                                <a href="#"><i class="zmdi zmdi-view-list"></i> Class</a>

                                <ul>
                                    <li><a href="<?php echo site_url('clas/index'); ?>">Manage Class</a></li>
                                    <li><a href="<?php echo site_url('section/index'); ?>">Manage Section</a></li>
                                </ul>
                            </li>
                        <?php } ?>
                        <?php if ($this->session->userdata('teacher')) { ?>
                            <li class="navigation__sub">
                                <a href="#"><i class="zmdi zmdi-accounts"></i> Teacher</a>

                                <ul>
                                    <li><a href="<?php echo site_url('teacher/index'); ?>">Manage Teacher</a></li>
                                </ul>
                            </li>
                        <?php } ?>
                        <?php if ($this->session->userdata('payment')) { ?>
                            <li class="navigation__sub">
                                <a href="#"><i class="zmdi zmdi-collection-text"></i> Payment</a>

                                <ul>
                                    <li><a href="<?php echo site_url('payment/add'); ?>">Make Payment</a></li>
                                    <li><a href="<?php echo site_url('payment_log/index'); ?>">Manage Payment</a></li>
                                    <li><a href="<?php echo site_url('expense/index'); ?>">Expenses</a></li>

                                </ul>
                            </li>
                        <?php } ?>
                        <?php if ($this->session->userdata('fees')) { ?>
                            <li class="navigation__sub">
                                <a href="#"><i class="zmdi zmdi-swap-alt"></i>Fees</a>

                                <ul>
                                    <li><a href="<?php echo site_url('fee/index'); ?>">Manage Fees</a></li>
                                    <li><a href="<?php echo site_url('payment/index'); ?>">Outstanding Fees</a></li>
                                    <li><a href="<?php echo site_url('fee/add'); ?>">Add New Fees</a></li>

                                </ul>
                            </li>
                        <?php } ?>
                        <?php if ($this->session->userdata('leaving_certificate')) { ?>
                            <li class="navigation__sub">
                                <a href="#"><i class="zmdi zmdi-group-work"></i> Leaving Certificate</a>
                                <ul>
                                    <li><a href="<?php echo site_url('leaving_certificate/index'); ?>">Manage Leaving Certificate</a></li>
                                    <li><a href="<?php echo site_url('leaving_certificate/add'); ?>">Create New</a></li>

                                </ul>


                            </li>
                        <?php } ?>
                        <?php if ($this->session->userdata('website_contain')) { ?>
                            <li class="navigation__sub">
                                <a href="#"><i class="zmdi zmdi-trending-up"></i> Website Settings</a>

                                <ul>
                                    <li><a href="<?= site_url('topper') ?>">Toppers Management</a></li>
                                    <li><a href="<?= site_url('management') ?>">School Management</a></li>
                                    <li><a href="<?= site_url('gallery') ?>">Gallery</a></li>

                                </ul>
                            </li>
                        <?php } ?>


                        <?php if ($this->session->userdata('reports')) { ?>
                            <li class="navigation__sub">
                                <a href="#"><i class="zmdi zmdi-collection-item"></i>Reports</a>

                                <ul>
                                    <li><a href="<?= site_url('report/studentReport') ?>"> Student Reports</a></li>
                                    <li><a href="<?= site_url('report/oldstudentReport') ?>">Old Student Report</a></li>
                                    <li><a href="<?= site_url('report/leavingCertificateReport') ?>">Leaving Certificate</a></li>
                                    <li><a href="<?= site_url('report/payment') ?>">Date wise Payment </a></li>
                                    <li><a href="<?= site_url('report/outStandingFeesReport') ?>">Outstanding Payment</a></li>
                                    <li><a href="<?= site_url('report/paidfees') ?>">Paid Payment</a></li>


                                </ul>
                            </li>
                        <?php } ?>

                        <li class="navigation__sub">
                            <a href="#"><i class="zmdi zmdi-email-open zmdi-hc-fw"></i>Send Sms</a>
                            <ul>
                                <li><a href="<?= site_url('sms/sendToOne') ?>">Send One</a></li>
                                <li><a href="<?= site_url('sms/sendBulk') ?>">Send Bulk</a></li>
                                <li><a href="<?= site_url('sms/sendAll') ?>">Send To All</a></li>
                            </ul>
                        </li>

                        <?php if ($this->session->userdata('user')) { ?>
                            <li class="navigation">
                                <a href="<?php echo site_url('user/index'); ?>"><i class="zmdi zmdi-account-box"></i> Manage Users</a>
                            </li>
                        <?php } ?>

                        <li class="navigation">
                            <a href="<?php echo site_url('user/logout'); ?>"><i class="zmdi zmdi-close zmdi-hc-fw"></i>logout</a>
                        </li>
                    </ul>

                </div>
            </aside>
            <!-- Left side column. contains the logo and sidebar -->


            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Main content -->
                <section class="content">
                    <div class="card">
                        <?php
                        if (isset($_view) && $_view)
                            $this->load->view($_view);
                        ?>              
                    </div>
                </section>
                <!-- /.content -->
            </div>
        </main>

        <script src="<?= base_url() ?>resources/vendors/jquery/jquery.min.js"></script>
        <script src="<?= base_url() ?>resources/vendors/popper.js/popper.min.js"></script>
        <script src="<?= base_url() ?>resources/vendors/bootstrap/js/bootstrap.min.js"></script>
        <script src="<?= base_url() ?>resources/vendors/jquery-scrollbar/jquery.scrollbar.min.js"></script>
        <script src="<?= base_url() ?>resources/vendors/jquery-scrollLock/jquery-scrollLock.min.js"></script>

        <script src="<?= base_url() ?>resources/vendors/flot/jquery.flot.js"></script>
        <script src="<?= base_url() ?>resources/vendors/flot/jquery.flot.resize.js"></script>
        <script src="<?= base_url() ?>resources/vendors/flot.curvedlines/curvedLines.js"></script>
        <script src="<?= base_url() ?>resources/vendors/jqvmap/jquery.vmap.min.js"></script>
        <script src="<?= base_url() ?>resources/vendors/jqvmap/maps/jquery.vmap.world.js"></script>
        <script src="<?= base_url() ?>resources/vendors/easy-pie-chart/jquery.easypiechart.min.js"></script>
        <script src="<?= base_url() ?>resources/vendors/salvattore/salvattore.min.js"></script>
        <script src="<?= base_url() ?>resources/vendors/sparkline/jquery.sparkline.min.js"></script>
        <script src="<?= base_url() ?>resources/vendors/moment/moment.min.js"></script>
        <script src="<?= base_url() ?>resources/vendors/fullcalendar/fullcalendar.min.js"></script>

        <!-- Charts and maps-->
        <script src="<?= base_url() ?>resources/demo/js/flot-charts/curved-line.js"></script>
        <!--<script src="<?= base_url() ?>resources/demo/js/flot-charts/dynamic.js"></script>-->
        <script src="<?= base_url() ?>resources/demo/js/flot-charts/line.js"></script>
        <script src="<?= base_url() ?>resources/demo/js/flot-charts/chart-tooltips.js"></script>
        <script src="<?= base_url() ?>resources/demo/js/other-charts.js"></script>
        <script src="<?= base_url() ?>resources/demo/js/jqvmap.js"></script>
        <script src="<?= base_url() ?>resources/vendors/datatables/jquery.dataTables.min.js"></script>
        <script src="<?= base_url() ?>resources/vendors/datatables-buttons/dataTables.buttons.min.js"></script>
        <script src="<?= base_url() ?>resources/vendors/datatables-buttons/buttons.print.min.js"></script>
        <script src="<?= base_url() ?>resources/vendors/jszip/jszip.min.js"></script>
        <script src="<?= base_url() ?>resources/vendors/select2/js/select2.full.min.js"></script>
        <script src="<?= base_url() ?>resources/vendors/datatables-buttons/buttons.html5.min.js"></script>
        <script src="<?= base_url() ?>resources/vendors/flot/jquery.flot.pie.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
        <script type="text/javascript" src="<?= base_url() ?>resources/js/chart.js"></script> 
        <script type="text/javascript" src="<?= base_url() ?>resources/js/fileinput.js"></script> 
        <?php
        $page = $this->router->fetch_class(); // class = controller
        $method = $this->router->fetch_method();
        if ($page == 'dashboard' && $method == 'index') {
            ?>
            <script>


                new Chart(document.getElementById("bar-chart"), {
                type: 'bar',
                        data: {
                        labels: [<?php foreach ($class_student as $k => $v) {
            ?>"<?php echo $v['class_name'] ?>",<?php }
        ?>],
                                datasets: [
                                {
                                label: "Number of Students",
                                        backgroundColor: ["red", "blue", "yellow", "green", "pink", "aliceblue", "aqua", "black", "blue", "blueviolet", "brown"],
                                        data: [<?php foreach ($class_student as $k => $v) {
            ?>"<?php echo $v['student'] ?>",<?php }
        ?>, ]
                                }
                                ]
                        },
                        options: {
                        legend: { display: false },
                                title: {
                                display: true,
                                        text: 'Number of Student In Each Class This Academic Year'
                                },
                                scales: {
                                yAxes: [{
                                ticks: {
                                beginAtZero:true
                                }
                                }]
                                }

                        }


                });
            </script>
            <script type="text/javascript">
                window.onload = function() {
                $("#chartContainer").CanvasJSChart({
                title: {
                text: "Fees Colletcted This Academic Year"
                },
                        axisY: {
                        title: "In Rs"
                        },
                        data: [
                        {
                        type: "bar",
                                toolTipContent: "{label}:{y} Rs",
                                dataPoints: [
    <?php
    foreach ($fees_by_month as $k => $v) {
        ?>
                                    { label:"<?php echo $v['month'] ?>", y:<?php echo $v['total'] ?>},
        <?php
    }
    ?>

                                ]
                        }
                        ]
                });
                var chart = new CanvasJS.Chart("pieContainer", {
                animationEnabled: true,
                        title: {
                        text: "Fees Collected and Remaining"
                        },
                        data: [{
                        type: "pie",
                                startAngle: 360,
                                yValueFormatString: "##0.00\"%\"",
                                indexLabel: "{label} {y}",
                                dataPoints: [
                                {y: <?php echo $fee_collected_and_remaining->total ?>, label: "Total"},
                                {y: <?php echo $fee_collected_and_remaining->paid ?>, label: "Paid"},
                                ]
                        }]
                });
                chart.render();
                }

            </script>



            <?php
        }
        ?>

        <!-- App functions and actions -->
        <script src="<?= base_url() ?>resources/js/app.min.js"></script>
        <script src="<?= base_url() ?>resources/js/script.js"></script>
        <script src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.15.0/jquery.validate.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/gijgo/1.9.13/combined/js/gijgo.min.js"></script>
        <script>
                $(".btn-success").on('click', function(){
                $(".form").validate();
                });
        </script>   
        <script>
            var datepicker = $(".form_datetime");
            $.each(datepicker, function(index, item){
            $(item).datepicker({
            format: 'dd/mm/yyyy',
            });
            });
        </script>
        <script>
            var datepicker = $(".form_monthyear");
            $.each(datepicker, function(index, item){
            $(item).datepicker({
            format: 'dd/mm/yyyy',
            });
            });
        </script>
        <?php
        $con = $this->router->fetch_class();
        $method = $this->router->fetch_method();
        if ($con == 'payment_log' && $method == 'view_and_msg') {
            echo "<script>check();</script>";
        }
        ?>
        <script>
            document.getElementById('sms-text').onkeyup = function () {
            document.getElementById('count').innerHTML = "Characters left: " + (160 - this.value.length);
            };
        </script> 
        <script>
            $(function() {
            // Multiple images preview in browser
            var imagesPreview = function(input, placeToInsertImagePreview) {

            if (input.files) {
            var filesAmount = input.files.length;
            for (i = 0; i < filesAmount; i++) {
            var reader = new FileReader();
            reader.onload = function(event) {
            $($.parseHTML('<img>')).attr('src', event.target.result).appendTo(placeToInsertImagePreview);
            }

            reader.readAsDataURL(input.files[i]);
            }
            }

            };
            $('#image').on('change', function() {
            imagesPreview(this, 'div.gallery');
            });
            });
        </script>       

        <script>
            $('#file-0').fileinput({
            'showPreview': true,
                    'showRemove':false,
                    'showUpload':false,
                     "fileActionSettings":{"showDrag":false, 'showZoom':false,'showRemove':true},
                     'allowedFileExtensions': ["jpg", "png", "gif"]
            });
        </script>            
    </body>


</html>
