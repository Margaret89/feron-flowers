<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$this->setFrameMode(true);

$INPUT_ID = trim($arParams["~INPUT_ID"]);
if(strlen($INPUT_ID) <= 0)
	$INPUT_ID = "title-search-input";
$INPUT_ID = CUtil::JSEscape($INPUT_ID);

$CONTAINER_ID = trim($arParams["~CONTAINER_ID"]);
if(strlen($CONTAINER_ID) <= 0)
	$CONTAINER_ID = "title-search";
$CONTAINER_ID = CUtil::JSEscape($CONTAINER_ID);

if($arParams["SHOW_INPUT"]!=="N"){?>
	<div id="<?=$CONTAINER_ID?>" class="form-search-wrap">
		<form class="form-search">
			<input class="text" id="<?=$INPUT_ID?>" type="text" name="q" value="" autocomplete="off" placeholder="<?=GetMessage("RSGOPRO_PLACEHOLDER")?>" title="<?=GetMessage("RSGOPRO_PLACEHOLDER")?>"/>
			
			<button type="submit" name="s">
				<svg class="icon ic-search" width="16" height="16">
					<use xlink:href="<?=SITE_TEMPLATE_PATH?>/assets/sprites/sprite.svg#ic-search"></use>
				</svg>
			</button>
		</form>
	</div>
<?}?>

<script type="text/javascript">
	var jsControl_<?=md5($CONTAINER_ID)?> = new JCTitleSearch({
		'AJAX_PAGE' : '<?=CUtil::JSEscape(POST_FORM_ACTION_URI)?>',
		'CONTAINER_ID': '<?=$CONTAINER_ID?>',
		'INPUT_ID': '<?=$INPUT_ID?>',
		'MIN_QUERY_LEN': 3
	});
</script>
