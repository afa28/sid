<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>
<?php $this->load->model('lapor_model') ?>
<div class="content-laporan">

    <?php
    foreach (json_decode($laporan['meta'], true) as $key => $value) {
        $laporan[$key] = $value;
    }
    ?>

	<div class="body-laporan">
		<div class="box-laporan">
			<div class="meta-laporan">
				<div class="nama-laporan">
				<b><?php echo $laporan['judul'] ?></b><br />
				<?php echo tgl_indo2($laporan['tgl_upload']) ?>
				<?php if($laporan['status']): ?>
                    <span class="bg-<?php
						if($laporan['status'] == 'Dalam Proses')
                    {
                         echo 'green';
                    }
						elseif($laporan['status'] == 'Pending')
                    {
                        echo 'orange';
                    }
                        elseif($laporan['status'] == 'Diteruskan ke pihak terkait')
                    {
                         echo 'blue';
                    }
                    ?> btn-flat btn btn-sm" style="padding: 2px; font-size: 12px; border-radius: 0px; margin-top: -12px; float:right;"><?php echo $laporan['status'] ?></span>
					<?php else: ?>
                    <span class="bg-red btn-flat btn btn-sm" style="padding: 2px;font-size: 12px; border-radius: 0px; margin-top: -12px; float:right;">Belum Diverifikasi</span>
				<?php endif ?>
				</div>
			</div>
			<div class="isi-laporan"><?php echo $laporan['komentar'] ?></div>
			<?php if($laporan['gambar']): ?>
			<div class="box-lampiran">
				<div class="head-lampiran">Lampiran: <?php echo count($laporan['gambar']) ?> Gambar.</div>
				<div class="row">
				<?php foreach($laporan['gambar'] as $lampiran): ?>
					<div class="col-md-4 col-xs-12">
						<a href="<?= base_url('desa/upload/laporan/'.$lampiran)?>" class="img-responsive cover-album img-fluid" data-lightbox="images" data-title="Lampiran Laporan <?php echo $laporan['judul'] ?>">
                        <img src="<?= base_url('desa/upload/laporan/'.$lampiran)?>" class="img-responsive img-fluid img-popup" alt="" style="width: 240px; height: 120px;"></a>
					</div>
				<?php endforeach ?>
				</div>
			</div>
			<?php endif ?>
		</div>
		<?php foreach($laporan['jawaban'] ?? [] as $jawaban): ?>
		<div class="box-laporan">
			<div class="meta-laporan">
				<div class="nama-laporan">
					<?php echo $jawaban['admin'] ? 'Admin':'Saya' ?>
				</div>
				<span class="tgl-balasan"><?php echo tgl_indo2(date('Y-m-d H:i:s', $jawaban['time'])) ?></span>
			</div>
			<div class="isi-laporan">
				<?php echo $jawaban['isi'] ?>
			</div>
		</div>
		<?php endforeach ?>	
	</div>
</div>
