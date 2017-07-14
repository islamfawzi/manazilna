            </div>
            <div class="container">
                <div id="footer2">
                    <div class="row">
                        <div class="col-md-8 col-sm-7">
                            <div class="title-footer">راسلنا</div>
                            <div class="col-sm-12">
                                <form id="contact_form2" method="post" action="<?=base_url('ar/contact-us')?>" class="form-horizontal" role="form">
                                    <div class="col-sm-6">
                                        <input type="text" name="name" class="form-control" id="" placeholder="الأسم بالكامل">
                                        <input type="text" name="phone" class="form-control" id="" placeholder="رقم التليفون">
                                        <input type="text" name="mail" class="form-control" id="" placeholder="البريد الالكتروني">
                                    </div>
                                    <div class="col-sm-6">
                                         <textarea name="message" class="form-control big-form foot" placeholder="الرسالة" rows="5"></textarea>
                                    </div>
                                <div class="col-sm-12">
                                    <input type="submit" name="contact_submit" value="ارسال" class="btn2 btn btn-form" />
                                </div>
                                </form>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-5"> 
                            <div class="contact-info">
                                <div class="footer-title-2">
                                    تواصل معنا        
                                </div>
                                الهاتف : <?= $config->site_phone ?><br />
                                
                                الفاكس     : <?= $config->site_fax ?><br />
                                
                                البريد الالكترونى  : <a style="color: white;" href="mailto:<?= $config->site_email ?>"><?= $config->site_email ?></a><br />
                                
                                <?= $config->site_address ?><br /> 
                                <br />
                                <div class="social">
                                    <a href="<?=$social->facebook?>" target="_blank" class="icon-social">
                                        <i class="fa fa-facebook" aria-hidden="true"></i>
                                    </a>
                                    <a href="<?=$social->twitter?>" target="_blank" class="icon-social"> 
                                        <i class="fa fa-twitter" aria-hidden="true"></i>
                                    </a>
                                </div>                    
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>                        
        <div id="footer">
            <div class="container"> جميع الحقوق محفوظه OMEGA-CHEM 2017 </div>
        </div>
        <script type="text/javascript" src="<?=base_url()?>Scripts/jquery-1.11.1.min.js"></script>
        <script type="text/javascript" src="<?=base_url()?>Scripts/jquery-migrate-1.2.1.min.js"></script>
        <script type="text/javascript" src="<?=base_url()?>Scripts/bootstrap.min.js"></script>
        <script type="text/javascript" src="<?=base_url()?>Scripts/holder.js"></script>
        <script type="text/javascript" src="<?=base_url()?>Scripts/jquery.smartmenus.js"></script>
        <script type="text/javascript" src="<?=base_url()?>Scripts/jquery.smartmenus.bootstrap.js"></script>
        <script type="text/javascript" src="<?=base_url()?>Scripts/owl.carousel.min.js"></script>
        <script type="text/javascript" src="<?=base_url()?>js/lightbox.min.js"></script>
        <script type="text/javascript" src="<?= base_url() ?>js/jquery.validate.js"></script>
        <script type="text/javascript" src="<?=base_url()?>Scripts/scripts.js"></script>
    </body>
</html>