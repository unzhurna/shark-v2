<?php $news = news_widget(); ?>
<?php if($news != null): ?>
<section id="news-wrapper" class="white-bg content-padding">
	<div class="container">
		<div class="row">
			<div class="col-md-12 col-sm-12">
				<div class="content-title">
					<h2>Latest News</h2>
					<hr class="orange-line" />
				</div>
			</div>
		</div>
		<div id="sales-info-wrapper" class="content-padding">
			<div class="row">
				<?php foreach ($news as $val) : ?>
					<div class="col-md-4 col-sm-4">
						<div class="news-container">
							<div class="news-image">
								<a href="#"><img src="<?php echo base_url('uploads/post/'.$val['post_image']); ?>" /></a>
							</div>
							<div class="news-title">
								<a href="<?php echo site_url('read/'.$val['post_slug']); ?>"><h4><?php echo $val['post_title']; ?></h4></a>
							</div>
							<div class="news-content">
								<?php echo $val['post_excerpt']; ?>
							</div>
						</div>
					</div>
				<?php endforeach; ?>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12 col-sm-12">
				<div class="view-button">
					<a href="<?php echo site_url('news/1'); ?>" class="white-btn">View All</a>
				</div>
			</div>
		</div>
	</div>
</section>
<?php endif; ?>
