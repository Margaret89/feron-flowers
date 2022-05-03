<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<div class="subscribe" id="footersubscribe">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-4">
				<div class="subscribe__label"><?=GetMessage('subscr_title')?></div>
			</div>

			<div class="col-md-8">
				<?$frame = $this->createFrame('footersubscribe', false)->begin();?>
					<form action="<?=$arResult['FORM_ACTION']?>" class="subscribe-form">
						<?foreach($arResult['RUBRICS'] as $itemID => $itemValue){?>
							<input class="noned" type="checkbox" name="sf_RUB_ID[]" value="<?=$itemValue["ID"]?>"<?if($itemValue["CHECKED"]) { echo ' checked'; }?> title="<?=$itemValue['NAME']?>" />
						<?}?>
						
						<div class="subscribe-form__field">
							<input type="text" name="sf_EMAIL" size="20" value="<?=$arResult['EMAIL']?>" title="<?=GetMessage('subscr_form_email_title')?>" placeholder="<?=GetMessage('subscr_form_email_title')?>" />
						</div>

						<div class="subscribe-form__btn">
							<input class="nonep" type="submit" name="OK" value="<?=GetMessage('subscr_form_button')?>" />
							<a class="btn btn_white submit" href="#"><?=GetMessage('subscr_form_button')?></a>
						</div>
					</form>
				<?$frame->beginStub();?>

				<form action="<?=$arResult['FORM_ACTION']?>" class="subscribe-form">
					<?foreach($arResult['RUBRICS'] as $itemID => $itemValue){?>
						<input class="noned" type="checkbox" name="sf_RUB_ID[]" value="<?=$itemValue["ID"]?>"<?if($itemValue['CHECKED']) { echo ' checked'; }?> title="<?=$itemValue['NAME']?>" />
					<?}?>
					
					<div class="subscribe-form__field">
						<input type="text" name="sf_EMAIL" size="20" value="" title="<?=GetMessage('subscr_form_email_title')?>" placeholder="<?=GetMessage('subscr_form_email_title')?>" />
					</div>

					<div class="subscribe-form__btn">
						<input class="nonep" type="submit" name="OK" value="<?=GetMessage('subscr_form_button')?>" />
						<a class="btn btn_white submit" href="#"><?=GetMessage('subscr_form_button')?></a>
					</div>
				</form>
				
				<?$frame->end();?>
			</div>
		</div>
	</div>
</div>