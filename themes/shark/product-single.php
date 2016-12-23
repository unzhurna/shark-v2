<?php include "header.php"; ?>
<section id="page-banner">
	<div id="banner-image">
		<img src="<?php echo asset_url('shark'); ?>images/banner-product.jpg" alt="" />
	</div>
	<div id="banner-caption">
		<h1>Product</h1>
	</div>
</section>
<section class="page-with-sidebar content-padding">
	<div class="container">
		<div class="row">
			<div class="medium-3 col-sm-3">
				<div class="content-title">
					<h2>Search</h2>
					<hr class="orange-line" />
				</div>
				<div class="select-wrapper">
					<select>
						<option>Select by Category</option>
						<option>J Series</option>
						<option>Generator</option>
						<option>Dryer NH</option>
						<option>Screw RCB</option>
					</select>
				</div>
				<?php include "sidebar.php"; ?>
			</div>
			<div class="medium-9 col-sm-9">
				<div class="page-sidebar-content">
					<div class="row">
						<div class="col-md-6 col-sm-6">
							<div class="product-image"><img src="<?php echo base_url('uploads/product/'.$prod_image); ?>" /></div>
						</div>
						<div class="col-md-6 col-sm-6">
							<div class="product-details">
								<h2><?php echo $prod_name; ?></h2>
								<hr/>
								<?php echo $prod_desc; ?>
								<div class="quot-btn">
									<a href="<?php echo site_url('contact_us'); ?>">REQUEST QUOTATION</a>
								</div>
							</div>
						</div>
						<div class="col-md-12 col-sm-12">
							<hr/>
							<div class="content-padding">
								<div class="btn-group">
                  					<button type="button" class="btn btn-default"><i class="fa fa-share-alt"></i> Share</button>
									<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
										<span class="caret"></span>
										<span class="sr-only">Toggle Dropdown</span>
									</button>
									<ul class="dropdown-menu" role="menu" id="icon-share"></ul>
                				</div>
								<a href="" class="btn btn-default"><i class="fa fa-print"></i> Print</a>
								<a href="<?php echo base_url('uploads/product/'.$prod_manual); ?>" class="btn btn-default" target="_blank"><i class="fa fa-file-pdf-o"></i> Download Manual</a>
							</div>
						</div>
						<div class="col-md-12 col-sm-12">
							<?php include"part-detailprod.php"; ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<section id="related-post-container" class="content-padding">
	<div class="container">
		<div class="row">
			<div class="col-md-12 col-sm-12">
				<div class="content-title">
					<h2>Related Product</h2>
					<hr class="orange-line" />
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-3 col-sm-3">
				<div class="related-wrapper">
					<div class="related-image">
						<img src="assets/images/product/prodcat.png"/>
					</div>
					<div class="related-info text-center">
						<a href="#"><h3>Screw RCB 50A</h3></a>
						<p>Lorem ipsum more likely for graphical dummy text. . </p>
						<p class="viewdetail-btn"><a href="#">View Product</a></p>
					</div>
				</div>
			</div>
			<div class="col-md-3 col-sm-3">
				<div class="related-wrapper">
					<div class="related-image">
						<img src="assets/images/product/prodcat.png"/>
					</div>
					<div class="related-info text-center">
						<a href="#"><h3>Screw RCB 30A</h3></a>
						<p>Lorem ipsum more likely for graphical dummy text. . </p>
						<p class="viewdetail-btn"><a href="#">View Product</a></p>
					</div>
				</div>
			</div>
			<div class="col-md-3 col-sm-3">
				<div class="related-wrapper">
					<div class="related-image">
						<img src="assets/images/product/prodcat.png"/>
					</div>
					<div class="related-info text-center">
						<a href="#"><h3>Screw RCB 60A</h3></a>
						<p>Lorem ipsum more likely for graphical dummy text. . </p>
						<p class="viewdetail-btn"><a href="#">View Product</a></p>
					</div>
				</div>
			</div>
			<div class="col-md-3 col-sm-3">
				<div class="related-wrapper">
					<div class="related-image">
						<img src="assets/images/product/prodcat.png"/>
					</div>
					<div class="related-info text-center">
						<a href="#"><h3>Screw RCB 80A</h3></a>
						<p>Lorem ipsum more likely for graphical dummy text. . </p>
						<p class="viewdetail-btn"><a href="#">View Product</a></p>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<?php include "part-cta.php"; ?>
<?php include "footer.php"; ?>
