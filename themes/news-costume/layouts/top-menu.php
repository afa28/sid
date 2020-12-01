<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<!-- Navigation -->
<div class="contaner-default top-menu fixed-top">
	<div class="container">
		<div class="col-md-3 col-sm-12">
			<div class="social-footer hidden-sm hidden-xs">
				<a href="<?php echo $sosmed[nested_array_search('Facebook',$sosmed)]['link']?>" target="_blank"><span><i class="fa fa-facebook"></i></span></a>
				<a href="<?php echo $sosmed[nested_array_search('Twitter',$sosmed)]['link']?>" target="_blank"><span><i class="fa fa-twitter"></i></span></a>
				<a href="<?php echo $sosmed[nested_array_search('YouTube',$sosmed)]['link']?>" target="_blank"><span><i class="fa fa-youtube-square"></i></span></a>
				<a href="<?php echo $sosmed[nested_array_search('Instagram',$sosmed)]['link']?>" target="_blank"><span><i class="fa fa-instagram"></i></span></a>
				<a href="https://api.whatsapp.com/send?phone=<?php echo $sosmed[nested_array_search('WhatsApp',$sosmed)]['link']?>" target="_blank"><span><i class="fa fa-whatsapp"></i></span></a>
			</div>
			<div class="social-footer text-center hidden-md hidden-lg">
				<a href="<?php echo $sosmed[nested_array_search('Facebook',$sosmed)]['link']?>" target="_blank"><span><i class="fa fa-facebook"></i></span></a>
				<a href="<?php echo $sosmed[nested_array_search('Twitter',$sosmed)]['link']?>" target="_blank"><span><i class="fa fa-twitter"></i></span></a>
				<a href="<?php echo $sosmed[nested_array_search('YouTube',$sosmed)]['link']?>" target="_blank"><span><i class="fa fa-youtube-square"></i></span></a>
				<a href="<?php echo $sosmed[nested_array_search('Instagram',$sosmed)]['link']?>" target="_blank"><span><i class="fa fa-instagram"></i></span></a>
				<a href="https://api.whatsapp.com/send?phone=<?php echo $sosmed[nested_array_search('WhatsApp',$sosmed)]['link']?>" target="_blank"><span><i class="fa fa-whatsapp"></i></span></a>
			</div>
		</div>
		<div class="col-md-3 col-sm-12 hidden-sm hidden-xs">
		</div>
		<div class="col-md-6 col-sm-12 hidden-sm hidden-xs">
			<div class="top-right social-footer">
				<span class="badget-right"><i class="fa fa-phone"><a href="tel:<?php echo $desa['telepon']?>" target="_blank" class="head-telepon" style="color:#777"> <?php echo $desa['telepon']?></a></i></span>
				<span class="badget-right"><i class="fa fa-envelope"><a href="tel:<?php echo $desa['email_desa']?>" target="_blank" class="head-telepon" style="color:#777"> <?php echo $desa['email_desa']?></a></i></span>
			</div>
		</div>
	</div>
</div>
