<!-- Start Content Section -->
 <section id="content-section" class="login-section">


       <div> 
            <?= htmlspecialchars_decode($config->gmap) ?>
       </div>


       <div class="page-desc"> 
                  <Div class="container">
                      <div class="row text-center contact-side">
                        <?php if ($config->site_address): ?>
                             <div class="col-md-4 col-sm-6 col-xs-12">
                                <i class="fa fa-map-marker fa-fw" aria-hidden="true"></i>
                                <h3 class="text-blue">العنوان</h3>
                                <p><?= $config->site_address ?></p>
                            </div>
                        <?php endif; ?>

                        <?php if ($config->site_phone): ?>
                             <div class="col-md-4 col-sm-6 col-xs-12">
                                <i class="fa fa-phone fa-fw" aria-hidden="true"></i>
                                <h3 class="text-blue">التليفون</h3>
                                <p style="direction: ltr;">
                                    <?= $config->site_phone ?> <?= isset($config->site_fax) ? " - ".$config->site_fax : "" ?>
                                </p>
                             </div>
                        <?php endif; ?>
                        <?php if ($config->site_email): ?>
                         <div class="col-md-4 col-sm-6 col-xs-12">
                            <i class="fa fa-envelope-open-o fa-fw" aria-hidden="true"></i>
                            <h3 class="text-blue">الإيميل</h3>
                            <p><?= $config->site_email ?></p>
                         </div>
                     <?php endif; ?>

                      </div>
                  </Div>

      </div>

      <div class="container">

          <div class="row contactus-page"> 
              <h3 class="text-blue text-center"> <i class="fa fa-envelope-open-o fa-fw" aria-hidden="true"></i> أرسل رسالتك </h3>
              <div class="col-md-6 col-xs-12 col-md-offset-3"> 
                  <form method="post">
                      <div class="form-group col-md-6" style="padding-right:0"> 
                          <input name="name" type="text" class="form-control"  placeholder="الإسم">
                      </div>
                      <div class="form-group col-md-6" style="padding-left:0"> 
                          <input type="text" class="form-control" name="phone" placeholder="التليفون">
                      </div>
                      <div class="form-group"> 
                          <input type="email" class="form-control" name="email"  placeholder="البريد الإلكتروني">
                      </div>
                      <div class="form-group"> 
                          <textarea  class="form-control" name="message" placeholder="الرسالة" style="height: 120px"></textarea>
                      </div>

                      <p class="text-center">
                          <button type="submit" name="contact_submit" class="btn btn-primary"> إرسال <i class="fa fa-arrow-left" aria-hidden="true"></i>
                          </button>
                      </p>
                  </form>
              </div>

              
          </div>

      </div>

 </section>


<!-- end Content Section -->