<?php  if(!defined('BASEPATH')) exit('No direct script access allowed'); ?>

<style>
	.table {
		font-size: 12px;
	}
	.subtitle_head {
		padding: 10px 50px 10px 5px;
		background-color: #a2f2ef;
		margin: 15px 0px 10px 0px;
		text-align: left;
		color: #111;
	}
	.detail {
		margin-top: 5px;
		margin-bottom: 5px;
	}
</style>
<div class="box-header with-border">
	<h3 class="box-title">BIODATA PENDUDUK</h3>
	<div class="box-tools">
		<div class="btn-group-vertical">
			<a class="btn btn-social btn-flat btn-info btn-sm" data-toggle="dropdown"><i class='fa fa-print'></i> Cetak</a>
			<ul class="dropdown-menu" role="menu">
				<li>
					<a href="<?= site_url("first/cetak_biodata/$penduduk[id]"); ?>" class="btn btn-social btn-flat btn-block btn-sm" title="Cetak Biodata" target="_blank"><i class="fa fa-user"></i> Biodata</a>
				</li>
				<li>
					<a href="<?= site_url("first/cetak_kk/$penduduk[id]/1"); ?>" class="btn btn-social btn-flat btn-block btn-sm" title="Cetak Kartu Keluarga" target="_blank"><i class="fa fa-group"></i> Kartu Keluarga</a>
				</li>
			</ul>
		</div>
	</div>
</div>
<div class="box-body">
	<div class="table-responsive">
		<table class="table table-bordered table-striped table-hover" >
			<tr>
				<td colspan="3">
					<?php if ($penduduk['foto']): ?>
						<img class="penduduk profile-user-img img-responsive img-circle" src="<?= AmbilFoto($penduduk['foto'])?>" alt="Foto">
						<?php else: ?>
							<img class="penduduk profile-user-img img-responsive img-circle" src="<?= base_url()?>assets/files/user_pict/kuser.png" alt="Foto">
						<?php endif; ?>
					</td>
				</tr>
				<div class="table-responsive">
					<table class="table table-bordered table-striped table-hover" >
						<tbody>
							<tr>
								<th colspan="3" class="subtitle_head"><strong>DATA DASAR</strong></th>
							</tr>
							<tr>
								<td width="30%">Nama</td>
								<td width="1">:</td>
								<td><?= strtoupper($penduduk['nama'])?></td>
							</tr>
							<tr>
								<td>NIK</td>
								<td>:</td>
								<td><?= strtoupper($penduduk['nik'])?></td>
							</tr>
							<tr>
								<td>Status Kepemilikan KTP</td><td >:</td>
								<td>
									<table class="table table-bordered table-striped table-hover detail">
										<tr>
											<th>Wajib KTP</th>
											<th>KTP-EL</th>
											<th>Status Rekam</th>
											<th>Tag ID Card</th>
										</tr>
										<tr>
											<td><?= strtoupper($penduduk['wajib_ktp'])?></td>
											<td><?= strtoupper($penduduk['ktp_el'])?></td>
											<td><?= strtoupper($penduduk['status_rekam'])?></td>
											<td><?= $penduduk['tag_id_card']?></td>
										</tr>
									</table>
								</td>
							</tr>
							<tr>
								<td>Nomor Kartu Keluarga</td><td >:</td>
								<td>
									<?= $penduduk['no_kk']?>
									<?php if ($penduduk['status_dasar_id'] <> '1' AND $penduduk['no_kk'] <> $penduduk['log_no_kk']): ?>
										(waktu peristiwa {<?= $penduduk['status_dasar']?>}: {<?= $penduduk['log_no_kk']?>})
									<?php endif; ?>
								</td>
							</tr>
							<tr>
								<td>Nomor KK Sebelumnya</td><td >:</td><td><?= $penduduk['no_kk_sebelumnya']?></td>
							</tr>
							<tr>
								<td>Hubungan Dalam Keluarga</td><td >:</td><td><?= $penduduk['hubungan']?></td>
							</tr>
							<tr>
								<td>Jenis Kelamin</td><td >:</td><td><?= strtoupper($penduduk['sex'])?></td>
							</tr>
							<tr>
								<td>Agama</td><td >:</td><td><?= strtoupper($penduduk['agama'])?></td>
							</tr>
							<tr>
								<td>Status Penduduk</td><td >:</td><td><?= strtoupper($penduduk['status'])?></td>
							</tr>
							<tr>
								<th colspan="3" class="subtitle_head"><strong>DATA KELAHIRAN</strong></th>
							</tr>
							<tr>
								<td>Akta Kelahiran</td><td >:</td><td><?= strtoupper($penduduk['akta_lahir'])?></td>
							</tr>
							<tr>
								<td>Tempat / Tanggal Lahir</td><td >:</td><td><?= strtoupper($penduduk['tempatlahir'])?> / <?= strtoupper($penduduk['tanggallahir'])?></td>
							</tr>
							<tr>
								<td>Tempat Dilahirkan</td><td >:</td><td><?= $penduduk['tempat_dilahirkan_nama'] ?></td>
							</tr>
							<tr>
								<td>Jenis Kelahiran</td><td >:</td><td><?= $penduduk['jenis_kelahiran_nama'] ?></td>
							</tr>
							<tr>
								<td>Kelahiran Anak Ke</td><td >:</td><td><?= $penduduk['kelahiran_anak_ke'] ?></td>
							</tr>
							<tr>
								<td>Penolong Kelahiran</td><td >:</td><td><?= $penduduk['penolong_kelahiran_nama'] ?></td>
							</tr>
							<tr>
								<td>Berat Lahir</td><td >:</td><td><?= $penduduk['berat_lahir']?> Gram</td>
							</tr>
							<tr>
								<td>Panjang Lahir</td><td >:</td><td><?= $penduduk['panjang_lahir']?> cm</td>
							</tr>
							<tr>
								<th colspan="3" class="subtitle_head"><strong>DATA PENDIDIKAN DAN PEKERJAAN</strong></th>
							</tr>
							<tr>
								<td>Pendidikan dalam KK</td><td >:</td><td><?= strtoupper($penduduk['pendidikan_kk'])?></td>
							</tr>
							<tr>
								<td>Pendidikan sedang ditempuh</td><td >:</td><td><?= strtoupper($penduduk['pendidikan_sedang'])?></td>
							</tr>
							<tr>
								<td>Pekerjaan</td><td >:</td><td><?= strtoupper($penduduk['pekerjaan'])?></td>
							</tr>
							<tr>
								<th colspan="3" class="subtitle_head"><strong>DATA KEWARGANEGARAAN</strong></th>
							</tr>
							<tr>
								<td>Warga Negara</td><td >:</td><td><?= strtoupper($penduduk['warganegara'])?></td>
							</tr>
							<tr>
								<td>Nomor Paspor</td><td >:</td><td><?= strtoupper($penduduk['dokumen_pasport'])?></td>
							</tr>
							<tr>
								<td>Tanggal Berakhir Paspor</td><td >:</td><td><?= strtoupper($penduduk['tanggal_akhir_paspor'])?></td>
							</tr>
							<tr>
								<td>Nomor KITAS/KITAP</td><td >:</td><td><?= strtoupper($penduduk['dokumen_kitas'])?></td>
							</tr>
							<tr>
								<th colspan="3" class="subtitle_head"><strong>DATA ORANG TUA</strong></th>
							</tr>
							<tr>
								<td>NIK Ayah</td><td >:</td><td><?= strtoupper($penduduk['ayah_nik'])?></td>
							</tr>
							<tr>
								<td>Nama Ayah</td><td >:</td><td><?= strtoupper($penduduk['nama_ayah'])?></td>
							</tr>
							<tr>
								<td>NIK Ibu</td><td >:</td><td><?= strtoupper($penduduk['ibu_nik'])?></td>
							</tr>
							<tr>
								<td>Nama Ibu</td><td >:</td><td><?= strtoupper($penduduk['nama_ibu'])?></td>
							</tr>
							<tr>
								<th colspan="3" class="subtitle_head"><strong>DATA ALAMAT</strong></th>
							</tr>
							<tr>
								<td>Nomor Telepon</td><td >:</td><td><?= strtoupper($penduduk['telepon'])?></td>
							</tr>
							<tr>
								<td>Alamat Email</td><td >:</td><td><?= strtoupper($penduduk['email'])?></td>
							</tr>
							<tr>
								<td>Alamat</td><td >:</td><td><?= strtoupper($penduduk['alamat'])?></td>
							</tr>
							<tr>
								<td>Dusun</td><td >:</td><td><?= strtoupper($penduduk['dusun'])?></td>
							</tr>
							<tr>
								<td>RT/ RW</td><td >:</td><td><?= strtoupper($penduduk['rt'])?> / <?= $penduduk['rw']?></td>
							</tr>
							<tr>
								<td>Alamat Sebelumnya</td><td >:</td><td><?= strtoupper($penduduk['alamat_sebelumnya'])?></td>
							</tr>
							<tr>
								<th colspan="3" class="subtitle_head"><strong>DATA STATUS KAWIN</strong></th>
							</tr>
							<tr>
								<td>Status Kawin</td><td >:</td><td><?= strtoupper($penduduk['kawin'])?></td>
							</tr>
							<?php if ($penduduk['status_kawin'] <> 1): ?>
								<tr>
									<td>Akta perkawinan</td><td >:</td><td><?= strtoupper($penduduk['akta_perkawinan'])?></td>
								</tr>
								<tr>
									<td>Tanggal perkawinan</td><td >:</td><td><?= strtoupper($penduduk['tanggalperkawinan'])?></td>
								</tr>
							<?php endif ?>
							<?php if ($penduduk['status_kawin'] <> 1 and $penduduk['status_kawin'] <> 2): ?>
								<tr>
									<td>Akta perceraian</td><td >:</td><td><?= strtoupper($penduduk['akta_perceraian'])?></td>
								</tr>
								<tr>
									<td>Akta perceraian</td><td >:</td><td><?= strtoupper($penduduk['tanggalperceraian'])?></td>
								</tr>
							<?php endif ?>
							<tr>
								<th colspan="3" class="subtitle_head"><strong>DATA KESEHATAN</strong></th>
							</tr>
							<tr>
								<td>Golongan Darah</td><td >:</td><td><?= $penduduk['golongan_darah']?></td>
							</tr>
							<tr>
								<td>Cacat</td><td >:</td><td><?= strtoupper($penduduk['cacat'])?></td>
							</tr>
							<tr>
								<td>Sakit Menahun</td><td >:</td><td><?= strtoupper($penduduk['sakit_menahun'])?></td>
							</tr>
							<?php if ($penduduk['status_kawin'] == 2): ?>
								<tr>
									<td>Akseptor KB</td><td >:</td><td><?= strtoupper($penduduk['cara_kb'])?></td>
								</tr>
							<?php endif ?>
							<?php if ($penduduk['id_sex'] == 2): ?>
								<tr>
									<td>Status Kehamilan</td><td >:</td><td><?= empty($penduduk['hamil']) ? 'TIDAK HAMIL' : 'HAMIL'?></td>
								</tr>
							<?php endif; ?>
							<tr>
								<td>Nama Asuransi</td><td >:</td><td><?= $penduduk['asuransi'] ?></td>
							</tr>
							<?php if (!empty($penduduk['id_asuransi']) and $penduduk['id_asuransi'] <> '1'): ?>
								<tr>
									<td><?= ($penduduk['id_asuransi'] == '99') ? 'Nama/nomor Asuransi' : 'No Asuransi' ?></td>
									<td >:</td>
									<td><?= strtoupper($penduduk['no_asuransi'])?></td>
								</tr>
							<?php endif; ?>
						</tbody>
					</table>
				</div>
			</table>
		</div>
	</div>

