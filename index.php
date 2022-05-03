<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("NOT_SHOW_NAV_CHAIN", "Y");
$APPLICATION->SetTitle("Интернет-магазин Feron-Flowers.ru");
$APPLICATION->SetPageProperty("title", "Интернет-магазин Feron-Flowers.ru");
?>
<?$APPLICATION->IncludeComponent(
	"bitrix:news.list",
	"banners_owl",
	Array(
		"ACTIVE_DATE_FORMAT" => "d.m.Y",
		"ADD_SECTIONS_CHAIN" => "Y",
		"ADD_STYLES_FOR_MAIN" => "N",
		"AJAX_MODE" => "N",
		"AJAX_OPTION_ADDITIONAL" => "",
		"AJAX_OPTION_HISTORY" => "Y",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "Y",
		"BRAND_CODE" => "-",
		"BRAND_PAGE" => "",
		"CACHE_FILTER" => "N",
		"CACHE_GROUPS" => "Y",
		"CACHE_TIME" => "36000000",
		"CACHE_TYPE" => "A",
		"CATALOG_FILTER_NAME" => "",
		"CATALOG_IBLOCK_ID" => "",
		"CHECK_DATES" => "Y",
		"COMPOSITE_FRAME_MODE" => "A",
		"COMPOSITE_FRAME_TYPE" => "AUTO",
		"COUNT_ITEMS" => "0",
		"DETAIL_URL" => "",
		"DISPLAY_BOTTOM_PAGER" => "Y",
		"DISPLAY_TOP_PAGER" => "N",
		"FIELD_CODE" => array("ID","CODE","XML_ID","NAME","TAGS","SORT","PREVIEW_TEXT","PREVIEW_PICTURE","DETAIL_TEXT","DETAIL_PICTURE","DATE_ACTIVE_FROM","ACTIVE_FROM","DATE_ACTIVE_TO","ACTIVE_TO","SHOW_COUNTER","SHOW_COUNTER_START","IBLOCK_TYPE_ID","IBLOCK_ID","IBLOCK_CODE","IBLOCK_NAME","IBLOCK_EXTERNAL_ID","DATE_CREATE","CREATED_BY","CREATED_USER_NAME","TIMESTAMP_X","MODIFIED_BY","USER_NAME",""),
		"FILTER_NAME" => "",
		"HIDE_LINK_WHEN_NO_DETAIL" => "N",
		"IBLOCK_ID" => "21",
		"IBLOCK_TYPE" => "presscenter",
		"INCLUDE_IBLOCK_INTO_CHAIN" => "Y",
		"INCLUDE_SUBSECTIONS" => "Y",
		"MESSAGE_404" => "",
		"NEWS_COUNT" => "20",
		"PAGER_BASE_LINK_ENABLE" => "N",
		"PAGER_DESC_NUMBERING" => "N",
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
		"PAGER_SHOW_ALL" => "Y",
		"PAGER_SHOW_ALWAYS" => "Y",
		"PAGER_TEMPLATE" => ".default",
		"PAGER_TITLE" => "Новости",
		"PARENT_SECTION" => "",
		"PARENT_SECTION_CODE" => "",
		"PREVIEW_TRUNCATE_LEN" => "",
		"PROPERTY_CODE" => array("LINK","BANNER_TYPE","BLANK","TITLE1","TITLE2","TEXT",""),
		"RSGOPRO_ALONE" => "ALONE",
		"RSGOPRO_BANNER_HEIGHT" => "402",
		"RSGOPRO_BANNER_TYPE" => "BANNER_TYPE",
		"RSGOPRO_BANNER_VIDEO_MP4" => "VIDEO_MP4",
		"RSGOPRO_BANNER_VIDEO_PIC" => "VIDEO_PIC",
		"RSGOPRO_BANNER_VIDEO_WEBM" => "VIDEO_WEBM",
		"RSGOPRO_BLANK" => "BLANK",
		"RSGOPRO_CHANGE_DELAY" => "8000",
		"RSGOPRO_CHANGE_SPEED" => "2000",
		"RSGOPRO_LINK" => "LINK",
		"RSGOPRO_PRICE" => "-",
		"RSGOPRO_TEXT" => "TEXT",
		"RSGOPRO_TITLE1" => "TITLE1",
		"RSGOPRO_TITLE2" => "TITLE2",
		"SECTIONS_CODE" => "LINK",
		"SET_BROWSER_TITLE" => "Y",
		"SET_LAST_MODIFIED" => "N",
		"SET_META_DESCRIPTION" => "Y",
		"SET_META_KEYWORDS" => "Y",
		"SET_STATUS_404" => "N",
		"SET_TITLE" => "Y",
		"SHOW_404" => "N",
		"SHOW_BOTTOM_SECTIONS" => "N",
		"SORT_BY1" => "SORT",
		"SORT_BY2" => "TIMESTAMP_X",
		"SORT_ORDER1" => "ASC",
		"SORT_ORDER2" => "ASC",
		"STRICT_SECTION_CHECK" => "N"
	),
false,
Array(
	'ACTIVE_COMPONENT' => 'Y'
)
);?>

<div class="advant-list">
	<div class="advant-item">
		<div class="advant-item__icon">
			<svg class="icon ic-call" width="32" height="32">
				<use xlink:href="<?=SITE_TEMPLATE_PATH?>/assets/sprites/sprite.svg#ic-bouquet"></use>
			</svg>
		</div>

		<div class="advant-item__content">
			<div class="advant-item__title">Широкий ассортимент</div>
			<div class="advant-item__text">Вы сможете купить все аксессуары для флористики</div>
		</div>
	</div>

	<div class="advant-item">
		<div class="advant-item__icon">
			<svg class="icon ic-delivery" width="32" height="22">
				<use xlink:href="<?=SITE_TEMPLATE_PATH?>/assets/sprites/sprite.svg#ic-delivery"></use>
			</svg>
		</div>

		<div class="advant-item__content">
			<div class="advant-item__title">Широкая география доставки</div>
			<div class="advant-item__text">Мы отправляем заказы по Москве и России</div>
		</div>
	</div>

	<div class="advant-item">
		<div class="advant-item__icon">
			<svg class="icon ic-call" width="32" height="32">
				<use xlink:href="<?=SITE_TEMPLATE_PATH?>/assets/sprites/sprite.svg#ic-sale"></use>
			</svg>
		</div>

		<div class="advant-item__content">
			<div class="advant-item__title">Скидки для клиентов</div>
			<div class="advant-item__text">Регулярное появление акций и скидок</div>
		</div>
	</div>
</div>

 <?$APPLICATION->IncludeComponent(
	"bitrix:catalog.section.list",
	"main",
	Array(
		"ADD_SECTIONS_CHAIN" => "Y",
		"BLOCK_NAME" => "",
		"CACHE_FILTER" => "N",
		"CACHE_GROUPS" => "N",
		"CACHE_TIME" => "36000000",
		"CACHE_TYPE" => "A",
		"COMPONENT_TEMPLATE" => "main",
		"COMPOSITE_FRAME_MODE" => "A",
		"COMPOSITE_FRAME_TYPE" => "AUTO",
		"COUNT_ELEMENTS" => "N",
		"COUNT_ELEMENTS_FILTER" => "CNT_ACTIVE",
		"FILTER_NAME" => "sectionsFilter",
		"IBLOCK_ID" => "5",
		"IBLOCK_TYPE" => "catalog",
		"OFFSET_MODE" => "N",
		"SECTION_CODE" => "",
		"SECTION_FIELDS" => array(0=>"",1=>"",),
		"SECTION_ID" => "",
		"SECTION_URL" => "",
		"SECTION_USER_FIELDS" => array(0=>"",1=>"",),
		"SET_BROWSER_TITLE" => "8",
		"SET_META_DESCRIPTION" => "8",
		"SET_META_KEYWORDS" => "8",
		"SET_TITLE" => "Y",
		"SHOW_ANGLE" => "Y",
		"SHOW_COUNT_LVL1" => "24",
		"SHOW_COUNT_LVL2" => "4",
		"SHOW_PARENT_NAME" => "Y",
		"TOP_DEPTH" => "3",
		"VIEW_MODE" => "LINE"
	)
);?><?
/*$APPLICATION->IncludeComponent(
	"bitrix:news.line",
	"main",
	Array(
		"ACTIVE_DATE_FORMAT" => "d.m.Y",
		"BLOCK_NAME" => "",
		"CACHE_GROUPS" => "N",
		"CACHE_TIME" => "300",
		"CACHE_TYPE" => "A",
		"COMPOSITE_FRAME_MODE" => "A",
		"COMPOSITE_FRAME_TYPE" => "AUTO",
		"DETAIL_URL" => "",
		"FIELD_CODE" => array("PREVIEW_PICTURE","IBLOCK_NAME",""),
		"IBLOCKS" => array(),
		"IBLOCK_TYPE" => "news",
		"NEWS_COUNT" => "4",
		"SORT_BY1" => "ACTIVE_FROM",
		"SORT_BY2" => "SORT",
		"SORT_ORDER1" => "DESC",
		"SORT_ORDER2" => "ASC"
	),
false,
Array(
	'ACTIVE_COMPONENT' => 'Y'
)
);*/
?><?
if($IS_AJAXPAGES=='Y' || $IS_SORTERCHANGE=='Y')
{
	$APPLICATION->RestartBuffer();
	if(SITE_CHARSET!='utf-8')
	{
		$data = $APPLICATION->ConvertCharsetArray($JSON, SITE_CHARSET, 'utf-8');
		$json_str_utf = json_encode($data);
		$json_str = $APPLICATION->ConvertCharset($json_str_utf, 'utf-8', SITE_CHARSET);
		echo $json_str;
	} else {
		echo json_encode($JSON);
	}
	die();
}
?>
<?$APPLICATION->IncludeComponent(
	"bitrix:news.list",
	"gopro",
	Array(
		"ACTIVE_DATE_FORMAT" => "",
		"ADD_SECTIONS_CHAIN" => "Y",
		"ADD_STYLES_FOR_MAIN" => "Y",
		"AJAX_MODE" => "N",
		"AJAX_OPTION_ADDITIONAL" => "",
		"AJAX_OPTION_HISTORY" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "Y",
		"BRAND_CODE" => "-",
		"BRAND_PAGE" => "/brands/",
		"CACHE_FILTER" => "N",
		"CACHE_GROUPS" => "Y",
		"CACHE_TIME" => "36000000",
		"CACHE_TYPE" => "A",
		"CATALOG_BRAND_CODE" => "-",
		"CATALOG_FILTER_NAME" => "arrFilter",
		"CATALOG_IBLOCK_ID" => "1",
		"CHECK_DATES" => "Y",
		"COMPOSITE_FRAME_MODE" => "A",
		"COMPOSITE_FRAME_TYPE" => "AUTO",
		"COUNT_ITEMS" => "0",
		"DETAIL_URL" => "",
		"DISPLAY_BOTTOM_PAGER" => "N",
		"DISPLAY_DATE" => "Y",
		"DISPLAY_NAME" => "Y",
		"DISPLAY_PICTURE" => "Y",
		"DISPLAY_PREVIEW_TEXT" => "Y",
		"DISPLAY_TOP_PAGER" => "N",
		"FIELD_CODE" => array("",""),
		"FILTER_NAME" => "",
		"HIDE_LINK_WHEN_NO_DETAIL" => "N",
		"IBLOCK_ID" => "1",
		"IBLOCK_TYPE" => "news",
		"INCLUDE_IBLOCK_INTO_CHAIN" => "Y",
		"INCLUDE_SUBSECTIONS" => "Y",
		"MESSAGE_404" => "",
		"NEWS_COUNT" => "10000",
		"PAGER_BASE_LINK_ENABLE" => "N",
		"PAGER_DESC_NUMBERING" => "N",
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
		"PAGER_SHOW_ALL" => "N",
		"PAGER_SHOW_ALWAYS" => "N",
		"PAGER_TEMPLATE" => ".default",
		"PAGER_TITLE" => "Новости",
		"PARENT_SECTION" => "",
		"PARENT_SECTION_CODE" => "",
		"PREVIEW_TRUNCATE_LEN" => "",
		"PROPERTY_CODE" => array("","BRAND",""),
		"SECTIONS_CODE" => "",
		"SET_BROWSER_TITLE" => "Y",
		"SET_LAST_MODIFIED" => "N",
		"SET_META_DESCRIPTION" => "Y",
		"SET_META_KEYWORDS" => "Y",
		"SET_STATUS_404" => "N",
		"SET_TITLE" => "Y",
		"SHOW_404" => "N",
		"SHOW_BOTTOM_SECTIONS" => "Y",
		"SORT_BY1" => "ID",
		"SORT_BY2" => "ID",
		"SORT_ORDER1" => "ASC",
		"SORT_ORDER2" => "ASC",
		"STRICT_SECTION_CHECK" => "N"
	),
false,
Array(
	'ACTIVE_COMPONENT' => 'N'
)
);?><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>