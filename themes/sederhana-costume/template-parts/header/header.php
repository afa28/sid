<?php  if(!defined('BASEPATH')) exit('No direct script access allowed'); ?>

<div class="top-menu bg-dark">
    <div class="container">
        <nav class="navbar navbar-expand navbar-dark bg-dark">
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item"><a class="nav-link" href="#">About</a>
                    </li>
                    <li class="nav-item"><a class="nav-link" href="#">Layanan</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Contact</a></li>
                </ul>
            </div>
        </nav>
    </div>
</div>

<!-- header -->
<div class="main-header">
    <div class="container">
        <div class="row">
            <div class="logo col-sm-4 text-center">
                <a href="<?php echo site_url('home'); ?>">
                    <h1 class="text-uppercase bg-dark"><?php echo $this->setting->sebutan_desa.' '.$desa['nama_desa']; ?></h1>
                </a>
            </div>

            <div class="col-sm-8 contact text-center">
                <small><?php echo $desa['alamat_kantor'].', Kec. '.$desa['nama_kecamatan'].', Kab. '.$desa['nama_kabupaten'].' - '.$desa['nama_propinsi'].'. <br/> Kode Pos: '.$desa['kode_pos'].' | T: <a href="tel:'.$desa['telepon'].'">'.$desa['telepon'].'</a> | E: <a href="mailto:'.$desa['email_desa'].'">'.$desa['email_desa'].'</a>'; ?></small>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>

<?php 
$this->load->view($folder_themes.'/template-parts/menu/main-menu');

if($this->uri->segment(1) === "layanan_mandiri"){ 
    $this->load->view($folder_themes.'/layanan_mandiri/menu-layanan');
} 
?>