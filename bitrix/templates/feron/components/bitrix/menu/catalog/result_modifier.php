<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

if( $arParams['RSGOPRO_MAX_ITEM']=='' )
	$arParams['RSGOPRO_MAX_ITEM'] = 9;

if( is_array($arResult) && count($arResult)>0 ){
	$last_key_lvl1 = 0;
	foreach($arResult as $key => $arItem){
		$arResult[$key]['IS_LAST_LVL1'] = 'N';
		if($arItem['DEPTH_LEVEL'] == 1){
			$last_key_lvl1 = $key;
		}
	}
	$arResult[$last_key_lvl1]['IS_LAST_LVL1'] = 'Y';


	// Добавляем иконки в меню для первого уровня
	$arIcons = array();
	$arFilter = array('IBLOCK_ID' => 5,'DEPTH_LEVEL' => 1);
	$arSect = array('ID', 'NAME', 'DESCRIPTION');
	$rsSect = CIBlockSection::GetList(array('SORT' => 'asc'),$arFilter, false, $arSect);
	while ($arSect = $rsSect->GetNext())
	{
		$arIcons[$arSect['NAME']] = $arSect['~DESCRIPTION'];
	}


	foreach($arResult as &$arItem){
		if($arItem['DEPTH_LEVEL'] == 1){
			if( $arItem['TEXT'] == 'НОВИНКИ'){
				$arItem['ICON'] = '<svg class="icon ic-new" width="19" height="20"><use xlink:href="/bitrix/templates/feron/assets/sprites/sprite.svg#ic-new"></use></svg>';
			}else{
				$arItem['ICON'] = $arIcons[$arItem['TEXT']];
			}
		}
	}

	////////////////////////////////// element in menu //////////////////////////////////
	if(CModule::IncludeModule('iblock') && IntVal($arParams['IBLOCK_ID'])>0 && $arParams['RSGOPRO_PROPCODE_ELEMENT_IN_MENU']!=''){
		foreach($arResult as $key1 => $arItem1){
			if($arItem1['DEPTH_LEVEL']==1 && $arItem1['LINK']!=''){	
				$arResult[$key1]['PARAMS']['ELEMENT'] = 'N';
				$arOrder = array('SORT'=>'ASC','ID'=>'ASC');
				$arFilter = array(
					'IBLOCK_ID'=>IntVal($arParams['IBLOCK_ID'][0]),
					'ACTIVE' => 'Y', 
					'INCLUDE_SUBSECTIONS' => 'Y',
					'PROPERTY_'.$arParams['RSGOPRO_PROPCODE_ELEMENT_IN_MENU'] => $arItem1['LINK'],
				);
				$arNavStartParams = array('nTopCount'=>'1');
				$arSelect = array('ID','IBLOCK_ID','ACTIVE','SECTION_ID','PROPERTY_'.$arParams['RSGOPRO_PROPCODE_ELEMENT_IN_MENU']);
				$res = CIBlockElement::GetList($arOrder, $arFilter, false, $arNavStartParams, $arSelect);
				if($arObj = $res->GetNextElement()){
					$arFields = $arObj->GetFields();
					$arResult[$key1]['PARAMS']['ELEMENT'] = 'Y';
					$arResult[$key1]['PARAMS']['ELEMENT_ID'] = $arFields['ID'];
				}
			}
		}
	}
}