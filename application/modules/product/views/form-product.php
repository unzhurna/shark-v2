<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title"><i class="fa fa-pencil"></i> Product Form</h3>
            </div>
            <div class="box-body">
                <form action="<?php echo current_url(); ?>" method="post">
                    <div class="row">
                        <div class="col-md-9">
                            <div class="form-group">
                                <input type="text" class="form-control input-lg title" name="prod_name" value="<?php echo set_value('prod_name', $prod_name); ?>" placeholder="Product name here...">
                                <input type="hidden" class="slug" name="prod_slug" value="<?php echo $prod_slug; ?>">
                                <?php echo form_error('prod_name', '<p class="text-danger">', '</p>'); ?>
                            </div>
                            <div class="nav-tabs-custom">
                                <ul class="nav nav-tabs">
                                    <li class="active"><a href="#tab_1" data-toggle="tab" aria-expanded="true">Description</a></li>
                                    <li><a href="#tab_2" data-toggle="tab" aria-expanded="false">Fiture</a></li>
                                    <li><a href="#tab_3" data-toggle="tab" aria-expanded="false">Specification</a></li>
                                    <li><a href="#tab_4" data-toggle="tab" aria-expanded="false">Sparepart</a></li>
                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane active" id="tab_1">
                                        <?php echo form_error('prod_desc', '<p class="text-danger">', '</p>'); ?>
                                        <textarea class="form-control" name="prod_desc"><?php echo set_value('prod_desc', $prod_desc); ?></textarea>
                                    </div>
                                    <div class="tab-pane" id="tab_2">
                                        <?php echo form_error('prod_fiture', '<p class="text-danger">', '</p>'); ?>
                                        <textarea class="form-control" name="prod_fiture"><?php echo set_value('prod_fiture', $prod_fiture); ?></textarea>
                                    </div>
                                    <div class="tab-pane" id="tab_3">
                                        <?php echo form_error('prod_spec', '<p class="text-danger">', '</p>'); ?>
                                        <textarea class="form-control" name="prod_spec"><?php echo set_value('prod_spec', $prod_spec); ?></textarea>
                                    </div>
                                    <div class="tab-pane" id="tab_4">
                                        <select class="form-control select2" style="width: 100%;">
                                            <option value="">Select Parts</option>
                                            <?php foreach ($spareparts as $sparepart) : ?>
                                                <option value="<?php echo $sparepart['part_id']; ?>"><?php echo $sparepart['part_name']; ?></option>
                                            <?php endforeach;?>
                                        </select>
                                        <table class="table table-bordered table-striped dataTable no-footer">
                                            <tbody id=parts>
                                                <?php if(isset($parts)) : ?>
                                                    <?php foreach ($parts as $val) : ?>
                                                        <?php foreach ($spareparts as $sparepart) : ?>
                                                            <?php if($val['part_id'] == $sparepart['part_id']) : ?>
                                                            <tr>
                                                                <td><button class="btn btn-link btn-remove" type="button"><i class="fa fa-trash"></i></button></td>
                                                                <td><img class="img-part img-bordered-sm" src="<?php echo base_url('uploads/sparepart/'.$sparepart['part_img']); ?>"></td>
                                                                <td><input type="hidden" name="part_id[]" value="<?php echo $sparepart['part_id']; ?>"><?php echo $sparepart['part_name']; ?></td>
                                                                <td><?php echo $sparepart['part_code']; ?></td>
                                                            </tr>
                                                            <?php endif; ?>
                                                        <?php endforeach;?>
                                                    <?php endforeach;?>
                                                <?php endif; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
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
                                    <select class="form-control" name="prod_status">
                                        <option value="draft" <?php echo ($prod_status == 'draft') ? 'selected' : ''?>>Draft</option>
                                        <option value="publish" <?php echo ($prod_status == 'publish') ? 'selected' : ''?>>Publish</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Video</label>
                                    <input type="text" class="form-control" name="prod_video" value="<?php echo set_value('prod_video', $prod_video); ?>" placeholder="Youtube Video ID">
                                </div>
                                <div class="form-group">
                                    <label>Image</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="prod_image" name="prod_image" value="<?php echo set_value('prod_image', $prod_image); ?>">
                                        <span class="input-group-btn">
                                            <a href="<?php echo base_url().'filemanager/dialog.php?type=0&field_id=prod_image&fldr=product'; ?>" class="btn btn-default btn-popup"><i class="fa fa-upload"></i></a>
                                        </span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Manual Book</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="prod_manual" name="prod_manual" value="<?php echo set_value('prod_manual', $prod_manual); ?>">
                                        <span class="input-group-btn">
                                            <a href="<?php echo base_url().'filemanager/dialog.php?type=0&field_id=prod_manual&fldr=product/manual'; ?>" class="btn btn-default btn-popup"><i class="fa fa-upload"></i></a>
                                        </span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <a href="<?php echo site_url('products'); ?>" class="btn btn-default">Cancel</a>
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
<script src="<?php asset_url('admin'); ?>js/select2.min.js"></script>
<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
<script>
    $('.slug').slugify('.title');

    $(".select2").select2();

    $(".select2").on('change', function() {
        $.get('<?php echo site_url('product/sparepart/get_list'); ?>/'+$(this).val(), function(result) {
            if(result.alert == 'success')
            {
                $('#parts').append(
                    '<tr>'+
                        '<td><button class="btn btn-link btn-remove" type="button"><i class="fa fa-trash"></i></button></td>'+
                        '<td><img class="img-part img-bordered-sm" src="<?php echo base_url('uploads/sparepart'); ?>/'+result.part_img+'"></td>'+
                        '<td><input type="hidden" name="part_id[]" value="'+result.part_id+'">'+result.part_name+'</td>'+
                        '<td>'+result.part_code+'</td>'+
                    '</tr>'
                );
                $('.btn-remove').on('click', function() {
                    $(this).parent().parent().remove();
                });
            }
        });
    });

    $('.btn-remove').on('click', function() {
        $(this).parent().parent().remove();
    });

    $('.btn-popup').on('click', function(e){
        e.preventDefault();
        var filemanager = $(this).attr('href');
        $('iframe.file').attr('src', filemanager);
        $('#myModal').modal('show');
    });


    tinymce.init({
      selector: 'textarea',
      height: 150,
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
