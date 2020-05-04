<div class="content-wrapper">
	<section class="content-header">
		<h1>Pengaturan Tema</h1>
		<ol class="breadcrumb">
			<li><a href="<?= site_url('hom_sid') ?>"><i class="fa fa-home"></i>Home</a></li>
			<li class="active">Pengaturan Tema</li>
		</ol>
	</section>
	<section class="content" id="maincontent">
		<form id="validasi" action="<?= $form_action?>" method="POST" enctype="multipart/form-data">
			<div class="row">
				<div class="col-sm-12">
					<div class="box box-info">
						<table class="table table-bordered table-hover">
							<tbody>
								<tr>
									<td style="padding-top:20px;padding-bottom:10px;">
										<div class="form-group">
											<label for="file" class="col-md-2 col-lg-2 control-label">Tema .zip:</label>
											<div class="col-sm-12 col-md-8 col-lg-8">
												<div class="input-group input-group-sm">
													<input type="text" class="form-control" id="file_path2">
													<input type="file" class="hidden" id="file2" name="tema">
													<span class="input-group-btn">
														<button type="button" class="btn btn-info btn-flat" id="file_browser"><i class="fa fa-search"></i> Browse</button>
													</span>
												</div>
											</div>
											<div class="col-sm-12 col-md-2 col-lg-2">
												<button type="submit" name="submit" value="Upload & Extract" class="btn btn-block btn-success btn-sm"><i class="fa fa-spin fa-refresh"></i> Upload</button>
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
		<div class="row"><!-- Untuk Tema Yg Active -->
			<div class="col-md-4 col-xs-12">
				<div class="box box-danger"> <!-- <div class="box box-danger">  -->
					<div class="box-header with-border">
						<center><h3 class="box-title text-center"><?= $this->theme ?></h3></center>
					</div>
					<div class="box-body">
						<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
							<div class="carousel-inner">
								<div class="item active">
									<img class="img-responsive" src="<?= base_url().$this->theme_folder.'/'.$this->theme.'/thumbnail/1.png'; ?>" alt="First slide">
								</div>
								<div class="item">
									<img class="img-responsive" src="<?= base_url().$this->theme_folder.'/'.$this->theme.'/thumbnail/2.png'; ?>" alt="First slide">
								</div>
								<div class="item">
									<img class="img-responsive" src="<?= base_url().$this->theme_folder.'/'.$this->theme.'/thumbnail/3.png'; ?>" alt="First slide">
								</div>
								<a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
									<span class="fa fa-angle-left"></span>
								</a>
								<a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
									<span class="fa fa-angle-right"></span>
								</a>
							</div>
						</div>
						<div class="text-center">
							<div class="btn-group">
								<button type="button" class="btn btn-success btn-sm disabled">
									<i class="fa fa-star"></i>
								</button>
								<!--<a href="" class="btn btn-success btn-sm disabled"  title="Active"><i class="fa fa-star"></i>Active</a>-->
								<a href="<?= site_url("tema/edit/" . $nama) ?>" class="btn btn-primary btn-sm"  title="Edit"><i class="fa fa-pencil"></i></a>
								<button type="button" class="btn btn-danger btn-sm disabled">
									<i class="fa fa-trash-o"></i>
								</button>
								<a href="<?= site_url("tema/backup/" . $nama) ?>" class="btn bg-navy btn-sm"  title="Backup"><i class="fa fa-download"></i></a>
							</div>
						</div>
					</div>
				</div>
			</div>
			<?php
			$no = 1;
			foreach ($list_tema as $tema) :
				$cut = explode('/', $tema);

				if($cut[0] != 'desa'):
					$nama = $cut[0];
					$lokasi = 'themes/'.$nama;
				else:
					$nama = $cut[1];
					$lokasi = $cut[0].'/themes/'.$nama;
				endif;

				if($nama != $this->theme):
					$no++; ?>
					<div class="col-md-4 col-xs-12">
						<div class="box box-info"> <!-- <div class="box box-danger">  -->
							<div class="box-header with-border">
								<center><h3 class="box-title"><?= ucwords($nama) ?></h3></center>
							</div>
							<div class="box-body">
								<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
									<div class="carousel-inner">
										<div class="item active">
											<img class="img-responsive" src="<?= base_url().$lokasi.'/thumbnail/1.png'; ?>" alt="<?= $nama ?>-1">
										</div>
										<div class="item">
											<img class="img-responsive" src="<?= base_url().$lokasi.'/thumbnail/2.png'; ?>" alt="<?= $nama ?>-2">
										</div>
										<div class="item">
											<img class="img-responsive" src="<?= base_url().$lokasi.'/thumbnail/3.png'; ?>" alt="<?= $nama ?>-3">
										</div>
										<a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
											<span class="fa fa-angle-left"></span>
										</a>
										<a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
											<span class="fa fa-angle-right"></span>
										</a>
									</div>
								</div>
								<div class="text-center">
									<div class="btn-group">
										<a href="<?= site_url("tema/change/" . $tema) ?>" class="btn btn-success btn-sm"  title="Active"><i class="fa fa-star"></i></a>
										<a href="<?= site_url("tema/edit/" . $tema) ?>" class="btn btn-primary btn-sm"  title="Edit"><i class="fa fa-pencil"></i></a>
										<?php if($lokasi == 'themes'):?>
											<button type="button" class="btn btn-danger btn-sm disabled">
												<i class="fa fa-trash-o"></i>
											</button>
											<?php else : ?>
												<a href="#" data-href="<?= site_url("tema/delete/" . $tema) ?>" class="btn btn-danger btn-sm"  title="Delete" data-toggle="modal" data-target="#confirm-delete"><i class="fa fa-trash-o"></i></a>
											<?php endif;?>
											<a href="<?= site_url("tema/backup/" . $nama) ?>" class="btn bg-navy btn-sm"  title="Backup"><i class="fa fa-download"></i></a>
										</div>
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
	</section>
</div>
<?php $this->load->view('global/confirm_delete');?>
