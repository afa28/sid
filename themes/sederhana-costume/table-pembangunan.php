<?php $data_pembangunan = $this->first_artikel_m->list_artikel(0, 4, 1003); ?>

<div class="lpembangunan">
	<div class="section-head text-center ">
		<h2 class="title">
			<a href="<?php echo get_kategori_url(1003 ); ?>">
				Pembangunan <?php echo $this->setting->sebutan_desa?>
			</a>
		</h2>
		<div class="dlab-separator-outer ">
			<div class="dlab-separator bg-primary style-skew"></div>
		</div>
		<div class="subtitle" style="color:#777;">Pembangunan yang ada di <?php echo $this->setting->sebutan_desa?> <?php echo ucwords($desa['nama_desa'])?> semua untuk kepentingan masyarakat</div>
	</div>
<?php $count = 0; ?>	
	<div class="pembangunan">
		<div class="table-responsive">
			<table class="table table-bordered pmb" style="margin-bottom: 0">
				<tr>
					<th class="text-center uppercase">Kegiatan Anggaran</th>
					<th class="text-center uppercase">Lokasi Kegiatan Anggaran</th>
					<th class="text-center uppercase">Pelaksana Kegiatan Anggaran (PKA)</th>
					<th class="text-center uppercase nilai">Nilai Kegiatan Anggaran</th>
				</tr>
				<?php foreach ($data_pembangunan as $data){ ?>
					<?php
						$query = 'select * from pembangunan where id_artikel = ?';
						$pembangunan = $this->db->query($query, $data["id"])->row_array();
					?>
				<tr>
					<td style="color: #333; font-weight: bold; font-family: 'Quicksand', sans-serif;"><a href="<?php echo get_artikel_url( $data['id'], $data['id_kategori'] ); ?>"><?php echo ucwords(character_limiter( $data['judul'], 60 )); ?></a></td>
					<td><?php echo $pembangunan['lokasi_pembangunan']; ?></td>
					<td><?php echo $pembangunan['koordinator_pembangunan']; ?></td>
					<td class="text-right uppercase nilai" style="padding: 0 17px;"><?php echo uang_indo($pembangunan['nilai_pembangunan']); ?></td>
				</tr>
				<?php } ?>
			</table>
		</div>
	</div>	
</div>