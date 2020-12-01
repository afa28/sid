<div class="row">
<div class="page-pemerintah">	
	<?php foreach ($main as $data): ?>
		<div class="block-pemerintah clearfix">
			<div class="row">	
				<div class="col-md-4 col-sm-12">
					<div class="block-foto-pemerintah">
					<?php if ($data['foto']): ?>
						<img src="<?=AmbilFoto($data['foto'], "besar")?>" class="center img-responsive img-perangkat  foto-pemerintah" alt="User Image"/>
					<?php else: ?>
						<img src="<?= base_url()?>assets/files/user_pict/kuser.png" class="center img-responsive img-perangkat foto-pemerintah" alt="User Image"/>
					<?php endif ?>
						<div class="tupoksi-button">
							<a href="<?php echo site_url('home/tupoksi/'.$data['pamong_id']); ?>" data-remote="false" data-title="Tupoksi <?php echo $data['jabatan'] ?>" data-toggle="modal" data-target="#modalBox" class="btn btn-info center comment-button">Tupoksi Jabatan</a>
						</div>	
					</div>

				</div>


				<div class="col-md-8 col-sm-12">
					<div class="block-info-pemerintah">
						<div class="table-responsive">
							<table class="table table-striped">
								<tr>
									<td class="label-pemerintah">Nama</td>
									<td width="2%">:</td>
									<td width="60%"><?= $data['nama']?></td>
								</tr>
								<tr>
									<td class="label-pemerintah">Jabatan</td>
									<td width="2%">:</td>
									<td width="60%"><?= $data['jabatan']?></td>
								</tr>
								
								<tr>
								<?php if (!empty($data['pamong_nip']) and $data['pamong_nip'] != '-'): ?>
									<td class="label-pemerintah">NIP</td>
									<td width="2%">:</td>
									<td width="60%"><?= $data['pamong_nip']?></td>
								<?php else: ?>
									<td class="label-pemerintah">NIAP</td>
									<td width="2%">:</td>
									<td width="60%"><?= $data['pamong_niap']?></td>
								<?php endif; ?>
								</tr>
								
								<tr>
									<td class="label-pemerintah">Tempat, Tanggal Lahir</td>
									<td width="2%">:</td>
									<td width="60%"><?= $data['tempatlahir'].', '.tgl_indo($data['tanggallahir'])?></td>
								</tr>
								<tr>
									<td class="label-pemerintah">Agama</td>
									<td width="2%">:</td>
									<td width="60%"><?= $data['agama']?></td>
								</tr>
								<tr>
									<td class="label-pemerintah">Pendidikan Terakhir</td>
									<td width="2%">:</td>
									<td width="60%"><?= $data['pendidikan_kk']?></td>
								</tr>
								<tr>
									<td class="label-pemerintah">Nomor SK</td>
									<td width="2%">:</td>
									<td width="60%"><?= $data['pamong_nosk']?></td>
								</tr>
								<tr>
									<td class="label-pemerintah">Tanggal SK</td>
									<td width="2%">:</td>
									<td width="60%"><?= tgl_indo($data['pamong_tglsk'])?></td>
								</tr>
								<tr>
									<td class="label-pemerintah">Masa Jabatan</td>
									<td width="2%">:</td>
									<td width="60%"><?= $data['pamong_masajab']?></td>
								</tr>
								<tr>
									<td class="label-pemerintah">Status</td>
									<td width="2%">:</td>
									<?php if ($data['pamong_status'] == '1'): ?>
										<td width="60%" title="Aktif">Aktif</td>
									<?php else: ?>
										<td width="60%" title="Tidak Aktif">Tidak Aktif</td>
									<?php endif; ?>
								</tr>
							</table>
						</div>
						</div>
					</div>			
				</div>
			</div>
		<?php endforeach; ?>
	</div>
</div>
