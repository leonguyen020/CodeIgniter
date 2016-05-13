<nav class="navbar navbar-default">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse-2">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Leo's website</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="navbar-collapse-2">
            <ul class="nav navbar-nav navbar-right">
                <li><a href="#">Home</a></li>
                <li><a href="#">About</a></li>
                <li><a href="#">Services</a></li>
                <li><a href="#">Works</a></li>
                <li><a href="#">News</a></li>
                <li><a href="<?php echo user_url('contact')?>">Contact</a></li>
            <?php
                if(!$this->session->login)
                {
            ?>
                <li>
                  <a class="btn btn-default btn-outline btn-circle"  data-toggle="collapse" href="#nav-collapse2" aria-expanded="false" aria-controls="nav-collapse2">Sign in</a>
                </li>
            </ul>
            <div class="collapse nav navbar-nav nav-collapse" id="nav-collapse2">
                <form class="navbar-form navbar-right form-inline" action="<?php echo user_url('login')?>" role="form" method="POST">
                    <div class="form-group">
                        <label class="sr-only" for="Email">Email</label>
                        <input type="email" class="form-control" id="Email" placeholder="Email" autofocus required name="login_email" value="<?php echo set_value('login_email')?>" />
                        <div class="error" id="login_email_error"><?php echo form_error('login_email')?></div>
                    </div>
                    <div class="form-group">
                        <label class="sr-only" for="Password">Password</label>
                        <input type="password" class="form-control" id="Password" placeholder="Password" required name="login_pass" value="<?php echo set_value('login_pass')?>"/>
                        <div class="error" id="login_email_error"><?php echo form_error('login_pass')?></div>
                    </div>
                    <button type="submit" class="btn btn-success">Sign in</button>
                </form>
            </div>
            <?php
            // Có cái form bắt login như trên
                }else{
                    $user = array();
                    $user = $this->session->userdata('login');
            ?>
                <li>
                    <a class="btn btn-default btn-outline btn-circle"  data-toggle="collapse" href="#nav-collapse4" aria-expanded="false" aria-controls="nav-collapse4">Profile <i class=""></i> </a>
                </li>
            </ul>
            <ul class="collapse nav navbar-nav nav-collapse" role="search" id="nav-collapse4">
                <li class="dropdown">
                    <!--<a href="#dropdown-menu" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"> <span class="caret"></span>-->
                    <a><span class="dropdown-toggle glyphicon glyphicon-user"></span> Hello <?php echo $user->last_name?> </a>
                        <!--<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><img class="img-circle" src="https://pbs.twimg.com/profile_images/588909533428322304/Gxuyp46N.jpg" alt="maridlcrmn" width="20" /> Maridlcrmn <span class="caret"></span></a>-->
                    <!--</a>-->
                    
<!--                    <ul class="dropdown-menu" role="menu">
                        <li><a href="#">My profile</a></li>
                        <li><a href="#">Favorited</a></li>
                        <li><a href="#">Settings</a></li>
                        <li class="divider"></li>
                        <li><a href="<?php // echo user_url('logout');?>">Logout</a></li>
                    </ul>-->
                </li>
                <?php
                    $role = $user->permission;
                    if($role == 1)
                    {
                ?>
                <li><a href="<?php echo admin_url();?>">Admin Panel</a></li>
                <?php
                    }
                ?>
                <li><a href="#">My profile</a></li>
                <li><a href="<?php echo user_url('logout');?>">Logout</a></li>
            </ul>
            <?php
                }
            ?>
            
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container -->
</nav><!-- /.navbar -->