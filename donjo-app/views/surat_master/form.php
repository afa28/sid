<div class="content-wrapper">
	<section class="content-header">
		<h1>Pengaturan Format Surat Desa</h1>
		<ol class="breadcrumb">
			<li><a href="<?= site_url('hom_sid'); ?>"><i class="fa fa-home"></i> Home</a></li>
			<li><a href="<?= site_url('surat_master'); ?>"> Format Surat Desa</a></li>
			<li class="active">Pengaturan Format Surat</li>
		</ol>
	</section>
	<section class="content" id="maincontent">
		<div class="row">
			<div class="col-md-12">
				<div class="box box-info">
					<div class="box-header with-border">
						<a href="<?= site_url("surat_master"); ?>" class="btn btn-social btn-flat btn-info btn-sm btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block" title="Kembali Ke Daftar Wilayah">
							<i class="fa fa-arrow-circle-left "></i>Kembali ke Daftar Format Surat
						</a>
					</div>
					<div class="box-body">
						<form id="validasi" action="<?= $form_action; ?>" method="POST" enctype="multipart/form-data" class="form-horizontal">
							<div class="box-body">
								<div class="form-group">
									<label class="col-sm-3 control-label" for="kode_surat">Kode/Klasifikasi Surat</label>
									<div class="col-sm-7">
										<select class="form-control input-sm select2-tags required" id="kode_surat" name="kode_surat" style="width: 100%;">
											<option >
												<?php if (!empty($surat_master['kode_surat'])): ?>
													<?= $surat_master['kode_surat']?>
												<?php else: ?>
													-- Pilih Kode/Klasifikasi Surat --
												<?php endif; ?>
											</option>
											<?php foreach ($klasifikasi as $item): ?>
												<option value="<?= $item['kode'] ?>" <?php selected($item['kode'], $surat_master["kode_surat"]); ?>><?= $item['kode'].' - '.$item['nama']?></option>
											<?php endforeach;?>
										</select>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-3 control-label" >Nama Layanan</label>
									<div class="col-sm-7">
										<div class="input-group">
											<span class="input-group-addon input-sm">Surat</span>
											<input type="text" class="form-control input-sm required" id="nama" name="nama" placeholder="Nama Layanan" value="<?= $surat_master['nama']?>"/>
										</div>
									</div>
								</div>
								<?php if (strpos($form_action, 'insert') !== FALSE): ?>
									<div class="form-group">
										<label class="col-sm-3 control-label" for="nama">Pemohon Surat</label>
										<div class="col-sm-3">
											<select class="form-control input-sm" id="pemohon_surat" name="pemohon_surat">
												<option value="warga" selected>Warga</option>
												<option value="non_warga">Bukan Warga</option>
											</select>
										</div>
									</div>
								<?php endif; ?>
								<div class="form-group">
									<label class="col-sm-3 control-label" for="mandiri">Kode/Klasifikasi Surat</label>
									<div class="btn-group col-sm-7" data-toggle="buttons">
										<label id="m1" class="btn btn-info btn-flat btn-sm col-xs-6 col-sm-4 col-lg-2 form-check-label active">
											<input id="g1" type="radio" name="mandiri" class="form-check-input" type="radio" value="1" checked  autocomplete="off" onchange="syarat(this.value);"> Ya
										</label>
										<label id="m1" class="btn btn-info btn-flat btn-sm col-xs-6 col-sm-4 col-lg-2 form-check-label ">
											<input id="g2" type="radio" name="mandiri" class="form-check-input" type="radio" value="0"  autocomplete="off" onchange="syarat(this.value);"> Tidak
										</label>
									</div>
								</div>
								<div class="row" id="atur_syarat">
									<div class="col-sm-3"></div>
									<div class="col-sm-9">
										<div class="table-responsive">
											<table class="table table-bordered dataTable table-striped table-hover tabel-daftar">
												<thead class="bg-gray disabled color-palette">
													<tr>
														<th>No</th>
														<th><input type="checkbox" id="checkall0[]" onclick="myFunction0()"/></th>
														<th width="90%">Nama Dokumen</th>
													</tr>
												</thead>
												<tbody>
													<?php if ($list_ref_syarat): ?>
														<?php foreach ($list_ref_syarat as $key => $ref_syarat): ?>
															<tr>
																<td class="padat"><?= ($key + 1); ?></td>
																<td class="padat"><input type="checkbox" name="syarat[]" value="<?=$ref_syarat['ref_syarat_id']?>" <?php in_array($ref_syarat['ref_syarat_id'], array_column($syarat_surat, 'ref_syarat_id')) and print('checked');?>></td>
																<td><?= $ref_syarat['ref_syarat_nama']?></td>
															</tr>
														<?php endforeach; ?>
													<?php else: ?>
														<tr>
															<td class="text-center" colspan="3">Data Tidak Tersedia</td>
														</tr>
													<?php endif; ?>
												</tbody>
											</table>
										</div>
									</div>
								</div>
							</div>
							<div class="box-footer">
								<button type="reset" class="btn btn-social btn-flat btn-danger btn-sm"><i class="fa fa-times"></i> Batal</button>
								<button type="submit" class="btn btn-social btn-flat btn-info btn-sm pull-right"><i class="fa fa-check"></i> Simpan</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>

<script type="text/javascript">
	$('document').ready(function() {
		syarat(1);
	});

	function myFunction0() {
		var checkBox = document.getElementById("checkall0[]");
		if (checkBox.checked == true){
			var items=document.getElementsByName('syarat[]');
			for(var i=0; i<items.length; i++){
				if(items[i].type=='checkbox')
				items[i].checked=true;
			}
		} else {
			var items=document.getElementsByName('syarat[]');
			for(var i=0; i<items.length; i++){
				if(items[i].type=='checkbox')
				items[i].checked=false;
			}
		}
	}

	function syarat(val){
		if (val == 1) {
			$('#atur_syarat').show();
		} else {
			$('#atur_syarat').hide();
		}
	}
</script>
