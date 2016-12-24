<?php include "header.php"; ?>
<section id="page-banner">
	<div id="banner-image">
		<img src="<?php echo asset_url('shark'); ?>images/banner-contact.jpg" alt="" />
	</div>
	<div id="banner-caption">
		<h1>PRODUCT</h1>
	</div>
</section>
<section class="page-without-sidebar content-padding">
	<div class="container">
		<div class="row">
			<div class="col-md-12 col-sm-12">
				<div class="content-title">
					<h2><?php echo $title; ?></h2>
					<hr class="orange-line" />
				</div>
			</div>
		</div>
		<div class="page-content">
			<div class="row">
				<?php if($products != null) : ?>
					<?php foreach ($products as $product) : ?>
						<div class="col-md-3 col-sm-3">
							<div class="product-container content-padding">
								<div class="product-image">
									<a href="<?php echo site_url('detail_product/'.$product->prod_slug); ?>"><img src="<?php echo base_url('uploads/product/'.$product->prod_image); ?>" /></a>
								</div>
								<div class="product-title-btn">
									<div class="row">
										<div class="col-md-6 col-sm-6">
											<div class="product-title text-center"><a href="<?php echo site_url('detail_product/'.$product->prod_slug); ?>"><h2><?php echo $product->prod_name; ?></h2></a></div>
										</div>
										<div class="col-md-6 col-sm-6">
											<div class="share-button text-center">
												<span class="st_sharethis" displayText="Share"></span>
											</div>
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
							<h4>Tidak ada produk ditemukan!</h4>
						</div>
					</div>
				<?php endif; ?>
			</div>
		</div>
	</div>
</section>
<?php include "part-cta.php"; ?>
<?php include "footer.php"; ?>
