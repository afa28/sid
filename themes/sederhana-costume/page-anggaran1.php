<?php  if(!defined('BASEPATH')) exit('No direct script access allowed'); ?>

<div class="box no-padd">
	<div class="box-body">

		<?php if( $tahun !== 0 ){ ?>
			<div class="header-anggaran"><?php echo $page_title.' '.$tahun ?></div>
			<div class="table-responsive">
				<table class="table table-striped table-bordered">
					<thead>
						<tr>
							<th class="text-center uppercase info">Sumber Dana</th>
							<th class="text-center uppercase info">Perencanaan/Kegiatan</th>
							<th class="text-center uppercase info">Anggaran</th>
							<th class="text-center uppercase info">Realisasi</th>
							<th class="text-center uppercase info">Saldo</th>
						</tr>
					</thead>

					<tbody>
						<?php 
						$total_anggaran = 0; $total_realisasi = 0; $total_sisa = 0;
						foreach($data_kategori as $key => $data){ 
							$anggarans = $this->anggaran->get( "b.enabled=1 AND a.id_kategori=".$data['id']." AND tahun=".$tahun, 'a.nama_anggaran' );
							?>
								<tr>
									<td class="success">
										&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
										<span class="sub-kat-apbdes"><?=($key+1)?>. <?=$data['kategori'] ?></span>
									</td>
									<td colspan="4" class="text-center uppercase success"><strong>Rincian Dana</strong></td>
								</tr>

								<?php $tot_masuk = 0; $tot_keluar = 0; $tot_sisa = 0;
								if( $anggarans->num_rows() > 0 ){
									foreach($anggarans->result_array() as $no => $row){  
										$masuk = $this->anggaran->get_dana_masuk( "tahun=$tahun AND nama_anggaran='".$row['nama_anggaran']."'" );
										$keluar = $this->anggaran->get_dana_keluar( "tahun=$tahun AND nama_anggaran='".$row['nama_anggaran']."'" );
										$sisa = ( $masuk - $keluar );

										$tot_masuk += $masuk; 
										$tot_keluar += $keluar;
										$tot_sisa += $sisa;
										?>
										<tr>
											<td></td>
											<td>
												<?php if( $row['id_artikel'] > 0 ) { ?>
													 <?=($no+1).'. <a target="_BLANK" data-toggle="tooltip" href="'.get_artikel_url( $row['id_artikel'], $row['id_kategori_artikel'] ).'" title="Lihat artikel anggaran">'.$row['nama_anggaran'].'</a>' ?>
												<?php }else{ ?>
													<?=($no+1).'. '.$row['nama_anggaran'] ?>
												<?php } ?>
											</td>
											<td><?php echo ( $masuk > 0 ) ? uang_indo( $masuk ) : '-';  ?></td>
											<td><?php echo ( $keluar > 0 ) ? uang_indo( $keluar ) : '-';  ?></td>
											<td><?php echo ( $sisa > 0 ) ? uang_indo( $sisa ) : '<span class="text-danger">'.uang_indo( $sisa ).'</span>';  ?></td>
										</tr>
									<?php } ?>
								<?php }else{ ?>
									<tr>
										<td></td>
										<td class="text-danger">Data belum diinput</td>
										<td></td>
										<td></td>
										<td></td>
									</tr>
								<?php } ?>
								<?php 
								$total_anggaran += $tot_masuk;
								$total_realisasi += $tot_keluar;
								$total_sisa += $tot_sisa;
								?>
								<?php if( $tot_masuk > 0 || $tot_keluar > 0 ) { ?>
									<tr style="background: #202020;color: #fafafa;font-weight: bold;letter-spacing: 1px;">
										<td colspan="2" class="text-center"><strong>Total <?php echo $sub['kategori'] ?></strong></td>
										<td><?php echo uang_indo( $tot_masuk ) ?></td>
										<td><?php echo uang_indo( $tot_keluar ) ?></td>
										<td><?php echo uang_indo( $tot_sisa ) ?></td>
									</tr>
								<?php } ?>
							
						<?php } ?>
					</tbody>
				</table>
				
				<div class="header-anggaran">Ringkasan Anggaran Desa</div>
				<table class="table table-striped table-bordered">
					<tbody>
						<tr>
							<td width="70%" class="text-right"><b>TOTAL ANGGARAN</b></td>
							<td><b><?php echo uang_indo( $total_anggaran ) ?></b></td>
						</tr>
						<tr>
							<td width="70%" class="text-right"><b>TOTAL ANGGARAN TERPAKAI</b></td>
							<td><b><?php echo uang_indo( $total_realisasi ) ?></b></td>
						</tr>
						<tr>
							<td width="70%" class="text-right"><b>SISA ANGGARAN</b></td>
							<td><b><?php echo uang_indo( $total_sisa ) ?></b></td>
						</tr>
					</tbody>
				</table>
			</div>
		<?php }else{ ?>
			<h2><?php echo $page_title ?></h2>
			<div class="table-responsive">
				<table class="table table-striped table-bordered">
					<thead>
						<tr>
							<th class="text-center">APBDES</th>
							<th class="text-center">Anggaran</th>
							<th class="text-center">Realisasi</th>
							<th class="text-center">Saldo</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach( $data_tahun->result_array() as $data ) { 
							$dana_masuk = $this->anggaran->get_dana_masuk( "tahun=".$data['tahun'] );
							$dana_keluar = $this->anggaran->get_dana_keluar( "tahun=".$data['tahun'] );
							$dana_sisa = ( $dana_masuk - $dana_keluar );
							?>
							<tr>
								<td class="text-center uppercase">
									<a href="<?=site_url('data-apbdes/'.$data['tahun'])?>">Tahun Anggaran <?php echo $data['tahun'] ?></a>
								</td>
								<td class="text-center"><?php echo uang_indo( $dana_masuk ) ?></td>
								<td class="text-center"><?php echo uang_indo( $dana_keluar ) ?></td>
								<td class="text-center"><?php echo uang_indo( $dana_sisa ) ?></td>
							</tr>
						<?php } ?>
					</tbody>
				</table>
			</div>
		<?php } ?>
	</div>
</div>