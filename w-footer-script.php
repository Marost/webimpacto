<script src="js/jquery.js"></script>
<script src="js/custom.js"></script>

<?php if(isset($w_galeria)){ if($w_galeria==true){  ?>
<!-- GALERIA -->
<link href="libs/royalslider/royalslider.css" rel="stylesheet">
<link href="libs/royalslider/skins/default/rs-default.css" rel="stylesheet">
<script src="libs/royalslider/jquery-1.8.3.min.js"></script>
<script src="libs/royalslider/jquery.royalslider.min.js"></script>
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
<?php }} ?>