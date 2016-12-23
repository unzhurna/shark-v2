<?php include "header.php"; ?>
<section id="page-banner">
	<div id="banner-image">
		<img src="<?php asset_url('shark'); ?>images/banner-support.jpg" alt="" />
	</div>
	<div id="banner-caption">
		<h1>Support</h1>
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
					<p>Jika Anda memiliki pertanyaan seputar prosedur pengembalian produk (retur) anda dapat menghubungi kami dengan mengisi form dibawah ini, atau menghubungi kami di <a href="tel:+62215903411">+6221 5903411</a>
					</p>
					<p>
						<?php if($this->session->flashdata('success')) : ?>
							<div class="alert alert-success">
								<b><i class="fa fa-info-circle"></i> Berhasil!</b> Pesan anda telah dikirimkan.
							</div>
						<?php endif; ?>
						<?php if($this->session->flashdata('error')) : ?>
							<div class="alert alert-danger">
								<b><i class="fa fa-info-circle"></i> Gagal!</b> Pesan anda gagal dikirimkan.
							</div>
						<?php endif; ?>
						<form action="<?php echo site_url('cs_form'); ?>" method="post">
							<?php echo form_error('cs_name', '<span class="text-danger">', '</span>'); ?>
							<p><input type="text" name="cs_name" placeholder="Nama"/></p>
							<?php echo form_error('cs_email', '<span class="text-danger">', '</span>'); ?>
							<p><input type="text" name="cs_email" placeholder="Email"/></p>
							<?php echo form_error('cs_phone', '<span class="text-danger">', '</span>'); ?>
							<p><input type="text" name="cs_phone" placeholder="No. Telepon"/></p>
							<?php echo form_error('cs_addr', '<span class="text-danger">', '</span>'); ?>
							<p><textarea name="cs_addr" placeholder="Alamat" rows="5"></textarea></p>
							<p><input type="text" name="cs_kind" placeholder="Jenis produk"/></p>
							<p><input type="text" name="cs_type" placeholder="Tipe Produk"/></p>
							<?php echo form_error('cs_problem', '<span class="text-danger">', '</span>'); ?>
							<p><textarea name="cs_problem" placeholder="Masalah Produk" rows="10"></textarea></p>
							<p><button type="submit" value="Submit">Kirim</button></p>
						</form>
					</p>
				</div>
			</div>
		</div>
	</div>
</section>
<?php include "part-cta.php"; ?>
<?php include "footer.php"; ?>
