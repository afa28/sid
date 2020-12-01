<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>

<?php $this->load->view($folder_themes . '/header'); ?>

<div class="container-default bg-gray" id="index-berita">
	<div class="container">
		<div class="row">
			<div class="col-md-8">
				<div class="page-content homepage">
					<!-- Berita -->
					<?php if ($artikel) { ?>
						<div class="row">
							<?php foreach ($artikel as $data) { ?>
								<!-- item -->
								<div class="col-sm-12 col-xs-12">
									<div class="blog-post blog-md">
										<div class="dlab-post-media dlab-img-effect zoom-slow bg-white">
											<a href="<?= site_url(buat_slug($data)); ?>">
												<?php if (is_file(LOKASI_FOTO_ARTIKEL."kecil_".$data['gambar'])) { ?>
													<img src="<?= AmbilFotoArtikel($data['gambar'],'sedang') ?>" class="img-responsive img-article-list" alt="<?= $data['judul'] ?>"/>
												<?php } else { ?>
													<img src="<?= base_url("$this->theme_folder/$this->theme/images/noimage.png") ?>" class="img-responsive" alt="<?= $data['judul'] ?>" />
												<?php } ?>
											</a>
										</div>
										<div class="dlab-post-info bg-white">
											<div class="dlab-post-title">
												<a href="<?= site_url(buat_slug($data)); ?>">
													<h2 class="post-title"><?= ucwords($data['judul']); ?></h2>
												</a>
											</div>
											<hr>
											<div class="dlab-post-meta">
												<ul>
													<li class="post-date"><i class="fa fa-date"><?= tgl_indo2( $data['tgl_upload'] ); ?></li>
													<li class="post-author"><i class="fa fa-user"></i><?= ( $data['owner'] ); ?></li>
													<li class="post-cat">
														<?php if (trim($data['kategori']) != '') : ?>
															<a href="<?= site_url('berita/kategori/'.$data['kat_slug'])?>"><i class='fa fa-tag'></i><?= $data['kategori']?></a>
														<?php endif; ?>
													</li>
												</ul>
											</div>
											<div class="dlab-post-text">
												<p Style="text-align: Justify;"><?= potong_teks($data['isi'], 280); ?>
											</div>
										</div>
									</div>
								</div>
							<?php } ?>

							<div class="clearfix"></div>

							<!-- Paging  -->
							<div class="text-center">
								Paging
							</div>
						<?php } ?>
					</div>
				</div>

				<!-- Sidebar -->
				<div class="col-md-4">
					<div class="widget bg-white p-a20 recent-posts-entry homepage-widget">
						<div class="widget-title style-1">Peta Wilayah <?= ucwords($this->setting->sebutan_desa)." "?><?= ucwords($desa['nama_desa'])?></div>
						<div class="widget-post-bx">
							<?php include('widgets/peta_wilayah_desa.php'); ?>
						</div>
					</div>
					<div class="widget bg-white p-a20 recent-posts-entry homepage-widget">
						<div class="widget-title style-1">Agenda <?= ucwords($this->setting->sebutan_desa)." "?><?= ucwords($desa['nama_desa'])?></div>
						<div class="widget-post-bx">
							<?php include('widgets/agenda.php'); ?>
						</div>
					</div>
					<div class="widget bg-white p-a20 recent-posts-entry homepage-widget">
						<div class="widget-title style-1">Kategori</div>
						<div class="widget-post-bx">
							<?php //include('widgets/menu_kategori.php'); ?>
						</div>
					</div>
					<div class="widget bg-white p-a20 recent-posts-entry homepage-widget">
						<div class="widget-title style-1">Arsip Publik</div>
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
							<?php //include('widgets/popular_artikel.php'); ?>
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

	<!-- end container -->
	<div class="container-default section-apbdes">
		<?php //$this->load->view($folder_themes . '/apbdes2'); ?>
	</div>

	<?php //$this->load->view($folder_themes.'/template-parts/slider/sinergi-program');?>

	<?php $this->load->view($folder_themes . '/footer'); ?>
