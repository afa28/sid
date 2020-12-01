<?php  if(!defined('BASEPATH')) exit('No direct script access allowed'); ?>

<div class="container">
<?php if(!isset($_SESSION['mandiri']) OR $_SESSION['mandiri']<>1){ ?>
    <!-- page content -->
    <div class="mb-4 mt-4">
        <!-- MENU -->
        <div class="row">
            <div class="col-sm text-center">
                <a class="text-dark" href="<?php echo site_url('layanan_mandiri/profil'); ?>">
                    <div class="card">
                        <div class="card-body bg-light">
                            <img src="<?php echo base_url().$this->theme_folder.'/'.$this->theme; ?>/assets/images/icons/profile.png" alt="Profile" />
                            <h6 class="mt-1">PROFIL SAYA</h6>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-sm text-center">
                <a class="text-dark" href="<?php echo site_url('layanan_mandiri/surat'); ?>">
                    <div class="card">
                        <div class="card-body bg-light">
                            <img src="<?php echo base_url().$this->theme_folder.'/'.$this->theme; ?>/assets/images/icons/clipboard.png" alt="
                            0" />
                            <h6 class="mt-1">BUAT SURAT</h6>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-sm text-center">
                <a class="text-dark" href="<?php echo site_url('layanan_mandiri/surat_keluar'); ?>">
                    <div class="card">
                        <div class="card-body bg-light">
                            <img src="<?php echo base_url().$this->theme_folder.'/'.$this->theme; ?>/assets/images/icons/clipboard.png" alt="
                            0" />
                            <h6 class="mt-1">ARSIP SURAT</h6>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-sm text-center">
                <a class="text-dark" href="<?php echo site_url('layanan_mandiri/lapor'); ?>">
                    <div class="card">
                        <div class="card-body bg-light">
                            <img src="<?php echo base_url().$this->theme_folder.'/'.$this->theme; ?>/assets/images/icons/caution.png" alt="
                            0" />
                            <h6 class="mt-1">LAPOR</h6>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-sm text-center">
                <a class="text-dark" href="<?php echo site_url('layanan_mandiri/bantuan'); ?>">
                    <div class="card">
                        <div class="card-body bg-light">
                            <img src="<?php echo base_url().$this->theme_folder.'/'.$this->theme; ?>/assets/images/icons/frames.png" alt="
                            0" />
                            <h6 class="mt-1">BANTUAN</h6>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-sm text-center">
                <a class="text-light" href="<?php echo site_url('layanan_mandiri/logout'); ?>">
                    <div class="card">
                        <div class="card-body bg-danger">
                            <img src="<?php echo base_url().$this->theme_folder.'/'.$this->theme; ?>/assets/img/icons/door.png" alt="
                            0" /><br />
                            <h6 class="mt-1">KELUAR</h6>
                        </div>
                    </div>
                </a>
            </div>
			
        </div>

    </div>
</div>
    <!-- end content -->