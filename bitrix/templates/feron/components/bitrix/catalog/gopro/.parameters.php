<?if(!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED!==true) die();

if(!CModule::IncludeModule('iblock'))
	return;
if(!CModule::IncludeModule('catalog'))
	return;
if(!CModule::IncludeModule('redsign.devfunc'))
	return;

$listProp = RSDevFuncParameters::GetTemplateParamsPropertiesList($arCurrentValues['IBLOCK_ID']);
$arCatalog = CCatalog::GetByID($arCurrentValues['IBLOCK_ID']);

$arViewModeList = array(
	'VIEW_SECTIONS' => GetMessage('RSGOPRO_VIEW_SECTIONS'),
	'VIEW_ELEMENTS' => GetMessage('RSGOPRO_VIEW_ELEMENTS')
);

$highload_type = array(
	'HIGHLOAD_TYPE_SELECT' => GetMessage('HIGHLOAD_TYPE_SELECT'),
	'HIGHLOAD_TYPE_LIST' => GetMessage('HIGHLOAD_TYPE_LIST')
);

$arPrice = array();
$rsPrice = CCatalogGroup::GetList($v1='sort', $v2='asc');
while($arr = $rsPrice->Fetch())
{
	$arPrice[$arr['NAME']] = '['.$arr['NAME'].'] '.$arr['NAME_LANG'];
}

$arrViews = array(
	'tab' => GetMessage('DETAIL_ARR_TABS_VIEW_TAB'),
	'anchor' => GetMessage('DETAIL_ARR_TABS_VIEW_ANCHOR'),
);

$arPriceFro = array(
	'products' => GetMessage('FILTER_PRICE_GROUPED_FOR_PRIDUCTS'),
	'sku' => GetMessage('FILTER_PRICE_GROUPED_FOR_SKU'),
);

$arFilterDisabledPicEffect = array(
	'none' => GetMessage('FILTER_DISABLED_PIC_EFFECT_none'),
	'cross' => GetMessage('FILTER_DISABLED_PIC_EFFECT_cross'),
	'opacity' => GetMessage('FILTER_DISABLED_PIC_EFFECT_opacity'),
	'hide' => GetMessage('FILTER_DISABLED_PIC_EFFECT_hide'),
);

$arShareBlock = array(
	'collections' => GetMessage("MSG_SHARE-collections"),
	'vkontakte' => GetMessage("MSG_SHARE-vkontakte"),
	'facebook' => GetMessage("MSG_SHARE-facebook"),
	'odnoklassniki' => GetMessage("MSG_SHARE-odnoklassniki"),
	'moimir' => GetMessage("MSG_SHARE-moimir"),
	'gplus' => GetMessage("MSG_SHARE-gplus"),
	'twitter' => GetMessage("MSG_SHARE-twitter"),
	'blogger' => GetMessage("MSG_SHARE-blogger"),
	'delicious' => GetMessage("MSG_SHARE-delicious"),
	'digg' => GetMessage("MSG_SHARE-digg"),
	'reddit' => GetMessage("MSG_SHARE-reddit"),
	'evernote' => GetMessage("MSG_SHARE-evernote"),
	'linkedin' => GetMessage("MSG_SHARE-linkedin"),
	'lj' => GetMessage("MSG_SHARE-lj"),
	'pocket' => GetMessage("MSG_SHARE-pocket"),
	'qzone' => GetMessage("MSG_SHARE-qzone"),
	'renren' => GetMessage("MSG_SHARE-renren"),
	'sinaWeibo' => GetMessage("MSG_SHARE-sinaWeibo"),
	'surfingbird' => GetMessage("MSG_SHARE-surfingbird"),
	'tencentWeibo' => GetMessage("MSG_SHARE-tencentWeibo"),
	'tumblr' => GetMessage("MSG_SHARE-tumblr"),
	'viber' => GetMessage("MSG_SHARE-viber"),
	'whatsapp' => GetMessage("MSG_SHARE-whatsapp"),
	'skype' => GetMessage("MSG_SHARE-skype"),
	'telegram' => GetMessage("MSG_SHARE-telegram"),
);

$arShareBlock = array(
	'collections' => GetMessage("MSG_SHARE-collections"),
	'vkontakte' => GetMessage("MSG_SHARE-vkontakte"),
	'facebook' => GetMessage("MSG_SHARE-facebook"),
	'odnoklassniki' => GetMessage("MSG_SHARE-odnoklassniki"),
	'moimir' => GetMessage("MSG_SHARE-moimir"),
	'gplus' => GetMessage("MSG_SHARE-gplus"),
	'twitter' => GetMessage("MSG_SHARE-twitter"),
	'blogger' => GetMessage("MSG_SHARE-blogger"),
	'delicious' => GetMessage("MSG_SHARE-delicious"),
	'digg' => GetMessage("MSG_SHARE-digg"),
	'reddit' => GetMessage("MSG_SHARE-reddit"),
	'evernote' => GetMessage("MSG_SHARE-evernote"),
	'linkedin' => GetMessage("MSG_SHARE-linkedin"),
	'lj' => GetMessage("MSG_SHARE-lj"),
	'pocket' => GetMessage("MSG_SHARE-pocket"),
	'qzone' => GetMessage("MSG_SHARE-qzone"),
	'renren' => GetMessage("MSG_SHARE-renren"),
	'sinaWeibo' => GetMessage("MSG_SHARE-sinaWeibo"),
	'surfingbird' => GetMessage("MSG_SHARE-surfingbird"),
	'tencentWeibo' => GetMessage("MSG_SHARE-tencentWeibo"),
	'tumblr' => GetMessage("MSG_SHARE-tumblr"),
	'viber' => GetMessage("MSG_SHARE-viber"),
	'whatsapp' => GetMessage("MSG_SHARE-whatsapp"),
	'skype' => GetMessage("MSG_SHARE-skype"),
	'telegram' => GetMessage("MSG_SHARE-telegram"),
);

$arTemplateParameters = array(
	'SECTIONS_VIEW_MODE' => array(
		'PARENT' => 'BASE',
		'NAME' => GetMessage('RSGOPRO_VIEW_MODE'),
		'TYPE' => 'LIST',
		'VALUES' => $arViewModeList,
		'MULTIPLE' => 'N',
		'DEFAULT' => 'LIST',
	),
	// section, element
	'PROP_MORE_PHOTO' => array(
		'NAME' => GetMessage('PROP_MORE_PHOTO'),
		'TYPE' => 'LIST',
		'VALUES' => $listProp['F'],
	),
	'HIGHLOAD' => array(
		'PARENT' => 'BASE',
		'NAME' => GetMessage('HIGHLOAD'),
		'TYPE' => 'LIST',
		'VALUES' => $highload_type,
		'MULTIPLE' => 'N',
		'DEFAULT' => 'LIST',
	),
	'PROP_ARTICLE' => array(
		'NAME' => GetMessage('PROP_ARTICLE'),
		'TYPE' => 'LIST',
		'VALUES' => $listProp['SNL'],
	),
	'USE_FAVORITE' => array(
		'NAME' => GetMessage('USE_FAVORITE'),
		'TYPE' => 'CHECKBOX',
		'VALUE' => 'Y',
		'DEFAULT' => 'Y',
	),
	'USE_SHARE' => array(
		'NAME' => GetMessage('USE_SHARE'),
		'TYPE' => 'CHECKBOX',
		'VALUE' => 'Y',
		'DEFAULT' => 'Y',
	),
	'SHOW_ERROR_EMPTY_ITEMS' => array(
		'NAME' => GetMessage('SHOW_ERROR_EMPTY_ITEMS'),
		'TYPE' => 'CHECKBOX',
		'VALUE' => 'Y',
		'DEFAULT' => 'Y',
	),
	'SHORT_SORTER' => array(
		'NAME' => GetMessage('SHORT_SORTER'),
		'TYPE' => 'CHECKBOX',
		'VALUE' => 'Y',
		'DEFAULT' => 'Y',
	),
	'USE_AUTO_AJAXPAGES' => array(
		'NAME' => GetMessage('USE_AUTO_AJAXPAGES'),
		'TYPE' => 'CHECKBOX',
		'VALUE' => 'Y',
		'DEFAULT' => 'N',
	),
	'OFF_MEASURE_RATION' => array(
		'NAME' => GetMessage('OFF_MEASURE_RATION'),
		'TYPE' => 'CHECKBOX',
		'VALUE' => 'Y',
		'DEFAULT' => 'N',
	),
	// element
	'PROPS_TABS' => array(
		'PARENT' => 'DETAIL_SETTINGS',
		'NAME' => GetMessage('PROPS_TABS'),
		'TYPE' => 'LIST',
		'VALUES' => $listProp['ALL'],
		'MULTIPLE' => 'Y',
	),
	'USE_CHEAPER' => array(
		'PARENT' => 'DETAIL_SETTINGS',
		'NAME' => GetMessage('USE_CHEAPER'),
		'TYPE' => 'CHECKBOX',
		'VALUE' => 'Y',
		'DEFAULT' => 'Y',
	),
	'USE_BLOCK_MODS' => array(
		'PARENT' => 'DETAIL_SETTINGS',
		'NAME' => GetMessage('USE_BLOCK_MODS'),
		'TYPE' => 'CHECKBOX',
		'VALUE' => 'Y',
		'DEFAULT' => 'Y',
	),
	'MODS_BLOCK_NAME' => array(
		'PARENT' => 'DETAIL_SETTINGS',
		'NAME' => GetMessage('MODS_BLOCK_NAME'),
		'TYPE' => 'STRING',
	),
	'USE_BLOCK_BIGDATA' => array(
		'PARENT' => 'DETAIL_SETTINGS',
		'NAME' => GetMessage('USE_BLOCK_BIGDATA'),
		'TYPE' => 'CHECKBOX',
		'VALUE' => 'Y',
		'DEFAULT' => 'Y',
	),
	'BIGDATA_BLOCK_NAME' => array(
		'PARENT' => 'DETAIL_SETTINGS',
		'NAME' => GetMessage('BIGDATA_BLOCK_NAME'),
		'TYPE' => 'STRING',
	),
	'DETAIL_TABS_VIEW' => array(
		'PARENT' => 'DETAIL_SETTINGS',
		'NAME' => GetMessage('DETAIL_TABS_VIEW'),
		'TYPE' => 'LIST',
		'VALUES' => $arrViews,
		'MULTIPLE' => 'N',
		'DEFAULT' => 'tab',
	),
	'SHOW_PREVIEW_TEXT' => array(
		'PARENT' => 'DETAIL_SETTINGS',
		'NAME' => GetMessage('SHOW_PREVIEW_TEXT'),
		'TYPE' => 'CHECKBOX',
		'VALUE' => 'Y',
	),
	'USE_BIG_DATA' => array(
		'PARENT' => 'BIG_DATA_SETTINGS',
		'NAME' => GetMessage('CP_BC_TPL_USE_BIG_DATA'),
		'TYPE' => 'CHECKBOX',
		'DEFAULT' => 'Y',
		'REFRESH' => 'Y',
	),
	// filter
	'FILTER_PROP_SCROLL' => array(
		'PARENT' => 'FILTER_SETTINGS',
		'NAME' => GetMessage('FILTER_PROP_SCROLL'),
		'TYPE' => 'LIST',
		'MULTIPLE' => 'Y',
		'VALUES' => $listProp['ALL'],
	),
	'FILTER_PROP_SEARCH' => array(
		'PARENT' => 'FILTER_SETTINGS',
		'NAME' => GetMessage('FILTER_PROP_SEARCH'),
		'TYPE' => 'LIST',
		'MULTIPLE' => 'Y',
		'VALUES' => $listProp['ALL'],
	),
	'FILTER_FIXED' => array(
		'PARENT' => 'FILTER_SETTINGS',
		'NAME' => GetMessage('FILTER_FIXED'),
		'TYPE' => 'CHECKBOX',
		'VALUE' => 'Y',
	),
	'FILTER_USE_AJAX' => array(
		'PARENT' => 'FILTER_SETTINGS',
		'NAME' => GetMessage('FILTER_USE_AJAX'),
		'TYPE' => 'CHECKBOX',
		'VALUE' => 'Y',
	),
	// showcase
	'OFF_SMALLPOPUP' => array(
		'NAME' => GetMessage('OFF_SMALLPOPUP'),
		'TYPE' => 'CHECKBOX',
		'VALUE' => 'Y',
		'DEFAULT' => 'N',
	),
	// sorter
	'SORTER_CNT_TEMPLATES' => array(
		'NAME' => GetMessage('SORTER_CNT_TEMPLATES'),
		'TYPE' => 'STRING',
		'DEFAULT' => '3',
		'REFRESH' => 'Y',
	),
	'SORTER_DEFAULT_TEMPLATE' => array(
		'NAME' => GetMessage('SORTER_DEFAULT_TEMPLATE'),
		'TYPE' => 'STRING',
	),
	'SORTER_OFF_SORT_BY' => array(
		'NAME' => GetMessage('SORTER_OFF_SORT_BY'),
		'TYPE' => 'CHECKBOX',
		'VALUE' => 'Y',
		'DEFAULT' => 'N',
	),
	'SORTER_OFF_OUTPUT_OF_SHOW' => array(
		'NAME' => GetMessage('SORTER_OFF_OUTPUT_OF_SHOW'),
		'TYPE' => 'CHECKBOX',
		'VALUE' => 'Y',
		'DEFAULT' => 'N',
	),
	'SORTER_OUTPUT_OF' => array(
		'NAME' => GetMessage('SORTER_OUTPUT_OF'),
		'TYPE' => 'STRING',
		'DEFAULT' => '',
		'MULTIPLE' => 'Y',
	),
	'SORTER_OUTPUT_OF_DEFAULT' => array(
		'NAME' => GetMessage('SORTER_OUTPUT_OF_DEFAULT'),
		'TYPE' => 'STRING',
		'DEFAULT' => '15',
	),
	//YA SHARE
	'SOC_SHARE_ICON' => array(
		'PARENT' => 'DETAIL_SETTINGS',
		'NAME' => GetMessage('SOC_SHARE_ICON'),
		'TYPE' => 'LIST',
		'MULTIPLE' => 'Y',
		'VALUES' => $arShareBlock,
	),
);

if( IntVal($arCurrentValues['SORTER_CNT_TEMPLATES'])>0 ) {
	for($i=1; $i<=$arCurrentValues['SORTER_CNT_TEMPLATES']; $i++) {
		$arTemplateParameters['SORTER_TEMPLATE_NAME_'.$i] = array(
			'NAME' => GetMessage('SORTER_TEMPLATE_NAME').$i,
			'TYPE' => 'STRING',
		);
	}
}

/* filter */
if( $arCurrentValues['FILTER_TEMPLATE']!='gopro_20' ) {
	$arTemplateParameters['PROPS_FILTER_COLORS'] = array(
		'PARENT' => 'FILTER_SETTINGS',
		'NAME' => GetMessage('PROPS_FILTER_COLORS'),
		'TYPE' => 'LIST',
		'VALUES' => $listProp['HL'],
		'MULTIPLE' => 'Y',
	);
	$arTemplateParameters['FILTER_PRICE_GROUPED'] = array(
		'PARENT' => 'FILTER_SETTINGS',
		'NAME' => GetMessage('FILTER_PRICE_GROUPED'),
		'TYPE' => 'LIST',
		'MULTIPLE' => 'Y',
		'VALUES' => $arPrice,
	);
	$arTemplateParameters['FILTER_PRICE_GROUPED_FOR'] = array(
		'PARENT' => 'FILTER_SETTINGS',
		'NAME' => GetMessage('FILTER_PRICE_GROUPED_FOR'),
		'TYPE' => 'LIST',
		'MULTIPLE' => 'N',
		'DEFAULT' => 'products',
		'VALUES' => $arPriceFro,
	);
}
if( $arCurrentValues['FILTER_TEMPLATE']=='gopro_20' ) {
	$arTemplateParameters['FILTER_DISABLED_PIC_EFFECT'] = array(
		'PARENT' => 'FILTER_SETTINGS',
		'NAME' => GetMessage('FILTER_DISABLED_PIC_EFFECT'),
		'TYPE' => 'LIST',
		'MULTIPLE' => 'N',
		'DEFAULT' => 'none',
		'VALUES' => $arFilterDisabledPicEffect,
	);
}

if(IntVal($arCatalog["OFFERS_IBLOCK_ID"])) {
	$listProp2 = RSDevFuncParameters::GetTemplateParamsPropertiesList($arCatalog['OFFERS_IBLOCK_ID']);
	$arTemplateParameters['PROP_SKU_MORE_PHOTO'] = array(
		'NAME' => GetMessage('PROP_SKU_MORE_PHOTO'),
		'TYPE' => 'LIST',
		'VALUES' => $listProp2['F'],
	);
	$arTemplateParameters['PROP_SKU_ARTICLE'] = array(
		'NAME' => GetMessage('PROP_SKU_ARTICLE'),
		'TYPE' => 'LIST',
		'VALUES' => $listProp2['SNL'],
	);
	$arTemplateParameters['PROPS_ATTRIBUTES'] = array(
		'NAME' => GetMessage('PROPS_ATTRIBUTES'),
		'TYPE' => 'LIST',
		'VALUES' => $listProp2['SNL'],
		'MULTIPLE' => 'Y',
	);
	$arTemplateParameters['PROPS_ATTRIBUTES_COLOR'] = array(
		'NAME' => GetMessage('PROPS_ATTRIBUTES_COLOR'),
		'TYPE' => 'LIST',
		'VALUES' => $listProp2['HL'],
		'MULTIPLE' => 'Y',
	);
	// filter
		if( $arCurrentValues['FILTER_TEMPLATE']!='gopro_20' ) {
		$arTemplateParameters['PROPS_SKU_FILTER_COLORS'] = array(
			'PARENT' => 'FILTER_SETTINGS',
			'NAME' => GetMessage('PROPS_SKU_FILTER_COLORS'),
			'TYPE' => 'LIST',
			'VALUES' => $listProp2['HL'],
			'MULTIPLE' => 'Y',
		);
	}
	$arTemplateParameters['FILTER_SKU_PROP_SCROLL'] = array(
		'PARENT' => 'FILTER_SETTINGS',
		'NAME' => GetMessage('FILTER_SKU_PROP_SCROLL'),
		'TYPE' => 'LIST',
		'MULTIPLE' => 'Y',
		'VALUES' => $listProp2['ALL'],
	);
	$arTemplateParameters['FILTER_SKU_PROP_SEARCH'] = array(
		'PARENT' => 'FILTER_SETTINGS',
		'NAME' => GetMessage('FILTER_SKU_PROP_SEARCH'),
		'TYPE' => 'LIST',
		'MULTIPLE' => 'Y',
		'VALUES' => $listProp2['ALL'],
	);
}

/* bigdata */
if(!isset($arCurrentValues['USE_BIG_DATA']) || $arCurrentValues['USE_BIG_DATA'] == 'Y') {
	$rcmTypeList = array(
		'bestsell' => GetMessage('CP_BC_TPL_RCM_BESTSELLERS'),
		'personal' => GetMessage('CP_BC_TPL_RCM_PERSONAL'),
		'similar_sell' => GetMessage('CP_BC_TPL_RCM_SOLD_WITH'),
		'similar_view' => GetMessage('CP_BC_TPL_RCM_VIEWED_WITH'),
		'similar' => GetMessage('CP_BC_TPL_RCM_SIMILAR'),
		'any_similar' => GetMessage('CP_BC_TPL_RCM_SIMILAR_ANY'),
		'any_personal' => GetMessage('CP_BC_TPL_RCM_PERSONAL_WBEST'),
		'any' => GetMessage('CP_BC_TPL_RCM_RAND')
	);
	$arTemplateParameters['BIG_DATA_RCM_TYPE'] = array(
		'PARENT' => 'BIG_DATA_SETTINGS',
		'NAME' => GetMessage('CP_BC_TPL_BIG_DATA_RCM_TYPE'),
		'TYPE' => 'LIST',
		'VALUES' => $rcmTypeList
	);
	unset($rcmTypeList);
}