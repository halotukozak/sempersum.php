
	$(document).ready(function() {
	var NavY = $('nav').offset().top;

	var stickyNav = function(){
	var ScrollY = $(window).scrollTop();

	if (ScrollY > NavY) {
		$('.navbar').removeClass('nav--up');
		$('.logo').removeClass('logo--up');
	} else {
		$('.navbar').addClass('nav--up');
		$('.logo').addClass('logo--up');
	}
	};

	stickyNav();

	$(window).scroll(function() {
		stickyNav();
	});
	});
