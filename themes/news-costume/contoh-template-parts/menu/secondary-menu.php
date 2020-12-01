<?php  if(!defined('BASEPATH')) exit('No direct script access allowed'); ?>



<link rel="stylesheet" type="text/css" href="<?php echo base_url().$this->theme_folder.'/'.$this->theme.'/assets/css/style.css'?>" />

<link rel="stylesheet" type="text/css" href="<?php echo base_url().$this->theme_folder.'/'.$this->theme.'/assets/vendor/bootstrap/css/bootstrap.css'?>" />

<script type="text/javascript" src="<?php echo base_url().$this->theme_folder.'/'.$this->theme.'/assets/vendor/jquery/jquery.js'?>"></script>

<script type="text/javascript" src="<?php echo base_url().$this->theme_folder.'/'.$this->theme.'/assets/vendor/bootstrap/js/bootstrap.js'?>"></script>





<script>

	jQuery(function($) {

		$('ul.nav li.dropdown').hover(function() {

          if (!$('.navbar-toggle').is(':visible')) {

              $(this).toggleClass('open', true);

          }

      }, function() {

          if (!$('.navbar-toggle').is(':visible')) {

              $(this).toggleClass('open', false);

          }

      });

		$('ul.nav li.dropdown a').click(function(){

          if (!$('.navbar-toggle').is(':visible') && $(this).attr('href') != '#') {

              $(this).toggleClass('open', false);

              window.location = $(this).attr('href')

          } else if ($(this).parent().hasClass('open') && $(this).attr('href') != '#') {

              window.location = $(this).attr('href')

          }

      });

	});

</script>



<!-- Navigation -->

<nav class="navbar navbar-expand-lg navbar-dark bg-green">

    <div class="container">

        <!-- <a class="navbar-brand" href="index.html">OpenSID</a> -->



        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span>

        </button>



        <div class="collapse navbar-collapse" id="navbarResponsive">

            <ul class="navbar-nav">

                <?php foreach($menu_kiri as $data){?>

                    <li class="nav-item active dropdown menu">

                        <a <?php echo count($data['submenu']) > 0 ? 'data-toggle="dropdown"' : ''; ?> class="nav-link <?php echo count($data['submenu']) > 0 ? 'dropdown-toggle' : ''; ?>" href="<?php echo count($data['submenu']) > 0 ? '#' : $data['link']; ?>">

                            <?php echo $data['nama'] ?></a>

                            <?php if(count($data['submenu'])>0) { ?>

                                <ul class="dropdown-menu dropdown-menu-right">

                                    <?php foreach($data['submenu'] as $submenu) { ?>

                                        <a class="dropdown-item" href="<?php echo $submenu['link']; ?>"><?php echo $submenu['nama']; ?></a>

                                    <?php } ?>

                                </ul>

                            <?php } ?>

                        </li>

                    <?php } ?> 

                </ul>

            </div>

        </div>

    </nav>