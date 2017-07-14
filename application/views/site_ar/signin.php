<?= validation_errors(); ?>
<!-- Start Content Section -->
 <section id="content-section" class="login-section">

      <div class="container">

          <div class="row contact-page">
              <div class="col-md-6 col-md-offset-3">
                  <form class="form-horizontal login-form" method="post" action="<?= base_url('ar/signin') ?>">
                      <h4 class="text-center"><i class="fa fa-user-circle" aria-hidden="true"></i>  الدخول إلي حسابك</h4><br/>
                     
                      <div class="form-group"> 
                          <div class="col-sm-offset-1 col-sm-10">
                              <input type="email" class="form-control" name="email" placeholder="البريد الألكتروني">
                          </div>
                      </div>
                      <div class="form-group">
                          <div class="col-sm-offset-1 col-sm-10">
                              <input type="password" class="form-control" name="password" placeholder="كلمة المرور">
                          </div>
                      </div>
                      <div class="form-group">
                          <div class="col-sm-offset-1 col-sm-10">
                              <div class="checkbox">
                                  <label>
                                      <input name="remember_me" type="checkbox"> تذكرني
                                  </label>
                              </div>
                               <p>لا تمتلك حساب في الموقع ؟؟ <a href="<?= base_url('ar/signup')?>" style="color:#5cb85c;"> سجل الأن !</a></p>
                          </div>
                      </div>
                      <div class="form-group">
                          <div class="col-sm-offset-1 col-sm-10">
                              <button type="submit" name="signin" class="btn btn-success btn-block" value="Login"> تسجيل دخول  
                              <i class="fa fa-arrow-left" aria-hidden="true"></i></button>
                          </div>
                      </div>
                  </form>
              </div>
          </div>
      </div>
 </section>
<!-- end Content Section -->