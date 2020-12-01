<?php  if(!defined('BASEPATH')) exit('No direct script access allowed'); ?>



<div class="panel panel-default">
	<div class="panel-body">
		<div class="blok-before-content">
			<div class="single-title"><?php echo $page_header; ?></div>
			<div class="top-meta-single-content">
				<div class="row">
					<div class="col-md-6 col-xs-6"><i class="ti-calendar"></i> <?php echo hari($content['tgl_agenda']); ?>, <?php echo tgl_indo2( $content['tgl_upload'] ); ?></div>
					<div class="col-md-6 col-xs-6 text-right"><i class="ti-user"></i> <?php echo empty($content['author']) ? ucwords( $content['owner']) : ucwords($content['author']); ?></div>
				</div>
			</div>
		</div>

		<a href="<?php echo base_url().LOKASI_FOTO_ARTIKEL.'sedang_'.$content['gambar']; ?>" data-lightbox="images" data-title="<?php echo $page_header; ?>">
		<?php if(is_file(LOKASI_FOTO_ARTIKEL.'sedang_'.$content['gambar'])) { ?>
			<img width="100%" class="img-responsive img-fluid gambar-utama" src="<?php echo base_url().LOKASI_FOTO_ARTIKEL.'sedang_'.$content['gambar']; ?>" alt="<?php echo $content['judul']; ?>">
			<div class="caption-gambar-artikel">Gambar Utama : <?php echo $content['caption']; ?></div>
		<?php } ?>
		</a>
		<!-- Post Content -->
		<!-- Data Agenda -->
		<?php $agenda = $this->db->query('select * from agenda where id_artikel = ?', $content["id"])->row_array();
		if($agenda): ?>
		<div class="meta-agenda">
			<div class="row">
				<div class="col-md-4 col-xs-12">
					<div class="row">
						<div class="widget-content">
							<div class="info-box bg-aqua">
								<span class="info-box-icon"><i class="fa fa-calendar"></i></span>
								<div class="info-box-content">
									<span class="info-box-text">Tanggal & Jam</span>
									<div class="progress">
										<div class="progress-bar" style="width:60%"></div>
									</div>
									<span class="progress-description">
										<?php echo tgl_indo2 ($agenda['tgl_agenda']); ?>
									</span>
								</div>
							</div>
						</div>
					</div>
				</div>

				<div class="col-md-4 col-xs-12">
					<div class="row">
						<div class="widget-content">	
							<div class="info-box bg-green">
								<span class="info-box-icon"><i class="fa fa-map-marker"></i></span>
								<div class="info-box-content">
									<span class="info-box-text">Lokasi</span>
									<div class="progress">
										<div class="progress-bar" style="width:60%"></div>
									</div>
									<span class="progress-description">
										<?php echo $agenda['lokasi_kegiatan']; ?>
									</span>
								</div>
							</div>
						</div>
					</div>
				</div>

				<div class="col-md-4 col-xs-12">
					<div class="row">
						<div class="widget-content">
							<div class="info-box bg-red">
								<span class="info-box-icon"><i class="fa fa-bullhorn"></i></span>
								<div class="info-box-content">
									<span class="info-box-text">Koordinator</span>
									<div class="progress">
										<div class="progress-bar" style="width:60%"></div>
									</div>
									<span class="progress-description">
										<?php echo $agenda['koordinator_kegiatan']; ?>
									</span>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>		
		<?php endif ?>

		<!-- Data Pembangunan -->
		<?php $pembangunan = $this->db->query('select * from pembangunan where id_artikel = ?', $content["id"])->row_array();
		if($pembangunan): ?>
		<div class="papan-proyek">
			<div class="table-responsive">
				<table class="table table-bordered" width="100%">
					<tr>
						<td class="text-center" width="15%"><img src="<?php echo base_url().'desa/logo/'.$desa['logo']; ?>" alt="Logo Desa" width="100"></td>
						<td colspan="3" class="text-center">
							<div class="top-level-pem">Pemerintah <?php echo ucwords($this->setting->sebutan_kabupaten." ".$desa['nama_kabupaten'])?><br />
							<?php echo ucwords($this->setting->sebutan_kecamatan." ".$desa['nama_kecamatan'])?></div>
							<div class="nama-desa-proyek"><?php echo ucwords($this->setting->sebutan_desa)." "?><?php echo ucwords($desa['nama_desa'])?></div>
							
						</td>
						<td class="text-center" width="15%"><img src="<?php echo base_url().'desa/logo/logo_kemendes.png' ?>" alt="Logo Desa" width="100"></td>
					</tr>
					<tr>
						<td class="text-papan-proyek" width="23%">Bidang</td>
						<td class="text-center text-papan-proyek" width="2%">:</td>
						<td colspan="3" class="text-papan-proyek" width="75%"><?php echo $pembangunan['bidang_pembangunan']; ?></td>
					</tr>
					<tr>
						<td class="text-papan-proyek" width="23%">Sub Bidang</td>
						<td class="text-center text-papan-proyek" width="2%">:</td>
						<td colspan="3" class="text-papan-proyek" width="75%"><?php echo $pembangunan['sub_bidang_pembangunan']; ?></td>
					</tr>
					<tr>
						<td class="text-papan-proyek" width="23%">Kegiatan</td>
						<td class="text-center text-papan-proyek" width="2%">:</td>
						<td colspan="3" class="text-papan-proyek" width="75%"><?php echo $pembangunan['nama_kegiatan_pembangunan']; ?></td>
					</tr>
					<tr>
						<td class="text-papan-proyek" width="23%">Volume</td>
						<td class="text-center text-papan-proyek" width="2%">:</td>
						<td colspan="3" class="text-papan-proyek" width="75%"><?php echo $pembangunan['volume_kegiatan_pembangunan']; ?></td>
					</tr>
					<tr>
						<td class="text-papan-proyek" width="23%">Nilai Pembangunan</td>
						<td class="text-center text-papan-proyek" width="2%">:</td>
						<td colspan="3" class="text-papan-proyek" width="75%"><?php echo uang_indo($pembangunan['nilai_pembangunan']); ?> (Termasuk Pajak)</td>
					</tr>
					<tr>
						<td class="text-papan-proyek" width="23%">Sumber Dana</td>
						<td class="text-center text-papan-proyek" width="2%">:</td>
						<td colspan="3" class="text-papan-proyek" width="75%"><?php echo $pembangunan['sumber_dana_pembangunan']; ?></td>
					</tr>
					<tr>
						<td class="text-papan-proyek" width="23%">Waktu Pelaksanaan</td>
						<td class="text-center text-papan-proyek" width="2%">:</td>
						<td colspan="3" class="text-papan-proyek" width="75%"><?php echo $pembangunan['waktu_pelaksanaan_pembangunan']; ?></td>
					</tr>
					<tr>
						<td class="text-papan-proyek" width="23%">Pelaksana Kegiatan</td>
						<td class="text-center text-papan-proyek" width="2%">:</td>
						<td colspan="3" class="text-papan-proyek" width="75%"><?php echo $pembangunan['koordinator_pembangunan']; ?></td>
					</tr>				
				</table>
			</div>
		</div>
				
		<?php endif ?>

		<!-- Data Potensi -->
		<?php $potensi = $this->db->query('select * from potensi where id_artikel = ?', $content["id"])->row_array();
		if($potensi): ?>
		<div class="meta-potensi">
			<div class="row">
				<div class="col-md-4 col-xs-12">
					<div class="row">
						<div class="widget-content">	
							<div class="info-box bg-aqua">
								<span class="info-box-icon"><i class="fa fa-bookmark"></i></span>
								<div class="info-box-content">
									<span class="info-box-text">Produk / Usaha</span>
									<div class="progress">
										<div class="progress-bar" style="width:60%"></div>
									</div>
									<span class="progress-description">
										<?php echo $potensi['nama_produk']; ?>
									</span>
								</div>
							</div>
						</div>
					</div>
				</div>

				<div class="col-md-4 col-xs-12">
					<div class="row">
						<div class="widget-content">
							<div class="info-box bg-green">
								<span class="info-box-icon"><i class="fa fa-users"></i></span>
								<div class="info-box-content">
									<span class="info-box-text">Pengelola Usaha</span>
									<div class="progress">
										<div class="progress-bar" style="width:60%"></div>
									</div>
									<span class="progress-description">
										<?php echo $potensi['pengelola_produk']; ?>
									</span>
								</div>
							</div>
						</div>
					</div>
				</div>

				<div class="col-md-4 col-xs-12">
					<div class="row">
						<div class="widget-content">
							<div class="info-box bg-red">
								<span class="info-box-icon"><i class="fa fa-phone"></i></span>
								<div class="info-box-content">
									<span class="info-box-text">Kontak Pengelola</span>
									<div class="progress">
										<div class="progress-bar" style="width:60%"></div>
									</div>
									<span class="progress-description">
										<?php echo $potensi['kontak_pengelola']; ?>
									</span>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>	
		<?php endif ?>

		<div class="artikel-single">
			<?php if(!empty($content['link_embed'])): ?>
			<p style="text-align: center"><iframe width="100%" height="415" src="https://www.youtube.com/embed/<?php echo $content['link_embed']; ?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe></p>
			<?php endif ?>

			<?php echo htmlspecialchars_decode( $content['isi'] ); ?>
			
			<?php if($content['gambar1']!='' and is_file(LOKASI_FOTO_ARTIKEL."sedang_".$content['gambar1'])): ?>
				<div class="gambar-sampul2"><a class="img-responsive" href="<?php echo base_url().LOKASI_FOTO_ARTIKEL.'sedang_'.$content['gambar1']; ?>" title=""><img src="<?php echo base_url().LOKASI_FOTO_ARTIKEL.'sedang_'.$content['gambar1']; ?>" class="img-responsive img-fluid"/></a>
				</div>
				<div class="caption-gambar-artikel">Gambar 1 : <?php echo $content['caption1']; ?></div>
			<?php endif; ?>
			<?php if($content['gambar2']!='' and is_file(LOKASI_FOTO_ARTIKEL."sedang_".$content['gambar2'])): ?>
				<div class="gambar-sampul2"><a class="img-responsive" href="<?php echo base_url().LOKASI_FOTO_ARTIKEL.'sedang_'.$content['gambar2']; ?>" title=""><img src="<?php echo base_url().LOKASI_FOTO_ARTIKEL.'sedang_'.$content['gambar2']; ?>" class="img-responsive img-fluid"/></a>
				</div>
				<div class="caption-gambar-artikel">Gambar 2 : <?php echo $content['caption2']; ?></div>
			<?php endif; ?>
			<?php if($content['gambar3']!='' and is_file(LOKASI_FOTO_ARTIKEL."sedang_".$content['gambar3'])): ?>
				<div class="gambar-sampul2"><a class="img-responsive" href="<?php echo base_url().LOKASI_FOTO_ARTIKEL.'sedang_'.$content['gambar3']; ?>" title=""><img src="<?php echo base_url().LOKASI_FOTO_ARTIKEL.'sedang_'.$content['gambar2']; ?>" class="img-responsive img-fluid"/></a>
				</div>
				<div class="caption-gambar-artikel">Gambar 3 : <?php echo $content['caption3']; ?></div>
			<?php endif; ?>
			
			<?php if($content['dokumen']!='' and is_file(LOKASI_DOKUMEN.$content['dokumen'])): ?>
				<hr/><p>Dokumen Lampiran : <a href="<?= base_url().LOKASI_DOKUMEN.$content['dokumen']?>" title="" targer="_blank"><?= $content['link_dokumen']?></a></p>
			<?php endif; ?>

			<?php if(!empty($content['sumber_berita'])): ?>
			<p><b>Sumber :</b> <a href="<?php echo $content['link_sumber_berita']; ?>" target="_blank"><b><i><?php echo $content['sumber_berita']; ?></i></b></a></p>
			<?php endif ?>

			<!-- Signature Sambutan -->
			<?php $sambutan = $this->db->query('select * from sambutan where id_artikel = ?', $content["id"])->row_array();
			if($sambutan): ?>
				<div class="pic">
					<img src="<?=site_url('desa/upload/sambutan/'.$sambutan['foto_sambutan']) ?>" alt="" class="foto-kades">
					<div class="pic-body">
						<div class="nama-kades"><?php echo $sambutan['pemberi_sambutan']; ?></div>
						<p><?php echo $sambutan['jabatan_sambutan']; ?></p>												
					</div>
				</div>
			<?php endif ?>
		</div>
		<!-- Social Media Share Section Start -->	
		<div class="sosmed-share">
			<div class="social-share">
				<a name="fb_share" href="http://www.facebook.com/sharer.php?u=<?= site_url().'berita/detail/'.$content['kategori_slug'].'/'. $content['slug']?>" target="_blank" class="fa fa-facebook"></a>
				<a href="http://twitter.com/share?url=<?= site_url().'berita/detail/'.$content['kategori_slug'].'/'. $content['slug']?>" target="_blank" class="fa fa-twitter"></a>
				<a href="https://api.whatsapp.com/send?text=<?= site_url().'berita/detail/'.$content['kategori_slug'].'/'. $content['slug']?>" target="_blank" class="fa fa-whatsapp"></a>
				<a href="https://t.me/share/url?url=<?= site_url().'berita/detail/'.$content['kategori_slug'].'/'. $content['slug']?>" target="_blank" class="fa fa-telegram"></a>
			</div>
		</div>

		<!-- Social Media Share Section End -->		
	</div>
	<div class="meta-bottom-single-content">
			<div class="row">
				<div class="col-md-8 col-xs-6">
					<?php if ( trim($content['kategori'] ) != ''): ?>
			                <a href="<?php echo get_kategori_url( $content['id_kategori'] ); ?>"><i class="ti-agenda"></i> <?php echo ucwords( $content['kategori'] ); ?></a>
			            <?php endif; ?>
				</div>
				<div class="col-md-4 col-xs-6 text-right">
					<i class="ti-eye"></i> <?php echo ucwords( $content['hit'] ); ?>
				</div>
			</div>
		</div>
</div>

<div class="box">
	<div class="box-primary">
			<?php $this->load->view($folder_themes.'/comments');?>
	</div>
</div>

