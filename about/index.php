<?require($_SERVER['DOCUMENT_ROOT'].'/bitrix/header.php');
$APPLICATION->SetTitle("О компании");
?><h2 style="text-align: center;" align="center">
Мы рады приветствовать вас на нашем сайте. </h2>
 <br>
<div>
	 &nbsp; &nbsp; &nbsp; &nbsp; Наша фирма вот уже много лет специализируется на оптово-розничной &nbsp;продаже искусственных цветов и товаров для флористики. У нас вы найдете лучший в Санкт-Петербурге ассортимент искусственных цветов из высококачественных материалов. Так же вы сможете увидеть разнообразный ассортимент товаров для флористики, плетеных корзин, кашпо, лент, сеток и многое другое. Вы будете приятно удивлены нашим широким ассортиментом.<br>
</div>
<p>
	 &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
</p>
 <b><i>&nbsp; Магазин</i></b><i><b>&nbsp;«ФЕРОН-Ф» <br>
 </b></i><br>
 <b>
<h2>Санкт-Петербург</h2>
<br>
 <img width="990" alt="IMG_2620.jpg" src="/upload/medialibrary/fad/6j9f24fjk5h65vp4rjfd6711qeiors0k.jpg" height="406"><br>
 </b><b>
<h2><?$APPLICATION->IncludeComponent(
	"innova:slider",
	"",
	Array(
		"AUTOPLAY" => "true",
		"AUTOPLAY_SPEED" => "3000",
		"BTN_COLOR" => "#FFFFFF",
		"CACHE_TYPE" => "N",
		"COMPOSITE_FRAME_MODE" => "A",
		"COMPOSITE_FRAME_TYPE" => "AUTO",
		"HEIGHT" => "900",
		"HEIGHT_MOBILE" => "300",
		"HIDE_TEXT" => "Y",
		"IBLOCK_ID" => "29",
		"SLIDER_COLOR" => "#FFFFFF",
		"SPEED" => "500",
		"STRETCH_TYPE" => "1",
		"TEXT_ALIGN" => "flex-start"
	),
false,
Array(
	'ACTIVE_COMPONENT' => 'N'
)
);?></h2>
 </b><span><?$APPLICATION->IncludeComponent(
	"bitrix:photogallery.upload",
	".default",
	Array(
		"ALBUM_PHOTO_THUMBS_WIDTH" => "1280",
		"COMPONENT_TEMPLATE" => ".default",
		"COMPOSITE_FRAME_MODE" => "A",
		"COMPOSITE_FRAME_TYPE" => "AUTO",
		"IBLOCK_ID" => "29",
		"IBLOCK_TYPE" => "presscenter",
		"INDEX_URL" => "index.php",
		"JPEG_QUALITY" => "85",
		"JPEG_QUALITY1" => "85",
		"MODERATION" => "N",
		"ORIGINAL_SIZE" => "1280",
		"PATH_TO_FONT" => "default.ttf",
		"SECTION_ID" => $_REQUEST["SECTION_ID"],
		"SECTION_URL" => "section.php?SECTION_ID=#SECTION_ID#",
		"SET_TITLE" => "N",
		"THUMBNAIL_SIZE" => "1280",
		"UPLOAD_MAX_FILE_SIZE" => "7",
		"USE_WATERMARK" => "N",
		"WATERMARK_MIN_PICTURE_SIZE" => "800",
		"WATERMARK_RULES" => "USER",
		"WATERMARK_TYPE" => "BOTH"
	),
false,
Array(
	'ACTIVE_COMPONENT' => 'N'
)
);?><br>
 </span><span><br>
 Наши реквизиты:<br>
 ООО "Ферон-Ф"&nbsp;<br>
 ИНН: 7810033720<br>
 КПП: 781001001<br>
 ОГРН: 1057811776846<br>
 </span>Расчетный счет: 40702810701590003361<br>
 Банк: Ф-Л СЕВЕРО-ЗАПАДНЫЙ ПАО БАНК "ФК ОТКРЫТИЕ"<br>
 БИК: 044030795<br>
 Корр. счет: 30101810540300000795 <br>
 Юридический адрес: 196210, Санкт-Петербург г, Пилотов ул, дом № 34, корпус 2<br><?require($_SERVER['DOCUMENT_ROOT'].'/bitrix/footer.php');?>