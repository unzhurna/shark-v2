<?php include "header.php"; ?>
<section id="page-banner">
	<div id="banner-image">
		<img src="<?php echo asset_url('shark'); ?>images/banner-about.jpg" alt="" />
	</div>
	<div id="banner-caption">
		<h1>Sales Tim</h1>
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
					<h3>Sales Engineer Contact</h3>
					<hr/>
					<p>Mereka adalah Sales Engineer yang berdedikasi tinggi, salah satu ujung tombak perusahaan yang terus membuat perusahaan ini terus maju dan berkembang.</p>
					<div id="sales-info-wrapper">
						<div class="row">
							<?php foreach ($sales as $sales) : ?>
								<div class="col-md-4 col-sm-4">
									<div class="sales-container">
										<div class="sales-image text-center">
											<img class="img-circle" src="<?php echo base_url('uploads/sales/'.$sales['sales_img']); ?>" />
										</div>
										<div class="sales-info">
											<p class="text-center"><strong><?php echo $sales['sales_name'] ?></strong></p>
											<ul>
												<li style="background:url(assets/images/icon-mail-orange.png) left center no-repeat; padding:5px 0 5px 25px;"><a href="#"><?php echo $sales['sales_email'] ?></a></li>
												<li style="background: url(assets/images/icon-phone-orange.png) left center no-repeat; padding:5px 0 5px 25px;"><a href="#"><?php echo $sales['sales_phone'] ?></a></li>
												<li style="background: url(assets/images/icon-location.png) left center no-repeat; padding:5px 0 5px 25px;"><a href="#"><?php echo $sales['sales_address'] ?></a></li>
												<li style="background: url(assets/images/icon-link.png) left center no-repeat; padding:5px 0 5px 25px;"><a href="#"><?php echo $sales['sales_website'] ?></a></li>
											</ul>
										</div>
									</div>
								</div>
							<?php endforeach; ?>
						</div>
					</div>
					<hr/>
				</div>
			</div>
		</div>
	</div>
</section>
<?php include "part-cta.php"; ?>
<?php include "footer.php"; ?>
