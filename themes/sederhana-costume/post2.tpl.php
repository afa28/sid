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
													<img src="<?= AmbilFotoArtikel($data['gambar'],'sedang') ?>" class="img-responsive" alt="<?= $data['judul'] ?>"/>
												<?php } else { ?>
													<img src="<?= base_url("$this->theme_folder/$this->theme/images/noimage.png") ?>" class="img-responsive" height="auto" alt="<?= $data['judul'] ?>" />
												<?php } ?>
											</a>
										</div>
										<div class="dlab-post-info bg-white">
											<div class="dlab-post-title">
												<a href="<?= site_url(buat_slug($data)); ?>">
													<h2 class="post-title"><b><?= potong_teks($data['judul'], 75); ?></b></h2>
												</a>
											</div>
											<hr>
											<div class="dlab-post-text">
												<p Style="text-align: Justify;"><?= potong_teks($data['isi'], 280); ?>
											</div>
											<hr>
											<div class="bottom-meta-article-list">
												<div class="row">
													<div class="col-md-6 col-xs-5">
														<div class="post-owner">
															<i class="fa fa-user"></i> <?= ( $data['owner'] ); ?>
														</div>
													</div>
													<div class="col-md-6 col-xs-">
														<div class="post-cat">
															<i class="fa fa-label"></i>
															<?php if (trim($data['kategori']) != '') : ?>
																<a href="<?= site_url('berita/kategori/'.$data['kat_slug'])?>"><i class='fa fa-tag'></i> <?= $data['kategori']?></a>
															<?php endif; ?>
														</div>
													</div>
												</div>
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
					<?php $this->load->view($folder_themes . '/partials/sidebar', $data); ?>
				</div>
				<!-- End Sidebar -->
			</div>
		</div>
	</div>

	<!-- end container -->
	<div class="container-default section-apbdes">
		<?php //$this->load->view($folder_themes . '/apbdes2'); ?>
	</div>

	<?php //$this->load->view($folder_themes.'/template-parts/slider/sinergi-program');?>

	<?php $this->load->view($folder_themes . '/footer'); ?>
