<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

<!-- FONT -->
<link href='http://fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,400,600,700' rel='stylesheet' type='text/css'>

<!-- ESTILOS -->
<link rel="stylesheet" href="libs/fontawesome/css/font-awesome.min.css?update=<?php echo date("YmdHi") ?>">
<link rel="stylesheet" href="libs/bootstrap/css/bootstrap.css?update=<?php echo date("YmdHi") ?>">
<link rel="stylesheet" href="css/normalize.css?update=<?php echo date("YmdHi") ?>">
<link rel="stylesheet" href="css/estilos.css?update=<?php echo date("YmdHi") ?>">
<link rel="stylesheet" href="css/responsive.css?update=<?php echo date("YmdHi") ?>">

<!-- BOOTSTRAP -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="libs/bootstrap/js/bootstrap.min.js"></script>

<!-- MODERNIZR -->
<script src="js/vendor/modernizr-2.6.2.min.js"></script>

<!-- CSS FORM BUSCAR -->
<link rel="stylesheet" href="libs/css3-form/search/light/search-light.css" />
<!--[if lt IE 9]>
        <script src="http://ie7-js.googlecode.com/svn/version/2.1(beta4)/IE9.js"></script>
        <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
<script src="http://code.jquery.com/jquery-1.8.3.min.js"></script>
<script src="libs/css3-form/search/light/placeholder.js"></script>

<?php if($sc_addthis==true){ ?>
<!-- ADDTHIS -->
<script src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-50f364066076ff63"></script>
<?php } ?>

<?php if($sc_royalslider==true){ ?>
<!-- ROYALSLIDER -->

<?php } ?>

<?php if($sc_galinferior==true){ ?>
<!-- GALERIA INFERIOR -->
<script src="libs/royalslider/jquery-1.8.3.min.js"></script>
<script src="libs/royalslider/jquery.royalslider.min.js"></script>
<link href="libs/royalslider/royalslider.css" rel="stylesheet">
<link href="libs/royalslider/skins/universal/rs-universal.css" rel="stylesheet">
<script>
var jGalHome = jQuery.noConflict();

jGalHome(document).on("ready", startGalHome);

function startGalHome(){
    jGalHome('#galeria-contenido').royalSlider({
        fullscreen: {
          enabled: true,
          nativeFS: true
        },
        controlNavigation: 'thumbnails',
        thumbs: {
          orientation: 'vertical',
          paddingBottom: 6,
          appendSpan: true
        },
        transitionType:'fade',
        autoScaleSlider: true, 
        autoScaleSliderWidth: 960,     
        autoScaleSliderHeight: 600,
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
}
</script>
<?php } ?>

<?php if($sc_galeria==true){ ?>
<!-- GALERIA INFERIOR -->
<script src="libs/royalslider/jquery-1.8.3.min.js"></script>
<script src="libs/royalslider/jquery.royalslider.min.js"></script>
<link href="libs/royalslider/royalslider.css" rel="stylesheet">
<link href="libs/royalslider/skins/default/rs-default.css" rel="stylesheet">
<script>
var jGalInf = jQuery.noConflict();

jGalInf(document).on("ready", startGalSelect);

function startGalSelect(){
    jGalInf('#galeria').royalSlider({
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
</script>
<?php } ?>

<?php if($sc_videos==true){ ?>
<!-- VIDEOS - SECCION -->
<script src="libs/royalslider/jquery-1.8.3.min.js"></script>
<script src="libs/royalslider/jquery.royalslider.min.js"></script>
<link href="libs/royalslider/royalslider.css" rel="stylesheet">
<link href="libs/royalslider/skins/default/rs-default.css" rel="stylesheet">
<script>
var jVideos = jQuery.noConflict();
jVideos(document).on("ready", startVideos);

function startVideos(){
    jVideos('#video-gallery').royalSlider({
        arrowsNav: false,
        fadeinLoadedSlide: true,
        controlNavigationSpacing: 0,
        controlNavigation: 'thumbnails',
        thumbs: {
            autoCenter: false,
            fitInViewport: true,
            orientation: 'vertical',
            spacing: 0,
            paddingBottom: 0
        },
        keyboardNavEnabled: false,
        imageScaleMode: 'fill',
        imageAlignCenter:true,
        slidesSpacing: 0,
        loop: true,
        loopRewind: true,
        numImagesToPreload: 3,
        video: {
            autoHideArrows:true,
            autoHideControlNav:false,
            autoHideBlocks: true
        }, 
        autoScaleSlider: true, 
        autoScaleSliderWidth: 960,     
        autoScaleSliderHeight: 450,
        imgWidth: 640,
        imgHeight: 360
      });
}
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
        displaySlideQty: 10,
        moveSlideQty: 4,
        mode: 'vertical'
    });
}
</script>
<?php } ?>

<?php if($sc_slider==true){ ?>
<!-- SLIDER -->
<link rel="stylesheet" type="text/css" href="libs/revolution-slider/css/settings.css" media="screen" />
<script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
<script src="libs/revolution-slider/js/jquery.themepunch.plugins.min.js"></script>
<script src="libs/revolution-slider/js/jquery.themepunch.revolution.min.js"></script>
<script>

    var revapi;
    var tpj=jQuery.noConflict();

    tpj(document).ready(function() {

           revapi = tpj('.tp-banner').revolution(
            {
                delay:13000,
                startwidth:1200,
                startheight:700,
                onHoverStop:"on",
                hideThumbs:0,
                navigationType:"none",
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

    }); //ready

</script>
<?php } ?>

<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-20229980-10', 'impactoevangelistico.net');
  ga('send', 'pageview');

</script>