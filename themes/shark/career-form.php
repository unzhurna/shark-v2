<?php include "header.php"; ?>
<section id="page-banner">
	<div id="banner-image">
		<img src="<?php asset_url('shark'); ?>images/banner-support.jpg" alt="" />
	</div>
	<div id="banner-caption">
		<h1>Apply for <?php echo $career; ?></h1>
	</div>
</section>
<section class="page-with-sidebar content-padding">
	<div class="container">
		<div class="row">
			<div class="medium-3 col-sm-3">
				<?php include "sidebar.php"; ?>
			</div>
			<div class="medium-9 col-sm-9">
				<div class="page-sidebar-content">
					<p>Kirimkan CV anda untuk melamar posisi tersebut</p>
					<p>
						<?php if($this->session->flashdata('success')) : ?>
							<div class="alert alert-success">
								<b><i class="fa fa-info-circle"></i> Berhasil!</b> <?php echo $this->session->flashdata('success'); ?>.
							</div>
						<?php endif; ?>
						<?php if($this->session->flashdata('error')) : ?>
							<div class="alert alert-danger">
								<b><i class="fa fa-info-circle"></i></b> <?php echo $this->session->flashdata('error'); ?>.
							</div>
						<?php endif; ?>
						<form action="<?php echo current_url(); ?>" method="post" enctype="multipart/form-data">
							<?php echo form_error('cs_name', '<span class="text-danger">', '</span>'); ?>
							<p><input type="text" name="cs_name" placeholder="Nama"/></p>
							<?php echo form_error('cs_email', '<span class="text-danger">', '</span>'); ?>
							<p><input type="text" name="cs_email" placeholder="Email"/></p>
							<?php echo form_error('cs_phone', '<span class="text-danger">', '</span>'); ?>
							<p><input type="text" name="cs_phone" placeholder="Phone"/></p>
							<p><input type="file" name="cs_cv"/></p>
							<p><button type="submit" value="Submit">Kirim</button></p>
						</form>
					</p>
				</div>
			</div>
		</div>
	</div>
</section>
<?php include "part-cta.php"; ?>
<?php include "footer.php"; ?>
