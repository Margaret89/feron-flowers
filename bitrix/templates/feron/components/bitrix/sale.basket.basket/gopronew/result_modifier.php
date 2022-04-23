<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

/**
 * @var CBitrixComponentTemplate $this
 * @var CatalogElementComponent $component
 */
global $_SESSION;

if   (!empty($_SESSION["SOTBIT_REGIONS"]["STORE"])&& is_array ($_SESSION["SOTBIT_REGIONS"]["STORE"])&& CModule::IncludeModule('catalog')) {
     

  $amount = 0;

  if (count($arResult['OFFERS']) > 0) {

    foreach ($arResult['OFFERS'] as $key => $offer) {

      $amount = 0;

      $rsStore = CCatalogStoreProduct::GetList(
        array(),
        array(
          'PRODUCT_ID' => $offer["ID"],
          'STORE_ID' => $_SESSION["SOTBIT_REGIONS"]["STORE"]
        ),
        false,
        false,
        array('AMOUNT')
      );
      while ($arStore = $rsStore->GetNext()){
        $amount = $amount + $arStore['AMOUNT'];
      }

      $arResult['OFFERS'][$key]['QUANTITY'] = $amount;
      $arResult['OFFERS'][$key]['PRODUCT']['QUANTITY'] = $amount;
    }

  } else {
    $rsStore = CCatalogStoreProduct::GetList(
      array(),
      array(
        'PRODUCT_ID' => $arResult["ID"],
        'STORE_ID' => $_SESSION["SOTBIT_REGIONS"]["STORE"]
      ),
      false,
      false,
      array('AMOUNT')
    );
    while ($arStore = $rsStore->GetNext()){
      $amount = $amount + $arStore['AMOUNT'];
    }

    $arResult['QUANTITY'] = $amount;
    $arResult['PRODUCT']['QUANTITY'] = $amount;
  }
}
