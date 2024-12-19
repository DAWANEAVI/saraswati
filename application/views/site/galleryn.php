<main>
            <!-- breadcrumb area start -->
            <section class="breadcrumb-area bg-default" data-background="<?= site_url('assets') ?>/img/breadcrumb/breadcrumb-bg.jpg">
                <img src="<?= site_url('assets') ?>/img/breadcrumb/shape-1.png" alt="" class="breadcrumb-shape">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="breadcrumb-content">
                                <h2 class="breadcrumb-title">Gallery</h2>
                                <div class="breadcrumb-list">
                                    <a href="<?= site_url('site/index') ?>">Home</a>
                                    <span>Gallery</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- breadcrumb area end -->

            <!-- gallery area start -->
            <section class="innerPage_gallery-area pt-110 pb-90">
                <div class="container">
                    <div class="row align-items-end">
                        <div class="col-xl-5 col-lg-6">
                            <div class="section-area-2">
                                <h2 class="section-title mb-50">Browse Our
                                    <br> Exclusive  <span>Gallery <img src="<?= site_url('assets') ?>/img/banner/2/line.png" alt=""></span>
                                </h2>
                            </div>
                        </div>
                        <div class="col-xl-7 col-lg-6">
                            <div class="innerPage_gallery-tab mb-40">
                                <ul class="nav nav-pills" id="pills-tab" role="tablist">
                                    <li class="nav-item" role="presentation">
                                      <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">See All
                                        <span>New</span></button>
                                    </li>
                                    <!-- <li class="nav-item" role="presentation">
                                      <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">Courses</button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                      <button class="nav-link" id="pills-contact-tab" data-bs-toggle="pill" data-bs-target="#pills-contact" type="button" role="tab" aria-controls="pills-contact" aria-selected="false">Events</button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                      <button class="nav-link" id="pills-four-tab" data-bs-toggle="pill" data-bs-target="#pills-four" type="button" role="tab" aria-controls="pills-four" aria-selected="false">Students</button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                      <button class="nav-link" id="pills-five-tab" data-bs-toggle="pill" data-bs-target="#pills-five" type="button" role="tab" aria-controls="pills-five" aria-selected="false">Teachers</button>
                                    </li> -->
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="innerPage_gallery-wrap">
                        <div class="tab-content" id="pills-tabContent">
                            <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab" tabindex="0">
                                <div class="row">
                                    <?php foreach($gallery_data as $k=>$v){ $images = json_decode($v['image']);?>
                                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
                                        <div class="innerPage_gallery-item mb-30">
                                            <div class="innerPage_gallery-img">
                                                <img src="<?= site_url() ?>uploads/gallery/<?=$images[0]?>" alt="">
                                            </div>
                                            <?php foreach($images as $key =>$vv){ ?>
                                            <?php if($key == 0) { ?>
                                                <div class="innerPage_gallery-content">
                                                <a href="<?= site_url() ?>uploads/gallery/<?=$vv?>" title="<?php echo $v['title']?>" class="popup-image"><i class="fa-thin fa-plus"></i></a>
                                                </div>
                                            <?php }else{ ?> 
                                                <a href="<?= site_url() ?>uploads/gallery/<?=$vv?>" title="<?php echo $v['title']?>" class="popup-image"></a>
                                            <?php } ?>
                                            
                                            
                                            <?php } ?>
                                        </div>
                                    </div>
                                    <?php }?>
                                    
                                    <!-- <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
                                        <div class="innerPage_gallery-item mb-30">
                                            <div class="innerPage_gallery-img">
                                                <img src="<?= site_url('assets') ?>/img/gallery/innerPage/2.jpg" alt="">
                                            </div>
                                            <div class="innerPage_gallery-content">
                                                <a href="<?= site_url('assets') ?>/img/gallery/innerPage/2.jpg" class="popup-image"><i class="fa-thin fa-plus"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
                                        <div class="innerPage_gallery-item mb-30">
                                            <div class="innerPage_gallery-img">
                                                <img src="<?= site_url('assets') ?>/img/gallery/innerPage/3.jpg" alt="">
                                            </div>
                                            <div class="innerPage_gallery-content">
                                                <a href="<?= site_url('assets') ?>/img/gallery/innerPage/3.jpg" class="popup-image"><i class="fa-thin fa-plus"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
                                        <div class="innerPage_gallery-item mb-30">
                                            <div class="innerPage_gallery-img">
                                                <img src="<?= site_url('assets') ?>/img/gallery/innerPage/4.jpg" alt="">
                                            </div>
                                            <div class="innerPage_gallery-content">
                                                <a href="<?= site_url('assets') ?>/img/gallery/innerPage/4.jpg" class="popup-image"><i class="fa-thin fa-plus"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
                                        <div class="innerPage_gallery-item mb-30">
                                            <div class="innerPage_gallery-img">
                                                <img src="<?= site_url('assets') ?>/img/gallery/innerPage/5.jpg" alt="">
                                            </div>
                                            <div class="innerPage_gallery-content">
                                                <a href="<?= site_url('assets') ?>/img/gallery/innerPage/5.jpg" class="popup-image"><i class="fa-thin fa-plus"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
                                        <div class="innerPage_gallery-item mb-30">
                                            <div class="innerPage_gallery-img">
                                                <img src="<?= site_url('assets') ?>/img/gallery/innerPage/6.jpg" alt="">
                                            </div>
                                            <div class="innerPage_gallery-content">
                                                <a href="<?= site_url('assets') ?>/img/gallery/innerPage/6.jpg" class="popup-image"><i class="fa-thin fa-plus"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
                                        <div class="innerPage_gallery-item mb-30">
                                            <div class="innerPage_gallery-img">
                                                <img src="<?= site_url('assets') ?>/img/gallery/innerPage/7.jpg" alt="">
                                            </div>
                                            <div class="innerPage_gallery-content">
                                                <a href="<?= site_url('assets') ?>/img/gallery/innerPage/7.jpg" class="popup-image"><i class="fa-thin fa-plus"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
                                        <div class="innerPage_gallery-item mb-30">
                                            <div class="innerPage_gallery-img">
                                                <img src="<?= site_url('assets') ?>/img/gallery/innerPage/8.jpg" alt="">
                                            </div>
                                            <div class="innerPage_gallery-content">
                                                <a href="<?= site_url('assets') ?>/img/gallery/innerPage/8.jpg" class="popup-image"><i class="fa-thin fa-plus"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
                                        <div class="innerPage_gallery-item mb-30">
                                            <div class="innerPage_gallery-img">
                                                <img src="<?= site_url('assets') ?>/img/gallery/innerPage/9.jpg" alt="">
                                            </div>
                                            <div class="innerPage_gallery-content">
                                                <a href="<?= site_url('assets') ?>/img/gallery/innerPage/9.jpg" class="popup-image"><i class="fa-thin fa-plus"></i></a>
                                            </div>
                                        </div>
                                    </div> -->
                                </div>
                            </div>
                            <!-- <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab" tabindex="0">
                                <div class="row">
                                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
                                        <div class="innerPage_gallery-item mb-30">
                                            <div class="innerPage_gallery-img">
                                                <img src="<?= site_url('assets') ?>/img/gallery/innerPage/1.jpg" alt="">
                                            </div>
                                            <div class="innerPage_gallery-content">
                                                <a href="<?= site_url('assets') ?>/img/gallery/innerPage/1.jpg" class="popup-image"><i class="fa-thin fa-plus"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
                                        <div class="innerPage_gallery-item mb-30">
                                            <div class="innerPage_gallery-img">
                                                <img src="<?= site_url('assets') ?>/img/gallery/innerPage/2.jpg" alt="">
                                            </div>
                                            <div class="innerPage_gallery-content">
                                                <a href="<?= site_url('assets') ?>/img/gallery/innerPage/2.jpg" class="popup-image"><i class="fa-thin fa-plus"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
                                        <div class="innerPage_gallery-item mb-30">
                                            <div class="innerPage_gallery-img">
                                                <img src="<?= site_url('assets') ?>/img/gallery/innerPage/3.jpg" alt="">
                                            </div>
                                            <div class="innerPage_gallery-content">
                                                <a href="<?= site_url('assets') ?>/img/gallery/innerPage/3.jpg" class="popup-image"><i class="fa-thin fa-plus"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
                                        <div class="innerPage_gallery-item mb-30">
                                            <div class="innerPage_gallery-img">
                                                <img src="<?= site_url('assets') ?>/img/gallery/innerPage/4.jpg" alt="">
                                            </div>
                                            <div class="innerPage_gallery-content">
                                                <a href="<?= site_url('assets') ?>/img/gallery/innerPage/4.jpg" class="popup-image"><i class="fa-thin fa-plus"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
                                        <div class="innerPage_gallery-item mb-30">
                                            <div class="innerPage_gallery-img">
                                                <img src="<?= site_url('assets') ?>/img/gallery/innerPage/5.jpg" alt="">
                                            </div>
                                            <div class="innerPage_gallery-content">
                                                <a href="<?= site_url('assets') ?>/img/gallery/innerPage/5.jpg" class="popup-image"><i class="fa-thin fa-plus"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
                                        <div class="innerPage_gallery-item mb-30">
                                            <div class="innerPage_gallery-img">
                                                <img src="<?= site_url('assets') ?>/img/gallery/innerPage/6.jpg" alt="">
                                            </div>
                                            <div class="innerPage_gallery-content">
                                                <a href="<?= site_url('assets') ?>/img/gallery/innerPage/6.jpg" class="popup-image"><i class="fa-thin fa-plus"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
                                        <div class="innerPage_gallery-item mb-30">
                                            <div class="innerPage_gallery-img">
                                                <img src="<?= site_url('assets') ?>/img/gallery/innerPage/7.jpg" alt="">
                                            </div>
                                            <div class="innerPage_gallery-content">
                                                <a href="<?= site_url('assets') ?>/img/gallery/innerPage/7.jpg" class="popup-image"><i class="fa-thin fa-plus"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
                                        <div class="innerPage_gallery-item mb-30">
                                            <div class="innerPage_gallery-img">
                                                <img src="<?= site_url('assets') ?>/img/gallery/innerPage/8.jpg" alt="">
                                            </div>
                                            <div class="innerPage_gallery-content">
                                                <a href="<?= site_url('assets') ?>/img/gallery/innerPage/8.jpg" class="popup-image"><i class="fa-thin fa-plus"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
                                        <div class="innerPage_gallery-item mb-30">
                                            <div class="innerPage_gallery-img">
                                                <img src="<?= site_url('assets') ?>/img/gallery/innerPage/9.jpg" alt="">
                                            </div>
                                            <div class="innerPage_gallery-content">
                                                <a href="<?= site_url('assets') ?>/img/gallery/innerPage/9.jpg" class="popup-image"><i class="fa-thin fa-plus"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab" tabindex="0">
                                <div class="row">
                                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
                                        <div class="innerPage_gallery-item mb-30">
                                            <div class="innerPage_gallery-img">
                                                <img src="<?= site_url('assets') ?>/img/gallery/innerPage/1.jpg" alt="">
                                            </div>
                                            <div class="innerPage_gallery-content">
                                                <a href="<?= site_url('assets') ?>/img/gallery/innerPage/1.jpg" class="popup-image"><i class="fa-thin fa-plus"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
                                        <div class="innerPage_gallery-item mb-30">
                                            <div class="innerPage_gallery-img">
                                                <img src="<?= site_url('assets') ?>/img/gallery/innerPage/2.jpg" alt="">
                                            </div>
                                            <div class="innerPage_gallery-content">
                                                <a href="<?= site_url('assets') ?>/img/gallery/innerPage/2.jpg" class="popup-image"><i class="fa-thin fa-plus"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
                                        <div class="innerPage_gallery-item mb-30">
                                            <div class="innerPage_gallery-img">
                                                <img src="<?= site_url('assets') ?>/img/gallery/innerPage/3.jpg" alt="">
                                            </div>
                                            <div class="innerPage_gallery-content">
                                                <a href="<?= site_url('assets') ?>/img/gallery/innerPage/3.jpg" class="popup-image"><i class="fa-thin fa-plus"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
                                        <div class="innerPage_gallery-item mb-30">
                                            <div class="innerPage_gallery-img">
                                                <img src="<?= site_url('assets') ?>/img/gallery/innerPage/4.jpg" alt="">
                                            </div>
                                            <div class="innerPage_gallery-content">
                                                <a href="<?= site_url('assets') ?>/img/gallery/innerPage/4.jpg" class="popup-image"><i class="fa-thin fa-plus"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
                                        <div class="innerPage_gallery-item mb-30">
                                            <div class="innerPage_gallery-img">
                                                <img src="<?= site_url('assets') ?>/img/gallery/innerPage/5.jpg" alt="">
                                            </div>
                                            <div class="innerPage_gallery-content">
                                                <a href="<?= site_url('assets') ?>/img/gallery/innerPage/5.jpg" class="popup-image"><i class="fa-thin fa-plus"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
                                        <div class="innerPage_gallery-item mb-30">
                                            <div class="innerPage_gallery-img">
                                                <img src="<?= site_url('assets') ?>/img/gallery/innerPage/6.jpg" alt="">
                                            </div>
                                            <div class="innerPage_gallery-content">
                                                <a href="<?= site_url('assets') ?>/img/gallery/innerPage/6.jpg" class="popup-image"><i class="fa-thin fa-plus"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
                                        <div class="innerPage_gallery-item mb-30">
                                            <div class="innerPage_gallery-img">
                                                <img src="<?= site_url('assets') ?>/img/gallery/innerPage/7.jpg" alt="">
                                            </div>
                                            <div class="innerPage_gallery-content">
                                                <a href="<?= site_url('assets') ?>/img/gallery/innerPage/7.jpg" class="popup-image"><i class="fa-thin fa-plus"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
                                        <div class="innerPage_gallery-item mb-30">
                                            <div class="innerPage_gallery-img">
                                                <img src="<?= site_url('assets') ?>/img/gallery/innerPage/8.jpg" alt="">
                                            </div>
                                            <div class="innerPage_gallery-content">
                                                <a href="<?= site_url('assets') ?>/img/gallery/innerPage/8.jpg" class="popup-image"><i class="fa-thin fa-plus"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
                                        <div class="innerPage_gallery-item mb-30">
                                            <div class="innerPage_gallery-img">
                                                <img src="<?= site_url('assets') ?>/img/gallery/innerPage/9.jpg" alt="">
                                            </div>
                                            <div class="innerPage_gallery-content">
                                                <a href="<?= site_url('assets') ?>/img/gallery/innerPage/9.jpg" class="popup-image"><i class="fa-thin fa-plus"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="pills-four" role="tabpanel" aria-labelledby="pills-four-tab" tabindex="0">
                                <div class="row">
                                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
                                        <div class="innerPage_gallery-item mb-30">
                                            <div class="innerPage_gallery-img">
                                                <img src="<?= site_url('assets') ?>/img/gallery/innerPage/1.jpg" alt="">
                                            </div>
                                            <div class="innerPage_gallery-content">
                                                <a href="<?= site_url('assets') ?>/img/gallery/innerPage/1.jpg" class="popup-image"><i class="fa-thin fa-plus"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
                                        <div class="innerPage_gallery-item mb-30">
                                            <div class="innerPage_gallery-img">
                                                <img src="<?= site_url('assets') ?>/img/gallery/innerPage/2.jpg" alt="">
                                            </div>
                                            <div class="innerPage_gallery-content">
                                                <a href="<?= site_url('assets') ?>/img/gallery/innerPage/2.jpg" class="popup-image"><i class="fa-thin fa-plus"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
                                        <div class="innerPage_gallery-item mb-30">
                                            <div class="innerPage_gallery-img">
                                                <img src="<?= site_url('assets') ?>/img/gallery/innerPage/3.jpg" alt="">
                                            </div>
                                            <div class="innerPage_gallery-content">
                                                <a href="<?= site_url('assets') ?>/img/gallery/innerPage/3.jpg" class="popup-image"><i class="fa-thin fa-plus"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
                                        <div class="innerPage_gallery-item mb-30">
                                            <div class="innerPage_gallery-img">
                                                <img src="<?= site_url('assets') ?>/img/gallery/innerPage/4.jpg" alt="">
                                            </div>
                                            <div class="innerPage_gallery-content">
                                                <a href="<?= site_url('assets') ?>/img/gallery/innerPage/4.jpg" class="popup-image"><i class="fa-thin fa-plus"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
                                        <div class="innerPage_gallery-item mb-30">
                                            <div class="innerPage_gallery-img">
                                                <img src="<?= site_url('assets') ?>/img/gallery/innerPage/5.jpg" alt="">
                                            </div>
                                            <div class="innerPage_gallery-content">
                                                <a href="<?= site_url('assets') ?>/img/gallery/innerPage/5.jpg" class="popup-image"><i class="fa-thin fa-plus"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
                                        <div class="innerPage_gallery-item mb-30">
                                            <div class="innerPage_gallery-img">
                                                <img src="<?= site_url('assets') ?>/img/gallery/innerPage/6.jpg" alt="">
                                            </div>
                                            <div class="innerPage_gallery-content">
                                                <a href="<?= site_url('assets') ?>/img/gallery/innerPage/6.jpg" class="popup-image"><i class="fa-thin fa-plus"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
                                        <div class="innerPage_gallery-item mb-30">
                                            <div class="innerPage_gallery-img">
                                                <img src="<?= site_url('assets') ?>/img/gallery/innerPage/7.jpg" alt="">
                                            </div>
                                            <div class="innerPage_gallery-content">
                                                <a href="<?= site_url('assets') ?>/img/gallery/innerPage/7.jpg" class="popup-image"><i class="fa-thin fa-plus"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
                                        <div class="innerPage_gallery-item mb-30">
                                            <div class="innerPage_gallery-img">
                                                <img src="<?= site_url('assets') ?>/img/gallery/innerPage/8.jpg" alt="">
                                            </div>
                                            <div class="innerPage_gallery-content">
                                                <a href="<?= site_url('assets') ?>/img/gallery/innerPage/8.jpg" class="popup-image"><i class="fa-thin fa-plus"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
                                        <div class="innerPage_gallery-item mb-30">
                                            <div class="innerPage_gallery-img">
                                                <img src="<?= site_url('assets') ?>/img/gallery/innerPage/9.jpg" alt="">
                                            </div>
                                            <div class="innerPage_gallery-content">
                                                <a href="<?= site_url('assets') ?>/img/gallery/innerPage/9.jpg" class="popup-image"><i class="fa-thin fa-plus"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="pills-five" role="tabpanel" aria-labelledby="pills-five-tab" tabindex="0">
                                <div class="row">
                                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
                                        <div class="innerPage_gallery-item mb-30">
                                            <div class="innerPage_gallery-img">
                                                <img src="<?= site_url('assets') ?>/img/gallery/innerPage/1.jpg" alt="">
                                            </div>
                                            <div class="innerPage_gallery-content">
                                                <a href="<?= site_url('assets') ?>/img/gallery/innerPage/1.jpg" class="popup-image"><i class="fa-thin fa-plus"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
                                        <div class="innerPage_gallery-item mb-30">
                                            <div class="innerPage_gallery-img">
                                                <img src="<?= site_url('assets') ?>/img/gallery/innerPage/2.jpg" alt="">
                                            </div>
                                            <div class="innerPage_gallery-content">
                                                <a href="<?= site_url('assets') ?>/img/gallery/innerPage/2.jpg" class="popup-image"><i class="fa-thin fa-plus"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
                                        <div class="innerPage_gallery-item mb-30">
                                            <div class="innerPage_gallery-img">
                                                <img src="<?= site_url('assets') ?>/img/gallery/innerPage/3.jpg" alt="">
                                            </div>
                                            <div class="innerPage_gallery-content">
                                                <a href="<?= site_url('assets') ?>/img/gallery/innerPage/3.jpg" class="popup-image"><i class="fa-thin fa-plus"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
                                        <div class="innerPage_gallery-item mb-30">
                                            <div class="innerPage_gallery-img">
                                                <img src="<?= site_url('assets') ?>/img/gallery/innerPage/4.jpg" alt="">
                                            </div>
                                            <div class="innerPage_gallery-content">
                                                <a href="<?= site_url('assets') ?>/img/gallery/innerPage/4.jpg" class="popup-image"><i class="fa-thin fa-plus"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
                                        <div class="innerPage_gallery-item mb-30">
                                            <div class="innerPage_gallery-img">
                                                <img src="<?= site_url('assets') ?>/img/gallery/innerPage/5.jpg" alt="">
                                            </div>
                                            <div class="innerPage_gallery-content">
                                                <a href="<?= site_url('assets') ?>/img/gallery/innerPage/5.jpg" class="popup-image"><i class="fa-thin fa-plus"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
                                        <div class="innerPage_gallery-item mb-30">
                                            <div class="innerPage_gallery-img">
                                                <img src="<?= site_url('assets') ?>/img/gallery/innerPage/6.jpg" alt="">
                                            </div>
                                            <div class="innerPage_gallery-content">
                                                <a href="<?= site_url('assets') ?>/img/gallery/innerPage/6.jpg" class="popup-image"><i class="fa-thin fa-plus"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
                                        <div class="innerPage_gallery-item mb-30">
                                            <div class="innerPage_gallery-img">
                                                <img src="<?= site_url('assets') ?>/img/gallery/innerPage/7.jpg" alt="">
                                            </div>
                                            <div class="innerPage_gallery-content">
                                                <a href="<?= site_url('assets') ?>/img/gallery/innerPage/7.jpg" class="popup-image"><i class="fa-thin fa-plus"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
                                        <div class="innerPage_gallery-item mb-30">
                                            <div class="innerPage_gallery-img">
                                                <img src="<?= site_url('assets') ?>/img/gallery/innerPage/8.jpg" alt="">
                                            </div>
                                            <div class="innerPage_gallery-content">
                                                <a href="<?= site_url('assets') ?>/img/gallery/innerPage/8.jpg" class="popup-image"><i class="fa-thin fa-plus"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
                                        <div class="innerPage_gallery-item mb-30">
                                            <div class="innerPage_gallery-img">
                                                <img src="<?= site_url('assets') ?>/img/gallery/innerPage/9.jpg" alt="">
                                            </div>
                                            <div class="innerPage_gallery-content">
                                                <a href="<?= site_url('assets') ?>/img/gallery/innerPage/9.jpg" class="popup-image"><i class="fa-thin fa-plus"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> -->
                        </div>
                    </div>
                </div>
            </section>
            <!-- gallery area end -->

            <!-- cta area start -->
            <div class="cta-area h4_cta-area">
                <div class="container">
                    <div class="cta-wrapper">
                        <div class="row align-items-center">
                            <div class="col-xl-6 col-lg-6">
                                <div class="cta-content mb-30 mb-lg-0">
                                    <h2 class="cta-title">Want to Know More About Our School, Please Contact Us.</h2>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6">
                                <div class="cta-button">
                                    <a href="<?= base_url().'/site/contacts '?>" class="cta-btn"></i>Enquiry Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- cta area end -->
        </main>