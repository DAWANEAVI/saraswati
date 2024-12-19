<!DOCTYPE html>
<html lang="en">
    
<!-- Mirrored from byrushan.com/projects/material-admin/app/2.6/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 23 Jul 2019 07:02:29 GMT -->
<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Vendor styles -->
        <link rel="stylesheet" href="<?=base_url()?>resources/vendors/material-design-iconic-font/css/material-design-iconic-font.min.css">
        <link rel="stylesheet" href="<?=base_url()?>resources/vendors/animate.css/animate.min.css">

        <!-- App styles -->
        <link rel="stylesheet" href="<?=base_url()?>resources/css/app.min.css">
    </head>

    <body data-ma-theme="blue">
        <div class="login">
            

            <!-- Login -->
            <div class="login__block active" id="l-login">
                <div class="login__block__header">
                    <i class="zmdi zmdi-account-circle"></i>
                    Hi there! Please Sign in

                   
                </div>
                <br />
                <?php
                if($this->session->flashdata('msg')!=''){
                ?>
                <div class="alert alert-<?=$this->session->flashdata('msg_type')?>" role="alert">
                                <?=$this->session->flashdata('msg')?>
                            </div>
                <?php
                }
                ?>
               
                <form method="post" action="<?php echo base_url('user/login') ?>" id="loginForm">
                     
                <div class="login__block__body">
                    <div class="form-group form-group--float form-group--centered">
                        <input type="text" class="form-control" id="username" name="username">
                        <label>Username</label>
                        <i class="form-group__bar"></i>
                        <span class="text-danger"><?php echo form_error('username');?></span>
                    </div>

                    <div class="form-group form-group--float form-group--centered">
                        <input type="password" class="form-control" id="password" name="password">
                        <label>Password</label>
                        
                        <i class="form-group__bar"></i>
                        <span class="text-danger"><?php echo form_error('password');?></span>
                    </div>

                    <button type="submit" class="login-button btn btn--icon login__block__btn"><i class="zmdi zmdi-long-arrow-right"></i></button>
                </div>
                </form>
            </div>

           
        </div>

       
        <script src="<?=base_url()?>resources/vendors/jquery/jquery.min.js"></script>
        <script src="<?=base_url()?>resources/vendors/popper.js/popper.min.js"></script>
        <script src="<?=base_url()?>resources/vendors/bootstrap/js/bootstrap.min.js"></script>

        <!-- App functions and actions -->
        <script src="<?=base_url()?>resources/js/app.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url('custom/js/login.js') ?>"></script>
    </body>

</html>