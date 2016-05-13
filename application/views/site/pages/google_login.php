<div class="container">
    <div class="row">
        <div class="col-sm-6 col-md-4 col-md-offset-4">
            <h1 class="text-center login-title">Sign in to continue</h1>
            <div class="account-wall">
                <?php 
                    if(!$this->session->login)
                    {
                ?>
                    <img class="profile-img" src="<?php echo public_url()?>/site/images/avatar/default-avatar.png" alt="">
                <?php 
                    }
                    else
                    {
                ?>
                    <img class="profile-img" src="" alt="">
                <?php
                    }
                ?>
                <form class="form-signin" method="post" action="">
                    <input type="text" class="form-control" placeholder="Email" required autofocus name="login_email"><br/>
                    <input type="password" class="form-control" placeholder="Password" required name="login_pass">
                    <button class="btn btn-lg btn-primary btn-block" type="submit" name="login">Sign in</button>
                <label class="checkbox pull-left">
                    <input type="checkbox" value="remember-me">Remember me
                </label>
                <a href="#" class="pull-right need-help">Need help? </a><span class="clearfix"></span>
                </form>
            </div>
            <a href="<?php echo user_url('register')?>" class="text-center new-account">Create an account </a>
        </div>
    </div>
</div>