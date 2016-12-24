<div class="row">
    <form class="form-horizontal" action="<?php echo current_url(); ?>" method="post">
        <div class="col-md-3">
            <div class="box">
                <div class="box-body box-profile">
                    <input type="hidden" id="avatar" name="sales_img" value="<?php echo $sales_img; ?>">
                    <?php if(!$sales_img) : ?>
                        <img class="profile-user-img img-responsive img-circle" src="<?php echo asset_url('shark'); ?>images/no_image.jpg" alt="User profile picture">
                    <?php else : ?>
                        <img class="profile-user-img img-responsive img-circle" src="<?php echo base_url('uploads/user/'.$sales_img); ?>" alt="User profile picture">
                    <?php endif; ?>
                    <p class="text-center" style="margin-top:15px;">
                        <a href="<?php echo base_url().'filemanager/dialog.php?type=0&field_id=avatar&fldr=sales'; ?>" class="btn btn-default btn-xs btn-popup"><i class="fa fa-pencil"></i> edit image</a>
                    </p>
                </div>
            </div>
        </div>
        <div class="col-md-9">
            <div class="box box-primary">
                <div class="box-body box-profile">
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Name<b class="text-danger">*</b></label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="sales_name" value="<?php echo set_value('sales_name', $sales_name); ?>">
                            <?php echo form_error('sales_name', '<p class="text-danger">', '</p>'); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Phone</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="sales_phone" value="<?php echo set_value('sales_phone', $sales_phone); ?>">
                            <?php echo form_error('sales_phone', '<p class="text-danger">', '</p>'); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Email</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="sales_email" value="<?php echo set_value('sales_email', $sales_email); ?>">
                            <?php echo form_error('sales_email', '<p class="text-danger">', '</p>'); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Website</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="sales_website" value="<?php echo set_value('sales_website', $sales_website); ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Address</label>
                        <div class="col-sm-9">
                            <textarea class="form-control" name="sales_address"><?php echo set_value('sales_address', $sales_address); ?></textarea>
                        </div>
                    </div>
                </div>
                <div class="box-footer clearfix">
                    <a href="<?php echo site_url('sales'); ?>" class="btn btn-default pull-left">Cancel</a>
                    <button class="btn btn-info pull-right" type="submit">Submit</button>
                </div>
            </div>
        </div>
    </form>
</div>
