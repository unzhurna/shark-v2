<form class="form-horizontal" action="<?php current_url(); ?>" method="post">
    <div class="form-group">
        <label class="col-sm-3 control-label">Email Protocol</label>
        <div class="col-sm-9">
            <div class="row">
                <div class="col-sm-6">
                    <label>
                        <input type="radio" name="opt_email_protocol" class="mail_protocol" value="smtp" <?php echo (get_option('opt_email_protocol') == 'smtp') ? 'checked' : ''; ?>> SMTP-protocol
                    </label>
                </div>
                <div class="col-sm-6">
                    <label>
                        <input type="radio" name="opt_email_protocol" class="mail_protocol" value="mail" <?php echo (get_option('opt_email_protocol') == 'mail') ? 'checked' : ''; ?>> mail-protocol
                    </label>
                </div>
            </div>
        </div>
    </div>
    <?php $show = (get_option('opt_email_protocol') != 'smtp') ? 'style="display:none;"' : ''; ?>
    <div class="form-group smtp" <?php echo $show; ?>>
        <label class="col-sm-3 control-label">SMTP Host</label>
        <div class="col-sm-9">
            <input type="text" class="form-control" name="opt_smtp_host" value="<?php site_option('opt_smtp_host'); ?>">
        </div>
    </div>
    <div class="form-group smtp" <?php echo $show; ?>>
        <label class="col-sm-3 control-label">SMTP Port</label>
        <div class="col-sm-9" <?php echo $show; ?>>
            <input type="text" class="form-control" name="opt_smtp_port" value="<?php site_option('opt_smtp_port'); ?>">
        </div>
    </div>
    <div class="form-group smtp" <?php echo $show; ?>>
        <label class="col-sm-3 control-label">SMTP Username</label>
        <div class="col-sm-9">
            <input type="text" class="form-control" name="opt_smtp_user" value="<?php site_option('opt_smtp_user'); ?>">
        </div>
    </div>
    <div class="form-group smtp" <?php echo $show; ?>>
        <label class="col-sm-3 control-label">SMTP Password</label>
        <div class="col-sm-9">
            <input type="password" class="form-control" name="opt_smtp_pass" value="<?php site_option('opt_smtp_pass'); ?>">
        </div>
    </div>
    <div class="box-footer clearfix">
        <a href="<?php echo site_url(); ?>" class="btn btn-default pull-left">Cancel</a>
        <button class="btn btn-info pull-right" type="submit">Submit</button>
    </div>
</form>
<script>
    $('.mail_protocol').on('click', function() {

        var act = $(this).val();

        switch (act) {
            case 'smtp':
                $('.smtp').show();
                break;
            case 'mail':
                $('.smtp').hide();
                break;

        }
    });

    $('input[type="radio"].minimal').iCheck({
        checkboxClass: 'icheckbox_square-blue',
        radioClass: 'iradio_square-blue'
    });
</script>
