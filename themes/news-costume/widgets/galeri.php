<?php  if(!defined('BASEPATH')) exit('No direct script access allowed'); ?>

<!-- widget Galeri-->
<div class="row">
    <?php foreach ($w_gal As $data): ?>
    <?php if (is_file(LOKASI_GALERI . "sedang_" . $data['gambar'])): ?>
    <div class="col-sm-6 col-xs-12">
        <div class="foto-thumb">
			<a href="<?= site_url('galeri/'.$data['id'].'/1'); ?>">
            <img src="<?= AmbilGaleri($data['gambar'],'kecil')?>" class="gambar-thumbnail img-responsive" alt="<?= "Album : $data[nama]" ?>">
			</a>
        </div>
    </div>
    <?php endif; ?>
    <?php endforeach; ?>
    <div class="clearfix"></div>
</div>