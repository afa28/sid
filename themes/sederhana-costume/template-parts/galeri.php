<link rel="stylesheet" href="<?php echo base_url().$this->theme_folder.'/'.$this->theme; ?>/assets/lightbox/lightbox.css">


<div class="panel">
		<div class="dl-title">Galeri Foto</div>
	<div class="panel-body">				
			<?php foreach ($gallery AS $data): ?>
				<?php if (is_file(LOKASI_GALERI . "sedang_" . $data['gambar'])): ?>
				<div class="col-sm-6 album-page">
					<div class="blog-image album-thumb">
						<span class="album-label"><?= $data['nama']?></span>
						<a href="<?= AmbilGaleri($data['gambar'],'sedang')?>" data-toggle="lightbox" data-gallery="example-gallery" class="img-responsive cover-album img-fluid" title="<?= $data['nama']?>" data-title="<?= $data['nama']?>" data-footer="<?php echo tgl_indo( $data['tgl_upload'] ); ?>">
							<img src="<?= AmbilGaleri($data['gambar'],'kecil')?>" class="img-responsive cover-album img-fluid" style="width:400px; height:267px" title="<?= $data['nama']?>"/>
						</a>
					</div>
					<div class="album-upload"><?php echo tgl_indo( $data['tgl_upload'] ); ?></div>
				</div>
				<?php endif; ?>
				<?php endforeach; ?>
	</div>
</div>

<script type="text/javascript" src="<?php echo base_url().$this->theme_folder.'/'.$this->theme; ?>/assets/lightbox/lightbox.js"></script>
<script type="text/javascript" src="<?php echo base_url().$this->theme_folder.'/'.$this->theme; ?>/assets/lightbox/lightbox.min.js"></script>
<script type="text/javascript">
$(document).on('click', '[data-toggle="lightbox"]', function(event) {
                event.preventDefault();
                $(this).ekkoLightbox();
            });
</script>