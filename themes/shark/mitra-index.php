<?php include "header.php"; ?>
<section id="page-banner">
	<div id="banner-image">
		<img src="assets/images/banner-mitra.jpg" alt="" />
	</div>
	<div id="banner-caption">
		<h1>Mitra</h1>
	</div>
</section>
<section class="page-without-sidebar content-padding">
	<div class="container">
		<div class="row">
			<div class="col-md-12 col-sm-12">
				<div class="content-title">
					<h2>Mitra Kami</h2>
					<hr class="orange-line" />
				</div>
			</div>
		</div>
		<div class="page-content">
			<div class="row">
				<div class="col-md-4 col-sm-4">
				</div>
				<div class="col-md-8 col-sm-8">
					<div class="row">
						<div class="col-md-5 col-sm-5">
                                <select class="form-control select2 provinces" name="province_id" style="width: 100%;">
                                    <option value="">Select Province</option>
                                    <?php foreach ($provinces as $province) : ?>
                                        <option value="<?php echo $province['id']; ?>" <?php echo ($province['id'] == $province_id) ? 'selected' : '' ; ?>><?php echo $province['name']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="col-md-5 col-sm-5">
                                <select class="form-control select2 cities" name="city_id" style="width: 100%;">
                                    <option value="">Select City</option>
                                    <?php foreach ($cities as $city) : ?>
                                        <option value="<?php echo $city['id']; ?>" <?php echo ($city['id'] == $city_id) ? 'selected' : '' ; ?>><?php echo $city['name']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
						<div class="col-md-2 col-sm-2">
							<div class="btn-select">
								<a href="mitra-index.php">Go</a>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div id="partner-wrapper" class="content-padding">
					<?php foreach ($partner as $val) : ?>
						<div class="col-md-3 col-sm-3">
							<div class="partner-container">
								<div class="partner-name">
									<a href=""><h4><?php echo $val->partner_name; ?></h4></a>
								</div>
								<div class="partner-content">
									<p>Telp : <?php echo $val->partner_phone; ?><br/>
										Alamat : <?php echo $val->partner_addr; ?></p>
								</div>
							</div>
						</div>
					<?php endforeach; ?>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12 col-sm-12">
					<div class="pagination-wrapper text-center">
						<?php echo $this->pagination->create_links(); ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<?php include "part-cta.php"; ?>
<?php include "footer.php"; ?>
