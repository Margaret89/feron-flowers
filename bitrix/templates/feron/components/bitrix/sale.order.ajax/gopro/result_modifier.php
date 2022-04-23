<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
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

      $arResult['OFFERS'][$key]['CATALOG_QUANTITY'] = $amount;
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

    $arResult['CATALOG_QUANTITY'] = $amount;
    $arResult['PRODUCT']['QUANTITY'] = $amount;
  }
}

if(!CModule::IncludeModule('redsign.devfunc'))
	return;

// get no photo
$arResult['NO_PHOTO'] = RSDevFunc::GetNoPhoto(array('MAX_WIDTH'=>95,'MAX_HEIGHT'=>55));
// /get no photo

if(!CModule::IncludeModule('redsign.location'))
	return;
if(!CModule::IncludeModule('sale'))
	return;

$COM_SESS_PREFIX = "RSLOCATION";
$detectedLocID = 0;
$detectedLocID = IntVal($_SESSION[$COM_SESS_PREFIX]['LOCATION']['ID']);
$arResult['RSDETECTED_LOCATION_VALUE'] = '-';
if( $detectedLocID>0 )
{
	$arResult['RSDETECTED_LOCATION_VALUE'] = $detectedLocID;
} else {
	$detected = array();
	$detected = CRS_Location::GetCityName();
	
	if( isset($detected['CITY_NAME']) )
	{
		$dbRes = CSaleLocation::GetList(
			array('SORT'=>'ASC','CITY_NAME_LANG'=>'ASC'),
			array('LID'=>LANGUAGE_ID,'CITY_NAME'=>$detected['CITY_NAME'])
		);
		if($arFields = $dbRes->Fetch())
		{
			$arResult['RSDETECTED_LOCATION_VALUE'] = $arFields['ID'];
		}
	}
}