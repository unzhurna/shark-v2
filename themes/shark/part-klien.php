<?php $testi = testi_widget(); ?>
<?php if($testi != null): ?>
<section>
	<div class="container">
		<div class="row">
			<div class="col-md-12 col-sm-12">
				<div class="content-title">
					<h2>Testimonials</h2>
					<hr class="orange-line" />
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12 col-sm-12">
				<div id="testimonials">
					<?php foreach ($testi as $val) : ?>
						<div class="testi-container">
							<p><i>" <?php echo $val['testi_content']; ?>"</i></p>
							<p><strong><?php echo $val['testi_name']; ?></strong>, <?php echo $val['testi_title']; ?></p>
						</div>
					<?php endforeach; ?>
				</div>
			</div>
		</div>
	</div>
</section>
<?php endif; ?>
<?php $client = client_widget(); ?>
<?php if($client != null): ?>
<section id="client-wrapper" class="white-bg content-padding">
	<div class="container">
		<div class="row">
			<div class="col-md-12 col-sm-12">
				<div class="content-title">
					<h2>Clients</h2>
					<hr class="orange-line" />
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12 col-sm-12">
				<div id="slider-client-wrapper" class="content-padding">
					<div id="sliders-client">
						<?php foreach ($client as $val) : ?>
							<div class="slider-image">
								<img src="<?php echo base_url('uploads/client/'.$val['client_logo']); ?>" alt="logo-client" />
							</div>
					  	<?php endforeach; ?>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12 col-sm-12">
				<div class="view-button">
					<a href="<?php echo site_url('our_client/1'); ?>" class="white-btn">View All</a>
				</div>
			</div>
		</div>
	</div>
</section>
<?php endif; ?>
