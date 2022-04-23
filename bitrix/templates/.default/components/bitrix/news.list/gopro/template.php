<?if(!defined(«B_PROLOG_INCLUDED») || B_PROLOG_INCLUDED!==true)die();?>
<div class=»news-list»>
<?if($arParams[«DISPLAY_TOP_PAGER»]):?>
<?=$arResult[«NAV_STRING»]?><br />
<?endif;?>
<?foreach($arResult[«ITEMS»] as $arItem):?>
<p class=»news-item»>
<?if($arParams[«DISPLAY_PICTURE»]!=»N» && is_array($arItem[«PREVIEW_PICTURE»])):?>
<?if(!$arParams[«HIDE_LINK_WHEN_NO_DETAIL»] || ($arItem[«DETAIL_TEXT»] && $arResult[«USER_HAVE_ACCESS»])):?>
<a href=»<?=$arItem[«DETAIL_PAGE_URL»]?>»><img class=»preview_picture» border=»0″ src=»<?=$arItem[«PREVIEW_PICTURE»][«SRC»]?>» width=»<?=$arItem[«PREVIEW_PICTURE»][«WIDTH»]?>» height=»<?=$arItem[«PREVIEW_PICTURE»][«HEIGHT»]?>» alt=»<?=$arItem[«PREVIEW_PICTURE»][«ALT»]?>» title=»<?=$arItem[«NAME»]?>» style=»float:left» /></a>
<?else:?>
<img class=»preview_picture» border=»0″ src=»<?=$arItem[«PREVIEW_PICTURE»][«SRC»]?>» width=»<?=$arItem[«PREVIEW_PICTURE»][«WIDTH»]?>» height=»<?=$arItem[«PREVIEW_PICTURE»][«HEIGHT»]?>» alt=»<?=$arItem[«PREVIEW_PICTURE»][«ALT»]?>» title=»<?=$arItem[«NAME»]?>» style=»float:left» />
<?endif;?>
<?endif?>
<?if($arParams[«DISPLAY_DATE»]!=»N» && $arItem[«DISPLAY_ACTIVE_FROM»]):?>
<span class=»news-date-time»><?echo $arItem[«DISPLAY_ACTIVE_FROM»]?></span>
<?endif?>
<?if($arParams[«DISPLAY_NAME»]!=»N» && $arItem[«NAME»]):?>
<?if(!$arParams[«HIDE_LINK_WHEN_NO_DETAIL»] || ($arItem[«DETAIL_TEXT»] && $arResult[«USER_HAVE_ACCESS»])):?>
<b><?echo $arItem[«NAME»]?></b>&nbsp;
<?else:?>
<b><?echo $arItem[«NAME»]?></b>&nbsp;
<?endif;?>
<?endif;?>
<?if($arParams[«DISPLAY_PREVIEW_TEXT»]!=»N» && $arItem[«PREVIEW_TEXT»]):?>
<br><?echo $arItem[«PREVIEW_TEXT»];?>&nbsp;
<?endif;?>
<?/*if($arParams[«DISPLAY_PICTURE»]!=»N» && is_array($arItem[«PREVIEW_PICTURE»])):?>
<div style=»clear:both»></div>
<?endif?>
<?foreach($arItem[«FIELDS»] as $code=>$value):?>
<small>
<?=GetMessage(«IBLOCK_FIELD_».$code)?>:&nbsp;<?=$value;?>
</small><br />
<?endforeach;*/?>
<?foreach($arItem[«DISPLAY_PROPERTIES»] as $pid=>$arProperty):?>
<?//=$arProperty[«NAME»]?>
<?//if(is_array($arProperty[«DISPLAY_VALUE»])):?>
<?//=implode(«&nbsp;/&nbsp;», $arProperty[«DISPLAY_VALUE»]);?>
<?//else:?>
<?//=$arProperty[«DISPLAY_VALUE»];?>
<?//endif?>
<a href=»<?=$arProperty[«VALUE»];?>»>Читать далее…</a>
<?endforeach;?>
</p>
<?endforeach;?>
<?if($arParams[«DISPLAY_BOTTOM_PAGER»]):?>
<br /><?=$arResult[«NAV_STRING»]?>
<?endif;?>
</div>