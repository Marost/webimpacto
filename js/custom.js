/**
 *   1- Main menu
 *   2- Video wrapper
 *   3- Accordion
 *   4- Tabs
 *   5- Progressbar
 *   6- Slider
 *   7- Masonry
 *   8- Carousel
 *   9- Back to top
 *   10- jQuery for css
 *   11- Search box
 *   12- Tweet
 *   13- Validate form
 *   14- Breadking
 *   15- Flickr
 *   16- Gallery widget
 *   17- Gmap
 *   18- Browser resize
 *-----------------------------------------------------------------
 **/
"use strict";
jQuery(document).ready(function () {

    jQuery(".kopa-rate").hide(); //OCULTAR STAR RATING

    Modernizr.load([{
        load: 'libs/lazyload/jquery.lazyload.js',
        complete: function() {
            jQuery("img.lazy").lazyload({
                effect : "fadeIn"
            });
        }
    }]);

    // 1. Main menu
    Modernizr.load([{
        load: 'js/superfish.js',
        complete: function () {
            jQuery('.kopa-menu.sf-menu').superfish({
                delay:500
                // cssArrows:  false
            });
        }
    }]);
    // 1.1 Mobile menu
    Modernizr.load([{
        load: ['js/navgoco.js'],
        complete: function () {
            $(".kopa-menu.mobile-menu").navgoco({accordion: true});

            $('.mobile-menu-icon').click(function(){
                $(".kopa-menu.mobile-menu").slideToggle( "slow" );
            });
        }
    }]);

    // 2. Video wrapper
    if (jQuery(".video-wrapper").length > 0) {
        if (jQuery(".video-wrapper").length > 0) {
            Modernizr.load([{
                load: 'js/fitvids.js',
                complete: function () {
                    jQuery(".video-wrapper").fitVids();
                }
            }]);
        };
    }

    // 3. Accordion
    if (jQuery('.kopa-accordion').length > 0) {
        Modernizr.load([{
            load: 'js/jquery-ui.js',
            complete: function () {
                jQuery(".kopa-accordion").accordion({
                    collapsible: true,
                    heightStyle: "content",
                    icons: false
                });

            }
        }]);
    }
    if (jQuery('.kp-toggle').length > 0) {
        jQuery('.kp-toggle .toggle-header') .next() .hide();
        jQuery('.kp-toggle .toggle-header').click(function(){
            if (jQuery(this).next() .is(':hidden')) {
              jQuery(this).next().slideDown('slow');
              jQuery(this).addClass('toggle-header-active');
            }
            else {
              jQuery(this).next() .slideUp('slow');
              jQuery(this).removeClass('toggle-header-active');
            };
        });
    };

    // 4. Tabs
    if (jQuery('.kopa-tab-widget .kopa-tabs').length > 0) {
        Modernizr.load([{
            load: 'js/jquery-ui.js',
            complete: function () {
                jQuery(".kopa-tabs").tabs();
            }
        }]);
    }

    if (jQuery(".kopa-tabs-defaul").length > 0) {
        jQuery(".kopa-tabs-defaul").each(function(){
            var $this=jQuery(this)
            Modernizr.load([{
                load: 'js/jquery-ui.js',
                complete: function () {
                    $this.tabs();
                }
            }]);
        });
    };

    if (jQuery('.kopa-list-post-tabs-widget').length > 0) {
        Modernizr.load([{
            load: ['js/jquery-ui.js', 'js/masonry.js', 'js/imagesloaded.js'],
            complete: function () {
                var $container_ms = jQuery('.kopa-list-post-tabs-widget .masonry-content');
                $container_ms.imagesLoaded(function () {
                    $container_ms.masonry({
                        itemSelector: ".item-outer",
                        columnWidth: ".item-outer"
                    });
                });


                jQuery(".kopa-list-post-tabs-widget .kopa-tabs").tabs({
                    create: function (event, ui) {
                        jQuery(".kopa-list-post-tabs-widget .ui-tabs-panel").each(function (index) {
                            jQuery(this).find(".item-outer").each(function (index) {
                                jQuery(this).addClass('item' + index);
                            });

                        });

                        jQuery(".kopa-list-post-tabs-widget .kopa-tabs").find('.ui-tabs-nav .ui-tabs-anchor').click(function () {
                            $container_ms.masonry();
                        });
                    }
                });
            }
        }]);
    }

    // 6. Slider
    if (jQuery('.tp-banner').length > 0) {
        Modernizr.load([{
            load: ['http://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.js','libs/revolution-slider/js/jquery.themepunch.tools.min.js','libs/revolution-slider/js/jquery.themepunch.revolution.min.js'],
            complete: function () {
                jQuery('.tp-banner').show().revolution({
                    dottedOverlay:"none",
                    delay:20000,
                    startwidth:1170,
                    startheight:600,
                    hideThumbs:200,
                    thumbWidth:100,
                    thumbHeight:50,
                    thumbAmount:5,
                    navigationType:"none",
                    navigationArrows:"nexttobullets",
                    navigationStyle:"preview1",
                    touchenabled:"on",
                    onHoverStop:"off",
                    swipe_velocity: 0.7,
                    swipe_min_touches: 1,
                    swipe_max_touches: 1,
                    drag_block_vertical: false,
                    parallax:"mouse",
                    parallaxBgFreeze:"on",
                    parallaxLevels:[7,4,3,2,5,4,3,2,1,0],
                    keyboardNavigation:"off",
                    navigationHAlign:"center",
                    navigationVAlign:"bottom",
                    navigationHOffset:0,
                    navigationVOffset:20,
                    soloArrowLeftHalign:"left",
                    soloArrowLeftValign:"center",
                    soloArrowLeftHOffset:20,
                    soloArrowLeftVOffset:0,
                    soloArrowRightHalign:"right",
                    soloArrowRightValign:"center",
                    soloArrowRightHOffset:20,
                    soloArrowRightVOffset:0,
                    shadow:0,
                    fullWidth:"off",
                    fullScreen:"on",
                    spinner:"spinner4",
                    stopLoop:"off",
                    stopAfterLoops:-1,
                    stopAtSlide:-1,
                    shuffle:"off",
                    autoHeight:"off",
                    forceFullWidth:"off",
                    hideThumbsOnMobile:"off",
                    hideNavDelayOnMobile:1500,
                    hideBulletsOnMobile:"off",
                    hideArrowsOnMobile:"off",
                    hideThumbsUnderResolution:0,
                    hideSliderAtLimit:0,
                    hideCaptionAtLimit:0,
                    hideAllCaptionAtLilmit:0,
                    startWithSlide:0,
                    fullScreenOffsetContainer: ".header"
                });
            }
        }]);
    }

    // 7. Masonry
    if (jQuery('.kopa-list-posts-widget.style-2').length > 0) {
        Modernizr.load([{
            load: ['js/masonry.js', 'js/imagesloaded.js'],
            complete: function () {
                var $container_ms = jQuery('.kopa-list-posts-widget .widget-content');
                $container_ms.imagesLoaded(function () {
                    $container_ms.masonry({
                        itemSelector: ".item-outer",
                        columnWidth: ".item-outer"
                    });
                });
            }
        }]);
    }

    if (jQuery('.kopa-list-posts-masonry-widget').length > 0) {
        Modernizr.load([{
            load: ['js/masonry.js', 'js/imagesloaded.js'],
            complete: function () {
                var $container_ms = jQuery('.kopa-list-posts-masonry-widget .widget-content');
                $container_ms.imagesLoaded(function () {
                    $container_ms.masonry({
                        itemSelector: ".item-outer",
                        columnWidth: ".item-outer"
                    });
                });
            }
        }]);
    }

    // 8. Carousel
    if (jQuery('.kopa-full-width-carousel-widget .owl-carousel').length > 0) {
        Modernizr.load([{
            load: 'libs/owlcarousel/v1/owl.carousel.js',
            complete: function () {
                jQuery('.kopa-full-width-carousel-widget .owl-carousel').owlCarousel({
                    singleItem: true
                });
            }
        }]);
    }

    if (jQuery('.kopa-galler-post').length > 0) {
        Modernizr.load([{
            load: 'libs/owlcarousel/v1/owl.carousel.js',
            complete: function () {
                jQuery('.kopa-galler-post').owlCarousel({
                    singleItem: true
                });
            }
        }]);
    }

    if (jQuery('.kopa-thumb-big-carousel-widget .owl-carousel').length > 0) {
        Modernizr.load([{
            load: 'libs/owlcarousel/v1/owl.carousel.js',
            complete: function () {
                jQuery('.kopa-thumb-big-carousel-widget .owl-carousel').owlCarousel({
                    singleItem: true,
                    slideSpeed: 700,
                    navigation: true,
                    navigationText: ['<span class="fa fa-angle-left"></span>', '<span class="fa fa-angle-right"></span>']
                });
            }
        }]);
    }

    if (jQuery('.kopa-list-posts-carousel-widget').length > 0) {
        Modernizr.load([{
            load: 'libs/owlcarousel/v1/owl.carousel.js',
            complete: function () {
                jQuery('.kopa-list-posts-carousel-widget .owl-carousel').owlCarousel({
                    pagination: false,
                    items: 5,
                    itemsDesktop: [1200, 4],
                    itemsDesktopSmall: [1023, 3],
                    itemsTablet: [800, 2],
                    itemsMobile: [480, 1],
                    navigation: true,
                    slideSpeed: 700,
                    navigationText: ['<span class="fa fa-angle-left"></span>', '<span class="fa fa-angle-right"></span>']
                });
            }
        }]);
    }

    if (jQuery('.kopa-list-posts-carousel-4-widget').length > 0) {
        Modernizr.load([{
            load: 'libs/owlcarousel/v1/owl.carousel.js',
            complete: function () {
                jQuery('.kopa-list-posts-carousel-4-widget .owl-carousel').owlCarousel({
                    items: 3,
                    itemsDesktop: [1180, 3],
                    itemsDesktopSmall: [980, 3],
                    itemsTablet: [767, 2],
                    slideSpeed: 700
                });
            }
        }]);
    }

    if (jQuery('.kopa-list-posts-carousel-2-widget').length > 0) {
        Modernizr.load([{
            load: 'libs/owlcarousel/v2/owl.carousel.js?up=16102014-2',
            complete: function () {
                jQuery('.kopa-list-posts-carousel-2-widget .owl-carousel').owlCarousel({
                    nav: true,
                    navText: ['<span class="fa fa-angle-left"></span>', '<span class="fa fa-angle-right"></span>'],
                    responsiveClass:true,
                    loop: true,
                    responsive:{
                        540:{
                            items:1
                        },
                        800:{
                            items:2
                        },
                        980:{
                            items:2
                        },
                        1024:{
                            items:3
                        }
                    }
                });
            }
        }]);
    }
    if (jQuery('.kopa-list-posts-carousel-3-widget').length > 0) {
        Modernizr.load([{
            load: 'libs/owlcarousel/v1/owl.carousel.js',
            complete: function () {
                jQuery('.kopa-list-posts-carousel-3-widget .owl-carousel').owlCarousel({
                    pagination: false,
                    items: 3,
                    itemsDesktop: [1180, 3],
                    itemsDesktopSmall: [980, 3],
                    itemsTablet: [767, 2],
                    navigation: true,
                    slideSpeed: 700,
                    navigationText: ['<span class="fa fa-angle-left"></span>', '<span class="fa fa-angle-right"></span>']
                });
            }
        }]);
    }


    if (jQuery('.kopa-sync-carousel-widget').length > 0) {
        Modernizr.load([{
            load: 'libs/owlcarousel/v1/owl.carousel.js?up=16102014',
            complete: function () {
                var sync1 = jQuery(".kopa-sync-carousel-widget .sync1");
                var sync2 = jQuery(".kopa-sync-carousel-widget .sync2");

                sync1.owlCarousel({
                    items: 4,
                    singleItem: true,
                    slideSpeed: 1000,
                    afterAction: syncPosition,
                    responsiveRefreshRate: 200
                });


                sync2.owlCarousel({
                    items: 4,
                    itemsDesktop: [1199, 3],
                    itemsDesktopSmall: [979, 3],
                    itemsTablet: [768, 3],
                    itemsTabletSmall: [639, 3],
                    itemsMobile: [599, 3],
                    pagination: false,
                    responsiveRefreshRate: 100,
                    afterInit: function (el) {
                        el.find(".owl-item").eq(0).addClass("synced");
                    }
                });



                function syncPosition(el) {
                    var current = this.currentItem;
                    sync2.find(".owl-item").removeClass("synced").eq(current).addClass("synced")
                    if (sync2.data("owlCarousel") !== undefined) {
                        center(current)
                    }
                }

                sync2.on("click", ".owl-item", function (e) {
                    e.preventDefault();
                    var number = jQuery(this).data("owlItem");
                    sync1.trigger("owl.goTo", number);
                });

                function center(number) {
                    var sync2visible = sync2.data("owlCarousel").owl.visibleItems;
                    var num = number;
                    var found = false;
                    for (var i in sync2visible) {
                        if (num === sync2visible[i]) {
                            var found = true;
                        }
                    }

                    if (found === false) {
                        if (num > sync2visible[sync2visible.length - 1]) {
                            sync2.trigger("owl.goTo", num - sync2visible.length + 2)
                        } else {
                            if (num - 1 === -1) {
                                num = 0;
                            }
                            sync2.trigger("owl.goTo", num);
                        }
                    } else if (num === sync2visible[sync2visible.length - 1]) {
                        sync2.trigger("owl.goTo", sync2visible[1])
                    } else if (num === sync2visible[0]) {
                        sync2.trigger("owl.goTo", num - 1)
                    }

                }
            }
        }]);
    }

    if (jQuery('.kopa-single-gallery-widget').length > 0) {
        Modernizr.load([{
            load: 'libs/owlcarousel/v1/owl.carousel.js',
            complete: function () {
                var sync1 = jQuery(".kopa-single-gallery-widget .sync1");
                var sync2 = jQuery(".kopa-single-gallery-widget .sync2");

                sync1.owlCarousel({
                    items: 4,
                    singleItem: true,
                    pagination: false,
                    navigation: true,
                    navigationText: ['<span class="fa fa-angle-left"></span>', '<span class="fa fa-angle-right"></span>'],
                    slideSpeed: 1000,
                    afterAction: syncPosition,
                    responsiveRefreshRate: 200
                });


                sync2.owlCarousel({
                    items: 4,
                    itemsDesktop: [1199, 4],
                    itemsDesktopSmall: [979, 4],
                    itemsTablet: [768, 4],
                    itemsTabletSmall: [639, 4],
                    itemsMobile: [599, 4],
                    pagination: false,
                    responsiveRefreshRate: 100,
                    afterInit: function (el) {
                        el.find(".owl-item").eq(0).addClass("synced");
                    }
                });



                function syncPosition(el) {
                    var current = this.currentItem;
                    sync2.find(".owl-item").removeClass("synced").eq(current).addClass("synced")
                    if (sync2.data("owlCarousel") !== undefined) {
                        center(current)
                    }
                }

                sync2.on("click", ".owl-item", function (e) {
                    e.preventDefault();
                    var number = jQuery(this).data("owlItem");
                    sync1.trigger("owl.goTo", number);
                });

                function center(number) {
                    var sync2visible = sync2.data("owlCarousel").owl.visibleItems;
                    var num = number;
                    var found = false;
                    for (var i in sync2visible) {
                        if (num === sync2visible[i]) {
                            var found = true;
                        }
                    }

                    if (found === false) {
                        if (num > sync2visible[sync2visible.length - 1]) {
                            sync2.trigger("owl.goTo", num - sync2visible.length + 2)
                        } else {
                            if (num - 1 === -1) {
                                num = 0;
                            }
                            sync2.trigger("owl.goTo", num);
                        }
                    } else if (num === sync2visible[sync2visible.length - 1]) {
                        sync2.trigger("owl.goTo", sync2visible[1])
                    } else if (num === sync2visible[0]) {
                        sync2.trigger("owl.goTo", num - 1)
                    }

                }
            }
        }]);
    }
    if (jQuery('.kopa-list-item-carousel-widget').length > 0) {
        Modernizr.load([{
            load: 'libs/owlcarousel/v1/owl.carousel.js',
            complete: function () {
                jQuery('.kopa-list-item-carousel-widget .owl-carousel').owlCarousel({
                    pagination: false,
                    items: 4,
                    itemsDesktop: [1180, 4],
                    itemsDesktopSmall: [980, 3],
                    itemsTablet: [767, 2],
                    itemsMobile: [459, 1],
                    slideSpeed: 700,
                    navigation: true,
                    navigationText: ['<span class="fa fa-angle-left"></span>', '<span class="fa fa-angle-right"></span>']
                });
            }
        }]);
    }

    if (jQuery('.kopa-vertical-carousel-widget').length > 0) {
        Modernizr.load([{
            load: 'js/bxslider.js',
            complete: function () {
                var bx_slider = jQuery('.kopa-vertical-carousel-widget .bx-slider').bxSlider({
                    mode: 'vertical',
                    minSlides: 3,
                    pager: false,
                    nextText: '',
                    prevText: ''
                });
            }
        }]);
    }

    // 9. Back to top
    jQuery(".back-to-top").hide();
    jQuery(window).scroll(function () {
        if (jQuery(this).scrollTop() > 100) {
            jQuery('.back-to-top').fadeIn();
        } else {
            jQuery('.back-to-top').fadeOut();
        }
    });

    jQuery('.back-to-top').click(function (event) {
        jQuery('body,html').animate({
            scrollTop: 0
        }, 800);
        event.preventDefault();
    });

    // 10. jQuery for css
    if (jQuery(".kopa-grid-posts-widget").length > 0) {
        jQuery(".kopa-grid-posts-widget .item").each(function (index) {
            jQuery(this).addClass('item' + index);
        });
        jQuery(".kopa-grid-posts-widget .item:eq(2)").addClass("item-rtl");
    }

    if (jQuery(".kopa-list-item-carousel-widget").length > 0) {
        hover_effect();
    }


    if (jQuery(".kopa-media-widget").length > 0) {
        jQuery(".kopa-media-widget .item-post").each(function (index) {
            jQuery(this).addClass('item' + index);
        });
    }

    if (jQuery(".kopa-list-posts-masonry-widget").length > 0) {
        jQuery(".kopa-list-posts-masonry-widget .item-outer").each(function (index) {
            jQuery(this).addClass('item' + index);
        });
    }
    if (jQuery(".kopa-list-posts-2-widget").length > 0) {
        jQuery(".kopa-list-posts-2-widget .item").each(function (index) {
            jQuery(this).addClass('item' + index);
        });
        jQuery(".kopa-list-posts-2-widget").each(function (index) {
            jQuery(this).find(".item").each(function (index) {
                jQuery(this).addClass('item' + index);
            });
        });
    }
    if (jQuery(".kopa-list-post-small-thumb-widget").length > 0) {
        jQuery(".kopa-list-post-small-thumb-widget .widget-content > ul > li:even").addClass('even');
    }


    // 11. Search box
    if (jQuery('.kopa-head-line').length > 0) {
        var $search = jQuery('.kopa-search-box .search-form');
        $search.find('span').click(function () {
            $search.find("input[type='text']").stop(true).animate({
                padding: '6px 12px',
                width: '200px'
            }, 500);
            $search.stop(true).animate({
                width: '236px'
            }, 500);
            $search.find('span').css('display', 'none');
            $search.find('button').css('display', 'block');
        });
    }

    // 14.Breadking
    if (jQuery('.ticker-1').length > 0) {
        Modernizr.load([{
            load: 'js/caroufredsel.js',
            complete: function () {
                var _scroll = {
                    delay: 1000,
                    easing: 'linear',
                    items: 1,
                    duration: 0.07,
                    timeoutDuration: 0,
                    pauseOnHover: 'immediate'
                };
                jQuery('.ticker-1').carouFredSel({
                    width: 1080,
                    align: false,
                    items: {
                        width: 'variable',
                        height: 35,
                        visible: 1
                    },
                    scroll: _scroll
                });
            }
        }]);
    }
    

    // 16. Gallery widget
    if (jQuery('.kopa-gallery-widget').length > 0) {
        Modernizr.load([{
            load: 'js/imgliquid.js',
            complete: function () {
                jQuery('.kopa-gallery-widget .imgLiquid').imgLiquid();
            }
        }]);
    }

    jQuery('.kopa-alert .close').click(function(){
        jQuery('.kopa-alert .close').parent().hide();
    });

    //GALERIA DE FOTOS
    if(jQuery('#galeria').length > 0) {
        Modernizr.load([{
            load: 'libs/royalslider/jquery.royalslider.min.js',
            complete: function () {
                jQuery('#galeria').royalSlider({
                    fullscreen: {
                        enabled: true,
                        nativeFS: true
                    },
                    controlNavigation: 'thumbnails',
                    autoScaleSlider: true,
                    autoScaleSliderWidth: 960,
                    autoScaleSliderHeight: 600,
                    loop: false,
                    imageScaleMode: 'fit-if-smaller',
                    navigateByClick: true,
                    numImagesToPreload:2,
                    arrowsNav:true,
                    arrowsNavAutoHide: true,
                    arrowsNavHideOnTouch: true,
                    keyboardNavEnabled: true,
                    fadeinLoadedSlide: true,
                    globalCaption: true,
                    globalCaptionInside: false,
                    thumbs: {
                        appendSpan: true,
                        firstMargin: true,
                        paddingBottom: 4
                    }
                });
            }
        }]);

    };

    //GALERIA DE VIDEOS
    if(jQuery('#video').length>0) {
        Modernizr.load([{
            load: 'libs/bxslider/js/jquery.bxslider.js',
            complete: function () {
                jQuery('#video').bxSlider({
                    mode: 'vertical',
                    slideWidth: 450,
                    minSlides: 2,
                    slideMargin: 0,
                    pager: false,
                    infiniteLoop: false,
                    adaptiveHeight: true,
                    responsive: true
                });

            }
        }]);
    };

    //AUDIO PARA IDIOMA
    jQuery(".edicion-impresa .idiomas ul li a").on("mouseover", function(){

        var val = jQuery(this).attr("class");
        jQuery("#idioma_audio").attr("src", "audio/idioma/"+val+".mp3");

        var v = document.getElementById("idioma_audio");
        v.play();
    });

    //SELECCIONAR FOTO/GALERIA/VIDEO/AUDIO
    jQuery(document).on("ready", function(){
        jQuery("#tipo-multimedia a#noticia-foto").addClass("select");
        jQuery("#lista-multimedia li").addClass("ocultar");
        jQuery("#lista-multimedia li#noticia-foto").removeClass();

        jQuery("#tipo-multimedia a").on("click", function(){
            var valor = jQuery(this).attr("id");
            jQuery("#tipo-multimedia a").removeClass();
            jQuery(this).addClass("select");
            jQuery("#lista-multimedia li").addClass("ocultar");
            jQuery("#lista-multimedia li#"+valor).removeClass();
        });

    });

    //SELECCIONAR AUDIO SI URL ES IGUAL A #audio
    jQuery(document).on("ready", function(){
        var jash = location.hash;

        if(jash=="#audio"){
            jQuery("#tipo-multimedia a").removeClass();
            jQuery("#tipo-multimedia a#noticia-audio").addClass("select");
            jQuery("#lista-multimedia li").addClass("ocultar");
            jQuery("#lista-multimedia li#noticia-audio").removeClass();
            var autoplay = jQuery("#noticia-audio iframe").attr("src");
            autoplay = autoplay.replace("auto_play=false", "auto_play=true");
            jQuery("#noticia-audio iframe").attr("src", autoplay);
        }
    });

    //POPUP PARA FORMULARIO DE SALUDOS
    if(jQuery(".popup-with-zoom-anim").length>0) {
        Modernizr.load([{
            load: 'libs/magnific-popup/js/jquery.magnific-popup.min.js',
            complete: function() {
                jQuery('.popup-with-zoom-anim').magnificPopup({
                    type: 'inline',

                    fixedContentPos: false,
                    fixedBgPos: true,

                    overflowY: 'auto',

                    closeBtnInside: true,
                    preloader: false,

                    midClick: true,
                    removalDelay: 300,
                    mainClass: 'my-mfp-zoom-in'
                });
            }
        }]);
    }

});

// 18. Browser resize
Modernizr.load([{
    load: 'js/debouncedresize.js',
    complete: function () {
        jQuery(window).bind("debouncedresize", function () {
            hover_effect();
        });
    }
}]);


function hover_effect() {
    var window_width = jQuery(window).width();
    if (window_width > 1030) {
        jQuery('.kopa-list-item-carousel-widget .item-content').css('top', '307px');
        jQuery('.kopa-list-item-carousel-widget .item').hover(function () {
            jQuery(this).addClass('focus');
            jQuery(this).find('.item-content').stop(true).animate({
                top: '0'
            }, 500);
        }, function () {
            jQuery(this).removeClass('focus');
            jQuery(this).find('.item-content').stop(true).animate({
                top: '307px'
            }, 500);
        });
    } else if (window_width <= 1030 && window_width > 980) {
        jQuery('.kopa-list-item-carousel-widget .item-content').css('top', '250px');
        jQuery('.kopa-list-item-carousel-widget .item').hover(function () {
            jQuery(this).addClass('focus');
            jQuery(this).find('.item-content').stop(true).animate({
                top: '0'
            }, 500);
        }, function () {
            jQuery(this).removeClass('focus');
            jQuery(this).find('.item-content').stop(true).animate({
                top: '250px'
            }, 500);
        });
    } else if (window_width < 1023) {
        jQuery('.kopa-list-item-carousel-widget .item-content').css({
            top: 'auto',
            bottom: '0'
        });
        jQuery('.kopa-list-item-carousel-widget .item').hover(function () {
            jQuery(this).addClass('focus');
            jQuery(this).find('.item-content').stop(true).animate({
                top: 'auto'
            }, 500);
        }, function () {
            jQuery(this).removeClass('focus');
            jQuery(this).find('.item-content').stop(true).animate({
                top: 'auto'
            }, 500);
        });
    }
}