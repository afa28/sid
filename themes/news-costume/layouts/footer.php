<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

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
					<a href="<?php echo $sosmed[nested_array_search('Facebook',$sosmed)]['link']?>" target="_blank"><span><i class="fa fa-facebook"></i></span></a>
					<a href="<?php echo $sosmed[nested_array_search('Twitter',$sosmed)]['link']?>" target="_blank"><span><i class="fa fa-twitter"></i></span></a>
					<a href="<?php echo $sosmed[nested_array_search('YouTube',$sosmed)]['link']?>" target="_blank"><span><i class="fa fa-youtube"></i></span></a>
					<a href="<?php echo $sosmed[nested_array_search('Instagram',$sosmed)]['link']?>" target="_blank"><span><i class="fa fa-instagram"></i></span></a>
					<a href="https://api.whatsapp.com/send?phone=<?php echo $sosmed[nested_array_search('WhatsApp',$sosmed)]['link']?>" target="_blank"><span><i class="fa fa-whatsapp"></i></span></a>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="container-default section-copyright">
	<div class="container">
		<div class="web-copyright">
			<?php echo ucwords($this->setting->copyright_desa)." "?>. Tema <?php echo ucwords($this->setting->web_theme)." "?> dibuat oleh <a href="https://www.solah.web.id" target="_blank" class="text-white">Solah Web</a>.
			<br />
			<a target="_blank" href="https://www.portaldesadigital.id" target="_blank" class="text-white">Portal Desa Digital</a> <a href="https://www.portaldesadigital.id/berita/detail/rilis/portal-desa-digital-v101" target="_blank" class="text-white"><?php echo AmbilVersi()?></a> dikembangkan oleh <a target="_blank" href="https://www.ayokreatif.id" class="text-white">Ayo Kreatif</a> bersama Pemdes <a href="https://www.desatambong.web.id" target="_blank" class="text-white">Tambong</a>.
		</div>
	</div>
</div>


<!-- /.wrapper -->

<!-- Untuk menampilkan modal -->
<div class="modal fade" id="modalBox" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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

<script src="<?php echo base_url(); ?>/assets/bootstrap/js/moment.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url(); ?>/assets/bootstrap/js/bootstrap.min.js"></script>
<!-- Select2 -->
<script src="<?php echo base_url(); ?>/assets/bootstrap/js/select2.full.min.js"></script>
<script src="<?php echo base_url(); ?>/assets/bootstrap/js/select2.full.min.js"></script>
<!-- DataTables -->
<script src="<?php echo base_url(); ?>/assets/bootstrap/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>/assets/bootstrap/js/dataTables.bootstrap.min.js"></script>
<!-- bootstrap Date time picker -->
<script src="<?php echo base_url(); ?>/assets/bootstrap/js/bootstrap-datetimepicker.min.js"></script>
<script src="<?php echo base_url(); ?>/assets/bootstrap/js/id.js"></script>
<!-- bootstrap Date picker -->
<script src="<?php echo base_url() ?>/assets/bootstrap/js/bootstrap-datepicker.min.js"></script>
<script src="<?php echo base_url(); ?>/assets/bootstrap/js/bootstrap-datepicker.id.min.js"></script>
<script src="<?php echo base_url(); ?>/assets/js/validasi.js"></script>
<script src="<?php echo base_url(); ?>/assets/js/jquery.validate.min.js"></script>
<script src="<?php echo base_url().$this->theme_folder.'/'.$this->theme; ?>/assets/js/script.js"></script>
</body>
</html>

