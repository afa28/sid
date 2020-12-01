<?php  if(!defined('BASEPATH')) exit('No direct script access allowed'); ?>

<style type="text/css">
table.form
{
	margin-bottom: 10px;
	margin-top: 10px;
}
</style>

<div class="layanan cetak-surat">

	<div class="box mb-4">
		<div class="box-header">
			Laporkan Perubahan Data Kependudukan Anda
		</div>

		<div class="box-body">
			<form id="validasi" action="<?php echo site_url('layanan_mandiri/simpan_laporan'); ?>" method="POST" enctype="multipart/form-data" onSubmit="return validasi(this);">
				<div class="form-group">
					<!-- Tampilkan hanya jika 'flash_message' ada -->
					<?php if ($this->session->flashdata('flash_message')): ?>
						<?php echo $this->session->flashdata('flash_message'); ?>
					<?php endif; ?>
				</div>

				<div class="form-group">
					<input class="form-control input-sm" type="text" name="owner" value="<?= $_SESSION['nama']?>" readonly="" />
				</div>

				<div class="form-group">
					<input class="form-control input-sm" type="text" name="email" value="<?= $_SESSION['nik']?>" readonly="" />
				</div>

				<div class="form-group">
					<label for="komentar">Laporan</label>
					<textarea name="komentar" class="form-control input-sm" rows="10" placeholder="Tulis laporan Anda disini" required=""></textarea>
				</div>

				<div class="form-group text-right">
					<button type="submit" class="btn btn-sm btn-primary">Kirim Laporan</button>
				</div>
			</form>
		</div>
	</div>
</div>
