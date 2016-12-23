<form class="form-horizontal" action="<?php echo current_url(); ?>" method="post">
    <div class="form-group">
        <label class="col-sm-3 control-label">Site Logo</label>
        <div class="col-sm-9">
            <div class="input-group">
                <input type="text" class="form-control" id="opt_logo" name="opt_logo" value="<?php site_option('opt_logo'); ?>">
                <span class="input-group-btn">
                    <a href="<?php echo site_url('filemanager/dialog.php?type=0&field_id=opt_logo&fldr=site'); ?>" class="btn btn-default btn-popup"><i class="fa fa-upload"></i></a>
                </span>
            </div>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-3 control-label">Site Title</label>
        <div class="col-sm-9">
            <input type="text" class="form-control" name="opt_title" value="<?php site_option('opt_title'); ?>">
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-3 control-label">Tagline</label>
        <div class="col-sm-9">
            <input type="text" class="form-control" name="opt_tagline" value="<?php site_option('opt_tagline'); ?>">
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-3 control-label">Overview</label>
        <div class="col-sm-9">
            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#tab_1" data-toggle="tab" aria-expanded="true">About</a></li>
                    <li><a href="#tab_2" data-toggle="tab" aria-expanded="false">Vision</a></li>
                    <li><a href="#tab_3" data-toggle="tab" aria-expanded="false">Mission</a></li>
                    <li><a href="#tab_4" data-toggle="tab" aria-expanded="false">Value</a></li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="tab_1">
                        <textarea class="form-control" name="opt_about"><?php site_option('opt_about'); ?></textarea>
                    </div>
                    <div class="tab-pane" id="tab_2">
                        <textarea class="form-control" name="opt_vision"><?php site_option('opt_vision'); ?></textarea>
                    </div>
                    <div class="tab-pane" id="tab_3">
                        <textarea class="form-control" name="opt_mission"><?php site_option('opt_mission'); ?></textarea>
                    </div>
                    <div class="tab-pane" id="tab_4">
                        <textarea class="form-control" name="opt_value"><?php site_option('opt_value'); ?></textarea>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-3 control-label">Download</label>
        <div class="col-sm-9">
            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#tab_5" data-toggle="tab" aria-expanded="true">Profile</a></li>
                    <li><a href="#tab_6" data-toggle="tab" aria-expanded="false">Brocure</a></li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="tab_5">
                        <div class="input-group">
                            <input type="text" class="form-control" id="opt_profile_pdf" name="opt_profile_pdf" value="<?php site_option('opt_profile_pdf'); ?>">
                            <span class="input-group-btn">
                                <a href="<?php echo site_url('filemanager/dialog.php?type=0&field_id=opt_profile_pdf&fldr=download'); ?>" class="btn btn-default btn-popup"><i class="fa fa-upload"></i></a>
                            </span>
                        </div>
                    </div>
                    <div class="tab-pane" id="tab_6">
                        <div class="input-group">
                            <input type="text" class="form-control" id="opt_brocure_pdf" name="opt_brocure_pdf" value="<?php site_option('opt_brocure_pdf'); ?>">
                            <span class="input-group-btn">
                                <a href="<?php echo site_url('filemanager/dialog.php?type=0&field_id=opt_brocure_pdf&fldr=download'); ?>" class="btn btn-default btn-popup"><i class="fa fa-upload"></i></a>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="box-footer clearfix">
        <a href="<?php echo site_url(); ?>" class="btn btn-default pull-left">Cancel</a>
        <button class="btn btn-info pull-right" type="submit">Submit</button>
    </div>
</form>
<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
<script>
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
