<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

// Получаем ответы на отзывы и добавляем в $arResult
// $arrAnswer = array();

// foreach ($arResult['ITEMS'] as $key => $items) {
// 	$arrAnswer[$items['ID']] = $key;
// }

// $arSelect = Array("ID", "IBLOCK_ID", "NAME", "DATE_ACTIVE_FROM", "PREVIEW_TEXT", "PROPERTY_ID_REVIEW", "PROPERTY_CODE_PRODUCT", "PROPERTY_LIKE", "PROPERTY_DISLIKE");
// $arFilter = Array("IBLOCK_ID"=>$arParams['IBLOCK_ID_ANSWER'], "ACTIVE"=>"Y", "PROPERTY_CODE_PRODUCT"=>$arParams['PRODUCT_CODE']);
// $res = CIBlockElement::GetList(Array(), $arFilter, false, Array("nPageSize"=>50), $arSelect);
// while($ob = $res->GetNextElement())
// {
// 	$arFields = $ob->GetFields();
// 	$idItem = $arrAnswer[$arFields['PROPERTY_ID_REVIEW_VALUE']];
// 	$arResult['ITEMS'][$idItem]['ANSWERS'][] = $arFields;
// }
?>

