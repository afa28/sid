<?php  if(!defined('BASEPATH')) exit('No direct script access allowed'); ?>

<div class="box">
	<div class="box-header">
		<h3><?php echo $page_header ?></h3>
	</div>
	<div class="box-body">
		<?php if(count($main) > 0) { ?>
			<table class="table table-sm table-bordered table-striped">
				<thead>
					<tr>
						<th class="text-center uppercase">No</th>
						<th class="text-center uppercase">Nama Dusun</th>
						<th class="text-center uppercase">Nama Kepala Dusun</th>
						<th class="text-center uppercase">Jumlah Rumah Tangga</th>
					</tr>
				</thead>

				<tbody>
					<?php foreach($main as $data){ ?>
						<tr>
							<td class="text-center uppercase"><?php echo $data['no']; ?></td>
							<td><?php echo strtoupper(unpenetration(ununderscore($data['dusun']))); ?></td>
							<td><?php echo strtoupper(unpenetration($data['nama_kadus'])); ?></td>
							<td class="text-center uppercase"><?php echo $data['jumlah_rumah_tangga']; ?></td>
						</tr>
					<?php } ?>
				</tbody>

				<tfooter>
					<tr>
						<th colspan=3 class="text-center uppercase">TOTAL</th>
						<th class="text-center uppercase"><?php echo $main[0]['total_rumah_tangga']; ?></th>
					</tr>
				</tfooter>
			</table>
		<?php } else { ?>
			<div class="alert alert-danger">Belum ada data</div>
		<?php } ?>
	</div>
</div>

