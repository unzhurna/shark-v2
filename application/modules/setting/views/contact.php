<form class="form-horizontal" action="<?php echo current_url(); ?>" method="post">
    <div class="form-group">
        <label class="col-sm-3 control-label">Head Office</label>
        <div class="col-sm-9">
            <!-- <input type="text" class="form-control" name="opt_contact_name" value="" placeholder="Head Office, Branch Office/ Manufacture"> -->
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-3 control-label">Phone</label>
        <div class="col-sm-9">
            <input type="text" class="form-control" name="opt_contact_phone" value="<?php site_option('opt_contact_phone'); ?>">
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-3 control-label">Email</label>
        <div class="col-sm-9">
            <input type="text" class="form-control" name="opt_contact_email" value="<?php site_option('opt_contact_email'); ?>">
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-3 control-label">Address</label>
        <div class="col-sm-9">
            <textarea class="form-control" name="opt_contact_addr"><?php site_option('opt_contact_addr'); ?></textarea>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-3 control-label">Manufacture Office</label>
        <div class="col-sm-9">
            <!-- <input type="text" class="form-control" name="opt_contact_name" value="" placeholder="Head Office, Branch Office/ Manufacture"> -->
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-3 control-label">Phone</label>
        <div class="col-sm-9">
            <input type="text" class="form-control" name="opt_contact_phone2" value="<?php site_option('opt_contact_phone2'); ?>">
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-3 control-label">Email</label>
        <div class="col-sm-9">
            <input type="text" class="form-control" name="opt_contact_email2" value="<?php site_option('opt_contact_email2'); ?>">
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-3 control-label">Address</label>
        <div class="col-sm-9">
            <textarea class="form-control" name="opt_contact_addr2"><?php site_option('opt_contact_addr2'); ?></textarea>
        </div>
    </div>
    <div class="box-footer clearfix">
        <a href="<?php echo site_url(); ?>" class="btn btn-default pull-left">Cancel</a>
        <button class="btn btn-info pull-right" type="submit">Submit</button>
    </div>
</form>
