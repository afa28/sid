
<div class="panel">
		<div class="dl-title">Download Peraturan Desa</div>

	<div class="panel-body">
		
			<table class="table table-striped">
				<tr>
					<th class="text-center uppercase">Peraturan Desa</th>
					<th class="text-center uppercase">Download</th>
				</tr>
				<?php foreach($downloads as $data){?>
				<tr>
					<td class="uppercase"><?php echo $data['nama']; ?></td>
					<td class="text-center"><button type="button" class="btn btn-success btn-sm" target="_blank" href="<?= base_url().LOKASI_DOKUMEN.underscore($data['satuan'])?>"><span class="fa fa-download">&nbsp;</span> UNDUH PERDES</button></td>
				</tr>
				<?php } ?>
			</table>
		
	</div>
</div>