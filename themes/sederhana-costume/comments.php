<?php  if(!defined('BASEPATH')) exit('No direct script access allowed'); ?>

<div class="comments-box">
    <div id="comments" class="mt-4">
        <div class="section-heading-comments">
            Komentar
        </div>

        <?php if($content['boleh_komentar']): ?>
    	<div class="alert-section">
            <div class="alert alert-info">
                <div class="comments-alert">
                    Silakan tulis komentar dalam formulir berikut ini (Gunakan bahasa yang santun). Komentar akan ditampilkan setelah disetujui oleh Admin
                </div>
            </div>
    	</div>

            <?php if($this->session->flashdata('flash_message')){ ?>
                <?php echo $this->session->flashdata('flash_message'); ?>
            <?php } ?>

            <!-- Comments Form -->
            <form action="<?php echo site_url('berita/tambah_komentar/'.$content['id_kategori'].'/'.$content['id']); ?>"
                method="POST" onSubmit="return validasi(this);">
                <table width="100%">
                    <div class="row">
                    <div class="form-group col-sm-4">
                        <input type="text" class="form-control" name="owner" maxlength="30"
                        value="<?= !empty($_SESSION['post']['owner']) ? $_SESSION['post']['owner'] : $_SESSION['nama'] ?>"
                        required="" placeholder="Nama Lengkap" <?= !empty($_SESSION['post']['owner']) || !empty($_SESSION['nama']) ? 'readonly' : '' ?>>
                    </div>

                    <div class="form-group col-sm-4">
                        <input type="text" class="form-control" name="no_hp" maxlength="30"
                        value="<?= $_SESSION['post']['no_hp'] ?>" placeholder="Nomor Handphone">
                    </div>

                    <div class="form-group col-sm-4">
                        <input type="email" class="form-control" name="email" maxlength="30"
                        value="<?= $_SESSION['post']['email'] ?>" placeholder="Alamat Email" required="">
                    </div>

                    <div class="form-group col-md-12">
                        <textarea rows="4" name="komentar" class="form-control textarea" placeholder="Tulis komentar disini"
                        required=""><?php echo $_SESSION['post']['komentar']?></textarea>
                    </div>

                    <div class="form-group col-md-6 col-xs-7">
                        <img id="captcha" src="<?= base_url().'securimage/securimage_show.php'?>" alt="CAPTCHA Image" style="max-width: 200px; max-height: 80px; border: 1px solid #ccc; border-radius: 3px;"/>
                        <a href="#"
                        onclick="document.getElementById('captcha').src = '<?= base_url()."securimage/securimage_show.php?"?>' + Math.random(); return false"><i class="fa fa-refresh fa-lg" style="padding: 10px; color: #0b7d33"></i></a>
                    </div>

                    <div class="form-group captcha_code col-md-3 col-xs-5">
                        <input autocomplete="off" type="text" class="form-control" name="captcha_code" maxlength="6"
                        value="<?= $_SESSION['post']['captcha_code']?>" placeholder="Tulis kode yg ada digambar"
                        required=""/>
                    </div>

                    <div class="form-group text-right col-md-3">
                        <button type="submit" class="btn btn-success comment-button">Kirim Komentar</button>
                    </div>
                </div>
            </table>
        </form>
        <?php else: ?>
            <div class="alert alert-danger text-center">
                Komentar untuk artikel ini telah ditutup
            </div>
        <?php endif; ?>

        <?php if(is_array($komentar) && count($komentar) > 0){ ?>
            <!-- Single Comment -->
            <div class="header-comment">Daftar Komentar</div>
            <ul class="komen-list">
                <?php foreach($komentar AS $data){ ?>
                    <?php if($data['enabled']==1){ ?>
                        <li>
                            <div class="komen-image">
                                <img class="img-responsive img-circle" src="<?php echo base_url().$this->theme_folder.'/'.$this->theme; ?>/assets/images/icons/profile.png" alt="<?php echo $data['owner']; ?>">
                            </div>

                            <div class="komen-layout">
    							<div class="comment-owner"><?php echo $data['owner']?> - <span class="komen-date"><?php echo tgl_indo2($data['tgl_upload']); ?></span></div>
                                <div class="isi-komentar"><?php echo $data['komentar']; ?></div> 
                                
                            </div>
                        </li>
                    <?php } ?>
                <?php } ?>
            </ul>
        <?php } ?>
    </div>
</div>