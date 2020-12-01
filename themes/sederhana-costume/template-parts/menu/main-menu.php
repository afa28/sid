<?php  if(!defined('BASEPATH')) exit('No direct script access allowed'); ?>


<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
  <div class="container">
    <div class="navbar-header">
	    <a class="navbar-brand" href="<?php echo base_url(); ?>">
	      	<img src="<?php echo base_url().'desa/logo/'.$desa['logo']; ?>" alt="Logo Desa" width="30">
			<span class="logo-title">
				<?php echo ucwords($desa['nama_desa'])?>
			</span>
		</a>
		<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".main-menu">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
    </div>
    <div id="navbar" class="navbar-collapse collapse main-menu">
	    <ul class="nav navbar-nav navbar-right">
	       <li class="nav-link"><a href="<?php echo site_url();?>">Beranda</a></li>
	       <?php foreach($menu_atas as $data) { ?>
	       <li class="<?php echo count($data['submenu']) > 0 ? 'dropdown' : '' ?>">
                <a <?php echo count($data['submenu']) > 0 ? 'data-toggle="dropdown"' : ''; ?> class="nav-link <?php echo count($data['submenu']) > 0 ? 'dropdown-toggle' : ''; ?>" href="<?php echo count($data['submenu']) > 0 ? '#' : $data['link']; ?>">
                        <?php echo $data['nama'] ?>  <?php if(count($data['submenu']) > 0){ ?><b class="caret"></b><?php } ?>
                </a>
                <?php if(count($data['submenu'])>0) { ?>
                    <ul class="dropdown-menu">
                    <?php foreach($data['submenu'] as $submenu) { ?>
                        <li><a href="<?php echo $submenu['link']; ?>"><?php echo $submenu['nama']; ?></a></li>
                    <?php } ?>
                    </ul>
                <?php } ?>
            </li>
            <?php } ?>
        </ul>
	</div>
  </div>
</nav>