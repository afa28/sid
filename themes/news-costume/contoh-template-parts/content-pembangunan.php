<?php  if(!defined('BASEPATH')) exit('No direct script access allowed'); ?>

<?php if(is_file(LOKASI_FOTO_ARTIKEL.'sedang_'.$content['gambar'])) { ?>
	<img width="100%" class="img-responsive" src="<?php echo base_url().LOKASI_FOTO_ARTIKEL.'sedang_'.$content['gambar']; ?>" alt="<?php echo $content['judul']; ?>">
<?php } ?>

<div class="panel panel-default">

	<div class="panel-body">
		<div class="judul-agenda"><?php echo $content['judul']; ?></div>
		
		<!-- Post Content -->
		
		<div class="data-agenda hidden-lg">
			<p><b>Anggaran :</b> <?php echo uang_indo ($content['nilai_pembangunan']); ?><br />
			<b>Lokasi :</b><?php echo $content['lokasi_pembangunan']; ?><br />
			<b>Koordinator :</b><?php echo $content['koordinator_pembangunan']; ?><br />
			</p>
				 
			<hr/>
		</div>
		
		<div class="columb-4 columb hidden-sm hidden-xs">
			<div class="small-box bg-hijau">
				<div class="inner">
					<h3 class="label-agenda">
						Anggaran						
					</h3>
					<p class="text-agenda"><?php echo uang_indo ($content['nilai_pembangunan']); ?></p>
				</div>
				<div class="icon">
					<i class="fa fa-usd"></i>
				</div>
			</div>
		</div>
		<div class="columb-4 columb hidden-sm hidden-xs">
			<div class="small-box bg-merah">
				<div class="inner">
					<h3 class="label-agenda">Lokasi</h3>
					<p class="text-agenda"><?php echo $content['lokasi_pembangunan']; ?></p>
				</div>
				<div class="icon">
					<i class="fa fa-map-marker"></i>
				</div>
			</div>
		</div>
		<div class="columb-4 columb hidden-sm hidden-xs">
			<div class="small-box bg-biru">
				<div class="inner">
					<h3 class="label-agenda">Koordinator</h3>
					<p class="text-agenda"> <?php echo $content['koordinator_pembangunan']; ?></p>
				</div>
				<div class="icon">
					<i class="fa fa-user-secret"></i>
				</div>
			</div>
		</div>
		
		<div class="artikel-single">
			<?php echo htmlspecialchars_decode( $content['isi'] ); ?>
			
			<?php if($content['gambar1']!='' and is_file(LOKASI_FOTO_ARTIKEL."sedang_".$content['gambar1'])): ?>
				<div class="gambar-sampul2"><a class="img-responsive" href="<?php echo base_url().LOKASI_FOTO_ARTIKEL.'sedang_'.$content['gambar1']; ?>" title=""><img src="<?php echo base_url().LOKASI_FOTO_ARTIKEL.'sedang_'.$content['gambar1']; ?>" class="img-responsive"/></a>
				</div>
			<?php endif; ?>
			<?php if($content['gambar2']!='' and is_file(LOKASI_FOTO_ARTIKEL."sedang_".$content['gambar2'])): ?>
				<div class="gambar-sampul2"><a class="img-responsive" href="<?php echo base_url().LOKASI_FOTO_ARTIKEL.'sedang_'.$content['gambar2']; ?>" title=""><img src="<?php echo base_url().LOKASI_FOTO_ARTIKEL.'sedang_'.$content['gambar2']; ?>" class="img-responsive"/></a>
				</div>
			<?php endif; ?>
			<?php if($content['gambar3']!='' and is_file(LOKASI_FOTO_ARTIKEL."sedang_".$content['gambar3'])): ?>
				<div class="gambar-sampul2"><a class="img-responsive" href="<?php echo base_url().LOKASI_FOTO_ARTIKEL.'sedang_'.$content['gambar3']; ?>" title=""><img src="<?php echo base_url().LOKASI_FOTO_ARTIKEL.'sedang_'.$content['gambar2']; ?>" class="img-responsive"/></a>
				</div>
			<?php endif; ?>
			
			<?php if($content['dokumen']!='' and is_file(LOKASI_DOKUMEN.$content['dokumen'])): ?>
				<hr/><p>Dokumen Lampiran : <a href="<?= base_url().LOKASI_DOKUMEN.$content['dokumen']?>" title=""><?= $content['link_dokumen']?></a></p>
				<br/>
			<?php endif; ?>
			<div class="meta-content text-right">	
				<small>Diterbitkan oleh <?php echo $content['owner']; ?>, <?php echo tgl_indo2( $content['tgl_upload'] ); ?></small>	
			</div>
		</div>
		<!-- Social Media Share Section Start -->	
		<div class="head-share">Bagikan :</div>
		<div class="social-footer">
			<a href="http://www.facebook.com/sharer.php?u=<?= site_url().'pembangunan'.$content['kategori_slug'].'/'. $content['slug']?>" target="_blank"><span><i class="fa fa-facebook"></i></span></a>
			<a href="http://twitter.com/share?url=<?= site_url().'pembangunan'.$content['kategori_slug'].'/'. $content['slug']?>" target="_blank"><span><i class="fa fa-twitter"></i></span></a>
			<a href="https://api.whatsapp.com/send?text=<?= site_url().'pembangunan'.$content['kategori_slug'].'/'. $content['slug']?>" target="_blank"><span><i class="fa fa-whatsapp"></i></span></a>
		</div>
		<!-- Social Media Share Section End -->
	</div>
</div>

<div class="box">
	<div class="box-primary">
			<?php $this->load->view($folder_themes.'/comments');?>
	</div>
</div>
