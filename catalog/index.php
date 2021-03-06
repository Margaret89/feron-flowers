<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("title", "Интернет-Магазин Feron-Flowers.ru");
$APPLICATION->SetTitle("Каталог товаров");
?><?$APPLICATION->IncludeComponent(
	"bitrix:catalog", 
	"gopro", 
	array(
		"ACTION_VARIABLE" => "action",
		"ADD_ELEMENT_CHAIN" => "Y",
		"ADD_PICT_PROP" => "MORE_PHOTO",
		"ADD_PROPERTIES_TO_BASKET" => "Y",
		"ADD_SECTIONS_CHAIN" => "Y",
		"AJAX_MODE" => "N",
		"AJAX_OPTION_ADDITIONAL" => "",
		"AJAX_OPTION_HISTORY" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "N",
		"ALSO_BUY_ELEMENT_COUNT" => "5",
		"ALSO_BUY_MIN_BUYES" => "2",
		"BASKET_URL" => "/personal/cart/",
		"BIGDATA_BLOCK_NAME" => "",
		"BIG_DATA_RCM_TYPE" => "bestsell",
		"CACHE_FILTER" => "Y",
		"CACHE_GROUPS" => "Y",
		"CACHE_TIME" => "3600",
		"CACHE_TYPE" => "A",
		"COMMON_ADD_TO_BASKET_ACTION" => "ADD",
		"COMMON_SHOW_CLOSE_POPUP" => "Y",
		"COMPARE_ELEMENT_SORT_FIELD" => "shows",
		"COMPARE_ELEMENT_SORT_ORDER" => "asc",
		"COMPARE_FIELD_CODE" => array(
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
		"COMPARE_NAME" => "CATALOG_COMPARE_LIST",
		"COMPARE_OFFERS_FIELD_CODE" => array(
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
			19 => "",
		),
		"COMPARE_OFFERS_PROPERTY_CODE" => array(
			0 => "",
			1 => "",
		),
		"COMPARE_POSITION" => "top left",
		"COMPARE_POSITION_FIXED" => "Y",
		"COMPARE_PROPERTY_CODE" => array(
			0 => "VID_PRODUKTSII",
			1 => "VES",
			2 => "VID_TSVETOV",
			3 => "DIAMETR",
			4 => "TSVET",
			5 => "MATERIAL",
			6 => "VYSOTA",
			7 => "CML2_ARTICLE",
			8 => "CML2_MANUFACTURER",
			9 => "CML2_ATTRIBUTES",
			10 => "CML2_BAR_CODE",
			11 => "KOMMENTPRODUCT",
			12 => "",
		),
		"COMPATIBLE_MODE" => "Y",
		"COMPONENT_TEMPLATE" => "gopro",
		"COMPOSITE_FRAME_MODE" => "A",
		"COMPOSITE_FRAME_TYPE" => "AUTO",
		"CONVERT_CURRENCY" => "Y",
		"CURRENCY_ID" => "RUB",
		"DETAIL_ADD_DETAIL_TO_SLIDER" => "Y",
		"DETAIL_ADD_TO_BASKET_ACTION" => array(
			0 => "ADD",
		),
		"DETAIL_ADD_TO_BASKET_ACTION_PRIMARY" => "",
		"DETAIL_BACKGROUND_IMAGE" => "-",
		"DETAIL_BRAND_USE" => "N",
		"DETAIL_BROWSER_TITLE" => "-",
		"DETAIL_CHECK_SECTION_ID_VARIABLE" => "N",
		"DETAIL_DETAIL_PICTURE_MODE" => array(
			0 => "POPUP",
			1 => "MAGNIFIER",
		),
		"DETAIL_DISPLAY_NAME" => "Y",
		"DETAIL_DISPLAY_PREVIEW_TEXT_MODE" => "H",
		"DETAIL_IMAGE_RESOLUTION" => "1by1",
		"DETAIL_MAIN_BLOCK_OFFERS_PROPERTY_CODE" => "",
		"DETAIL_MAIN_BLOCK_PROPERTY_CODE" => "",
		"DETAIL_META_DESCRIPTION" => "-",
		"DETAIL_META_KEYWORDS" => "-",
		"DETAIL_OFFERS_FIELD_CODE" => array(
			0 => "",
			1 => "",
		),
		"DETAIL_OFFERS_PROPERTY_CODE" => array(
			0 => "",
			1 => "",
		),
		"DETAIL_PRODUCT_INFO_BLOCK_ORDER" => "sku,props",
		"DETAIL_PRODUCT_PAY_BLOCK_ORDER" => "rating,price,priceRanges,quantityLimit,quantity,buttons",
		"DETAIL_PROPERTY_CODE" => array(
			0 => "VID_PRODUKTSII",
			1 => "V_KOROBKE",
			2 => "VES",
			3 => "VID_TSVETOV",
			4 => "DIAMETR",
			5 => "TSVET",
			6 => "MATERIAL",
			7 => "VYSOTA",
			8 => "CML2_ARTICLE",
			9 => "CML2_TRAITS",
			10 => "CML2_ATTRIBUTES",
			11 => "CML2_BAR_CODE",
			12 => "",
		),
		"DETAIL_SET_CANONICAL_URL" => "N",
		"DETAIL_SET_VIEWED_IN_COMPONENT" => "Y",
		"DETAIL_SHOW_BASIS_PRICE" => "Y",
		"DETAIL_SHOW_MAX_QUANTITY" => "N",
		"DETAIL_SHOW_POPULAR" => "N",
		"DETAIL_SHOW_SLIDER" => "Y",
		"DETAIL_SHOW_VIEWED" => "N",
		"DETAIL_SLIDER_INTERVAL" => "5000",
		"DETAIL_SLIDER_PROGRESS" => "Y",
		"DETAIL_STRICT_SECTION_CHECK" => "Y",
		"DETAIL_TABS_VIEW" => "tab",
		"DETAIL_USE_COMMENTS" => "Y",
		"DETAIL_USE_VOTE_RATING" => "Y",
		"DISABLE_INIT_JS_IN_COMPONENT" => "N",
		"DISCOUNT_PERCENT_POSITION" => "bottom-right",
		"DISPLAY_BOTTOM_PAGER" => "Y",
		"DISPLAY_ELEMENT_SELECT_BOX" => "Y",
		"DISPLAY_TOP_PAGER" => "Y",
		"ELEMENT_SORT_FIELD" => "id",
		"ELEMENT_SORT_FIELD2" => "id",
		"ELEMENT_SORT_FIELD_BOX" => "shows",
		"ELEMENT_SORT_FIELD_BOX2" => "shows",
		"ELEMENT_SORT_ORDER" => "asc",
		"ELEMENT_SORT_ORDER2" => "desc",
		"ELEMENT_SORT_ORDER_BOX" => "asc",
		"ELEMENT_SORT_ORDER_BOX2" => "asc",
		"FIELDS" => array(
			0 => "TITLE",
			1 => "ADDRESS",
			2 => "DESCRIPTION",
			3 => "PHONE",
			4 => "SCHEDULE",
			5 => "EMAIL",
			6 => "IMAGE_ID",
			7 => "COORDINATES",
			8 => "",
		),
		"FILTER_FIELD_CODE" => array(
			0 => "",
			1 => "",
		),
		"FILTER_FIXED" => "Y",
		"FILTER_HIDE_ON_MOBILE" => "N",
		"FILTER_NAME" => "arrFilter",
		"FILTER_OFFERS_FIELD_CODE" => array(
			0 => "",
			1 => "Комментарий",
			2 => "",
		),
		"FILTER_OFFERS_PROPERTY_CODE" => array(
			0 => "",
			1 => "",
		),
		"FILTER_PRICE_CODE" => array(
			0 => "Стоимость",
		),
		"FILTER_PRICE_GROUPED" => array(
			0 => "Стоимость",
		),
		"FILTER_PRICE_GROUPED_FOR" => "products",
		"FILTER_PROPERTY_CODE" => array(
			0 => "",
			1 => "KOMMENTPRODUCT",
			2 => "",
		),
		"FILTER_PROP_SCROLL" => array(
			0 => "VID_PRODUKTSII",
			1 => "VID_TSVETOV",
			2 => "VES",
			3 => "DIAMETR",
			4 => "TSVET",
			5 => "V_KOROBKE",
			6 => "MATERIAL",
			7 => "VYSOTA",
			8 => "CML2_BAR_CODE",
			9 => "CML2_ARTICLE",
			10 => "CML2_ATTRIBUTES",
		),
		"FILTER_PROP_SEARCH" => array(
			0 => "VID_PRODUKTSII",
			1 => "VID_TSVETOV",
			2 => "VES",
			3 => "DIAMETR",
			4 => "TSVET",
			5 => "V_KOROBKE",
			6 => "MATERIAL",
			7 => "VYSOTA",
			8 => "CML2_BAR_CODE",
			9 => "CML2_ARTICLE",
			10 => "CML2_TRAITS",
		),
		"FILTER_SKU_PROP_SCROLL" => array(
			0 => "DIAMETR",
			1 => "CML2_LINK",
			2 => "CML2_BAR_CODE",
			3 => "CML2_ARTICLE",
			4 => "CML2_ATTRIBUTES",
			5 => "CML2_TRAITS",
		),
		"FILTER_SKU_PROP_SEARCH" => array(
			0 => "DIAMETR",
			1 => "CML2_LINK",
			2 => "CML2_BAR_CODE",
			3 => "CML2_ARTICLE",
			4 => "CML2_TRAITS",
			5 => "CML2_BASE_UNIT",
			6 => "CML2_TAXES",
		),
		"FILTER_USE_AJAX" => "Y",
		"FILTER_VIEW_MODE" => "VERTICAL",
		"FORUM_ID" => "",
		"GIFTS_DETAIL_BLOCK_TITLE" => "Выберите один из подарков",
		"GIFTS_DETAIL_HIDE_BLOCK_TITLE" => "N",
		"GIFTS_DETAIL_PAGE_ELEMENT_COUNT" => "3",
		"GIFTS_DETAIL_TEXT_LABEL_GIFT" => "Подарок",
		"GIFTS_MAIN_PRODUCT_DETAIL_BLOCK_TITLE" => "Выберите один из товаров, чтобы получить подарок",
		"GIFTS_MAIN_PRODUCT_DETAIL_HIDE_BLOCK_TITLE" => "N",
		"GIFTS_MAIN_PRODUCT_DETAIL_PAGE_ELEMENT_COUNT" => "3",
		"GIFTS_MESS_BTN_BUY" => "Выбрать",
		"GIFTS_SECTION_LIST_BLOCK_TITLE" => "Подарки к товарам этого раздела",
		"GIFTS_SECTION_LIST_HIDE_BLOCK_TITLE" => "N",
		"GIFTS_SECTION_LIST_PAGE_ELEMENT_COUNT" => "3",
		"GIFTS_SECTION_LIST_TEXT_LABEL_GIFT" => "Подарок",
		"GIFTS_SHOW_DISCOUNT_PERCENT" => "Y",
		"GIFTS_SHOW_IMAGE" => "Y",
		"GIFTS_SHOW_NAME" => "Y",
		"GIFTS_SHOW_OLD_PRICE" => "Y",
		"HIDE_NOT_AVAILABLE" => "Y",
		"HIDE_NOT_AVAILABLE_OFFERS" => "Y",
		"HIGHLOAD" => "HIGHLOAD_TYPE_SELECT",
		"IBLOCK_ID" => "5",
		"IBLOCK_TYPE" => "catalog",
		"INCLUDE_SUBSECTIONS" => "A",
		"INSTANT_RELOAD" => "Y",
		"LABEL_PROP" => "",
		"LABEL_PROP_MOBILE" => "",
		"LABEL_PROP_POSITION" => "top-left",
		"LAZY_LOAD" => "N",
		"LINE_ELEMENT_COUNT" => "5",
		"LINK_ELEMENTS_URL" => "link.php?PARENT_ELEMENT_ID=#ELEMENT_ID#",
		"LINK_IBLOCK_ID" => "5",
		"LINK_IBLOCK_TYPE" => "catalog",
		"LINK_PROPERTY_SID" => "CML2_LINK",
		"LIST_BROWSER_TITLE" => "NAME",
		"LIST_ENLARGE_PRODUCT" => "STRICT",
		"LIST_META_DESCRIPTION" => "-",
		"LIST_META_KEYWORDS" => "-",
		"LIST_OFFERS_FIELD_CODE" => array(
			0 => "",
			1 => "",
		),
		"LIST_OFFERS_LIMIT" => "0",
		"LIST_OFFERS_PROPERTY_CODE" => array(
			0 => "",
			1 => "",
		),
		"LIST_PRODUCT_BLOCKS_ORDER" => "price,props,sku,quantityLimit,quantity,buttons,compare",
		"LIST_PRODUCT_ROW_VARIANTS" => "[{'VARIANT':'2','BIG_DATA':false},{'VARIANT':'2','BIG_DATA':false},{'VARIANT':'2','BIG_DATA':false},{'VARIANT':'2','BIG_DATA':false},{'VARIANT':'2','BIG_DATA':false},{'VARIANT':'2','BIG_DATA':false},{'VARIANT':'2','BIG_DATA':false},{'VARIANT':'2','BIG_DATA':false},{'VARIANT':'2','BIG_DATA':false},{'VARIANT':'2','BIG_DATA':false}]",
		"LIST_PROPERTY_CODE" => array(
			0 => "VID_PRODUKTSII",
			1 => "V_KOROBKE",
			2 => "VES",
			3 => "VID_TSVETOV",
			4 => "DIAMETR",
			5 => "TSVET",
			6 => "MATERIAL",
			7 => "VYSOTA",
			8 => "CML2_ARTICLE",
			9 => "CML2_BAR_CODE",
			10 => "",
		),
		"LIST_PROPERTY_CODE_MOBILE" => "",
		"LIST_SHOW_SLIDER" => "N",
		"LIST_SLIDER_INTERVAL" => "3000",
		"LIST_SLIDER_PROGRESS" => "N",
		"LOAD_ON_SCROLL" => "N",
		"MAIN_TITLE" => "Наличие",
		"MESSAGES_PER_PAGE" => "4",
		"MESSAGE_404" => "",
		"MESS_BTN_ADD_TO_BASKET" => "В корзину",
		"MESS_BTN_BUY" => "Купить",
		"MESS_BTN_COMPARE" => "Сравнение",
		"MESS_BTN_DETAIL" => "Подробнее",
		"MESS_BTN_SUBSCRIBE" => "Подписаться",
		"MESS_COMMENTS_TAB" => "Отзывы",
		"MESS_DESCRIPTION_TAB" => "Описание",
		"MESS_NOT_AVAILABLE" => "Нет в наличии",
		"MESS_PRICE_RANGES_TITLE" => "Цены",
		"MESS_PROPERTIES_TAB" => "Характеристики",
		"MESS_SHOW_MAX_QUANTITY" => "Наличие",
		"MIN_AMOUNT" => "5",
		"MODS_BLOCK_NAME" => "",
		"OFFERS_CART_PROPERTIES" => array(
		),
		"OFFERS_SORT_FIELD" => "shows",
		"OFFERS_SORT_FIELD2" => "shows",
		"OFFERS_SORT_ORDER" => "asc",
		"OFFERS_SORT_ORDER2" => "asc",
		"OFFER_ADD_PICT_PROP" => "MORE_PHOTO",
		"OFFER_TREE_PROPS" => "",
		"OFF_MEASURE_RATION" => "N",
		"OFF_SMALLPOPUP" => "N",
		"PAGER_BASE_LINK" => "",
		"PAGER_BASE_LINK_ENABLE" => "N",
		"PAGER_DESC_NUMBERING" => "N",
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "3600",
		"PAGER_PARAMS_NAME" => "arrPager",
		"PAGER_SHOW_ALL" => "Y",
		"PAGER_SHOW_ALWAYS" => "Y",
		"PAGER_TEMPLATE" => "gopro",
		"PAGER_TITLE" => "Товары",
		"PAGE_ELEMENT_COUNT" => "30",
		"PARTIAL_PRODUCT_PROPERTIES" => "N",
		"PATH_TO_SMILE" => "/bitrix/images/forum/smile/",
		"PRICE_CODE" => array(
			0 => "Стоимость",
		),
		"PRICE_VAT_INCLUDE" => "Y",
		"PRICE_VAT_SHOW_VALUE" => "N",
		"PRODUCT_DISPLAY_MODE" => "Y",
		"PRODUCT_ID_VARIABLE" => "id",
		"PRODUCT_PROPERTIES" => array(
			0 => "VYBOR_PO_FOTO",
			1 => "TSVET",
		),
		"PRODUCT_PROPS_VARIABLE" => "add",
		"PRODUCT_QUANTITY_VARIABLE" => "quantity",
		"PRODUCT_SUBSCRIPTION" => "Y",
		"PROPS_ATTRIBUTES" => array(
			0 => "DIAMETR",
			1 => "CML2_BAR_CODE",
			2 => "CML2_ARTICLE",
			3 => "CML2_MANUFACTURER",
		),
		"PROPS_ATTRIBUTES_COLOR" => array(
		),
		"PROPS_FILTER_COLORS" => array(
		),
		"PROPS_SKU_FILTER_COLORS" => array(
		),
		"PROPS_TABS" => array(
			0 => "VID_TSVETOV",
			1 => "VES",
			2 => "DIAMETR",
			3 => "TSVET",
			4 => "V_KOROBKE",
			5 => "MATERIAL",
			6 => "VYSOTA",
			7 => "CML2_ARTICLE",
			8 => "CML2_MANUFACTURER",
		),
		"PROP_ARTICLE" => "CML2_ARTICLE",
		"PROP_MORE_PHOTO" => "MORE_PHOTO",
		"PROP_SKU_ARTICLE" => "CML2_ARTICLE",
		"PROP_SKU_MORE_PHOTO" => "MORE_PHOTO",
		"REVIEW_AJAX_POST" => "N",
		"SEARCH_CHECK_DATES" => "Y",
		"SEARCH_NO_WORD_LOGIC" => "Y",
		"SEARCH_PAGE_RESULT_COUNT" => "50",
		"SEARCH_RESTART" => "N",
		"SEARCH_USE_LANGUAGE_GUESS" => "Y",
		"SECTIONS_HIDE_SECTION_NAME" => "N",
		"SECTIONS_SHOW_PARENT_NAME" => "Y",
		"SECTIONS_VIEW_MODE" => "VIEW_ELEMENTS",
		"SECTION_ADD_TO_BASKET_ACTION" => "ADD",
		"SECTION_BACKGROUND_IMAGE" => "-",
		"SECTION_COUNT_ELEMENTS" => "N",
		"SECTION_ID_VARIABLE" => "SECTION_ID",
		"SECTION_TOP_DEPTH" => "3",
		"SEF_FOLDER" => "/catalog/",
		"SEF_MODE" => "Y",
		"SET_LAST_MODIFIED" => "Y",
		"SET_STATUS_404" => "Y",
		"SET_TITLE" => "Y",
		"SHORT_SORTER" => "N",
		"SHOW_404" => "N",
		"SHOW_DEACTIVATED" => "N",
		"SHOW_DISCOUNT_PERCENT" => "Y",
		"SHOW_EMPTY_STORE" => "N",
		"SHOW_ERROR_EMPTY_ITEMS" => "N",
		"SHOW_GENERAL_STORE_INFORMATION" => "N",
		"SHOW_LINK_TO_FORUM" => "N",
		"SHOW_MAX_QUANTITY" => "Y",
		"SHOW_OLD_PRICE" => "Y",
		"SHOW_PREVIEW_TEXT" => "Y",
		"SHOW_PRICE_COUNT" => "1",
		"SHOW_TOP_ELEMENTS" => "Y",
		"SIDEBAR_DETAIL_SHOW" => "Y",
		"SIDEBAR_PATH" => "",
		"SIDEBAR_SECTION_SHOW" => "Y",
		"SOC_SHARE_ICON" => array(
			0 => "vkontakte",
			1 => "facebook",
		),
		"SORTER_CNT_TEMPLATES" => "3",
		"SORTER_DEFAULT_TEMPLATE" => "",
		"SORTER_OFF_OUTPUT_OF_SHOW" => "N",
		"SORTER_OFF_SORT_BY" => "N",
		"SORTER_OUTPUT_OF" => array(
		),
		"SORTER_OUTPUT_OF_DEFAULT" => "20",
		"SORTER_TEMPLATE_NAME_1" => "",
		"SORTER_TEMPLATE_NAME_2" => "",
		"SORTER_TEMPLATE_NAME_3" => "",
		"STORES" => array(
			0 => "",
			1 => "",
		),
		"STORE_PATH" => "/store/#store_id#",
		"TEMPLATE_THEME" => "site",
		"TOP_ADD_TO_BASKET_ACTION" => "ADD",
		"TOP_ELEMENT_COUNT" => "9",
		"TOP_ELEMENT_SORT_FIELD" => "shows",
		"TOP_ELEMENT_SORT_FIELD2" => "shows",
		"TOP_ELEMENT_SORT_ORDER" => "asc",
		"TOP_ELEMENT_SORT_ORDER2" => "asc",
		"TOP_ENLARGE_PRODUCT" => "STRICT",
		"TOP_LINE_ELEMENT_COUNT" => "5",
		"TOP_OFFERS_FIELD_CODE" => array(
			0 => "",
			1 => "",
		),
		"TOP_OFFERS_LIMIT" => "0",
		"TOP_OFFERS_PROPERTY_CODE" => array(
			0 => "",
			1 => "",
		),
		"TOP_PRODUCT_BLOCKS_ORDER" => "price,props,sku,quantityLimit,quantity,buttons,compare",
		"TOP_PRODUCT_ROW_VARIANTS" => "[{'VARIANT':'2','BIG_DATA':false},{'VARIANT':'2','BIG_DATA':false},{'VARIANT':'2','BIG_DATA':false}]",
		"TOP_PROPERTY_CODE" => array(
			0 => "",
			1 => "",
		),
		"TOP_PROPERTY_CODE_MOBILE" => "",
		"TOP_ROTATE_TIMER" => "30",
		"TOP_SHOW_SLIDER" => "Y",
		"TOP_SLIDER_INTERVAL" => "3000",
		"TOP_SLIDER_PROGRESS" => "Y",
		"TOP_VIEW_MODE" => "BANNER",
		"URL_TEMPLATES_READ" => "",
		"USER_CONSENT" => "Y",
		"USER_CONSENT_ID" => "1",
		"USER_CONSENT_IS_CHECKED" => "Y",
		"USER_CONSENT_IS_LOADED" => "N",
		"USER_FIELDS" => array(
			0 => "",
			1 => "",
		),
		"USE_ALSO_BUY" => "N",
		"USE_AUTO_AJAXPAGES" => "N",
		"USE_BIG_DATA" => "N",
		"USE_BLOCK_BIGDATA" => "N",
		"USE_BLOCK_MODS" => "N",
		"USE_CAPTCHA" => "Y",
		"USE_CHEAPER" => "N",
		"USE_COMMON_SETTINGS_BASKET_POPUP" => "N",
		"USE_COMPARE" => "Y",
		"USE_ELEMENT_COUNTER" => "Y",
		"USE_ENHANCED_ECOMMERCE" => "N",
		"USE_FAVORITE" => "Y",
		"USE_FILTER" => "Y",
		"USE_GIFTS_DETAIL" => "N",
		"USE_GIFTS_MAIN_PR_SECTION_LIST" => "N",
		"USE_GIFTS_SECTION" => "N",
		"USE_MAIN_ELEMENT_SECTION" => "Y",
		"USE_MIN_AMOUNT" => "N",
		"USE_PRICE_COUNT" => "N",
		"USE_PRODUCT_QUANTITY" => "Y",
		"USE_REVIEW" => "Y",
		"USE_SALE_BESTSELLERS" => "Y",
		"USE_SHARE" => "Y",
		"USE_STORE" => "Y",
		"USE_STORE_PHONE" => "N",
		"USE_STORE_SCHEDULE" => "N",
		"SHOW_SKU_DESCRIPTION" => "N",
		"SEF_URL_TEMPLATES" => array(
			"sections" => "/catalog/",
			"section" => "#SECTION_CODE_PATH#/",
			"element" => "#SECTION_CODE_PATH#/#ELEMENT_CODE#/",
			"compare" => "compare.php?action=#ACTION_CODE#",
			"smart_filter" => "#SECTION_CODE_PATH#/filter/#SMART_FILTER_PATH#/apply/",
		),
		"VARIABLE_ALIASES" => array(
			"compare" => array(
				"ACTION_CODE" => "action",
			),
		),
		"DETAIL_BLOG_USE" => "Y"
	),
	false
);?><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>