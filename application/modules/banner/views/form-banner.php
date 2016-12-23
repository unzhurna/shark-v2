<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <div class="box box-default">
            <div class="box-header with-border">
                <h3 class="box-title"><i class="fa fa-edit"></i> Banner Form</h3>
            </div>
            <form action="<?php echo current_url(); ?>" method="post">
                <div class="box-body">
                    <div class="form-group">
                        <label>Banner Image<span class="text-danger">*</span></label>
                        <div class="input-group">
                            <input type="text" class="form-control" id="banner_img" name="banner" value="<?php echo set_value('banner', $banner); ?>">
                            <span class="input-group-btn">
                                <a href="<?php echo base_url().'filemanager/dialog.php?type=0&field_id=banner_img&fldr=banner'; ?>" class="btn btn-default btn-popup"><i class="fa fa-upload"></i></a>
                            </span>
                        </div>
                        <?php echo form_error('banner', '<span class="text-danger">', '</span>'); ?>
                    </div>
                    <div class="form-group">
                        <label>Banner Caption<span class="text-danger">*</span></label>
                        <?php echo form_error('caption', '<span class="text-danger">', '</span>'); ?>
                        <textarea class="form-control" name="caption"><?php echo set_value('caption', $caption); ?></textarea>
                    </div>
                    <div class="form-group">
                        <label>Banner Link<span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="link" value="<?php echo set_value('link', $link); ?>">
                        <?php echo form_error('link', '<span class="text-danger">', '</span>'); ?>
                    </div>
                    <div class="form-group">
                        <label>Banner Link Text<span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="link_text" value="<?php echo set_value('link_text', $link_text); ?>">
                        <?php echo form_error('link_text', '<span class="text-danger">', '</span>'); ?>
                    </div>
                    <div class="form-group">
                        <label>
                            <input type="checkbox" class="minimal" name="status" value="1" <?php echo ($status == 1) ? 'checked' : '';?>> Active
                        </label>
                    </div>
                </div>
                <div class="box-footer">
                    <a href="<?php echo site_url('banners'); ?>" class="btn btn-default">Cancel</a>
                    <button type="submit" class="btn btn-info pull-right">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="<?php asset_url('admin'); ?>js/icheck.min.js"></script>
<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
<script>
    $('input[type="checkbox"].minimal').iCheck({
        checkboxClass: 'icheckbox_square-blue',
        radioClass: 'iradio_square-blue'
    });

    tinymce.init({
      selector: 'textarea',
      height: 300,
      theme: 'modern',
      relative_urls: false,
      plugins: [
            "advlist autolink lists link image charmap print preview anchor",
            "searchreplace visualblocks code fullscreen",
            "insertdatetime media table contextmenu paste imagetools"
        ],
        toolbar: "insertfile undo redo | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media",
        external_filemanager_path:"<?php echo base_url();?>filemanager/",
        filemanager_title: "Filemanager" ,
        external_plugins: { "filemanager" : "<?php echo base_url();?>filemanager/plugin.min.js"}
    });
</script>
