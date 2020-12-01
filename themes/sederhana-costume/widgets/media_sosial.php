<?php  if(!defined('BASEPATH')) exit('No direct script access allowed'); ?>

<!-- widget SocMed -->
<div class="social">
	<ul>
		<?php foreach($sosmed As $data){ ?>
			<li><a href="<?php echo $data["link"]; ?>" class="facebook <?php echo strtolower($data['nama']); ?>"><?php echo $data['nama'] ?></a></li>
		<?php } ?>
	</ul>
</div>