<div class="content-wrapper">
	<section class="content-header">
		<h1>Pengaturan Tema</h1>
		<ol class="breadcrumb">
			<li><a href="<?= site_url('hom_sid') ?>"><i class="fa fa-home"></i>Home</a></li>
			<li class="active">Pengaturan Tema</li>
		</ol>
	</section>
	<section class="content" id="maincontent">
		<div class="row">
			<div class="col-md-4 col-xs-12">
				<div class="box box-info">
					<div class="box-header with-border text-center">
						<h3 class="box-title text-center"><b><?= ucwords($nama) ?></b></h3>
						<?php if($tema == 'klasik' OR $tema == 'hadakewa'):?>
							<small><code>(System)</code></small>
						<?php endif;?>
					</div>
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
				</div>
			</div>
		</div>
	</section>
</div>
<?php $this->load->view('global/confirm_delete');?>
