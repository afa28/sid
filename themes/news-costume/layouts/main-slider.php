<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<!-- MAIN SLIDER -->
<div class="main-slider">
	<div id="mainSlider" class="carousel slide" data-ride="carousel">
		<?php if(count($slider_gambar['gambar']) > 1){ ?>
			<!-- Indicators -->
			<ol class="carousel-indicators">
				<?php foreach ($slider_gambar['gambar'] as $key => $gambar) { ?>
					<?php $file_gambar = $slider_gambar['lokasi'] . 'sedang_' . $gambar['gambar']; ?>
					<?php if(is_file($file_gambar)) : ?>
						<li data-target="#mainSlider" data-slide-to="<?= $key ?>" class="<?= $key === 0 ? 'active' : '' ?>"></li>
					<?php } ?>
				</ol>
			<?php } ?>

			<!-- Wrapper for slides -->
			<div class="carousel-inner">
				<?php foreach ($slider_gambar['gambar'] as $key => $data) { ?>
					<?php $file_gambar = $slider_gambar['lokasi'] . 'sedang_' . $gambar['gambar']; ?>
					<?php if(is_file($file_gambar)) : ?>
						<div class="item <?= $key === 0 ? 'active' : '' ?>">
							<a href="<?= buat_slug($data); ?>">
								<img src="<?= base_url($file_gambar); ?>" alt="<?= $data['judul'] ?>" width="100%">
							</a>

							<div class="carousel-caption">
								<div class="slide-caption"><?= $data['judul'] ?></div>
							</div>
						</div>
					<?php } ?>
				<?php } ?>
			</div>
		</div>
	</div>
	<!-- END MAIN SLIDER -->
