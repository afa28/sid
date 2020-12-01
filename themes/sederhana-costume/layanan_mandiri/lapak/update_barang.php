Anda belum memiliki lapak, masukan nama toko anda untuk membuatnya,

<div>

	<?php if ($error): ?>
		<?php echo $error; ?>
	<?php endif ?>

	<form method="POST">
		nama: <input type="text" name="nama" value="<?=$barang['nama'] ?>"><br/>
		keterangan: <input type="text" name="keterangan" value="<?=$barang['keterangan'] ?>"><br/>
		kategori: <select name="kategori">
			<?php foreach ($kategorilist as $key => $value): ?>

				<option value="<?=$key ?>" <?php if($value['id'] == $barang['kategori']['id']) { echo ' selected'; } ?>>
					<?=$value['nama'] ?>
				</option>

			<?php endforeach ?>
		</select><br/>
		<button type="submit">Upload</button>
	</form>
</div>