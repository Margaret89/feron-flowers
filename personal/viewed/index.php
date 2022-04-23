<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Просмотренные товары");

global $arrAlreadyViewed;
$APPLICATION->IncludeComponent("bitrix:sale.viewed.product", "filter", array(
	"VIEWED_COUNT" => "10000",
	"VIEWED_NAME" => "Y",
	"VIEWED_IMAGE" => "Y",
	"VIEWED_PRICE" => "Y",
	"VIEWED_CURRENCY" => "default",
	"VIEWED_CANBUY" => "N",
	"VIEWED_CANBUSKET" => "N",
	"VIEWED_IMG_HEIGHT" => "75",
	"VIEWED_IMG_WIDTH" => "75",
	"BASKET_URL" => "/personal/cart/",
	"ACTION_VARIABLE" => "action",
	"PRODUCT_ID_VARIABLE" => "id",
	"SET_TITLE" => "N"
	),
	false
);
?>

<div class="pmenu">
<?$APPLICATION->IncludeComponent("bitrix:menu", "personal", array(
	"ROOT_MENU_TYPE" => "personal",
	"MENU_CACHE_TYPE" => "A",
	"MENU_CACHE_TIME" => "3600",
	"MENU_CACHE_USE_GROUPS" => "Y",
	"MENU_CACHE_GET_VARS" => array(
	),
	"MAX_LEVEL" => "1",
	"CHILD_MENU_TYPE" => "",
	"USE_EXT" => "N",
	"DELAY" => "N",
	"ALLOW_MULTI_SELECT" => "N",
	"SEPARATORS_PLACE" => array(
		0 => "2",
		1 => "5",
		2 => "",
	)
	),
	false
);?>
</div>

<div class="pcontent">

<?global $rsGoProViewedFilter;?>
<?$APPLICATION->IncludeComponent(
	"bitrix:catalog.viewed.products", 
	"filter", 
	array(
		"SHOW_FROM_SECTION" => "N",
		"HIDE_NOT_AVAILABLE" => "N",
		"SHOW_DISCOUNT_PERCENT" => "Y",
		"PRODUCT_SUBSCRIPTION" => "N",
		"SHOW_NAME" => "Y",
		"SHOW_IMAGE" => "Y",
		"MESS_BTN_BUY" => "Купить",
		"MESS_BTN_DETAIL" => "Подробнее",
		"MESS_BTN_SUBSCRIBE" => "Подписаться",
		"PAGE_ELEMENT_COUNT" => "30",
		"DETAIL_URL" => "",
		"SHOW_OLD_PRICE" => "N",
		"PRICE_CODE" => array(
			0=>"Стоимость",
		),
		"SHOW_PRICE_COUNT" => "1",
		"PRICE_VAT_INCLUDE" => "Y",
		"CONVERT_CURRENCY" => "N",
		"BASKET_URL" => "/personal/basket.php",
		"ACTION_VARIABLE" => "action",
		"PRODUCT_ID_VARIABLE" => "id",
		"ADD_PROPERTIES_TO_BASKET" => "Y",
		"PRODUCT_PROPS_VARIABLE" => "prop",
		"PARTIAL_PRODUCT_PROPERTIES" => "N",
		"USE_PRODUCT_QUANTITY" => "Y",
		"SHOW_PRODUCTS_26" => "Y",
		"PROPERTY_CODE_26" => array(
			0 => "CML2_ARTICLE",
			1 => "",
		),
		"CART_PROPERTIES_26" => array(
			0 => "",
			1 => "",
		),
		"ADDITIONAL_PICT_PROP_26" => "MORE_PHOTO",
		"LABEL_PROP_26" => "-",
		"PROPERTY_CODE_#IBLOCK_ID_offers#" => array(
			0 => "",
			1 => "",
		),
		"CART_PROPERTIES_#IBLOCK_ID_offers#" => array(
			0 => "",
			1 => "",
		),
		"ADDITIONAL_PICT_PROP_#IBLOCK_ID_offers#" => "MORE_PHOTO",
		"OFFER_TREE_PROPS_#IBLOCK_ID_offers#" => array(
			0 => "-",
		),
		"IBLOCK_ID" => "5",
		"SECTION_ID" => "",
		"SECTION_CODE" => "",
		"PRODUCT_QUANTITY_VARIABLE" => "quantity",
		"COMPONENT_TEMPLATE" => "filter",
		"IBLOCK_TYPE" => "catalog",
		"SECTION_ELEMENT_ID" => "",
		"SECTION_ELEMENT_CODE" => "",
		"DEPTH" => "",
		"CACHE_TYPE" => "A",
		"CACHE_TIME" => "36000000",
		"CACHE_GROUPS" => "Y",
		"COMPOSITE_FRAME_MODE" => "A",
		"COMPOSITE_FRAME_TYPE" => "AUTO",
		"SHOW_PRODUCTS_5" => "Y",
		"PROPERTY_CODE_5" => array(
			0 => "",
			1 => "VES",
			2 => "VID_TSVETOV",
			3 => "VYSOTA",
			4 => "TSVET",
			5 => "MATERIAL",
			6 => "BLOG_POST_ID",
			7 => "CML2_ARTICLE",
			8 => "CML2_BASE_UNIT",
			9 => "VID_PRODUKTSII",
			10 => "MORE_PHOTO",
			11 => "BLOG_COMMENTS_CNT",
			12 => "FORUM_MESSAGE_CNT",
			13 => "CML2_MANUFACTURER",
			14 => "CML2_TRAITS",
			15 => "CML2_TAXES",
			16 => "FORUM_TOPIC_ID",
			17 => "FILES",
			18 => "CML2_ATTRIBUTES",
			19 => "CML2_BAR_CODE",
			20 => "",
		),
		"CART_PROPERTIES_5" => array(
			0 => "",
			1 => "",
		),
		"ADDITIONAL_PICT_PROP_5" => "MORE_PHOTO",
		"LABEL_PROP_5" => "-",
		"OFFER_TREE_PROPS_26" => array(
		)
	),
	false
);?>

<?$APPLICATION->ShowViewContent('paginator');?>

<div style="width:100%;margin-bottom:15px;" class="clearfix"></div>

<div id="ajaxpages_viewed" class="ajaxpages_viewed">
<?
global $APPLICATION,$JSON;
$IS_AJAXPAGES = 'N';
if($_REQUEST['ajaxpages']=='Y' && $_REQUEST['ajaxpagesid']=='ajaxpages_viewed')
{
	$IS_AJAXPAGES = 'Y';
	$JSON['TYPE'] = 'OK';
}
?>
<?$APPLICATION->IncludeComponent(
	"bitrix:catalog.section", 
	"gopro", 
	array(
		"IBLOCK_TYPE" => "catalog",
		"IBLOCK_ID" => "5",
		"SECTION_ID" => "",
		"SECTION_CODE" => "",
		"SECTION_USER_FIELDS" => array(
			0 => "",
			1 => "",
		),
		"ELEMENT_SORT_FIELD" => "sort",
		"ELEMENT_SORT_ORDER" => "asc",
		"ELEMENT_SORT_FIELD2" => "timestamp_x",
		"ELEMENT_SORT_ORDER2" => "asc",
		"FILTER_NAME" => "rsGoProViewedFilter",
		"INCLUDE_SUBSECTIONS" => "A",
		"SHOW_ALL_WO_SECTION" => "Y",
		"HIDE_NOT_AVAILABLE" => "N",
		"PAGE_ELEMENT_COUNT" => "10",
		"LINE_ELEMENT_COUNT" => "3",
		"PROPERTY_CODE" => array(
			0 => "CML2_ARTICLE",
			1 => "FORUM_MESSAGE_CNT",
			2 => "FORUM_TOPIC_ID",
			3 => "BRAND",
			4 => "YEAR",
			5 => "OS",
			6 => "WEIGHT",
			7 => "RSFAVORITE_COUNTER",
			8 => "HEIGHT",
			9 => "TICKNESS",
			10 => "WIDTH",
			11 => "DIAGONAL",
			12 => "SOLUTION",
			13 => "INTERNET_ACCESS",
			14 => "INTERFACES",
			15 => "NAVI",
			16 => "CARD",
			17 => "VIDEO",
			18 => "ACCESSORIES",
			19 => "POHOZHIE",
			20 => "BUY_WITH_THIS",
			21 => "YEARS",
			22 => "",
		),
		"OFFERS_LIMIT" => "0",
		"TEMPLATE_THEME" => "",
		"PRODUCT_SUBSCRIPTION" => "N",
		"SHOW_DISCOUNT_PERCENT" => "N",
		"SHOW_OLD_PRICE" => "N",
		"MESS_BTN_BUY" => "Купить",
		"MESS_BTN_ADD_TO_BASKET" => "В корзину",
		"MESS_BTN_SUBSCRIBE" => "Подписаться",
		"MESS_BTN_DETAIL" => "Подробнее",
		"MESS_NOT_AVAILABLE" => "Нет в наличии",
		"SECTION_URL" => "/#SECTION_CODE_PATH#/",
		"DETAIL_URL" => "/#SECTION_CODE_PATH#/#CODE#/",
		"SECTION_ID_VARIABLE" => "SECTION_ID",
		"AJAX_MODE" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "N",
		"AJAX_OPTION_HISTORY" => "N",
		"CACHE_TYPE" => "A",
		"CACHE_TIME" => "36000000",
		"CACHE_GROUPS" => "N",
		"SET_META_KEYWORDS" => "N",
		"META_KEYWORDS" => "",
		"SET_META_DESCRIPTION" => "N",
		"META_DESCRIPTION" => "",
		"BROWSER_TITLE" => "-",
		"ADD_SECTIONS_CHAIN" => "N",
		"DISPLAY_COMPARE" => "Y",
		"SET_TITLE" => "Y",
		"SET_STATUS_404" => "N",
		"CACHE_FILTER" => "N",
		"PRICE_CODE" => array(
		),
		"USE_PRICE_COUNT" => "N",
		"SHOW_PRICE_COUNT" => "1",
		"PRICE_VAT_INCLUDE" => "Y",
		"CONVERT_CURRENCY" => "N",
		"BASKET_URL" => "/personal/cart/",
		"ACTION_VARIABLE" => "action",
		"PRODUCT_ID_VARIABLE" => "id",
		"USE_PRODUCT_QUANTITY" => "Y",
		"ADD_PROPERTIES_TO_BASKET" => "N",
		"PRODUCT_PROPS_VARIABLE" => "prop",
		"PARTIAL_PRODUCT_PROPERTIES" => "N",
		"PRODUCT_PROPERTIES" => array(
		),
		"PAGER_TEMPLATE" => "gopro",
		"DISPLAY_TOP_PAGER" => "Y",
		"DISPLAY_BOTTOM_PAGER" => "Y",
		"PAGER_TITLE" => "Товары",
		"PAGER_SHOW_ALWAYS" => "N",
		"PAGER_DESC_NUMBERING" => "N",
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
		"PAGER_SHOW_ALL" => "Y",
		"OFFERS_FIELD_CODE" => array(
			0 => "ID",
			1 => "CODE",
			2 => "XML_ID",
			3 => "NAME",
			4 => "TAGS",
			5 => "SORT",
			6 => "PREVIEW_TEXT",
			7 => "PREVIEW_PICTURE",
			8 => "DETAIL_TEXT",
			9 => "DETAIL_PICTURE",
			10 => "DATE_ACTIVE_FROM",
			11 => "ACTIVE_FROM",
			12 => "DATE_ACTIVE_TO",
			13 => "ACTIVE_TO",
			14 => "SHOW_COUNTER",
			15 => "SHOW_COUNTER_START",
			16 => "IBLOCK_TYPE_ID",
			17 => "IBLOCK_ID",
			18 => "IBLOCK_CODE",
			19 => "IBLOCK_NAME",
			20 => "IBLOCK_EXTERNAL_ID",
			21 => "DATE_CREATE",
			22 => "CREATED_BY",
			23 => "CREATED_USER_NAME",
			24 => "TIMESTAMP_X",
			25 => "MODIFIED_BY",
			26 => "USER_NAME",
			27 => "",
		),
		"OFFERS_PROPERTY_CODE" => array(
			0 => "CML2_ARTICLE",
			1 => "MORE_PHOTO",
			2 => "COLOR_DIRECTORY",
			3 => "COLOR2_DIRECTORY",
			4 => "STORAGE",
			5 => "",
		),
		"OFFERS_SORT_FIELD" => "sort",
		"OFFERS_SORT_ORDER" => "asc",
		"OFFERS_SORT_FIELD2" => "id",
		"OFFERS_SORT_ORDER2" => "asc",
		"PROP_MORE_PHOTO" => "MORE_PHOTO",
		"PROP_ARTICLE" => "CML2_ARTICLE",
		"PROP_ACCESSORIES" => "-",
		"USE_FAVORITE" => "Y",
		"USE_SHARE" => "Y",
		"SHOW_ERROR_EMPTY_ITEMS" => "Y",
		"DONT_SHOW_LINKS" => "N",
		"USE_STORE" => "Y",
		"USE_MIN_AMOUNT" => "Y",
		"MIN_AMOUNT" => "10",
		"MAIN_TITLE" => "Наличие на складах",
		"PROP_SKU_MORE_PHOTO" => "MORE_PHOTO",
		"PROP_SKU_ARTICLE" => "CML2_ARTICLE",
		"PROPS_ATTRIBUTES" => array(
		),
		"OFFERS_CART_PROPERTIES" => array(
		),
		"PRODUCT_QUANTITY_VARIABLE" => "quantity",
		"AJAXPAGESID" => "ajaxpages_viewed",
		"IS_AJAXPAGES" => $IS_AJAXPAGES,
		"VIEW" => "showcase",
		"COMPONENT_TEMPLATE" => "gopro",
		"CUSTOM_FILTER" => "",
		"HIDE_NOT_AVAILABLE_OFFERS" => "N",
		"BACKGROUND_IMAGE" => "-",
		"SEF_MODE" => "N",
		"AJAX_OPTION_ADDITIONAL" => "",
		"SET_BROWSER_TITLE" => "Y",
		"SET_LAST_MODIFIED" => "N",
		"USE_MAIN_ELEMENT_SECTION" => "N",
		"EMPTY_ITEMS_HIDE_FIL_SORT" => "Y",
		"USE_AUTO_AJAXPAGES" => "N",
		"OFF_MEASURE_RATION" => "N",
		"COLUMNS5" => "N",
		"OFF_SMALLPOPUP" => "N",
		"PROPS_ATTRIBUTES_COLOR" => array(
		),
		"COMPOSITE_FRAME_MODE" => "A",
		"COMPOSITE_FRAME_TYPE" => "AUTO",
		"COMPARE_PATH" => "",
		"PAGER_BASE_LINK_ENABLE" => "N",
		"SHOW_404" => "N",
		"MESSAGE_404" => "",
		"COMPATIBLE_MODE" => "Y",
		"DISABLE_INIT_JS_IN_COMPONENT" => "N"
	),
	false
);?>
</div>
<?
if($IS_AJAXPAGES=='Y')
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

</div>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>