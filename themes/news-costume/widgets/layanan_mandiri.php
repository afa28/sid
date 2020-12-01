<?php  if(!defined('BASEPATH')) exit('No direct script access allowed'); ?>

<!-- widget Layanan Mandiri -->
<div class="widget-layanan_mandiri">
    <?php
    if(!isset($_SESSION['mandiri']) OR $_SESSION['mandiri']<>1){

      if($_SESSION['mandiri_wait']==1){ ?>
        Silakan datang atau hubungi operator <?php echo $this->setting->sebutan_desa?> untuk mendapatkan kode PIN anda.
        <p>
            Gagal 3 kali, silakan coba kembali dalam
            <?php echo waktu_ind((time()- $_SESSION['mandiri_timeout'])*(-1));?> detik lagi
        </p>

        <div id="note">
            Login Gagal. Username atau Password yang anda masukkan salah!
        </div>
    <?php }else{ ?>

        <p class="alert alert-info">
            Silakan datang atau hubungi operator <?php echo $this->setting->sebutan_desa?> untuk mendapatkan kode PIN
            anda.
        </p>

        <form action="<?php echo site_url('layanan_mandiri/auth')?>" method="post">
            <div class="form-group">
                <input name="nik" type="text" placeholder="NIK" class="form-control" required>
            </div>

            <div class="form-group">
                <input name="pin" type="password" placeholder="PIN" class="form-control" required>
            </div>

            <div class="form-group">
                <button type="submit" id="but" class="btn btn-success btn-block">MASUK</button>
            </div>

            <?php  if($_SESSION['mandiri_try'] AND isset($_SESSION['mandiri']) AND $_SESSION['mandiri']==-1){ ?>
                <div id="note" class="alert alert-warning">
                    Kesempatan mencoba <?php echo ($_SESSION['mandiri_try']-1); ?> kali lagi.
                </div>
            <?php }?>

            <?php  if(isset($_SESSION['mandiri']) AND $_SESSION['mandiri']==-1){ ?>
                <div id="note" class="alert alert-danger">
                    Login Gagal. Username atau Password yang Anda masukkan salah!
                </div>
            <?php }?>
        </form>
    <?php }
}else{ ?>

    <table id="mandiri" cellpadding="5" class="table table-striped">
        <tr>
            <td width="25%">Nama</td>
            <td width="2%" class="titik">:</td>
            <td width="73%"><?php echo $_SESSION['nama'];?></td>
        </tr>
        <tr>
            <td>NIK</td>
            <td>:</td>
            <td><?php echo $_SESSION['nik'];?></td>
        </tr>
        <tr>
            <td>No KK</td>
            <td>:</td>
            <td><?php echo $_SESSION['no_kk']?></td>
        </tr>
    </table><br />

    <table id="mandiri" cellpadding="2" cellspacing="0" width="100%">
        <tr>
            <td>
                <a href="<?php echo site_url('layanan_mandiri/profil');?>" class="btn btn-primary btn-block">PROFIL</a>
            </td>
        </tr>
        <tr>
            <td>
                <a href="<?php echo site_url('layanan_mandiri/surat');?>" class="btn btn-primary btn-block">LAYANAN</a>
            </td>
        </tr>
        <tr>
            <td>
                <a href="<?php echo site_url('layanan_mandiri/lapor');?>" class="btn btn-primary btn-block">LAPOR</a>
            </td>
        </tr>
        <tr>
            <td>
                <a href="<?php echo site_url('layanan_mandiri/bantuan');?>" class="btn btn-primary btn-block">BANTUAN</a>
            </td>
        </tr>
        <tr>
            <td>
                <a href="<?php echo site_url('layanan_mandiri/logout');?>" class="btn btn-danger btn-block">KELUAR</a>
            </td>
        </tr>
    </table>

    <?php if(isset($_SESSION['lg']) AND $_SESSION['lg']==1){ ?>
        Untuk keamanan silahkan ubah kode PIN Anda.

        <h4>Masukkan PIN Baru</h4>
        <form action="<?php echo site_url('layanan_mandiri/ganti')?>" method="post">
            <input name="pin1" type="password" placeholder="PIN" value="" style="margin-left:0px">
            <input name="pin2" type="password" placeholder="Ulangi PIN" value="" style="margin-left:0px">
            <button type="submit" id="but" style="margin-left:0px">Ganti</button>
        </form>
        <?php if ($flash_message) { ?>
            <div id="notification" class='box-header label-danger'><?php echo $flash_message ?></div>
            <script type="text/javascript">
                $('document').ready(function() {
                    $('#notification').delay(4000).fadeOut();
                });
            </script>
        <?php } ?>

        <div id="note">
            Silahkan coba login kembali setelah PIN baru disimpan.
        </div>
    <?php }else if(isset($_SESSION['lg']) AND $_SESSION['lg']==2){?>


        <h4><i class="fa fa-user"></i> Layanan Mandiri</h4><br />
        Untuk keamanan silahkan ubah kode PIN Anda.

        <div id="note">
            PIN Baru berhasil Disimpan!
        </div>

        <?php
        unset($_SESSION['lg']);
    }
}
?>
</div>