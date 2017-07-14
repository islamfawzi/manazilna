<?= validation_errors(); ?>
<!-- Start Content Section -->
 <section id="content-section" class="login-section">

      <div class="container">

          <div class="row contact-page">
              <div class="col-md-6 col-md-offset-3">
                  <form class="form-horizontal login-form register" method="post" action="<?= base_url('ar/signup')?>" >
                      <h4 class="text-center"><i class="fa fa-pencil" aria-hidden="true"></i> تسجيل حساب جديد </h4> <br>
                      <p class="col-sm-offset-1 col-sm-10" style="padding:0;"> هل لديك حساب بالفعل ؟  
                      <a href="<?= base_url('ar/signin') ?>" style="color:#5cb85c;">  تسجيل دخول !</a></p>
                      <div class="form-group form-group col-sm-5 half">  
                              <input type="text" class="form-control"   placeholder=" الإسم">
                          
                      </div>
                      <div class="form-group col-sm-5 half half-col">  
                              <input type="text" class="form-control" name="name" <?= set_value('name'); ?>  placeholder="الاسم المستعار">            
                      </div>
                      <div class="form-group"> 
                          <div class="col-sm-offset-1 col-sm-10">
                              <input type="password" class="form-control" name="password"  placeholder="كلمة المرور">
                          </div>
                      </div>
                      <div class="form-group"> 
                          <div class="col-sm-offset-1 col-sm-10">
                              <input type="password" class="form-control" name="passwordconf"  placeholder="تأكيد كلمة المرور">
                          </div>
                      </div>
                      <div class="form-group"> 
                          <div class="col-sm-offset-1 col-sm-10">
                              <input type="email" class="form-control" name="email" <?= set_value('email'); ?> placeholder="البريد الألكتروني">
                          </div>
                      </div>
                      <div class="form-group">
                          <div class="col-sm-offset-1 col-sm-10">
                              <button type="submit" name="signup" value="1" class="btn btn-success btn-block"> تسجيل  
                              <i class="fa fa-arrow-left" aria-hidden="true"></i></button>
                          </div>
                      </div>
                  </form>

              </div>


          </div>

      </div>

 </section>


<!-- end Content Section -->