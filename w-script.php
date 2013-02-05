<!-- FONT -->
<link href='http://fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,400,600,700' rel='stylesheet' type='text/css'>

<!-- ESTILOS -->
<link rel="stylesheet" href="css/normalize.css">
<link rel="stylesheet" href="css/estilos.css">

<!-- MODERNIZR -->
<script src="js/vendor/modernizr-2.6.2.min.js"></script>

<!-- CSS FORM BUSCAR -->
<link rel="stylesheet" href="libs/search-forms/light/search-light.css" />
<!--[if lt IE 9]>
        <script src="http://ie7-js.googlecode.com/svn/version/2.1(beta4)/IE9.js"></script>
        <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
<script src="http://code.jquery.com/jquery-1.8.3.min.js"></script>
<script src="libs/search-forms/light/placeholder.js"></script>

<?php if($sc_addthis==true){ ?>
<!-- ADDTHIS -->
<script>var addthis_config = {"data_track_addressbar":true};</script>
<script src="http://s7.addthis.com/js/300/addthis_widget.js#pubid=ra-50f364066076ff63"></script>
<?php } ?>

<?php if($sc_galinferior==true){ ?>
<!-- GALERIA INFERIOR -->
<link href="libs/royalslider/royalslider/royalslider.css" rel="stylesheet">
<link href="libs/royalslider/royalslider/default/rs-default.css" rel="stylesheet">
<link href="libs/royalslider/preview-assets/css/smoothness/jquery-ui-1.8.22.custom.css" rel="stylesheet">
<link href="libs/royalslider/preview-assets/css/github.css" rel="stylesheet">
<script src="libs/royalslider/preview-assets/js/highlight.pack.js"></script>
<script src="libs/royalslider/preview-assets/js/jquery-ui-1.8.22.custom.min.js"></script>
<script> hljs.initHighlightingOnLoad(); </script>
<script src="http://code.jquery.com/jquery-1.8.3.min.js"></script>
<script src="libs/royalslider/royalslider/jquery.royalslider.min.js"></script>
<script>
var jGalHome = jQuery.noConflict();

jGalHome(document).ready(function() {
    jGalHome('#galeria-contenido').royalSlider({
        fullscreen: {
          enabled: false
        },
        controlNavigation: 'thumbnails',
        thumbs: {
          orientation: 'vertical'
        },
        transitionType:'fade',
        autoScaleSlider: true, 
        autoScaleSliderWidth: 960,     
        autoScaleSliderHeight: 520,
        loop: true,
        arrowsNav: false,
        keyboardNavEnabled: true,
        globalCaption: true,
        firstMargin: 10,
        autoPlay: {
            enabled: true,
            pauseOnHover: true,
            delay: 5000
        }
    });
});
</script>
<?php } ?>

<?php if($sc_videos==true){ ?>
<!-- VIDEOS - SECCION -->
<script src="http://code.jquery.com/jquery-1.8.3.min.js"></script>
<script src="libs/caroufredsel/jquery.carouFredSel-6.1.0-packed.js"></script>
<script>
var jVideos = jQuery.noConflict();

jVideos(document).ready(function() {
    jVideos('#video-lista').carouFredSel({
        auto: false,
        prev: '#prev-video',
        next: '#next-video',
        pagination: false,
        items: 3
    });
});
</script>
<?php } ?>

<?php if($sc_saludos==true){ ?>
<!-- SALUDOS -->
<script src="http://code.jquery.com/jquery-1.8.3.min.js"></script>
<script src="libs/bxslider/jquery.bxSlider.min.js"></script>
<script>
var jSald = jQuery.noConflict();
jSald(document).on("ready", startSaludo);

function startSaludo(){
    jSald('.wg_saludos').bxSlider({
        auto: true,
        pause: 10000,
        displaySlideQty: 4,
        moveSlideQty: 4,
        mode: 'vertical'
    });
}
</script>
<?php } ?>

<?php if($sc_slider==true){ ?>
<!-- SLIDER -->
<link rel="stylesheet" type="text/css" href="libs/revolution-slider/css/settings.css" media="screen" />
<script src="http://code.jquery.com/jquery-1.8.3.min.js"></script>
<script src="libs/revolution-slider/js/jquery.themepunch.plugins.min.js"></script>
<script src="libs/revolution-slider/js/jquery.themepunch.revolution.min.js"></script>
<script>
    var tpj=jQuery.noConflict();
    tpj(document).ready(function() {
    if (tpj.fn.cssOriginal!=undefined)
        tpj.fn.css = tpj.fn.cssOriginal;
        tpj('.fullwidthbanner').revolution(
            {
                delay:9000,
                startwidth:990,
                startheight:360,
                onHoverStop:"on",
                hideThumbs:0,
                navigationType:"bullet",
                navigationArrows:"verticalcentered",
                navigationStyle:"round",
                touchenabled:"on",
                navOffsetHorizontal:0,
                navOffsetVertical:20,
                stopAtSlide:-1,
                stopAfterLoops:-1,
                hideCaptionAtLimit:0,
                hideAllCaptionAtLilmit:0,
                hideSliderAtLimit:0,
                fullWidth:"on",
                shadow:0
            });
    });
</script>
<?php } ?>