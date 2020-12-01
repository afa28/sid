<div class="panel">
	<div class="dl-title">Album Foto</div>
	<div class="panel-body">				
		<?php foreach ($gallery AS $data): ?>
			<?php if (is_file(LOKASI_GALERI . "sedang_" . $data['gambar'])): ?>
			<div class="col-sm-4 album-page">
				<div class="blog-image album-thumb">
					<span class="album-label"><a href="<?= site_url('galeri/'.$data['id'].'/1'); ?>" style="color:#fff;"><?php echo ucwords(character_limiter( $data['nama'], 30 )); ?></a></span>
					<a href="<?= site_url('galeri/'.$data['id'].'/1'); ?>"><img src="<?= AmbilGaleri($data['gambar'],'kecil')?>" class="img-responsive cover-album"/></a>
				</div>
				<div class="album-upload"><?php echo tgl_indo( $data['tgl_upload'] ); ?></div>
			</div>
			<?php endif; ?>
		<?php endforeach; ?>
	</div>
</div>
