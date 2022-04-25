<?if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED!==true)die();
$this->setFrameMode(true);

if(!empty($arResult)){?>
	<div class="footer-menu">
		<div class="footer-menu__title"><?=$arParams['BLOCK_TITLE']?></div>

		<?foreach($arResult as $arMenu){?>
			<div class="footer-menu__item">
				<a href="<?=$arMenu['LINK']?>"><?=$arMenu['TEXT']?></a>
			</div>
		<?}?>
	</div>
<?}?>