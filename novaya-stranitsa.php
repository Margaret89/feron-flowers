<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Новая страница");
?><?$APPLICATION->IncludeComponent(
	"bitrix:advertising.banner",
	"nivo",
	Array(
		"ANIMATION_DURATION" => "500",
		"ARROW_NAV" => "1",
		"BULLET_NAV" => "2",
		"CACHE_TIME" => "0",
		"CACHE_TYPE" => "A",
		"COMPOSITE_FRAME_MODE" => "A",
		"COMPOSITE_FRAME_TYPE" => "AUTO",
		"CONTROL_NAV" => "Y",
		"CYCLING" => "Y",
		"DEFAULT_TEMPLATE" => "nivo",
		"DIRECTION_NAV" => "Y",
		"EFFECT" => "random",
		"EFFECTS" => array(),
		"HEIGHT" => "300",
		"INTERVAL" => "5000",
		"JQUERY" => "Y",
		"KEYBOARD" => "N",
		"NOINDEX" => "N",
		"PAUSE" => "N",
		"QUANTITY" => "2",
		"SCALE" => "N",
		"SPEED" => "500",
		"TYPE" => "banners",
		"WRAP" => "1"
	)
);?><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>