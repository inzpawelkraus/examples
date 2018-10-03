$(document).ready(function () {
    $(".menuToggle").click(function () {
	$("#main_menu").fadeToggle(200);
    });
    $('.counterBox').each(function () {
	$(this).prop('Counter', 0).animate({
	    Counter: $(this).text()
	}, {
	    duration: 4000,
	    easing: 'swing',
	    step: function (now) {
		$(this).text(Math.ceil(now));
	    }
	});
    });
});