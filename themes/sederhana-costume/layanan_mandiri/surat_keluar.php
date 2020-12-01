<?php  if(!defined('BASEPATH')) exit('No direct script access allowed'); ?>

<div class="layanan cetak-surat">

	<div class="card mb-4">
		<div class="card-header">
			DAFTAR SURAT KELUAR
		</div>

		<div class="card-body">
			<div class="table-responsive">
				<table class="table table-striped table-bordered">
					<thead class="bg-gray disabled color-palette">
						<tr>
							<th class="text-center uppercase">No</th>
							<th class="text-center uppercase">Tanggal Dibuat</th>
							<th class="text-center uppercase">Jenis Surat</th>
							<th class="text-center uppercase">Ditandatangani Oleh</th>
							<th class="text-center uppercase">Aksi</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($data_surat as $key => $data) {
							if ($data['nama_surat']) {
								$berkas = $data['nama_surat'];
							}else {
								$berkas = $data["berkas"]."_".$data["nik"]."_".date("Y-m-d").".rtf";
							}

							$theFile = FCPATH.LOKASI_ARSIP.$berkas;
							$lampiran = FCPATH.LOKASI_ARSIP.$data['lampiran'];
							?>
							<tr>
								<td class="text-center"><?= ($key + 1) ?></td>
								<td><?= date('d/m/Y', strtotime($data['tanggal']))?></td>
								<td><?= $data['no_surat'].'-'.$data['format']?></td>
								<td><?= $data['pamong'] ?></td>
								<td class="text-center">
									<?php
									if (is_file($theFile)){ ?>
										<a href="<?= base_url(LOKASI_ARSIP.$berkas)?>" class="btn btn-primary btn-sm" title="Unduh Surat" target="_blank"><i class="fa fa-download"></i> Download</a>
									<?php } ?>
									<?php if (is_file($lampiran)){ ?>
										<a href="<?= base_url(LOKASI_ARSIP.$data['lampiran'])?>" target="_blank" class="btn btn-secondary btn-sm" title="Unduh Lampiran"><i class="fa fa-paperclip"></i> Lampiran</a>
									<?php } ?>
									<a href="<?= site_url("layanan_mandiri/hapus_surat_keluar/$data[id]")?>" class="btn btn-danger btn-sm"  title="Hapus Data"><i class="fa fa-trash-o"></i> Hapus</a>
								</td>
							</tr>
						<?php } ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>

</div>