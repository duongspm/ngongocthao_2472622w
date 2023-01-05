<div class="footer">
    <div class="wrapper">
        <div class="footerr">
            <div class="footer-name">
                <span>
                    <?php
                        $name=$setting['name'.$lang];
                        $name1 = substr($name, 0, -3);  // returns "abcde"
                        $name2 = substr($name,2);  // returns "cde"
                    ?>
                    <?=$name1?>
                    <span>
                        <?=$name2?>
                    </span>
                </span>
            </div>
        </div>
    </div>
    <div class="copyright">
        <div class="wrapper copyrightt">
            <div class="copyright-top">
                <span>Địa chỉ:
                    <?=$optsetting['address']?>
                </span>
                <span>- Hotline:
                    <a class="text-decoration-none" href="tel:<?=$func->formatPhone($optsetting['phone'])?>">
                        <?=$func->formatPhone($optsetting['phone'])?>
                    </a>
                </span>
                <span>- Email:
                    <?=$optsetting['email']?>
                </span>
            </div>
            <div class="copyright-bottom">
                <span>© <?=date("Y",time())?>
                    <?=$setting['name'.$lang]?>
                    Web design : Nina Co., Ltd</span>
            </div>
        </div>
    </div>
</div>

<?= $addons->set('messages-facebook', 'messages-facebook', 2); ?>

<a class="btn-zalo btn-frame text-decoration-none" target="_blank"
    href="https://zalo.me/<?= preg_replace('/[^0-9]/', '', $optsetting['zalo']); ?>">
    <div class="animated infinite zoomIn kenit-alo-circle"></div>
    <div class="animated infinite pulse kenit-alo-circle-fill"></div>
    <i><?= $func->getImage(['size-error' => '35x35x2', 'upload' => 'assets/images/', 'image' => 'zl.png', 'alt' => 'Zalo']) ?></i>
</a>
<a class="btn-phone btn-frame text-decoration-none"
    href="tel:<?= preg_replace('/[^0-9]/', '', $optsetting['hotline']); ?>">
    <div class="animated infinite zoomIn kenit-alo-circle"></div>
    <div class="animated infinite pulse kenit-alo-circle-fill"></div>
    <i><?= $func->getImage(['size-error' => '35x35x2', 'upload' => 'assets/images/', 'image' => 'hl.png', 'alt' => 'Hotline']) ?></i>
</a>