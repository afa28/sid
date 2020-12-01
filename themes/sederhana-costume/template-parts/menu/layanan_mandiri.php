<div class="menu-layanan">
    <div class="container">
        <?php if(!isset($_SESSION['mandiri']) OR $_SESSION['mandiri']<>1){ ?>
            <div class="card body-layanan-mandiri">
                <div class="row">
                    <div class="col-sm-6 text-center">
                        <div class="heading-mandiri"><i class="fa fa-user"></i> LAYANAN MANDIRI</div>
                        <div class="sub-heading-mandiri">Silakan datang atau hubungi operator <?php echo $this->setting->sebutan_desa?> untuk mendapatkan kode PIN anda.</div>
                    </div>

                    <div class="col-sm-6 mandiri-section">

                        <form action="<?php echo site_url('layanan_mandiri/login')?>" method="post" class="form-horizontal">
                            <?php  if($_SESSION['mandiri_try'] AND isset($_SESSION['mandiri']) AND $_SESSION['mandiri']==-1){ ?>
                                <p style="margin-bottom:2px;padding: 2.5px;background: tomato;color: #eee;text-align: center;">
                                    Kesempatan mencoba <?php echo ($_SESSION['mandiri_try']-1); ?> kali lagi.
                                </p>
                            <?php }?>
                            <?php  if(isset($_SESSION['mandiri']) AND $_SESSION['mandiri']==-1){ ?>
                                <p style="padding: 2.5px;background: tomato;color: #eee;text-align: center;">
                                    Login Gagal. Username atau Password yang Anda masukkan salah!
                                </p>
                            <?php }?>

                            <div class="form-group">
                                <div class="col-sm-6">
                                    <input name="nik" type="text" placeholder="Masukkan NIK" class="form-control input-sm mandiri-login-form" required autocomplete="off">
                                </div>

                                <div class="col-sm-6">
                                    <input name="pin" type="password" placeholder="Masukkan PIN" class="form-control input-sm mandiri-login-form" autocomplete="off" required >
                                </div>
                            </div>
                            <button type="submit" id="but" class="btn btn-sm btn-info btn-mandiri">MASUK LAYANAN MANDIRI</button>
							<a href="<?php echo site_url('layanan_mandiri/masuk/reset') ?>" class="btn btn-sm btn-danger btn-mandiri">RESET PIN</a>
							
                        </form>
                    </div>
                </div>
            </div>
        <?php }else{ ?>
            <div class="row">
                <div class="col-sm-2 col-xs-4 text-center">
                    <a class="text-primary" href="<?php echo site_url('layanan_mandiri/profil'); ?>">
                        <div class="card-bg bg-biru">
                            <div class="card-body bg-light">
                                <img src="<?php echo base_url().$this->theme_folder.'/'.$this->theme; ?>/assets/images/icons/biodata.png" alt="Profile" />
                                <div class="card-title">PROFIL SAYA</div>
                               </div>
                           </div>
                       </a>
                   </div>

                   <div class="col-sm-2 col-xs-4 text-center">
                    <a class="text-primary" href="<?php echo site_url('layanan_mandiri/surat'); ?>">
                        <div class="card-bg bg-hijau">
                            <div class="card-body bg-light">
                                <img src="<?php echo base_url().$this->theme_folder.'/'.$this->theme; ?>/assets/images/icons/surat.png" alt="
                                0" />
                                <div class="card-title">BUAT SURAT</div>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-sm-2 col-xs-4 text-center">
                    <a class="text-primary" href="<?php echo site_url('layanan_mandiri/surat/arsip'); ?>">
                        <div class="card-bg bg-cyan">
                            <div class="card-body bg-light">
                                <img src="<?php echo base_url().$this->theme_folder.'/'.$this->theme; ?>/assets/images/icons/arsip.png" alt="
                                0" />
                                <div class="card-title">ARSIP SURAT</div>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-sm-2 col-xs-4 text-center">
                    <a class="text-danger" href="<?php echo site_url('layanan_mandiri/artikel'); ?>">
                        <div class="card-bg bg-success">
                            <div class="card-body">
                                <img src="<?php echo base_url().$this->theme_folder.'/'.$this->theme; ?>/assets/images/icons/surat.png" alt="
                                0" /><br />
                                <div class="card-title">KIRIM ARTIKEL</div>
                            </div>
                        </div>
                    </a>
                </div>                

                <div class="col-sm-2 col-xs-4 text-center">
                    <a class="text-primary" href="<?php echo site_url('layanan_mandiri/laporan'); ?>">
                        <div class="card-bg bg-orange">
                            <div class="card-body bg-light">
                                <img src="<?php echo base_url().$this->theme_folder.'/'.$this->theme; ?>/assets/images/icons/lapor.png" alt="
                                0" />
                                <div class="card-title">LAPORAN</div>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-sm-2 col-xs-4 text-center">
                    <a class="text-primary" href="<?php echo site_url('layanan_mandiri/bantuan'); ?>">
                        <div class="card-bg bg-yellow">
                            <div class="card-body bg-light">
                                <img src="<?php echo base_url().$this->theme_folder.'/'.$this->theme; ?>/assets/images/icons/bantuan.png" alt="
                                0" />
                                <div class="card-title">BANTUAN</div>
                            </div>
                        </div>
                    </a>
                </div>                
            </div>
			<div class="section-alert text-center">
				<strong><i class="fa fa-exclamation-triangle"></i> CATATAN :</strong> Setelah membuat membuat surat harap masuk ke menu ARSIP SURAT untuk mendownload lampiran surat apabila telah melakukan pembuatan surat yang menghasilkan formulir.
			</div>
        <?php } ?>

    </div>
            </div> <!-- end menu layanan -->