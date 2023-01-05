<?php
    /* Thư viện ảnh */
    //Khong có thì tắt đi
    $nametype = "album";
    $config['product'][$nametype]['title_main'] = "Album";
    $config['product'][$nametype]['check'] = array("hienthi" => "Hiển thị");
    $config['product'][$nametype]['view'] = true;
    $config['product'][$nametype]['copy'] = true;
    $config['product'][$nametype]['slug'] = true;
    $config['product'][$nametype]['images'] = true;
    $config['product'][$nametype]['copy_images'] = true;

    $config['product'][$nametype]['show_images'] = true;
    $config['product'][$nametype]['gallery'] = array(
        $nametype => array(
            "title_main_photo" => "Hình ảnh thư viện ảnh",
            "title_sub_photo" => "Hình ảnh",
            "check_photo" => array("hienthi" => "Hiển thị"),
            "number_photo" => 2,
            "images_photo" => true,
            "avatar_photo" => true,
            "name_photo" => true,
            "width_photo" => 942,
            "height_photo" => 477,
            "thumb_photo" => '942x477x1',
            "img_type_photo" => '.jpg|.gif|.png|.jpeg|.gif'
        )
    );
    $config['product'][$nametype]['seo'] = true;
    $config['product'][$nametype]['width'] = 942;
    $config['product'][$nametype]['height'] = 477;
    $config['product'][$nametype]['thumb'] = '942x477x1';
    $config['product'][$nametype]['img_type'] = '.jpg|.gif|.png|.jpeg|.gif';

?>