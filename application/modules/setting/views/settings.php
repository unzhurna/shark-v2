<div class="row">
    <div class="col-md-12">
        <div class="box box-default">
            <div class="box-header">
                <h3 class="box-title"><i class="fa fa-cogs"></i> Site Configurations</h3>
            </div>
            <div class="box-body">
                <div class="nav-tabs-custom">
                    <ul class="nav nav-tabs">
                        <li class="<?php menu_active('general_setting'); ?>"><a href="<?php echo site_url('general_setting'); ?>">General</a></li>
                        <li class="<?php menu_active('contact_setting'); ?>"><a href="<?php echo site_url('contact_setting'); ?>">Contact</a></li>
                        <li class="<?php menu_active('sosmed_setting'); ?>"><a href="<?php echo site_url('sosmed_setting'); ?>">Sosmed</a></li>
                        <li class="<?php menu_active('seo_setting'); ?>"><a href="<?php echo site_url('seo_setting'); ?>">SEO</a></li>
                        <li class="<?php menu_active('email_setting'); ?>"><a href="<?php echo site_url('email_setting'); ?>">Email</a></li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active">
                            <?php
                                echo $settings;
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
