<?php  if(!defined('BASEPATH')) exit('No direct script access allowed'); ?>

<div class="col-md-12">
	<div class="box box-primary">
		<div class="box-body">
			<?php foreach ($list_setting as $setting): ?>
				<div class="form-group">
					<label class="col-sm-12 col-md-3" for="nama"><?= $setting->key?></label>
					<?php if ($setting->jenis == 'text'): ?>
						<div class="col-sm-12 col-md-4">
							<input id="<?= $setting->key?>" name="<?= $setting->key?>" class="form-control input-sm <?php ($setting->jenis != 'int') or print 'digits'?>" type="text"  value="<?= $setting->value?>" <?php ($setting->kategori != 'readonly') or print 'disabled'?>></input>
						</div>
					<?php endif;?>
					<label class="col-sm-12 col-md-5 pull-left" for="nama"><?= $setting->keterangan?></label>
				</div>
			<?php endforeach;?>
		</div>
	</div>
</div>
