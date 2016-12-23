<div class="row">
    <div class="col-md-7 col-md-offset-2">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title"><i class="fa fa-tags"></i> Product Category Form</h3>
            </div>
            <div class="box-body">
                <form action="<?php echo current_url(); ?>" method="post">
                    <div class="form-group">
                        <label>Category<b class="text-danger">*</b></label>
                        <input type="text" class="form-control title" name="category_name" value="<?php echo set_value('category_name', $category_name); ?>" placeholder="Title here...">
                        <input type="hidden" class="slug" name="category_slug" value="<?php echo set_value('category_slug', $category_slug); ?>">
                        <?php echo form_error('category_name', '<p class="text-danger">', '</p>'); ?>
                    </div>
                    <div class="form-group">
                        <label>Thumbnail</label>
                        <div class="input-group">
                            <input type="text" class="form-control" id="category_img" name="category_img" value="<?php echo set_value('category_img', $category_img); ?>">
                            <span class="input-group-btn">
                                <a href="<?php echo base_url().'filemanager/dialog.php?type=0&field_id=category_img&fldr=post'; ?>" class="btn btn-default btn-popup"><i class="fa fa-upload"></i></a>
                            </span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <textarea class="form-control" name="category_desc" rows="3"><?php echo set_value('category_desc', $category_desc); ?></textarea>
                    </div>
                    <div class="form-group">
                        <label>
                            <input type="checkbox" class="minimal" name="is_show" value="1" <?php echo ($is_show == 1) ? 'checked' : '';?>> Show in front
                        </label>
                    </div>
                    <div class="form-group">
                        <a href="<?php echo site_url('product_categories'); ?>" class="btn btn-default">Cancel</a>
                        <button type="submit" class="btn btn-info pull-right">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="<?php asset_url('admin'); ?>js/jquery.slugify.js"></script>
<script src="<?php asset_url('admin'); ?>js/icheck.min.js"></script>
<script>
    $('.slug').slugify('.title');

    $('input[type="checkbox"].minimal').iCheck({
        checkboxClass: 'icheckbox_square-blue',
        radioClass: 'iradio_square-blue'
    });
</script>
