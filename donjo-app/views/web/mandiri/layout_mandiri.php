<?php $this->load->view('web/mandiri/header_mandiri') ?>

<div class="content-wrapper">
	<div class="container">
		<section class="content">
			<div class="callout callout-success">
				<h4>Selamat Datang</h4>
				<p>The construction of this layout differs from the normal one. In other words, the HTML markup of the navbar
					and the content will slightly differ than that of the normal layout.</p>
			</div>
			<?php $this->load->view('web/mandiri/layanan_mandiri'); ?>
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
<?php $this->load->view('web/mandiri/footer_mandiri') ?>
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


