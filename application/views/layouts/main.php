<?php
if (!$this->session->userdata('is_login')) {
    $this->session->set_flashdata('msg', 'Your Session Is Over , Please Login!');
    $this->session->set_flashdata('msg_type', 'warning');
    redirect(base_url('user/login'));
}else{
    $user_id_session = $this->session->userdata('user_id');
    if($user_id_session) {
        $CI =& get_instance();
        $CI->load->model('User_model');
        $userAccess = $CI->User_model->get_user_access($user_id_session);
        $moduleAccess = json_decode($userAccess['modules']);
        $this->session->set_userdata(array('moduleAccess' => $moduleAccess));
        $data['moduleAccess'] = $moduleAccess;
        $submoduleAccess = json_decode($userAccess['submodules']);
        $data['submoduleAccess'] = $submoduleAccess;
        $this->session->set_userdata(array('submoduleAccess' => $submoduleAccess));
    }
}
?>
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
        <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" rel="stylesheet"/>
        <style>
            .highcontra {
              opacity: 1.6 !important;
             }
            .badge{
              padding: 0.2rem 0.2rem !important;
            }
        </style>


    </head>

    <body data-ma-theme="cyan" data-notification-title='<?php echo $this->session->flashdata('alertType') ?>' data-notification-message='<?php echo $this->session->flashdata('message') ?>'>
        <main class="main">
            <!--        <div class="page-loader">
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
                    <h1><a href="<?= base_url(); ?>">SARASWATI PUBLIC ENGLISH MEDIUM SCHOOL</a></h1>
                </div>

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
                    <?PHP /*   ?>                     
                        
                    <ul class="navigation">
                        <li class="navigation__active"><a href="<?php echo site_url('dashboard'); ?>"><i class="zmdi zmdi-home"></i> Dashboard</a></li>
                        <?php if ($this->session->userdata('fees')) { ?>
                            <li class="navigation__sub">
                                <a href="#"><i class="zmdi zmdi-calendar-check"></i>Academic Year</a>

                                <ul>
                                    <li><a href="<?php echo site_url('academic_year/index'); ?>">Manage Academic Year</a></li>
                                    <li><a href="<?php echo site_url('academic_year/add'); ?>">Add Academic Year</a></li>

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
                        <?php if ($this->session->userdata('fees')) { ?>
                            <li class="navigation__sub">
                                <a href="#"><i class="zmdi zmdi-swap-alt"></i>Fees</a>

                                <ul>
                                    <li><a href="<?php echo site_url('fee/index'); ?>">Current Academic Fees</a></li>
                                    <li><a href="<?php echo site_url('fee/manage'); ?>">Manage Fees</a></li>
                                    <li><a href="<?php echo site_url('fee/setup'); ?>">Fees Automation Setup</a></li>

                                </ul>
                            </li>
                        <?php } ?>
                        <?php if ($this->session->userdata('student')) { ?>
                            <li class="navigation__sub">
                                <a href="#"><i class="zmdi zmdi-view-week"></i> Students</a>

                                <ul>
                                    <li><a href="<?php echo site_url('student/add'); ?>">Add Student</a></li>
                                    <li><a href="<?php echo site_url('student/index'); ?>">Manage Student</a></li>

                                </ul>
                            </li>
                        <?php } ?>
                        <?php if ($this->session->userdata('payment')) { ?>
                            <li class="navigation__sub">
                                <a href="#"><i class="zmdi zmdi-collection-text"></i> Payment</a>

                                <ul>
                                    <li><a href="<?php echo site_url('payment/add'); ?>"><i class="zmdi zmdi-plus-circle"></i> Make Payment</a></li>
                                    <li><a href="<?php echo site_url('payment_log/index'); ?>"><i class="zmdi zmdi-swap-vertical"></i> Manage Payment</a></li>
                                    <li><a href="<?php echo site_url('expense/index'); ?>"><i class="zmdi zmdi-minus-circle"></i> Expenses</a></li>

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

                        <?php if ($this->session->userdata('leaving_certificate')) { ?>
                            <li class="navigation__sub">
                                <a href="#"><i class="zmdi zmdi-group-work"></i> Bonafide Certificate</a>
                                <ul>
                                    
                                    <li><a href="<?php echo site_url('bonafide/add'); ?>">Create New</a></li>

                                    <li><a href="<?php echo site_url('bonafide/index'); ?>">Certificate List</a></li>

                                </ul>


                            </li>
                        <?php } ?>

                        <?php if ($this->session->userdata('leaving_certificate')) { ?>
                            <li class="navigation__sub">
                                <a href="#"><i class="zmdi zmdi-assignment"></i> Leaving Certificate</a>
                                <ul>
                                    <li><a href="<?php echo site_url('leaving_certificate/index'); ?>">Manage Leaving Certificate</a></li>
                                    <li><a href="<?php echo site_url('leaving_certificate/add'); ?>">Create New</a></li>

                                </ul>


                            </li>
                        <?php } ?>
                        <?php if (1==1) { ?>
                            <li class="navigation__sub">
                                <a href="#"><i class="zmdi zmdi-assignment"></i> Exam Setup</a>
                                <ul>
                                    <li><a href="<?php echo site_url('Exam_Heads/index'); ?>">Exam Title Setup</a></li>
                                    <li><a href="<?php echo site_url('Exam_subjects/index'); ?>">Subject Setup</a></li>
                                    <li><a href="<?php echo site_url('Exam_grades/index'); ?>">Grades Setup</a></li>
                                </ul>
                            </li>
                        <?php } ?>
                        <?php if (1==1) { ?>
                            <li class="navigation__sub">
                                <a href="#"><i class="zmdi zmdi-assignment"></i>Acadamic Exam</a>
                                <ul>
                                    <li><a href="<?php echo site_url('Exam_acadamicExams/index'); ?>">Acadamic Exam Setup</a></li>
                                    <li><a href="<?php echo site_url('Exam_subjectPaper/index'); ?>">Paper Setup</a></li>
                                    <li><a href="<?php echo site_url('Exam_studentPapers/examResult'); ?>">Exam Result</a></li>
                                    <li><a href="<?php echo site_url('Exam_studentPapers/attendanceWeight'); ?>">Attendance & Weight</a></li>
                                    <li><a href="<?php echo site_url('Exam_studentPapers/studentResult'); ?>">Final Result</a></li>
                                </ul>
                            </li>
                        <?php } ?>
                        <?php if ($this->session->userdata('website_contain')) { ?>
                            <li class="navigation__sub">
                                <a href="#"><i class="zmdi zmdi-trending-up"></i> Website Settings</a>

                                <ul>
                                    <li><a href="<?= site_url('gallery') ?>">Gallery</a></li>

                                </ul>
                            </li>
                        <?php } ?>

                        <?php if ($this->session->userdata('reports')) { ?>
                            <li class="navigation__sub">
                                <a href="#"><i class="zmdi zmdi-collection-item"></i>Reports</a>

                                <ul>
                                    <li><a href="<?= site_url('report/studentInfoReport') ?>"> Student Information Report</a></li>
                                    <li><a href="<?= site_url('report/oldstudentReport') ?>">Old Student Report</a></li>
                                    <li><a href="<?= site_url('report/payment') ?>">Date wise Payment </a></li>
                                    <li><a href="<?= site_url('report/leavingCertificateReport') ?>">Leaving Certificate</a></li>
                                </ul>
                            </li>
                        <?php } ?>

                        <?PHP /*
                        <?php if ($this->session->userdata('teacher')) { ?>
                            <li class="navigation__sub">
                                <a href="#"><i class="zmdi zmdi-accounts"></i> Teacher</a>

                                <ul>
                                    <li><a href="<?php echo site_url('teacher/index'); ?>">Manage Teacher</a></li>
                                </ul>
                            </li>
                        <?php } ?>
                        
                        
                        

                        <?php if ($this->session->userdata('leaving_certificate')) { ?>
                            <li class="navigation__sub">
                                <a href="#"><i class="zmdi zmdi-assignment"></i> Leaving Certificate</a>
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
                                    <li><a href="<?= site_url('gallery') ?>">Gallery</a></li>

                                </ul>
                            </li>
                        <?php } ?>


                        <?php if ($this->session->userdata('reports')) { ?>
                            <li class="navigation__sub">
                                <a href="#"><i class="zmdi zmdi-collection-item"></i>Reports</a>

                                <ul>
                                    <li><a href="<?= site_url('report/studentInfoReport') ?>"> Student Information Report</a></li>
                                    <li><a href="<?= site_url('report/oldstudentReport') ?>">Old Student Report</a></li>
                                    <li><a href="<?= site_url('report/leavingCertificateReport') ?>">Leaving Certificate</a></li>
                                    <li><a href="<?= site_url('report/payment') ?>">Date wise Payment </a></li>
                                    <li><a href="<?= site_url('report/getAllOutStandingFeesReport') ?>">Outstanding Payment</a></li>
                                    <li><a href="<?= site_url('report/outStandingFeesReport') ?>">Session Wise Outstanding Payment</a></li>
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
                    */ ?>

                    <ul class="navigation">
                        <li class="navigation__active"><a href="<?php echo site_url('dashboard'); ?>"><i class="zmdi zmdi-home"></i> Dashboard</a></li>
                        <?php if (isset($moduleAccess) && in_array('ACAD', $moduleAccess) ) { ?>
                            <li class="navigation__sub">
                                <a href="#"><i class="zmdi zmdi-calendar-check"></i>Academic Year</a>

                                <ul>
                                <?php if(isset($this->session->userdata['submoduleAccess']->Manage_Acadamic_Year) && in_array('1', $this->session->userdata['submoduleAccess']->Manage_Acadamic_Year)){?><li><a href="<?php echo site_url('academic_year/index'); ?>">Manage Academic Year</a></li> <?php }?>
                                    <?php if(isset($this->session->userdata['submoduleAccess']->Manage_Acadamic_Year) && in_array('2', $this->session->userdata['submoduleAccess']->Manage_Acadamic_Year)){?><li><a href="<?php echo site_url('academic_year/add'); ?>">Add Academic Year</a></li> <?php }?>

                                </ul>
                            </li>
                        <?php } ?>
                        <?php if (isset($moduleAccess) && in_array('CLSE', $moduleAccess) ) { ?>
                            <?php if(isset($this->session->userdata['submoduleAccess']->Manage_Class_N_Section) && in_array('1', $this->session->userdata['submoduleAccess']->Manage_Class_N_Section)){?>
                            <li class="navigation__sub">
                                <a href="#"><i class="zmdi zmdi-view-list"></i> Class</a>

                                <ul>
                                    <li><a href="<?php echo site_url('clas/index'); ?>">Manage Class</a></li>
                                    <li><a href="<?php echo site_url('section/index'); ?>">Manage Section</a></li>
                                </ul>
                            </li>
                            <?php }?>
                        <?php } ?>
                        <?php if (isset($moduleAccess) && in_array('FEES', $moduleAccess) ) { ?>
                            <?php if(isset($this->session->userdata['submoduleAccess']->Manage_Fees) && in_array('1', $this->session->userdata['submoduleAccess']->Manage_Fees)){?>
                            <li class="navigation__sub">
                                <a href="#"><i class="zmdi zmdi-swap-alt"></i>Fees</a>

                                <ul>
                                    <li><a href="<?php echo site_url('fee/index'); ?>">Current Academic Fees</a></li>
                                    <li><a href="<?php echo site_url('fee/manage'); ?>">Manage Fees</a></li>
                                    <!--<?php if(isset($this->session->userdata['submoduleAccess']->Manage_Fees) && in_array('1', $this->session->userdata['submoduleAccess']->Manage_Fees)){?><li><a href="<?php echo site_url('fee/setup'); ?>">Fees Automation Setup</a></li> <?php } ?>-->

                                </ul>
                            </li>
                            <?php }?>
                        <?php } ?>
                        <?php if ((isset($moduleAccess) && in_array('STUD', $moduleAccess)) ) { ?>
                            <li class="navigation__sub">
                            <?php if(isset($submoduleAccess->Manage_Student) && in_array('1', $submoduleAccess->Manage_Student)){?>
                                <a href="#"><i class="zmdi zmdi-view-week"></i> Students</a>
                                
                                <ul>
                                   <?php if(isset($submoduleAccess->Manage_Student) && in_array('2', $submoduleAccess->Manage_Student)){?>
                                    <li><a href="<?php echo site_url('student/add'); ?>">Add Student</a></li> 
                                   <?php } ?>
                                    <li><a href="<?php echo site_url('student/index'); ?>">Manage Student</a></li>

                                </ul>
                                <?php }?>
                            </li>
                        <?php } ?>
                        <?php if (isset($moduleAccess) && in_array('PAYM', $moduleAccess) ) { ?>
                            <li class="navigation__sub">
                                <a href="#"><i class="zmdi zmdi-collection-text"></i> Payment</a>

                                <ul>
                                    <?php if(isset($submoduleAccess->Make_Payment) && in_array('2', $submoduleAccess->Make_Payment)){?><li><a href="<?php echo site_url('payment/add'); ?>"><i class="zmdi zmdi-plus-circle"></i> Make Payment</a></li><?php } ?>
                                    <?php if(isset($submoduleAccess->Payment_Receipt) && in_array('1', $submoduleAccess->Payment_Receipt)){?><li><a href="<?php echo site_url('payment_log/index'); ?>"><i class="zmdi zmdi-swap-vertical"></i> Manage Payment</a></li> <?php }?>
                                    <?php if(isset($submoduleAccess->Payment_Concession) && in_array('1', $submoduleAccess->Payment_Concession)){?><li><a href="<?php echo site_url('payment_concession/index'); ?>"><i class="zmdi zmdi-sun"></i> Payment Concession</a></li> <?php } ?>
                                    <?php if(isset($submoduleAccess->Manage_Expences) && in_array('1', $submoduleAccess->Manage_Expences)){?><li><a href="<?php echo site_url('expense/index'); ?>"><i class="zmdi zmdi-minus-circle"></i> Expenses</a></li> <?php } ?>

                                </ul>
                            </li>
                            
                        <?php } ?>
                
                        <?php if (isset($moduleAccess) && in_array('PROM', $moduleAccess) ) { ?>
                            <?php if(isset($submoduleAccess->Manage_Pramotion) && in_array('1', $submoduleAccess->Manage_Pramotion)){?>
                            <li class="navigation__sub">
                                <a href="#"><i class="zmdi zmdi-triangle-up"></i> Promote Student</a>

                                <ul>
                                    <?php if(isset($submoduleAccess->Manage_Pramotion) && in_array('2', $submoduleAccess->Manage_Pramotion)){?><li><a href="<?php echo site_url('student_promote/add'); ?>">Promote Student</a></li> <?php } ?>
                                    <?php if(isset($submoduleAccess->Manage_Pramotion) && in_array('1', $submoduleAccess->Manage_Pramotion)){?><li><a href="<?php echo site_url('student_promote/index'); ?>">Manage Student</a></li> <?php } ?>

                                </ul>
                            </li>
                            <?php } ?>
                        <?php } ?>

                        <?php if (isset($moduleAccess) && in_array('BONA', $moduleAccess) ) { ?>
                            
                            <li class="navigation__sub">
                                <a href="#"><i class="zmdi zmdi-group-work"></i> Bonafide Certificate</a>
                                <ul>
                                    
                                    <?php if(isset($submoduleAccess->Manage_Bonafide) && in_array('2', $submoduleAccess->Manage_Bonafide)){?><li><a href="<?php echo site_url('bonafide/add'); ?>">Create New</a></li> <?php } ?>

                                    <?php if(isset($submoduleAccess->Manage_Bonafide) && in_array('1', $submoduleAccess->Manage_Bonafide)){?><li><a href="<?php echo site_url('bonafide/index'); ?>">Certificate List</a></li> <?php } ?>

                                </ul>


                            </li>
                        <?php } ?>

                        <?php if (isset($moduleAccess) && in_array('LETC', $moduleAccess) ) { ?>
                            
                            <li class="navigation__sub">
                                <a href="#"><i class="zmdi zmdi-assignment"></i> Leaving Certificate</a>
                                <ul>
                                    <?php if(isset($submoduleAccess->Manage_Leaving) && in_array('1', $submoduleAccess->Manage_Leaving)){?><li><a href="<?php echo site_url('leaving_certificate/index'); ?>">Manage Leaving Certificate</a></li> <?php }?>
                                    <?php if(isset($submoduleAccess->Manage_Leaving) && in_array('2', $submoduleAccess->Manage_Leaving)){?><li><a href="<?php echo site_url('leaving_certificate/add'); ?>">Create New</a></li><?php } ?>

                                </ul>
                            </li>
                        <?php } ?>
                        <?php if (isset($moduleAccess) && in_array('ESTP', $moduleAccess) ) { ?>
                            <li class="navigation__sub">
                                <a href="#"><i class="zmdi zmdi-assignment"></i> Exam Setup</a>
                                <ul>
                                <?php if(isset($submoduleAccess->Exam_Title_Setup) && in_array('1', $submoduleAccess->Exam_Title_Setup)){?><li><a href="<?php echo site_url('Exam_Heads/index'); ?>">Exam Title Setup</a></li> <?php }?>
                                <?php if(isset($submoduleAccess->Subject_Setup) && in_array('1', $submoduleAccess->Subject_Setup)){?><li><a href="<?php echo site_url('Exam_subjects/index'); ?>">Subject Setup</a></li><?php }?>
                                <?php if(isset($submoduleAccess->Grades_Setup) && in_array('1', $submoduleAccess->Grades_Setup)){?><li><a href="<?php echo site_url('Exam_grades/index'); ?>">Grades Setup</a></li><?php }?>
                                </ul>
                            </li>
                        <?php } ?>
                        <?php if (isset($moduleAccess) && in_array('EXAM', $moduleAccess) ) { ?>
                            <li class="navigation__sub">
                                <a href="#"><i class="zmdi zmdi-assignment"></i>Acadamic Exam</a>
                                <ul>
                                <?php if(isset($submoduleAccess->Acadamic_Exam_Setup) && in_array('1', $submoduleAccess->Acadamic_Exam_Setup)){?><li><a href="<?php echo site_url('Exam_acadamicExams/index'); ?>">Acadamic Exam Setup</a></li><?php }?>
                                <?php if(isset($submoduleAccess->Paper_Setup) && in_array('2', $submoduleAccess->Paper_Setup)){?><li><a href="<?php echo site_url('Exam_subjectPaper/index'); ?>">Paper Setup</a></li><?php }?>
                                <?php if(isset($submoduleAccess->Exam_Result) && in_array('1', $submoduleAccess->Exam_Result)){?><li><a href="<?php echo site_url('Exam_studentPapers/examResult'); ?>">Exam Result</a></li><?php }?>
                                <?php if(isset($submoduleAccess->Attendance_N_Weight) && in_array('1', $submoduleAccess->Attendance_N_Weight)){?> <li><a href="<?php echo site_url('Exam_studentPapers/attendanceWeight'); ?>">Attendance & Weight</a></li><?php }?>
                                <?php if(isset($submoduleAccess->Final_Result) && in_array('1', $submoduleAccess->Final_Result)){?><li><a href="<?php echo site_url('Exam_studentPapers/studentResult'); ?>">Final Result</a></li><?php }?>
                                </ul>
                            </li>
                        <?php } ?>

                        <?php if (isset($moduleAccess) && in_array('SMSM', $moduleAccess) ) { ?>
                        <li class="navigation__sub">
                            <a href="#"><i class="fas fa-hiking"></i>Attendance</a>
                            <ul>
                                <?php if(isset($submoduleAccess->Manage_SMS) && in_array('1', $submoduleAccess->Manage_SMS)){?><li><a href="<?= site_url('attendance_students/index') ?>">Student Attendace</a></li> <?php }?>
                                <!-- <?php if(isset($submoduleAccess->Manage_SMS) && in_array('2', $submoduleAccess->Manage_SMS)){?><li><a href="<?= site_url('attendance_leave/index') ?>">Student Leaves</a></li> <?php }?> -->
                                <?php if(isset($submoduleAccess->Manage_SMS) && in_array('2', $submoduleAccess->Manage_SMS)){?><li><a href="<?= site_url('attendance_holidays/index') ?>">Holidays</a></li> <?php }?>
                                <?php if(isset($submoduleAccess->Manage_SMS) && in_array('2', $submoduleAccess->Manage_SMS)){?><li><a href="<?= site_url('attendance_students/attendanceMonthlyReport') ?>">Monthly Report</a></li> <?php }?>
                            </ul>
                        </li>
                        <?php } ?>



                        <?php if (isset($moduleAccess) && in_array('WEBM', $moduleAccess) ) { ?>
                            <li class="navigation__sub">
                                <a href="#"><i class="zmdi zmdi-trending-up"></i> Website Settings</a>

                                <ul>
                                <?php if(isset($submoduleAccess->Gallery) && in_array('1', $submoduleAccess->Gallery)){?><li><a href="<?= site_url('gallery') ?>">Gallery</a></li> <?php } ?>

                                </ul>
                            </li>
                        <?php } ?>


                        <?php if (isset($moduleAccess) && in_array('REPO', $moduleAccess) ) { ?>
                            <li class="navigation__sub">
                                <a href="#"><i class="zmdi zmdi-collection-item"></i>Reports</a>

                                <ul>
                                    <?php if(isset($submoduleAccess->Student_information) && in_array('1', $submoduleAccess->Student_information)){?><li><a href="<?= site_url('report/studentInfoReport') ?>"> Student Information Report</a></li> <?php } ?>
                                    <?php if(isset($submoduleAccess->Old_Student) && in_array('1', $submoduleAccess->Old_Student)){?><li><a href="<?= site_url('report/oldstudentReport') ?>">Old Student Report</a></li><?php } ?>
                                    <?php if(isset($submoduleAccess->Date_Wise_Payment) && in_array('1', $submoduleAccess->Date_Wise_Payment)){?><li><a href="<?= site_url('report/payment') ?>">Date wise Payment </a></li><?php } ?>
                                    <?php if(isset($submoduleAccess->Leaving_Report) && in_array('1', $submoduleAccess->Leaving_Report)){?><li><a href="<?= site_url('report/leavingCertificateReport') ?>">Leaving Certificate</a></li><?php } ?>
                                    <?php if(isset($submoduleAccess->Outstanding_Fee_Report) && in_array('1', $submoduleAccess->Outstanding_Fee_Report)){?><li><a href="<?= site_url('report/outStandingFeesReport') ?>">Outstanding Payment Report</a></li><?php } ?>
                                </ul>
                            </li>
                        <?php } ?>
                        <?php if (isset($moduleAccess) && in_array('SMSM', $moduleAccess) ) { ?>
                        <li class="navigation__sub">
                            <a href="#"><i class="zmdi zmdi-email-open zmdi-hc-fw"></i>Send Sms</a>
                            <ul>
                                <?php if(isset($submoduleAccess->Manage_SMS) && in_array('1', $submoduleAccess->Manage_SMS)){?><li><a href="<?= site_url('sms/index') ?>">Sms List</a></li> <?php }?>
                                <?php if(isset($submoduleAccess->Manage_SMS) && in_array('2', $submoduleAccess->Manage_SMS)){?><li><a href="<?= site_url('sms/sendToOne') ?>">Send One</a></li> <?php }?>
                                <?php if(isset($submoduleAccess->Manage_SMS) && in_array('2', $submoduleAccess->Manage_SMS)){?><li><a href="<?= site_url('sms/sendBulk') ?>">Send Bulk</a></li> <?php }?>
                                <?php if(isset($submoduleAccess->Manage_SMS) && in_array('2', $submoduleAccess->Manage_SMS)){?><li><a href="<?= site_url('sms/sendAll') ?>">Send To All</a></li> <?php }?>
                            </ul>
                        </li>
                        <?php } ?>

                        <?php if (isset($moduleAccess) && in_array('USER', $moduleAccess) ) { ?>
                            <li class="navigation__sub">
                            <a href="#"><i class="zmdi zmdi-account-circle"></i>Users</a>
                            <ul>
                                <?php if(isset($submoduleAccess->Manage_Designation) && in_array('1', $submoduleAccess->Manage_Designation)){?><li><a href="<?= site_url('user/designationSetup') ?>"><i class="zmdi zmdi-accounts-list-alt"></i> Designation</a></li> <?php }?>
                                <?php if(isset($submoduleAccess->Manage_Users) && in_array('1', $submoduleAccess->Manage_Users)){?><li><a href="<?= site_url('user/userSetup') ?>"><i class="zmdi zmdi-account-add"></i> Manage Users</a></li> <?php } ?>
                            </ul>
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
                        labels: [<?php foreach ($class_student as $k => $v) { ?> "<?php echo $v['class_name'] ?>",<?php }?>],
                                datasets: [{
                                label: "Number of Students",
                                backgroundColor: ["red", "blue", "yellow", "green", "pink", "aliceblue", "aqua", "black", "blue", "blueviolet", "brown"],
                                data: [<?php foreach ($class_student as $k => $v) {?>"<?php echo $v['student'] ?>",<?php }?>, ]
                                }]
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
        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
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
   <!--     <script>
            document.getElementById('sms-text').onkeyup = function () {
            document.getElementById('count').innerHTML = "Characters left: " + (160 - this.value.length);
            };
        </script> 
   -->
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
        <script>
        $(document).ready(function() {
            var notificationTitle = document.body.dataset.notificationTitle;
            var notificationMessage = document.body.dataset.notificationMessage;
            var options = { "positionClass": "toast-bottom-left", "closeButton": true, "timeOut": "40000" };

            switch(notificationTitle){

            case 'info':
                toastr.info("Info Message", "Info", options);
            break;

            case 'warning':
                toastr.warning("Warning Message", "Warning", options);
            break;

            case 'success':
                toastr.success(notificationMessage, notificationTitle, options);
            break;

            case 'failed':
                toastr.error(notificationMessage, notificationTitle, options);
            break;

            case 'session_expired':
                toastr.error(notificationMessage, notificationTitle, options);
            break;

            }
        });
        
        </script>
            
    </body>


</html>
