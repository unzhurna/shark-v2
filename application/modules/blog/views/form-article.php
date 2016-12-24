<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title"><i class="fa fa-pencil"></i> Article Form</h3>
            </div>
            <div class="box-body">
                <form action="<?php echo current_url(); ?>" method="post">
                    <div class="row">
                        <div class="col-md-9">
                            <div class="form-group">
                                <input type="text" class="form-control input-lg title" name="post_title" value="<?php echo set_value('post_title', $post_title); ?>" placeholder="Title here...">
                                <input type="hidden" class="slug" name="post_slug" value="<?php echo $post_slug; ?>">
                                <?php echo form_error('post_title', '<p class="text-danger">', '</p>'); ?>
                            </div>
                            <div class="form-group">
                                <?php echo form_error('post_content', '<p class="text-danger">', '</p>'); ?>
                                <textarea class="form-control" name="post_content"><?php echo set_value('post_content', $post_content); ?></textarea>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div style="background: #eee; padding: 10px;">
                                <div class="form-group">
                                    <label>Category</label>
                                    <select class="form-control" name="category_id">
                                        <option value="">Select Categories</option>
                                        <?php foreach ($categories as $category) : ?>
                                            <option value="<?php echo $category['category_id']; ?>" <?php echo ($category['category_id'] == $category_id) ? 'selected' : ''?>><?php echo $category['category_name']; ?></option>
                                        <?php endforeach;?>
                                    </select>
                                    <?php echo form_error('category_id', '<p class="text-danger">', '</p>'); ?>
                                </div>
                                <div class="form-group">
                                    <label>Status</label>
                                    <select class="form-control" name="post_status">
                                        <option value="draft" <?php echo ($post_status == 'draft') ? 'selected' : ''?>>Draft</option>
                                        <option value="publish" <?php echo ($post_status == 'publish') ? 'selected' : ''?>>Publish</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Image</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="post_image" name="post_image" value="<?php echo set_value('post_image', $post_image); ?>">
                                        <span class="input-group-btn">
                                            <a href="<?php echo base_url().'filemanager/dialog.php?type=0&field_id=post_image&fldr=post'; ?>" class="btn btn-default btn-popup"><i class="fa fa-upload"></i></a>
                                        </span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <a href="<?php echo site_url('articles'); ?>" class="btn btn-default">Cancel</a>
                                    <button type="submit" class="btn btn-info pull-right">Submit</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script src="<?php asset_url('admin'); ?>js/jquery.slugify.js"></script>
<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
<script>

    $('.slug').slugify('.title');

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
