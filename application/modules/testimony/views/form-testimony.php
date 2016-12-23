<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <div class="box box-default">
            <div class="box-header with-border">
                <h3 class="box-title"><i class="fa fa-edit"></i> Testimony Form</h3>
            </div>
            <form action="<?php echo current_url(); ?>" method="post">
                <div class="box-body">
                    <div class="form-group">
                        <input type="text" class="form-control input-lg" name="testi_name" value="<?php echo set_value('testi_name', $testi_name); ?>" placeholder="Client name here...">
                        <?php echo form_error('testi_name', '<span class="text-danger">', '</span>'); ?>
                    </div>
                    <div class="form-group">
                        <label>Title<span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="testi_title" value="<?php echo set_value('testi_title', $testi_title); ?>">
                        <?php echo form_error('testi_title', '<span class="text-danger">', '</span>'); ?>
                    </div>
                    <div class="form-group">
                        <label>Message<span class="text-danger">*</span></label>
                        <textarea class="form-control" name="testi_content" rows="5"><?php echo set_value('testi_content', $testi_content); ?></textarea>
                        <?php echo form_error('testi_content', '<span class="text-danger">', '</span>'); ?>
                    </div>
                </div>
                <div class="box-footer">
                    <a href="<?php echo site_url('testimony'); ?>" class="btn btn-default">Cancel</a>
                    <button type="submit" class="btn btn-info pull-right">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
