<?php include "header.php"; ?>

<section id="page-banner">
	<div id="banner-image">
		<img src="<?php asset_url('shark'); ?>images/banner-career.jpg" alt="" />
	</div>
	<div id="banner-caption">
		<h1>Career</h1>
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
					<h3>Career Opprotunity</h3>
					<hr/>
					<div class="jumbotron-container">
						<div class="row">
							<div class="col-md-3 col-sm-3">
								<img src="<?php asset_url('shark'); ?>images/career-woman.png" />
							</div>
							<div class="col-md-9 col-sm-9">
								<div class="jumbotron-content">
									<p>We are the answer if you are looking forward the company that will always make your skill, experience and your creativity growth. We are the leader in the Industry that always needs highly motivated people who will support our company to grow to the better ways.</p>
								</div>
							</div>
						</div>
					</div>
					<div class="career-container">
						<?php include"part-career.php"; ?>
					</div>
					<hr/>
				</div>
			</div>
		</div>
	</div>
</section>
<?php include "part-cta.php"; ?>
<?php include "footer.php"; ?>
