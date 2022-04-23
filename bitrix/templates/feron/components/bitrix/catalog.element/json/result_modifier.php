<?if(!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED!==true)die();

if(!CModule::IncludeModule('redsign.devfunc'))
  return;

$arResult['JSON_EXT'] = RSDevFuncOffersExtension::GetJSONElement(
  $arResult,
  $arParams['PROPS_ATTRIBUTES'],
  $arParams['PRICE_CODE'],
  array('SKU_MORE_PHOTO_CODE'=>$arParams['PROP_SKU_MORE_PHOTO'],'SIZES'=>array('WIDTH'=>210,'HEIGHT'=>140),'SKU_ARTICLE_CODE' => $arParams['PROP_SKU_ARTICLE'])
);

foreach($arResult['OFFERS'] as $key1=>$arItem) {
  foreach($arItem['DISPLAY_PROPERTIES'] as $key=>$arProp)
  {
    if(!in_array($arProp['CODE'], $arParams['PROPS_ATTRIBUTES'])) {
      $arResult['JSON_EXT']['OFFERS'][$arItem['ID']]['DISPLAY_PROPERTIES'][$arProp["ID"]]["DISPLAY_VALUE"] = is_array($arProp['DISPLAY_VALUE']) ? implode(' / ', $arProp['DISPLAY_VALUE']) : $arProp['DISPLAY_VALUE'];
      $arResult['JSON_EXT']['OFFERS'][$arItem['ID']]['DISPLAY_PROPERTIES'][$arProp["ID"]]["NAME"] = $arProp["NAME"];
    }
  }
}