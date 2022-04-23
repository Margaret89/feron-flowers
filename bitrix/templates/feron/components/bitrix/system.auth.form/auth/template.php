<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();?>

<div class="auth" id="inheadauthform">
	<?$frame = $this->createFrame('inheadauthform',false)->begin();
	$frame->setBrowserStorage(true);
	if($arResult["FORM_TYPE"]=="login"){?>
		<div class="auth__item">
			<svg class="icon ic-call" width="12" height="15">
				<use xlink:href="<?=SITE_TEMPLATE_PATH?>/assets/sprites/sprite.svg#ic-lock"></use>
			</svg>
			<a href="<?=SITE_DIR?>auth/"><?=GetMessage('RSGOPRO_AUTH')?></a>
		</div>

		<div class="auth__item">
			<a href="<?=SITE_DIR?>auth/?register=yes"><?=GetMessage('RSGOPRO_REGISTRATION')?></a>
		</div>
	<?} else {?>
		<div class="auth__item">
			<a class="auth_top_panel-item" href="<?=SITE_DIR?>personal/"><?=GetMessage('RSGOPRO_PERSONAL_PAGE')?></a>
		</div>

		<div class="auth__item">
			<a class="auth_top_panel-item" href="?logout=yes"><?=GetMessage('RSGOPRO_EXIT')?></a>
		</div>
	<?}
	$frame->beginStub();?>
	<div class="auth__item">
		<svg class="icon ic-call" width="12" height="15">
			<use xlink:href="<?=SITE_TEMPLATE_PATH?>/assets/sprites/sprite.svg#ic-lock"></use>
		</svg>
		<a href="<?=SITE_DIR?>auth/"><?=GetMessage('RSGOPRO_AUTH')?></a>
	</div>

	<div class="auth__item">
		<a href="<?=SITE_DIR?>auth/?register=yes"><?=GetMessage('RSGOPRO_REGISTRATION')?></a>
	</div>
	<?$frame->end();?>
</div>