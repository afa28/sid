<?php  if(!defined('BASEPATH')) exit('No direct script access allowed'); ?>

<div class="box-statistik">
	<div class="box-header">
		<h3><?php echo $page_header ?></h3>
	</div>
	<div class="body-statistik">
		<?php if(count($main) > 0) { ?>
		<div class="table-responsive">
			<table class="table table-sm table-bordered table-striped">
				<thead>
					<tr>
						<th class="text-center uppercase">No</th>
						<th class="text-center uppercase"><?php echo ucwords($this->setting->sebutan_dusun)." "?></th>
						<th class="text-center uppercase">Nama <?php echo ucwords($this->setting->sebutan_singkatan_kadus)." "?></th>
						<th class="text-center uppercase">Jumlah RT</th>
						<th class="text-center uppercase">Jumlah KK</th>
						<th class="text-center uppercase">Jiwa</th>
						<th class="text-center uppercase">Laki-laki</th>
						<th class="text-center uppercase">Perempuan</th>
					</tr>
				</thead>

				<tbody>
					<?php foreach($main as $data){ ?>
						<tr>
							<td class="text-center uppercase"><?php echo $data['no']; ?></td>
							<td><?php echo strtoupper(unpenetration(ununderscore($data['dusun']))); ?></td>
							<td><?php echo strtoupper(unpenetration($data['nama_kadus'])); ?></td>
							<td class="text-center uppercase"><?php echo $data['jumlah_rt']; ?></td>
							<td class="text-center uppercase"><?php echo $data['jumlah_kk']; ?></td>
							<td class="text-center uppercase"><?php echo $data['jumlah_warga']; ?></td>
							<td class="text-center uppercase"><?php echo $data['jumlah_warga_l']; ?></td>
							<td class="text-center uppercase"><?php echo $data['jumlah_warga_p']; ?></td>
						</tr>
					<?php } ?>
				</tbody>

				<tfooter>
					<tr>
						<th colspan=3 class="text-center uppercase">TOTAL</th>
						<th class="text-center uppercase"><?php echo $total['total_rt']; ?></th>
						<th class="text-center uppercase"><?php echo $total['total_kk']; ?></th>
						<th class="text-center uppercase"><?php echo $total['total_warga']; ?></th>
						<th class="text-center uppercase"><?php echo $total['total_warga_l']; ?></th>
						<th class="text-center uppercase"><?php echo $total['total_warga_p']; ?></th>
					</tr>
				</tfooter>
			</table>
		</div>
		<?php } else { ?>
			<div class="alert alert-danger">Belum ada data</div>
		<?php } ?>
	</div>
</div>

