<?$APPLICATION->IncludeComponent(
	"bitrix:catalog.compare.list", 
	"session", 
	array(
		"IBLOCK_TYPE" => "catalog",
		"IBLOCK_ID" => "5",
		"NAME" => "CATALOG_COMPARE_LIST",
		"COMPONENT_TEMPLATE" => "session",
		"AJAX_MODE" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "Y",
		"AJAX_OPTION_HISTORY" => "N",
		"AJAX_OPTION_ADDITIONAL" => "",
		"DETAIL_URL" => "",
		"COMPARE_URL" => "compare.php",
		"COMPOSITE_FRAME_MODE" => "A",
		"COMPOSITE_FRAME_TYPE" => "AUTO",
		"ACTION_VARIABLE" => "action",
		"PRODUCT_ID_VARIABLE" => "id"
	),
	false
);?>