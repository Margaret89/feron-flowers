<?if(!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED!==true)die();
$this->setFrameMode(true);
global $APPLICATION,$JSON;

if (Bitrix\Main\Loader::includeModule( "sotbit.regions" ) ) 
{ 
 $arResult = \Sotbit\Regions\Sale\Price::change( $arResult ); 
} 
if ($_SESSION["SOTBIT_REGIONS"]["STORE"]) { 
        $arParams['STORES'] = $_SESSION["SOTBIT_REGIONS"]["STORE"]; 
    }

if( \Bitrix\Main\Loader::includeModule('iblock') )
{
	// take data about curent section
	if(\Bitrix\Main\Loader::includeModule('iblock'))
	{
		$arFilter = array(
			'IBLOCK_ID' => $arParams['IBLOCK_ID'],
			'ACTIVE' => 'Y',
			'GLOBAL_ACTIVE' => 'Y',
		);
		if(IntVal($arResult['VARIABLES']['SECTION_ID'])>0)
		{
			$arFilter['ID'] = $arResult['VARIABLES']['SECTION_ID'];
		} elseif($arResult['VARIABLES']['SECTION_CODE']!='') {
			$arFilter['=CODE'] = $arResult['VARIABLES']['SECTION_CODE'];
		}
		$obCache = new CPHPCache();
		if($obCache->InitCache(36000, serialize($arFilter) ,'/iblock/catalog'))
		{
			$arCurSection = $obCache->GetVars();
		} elseif($obCache->StartDataCache()) {
			$arCurSection = array();
			$dbRes = CIBlockSection::GetList(array(), $arFilter, false, array('ID','LEFT_MARGIN','RIGHT_MARGIN'));
			if(defined('BX_COMP_MANAGED_CACHE'))
			{
				global $CACHE_MANAGER;
				$CACHE_MANAGER->StartTagCache('/iblock/catalog');
				if ($arCurSection = $dbRes->GetNext())
				{
					$CACHE_MANAGER->RegisterTag('iblock_id_'.$arParams['IBLOCK_ID']);
				}
				$CACHE_MANAGER->EndTagCache();
			} else {
				if(!$arCurSection = $dbRes->GetNext())
				{
					$arCurSection = array();
				}
			}
			$obCache->EndDataCache($arCurSection);
		}
	}
	// /take data about curent section
}


?><div class="catalog clearfix" id="catalog"><?
	if( $arParams['SECTIONS_VIEW_MODE']=='VIEW_SECTIONS' && ( ($arCurSection['RIGHT_MARGIN']-$arCurSection['LEFT_MARGIN'])>1 ) )
	{
		$APPLICATION->IncludeComponent(
			'bitrix:catalog.section.list',
			'gopro',
			array(
				'IBLOCK_TYPE' => $arParams['IBLOCK_TYPE'],
				'IBLOCK_ID' => $arParams['IBLOCK_ID'],
				'SECTION_ID' => $arResult['VARIABLES']['SECTION_ID'],
				'SECTION_CODE' => $arResult['VARIABLES']['SECTION_CODE'],
				'CACHE_TYPE' => $arParams['CACHE_TYPE'],
				'CACHE_TIME' => $arParams['CACHE_TIME'],
				'CACHE_GROUPS' => $arParams['CACHE_GROUPS'],
				'COUNT_ELEMENTS' => $arParams['SECTION_COUNT_ELEMENTS'],
				'TOP_DEPTH' => $arParams['SECTION_TOP_DEPTH'],
				'SECTION_URL' => $arResult['FOLDER'].$arResult['URL_TEMPLATES']['section'],
				'SET_TITLE' => $arParams['SET_TITLE'],
			),
			$component,
			array('HIDE_ICONS'=>'Y')
		);
		
	} else { // VIEW_MODE
		
		$IS_AJAX_CATALOG = false;
		// isset($_SERVER['HTTP_X_REQUESTED_WITH'])
		if( $_REQUEST['AJAX_CALL']=='Y' && $_REQUEST['get']=='catalog' )
		{
			$APPLICATION->RestartBuffer();
			$IS_AJAX_CATALOG = true;
		}
		?><div class="sidebar"><?
		$APPLICATION->IncludeComponent(
			'bitrix:catalog.section.list',
			'lines',
			Array(
				'IBLOCK_TYPE' => $arParams['IBLOCK_TYPE'],
				'IBLOCK_ID' => $arParams['IBLOCK_ID'],
				'SECTION_ID' => $arResult['VARIABLES']['SECTION_ID'],
				'SECTION_CODE' => $arResult['VARIABLES']['SECTION_CODE'],
				'CACHE_TYPE' => $arParams['CACHE_TYPE'],
				'CACHE_TIME' => $arParams['CACHE_TIME'],
				'CACHE_GROUPS' => $arParams['CACHE_GROUPS'],
				'COUNT_ELEMENTS' => $arParams['SECTION_COUNT_ELEMENTS'],
				'TOP_DEPTH' => '10',
				'SECTION_URL' => $arResult['FOLDER'].$arResult['URL_TEMPLATES']['section'],
			),
			$component
		);
		if($arParams['USE_FILTER']=='Y') {
			?><?$APPLICATION->IncludeComponent(
				'bitrix:catalog.smart.filter',
				'gopro',
				array(
					'IBLOCK_TYPE' => $arParams['IBLOCK_TYPE'],
					'IBLOCK_ID' => $arParams['IBLOCK_ID'],
					'SECTION_ID' => $arCurSection['ID'],
					'FILTER_NAME' => $arParams['FILTER_NAME'],
					'PRICE_CODE' => $arParams['FILTER_PRICE_CODE'],
					'CACHE_TYPE' => $arParams['CACHE_TYPE'],
					'CACHE_TIME' => $arParams['CACHE_TIME'],
					'CACHE_GROUPS' => $arParams['CACHE_GROUPS'],
					'SAVE_IN_SESSION' => 'N',
					'HIDE_NOT_AVAILABLE' => $arParams["HIDE_NOT_AVAILABLE"],
					// simple
					'PROPS_FILTER_COLORS' => $arParams['PROPS_FILTER_COLORS'],
					'FILTER_PRICE_GROUPED' => $arParams['FILTER_PRICE_GROUPED'],
					'FILTER_PRICE_GROUPED_FOR' => $arParams['FILTER_PRICE_GROUPED_FOR'],
					'FILTER_PROP_SCROLL' => $arParams['FILTER_PROP_SCROLL'],
					'FILTER_PROP_SEARCH' => $arParams['FILTER_PROP_SEARCH'],
					'FILTER_FIXED' => $arParams['FILTER_FIXED'],
					'FILTER_USE_AJAX' => $arParams['FILTER_USE_AJAX'],
					'FILTER_DISABLED_PIC_EFFECT' => $arParams['FILTER_DISABLED_PIC_EFFECT'],
					// offers
					'PROPS_SKU_FILTER_COLORS' => $arParams['PROPS_SKU_FILTER_COLORS'],
					'FILTER_SKU_PROP_SCROLL' => $arParams['FILTER_SKU_PROP_SCROLL'],
					'FILTER_SKU_PROP_SEARCH' => $arParams['FILTER_SKU_PROP_SEARCH'],
					// compare
					'USE_COMPARE' => $arParams['USE_COMPARE'],
					'CONVERT_CURRENCY' => $arParams['CONVERT_CURRENCY'],
					'CURRENCY_ID' => $arParams['CURRENCY_ID'],
					//chpu url
					"SEF_MODE" => $arParams["SEF_MODE"],
					"SEF_RULE" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["smart_filter"],
					"SMART_FILTER_PATH" => $arResult["VARIABLES"]["SMART_FILTER_PATH"],
				),
				$component
			);?><?
		}
		?></div><?
		
		?><div class="prods" id="prods"><?
//$frame = $this->createFrame('prods',false)->begin('<img class="ajax_loader" src="'.SITE_TEMPLATE_PATH.'/img/ajax-loader.gif" />');
//\Bitrix\Main\Page\Frame::getInstance()->startDynamicWithID('prods');
$APPLICATION->ShowViewContent('catalog_section_list_descr');
			?><div class="mix clearfix"><?
				?><div class="borlef"><?
					?><div class="compareandpaginator clearfix"><?
						if($arParams['USE_COMPARE']=='Y')
						{
							?><div id="compare" class="compare"><?
							$APPLICATION->IncludeComponent('bitrix:catalog.compare.list', 'gopro', array(
								'IBLOCK_TYPE' => $arParams['IBLOCK_TYPE'],
								'IBLOCK_ID' => $arParams['IBLOCK_ID'],
								'NAME' => $arParams['COMPARE_NAME'],
								'DETAIL_URL' => $arResult['FOLDER'].$arResult['URL_TEMPLATES']['element'],
								'COMPARE_URL' => $arResult['FOLDER'].$arResult['URL_TEMPLATES']['compare'],
								'PROPCODE_MORE_PHOTO' => $arParams['PROPCODE_MORE_PHOTO'],
								'PROPCODE_SKU_MORE_PHOTO' => $arParams['PROPCODE_SKU_MORE_PHOTO'],
								),
								null,
								array('HIDE_ICONS'=>'Y')
							);
							?></div><?
						}
					?></div><?
				?></div><?
global $alfaCTemplate, $alfaCSortType, $alfaCSortToo, $alfaCOutput;
$arOutupVariables = array(0 => "10",1 => "20",2 => "30");
if(is_array($arParams['SORTER_OUTPUT_OF']) && count($arParams['SORTER_OUTPUT_OF'])>0){
	$arOutupVariables = $arParams['SORTER_OUTPUT_OF'];
}
$APPLICATION->IncludeComponent(
	"redsign:catalog.sorter", 
	"gopro", 
	array(
		"ALFA_ACTION_PARAM_NAME" => "alfaction",
		"ALFA_ACTION_PARAM_VALUE" => "alfavalue",
		"ALFA_CHOSE_TEMPLATES_SHOW" => "Y",
		"ALFA_CNT_TEMPLATES" => (isset($arParams["SORTER_CNT_TEMPLATES"])?$arParams["SORTER_CNT_TEMPLATES"]:"3"),
		"ALFA_DEFAULT_TEMPLATE" => $arParams["SORTER_DEFAULT_TEMPLATE"],
		"ALFA_CNT_TEMPLATES_0" => $arParams["SORTER_TEMPLATE_NAME_3"],
		"ALFA_CNT_TEMPLATES_NAME_0" => "table",
		"ALFA_CNT_TEMPLATES_1" => $arParams["SORTER_TEMPLATE_NAME_2"],
		"ALFA_CNT_TEMPLATES_NAME_1" => "gallery",
		"ALFA_CNT_TEMPLATES_2" => $arParams["SORTER_TEMPLATE_NAME_1"],
		"ALFA_CNT_TEMPLATES_NAME_2" => "showcase",
		"ALFA_SORT_BY_SHOW" => "Y",
		"ALFA_SHORT_SORTER" => "Y",
		"ALFA_SORT_BY_NAME" => array(
			0 => "sort",
			1 => "name",
			2 => "CATALOG_PRICE_2",
			3 => "",
		),
		"ALFA_SORT_BY_DEFAULT" => "sort_asc",
		"ALFA_OUTPUT_OF_SHOW" => "Y",
		"ALFA_OUTPUT_OF" => array(
			0 => "20",
			1 => "50",
			2 => "100",
			3 => "",
			4 => "",
		),
		"ALFA_OUTPUT_OF_DEFAULT" => (isset($arParams["SORTER_OUTPUT_OF_DEFAULT"])?$arParams["SORTER_OUTPUT_OF_DEFAULT"]:"20"),
		"ALFA_OUTPUT_OF_SHOW_ALL" => "Y",
		"ALFA_DONT_REDIRECT" => "Y",
		"AJAXPAGESID" => "ajaxpages_gmci",
		"COMPONENT_TEMPLATE" => "gopro",
		"COMPOSITE_FRAME_MODE" => "A",
		"COMPOSITE_FRAME_TYPE" => "AUTO"
	),
	false
);
			?></div><?
			?><div id="ajaxpages_gmci" class="ajaxpages_gmci"><?
$IS_SORTERCHANGE = 'N';
if($_REQUEST['AJAX_CALL']=='Y' && $_REQUEST['sorterchange']=='ajaxpages_gmci')
{
	$IS_SORTERCHANGE = 'Y';
	$JSON['TYPE'] = 'OK';
}
if($_REQUEST['ajaxpages']=='Y' && $_REQUEST['ajaxpagesid']=='ajaxpages_gmci')
{
	$IS_AJAXPAGES = 'Y';
	$JSON['TYPE'] = 'OK';
}
				$intSectionID = 0;
				?>
				<?$intSectionID = $APPLICATION->IncludeComponent(
					'bitrix:catalog.section',
					'gopronew',
					array(
						"IBLOCK_TYPE" => $arParams["IBLOCK_TYPE"],
					"IBLOCK_ID" => $arParams["IBLOCK_ID"],

						'ELEMENT_SORT_FIELD' => $alfaCSortType,//$arParams['ELEMENT_SORT_FIELD'],
						'ELEMENT_SORT_ORDER' => $alfaCSortToo,//$arParams['ELEMENT_SORT_ORDER'],
					"ELEMENT_SORT_FIELD2" => $arParams["ELEMENT_SORT_FIELD2"],
					"ELEMENT_SORT_ORDER2" => $arParams["ELEMENT_SORT_ORDER2"],
					"PROPERTY_CODE" => $arParams["LIST_PROPERTY_CODE"],
					"PROPERTY_CODE_MOBILE" => $arParams["LIST_PROPERTY_CODE_MOBILE"],
					"META_KEYWORDS" => $arParams["LIST_META_KEYWORDS"],
					"META_DESCRIPTION" => $arParams["LIST_META_DESCRIPTION"],
					"BROWSER_TITLE" => $arParams["LIST_BROWSER_TITLE"],
					"SET_LAST_MODIFIED" => $arParams["SET_LAST_MODIFIED"],
					"INCLUDE_SUBSECTIONS" => $arParams["INCLUDE_SUBSECTIONS"],
					"BASKET_URL" => $arParams["BASKET_URL"],
					"ACTION_VARIABLE" => $arParams["ACTION_VARIABLE"],
					"PRODUCT_ID_VARIABLE" => $arParams["PRODUCT_ID_VARIABLE"],
					"SECTION_ID_VARIABLE" => $arParams["SECTION_ID_VARIABLE"],
					"PRODUCT_QUANTITY_VARIABLE" => $arParams["PRODUCT_QUANTITY_VARIABLE"],
					"PRODUCT_PROPS_VARIABLE" => $arParams["PRODUCT_PROPS_VARIABLE"],
					"FILTER_NAME" => $arParams["FILTER_NAME"],
					"CACHE_TYPE" => $arParams["CACHE_TYPE"],
					"CACHE_TIME" => $arParams["CACHE_TIME"],
					"CACHE_FILTER" => $arParams["CACHE_FILTER"],
					"CACHE_GROUPS" => $arParams["CACHE_GROUPS"],
					"SET_TITLE" => $arParams["SET_TITLE"],
					"MESSAGE_404" => $arParams["~MESSAGE_404"],
					"SET_STATUS_404" => $arParams["SET_STATUS_404"],
					"SHOW_404" => $arParams["SHOW_404"],
					"FILE_404" => $arParams["FILE_404"],
					"DISPLAY_COMPARE" => $arParams["USE_COMPARE"],
					'PAGE_ELEMENT_COUNT' => $alfaCOutput,//$arParams['PAGE_ELEMENT_COUNT'],
					"LINE_ELEMENT_COUNT" => $arParams["LINE_ELEMENT_COUNT"],
					"PRICE_CODE" => $arParams["PRICE_CODE"],
					"USE_PRICE_COUNT" => $arParams["USE_PRICE_COUNT"],
					"SHOW_PRICE_COUNT" => $arParams["SHOW_PRICE_COUNT"],

					"PRICE_VAT_INCLUDE" => $arParams["PRICE_VAT_INCLUDE"],
					"USE_PRODUCT_QUANTITY" => $arParams['USE_PRODUCT_QUANTITY'],
					"ADD_PROPERTIES_TO_BASKET" => (isset($arParams["ADD_PROPERTIES_TO_BASKET"]) ? $arParams["ADD_PROPERTIES_TO_BASKET"] : ''),
					"PARTIAL_PRODUCT_PROPERTIES" => (isset($arParams["PARTIAL_PRODUCT_PROPERTIES"]) ? $arParams["PARTIAL_PRODUCT_PROPERTIES"] : ''),
					"PRODUCT_PROPERTIES" => $arParams["PRODUCT_PROPERTIES"],

					"DISPLAY_TOP_PAGER" => $arParams["DISPLAY_TOP_PAGER"],
					"DISPLAY_BOTTOM_PAGER" => $arParams["DISPLAY_BOTTOM_PAGER"],
					"PAGER_TITLE" => $arParams["PAGER_TITLE"],
					"PAGER_SHOW_ALWAYS" => $arParams["PAGER_SHOW_ALWAYS"],
					"PAGER_TEMPLATE" => $arParams["PAGER_TEMPLATE"],
					"PAGER_DESC_NUMBERING" => $arParams["PAGER_DESC_NUMBERING"],
					"PAGER_DESC_NUMBERING_CACHE_TIME" => $arParams["PAGER_DESC_NUMBERING_CACHE_TIME"],
					"PAGER_SHOW_ALL" => $arParams["PAGER_SHOW_ALL"],
					"PAGER_BASE_LINK_ENABLE" => $arParams["PAGER_BASE_LINK_ENABLE"],
					"PAGER_BASE_LINK" => $arParams["PAGER_BASE_LINK"],
					"PAGER_PARAMS_NAME" => $arParams["PAGER_PARAMS_NAME"],
					"LAZY_LOAD" => $arParams["LAZY_LOAD"],
					"MESS_BTN_LAZY_LOAD" => $arParams["~MESS_BTN_LAZY_LOAD"],
					"LOAD_ON_SCROLL" => $arParams["LOAD_ON_SCROLL"],

					"OFFERS_CART_PROPERTIES" => $arParams["OFFERS_CART_PROPERTIES"],
					"OFFERS_FIELD_CODE" => $arParams["LIST_OFFERS_FIELD_CODE"],
					"OFFERS_PROPERTY_CODE" => $arParams["LIST_OFFERS_PROPERTY_CODE"],
					"OFFERS_SORT_FIELD" => $arParams["OFFERS_SORT_FIELD"],
					"OFFERS_SORT_ORDER" => $arParams["OFFERS_SORT_ORDER"],
					"OFFERS_SORT_FIELD2" => $arParams["OFFERS_SORT_FIELD2"],
					"OFFERS_SORT_ORDER2" => $arParams["OFFERS_SORT_ORDER2"],
					"OFFERS_LIMIT" => $arParams["LIST_OFFERS_LIMIT"],

					"SECTION_ID" => $arResult["VARIABLES"]["SECTION_ID"],
					"SECTION_CODE" => $arResult["VARIABLES"]["SECTION_CODE"],
					"SECTION_URL" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["section"],
					"DETAIL_URL" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["element"],
					"USE_MAIN_ELEMENT_SECTION" => $arParams["USE_MAIN_ELEMENT_SECTION"],
					'CONVERT_CURRENCY' => $arParams['CONVERT_CURRENCY'],
					'CURRENCY_ID' => $arParams['CURRENCY_ID'],
					'HIDE_NOT_AVAILABLE' => $arParams["HIDE_NOT_AVAILABLE"],
					'HIDE_NOT_AVAILABLE_OFFERS' => $arParams["HIDE_NOT_AVAILABLE_OFFERS"],

					'LABEL_PROP' => $arParams['LABEL_PROP'],
					'LABEL_PROP_MOBILE' => $arParams['LABEL_PROP_MOBILE'],
					'LABEL_PROP_POSITION' => $arParams['LABEL_PROP_POSITION'],
					'ADD_PICT_PROP' => $arParams['ADD_PICT_PROP'],
					'PRODUCT_DISPLAY_MODE' => $arParams['PRODUCT_DISPLAY_MODE'],
					'PRODUCT_BLOCKS_ORDER' => $arParams['LIST_PRODUCT_BLOCKS_ORDER'],
					'PRODUCT_ROW_VARIANTS' => $arParams['LIST_PRODUCT_ROW_VARIANTS'],
					'ENLARGE_PRODUCT' => $arParams['LIST_ENLARGE_PRODUCT'],
					'ENLARGE_PROP' => isset($arParams['LIST_ENLARGE_PROP']) ? $arParams['LIST_ENLARGE_PROP'] : '',
					'SHOW_SLIDER' => $arParams['LIST_SHOW_SLIDER'],
					'SLIDER_INTERVAL' => isset($arParams['LIST_SLIDER_INTERVAL']) ? $arParams['LIST_SLIDER_INTERVAL'] : '',
					'SLIDER_PROGRESS' => isset($arParams['LIST_SLIDER_PROGRESS']) ? $arParams['LIST_SLIDER_PROGRESS'] : '',

					'OFFER_ADD_PICT_PROP' => $arParams['OFFER_ADD_PICT_PROP'],
					'OFFER_TREE_PROPS' => $arParams['OFFER_TREE_PROPS'],
					'PRODUCT_SUBSCRIPTION' => $arParams['PRODUCT_SUBSCRIPTION'],
					'SHOW_DISCOUNT_PERCENT' => $arParams['SHOW_DISCOUNT_PERCENT'],
					'DISCOUNT_PERCENT_POSITION' => $arParams['DISCOUNT_PERCENT_POSITION'],
					'SHOW_OLD_PRICE' => $arParams['SHOW_OLD_PRICE'],
					'SHOW_MAX_QUANTITY' => $arParams['SHOW_MAX_QUANTITY'],
					'MESS_SHOW_MAX_QUANTITY' => (isset($arParams['~MESS_SHOW_MAX_QUANTITY']) ? $arParams['~MESS_SHOW_MAX_QUANTITY'] : ''),
					'RELATIVE_QUANTITY_FACTOR' => (isset($arParams['RELATIVE_QUANTITY_FACTOR']) ? $arParams['RELATIVE_QUANTITY_FACTOR'] : ''),
					'MESS_RELATIVE_QUANTITY_MANY' => (isset($arParams['~MESS_RELATIVE_QUANTITY_MANY']) ? $arParams['~MESS_RELATIVE_QUANTITY_MANY'] : ''),
					'MESS_RELATIVE_QUANTITY_FEW' => (isset($arParams['~MESS_RELATIVE_QUANTITY_FEW']) ? $arParams['~MESS_RELATIVE_QUANTITY_FEW'] : ''),
					'MESS_BTN_BUY' => (isset($arParams['~MESS_BTN_BUY']) ? $arParams['~MESS_BTN_BUY'] : ''),
					'MESS_BTN_ADD_TO_BASKET' => (isset($arParams['~MESS_BTN_ADD_TO_BASKET']) ? $arParams['~MESS_BTN_ADD_TO_BASKET'] : ''),
					'MESS_BTN_SUBSCRIBE' => (isset($arParams['~MESS_BTN_SUBSCRIBE']) ? $arParams['~MESS_BTN_SUBSCRIBE'] : ''),
					'MESS_BTN_DETAIL' => (isset($arParams['~MESS_BTN_DETAIL']) ? $arParams['~MESS_BTN_DETAIL'] : ''),
					'MESS_NOT_AVAILABLE' => (isset($arParams['~MESS_NOT_AVAILABLE']) ? $arParams['~MESS_NOT_AVAILABLE'] : ''),
					'MESS_BTN_COMPARE' => (isset($arParams['~MESS_BTN_COMPARE']) ? $arParams['~MESS_BTN_COMPARE'] : ''),

					'USE_ENHANCED_ECOMMERCE' => (isset($arParams['USE_ENHANCED_ECOMMERCE']) ? $arParams['USE_ENHANCED_ECOMMERCE'] : ''),
					'DATA_LAYER_NAME' => (isset($arParams['DATA_LAYER_NAME']) ? $arParams['DATA_LAYER_NAME'] : ''),
					'BRAND_PROPERTY' => (isset($arParams['BRAND_PROPERTY']) ? $arParams['BRAND_PROPERTY'] : ''),

					'TEMPLATE_THEME' => (isset($arParams['TEMPLATE_THEME']) ? $arParams['TEMPLATE_THEME'] : ''),
					"ADD_SECTIONS_CHAIN" => "N",
					'ADD_TO_BASKET_ACTION' => $basketAction,
					'SHOW_CLOSE_POPUP' => isset($arParams['COMMON_SHOW_CLOSE_POPUP']) ? $arParams['COMMON_SHOW_CLOSE_POPUP'] : '',
					'COMPARE_PATH' => $arResult['FOLDER'].$arResult['URL_TEMPLATES']['compare'],
					'COMPARE_NAME' => $arParams['COMPARE_NAME'],
					'USE_COMPARE_LIST' => 'Y',
					// ajaxpages
						'AJAXPAGESID' => 'ajaxpages_gmci',
						'IS_AJAXPAGES' => $IS_AJAXPAGES,
						'IS_SORTERCHANGE' => $IS_SORTERCHANGE,
						// goPro params
						'PROP_MORE_PHOTO' => $arParams['PROP_MORE_PHOTO'],
						'HIGHLOAD' => $arParams['HIGHLOAD'],
						'PROP_ARTICLE' => $arParams['PROP_ARTICLE'],
						'PROP_ACCESSORIES' => $arParams['PROP_ACCESSORIES'],
						'USE_FAVORITE' => $arParams['USE_FAVORITE'],
						'USE_SHARE' => $arParams['USE_SHARE'],
						'SHOW_ERROR_EMPTY_ITEMS' => $arParams['SHOW_ERROR_EMPTY_ITEMS'],
						'EMPTY_ITEMS_HIDE_FIL_SORT' => 'Y',
						'USE_AUTO_AJAXPAGES' => $arParams['USE_AUTO_AJAXPAGES'],
						'OFF_MEASURE_RATION' => $arParams['OFF_MEASURE_RATION'],
						// showcase
						'OFF_SMALLPOPUP' => $arParams['OFF_SMALLPOPUP'],
						// SKU
						'PROP_SKU_MORE_PHOTO' => $arParams['PROP_SKU_MORE_PHOTO'],
						'PROP_SKU_ARTICLE' => $arParams['PROP_SKU_ARTICLE'],
						'PROPS_ATTRIBUTES' => $arParams['PROPS_ATTRIBUTES'],
						'PROPS_ATTRIBUTES_COLOR' => $arParams['PROPS_ATTRIBUTES_COLOR'],
						// store
						'USE_STORE' => $arParams['USE_STORE'],
						'USE_MIN_AMOUNT' => $arParams['USE_MIN_AMOUNT'],
						'MIN_AMOUNT' => $arParams['MIN_AMOUNT'],
						'MAIN_TITLE' => $arParams['MAIN_TITLE'],
						// view
						'VIEW' => $alfaCTemplate,
					'BACKGROUND_IMAGE' => (isset($arParams['SECTION_BACKGROUND_IMAGE']) ? $arParams['SECTION_BACKGROUND_IMAGE'] : ''),
					'COMPATIBLE_MODE' => (isset($arParams['COMPATIBLE_MODE']) ? $arParams['COMPATIBLE_MODE'] : ''),
					'DISABLE_INIT_JS_IN_COMPONENT' => (isset($arParams['DISABLE_INIT_JS_IN_COMPONENT']) ? $arParams['DISABLE_INIT_JS_IN_COMPONENT'] : '')
					),
					$component,
					array('HIDE_ICONS'=>'Y')
				);?><?
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
			?></div><?
				?><div class="bottom"><?
$APPLICATION->IncludeComponent(
	"redsign:catalog.sorter", 
	"gopro", 
	array(
		"ALFA_ACTION_PARAM_NAME" => "alfaction",
		"ALFA_ACTION_PARAM_VALUE" => "alfavalue",
		"ALFA_CHOSE_TEMPLATES_SHOW" => "N",
		"ALFA_SORT_BY_SHOW" => "Y",
		"ALFA_OUTPUT_OF_SHOW" => "Y",
		"ALFA_OUTPUT_OF" => array(
			0 => "20",
			1 => "50",
			2 => "100",
			3 => "",
		),
		"ALFA_OUTPUT_OF_DEFAULT" => (isset($arParams["SORTER_OUTPUT_OF_DEFAULT"])?$arParams["SORTER_OUTPUT_OF_DEFAULT"]:"20"),
		"ALFA_OUTPUT_OF_SHOW_ALL" => "Y",
		"ALFA_DONT_REDIRECT" => "Y",
		"AJAXPAGESID" => "ajaxpages_gmci",
		"COMPONENT_TEMPLATE" => "gopro",
		"ALFA_SHORT_SORTER" => "Y",
		"ALFA_SORT_BY_NAME" => array(
			0 => "sort",
			1 => "name",
			2 => "CATALOG_PRICE_2",
			3 => "",
		),
		"ALFA_SORT_BY_DEFAULT" => "sort_asc",
		"COMPOSITE_FRAME_MODE" => "A",
		"COMPOSITE_FRAME_TYPE" => "AUTO"
	),
	false
);
			?></div><?
		?></div><?
if( $IS_AJAX_CATALOG )
{
	die();
}
	} //VIEW_MODE
	
?></div><?