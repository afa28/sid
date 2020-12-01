<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>
<?php $this->load->model('lapor_model') ?>

	<div class="tombol">
		<a href="<?=site_url('layanan_mandiri/laporan')?>" class="btn btn-social btn-info btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block" title="Daftar Laporan"><i class="fa fa-list"></i> Kembali ke Arsip Laporan</a>
		<a href="<?=site_url('layanan_mandiri/lapor')?>" class="btn btn-social btn-success btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block" title="Buat Laporan"><i class="fa fa-pencil-square-o"></i> Buat Laporan</a>
	</div>
<div class="section-isi-laporan">
    <?php
    foreach (json_decode($laporan['meta'], true) as $key => $value) {
        $laporan[$key] = $value;
    }
    ?>
	<div class="body-laporan">
		<div class="row">
		<div class="col-md-3 col-xs-12">
				<div class="head-info-laporan"><i class="fa fa-ticket"></i> Informasi Laporan</div>
				<div class="sidebar-laporan"> 
					<div class="judul-laporan">
                        <div class="label-info-laporan">Judul Laporan</div>
                        <?php echo $laporan['judul'] ?>
                    </div>
					<div class="judul-laporan" style="border-top: 1px solid #ddd;">
                        <div class="label-info-laporan">Status</div>
                        <?php if($laporan['status']): ?>
                                <span class="bg-<?php 

                                if($laporan['status'] == 'Dalam Proses')
                                {
                                    echo 'yellow';
                                }

                                elseif($laporan['status'] == 'Pending')
                                {
                                    echo 'orange';
                                }

                                elseif($laporan['status'] == 'Selesai')
                                {
                                    echo 'green';
                                }

                                elseif($laporan['status'] == 'Belum Diverifikasi')
                                {
                                    echo 'red';
                                }

                                elseif($laporan['status'] == 'Diteruskan Ke Pihak Terkait')
                                {
                                    echo 'blue';
                                }

                                ?> btn-flat btn btn-sm" style="padding: 2px 5px; font-size: 12px; border-radius: 0px; text-transform: uppercase;"><?php echo $laporan['status'] ?></span>
								<?php else: ?>
                            <span class="bg-red btn-flat btn btn-sm" style="padding: 2px 5px;font-size: 12px; border-radius: 0px text-transform: uppercase;;">Belum Diverifikasi</span>
                        <?php endif ?>
                    </div>
					<div class="tgl-info-laporan">
                        <div class="label-info-laporan">Dilaporkan</div>
                        <?php echo tgl_indo2($laporan['tgl_upload']) ?>
                    </div>
                    <div class="nama-info-laporan">
                        <div class="label-info-laporan">Pelapor</div>
                        <?php echo $laporan['owner'] ?>
                    </div>
                    <div class="nama-info-laporan">
                        <div class="label-info-laporan">NIK</div>
                        <?php echo $laporan['email'] ?>
                    </div>
				</div>
			</div>
			<div class="col-md-9 col-xs-12">
				<div class="box-laporan">
					<div class="meta-laporan">
						<div class="nama-laporan">
							<?php echo $laporan['judul'] ?>
							<span class="tgl-laporan"><?php echo tgl_indo2($laporan['tgl_upload']) ?></span>
						</div>
					</div>
					<div class="isi-laporan"><?php echo $laporan['komentar'] ?></div>
					<?php if($laporan['gambar']): ?>
					<div class="box-lampiran">
						<div class="head-lampiran">Lampiran: <?php echo count($laporan['gambar']) ?> Gambar.</div>
						<div class="row">       
							<?php foreach($laporan['gambar'] as $lampiran): ?>
							<div class="col-md-4 col-xs-12">
								<a href="<?= base_url('desa/upload/laporan/'.$lampiran)?>" class="img-responsive cover-album img-fluid" data-lightbox="images">
                                <img src="<?= base_url('desa/upload/laporan/'.$lampiran)?>" class="img-responsive img-fluid img-popup" alt="" style="width: 240px; height: 120px;"></a>
							</div>
							<?php endforeach ?>                        
						</div>
					</div>
					<?php endif ?>
				</div>
				<?php foreach($jawaban ?? [] as $item): ?>
				<div class="box-laporan">
					<div class="meta-laporan">
						<div class="nama-laporan">
							<?php echo $item['admin'] ? 'Petugas':'Saya' ?>
						</div>
						<span class="tgl-balasan"><?php echo tgl_indo2(date('Y-m-d H:i:s', $item['time'])) ?></span>
					</div>
					<div class="isi-laporan">
						<?php echo $item['pesan'] ?>
					</div>
				</div>
				<?php endforeach ?>	
				<form action="<?php echo site_url('layanan_mandiri/laporan/balas/'.$laporan['id']) ?>" method="POST">
					<div class="form-group">
						<textarea type="text" name="isi" class="form-control input-sm" rows="5" placeholder="Balas..." ></textarea>
					</div>
					<div class="form-group text-right">
						<button class="btn btn-sm btn-success" type="sumit">Kirim</button>
					</div>
				</form>
			</div>
		</div>
	</div>
     
</div>