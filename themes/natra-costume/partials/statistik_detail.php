<div class="content_bottom_left">
	<?php if ($tipe == 2): ?>
		<?php $this->load->view($folder_themes.'/partials/statistik_sos.php'); ?>
		<?php elseif ($tipe == 3): ?>
			<?php $this->load->view(Web_Controller::fallback_default($this->theme, '/partials/wilayah.php')); ?>
			<?php elseif ($tipe == 4): ?>
				<?php $this->load->view(Web_Controller::fallback_default($this->theme, '/partials/dpt.php')); ?>
				<?php else: ?>
					<?php $this->load->view(Web_Controller::fallback_default($this->theme, '/partials/statistik.php')); ?>
				<?php endif; ?>
			</div>
