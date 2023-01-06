<div class="menu-res">
    <div class="menu-bar-res">
        <a id="hamburger" href="#menu" title="Menu"><span></span></a>
        <div class="logo-mmenu">
            <a href="" title="Home">
                <?=$func->getImage(['sizes' => '160x40x1', 'upload' => UPLOAD_PHOTO_L, 'image' => $logo['photo'], 'alt' => $setting['name'.$lang]])?>
            </a>
        </div>
    </div>
    <nav id="menu">
        <ul>
            <li><a class="<?php if($com=='' || $com=='index') echo 'active'; ?> transition" href=""
                    title="Home">Home</a></li>
            <li><a class="<?php if($com=='about') echo 'active'; ?> transition" href="about" title="About">About</a>
            </li>
            <li>
                <a class="<?php if($com=='event-gallery') echo 'active'; ?> transition menu-line" href="event-gallery"
                    title="Event & Gallery">Event & Gallery</a>
            </li>
            <li><a class="<?php if($com=='music') echo 'active'; ?> transition menu-line" href="music"
                    title="Music">Music</a></li>
            <li>
                <a class="<?php if($com=='news') echo 'active'; ?> transition menu-line" href="news"
                    title="News">News</a>
            </li>
            <li>
                <a class="<?php if($com=='video') echo 'active'; ?> transition menu-line" href="video"
                    title="Video">Video</a>
            </li>

            <li><a class="<?php if($com=='contact') echo 'active'; ?> transition menu-line" href="contact"
                    title="Contact">Contact</a></li>
        </ul>
    </nav>
</div>