$(document).ready(function() {
	var widthWindow = $(window).width();
	var deviceType = 'desktop';
	var changeDevice = false;

	if(widthWindow < 768){
		deviceType = 'mobile';
	}else if(widthWindow >= 768 && widthWindow < 992){
		deviceType = 'tablet';
	}else{
		deviceType = 'desktop';
	}

	$(window).on('resize', function(){
		widthWindow = $(window).width();

		if(widthWindow < 768 && deviceType == 'tablet'){
			deviceType = 'mobile';
			changeDevice = true;
		}else if((widthWindow >= 768 && deviceType == 'mobile') ||(widthWindow < 992 && deviceType == 'desktop')){
			deviceType = 'tablet';
			changeDevice = true;
		}else if(widthWindow >= 992 && deviceType == 'tablet'){
			deviceType = 'desktop';
			changeDevice = true;
		}else{
			changeDevice = false;
		}
	});

	// Переключение номеров в шапке
	$('.js-contact-roz').on('click', function(){
		if(deviceType != 'mobile'){
			$(this).removeClass('inactive');
			$('.js-contact-opt').addClass('inactive');
			$('.js-phone-opt').addClass('inactive');
			$('.js-phone-roz').removeClass('inactive');
		}
	});

	$('.js-contact-opt').on('click', function(){
		if(deviceType != 'mobile'){
			$(this).removeClass('inactive');
			$('.js-contact-roz').addClass('inactive');
			$('.js-phone-roz').addClass('inactive');
			$('.js-phone-opt').removeClass('inactive');
		}
	});

	// Открыть/Закрыть контакты на мобильнике
	$('.js-mobile-contacts').on('click', function(){
		if($(this).hasClass('active')){
			$(this).removeClass('active');
			$('.js-header-contacts').toggleClass('open');
			$('.js-body').removeClass('no-scroll');
		}else{
			$('.js-form-search-wrap').removeClass('open');
			$('.js-mobile-search').removeClass('active');
			$('.js-catalogmenucolumn').removeClass('open');
			$('.js-btn-menu').removeClass('active');

			$(this).addClass('active');
			$('.js-header-contacts').addClass('open');
			$('.js-body').addClass('no-scroll');
		}
	});

	// Открыть/Закрыть меню на мобильнике
	$('.js-btn-menu').on('click', function(){
		if($(this).hasClass('active')){
			$(this).removeClass('active');
			$('.js-catalogmenucolumn').toggleClass('open');
			$('.js-body').removeClass('no-scroll');
		}else{
			$('.js-header-contacts').removeClass('open');
			$('.js-mobile-contacts').removeClass('active');
			$('.js-form-search-wrap').removeClass('open');
			$('.js-mobile-search').removeClass('active');

			$(this).addClass('active');
			$('.js-catalogmenucolumn').addClass('open');
			$('.js-body').addClass('no-scroll');
		}
	});

	// Открыть/Закрыть поиск на мобильнике
	$('.js-mobile-search').on('click', function(){
		if($(this).hasClass('active')){
			$(this).removeClass('active');
			$('.js-form-search-wrap').toggleClass('open');
			$('.js-body').removeClass('no-scroll');
		}else{
			$('.js-header-contacts').removeClass('open');
			$('.js-mobile-contacts').removeClass('active');
			$('.js-catalogmenucolumn').removeClass('open');
			$('.js-btn-menu').removeClass('active');

			$(this).addClass('active');
			$('.js-form-search-wrap').addClass('open');
			$('.js-body').addClass('no-scroll');
		}
	});
}); 