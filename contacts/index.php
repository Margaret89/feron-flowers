<?require($_SERVER['DOCUMENT_ROOT'].'/bitrix/header.php');
$APPLICATION->SetTitle("Контакты");

?><div style="line-height:18px;">
	<div>
 <b>Санкт-Петербург<br>
 </b><br>
		 Адрес: Россия, Санкт-Петербург, Пилотов 34 корп.2<br>
		 Телефон:&nbsp; <a href="tel:88126041953">8(921)955-23-22</a>&nbsp;&nbsp;Интернет-магазин<br>
		 Телефон:&nbsp;8 (812) 955-23-22 Розничный магазин
	</div>
	 E-mail: <a href="mailto:admin@feron-flowers.ru">admin@feron-flowers.ru</a><br>
	 E-mail: <a href="feronflowers@gmail.com">feronflowers@gmail.com</a><br>
	 График работы интернет-магазина: заказы принимаются 24/7<br>
	 График работы розничного магазина: Пн-Пт 9-18, Сб-Вс 10-18<br>
 <br>
 <br>
	<p>
 <b>Схема проезда:</b>
	</p>
	 <?$APPLICATION->IncludeComponent(
	"bitrix:map.yandex.view",
	"",
	Array(
		"API_KEY" => "",
		"COMPOSITE_FRAME_MODE" => "A",
		"COMPOSITE_FRAME_TYPE" => "AUTO",
		"CONTROLS" => array("ZOOM","SMALLZOOM","MINIMAP","TYPECONTROL","SCALELINE"),
		"INIT_MAP_TYPE" => "MAP",
		"MAP_DATA" => "a:4:{s:10:\"yandex_lat\";d:59.81657814348205;s:10:\"yandex_lon\";d:30.292006783399973;s:12:\"yandex_scale\";i:10;s:10:\"PLACEMARKS\";a:1:{i:0;a:3:{s:3:\"LON\";d:30.2920067834;s:3:\"LAT\";d:59.8165781435;s:4:\"TEXT\";s:25:\"Ферон-Фловерс\";}}}",
		"MAP_HEIGHT" => "800",
		"MAP_ID" => "contacts",
		"MAP_WIDTH" => "1001",
		"OPTIONS" => array("ENABLE_DBLCLICK_ZOOM","ENABLE_DRAGGING")
	)
);?> <br>
</div>
 <span><br>
 </span><br>
 Наши реквизиты:<br>
 ООО "Ферон-Ф" <br>
 ИНН: 7810033720<br>
 КПП: 781001001<br>
 ОГРН: 1057811776846<br>
 <br>
 Расчетный счет: 40702810701590003361<br>
 Банк: Ф-Л СЕВЕРО-ЗАПАДНЫЙ ПАО БАНК "ФК ОТКРЫТИЕ"<br>
 БИК: 044030795<br>
 Корр. счет: 30101810540300000795<br>
 <br>
 Юридический адрес: 196210, Санкт-Петербург г, Пилотов ул, дом № 34, корпус 2<br>
 <br><?
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/footer.php');?>