<div class="row">
	<div class="col-lg-3 col-xs-6">
		<!-- small box -->
		<div class="small-box bg-aqua">
			<div class="inner">
				<h3><?php echo $this->db->count_all('products'); ?></h3>
				<p>Products</p>
			</div>
			<div class="icon">
				<i class="ion ion-cube"></i>
			</div>
			<a href="<?php echo site_url('products'); ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
		</div>
	</div>
	<!-- ./col -->
	<div class="col-lg-3 col-xs-6">
		<!-- small box -->
		<div class="small-box bg-green">
			<div class="inner">
				<h3><?php echo $this->db->count_all('posts'); ?></h3>
				<p>Articles</p>
			</div>
			<div class="icon">
				<i class="ion ion-document-text"></i>
			</div>
			<a href="<?php echo site_url('articles'); ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
		</div>
	</div>
	<!-- ./col -->
	<div class="col-lg-3 col-xs-6">
		<!-- small box -->
		<div class="small-box bg-yellow">
			<div class="inner">
				<h3><?php echo $this->db->count_all('applicants'); ?></h3>
				<p>Job Applicants</p>
			</div>
			<div class="icon">
				<i class="ion ion-person-add"></i>
			</div>
			<a href="<?php echo site_url('applicants'); ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
		</div>
	</div>
	<!-- ./col -->
	<div class="col-lg-3 col-xs-6">
		<!-- small box -->
		<div class="small-box bg-red">
			<div class="inner">
				<h3><?php echo $this->db->count_all('testimony'); ?></h3>
				<p>Testimony</p>
			</div>
			<div class="icon">
				<i class="ion ion-chatbox-working"></i>
			</div>
			<a href="<?php echo site_url('testimony'); ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
		</div>
	</div>
	<!-- ./col -->
</div>
