<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

/**
 * @var CBitrixComponentTemplate $this
 * @var CatalogElementComponent $component
 */

	  
$component = $this->getComponent();
$arParams = $component->applyTemplateModifications();

// Получаем количество отзывов к товару
$arResult['COUNT_REVIEW'] = 0;
$arResult['NUM_RATING'] = 0;

$arSelect = Array("ID", "NAME", "DATE_ACTIVE_FROM", "PROPERTY_CODE_PRODUCT", "PROPERTY_RATING");
$arFilter = Array("IBLOCK_ID"=>37, "ACTIVE"=>"Y", "PROPERTY_CODE_PRODUCT"=>$arResult['CODE']);
$res = CIBlockElement::GetList(Array(), $arFilter, false, Array("nPageSize"=>500), $arSelect);
while($ob = $res->GetNextElement())
{
	$arFields = $ob->GetFields();
	
	$arResult['COUNT_REVIEW']++;
	$arResult['NUM_RATING'] = $arResult['NUM_RATING'] + $arFields['PROPERTY_RATING_VALUE'];
}

$arResult['NUM_RATING'] = round($arResult['NUM_RATING']/$arResult['COUNT_REVIEW'], 1);
$arResult['NUM_RATING'] = round($arResult['NUM_RATING'] * 100 / 5, 1);