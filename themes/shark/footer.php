<footer id="footer-wrapper">
	<div id="footer-top" class="content-padding">
		<div class="container">
			<div class="row">
				<div class="col-md-4 col-sm-4">
					<div class="footer-container">
						<form>
							<input type="text" placeholder="Search . . ." />
						</form>
						<div class="footer-menu">
							<ul>
								<li><a href="<?php echo site_url(); ?>">Home</a></li>
								<li><a href="<?php echo site_url('about'); ?>">About</a></li>
								<li><a href="<?php echo site_url('our_product/1'); ?>">Product</a></li>
								<li><a href="<?php echo site_url('support/new-product-development'); ?>">Support</a></li>
								<li><a href="<?php echo site_url('shark_career'); ?>">Career</a></li>
								<li><a href="<?php echo site_url('contact_us'); ?>">Contact</a></li>
							</ul>
						</div>
					</div>
				</div>
				<div class="col-md-4 col-sm-4">
					<div class="footer-container">
						<div class="row">
							<div class="col-md-12 col-sm-12">
								<div class="content-title">
									<h2>Contact us</h2>
									<hr class="orange-line">
								</div>
							</div>
						</div>
						<div class="footer-address">
							<ul>
								<li style="background:url(<?php asset_url('shark'); ?>images/icon-mail-orange.png) left center no-repeat; padding-left:25px;"><a href="#"><?php site_option('opt_contact_email'); ?></a></li>
								<li style="background: url(<?php asset_url('shark'); ?>images/icon-phone-orange.png) left center no-repeat; padding-left:25px;"><a href="#"><?php site_option('opt_contact_phone'); ?></a></li>
								<li style="background: url(<?php asset_url('shark'); ?>images/icon-location.png) left center no-repeat; padding-left:25px;"><a href="#"><?php site_option('opt_contact_addr'); ?></a></li>
							</ul>
						</div>
					</div>
				</div>
				<div class="col-md-4 col-sm-4">
					<div class="footer-container">
						<div class="row">
							<div class="col-md-12 col-sm-12">
								<div class="content-title">
									<h2>Get in touch</h2>
									<hr class="orange-line">
								</div>
							</div>
						</div>
						<div class="social-media-icon">
							<?php $socialmedia_navs = socialmedia_navs(); ?>
                            <ul>
                                <?php foreach ($socialmedia_navs as $link => $icon) : ?>
                                    <?php if(get_option($link)): ?>
                                        <li><a href="<?php echo get_option($link); ?>"><i class="<?php echo $icon; ?> text-warning"></i></a></li>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </ul>
	                    </div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div id="footer-bottom">
		<div class="container">
			<div class="row">
				<div class="col-md-12 col-sm-12 text-center">
					&copy copyright <?php site_option('opt_title'); ?> 2016. All Rights Reserved
				</div>
			</div>
		</div>
	</div>
</footer>
</body>
</html>
