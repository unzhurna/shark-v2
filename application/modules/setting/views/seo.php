<form class="form-horizontal" action="<?php echo current_url(); ?>" method="post">
    <div class="form-group">
        <label class="col-sm-3 control-label">Meta Title</label>
        <div class="col-sm-9">
            <input type="text" class="form-control" name="opt_meta_title" value="<?php site_option('opt_meta_title'); ?>">
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-3 control-label">Meta Keyword</label>
        <div class="col-sm-9">
            <input type="text" class="form-control" name="opt_meta_keyword" value="<?php site_option('opt_meta_keyword'); ?>">
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-3 control-label">Meta Description</label>
        <div class="col-sm-9">
            <textarea class="form-control" name="opt_meta_description"><?php site_option('opt_meta_description'); ?></textarea>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-3 control-label">Google tracking ID</label>
        <div class="col-sm-9">
            <input type="text" class="form-control" name="opt_tracking_id" value="<?php site_option('opt_tracking_id'); ?>">
        </div>
    </div>
    <div class="box-footer clearfix">
        <a href="<?php echo site_url(); ?>" class="btn btn-default pull-left">Cancel</a>
        <button class="btn btn-info pull-right" type="submit">Submit</button>
    </div>
</form>
