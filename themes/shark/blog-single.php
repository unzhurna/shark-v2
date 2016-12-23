<?php include "header.php"; ?>
<section id="page-banner">
	<div id="banner-image">
		<img src="assets/images/banner-Blog.jpg" alt="" />
	</div>
	<div id="banner-caption">
		<h1>Blog</h1>
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
				<div class="search-form">
					<form>
						<input type="text" placeholder="Search . . ." />
					</form>
				</div>
				<div class="content-title">
					<h2>Categories</h2>
					<hr class="orange-line" />
				</div>
				<div class="categories-sidebar">
					<ul>
						<li><a href="#">News</a></li>
						<li><a href="#">CSR</a></li>
						<li><a href="#">Instalation</a></li>
					</ul>
				</div>
				<div class="content-title">
					<h2>Download</h2>
					<hr class="orange-line" />
				</div>
				<div class="download-banner-wrapper">
					<p><a href="#"><img src="assets/images/download.jpg" /></a></p>
				</div>
				<div class="content-title">
					<h2>Subscribe</h2>
					<hr class="orange-line" />
				</div>
				<div class="subscribe-container">
					<div class="subscribe-content">
						<p>Keep update with our latest<br/>
							Product or Services</p>
							<form action="#">
								<input type="text" name="subscribe" place-holder="Your Email"/>
								<input type="submit" value="subscribe"/>
							</form>
					</div>
				</div>
			</div>
			<div class="medium-9 col-sm-9">
				<div class="page-sidebar-content">
					<h3>News /Index</h3>
					<hr/>
					<div class="news-container">
						<div class="news-image-index">
							<img src="<?php echo base_url('uploads/post/'.$post_image); ?>" />
						</div>
						<div class="news-title">
							<a href="#"><h4><?php echo $post_title; ?></h4></a>
							<hr class="orange-line"; />
						</div>
						<div class="news-content">
							<p><span class="post-date">10 Februari 2015</span> posted in <span class="post-category"><?php echo $post_category; ?></span></p>
							<?php echo $post_content; ?>
						</div>
					</div>
					<hr/>
					<div class="share-button">
						<div class="btn-group">
							<button type="button" class="btn btn-default"><i class="fa fa-share-alt"></i> Share</button>
							<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
								<span class="caret"></span>
								<span class="sr-only">Toggle Dropdown</span>
							</button>
							<ul class="dropdown-menu" role="menu" id="icon-share"></ul>
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
					<h2>Related Post</h2>
					<hr class="orange-line" />
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-3 col-sm-3">
				<div class="related-wrapper">
					<div class="related-image">
						<img src="assets/images/news-dummy.jpg" />
					</div>
					<div class="related-info text-center">
						<a href="#"><h3>News Title</h3></a>
						<p>Lorem ipsum more likely for graphical dummy text. . </p>
						<p class="viewdetail-btn"><a href="#">Reead more</a></p>
					</div>
				</div>
			</div>
			<div class="col-md-3 col-sm-3">
				<div class="related-wrapper">
					<div class="related-image">
						<img src="assets/images/news-dummy.jpg" />
					</div>
					<div class="related-info text-center">
						<a href="#"><h3>News Title</h3></a>
						<p>Lorem ipsum more likely for graphical dummy text. . </p>
						<p class="viewdetail-btn"><a href="#">Reead more</a></p>
					</div>
				</div>
			</div>
			<div class="col-md-3 col-sm-3">
				<div class="related-wrapper">
					<div class="related-image">
						<img src="assets/images/news-dummy.jpg" />
					</div>
					<div class="related-info text-center">
						<a href="#"><h3>News Title</h3></a>
						<p>Lorem ipsum more likely for graphical dummy text. . </p>
						<p class="viewdetail-btn"><a href="#">Reead more</a></p>
					</div>
				</div>
			</div>
			<div class="col-md-3 col-sm-3">
				<div class="related-wrapper">
					<div class="related-image">
						<img src="assets/images/news-dummy.jpg" />
					</div>
					<div class="related-info text-center">
						<a href="#"><h3>News Title</h3></a>
						<p>Lorem ipsum more likely for graphical dummy text. . </p>
						<p class="viewdetail-btn"><a href="#">Reead more</a></p>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<?php include "part-cta.php"; ?>
<?php include "footer.php"; ?>
