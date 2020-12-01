<?php  if(!defined('BASEPATH')) exit('No direct script access allowed'); ?>

<div class="widget-arsip_artikel">
	<ul id="ul-menu">
		<?php foreach ($arsip as $data): ?>
			<li><a
				href="<?php echo get_artikel_url( $data['id'], $data['id_kategori'] ); ?>"><?= character_limiter( $data['judul'], 50 ); ?></a>
			</li>
		<?php endforeach; ?>
	</ul>
</div>