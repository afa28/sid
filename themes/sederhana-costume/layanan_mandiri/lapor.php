<?php  if(!defined('BASEPATH')) exit('No direct script access allowed'); ?>

<style type="text/css">
table.form
{
	margin-bottom: 10px;
	margin-top: 10px;
}
</style>
<div class="tombol">
	<a href="<?=site_url('layanan_mandiri/laporan')?>" class="btn btn-social btn-flat btn-info btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block" title="Daftar Laporan"><i class="fa fa-list"></i> Arsip Laporan Anda</a>
</div>
<div class="layanan cetak-surat">
	<div class="box mb-4">
		<div class="box-header">
			Form Laporan Penduduk
		</div>
		<div class="box-body">
			<form id="validasi" action="<?php echo site_url('layanan_mandiri/simpan_laporan'); ?>" method="POST" enctype="multipart/form-data" onSubmit="return validasi(this);">
				<?php if ($this->session->flashdata('flash_message')): ?>
						<?php echo $this->session->flashdata('flash_message'); ?>
					<?php endif; ?>

				<div class="form-group">
					<input class="form-control input-sm" type="text" name="owner" value="<?= $_SESSION['nama']?>" readonly="" />
				</div>

				<div class="form-group">
					<input class="form-control input-sm" type="text" name="email" value="<?= $_SESSION['nik']?>" readonly="" />
				</div>
				
				<div class="form-group">
					<label for="jenis">Jenis Laporan</label>
					<select class="form-control input-sm" name="jenis">
						<?php $jenis = [							
							'Adminsistrasi',
							'Keamanan',
							'Ganggunan',
							'Infrastruktur',
							'Bencana',
							'Lainnya'
						]?>
						<?php foreach ($jenis as $key => $value): ?>
							<option value="<?php echo $key ?>" <?php echo $key == 0 ? 'selected':'' ?>><?php echo $value ?></option>
						<?php endforeach ?>
					</select>
				</div>

				<div class="form-group">
					<label for="judul">Judul</label>
					<input name="judul" class="form-control input-sm" type="text" value="<?= $_SESSION['judul']?>" placeholder="Tulis judul laporan Anda disini" required/>
				</div>

				<div class="form-group">
					<label for="komentar">Laporan</label>
					<textarea name="komentar" class="form-control input-sm" rows="10" placeholder="Tulis laporan Anda disini" required=""></textarea>
				</div>


				<div class="form-group">
					<label for="komentar">Lampiran</label>
					<div class="input-group input-group-sm">
						<input type="text" class="form-control" id="file_path">
						<input type="file" class="hidden" id="file" name="lampiran">
						<span class="input-group-btn">
							<button type="button" class="btn btn-info btn-flat" id="file_browser"><i class="fa fa-search"></i> Browse</button>
						</span>
					</div>
				</div>

				<div class="form-group">
					<div class="input-group input-group-sm">
						<input type="text" class="form-control" id="file_path2">
						<input type="file" class="hidden" id="file2" name="lampiran2">
						<span class="input-group-btn">
							<button type="button" class="btn btn-info btn-flat" id="file_browser2"><i class="fa fa-search"></i> Browse</button>
						</span>
					</div>
				</div>

				<div class="form-group">
					<div class="input-group input-group-sm">
						<input type="text" class="form-control" id="file_path3">
						<input type="file" class="hidden" id="file3" name="lampiran3">
						<span class="input-group-btn">
							<button type="button" class="btn btn-info btn-flat" id="file_browser3"><i class="fa fa-search"></i> Browse</button>
						</span>
					</div>
				</div>

				<div class="form-group text-right">
					<button type="submit" class="btn btn-success">Kirim Laporan</button>
				</div>
			</form>
		</div>
	</div>
</div>