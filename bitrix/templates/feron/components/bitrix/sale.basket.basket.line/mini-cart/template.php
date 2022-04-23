<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

?>

<div class="mini-cart">
	<div class="mini-cart__icon">
		<svg class="icon ic-call" width="20" height="20">
			<use xlink:href="<?=SITE_TEMPLATE_PATH?>/assets/sprites/sprite.svg#ic-cart"></use>
		</svg>
	</div>

	<div class="mini-cart__content">
		<a href="<?=$arParams['PATH_TO_BASKET']?>" class="mini-cart__title"><?=GetMessage('RSGOPRO.SMALLBASKET_TITLE')?></a>
		
		<div id="basketinfo" class="mini-cart__val">
			<?$frame = $this->createFrame('basketinfo',false)->begin();
				if($arResult['NUM_PRODUCTS']>0)
				{
					?><?=$arResult["NUM_PRODUCTS"]?> <?=$arResult['PRODUCT(S)']?> <?=GetMessage('RSGOPRO.SMALLBASKET_NA')?> <?=$arResult['TOTAL_PRICE']?><?
				} else {
					echo GetMessage('RSGOPRO.SMALLBASKET_PUSTO');
				}
			$frame->beginStub();
				echo GetMessage('RSGOPRO.SMALLBASKET_PUSTO');
			$frame->end();?>
		</div>
	</div>
</div>

