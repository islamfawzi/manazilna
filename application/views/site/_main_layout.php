<!DOCTYPE HTML>
<html lang="en">
    <head>
        <title> <?= $title != null ? $title : "Manazina For Real State Marketing & investment" ?> </title>

        <meta name="title" content="<?= $meta_title ?>" />
        <meta name="keywords" content="<?= $meta_keys ?>" />
        <meta name="description" content="<?= $meta_desc ?>"/>

        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
        <meta name="viewport" content="width=device-width, initial-scale=1"/>
        <meta name="author" content="manzilna.net" />

        <link rel="shortcut icon" href="<?= assets('images/new-icon.png') ?>"/>
        <!--fonts -->
        <link href="<?= assets('vendor/font-awesome/css/font-awesome.min.css') ?>" rel="stylesheet"/>
        <link rel="stylesheet" href="<?= assets('css/fontsweb.css') ?>"/>
        <link href="https://fonts.googleapis.com/css?family=Sansita" rel="stylesheet">

        <!--fonts -->
        <!--owl-carousel -->
        <link rel="stylesheet" href="<?= assets('vendor/owl-carousel/owl.theme.css') ?>"/>
        <link rel="stylesheet" href="<?= assets('vendor/owl-carousel/owl.carousel.css') ?>"/>
        <!--owl-carousel -->
        <!--bootstrap -->
        <link href="<?= assets('vendor/bootstrap/css/bootstrap.min.css') ?>" rel="stylesheet"/>
        <!--bootstrap -->
        <link rel="stylesheet" href="<?= assets('vendor/animate.css/animate.min.css') ?>"/>
        <link href="<?= assets('css/style.css') ?>" rel="stylesheet"/>

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
        <script src="<?= assets('vendor/jquery/jquery-1.12.3.min.js') ?>"></script>
    </head>

    <body>

        <!-- Start site -->
        <div class="site">
            <!-- Start header-social section-->
            <section id="header-social">
                <div class="container">
                    <div class="row">
                        <ul class="nav social-top col-md-5 col-xs-12">
                            <li><a href="<?= $socials->facebook ?>" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                            <li><a href="<?= $socials->twitter ?>" target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                            <li><a href="<?= $socials->utube ?>" target="_blank"><i class="fa fa-youtube" aria-hidden="true"></i></a></li>
                            <li><a href="<?= $socials->linkedin ?>" target="_blank"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                            <li><a href="<?= $socials->gplus ?>" target="_blank"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
                            <li><a href="<?= $socials->pinterest ?>" target="_blank"><i class="fa fa-pinterest-p" aria-hidden="true"></i></a></li>
                            <li><a href="<?= $socials->tumblr ?>" target="_blank"><i class="fa fa-tumblr" aria-hidden="true"></i></a></li>
                            <li><a href="<?= $socials->vimeo ?>" target="_blank"><i class="fa fa-vimeo" aria-hidden="true"></i></a></li>
                        </ul>
                        <div class="col-md-4 col-xs-12 header-phone">
                            <i class="fa fa-phone fa-fw" aria-hidden="true"></i>
                            <span> 01002008006</span>
                        </div>
                        <div class="col-md-3 col-xs-12">
                            <?php if (!auth()): ?>
                                <a href="<?= base_url('signin') ?>" class="login">
                                    <i class="fa fa-user-circle" aria-hidden="true"></i> Login
                                </a>
                                <a href="<?= base_url('signup') ?>" class="login">
                                    <i class="fa fa-pencil" aria-hidden="true"></i> Register
                                </a>
                            <?php else : ?>
                                <a class="login">
                                    <i class="fa fa-user-circle" aria-hidden="true"></i> <?= auth()->name ?>
                                </a>
                                <a href="<?= base_url('signout') ?>" class="login">
                                    <i class="fa fa-pencil" aria-hidden="true"></i> Logout
                                </a>
                            <?php endif; ?>
                            <a href="<?= base_url('ar') ?>" class="btn btn-primary">AR</a>
                        </div>
                    </div>
                </div>

            </section>
            <!-- End header-social section -->

            <!-- Start Header-menu section-->

            <section id="header-menu">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-3 hidden-sm- hidden-xs logo">
                            <a href="<?= base_url() ?>">
                                <img src="<?= assets('images/logo.jpg') ?>" alt="Manazina" title="Manazina" class="img-responsive"/>
                            </a>
                        </div>
                        <div class="col-sm-9 col-xs-12">
                            <nav class="navbar navbar-default">
                                <!-- Brand and toggle get grouped for better mobile display -->
                                <div class="navbar-header">
                                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#main-menu" aria-expanded="false">
                                        <span class="sr-only">Toggle navigation</span>
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                    </button>
                                    <a class="navbar-brand hidden-md hidden-sm hidden-lg" href="<?= base_url() ?>">
                                        <img src="<?= assets('images/logo.jpg') ?>" alt="Manazina For Real State Marketing & investment" title="Manazina For Real State Marketing & investment" class="img-responsive"/>
                                    </a>
                                </div>

                                <!-- Collect the nav links, forms, and other content for toggling -->
                                <div class="collapse navbar-collapse padding-none-sm" id="main-menu">
                                    <ul class="nav navbar-nav navbar-right">
                                        <li>
                                            <a href="<?= base_url() ?>" <?php if ($index == 'home'): ?>class="active" <?php endif ?>>
                                                <i class="fa fa-home" aria-hidden="true"></i> Home
                                            </a>
                                        </li>
                                        <li>
                                            <a href="<?= base_url('properties') ?>" <?php if ($index == 'products'): ?>class="active" <?php endif ?> >
                                                Listing
                                            </a>
                                        </li>
                                        <li>
                                          <a href="<?= base_url('advanced-search')?>" <?php if ($index == 'advancedSearch'): ?>class="active" <?php endif ?> >
                                            Advanced search
                                          </a>
                                        </li>
                                        <li>
                                            <a href="<?= base_url('map-search')?>"
                                            <?php if ($index == 'mapSearch'): ?> class="active" <?php endif ?> >
                                                Map Search
                                            </a>
                                        </li>
                                        <li><a href="<?= base_url('contact-us')?>" <?php if ($index == 'contact'): ?>class="active" <?php endif ?> >Contact Us</a></li>

                                    </ul>
                                </div><!-- /.navbar-collapse -->
                            </nav>
                        </div>

                    </div>
                </div>

            </section>
            <!-- End Header-menu section -->

            <?php $this->load->view($page); ?>

            <!-- start footer section-->
            <section id="footer">
                <div class="container">
                    <div class="row">
                        <div class="col-md-8 col-xs-12">
                            <ul class="nav footer-links">
                                <li class="col-md-3 col-sm-6 col-xs-12">
                                    <h3 class="ul-title">Site Map</h3>
                                    <ul class="nav inside-ul">
                                        <li><a href="<?= base_url() ?>">Home</a></li>
                                        <li><a href="<?= base_url('properties') ?>">Listing</a></li>
                                        <li><a href="<?= base_url('advanced-search')?>">Advanced search</a></li>
                                        <li><a href="">Map Search</a></li>
                                        <li><a href="<?= base_url('contact-us')?>">Contact us</a></li>
                                    </ul>

                                </li>
<!--
                                <li class="col-md-3 col-sm-6 col-xs-12">
                                    <h3 class="ul-title">Our Services</h3>
                                    <ul class="nav inside-ul">
                                        <li><a href="<?= base_url()?>">Home</a></li>
                                        <li><a href="<?= base_url('properties') ?>">Listing</a></li>
                                        <li><a href="">Category</a></li>
                                    </ul>

                                </li>

                                <li class="col-md-3 col-sm-6 col-xs-12">
                                    <h3 class="ul-title">Our Services</h3>
                                    <ul class="nav inside-ul">
                                        <li><a href="">Home</a></li>
                                        <li><a href="">Listing</a></li>
                                        <li><a href="">Category</a></li>
                                    </ul>

                                </li>

                                <li class="col-md-3 col-sm-6 col-xs-12">
                                    <h3 class="ul-title">Our Coverage Areas</h3>
                                    <ul class="nav inside-ul">
                                        <li><a href="">Home</a></li>
                                        <li><a href="">Listing</a></li>
                                        <li><a href="">Category</a></li>
                                    </ul>

                                </li>
-->
                            </ul>

                        </div>

                        <div class="col-md-4 col-xs-12 news-letter">
                            <h4>Sign up for our newsletter</h4>
                            <form method="post" action="" id="newsletterForm" class="form-inline">
                                <div class="form-group">
                                    <input id="newsletterMail" type="email" class="form-control" name="email" value="" placeholder="Enter Your Email" />
                                    <input value="1" type="hidden" name="active" />
                                    <button name="newsletter" value="1" type="submit" class="btn btn-default">
                                      <i class="fa fa-paper-plane" aria-hidden="true"></i>
                                    </button>
                                </div>

                            </form>
                            <h4 class="follow">Follow Us </h4>
                            <ul class="nav social-ul">
                                <li><a href="<?= $socials->facebook ?>" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                <li><a href="<?= $socials->twitter ?>" target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                                <li><a href="<?= $socials->instagram ?>" target="_blank"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </section>
            <!-- end footer section-->

            <!-- start copyRight section-->
            <section id="copyRight">
                <div class="container">
                    <div class="row">
                        <p class="text-right"> copyrights reserved   &reg; <?= date('Y') ?> | Manazilna </p>
                    </div>
                </div>
            </section>
            <!-- end copyRight section-->
        </div>
        <!-- / end site -->


        <script src="<?= assets('vendor/bootstrap/js/bootstrap.min.js') ?>"></script>
        <script src="<?= assets('vendor/owl-carousel/owl.carousel.min.js') ?>"></script>
        <script src="<?= assets('vendor/wow/wow.min.js') ?>"></script>
        <script src="<?= assets('js/jquery.nicescroll.min.js') ?>"></script>
        <script>
            $(document).ready(function () {
                $("html").niceScroll({
                    cursorcolor: "#444",
                    cursorborder: "4px solid #444"
                });

                $("#gallery").owlCarousel({
                    autoPlay: true,
                    items: 4,
                    lazyLoad: true,
                    navigation: true,
                    navigationText: [
                        "<img src='<?= assets('images/arrow-next.png') ?>' alt='arrow-next' title='arrow-next' />",
                        "<img src='<?= assets('images/arrow-prev.png') ?>' alt='arrow-prev' title='arrow-prev' />"
                    ]
                });
                new WOW().init();
            });

            $(document).on('click', '.cat', function () {
                var url = $(this).attr('href');

                $.ajax({
                    type: 'POST',
                    url: url,
                    success: function (data) {
                        console.log(data);
                        $("#projects").html(data);
                    }
                });
                return false;
            });

            $('#newsletterForm').submit(function (){
              var data = $(this).serializeArray();

              if(data[0].value != ''){
                $.ajax({
                    type: 'POST',
                    data: data,
                    url: '<?= base_url('newsletter') ?>',
                    success: function (data) {
                      if(data == 0){
                        msg = "Please try again";
                      }else if (data == 1) {
                        msg = "Successfully added";
                      }else if (data == 2) {
                        msg = "This E-mail already exist";
                      }
                      alert(msg);
                    }
                });

              }else {
                  $('#newsletterMail').css('border', '2px red solid');
              }
              return false;
            });
        </script>
    </body>
</html>
