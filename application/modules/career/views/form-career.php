<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <div class="box box-default">
            <div class="box-header with-border">
                <h3 class="box-title"><i class="fa fa-edit"></i> Vacancy Form</h3>
            </div>
            <form action="<?php echo current_url(); ?>" method="post">
                <div class="box-body">
                    <div class="form-group">
                        <input type="text" class="form-control input-lg title" name="career_title" value="<?php echo set_value('career_title', $career_title); ?>" placeholder="Title">
                        <input type="hidden" class="slug" name="career_slug" value="<?php echo $career_slug; ?>">
                        <?php echo form_error('career_title', '<span class="text-danger">', '</span>'); ?>
                    </div>
                    <div class="form-group">
                        <label>Open Reqruitment<span class="text-danger">*</span></label>
                        <div class="input-group">
                            <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                            <input type="text" class="form-control pull-right date-range" name="career_date">
                            <?php echo form_error('career_date', '<span class="text-danger">', '</span>'); ?>
                        </div>
                    </div>
                    <div class="form-group wrap_fields1">
                        <label>Qualifications<span class="text-danger">*</span></label>
                        <?php if(!$career_qualifications) : ?>
                            <div class="input-group">
                                <input type="text" class="form-control" name="career_qualifications[]">
                                <span class="input-group-btn">
                                    <button type="button" class="btn btn-info add_field1"><i class="fa fa-plus-circle"></i></button>
                                </span>
                            </div>
                        <?php else : ?>
                            <?php
                                $qi = 1;
                                $qualifications = explode('|', $career_qualifications);
                            ?>
                            <?php foreach ($qualifications as $q) : ?>
                                <div class="input-group" style="margin-top:10px;">
                                    <input type="text" class="form-control" name="career_qualifications[]" value="<?php echo $q; ?>">
                                    <span class="input-group-btn">
                                        <?php if($qi == 1) : ?>
                                            <button type="button" class="btn btn-info add_field1"><i class="fa fa-plus-circle"></i></button>
                                        <?php else : ?>
                                            <button type="button" class="btn btn-danger remove_field1"><i class="fa fa-minus-circle"></i></button>
                                        <?php endif; ?>
                                    </span>
                                </div>
                                <?php $qi++; ?>
                            <?php endforeach; ?>
                        <?php endif; ?>
                        <?php echo form_error('career_qualifications[]', '<span class="text-danger">', '</span>'); ?>
                    </div>
                    <div class="form-group wrap_fields2">
                        <label>Skills<span class="text-danger">*</span></label>
                        <?php if(!$career_skills) : ?>
                            <div class="input-group">
                                <input type="text" class="form-control" name="career_skills[]">
                                <span class="input-group-btn">
                                    <button type="button" class="btn btn-info add_field2"><i class="fa fa-plus-circle"></i></button>
                                </span>
                            </div>
                        <?php else : ?>
                            <?php
                                $si = 1;
                                $skills = explode('|', $career_skills);
                            ?>
                            <?php foreach ($skills as $s) : ?>
                                <div class="input-group" style="margin-top:10px;">
                                    <input type="text" class="form-control" name="career_skills[]" value="<?php echo $s; ?>">
                                    <span class="input-group-btn">
                                        <?php if($si == 1) : ?>
                                            <button type="button" class="btn btn-info add_field2"><i class="fa fa-plus-circle"></i></button>
                                        <?php else : ?>
                                            <button type="button" class="btn btn-danger remove_field2"><i class="fa fa-minus-circle"></i></button>
                                        <?php endif; ?>
                                    </span>
                                </div>
                                <?php $si++; ?>
                            <?php endforeach; ?>
                        <?php endif; ?>
                        <?php echo form_error('career_skills[]', '<span class="text-danger">', '</span>'); ?>
                    </div>
                    <div class="form-group">
                        <label>
                            <input type="checkbox" class="minimal" name="is_open" value="1" <?php echo ($is_open == 1) ? 'checked' : '';?>> Open Vacancy
                        </label>
                    </div>
                </div>
                <div class="box-footer">
                    <a href="<?php echo site_url('careers'); ?>" class="btn btn-default">Cancel</a>
                    <button type="submit" class="btn btn-info pull-right">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script src="<?php asset_url('admin'); ?>js/moment.min.js"></script>
<script src="<?php asset_url('admin'); ?>js/daterangepicker.js"></script>
<script src="<?php asset_url('admin'); ?>js/jquery.slugify.js"></script>
<script src="<?php asset_url('admin'); ?>js/icheck.min.js"></script>
<script>
$(document).ready(function() {

    $('.slug').slugify('.title');

    $('input[type="checkbox"].minimal').iCheck({
        checkboxClass: 'icheckbox_square-blue',
        radioClass: 'iradio_square-blue'
    });

    $('.date-range').daterangepicker({
        startDate: '<?php echo format_dmy($date_open); ?>',
        endDate: '<?php echo format_dmy($date_close); ?>',
        autoApply: true,
        locale: {
           separator: ' to ',
           format: 'DD-MM-YYYY'
        }
    });

    var max_fields       = 10;
    var wrapper1         = $(".wrap_fields1");
    var add_button1      = $(".add_field1");
    var x = 1;

    $(add_button1).click(function(e) {
        e.preventDefault();
        if(x < max_fields) {
            x++;
            $(wrapper1).append('<div class="input-group" style="margin-top:10px;"><input type="text" class="form-control" name="career_qualifications[]"><span class="input-group-btn"><button type="button" class="btn btn-danger remove_field1"><i class="fa fa-minus-circle"></i></button></span></div>');
        }
    });

    $(wrapper1).on('click','.remove_field1', function(e){
        e.preventDefault();
        $(this).parent().parent().remove(); x--;
    });

    var wrapper2         = $(".wrap_fields2");
    var add_button2      = $(".add_field2");

    $(add_button2).click(function(e) {
        e.preventDefault();
        if(x < max_fields) {
            x++;
            $(wrapper2).append('<div class="input-group" style="margin-top:10px;"><input type="text" class="form-control" name="career_skills[]"><span class="input-group-btn"><button type="button" class="btn btn-danger remove_field2"><i class="fa fa-minus-circle"></i></button></span></div>');
        }
    });

    $(wrapper2).on('click','.remove_field2', function(e){
        e.preventDefault();
        $(this).parent().parent().remove(); x--;
    });
});
</script>
