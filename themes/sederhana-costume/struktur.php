<style>
.MultiCarousel { 
	float: left; 
	overflow: hidden; 
	padding: 15px; 
	width: 100%; 
	position:relative; 
}
.MultiCarousel .MultiCarousel-inner { 
	transition: 1s ease all; 
	float: left; 
}
.MultiCarousel .MultiCarousel-inner .item { 
	float: left;
}
.MultiCarousel .MultiCarousel-inner .item .block-aparatur { 
	text-align: center;
    box-shadow: 0px 1px 5px #0000004f;
    border-radius: 10px;
    margin: 0 21px;
}
.MultiCarousel .MultiCarousel-inner .item .block-aparatur .data-team .nama-team { 
	color: #007bb5;
	font-size: 11px;
}
.MultiCarousel .leftLst, .MultiCarousel .rightLst { 
	position:absolute; 
	width: 50px;
    height: 50px;
    background: #e87008;
    margin: auto 0;
    opacity: unset;
	top:calc(50% - 20px);
	border-radius: 0;
	border: unset;
	font-size: 30px;
}
.MultiCarousel .leftLst { 
	left:0; 
}
.MultiCarousel .rightLst { 
	right:0; 
}
.MultiCarousel .leftLst.over, .MultiCarousel .rightLst.over { 
	pointer-events: none;
}
</style>
<div class="section-full content-inner bg-white">
	<div class="container">
		<div class="section-head text-center ">
			<h2 class="title"><a href="<?= base_url(); ?>pemerintah">Perangkat <?php echo $this->setting->sebutan_desa?></a></h2>
			<div class="dlab-separator-outer ">
				<div class="dlab-separator bg-primary style-skew"></div>
			</div>
			<p>Meningkatkan Ilmu Pengetahuan, Keterampilan, Kedisiplinan dan Etos Kerja Pemerintah <?php echo $this->setting->sebutan_desa?></p>
		</div>
		<div class="row">
			<div class="MultiCarousel" data-items="1,3,5,5" data-slide="1" id="MultiCarousel">
			<div class="MultiCarousel-inner">
				<?php
					$this->load->model('pamong_model');
						$pamong_desa = $this->pamong_model->list_data();?>	
						<?php foreach ($pamong_desa as $data): ?>
				<div class="item">
					
					<div class="block-aparatur">
						<?php if ($data['foto']): ?>
							<img src="<?=AmbilFoto($data['foto'], "besar")?>" alt="User Image" class="center img-responsive" style="max-height: 220px; min-height: 220px; border-top-left-radius: 10px; border-top-right-radius: 10px"/>
						<?php else: ?>
							<img src="<?= base_url()?>assets/files/user_pict/kuser.png" alt="User Image" class="center img-responsive" style="max-height: 220px; min-height: 220px; border-top-left-radius: 10px; border-top-right-radius: 10px"/>
						<?php endif ?>
						<div class="data-team">
							<div class="nama-team"><?= $data['nama']?></div>
							<div class="detail-team">
								<?php if (!empty($data['pamong_nip']) and $data['pamong_nip'] != '-'): ?>
									NIP : <?= $data['pamong_nip']?></br>
								<?php else: ?>
									NIAP : <?= $data['pamong_niap']?></br>
								<?php endif; ?>
								<?= $data['jabatan']?>
							</div>							
						</div>
					</div>
				</div>
				<?php endforeach; ?>
			</div>
			<button class="btn btn-danger leftLst"><i class="fa fa-angle-left"></i></button>
            <button class="btn btn-danger rightLst"><i class="fa fa-angle-right"></i></button>
			</div>
		</div>
	</div>
</div>

<script>$(document).ready(function () {
    var itemsMainDiv = ('.MultiCarousel');
    var itemsDiv = ('.MultiCarousel-inner');
    var itemWidth = "";
    var autoPlay= 3000;

    $('.leftLst, .rightLst').click(function () {
        var condition = $(this).hasClass("leftLst");
        if (condition)
            click(0, this);
        else
            click(1, this)
    });

    ResCarouselSize();

    $(window).resize(function () {
        ResCarouselSize();
    });

    //this function define the size of the items
    function ResCarouselSize() {
        var incno = 0;
        var dataItems = ("data-items");
        var itemClass = ('.item');
        var id = 0;
        var btnParentSb = '';
        var itemsSplit = '';
        var sampwidth = $(itemsMainDiv).width();
        var bodyWidth = $('body').width();
        $(itemsDiv).each(function () {
            id = id + 1;
            var itemNumbers = $(this).find(itemClass).length;
            btnParentSb = $(this).parent().attr(dataItems);
            itemsSplit = btnParentSb.split(',');
            $(this).parent().attr("id", "MultiCarousel" + id);


            if (bodyWidth >= 1200) {
                incno = itemsSplit[3];
                itemWidth = sampwidth / incno;
            }
            else if (bodyWidth >= 992) {
                incno = itemsSplit[2];
                itemWidth = sampwidth / incno;
            }
            else if (bodyWidth >= 768) {
                incno = itemsSplit[1];
                itemWidth = sampwidth / incno;
            }
            else {
                incno = itemsSplit[0];
                itemWidth = sampwidth / incno;
            }
            $(this).css({ 'transform': 'translateX(0px)', 'width': itemWidth * itemNumbers });
            $(this).find(itemClass).each(function () {
                $(this).outerWidth(itemWidth);
            });

            $(".leftLst").addClass("over");
            $(".rightLst").removeClass("over");

        });
    }


    //this function used to move the items
    function ResCarousel(e, el, s) {
        var leftBtn = ('.leftLst');
        var rightBtn = ('.rightLst');
        var translateXval = '';
        var divStyle = $(el + ' ' + itemsDiv).css('transform');
        var values = divStyle.match(/-?[\d\.]+/g);
        var xds = Math.abs(values[4]);
        if (e == 0) {
            translateXval = parseInt(xds) - parseInt(itemWidth * s);
            $(el + ' ' + rightBtn).removeClass("over");

            if (translateXval <= itemWidth / 2) {
                translateXval = 0;
                $(el + ' ' + leftBtn).addClass("over");
            }
        }
        else if (e == 1) {
            var itemsCondition = $(el).find(itemsDiv).width() - $(el).width();
            translateXval = parseInt(xds) + parseInt(itemWidth * s);
            $(el + ' ' + leftBtn).removeClass("over");

            if (translateXval >= itemsCondition - itemWidth / 2) {
                translateXval = itemsCondition;
                $(el + ' ' + rightBtn).addClass("over");
            }
        }
        $(el + ' ' + itemsDiv).css('transform', 'translateX(' + -translateXval + 'px)');
    }

    //It is used to get some elements from btn
    function click(ell, ee) {
        var Parent = "#" + $(ee).parent().attr("id");
        var slide = $(Parent).attr("data-slide");
        ResCarousel(ell, Parent, slide);
    }

});</script>