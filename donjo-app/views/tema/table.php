<div class="content-wrapper">
	<section class="content-header">
		<h1>Pengaturan Tema</h1>
		<ol class="breadcrumb">
			<li><a href="<?= site_url('hom_sid') ?>"><i class="fa fa-home"></i>Home</a></li>
			<li class="active">Pengaturan Tema</li>
		</ol>
	</section>
	<section class="content" id="maincontent">
		<?= $this->session->flashdata('msg'); ?>
		<form id="validasi" action="<?= $form_action?>" method="POST" enctype="multipart/form-data">
			<div class="row">
				<div class="col-sm-12">
					<div class="box box-info">
						<table class="table table-bordered table-hover">
							<tbody>
								<tr>
									<td style="padding-top:20px;padding-bottom:10px;">
										<div class="form-group">
											<label for="file" class="col-md-2 col-lg-2 control-label">Themes <code>.zip</code></label>
											<div class="col-sm-12 col-md-8 col-lg-8">
												<div class="input-group input-group-sm">
													<input type='text' class="form-control" id="file_path" name="userfile">
													<input type="file" name='file' class="hidden" id="file" name="userfile">
													<span class="input-group-btn">
														<button type="button" class="btn btn-info btn-flat" id="file_browser"><i class="fa fa-search"></i> Browse</button>
													</span>
												</div>
											</div>
											<div class="col-sm-12 col-md-2 col-lg-2">
												<button type="submit" name="submit" value="Upload & Extract" class="btn btn-block btn-success btn-sm" title="Install"><i class="fa fa-spin fa-refresh"></i> Install</button>
											</div>
										</div>
										<br><br>
									</td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</form>
		<div class="row">
			<?php
			$no = 0;
			foreach ($list_tema as $tema) :
				$cut = explode('/', $tema);

				$set_lok = $cut[0].'/';

				if($cut[1] == NULL)
				{
					$cut[1] = $cut[0];
					$set_lok = '';
				}

				$nama = $cut[1];
				$lokasi = $set_lok.'themes/'.$nama;

				if(file_exists(FCPATH.$lokasi.'/template.php')):
					$no++; ?>
					<div class="col-md-4 col-xs-12">
						<?php if($tema == $active):?>
							<div class="box box-success">
								<?php else:?>
									<div class="box box-info">
									<?php endif;?>
									<div class="box-header with-border text-center">
										<h3 class="box-title text-center"><b><?= ucwords($nama) ?></b></h3>
										<?php if($tema == 'klasik' OR $tema == 'hadakewa'):?>
											<small><code>(System)</code></small>
										<?php endif;?>
									</div>
									<span class="mailbox-attachment-icon has-img">
										<?php
										if(file_exists(FCPATH.$lokasi.'/thumbnail/')):
											$assets = site_url($lokasi.'/thumbnail/1.png');
										else:
											$assets = site_url('assets/images/404-image-not-found.jpg');
										endif;
										?>
										<img class="img-responsive" src="<?= $assets; ?>" />
									</span>
									<div class="box-body">
										<div class="text-center">
											<?php if($tema != $active):?>
												<a href="<?= site_url('tema/change/'.$tema) ?>" class="btn btn-social btn-success btn-sm"><i class='fa fa-check'></i> Active</a>
												<?php else:?>
													<button class="btn btn-social btn-success btn-sm" title="Tema <?= ucwords($nama)?> Sudah Aktif" disabled>
														<i class='fa fa-star'></i> Active
													</button>
												<?php endif;?>
												<a href="<?= site_url('tema/detail/'.$tema) ?>" class="btn btn-social btn-primary btn-sm" data-remote="false" data-toggle="modal" data-target="#modalBox" data-title="Tema <?= ucwords($nama) ?>" title="Detail"><i class='fa fa-eye'></i> Detail</a>
												<?php if($tema == $active OR ($tema == 'klasik' OR $tema == 'hadakewa')):?>
													<button class="btn btn-social btn-danger btn-sm" title="Tema System / Aktif Tidak Dapat Dihapus" disabled>
														<i class='fa fa-trash-o'></i> Delete
													</button>
													<?php else : ?>
														<a href="#" data-href="<?= site_url('tema/delete/'.$nama) ?>" class="btn btn-social btn-danger btn-sm" title="Delete" data-toggle="modal" data-target="#confirm-delete" title="Delete"><i class='fa fa-trash-o'></i> Delete</a>
													<?php endif;?>
												</div>
											</div>
										</div>
										<?php if($no % 3 == 0):?>
										</div>
										<div class="row">
										<?php endif;?>
									</div>
								<?php endif;
							endforeach; ?>
						</div>
					</div>
				</div>
			</section>
			<?php $this->load->view('global/confirm_delete');?>
