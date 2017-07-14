<!-- Start Content Section -->
<section id="content-section" class="login-section">
    <div> 
        <?= htmlspecialchars_decode($config->gmap) ?>
    </div>
    <div class="page-desc"> 
        <Div class="container">
            <div class="row text-center contact-side">
                <?php if ($config->site_address_en != ''): ?>
                    <div class="col-md-4 col-sm-6 col-xs-12">
                        <i class="fa fa-map-marker fa-fw" aria-hidden="true"></i>
                        <h3 class="text-blue">address</h3>
                        <p><?= $config->site_address_en ?></p>
                    </div>
                    <?php
                endif;
                if ($config->site_phone != ''):
                    ?>
                    <div class="col-md-4 col-sm-6 col-xs-12">
                        <i class="fa fa-phone fa-fw" aria-hidden="true"></i>
                        <h3 class="text-blue">Phone</h3>
                        <p><?= $config->site_phone ?></p>
                    </div>

                    <?php
                endif;
                if ($config->site_email != ''):
                    ?>
                    <div class="col-md-4 col-sm-6 col-xs-12">
                        <i class="fa fa-envelope-open-o fa-fw" aria-hidden="true"></i>
                        <h3 class="text-blue">Email</h3>
                        <p><?= $config->site_email ?></p>
                    </div>                
                <?php endif; ?>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row contactus-page"> 
            <h3 class="text-blue text-center"> <i class="fa fa-envelope-open-o fa-fw" aria-hidden="true"></i> Send us a message </h3>
            <div class="col-md-6 col-xs-12 col-md-offset-3"> 
                <form method="post">
                    <div class="form-group col-md-6" style="padding-left:0"> 
                        <input type="text" class="form-control" name="name" placeholder="Name">
                    </div>
                    <div class="form-group col-md-6" style="padding-right:0"> 
                        <input type="text" class="form-control" name="phone" placeholder="Phone : +20123456789">
                    </div>
                    <div class="form-group"> 
                        <input type="email" class="form-control" name="email"  placeholder="E-mail : example@example.com">
                    </div>
                    <div class="form-group"> 
                        <textarea  class="form-control" name="message" placeholder="Message" style="height: 120px"></textarea>
                    </div>

                    <p class="text-center">
                        <button type="submit" name="contact_submit" class="btn btn-primary">Send <i class="fa fa-arrow-right" aria-hidden="true"></i></button>
                    </p>
                </form>
            </div>
        </div>
    </div>
</section>
<!-- end Content Section -->