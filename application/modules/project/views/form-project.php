<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <div class="box box-default">
            <div class="box-header with-border">
                <h3 class="box-title"><i class="fa fa-edit"></i> Project Form</h3>
            </div>
            <form action="<?php echo current_url(); ?>" method="post">
                <div class="box-body">
                    <div class="form-group">
                        <input type="text" class="form-control input-lg" name="project_name" value="<?php echo set_value('project_name', $project_name); ?>" placeholder="Project name here...">
                        <?php echo form_error('project_name', '<span class="text-danger">', '</span>'); ?>
                    </div>
                    <div class="form-group">
                        <label>Image<span class="text-danger">*</span></label>
                        <div class="input-group">
                            <input type="text" class="form-control" id="project_img" name="project_img" value="<?php echo set_value('project_img', $project_img); ?>">
                            <span class="input-group-btn">
                                <a href="<?php echo base_url().'filemanager/dialog.php?type=0&field_id=project_img&fldr=project'; ?>" class="btn btn-default btn-popup"><i class="fa fa-upload"></i></a>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="box-footer">
                    <a href="<?php echo site_url('projects'); ?>" class="btn btn-default">Cancel</a>
                    <button type="submit" class="btn btn-info pull-right">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
