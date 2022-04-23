<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");
CModule::IncludeModule("iblock");
CModule::IncludeModule("file");

$ID = 5;//id инфоблока

$arFilter = Array("IBLOCK_ID"=>$ID);
$rsEl = CIBlockElement::GetList(Array(), $arFilter);
while($arEl = $rsEl->GetNext()){ 
   $el = new CIBlockElement;
        $arFields = Array();
   if($arEl["DETAIL_PICTURE"]){
      $arFields['PREVIEW_PICTURE'] = CFile::MakeFileArray($_SERVER["DOCUMENT_ROOT"] . CFile::GetFileArray($arEl["DETAIL_PICTURE"])["SRC"]);
      $arFields['PREVIEW_PICTURE']["del"] = "Y";
         $el->Update($arEl["ID"], $arFields);
   }
}