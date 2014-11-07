var jApp = jQuery.noConflict();

jApp(function(){

    jApp("#enlace").hide();
    jApp("#editarNo").hide();
    jApp("#editarSi").show();
    jApp("#configuracion").hide();

    //CUADRO DE OPCIONES
    jApp("#opciones-estilos").hide();
    jApp("#opciones-estilos-fondo").hide();

    var IdBody = jApp("body").attr("id");

    jApp("#agregar").on("click", function(){

        var randomText = Math.floor(Math.random() * 999985) + 15;

        var TextoContenido = '<div id="'+randomText+'" class="texto"><div>Texto</div><span class="opciones"><a id="'+randomText+'" class="editarSi" href="javascript:;"><i class="fa fa-pencil"></i></a><a id="'+randomText+'" class="editarNo" href="javascript:;"><i class="fa fa-pencil"></i></a><a id="'+randomText+'" class="estilosSi" href="javascript:;"><i class="fa fa-font"></i></a><a id="'+randomText+'" class="estilosNo" href="javascript:;"><i class="fa fa-font"></i></a><a id="'+randomText+'" class="fondoSi" href="javascript:;"><i class="fa fa-square"></i></a><a id="'+randomText+'" class="fondoNo" href="javascript:;"><i class="fa fa-square-o"></i></a><a id="'+randomText+'" class="eliminar" href="javascript:;"><i class="fa fa-close"></i></a><div id="'+randomText+'" class="textoTamano">16</div><div id="'+randomText+'" class="textoColor">000000</div><div id="'+randomText+'" class="textoFondoColor"></div></span></div>';

        jApp("#contenido-texto").append(TextoContenido);

        //OCULTAR BOTONES
        jApp("#"+randomText+".editarNo").hide(); //DE EDICION
        jApp("#"+randomText+".editarSi").show(); //DE EDICION
        jApp("#"+randomText+".estilosNo").hide(); //DE ESTILOS
        jApp("#"+randomText+".estilosSi").show(); //DE ESTILOS
        jApp("#"+randomText+".fondoNo").hide(); //DE FONDO
        jApp("#"+randomText+".fondoSi").show(); //DE FONDO
        jApp("#"+randomText+".textoTamano").hide(); //TAMAÑO DE TEXTO
        jApp("#"+randomText+".textoColor").hide(); //COLOR DE TEXTO
        jApp("#"+randomText+".textoFondoColor").hide(); //FONDO DE TEXTO

        //ARRASTRAR
        jApp('.texto').draggable({disabled:false});

        //EDITAR TEXTO
        jApp(".editarSi").on("click", function(){
            var id = jApp(this).attr("id");
            jApp(this).hide();
            jApp("#"+id+".editarNo").show().addClass("activado");
            jApp("div#"+id).draggable({disabled:true});
            jApp("#"+id+" div").attr("contenteditable", "true");
        });

        //NO EDITAR TEXTO
        jApp(".editarNo").on("click", function(){
            var id = jApp(this).attr("id");
            jApp(this).hide();
            jApp("#"+id+".editarSi").show();
            jApp("#editarSi").show();
            jApp("div#"+id).draggable({disabled:false});
            jApp("#"+id+" div").attr("contenteditable", "false");
        });

        //SELECCIONAR ESTILO DE LETRA
        jApp(".estilosSi").on("click", function(){
            var id = jApp(this).attr("id");
            jApp(this).hide();
            jApp("#"+id+".estilosNo").show().addClass("activado");
            jApp("#opciones-estilos").show();
            jApp("#opciones-estilos").removeClass().addClass(id);

            var textoTamano = jApp("div#"+id+".textoTamano").text();
            var textoColor = jApp("div#"+id+".textoColor").text();

            jApp("#texto-tamano-slide").slider({
                range: "min",
                value: textoTamano,
                min: 16,
                max: 120,
                slide: function( event, ui ) {
                    jApp("div#"+id+" div").css("font-size", ui.value);
                    jApp("div#"+id+".textoTamano").text(ui.value);
                    jApp("#opciones-estilos."+id+" .opciones .tamano").text(ui.value);
                }
            });

            //COLOR DE TEXTO
            jApp("#colorpicker").spectrum({
                color: "#"+textoColor,
                preferredFormat: "hex",
                showInput: true,
                move: function(cM) {
                    jApp("div#"+id+" div").css('color', cM.toHexString());
                    jApp("div#"+id+".textoColor").text(cM.toHex());
                },
                hide: function(cH){
                    jApp("div#"+id+" div").css('color', cH.toHexString());
                    jApp("div#"+id+".textoColor").text(cH.toHex());
                }
            });

        });

        //OCULTAR SELECCION DE ESTILOS
        jApp(".estilosNo").on("click", function(){
            var id = jApp(this).attr("id");
            jApp(this).hide();
            jApp("#"+id+".estilosSi").show();
            jApp("#opciones-estilos").removeClass().hide();
        });

        //SELECCIONAR FONDO
        jApp(".fondoSi").on("click", function(){
            var id = jApp(this).attr("id");
            jApp(this).hide();
            jApp("#"+id+".fondoNo").show();
            jApp("#opciones-estilos-fondo").show();
            jApp("#opciones-estilos-fondo").removeClass().addClass(id);

            jApp("div#"+id+" div").css("background", "#FFFFFF");
            jApp("div#"+id+".textoFondoColor").text("FFFFFF");
            jApp("div#"+id+" div").addClass("texto-fondo");

            //COLOR DE FONDO
            jApp("#colorpicker-fondo").spectrum({
                color: "#FFFFFF",
                preferredFormat: "hex",
                showInput: true,
                move: function(cM) {
                    jApp("div#"+id+" div").css('background', cM.toHexString());
                    jApp("div#"+id+".textoFondoColor").text(cM.toHex());
                },
                hide: function(cH){
                    jApp("div#"+id+" div").css('background', cH.toHexString());
                    jApp("div#"+id+".textoFondoColor").text(cH.toHex());
                }
            });
        });

        jApp("#cerrar").on("click", function(){
            jApp("#opciones-estilos-fondo").hide();
        });

        //OCULTAR FONDO
        jApp(".fondoNo").on("click", function(){
            var id = jApp(this).attr("id");
            jApp(this).hide();
            jApp("#"+id+".fondoSi").show();
            jApp("div#"+id+" div").removeClass("texto-fondo");
            jApp("div#"+id+".textoFondoColor").text("");
            jApp("div#"+id+" div").css('background', "none");
        });

        //ELIMINAR DIV
        jApp(".eliminar").on("click", function(){
            var id = jApp(this).attr("id");
            jApp("div#"+id).remove();
        });

    });

    jApp("#agregar-linea").on("click", function(){

        var randomLine = Math.floor(Math.random() * 999985) + 15;

        var LineContenido = '<div id="'+randomLine+'" class="line"><div></div><span class="opciones"><a id="'+randomLine+'" class="estilosSi" href="javascript:;"><i class="fa fa-font"></i></a><a id="'+randomLine+'" class="estilosNo" href="javascript:;"><i class="fa fa-font"></i></a><a id="'+randomLine+'" class="eliminar" href="javascript:;"><i class="fa fa-close"></i></a><div id="'+randomLine+'" class="textoTamano">16</div><div id="'+randomLine+'" class="textoColor">000000</div></span></div>';

        jApp("#contenido-texto").append(LineContenido);

        //ARRASTRAR
        jApp('.line').draggable({disabled:false});

        //OCULTAR BOTONES
        jApp("#"+randomLine+".estilosNo").hide(); //DE ESTILOS
        jApp("#"+randomLine+".estilosSi").show(); //DE ESTILOS
        jApp("#"+randomLine+".textoTamano").hide(); //TAMAÑO DE TEXTO
        jApp("#"+randomLine+".textoColor").hide(); //COLOR DE TEXTO

        //ELIMINAR DIV
        jApp(".eliminar").on("click", function(){
            var id = jApp(this).attr("id");
            jApp("div#"+id).remove();
        });

    });

    jApp("#datos").on("click", function(){

        jApp("#configuracion").show();

        jApp("#configuracion .cerrar").on("click", function(){

            jApp("#configuracion").hide();

        });
    });

    jApp("#transparencia").on("click", function(){
        var transp = jApp("#contenido-texto").attr("style");
        if(transp=="background: none;"){
            jApp("#contenido-texto").attr("style", "");
        }else{
            jApp("#contenido-texto").attr("style", "background: none;");
        }
    });

    jApp("#enviar").on("click", function(){

        var get = jApp("#contenido-texto").get(0);
        var cantidad = get.childElementCount;
        var json = [];

        for(var i = 0; i < cantidad; i++){
            var valor = get.childNodes[i];
            json[i]= {
                "id"        : valor.id,
                "texto"     : {
                    "texto"     : valor.firstChild.innerHTML,
                    "tamano"    : valor.childNodes[1].childNodes[7].innerHTML,
                    "color"     : valor.childNodes[1].childNodes[8].innerHTML,
                    "x"         : valor.offsetLeft,
                    "y"         : valor.offsetTop,
                    "fondo"     : valor.childNodes[1].childNodes[9].innerHTML
                },
                "division"  : {
                    "ancho"     : 160
                }
                
            };
        }

        jApp("#enlace").show();
        jApp("#enlace a").attr("href","f-editar-preview.php?id="+IdBody+"&json="+JSON.stringify(json));

    });

    jApp("#guardar").on("click", function(){

        var titulo = jApp("#titulo").val();
        var url = jApp("#url").val();

        var get = jApp("#contenido-texto").get(0);
        var cantidad = get.childElementCount;
        var json = [];

        for(var i = 0; i < cantidad; i++){
            var valor = get.childNodes[i];
            json[i]= {
                "id"        : valor.id,
                //"tipo"      : 
                "texto"     : {
                    "texto"     : valor.firstChild.innerHTML,
                    "tamano"    : valor.childNodes[1].childNodes[7].innerHTML,
                    "color"     : valor.childNodes[1].childNodes[8].innerHTML,
                    "x"         : valor.offsetLeft,
                    "y"         : valor.offsetTop,
                    "fondo"     : valor.childNodes[1].childNodes[9].innerHTML
                },
                "division"  : {
                    "ancho"     : 160
                }
                
            };
        }

        jApp.ajax({
            type: "POST",
            url: "s-editar-slide.php",
            data: {"id": IdBody, "titulo": titulo, "url": url, "contenido": JSON.stringify(json)},
            success:function(response){
                alert("Todo está "+response);
            }
        });
    });
});