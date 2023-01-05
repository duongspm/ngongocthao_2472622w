<div class="banner">
    <?php if(!empty($bannerr)){?>
    <div class="owl-page owl-carousel owl-theme" data-xsm-items="1:0" data-sm-items="1:0" data-md-items="1:0"
        data-lg-items="1:0" data-xlg-items="1:0" data-rewind="1" data-autoplay="1" data-loop="0" data-lazyload="0"
        data-mousedrag="0" data-touchdrag="0" data-smartspeed="800" data-autoplayspeed="800" data-autoplaytimeout="5000"
        data-dots="0"
        data-animations="animate__rollIn, animate__backInRight,animate__backInLeft, animate__rotateInDownLeft, animate__backInDown, animate__zoomInDown, animate__fadeInUp, animate__zoomIn"
        data-nav="1"
        data-navtext="<svg xmlns='http://www.w3.org/2000/svg' class='icon icon-tabler icon-tabler-arrow-narrow-left' width='50' height='37' viewBox='0 0 24 24' stroke-width='1' stroke='#ffffff' fill='none' stroke-linecap='round' stroke-linejoin='round'><path stroke='none' d='M0 0h24v24H0z' fill='none'/><line x1='5' y1='12' x2='19' y2='12' /><line x1='5' y1='12' x2='9' y2='16' /><line x1='5' y1='12' x2='9' y2='8' /></svg>|<svg xmlns='http://www.w3.org/2000/svg' class='icon icon-tabler icon-tabler-arrow-narrow-right' width='50' height='37' viewBox='0 0 24 24' stroke-width='1' stroke='#ffffff' fill='none' stroke-linecap='round' stroke-linejoin='round'><path stroke='none' d='M0 0h24v24H0z' fill='none'/><line x1='5' y1='12' x2='19' y2='12' /><line x1='15' y1='16' x2='19' y2='12' /><line x1='15' y1='8' x2='19' y2='12' /></svg>"
        data-navcontainer=".control-slideshow">
        <?php foreach($bannerr as $v) { ?>
        <div class="banner-item" owl-item-animation>
            <a class="banner-image" href="<?=$v['link']?>" target="_blank" title="<?=$v['name'.$lang]?>">
                <?=$func->getImage(['class' => 'lazy w-100', 'sizes' => '1366x650x1', 'upload' => UPLOAD_PHOTO_L, 'image' => $v['photo'], 'alt' => $v['name'.$lang]])?>
            </a>
        </div>
        <?php } ?>
    </div>
    <?php }?>
</div>
<div class="albumd">
    <div class="wrapper">

        <div class="album__static">
            <?php if(!empty($album[0])){?>
            <div class="album__static--item">
                <a class="album-image effect10 scale-img" href="<?=$album[0][$sluglang]?>"
                    title="<?=$album[0]['name'.$lang]?>">
                    <?=$func->getImage(['class' => '', 'sizes' => '572x619x1', 'upload' => UPLOAD_PRODUCT_L, 'image' => $album[0]['photo'], 'alt' => $album[0]['name'.$lang]])?>
                </a>
            </div>
            <?php }?>
        </div>
        <div class="album__slide">
            <?php if(!empty($album)){?>
            <div class="owl-page owl-carousel owl-theme" data-xsm-items="1:0" data-sm-items="1:0" data-md-items="1:0"
                data-lg-items="1:0" data-xlg-items="1:0" data-rewind="1" data-autoplay="1" data-loop="0"
                data-lazyload="0" data-mousedrag="1" data-touchdrag="1" data-smartspeed="500" data-autoplayspeed="3500"
                data-dots="0" data-nav="0"
                data-navtext="<svg xmlns='http://www.w3.org/2000/svg' class='icon icon-tabler icon-tabler-arrow-narrow-left' width='50' height='37' viewBox='0 0 24 24' stroke-width='1' stroke='#ffffff' fill='none' stroke-linecap='round' stroke-linejoin='round'><path stroke='none' d='M0 0h24v24H0z' fill='none'/><line x1='5' y1='12' x2='19' y2='12' /><line x1='5' y1='12' x2='9' y2='16' /><line x1='5' y1='12' x2='9' y2='8' /></svg>|<svg xmlns='http://www.w3.org/2000/svg' class='icon icon-tabler icon-tabler-arrow-narrow-right' width='50' height='37' viewBox='0 0 24 24' stroke-width='1' stroke='#ffffff' fill='none' stroke-linecap='round' stroke-linejoin='round'><path stroke='none' d='M0 0h24v24H0z' fill='none'/><line x1='5' y1='12' x2='19' y2='12' /><line x1='15' y1='16' x2='19' y2='12' /><line x1='15' y1='8' x2='19' y2='12' /></svg>"
                data-navcontainer=".control-brand">
                <?php for ($i=1; $i < count($album); $i++) { 
                    if(!empty($album[$i])){
                ?>
                <div>
                    <a class="album-image effect10 scale-img text-decoration-none" href="<?=$album[$i][$sluglang]?>"
                        title="<?=$album[$i]['name'.$lang]?>">
                        <?=$func->getImage(['class' => '', 'sizes' => '942x477x1', 'upload' => UPLOAD_PRODUCT_L, 'image' => $album[$i]['photo'], 'alt' => $album[$i]['name'.$lang]])?>
                    </a>
                </div>
                <?php }} ?>
            </div>
            <?php }?>
        </div>
    </div>
</div>