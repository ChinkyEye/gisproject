(function ($) {
    'use strict';

    var browserWindow = $(window);

    // :: 1.0 Preloader Active Code
    browserWindow.on('load', function () {
        $('.preloader').fadeOut('slow', function () {
            $(this).remove();
        });
    });

    // :: 2.0 Nav Active Code
    if ($.fn.classyNav) {
        $('#creditNav').classyNav();
    }

    

    // :: 4.0 ScrollUp Active Code
    if ($.fn.scrollUp) {
        browserWindow.scrollUp({
            scrollSpeed: 1500,
            scrollText: '<i class="fa fa-angle-up"></i> Top'
        });
    }

    // :: 5.0 CounterUp Active Code
    if ($.fn.counterUp) {
        $('.counter').counterUp({
            delay: 10,
            time: 2000
        });
    }

    // :: 6.0 Progress Bar Active Code
    if ($.fn.circleProgress) {
        $('#circle').circleProgress({
            size: 90,
            emptyFill: "rgba(0, 0, 0, .0)",
            fill: '#fff',
            thickness: '3',
            reverse: true
        });
        $('#circle2').circleProgress({
            size: 90,
            emptyFill: "rgba(0, 0, 0, .0)",
            fill: '#fff',
            thickness: '3',
            reverse: true
        });
        $('#circle3').circleProgress({
            size: 90,
            emptyFill: "rgba(0, 0, 0, .0)",
            fill: '#fff',
            thickness: '3',
            reverse: true
        });
        $('#circle4').circleProgress({
            size: 90,
            emptyFill: "rgba(0, 0, 0, .0)",
            fill: '#003679',
            thickness: '3',
            reverse: true
        });
        $('#circle5').circleProgress({
            size: 90,
            emptyFill: "rgba(0, 0, 0, .0)",
            fill: '#003679',
            thickness: '3',
            reverse: true
        });
        $('#circle6').circleProgress({
            size: 90,
            emptyFill: "rgba(0, 0, 0, .0)",
            fill: '#003679',
            thickness: '3',
            reverse: true
        });
        $('#circle7').circleProgress({
            size: 90,
            emptyFill: "rgba(0, 0, 0, .0)",
            fill: '#003679',
            thickness: '3',
            reverse: true
        });
        $('#circle8').circleProgress({
            size: 90,
            emptyFill: "rgba(0, 0, 0, .0)",
            fill: '#003679',
            thickness: '3',
            reverse: true
        });
        $('#circle9').circleProgress({
            size: 90,
            emptyFill: "rgba(0, 0, 0, .0)",
            fill: '#003679',
            thickness: '3',
            reverse: true
        });
    }

    // :: 7.0 Tooltip Active Code
    if ($.fn.tooltip) {
        $('[data-toggle="tooltip"]').tooltip();
    }

    // :: 8.0 Prevent Default a Click
    $('a[href="#"]').on('click', function ($) {
        $.preventDefault();
    });

    // :: 9.0 Jarallax Active Code
    if ($.fn.jarallax) {
        $('.jarallax').jarallax({
            speed: 0.2
        });
    }

    // :: 10.0 Sticky Active Code
    if ($.fn.sticky) {
        $("#sticker").sticky({
            topSpacing: 0
        });
    }

    // :: 11.0 Wow Active Code
    if (browserWindow.width() > 767) {
        new WOW().init();
    }

})(jQuery);