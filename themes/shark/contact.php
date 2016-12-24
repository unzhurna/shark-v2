<?php include "header.php"; ?>
<section id="page-banner">
	<div id="banner-image">
		<img src="<?php asset_url('shark'); ?>images/banner-contact.jpg" alt="" />
	</div>
	<div id="banner-caption">
		<h1>Contact US</h1>
	</div>
</section>
<section class="page-without-sidebar content-padding">
	<div class="container">
		<div class="row">
			<div class="col-md-12 col-sm-12">
				<div class="content-title">
					<h2>Office Address & Contact</h2>
					<hr class="orange-line" />
				</div>
			</div>
		</div>
		<div class="page-content">
			<div class="row">
				<div class="col-md-12 col-sm-12">
					<p>Feel free to contact us via this contact form or call us directly to +6221 5903411. You can check the tab below to csee our
					Head Office or Branch Office contact details.</p>
				</div>
			</div>
			<div class="office-info-container content-padding">
				<div class="row">
					<div class="col-md-4 col-sm-4">
						<div id="office-image">
							<img src="<?php asset_url('shark'); ?>images/hodummy.jpg" />
						</div>
					</div>
					<div class="col-md-4 col-sm-4">
						<h3>Head Office</h3>
						<ul>
							<li style="background:url(<?php asset_url('shark'); ?>images/icon-mail-orange.png) left center no-repeat; padding-left:25px;"><a href="#"><?php site_option('opt_contact_email'); ?></a></li>
							<li style="background: url(<?php asset_url('shark'); ?>images/icon-phone-orange.png) left center no-repeat; padding-left:25px;"><a href="#"><?php site_option('opt_contact_phone'); ?></a></li>
							<li style="background: url(<?php asset_url('shark'); ?>images/icon-location.png) left center no-repeat; padding-left:25px;"><a href="#"><?php site_option('opt_contact_addr'); ?></a></li>
						</ul>
					</div>
					<div class="col-md-4 col-sm-4">
						<h3>Manufacture Office</h3>
						<ul>
							<li style="background:url(<?php asset_url('shark'); ?>images/icon-mail-orange.png) left center no-repeat; padding-left:25px;"><a href="#"><?php site_option('opt_contact_email2'); ?></a></li>
							<li style="background: url(<?php asset_url('shark'); ?>images/icon-phone-orange.png) left center no-repeat; padding-left:25px;"><a href="#"><?php site_option('opt_contact_phone2'); ?></a></li>
							<li style="background: url(<?php asset_url('shark'); ?>images/icon-location.png) left center no-repeat; padding-left:25px;"><a href="#"><?php site_option('opt_contact_addr2'); ?></a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div id="contact-form" class="gray-bg content-padding">
		<div class="container">
			<div class="row">
				<div class="col-md-12 col-sm-12">
					<div class="content-title">
						<h2>Contact Form</h2>
						<hr class="orange-line" />
					</div>
				</div>
			</div>
			<?php if($this->session->flashdata('success')) : ?>
				<div class="alert alert-success">
					<b><i class="fa fa-info-circle"></i> Berhasil!</b> Pesan anda telah dikirimkan.
				</div>
			<?php endif; ?>
			<?php if($this->session->flashdata('error')) : ?>
				<div class="alert alert-danger">
					<b><i class="fa fa-info-circle"></i> Gagal!</b> Pesan anda gagal dikirimkan.
				</div>
			<?php endif; ?>
			<form action="<?php echo current_url(); ?>" method="post">
				<div class="row">
					<div class="col-md-6 col-sm-6">
						<div class="input-container">
							<input type="text" name="contact_name" placeholder="Name" value="<?php echo set_value('contact_name'); ?>"/>
							<?php echo form_error('contact_name', '<span class="text-danger">', '</span>'); ?>
						</div>
					</div>
					<div class="col-md-6 col-sm-6">
						<div class="input-container">
							<input type="email" name="contact_email" placeholder="Email" value="<?php echo set_value('contact_email'); ?>"/>
							<?php echo form_error('contact_email', '<span class="text-danger">', '</span>'); ?>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-6 col-sm-6">
						<div class="input-container">
							<input type="text" name="contact_subject" placeholder="Subject" value="<?php echo set_value('contact_subject'); ?>"/>
							<?php echo form_error('contact_subject', '<span class="text-danger">', '</span>'); ?>
						</div>
					</div>
					<div class="col-md-6 col-sm-6">
						<div class="input-container">
							<input type="tel" name="contact_phone" placeholder="Phone" value="<?php echo set_value('contact_phone'); ?>"/>
							<?php echo form_error('contact_phone', '<span class="text-danger">', '</span>'); ?>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12 col-sm-12">
						<div class="input-container">
							<textarea rows="7" name="contact_msg"><?php echo set_value('contact_msg'); ?></textarea>
							<?php echo form_error('contact_msg', '<span class="text-danger">', '</span>'); ?>
						</div>
						<div class="input-container">
							<input type="submit" value="submit" />
						</div>
					</div>
				</div>
			</form>
		</div>
	</div>
</section>
<div id="map">
	<div class="container">
		<div class="row">
			<div class="col-md-12 col-sm-12">
				<div class="content-title">
					<h2>Map</h2>
					<hr class="orange-line" />
				</div>
			</div>
		</div>
	</div>
	<div id="map-dummy"  style="background:#333333; height: 400px; width:100%;">
		<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.6058595117593!2d106.57800883206245!3d-6.18347265781537!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69ffaadcad6769%3A0x3c2d483eb1384758!2sAir+Compressor+Shark!5e0!3m2!1sen!2s!4v1478712596602" width="100%" height="400" frameborder="0" style="border:0" allowfullscreen></iframe>
	</div>
</div>
<?php include "part-cta.php"; ?>
<?php include "footer.php"; ?>
