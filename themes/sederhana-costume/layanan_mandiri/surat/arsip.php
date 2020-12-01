<?php $aksi = $this->admin ? 'keluar' : 'layanan_mandiri/surat/arsip'; ?>
<script>
	$(function()
	{
		var keyword = <?= $keyword?> ;
		$( "#cari" ).autocomplete(
		{
			source: keyword,
			maxShowItems: 10,
		});
	});
</script>
<div class="content-wrapper">
	<section class="content" id="maincontent">
		<div class="row">
			<div class="col-md-12">
				<div class="box box-info">
					<div class="box-header">
				        <?= $page_header ?>
				    </div>
					<div class="box-body">
						<div class="row">
							<div class="col-sm-12">
								<div class="dataTables_wrapper form-inline dt-bootstrap no-footer">
									<?php if($this->admin){ ?>
										<form id="mainform" name="mainform" action="" method="post">
											<div class="row">
												<div class="col-sm-9">
													<select class="form-control input-sm " name="filter" onchange="formAction('mainform','<?= site_url($aksi.'/filter')?>')">
														<option value="">Tahun</option>
														<?php foreach ($tahun_surat as $tahun): ?>
															<option value="<?= $tahun['tahun']?>" <?php selected($filter, $tahun['tahun']) ?>><?= $tahun['tahun']?></option>
														<?php endforeach; ?>
													</select>
													<select class="form-control input-sm select2" name="jenis" onchange="formAction('mainform','<?= site_url($aksi.'/jenis')?>')">
														<option value="">Pilih Jenis Surat</option>
														<?php foreach ($jenis_surat as $data): ?>
															<option value="<?= $data['nama_surat']?>" <?php selected($jenis, $data['nama_surat']) ?>><?= $data['nama_surat']?></option>
														<?php endforeach; ?>
													</select>
												</div>
												<div class="col-sm-3">
													<div class="box-tools">
														<div class="input-group input-group-sm pull-right">
															<input name="cari" id="cari" class="form-control" placeholder="Cari..." type="text" value="<?=html_escape($cari)?>" onkeypress="if (event.keyCode == 13){$('#'+'mainform').attr('action', '<?=site_url("{$this->controller}/search")?>');$('#'+'mainform').submit();}">
															<div class="input-group-btn">
																<button type="submit" class="btn btn-default" onclick="$('#'+'mainform').attr('action', '<?=site_url("{$this->controller}/search")?>');$('#'+'mainform').submit();"><i class="fa fa-search"></i></button>
															</div>
														</div>
													</div>
												</div>
											</div>
										</form>
										<hr/>
									<?php } ?>
									<div class="row">
										<div class="col-sm-12">
											<div class="table-responsive">
												<table class="table table-bordered table-striped table-hover" style="margin-bottom:0">
													<thead class="bg-gray disabled color-palette">
														<tr>
															<th class="text-center uppercase">Nomor Surat</th>
															<th class="text-center uppercase">Jenis Surat</th>
															<th class="text-center uppercase">Nama Penduduk</th>
															<th class="text-center uppercase">Tanggal Pembuatan Surat</th>
															<th class="text-center uppercase">Aksi</th>
														</tr>
													</thead>
													<tbody>
														<?php	foreach ($main as $data):
															if ($data['nama_surat']):
																$berkas = $data['nama_surat'];
															else:
																$berkas = $data["berkas"]."_".$data["nik"]."_".date("Y-m-d").".rtf";
															endif;

															$theFile = FCPATH.LOKASI_ARSIP.$berkas;
															$lampiran = FCPATH.LOKASI_ARSIP.$data['lampiran'];
															?>
															<tr>
																<td class="text-center"><?= $data['no_surat']?></td>
																<td><?= $data['format']?></td>
																<td>
																<?php if ($data['nama']): ?>
																	<?= unpenetration($data['nama']); ?>
																	<?php elseif ($data['nama_non_warga']): ?>
																		<strong>Non-warga: </strong><?= $data['nama_non_warga']; ?><br>
																		<strong>NIK: </strong><?= $data['nik_non_warga']; ?>
																<?php endif; ?>
																</td>
																<td nowrap><?= tgl_indo2($data['tanggal'])?></td>
																<td class="text-center">
																	<?php
																	if (is_file($theFile)): ?>
																		<a href="<?= base_url(LOKASI_ARSIP.$berkas)?>" class="btn btn-info btn-social bg-purple btn-mandiri btn-sm" title="Unduh Surat" target="_blank" style="margin-bottom:0">Download Surat</a>
																	<?php	endif; ?>
																	<?php
																	if (is_file($lampiran)): ?>
																		<a href="<?= base_url(LOKASI_ARSIP.$data['lampiran'])?>" target="_blank" class="btn btn-social btn-default btn-mandiri bg-olive btn-sm" title="Unduh Lampiran" style="margin-bottom:0"> Lampiran</a>
																	<?php	endif; ?>
																</td>
															</tr>
															<?php endforeach; ?>
														</tbody>
													</table>
												</div>
											</div>
										</div>

										<?php if($this->admin){ ?>
											<div class="row">
												<div class="col-sm-6">
													<div class="dataTables_length">
														<form id="paging" action="<?= site_url("keluar")?>" method="post" class="form-horizontal">
															<label>
																Tampilkan
																<select name="per_page" class="form-control input-sm" onchange="$('#paging').submit()">
																	<option value="20" <?php selected($per_page,20); ?> >20</option>
																	<option value="50" <?php selected($per_page,50); ?> >50</option>
																	<option value="100" <?php selected($per_page,100); ?> >100</option>
																</select>
																Dari
																<strong><?= $paging->num_rows?></strong>
																Total Data
															</label>
														</form>
													</div>
												</div>
												<div class="col-sm-6">
													<div class="dataTables_paginate paging_simple_numbers">
														<ul class="pagination">
															<?php if ($paging->start_link): ?>
																<li><a href="<?=site_url("keluar/index/$paging->start_link/$o")?>" aria-label="First"><span aria-hidden="true">Awal</span></a></li>
															<?php endif; ?>
															<?php if ($paging->prev): ?>
																<li><a href="<?=site_url("keluar/index/$paging->prev/$o")?>" aria-label="Previous"><span aria-hidden="true">&laquo;</span></a></li>
															<?php endif; ?>
															<?php for ($i=$paging->start_link;$i<=$paging->end_link;$i++): ?>
																<li <?=jecho($p, $i, "class='active'")?>><a href="<?= site_url("keluar/index/$i/$o")?>"><?= $i?></a></li>
															<?php endfor; ?>
															<?php if ($paging->next): ?>
																<li><a href="<?=site_url("keluar/index/$paging->next/$o")?>" aria-label="Next"><span aria-hidden="true">&raquo;</span></a></li>
															<?php endif; ?>
															<?php if ($paging->end_link): ?>
																<li><a href="<?=site_url("keluar/index/$paging->end_link/$o")?>" aria-label="Last"><span aria-hidden="true">Akhir</span></a></li>
															<?php endif; ?>
														</ul>
													</div>
												</div>
											</div>
										<?php } ?>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
	</div>

	<div class='modal fade' id='confirm-delete' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true'>
		<div class='modal-dialog'>
			<div class='modal-content'>
				<div class='modal-header'>
					<button type='button' class='close' data-dismiss='modal' aria-hidden='true'>&times;</button>
					<h4 class='modal-title' id='myModalLabel'><i class='fa fa-exclamation-triangle text-red'></i> Konfirmasi</h4>
				</div>
				<div class='modal-body btn-info'>
					Apakah Anda yakin ingin menghapus data ini?
				</div>
				<div class='modal-footer'>
					<button type="button" class="btn btn-social btn-flat btn-warning btn-sm" data-dismiss="modal"><i class='fa fa-sign-out'></i> Tutup</button>
					<a class='btn-ok'>
						<button type="button" class="btn btn-social btn-flat btn-danger btn-sm" id="ok-delete"><i class='fa fa-trash-o'></i> Hapus</button>
					</a>
				</div>
			</div>
		</div>
	</div>
