<?php $this->load->view('web/mandiri/header_mandiri.php') ?>

<div class="content-wrapper">
	<div class="container">
		<section class="content">
			<div class="callout callout-danger">
				<h4>Selamat Datang</h4>
				<p>The construction of this layout differs from the normal one. In other words, the HTML markup of the navbar
					and the content will slightly differ than that of the normal layout.</p>
			</div>
			<div class="row">
				<div class="col-sm-3">
					<div class="info-box bg-aqua">
						<span class="info-box-icon"><i class="fa fa-user"></i></span>
						<div class="info-box-content">
							<span class="info-box-text"><b>Biodata</b></span>
							<br>
							<div class="progress">
								<div class="progress-bar" style="width: 100%"></div>
							</div>
							<span class="progress-description">
								<a href="<?= site_url('first/mandiri/1/1'); ?>" style="color:white">Selengkapnya</a>
							</span>
						</div>
					</div>
				</div>
				<div class="col-sm-3">
					<div class="info-box bg-green">
						<span class="info-box-icon"><i class="fa fa-envelope-o"></i></span>
						<div class="info-box-content">
							<span class="info-box-text"><b>Pesan</b></span>
							<br>
							<div class="progress">
								<div class="progress-bar" style="width: 100%"></div>
							</div>
							<span class="progress-description">
								<a href="<?= site_url('first/mandiri/1/3'); ?>" style="color:white">Selengkapnya</a>
							</span>
						</div>
					</div>
				</div>
				<div class="col-sm-3">
					<div class="info-box bg-yellow">
						<span class="info-box-icon"><i class="fa fa-history"></i></span>
						<div class="info-box-content">
							<span class="info-box-text"><b>Permohonan</b></span>
							<br>
							<div class="progress">
								<div class="progress-bar" style="width: 100%"></div>
							</div>
							<span class="progress-description">
								<a href="<?= site_url('first/mandiri/1/2'); ?>" style="color:white">Selengkapnya</a>
							</span>
						</div>
					</div>
				</div>
				<div class="col-sm-3">
					<div class="info-box bg-red">
						<span class="info-box-icon"><i class="fa fa-handshake-o"></i></span>
						<div class="info-box-content">
							<span class="info-box-text"><b>Bantuan</b></span>
							<br>
							<div class="progress">
								<div class="progress-bar" style="width: 100%"></div>
							</div>
							<span class="progress-description">
								<a href="<?= site_url('first/mandiri/1/4'); ?>" style="color:white">Selengkapnya</a>
							</span>
						</div>
					</div>
				</div>
			</div>
			<div class="box box-info">
				<?php if (empty($views_partial_layout)): ?>
					<?php
						switch ($m) {
							case 1:
								$views_partial_layout = 'mandiri';
								break;
							case 2:
								$views_partial_layout = 'layanan';
								break;
							case 3:
								$views_partial_layout = 'mailbox';
								break;
							case 4:
								$views_partial_layout = 'bantuan';
								break;
							case 5:
								$views_partial_layout = 'surat';
								break;
							default:
								$views_partial_layout = 'mandiri';
						}
					?>
				<?php else: ?>
					<?php $data['mandiri'] = 1; ?>
				<?php endif; ?>
				<?php $this->load->view("web/mandiri/$views_partial_layout", $data);?>
			</div>
		</section>
	</div>
</div>
<?php $this->load->view('web/mandiri/footer_mandiri.php') ?>
<script>
	$(document).ready(function() {
		// Di form surat ubah isian admin menjadi disabled
		$("#wrapper-mandiri .readonly-permohonan").attr('disabled', true);
		$("#wrapper-mandiri form#validasi").removeAttr('target');
		$("#wrapper-mandiri .tdk-permohonan textarea").removeClass('required');
		$("#wrapper-mandiri .tdk-permohonan select").removeClass('required');
		$("#wrapper-mandiri .tdk-permohonan input").removeClass('required');
	});
</script>


