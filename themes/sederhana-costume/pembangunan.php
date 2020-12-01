<?php  if(!defined('BASEPATH')) exit('No direct script access allowed'); ?>
	
	<?php if ($data_pembangunan){ ?>
		<?php $no=0; if ($data_pembangunan) $no++;{ ?>
	<div class="section-head text-center ">
		<h2 class="title">Pembangunan <?php echo ucwords($this->setting->sebutan_desa)." "?></h2>
		<div class="dlab-separator-outer ">
			<div class="dlab-separator bg-primary style-skew"></div>
		</div>
		<div class="subtitle" style="color:#777;">Pembangunan yang ada di <?php echo $this->setting->sebutan_desa?> <?php echo ucwords($desa['nama_desa'])?> semua untuk kepentingan masyarakat</div>
	</div>
		<div class="row">
			<?php foreach ($data_pembangunan as $data){ ?>
			<div class="col-sm-4 col-xs-12">
				<div class="content-pembangunan">
					<div class="img-block">
					   	<a href="<?php echo get_artikel_url( $data['id'], $data['id_kategori'] ); ?>">
					  	    <img src="<?php echo thumbnail_uri($data['gambar'],380,200) ?>" class="img-responsive" alt="<?php echo $data['judul'] ?>">
					  	</a>
					</div>
					<div class="dlab-post-meta">
						<ul>
							<li class="post-date"><?php echo tgl_indo( $data['tgl_upload'] ); ?></li>
							<li class="post-cat">
							<?php if ( trim($data['kategori'] ) != ''): ?>
								<a href="<?php echo get_kategori_url( $data['id_kategori'] ); ?>" class="cat-label"><?php echo ucwords( $data['kategori'] ); ?></a>
							<?php endif; ?>
							</li>
						</ul>
					</div>
					<div class="title-block">
					    <a href="<?php echo get_artikel_url( $data['id'], $data['id_kategori'] ); ?>"><?php echo ucwords(character_limiter( $data['judul'], 25 )); ?></a>
					</div>
				</div>
				
			</div>
			<?php } ?>			
		</div>
		<?php } ?>
		</div>		
<?php } ?>