<?php $list = sales_widget(); ?>
<?php if($list != null): ?>
<section id="sales-wrapper" class="gray-bg-dark content-padding">
		<div class="container">
			<div class="row">
				<div class="col-md-12 col-sm-12">
					<div class="content-title">
						<h2>Our Sales Engineer Team</h2>
						<hr class="orange-line" />
					</div>
				</div>
			</div>
			<div id="sales-info-wrapper" class="content-padding">
				<div class="row">
					<div class="col-md-12 col-sm-12">
						<div id="sales-sliders">
							<?php foreach($list as $sales) : ?>
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
							<?php endforeach;?>
						</div>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-md-12 col-sm-12">
					<div class="view-button">
						<a href="<?php echo site_url('sales_team'); ?>" class="white-btn">View All</a>
					</div>
				</div>
			</div>
		</div>
	</section>
<?php endif; ?>
