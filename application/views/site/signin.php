<?= validation_errors(); ?>
<section id="content-section" class="login-section">
    <div class="container">
        <div class="row contact-page">
            <div class="col-md-6 col-md-offset-3">
                <form class="form-horizontal login-form" method="post" action="<?= base_url('signin') ?>">
                    <h4 class="text-center"><i class="fa fa-user-circle" aria-hidden="true"></i> Login To Your Account</h4><br/>

                    <div class="form-group">                                  
                        <div class="col-sm-offset-1 col-sm-10">
                            <input type="email" class="form-control" name="email" placeholder="Email">
                        </div>
                    </div>
                    <div class="form-group"> 
                        <div class="col-sm-offset-1 col-sm-10">
                            <input type="password" class="form-control" name="password" placeholder="Password">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-1 col-sm-10">
                            <div class="checkbox">
                                <label>                                    
                                    <input name="remember_me" type="checkbox"> Remember me
                                </label>
                            </div>
                            <p>
                                <i class="fa fa-angle-double-right" aria-hidden="true"></i> 
                                Don't have an account yet? 
                                <a href="<?= base_url('signup')?>"style="color:#5cb85c;">Register now!</a></p>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-1 col-sm-10">
                            <input type="submit" name="signin" class="btn btn-success btn-block" value="Login">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
