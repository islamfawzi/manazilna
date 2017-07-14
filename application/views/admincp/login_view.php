<!DOCTYPE HTML>
<head>
    <meta charset="utf-8"/>
    <meta http-equiv="content-type" content="text/html" />
    <meta name="author" content="vadecom.Net" />
    <link type="text/css" rel="stylesheet" href="<?= assets('css/admin/bootstrap.css') ?>"/>
    <link type="text/css" rel="stylesheet" href="<?= assets('css/admin/font-awesome.min.css') ?>"/>
    <link type="text/css" rel="stylesheet" href="<?= assets('css/admin/droid.css') ?>"/>
    
    <link type="text/css" rel="stylesheet" href="<?= assets('css/admin/admin_style.css') ?>"/>
    <link type="text/css" rel="stylesheet" href="<?= assets('css/admin/style_me.css') ?>"/>
    <link type="text/css" rel="stylesheet" href="<?= assets('css/admin/datepicker.css') ?>"/>
    <title>تسجيل الدخول</title>
</head>
    <style type="text/css">
       .footer_admin{
             background-color: #11a8d7;
            bottom: 0;
            color: #fff;
            height: auto !important;
            padding: 15px 0 !important;
            position: absolute;
            right: 0;
            width: 100%;
       }
    </style>
    <body dir="rtl">
    <div class="container">
       <div class="row">
          <div class="col-md-4 col-md-offset-4 login">          
             <h5 class="login_title text-center"><i class="fa fa-child"></i> تسجيل الدخول</h5>
             <form action="<?= base_url().'login/login_cp'?>" method="post" class="login_form" id="login_form">
                  <div class="input-group mr-bottom">
                      <span class="input-group-addon"><i class="fa fa-user fa-fw"></i></span>
                      <input class="form-control" id="username" name="username" value="<?=$username?>" type="text" placeholder="ادخل إسم المستخدم ..."/>
                  </div>
                  <p class="valid_alert" id="username_req">اسم المستخدم مطلوب</p>
                  <div class="input-group mr-bottom">
                      <span class="input-group-addon"><i class="fa fa-key fa-fw"></i></span>
                      <input class="form-control" id="password" name="password" value="<?=$password?>" type="password" placeholder="ادخل كلمة المرور ..."/>
                 </div>
                  <p class="valid_alert" id="password_req">كلمة المرور مطلوبة</p>
                  <div class="checkbox">
                    <label>
                      <input type="checkbox" <?php if(isset($rem)){?> checked="true" <?php } ?> value="1" id="" name="remember_me"/> تذكرني
                    </label>
                  </div>
                  <p class="text-center"><button type="submit" class="btn btn-success">تسجيل دخول <i class="fa fa-unlock"></i></button></p>
             </form>
          </div>
       </div>

       <div class="row">
          <div class="col-xs-12">
        <?php if(isset($logged)) { ?>
          <?php if($logged == 1) { ?>
            <div class="alert alert-success">
               <i class="fa fa-smile-o"></i>
               مرحبا بك <?= $this->session->userdata('fullname') ?> .. تم تسجيل الدخول بنجاح وجاري تحويلك إلي لوحة التحكم
               <i class="fa fa-spinner fa-pulse fa-1x fa-fw margin-bottom"></i>
               <meta http-equiv="Refresh" content="2; URL='<?=base_url()?>admincp/settings'" />
            </div>
          <?php } else { ?>
            <div class="alert alert-danger">
               <i class="fa fa-frown-o"></i>
               عفوا  بيانات الدخول غير صحيحة نرجو إعادلة إدخل البيانات بشكل صحيح  .....
               <i class="fa fa-refresh fa-spin fa-1x fa-fw margin-bottom"></i>
            </div>
          <?php } ?>
        <?php } ?>
          </div>
       </div>
    </div>
<?php $this->load->view('admincp/footer'); ?>
