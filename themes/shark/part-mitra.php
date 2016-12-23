<?php $partner = partner_widget(); ?>
<?php if($partner != null): ?>
<section id="partner-wrapper" class="gray-bg content-padding">
	<div class="container">
		<div class="row">
			<div class="col-md-4 col-sm-4">
				<div class="content-title">
					<h2>Mitra Kami</h2>
					<hr class="orange-line" />
				</div>
			</div>
			<div class="col-md-8 col-sm-8">&nbsp;</div>
		</div>
		<div class="row">
			<?php foreach ($partner as $value) : ?>
				<div class="col-md-3 col-sm-3">
					<div class="partner-container">
						<div class="partner-name">
							<a href=""><h4><?php echo $value['partner_name']; ?></h4></a>
						</div>
						<div class="partner-content">
							<p>Telp : <?php echo $value['partner_phone']; ?><br/>
								Alamat : <?php echo $value['partner_addr']; ?></p>
						</div>
					</div>
				</div>
			<?php endforeach; ?>
		</div>
		<div class="row">
			<div class="col-md-12 col-sm-12">
				<div class="view-button">
					<a href="<?php echo site_url('our_parner/1'); ?>" class="white-btn">View All</a>
				</div>
			</div>
		</div>
	</div>
</section>
<?php endif; ?>
