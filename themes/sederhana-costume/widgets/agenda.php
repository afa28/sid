<?php  if(!defined('BASEPATH')) exit('No direct script access allowed'); ?>

<!-- Widget Agenda -->
<?php if ($data_agenda): ?>
	<div class="widget-agenda">
		<ul class="timeline">
			<?php foreach ($data_agenda as $data): ?>
				<li><i class="fa fa-calendar" style="background:deeppink"></i>
				<div class="timeline-item">
					<div class="timeline-header"><a href="<?php echo site_url( 'berita/agenda/'.$data['slug'] ); ?>"><?php echo $data['judul']; ?></a></div>
					<div class="dlab-post-meta">
                        <div class="post-date"><i class="ti ti-calendar"></i> <?php echo hari( $data['tgl_agenda'] ); ?>, <?php echo tgl_indo2( $data['tgl_agenda'] ); ?></div>
                    </div>
				</div>
				</li>
			<?php endforeach; ?>
		</ul>
	</div>
	<?php endif; ?>


