<?php if(!defined('BASEPATH')) exit('No direct script access allowed'); ?>
<div class="box-header with-border">
	<h3 class="box-title">KOTAK PESAN</h3>
</div>
<div class="box-header">
	<a href="<?= site_url("first/mandiri/1/3")?>" class="btn btn-social btn-flat btn-info btn-sm btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block" title="Tambah Artikel">
		<i class="fa fa-arrow-circle-left "></i>Kembali ke halaman Kotak Pesan
	</a>
</div>
<div class="box-body">
	<form action="<?= $form_action ?>" class="form form-horizontal" id="validasi" method="POST">
		<div class="form-group">
			<label class="control-label col-sm-2" for="email">NIK</label>
			<div class="col-sm-9">
				<input type="text" class="form-control input-sm required" id="email" name="email" value="<?= $individu['nik'] ?>" readonly>
			</div>
		</div>
		<div class="form-group">
			<label class="control-label col-sm-2" for="owner">Nama Pengirim</label>
			<div class="col-sm-9">
				<input type="text" class="form-control input-sm required" id="owner" name="owner" value="<?= $individu['nama'] ?>" readonly>
			</div>
		</div>
		<div class="form-group">
			<label class="control-label col-sm-2" for="subjek">Subjek</label>
			<div class="col-sm-9">
				<input class="form-control input-sm required" id="subjek" name="subjek" value="<?php $subjek and print($subjek) ?>">
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-2 control-label" for="komentar">Pesan</label>
			<div class="col-sm-9">
				<textarea class="form-control input-sm required" name="komentar" id="komentar"></textarea>
			</div>
		</div>
		<div class='box-footer'>
			<div class='col-xs-12'>
				<button type="submit" class='btn btn-social btn-flat btn-info btn-sm pull-right confirm'><i class='fa fa-check'></i> Kirim Pesan</a></button>
			</div>
		</div>
	</form>
</div>
<script>
	$(document).ready(function() {
		const sHeight = parseInt($("#komentar").get(0).scrollHeight) + 30;
		$('#komentar').attr('style', `height:${sHeight}px;`);
	})
</script>
