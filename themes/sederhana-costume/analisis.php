<?php  if(!defined('BASEPATH')) exit('No direct script access allowed'); ?>

<?php $this->load->view($folder_themes.'/header');?>
<div class="container-default bg-gray" id="analisis">
	<div class="container">
	<div class="row">
		<div class="col-md-8">
			<div class="page-content box-analisis">
				<div class="box">
					<?php
					if($list_jawab){
						echo $page_content;
					}else{ ?>
						<div class="box-header">
							<div class="judul">DAFTAR AGREGASI DATA ANALISIS DESA</div>
							<div class="sub-judul">Klik untuk melihat lebih detail</div>
						</div>

						<div class="box-body">
							<?php foreach($list_indikator AS $data){?>
								<div class="box">
									<div class="box-header">
										<a href="<?php echo site_url()?>analisis/<?php echo $data['id']?>/<?php echo $data['subjek_tipe']?>/<?php echo $data['id_periode']?>">
											<div class="judul-indikator"><?php echo $data['indikator']?></div>
										</a>
									</div>
									<div class="box-body" style="font-size:12px;">
										<table>
											<tr>
												<td width="200" class="uppercase"><b>Pendataan</b></td>
												<td width="20"><b>:</b></td>
												<td> <?php echo $data['master']?></td>
											</tr>
											<tr>
												<td width="200" class="uppercase"><b>Subjek</b></td>
												<td><b>:</b></td>
												<td> <?php echo $data['subjek']?></td>
											</tr>
											<tr>
												<td width="200" class="uppercase"><b>Petugas/Kelompok Sensus</b></td>
												<td><b>:</b></td>
												<td> <?php echo $data['petugas']?></td>
											</tr>
											<tr>
												<td width="200" class="uppercase"><b>Tahun</b></td>
												<td><b>:</b></td>
												<td> <?php echo $data['tahun']?></td>
											</tr>
										</table>
									</div>
								</div>
							<?php } ?>
						</div>
					<?php } ?>
				</div>
			</div>
		</div>

		<!-- Sidebar -->
		<div class="col-md-4">

			<?php $this->load->view($folder_themes.'/sidebar');?>

		</div>
		<div class="clearfix"></div>
	</div>
</div>
</div>
<?php $this->load->view($folder_themes.'/footer');?>