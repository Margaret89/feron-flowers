<?php
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true)
	die();

use \Bitrix\Main\Localization\Loc;
use \Bitrix\Main\Page\Asset;
use \Bitrix\Main\Loader;

Loc::loadMessages(__FILE__);

$moduleId = 'redsign.profurniture';

// check module include
if (!Loader::includeModule($moduleId)) {
	ShowError(Loc::getMessage('RSGOPRO.ERROR_NOT_INSTALLED_GOPRO'));
	die();
}

if (!\Bitrix\Main\Loader::includeModule('redsign.devfunc')) {
    ShowError(Loc::getMessage('RSGOPRO.ERROR_NOT_INSTALLED_DEVFUNC'));
    die();
} else {
    RSDevFunc::Init(array('jsfunc'));
}

// is main page
$IS_MAIN = 'N';
if ($APPLICATION->GetCurPage(true) == SITE_DIR.'index.php')
	$IS_MAIN = 'Y';

// is catalog page
$IS_CATALOG = 'Y';
if (strpos($APPLICATION->GetCurPage(true), SITE_DIR.'catalog/') === false)
	$IS_CATALOG = 'N';

// is personal page
$IS_PERSONAL = 'Y';
if (strpos($APPLICATION->GetCurPage(true), SITE_DIR.'personal/') === false)
	$IS_PERSONAL = 'N';

// is auth page
$IS_AUTH = 'Y';
if (strpos($APPLICATION->GetCurPage(true), SITE_DIR.'auth/') === false)
	$IS_AUTH = 'N';

// is ajax hit
$isAjax = isset($_SERVER['HTTP_X_REQUESTED_WITH']) && isset($_SERVER['HTTP_X_FANCYBOX']) || isset($_REQUEST['AJAX_CALL']) && 'Y' == $_REQUEST['AJAX_CALL'];

CJSCore::Init('ajax');
$adaptive = COption::GetOptionString($moduleId, 'adaptive', 'Y');
$prop_option = COption::GetOptionString($moduleId, 'prop_option', 'line_through');

$asset = Asset::getInstance();

// add strings
$asset->addString('<meta http-equiv="X-UA-Compatible" content="IE=edge" />');
$asset->addString('<meta name="viewport" content="width=device-width, initial-scale=1.0">');
$asset->addString('<script type="text/javascript" src="//yandex.st/share/share.js" charset="utf-8"></script>');
$asset->addString('<script src="//yastatic.net/share2/share.js" async="async" charset="utf-8"></script>');

// add styles
$asset->addCss(SITE_TEMPLATE_PATH.'/css/reset.css');
$asset->addCss(SITE_TEMPLATE_PATH.'/css/bootstrap-grid.min.css');

$asset->addCss(SITE_TEMPLATE_PATH.'/assets/css/style.css');
$asset->addCss(SITE_TEMPLATE_PATH.'/assets/lib/fancybox/jquery.fancybox.css');
$asset->addCss(SITE_TEMPLATE_PATH.'/assets/lib/owl/owl.carousel.css');
/*** zzzzzzzzzzzzzz ***/
$asset->addCss(SITE_TEMPLATE_PATH.'/js/jscrollpane/jquery.jscrollpane.css');
$asset->addCss(SITE_TEMPLATE_PATH.'/js/jssor/style.css');
$asset->addCss(SITE_TEMPLATE_PATH.'/css/offers.css');
$asset->addCss(SITE_TEMPLATE_PATH.'/js/popup/style.css');
$asset->addCss(SITE_TEMPLATE_PATH.'/js/glass/style.css');
if ($IS_AUTH == 'Y') {
	$asset->addCss(SITE_TEMPLATE_PATH.'/css/auth.css');
}
$asset->addCss(SITE_TEMPLATE_PATH.'/css/additional.css');
$asset->addCss(SITE_TEMPLATE_PATH.'/custom/style.css');


// add scripts (lib)
$asset->addJs(SITE_TEMPLATE_PATH.'/assets/lib/jquery-1.11.2.min.js');
$asset->addJs(SITE_TEMPLATE_PATH.'/assets/lib/jquery.mousewheel.min.js');
$asset->addJs(SITE_TEMPLATE_PATH.'/assets/lib/jquery.cookie.js');
$asset->addJs(SITE_TEMPLATE_PATH.'/assets/lib/jquery.maskedinput.min.js');
$asset->addJs(SITE_TEMPLATE_PATH.'/assets/lib/owl/owl.carousel.min.js');
$asset->addJs(SITE_TEMPLATE_PATH.'/assets/lib/jscrollpane/jquery.jscrollpane.min.js');
$asset->addJs(SITE_TEMPLATE_PATH.'/assets/lib/jssor/jssor.core.js');
$asset->addJs(SITE_TEMPLATE_PATH.'/assets/lib/jssor/jssor.utils.js');
$asset->addJs(SITE_TEMPLATE_PATH.'/assets/lib/jssor/jssor.slider.min.js');
$asset->addJs(SITE_TEMPLATE_PATH.'/assets/lib/fancybox/jquery.fancybox.pack.js');
$asset->addJs(SITE_TEMPLATE_PATH.'/assets/lib/scrollto/jquery.scrollTo.min.js');
// add scripts (our)
$asset->addJs(SITE_TEMPLATE_PATH.'/assets/js/popup/script.js');
$asset->addJs(SITE_TEMPLATE_PATH.'/assets/js/jscrollpane.js');
$asset->addJs(SITE_TEMPLATE_PATH.'/assets/js/glass/script.js');
$asset->addJs(SITE_TEMPLATE_PATH.'/assets/js/script.js');
$asset->addJs(SITE_TEMPLATE_PATH.'/assets/js/offers.js');
$asset->addJs(SITE_TEMPLATE_PATH.'/assets/js/timer.js');
// add scripts (custom)
$asset->addJs(SITE_TEMPLATE_PATH.'/custom/script.js');
?><!DOCTYPE html>
<html>
<head>
	<title><?php $APPLICATION->ShowTitle(); ?></title>
	<?php $APPLICATION->ShowHead(); ?>
	<script type="text/javascript">
	// some JS params
	var BX_COOKIE_PREFIX = 'BITRIX_SM_',
		SITE_ID = '<?=SITE_ID?>',
		SITE_DIR = '<?=str_replace('//','/',SITE_DIR);?>',
		SITE_TEMPLATE_PATH = '<?=str_replace('//','/',SITE_TEMPLATE_PATH);?>',
		SITE_CATALOG_PATH = 'catalog',
		RSGoPro_Adaptive = <?=( $adaptive=='Y' ? 'true' : 'false' )?>,
		RSGoPro_FancyCloseDelay = 1000,
		RSGoPro_FancyReloadPageAfterClose = false,
		RSGoPro_OFFERS = {},
		RSGoPro_FAVORITE = {},
		RSGoPro_COMPARE = {},
		RSGoPro_INBASKET = {},
		RSGoPro_STOCK = {},
		RSGoPro_PHONETABLET = "N";
	// messages
	BX.message({
		"RSGOPRO_JS_TO_MACH_CLICK_LIKES":"<?=CUtil::JSEscape(GetMessage('RSGOPRO.JS_TO_MACH_CLICK_LIKES'))?>",
		"RSGOPRO_JS_COMPARE":"<?=CUtil::JSEscape(GetMessage('RSGOPRO.RSGOPRO_JS_COMPARE'))?>",
		"RSGOPRO_JS_COMPARE_IN":"<?=CUtil::JSEscape(GetMessage('RSGOPRO.RSGOPRO_JS_COMPARE_IN'))?>"
	});
	</script>
<meta name="yandex-verification" content="5b6fcb090077273f" />
<!-- Google Tag Manager -->
<script data-skip-moving="true">(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-MVL2BPX');</script>
<!-- End Google Tag Manager -->
	<!-- Facebook Pixel Code -->
<script>
!function(f,b,e,v,n,t,s)
{if(f.fbq)return;n=f.fbq=function(){n.callMethod?
n.callMethod.apply(n,arguments):n.queue.push(arguments)};
if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
n.queue=[];t=b.createElement(e);t.async=!0;
t.src=v;s=b.getElementsByTagName(e)[0];
s.parentNode.insertBefore(t,s)}(window,document,'script',
'https://connect.facebook.net/en_US/fbevents.js');
 fbq('init', '505726086647009'); 
fbq('track', 'PageView');
</script>
<noscript>
 <img height="1" width="1" 
src="https://www.facebook.com/tr?id=505726086647009&ev=PageView
&noscript=1"/>
</noscript>
<!-- End Facebook Pixel Code -->
<!-- Global site tag (gtag.js) - Google Analytics --> <script async src="https://www.googletagmanager.com/gtag/js?id=UA-194610913-1"></script> <script> window.dataLayer = window.dataLayer || []; function gtag(){dataLayer.push(arguments);} gtag('js', new Date()); gtag('config', 'UA-194610913-1'); </script> 
<!-- Yandex.Metrika counter -->
<script type="text/javascript" >
   (function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)};
   m[i].l=1*new Date();k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)})
   (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");

   ym(87405445, "init", {
        clickmap:true,
        trackLinks:true,
        accurateTrackBounce:true,
        webvisor:true
   });
</script>
<noscript><div><img src="https://mc.yandex.ru/watch/87405445" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
<!-- /Yandex.Metrika counter -->
</head>
<body class="prop_option_<?=$prop_option?><?if($adaptive == 'Y'):?> adaptive<?endif;?> js-body">
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-MVL2BPX";
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->

	<?/*<div id="panel"><?=$APPLICATION->ShowPanel()?></div>*/?>
	<?=$APPLICATION->ShowPanel()?>

	<div class="body"><!-- body -->
		<div class="header">
			<div class="header-mobile">
				<div class="header-mobile__item">
					<div class="ic-hamburger js-btn-menu">
						<span></span>
					</div>
				</div>

				<div class="header-mobile__item">
					<a href="<?if($USER->IsAuthorized()){?>/personal/<?}else{?>/auth/<?}?>">
						<svg class="icon ic-lock" width="16" height="20">
							<use xlink:href="<?=SITE_TEMPLATE_PATH?>/assets/sprites/sprite.svg#ic-lock"></use>
						</svg>
					</a>
				</div>

				<div class="header-mobile__item js-mobile-contacts">
					<svg class="icon ic-mobile" width="20" height="20">
						<use xlink:href="<?=SITE_TEMPLATE_PATH?>/assets/sprites/sprite.svg#ic-mobile"></use>
					</svg>
				</div>

				<div class="header-mobile__item">
					<a href="/personal/cart/">
						<svg class="icon ic-cart" width="21" height="21">
							<use xlink:href="<?=SITE_TEMPLATE_PATH?>/assets/sprites/sprite.svg#ic-cart"></use>
						</svg>
					</a>
				</div>
			</div>

			<div class="header-top">
				<div class="container-fluid">
					<div class="row">
						<div class="col-12">
							<div class="header-top__content">
								<?$APPLICATION->IncludeComponent("bitrix:menu", "top-menu", Array(
									"ROOT_MENU_TYPE" => "tpanel",	// Тип меню для первого уровня
										"MAX_LEVEL" => "1",	// Уровень вложенности меню
										"CHILD_MENU_TYPE" => "",	// Тип меню для остальных уровней
										"USE_EXT" => "N",	// Подключать файлы с именами вида .тип_меню.menu_ext.php
										"MENU_CACHE_TYPE" => "A",	// Тип кеширования
										"MENU_CACHE_TIME" => "3600",	// Время кеширования (сек.)
										"MENU_CACHE_USE_GROUPS" => "Y",	// Учитывать права доступа
										"MENU_CACHE_GET_VARS" => "",	// Значимые переменные запроса
									),
									false
								);?>
	
								<div class="header-top__action">
									<?$APPLICATION->IncludeComponent(
										"bitrix:system.auth.form",
										"auth",
										array(
											"REGISTER_URL" => "/auth/",
											"PROFILE_URL" => "/personal/profile/"
										)
									);?>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="header-main">
				<div class="container-fluid">
					<div class="row">
						<div class="col-12">
							<div class="header-main__content">
								<div class="header-main__logo-wrap">
									<?if(!CSite::InDir('/index.php')){?><a href="/"><?}?>
										<div class="header-main__logo">
											<?$APPLICATION->IncludeFile(
												SITE_DIR."include/header/logo.php",
												Array(),
												Array("MODE"=>"html")
											);?>
										</div>
									<?if(!CSite::InDir('/index.php')){?></a><?}?>

									<div class="header-main__slogan">
										<?$APPLICATION->IncludeFile(
											SITE_DIR."include/header/slogan.php",
											Array(),
											Array("MODE"=>"html")
										);?>
									</div>
								</div>
	
								<div class="header-contacts js-header-contacts">
									<div class="header-contacts__item">
										<div class="header-contacts__title header-contacts__title_hover">
											<span class="js-contact-opt">Оптовый отдел</span>
											<span class="js-contact-roz inactive">Розничный отдел</span>
										</div>
										<div class="header-contacts__phone js-phone-opt">
											<?$APPLICATION->IncludeFile(
												SITE_DIR."include/header/phone-opt.php",
												Array(),
												Array("MODE"=>"html")
											);?>
										</div>
	
										<div class="header-contacts__title d-lg-none">Розничный отдел</div>
										<div class="header-contacts__phone inactive js-phone-roz">
											<?$APPLICATION->IncludeFile(
												SITE_DIR."include/header/phone-roz.php",
												Array(),
												Array("MODE"=>"html")
											);?>
										</div>

										<div class="header-contacts__mail d-none d-lg-block">
											<?$APPLICATION->IncludeFile(
												SITE_DIR."include/header/mail.php",
												Array(),
												Array("MODE"=>"html")
											);?>
										</div>
									</div>
	
									<div class="header-contacts__item">
										<div class="header-contacts__title">Бесплатно по всей России</div>
										<div class="header-contacts__phone">
											<?$APPLICATION->IncludeFile(
												SITE_DIR."include/header/phone-free.php",
												Array(),
												Array("MODE"=>"html")
											);?>
										</div>
									</div>
	
									<div class="header-contacts__mail d-lg-none">
										<?$APPLICATION->IncludeFile(
											SITE_DIR."include/header/mail.php",
											Array(),
											Array("MODE"=>"html")
										);?>
									</div>
									
									<a class="fancyajax fancybox.ajax btn d-lg-none" href="<?=SITE_DIR?>include/popup/feedback/" title="<?=GetMessage('T_FEEDBACK')?>"><?=GetMessage('T_FEEDBACK')?></a>
								</div>
	
								<?$APPLICATION->IncludeComponent(
									"bitrix:search.title",
									"search",
									Array(
										"CATEGORY_0" => array("iblock_catalog"),
										"CATEGORY_0_TITLE" => "",
										"CATEGORY_0_iblock_catalog" => array("5"),
										"CATEGORY_OTHERS_TITLE" => "",
										"CHECK_DATES" => "N",
										"COMPOSITE_FRAME_MODE" => "A",
										"COMPOSITE_FRAME_TYPE" => "AUTO",
										"CONTAINER_ID" => "title-search",
										"CONVERT_CURRENCY" => "Y",
										"CURRENCY_ID" => "RUB",
										"IBLOCK_ID" => array("5"),
										"INPUT_ID" => "title-search-input",
										"NUM_CATEGORIES" => "1",
										"OFFERS_FIELD_CODE" => array("ID","CODE","XML_ID","NAME","TAGS","SORT","PREVIEW_TEXT","PREVIEW_PICTURE","DETAIL_TEXT","DETAIL_PICTURE","DATE_ACTIVE_FROM","ACTIVE_FROM","DATE_ACTIVE_TO","ACTIVE_TO","SHOW_COUNTER","SHOW_COUNTER_START","IBLOCK_TYPE_ID","IBLOCK_ID","IBLOCK_CODE","IBLOCK_NAME","IBLOCK_EXTERNAL_ID","DATE_CREATE","CREATED_BY","CREATED_USER_NAME","TIMESTAMP_X","MODIFIED_BY","USER_NAME",""),
										"OFFERS_PROPERTY_CODE" => array("","CML2_LINK","CML2_ARTICLE",""),
										"ORDER" => "date",
										"PAGE" => "/search/index.php",
										"PRICE_CODE" => array("Стоимость"),
										"PRICE_VAT_INCLUDE" => "N",
										"PRODUCT_QUANTITY_VARIABLE" => "quan",
										"SHOW_INPUT" => "Y",
										"SHOW_OTHERS" => "Y",
										"TOP_COUNT" => "5",
										"USE_LANGUAGE_GUESS" => "N",
										"USE_PRODUCT_QUANTITY" => "Y"
									)
								);?>
	
								<?$APPLICATION->IncludeComponent(
									"bitrix:sale.basket.basket.line", 
									"mini-cart", 
									array(
										"PATH_TO_BASKET" => "/personal/cart/",
										"PATH_TO_ORDER" => "/personal/order/",
										"SHOW_DELAY" => "Y",
										"SHOW_NOTAVAIL" => "Y",
										"SHOW_SUBSCRIBE" => "Y",
										"COMPONENT_TEMPLATE" => "mini-cart",
										"SHOW_NUM_PRODUCTS" => "Y",
										"SHOW_TOTAL_PRICE" => "Y",
										"SHOW_EMPTY_VALUES" => "Y",
										"SHOW_PERSONAL_LINK" => "N",
										"PATH_TO_PERSONAL" => "/personal/",
										"SHOW_AUTHOR" => "N",
										"PATH_TO_REGISTER" => "/login/",
										"PATH_TO_PROFILE" => "/personal/",
										"SHOW_PRODUCTS" => "Y",
										"SHOW_IMAGE" => "Y",
										"SHOW_PRICE" => "Y",
										"SHOW_SUMMARY" => "Y",
										"POSITION_FIXED" => "N",
										"HIDE_ON_BASKET_PAGES" => "N"
									),
									false
								);?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	
		<main class="main">
			<div class="container-fluid">
				<div class="row">
					<div class="col-lg-3">
						<?$APPLICATION->IncludeFile(
							SITE_DIR."include/header/menu.php",
							Array(),
							Array("MODE"=>"html")
						);?>
					</div>

					<div class="col-lg-9">
						<?php if ($IS_MAIN == 'N'): ?>
							<?$APPLICATION->IncludeComponent(
								"bitrix:breadcrumb",
								"gopro",
								Array(
									"COMPOSITE_FRAME_MODE" => "A",
									"COMPOSITE_FRAME_TYPE" => "AUTO",
									"PATH" => "",
									"SITE_ID" => "s1",
									"START_FROM" => "0"
								)
							);?>
							
							<div class="page-header">
								<h1><?$APPLICATION->ShowTitle(false)?></h1>
							</div>
						<?php endif; ?>


<?php
if ($isAjax) {
	$APPLICATION->RestartBuffer();
}
