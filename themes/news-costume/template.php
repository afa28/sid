<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<?php $this->load->view("$folder_themes/layouts/header"); ?>

<div class="container-default hal-content">
	<div class="container">
		<div class="row">
			<!-- page content -->
			<div class="col-md-9">

				<div class="page-content">
					<?php $this->load->view("$folder_themes/partials/content-berita");?>
				</div>
			</div>
			<!-- end content -->

			<!-- Sidebar -->
			<div class="col-md-3">

				<?php $this->load->view("$folder_themes/layouts/sidebar");?>

			</div>
		</div>
		<!-- /.row -->
	</div>
</div><!-- end content -->

<?php //$this->load->view("$folder_themes/layouts/apbdes2");?>

<?php $this->load->view("$folder_themes/layouts/footer");?>
