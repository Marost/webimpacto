<!-- COMENTARIO -->
<link rel="stylesheet" href="libs/fontawesome/css/font-awesome.min.css"/>
<script type="text/javascript">
    //LIMITAR COMENTARIO
    function limitText(limitField, limitCount, limitNum) {
        if (limitField.value.length > limitNum) {
            limitField.value = limitField.value.substring(0, limitNum);
        } else {
            limitCount.value = limitNum - limitField.value.length;
        }
    }
</script>

<div id="usuario_login">

    <div id="uslogin_cabecera">
        <h2>Escribe tus saludos</h2>
    </div>

    <div id="uslogin_contenido">

        <form action="/" method="post" id="form_login" >
            <fieldset>
                <label>De:</label>
                <input name="uslogin_de" type="text" id="uslogin_de" maxlength="50" />
            </fieldset>

            <fieldset>
                <label>Pais:</label>
                <input name="uslogin_pais" type="text" id="uslogin_pais" />
            </fieldset>

            <fieldset>
                <label>Saludos:</label>
                  <span id="txt_mensaje">
                  	<textarea name="uslogin_carta" cols="80" rows="3" id="uslogin_carta" onkeydown="limitText(this.form.uslogin_carta,this.form.countdown,100);" onkeyup="limitText(this.form.uslogin_carta,this.form.countdown,100);"></textarea><br />
                  </span>
                  <span id="txt_contador">Caracteres permitidos
                      <strong>
                          <input name="countdown" type="text" style="border:none; background:none;" value="100" size="3" readonly id="countdown">
                      </strong>
                  </span>
            </fieldset>

            <fieldset>
                <input name="uslogin_btn_enviar" type="submit" id="uslogin_btn_enviar" value="Enviar saludo" />
                <input name="uslogin_proc" type="hidden" id="uslogin_proc" value="enviar" />
            </fieldset>
        </form>

    </div>
</div><!-- FIN PANEL USUARIO LOGIN -->