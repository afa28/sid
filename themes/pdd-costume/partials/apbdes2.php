<div class="container-default section-module-apbdes">
	<div class="container">
		<div class="col-md-4">
			<div class="apbdes">
				<div class="bg-title">
					<div class="title-widget-apbdes-1">
						<div class="apbdes-title-text">APBDes <?php echo date('Y') ?></div>
					</div>
				</div>

				<div class="body-apbdes">
				<?php if($data_apbdes && count($data_apbdes) > 0){ ?>
					<?php foreach($data_apbdes as $d){ ?>
						<?php 
							$persen = $d['jumlah'] / $total_apbdes * 100;
							$persen = number_format($persen,0);
						?>
					<div class="progress-apbdes"><?php echo $d['parent']; ?></div>
					<?php echo uang_indo($d['jumlah']) ?><span style="float: right;"><?php echo $persen.'%' ?></span>
					<div class="progress">			
						<div class="progress-bar progress-bar-<?php echo $d['warna_bar'] ?> progress-bar-striped" role="progressbar" aria-valuenow="<?php echo $persen ?>" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo $persen ?>%">
						</div>
					</div>
					<?php } ?>
					<div class="progress-apbdes">Total APBDes <?php echo (int)date('Y') ?></div>
					<b><?php echo uang_indo($total_apbdes) ?></b>
					<div class="progress">			
						<div class="progress-bar progress-bar-success progress-bar-striped active" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width:100%">
									<b>100%</b>
						</div>
					</div>
					<?php }else{ ?>
						<p class="alert alert-danger">Data belum diinput</p>
					<?php } ?>
				</div>
			</div>
		</div>

		<div class="col-md-4">
			<div class="apbdes">
				<div class="bg-title">
					<div class="title-widget-apbdes-2">
						<div class="apbdes-title-text">APBDes <?php echo date('Y') - 1 ?></div>
					</div>
				</div>

				<div class="body-apbdes">
					<?php if($data_apbdes_prev && count($data_apbdes_prev) > 0){
						$data_apbdes_temp = array_column($data_apbdes_prev, 'jumlah', 'id_kategori');
					?>
						<?php foreach($data_apbdes_prev as $d){ ?>
							<?php 
								$persen = $d['jumlah'] / $total_apbdes_prev * 100;
								$persen = number_format($persen,0);
							?>
						<div class="progress-apbdes"><?php echo $d['parent']; ?></div>
							<?php echo uang_indo($d['jumlah']) ?><span style="float: right;"><?php echo $persen.'%' ?></span>
						<div class="progress">			
								<div class="progress-bar progress-bar-<?php echo $d['warna_bar'] ?> progress-bar-striped" role="progressbar" aria-valuenow="<?php echo $persen ?>" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo $persen ?>%">
							</div>
						</div>
						<?php } ?>
						<div class="progress-apbdes">Total APBDes <?php echo date('Y') - 1 ?></div>
							<b><?php echo uang_indo($total_apbdes_prev) ?></b>
						<div class="progress">			
							<div class="progress-bar progress-bar-success progress-bar-striped active" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width:100%">
								<b>100%</b>
							</div>
						</div>
					<?php }else{ ?>
						<p class="alert alert-danger">Data belum diinput</p>
					<?php } ?>
				</div>
			</div>
		</div>

		<div class="col-md-4">
			<div class="apbdes">
				<div class="bg-title">
					<div class="title-widget-apbdes-3">
						<div class="apbdes-title-text">Realisasi APBDes <?php echo date('Y') - 1 ?></div>
					</div>
				</div>

				<div class="body-apbdes">
					<?php if($data_reapbdes && count($data_reapbdes) > 0){ ?>
						<?php foreach($data_reapbdes as $d){ ?>
							<?php 
								$persen = $d['jumlah'] / $total_apbdes_prev * 100;
								$persen = number_format($persen,0);
							?>
							<div class="progress-apbdes"><?php echo $d['parent']; ?></div>
							<?php echo uang_indo($d['jumlah']) ?><span style="float: right;"><?php echo $persen.'%' ?></span>
							<div class="progress">			
								<div class="progress-bar progress-bar-<?php echo $d['warna_bar'] ?> progress-bar-striped" role="progressbar" aria-valuenow="<?php echo $persen ?>" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo $persen ?>%">
								</div>
							</div>
						<?php } ?>
						<?php 
						$total = $total_apbdes_prev - $total_reapbdes;
						$total_persen = $total_reapbdes / $total_apbdes_prev * 100;
						$total_persen = number_format( $total_persen, 0 );
						?>
						<div class="progress-apbdes">Total Realisasi APBDes <?php echo date('Y') - 1 ?></div>
						<b><?php echo uang_indo($total) ?></b>
						<div class="progress">			
							<div class="progress-bar progress-bar-success progress-bar-striped active" role="progressbar" aria-valuenow="<?=$total_persen?>" aria-valuemin="0" aria-valuemax="<?=$total_persen?>" style="width:<?=$total_persen?>%">
								<b><?=$total_persen?>%</b>
							</div>
						</div>
					<?php }else{ ?>
						<p class="alert alert-danger">Data belum diinput</p>
					<?php } ?>
				</div>
			</div>
		</div>				
	</div>
</div>