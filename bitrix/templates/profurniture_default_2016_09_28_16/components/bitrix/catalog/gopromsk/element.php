<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

use Bitrix\Main\Loader;
use Bitrix\Main\ModuleManager;


if (!\Bitrix\Main\Loader::includeModule('redsign.devfunc'))
	return;
if (!\Bitrix\Main\Loader::includeModule('redsign.favorite'))
	return;
if (isset($arParams['USE_COMMON_SETTINGS_BASKET_POPUP']) && $arParams['USE_COMMON_SETTINGS_BASKET_POPUP'] == 'Y')
{
	$basketAction = (isset($arParams['COMMON_ADD_TO_BASKET_ACTION']) ? array($arParams['COMMON_ADD_TO_BASKET_ACTION']) : array());
}
else
{
	$basketAction = (isset($arParams['DETAIL_ADD_TO_BASKET_ACTION']) ? $arParams['DETAIL_ADD_TO_BASKET_ACTION'] : array());
}

$this->setFrameMode(true);
if (isset($_SERVER['HTTP_X_REQUESTED_WITH'])) {
	$ELEMENT_ID = IntVal($_REQUEST['element_id']);
    
	if ($_REQUEST['AJAX_CALL'] == 'Y' && $_REQUEST['action'] == 'rsgppopup' && $ELEMENT_ID > 0) {
		// +++++++++++++++++++++++++++++++ get element popup +++++++++++++++++++++++++++++++ //
		global $APPLICATION;
		$APPLICATION->RestartBuffer();
		if ($ELEMENT_ID < 1) {
			$arJson = array( 'TYPE' => 'ERROR', 'MESSAGE' => 'Element id is empty' );
			echo json_encode($arJson);
			die();
		}
        
		$ElementID = $APPLICATION->IncludeComponent(
			'bitrix:catalog.element',
			'popup',
			array(
				'IBLOCK_TYPE' => $arParams['IBLOCK_TYPE'],
				'IBLOCK_ID' => $arParams['IBLOCK_ID'],
				'PROPERTY_CODE' => $arParams['DETAIL_PROPERTY_CODE'],
				'META_KEYWORDS' => $arParams['DETAIL_META_KEYWORDS'],
				'META_DESCRIPTION' => $arParams['DETAIL_META_DESCRIPTION'],
				'BROWSER_TITLE' => $arParams['DETAIL_BROWSER_TITLE'],
				'BASKET_URL' => $arParams['BASKET_URL'],
				'ACTION_VARIABLE' => $arParams['ACTION_VARIABLE'],
				'PRODUCT_ID_VARIABLE' => $arParams['PRODUCT_ID_VARIABLE'],
				'SECTION_ID_VARIABLE' => $arParams['SECTION_ID_VARIABLE'],
				'PRODUCT_QUANTITY_VARIABLE' => $arParams['PRODUCT_QUANTITY_VARIABLE'],
				'PRODUCT_PROPS_VARIABLE' => $arParams['PRODUCT_PROPS_VARIABLE'],
				'SET_TITLE' => $arParams['SET_TITLE'],
				'SET_STATUS_404' => $arParams['SET_STATUS_404'],
				'PRICE_CODE' => $arParams['PRICE_CODE'],
				'USE_PRICE_COUNT' => $arParams['USE_PRICE_COUNT'],
				'SHOW_PRICE_COUNT' => $arParams['SHOW_PRICE_COUNT'],
				'PRICE_VAT_INCLUDE' => $arParams['PRICE_VAT_INCLUDE'],
				'PRICE_VAT_SHOW_VALUE' => $arParams['PRICE_VAT_SHOW_VALUE'],
				'USE_PRODUCT_QUANTITY' => $arParams['USE_PRODUCT_QUANTITY'],
				'PRODUCT_PROPERTIES' => $arParams['PRODUCT_PROPERTIES'],
				'ADD_PROPERTIES_TO_BASKET' => (isset($arParams['ADD_PROPERTIES_TO_BASKET']) ? $arParams['ADD_PROPERTIES_TO_BASKET'] : ''),
				'PARTIAL_PRODUCT_PROPERTIES' => (isset($arParams['PARTIAL_PRODUCT_PROPERTIES']) ? $arParams['PARTIAL_PRODUCT_PROPERTIES'] : ''),
				'LINK_IBLOCK_TYPE' => $arParams['LINK_IBLOCK_TYPE'],
				'LINK_IBLOCK_ID' => $arParams['LINK_IBLOCK_ID'],
				'LINK_PROPERTY_SID' => $arParams['LINK_PROPERTY_SID'],
				'LINK_ELEMENTS_URL' => $arParams['LINK_ELEMENTS_URL'],
				'OFFERS_CART_PROPERTIES' => $arParams['OFFERS_CART_PROPERTIES'],
				'OFFERS_FIELD_CODE' => $arParams['DETAIL_OFFERS_FIELD_CODE'],
				'OFFERS_PROPERTY_CODE' => $arParams['DETAIL_OFFERS_PROPERTY_CODE'],
				'OFFERS_SORT_FIELD' => $arParams['OFFERS_SORT_FIELD'],
				'OFFERS_SORT_ORDER' => $arParams['OFFERS_SORT_ORDER'],
				'OFFERS_SORT_FIELD2' => $arParams['OFFERS_SORT_FIELD2'],
				'OFFERS_SORT_ORDER2' => $arParams['OFFERS_SORT_ORDER2'],
				'ELEMENT_ID' => $ELEMENT_ID,
				'ELEMENT_CODE' => '',
				'SECTION_ID' => $arResult['VARIABLES']['SECTION_ID'],
				'SECTION_CODE' => $arResult['VARIABLES']['SECTION_CODE'],
				'SECTION_URL' => $arResult['FOLDER'].$arResult['URL_TEMPLATES']['section'],
				'DETAIL_URL' => $arResult['FOLDER'].$arResult['URL_TEMPLATES']['element'],
				'CONVERT_CURRENCY' => $arParams['CONVERT_CURRENCY'],
				'CURRENCY_ID' => $arParams['CURRENCY_ID'],
				'HIDE_NOT_AVAILABLE' => $arParams['HIDE_NOT_AVAILABLE'],
				'USE_ELEMENT_COUNTER' => $arParams['USE_ELEMENT_COUNTER'],
				// fix
				'USE_COMPARE' => $arParams['USE_COMPARE'],
				// goPro params
				'PROP_MORE_PHOTO' => $arParams['PROP_MORE_PHOTO'],
				'HIGHLOAD' => $arParams['HIGHLOAD'],
				'PROP_ARTICLE' => $arParams['PROP_ARTICLE'],
				'PROP_ACCESSORIES' => $arParams['PROP_ACCESSORIES'],
				'USE_FAVORITE' => $arParams['USE_FAVORITE'],
				'USE_SHARE' => $arParams['USE_SHARE'],
				'PROP_SKU_MORE_PHOTO' => $arParams['PROP_SKU_MORE_PHOTO'],
				'PROP_SKU_ARTICLE' => $arParams['PROP_SKU_ARTICLE'],
				'PROPS_ATTRIBUTES' => $arParams['PROPS_ATTRIBUTES'],
				'PROPS_ATTRIBUTES_COLOR' => $arParams['PROPS_ATTRIBUTES_COLOR'],
				// store
				'USE_STORE' => $arParams['USE_STORE'],
				'USE_MIN_AMOUNT' => $arParams['USE_MIN_AMOUNT'],
				'MIN_AMOUNT' => $arParams['MIN_AMOUNT'],
				'MAIN_TITLE' => $arParams['MAIN_TITLE'],
			),
			$component,
			array('HIDE_ICONS' => 'Y')
		);
		die();
        
	} elseif ($arParams['USE_COMPARE'] == 'Y' && $_REQUEST['AJAX_CALL'] == 'Y' && ($_REQUEST['action'] == 'ADD_TO_COMPARE_LIST' || $_REQUEST['action'] == 'DELETE_FROM_COMPARE_LIST') ) {
		// +++++++++++++++++++++++++++++++ add2compare +++++++++++++++++++++++++++++++ //
		global $APPLICATION,$JSON;
		$APPLICATION->IncludeComponent(
			'bitrix:catalog.compare.list',
			'json',
			Array(
				'IBLOCK_TYPE' => $arParams['IBLOCK_TYPE'],
				'IBLOCK_ID' => $arParams['IBLOCK_ID'],
				'NAME' => $arParams['COMPARE_NAME'],
				'DETAIL_URL' => $arResult['FOLDER'].$arResult['URL_TEMPLATES']['element'],
				'COMPARE_URL' => $arResult['FOLDER'].$arResult['URL_TEMPLATES']['compare'],
				'IS_AJAX_REQUEST' => 'Y',
			),
			$component,
			array('HIDE_ICONS' => 'Y')
		);
        
		$APPLICATION->RestartBuffer();
		if(SITE_CHARSET != 'utf-8') {
			$data = $APPLICATION->ConvertCharsetArray($JSON, SITE_CHARSET, 'utf-8');
			$json_str_utf = json_encode($data);
			$json_str = $APPLICATION->ConvertCharset($json_str_utf, 'utf-8', SITE_CHARSET);
			echo $json_str;
		} else {
			echo json_encode( $JSON );
		}
        
		die();
        
	} elseif ($_REQUEST['AJAX_CALL'] == 'Y' && $_REQUEST['action'] == 'add2favorite' && $ELEMENT_ID > 0) {
		// +++++++++++++++++++++++++++++++ add2favorite +++++++++++++++++++++++++++++++ //
		global $APPLICATION, $JSON;
        
        if (\Bitrix\Main\Loader::includeModule('redsign.favorite')) {
            $res = RSFavoriteAddDel($ELEMENT_ID);
            $APPLICATION->RestartBuffer();
            $APPLICATION->IncludeComponent('redsign:favorite.list','json',array());
            $APPLICATION->RestartBuffer();
            if ($res == 2) {
            $arJson = array('TYPE'=>'OK','MESSAGE'=>'Element add2favorite','ACTION'=>'ADD','HTMLBYID'=>$JSON['HTMLBYID']);
            } elseif ($res == 1) {
            $arJson = array('TYPE'=>'OK','MESSAGE'=>'Element removed from favorite','ACTION'=>'REMOVE','HTMLBYID'=>$JSON['HTMLBYID']);
            } else {
            $arJson = array('TYPE'=>'ERROR','MESSAGE'=>'Bad request');
            }
        } else {
            $arJson = array('TYPE'=>'ERROR','MESSAGE'=>'Module redsign.favorite not installed');
        }
        
        echo json_encode($arJson);
        die();
        
        } elseif($_REQUEST['AJAX_CALL'] == 'Y' && $_REQUEST['action'] == 'add2basket') {
		// +++++++++++++++++++++++++++++++ add2basket +++++++++++++++++++++++++++++++ //
		global $APPLICATION,$JSON;
		$ProductID = IntVal($_REQUEST[$arParams["PRODUCT_ID_VARIABLE"]]);
		$QUANTITY = doubleval($_REQUEST[$arParams["PRODUCT_QUANTITY_VARIABLE"]]);
        
		$params = Array(
			'IBLOCK_TYPE' => $arParams['IBLOCK_TYPE'],
			'IBLOCK_ID' => $arParams['IBLOCK_ID'],
			'ACTION_VARIABLE' => $arParams['ACTION_VARIABLE'],
			'PRODUCT_QUANTITY_VARIABLE' => $arParams['PRODUCT_QUANTITY_VARIABLE'],
			'PRODUCT_PROPS_VARIABLE' => $arParams['PRODUCT_PROPS_VARIABLE'],
			'USE_PRICE_COUNT' => $arParams['USE_PRICE_COUNT'],
			'USE_PRODUCT_QUANTITY' => $arParams['USE_PRODUCT_QUANTITY'],
			'PRODUCT_PROPERTIES' => $arParams['PRODUCT_PROPERTIES'],
			'ADD_PROPERTIES_TO_BASKET' => (isset($arParams['ADD_PROPERTIES_TO_BASKET']) ? $arParams['ADD_PROPERTIES_TO_BASKET'] : ''),
			'PARTIAL_PRODUCT_PROPERTIES' => (isset($arParams['PARTIAL_PRODUCT_PROPERTIES']) ? $arParams['PARTIAL_PRODUCT_PROPERTIES'] : ''),
			'OFFERS_CART_PROPERTIES' => $arParams['OFFERS_CART_PROPERTIES'],
		);
        
		$restat = RSDF_EasyAdd2Basket($ProductID,$QUANTITY,$params);
		$APPLICATION->RestartBuffer();
		$APPLICATION->IncludeComponent('bitrix:sale.basket.basket.line','json',array());
		$APPLICATION->RestartBuffer();
        
		if (SITE_CHARSET != 'utf-8') {
			$data = $APPLICATION->ConvertCharsetArray($JSON, SITE_CHARSET, 'utf-8');
			$json_str_utf = json_encode($data);
			$json_str = $APPLICATION->ConvertCharset($json_str_utf, 'utf-8', SITE_CHARSET);
			echo $json_str;
		} else {
			echo json_encode( $JSON );
		}
		die();
        
	} elseif ($_REQUEST['AJAX_CALL'] == 'Y' && $_REQUEST['action'] == 'get_element_json' && $ELEMENT_ID > 0) {
		// +++++++++++++++++++++++++++++++ get element json +++++++++++++++++++++++++++++++ //
		global $APPLICATION,$JSON;
		$APPLICATION->RestartBuffer();
        
		if ($ELEMENT_ID < 1) {
			$arJson = array( 'TYPE' => 'ERROR', 'MESSAGE' => 'Element id is empty' );
			echo json_encode($arJson);
			die();
		}
        
		$ElementID=$APPLICATION->IncludeComponent(
			'bitrix:catalog.element',
			'json',
			Array(
				'IBLOCK_TYPE' => $arParams['IBLOCK_TYPE'],
				'IBLOCK_ID' => $arParams['IBLOCK_ID'],
				'PROPERTY_CODE' => $arParams['DETAIL_PROPERTY_CODE'],
				'META_KEYWORDS' => $arParams['DETAIL_META_KEYWORDS'],
				'META_DESCRIPTION' => $arParams['DETAIL_META_DESCRIPTION'],
				'BROWSER_TITLE' => $arParams['DETAIL_BROWSER_TITLE'],
				'BASKET_URL' => $arParams['BASKET_URL'],
				'ACTION_VARIABLE' => $arParams['ACTION_VARIABLE'],
				'PRODUCT_ID_VARIABLE' => $arParams['PRODUCT_ID_VARIABLE'],
				'SECTION_ID_VARIABLE' => $arParams['SECTION_ID_VARIABLE'],
				'PRODUCT_QUANTITY_VARIABLE' => $arParams['PRODUCT_QUANTITY_VARIABLE'],
				'PRODUCT_PROPS_VARIABLE' => $arParams['PRODUCT_PROPS_VARIABLE'],
				'CACHE_TYPE' => $arParams['CACHE_TYPE'],
				'CACHE_TIME' => $arParams['CACHE_TIME'],
				'CACHE_GROUPS' => $arParams['CACHE_GROUPS'],
				'SET_TITLE' => $arParams['SET_TITLE'],
				'SET_STATUS_404' => $arParams['SET_STATUS_404'],
				'PRICE_CODE' => $arParams['PRICE_CODE'],
				'USE_PRICE_COUNT' => $arParams['USE_PRICE_COUNT'],
				'SHOW_PRICE_COUNT' => $arParams['SHOW_PRICE_COUNT'],
				'PRICE_VAT_INCLUDE' => $arParams['PRICE_VAT_INCLUDE'],
				'PRICE_VAT_SHOW_VALUE' => $arParams['PRICE_VAT_SHOW_VALUE'],
				'USE_PRODUCT_QUANTITY' => $arParams['USE_PRODUCT_QUANTITY'],
				'PRODUCT_PROPERTIES' => $arParams['PRODUCT_PROPERTIES'],
				'ADD_PROPERTIES_TO_BASKET' => (isset($arParams['ADD_PROPERTIES_TO_BASKET']) ? $arParams['ADD_PROPERTIES_TO_BASKET'] : ''),
				'PARTIAL_PRODUCT_PROPERTIES' => (isset($arParams['PARTIAL_PRODUCT_PROPERTIES']) ? $arParams['PARTIAL_PRODUCT_PROPERTIES'] : ''),
				'LINK_IBLOCK_TYPE' => $arParams['LINK_IBLOCK_TYPE'],
				'LINK_IBLOCK_ID' => $arParams['LINK_IBLOCK_ID'],
				'LINK_PROPERTY_SID' => $arParams['LINK_PROPERTY_SID'],
				'LINK_ELEMENTS_URL' => $arParams['LINK_ELEMENTS_URL'],
				'OFFERS_CART_PROPERTIES' => $arParams['OFFERS_CART_PROPERTIES'],
				'OFFERS_FIELD_CODE' => $arParams['DETAIL_OFFERS_FIELD_CODE'],
				'OFFERS_PROPERTY_CODE' => $arParams['DETAIL_OFFERS_PROPERTY_CODE'],
				'OFFERS_SORT_FIELD' => $arParams['OFFERS_SORT_FIELD'],
				'OFFERS_SORT_ORDER' => $arParams['OFFERS_SORT_ORDER'],
				'OFFERS_SORT_FIELD2' => $arParams['OFFERS_SORT_FIELD2'],
				'OFFERS_SORT_ORDER2' => $arParams['OFFERS_SORT_ORDER2'],
				'ELEMENT_ID' => $ELEMENT_ID,
				'ELEMENT_CODE' => '',
				'SECTION_ID' => $arResult['VARIABLES']['SECTION_ID'],
				'SECTION_CODE' => $arResult['VARIABLES']['SECTION_CODE'],
				'SECTION_URL' => $arResult['FOLDER'].$arResult['URL_TEMPLATES']['section'],
				'DETAIL_URL' => $arResult['FOLDER'].$arResult['URL_TEMPLATES']['element'],
				'CONVERT_CURRENCY' => $arParams['CONVERT_CURRENCY'],
				'CURRENCY_ID' => $arParams['CURRENCY_ID'],
				'HIDE_NOT_AVAILABLE' => $arParams['HIDE_NOT_AVAILABLE'],
				'USE_ELEMENT_COUNTER' => $arParams['USE_ELEMENT_COUNTER'],
				'PROPS_ATTRIBUTES' => $arParams['PROPS_ATTRIBUTES'],
				// goPro params
				'PROP_MORE_PHOTO' => $arParams['PROP_MORE_PHOTO'],
				'HIGHLOAD' => $arParams['HIGHLOAD'],
				'PROP_ARTICLE' => $arParams['PROP_ARTICLE'],
				'PROP_ACCESSORIES' => $arParams['PROP_ACCESSORIES'],
				'USE_FAVORITE' => $arParams['USE_FAVORITE'],
				'USE_SHARE' => $arParams['USE_SHARE'],
				'SHOW_ERROR_EMPTY_ITEMS' => $arParams['SHOW_ERROR_EMPTY_ITEMS'],
				'PROP_SKU_MORE_PHOTO' => $arParams['PROP_SKU_MORE_PHOTO'],
				'PROP_SKU_ARTICLE' => $arParams['PROP_SKU_ARTICLE'],
				'PROPS_ATTRIBUTES' => $arParams['PROPS_ATTRIBUTES'],
				// store
				'USE_STORE' => $arParams['USE_STORE'],
				'USE_MIN_AMOUNT' => $arParams['USE_MIN_AMOUNT'],
				'MIN_AMOUNT' => $arParams['MIN_AMOUNT'],
				'MAIN_TITLE' => $arParams['MAIN_TITLE'],
			),
			$component,
			array('HIDE_ICONS' => 'Y')
		);
		$APPLICATION->RestartBuffer();
		if (SITE_CHARSET != 'utf-8') {
			$data = $APPLICATION->ConvertCharsetArray($JSON, SITE_CHARSET, 'utf-8');
			$json_str_utf = json_encode($data);
			$json_str = $APPLICATION->ConvertCharset($json_str_utf, 'utf-8', SITE_CHARSET);
			echo $json_str;
		} else {
			echo json_encode( $JSON );
		}
		die();
	}
}

?><?$ElementID = $APPLICATION->IncludeComponent(
	'bitrix:catalog.element',
	'gopromsk',
	array(
		'IBLOCK_TYPE' => $arParams['IBLOCK_TYPE'],
			'IBLOCK_ID' => $arParams['IBLOCK_ID'],
			'PROPERTY_CODE' => $arParams['DETAIL_PROPERTY_CODE'],
			'META_KEYWORDS' => $arParams['DETAIL_META_KEYWORDS'],
			'META_DESCRIPTION' => $arParams['DETAIL_META_DESCRIPTION'],
			'BROWSER_TITLE' => $arParams['DETAIL_BROWSER_TITLE'],
			'SET_CANONICAL_URL' => $arParams['DETAIL_SET_CANONICAL_URL'],
			'BASKET_URL' => $arParams['BASKET_URL'],
			'ACTION_VARIABLE' => $arParams['ACTION_VARIABLE'],
			'PRODUCT_ID_VARIABLE' => $arParams['PRODUCT_ID_VARIABLE'],
			'SECTION_ID_VARIABLE' => $arParams['SECTION_ID_VARIABLE'],
			'CHECK_SECTION_ID_VARIABLE' => (isset($arParams['DETAIL_CHECK_SECTION_ID_VARIABLE']) ? $arParams['DETAIL_CHECK_SECTION_ID_VARIABLE'] : ''),
			'PRODUCT_QUANTITY_VARIABLE' => $arParams['PRODUCT_QUANTITY_VARIABLE'],
			'PRODUCT_PROPS_VARIABLE' => $arParams['PRODUCT_PROPS_VARIABLE'],
			'CACHE_TYPE' => $arParams['CACHE_TYPE'],
			'CACHE_TIME' => $arParams['CACHE_TIME'],
			'CACHE_GROUPS' => $arParams['CACHE_GROUPS'],
			'SET_TITLE' => $arParams['SET_TITLE'],
			'SET_LAST_MODIFIED' => $arParams['SET_LAST_MODIFIED'],
			'MESSAGE_404' => $arParams['~MESSAGE_404'],
			'SET_STATUS_404' => $arParams['SET_STATUS_404'],
			'SHOW_404' => $arParams['SHOW_404'],
			'FILE_404' => $arParams['FILE_404'],
			'PRICE_CODE' => $arParams['PRICE_CODE'],
			'USE_PRICE_COUNT' => $arParams['USE_PRICE_COUNT'],
			'SHOW_PRICE_COUNT' => $arParams['SHOW_PRICE_COUNT'],
			'PRICE_VAT_INCLUDE' => $arParams['PRICE_VAT_INCLUDE'],
			'PRICE_VAT_SHOW_VALUE' => $arParams['PRICE_VAT_SHOW_VALUE'],
			'USE_PRODUCT_QUANTITY' => $arParams['USE_PRODUCT_QUANTITY'],
			'PRODUCT_PROPERTIES' => $arParams['PRODUCT_PROPERTIES'],
			'ADD_PROPERTIES_TO_BASKET' => (isset($arParams['ADD_PROPERTIES_TO_BASKET']) ? $arParams['ADD_PROPERTIES_TO_BASKET'] : ''),
			'PARTIAL_PRODUCT_PROPERTIES' => (isset($arParams['PARTIAL_PRODUCT_PROPERTIES']) ? $arParams['PARTIAL_PRODUCT_PROPERTIES'] : ''),
			'LINK_IBLOCK_TYPE' => $arParams['LINK_IBLOCK_TYPE'],
			'LINK_IBLOCK_ID' => $arParams['LINK_IBLOCK_ID'],
			'LINK_PROPERTY_SID' => $arParams['LINK_PROPERTY_SID'],
			'LINK_ELEMENTS_URL' => $arParams['LINK_ELEMENTS_URL'],

			'OFFERS_CART_PROPERTIES' => $arParams['OFFERS_CART_PROPERTIES'],
			'OFFERS_FIELD_CODE' => $arParams['DETAIL_OFFERS_FIELD_CODE'],
			'OFFERS_PROPERTY_CODE' => $arParams['DETAIL_OFFERS_PROPERTY_CODE'],
			'OFFERS_SORT_FIELD' => $arParams['OFFERS_SORT_FIELD'],
			'OFFERS_SORT_ORDER' => $arParams['OFFERS_SORT_ORDER'],
			'OFFERS_SORT_FIELD2' => $arParams['OFFERS_SORT_FIELD2'],
			'OFFERS_SORT_ORDER2' => $arParams['OFFERS_SORT_ORDER2'],

			'ELEMENT_ID' => $arResult['VARIABLES']['ELEMENT_ID'],
			'ELEMENT_CODE' => $arResult['VARIABLES']['ELEMENT_CODE'],
			'SECTION_ID' => $arResult['VARIABLES']['SECTION_ID'],
			'SECTION_CODE' => $arResult['VARIABLES']['SECTION_CODE'],
			'SECTION_URL' => $arResult['FOLDER'].$arResult['URL_TEMPLATES']['section'],
			'DETAIL_URL' => $arResult['FOLDER'].$arResult['URL_TEMPLATES']['element'],
			'CONVERT_CURRENCY' => $arParams['CONVERT_CURRENCY'],
			'CURRENCY_ID' => $arParams['CURRENCY_ID'],
			'HIDE_NOT_AVAILABLE' => $arParams['HIDE_NOT_AVAILABLE'],
			'HIDE_NOT_AVAILABLE_OFFERS' => $arParams['HIDE_NOT_AVAILABLE_OFFERS'],
			'USE_ELEMENT_COUNTER' => $arParams['USE_ELEMENT_COUNTER'],
			'SHOW_DEACTIVATED' => $arParams['SHOW_DEACTIVATED'],
			'USE_MAIN_ELEMENT_SECTION' => $arParams['USE_MAIN_ELEMENT_SECTION'],
			'STRICT_SECTION_CHECK' => (isset($arParams['DETAIL_STRICT_SECTION_CHECK']) ? $arParams['DETAIL_STRICT_SECTION_CHECK'] : ''),
			'ADD_PICT_PROP' => $arParams['ADD_PICT_PROP'],
			'LABEL_PROP' => $arParams['LABEL_PROP'],
			'LABEL_PROP_MOBILE' => $arParams['LABEL_PROP_MOBILE'],
			'LABEL_PROP_POSITION' => $arParams['LABEL_PROP_POSITION'],
			'OFFER_ADD_PICT_PROP' => $arParams['OFFER_ADD_PICT_PROP'],
			'OFFER_TREE_PROPS' => $arParams['OFFER_TREE_PROPS'],
			'PRODUCT_SUBSCRIPTION' => $arParams['PRODUCT_SUBSCRIPTION'],
			'SHOW_DISCOUNT_PERCENT' => $arParams['SHOW_DISCOUNT_PERCENT'],
			'DISCOUNT_PERCENT_POSITION' => (isset($arParams['DISCOUNT_PERCENT_POSITION']) ? $arParams['DISCOUNT_PERCENT_POSITION'] : ''),
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
			'MESS_PRICE_RANGES_TITLE' => (isset($arParams['~MESS_PRICE_RANGES_TITLE']) ? $arParams['~MESS_PRICE_RANGES_TITLE'] : ''),
			'MESS_DESCRIPTION_TAB' => (isset($arParams['~MESS_DESCRIPTION_TAB']) ? $arParams['~MESS_DESCRIPTION_TAB'] : ''),
			'MESS_PROPERTIES_TAB' => (isset($arParams['~MESS_PROPERTIES_TAB']) ? $arParams['~MESS_PROPERTIES_TAB'] : ''),
			'MESS_COMMENTS_TAB' => (isset($arParams['~MESS_COMMENTS_TAB']) ? $arParams['~MESS_COMMENTS_TAB'] : ''),
			'MAIN_BLOCK_PROPERTY_CODE' => (isset($arParams['DETAIL_MAIN_BLOCK_PROPERTY_CODE']) ? $arParams['DETAIL_MAIN_BLOCK_PROPERTY_CODE'] : ''),
			'MAIN_BLOCK_OFFERS_PROPERTY_CODE' => (isset($arParams['DETAIL_MAIN_BLOCK_OFFERS_PROPERTY_CODE']) ? $arParams['DETAIL_MAIN_BLOCK_OFFERS_PROPERTY_CODE'] : ''),
			'USE_VOTE_RATING' => $arParams['DETAIL_USE_VOTE_RATING'],
			'VOTE_DISPLAY_AS_RATING' => (isset($arParams['DETAIL_VOTE_DISPLAY_AS_RATING']) ? $arParams['DETAIL_VOTE_DISPLAY_AS_RATING'] : ''),
			'USE_COMMENTS' => $arParams['DETAIL_USE_COMMENTS'],
			'BLOG_USE' => (isset($arParams['DETAIL_BLOG_USE']) ? $arParams['DETAIL_BLOG_USE'] : ''),
			'BLOG_URL' => (isset($arParams['DETAIL_BLOG_URL']) ? $arParams['DETAIL_BLOG_URL'] : ''),
			'BLOG_EMAIL_NOTIFY' => (isset($arParams['DETAIL_BLOG_EMAIL_NOTIFY']) ? $arParams['DETAIL_BLOG_EMAIL_NOTIFY'] : ''),
			'VK_USE' => (isset($arParams['DETAIL_VK_USE']) ? $arParams['DETAIL_VK_USE'] : ''),
			'VK_API_ID' => (isset($arParams['DETAIL_VK_API_ID']) ? $arParams['DETAIL_VK_API_ID'] : 'API_ID'),
			'FB_USE' => (isset($arParams['DETAIL_FB_USE']) ? $arParams['DETAIL_FB_USE'] : ''),
			'FB_APP_ID' => (isset($arParams['DETAIL_FB_APP_ID']) ? $arParams['DETAIL_FB_APP_ID'] : ''),
			'BRAND_USE' => (isset($arParams['DETAIL_BRAND_USE']) ? $arParams['DETAIL_BRAND_USE'] : 'N'),
			'BRAND_PROP_CODE' => (isset($arParams['DETAIL_BRAND_PROP_CODE']) ? $arParams['DETAIL_BRAND_PROP_CODE'] : ''),
			'DISPLAY_NAME' => (isset($arParams['DETAIL_DISPLAY_NAME']) ? $arParams['DETAIL_DISPLAY_NAME'] : ''),
			'IMAGE_RESOLUTION' => (isset($arParams['DETAIL_IMAGE_RESOLUTION']) ? $arParams['DETAIL_IMAGE_RESOLUTION'] : ''),
			'PRODUCT_INFO_BLOCK_ORDER' => (isset($arParams['DETAIL_PRODUCT_INFO_BLOCK_ORDER']) ? $arParams['DETAIL_PRODUCT_INFO_BLOCK_ORDER'] : ''),
			'PRODUCT_PAY_BLOCK_ORDER' => (isset($arParams['DETAIL_PRODUCT_PAY_BLOCK_ORDER']) ? $arParams['DETAIL_PRODUCT_PAY_BLOCK_ORDER'] : ''),
			'ADD_DETAIL_TO_SLIDER' => (isset($arParams['DETAIL_ADD_DETAIL_TO_SLIDER']) ? $arParams['DETAIL_ADD_DETAIL_TO_SLIDER'] : ''),
			'TEMPLATE_THEME' => (isset($arParams['TEMPLATE_THEME']) ? $arParams['TEMPLATE_THEME'] : ''),
			'ADD_SECTIONS_CHAIN' => (isset($arParams['ADD_SECTIONS_CHAIN']) ? $arParams['ADD_SECTIONS_CHAIN'] : ''),
			'ADD_ELEMENT_CHAIN' => (isset($arParams['ADD_ELEMENT_CHAIN']) ? $arParams['ADD_ELEMENT_CHAIN'] : ''),
			'DISPLAY_PREVIEW_TEXT_MODE' => (isset($arParams['DETAIL_DISPLAY_PREVIEW_TEXT_MODE']) ? $arParams['DETAIL_DISPLAY_PREVIEW_TEXT_MODE'] : ''),
			'DETAIL_PICTURE_MODE' => (isset($arParams['DETAIL_DETAIL_PICTURE_MODE']) ? $arParams['DETAIL_DETAIL_PICTURE_MODE'] : array()),
			'ADD_TO_BASKET_ACTION' => $basketAction,
			'ADD_TO_BASKET_ACTION_PRIMARY' => (isset($arParams['DETAIL_ADD_TO_BASKET_ACTION_PRIMARY']) ? $arParams['DETAIL_ADD_TO_BASKET_ACTION_PRIMARY'] : null),
			'SHOW_CLOSE_POPUP' => isset($arParams['COMMON_SHOW_CLOSE_POPUP']) ? $arParams['COMMON_SHOW_CLOSE_POPUP'] : '',
			'DISPLAY_COMPARE' => (isset($arParams['USE_COMPARE']) ? $arParams['USE_COMPARE'] : ''),
			'COMPARE_PATH' => $arResult['FOLDER'].$arResult['URL_TEMPLATES']['compare'],
			'USE_COMPARE_LIST' => 'Y',
			'BACKGROUND_IMAGE' => (isset($arParams['DETAIL_BACKGROUND_IMAGE']) ? $arParams['DETAIL_BACKGROUND_IMAGE'] : ''),
			'COMPATIBLE_MODE' => (isset($arParams['COMPATIBLE_MODE']) ? $arParams['COMPATIBLE_MODE'] : ''),
			'DISABLE_INIT_JS_IN_COMPONENT' => (isset($arParams['DISABLE_INIT_JS_IN_COMPONENT']) ? $arParams['DISABLE_INIT_JS_IN_COMPONENT'] : ''),
			'SET_VIEWED_IN_COMPONENT' => (isset($arParams['DETAIL_SET_VIEWED_IN_COMPONENT']) ? $arParams['DETAIL_SET_VIEWED_IN_COMPONENT'] : ''),
			'SHOW_SLIDER' => (isset($arParams['DETAIL_SHOW_SLIDER']) ? $arParams['DETAIL_SHOW_SLIDER'] : ''),
			'SLIDER_INTERVAL' => (isset($arParams['DETAIL_SLIDER_INTERVAL']) ? $arParams['DETAIL_SLIDER_INTERVAL'] : ''),
			'SLIDER_PROGRESS' => (isset($arParams['DETAIL_SLIDER_PROGRESS']) ? $arParams['DETAIL_SLIDER_PROGRESS'] : ''),
			'USE_ENHANCED_ECOMMERCE' => (isset($arParams['USE_ENHANCED_ECOMMERCE']) ? $arParams['USE_ENHANCED_ECOMMERCE'] : ''),
			'DATA_LAYER_NAME' => (isset($arParams['DATA_LAYER_NAME']) ? $arParams['DATA_LAYER_NAME'] : ''),
			'BRAND_PROPERTY' => (isset($arParams['BRAND_PROPERTY']) ? $arParams['BRAND_PROPERTY'] : ''),

			'USE_GIFTS_DETAIL' => $arParams['USE_GIFTS_DETAIL']?: 'Y',
			'USE_GIFTS_MAIN_PR_SECTION_LIST' => $arParams['USE_GIFTS_MAIN_PR_SECTION_LIST']?: 'Y',
			'GIFTS_SHOW_DISCOUNT_PERCENT' => $arParams['GIFTS_SHOW_DISCOUNT_PERCENT'],
			'GIFTS_SHOW_OLD_PRICE' => $arParams['GIFTS_SHOW_OLD_PRICE'],
			'GIFTS_DETAIL_PAGE_ELEMENT_COUNT' => $arParams['GIFTS_DETAIL_PAGE_ELEMENT_COUNT'],
			'GIFTS_DETAIL_HIDE_BLOCK_TITLE' => $arParams['GIFTS_DETAIL_HIDE_BLOCK_TITLE'],
			'GIFTS_DETAIL_TEXT_LABEL_GIFT' => $arParams['GIFTS_DETAIL_TEXT_LABEL_GIFT'],
			'GIFTS_DETAIL_BLOCK_TITLE' => $arParams['GIFTS_DETAIL_BLOCK_TITLE'],
			'GIFTS_SHOW_NAME' => $arParams['GIFTS_SHOW_NAME'],
			'GIFTS_SHOW_IMAGE' => $arParams['GIFTS_SHOW_IMAGE'],
			'GIFTS_MESS_BTN_BUY' => $arParams['~GIFTS_MESS_BTN_BUY'],
			'GIFTS_PRODUCT_BLOCKS_ORDER' => $arParams['LIST_PRODUCT_BLOCKS_ORDER'],
			'GIFTS_SHOW_SLIDER' => $arParams['LIST_SHOW_SLIDER'],
			'GIFTS_SLIDER_INTERVAL' => isset($arParams['LIST_SLIDER_INTERVAL']) ? $arParams['LIST_SLIDER_INTERVAL'] : '',
			'GIFTS_SLIDER_PROGRESS' => isset($arParams['LIST_SLIDER_PROGRESS']) ? $arParams['LIST_SLIDER_PROGRESS'] : '',

			'GIFTS_MAIN_PRODUCT_DETAIL_PAGE_ELEMENT_COUNT' => $arParams['GIFTS_MAIN_PRODUCT_DETAIL_PAGE_ELEMENT_COUNT'],
			'GIFTS_MAIN_PRODUCT_DETAIL_BLOCK_TITLE' => $arParams['GIFTS_MAIN_PRODUCT_DETAIL_BLOCK_TITLE'],
			'GIFTS_MAIN_PRODUCT_DETAIL_HIDE_BLOCK_TITLE' => $arParams['GIFTS_MAIN_PRODUCT_DETAIL_HIDE_BLOCK_TITLE'],
	),
	$component
);?><?

?><div class="clear"></div><?

// MODS
if ($arParams['USE_BLOCK_MODS'] == 'Y') {
	$obCache = new CPHPCache();
	if ($obCache->InitCache(36000, serialize($arFilter) ,'/iblock/catalog')) {
		$arCurIBlock = $obCache->GetVars();
	} elseif ($obCache->StartDataCache()) {
		$arCurIBlock = CIBlockPriceTools::GetOffersIBlock($arParams['IBLOCK_ID']);
		if (defined('BX_COMP_MANAGED_CACHE')) {
			global $CACHE_MANAGER;
			$CACHE_MANAGER->StartTagCache('/iblock/catalog');
			if ($arCurIBlock) {
				$CACHE_MANAGER->RegisterTag('iblock_id_'.$arParams['IBLOCK_ID']);
			}
			$CACHE_MANAGER->EndTagCache();
		} else {
			if (!$arCurIBlock) {
				$arCurIBlock = array();
			}
		}
		$obCache->EndDataCache($arCurIBlock);
	}
	?><div class="mods"><!-- mods --><?
		global $modFilter,$JSON;
		$modFilter = array('PROPERTY_'.$arCurIBlock['OFFERS_PROPERTY_ID']=>$ElementID);
		?><h3 class="title2"><?=$arParams['MODS_BLOCK_NAME']?></h3><?
global $alfaCTemplate, $alfaCSortType, $alfaCSortToo, $alfaCOutput;
$APPLICATION->IncludeComponent('redsign:catalog.sorter', 'gopro', array(
	'ALFA_ACTION_PARAM_NAME' => 'alfaction',
	'ALFA_ACTION_PARAM_VALUE' => 'alfavalue',
	'ALFA_CHOSE_TEMPLATES_SHOW' => 'Y',
	'ALFA_CNT_TEMPLATES' => '3',
	'ALFA_DEFAULT_TEMPLATE' => 'table',
	'ALFA_CNT_TEMPLATES_0' => $arParams['SORTER_TEMPLATE_NAME_3'],
	'ALFA_CNT_TEMPLATES_NAME_0' => 'table',
	'ALFA_CNT_TEMPLATES_1' => $arParams['SORTER_TEMPLATE_NAME_2'],
	'ALFA_CNT_TEMPLATES_NAME_1' => 'gallery',
	'ALFA_CNT_TEMPLATES_2' => $arParams['SORTER_TEMPLATE_NAME_1'],
	'ALFA_CNT_TEMPLATES_NAME_2' => 'showcase',
	'ALFA_SORT_BY_SHOW' => 'N',
	'ALFA_OUTPUT_OF_SHOW' => 'N',
	'AJAXPAGESID' => 'ajaxpages_mods',
	),
	false
);
		?><div class="clear"></div><?
		?><div id="ajaxpages_mods" class="ajaxpages_gmci"><!-- ajaxpages_gmci --><?
global $APPLICATION,$JSON;
$IS_SORTERCHANGE = 'N';
if ($_REQUEST['AJAX_CALL'] == 'Y' && $_REQUEST['sorterchange'] == 'ajaxpages_mods') {
	$IS_SORTERCHANGE = 'Y';
	$JSON['TYPE'] = 'OK';
}
$IS_AJAXPAGES = 'N';
if ($_REQUEST['ajaxpages'] == 'Y' && $_REQUEST['ajaxpagesid'] == 'ajaxpages_mods') {
	$IS_AJAXPAGES = 'Y';
	$JSON['TYPE'] = 'OK';
}
			$APPLICATION->IncludeComponent(
				'bitrix:catalog.section',
				'gopronew',
				array(
					'IBLOCK_TYPE' => $arParams['IBLOCK_TYPE'],
					'IBLOCK_ID' => $arCurIBlock['OFFERS_IBLOCK_ID'],
					'ELEMENT_SORT_FIELD' => $arParams['OFFERS_SORT_FIELD'],//$arParams['ELEMENT_SORT_FIELD'],
					'ELEMENT_SORT_ORDER' => $arParams['OFFERS_SORT_ORDER'],//$arParams['ELEMENT_SORT_ORDER'],
					'ELEMENT_SORT_FIELD2' => $arParams['OFFERS_SORT_FIELD2'],//$arParams['ELEMENT_SORT_FIELD2'],
					'ELEMENT_SORT_ORDER2' => $arParams['OFFERS_SORT_ORDER2'],//$arParams['ELEMENT_SORT_ORDER2'],
					'PROPERTY_CODE' => $arParams['LIST_OFFERS_PROPERTY_CODE'],
					'META_KEYWORDS' => $arParams['LIST_META_KEYWORDS'],
					'META_DESCRIPTION' => $arParams['LIST_META_DESCRIPTION'],
					'BROWSER_TITLE' => $arParams['LIST_BROWSER_TITLE'],
					'INCLUDE_SUBSECTIONS' => 'N',
					'BASKET_URL' => $arParams['BASKET_URL'],
					'ACTION_VARIABLE' => $arParams['ACTION_VARIABLE'],
					'PRODUCT_QUANTITY_VARIABLE' => $arParams['PRODUCT_QUANTITY_VARIABLE'],
					'PRODUCT_PROPS_VARIABLE' => $arParams['PRODUCT_PROPS_VARIABLE'],
					'FILTER_NAME' => 'modFilter',
					'CACHE_TYPE' => $arParams['CACHE_TYPE'],
					'CACHE_TIME' => $arParams['CACHE_TIME'],
					'CACHE_FILTER' => $arParams['CACHE_FILTER'],
					'CACHE_GROUPS' => $arParams['CACHE_GROUPS'],
					'SET_TITLE' => 'N',
					'SET_STATUS_404' => 'N',
					'DISPLAY_COMPARE' => 'N',
					'PAGE_ELEMENT_COUNT' => '100',
					'LINE_ELEMENT_COUNT' => $arParams['LINE_ELEMENT_COUNT'],
					'PRICE_CODE' => $arParams['PRICE_CODE'],
					'USE_PRICE_COUNT' => $arParams['USE_PRICE_COUNT'],
					'SHOW_PRICE_COUNT' => $arParams['SHOW_PRICE_COUNT'],

					'PRICE_VAT_INCLUDE' => $arParams['PRICE_VAT_INCLUDE'],
					'USE_PRODUCT_QUANTITY' => $arParams['~USE_PRODUCT_QUANTITY'],
					'ADD_PROPERTIES_TO_BASKET' => (isset($arParams['OFFERS_CART_PROPERTIES']) ? $arParams['OFFERS_CART_PROPERTIES'] : ''),
					'PARTIAL_PRODUCT_PROPERTIES' => (isset($arParams['PARTIAL_PRODUCT_PROPERTIES']) ? $arParams['PARTIAL_PRODUCT_PROPERTIES'] : ''),
					'PRODUCT_PROPERTIES' => $arParams['OFFERS_CART_PROPERTIES'],

					'DISPLAY_TOP_PAGER' => 'N',
					'DISPLAY_BOTTOM_PAGER' => 'N',
					'PAGER_TITLE' => $arParams['PAGER_TITLE'],
					'PAGER_SHOW_ALWAYS' => $arParams['PAGER_SHOW_ALWAYS'],
					'PAGER_TEMPLATE' => $arParams['PAGER_TEMPLATE'],
					'PAGER_DESC_NUMBERING' => $arParams['PAGER_DESC_NUMBERING'],
					'PAGER_DESC_NUMBERING_CACHE_TIME' => $arParams['PAGER_DESC_NUMBERING_CACHE_TIME'],
					'PAGER_SHOW_ALL' => $arParams['PAGER_SHOW_ALL'],
					'CONVERT_CURRENCY' => $arParams['CONVERT_CURRENCY'],
					'CURRENCY_ID' => $arParams['CURRENCY_ID'],
					// ajaxpages
					'AJAXPAGESID' => 'ajaxpages_mods',
					'IS_AJAXPAGES' => $IS_AJAXPAGES,
					'IS_SORTERCHANGE' => $IS_SORTERCHANGE,
					// goPro params
					'PROP_MORE_PHOTO' => $arParams['PROP_MORE_PHOTO'],
					'HIGHLOAD' => $arParams['HIGHLOAD'],
					'PROP_ARTICLE' => $arParams['PROP_SKU_ARTICLE'],
					'PROP_ACCESSORIES' => $arParams['PROP_ACCESSORIES'],
					'USE_FAVORITE' => 'N',
					'USE_SHARE' => 'N',
					'SHOW_ERROR_EMPTY_ITEMS' => 'N',
					'OFF_MEASURE_RATION' => $arParams['OFF_MEASURE_RATION'],
					'PROP_SKU_MORE_PHOTO' => $arParams['PROP_SKU_MORE_PHOTO'],
					'PROP_SKU_ARTICLE' => $arParams['PROP_SKU_ARTICLE'],
					'PROPS_ATTRIBUTES' => $arParams['PROPS_ATTRIBUTES'],
					// store
					'USE_STORE' => $arParams['USE_STORE'],
					'USE_MIN_AMOUNT' => $arParams['USE_MIN_AMOUNT'],
					'MIN_AMOUNT' => $arParams['MIN_AMOUNT'],
					'MAIN_TITLE' => $arParams['MAIN_TITLE'],
					// -----
					'BY_LINK' => 'Y',
					'DONT_SHOW_LINKS' => 'Y',
					'VIEW' => $alfaCTemplate,
					'COLUMNS5' => 'y',
					
					//perov
					'IBLOCK_TYPE' => $arParams['IBLOCK_TYPE'],
			'IBLOCK_ID' => $arParams['IBLOCK_ID'],
			'PROPERTY_CODE' => $arParams['DETAIL_PROPERTY_CODE'],
			'META_KEYWORDS' => $arParams['DETAIL_META_KEYWORDS'],
			'META_DESCRIPTION' => $arParams['DETAIL_META_DESCRIPTION'],
			'BROWSER_TITLE' => $arParams['DETAIL_BROWSER_TITLE'],
			'SET_CANONICAL_URL' => $arParams['DETAIL_SET_CANONICAL_URL'],
			'BASKET_URL' => $arParams['BASKET_URL'],
			'ACTION_VARIABLE' => $arParams['ACTION_VARIABLE'],
			'PRODUCT_ID_VARIABLE' => $arParams['PRODUCT_ID_VARIABLE'],
			'SECTION_ID_VARIABLE' => $arParams['SECTION_ID_VARIABLE'],
			'CHECK_SECTION_ID_VARIABLE' => (isset($arParams['DETAIL_CHECK_SECTION_ID_VARIABLE']) ? $arParams['DETAIL_CHECK_SECTION_ID_VARIABLE'] : ''),
			'PRODUCT_QUANTITY_VARIABLE' => $arParams['PRODUCT_QUANTITY_VARIABLE'],
			'PRODUCT_PROPS_VARIABLE' => $arParams['PRODUCT_PROPS_VARIABLE'],
			'CACHE_TYPE' => $arParams['CACHE_TYPE'],
			'CACHE_TIME' => $arParams['CACHE_TIME'],
			'CACHE_GROUPS' => $arParams['CACHE_GROUPS'],
			'SET_TITLE' => $arParams['SET_TITLE'],
			'SET_LAST_MODIFIED' => $arParams['SET_LAST_MODIFIED'],
			'MESSAGE_404' => $arParams['~MESSAGE_404'],
			'SET_STATUS_404' => $arParams['SET_STATUS_404'],
			'SHOW_404' => $arParams['SHOW_404'],
			'FILE_404' => $arParams['FILE_404'],
			'PRICE_CODE' => $arParams['PRICE_CODE'],
			'USE_PRICE_COUNT' => $arParams['USE_PRICE_COUNT'],
			'SHOW_PRICE_COUNT' => $arParams['SHOW_PRICE_COUNT'],
			'PRICE_VAT_INCLUDE' => $arParams['PRICE_VAT_INCLUDE'],
			'PRICE_VAT_SHOW_VALUE' => $arParams['PRICE_VAT_SHOW_VALUE'],
			'USE_PRODUCT_QUANTITY' => $arParams['USE_PRODUCT_QUANTITY'],
			'PRODUCT_PROPERTIES' => $arParams['PRODUCT_PROPERTIES'],
			'ADD_PROPERTIES_TO_BASKET' => (isset($arParams['ADD_PROPERTIES_TO_BASKET']) ? $arParams['ADD_PROPERTIES_TO_BASKET'] : ''),
			'PARTIAL_PRODUCT_PROPERTIES' => (isset($arParams['PARTIAL_PRODUCT_PROPERTIES']) ? $arParams['PARTIAL_PRODUCT_PROPERTIES'] : ''),
			'LINK_IBLOCK_TYPE' => $arParams['LINK_IBLOCK_TYPE'],
			'LINK_IBLOCK_ID' => $arParams['LINK_IBLOCK_ID'],
			'LINK_PROPERTY_SID' => $arParams['LINK_PROPERTY_SID'],
			'LINK_ELEMENTS_URL' => $arParams['LINK_ELEMENTS_URL'],

			'OFFERS_CART_PROPERTIES' => $arParams['OFFERS_CART_PROPERTIES'],
			'OFFERS_FIELD_CODE' => $arParams['DETAIL_OFFERS_FIELD_CODE'],
			'OFFERS_PROPERTY_CODE' => $arParams['DETAIL_OFFERS_PROPERTY_CODE'],
			'OFFERS_SORT_FIELD' => $arParams['OFFERS_SORT_FIELD'],
			'OFFERS_SORT_ORDER' => $arParams['OFFERS_SORT_ORDER'],
			'OFFERS_SORT_FIELD2' => $arParams['OFFERS_SORT_FIELD2'],
			'OFFERS_SORT_ORDER2' => $arParams['OFFERS_SORT_ORDER2'],

			'ELEMENT_ID' => $arResult['VARIABLES']['ELEMENT_ID'],
			'ELEMENT_CODE' => $arResult['VARIABLES']['ELEMENT_CODE'],
			'SECTION_ID' => $arResult['VARIABLES']['SECTION_ID'],
			'SECTION_CODE' => $arResult['VARIABLES']['SECTION_CODE'],
			'SECTION_URL' => $arResult['FOLDER'].$arResult['URL_TEMPLATES']['section'],
			'DETAIL_URL' => $arResult['FOLDER'].$arResult['URL_TEMPLATES']['element'],
			'CONVERT_CURRENCY' => $arParams['CONVERT_CURRENCY'],
			'CURRENCY_ID' => $arParams['CURRENCY_ID'],
			'HIDE_NOT_AVAILABLE' => $arParams['HIDE_NOT_AVAILABLE'],
			'HIDE_NOT_AVAILABLE_OFFERS' => $arParams['HIDE_NOT_AVAILABLE_OFFERS'],
			'USE_ELEMENT_COUNTER' => $arParams['USE_ELEMENT_COUNTER'],
			'SHOW_DEACTIVATED' => $arParams['SHOW_DEACTIVATED'],
			'USE_MAIN_ELEMENT_SECTION' => $arParams['USE_MAIN_ELEMENT_SECTION'],
			'STRICT_SECTION_CHECK' => (isset($arParams['DETAIL_STRICT_SECTION_CHECK']) ? $arParams['DETAIL_STRICT_SECTION_CHECK'] : ''),
			'ADD_PICT_PROP' => $arParams['ADD_PICT_PROP'],
			'LABEL_PROP' => $arParams['LABEL_PROP'],
			'LABEL_PROP_MOBILE' => $arParams['LABEL_PROP_MOBILE'],
			'LABEL_PROP_POSITION' => $arParams['LABEL_PROP_POSITION'],
			'OFFER_ADD_PICT_PROP' => $arParams['OFFER_ADD_PICT_PROP'],
			'OFFER_TREE_PROPS' => $arParams['OFFER_TREE_PROPS'],
			'PRODUCT_SUBSCRIPTION' => $arParams['PRODUCT_SUBSCRIPTION'],
			'SHOW_DISCOUNT_PERCENT' => $arParams['SHOW_DISCOUNT_PERCENT'],
			'DISCOUNT_PERCENT_POSITION' => (isset($arParams['DISCOUNT_PERCENT_POSITION']) ? $arParams['DISCOUNT_PERCENT_POSITION'] : ''),
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
			'MESS_PRICE_RANGES_TITLE' => (isset($arParams['~MESS_PRICE_RANGES_TITLE']) ? $arParams['~MESS_PRICE_RANGES_TITLE'] : ''),
			'MESS_DESCRIPTION_TAB' => (isset($arParams['~MESS_DESCRIPTION_TAB']) ? $arParams['~MESS_DESCRIPTION_TAB'] : ''),
			'MESS_PROPERTIES_TAB' => (isset($arParams['~MESS_PROPERTIES_TAB']) ? $arParams['~MESS_PROPERTIES_TAB'] : ''),
			'MESS_COMMENTS_TAB' => (isset($arParams['~MESS_COMMENTS_TAB']) ? $arParams['~MESS_COMMENTS_TAB'] : ''),
			'MAIN_BLOCK_PROPERTY_CODE' => (isset($arParams['DETAIL_MAIN_BLOCK_PROPERTY_CODE']) ? $arParams['DETAIL_MAIN_BLOCK_PROPERTY_CODE'] : ''),
			'MAIN_BLOCK_OFFERS_PROPERTY_CODE' => (isset($arParams['DETAIL_MAIN_BLOCK_OFFERS_PROPERTY_CODE']) ? $arParams['DETAIL_MAIN_BLOCK_OFFERS_PROPERTY_CODE'] : ''),
			'USE_VOTE_RATING' => $arParams['DETAIL_USE_VOTE_RATING'],
			'VOTE_DISPLAY_AS_RATING' => (isset($arParams['DETAIL_VOTE_DISPLAY_AS_RATING']) ? $arParams['DETAIL_VOTE_DISPLAY_AS_RATING'] : ''),
			'USE_COMMENTS' => $arParams['DETAIL_USE_COMMENTS'],
			'BLOG_USE' => (isset($arParams['DETAIL_BLOG_USE']) ? $arParams['DETAIL_BLOG_USE'] : ''),
			'BLOG_URL' => (isset($arParams['DETAIL_BLOG_URL']) ? $arParams['DETAIL_BLOG_URL'] : ''),
			'BLOG_EMAIL_NOTIFY' => (isset($arParams['DETAIL_BLOG_EMAIL_NOTIFY']) ? $arParams['DETAIL_BLOG_EMAIL_NOTIFY'] : ''),
			'VK_USE' => (isset($arParams['DETAIL_VK_USE']) ? $arParams['DETAIL_VK_USE'] : ''),
			'VK_API_ID' => (isset($arParams['DETAIL_VK_API_ID']) ? $arParams['DETAIL_VK_API_ID'] : 'API_ID'),
			'FB_USE' => (isset($arParams['DETAIL_FB_USE']) ? $arParams['DETAIL_FB_USE'] : ''),
			'FB_APP_ID' => (isset($arParams['DETAIL_FB_APP_ID']) ? $arParams['DETAIL_FB_APP_ID'] : ''),
			'BRAND_USE' => (isset($arParams['DETAIL_BRAND_USE']) ? $arParams['DETAIL_BRAND_USE'] : 'N'),
			'BRAND_PROP_CODE' => (isset($arParams['DETAIL_BRAND_PROP_CODE']) ? $arParams['DETAIL_BRAND_PROP_CODE'] : ''),
			'DISPLAY_NAME' => (isset($arParams['DETAIL_DISPLAY_NAME']) ? $arParams['DETAIL_DISPLAY_NAME'] : ''),
			'IMAGE_RESOLUTION' => (isset($arParams['DETAIL_IMAGE_RESOLUTION']) ? $arParams['DETAIL_IMAGE_RESOLUTION'] : ''),
			'PRODUCT_INFO_BLOCK_ORDER' => (isset($arParams['DETAIL_PRODUCT_INFO_BLOCK_ORDER']) ? $arParams['DETAIL_PRODUCT_INFO_BLOCK_ORDER'] : ''),
			'PRODUCT_PAY_BLOCK_ORDER' => (isset($arParams['DETAIL_PRODUCT_PAY_BLOCK_ORDER']) ? $arParams['DETAIL_PRODUCT_PAY_BLOCK_ORDER'] : ''),
			'ADD_DETAIL_TO_SLIDER' => (isset($arParams['DETAIL_ADD_DETAIL_TO_SLIDER']) ? $arParams['DETAIL_ADD_DETAIL_TO_SLIDER'] : ''),
			'TEMPLATE_THEME' => (isset($arParams['TEMPLATE_THEME']) ? $arParams['TEMPLATE_THEME'] : ''),
			'ADD_SECTIONS_CHAIN' => (isset($arParams['ADD_SECTIONS_CHAIN']) ? $arParams['ADD_SECTIONS_CHAIN'] : ''),
			'ADD_ELEMENT_CHAIN' => (isset($arParams['ADD_ELEMENT_CHAIN']) ? $arParams['ADD_ELEMENT_CHAIN'] : ''),
			'DISPLAY_PREVIEW_TEXT_MODE' => (isset($arParams['DETAIL_DISPLAY_PREVIEW_TEXT_MODE']) ? $arParams['DETAIL_DISPLAY_PREVIEW_TEXT_MODE'] : ''),
			'DETAIL_PICTURE_MODE' => (isset($arParams['DETAIL_DETAIL_PICTURE_MODE']) ? $arParams['DETAIL_DETAIL_PICTURE_MODE'] : array()),
			'ADD_TO_BASKET_ACTION' => $basketAction,
			'ADD_TO_BASKET_ACTION_PRIMARY' => (isset($arParams['DETAIL_ADD_TO_BASKET_ACTION_PRIMARY']) ? $arParams['DETAIL_ADD_TO_BASKET_ACTION_PRIMARY'] : null),
			'SHOW_CLOSE_POPUP' => isset($arParams['COMMON_SHOW_CLOSE_POPUP']) ? $arParams['COMMON_SHOW_CLOSE_POPUP'] : '',
			'DISPLAY_COMPARE' => (isset($arParams['USE_COMPARE']) ? $arParams['USE_COMPARE'] : ''),
			'COMPARE_PATH' => $arResult['FOLDER'].$arResult['URL_TEMPLATES']['compare'],
			'USE_COMPARE_LIST' => 'Y',
			'BACKGROUND_IMAGE' => (isset($arParams['DETAIL_BACKGROUND_IMAGE']) ? $arParams['DETAIL_BACKGROUND_IMAGE'] : ''),
			'COMPATIBLE_MODE' => (isset($arParams['COMPATIBLE_MODE']) ? $arParams['COMPATIBLE_MODE'] : ''),
			'DISABLE_INIT_JS_IN_COMPONENT' => (isset($arParams['DISABLE_INIT_JS_IN_COMPONENT']) ? $arParams['DISABLE_INIT_JS_IN_COMPONENT'] : ''),
			'SET_VIEWED_IN_COMPONENT' => (isset($arParams['DETAIL_SET_VIEWED_IN_COMPONENT']) ? $arParams['DETAIL_SET_VIEWED_IN_COMPONENT'] : ''),
			'SHOW_SLIDER' => (isset($arParams['DETAIL_SHOW_SLIDER']) ? $arParams['DETAIL_SHOW_SLIDER'] : ''),
			'SLIDER_INTERVAL' => (isset($arParams['DETAIL_SLIDER_INTERVAL']) ? $arParams['DETAIL_SLIDER_INTERVAL'] : ''),
			'SLIDER_PROGRESS' => (isset($arParams['DETAIL_SLIDER_PROGRESS']) ? $arParams['DETAIL_SLIDER_PROGRESS'] : ''),
			'USE_ENHANCED_ECOMMERCE' => (isset($arParams['USE_ENHANCED_ECOMMERCE']) ? $arParams['USE_ENHANCED_ECOMMERCE'] : ''),
			'DATA_LAYER_NAME' => (isset($arParams['DATA_LAYER_NAME']) ? $arParams['DATA_LAYER_NAME'] : ''),
			'BRAND_PROPERTY' => (isset($arParams['BRAND_PROPERTY']) ? $arParams['BRAND_PROPERTY'] : ''),

			'USE_GIFTS_DETAIL' => $arParams['USE_GIFTS_DETAIL']?: 'Y',
			'USE_GIFTS_MAIN_PR_SECTION_LIST' => $arParams['USE_GIFTS_MAIN_PR_SECTION_LIST']?: 'Y',
			'GIFTS_SHOW_DISCOUNT_PERCENT' => $arParams['GIFTS_SHOW_DISCOUNT_PERCENT'],
			'GIFTS_SHOW_OLD_PRICE' => $arParams['GIFTS_SHOW_OLD_PRICE'],
			'GIFTS_DETAIL_PAGE_ELEMENT_COUNT' => $arParams['GIFTS_DETAIL_PAGE_ELEMENT_COUNT'],
			'GIFTS_DETAIL_HIDE_BLOCK_TITLE' => $arParams['GIFTS_DETAIL_HIDE_BLOCK_TITLE'],
			'GIFTS_DETAIL_TEXT_LABEL_GIFT' => $arParams['GIFTS_DETAIL_TEXT_LABEL_GIFT'],
			'GIFTS_DETAIL_BLOCK_TITLE' => $arParams['GIFTS_DETAIL_BLOCK_TITLE'],
			'GIFTS_SHOW_NAME' => $arParams['GIFTS_SHOW_NAME'],
			'GIFTS_SHOW_IMAGE' => $arParams['GIFTS_SHOW_IMAGE'],
			'GIFTS_MESS_BTN_BUY' => $arParams['~GIFTS_MESS_BTN_BUY'],
			'GIFTS_PRODUCT_BLOCKS_ORDER' => $arParams['LIST_PRODUCT_BLOCKS_ORDER'],
			'GIFTS_SHOW_SLIDER' => $arParams['LIST_SHOW_SLIDER'],
			'GIFTS_SLIDER_INTERVAL' => isset($arParams['LIST_SLIDER_INTERVAL']) ? $arParams['LIST_SLIDER_INTERVAL'] : '',
			'GIFTS_SLIDER_PROGRESS' => isset($arParams['LIST_SLIDER_PROGRESS']) ? $arParams['LIST_SLIDER_PROGRESS'] : '',

			'GIFTS_MAIN_PRODUCT_DETAIL_PAGE_ELEMENT_COUNT' => $arParams['GIFTS_MAIN_PRODUCT_DETAIL_PAGE_ELEMENT_COUNT'],
			'GIFTS_MAIN_PRODUCT_DETAIL_BLOCK_TITLE' => $arParams['GIFTS_MAIN_PRODUCT_DETAIL_BLOCK_TITLE'],
			'GIFTS_MAIN_PRODUCT_DETAIL_HIDE_BLOCK_TITLE' => $arParams['GIFTS_MAIN_PRODUCT_DETAIL_HIDE_BLOCK_TITLE'],
					
				),
				$component,
				array('HIDE_ICONS'=>'Y')
			);
            
if ($IS_AJAXPAGES=='Y' || $IS_SORTERCHANGE=='Y') {
	$APPLICATION->RestartBuffer();
	if (SITE_CHARSET!='utf-8') {
		$data = $APPLICATION->ConvertCharsetArray($JSON, SITE_CHARSET, 'utf-8');
		$json_str_utf = json_encode($data);
		$json_str = $APPLICATION->ConvertCharset($json_str_utf, 'utf-8', SITE_CHARSET);
		echo $json_str;
	} else {
		echo json_encode($JSON);
	}
	die();
}

		?></div><!-- /ajaxpages_gmci --><?
	?></div><!-- /mods --><?
	?><script>
	if ($('#ajaxpages_mods').find('.js-element').length < 1) {
		$('.mods').hide();
	}
	</script><?
}

// bigdata
if ($arParams['USE_BLOCK_BIGDATA'] == 'Y') {
	$obCache = new CPHPCache();
	if ($obCache->InitCache(36000, serialize($arFilter) ,'/iblock/catalog')) {
		$arCurIBlock = $obCache->GetVars();
	} elseif($obCache->StartDataCache()) {
		$arCurIBlock = CIBlockPriceTools::GetOffersIBlock($arParams['IBLOCK_ID']);
		if(defined('BX_COMP_MANAGED_CACHE')) {
			global $CACHE_MANAGER;
			$CACHE_MANAGER->StartTagCache('/iblock/catalog');
			if($arCurIBlock) {
				$CACHE_MANAGER->RegisterTag('iblock_id_'.$arParams['IBLOCK_ID']);
			}
			$CACHE_MANAGER->EndTagCache();
		} else {
			if(!$arCurIBlock) {
				$arCurIBlock = array();
			}
		}
		$obCache->EndDataCache($arCurIBlock);
	}
	?><div class="bigdata js-bigdata" style="display:none;"><!-- /bigdata --><?
		?><h3 class="title2"><?=$arParams['BIGDATA_BLOCK_NAME']?></h3><?
global $alfaCTemplate, $alfaCSortType, $alfaCSortToo, $alfaCOutput;
$APPLICATION->IncludeComponent('redsign:catalog.sorter', 'gopro', array(
	'ALFA_ACTION_PARAM_NAME' => 'alfaction',
	'ALFA_ACTION_PARAM_VALUE' => 'alfavalue',
	'ALFA_CHOSE_TEMPLATES_SHOW' => 'Y',
	'ALFA_CNT_TEMPLATES' => '3',
	'ALFA_DEFAULT_TEMPLATE' => 'table',
	'ALFA_CNT_TEMPLATES_0' => $arParams['SORTER_TEMPLATE_NAME_3'],
	'ALFA_CNT_TEMPLATES_NAME_0' => 'table',
	'ALFA_CNT_TEMPLATES_1' => $arParams['SORTER_TEMPLATE_NAME_2'],
	'ALFA_CNT_TEMPLATES_NAME_1' => 'gallery',
	'ALFA_CNT_TEMPLATES_2' => $arParams['SORTER_TEMPLATE_NAME_1'],
	'ALFA_CNT_TEMPLATES_NAME_2' => 'showcase',
	'ALFA_SORT_BY_SHOW' => 'N',
	'ALFA_OUTPUT_OF_SHOW' => 'N',
	'AJAXPAGESID' => 'ajaxpages_bigdata',
	),
	false
);
		?><div class="clear"></div><?
		?><div id="ajaxpages_bigdata" class="ajaxpages_gmci"><!-- /ajaxpages_gmci --><?
global $APPLICATION,$JSON;
$IS_SORTERCHANGE = 'N';
if($_REQUEST['AJAX_CALL']=='Y' && $_REQUEST['sorterchange']=='ajaxpages_bigdata') {
	$IS_SORTERCHANGE = 'Y';
	$JSON['TYPE'] = 'OK';
}
$IS_AJAXPAGES = 'N';
if($_REQUEST['ajaxpages']=='Y' && $_REQUEST['ajaxpagesid']=='ajaxpages_bigdata') {
	$IS_AJAXPAGES = 'Y';
	$JSON['TYPE'] = 'OK';
}
			?><?$APPLICATION->IncludeComponent("bitrix:catalog.bigdata.products", "gopro", array(
					"LINE_ELEMENT_COUNT" => 5,
					"BASKET_URL" => $arParams["BASKET_URL"],
					"ACTION_VARIABLE" => (!empty($arParams["ACTION_VARIABLE"]) ? $arParams["ACTION_VARIABLE"] : "action")."_cbdp",
					"PRODUCT_QUANTITY_VARIABLE" => $arParams["PRODUCT_QUANTITY_VARIABLE"],
					"ADD_PROPERTIES_TO_BASKET" => (isset($arParams["ADD_PROPERTIES_TO_BASKET"]) ? $arParams["ADD_PROPERTIES_TO_BASKET"] : ''),
					"PRODUCT_PROPS_VARIABLE" => $arParams["PRODUCT_PROPS_VARIABLE"],
					"PARTIAL_PRODUCT_PROPERTIES" => (isset($arParams["PARTIAL_PRODUCT_PROPERTIES"]) ? $arParams["PARTIAL_PRODUCT_PROPERTIES"] : ''),
					"SHOW_OLD_PRICE" => $arParams['SHOW_OLD_PRICE'],
					"SHOW_DISCOUNT_PERCENT" => $arParams['SHOW_DISCOUNT_PERCENT'],
					"PRICE_CODE" => $arParams["PRICE_CODE"],
					"SHOW_PRICE_COUNT" => $arParams["SHOW_PRICE_COUNT"],
					"PRODUCT_SUBSCRIPTION" => $arParams['PRODUCT_SUBSCRIPTION'],
					"PRICE_VAT_INCLUDE" => $arParams["PRICE_VAT_INCLUDE"],
					"USE_PRODUCT_QUANTITY" => $arParams['USE_PRODUCT_QUANTITY'],
					"SHOW_NAME" => "Y",
					"SHOW_IMAGE" => "Y",
					"MESS_BTN_BUY" => $arParams['MESS_BTN_BUY'],
					"MESS_BTN_DETAIL" => $arParams['MESS_BTN_DETAIL'],
					"MESS_BTN_SUBSCRIBE" => $arParams['MESS_BTN_SUBSCRIBE'],
					"MESS_NOT_AVAILABLE" => $arParams['MESS_NOT_AVAILABLE'],
					"PAGE_ELEMENT_COUNT" => 5,
					"SHOW_FROM_SECTION" => "N",
					"IBLOCK_TYPE" => $arParams["IBLOCK_TYPE"],
					"IBLOCK_ID" => $arParams["IBLOCK_ID"],
					"DEPTH" => "2",
					"CACHE_TYPE" => $arParams["CACHE_TYPE"],
					"CACHE_TIME" => $arParams["CACHE_TIME"],
					"CACHE_GROUPS" => $arParams["CACHE_GROUPS"],
					"SHOW_PRODUCTS_".$arParams["IBLOCK_ID"] => "Y",
					"ADDITIONAL_PICT_PROP_".$arParams["IBLOCK_ID"] => $arParams['ADD_PICT_PROP'],
					"LABEL_PROP_".$arParams["IBLOCK_ID"] => "-",
					"HIDE_NOT_AVAILABLE" => $arParams["HIDE_NOT_AVAILABLE"],
					"CONVERT_CURRENCY" => $arParams["CONVERT_CURRENCY"],
					"CURRENCY_ID" => $arParams["CURRENCY_ID"],
					"SECTION_ELEMENT_ID" => $arResult["VARIABLES"]["SECTION_ID"],
					"SECTION_ELEMENT_CODE" => $arResult["VARIABLES"]["SECTION_CODE"],
					"ID" => $ElementID,
					"PROPERTY_CODE_".$arParams["IBLOCK_ID"] => $arParams["LIST_PROPERTY_CODE"],
					"PROPERTY_CODE_".$arCurIBlock['OFFERS_IBLOCK_ID'] => $arParams['LIST_OFFERS_PROPERTY_CODE'],
					"RCM_TYPE" => (isset($arParams['BIG_DATA_RCM_TYPE']) ? $arParams['BIG_DATA_RCM_TYPE'] : ''),
					/////////////////////////////////////
					'DISPLAY_COMPARE' => $arParams['USE_COMPARE'],
					// ajaxpages
					'AJAXPAGESID' => 'ajaxpages_bigdata',
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
					// columns
					'COLUMNS5' => 'y',
				),
				$component,
				$componentElementParams,
				array("HIDE_ICONS" => "Y")
			);
if ($IS_AJAXPAGES=='Y' || $IS_SORTERCHANGE=='Y') {
	$APPLICATION->RestartBuffer();
	if(SITE_CHARSET!='utf-8') {
		$data = $APPLICATION->ConvertCharsetArray($JSON, SITE_CHARSET, 'utf-8');
		$json_str_utf = json_encode($data);
		$json_str = $APPLICATION->ConvertCharset($json_str_utf, 'utf-8', SITE_CHARSET);
		echo $json_str;
	} else {
		echo json_encode($JSON);
	}
	die();
}
		?></div><!-- /ajaxpages_gmci --><?
	?></div><!-- /bigdata --><?
}
// /bigdata

// tabs
?><div class="detailtabs <?if($arParams['DETAIL_TABS_VIEW']=='anchor'):?>anchor<?else:?>tabs<?endif;?>"><?
	?><div class="headers clearfix"><?
		$APPLICATION->ShowViewContent('TABS_HTML_HEADERS');
		if( $arParams['USE_REVIEW']=='Y' && IsModuleInstalled('forum') )
		{
			?><a class="switcher" href="#review"><?=GetMessage('TABS_REVIEW')?></a><?
		}
	?></div><?
	?><div class="contents"><?
		$APPLICATION->ShowViewContent('TABS_HTML_CONTENTS');
		if( $arParams['USE_REVIEW']=='Y' && IsModuleInstalled('forum') ) {
			?><div class="content selected review" id="review"><?
				?><a class="switcher" href="#review"><?=GetMessage('TABS_REVIEW')?></a><?
				?><div class="contentbody clearfix"><?
					?><a class="add2review btn3" href="#addreview"><?=GetMessage('ADD_REVIEW')?></a><?
					?><?$APPLICATION->IncludeComponent(
						'bitrix:forum.topic.reviews',
						'gopro',
						Array(
							"URL_TEMPLATES_DETAIL" => $arParams["REVIEWS_URL_TEMPLATES_DETAIL"],			
							"SHOW_LINK_TO_FORUM" => $arParams["SHOW_LINK_TO_FORUM"],
							"FORUM_ID" => $arParams["FORUM_ID"],
							'IBLOCK_TYPE' => $arParams['IBLOCK_TYPE'],
							'IBLOCK_ID' => $arParams['IBLOCK_ID'],
							'ELEMENT_ID' => $ElementID,
							"URL_TEMPLATES_READ" => $arParams["URL_TEMPLATES_READ"],
							"MESSAGES_PER_PAGE" => $arParams["MESSAGES_PER_PAGE"],
							"PAGE_NAVIGATION_TEMPLATE" => $arParams["PAGE_NAVIGATION_TEMPLATE"],
							"PATH_TO_SMILE" => $arParams["PATH_TO_SMILE"],
							"USE_CAPTCHA" => $arParams["USE_CAPTCHA"],
							"CACHE_TYPE" => $arParams["CACHE_TYPE"],
							"CACHE_TIME" => $arParams["CACHE_TIME"],
							'AJAX_POST' => 'N',
							'AJAX_MODE' => 'N',
						),
						$component,
						array('HIDE_ICONS' => 'Y')
					);?><?
				?></div><?
			?></div><?
		}
	?></div><!-- /contents --><?
?></div>
