<?php $this->load->view('site_ar/header'); ?>
<!-------------------- about ----------------------->
<div class="about">
    <div class="container">
        <?if ($sent == 1):?>
        <div class="row text-center">
            <div class="col-xs-12">
                <div class="animated infinite pulse"><h3 style="color: #000;"><i class="fa fa-check-square-o"></i>تم الارسال بنجاح </h3></div><br /><span style="color: #006426;"> Redirect </span><br />           
            </div>
        </div>
        <meta http-equiv="refresh" content="3; URL='<?= base_url('ar') ?>'" />
        <hr />
        <?elseif ($sent == 2):?>
        <div class="row">
            <div class="col-xs-12 text-center">
                <div class="animated infinite pulse">  <div class="alert alert-danger"><i class="fa fa-remove"></i> عفواً ... حاول لاحقاً</div></div>
            </div>           
        </div>
        <? endif; ?>
        <div class="home-title"> موقعنا </div>
        <div class="home-text">
            <div class="map">
                <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d441725.9465226469!2d31.582707349999996!3d30.123272550000003!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sar!2seg!4v1425559087445" width="100%" height="350" frameborder="0" style="border:0"></iframe>
            </div>
            <br> <div class="row">
                <div class="col-md-7">

                    <div class="home-title"> التفاصيل</div>
                    <div class="box ">
                        <div class="contact-data"><?= $config->site_address ?></div>
                        <div class="contact-data">Fax.: <?= $config->site_fax ?></div>
                        <div class="contact-data"> Tel.: <?= $config->site_phone ?></div>
                        <div class="contact-data"> <a href="mailto:<?= $config->site_email ?>"><?= $config->site_email ?></a></div>

                    </div>
                    <br>
                    <div class="home-title">راسلنا</div>
                    <div class="box">
                        <form id="contact_form" method="post" class="form-horizontal" role="form">
                            <div class="form-group">
                                <input type="text" class="form-control big-form" id="name" name="name" placeholder="الاسم بالكامل">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control big-form" id="mail" name="mail" placeholder="البريد الالكتروني">
                                <span id="mail_required" style="display: none; text-align: left;font-size:13px;" class="error">من فضلك ... أدخل بريدك الالكترونى</span>
                                <span id="validmail" style="display: none; text-align: left;font-size:13px;" class="error">من فضلك ... أدخل بريد الكترونى صحيح </span>
                            </div>
                            <div class="form-group">
                                <textarea id="message" name="message" class="form-control" placeholder="الرساله"></textarea>
                            </div>
                            <button type="submit" name="contact_submit" class="btn btn-form">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-5"> </div></div>
</div></div>
<script type="text/javascript">
    $(document).ready(function () {

        $("#contact_form").submit(function ()
        {
            $(".form-control").css("border-color", "#ccc");
            if ($("#name").val() == "") {
                $("#name").css("border-color", "red");
                return false;
            }

            var hasError = false;
            var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;

            var emailaddressVal = $("#mail").val();
            if (emailaddressVal == '') {
                $("#mail").css("border-color", "red");
                $("#mail_required").slideDown(1000);
                $("#mail_required").delay(3000).slideUp(1000);
                return false;
            } else if (!emailReg.test(emailaddressVal)) {
                $("#mail").css("border-color", "red");
                $("#validmail").slideDown(1000);
                $("#validmail").delay(3000).slideUp(1000);
                return false;
            }

            if ($("#message").val() == "") {
                $("#message").css("border-color", "red");
                return false;
            }
        });

    });

</script>        
<?php $this->load->view('site_ar/footer'); ?>
     