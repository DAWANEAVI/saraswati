<!DOCTYPE html>
<html lang="zxx" class="no-js">

    <head>
        <!-- Mobile Specific Meta -->
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <!-- Favicon -->
        <link rel="shortcut icon" href="<?= site_url('site-assets') ?>/img/fav.png" />
        <!-- Author Meta -->
        <meta name="author" content="colorlib" />
        <!-- Meta Description -->
        <meta name="description" content="" />
        <!-- Meta Keyword -->
        <meta name="keywords" content="" />
        <!-- meta character set -->
        <meta charset="UTF-8" />
        <!-- Site Title -->
        <title>OES MOUDA ||Contacts</title>

        <link href="https://fonts.googleapis.com/css?family=Playfair+Display:900|Roboto:400,400i,500,700" rel="stylesheet" />
        <!--
      CSS
      =============================================
        -->
        <link rel="stylesheet" href="<?= site_url('site-assets') ?>/css/linearicons.css" />
        <link rel="stylesheet" href="<?= site_url('site-assets') ?>/css/font-awesome.min.css" />
        <link rel="stylesheet" href="<?= site_url('site-assets') ?>/css/bootstrap.css" />
        <link rel="stylesheet" href="<?= site_url('site-assets') ?>/css/magnific-popup.css" />
        <link rel="stylesheet" href="<?= site_url('site-assets') ?>/css/owl.carousel.css" />
        <link rel="stylesheet" href="<?= site_url('site-assets') ?>/css/nice-select.css">
        <link rel="stylesheet" href="<?= site_url('site-assets') ?>/css/hexagons.min.css" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/themify-icons/0.1.2/css/themify-icons.css" />
        <link rel="stylesheet" href="<?= site_url('site-assets') ?>/css/main.css" />
    </head>

    <body>
        <!-- ================ Start Header Area ================= -->
        <header class="default-header">
            <nav class="navbar navbar-expand-lg  navbar-light">
                <div class="container">
                    <a class="navbar-brand" href="<?= site_url(); ?>">
                        <img src="<?= site_url('site-assets') ?>/img/logo.png" alt="" />
                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="lnr lnr-menu"></span>
                    </button>

                    <div class="collapse navbar-collapse justify-content-end align-items-center" id="navbarSupportedContent">
                        <ul class="navbar-nav">
                            <li><a href="<?php echo site_url('site') ?>">Home</a></li>
                            <li><a href="<?= site_url('site/about') ?>">About</a></li>
                            <li><a href="<?= site_url('site/gallery') ?>">Gallery</a></li>
                            <li><a href="<?= site_url('site/contacts') ?>">Contacts</a></li>
                        </ul>
                    </div>
                </div>
            </nav>
        </header>
        <!-- ================ End Header Area ================= -->

        <!-- ================ start banner Area ================= -->
        <section class="banner-area">
            <div class="container">
                <div class="row justify-content-center align-items-center">
                    <div class="col-lg-12 banner-right">
                        <h1 class="text-white">
                            Contacts
                        </h1>
                        <p class="mx-auto text-white  mt-20 mb-40">
                            Get Touch in touch with us.
                        </p>
                    </div>
                </div>
            </div>
        </section>
        <!-- ================ End banner Area ================= -->

        <!-- ================ Start contact-page Area  ================= -->
        <section class="contact-page-area section-gap">
            <div class="container">
                <div class="row">

                    <div class="col-lg-4 d-flex flex-column address-wrap">
                        <div class="single-contact-address d-flex flex-row">
                            <div class="icon">
                                <span class="lnr lnr-home"></span>
                            </div>
                            <div class="contact-details">
                                <h5>Sneh Nagar, MOUDA</h5>
                                <p>
                                    Tah. Mouda, Dist. Nagpur
                                </p>
                            </div>
                        </div>
                        <div class="single-contact-address d-flex flex-row">
                            <div class="icon">
                                <span class="lnr lnr-phone-handset"></span>
                            </div>
                            <div class="contact-details">
                                <h5><?=PHONE_NO?></h5>
                            </div>
                        </div>
                        <div class="single-contact-address d-flex flex-row">
                            <div class="icon">
                                <span class="lnr lnr-envelope"></span>
                            </div>
                            <div class="contact-details">
                                <h5><?=EMAIL?></h5>
                                <p>Send us your query anytime!</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <?php
                        if(isset($msg)){
                            ?>
                            <div class="alert alert-info" role="alert">
                            <?=$msg?>
                            </div>
                            <?php
                        }
                        ?>
                        <form class="form-area contact-form text-right" id="myForm" action="<?=base_url()?>site/send_msg" method="post">
                            <div class="row">
                                <div class="col-lg-6 form-group">
                                    <input name="name" placeholder="Enter your name" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter your name'"
                                           class="common-input mb-20 form-control" required="" type="text">

                                    <input name="email" placeholder="Enter email address" pattern="[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{1,63}$"
                                           onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter email address'" class="common-input mb-20 form-control"
                                           required="" type="email">

                                    <input name="subject" placeholder="Enter subject" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter subject'"
                                           class="common-input mb-20 form-control" required="" type="text">
                                </div>
                                <div class="col-lg-6 form-group">
                                    <textarea class="common-textarea form-control" name="message" placeholder="Enter Messege" onfocus="this.placeholder = ''"
                                              onblur="this.placeholder = 'Enter Messege'" required=""></textarea>
                                </div>
                                <div class="col-lg-12">
                                    <div class="alert-msg" style="text-align: left;"></div>
                                    <button class="btn" style="float: right;">Send Message</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
        <!-- ================ End contact-page Area ================= -->

        <!-- ================ start footer Area ================= -->
        <footer class="footer-area section-gap">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 single-footer-widget">
                        <h4>Quick Links</h4>
                        <ul>
                            <li><a href="<?= site_url('site/about') ?>">About</a></li>
                            <li><a href="<?= site_url('site/gallery') ?>">Gallery</a></li>
                            <li><a href="<?= site_url('site/contacts') ?>">Contacts</a></li>
                            <li><a href="<?= site_url() ?>">Home</a></li>
                        </ul>
                    </div>

                    <div class="col-md-4 single-footer-widget">
                        <h4>Newsletter</h4>
                        <p>You can trust us. we only send promo offers,</p>
                        <div class="form-wrap" id="mc_embed_signup">
                            <form target="_blank" action=""
                                  method="get" class="form-inline">
                                <input class="form-control" name="EMAIL" placeholder="Your Email Address" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Your Email Address '"
                                       required="" type="email">
                                <button class="click-btn btn btn-default text-uppercase">subscribe</button>
                               

                                <div class="info"></div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="footer-bottom row align-items-center">
                    <p class="footer-text m-0 col-lg-8 col-md-12 text-center">
                        
                        Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | Developed And Maintain By <a href="https://technopridess.com" target="_blank">Technopride Software</a>
                    </p>
                </div>
            </div>
        </footer>
        <!-- ================ End footer Area ================= -->

        <script src="<?= site_url('site-assets') ?>/js/vendor/jquery-2.2.4.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4"
        crossorigin="anonymous"></script>
        <script src="<?= site_url('site-assets') ?>/js/vendor/bootstrap.min.js"></script>
        <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBhOdIF3Y9382fqJYt5I_sswSrEw5eihAA"></script>
        <script src="<?= site_url('site-assets') ?>/js/jquery.ajaxchimp.min.js"></script>
        <script src="<?= site_url('site-assets') ?>/js/jquery.magnific-popup.min.js"></script>
        <script src="<?= site_url('site-assets') ?>/js/parallax.min.js"></script>
        <script src="<?= site_url('site-assets') ?>/js/owl.carousel.min.js"></script>
        <script src="<?= site_url('site-assets') ?>/js/jquery.sticky.js"></script>
        <script src="<?= site_url('site-assets') ?>/js/hexagons.min.js"></script>
        <script src="<?= site_url('site-assets') ?>/js/jquery.counterup.min.js"></script>
        <script src="<?= site_url('site-assets') ?>/js/waypoints.min.js"></script>
        <script src="<?= site_url('site-assets') ?>/js/jquery.nice-select.min.js"></script>
        <script src="<?= site_url('site-assets') ?>/js/main.js"></script>
    </body>

</html>