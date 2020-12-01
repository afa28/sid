<?php  if(!defined('BASEPATH')) exit('No direct script access allowed'); ?>

	
<!-- Widget Agenda -->

<?php if ($agenda): ?>
        <?php foreach ($agenda as $data): ?>
		<div class="agenda-list">
			<div class="judul-agenda-kegiatan"><a href="<?php echo site_url( 'agenda/'.$data['slug'] ); ?>" class="text-white"><?php echo ucwords(character_limiter( $data['judul'], 30 )); ?></a></div>
			<div class="row">			
				<div class="col-md-4">
					<div class="bln">
						<?= bln($data['tgl_agenda'])?> - <?= thn($data['tgl_agenda'])?>
					</div>
					<div class="tgl">
						<?= tgl($data['tgl_agenda'])?>
					</div>
				</div>
				<div class="col-md-8">
					<div class="lokasi-agenda-kegiatan"><i class="fa fa-map-signs"></i> <?= $data['lokasi_kegiatan']?></div>
					<div class="koordinator-agenda-kegiatan"><i class="fa fa-bullhorn"></i> <?= $data['koordinator_kegiatan']?></div>
				</div>			
			</div>
		</div>
        <?php endforeach; ?>
<?php endif; ?>

			