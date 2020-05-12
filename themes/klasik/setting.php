<div class="col-md-4">
	<div class="box box-primary">
		<div class="box-body box-profile">
			<img class="img-responsive" src="<?= site_url($setting.'background.jpg')?>" alt="Background">
			<p class="text-center text-bold">Background</p>
			<span class="help-block text-center"><code>(Kosongkan, jika background tidak berubah)</code></span>
			<div class="input-group input-group-sm">
				<input type="text" class="form-control" id="file_path" >
				<input type="file" class="hidden" id="file" name="background">
				<span class="input-group-btn">
					<button type="button" class="btn btn-info btn-flat"  id="browser"><i class="fa fa-search"></i> Browse</button>
				</span>
			</div>
		</div>
	</div>
	<div class="box box-primary">
		<div class="box-body box-profile">
			<img class="img-responsive" src="<?= site_url($setting.'header.jpg')?>" alt="Header">
			<br/>
			<p class="text-center text-bold">Header</p>
			<span class="help-block text-center"><code>(Kosongkan, jika header tidak berubah)</code></span>
			<div class="input-group input-group-sm">
				<input type="text" class="form-control" id="file_path" >
				<input type="file" class="hidden" id="file" name="header">
				<span class="input-group-btn">
					<button type="button" class="btn btn-info btn-flat"  id="browser"><i class="fa fa-search"></i> Browse</button>
				</span>
			</div>
		</div>
	</div>
	<div class="box box-primary">
		<div class="box-body box-profile">
			<img class="img-responsive" src="<?= site_url($setting.'siteman.jpg')?>" alt="background-siteman">
			<br/>
			<p class="text-center text-bold">Background Siteman</p>
			<span class="help-block text-center"><code>(Kosongkan, jika background siteman tidak berubah)</code></span>
			<div class="input-group input-group-sm">
				<input type="text" class="form-control" id="file_path" >
				<input type="file" class="hidden" id="file" name="siteman">
				<span class="input-group-btn">
					<button type="button" class="btn btn-info btn-flat"  id="browser"><i class="fa fa-search"></i> Browse</button>
				</span>
			</div>
		</div>
	</div>
</div>
<div class="col-md-8">
	<div class="box box-primary">
		<div class="box-body">
			<?php foreach ($list_setting as $setting):
				$label = ucwords(str_replace('_', ' ', $setting->key));
			?>
			<div class="form-group">
				<label class="col-sm-12 col-md-3" for="nama"><?= $label?></label>
				<?php if ($setting->jenis == 'text'): ?>
					<div class="col-sm-12 col-md-4">
						<input id="<?= $setting->key?>" name="<?= $setting->key?>" class="form-control input-sm <?php ($setting->jenis != 'int') or print 'digits'?>" type="text"  value="<?= $setting->value?>"></input>
					</div>
				<?php endif;?>
				<label class="col-sm-12 col-md-5 pull-left" for="nama"><?= $setting->keterangan?></label>
			</div>
			<?php endforeach;?>
		</div>
	</div>
</div>
