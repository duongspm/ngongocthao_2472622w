<?php
/* Check HTTP */
$func->checkHTTP($http, $config['arrayDomainSSL'], $configBase, $configUrl);

/* Validate URL */
$func->checkUrl($config['website']['index']);

/* Check login */
$func->checkLoginMember();

/* Mobile detect */
$deviceType = ($detect->isMobile() || $detect->isTablet()) ? 'mobile' : 'computer';
define('TEMPLATE', ($deviceType == 'computer') ? './templates/' : './templates/');

/* Router */
$router->setBasePath($config['database']['url']);
$router->map('GET', array(ADMIN . '/', 'admin'), function () {
	global $func, $config;
	$func->redirect($config['database']['url'] . ADMIN . "/index.php");
	exit;
});
$router->map('GET', array(ADMIN, 'admin'), function () {
	global $func, $config;
	$func->redirect($config['database']['url'] . ADMIN . "/index.php");
	exit;
});
$router->map('GET|POST', '', 'index', 'home');
$router->map('GET|POST', 'index.php', 'index', 'index');
$router->map('GET|POST', 'sitemap.xml', 'sitemap', 'sitemap');
$router->map('GET|POST', '[a:com]', 'allpage', 'show');
$router->map('GET|POST', '[a:com]/[a:lang]/', 'allpagelang', 'lang');
$router->map('GET|POST', '[a:com]/[a:action]', 'account', 'account');
$router->map('GET', THUMBS . '/[i:w]x[i:h]x[i:z]/[**:src]', function ($w, $h, $z, $src) {
	global $func;
	$func->createThumb($w, $h, $z, $src, null, THUMBS);
}, 'thumb');
$router->map('GET', WATERMARK . '/product/[i:w]x[i:h]x[i:z]/[**:src]', function ($w, $h, $z, $src) {
	global $func, $cache;
	$wtm = $cache->get("select status, photo, options from #_photo where type = ? and act = ? limit 0,1", array('watermark', 'photo_static'), 'fetch', 7200);
	$func->createThumb($w, $h, $z, $src, $wtm, "product");
}, 'watermark');
$router->map('GET', WATERMARK . '/news/[i:w]x[i:h]x[i:z]/[**:src]', function ($w, $h, $z, $src) {
	global $func, $cache;
	$wtm = $cache->get("select status, photo, options from #_photo where type = ? and act = ? limit 0,1", array('watermark-news', 'photo_static'), 'fetch', 7200);
	$func->createThumb($w, $h, $z, $src, $wtm, "news");
}, 'watermarkNews');

/* Router match */
$match = $router->match();

/* Router check */
if (is_array($match)) {
	if (is_callable($match['target'])) {
		call_user_func_array($match['target'], $match['params']);
	} else {
		$com = (!empty($match['params']['com'])) ? htmlspecialchars($match['params']['com']) : htmlspecialchars($match['target']);
		$getPage = !empty($_GET['p']) ? htmlspecialchars($_GET['p']) : 1;
	}
} else {
	header('HTTP/1.0 404 Not Found', true, 404);
	include("404.php");
	exit;
}

/* Setting */
$sqlCache = "select * from #_setting";
$setting = $cache->get($sqlCache, null, 'fetch', 7200);
$optsetting = (!empty($setting['options'])) ? json_decode($setting['options'], true) : null;

/* Lang */
if (!empty($match['params']['lang'])) $_SESSION['lang'] = $match['params']['lang'];
else if (empty($_SESSION['lang']) && empty($match['params']['lang'])) $_SESSION['lang'] = $optsetting['lang_default'];
$lang = $_SESSION['lang'];

/* Check lang */
$weblang = (!empty($config['website']['lang'])) ? array_keys($config['website']['lang']) : array();

if (!in_array($lang, $weblang)) {
	$_SESSION['lang'] = 'vi';
	$lang = $_SESSION['lang'];
}

/* Slug lang */
$sluglang = 'slugvi';

/* SEO Lang */
$seolang = "vi";

/* Require datas lang */
require_once LIBRARIES . "lang/$lang.php";

/* T???i ??u link */
$requick = array(

	array("tbl" => "news", "field" => "id", "source" => "news", "com" => "event-gallery", "type" => "event-gallery", "menu" => true),
	
	array("tbl" => "news", "field" => "id", "source" => "news", "com" => "news", "type" => "news", "menu" => true),

	array("tbl" => "news", "field" => "id", "source" => "news", "com" => "music", "type" => "music", "menu" => true),

	/* Trang t??nh */
	array("tbl" => "static", "field" => "id", "source" => "static", "com" => "about", "type" => "about", "menu" => true),

	/* Li??n h??? */
	array("tbl" => "", "field" => "id", "source" => "contact", "com" => "contact", "type" => "contact", "menu" => true),

	array("tbl" => "product", "field" => "id", "source" => "product", "com" => "album", "type" => "album", "menu" => true),
	
	array("tbl" => "photo", "field" => "id", "source" => "video", "com" => "video", "type" => "video", "menu" => true),

);

/* Find data */
if (!empty($com) && !in_array($com, ['tim-kiem', 'account', 'sitemap'])) {
	foreach ($requick as $k => $v) {
		$urlTbl = (!empty($v['tbl'])) ? $v['tbl'] : '';
		$urlTblTag = (!empty($v['tbltag'])) ? $v['tbltag'] : '';
		$urlType = (!empty($v['type'])) ? $v['type'] : '';
		$urlField = (!empty($v['field'])) ? $v['field'] : '';
		$urlCom = (!empty($v['com'])) ? $v['com'] : '';

		if (!empty($urlTbl) && !in_array($urlTbl, ['static', 'photo'])) {
			$row = $d->rawQueryOne("select id from #_$urlTbl where $sluglang = ? and type = ? and find_in_set('hienthi',status) limit 0,1", array($com, $urlType));

			if (!empty($row['id'])) {
				$_GET[$urlField] = $row['id'];
				$com = $urlCom;
				break;
			}
		}
	}
}

/* Switch coms */
switch ($com) {
	case 'contact':
		$source = "contact";
		$template = "contact/contact";
		$seo->set('type', 'object');
		$titleMain = "Contact";
		break;

	case 'about':
		$source = "static";
		$template = "static/static";
		$type = $com;
		$seo->set('type', 'article');
		$titleMain = "About";
		break;


	case 'news':
		$source = "news";
		$template = isset($_GET['id']) ? "news/news_detail" : "news/news";
		$seo->set('type', isset($_GET['id']) ? "article" : "object");
		$type = $com;
		$titleMain = "News";
		break;

	case 'music':
		$source = "news";
		$template = "news/music";
		$seo->set('type', isset($_GET['id']) ? "article" : "object");
		$type = $com;
		$titleMain = "Music";
		break;


	case 'event-gallery':
		$source = "news";
		$template = isset($_GET['id']) ? "news/news_detail" : "news/news";
		$seo->set('type', isset($_GET['id']) ? "article" : "object");
		$type = $com;
		$titleMain = "Event Gallery";
		break;

	case 'album':
		$source = "product";
		$template = isset($_GET['id']) ? "album/album_detail" : "album/album";
		$seo->set('type',isset($_GET['id']) ? "article" : "object");
		$type = $com;
		$titleMain = "Album";
		break;
	case 'video':
		$source = "video";
		$template = "video/video";
		$type = $com;
		$seo->set('type','object');
		$titleMain = "Video";
		break;
	case 'account':
		$source = "user";
		break;

	case 'ngon-ngu':
		if (isset($lang)) {
			switch ($lang) {
				case 'vi':
					$_SESSION['lang'] = 'vi';
					break;
					// case 'en':
					// 	$_SESSION['lang'] = 'en';
					// 	break;
				default:
					$_SESSION['lang'] = 'vi';
					break;
			}
		}
		$func->redirect($_SERVER['HTTP_REFERER']);
		break;

	case 'sitemap':
		include_once LIBRARIES . "sitemap.php";
		exit();

	case '':
	case 'index':
		$source = "index";
		$template = "index/index";
		$seo->set('type', 'website');
		break;

	default:
		header('HTTP/1.0 404 Not Found', true, 404);
		include("404.php");
		exit();
}

/* Require datas for all page */
require_once SOURCES . "allpage.php";

/* Include sources */
if (!empty($source)) {
	include SOURCES . $source . ".php";
}

/* Include sources */
if (empty($template)) {
	header('HTTP/1.0 404 Not Found', true, 404);
	include("404.php");
	exit();
}