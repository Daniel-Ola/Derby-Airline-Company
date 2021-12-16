<!-- Jquery Plugins -->
<script type="text/javascript" src="{{ asset('dist/landing/assets/js/jquery-2.1.4.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('dist/landing/assets/plugins/bootstrap/js/bootstrap.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('dist/landing/assets/plugins/swiper/js/swiper.min.js') }}"></script>


<!-- Revolution Slider Plugins -->
<script type="text/javascript" src="{{ asset('dist/landing/assets/plugins/rs-plugin/revolution/js/jquery.themepunch.revolution.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('dist/landing/assets/plugins/rs-plugin/revolution/js/jquery.themepunch.tools.min.js') }}"></script>

<!-- Revolution Slider setting -->
<script>
    revapi = jQuery('.rev-banner-fullscreen').revolution({
        sliderType: "standard",
        sliderLayout: "fullscreen",
        responsiveLevels: [1199, 992, 768, 480],
        visibilityLevels: [1199, 992, 768, 480],
        gridwidth: [1199, 992, 768, 480],
        gridheight: [868, 768, 960, 720],
        lazyType: "smart",
        shadow: 0,
        spinner: "off",
        stopLoop: "off",
        stopAfterLoops: -1,
        stopAtSlide: -1,
        shuffle: "off",
        autoHeight: "off",
        hideThumbsOnMobile: "off",
        hideSliderAtLimit: 0,
        hideCaptionAtLimit: 0,
        hideAllCaptionAtLilmit: 0,
        debugMode: false,
        parallax: {
            type:"mouse+scroll",
            origo: "slidercenter",
            speed: 700,
            levels: [1, 2, 3, 4, 5, 6, 8, 10, 20, 25, 30, 35, 40, 45, 50, 47, 48, 49, 50, 51, 55],
            disable_onmobile: "on"
        },
        fallbacks: {
            simplifyAll: "off",
            nextSlideOnWindowFocus: "off",
            disableFocusListener: false,
        },
        dottedOverlay: "none",
        delay: 9000,
    });
</script>

<!-- Java Scripts -->
<script type="text/javascript" src="{{ asset('dist/landing/assets/js/google-map.js') }}"></script>
<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
<script type="text/javascript" src="{{ asset('dist/landing/assets/js/email.js') }}"></script>
<script type="text/javascript" src="{{ asset('dist/landing/assets/js/main.js') }}"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>
