<form action="<?= $form_action?>" method="post" id="validasi">
	<div class='modal-body'>
		<div class="row">
			<div class="col-sm-9">
				<p><?= $detail ?> </p>
				<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
					<div class="carousel-inner">
						<?php
						$no = 0;
						foreach (glob($lokasi.'/thumbnail/*.png') as $thumb):
						$no++;

						if($no==1):
							$active='active';
						else:
							$active='';
						endif;
						?>
							<div class="item <?= $active ?>">
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
				<div class="text-center">
					<div class="btn-group">
						<?php if($tema != $active):?>
							<a href="<?= site_url('tema/change/' . $tema) ?>" class="btn btn-success btn-sm" title="Active"><i class="fa fa-star"></i></a>
							<?php else:?>
								<button type="button" class="btn btn-success btn-sm disabled">
									<i class="fa fa-star"></i>
								</button>
							<?php endif;?>
							<?php if($tema == $active OR ($tema == 'klasik' OR $tema == 'hadakewa')):?>
								<button type="button" class="btn btn-danger btn-sm disabled">
									<i class="fa fa-trash-o"></i>
								</button>
								<?php else : ?>
									<a href="#" data-href="<?= site_url('tema/delete/' . $tema) ?>" class="btn btn-danger btn-sm" title="Delete" data-toggle="modal" data-target="#confirm-delete"><i class="fa fa-trash-o"></i></a>
								<?php endif;?>
								<a href="<?= site_url('tema/edit/' . $tema) ?>" class="btn btn-primary btn-sm" title="Edit"><i class="fa fa-pencil"></i></a>

								<a href="<?= site_url('tema/backup/' . $tema) ?>" class="btn bg-navy btn-sm" title="Backup"><i class="fa fa-download"></i></a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</form>
