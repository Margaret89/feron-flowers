<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("title", "Профиль доставки");
$APPLICATION->SetTitle("Профили доставки");?>

<div class="pmenu">
<?$APPLICATION->IncludeComponent("bitrix:menu", "personal", array(
	"ROOT_MENU_TYPE" => "personal",
	"MENU_CACHE_TYPE" => "A",
	"MENU_CACHE_TIME" => "3600",
	"MENU_CACHE_USE_GROUPS" => "Y",
	"MENU_CACHE_GET_VARS" => array(
	),
	"MAX_LEVEL" => "1",
	"CHILD_MENU_TYPE" => "",
	"USE_EXT" => "N",
	"DELAY" => "N",
	"ALLOW_MULTI_SELECT" => "N",
	"SEPARATORS_PLACE" => array(
		0 => "2",
		1 => "5",
		2 => "",
	)
	),
	false
);?>
</div>

<div class="pcontent">
<?$APPLICATION->IncludeComponent(
	"bitrix:sale.personal.profile", 
	"gopro", 
	array(
		"SEF_MODE" => "Y",
		"SEF_FOLDER" => "/personal/delivery/",
		"PER_PAGE" => "20",
		"USE_AJAX_LOCATIONS" => "N",
		"SET_TITLE" => "N",
		"COMPONENT_TEMPLATE" => "gopro",
		"COMPOSITE_FRAME_MODE" => "A",
		"COMPOSITE_FRAME_TYPE" => "AUTO",
		"SEF_URL_TEMPLATES" => array(
			"list" => "",
			"detail" => "profil#ID#/",
		)
	),
	false
);?>
</div>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>