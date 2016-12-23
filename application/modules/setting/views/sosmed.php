<form class="form-horizontal" action="<?php echo current_url(); ?>" method="post">
    <div class="form-group">
        <label class="col-sm-3 control-label">Facebook</label>
        <div class="col-sm-9">
            <div class="input-group">
                <input type="text" class="form-control" name="opt_facebook_url" value="<?php site_option('opt_facebook_url'); ?>">
                <span class="input-group-addon"><i class="fa fa-facebook-square"></i></span>
            </div>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-3 control-label">Twitter</label>
        <div class="col-sm-9">
            <div class="input-group">
                <input type="text" class="form-control" name="opt_twitter_url" value="<?php site_option('opt_twitter_url'); ?>">
                <span class="input-group-addon"><i class="fa fa-twitter-square"></i></span>
            </div>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-3 control-label">Instagram</label>
        <div class="col-sm-9">
            <div class="input-group">
                <input type="text" class="form-control" name="opt_instagram_url" value="<?php site_option('opt_instagram_url'); ?>">
                <span class="input-group-addon"><i class="fa fa-instagram"></i></span>
            </div>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-3 control-label">Google+</label>
        <div class="col-sm-9">
            <div class="input-group">
                <input type="text" class="form-control" name="opt_gplus_url" value="<?php site_option('opt_gplus_url'); ?>">
                <span class="input-group-addon"><i class="fa  fa-google-plus-square"></i></span>
            </div>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-3 control-label">Linkedin</label>
        <div class="col-sm-9">
            <div class="input-group">
                <input type="text" class="form-control" name="opt_linkedin_url" value="<?php site_option('opt_linkedin_url'); ?>">
                <span class="input-group-addon"><i class="fa fa-linkedin-square"></i></span>
            </div>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-3 control-label">Youtube</label>
        <div class="col-sm-9">
            <div class="input-group">
                <input type="text" class="form-control" name="opt_youtube_url" value="<?php site_option('opt_youtube_url'); ?>">
                <span class="input-group-addon"><i class="fa fa-youtube-square"></i></span>
            </div>
        </div>
    </div>
    <div class="box-footer clearfix">
        <a href="<?php echo site_url(); ?>" class="btn btn-default pull-left">Cancel</a>
        <button class="btn btn-info pull-right" type="submit">Submit</button>
    </div>
</form>
