<form action="<?php echo site_url('login'); ?>" method="post">
    <div class="form-group has-feedback">
        <input type="text" class="form-control" name="identity" placeholder="Email">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
    </div>
    <?php echo form_error('identity', '<p class="text-danger">', '</p>'); ?>
    <div class="form-group has-feedback">
        <input type="password" class="form-control" name="password" placeholder="Password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
    </div>
    <?php echo form_error('password', '<p class="text-danger">', '</p>'); ?>
    <div class="row">
        <div class="col-xs-8">
            <div class="checkbox icheck">
                <label>
                    <input type="checkbox" name="remember" value="1"> Remember Me
                </label>
            </div>
        </div>
        <div class="col-xs-4">
            <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
        </div>
    </div>
</form>
