<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<meta name="description" content="<?= $meta_desc ?>"/>
<meta name="keywords" content="<?= $meta_keys ?>"/>
<title><?=$title?></title>
<!-------------------- Main Styles CSS ----------------------->
<link href="<?=base_url()?>Content/ar/css/bootstrap.css" rel="stylesheet" type="text/css">
<link href="<?=base_url()?>Content/ar/css/bootstrap-theme.css" rel="stylesheet" type="text/css">
<link href="<?=base_url()?>Content/ar/css/theme.css" rel="stylesheet" type="text/css">
<link href="<?=base_url()?>Content/ar/css/jquery.smartmenus.bootstrap.css" rel="stylesheet" type="text/css">
<link href="<?=base_url()?>Content/ar/fonts/fonts.css" rel="stylesheet" type="text/css">
<link href="<?=base_url()?>Content/ar/css/owl.carousel.css" rel="stylesheet" type="text/css">

<!-------------------- Vendors CSS ----------------------->

<!-------------------- Custom CSS ----------------------->
<link href="<?=base_url()?>Content/ar/css/style.css" rel="stylesheet" type="text/css">
<link href="<?php echo base_url()?>css/lightbox.css" rel="stylesheet"/>
<!-------------------- Javascript files ----------------------->
</head>

<body>
<div id="wrap"> 
  <!-------------------- header -------------------------->
  <div class="top-section">
    <div class="menu">
      <div class="container">
        <div class="row">
          <div class="top-logos">
            <div class="col-md-2 col-sm-4 col-xs-3 pull-right"> 
                <a href="<?=base_url('ar')?>">
                    <img src="<?=base_url()?>Content/ar/images/logo.png" class="img-responsive logo" />
                </a> 
            </div>
            <div class="col-md-5 col-sm-8 col-xs-9 pull-left"> 
                <a href="<?=base_url('ar')?>">
                    <img src="<?=base_url()?>Content/ar/images/slogan.png" class="img-responsive" />
                </a> 
            </div>
          </div>
        </div>
      </div>
      <!-------------------- menu-------------------------->
      <div class="navbar navbar-default" role="navigation">
        <div class="container">
          <div class="row">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
            </div>
            <div class="navbar-collapse collapse">
              <ul class="nav navbar-nav navbar-right">
                <li <?if($index == 'home'):?>class="active"<?endif?>><a href="<?=base_url('ar')?>">الرئيسية</a></li>
                <li <?if($index == 'about'):?>class="active"<?endif?>><a href="<?=base_url('ar/about')?>">نبذه عنا </a></li>
                <li <?if($index == 'products'):?>class="active"<?endif?>><a href="<?=base_url('ar/products')?>">المنتجات</a></li>
                <li <?if($index == 'services'):?>class="active"<?endif?>><a href="<?=base_url('ar/services')?>">الخدمات</a></li>
                <li <?if($index == 'contact'):?>class="active"<?endif?>><a href="<?=base_url('ar/contact-us')?>">اتصل بنا</a> </li>
                
                <li ><a href="<?=base_url(str_replace('ar','',urldecode(uri_string())))?>">English</a> </li>
              </ul>
            </div>
          </div>
        </div>
      </div>      
      <!--------------------close menu----------------------------> 
    </div>    
    <!-------------------- Banner -------------------------->
   <?if($index != 'home'):?>
<div id="carousel-example-generic" class="carousel slide mymargin" data-ride="carousel"> 
    <div class="carousel-inner">
        <div class="item active"> 
        <img src="<?=base_url()?>Content/ar/images/banner2.jpg" alt="..." />
            <div class="page-title"> 
                <div class="container">
                    <?=$title?>
                </div> 
            </div>
        </div>
    </div>
</div>
</div>
   <?else :?> 
    <div id="carousel-example-generic" class="carousel slide mymargin" data-ride="carousel"> 
      <!-- Indicators -->
          <ol class="carousel-indicators">
            <? foreach ($sliders as $key => $s):?>
                <li data-target="#carousel-example-generic" data-slide-to="<?=$key?>" <?if($key == 0):?>class="active"<?endif?>></li>
            <? endforeach?>
          </ol>
          
          <!-- Wrapper for slides -->
          <div class="carousel-inner">
            <? foreach ($sliders as $k => $slider):?>
                <div class="item <?if($k == 0):?>active<?endif?>"> 
                    <img src="<?=base_url($slider->image)?>" alt="<?=$slider->title?>" /> 
                </div>
            <? endforeach?> 
          </div>      
          <!-- Controls --> 
          <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev"> 
            <img src="Content/ar/images/prev.png" class="next-arrow">
          </a> 
          <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
            <img src="Content/ar/images/next.png" class="prev-arrow">         
          </a> 
    </div>
<?endif?>