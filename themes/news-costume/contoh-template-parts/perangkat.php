<div class="panel">
	<div class="dl-title">Pemerintah Desa</div>
	<div class="panel-body">
		<div class="table-responsive">
			<table class="table table-bordered table-striped">
				<thead>
					<tr>
						<th width="15%" class="text-center uppercase success">Foto</th>
						<th colspan="3" class="text-center uppercase success">Keterangan</th>
					</tr>
				</thead>
					
				<tbody>
				<?php foreach ($main as $data): ?>					
					<tr>
						<td colspan="1" rowspan="10"><?php if ($data['foto']): ?>
								<img src="<?=AmbilFoto($data['foto'])?>" class="img-responsive" alt="User Image"/>
							<?php else: ?>
								<img src="<?= base_url()?>assets/files/user_pict/kuser.png" class="img-responsive" alt="User Image"/>
							<?php endif ?></td>
						<td width="25%" class="uppercase bold info">Nama</td>
						<td width="2%" class="text-center info">:</td>
						<td class="uppercase bold info"><?= $data['nama']?></td>
					</tr>
					<tr>
						<td class="uppercase bold">NIP/NIAP</td>
						<td class="text-center">:</td>
						<td class="uppercase">
							<?php if (!empty($data['pamong_nip']) and $data['pamong_nip'] != '-'): ?>
								NIP :<?= $data['pamong_nip']?></br>
							<?php else: ?>
								NIAP :<?= $data['pamong_niap']?></br>
							<?php endif; ?>
						</td>
					</tr>
					<tr>
						<td class="uppercase bold">Tempat, Tanggal Lahir</td>
						<td class="text-center">:</td>
						<td class="uppercase"><?= $data['tempatlahir'].', '.tgl_indo($data['tanggallahir'])?></td>
					</tr>
					<tr>
						<td class="uppercase bold">Jabatan</td>
						<td class="text-center">:</td>
						<td class="uppercase"><?= $data['jabatan']?></td>
					</tr>
					<tr>
						<td class="uppercase bold">Pangkat/Golongan</td>
						<td class="text-center">:</td>
						<td class="uppercase"><?= $data['pamong_pangkat']?></td>
					</tr>
					
					<tr>
						<td class="uppercase bold">Pendidikan Terakhir</td>
						<td class="text-center">:</td>
						<td class="uppercase"><?= $data['pendidikan_kk']?></td>
					</tr>
					<tr>
						<td class="uppercase bold">Nomor SK Pengangkatan</td>
						<td class="text-center">:</td>
						<td class="uppercase"><?= $data['pamong_nosk']?></td>
					</tr>
					<tr>
						<td class="uppercase bold">Tanggal SK Pengangkatan</td>
						<td class="text-center">:</td>
						<td class="uppercase"><?= tgl_indo($data['pamong_tglsk'])?></td>
					</tr>
					<tr>
						<td class="uppercase bold">Periode Jabatan</td>
						<td class="text-center">:</td>
						<td class="uppercase"><?= $data['pamong_masajab']?></td>
					</tr>
					<tr>
						<td class="uppercase bold">Status</td>
						<td class="text-center">:</td>
						<td class="uppercase">
							<?php if ($data['pamong_status'] == '1'): ?>
								<div title="Aktif">Aktif</div>
							<?php else: ?>
								<div title="Tidak Aktif">Tidak Aktif</div>
							<?php endif; ?>
						</td>
					</tr>

				<?php endforeach; ?>
				</tbody>
			</table>
		</div>
	</div>
</div>
