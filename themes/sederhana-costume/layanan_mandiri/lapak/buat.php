<?php  if(!defined('BASEPATH')) exit('No direct script access allowed'); ?>

Anda belum memiliki lapak, masukan nama toko anda untuk membuatnya,

<div>

	<?php if ($validation_error): ?>
		<?php echo $validation_error; ?>
	<?php endif ?>

	<form method="POST">
		nama: <input type="text" name="nama"><br/>
		wa: <input type="text" name="wa"><br/>
		deskripsi: <textarea name="deskripsi"></textarea><br/>
		<button type="submit">Submit</button>
	</form>
</div>