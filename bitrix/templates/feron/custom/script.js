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
	var openHeaderContacts = false;
	var openMenu = false;

	$('.js-mobile-contacts').on('click', function(){
		if(openHeaderContacts == false){
			if(openMenu == true){
				$('.js-catalogmenucolumn').removeClass('open');
				$('.js-body').removeClass('no-scroll');
				$('.js-btn-menu').removeClass('active');
				openMenu = false;
			}

			openHeaderContacts = true;
		}else{
			openHeaderContacts = false;
		}

		$(this).toggleClass('active');
		$('.js-header-contacts').toggleClass('open');
		$('.js-body').toggleClass('no-scroll');
	});

	// Открыть/Закрыть контакты на мобильнике
	$('.js-btn-menu').on('click', function(){
		if(openMenu == false){
			if(openHeaderContacts == true){
				$('.js-header-contacts').removeClass('open');
				$('.js-body').removeClass('no-scroll');
				$('.js-mobile-contacts').removeClass('active');
				openHeaderContacts = false;
			}

			openMenu = true;
		}else{
			openMenu = false;
		}

		$(this).toggleClass('active');
		$('.js-catalogmenucolumn').toggleClass('open');
		$('.js-body').toggleClass('no-scroll');
	});
}); 