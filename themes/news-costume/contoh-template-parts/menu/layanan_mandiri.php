<div class="container-default menu-layanan">
    <div class="container full-content">
        <?php if(!isset($_SESSION['mandiri']) OR $_SESSION['mandiri']<>1){ ?>
            <div class="card">
                <div class="row">
                    <div class="col-sm-6 text-center">
                        <div class=" heading-mandiri"><i class="fa fa-user"></i> LAYANAN MANDIRI</div>
                        <div class="sub-heading">Silakan datang atau hubungi operator <?php echo $this->setting->sebutan_desa?> untuk mendapatkan kode PIN anda.</div>
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
                                    <input name="nik" type="text" placeholder="Masukkan NIK" class="form-control input-sm mandiri-login-form" required>
                                </div>

                                <div class="col-sm-6">
                                    <input name="pin" type="password" placeholder="Masukkan PIN" class="form-control input-sm mandiri-login-form" required>
                                </div>
                            </div>


                            <button type="submit" id="but" class="btn btn-sm btn-primary btn-mandiri">MASUK LAYANAN MANDIRI</button>
                        </form>
                    </div>
                </div>
            </div>
        <?php }else{ ?>
			<div class="menu-penduduk">
            <div class="row">
				
                <div class="col-sm-2 col-xs-4 text-center">
                    <a class="text-primary" href="<?php echo site_url('layanan_mandiri/profil'); ?>">
                        <div class="card-bg bg-biru">
                            <div class="card-body bg-light">
                                <i class="fa fa-user fa-3x text-white"></i>
                                <div class="hidden-xs card-title">PROFIL SAYA</div>
                               </div>
                           </div>
                       </a>
                   </div>

                   <div class="col-sm-2 col-xs-4 text-center">
                    <a class="text-primary" href="<?php echo site_url('layanan_mandiri/surat'); ?>">
                        <div class="card-bg bg-hijau">
                            <div class="card-body bg-light">
                                <i class="fa fa-file-text fa-3x text-white"></i>
                                <div class="hidden-xs card-title">BUAT SURAT</div>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-sm-2 col-xs-4 text-center">
                    <a class="text-primary" href="<?php echo site_url('layanan_mandiri/surat/arsip'); ?>">
                        <div class="card-bg bg-cyan">
                            <div class="card-body bg-light">
                                <i class="fa fa-archive fa-3x text-white"></i>
                                <div class="hidden-xs card-title">ARSIP SURAT</div>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-sm-2 col-xs-4 text-center">
                    <a class="text-primary" href="<?php echo site_url('layanan_mandiri/lapor'); ?>">
                        <div class="card-bg bg-orange">
                            <div class="card-body bg-light">
                                <i class="fa fa-bullhorn fa-3x text-white"></i>
                                <div class="hidden-xs card-title">LAPOR</div>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-sm-2 col-xs-4 text-center">
                    <a class="text-primary" href="<?php echo site_url('layanan_mandiri/bantuan'); ?>">
                        <div class="card-bg bg-yellow">
                            <div class="card-body bg-light">
                                <i class="fa fa-handshake-o fa-3x text-white"></i>
                                <div class="hidden-xs card-title">BANTUAN</div>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-sm-2 col-xs-4 text-center">
                    <a class="text-danger" href="<?php echo site_url('layanan_mandiri/logout'); ?>">
                        <div class="card-bg bg-merah">
                            <div class="card-body">
                                <i class="fa fa-sign-out fa-3x text-white"></i>
                                <div class="hidden-xs card-title">KELUAR</div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
			</div>
			<div class="section-alert text-center">
				<strong><i class="fa fa-exclamation-triangle"></i> CATATAN :</strong> Setelah membuat membuat surat harap masuk ke menu ARSIP SURAT untuk mendownload lampiran surat apabila telah melakukan pembuatan surat yang menghasilkan formulir.
			</div>
        <?php } ?>

    </div>
            </div> <!-- end menu layanan -->