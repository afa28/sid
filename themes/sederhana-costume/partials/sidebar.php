<?php  if(!defined('BASEPATH')) exit('No direct script access allowed'); ?>

<div class="col-md-4">
	<?php
	if ($w_cos):
		foreach ($w_cos as $data):
			$widget = trim($data['isi']);
			if ($data["jenis_widget"] == 1):
				include("widgets/".$widget);
			elseif ($data["jenis_widget"] == 2):
				include($widget);
				else: ?>
					<div class="widget bg-white p-a20 recent-posts-entry homepage-widget">
						<div class="widget-title style-1"><?=$data["judul"]?></div>
						<div class="widget-post-bx">
							<?= html_entity_decode($data['isi'])?>
						</div>
					</div>
				</div>
			<?php endif;
		endforeach;
	endif;
	?>
</div>
