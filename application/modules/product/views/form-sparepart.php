<div class="row">
    <div class="col-md-7 col-md-offset-2">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title"><i class="fa fa-cog"></i> Spareparts Form</h3>
            </div>
            <div class="box-body">
                <form action="<?php echo current_url(); ?>" method="post">
                    <div class="form-group">
                        <label>Part Image</label>
                        <div class="input-group">
                            <input type="text" class="form-control" id="part_img" name="part_img" value="<?php echo set_value('part_img', $part_img); ?>">
                            <span class="input-group-btn">
                                <a href="<?php echo base_url().'filemanager/dialog.php?type=0&field_id=part_img&fldr=sparepart'; ?>" class="btn btn-default btn-popup"><i class="fa fa-upload"></i></a>
                            </span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Part Name<b class="text-danger">*</b></label>
                        <input type="text" class="form-control" name="part_name" value="<?php echo set_value('part_name', $part_name); ?>">
                        <?php echo form_error('part_name', '<p class="text-danger">', '</p>'); ?>
                    </div>
                    <div class="form-group">
                        <label>Part Code<b class="text-danger">*</b></label>
                        <input type="text" class="form-control" name="part_code" value="<?php echo set_value('part_code', $part_code); ?>">
                        <?php echo form_error('part_code', '<p class="text-danger">', '</p>'); ?>
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <textarea class="form-control" name="part_desc" rows="3"><?php echo set_value('part_desc', $part_desc); ?></textarea>
                    </div>
                    <div class="form-group">
                        <a href="<?php echo site_url('spareparts'); ?>" class="btn btn-default">Cancel</a>
                        <button type="submit" class="btn btn-info pull-right">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
