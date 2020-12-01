<?php  if(!defined('BASEPATH')) exit('No direct script access allowed'); ?>

<div class="box">
	<div class="box-header">
		<h3><?php echo $page_header ?></h3>
	</div>
	<div class="box-body table-responsive">
		<?php if(count($main) > 0) { ?>
			<table class="table table-sm table-bordered table-striped">
				<thead>
					<tr>
						<th>No</th>
						<th>Nama Dusun</th>
						<th>Nama Kepala Dusun</th>
						<th>Jumlah RT</th>
						<th>Jumlah KK</th>
						<th>Jiwa</th>
						<th>Laki-laki</th>
						<th>Perempuan</th>
					</tr>
				</thead>

				<tbody>
					<?php foreach($main as $data){ ?>
						<tr>
							<td class="text-center"><?php echo $data['no']; ?></td>
							<td><?php echo strtoupper(unpenetration(ununderscore($data['dusun']))); ?></td>
							<td><?php echo strtoupper(unpenetration($data['nama_kadus'])); ?></td>
							<td class="text-center"><?php echo $data['jumlah_rt']; ?></td>
							<td class="text-center"><?php echo $data['jumlah_kk']; ?></td>
							<td class="text-center"><?php echo $data['jumlah_warga']; ?></td>
							<td class="text-center"><?php echo $data['jumlah_warga_l']; ?></td>
							<td class="text-center"><?php echo $data['jumlah_warga_p']; ?></td>
						</tr>
					<?php } ?>
				</tbody>

				<tfooter>
					<tr>
						<th colspan="3" class="text-center">TOTAL</th>
						<th class="text-center"><?php echo $total['total_rt']; ?></th>
						<th class="text-center"><?php echo $total['total_kk']; ?></th>
						<th class="text-center"><?php echo $total['total_warga']; ?></th>
						<th class="text-center"><?php echo $total['total_warga_l']; ?></th>
						<th class="text-center"><?php echo $total['total_warga_p']; ?></th>
					</tr>
				</tfooter>
			</table>
		<?php } else { ?>
			<div class="alert alert-danger">Belum ada data</div>
		<?php } ?>
	</div>
</div>

