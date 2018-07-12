/*price range*/

 $('#sl2').slider();

	var RGBChange = function() {
	  $('#RGB').css('background', 'rgb('+r.getValue()+','+g.getValue()+','+b.getValue()+')')
	};	
		
/*scroll to top*/

$(document).ready(function(){
	$(function () {
		$.scrollUp({
	        scrollName: 'scrollUp', // Element ID
	        scrollDistance: 300, // Distance from top/bottom before showing element (px)
	        scrollFrom: 'top', // 'top' or 'bottom'
	        scrollSpeed: 300, // Speed back to top (ms)
	        easingType: 'linear', // Scroll to top easing (see http://easings.net/)
	        animation: 'fade', // Fade, slide, none
	        animationSpeed: 200, // Animation in speed (ms)
	        scrollTrigger: false, // Set a custom triggering element. Can be an HTML string or jQuery object
					//scrollTarget: false, // Set a custom target element for scrolling to the top
	        scrollText: '<i class="fa fa-angle-up"></i>', // Text for element, can contain HTML
	        scrollTitle: false, // Set a custom <a> title if required.
	        scrollImg: false, // Set true to use image
	        activeOverlay: false, // Set CSS color to display scrollUp active point, e.g '#00FFFF'
	        zIndex: 2147483647 // Z-Index for the overlay
		});
	});

	$('.add-to-cart').click(function () {
		var id = $(this).attr('data-id');

		$.post('/cart/addAjax/' + id, {}, function (data) {
			$('#cart-count').html('(' + data + ')');
		});

		return false;
	});

	var accordion = function () {
		var data = $('.accordion').attr('data-accordion');

		$('.accordion-header').click(function () {
			if (data === 'close') {
				$('.accordion-body').slideUp();

				if ($(this).hasClass('active')) {
					$(this).toggleClass('active');
				} else {
					$('.accordion-header').removeClass('active');
					$(this).toggleClass('active');
				}
			} else {
				$(this).toggleClass('active');
			}

			$(this).next('.accordion-body').not(':animated').slideToggle();
		});
	}

	accordion();

	$('.count').each(function () {
		$(this).prop('Counter', 0).animate({
			Counter: $(this).text()
		},{
			duration:5000,
			easing:'swing',
			step:function (now) {
				$(this).text(Math.ceil(now));
			}
		})
	});

	$('.about-slide').click(function () {
		$(this).fadeOut(500, function () {
			if ($(this).attr('src') !== '/template/img/home/award-winning-websites.jpg') {
				$(this).attr('src', '/template/img/home/award-winning-websites.jpg').fadeIn(500);
			} else {
				$(this).attr('src', '/template/img/home/cb2c65b2d6facc14662.jpg').fadeIn(500);
			}
		});
	})
});
