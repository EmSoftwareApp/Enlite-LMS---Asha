$(function() {

    "use strict";



    $(".preloader").fadeOut();


    var set = function() {
        var width = (window.innerWidth > 0) ? window.innerWidth : this.screen.width;
        var topOffset = 60;
        if (width < 1170) {
            $("body").addClass("mini-sidebar");
            $('.top-left-part span').hide();

            $(".sidebartoggler i").addClass("fa fa-bars");
        } else {
            $("body").removeClass("mini-sidebar");
            $('.top-left-part span').show();
            $(".sidebartoggler i").removeClass("fa fa-bars");
        }

        var height = ((window.innerHeight > 0) ? window.innerHeight : this.screen.height) - 1;
        height = height - topOffset;
        if (height < 1) height = 1;
        if (height > topOffset) {
            $(".page-wrapper").css("min-height", (height) + "px");
        }

    };
    $(window).ready(set);
    $(window).on("resize", set);



    $(".sidebartoggler").on('click', function() {
        if ($("body").hasClass("mini-sidebar")) {
            $("body").trigger("resize");

            $("body").removeClass("mini-sidebar");
            $('.top-left-part span').show();
            $(".sidebartoggler i").addClass("fa fa-bars");
        } else {
            $("body").trigger("resize");

            $("body").addClass("mini-sidebar");
            $('.top-left-part span').hide();
            $(".sidebartoggler i").removeClass("fa fa-bars");
        }
    });

    $(".navbar-toggle").on('click', function() {
        $("body").toggleClass("show-sidebar");
        $(".navbar-toggle i").toggleClass("fa-bars");
        $(".navbar-toggle i").addClass("fa-close");
    });
    $(".sidebartoggler").on('click', function() {
        $(".sidebartoggler i").toggleClass("fa fa-bars");
    });



    $(function() {
        var url = window.location;
        var element = $('ul#side-menu a').filter(function() {
            return this.href == url;
        }).addClass('active').parent().addClass('active');
        while (true) {
            if (element.is('li')) {
                element = element.parent().addClass('in').parent().addClass('active');
            } else {
                break;
            }
        }
    });



    $(".right-side-toggler").on('click', function() {
        $(".right-sidebar").slideDown(50);
        $(".right-sidebar").toggleClass("shw-rside");
    });

    $(function() {
        $('#side-menu').metisMenu();
    });

});



(function($, window, document) {
    var panelSelector = '[data-perform="panel-collapse"]',
        panelRemover = '[data-perform="panel-dismiss"]';
    $(panelSelector).each(function() {
        var collapseOpts = {
                toggle: false
            },
            parent = $(this).closest('.panel'),
            wrapper = parent.find('.panel-wrapper'),
            child = $(this).children('i');
        if (!wrapper.length) {
            wrapper = parent.children('.panel-heading').nextAll().wrapAll('<div/>').parent().addClass('panel-wrapper');
            collapseOpts = {};
        }
        wrapper.collapse(collapseOpts).on('hide.bs.collapse', function() {
            child.removeClass('ti-minus').addClass('ti-plus');
        }).on('show.bs.collapse', function() {
            child.removeClass('ti-plus').addClass('ti-minus');
        });
    });



    $(document).on('click', panelSelector, function(e) {
        e.preventDefault();
        var parent = $(this).closest('.panel'),
            wrapper = parent.find('.panel-wrapper');
        wrapper.collapse('toggle');
    });

    

    $(document).on('click', panelRemover, function(e) {
        e.preventDefault();
        var removeParent = $(this).closest('.panel');

        function removeElement() {
            var col = removeParent.parent();
            removeParent.remove();
            col.filter(function() {
                return ($(this).is('[class*="col-"]') && $(this).children('*').length === 0);
            }).remove();
        }
        removeElement();
    });
}(jQuery, window, document));



$(function() {
    $('[data-toggle="tooltip"]').tooltip();
});



$(function() {
    $('[data-toggle="popover"]').popover();
});



$('#to-recover').on("click", function() {
    $("#loginform").slideUp();
    $("#recoverform").fadeIn();
});

// Sidebar

$('.slimscrollright').slimScroll({
    height: '100%',
    position: 'right',
    size: "5px",
    color: '#dcdcdc',
});

$('.chat-list').slimScroll({
    height: '100%',
    position: 'right',
    size: "5px",
    color: '#dcdcdc',
});

// Resize all elements

$(window).on('load', function() {
    $("body").trigger("resize");
});
$("body").trigger("resize");

// visited ul li

$('.visited li a').on('click', function(e) {
    $('.visited li').removeClass('active');
    var $parent = $(this).parent();
    if (!$parent.hasClass('active')) {
        $parent.addClass('active');
    }
    e.preventDefault();
});