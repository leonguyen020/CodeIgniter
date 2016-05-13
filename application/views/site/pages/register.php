<div class="container">
    <div class="row centered-form">
        <div class="col-xs-12 col-sm-8 col-md-4 col-sm-offset-2 col-md-offset-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Please sign up for Leo's Website <small>It's free!</small></h3>
                </div>
                <div class="panel-body">
                    <form role="form" action="" method="POST" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-xs-6 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <input type="text" name="first_name" id="first_name" class="form-control input-sm" placeholder="First Name" value="<?php echo set_value('first_name');?>">
                                    <div class="error" id="email_error"><?php echo form_error('first_name')?></div>
                                </div>
                            </div>
                            <div class="col-xs-6 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <input type="text" name="last_name" id="last_name" class="form-control input-sm" placeholder="Last Name" value="<?php echo set_value('last_name');?>">
                                    <div class="error" id="email_error"><?php echo form_error('last_name')?></div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <input type="text" name="phone" id="email" class="form-control input-sm" placeholder="Mobile Phone" value="<?php echo set_value('phone');?>">
                            <div class="error" id="email_error"><?php echo form_error('phone')?></div>
                        </div>
                        
                        <div class="form-group">
                            <input type="email" name="email" id="email" class="form-control input-sm" placeholder="Email Address" value="<?php echo set_value('email');?>">
                            <div class="error" id="email_error"><?php echo form_error('email')?></div>
                        </div>

                        <div class="row">
                            <div class="col-xs-6 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <input type="password" name="password" id="password" class="form-control input-sm" placeholder="Password">
                                    <div class="error" id="email_error"><?php echo form_error('password')?></div>
                                </div>
                            </div>
                            <div class="col-xs-6 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <input type="password" name="password_confirmation" id="password_confirmation" class="form-control input-sm" placeholder="Confirm Password">
                                    <div class="error" id="email_error"><?php echo form_error('password_confirmation')?></div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <input name="created" id="param_created" _autocheck="true" type="hidden" value="<?php echo time(); ?>"/>
                        </div>

                        <input type="submit" value="Register" class="btn btn-info btn-block">
                        <br/>
                        <p>Already have an account ? <a href="<?php echo user_url('login');?>">Login here</a></p>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>