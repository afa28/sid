<?php  if(!defined('BASEPATH')) exit('No direct script access allowed'); ?>

<div class="box no-padd">
	<div class="box-header">
		<h3><?php echo $page_header ?></h3>
	</div>
	<div class="box-body">
		<?php if(count($main) > 0){ ?>
			<div class="table-responsive">
				<table class="table table-striped table-bordered table-sm text-center">
					<thead>
						<tr>
							<th width="50" class="text-center">No</th>
							<th>Nama Dusun</th>
							<th class="text-center">Jiwa</th>
							<th class="text-center" width="100">Laki-laki</th>
							<th class="text-center" width="100">Perempuan</th>
						</tr>
					</thead>

					<tbody>
						<?php foreach($main as $data){ ?>
							<tr>
								<td class="text-center"><?php echo $data['no']; ?></td>
								<td class="text-left"><?php echo strtoupper($data['dusun']); ?></td>
								<td class="text-center"><?php echo $data['jumlah_warga']; ?></td>
								<td class="text-center"><?php echo $data['jumlah_warga_l']; ?></td>
								<td class="text-center"><?php echo $data['jumlah_warga_p']; ?></td>
							</tr>
						<?php } ?>
					</tbody>

					<tfooter>
						<tr>
							<th colspan="2" class="text-center">TOTAL</th>
							<th class="text-center"><?php echo $total['total_warga']; ?></th>
							<th class="text-center"><?php echo $total['total_warga_l']; ?></th>
							<th class="text-center"><?php echo $total['total_warga_p']; ?></th>
						</tr>
					</tfooter>
				</table>
			</div>
		<?php } else { ?>
			<div class="alert alert-danger">Belum ada data</div>
		<?php } ?>
	</div>
</div>