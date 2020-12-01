<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>

<?php $this->load->view($folder_themes . '/header'); ?>

<!-- Pengumuman -->
<?php if ($count_pengumuman != 0) { ?>
	<div class="contaner-default" id="pengumuman">
		<div class="container">
			<div class="heading">
				<div class="row">
					<div class="col-md-5 col-xs-3">
						<hr style="border: 1px solid #dea80e;">
					</div>
					<div class="col-md-2 col-xs-6 text-center">
						<div class="heading-pengumuman"><a href="<?php echo get_kategori_url($data_pengumuman[$no]['id_kategori']); ?>"><?php echo ($data_pengumuman[$no = 0]['kategori']) ?> <?php echo ucwords($this->setting->sebutan_desa) . " " ?></a></div>
					</div>
					<div class="col-md-5 col-xs-3">
						<hr style="border: 1px solid #dea80e;">
					</div>
				</div>
			</div>

			<div class="row">
				<?php foreach ($data_pengumuman as $data) { ?>
					<!-- item -->
					<center>
						<div class="col-sm-4 col-xs-12 col-center">
							<div class="panel-default item">
								<div class="panel-pengumuman no-padding">
									<div class="blog-image">
										<?php if (trim($data['kategori']) != '') : ?>
											<a href="<?php echo get_kategori_url($data['id_kategori']); ?>" class="cat-label"><i class="fa fa-tag"></i> <?php echo ucwords($data['kategori']); ?></a>
										<?php endif; ?>
										<a href="<?php echo get_artikel_url($data['id'], $data['id_kategori']); ?>">
											<img src="<?php echo thumbnail_uri($data['gambar'], 600, 350) ?>" class="img-responsive img-radius" alt="<?php echo $data['judul'] ?>">
										</a>
										<div class="caption-pengumuman">
											<div class="title-pengumuman"><?php echo character_limiter($data['judul'], 80); ?></div>
											<span class="tgl-pengumuman"><i class="fa fa-calendar-o"></i> <?php echo tgl_indo($data['tgl_upload']); ?></span>

										</div>
									</div>
								</div>
							</div>
						</div>
					</center>
				<?php } ?>
			</div>
		</div>
	</div>
<?php } ?>

<div class="container-default bg-gray" id="index-berita">
	<div class="container">
		<div class="row">
			<div class="col-md-8">
				<div class="page-content homepage">
					<!-- Himbauan Kades -->
					<?php if ($data_kolom_kades) { ?>
					<div class="row">
						<?php foreach ($data_kolom_kades as $data) { ?>
						<!-- item -->
						<div class="col-sm-12 col-xs-12">
							<div class="kolom-kades">
								<div class="judul"><a href="<?php echo get_artikel_url($data['id'], $data['id_kategori']); ?>"><?php echo ucwords(character_limiter($data['judul'], 50)); ?></a></div>
								<?php echo ucwords(character_limiter($data['isi'], 200)); ?>
									<?php $sambutan = $this->db->query('select * from sambutan where id_artikel = ?', $data["id"])->row_array();
									if ($sambutan) : ?>
									<div class="pic">
										<img src="<?= site_url('desa/upload/sambutan/' . $sambutan['foto_sambutan']) ?>" alt="" class="foto-kades">
										<div class="pic-body">
											<div class="nama-kades"><?php echo $sambutan['pemberi_sambutan']; ?></div>
												<p><?php echo $sambutan['jabatan_sambutan']; ?></p>
										</div>
									</div>
								<?php endif ?>
							</div>
						</div>
						<?php } ?>
					</div>
					<?php } ?>
						
					<!-- Berita -->
					<?php if ($data_artikels) { ?>
					<div class="row">
						<?php foreach ($data_artikels as $data) { ?>
						<!-- item -->
						<div class="col-sm-12 col-xs-12">
							<div class="blog-post blog-md">
								<div class="dlab-post-media dlab-img-effect zoom-slow bg-white">
									<a href="<?php echo get_artikel_url($data['id'], $data['id_kategori']); ?>">
										<img src="<?php echo thumbnail_uri($data['gambar'], 600, 350) ?>" class="img-responsive" alt="<?php echo $data['judul'] ?>">
									</a>
								</div>
								<div class="dlab-post-info bg-white">
									<div class="dlab-post-meta">
										<ul>
											<li class="post-date"><?php echo tgl_indo2($data['tgl_upload']); ?></li>
											<li class="post-author"><?= empty($data['author']) ? $data['owner'] : $data['author'] ?></li>
											<li class="post-cat">
												<?php if (trim($data['kategori']) != '') : ?>
													<a href="<?php echo get_kategori_url($data['id_kategori']); ?>" class="cat-label"><?php echo ucwords($data['kategori']); ?></a>
												<?php endif; ?>
											</li>
										</ul>
									</div>
									<hr>
									<div class="dlab-post-title">
										<a href="<?php echo get_artikel_url($data['id'], $data['id_kategori']); ?>">
											<h2 class="post-title"><?php echo ucwords(character_limiter($data['judul'], 40)); ?></h2>
										</a>
									</div>
									<div class="dlab-post-text">
										<p Style="text-align: Justify;"><?= ucwords(character_limiter($data['isi'], 300)); ?>
									</div>											
								</div>
							</div>
						</div>
						<?php } ?>
					</div>
						<div class="clearfix"></div>

						<div class="loader-button text-center">
							<a href="<?php echo site_url('berita') ?>" class="btn btn-primary btn-sm">Tampilkan Semua</span></a>
						</div>
						<hr />
					<?php } ?>

					<!-- Slide Gelary -->
					<?php
					if ($count_galeri != 0) {
						$this->load->view($folder_themes . '/slide-gallery');
					}
					?>
				</div>
			</div>

			<!-- Sidebar -->
			<div class="col-md-4">
				<div class="widget bg-white p-a20 recent-posts-entry homepage-widget">
					<div class="widget-title style-1">Agenda</div>
					<div class="widget-post-bx">
						<?php include('widgets/agenda.php'); ?>
					</div>
				</div>
				<div class="widget bg-white p-a20 recent-posts-entry homepage-widget">
					<div class="widget-title style-1">Kategori</div>
					<div class="widget-post-bx">
						<?php include('widgets/menu_kategori.php'); ?>
					</div>
				</div>
				<div class="widget bg-white p-a20 recent-posts-entry homepage-widget">
					<div class="widget-title style-1">Dowload</div>
					<div class="widget-post-bx">
						<?php include('widgets/download.php'); ?>
					</div>
				</div>
				<div class="widget bg-white p-a20 recent-posts-entry homepage-widget">
					<div class="widget-title style-1">Polling</div>
					<div class="widget-post-bx">
						<?php include('widgets/polling.php'); ?>
					</div>
				</div>
				<div class="widget bg-white p-a20 recent-posts-entry homepage-widget">
					<div class="widget-title style-1">Artikel Popular</div>
					<div class="widget-post-bx">
						<?php include('widgets/popular_artikel.php'); ?>
					</div>
				</div>
				<div class="widget bg-white p-a20 recent-posts-entry homepage-widget">
					<div class="widget-title style-1">Statistik Pengunjung</div>
					<div class="widget-post-bx">
						<?php include('widgets/statistik_pengunjung.php'); ?>
					</div>
				</div>
			</div>
			<!-- Sidebar -->
		</div>
	</div>
</div>

<!-- Perangkat Desa -->
<div class="container-default bg-white">
	<div class="container">
		<?php $this->load->view($folder_themes . '/struktur'); ?>
	</div>
</div>

<!-- Laporan Warga -->
<?php if ($count_panduan != 0) {
	echo '<div class="container-default section-layanan">
				<div class="container">';
	$this->load->view($folder_themes . '/layanan');
	echo '	</div>
			</div>';
}
?>

<!-- Video -->
<?php
if ($count_video != 0) {
	echo '<div class="container-default bg-white">
				<div class="container">';
	$this->load->view($folder_themes . '/videos');
	echo '	</div>
			</div>';
}
?>

<div class="container-default section-potensi hidden-xs">
	<div class="container">
		<?php $this->load->view($folder_themes . '/potensi'); ?>
	</div>
</div>

<!-- Pembangunan -->
<?php if ($count_pembangunan != 0) {
	echo '<div class="container-default bg-gray section-pembangunan">
				<div class="container">';
	$this->load->view($folder_themes . '/pembangunan');
	echo '	</div>
			</div>';
}
?>

<!-- Laporan Warga -->
<?php if ($count_lapor != 0) {
	echo '<div class="container-default section-laporan">
				<div class="container">';
	$this->load->view($folder_themes . '/laporan_ditindak');
	echo '	</div>
			</div>';
}
?>

<!-- Komentar -->
<?php if ($count_komentar != 0) {
	echo '<div class="container-default bg-white">
				<div class="container">';
	$this->load->view($folder_themes . '/testimoni');
	echo '	</div>
			</div>';
}
?>

<!-- end container -->
<div class="container-default section-apbdes">
	<?php $this->load->view($folder_themes . '/apbdes2'); ?>
</div>

<?php $this->load->view($folder_themes . '/footer'); ?>