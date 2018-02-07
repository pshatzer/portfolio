
$(document).ready(function(){
	//For scrollable sidebar
	$(".sidebar").stick_in_parent();
	$(".sidebar2").stick_in_parent();

	//smooth scroll anchor links
	$('a[href^="#"]').on('click',function (e) {
	    e.preventDefault();

	    var target = this.hash;
	    var $target = $(target);

	    $('html, body').stop().animate({
	        'scrollTop': $target.offset().top
	    }, 900, 'swing', function () {
	        window.location.hash = target;
	    });
	});
	var scrolled
	//waypoint to play/pause main video
	$(window).scroll(function() {
		scrolled = true;
	});

	setInterval(function() {
	    if ( scrolled ) {
	        scrolled = false;
	        var scroll = $(window).scrollTop();
		    var os = $('.portfolio-inner').offset().top;
		    if (scroll > os) {
		       $('#header-video').get(0).pause();
		    } else {
		       $('#header-video').get(0).play();
		   	}
	    }
	}, 500);
});