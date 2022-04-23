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
<body class="prop_option_<?=$prop_option?><?if($adaptive == 'Y'):?> adaptive<?endif;?>">
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-MVL2BPX";
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->

	<div id="panel"><?=$APPLICATION->ShowPanel()?></div>
	<div class="body"><!-- body -->
		<div class="tline"></div>
		<div id="tpanel" class="tpanel">
			<div class="centering">
				<div class="centeringin clearfix">
					<div class="authandlocation nowrap">
						<?$APPLICATION->IncludeFile(
							SITE_DIR."include/header/location.php",
							Array(),
							Array("MODE"=>"html")
						);?>
						<?$APPLICATION->IncludeFile(
							SITE_DIR."include/header/auth.php",
							Array(),
							Array("MODE"=>"html")
						);?>
					</div>
					<?$APPLICATION->IncludeFile(
						SITE_DIR."include/header/topline_menu.php",
						Array(),
						Array("MODE"=>"html")
					);?>
				</div>
			</div>
		</div>
		<div id="header" class="header">
			<div class="centering">
				<div class="centeringin clearfix">
					<div class="logo column1">
						<div class="column1inner">
							<a href="<?=SITE_DIR?>">
								<?$APPLICATION->IncludeFile(
									SITE_DIR."include/company_logo.php",
									Array(),
									Array("MODE"=>"html")
								);?>
							</a>
						</div>
					</div>
					<div class="phone column3 nowrap ">
						<div class="column3inner">
							<i class="icon pngicons mobile_hide"></i>
							<?$APPLICATION->IncludeFile(
								SITE_DIR."include/header/phone.php",
								Array(),
								Array("MODE"=>"html")
							);?><br>
							<i class="icon pngicons mobile_hide"></i>
							<?$APPLICATION->IncludeFile(
								SITE_DIR."include/header/phonemsk.php",
								Array(),
								Array("MODE"=>"html")
							);?><br>
							<i class="icon pngicons mobile_hide"></i>
							<?$APPLICATION->IncludeFile(
								SITE_DIR."include/header/phonei.php",
								Array(),
								Array("MODE"=>"html")
							);?>
							
						</div>
					</div>
					
					<div class="basket column1 nowrap">
						<div class="column1inner">
							<?$APPLICATION->IncludeFile(
								SITE_DIR."include/header/basket_small.php",
								Array(),
								Array("MODE"=>"html")
							);?>
						</div>
					</div>
				</div>
			</div>
			
		</div><div class="centering">
				<div class="centeringin clearfix">
					<?$APPLICATION->IncludeFile(
						SITE_DIR."include/header/menu.php",
						Array(),
						Array("MODE"=>"html")
					);?>
					<?$APPLICATION->IncludeFile(
						SITE_DIR."include/header/search_title.php",
						Array(),
						Array("MODE"=>"html")
					);?>
				</div>
			</div>
		<?php if ($IS_MAIN == 'N'): ?>
			<div id="title" class="title">
				<div class="centering">
					<div class="centeringin clearfix">
						<?$APPLICATION->IncludeFile(
							SITE_DIR."include/header/breadcrumb.php",
							Array(),
							Array("MODE"=>"html")
						);?>
						<h1 class="pagetitle"><?$APPLICATION->ShowTitle(false)?></h1>
					</div>
				</div>
			</div><!-- /title -->
		<?php endif; ?>
		<div id="content" class="content">
			<div class="centering">
				<div class="centeringin clearfix">

<?php
if ($isAjax) {
	$APPLICATION->RestartBuffer();
}
