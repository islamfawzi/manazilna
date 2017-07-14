<?= validation_errors(); ?>
<section id="content-section" class="login-section">
    <div class="container">
        <div class="row contact-page">
            <div class="col-md-6 col-md-offset-3">
                <form class="form-horizontal login-form register" method="post" action="<?= base_url('signup')?>">
                    <h4 class="text-center">
                        <i class="fa fa-pencil" aria-hidden="true"></i> Create an account</h4>
                        <br />
                    <p class="col-sm-offset-1 col-sm-10" style="padding:0;">you have an account ? 
                        <a href="<?= base_url('signin') ?>" style="color:#5cb85c;">Login now!</a>
                    </p>
                    
                    
                    <div class="form-group"> 
                        <div class="col-sm-offset-1 col-sm-10">
                            <input type="text" class="form-control" name="name" <?= set_value('name'); ?> placeholder="Full name">
                        </div>
                    </div>
                    
                    <div class="form-group"> 
                        <div class="col-sm-offset-1 col-sm-10">
                            <input type="password" class="form-control" name="password" placeholder="Password">
                        </div>
                    </div>
                    <div class="form-group"> 
                        <div class="col-sm-offset-1 col-sm-10">
                            <input type="password" class="form-control" name="passwordconf"  placeholder="Verify Password">
                        </div>
                    </div>
                    <div class="form-group"> 
                        <div class="col-sm-offset-1 col-sm-10">
                            <input type="email" class="form-control" name="email" <?= set_value('email'); ?> placeholder="Email">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-1 col-sm-10">
                            <input type="submit" name="signup" class="btn btn-success btn-block" value="Register Now"></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
