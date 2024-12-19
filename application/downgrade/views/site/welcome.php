
<!DOCTYPE html>
<html lang="zxx" class="no-js">

    <head>
        <!-- Mobile Specific Meta -->
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <!-- Favicon -->
        <link rel="shortcut icon" href="<?= site_url('site-assets') ?>/img/fav.png" />
        <!-- Author Meta -->
        <meta name="author" content="Technopride Software" />
        <!-- Meta Description -->
        <meta name="description" content="Oxford English School Mouda Primary Secondary School in Mouda Best English Medium Education In Mouda" />
        <!-- Meta Keyword -->
        <meta name="keywords" content="Oxford English School Mouda English Medium Education In Mouda" />
        <!-- meta character set -->
        <meta charset="UTF-8" />
        <!-- Site Title -->
        <title>OES Mouda || HOME</title>

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
                    <a class="navbar-brand" href="<?= site_url() ?>">
                        <img src="<?= site_url() ?>site-assets/img/logo.png" alt="" />
                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="lnr lnr-menu"></span>
                    </button>

                    <div class="collapse navbar-collapse justify-content-end align-items-center" id="navbarSupportedContent">
                        <ul class="navbar-nav">
                            <li><a href="<?php echo site_url() ?>">Home</a></li>
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
        <section class="home-banner-area">
            <div class="container">
                <div class="row justify-content-center fullscreen align-items-center">
                    <div class="col-lg-5 col-md-8 home-banner-left">
                        <h1 class="text-white">
                            Oxford <br />
                            English School
                        </h1>
                        <p class="mx-auto text-white  mt-20 mb-40">
                            We help students to grow morally, intellectually, physically and socially.
                        </p>
                    </div>
                    <div class="offset-lg-2 col-lg-5 col-md-12 home-banner-right">
                        <img class="img-fluid" src="<?= site_url('site-assets') ?>/img/0033.png" alt="" />
                        <h3 class="text-center text-white">Our Inspiration</h3>
                    </div>
                </div>
            </div>
        </section>
        <!-- ================ End banner Area ================= -->

        <!-- ================ Start Feature Area ================= -->
        <section class="feature-area">
            <div class="container-fluid">
                <div class="feature-inner row">
                    <div class="col-lg-2 col-md-6">
                        <div class="feature-item d-flex">
                            <i class="ti-book"></i>
                            <div class="ml-20">
                                <h4>Primary, Middle and High School</h4>
                                <p>
                                    Activity based education with the help of modern teaching aids.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-6">
                        <div class="feature-item d-flex">
                            <i class="ti-cup"></i>
                            <div class="ml-20">
                                <h4>Extra Curricular activities</h4>
                                <p>
                                    The school helps to develop hobbies like music,dance, drama etc.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-6">
                        <div class="feature-item d-flex border-right-0">
                            <i class="ti-desktop"></i>
                            <div class="ml-20">
                                <h4>Computer Education</h4>
                                <p>
                                    Comprehensive knowledge through best computer labs.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- ================ End Feature Area ================= -->

        <!-- ================ Start Popular Course Area ================= -->
        <section class="popular-course-area">
            <div class="container-fluid">
                <div class="row justify-content-center section-title">
                    <div class="col-lg-12">
                        <h2>
                            Our Toppers
                        </h2>
                        <p>
                            Oxford School heartily congratulates all the following students for getting grand success in exam. All the staff wishes the students for their bright future.
                        </p>
                    </div>
                </div>
                <div class="owl-carousel popuar-course-carusel">
                    <?php
                    foreach ($topper as $t) {
                        ?>
                        <div class="single-popular-course">
                            <div class="thumb">
                                <img style="width:50%;" class="f-img img-fluid mx-auto" src="<?= site_url() ?>uploads/topper/<?= $t['image'] ?>" alt="" />
                            </div>
                            <div class="details text-center">
                                <a href="#">
                                    <h4><?= $t['name'] ?></h4>
                                    <p><?= $t['year'] ?></p>
                                    <p><?= $t['class'] ?></p>
                                </a>
                            </div>
                        </div>
                        <?php
                    }
                    ?>


                </div>
            </div>
        </section>
        <!-- ================ End Popular Course Area ================= -->

        <!-- ================ Start Video Area ================= -->
        <section class="video-area">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-5">
                        <div class="section-title text-white">
                            <h2 class="text-white">
                                We try to maintain good
                                bounding amongst the pupils
                            </h2>
                            <p>
                                Oxford English School Mauda provides excellent facilities along with quality education, with innovative indoor
                                games that makes an impact on the mental potential of every child.
                            </p>
                        </div>
                    </div>
                    <div class="offset-lg-1 col-md-6 video-left">
                        <div class="owl-carousel video-carousel">
                            <?php
                           
                                foreach ($gallery as $g) {
                                    $images = json_decode($g['image']);
                                    if($g['show_image']){
                                    ?>
                                    <div class="single-video">
                                        <div class="video-part">
                                            <img class="img-fluid" src="<?= site_url() ?>uploads/gallery/<?= $images[0] ?>" alt="">
                                            <div class="overlay"></div>

                                        </div>
                                        <h4 class="text-white mb-20 mt-30"><?= $g['title'] ?></h4>
                                        <p class="text-white mb-20">
                                            <?= $g['description'] ?>
                                        </p>
                                    </div>
                                    <?php
                                }
                                }
                            
                            ?>


                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- ================ End Video Area ================= -->

        <!-- ================ Start Feature Area ================= -->
        <section class="other-feature-area">
            <div class="container">
                <div class="feature-inner row">
                    <div class="col-lg-12">
                        <div class="section-title text-left">
                            <h2 style="text-align: center">
                                Our Staff <br />
                            </h2>
                            <p>

                            </p>
                        </div>
                    </div>
                     <div class="col-lg-12">
                    <h4 style="text-align: center;">Secondary Teachers</h4>
                    <br />
                     </div>
                    <?php
                    foreach ($secondary as $t) {
                        ?>
                        <div class="col-lg-3 col-md-3 text-center">
                            <div class="other-feature-item">
                                <img style="width:100%;" src="<?= site_url() ?>uploads/teachers/<?= $t['image'] ?>">
                                <h4><?= $t['fname'] . ' ' . $t['lname'] ?></h4>
                                <h4><?=$t['designation']?></h4>
                                <div>
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                    ?>
                     <div class="col-lg-12">
                    <h4 style="text-align: center;">Primary Teachers</h4>
                     <br />
                     </div>
                    <?php
                    foreach ($primary_techer as $t) {
                        ?>
                        <div class="col-lg-3 col-md-3 text-center">
                            <div class="other-feature-item">
                                <img style="width:100%;" src="<?= site_url() ?>uploads/teachers/<?= $t['image'] ?>">
                                <h4><?= $t['fname'] . ' ' . $t['lname'] ?></h4>
                                <h4><?=$t['designation']?></h4>
                                <div>
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                    ?>
                      <div class="col-lg-12">
                    <h4 style="text-align: center;">Pre Primary Teachers</h4>
                     <br />
                     </div>
                    <?php
                    foreach ($preprimary as $t) {
                        ?>
                        <div class="col-lg-3 col-md-3 text-center">
                            <div class="other-feature-item">
                                <img style="width:100%;" src="<?= site_url() ?>uploads/teachers/<?= $t['image'] ?>">
                                <h4><?= $t['fname'] . ' ' . $t['lname'] ?></h4>
                                <h4><?=$t['designation']?></h4>
                                <div>
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                    ?>
                      <div class="col-lg-12">
                    <h4 style="text-align: center;">Account Staff</h4>
                     <br />
                     </div>
                    <?php
                    foreach ($account as $t) {
                        ?>
                        <div class="col-lg-3 col-md-3 text-center">
                            <div class="other-feature-item">
                                <img style="width:100%;" src="<?= site_url() ?>uploads/teachers/<?= $t['image'] ?>">
                                <h4><?= $t['fname'] . ' ' . $t['lname'] ?></h4>
                                <h4><?=$t['designation']?></h4>
                                <div>
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                    ?>
                      <div class="col-lg-12">
                    <h4 style="text-align: center;">Computer Department</h4>
                     <br />
                     </div>
                    <?php
                    foreach ($helper as $t) {
                        ?>
                        <div class="col-lg-3 col-md-3 text-center">
                            <div class="other-feature-item">
                                <img style="width:100%;" src="<?= site_url() ?>uploads/teachers/<?= $t['image'] ?>">
                                <h4><?= $t['fname'] . ' ' . $t['lname'] ?></h4>
                                <h4><?=$t['designation']?></h4>
                                <div>
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                    ?>
                      <div class="col-lg-12">
                    <h4 style="text-align: center;">Sports Department</h4>
                     <br />
                     </div>
                    <?php
                    foreach ($security as $t) {
                        ?>
                        <div class="col-lg-3 col-md-3 text-center">
                            <div class="other-feature-item">
                                <img style="width:100%;" src="<?= site_url() ?>uploads/teachers/<?= $t['image'] ?>">
                                <h4><?= $t['fname'] . ' ' . $t['lname'] ?></h4>
                                <h4><?=$t['designation']?></h4>
                                <div>
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                    ?>

                </div>
            </div>
        </section>
        <!-- ================ End Feature Area ================= -->






        <!-- ================ start footer Area ================= -->
        <footer class="footer-area">
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
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | Developed And Maintain By <a href="https://technopridess.com" target="_blank">Technopride Software</a>
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
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