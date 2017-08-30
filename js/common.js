var window_height = $(window).height();
$('.fscreen').css('height', window_height);

$( window ).resize(function() {
	window_height = $(window).height();
	$('.fscreen').css('height', window_height);
});

$(document).ready(function() {

	var checkVisible = false;

	$('.header-nav-menu').click(function() {
		if (!checkVisible) {
			$('.header-nav').find('ul').css('left','0');
			checkVisible = true;
		}
		else {
			$('.header-nav').find('ul').css('left','-1000px');
			checkVisible = false;
		}
	});

	$('.p-c-wrapper').hover(function() {
		$(this).find('.p-c-trans').css('background-color','rgba( 0, 0, 0, .55)');
	},
	function () {
		$(this).find('.p-c-trans').css('background-color','rgba( 0, 0, 0, .75)');
	})

	$('.modal-product-btn').magnificPopup({
		type: 'inline',
	});

	$('.modal-review-btn').magnificPopup({
		type: 'inline',
	});

	$('.modal-callback-btn').magnificPopup({
		type: 'inline',
	});

	var checkTransform = false;

	$('.header-call-btn').click(function() {
		$('.header-top-info').css('transform', 'translateY(-103px)');
	});

	$('.header-close-form').click(function() {
		$('.header-top-info').css('transform', 'translateY(0px)');
	});

	var slideNow = 1;
	var slideCount = $('#slidewrapper').children().length;
	var slideInterval = 5000;
	var navBtnId = 0;
	var translateWidth = 0;

	$('#slidewrapper').css('width', ($('.slide').length*100)+'%');

    $('.slide').css('width', (100/$('.slide').length)+'%');

    var switchInterval = setInterval(nextSlide, slideInterval);

    $('#viewport').hover(function() {
        clearInterval(switchInterval);
    }, function() {
        switchInterval = setInterval(nextSlide, slideInterval);
    });

    $('#next-btn').click(function() {
        nextSlide();
    });

    $('#prev-btn').click(function() {
        prevSlide();
    });

    $('.slide-nav-btn').click(function() {
        colorDotsLast(slideNow);
        navBtnId = $(this).index();

        if (navBtnId + 1 != slideNow) {
            translateWidth = -$('#viewport').width() * (navBtnId);

            $('#slidewrapper').css({
                'transform': 'translate(' + translateWidth + 'px, 0)',
                '-webkit-transform': 'translate(' + translateWidth + 'px, 0)',
                '-ms-transform': 'translate(' + translateWidth + 'px, 0)',
            });
            slideNow = navBtnId + 1;
        }
        colorDots(slideNow);
    });

    function nextSlide() {
	    colorDotsLast(slideNow);
	    if (slideNow == slideCount || slideNow <= 0 || slideNow > slideCount) {
	        $('#slidewrapper').css('transform', 'translate(0, 0)');
	        slideNow = 1;

	    } else {
	        translateWidth = -$('#viewport').width() * (slideNow);
	        $('#slidewrapper').css({
	            'transform': 'translate(' + translateWidth + 'px, 0)',
	            '-webkit-transform': 'translate(' + translateWidth + 'px, 0)',
	            '-ms-transform': 'translate(' + translateWidth + 'px, 0)',
	        });
	        slideNow++;

	    }

	    colorDots(slideNow);
	}

	function prevSlide() {
	    colorDotsLast(slideNow);
	    if (slideNow == 1 || slideNow <= 0 || slideNow > slideCount) {
	        translateWidth = -$('#viewport').width() * (slideCount - 1);
	        $('#slidewrapper').css({
	            'transform': 'translate(' + translateWidth + 'px, 0)',
	            '-webkit-transform': 'translate(' + translateWidth + 'px, 0)',
	            '-ms-transform': 'translate(' + translateWidth + 'px, 0)',
	        });
	        slideNow = slideCount;

	    } else {
	        translateWidth = -$('#viewport').width() * (slideNow - 2);
	        $('#slidewrapper').css({
	            'transform': 'translate(' + translateWidth + 'px, 0)',
	            '-webkit-transform': 'translate(' + translateWidth + 'px, 0)',
	            '-ms-transform': 'translate(' + translateWidth + 'px, 0)',
	        });
	        slideNow--;
	    }
	    colorDots(slideNow);
	}

	var lastDot = -1;

	function colorDots(slidenow) {
	    $('.slide-nav-btn').each( function(el) {
	        if ( (el+1) == slidenow ) {
	            $(this).addClass('active-btn');
	            lastDot = slidenow;
	        }
	               
	    });
	}

	function colorDotsLast(slidenow) {
	    $('.slide-nav-btn').each( function(el) {
	        if ( (el+1) == lastDot ) {
	            $(this).removeClass('active-btn');
	        }      
	    });
	}


	$('.btn-form').click(function() {
		var el = $(this).parents()[1];
		//Настройка валидации формы===================================
		$(el).validate({
			rules: {
				'name-sender': {
					required: true,
					minlength: 2,
				},
				'phone-num': {
					required: true,
					digits: true,
					minlength: 11,
					maxlength: 11,
				},
			},
			messages: {
				'name-sender': {
					required: "Заполните имя",
					minlength: "Минимум 2 символа",
				},
				'phone-num': {
					required: "Заполните номер",
					digits: "Не корректный номер",
					minlength: "Некорректный номер",
					maxlength: "Некорректный номер",
				},
			},
			/*Если форма отправлена*/
			submitHandler: function() {
				alert('Подождите, заявка отправляется...');
				var form_data = $(el).serialize(); //собераем все данные из формы
		        $.ajax({
			        type: "POST", //Метод отправки
			        url: window.location.href, //путь до php фаила отправителя
			        data: form_data,
			        success: function() {
		               //код в этом блоке выполняется при успешной отправке сообщения
		               alert("Спасибо. Ваша заявка отправлена!");
		               $(el).trigger( 'reset' );
		               $.magnificPopup.close();
			        }
		        });
			}
		});
	});

	$("#review-form").validate({
			rules: {
				'name-sender': {
					required: true,
					minlength: 2,
				},
				'phone-num': {
					required: true,
					digits: true,
					minlength: 11,
					maxlength: 11,
				},
				review: {
					required: true,
					minlength: 20,
					maxlength: 1000,
				},
			},
			messages: {
				'name-sender': {
					required: "Заполните имя",
					minlength: "Минимум 2 символа",
				},
				'phone-num': {
					required: "Заполните номер",
					digits: "Не корректный номер",
					minlength: "Некорректный номер",
					maxlength: "Некорректный номер",
				},
				review: {
					required: "Заполните отзыв",
					minlength: "Минимальная длина 20 символов",
					maxlength: "Максимальная длина 1000 символов",
				},
			},
			/*Если форма отправлена*/
			submitHandler: function() {
				alert('Подождите, отзыв отправляется...');
				var form_data = $(el).serialize(); //собераем все данные из формы
		        $.ajax({
			        type: "POST", //Метод отправки
			        url: window.location.href, //путь до php фаила отправителя
			        data: form_data,
			        success: function() {
		               //код в этом блоке выполняется при успешной отправке сообщения
		               alert("Спасибо. Ваш отзыв отправлен!");
		               $(el).trigger( 'reset' );
		               $.magnificPopup.close();
			        }
		        });
			}
		});
});

