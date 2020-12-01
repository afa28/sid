<?php  if(!defined('BASEPATH')) exit('No direct script access allowed'); ?>

<?php $this->load->view($folder_themes.'/header');?>

<div class="section-post bg-gray">
<div class="container">
    <div class="row">
        <!-- page content -->
        <div class="col-md-8">
            <?php $this->load->view($folder_themes.'/breadcrumb');?>
            <div class="page-content">
                <?php if (isset($page_content)) {
                    echo $page_content;
                } else { 
                    $this->load->view($folder_themes.'/template-parts/content-page'); 
                } ?>
            </div>
        </div>
        <!-- end content -->

        <!-- Sidebar -->
        <div class="col-md-4">

            <?php $this->load->view($folder_themes.'/sidebar');?>

        </div>
    </div>
    <!-- /.row -->
</div>
<!-- end content -->
</div>

<?php $this->load->view($folder_themes.'/footer');?>