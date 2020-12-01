<?php  if(!defined('BASEPATH')) exit('No direct script access allowed'); ?>

<?php $this->load->view($folder_themes.'/header');?>
<div class="container-default section-pengumuman">
	<div class="container">
		<div class="page-content">	
			<div class="section-body-kades">
				<?php if ($data_kades){ ?>						
				<div class="head-kades"><a href="<?php echo site_url('kades') ?>" style="color:#e81313">Sambutan & Himbauan <?php echo ucwords($this->setting->sebutan_kepala_desa)." "?></a></div>
					<?php foreach ($data_kades as $data){ ?>
					<!-- item -->
					<div class="panel-kades item">
						<div class="row">
							<div class="col-md-5 col-xs-12">
								<div class="blog-image">					
									<a href="<?php echo site_url( 'kades/'.$data['slug'] ); ?>">
										<img src="<?php echo thumbnail_uri($data['gambar']) ?>" class="img-responsive" alt="<?php echo $data['judul'] ?>">
									</a>
								</div>
							</div>
							<div class="col-md-6 col-xs-12">
								<div class="kades-judul">
									<a href="<?php echo site_url( 'kades/'.$data['slug'] ); ?>"><?php echo ucwords(character_limiter( $data['judul'], 60 )); ?></a>
								</div>
								<div class="kades-isi">
									<?php echo ucwords(character_limiter( $data['isi'], 500 )); ?>
								</div>
							</div>
						</div>
					</div>
					<?php } ?>
				</div>
			<?php } ?>
		</div>
	</div>
</div>

<div class="container-default section-content">
	<div class="container">
		<div class="row">
			<div class="col-md-9">
				<div class="page-content homepage">
				<?php if ($data_pengumuman){ ?>						
					<div class="head"><a href="<?php echo site_url('pengumuman') ?>" class="text-white">Pengumuman <?php echo ucwords($this->setting->sebutan_desa)." "?></a></div>
					<div class="row">		
						<?php foreach ($data_pengumuman as $data){ ?>
						<!-- item -->
						<div class="col-sm-4 col-xs-12">
							<div class="panel panel-default item">
								<div class="panel-body no-padding">
									<div class="blog-image">
										<?php if ( trim($data['kategori'] ) != ''): ?>
											<a href="<?php echo site_url('pengumuman' ); ?>" class="cat-pengumuman"><i class="fa fa-tag"></i> <?php echo ucwords( $data['kategori'] ); ?></a>
										<?php endif; ?>												
										<a href="<?php echo site_url( 'pengumuman/'.$data['slug'] ); ?>" class="content-label"><?php echo ucwords(character_limiter( $data['judul'], 20 )); ?></a>
										<a href="<?php echo site_url( 'pengumuman/'.$data['slug'] ); ?>">
											<img src="<?php echo thumbnail_uri($data['gambar'],600,350) ?>" class="img-responsive" alt="<?php echo $data['judul'] ?>">
										</a>
									</div>

									<div class="blog-content">
										<div class="blog-info">
											<div class="col-xs-6 post-date text-center">
												<small><i class="fa fa-calendar-o"></i> <?php echo tgl_indo( $data['tgl_upload'] ); ?></small>
											</div>
										<div class="col-xs-6 writter text-center">
											<small><i class="fa fa-pencil-square-o"></i> <?php echo $data['owner']; ?></small>
										</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					<?php } ?>
					</div>
				</div>
				<?php } ?>
				
				<div class="page-content homepage">
					<div class="head"><a href="<?php echo site_url('berita') ?>" class="text-white">Berita Terkini</span></a></div>
					<?php if ($data_artikels){ ?>					
						<div class="row">
							<?php foreach ($data_berita as $data){ ?>
								<!-- item -->
								<div class="col-sm-4 col-xs-12">
									<div class="panel panel-default item">
										<div class="panel-body no-padding">
											<div class="blog-image">
												<?php if ( trim($data['kategori'] ) != ''): ?>
													<a href="<?php echo get_kategori_url( $data['id_kategori'] ); ?>" class="cat-label"><i class="fa fa-tag"></i> <?php echo ucwords( $data['kategori'] ); ?></a>
												<?php endif; ?>
												<a href="<?php echo site_url( 'berita/'.$data['slug'] ); ?>">
													<img src="<?php echo thumbnail_uri($data['gambar'],600,350) ?>" class="img-responsive" alt="<?php echo $data['judul'] ?>">
												</a>
											</div>
											<div class="blog-content">
												<a href="<?php echo site_url( 'berita/'.$data['slug'] ); ?>">
													<div class="list-blog-title"><?php echo ucwords(character_limiter( $data['judul'], 25 )); ?></div>
												</a>
												<div class="blog-info">
													<div class="col-xs-6 post-date text-center">
														<small><i class="fa fa-calendar-o"></i> <?php echo tgl_indo3( $data['tgl_upload'] ); ?></small>
													</div>
													<div class="col-xs-6 writter text-center">
														<small><i class="fa fa-pencil-square-o"></i> <?php echo $data['owner']; ?></small>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							<?php } ?>
						</div>
					<?php } ?>					
				</div>
				
				<div class="page-content homepage">
					<div class="row">						
						<?php if ($data_potensi){ ?>
						<div class="col-md-6 col-xs-12 item">
							<div class="head-potensi"><a href="<?php echo site_url('potensi') ?>" class="text-white">Potensi dan Produk <?php echo ucwords($this->setting->sebutan_desa)." "?></span></a></div>
							<?php foreach ($data_potensi as $data){ ?>
							<!-- item -->
							<div class=" potensi-list">
								<div class="row">
									<div class="col-md-3 col-xs-12">
										<div class="blog-image">
											<a href="<?php echo site_url( 'potensi/'.$data['slug'] ); ?>">
												<img src="<?php echo thumbnail_uri($data['gambar']) ?>" class="img-responsive" alt="<?php echo $data['judul'] ?>">
											</a>
										</div>
									</div>
									<div class="col-md-9 col-xs-12">
										<div class="potensi-judul">
											<a href="<?php echo site_url( 'potensi/'.$data['slug'] ); ?>"><?php echo ucwords(character_limiter( $data['judul'], 35 )); ?></a>
										</div>
										<div class="meta-info">
											<small><i class="fa fa-calendar-o"></i> <?php echo tgl_indo3( $data['tgl_upload'] ); ?></small><br />
											<small><i class="fa fa-pencil-square-o"></i> <?php echo $data['owner']; ?></small>
										</div>
									</div>
								</div>
							</div>									
							<?php } ?>
						<?php } ?>
						</div>

						<?php if ($data_kegiatan){ ?>
						<div class="col-md-6 col-xs-12 panel-potensi item">
							<div class="head-potensi"><a href="<?php echo site_url('kegiatan') ?>" class="text-white">Kegiatan <?php echo ucwords($this->setting->sebutan_desa)." "?></span></a></div>
							<?php foreach ($data_kegiatan as $data){ ?>
							<!-- item -->			
								<div class=" potensi-list">
									<div class="row">
									<div class="col-md-3 col-xs-12">
										<div class="blog-image">
											<a href="<?php echo site_url( 'kegiatan/'.$data['slug'] ); ?>">
												<img src="<?php echo thumbnail_uri($data['gambar']) ?>" class="img-responsive" alt="<?php echo $data['judul'] ?>">
											</a>
										</div>
									</div>
									<div class="col-md-9 col-xs-12">
										<div class="potensi-judul">
											<a href="<?php echo site_url( 'kegiatan/'.$data['slug'] ); ?>"><?php echo ucwords(character_limiter( $data['judul'], 35 )); ?></a>
										</div>
										<div class="meta-info">
											<small><i class="fa fa-calendar-o"></i> <?php echo tgl_indo3( $data['tgl_upload'] ); ?></small><br />
											<small><i class="fa fa-pencil-square-o"></i> <?php echo $data['owner']; ?></small>
										</div>
									</div>
									</div>
								</div>									
							<?php } ?>
						<?php } ?>
						</div>
					</div>
				</div>
				
				<div class="page-content homepage">					
					<?php if ($data_pembangunan): ?>
					<div class="section-pembangunan table-responsive ">
						<div class="header-agenda">
							<a href="<?php echo site_url('pembangunan'); ?>" class="text-white">Pembangunan <?php echo ucwords($this->setting->sebutan_desa)." "?></a>
						</div>
						<table class="table table-bordered table-striped">
							<thead>
								<tr>							
									<th class="text-center uppercase info">Nama Pembangunan</th>
									<th class="text-center uppercase info">Lokasi</th>								
									<th class="text-center uppercase info">Koordinator</th>
									<th class="text-center uppercase info" width="20%">Anggaran</th>							
								</tr>
							</thead>
							<tbody>
								<?php foreach ($data_pembangunan as $data){ ?>
								<tr>							
									<td><a href="<?php echo site_url( 'pembangunan/'.$data['slug'] ); ?>"><?php echo ucwords(character_limiter( $data['judul'], 40 )); ?></td>
									<td class="text-center"><?= $data['lokasi_pembangunan']?></td>								
									<td class="text-center"><?= $data['koordinator_pembangunan']?></td>
									<td class="text-center"><?= uang_indo($data['nilai_pembangunan'])?></td>
									</tr>
								<?php } ?>
							</tbody>
						</table>
					</div>
					<?php endif; ?>					
				</div>
				
				<div class="page-content homepage">
					<div class="head"><a href="<?php echo site_url('panduan') ?>" class="text-white">Panduan Layanan</span></a></div>
					<?php if ($data_panduan){ ?>					
						<div class="row">
							<?php foreach ($data_panduan as $data){ ?>
								<!-- item -->
								<div class="col-sm-4 col-xs-12">
									<div class="panel panel-default item">
										<div class="panel-body no-padding">
											<div class="blog-image">
												<?php if ( trim($data['kategori'] ) != ''): ?>
													<a href="<?php echo site_url('panduan'); ?>" class="cat-label"><i class="fa fa-tag"></i> <?php echo ucwords( $data['kategori'] ); ?></a>
												<?php endif; ?>
												<a href="<?php echo site_url( 'panduan/'.$data['slug'] ); ?>">
													<img src="<?php echo thumbnail_uri($data['gambar'],600,350) ?>" class="img-responsive" alt="<?php echo $data['judul'] ?>">
												</a>
											</div>
											<div class="blog-content">
												<a href="<?php echo site_url( 'panduan/'.$data['slug'] ); ?>">
													<div class="list-blog-title"><?php echo ucwords(character_limiter( $data['judul'], 25 )); ?></div>
												</a>
												<div class="blog-info">
													<div class="col-xs-6 post-date text-center">
														<small><i class="fa fa-calendar-o"></i> <?php echo tgl_indo3( $data['tgl_upload'] ); ?></small>
													</div>
													<div class="col-xs-6 writter text-center">
														<small><i class="fa fa-pencil-square-o"></i> <?php echo $data['owner']; ?></small>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							<?php } ?>
						</div>
					<?php } ?>					
				</div>
				
				<!-- Foto Galeri -->
				<div class="page-content homepage">
					<div class="head"><a href="<?php echo site_url('albums') ?>" class="text-white">Galeri Foto</span></a></div>
					<?php if ($data_galeri){ ?>					
						<div class="row">
							<?php foreach ($data_galeri as $data){ ?>
								<!-- item -->
								<div class="col-sm-3 col-xs-12">
									<div class="panel panel-default item">
										<div class="panel-body no-padding">
											<div class="blog-image">
												<div class="nama-album"><a href="<?= site_url('galeri/'.$data['id'].'/1'); ?>" style="color:#777"><?php echo ucwords(character_limiter( $data['nama'], 15 )); ?></a></div>
												<?php if (is_file(LOKASI_GALERI . "sedang_" . $data['gambar'])): ?>
														<div class="blog-image album-thumb">
															<a href="<?= site_url('galeri/'.$data['id'].'/1'); ?>"><img src="<?= AmbilGaleri($data['gambar'],'kecil')?>" class="img-responsive cover-album"/></a>
														</div>
														<a href="<?= site_url('galeri'); ?>" class="gal-label"><i class="fa fa-camera"></i></a>
												<?php endif; ?>
												<div class="nama-album"><?php echo tgl_indo( $data['tgl_upload'] ); ?></div>
											</div>
										</div>
									</div>
								</div>
							<?php } ?>
						</div>
					<?php } ?>					
				</div>
				
				<div class="page-content homepage">
					<div class="head"><a href="<?php echo site_url('video') ?>" class="text-white">Berita Video</span></a></div>
					<?php if ($data_video){ ?>					
						<div class="row">
							<?php foreach ($data_video as $data){ ?>
								<!-- item -->
								<div class="col-sm-4 col-xs-12">
									<div class="panel panel-default item">
										<div class="panel-body no-padding">
											<div class="blog-image">
												<a href="<?php echo site_url( 'video/'.$data['slug'] ); ?>">
													<img src="<?php echo thumbnail_uri($data['gambar'],600,350) ?>" class="img-responsive" alt="<?php echo $data['judul'] ?>">
												</a>
												<a href="<?= site_url('video'); ?>" class="vid-label"><i class="fa fa-youtube-play"></i></a>
											</div>
											<div class="blog-content">
												<a href="<?php echo site_url( 'video/'.$data['slug'] ); ?>">
													<div class="list-blog-title"><?php echo ucwords(character_limiter( $data['judul'], 25 )); ?></div>
												</a>				
												<div class="blog-info">
													<div class="col-xs-6 post-date text-center">
														<small><i class="fa fa-calendar-o"></i> <?php echo tgl_indo3( $data['tgl_upload'] ); ?></small>
													</div>
													<div class="col-xs-6 writter text-center">
														<small><i class="fa fa-pencil-square-o"></i> <?php echo $data['owner']; ?></small>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							<?php } ?>
						</div>
					<?php } ?>					
				</div>
				
			</div>			
			<!-- Sidebar -->
			<div class="col-md-3">
				<?php $this->load->view($folder_themes.'/sidebar');?>
			</div>
		</div>
	</div>
</div>

<div class="container-default section-bottom-module">
	<div class="container">
		<div class="row">
			<div class="bottom-module">
				<div class="col-sm-6 col-xs-12">
					<div class="box">
						<div class="box-header">
							<div class="title-module">Downloads</div>
						</div>
						<div class="box-body">
							<?php foreach($downloads as $data){?>
								<li>
									<a target="_blank" href="<?= base_url().LOKASI_DOKUMEN.underscore($data['satuan'])?>"><?php echo $data['nama']; ?></a>
								</li>
							<?php }?>
						</div>

						<div class="box-footer text-right">
							<a class="btn btn-sm btn-info" href="<?php echo site_url('downloads') ?>">Selengkapnya</a>
						</div>
					</div>
				</div>

				<div class="col-sm-6 col-xs-12">
					<div class="box">
						<div class="box-header">
							<div class="title-module">Arsip Artikel</div>
						</div>

						<div class="box-body">
							<?php foreach ($arsip as $data): ?>
								<li><a
									href="<?php echo get_artikel_url( $data['id'], $data['id_kategori'] ); ?>"><?= character_limiter( $data['judul'], 50 ); ?></a>
								</li>
							<?php endforeach; ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
	<!-- end container -->

<?php $this->load->view($folder_themes.'/apbdes2');?>

<?php $this->load->view($folder_themes.'/footer');?>