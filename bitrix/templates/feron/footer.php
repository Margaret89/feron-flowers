<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true)
	die();

use \Bitrix\Main\Localization\Loc;

Loc::loadMessages(__FILE__);

$isAjax = isset($_SERVER['HTTP_X_REQUESTED_WITH']) && isset($_SERVER['HTTP_X_FANCYBOX']) || isset($_REQUEST['AJAX_CALL']) && 'Y' == $_REQUEST['AJAX_CALL'];

if ($isAjax) {
	die();
}

?>
					</div>
				</div>
			</div>
		</main>
	</div><!-- /body -->


	<script type="text/javascript">!function(){var t=document.createElement("script");t.type="text/javascript",t.async=!0,t.src="https://vk.com/js/api/openapi.js?166",t.onload=function(){VK.Retargeting.Init("VK-RTRG-451465-2kMxm"),VK.Retargeting.Hit()},document.head.appendChild(t)}();</script><noscript><img src="https://vk.com/rtrg?p=VK-RTRG-451465-2kMxm" style="position:fixed; left:-999px;" alt=""/></noscript>
	<script type="text/javascript">RSGoPro_SetSet();</script>

	
	<?$APPLICATION->IncludeComponent("bitrix:subscribe.form", "subscribe", Array(
		"USE_PERSONALIZATION" => "Y",	// Определять подписку текущего пользователя
			"SHOW_HIDDEN" => "N",	// Показать скрытые рубрики подписки
			"PAGE" => "/personal/subscribe/",	// Страница редактирования подписки (доступен макрос #SITE_DIR#)
			"CACHE_TYPE" => "A",	// Тип кеширования
			"CACHE_TIME" => "36000000",	// Время кеширования (сек.)
		),
		false
	);?>
	
	<div id="footer" class="footer">
		<div class="container-fluid">
			<div class="row">
				<div class="col-3">
					<?if(!CSite::InDir('/index.php')){?><a href="/"><?}?>
						<div class="footer__logo">
							<?$APPLICATION->IncludeFile(
								SITE_DIR."include/footer/logo.php",
								Array(),
								Array("MODE"=>"html")
							);?>
						</div>
					<?if(!CSite::InDir('/index.php')){?></a><?}?>

					<div class="footer__contacts">
						<div class="footer__phone">
							<?$APPLICATION->IncludeFile(
								SITE_DIR."include/footer/phone.php",
								Array(),
								Array("MODE"=>"html")
							);?>
						</div>
						
						<a class="fancyajax fancybox.ajax feedback btn btn_border" href="<?=SITE_DIR?>include/popup/feedback/" title="<?=Loc::getMessage('RSGOPRO.FEEDBACK')?>"><?=Loc::getMessage('RSGOPRO.FEEDBACK')?></a>
					</div>

					<div class="social">
						<a href="https://www.facebook.com/FeronFlowers-1159113337515419/" class="social__item social__item_fb">
							<svg class="icon ic-fb" width="10" height="20">
								<use xlink:href="<?=SITE_TEMPLATE_PATH?>/assets/sprites/sprite.svg#ic-fb"></use>
							</svg>
						</a>

						<a href="https://vk.com/feronflowers" class="social__item social__item_vk">
							<svg class="icon ic-vk" width="22" height="14">
								<use xlink:href="<?=SITE_TEMPLATE_PATH?>/assets/sprites/sprite.svg#ic-vk"></use>
							</svg>
						</a>

						<a href="https://www.instagram.com/feronflowers/" class="social__item social__item_in">
							<svg class="icon ic-instagram" width="22" height="22">
								<use xlink:href="<?=SITE_TEMPLATE_PATH?>/assets/sprites/sprite.svg#ic-instagram"></use>
							</svg>
						</a>
					</div>
				</div>

				<div class="col-6">
					<?$APPLICATION->IncludeComponent("bitrix:menu", "footer-cat-menu", Array(
	"ROOT_MENU_TYPE" => "footercatalog",	// Тип меню для первого уровня
		"MENU_CACHE_TYPE" => "A",	// Тип кеширования
		"MENU_CACHE_TIME" => "3600",	// Время кеширования (сек.)
		"MENU_CACHE_USE_GROUPS" => "Y",	// Учитывать права доступа
		"MENU_CACHE_GET_VARS" => "",	// Значимые переменные запроса
		"MAX_LEVEL" => "1",	// Уровень вложенности меню
		"CHILD_MENU_TYPE" => "",	// Тип меню для остальных уровней
		"USE_EXT" => "Y",	// Подключать файлы с именами вида .тип_меню.menu_ext.php
		"DELAY" => "N",	// Откладывать выполнение шаблона меню
		"ALLOW_MULTI_SELECT" => "N",	// Разрешить несколько активных пунктов одновременно
		"BLOCK_TITLE" => "Каталог товаров",	// Заголовок блока
		"LVL1_COUNT" => "6",	// Сколько отображать разделов 1-го уровня
		"LVL2_COUNT" => "4",	// Сколько отображать подразделов 2-го уровня
		"ELLIPSIS_NAMES" => "Y",	// Обрезать наименования разделов
	),
	false
);?>
				</div>

				<div class="col-3">
					<?$APPLICATION->IncludeComponent(
						"bitrix:menu", 
						"footer-menu", 
						array(
							"ROOT_MENU_TYPE" => "tpanel",
							"MAX_LEVEL" => "1",
							"CHILD_MENU_TYPE" => "",
							"USE_EXT" => "N",
							"MENU_CACHE_TYPE" => "A",
							"MENU_CACHE_TIME" => "3600",
							"MENU_CACHE_USE_GROUPS" => "Y",
							"MENU_CACHE_GET_VARS" => array(
							),
							"BLOCK_TITLE" => "Feron-Flowers",
							"COMPONENT_TEMPLATE" => "footer-menu",
							"DELAY" => "N",
							"ALLOW_MULTI_SELECT" => "N",
							"COMPOSITE_FRAME_MODE" => "A",
							"COMPOSITE_FRAME_TYPE" => "AUTO"
						),
						false
					);?>
				</div>
			</div>
		</div>

		<div class="container-fluid">
			<div class="row">
				<div class="col-6">
					<div class="footer__law">
						<?$APPLICATION->IncludeFile(
							SITE_DIR."include/footer/law.php",
							Array(),
							Array("MODE"=>"html")
						);?>
					</div>
				</div>
			</div>
		</div>
	</div><!-- /footer -->

	<div id="fixedcomparelist">
		<?$APPLICATION->IncludeFile(
			SITE_DIR."include/footer/compare.php",
			Array(),
			Array("MODE"=>"html")
		);?>
	</div>

	<?$APPLICATION->IncludeFile(
		SITE_DIR."include/footer/easycart.php",
		Array(),
		Array("MODE"=>"html")
	);?>

	<div style="display:none;">AlfaSystems GoPro GP261D21</div>
<!-- Yandex.Metrika counter -->
<script type="text/javascript" >
   (function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)};
   m[i].l=1*new Date();k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)})
   (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");

   ym(42390894, "init", {
        clickmap:true,
        trackLinks:true,
        accurateTrackBounce:true,
        webvisor:true
   });
</script>
<noscript><div><img src="https://mc.yandex.ru/watch/42390894" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
<!-- /Yandex.Metrika counter -->
</body>
</html>
