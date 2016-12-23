<div class="row">
    <form class="form-horizontal" action="<?php echo current_url(); ?>" method="post">
        <div class="col-md-3">
            <div class="box">
                <div class="box-body box-profile">
                    <input type="hidden" id="avatar" name="avatar" value="<?php echo $avatar; ?>">
                    <?php if(!$avatar) : ?>
                        <img class="profile-user-img img-responsive img-circle" src="<?php echo asset_url('shark'); ?>images/no_image.jpg" alt="User profile picture">
                    <?php else : ?>
                        <img class="profile-user-img img-responsive img-circle" src="<?php echo base_url('uploads/user/'.$avatar); ?>" alt="User profile picture">
                    <?php endif; ?>
                    <p class="text-center" style="margin-top:15px;">
                        <a href="<?php echo base_url().'filemanager/dialog.php?type=0&field_id=avatar&fldr=user'; ?>" class="btn btn-default btn-xs btn-popup"><i class="fa fa-pencil"></i> edit image</a>
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
                            <div class="row">
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="first_name" value="<?php echo set_value('first_name', $first_name); ?>" placeholder="First Name">
                                    <?php echo form_error('first_name', '<p class="text-danger">', '</p>'); ?>
                                </div>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="last_name" value="<?php echo set_value('last_name', $last_name); ?>" placeholder="Last Name">
                                    <?php echo form_error('last_name', '<p class="text-danger">', '</p>'); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Phone<b class="text-danger">*</b></label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="phone" value="<?php echo set_value('phone', $phone); ?>">
                            <?php echo form_error('phone', '<p class="text-danger">', '</p>'); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Email<b class="text-danger">*</b></label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="email" value="<?php echo set_value('email', $email); ?>" <?php echo ($id) ? 'readonly' : ''; ?>>
                            <?php echo form_error('email', '<p class="text-danger">', '</p>'); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Website</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="website" value="<?php echo set_value('website', $website); ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Address</label>
                        <div class="col-sm-9">
                            <textarea class="form-control" name="address"><?php echo set_value('address', $address); ?></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Password</label>
                        <div class="col-sm-9">
                            <div class="row">
                                <div class="col-md-6">
                                    <input type="password" class="form-control" name="password" value="" placeholder="Password">
                                    <?php echo form_error('password', '<p class="text-danger">', '</p>'); ?>
                                </div>
                                <div class="col-md-6">
                                    <input type="password" class="form-control" name="password_confirm" value="" placeholder="Password Confirm">
                                    <?php echo form_error('password_confirm', '<p class="text-danger">', '</p>'); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php if($id) : ?>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Group</label>
                            <div class="col-sm-9">
                                <div class="row">
                                    <?php foreach ($groups as $group): ?>
                                        <?php foreach ($currentGroups as $grp): ?>
                                            <div class="col-sm-6">
                                                <label>
                                                    <input type="radio" name="group" class="minimal" value="<?php echo $group['id'] ?>" <?php echo ($group['id'] == $grp->id) ? 'checked' : ''; ?>> <?php echo $group['name']; ?>
                                                </label>
                                            </div>
                                        <?php endforeach; ?>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Active</label>
                            <div class="col-sm-9">
                                <input type="checkbox" class="minimal" name="active" value="1" <?php echo ($active == 1) ? 'checked' : '';?>>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
                <div class="box-footer clearfix">
                    <a href="<?php echo site_url('users'); ?>" class="btn btn-default pull-left">Cancel</a>
                    <button class="btn btn-info pull-right" type="submit">Submit</button>
                </div>
            </div>
        </div>
    </form>
</div>
<script src="<?php asset_url('admin'); ?>js/icheck.min.js"></script>
<script>
    $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
        checkboxClass: 'icheckbox_square-blue',
        radioClass: 'iradio_square-blue'
    });
</script>
