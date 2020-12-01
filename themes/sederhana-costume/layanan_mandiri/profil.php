<?php  if(!defined('BASEPATH')) exit('No direct script access allowed'); ?>

<div class="layanan profil">
	<div class="row">
		<div class="col-md-3 col-xs-12">
			<div class="left-box">
				<div class="section-foto-personal">
						<?php if ($penduduk['foto']): ?>
							<img class="foto-penduduk center" src="<?= AmbilFoto($penduduk['foto'])?>" alt="Foto">
						<?php else: ?>
							<img class="foto-penduduk center" src="<?php echo base_url().$this->theme_folder.'/'.$this->theme; ?>/assets/images/icons/no-foto.png" alt="Foto">
						<?php endif; ?>
				</div>
				<a href="<?php echo site_url("layanan_mandiri/cetak_kk/".$penduduk['id']); ?>" target="_blank" class="btn btn-block btn-primary btn-profil"><i class="ti ti-printer"></i> CETAK KARTU KELUARGA</a>

				<a href="<?php echo site_url("layanan_mandiri/cetak_biodata/".$penduduk['id']); ?>" target="_blank" class="btn btn-block btn-success btn-profil"><i class="ti ti-printer"></i> CETAK BIODATA</a>

				<a class="btn btn-block btn-info btn-profil" data-toggle="modal" data-target="#updateData"><i class="ti ti-pencil-alt"></i> UBAH BIODATA</a>

				<?php if(isset($_SESSION['mandiri']) OR $_SESSION['mandiri'] > 1){ ?>
					<a href="<?php echo site_url("layanan_mandiri/logout"); ?>" class="btn btn-block btn-danger btn-profil"><i class="ti ti-shift-left"></i> KELUAR</a>
				<?php } ?>
			</div>
		</div>
		<div class="col-md-9 col-xs-12">
			<div class="right-box">
				<div class="data-box">
					<div class="personal-profile">
						<div class="header-profile text-center">Data Personal</div>
					</div>
					<div class="section-data-personal table-responsive">						
						<table class="table table-striped">
							<tr>
								<td class="label-data-table">Nama</td>
								<td width="2%">:</td>
								<td width="60%"><?php echo strtoupper(unpenetration($penduduk['nama']))?></td>
							</tr>
							<tr>
								<td class="label-data-table">NIK</td>
								<td>:</td>
								<td><?php echo $penduduk['nik']?></td>
							</tr>
							<tr>
								<td class="label-data-table">No KK</td>
								<td>:</td>
								<td><?php echo $penduduk['no_kk']?></td>
							</tr>
							<tr>
								<td class="label-data-table">Tempat, Tanggal Lahir</td>
								<td>:</td>
								<td><?php echo strtoupper($penduduk['tempatlahir'])?>, <?php echo strtoupper ($penduduk['tanggallahir'])?></td>
							</tr>
							<tr>
								<td class="label-data-table">Alamat</td>
								<td>:</td>
								<td class="uppercase">
									<?php echo strtoupper($penduduk['alamat_sekarang'])?> <?= ucwords($this->setting->sebutan_dusun)?> <?php echo strtoupper($penduduk['dusun'])?> RT. <?php echo strtoupper($penduduk['rt'])?> RW.<?php echo $penduduk['rw']?>
								</td>
							</tr>
							<tr>
								<td class="label-data-table">Jenis Kelamin</td>
								<td>:</td>
								<td><?php echo strtoupper($penduduk['sex'])?></td>
							</tr>
						</table>
					</div>
						
					<div class="personal-profile">
						<div class="header-profile text-center">Data Biografi</div>
					</div>				
					<div class="section-data-personal table-responsive">
						<table class="table table-striped">
							<tr>
								<td class="label-data-table">Agama</td>
								<td width="2%" >:</td>
								<td><?php echo strtoupper($penduduk['agama'])?></td>
							</tr>
							<tr>
								<td class="label-data-table">Status Kependudukan</td>
								<td>:</td>
								<td><?php echo strtoupper($penduduk['status'])?></td>
							</tr>
							<tr>
								<td class="label-data-table">Akta Kelahiran</td>
								<td>:</td>
								<td><?php echo strtoupper($penduduk['akta_lahir'])?></td>
							</tr>
							<tr>
								<td class="label-data-table">Pendidikan Dalam KK</td>
								<td>:</td>
								<td><?php echo strtoupper($penduduk['pendidikan_kk'])?></td>
							</tr>
							<tr>
								<td class="label-data-table">Pendidikan yang sedang ditempuh</td>
								<td>:</td>
								<td><?php echo strtoupper($penduduk['pendidikan_sedang'])?></td>
							</tr>
							<tr>
								<td class="label-data-table">Pekerjaan</td>
								<td>:</td>
								<td><?php echo strtoupper($penduduk['pekerjaan'])?></td>
							</tr>
							<tr>
								<td class="label-data-table">Status Perkawinan</td>
								<td>:</td>
								<td><?php echo strtoupper($penduduk['kawin'])?></td>
							</tr>
							<tr>
								<td class="label-data-table">Warga Negara</td>
								<td>:</td>
								<td><?php echo strtoupper($penduduk['warganegara'])?></td>
							</tr>
							<tr>
								<td class="label-data-table">Dokumen Paspor</td>
								<td>:</td>
								<td><?php echo strtoupper($penduduk['dokumen_pasport'])?></td>
							</tr>
							<tr>
								<td class="label-data-table">Dokumen Kitas</td>
								<td>:</td>
								<td><?php echo strtoupper($penduduk['dokumen_kitas'])?></td>
							</tr>
							<tr>
								<td class="label-data-table">Alamat Sebelumnya</td>
								<td>:</td>
								<td><?php echo strtoupper($penduduk['alamat_sebelumnya'])?></td>
							</tr>
							<?php if ($penduduk['status_kawin'] <> 1): ?>
							<tr>
								<td class="label-data-table">Akta Perkawinan</td>
								<td>:</td>
								<td><?php echo strtoupper($penduduk['akta_perkawinan'])?></td>
							</tr>
							<tr>
								<td class="label-data-table">Tanggal Perkawinan</td>
								<td>:</td>
								<td><?php echo strtoupper($penduduk['tanggalperkawinan'])?></td>
							</tr>
							<?php endif ?>
							<?php if ($penduduk['status_kawin'] <> 1 and $penduduk['status_kawin'] <> 2): ?>
							<tr>
								<td class="label-data-table">Akta Perceraian</td>
								<td>:</td>
								<td><?php echo strtoupper($penduduk['akta_perceraian'])?></td>
							</tr>
							<tr>
								<td class="label-data-table">Tanggal Perceraian</td>
								<td>:</td>
								<td><?php echo strtoupper($penduduk['tanggalperceraian'])?></td>
							</tr>
							<?php endif ?>
							</table>
						</div>
						
						<div class="personal-profile">
							<div class="header-profile text-center">Data Kesehatan</div>
						</div>
						<div class="section-data-personal table-responsive">
							<table class="table table-striped">
								<tr>
									<td class="label-data-table">Golongan Darah</td>
									<td width="2%">:</td>
									<td><?php echo $penduduk['golongan_darah']?></td>
								</tr>
								<tr>
								<td class="label-data-table">Riwayat Cacat</td>
									<td width="2%">:</td>
									<td><?php echo $penduduk['cacat']?></td>
								</tr>
								<tr>
									<td class="label-data-table">Riwayat Penyakit</td>
									<td width="2%">:</td>
									<td><?php echo $penduduk['penyakit']?></td>
								</tr>
								<tr>
									<td class="label-data-table">Akseptor KB</td>
									<td width="2%">:</td>
									<td><?php echo $penduduk['kb']?></td>
								</tr>
							</table>
						</div>
						
						<div class="personal-profile">
							<div class="header-profile text-center">Data Orang Tua</div>
						</div>
						<div class="section-data-personal table-responsive">
							<table class="table table-striped">
								<tr>
									<td class="label-data-table">NIK Ayah</td>
									<td width="2%">:</td>
									<td><?php echo strtoupper($penduduk['ayah_nik'])?></td>
								</tr>
								<tr>
									<td class="label-data-table">Nama Ayah</td>
									<td width="2%">:</td>
									<td><?php echo strtoupper(unpenetration($penduduk['nama_ayah']))?></td>
								</tr>
								<tr>
									<td class="label-data-table">NIK Ibu</td>
									<td width="2%">:</td>
									<td><?php echo strtoupper($penduduk['ibu_nik'])?></td>
								</tr>
								<tr>
									<td class="label-data-table">Nama Ibu</td>
									<td width="2%">:</td>
									<td><?php echo strtoupper(unpenetration($penduduk['nama_ibu']))?></td>
								</tr>
							</table>
						</div>

						<div class="personal-profile">
							<div class="header-profile text-center">KEANGGOTAAN KELOMPOK</div>
						</div>
						<div class="section-data-non-personal table-responsive">
							<table class="table table-striped table-bordered">
								<thead>
									<tr>
										<th width="2%" class="uppercase text-center">No</th>
										<th width="48%" class="uppercase text-center">Nama Kelompok</th>
										<th width="50%"class="uppercase text-center">Kategori Kelompok</th>
									</tr>
								</thead>
									<tbody>
									<?php $no=1; foreach($list_kelompok as $kel){?>
										<tr>
											<td align="center" width="2"><?php echo $no;?></td>
											<td><?php echo $kel['nama']?></td>
											<td><?php echo $kel['kategori']?></td>
										</tr>
										<?php $no++;
									}?>
								</tbody>
							</table>
						</div>

						<div class="personal-profile">
							<div class="header-profile text-center">KEANGGOTAAN KELOMPOK</div>
						</div>
						<div class="section-data-non-personal table-responsive">
							<table class="table table-striped table-bordered">
								<thead>
									<tr>
										<th width="2" class="uppercase text-center">No</th>
										<th width="220" class="uppercase text-center">Nama Dokumen</th>
										<th width="360" class="uppercase text-center">Berkas</th>
										<th width="200" class="uppercase text-center">Tanggal Upload</th>
									</tr>
								</thead>
								<tbody>
									<?php foreach($list_dokumen as $data){?>
										<tr>
											<td align="center" width="2"><?php echo $data['no']?></td>
											<td><?php echo $data['nama']?></td>											<td><a href="<?php echo base_url().LOKASI_DOKUMEN?><?php echo urlencode($data['atuan'])?>" ><?php echo $data['satuan']?></a>
										</td>
										<td class="text-center"><?php echo tgl_indo2($data['tgl_upload'])?></td>
									</tr>
								<?php }?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<div id="updateData" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
        <h4 class="modal-title">Pemuktahiran Data</h4>
      </div>
      <div class="modal-body">
        <p>Untuk pemuktahiran data kependudukan silakan hubungin Operator atau datang ke Kantor <?php echo ucwords($this->setting->sebutan_desa)." "?><?php echo ucwords($desa['nama_desa'])?>.</p>
        <p>Sertakan persyaratan kelengkapan dokumen <b>KTP</b>/<b>E-KTP</b>, <b>Kartu Keluarga</b> dan <b>Akte Kelahiran</b> (<b>Ijazah Terakhir</b> apabila tidak memiliki Akta Kelahiran).
        <p>Untuk memudahkan pemuktahiran data silakan hubungi nomor telepon <b><?php echo $desa['telepon']?></b></p>
      </div>
    </div>
  </div>
</div>

