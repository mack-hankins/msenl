$(function () {


    $(document).ready(function () {
        init_scroll();
        stickHeader();
        int_nav_menu_height();
        delete_toggle();
        handleContentHeight();
    });

    $(window).resize(function () {
        stickHeader();
        int_nav_menu_height();
        handleContentHeight();
    });

    $(window).scroll(function () {
        stickHeader();
    });

    // -------------------------------------------------------------------------------------------------
    // Responsive Sticky Footer
    // -------------------------------------------------------------------------------------------------
    function getViewPort() {
        var e = window,
            a = 'inner';
        if (!('innerWidth' in window)) {
            a = 'client';
            e = document.documentElement || document.body;
        }

        return {
            width: e[a + 'Width'],
            height: e[a + 'Height']
        };
    };

    function handleContentHeight () {
        var height;

        if ($('body').height() < getViewPort().height) {
            height = getViewPort().height -
                (
                    $('#page-header').outerHeight() - $('#page-content').outerHeight()
                ) - $('#page-footer').outerHeight();

            console.log(height);
           $('#page-content').css('min-height', height);
        }
    };

    // ---------------------------------------------------------------------------------------------------------------------------->
    // SCROLL FUNCTIONS   ||-----------
    // ---------------------------------------------------------------------------------------------------------------------------->

    function init_scroll() {

        $('.scroll-top').click(function () {
            $('html, body').animate({ scrollTop: 0 }, 2000);
            return false;
        });

        // Click To Down And Up Elements
        $('.scroll-down[href^="#"], .scroll-to-target[href^="#"]').on('click', function (e) {
            e.preventDefault();

            var target = this.hash;
            var $target = $(target);

            $('html, body').stop().animate({
                'scrollTop': $target.offset().top
            }, 900, 'swing', function () {
                window.location.hash = target;
            });
        });

    };


    // ----------------------------------------------------------------
    // Sticky Header
    // ----------------------------------------------------------------

    function stickHeader() {
        var scrolled = $(window).scrollTop();
        var windHeight = $(window).height();
        if (scrolled > 50) {
            $('.header').addClass('header-prepare');
        } else {
            $('.header').removeClass('header-prepare');
        }

        if (scrolled > 1) {
            $('.header').addClass('header-fixed');
        } else {
            $('.header').removeClass('header-fixed');
        }
    };


    // ----------------------------------------------------------------
    // Navigation Menu panel
    // ----------------------------------------------------------------
    var mobile_menu_icon = $(".nav-mobile");
    var mobile_menu = $(".nav-menu");

    // Mobile menu max height
    function int_nav_menu_height() {
        mobile_menu.css("max-height", $(window).height() - $(".header").height() - 20 + "px"), $(window).width() <= 1024 ? $(".header").addClass("mobile-device") : $(window).width() > 1024 && ($(".header").removeClass("mobile-device"))
    };

    // Mobile menu toggle icon
    mobile_menu_icon.click(function () {
        if (!($(this).hasClass('active'))) {
            mobile_menu_icon.addClass('active');
            mobile_menu.addClass('active');
        }
        else if ($(this).hasClass('active')) {
            mobile_menu_icon.removeClass('active');
            mobile_menu.removeClass('active');
        }
    });


    // Dropdown Sub menu
    var menu_Sub = $(".menu-has-sub");
    var menu_Sub_Li;

    $(".mobile-device .menu-has-sub").find(".fa:first").removeClass("fa-angle-right").addClass("fa-angle-down");

    menu_Sub.click(function () {
        if ($(".header").hasClass("mobile-device")) {
            menu_Sub_Li = $(this).parent("li:first");
            if (menu_Sub_Li.hasClass("menu-opened")) {
                menu_Sub_Li.find(".sub-dropdown:first").slideUp(function () {
                    menu_Sub_Li.removeClass("menu-opened");
                    menu_Sub_Li.find(".menu-has-sub").find(".fa:first").removeClass("fa-angle-up").addClass("fa-angle-down");
                });
            }
            else {
                $(this).find(".fa:first").removeClass("fa-angle-down").addClass("fa-angle-up");
                menu_Sub_Li.addClass("menu-opened");
                menu_Sub_Li.find(".sub-dropdown:first").slideDown();
            }
            return false;
        }
        else {
            return false;
        }
    });

    menu_Sub_Li = menu_Sub.parent("li");
    menu_Sub_Li.hover(function () {
        if (!($(".header").hasClass("mobile-device"))) {
            $(this).find(".sub-dropdown:first").stop(true, true).fadeIn("fast");
        }

    }, function () {
        if (!($(".header").hasClass("mobile-device"))) {
            $(this).find(".sub-dropdown:first").stop(true, true).delay(100).fadeOut("fast");
        }

    });


    // ----------------------------------------------------------------
    // Overlay Menu panel
    // ----------------------------------------------------------------
    var overlay_menu_btn = $(".overlay-menu-btn");
    var overlay_menu = $(".overlay-menu");
    var overlay_menu_close = $(".overlay-menu-close");

    // Overlay menu Toggle icon
    overlay_menu_btn.click(function () {
        if (!($(this).hasClass('active'))) {
            overlay_menu_btn.addClass('active');
            overlay_menu.addClass('active');
            $('body').addClass('overlay-menu-active');
        }
        else if ($(this).hasClass('active')) {
            overlay_menu_btn.removeClass('active');
            overlay_menu.removeClass('active');
            $('body').removeClass('overlay-menu-active');
        }
    });

    // Overlay menu close icon
    overlay_menu_close.click(function () {
        if (overlay_menu_btn.hasClass('active') && (overlay_menu.hasClass('active'))) {
            overlay_menu_btn.removeClass('active');
            overlay_menu.removeClass('active');
            $('body').removeClass('overlay-menu-active');
        }
    });

    //--------------------------------------------------------
    // Delete Toggle
    //---------------------------------------------------------

    function delete_toggle() {

        $('#delete_toggle').click(function () {
            $('#postval').val($(this).attr('data-id'));
            console.log('hey');
        });

    }


});