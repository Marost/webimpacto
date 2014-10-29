var jAccWeb = jQuery.noConflict();

jAccWeb(document).on("ready", function(){

    var webAccModo = localStorage.getItem('accesibilidad');

    if(webAccModo=="true"){
        jAccWeb("#accesibilidadActivar").hide();
        jAccWeb("#accesibilidadDesactivar").show();
    }else{
        jAccWeb("#accesibilidadActivar").show();
        jAccWeb("#accesibilidadDesactivar").hide();
    }

    jAccWeb("#accesibilidadActivar").on("click", function(){
        jAccWeb(this).hide();
        jAccWeb("#accesibilidadDesactivar").show();
        localStorage.setItem("accesibilidad", "true");
    });

    jAccWeb("#accesibilidadDesactivar").on("click", function(){
        jAccWeb(this).hide();
        jAccWeb("#accesibilidadActivar").show();
        localStorage.removeItem("accesibilidad");
    });

});