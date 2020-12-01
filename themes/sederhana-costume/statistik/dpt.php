<?php  if(!defined('BASEPATH')) exit('No direct script access allowed'); ?>

<div class="box-statistik">
	<div class="box-header">
		<h3><?php echo $page_header ?></h3>
	</div>
	<div class="body-statistik">
		<?php if(count($main) > 0){ ?>
			<div class="table-responsive">
				<table class="table table-striped table-bordered table-sm text-center">
					<thead>
						<tr>
							<th width="50" class="text-center uppercase">No</th>
							<th class="text-left uppercase">Nama <?php echo ucwords($this->setting->sebutan_dusun)?></th>
							<th class="text-center uppercase">RW</th>
							<th class="text-center uppercase">Jiwa</th>
							<th width="100" class="text-center uppercase">Laki-laki</th>
							<th width="100" class="text-center uppercase">Perempuan</th>
						</tr>
					</thead>

					<tbody>
						<?php foreach($main as $data){ ?>
							<tr>
								<td class="text-center"><?php echo $data['no']; ?></td>
								<td class="text-left"><?php echo strtoupper($data['dusun']); ?></td>
								<td class="text-center"><?php echo strtoupper($data['rw']); ?></td>
								<td class="angka"><?php echo $data['jumlah_warga']; ?></td>
								<td class="angka"><?php echo $data['jumlah_warga_l']; ?></td>
								<td class="angka"><?php echo $data['jumlah_warga_p']; ?></td>
							</tr>
						<?php } ?>
					</tbody>

					<tfooter>
						<tr>
							<th colspan="3" class="text-center uppercase">TOTAL</th>
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