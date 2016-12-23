<?php include "header.php"; ?>

<section id="page-banner">
	<div id="banner-image">
		<img src="<?php echo asset_url('shark'); ?>images/banner-blog.jpg" alt="" />
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
						<input type="text" name="keyword" placeholder="Search . . ." />
					</form>
				</div>
				<div class="content-title">
					<h2>Categories</h2>
					<hr class="orange-line" />
				</div>
				<div class="categories-sidebar">
					<?php echo category_widget(); ?>
				</div>
				<div class="content-title">
					<h2>Download</h2>
					<hr class="orange-line" />
				</div>
				<div class="download-banner-wrapper">
					<p><a href="#"><img src="<?php echo asset_url('shark'); ?>images/download.jpg" /></a></p>
				</div>
				<div class="content-title">
					<h2>Subscribe</h2>
					<hr class="orange-line" />
				</div>
				<div class="subscribe-container">
					<div class="subscribe-content">
						<p>Keep update with our latest<br/>Product or Services</p>
						<form action="#">
							<input type="text" name="subscribe" place-holder="Your Email"/>
							<input type="submit" value="subscribe"/>
						</form>
					</div>
				</div>
			</div>
			<div class="medium-9 col-sm-9">
				<div class="page-sidebar-content">
					<h3>News /Index</h3><hr/>
					<?php if(isset($posts)) : ?>
						<?php foreach ($posts as $post) : ?>
							<div class="news-container content-padding">
								<div class="news-image-index">
									<img src="<?php echo base_url('uploads/post/'.$post->post_image); ?>" />
								</div>
								<div class="news-title">
									<a href="<?php echo site_url('read/'.$post->post_slug); ?>"><h4><?php echo $post->post_title; ?></h4></a>
									<hr class="orange-line"; />
								</div>
								<div class="news-content">
									<p><span class="post-date"><?php echo $post->post_create; ?></span> posted in <span class="post-category"><?php echo $post->post_category; ?></span></p>
									<?php echo $post->post_excerpt; ?>
								</div>
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
						<?php endforeach; ?><hr/>
						<div class="pagination-wrapper text-center">
							<?php echo $this->pagination->create_links(); ?>
						</div>
					<?php else : ?>
						<h4>Tidak ada artikel ditemukan!</h4>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</div>
</section>

<?php include "part-cta.php"; ?>
<?php include "footer.php"; ?>
