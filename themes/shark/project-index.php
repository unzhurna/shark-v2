<?php include "header.php"; ?>
<section id="page-banner">
	<div id="banner-image">
		<img src="<?php echo asset_url('shark'); ?>images/banner-contact.jpg" alt="" />
	</div>
	<div id="banner-caption">
		<h1>PROYEK</h1>
	</div>
</section>
<section class="page-without-sidebar content-padding">
	<div class="container">
		<div class="row">
			<div class="col-md-12 col-sm-12">
				<div class="content-title">
					<h2>Proyek Kami</h2>
					<hr class="orange-line" />
				</div>
			</div>
		</div>
		<div class="page-content">
			<div class="row">
				<?php if($projects != null) : ?>
					<?php foreach ($projects as $val) : ?>
						<div class="col-md-3 col-sm-3">
							<div class="product-container content-padding">
								<div class="product-image">
									<a><img src="<?php echo base_url('uploads/project/'.$val->project_img); ?>" /></a>
								</div>
								<div class="product-title-btn">
									<div class="row">
										<div class="col-md-6 col-sm-6">
											<div class="product-title text-center"><a><h2><?php echo $val->project_name; ?></h2></a></div>
										</div>
									</div>
								</div>
							</div>
						</div>
					<?php endforeach; ?>
					<div class="row">
						<div class="col-md-12 col-sm-12">
							<div class="pagination-wrapper text-center">
								<?php echo $this->pagination->create_links(); ?>
							</div>
						</div>
					</div>
				<?php else : ?>
					<div class="col-md-12 col-sm-12">
						<div class="view-button">
							<h4>Tidak ada proyek ditemukan!</h4>
						</div>
					</div>
				<?php endif; ?>
			</div>
		</div>
	</div>
</section>
<?php include "part-cta.php"; ?>
<?php include "footer.php"; ?>
