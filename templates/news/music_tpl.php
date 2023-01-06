<div class="title-main"><span><?=(!empty($titleCate)) ? $titleCate : @$titleMain?></span></div>
<div class="content-main row">
    <?php if(!empty($music)) {?>
    <div class="music__list">
        <?php foreach($music as $k => $v) { ?>
        <div class="music__item animate__animated animate__fadeInDown">
            <a class="text-decoration-none" target="_blank" href="<?=$v['link']?>" title="<?=$v['name'.$lang]?>">
                <span class="music__name">
                    <?=$v['name'.$lang]?>
                </span>
                <div class="music__img scale-img effect10">
                    <?=$func->getImage(['class' => 'lazy w-100', 'sizes' => '300x300x1', 'upload' => UPLOAD_PHOTO_L, 'image' => $v['photo'], 'alt' => $v['name'.$lang]])?>
                </div>
            </a>
        </div>
        <?php }?>
    </div>
    <?php } else { ?>
    <div class="col-12">
        <div class="alert alert-warning w-100" role="alert">
            <strong><?=khongtimthayketqua?></strong>
        </div>
    </div>
    <?php } ?>
    <div class="clear"></div>
    <div class="col-12">
        <div class="pagination-home w-100"><?=(!empty($paging)) ? $paging : ''?></div>
    </div>
</div>