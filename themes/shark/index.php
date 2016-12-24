<?php include "header.php"; ?>
<div id="home-page">
	<section id="slider-wrapper">
		<div id="sliders">
			<?php foreach (get_home_banner() as $banner) : ?>
				<div class="slider"/>
					<div class="slider-image">
						<img src="<?php echo base_url('uploads/banner/'.$banner['banner']); ?>" />
					</div>
					<div class="slider-content">
						<?php echo $banner['caption']; ?>
						<div class="view-button">
							<a href="<?php echo $banner['link']; ?>" class="white-btn"><?php echo $banner['link_text']; ?></a>
						</div>
					</div>
				</div>
			<?php endforeach; ?>
		</div>
	</section>
	<section id="business-info-wrapper" class="gray-bg content-padding">
		<div class="container">
			<div class="row">
				<div class="col-md-12 col-sm-12">
					<div class="business-area-info">
						<div class="content-title">
							<h2>Who We Are?</h2>
							<hr class="orange-line" />
						</div>
						<div class="business-info-content">
							<?php site_option('opt_about'); ?>
						</div>
					</div>
				</div>
			</div>
			<?php $services = service_widget(); ?>
			<?php if($services != null) : ?>
				<div class="row">
					<div class="col-md-12">
						<div class="content-title">
							<h2>Business Area</h2>
							<hr class="orange-line" />
						</div>
					</div>
				</div>
				<div class="row">
					<?php foreach ($services as $service) : ?>
						<div class="col-md-3 col-sm-3">
							<div class="business-area-info">
								<div class="business-area-image image-width">
									<a href="#"><img src="<?php echo base_url('uploads/post/'.$service['category_img']); ?>" /></a>
								</div>
								<div class="business-area-title">
									<h3><?php echo $service['category_name']; ?></h3>
									<hr class="orange-line" />
								</div>
								<div class="business-info-content">
									<p><?php echo $service['category_desc']; ?></p>
								</div>
							</div>
						</div>
					<?php endforeach; ?>
				</div>
			<?php endif; ?>
		</div>
	</section>
	<section id="3s-solution" class="content-padding">
		<div class="container">
			<div class="row">
				<div class="col-md-12 col-sm-12">
					<div class="content-title">
						<h2>Our 3s Solution</h2>
						<hr class="orange-line" />
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-2 col-sm-2">
					<div class="tab-side-button">
						<ul>
							<li><a href="#" class="side-button" data-tab="sales"><?php echo get_static_content('home-tab1', 'page_title'); ?></a></li>
							<li><a href="#" class="side-button" data-tab="service"><?php echo get_static_content('home-tab2', 'page_title'); ?></a></li>
							<li><a href="#" class="side-button" data-tab="sparepart"><?php echo get_static_content('home-tab3', 'page_title'); ?></a></li>
						</ul>
					</div>
				</div>
				<div class="col-md-7 col-sm-7">
					<div id="tab-side-content-wrapper">
						<div id="sales" class="tab-side-content" >
							<?php echo get_static_content('home-tab1', 'page_content'); ?>
						</div>
						<div id="service" class="tab-side-content" >
							<?php echo get_static_content('home-tab2', 'page_content'); ?>
						</div>
						<div id="sparepart" class="tab-side-content">
							<?php echo get_static_content('home-tab3', 'page_content'); ?>
						</div>
					</div>
				</div>
				<div class="col-md-3 col-sm-3">
					<img style="height: 350px;" src="<?php asset_url('shark'); ?>images/sol.png"/>
				</div>
			</div>
		</div>
	</section>
	<?php $projects = project_widget(); ?>
	<?php if($projects != null) : ?>
		<section id="latest-project" class="content-padding gray-bg-dark">
			<div class="container">
				<div class="row">
					<div class="col-md-12 col-sm-12">
						<div class="content-title">
							<h2>Our Latest Project</h2>
							<hr class="orange-line" />
						</div>
					</div>
				</div>
				<?php $i = 1; ?>
				<?php foreach ($projects as $project) : ?>
					<?php if ($i%4 == 1) {  echo '<div class="row latest-project-container">'; } ?>
						<div class="col-md-3 col-sm-3">
							<div class="project-wrapper">
								<div class="project-image">
									<img src="<?php echo base_url('uploads/project/'.$project['project_img']); ?>" />
								</div>
								<a href="#">
									<div class="content-absolute">
										<div class="project-title">
											<h3><?php echo $project['project_name']; ?></h3>
										</div>
									</div>
								</a>
							</div>
						</div>
					<?php if ($i%4 == 0) {  echo "</div>"; } ?>
					<?php $i++; ?>
				<?php endforeach; ?>
				<div class="row">
					<div class="col-md-12 col-sm-12">
						<div class="view-button">
							<a href="<?php echo site_url('our_project/1'); ?>" class="white-btn">View All</a>
						</div>
					</div>
				</div>
			</div>
		</section>
	<?php endif; ?>
	<?php include"part-mitra.php";?>
	<?php include"part-klien.php";?>
	<?php include"part-sales.php";?>
	<?php include"part-news.php";?>
</div>
<?php include "part-cta.php"; ?>
<?php include "footer.php"; ?>
