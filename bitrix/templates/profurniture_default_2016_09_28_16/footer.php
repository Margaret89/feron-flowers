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
		</div><!-- /content -->
	</div><!-- /body -->
	<script type="text/javascript">!function(){var t=document.createElement("script");t.type="text/javascript",t.async=!0,t.src="https://vk.com/js/api/openapi.js?166",t.onload=function(){VK.Retargeting.Init("VK-RTRG-451465-2kMxm"),VK.Retargeting.Hit()},document.head.appendChild(t)}();</script><noscript><img src="https://vk.com/rtrg?p=VK-RTRG-451465-2kMxm" style="position:fixed; left:-999px;" alt=""/></noscript>
	<script type="text/javascript">RSGoPro_SetSet();</script>
	<div id="footer" class="footer"><!-- footer -->
		<div class="centering">
			<div class="centeringin line1 clearfix">
				<div class="block one">
					<div class="logo">
						<a href="<?=SITE_DIR?>">
							<?$APPLICATION->IncludeFile(
								SITE_DIR."include/company_footer.php",
								Array(),
								Array("MODE"=>"html")
							);?>
						</a>
					</div>
					<div class="contacts clearfix">
						<div class="phone1">
							<a class="fancyajax fancybox.ajax recall" href="<?=SITE_DIR?>include/popup/recall/" title="<?=Loc::getMessage('RSGOPRO.RECALL')?>"><i class="icon pngicons"></i><?=Loc::getMessage('RSGOPRO.RECALL')?></a>
							<div class="phone">
								<?$APPLICATION->IncludeFile(
									SITE_DIR."include/footer/phone1.php",
									Array(),
									Array("MODE"=>"html")
								);?>
							</div>
						</div>
						<div class="phone2">
							<a class="fancyajax fancybox.ajax feedback" href="<?=SITE_DIR?>include/popup/feedback/" title="<?=Loc::getMessage('RSGOPRO.FEEDBACK')?>"><i class="icon pngicons"></i><?=Loc::getMessage('RSGOPRO.FEEDBACK')?></a>
							<div class="phone">
								<?$APPLICATION->IncludeFile(
									SITE_DIR."include/footer/phone2.php",
									Array(),
									Array("MODE"=>"html")
								);?>
							</div>
						</div>
					</div>
				</div>
				<div class="block two">
					<?$APPLICATION->IncludeFile(
						SITE_DIR."include/footer/catalog_menu.php",
						Array(),
						Array("MODE"=>"html")
					);?>
				</div>
				<div class="block three">
					<?$APPLICATION->IncludeFile(
						SITE_DIR."include/footer/menu.php",
						Array(),
						Array("MODE"=>"html")
					);?>
				</div>
				<div class="block four">
					<div class="sovservice">
						<?$APPLICATION->IncludeFile(
							SITE_DIR."include/footer/socservice.php",
							Array(),
							Array("MODE"=>"html")
						);?>
					</div>
					<div class="subscribe">
						<?$APPLICATION->IncludeFile(
							SITE_DIR."include/footer/subscribe.php",
							Array(),
							Array("MODE"=>"html")
						);?>
					</div>
				</div>
			</div>
		</div>

		<div class="line2">
			<div class="centering">
				<div class="centeringin clearfix">
					<div class="sitecopy">
						<?$APPLICATION->IncludeFile(
							SITE_DIR."include/footer/law.php",
							Array(),
							Array("MODE"=>"html")
						);?>
					</div>
					<div class="developercopy">
						<?php
						/****************************************************************************************/
						/* #REDSIGN_COPYRIGHT# */
						/****************************************************************************************/
						?>
						Powered by <a href="" target="_blank">ALFA Systems</a>
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
