<?php  if(!defined('BASEPATH')) exit('No direct script access allowed'); ?>

<div class="container-default section-footer">
	<div class="container">
		<div class="footer">
			<div class="footer-top">
				<div class="row">
					<div class="col-md-4">
						<div class="footer-left">							
							<div class="footer-title">Tentang <?php echo ucwords($this->setting->sebutan_desa)." "?><?php echo ucwords($desa['nama_desa'])?></div>
							<p style="text-align:justify"><?php echo $desa ['tentang'] ?></p>	
						</div>
					</div>
					<div class="col-md-4">
						<div class="footer-center">
							<div class="logo-footer">
								<a href="<?php echo base_url()?>siteman" target="_blank"><img src="<?php echo base_url().'desa/logo/'.$desa['logo']; ?>" alt="Logo Desa" width="100"></a>
							</div>
						</div>
					</div>
					<div class="col-md-4">
						<div class="footer-right">
							<div class="footer-title">Kontak <?php echo ucwords($this->setting->sebutan_desa)." "?><?php echo ucwords($desa['nama_desa'])?></div>
							<i class="fa fa-map-marker"></i> &nbsp;<?php echo $desa['alamat_kantor']?>
							<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo ucwords($this->setting->sebutan_kecamatan." ".$desa['nama_kecamatan'])?> <?php echo ucwords($this->setting->sebutan_kabupaten." ".$desa['nama_kabupaten'])?>
							<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $desa['nama_propinsi']?>
							<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Kodepos <?php echo $desa['kode_pos']?>
							<br /><i class="fa fa-phone"></i> &nbsp;Telepon : <?php echo $desa['telepon']?>
							<br /><i class="fa fa-envelope"></i> Email : <?php echo $desa['email_desa']?>
							<br /><i class="fa fa-globe"></i> &nbsp;<?php echo $desa['website']?> 
						</div>
					</div>
				</div>
			</div>
			<div class="footer-bottom">
				<div class="social-footer">
					<?php foreach ($sosmed As $data): ?>
	                  <?php if (!empty($data["link"])): ?>
						<a href="<?= $data['link']?>" target="_blank" class="scl-btn scl-crcl shadow <?= $data['icon'] ?>"></a>
	                  <?php endif; ?>
	                <?php endforeach; ?>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="container-default section-copyright">
		<div class="web-copyright">
			<?php echo ucwords($this->setting->copyright_desa)." "?>. Tema <?php echo ucwords($this->setting->web_theme)." "?> dibuat oleh <a href="https://www.solah.web.id" target="_blank" class="color:#777">Solah Web</a>.
			<br />
			<?php echo html_entity_decode($this->setting->footer_aplikasi) ?>. V.<?= AmbilVersi()?>
		</div>
</div>


<!-- /.wrapper -->

<!-- Untuk menampilkan modal -->
<div  class="modal fade" id="modalBox" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class='modal-dialog'>
		<div class='modal-content'>
			<div class='modal-header'>
				<button type='button' class='close' data-dismiss='modal' aria-hidden='true'>&times;</button>
				<h4 class='modal-title' id='myModalLabel'> Pengaturan Pengguna</h4>
			</div>

			<div class="fetched-data"></div>
		</div>
	</div>
</div>
</body>
</html>

