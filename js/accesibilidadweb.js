var jAccWeb = jQuery.noConflict();

jAccWeb(document).on("ready", function(){

    var webAccModo = localStorage.getItem('accesibilidad');

    if(webAccModo=="true"){
        jAccWeb("#accesibilidadActivar").hide();
        jAccWeb("#accesibilidadDesactivar").show();

        ocultarWeb();
    }else{
        jAccWeb("#accesibilidadActivar").show();
        jAccWeb("#accesibilidadDesactivar").hide();

        mostrarWeb();
    }

    jAccWeb("#accesibilidadActivar").on("click", function(){
        jAccWeb(this).hide();
        jAccWeb("#accesibilidadDesactivar").show();
        localStorage.setItem("accesibilidad", "true");

        ocultarWeb();
    });

    jAccWeb("#accesibilidadDesactivar").on("click", function(){
        jAccWeb(this).hide();
        jAccWeb("#accesibilidadActivar").show();
        localStorage.removeItem("accesibilidad");

        mostrarWeb();
    });

});

function ocultarWeb(){
    jAccWeb(".tp-banner-container, " +                  //SLIDER
        "#saludos-lista," +                             //LISTA DE SALUDOS
        ".kopa-menu mobile-menu," +                     //MENU EN MOVIL
        ".kopa-header-top," +                           //LISTA DE SOCIAL MEDIA
        ".kopa-list-news-carousel-widget").addClass("ocultar");

    jAccWeb(".kopa-header-bottom").css("background", "none repeat scroll 0% 0% rgba(0, 0, 0, 0.65)");   //FONDO DE CAJA DE BUSCADOR
    jAccWeb(".kopa-home #kopa-header").css("position", "relative");
    jAccWeb(".kopa-home #kopa-header .kopa-header-middle").css("padding-top", "20px").css("height", "86px");
}

function mostrarWeb(){
    jAccWeb(".tp-banner-container," +
        "#saludos-lista," +
        ".kopa-menu mobile-menu," +
        ".kopa-header-top," +
        ".kopa-list-news-carousel-widget").removeClass("ocultar");

    jAccWeb(".kopa-header-bottom").css("background", "");
    jAccWeb(".kopa-home #kopa-header").css("position", "");
    jAccWeb(".kopa-home #kopa-header .kopa-header-middle").css("padding-top", "").css("height", "");
}