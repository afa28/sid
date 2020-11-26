<div class="footer_bottom">
	<div class="container">
		<div class="row">
			<div class="text-center">
					&copy; <a href="https://opendesa.id/" rel="noopener noreferrer" target="_blank">OpenDesa</a>
					<i class="fa fa-circle" style="font-size: smaller;"></i>
					<a href="https://github.com/OpenSID/OpenSID" rel="noopener noreferrer" target="_blank">OpenSID <?= AmbilVersi(); ?></a>
					<a href="<?= site_url(); ?>siteman" rel="noopener noreferrer" target="_blank"> | Natra 4.2.1-costume-luwu</a>
				</div>
		</div>
	</div>
</div>
<script type="text/javascript">
	function printDiv(divName) {
		var printContents = document.getElementById(divName).innerHTML;
		var originalContents = document.body.innerHTML;
		document.body.innerHTML = printContents;
		window.print();
		document.body.innerHTML = originalContents;
	} </script>
