<?php  if(!defined('BASEPATH')) exit('No direct script access allowed'); ?>

<!-- Widget Arsip -->

<?php
	$query_populer = 'SELECT kategori, artikel.* FROM `artikel` JOIN kategori ON kategori.id = artikel.id_kategori WHERE hit > 0 ORDER BY hit DESC LIMIT 5';

	$populer = $this->db->query($query_populer)->result_array();
?>

<?php if ($populer): ?>
	<div class="widget-arsip">
		<ul class="timeline">
			<?php foreach ($populer as $data): ?>
				<?php
					$artikel = $this->db->query('select id_user, by_warga from artikel where id = ?', $data['id'])->row_array();
          $id_user = $artikel['id_user'];
          $by_warga = $artikel['by_warga'];
          if ($by_warga) {
            $foto = $this->db->query('select foto from tweb_penduduk where id = ?', $id_user)->row_array();
          } else {
            $foto = $this->db->query('select foto from user where id = ?', $id_user)->row_array();
          }
					$foto = $foto['foto'];
				?>
				<li>
					<i class="fa fa-calendar" style="color: olivedrab;background: olivedrab; ">
					<?php if ($foto): ?>
						<img src="<?= AmbilFoto($foto)?>" class="user-image" alt="User Image" width="30px" height="30px" style="margin-top: -30px; padding: 3px; border-radius: 20px;"/>
					<?php else :?>
						<img src="<?= base_url()?>assets/files/user_pict/kuser.png" class="user-image" width="30px" height="30px" style="margin-top: -30px; padding: 3px; border-radius: 20px;" alt="User Image"/>
					<?php endif; ?>
					</i>
				<div class="timeline-item">
					<div class="timeline-header"><a href="<?php echo get_artikel_url( $data['id'], $data['id_kategori'] ); ?>"><?= character_limiter( $data['judul'], 50 ); ?></a></div>
					<div class="dlab-post-meta">
						<ul>
							<li class="post-date">Dibaca <?php echo ( $data['hit'] ); ?> Kali</li>
							<li class="post-cat">
						<?php if ( trim($data['kategori'] ) != ''): ?>
							<a href="<?php echo get_kategori_url( $data['id_kategori'] ); ?>" class="cat-label"><?php echo ucwords( $data['kategori'] ); ?></a>
						<?php endif; ?>
							</li>
						</ul>
					</div>
				</div>
				</li>
			<?php endforeach; ?>
		</ul>
	</div>
	<?php endif; ?>