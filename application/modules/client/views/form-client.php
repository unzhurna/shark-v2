<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <div class="box box-default">
            <div class="box-header with-border">
                <h3 class="box-title"><i class="fa fa-edit"></i> Client Form</h3>
            </div>
            <form action="<?php echo current_url(); ?>" method="post">
                <div class="box-body">
                    <div class="form-group">
                        <input type="text" class="form-control input-lg" name="client_name" value="<?php echo set_value('client_name', $client_name); ?>" placeholder="Client Name...">
                        <?php echo form_error('client_name', '<span class="text-danger">', '</span>'); ?>
                    </div>
                    <div class="form-group">
                        <label>Logo<span class="text-danger">*</span></label>
                        <div class="input-group">
                            <input type="text" class="form-control" id="client_logo" name="client_logo" value="<?php echo set_value('client_logo', $client_logo); ?>">
                            <span class="input-group-btn">
                                <a href="<?php echo base_url().'filemanager/dialog.php?type=0&field_id=client_logo&fldr=client'; ?>" class="btn btn-default btn-popup"><i class="fa fa-upload"></i></a>
                            </span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Phone</label>
                        <input type="text" class="form-control" name="client_phone" value="<?php echo set_value('client_phone', $client_phone); ?>">
                        <?php echo form_error('client_phone', '<span class="text-danger">', '</span>'); ?>
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="text" class="form-control" name="client_email" value="<?php echo set_value('client_email', $client_email); ?>">
                        <?php echo form_error('client_email', '<span class="text-danger">', '</span>'); ?>
                    </div>
                    <div class="form-group">
                        <label>Address</label>
                        <textarea class="form-control" name="client_addr" rows="2"><?php echo set_value('client_addr', $client_addr); ?></textarea>
                    </div>
                </div>
                <div class="box-footer">
                    <a href="<?php echo site_url('clients'); ?>" class="btn btn-default">Cancel</a>
                    <button type="submit" class="btn btn-info pull-right">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
