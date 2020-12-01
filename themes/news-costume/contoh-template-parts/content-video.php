<?php  if(!defined('BASEPATH')) exit('No direct script access allowed'); ?>

<div class="panel panel-default">

	<div class="panel-body">
		<div class="single-title"><?php echo ( $content['judul'] ); ?></div>
		<div class="meta-categories">
			<?php if ( trim($content['kategori'] ) != ''): ?>
                <a href="<?php echo get_kategori_url( $content['id_kategori'] ); ?>" class="cat-label"><i class="fa fa-tag"></i> <?php echo ucwords( $content['kategori'] ); ?></a>
            <?php endif; ?>
		</div>
		<div class="meta-content text-right">	
			<small>Diterbitkan oleh <?php echo $content['owner']; ?>, <?php echo tgl_indo2( $content['tgl_upload'] ); ?></small>
			
		</div>
		<hr/>
		<!-- Post Content -->
		<div class="video-content">
			<iframe width="100%" height="530px" src="https://www.youtube.com/embed/<?php echo ( $content['link_embed'] ); ?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen=""></iframe>
		</div>
		<div class="artikel-single">
			<?php echo htmlspecialchars_decode( $content['isi'] ); ?>
		</div>
		<!-- Social Media Share Section Start -->	
		<div class="head-share">Bagikan :</div>
		<div class="social-footer">
			<a href="http://www.facebook.com/sharer.php?u=<?= site_url().'video'.$content['kategori_slug'].'/'. $content['slug']?>" target="_blank"><span><i class="fa fa-facebook"></i></span></a>
			<a href="http://twitter.com/share?url=<?= site_url().'video'.$content['kategori_slug'].'/'. $content['slug']?>" target="_blank"><span><i class="fa fa-twitter"></i></span></a>
			<a href="https://api.whatsapp.com/send?text=<?= site_url().'video'.$content['kategori_slug'].'/'. $content['slug']?>" target="_blank"><span><i class="fa fa-whatsapp"></i></span></a>
		</div>
		<!-- Social Media Share Section End -->
	</div>
</div>

<div class="box">
	<div class="box-primary">
			<?php $this->load->view($folder_themes.'/comments');?>
	</div>
</div>

