<?require($_SERVER['DOCUMENT_ROOT'].'/bitrix/header.php');
$APPLICATION->SetTitle("Купить в 1 клик");
?> 

<?$APPLICATION->IncludeComponent(
	"redsign:buy1click", 
	"gopro", 
	array(
		"ALFA_EMAIL_TO" => "",
		"SHOW_FIELDS" => array(
			0 => "1",
			1 => "2",
			2 => "3",
			3 => "4",
			4 => "5",
			5 => "7",
		),
		"REQUIRED_FIELDS" => array(
			0 => "1",
			1 => "2",
			2 => "3",
			3 => "4",
			4 => "5",
			5 => "7",
		),
		"ALFA_USE_CAPTCHA" => "Y",
		"ALFA_MESSAGE_AGREE" => "Ваша заявка принята! В ближайшее время с вами свяжется наш консультант.",
		"DATA" => "",
		"AJAX_MODE" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "Y",
		"AJAX_OPTION_HISTORY" => "N",
		"CACHE_TYPE" => "A",
		"CACHE_TIME" => "3600",
		"AJAX_OPTION_ADDITIONAL" => "",
		"COMPONENT_TEMPLATE" => "gopro",
		"COMPOSITE_FRAME_MODE" => "A",
		"COMPOSITE_FRAME_TYPE" => "AUTO",
		"ALFA_SALE_PERSON" => "1",
		"ALFA_SITE_ID" => "s1"
	),
	false,
	array(
		"ACTIVE_COMPONENT" => "Y"
	)
);?>

<?require($_SERVER['DOCUMENT_ROOT'].'/bitrix/footer.php');?>