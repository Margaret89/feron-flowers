<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?if (!empty($arResult)):?>
	<ul class="top-menu">
		<?foreach($arResult as $arItem):
			if($arParams["MAX_LEVEL"] == 1 && $arItem["DEPTH_LEVEL"] > 1) 
				continue;?>
				
					<li class="top-menu__item"><a href="<?=$arItem["LINK"]?>" <?if($arItem["SELECTED"]){?>class="selected"<?}?>><?=$arItem["TEXT"]?></a></li>
		<?endforeach?> 
	</ul>
<?endif?>