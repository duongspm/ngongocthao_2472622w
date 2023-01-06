<div class="title-main"><span><?=(!empty($titleCate)) ? $titleCate : @$titleMain?></span></div>
<div class="content-main row">
    <?php if(!empty($news)) {?>
    <div class="news__list">
        <?php foreach($news as $k => $v) { ?>
        <div class="news__item animate__animated animate__fadeInDown">
            <a href="<?=$v[$sluglang]?>" title="<?=$v['name'.$lang]?>">
                <span class="news__name"><?=$v['name'.$lang]?></span>
                <div class="news__img">
                    <?=$func->getImage(['class' => 'lazy w-100', 'sizes' => '550x350x1', 'upload' => UPLOAD_NEWS_L, 'image' => $v['photo'], 'alt' => $v['name'.$lang]])?>
                </div>
            </a>
        </div>
        <?php } ?>
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