<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <div class="box box-default">
            <div class="box-header with-border">
                <h3 class="box-title"><i class="fa fa-edit"></i> Partner Form</h3>
            </div>
            <form action="<?php echo current_url(); ?>" method="post">
                <div class="box-body">
                    <div class="form-group">
                        <input type="text" class="form-control input-lg" name="partner_name" value="<?php echo set_value('partner_name', $partner_name); ?>" placeholder="Partner Name">
                        <?php echo form_error('partner_name', '<span class="text-danger">', '</span>'); ?>
                    </div>
                    <div class="form-group">
                        <label>Phone<span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="partner_phone" value="<?php echo set_value('partner_phone', $partner_phone); ?>">
                        <?php echo form_error('partner_phone', '<span class="text-danger">', '</span>'); ?>
                    </div>
                    <div class="form-group">
                        <label>Email<span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="partner_email" value="<?php echo set_value('partner_email', $partner_email); ?>">
                        <?php echo form_error('partner_email', '<span class="text-danger">', '</span>'); ?>
                    </div>
                    <div class="form-group">
                        <label>Location<span class="text-danger">*</span></label>
                        <div class="row">
                            <div class="col-md-6">
                                <select class="form-control select2 provinces" name="province_id" style="width: 100%;">
                                    <option value="">Select Province</option>
                                    <?php foreach ($provinces as $province) : ?>
                                        <option value="<?php echo $province['id']; ?>" <?php echo ($province['id'] == $province_id) ? 'selected' : '' ; ?>><?php echo $province['name']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <select class="form-control select2 cities" name="city_id" style="width: 100%;">
                                    <option value="">Select City</option>
                                    <?php foreach ($cities as $city) : ?>
                                        <option value="<?php echo $city['id']; ?>" <?php echo ($city['id'] == $city_id) ? 'selected' : '' ; ?>><?php echo $city['name']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Address<span class="text-danger">*</span></label>
                        <textarea class="form-control" name="partner_addr" rows="2"><?php echo set_value('partner_addr', $partner_addr); ?></textarea>
                        <?php echo form_error('partner_addr', '<span class="text-danger">', '</span>'); ?>
                    </div>
                </div>
                <div class="box-footer">
                    <a href="<?php echo site_url('partners'); ?>" class="btn btn-default">Cancel</a>
                    <button type="submit" class="btn btn-info pull-right">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script src="<?php asset_url('admin'); ?>js/select2.min.js"></script>
<script>
    $(".select2").select2();

    $('.provinces').on('change', function(){
        $.ajax({
			type     : 'POST',
			url      : '<?php echo site_url('partner/get_all_cities'); ?>/'+$(this).val(),
			dataType : 'json',
			cache    : false,
			success: function(result)
			{
                $('.cities').empty();
                $.each(result, function(i, val) {
                    $('.cities').append('<option value='+val.id+'>'+val.name+'</option>');
    		    });
			}
		});
    });
</script>
