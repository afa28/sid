<?php  if(!defined('BASEPATH')) exit('No direct script access allowed'); ?>

<?php $this->load->view($folder_themes.'/header');?>

<div class="container-default bg-gray" id="index-berita">
	<div class="container">
		<div class="row">
			<div class="col-md-8">
				<div class="page-content homepage">
					<?php if ($artikel){ ?>
						<?php foreach ($artikel as $data){ ?>
							<div class="card login-card article-list-card">
								<div class="row no-gutters">
									<div class="col-md-6 col-xs-5">
										<a href="<?= site_url(buat_slug($data)); ?>">
											<?php if (is_file(LOKASI_FOTO_ARTIKEL."kecil_".$data['gambar'])) { ?>
												<img src="<?= AmbilFotoArtikel($data['gambar'],'sedang') ?>" class="img-responsive img-article-list" alt="<?= $data['judul'] ?>"/>
											<?php } else { ?>
												<img src="<?= base_url("$this->theme_folder/$this->theme/images/noimage.png") ?>" class="img-responsive img-article-list" alt="<?= $data['judul'] ?>" />
											<?php } ?>
										</a>
									</div>
									<div class="col-md-6 col-xs-7">
										<div class="row">
											<div class="top-block-article-list">
												<div class="brand-wrapper article-list-title">
													<a href="<?= site_url(buat_slug($data)); ?>">
														<p Style="text-align: Justify;"><b><?= ucwords($data['judul']); ?></b></p>
													</a>
												</div>
												<div class="top-meta-article-list">
													<div class="row">
														<div class="col-md-8 col-xs-12">
															<div class="post-date">
																<i class="ti-calendar"></i><?= tgl_indo2( $data['tgl_upload'] ); ?>
															</div>
														</div>
														<div class="col-md-4 col-xs-4 hidden-xs">
															<div class="post-hit">
																<i class="ti-eye"></i> <?= hit($data['hit']) ?> Dibaca
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="card-body artice-list-body hidden-xs">
												<p class="description-artice-list" Style="text-align: Justify;">
													<?= potong_teks($data['isi'], 280); ?>
												</p>
											</div>

											<div class="bottom-block-article-list hidden-xs">
												<div class="bottom-meta-article-list">
													<div class="row">
														<div class="col-md-6 col-xs-5">
															<div class="post-owner">
																<i class="ti-user"></i> <?= ( $data['owner'] ); ?>
															</div>
														</div>
														<div class="col-md-6 col-xs-">
															<div class="post-cat">
																<i class="ti-agenda"></i>
																<?php if (trim($data['kategori']) != '') : ?>
																	<a href="<?= site_url('berita/kategori/'.$data['kat_slug'])?>"><i class='fa fa-tag'></i><?= $data['kategori']?></a>
																<?php endif; ?>
															</div>
														</div>
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
			<?php include('partials/sidebar.php'); ?>
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
