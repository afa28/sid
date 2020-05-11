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
					<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
						<div class="carousel-inner">
							<?php
							$no = 0;
							foreach (glob($lokasi.'/thumbnail/*.png') as $thumb):
								$no++;
								?>
								<div class="item <?php ($no==1) and print('active') ?>">
									<img class="img-responsive" src="<?= base_url().$thumb; ?>" alt="<?= $nama?>"/>
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
				</div>
				<div class="col-sm-6 detail">
					<br/><?= $detail ?>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="modal-footer">
	<center>
		<a href="<?= site_url('tema/change/' . $tema) ?>" class="btn btn-social btn-success btn-sm"><i class='fa fa-check'></i> Active</a>
		<a href="<?= site_url('tema/edit/' . $tema) ?>" class="btn btn-social btn-primary btn-sm"><i class='fa fa-cog'></i> Costumize</a>
		<a href="<?= site_url('tema/edit/' . $tema) ?>" class="btn btn-social btn-danger btn-sm"><i class='fa fa-trash-o'></i> Delete</a>
		<a href="<?= site_url('tema/edit/' . $tema) ?>" class="btn btn-social bg-navy btn-sm"><i class='fa fa-download'></i> Backup</a>
	</center>
</div>
