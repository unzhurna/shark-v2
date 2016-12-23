<?php include "header.php"; ?>
<section id="page-banner">
	<div id="banner-image">
		<img style="width:100%;" src="<?php echo get_static_content('about-page', 'page_image'); ?>" alt="" />
	</div>
	<div id="banner-caption">
		<h1><?php echo get_static_content('about-page', 'page_title'); ?></h1>
	</div>
</section>
<section class="page-with-sidebar content-padding">
	<div class="container">
		<div class="row">
			<div class="content-title">
				<h2>Company Overview</h2>
				<hr class="orange-line" />
			</div>
		</div>
		<div class="row">
			<div class="medium-3 col-sm-3">
				<div class="tab-side-button">
					<ul>
						<li><a href="#" class="side-button" data-tab="about">Company Overview</a></li>
						<li><a href="#" class="side-button" data-tab="visi">Visi</a></li>
						<li><a href="#" class="side-button" data-tab="misi">Misi</a></li>
						<li><a href="#" class="side-button" data-tab="nilai">Nilai</a></li>
					</ul>
				</div>
				<?php include "sidebar.php"; ?>
			</div>
				<div class="medium-9 col-sm-9">
					<div id="tab-side-content-wrapper">
						<div id="about" class="tab-side-content" >
							<h3>About</h3>
							<hr/>
							<?php site_option('opt_about'); ?>
							<hr/>
							<div class="share-button">
								<a href="#"><img src="<?php asset_url('shark'); ?>images/icon-share.png"/>&nbsp; Share</a>
							</div>
						</div>
						<div id="visi" class="tab-side-content" >
							<h3>Visi</h3>
							<hr/>
							<?php site_option('opt_vision'); ?>
							<hr/>
							<div class="share-button">
								<a href="#"><img src="<?php asset_url('shark'); ?>images/icon-share.png"/>&nbsp; Share</a>
							</div>
						</div>
						<div id="misi" class="tab-side-content">
							<h3>Misi</h3>
							<hr/>
							<?php site_option('opt_mission'); ?>
							<hr/>
							<div class="share-button">
								<a href="#"><img src="<?php asset_url('shark'); ?>images/icon-share.png"/>&nbsp; Share</a>
							</div>
						</div>
						<div id="nilai" class="tab-side-content">
							<h3>Nilai</h3>
							<hr/>
							<?php site_option('opt_value'); ?>
							<hr/>
							<div class="share-button">
								<a href="#"><img src="<?php asset_url('shark'); ?>images/icon-share.png"/>&nbsp; Share</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<?php include "part-cta.php"; ?>
	<?php include "footer.php"; ?>
