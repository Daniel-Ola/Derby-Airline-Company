/*
Copyright (c) 2017
[Custom JS Script]
Theme Name : Item-Multipurpose Landing Page-UiSumo
Version    : 1.0
Author     : UiSuMo Team
Author URI : https://uisumo.com
Support    : uisumo@gmail.com
*/
/*jslint browser: true*/
/*global $, jQuery, alert*/


$(document).ready(function () {
    "use strict";

     var lastScrollTop, navbar, $nav, simpleParallax, back;
    /*nav bar background color change on scroll */
    $(document).on('scroll', function () {
        $nav = $(".fixed-top");
        $nav.toggleClass('scrolled', $(this).scrollTop() > $nav.height());
    });
    /*navbar reduced height on scroll*/
    lastScrollTop = 0;
    navbar = $('.navbar');
    $(window).on('scroll', function (event) {
        var st = $(this).scrollTop();
        if (st > lastScrollTop) {
            navbar.addClass('navbar-scroll-custom');
        }
        else {
            navbar.removeClass('navbar-scroll-custom');
        }
        lastScrollTop = st;
    });

    /* Page Pre Loading */
    $(window).load(function () { // makes sure the whole site is loaded
        $('#status').fadeOut(); // will first fade out the loading animation
        $('#preloader').delay(500).fadeOut('slow'); // will fade out the white DIV that covers the website.
    });
    /* end Page Pre Loading */


    //Initiat WOW JS
    new WOW().init();


    /*for smooth scroll of anchors in same page*/
    $('a[href*="#"]:not([href="#"])').on('click', function () {
		$("#off-canvas").removeClass("is-open");
            $("#off-canvas").addClass("is-closed");
        if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {
            var target = $(this.hash);
            target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
            if (target.length) {
                $('html, body').animate({
                    scrollTop: target.offset().top
                }, 1000);
                return false;
            }
        }
    });

    /* Theme color change*/
    var theme_settings = $(".theme-settings").find(".theme-color");
    theme_settings.on('click', function () {
        var val = $(this).attr('data-color');
        $('#style_theme').attr('href', 'css/' + val + '.css');
        console.log(val);
        theme_settings.removeClass('theme-active');
        theme_settings.addClass('theme-active');
        return false;
    });
    $(".theme-click").on('click', function () {
        $("#switcher").toggleClass("active");
        return false;
    });


    /*Back-To-Top*/
    if (true) {
        if ($('.back-to-top').length) {
            var scrollTrigger = 1000, // px
                backToTop = function () {
                    var scrollTop = $(window).scrollTop();
                    if (scrollTop > scrollTrigger) {
                        $('.back-to-top').addClass('show');
                    } else {
                        $('.back-to-top').removeClass('show');
                    }
                };
            backToTop();
            $(window).on('scroll', function () {
                backToTop();
            });
            $('.back-to-top').on('click', function (e) {
                e.preventDefault();
                $('html,body').animate({
                    scrollTop: 0
                }, 700);
            });
        }
    }


    // executes when HTML-Document is loaded and DOM is ready
//
//
 // executes when HTML-Document is loaded and DOM is ready


    $(".navbar-nav").clone().prependTo("#off-canvas");

    $(function () {
        $(document).trigger("enhance");
		 $("close-btn").click(function(){
        $("js-offcanvas").hide(1000);
    });
    });
	
     /*scroll reveal animations*/
    window.sr = ScrollReveal();
    sr.reveal('.header-txt', {
        origin: 'top'
        , duration: 2000
        , delay: 200
    });
    sr.reveal('.about', {
        origin: 'bottom'
        , duration: 3000
        , delay: 200
        , 
    });

    sr.reveal('.details1-img', {
        origin: 'left'
        , duration: 2500
        , delay: 300
    });
     sr.reveal('.details2-img', {
        origin: 'right'
        , duration: 2500
        , delay: 300
    });
     sr.reveal('.details3-img', {
        origin: 'left'
        , duration: 2500
        , delay: 300
    });
    sr.reveal('.about-1', {
        rotate: {
            x: 0
            , y: 100
            , z: 0
        }
        , duration: 2000
    });
     sr.reveal('.fnt-icon', {
        rotate: {
            x: 0
            , y: 100
            , z: 0
        }
        , duration: 2000
    });
         sr.reveal('.counters-content', {
        rotate: {
            x: 0
            , y: 100
            , z: 0
        }
        , duration: 2000
    });
      sr.reveal('form', {
        origin: 'bottom'
        , duration: 3000
        , delay: 200
        , reset: true
    });
	      sr.reveal('.contact-details', {
        origin: 'bottom'
        , duration: 3000
        , delay: 200
        , reset: true
    });

});




    //               /* clicking on navlink, nav menu  collapses in responsive withpo */
    // $(".navbar-nav li a").click(function (event) {
    //     $(".navbar-collapse").collapse('hide');
    // });
 