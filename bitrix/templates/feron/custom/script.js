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

}); 