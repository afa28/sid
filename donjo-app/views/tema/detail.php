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
								foreach (glob($lokasi.'*.png') as $thumb):
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
						<?php if ($tema):?>
							<?= $readme ?>
							<?php else:?>
								<h4> Tidak ada deskripsi mengenai tema ini</h4>
							<?php endif;?>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="modal-footer">
			<div class="form-group">
				<center>
					<a href="<?= site_url('tema/change/'.$tipe.'/'.$tema) ?>" class="btn btn-social btn-success btn-sm" title="Active"><i class='fa fa-check'></i> Active</a>
					<a href="<?= site_url('tema/edit/'.$tipe.'/'.$tema) ?>" class="btn btn-social btn-info btn-sm" title="Edit"><i class='fa fa-pencil'></i> Edit</a>
					<a href="<?= site_url('tema/costumize/'.$tipe.'/'.$tema) ?>" class="btn btn-social btn-primary btn-sm" title="Costumize"><i class='fa fa-gears'></i> Costumize</a>
					<a href="<?= site_url('tema/backup/'.$tipe.'/'.$tema) ?>" class="btn btn-social bg-navy btn-sm" title="Backup"><i class='fa fa-download'></i> Backup</a>
				</center>
			</div>
		</div>
	</div>
</div>
