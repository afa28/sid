<style>
	.modal-dialog
	{
		padding-top: 50px;
		width: 75%;
	}

	.modal-body
	{
		padding-top: 0px;
		padding-bottom: 0px;
		padding-right: 16px;
		padding-left: : 16px;
	}

	.detail
	{
		overflow-y: auto;
		height: 400px;
	}
</style>
<div class='modal-body'>
	<div class="row">
		<div class="col-sm-12">
			<div class="row">
				<div class="col-sm-6">
					<?php if ($tema):?>
						<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
							<div class="carousel-inner">
								<?php
								$no = 0;
								foreach (glob($lokasi.'/thumbnail/*.png') as $thumb):
									$no++;
									?>
									<div class="item <?php ($no==1) and print('active') ?>">
										<img class="img-responsive" src="<?= site_url().$thumb; ?>" alt="<?= $nama?>"/>
									</div>
								<?php endforeach;?>

								<?php if($no>1):?>
									<a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
										<span class="fa fa-angle-left"></span>
									</a>
									<a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
										<span class="fa fa-angle-right"></span>
									</a>
								<?php endif;?>
							</div>
						</div>
						<?php else:?>
							<img class="img-responsive" src="<?= site_url('assets/images/404-image-not-found.jpg'); ?>" alt="404-image-not-found"/>
						<?php endif;?>
					</div>
					<div class="col-sm-6 detail">
						<br/>
						<?php if ($readme):?>
							<?= $readme ?>
						<?php else:?>
							<h4> Tidak ada deskripsi mengenai tema <?= ucwords($nama)?></h4>
						<?php endif;?>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="modal-footer">
		<div class="form-group">
			<center>
				<?php if($save_db != $active):?>
					<a href="<?= site_url('tema/change/'.$save_db) ?>" class="btn btn-social btn-success btn-sm" title="Active"><i class='fa fa-check'></i> Active</a>
					<?php else:?>
						<button class="btn btn-social btn-success btn-sm" title="Tema <?= ucwords($tema);?> Sudah Aktif" disabled>
							<i class='fa fa-star'></i> Active
						</button>
					<?php endif;?>
					<a href="<?= site_url('tema/edit/'.$save_db) ?>" class="btn btn-social btn-info btn-sm" title="Edit"><i class='fa fa-pencil'></i> Edit</a>
					<?php if(file_exists($lokasi.'/setting.php')):?>
					<a href="<?= site_url(FCPATH.'tema/costumize/'.$save_db) ?>" class="btn btn-social btn-primary btn-sm" title="Costumize"><i class='fa fa-gears'></i> Costumize</a>
					<?php else:?>
					<button class="btn btn-social btn-primary btn-sm" title="Tidak Ada Pengaturan Pada <?= ucwords($tema);?> Ini" disabled>
							<i class='fa fa-gears'></i> Costumize <?= FCPATH.$lokasi.'/setting.php'?>
						</button>
					<?php endif;?>
					<a href="<?= site_url('tema/backup/'.$save_db) ?>" class="btn btn-social bg-navy btn-sm" title="Backup"><i class='fa fa-download'></i> Backup</a>
				</center>
			</div>
		</div>
	</div>
</div>
