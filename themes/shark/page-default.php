<?php include "header.php"; ?>
<section id="page-banner">
	<div id="banner-image">
		<img style="width:100%;" src="<?php echo base_url('uploads/banner/'.$page_image); ?>" alt="" />
	</div>
	<div id="banner-caption">
		<h1><?php echo $page_title; ?></h1>
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
					<h3><?php echo $page_title; ?></h3>
					<hr/>
					<!--<p><img src="<?php echo base_url('uploads/post/'.$page_image); ?>" /></p>-->
					<?php echo $page_content; ?>
					<hr/>
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
</section>
<?php include "part-cta.php"; ?>
<?php include "footer.php"; ?>
