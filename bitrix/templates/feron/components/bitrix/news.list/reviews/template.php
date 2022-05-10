<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$this->setFrameMode(true);
?>



<div class="review">
	<?if($arResult["ITEMS"]){?>
		<div class="review__top">
			<div class="review__title"><?=GetMessage('T_TITLE')?> (<span class="js-review-count"><?=count($arResult['ITEMS'])?></span>)</div>

			<div class="review__action">
				<?
				$sumScore = 0;
				$countScore = 0;
				
				foreach($arResult["ITEMS"] as $arItem){
					if($arItem['PROPERTIES']['RATING']['VALUE']){
						$countScore++;
						$sumScore = $sumScore + $arItem['PROPERTIES']['RATING']['VALUE'];
					}
				}

				$ratingResult = round($sumScore/$countScore, 1);
				$ratingResultPr = round($ratingResult * 100/5, 1);
				?>

				<div class="rating-wrap d-none d-md-inline-flex">
					<div class="rating rating_big">
						<div class="rating__content" style="width: <?=$ratingResultPr?>%;"></div>
					</div>
					<div class="rating-wrap__num"><span class="js-rating-num"><?=$ratingResult?></span>/5</div>
				</div>
				
				<a class="fancyajax fancybox.ajax review__link js-add-review" href="<?=SITE_DIR?>include/popup/review-form/?code=<?=$_GET['code']?>" title="<?=GetMessage('T_BTN_ADD_REVIEW')?>"><?=GetMessage('T_BTN_ADD_REVIEW')?></a>
			</div>
		</div>

		<div class="review__list">
			<?foreach($arResult["ITEMS"] as $arItem):?>
				<?
				$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
				$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
				?>

				<div class="review-item js-review-item">
					<div class="review-item__img<?if(!$arItem['PROPERTIES']['PHOTO']['VALUE']){?> review-item__img_empty<?}?>" style="background-image: url(<?if($arItem['PROPERTIES']['PHOTO']['VALUE']){?><?=$arItem['PROPERTIES']['PHOTO']['VALUE']?><?}else{?><?=SITE_TEMPLATE_PATH?>/assets/img/user.svg<?}?>)"></div>

					<div class="review-item__content">
						<?if($arItem['PROPERTIES']['RATING']['VALUE']){
							$rating = $arItem['PROPERTIES']['RATING']['VALUE'] * 100 / 5;
						} else {
							$rating = 0;
						}?>

						<div class="rating">
							<div class="rating__content js-review-rating" style="width: <?=$rating?>%;" data-rating="<?=$arItem['PROPERTIES']['RATING']['VALUE']?>"></div>
						</div>

						<?if($arItem['PROPERTIES']['COMMENTS']['VALUE']['TEXT']){?>
							<p class="js-review-comment"><?=$arItem['PROPERTIES']['COMMENTS']['VALUE']['TEXT']?></p>
						<?}?>
					

						<div class="review-item__bottom">
							<div class="review-item__author">
								<?if($arParams["DISPLAY_NAME"]!="N" && $arItem["NAME"]){?>
									<div class="review-item__author"><?=$arItem["NAME"]?><?if($arItem['PROPERTIES']['CITY']['VALUE']){?>, <span class="review-item__city"><?=$arItem['PROPERTIES']['COMMENTS']['VALUE']['TEXT']?></span><?}?></div>
								<?}?>
							</div>

							<?if($arItem["ACTIVE_FROM"]){?>
								<div class="review-item__date"><?=$arItem["DISPLAY_ACTIVE_FROM"]?></div>
							<?}?>
						</div>

						<?global $USER;?>
						<?if ($USER->IsAdmin()){?>
							<div class="review-item__option">
								<?/*<a class="review-item__link js-edit-review" data-id="<?=$arItem['ID']?>" data-fancybox="" data-src="#edit-main-review" href="javascript:;"><?=GetMessage('T_REVIEW_BTN_EDIT')?></a>*/?>
								<span class="review-item__link" onclick="hideElem(<?=$arItem['ID']?>);"><?=GetMessage('T_REVIEW_BTN_HIDE')?></span>
								<span class="review-item__link" onclick="delElem(<?=$arItem['ID']?>, <?=$arItem['IBLOCK_ID']?>, false);"><?=GetMessage('T_REVIEW_BTN_DELETE')?></span>
							</div>
						<?}?>
					</div>
				</div>
			<?endforeach;?>
		</div>

		<?if($arParams["DISPLAY_BOTTOM_PAGER"] && $arResult["NAV_STRING"]):?>
			<div class="nav-page">
				<a class="btn" href="#"><span><?=GetMessage('T_REVIEW_BTN_SHOW_MORE')?></span></a>
				<?=$arResult["NAV_STRING"]?>
			</div>
		<?endif;?>
	<?} else {?>
		<div class="review__top">
			<div class="review__title"><?=GetMessage('T_TITLE')?> (<?=count($arResult['ITEMS'])?>)</div>

			<div class="review__action">
				<a class="fancyajax fancybox.ajax" href="<?=SITE_DIR?>include/popup/review-form/?code=<?=$_GET['code']?>" title="<?=GetMessage('T_BTN_ADD_REVIEW')?>"><?=GetMessage('T_BTN_ADD_REVIEW')?></a>
			</div>
		</div>
		
		<div class="review__empty"><?=GetMessage('T_EMPTY_REVIEWS')?></div>
	<?}?>
</div>

<script>
	// $(function() {
	// 	// Изменение отзывов
	// 	$(document).on('click', '.js-btn-answer', function() {
	// 		$('.js-review-id').val($(this).data('id'));
	// 	});

	// 	$(document).on('click', '.js-edit-review', function() {
	// 		var $review = $(this).closest('.js-review-item');
	// 		// var advant = $review.find('.js-review-advant').text();
	// 		// var disadvant = $review.find('.js-review-disadvant').text();
	// 		var comment = $review.find('.js-review-comment').text();
	// 		var rating = $review.find('.js-review-rating').data('rating');
	// 		var idform = $(this).data('src');

	// 		$(idform).find('.js-btn-edit-review').data('id', $(this).data('id'));
	// 		$(idform).find('.js-edit-rating').find('#e-star-'+rating).prop("checked", true);

	// 		if($review.find('.js-review-comment').length){
	// 			$(idform).find('.js-edit-comment').val(comment);
	// 		}else{
	// 			$(idform).find('.js-edit-comment').val('');
	// 		}
	// 	});

	// 	$(document).on('click', '.js-edit-review-comment', function() {
	// 		var $review = $(this).closest('.js-review-item-answers');
	// 		var comment = $review.find('.js-review-comment').text();
	// 		var idform = $(this).data('src');

	// 		$(idform).find('.js-btn-edit-comment').data('id', $(this).data('id'));

	// 		if($review.find('.js-review-comment').length){
	// 			$(idform).find('.js-edit-comment').val(comment);
	// 		}else{
	// 			$(idform).find('.js-edit-comment').val('');
	// 		}
	// 	});
	// });

	// $(document).on('click', '.js-btn-edit-review', function(e) {
	// 	e.preventDefault();
	// 	var form = $(this).closest('form');

	// 	$.ajax({
	// 		url: '/ajax/review-edit.php',
	// 		data: decodeURI(form.serialize())+'&id='+$(this).data('id'),
	// 		success: function(result){
	// 			updateReviews();
	// 			$.fancybox.close();
	// 			$.fancybox.open({
	// 				src  : '#msg-success',
	// 				type : 'inline',
	// 				opts : {
						
	// 				}
	// 			});
	// 			console.log('Отзыв изменен!');
	// 		}
	// 	});
	// });

	// $(document).on('click', '.js-btn-edit-comment', function(e) {
	// 	e.preventDefault();
	// 	var form = $(this).closest('form');

	// 	$.ajax({
	// 		url: '/ajax/review-comment-edit.php',
	// 		data: decodeURI(form.serialize())+'&id='+$(this).data('id')+'&id_block='+$(this).data('idblock'),
	// 		success: function(result){
	// 			updateReviews();
	// 			$.fancybox.close();
	// 			$.fancybox.open({
	// 				src  : '#msg-success',
	// 				type : 'inline',
	// 				opts : {
						
	// 				}
	// 			});
	// 			console.log('Комментарий изменен!');
	// 		}
	// 	});
	// });


	// Обновляем отзывы
	function updateReviews() {
		var codeProduct = $('.js-review-container').data('product');
		var strData = 'code='+codeProduct;

		$.ajax({
			url: '/ajax/review.php',
			data: strData,
			context: $('.js-review-container'),
			success: function(result){
				$(this).html(result);
			}
		});
	}

	// Скрываем отзывы
	function hideElem(id){
		$.ajax({
			url: '/ajax/review-hide.php',
			data: 'id='+id,
			success: function(result){
				updateReviews();
				console.log('comment hided!');
			}
		});
	}

	// Удаляем отзывы
	function delElem(id, id_block, add_block){
		$.ajax({
			url: '/ajax/review-delete.php',
			data: 'iblock_id='+id_block+'&id='+id+'&add_block='+add_block,
			success: function(result){
				updateReviews();
				console.log('comment deleted!');
			}
		});
	}

	// Обновляем количество отзывов на самой странице
	var countReview = $('.js-review-count').text();
	if(countReview == ''){countReview = 0;}
	$('.js-review-count-page').text(countReview);

	function declOfNum(n, text_forms) {  
		n = Math.abs(n) % 100; 
		var n1 = n % 10;
		if (n > 10 && n < 20) { return text_forms[2]; }
		if (n1 > 1 && n1 < 5) { return text_forms[1]; }
		if (n1 == 1) { return text_forms[0]; }
		return text_forms[2];
	}

	$('.js-rating-wrap-label').text(countReview+' '+declOfNum(countReview, ['отзыв', 'отзыва', 'отзывов']))

	var procentReview = $('.js-rating-num').text() * 100 / 5;
	$('.js-review-rating-page').css('width',procentReview+'%')
</script>