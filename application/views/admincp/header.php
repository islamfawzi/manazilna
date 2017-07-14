<!DOCTYPE HTML>
<head>
    <meta charset="utf-8"/>
    <meta http-equiv="content-type" content="text/html" />

    <link type="text/css" rel="stylesheet" href="<?=assets('css/admin/bootstrap.css')?>"/>
    <link type="text/css" rel="stylesheet" href="<?=assets('css/admin/font-awesome.min.css')?>"/>
    <link rel="stylesheet" href="<?=assets('fonts/font.css')?>" type="text/css" media="screen"/>
    <link type="text/css" rel="stylesheet" href="<?=assets('css/admin/droid.css')?>"/>
    <link rel="shortcut icon" href="<?=assets('images/title-icon.png')?>"/>
    <link type="text/css" rel="stylesheet" href="<?=assets('css/admin/admin_style.css')?>"/>
    <link type="text/css" rel="stylesheet" href="<?=assets('css/admin/style_me.css')?>"/>
    <link type="text/css" rel="stylesheet" href="<?=assets('css/admin/datepicker.css')?>"/>
    <link rel="stylesheet" href="<?=assets('css/admin/animate.css')?>">
    <script type="text/javascript" src="<?=assets('js/jquery-1.12.3.min.js'); ?>"></script>

    <title>لوحة التحكم </title>
</head>

    <body dir="rtl">

     <?if($action == ''): ?>
        <nav class="navbar navbar-inverse navbar-fixed-top blue_back">
          <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header pull-right">
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <a class="navbar-brand" href="<?=base_url()?>" target="_blank" ><img style="height: 80px; border-radius: 5px; margin-top: 5px" src="<?= assets('images/logo.jpg') ?>" height="100" width="170"/></a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1" style="height: 70px !important;">
              <ul class="nav navbar-nav navbar-left">
                <li><a target="_blank" href="<?=base_url()?>"><i class="fa fa-home"></i> الصفحة الرئيسية للموقع</a></li>
              <!--  <li class="dropdown">
                  <a href="#" class="dropdown-toggle pull-right" data-toggle="dropdown" role="button" aria-expanded="false"><img src="<?= base_url()?>images/blolab-img-block2.jpg" class="img-circle pull-right" width="35" height="35"/>
                  &nbsp;&nbsp;  <?= $this->session->userdata('fullname')?>  <span class="caret"></span></a>
                  <ul class="dropdown-menu blue_back">
                      <li class="text-right"><a href="#"><i class="fa fa-fw fa-user"></i> صفحتي</a></li>
                      <li class="text-right"><a href="#"><i class="fa fa-fw fa-gear"></i> الضبط</a></li>
                      <li class="divider"></li>
                      <li class="text-right"><a href="<?=base_url()?>login/logout"><i class="fa fa-fw fa-power-off"></i> تسجيل الخروج</a></li>
                  </ul>
                </li>-->
              </ul>
            </div><!-- /.navbar-collapse -->
          </div><!-- /.container-fluid -->
        </nav>

         <!--Content -->
        <div class="container-fluid">
           <div class="row">


             <!-- Right Side -->
             <?php $this->load->view('admincp/menu'); ?>
             <?endif;?>
            <!-- /Right Side -->
