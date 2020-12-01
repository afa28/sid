Hai <br/>

nama: <?=$lapak['nama'] ?><br/>
wa: <?=$lapak['wa'] ?><br/>
deskripsi: <?=$lapak['deskripsi'] ?><br/><br/>

<a href="<?php echo site_url('layanan_mandiri/lapak/update'); ?>">Update Lapak</a>

<a href="<?php echo site_url('layanan_mandiri/lapak/input'); ?>">Upload Barang</a>

<br/><br/>

<b>Barang</b><br/>
Semua: <?=count($lapak['barang']['all']) ?><br/>
Tertolak: <?=count($lapak['barang']['tolak']) ?><br/>
Pending: <?=count($lapak['barang']['pending']) ?><br/>
Terbit: <?=count($lapak['barang']['terbit']) ?><br/><br/>

<?php

	$page = intval($_GET['page']);

	if ($page < 1) {

		$page = 1;
	}
	
	$limit = 5;
	$offset = ($page - 1) * $limit;

	$jumlahHalaman = ceil(count($lapak['barang']['all'])/$limit);

?>

<div class="row">
	<?php for($i = $offset; $i < $offset + $limit; $i++): ?>

	<?php if ($item = $lapak['barang']['all'][$i]): ?>

		<div class="col-sm">
			<a href="<?=site_url('layanan_mandiri/lapak/barang/' . $item['id']) ?>">
				<?=$item['nama'] ?>
			</a>
		</div>

	<?php endif ?>

<?php endfor ?>
</div>

Total Halaman: <?=$jumlahHalaman ?><br>
Halaman Sekarang: <?=$page ?>

<?php if ($page > 1): ?>

	<a href="<?=site_url('layanan_mandiri/lapak?page=' . + ($page - 1)) ?>"> Mundur </a>

<?php endif ?>

<?php if ($page < $jumlahHalaman): ?>

	<a href="<?=site_url('layanan_mandiri/lapak?page=' . + ($page + 1)) ?>"> Maju </a>

<?php endif ?>
