<script>
	$(function() {
		var keyword = <?= $keyword?> ;
		$( "#cari" ).autocomplete( {
			source: keyword,
			maxShowItems: 10,
		});
	});
</script>
<div class="content-wrapper">
	<section class="content-header">
		<h1>Wilayah Administratif <?= ucwords($this->setting->sebutan_dusun)?></h1>
		<ol class="breadcrumb">
			<li><a href="<?= site_url('hom_sid')?>"><i class="fa fa-home"></i> Home</a></li>
			<li class="active">Daftar <?= ucwords($this->setting->sebutan_dusun)?></li>
		</ol>
	</section>
	<section class="content" id="maincontent">
		<div class="row">
			<div class="col-md-12">
				<div class="box box-info">
					<div class="box-header with-border">
						<a href="<?= site_url('sid_core/form')?>" class="btn btn-social btn-flat btn-success btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block" title="Tambah Data"><i class="fa fa-plus"></i> Tambah Dusun</a>
						<a href="<?= site_url('sid_core/cetak')?>" class="btn btn-social btn-flat bg-purple btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block" title="Cetak Data" target="_blank"><i class="fa fa-print "></i> Cetak</a>
						<a href="<?= site_url('sid_core/excel')?>" class="btn btn-social btn-flat bg-navy btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block" title="Unduh Data" target="_blank"><i class="fa fa-download"></i> Unduh</a>
					</div>
					<div class="box-body">
						<div class="row">
							<div class="col-sm-12">
								<div class="dataTables_wrapper form-inline dt-bootstrap no-footer">
										<div class="row">
											<div class="col-sm-12">
												<table class="table table-bordered table-striped dataTable table-hover" id="tabel_data">
													<thead class="bg-gray disabled color-palette">
														<tr>
															<th class="padat">No</th>
															<th wlass="padat">Aksi</th>
															<th width="25%"> <?= ucwords($this->setting->sebutan_dusun)?></th>
															<th width="35%">Kepala <?= ucwords($this->setting->sebutan_dusun)?></th>
															<th>RW</th>
															<th>RT</th>
															<th>KK</th>
															<th>L+P</th>
															<th>L</th>
															<th>P</th>
														</tr>
													</thead>
													<tbody id="load_data"></tbody>
												</table>
											</div>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>
<?php $this->load->view('global/confirm_delete');?>
