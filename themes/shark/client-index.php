<?php include "header.php"; ?>
<section id="page-banner">
	<div id="banner-image">
		<img src="<?php echo asset_url('shark'); ?>images/banner-mitra.jpg" alt="" />
	</div>
	<div id="banner-caption">
		<h1>Klien</h1>
	</div>
</section>
<section class="page-without-sidebar content-padding">
	<div class="container">
		<div class="row">
			<div class="col-md-12 col-sm-12">
				<div class="content-title">
					<h2>Klien Kami</h2>
					<hr class="orange-line" />
				</div>
			</div>
		</div>
		<div class="page-content">
			<div class="row">
				<div id="client-wrapper" class="content-padding">
					<?php foreach ($client as $val) : ?>
						<div class="col-md-2 col-sm-2">
							<div class="client-container">
								<img src="<?php echo base_url('uploads/client/'.$val->client_logo); ?>" alt="logo-client" />
							</div>
						</div>
					<?php endforeach; ?>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12 col-sm-12">
					<div class="pagination-wrapper text-center">
						<?php echo $this->pagination->create_links(); ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<?php include "part-cta.php"; ?>
<?php include "footer.php"; ?>
