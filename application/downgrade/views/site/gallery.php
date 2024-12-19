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
        <meta name="description" content="extra curriculam activities at oxford english school mouda many photo" />
        <!-- Meta Keyword -->
        <meta name="keywords" content="photos images oxford english school mouda" />
        <!-- meta character set -->
        <meta charset="UTF-8" />
        <!-- Site Title -->
        <title>OEX MOUDA || Gallery</title>
        <style>
            .row {
                margin: 15px;
            }
        </style>

        <link href="https://fonts.googleapis.com/css?family=Playfair+Display:900|Roboto:400,400i,500,700" rel="stylesheet" />
        <!--
      CSS
      =============================================
        -->
        <link rel="stylesheet" href="<?= site_url('site-assets') ?>/css/linearicons.css" />
        <link rel="stylesheet" href="<?= site_url('site-assets') ?>/css/font-awesome.min.css" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css" />
        <link rel="stylesheet" href="<?= site_url('site-assets') ?>/css/magnific-popup.css" />
        <link rel="stylesheet" href="<?= site_url('site-assets') ?>/css/owl.carousel.css" />
        <link rel="stylesheet" href="<?= site_url('site-assets') ?>/css/nice-select.css">
        <link rel="stylesheet" href="<?= site_url('site-assets') ?>/css/hexagons.min.css" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.css" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/themify-icons/0.1.2/css/themify-icons.css" />
        <link rel="stylesheet" href="<?= site_url('site-assets') ?>/css/main.css" />
        
        	<link href="http://netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="http://netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
<script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.2.5/jquery.fancybox.min.css"/>
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
<style>
    *{
	padding:0;
	margin:0;
}

/*	general	*/

section{
    padding: 50px 0;
}

/*	gallery */

.gallery-title{
    font-size: 36px;
    color: #3F6184;
    text-align: center;
    font-weight: 500;
    margin-bottom: 70px;
}
.filter-button{
    font-size: 18px;
    border: 2px solid #3F6184;
	padding:5px 10px;
    text-align: center;
    color: #3F6184;
    margin-bottom: 30px;
	background:transparent;
}
.filter-button:hover,
.filter-button:focus,
.filter-button.active{
    color: #ffffff;
    background-color:#3F6184;
	outline:none;
}
.gallery_product{
    margin: 0px;
	padding:0;
	position:relative;
}
.gallery_product .img-info{
	position: absolute;
    background: rgba(0,0,0,0.5);
    left: 0;
    right: 0;
    bottom: 0;
    padding: 20px;
	overflow:hidden;
	color:#fff;
	top:0;
	display:none;
	   -webkit-transition: 2s;
    transition: 2s;
}

.gallery_product:hover .img-info{
	display:block;
   -webkit-transition: 2s;
    transition: 2s;
}
</style>
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
                            Gallery
                        </h1>
                        <p class="mx-auto text-white  mt-20 mb-40">
                            Watch out more at Oxford English School Mouda.
                        </p>
                    </div>
                </div>
            </div>
        </section>
        <!-- ================ End banner Area ================= -->

        <!-- Start top-category-widget Area -->
        
        
        <section class="portfolio" id="portfolio">
	<div class="container-fluid">
		<div class="row">

		
				
		
    	<div class="gallery col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<div align="center" class="text-center">
				<button class="filter-button" data-filter="all">All</button>
				<?php
				
				foreach($gallery_data as $k=>$v){
				    $images = json_decode($v['image']);
				   
				   ?>
				   	<button class="filter-button" data-filter="<?=$v['id']?>"><?=$v['title']?></button>
				   <?php
				   
				}
				?>
			
				
			</div>
				</div>
			
			<br/>
            	<?php
				
				foreach($gallery_data as $k=>$v){
				    $images = json_decode($v['image']);
				   
				   
				   foreach($images as $vv){
				   ?>
            <div class="gallery_product col-sm-3 col-xs-6 filter <?=$v['id']?>">
                <a class="fancybox" rel="ligthbox" href="http://oesmouda.com/uploads/gallery/<?=$vv?>">
                    <img class="img-responsive" alt="" src="http://oesmouda.com/uploads/gallery/<?=$vv?>" />
                    <div class='img-info'>
                        
                    </div>
                </a>
            </div>

           
                <?php
				   }
				    
				}
                ?>
          

		</div>
	</div>
</section>
        <!-- End top-category-widget Area -->

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
                        <p>You can trust us.</p>
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

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.min.js"></script>
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
        <script src="https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.2.5/jquery.fancybox.min.js"></script>
        <script>
                            $(document).on("click", '[data-toggle="lightbox"]', function (event) {
                                event.preventDefault();
                                $(this).ekkoLightbox();
                            });
        </script>
        <script>
            $(document).ready(function(){

    $(".filter-button").click(function(){
        var value = $(this).attr('data-filter');
        
        if(value == "all")
        {
            $('.filter').show('1000');
        }
        else
        {
            $(".filter").not('.'+value).hide('3000');
            $('.filter').filter('.'+value).show('3000');
            
        }

	        	if ($(".filter-button").removeClass("active")) {
			$(this).removeClass("active");
		    }
		    	$(this).addClass("active");
	    	});
});
/*	end gallery */

$(document).ready(function(){
    $(".fancybox").fancybox({
        openEffect: "none",
        closeEffect: "none"
    });
});
   
        </script>
    </body>

</html>