<link rel="stylesheet" type="text/css"  href="libs/smartform/css/smart-forms.css">
<link rel="stylesheet" type="text/css"  href="libs/smartform/css/font-awesome.min.css">

<script type="text/javascript" src="libs/smartform/js/jquery-1.9.1.min.js"></script>
<script type="text/javascript" src="libs/smartform/js/jquery.form.min.js"></script>
<script type="text/javascript" src="libs/smartform/js/jquery.validate.min.js"></script>
<script type="text/javascript" src="libs/smartform/js/additional-methods.min.js"></script>
<script type="text/javascript" src="libs/smartform/js/smart-form.js"></script>

<!--[if lte IE 9]>
<script type="text/javascript" src="libs/smartform/js/jquery.placeholder.min.js"></script>
<![endif]-->

<!--[if lte IE 8]>
<link type="text/css" rel="stylesheet" href="libs/smartform/css/smart-forms-ie8.css">
<![endif]-->

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

<aside class="col-lg-12 col-md-11 col-sm-11 hidden-xs">

    <div id="usuario_login">

        <div class="smart-forms">

            <div class="form-header">
                <h4><i class="fa fa-comments"></i>Envía tu saludo</h4>
            </div><!-- end .form-header section -->

            <form method="post" action="libs/smartform/php/smartprocess.php" id="smart-form">
                <div class="form-body">

                    <div class="section">
                        <label for="names" class="field-label">De:</label>
                        <label class="field prepend-icon">
                            <input type="text" name="sendername" id="sendername" class="gui-input" placeholder="Nombre...">
                            <label class="field-icon"><i class="fa fa-user"></i></label>
                        </label>
                    </div><!-- end section -->

                    <div class="section">
                        <label for="names" class="field-label">País</label>
                        <label class="field prepend-icon">
                            <input type="text" name="sendersubject" id="sendersubject" class="gui-input" placeholder="País...">
                            <label class="field-icon"><i class="fa fa-lightbulb-o"></i></label>
                        </label>
                    </div><!-- end section -->

                    <div class="section">
                        <label for="names" class="field-label">Mensaje</label>
                        <label class="field prepend-icon">
                            <textarea class="gui-textarea" id="sendermessage" name="sendermessage" placeholder="Mensaje..." onkeydown="limitText(this.form.sendermessage,this.form.countdown,100);" onkeyup="limitText(this.form.sendermessage,this.form.countdown,100);"></textarea>
                            <label class="field-icon"><i class="fa fa-comments"></i></label>
                        <span class="input-hint">
                            Caracteres permitidos
                            <strong>
                                <input name="countdown" type="text" style="border:none; background:none;" value="100" size="3" readonly id="countdown">
                            </strong>
                        </span>
                        </label>
                    </div><!-- end section -->

                    <div class="section">
                        <div class="smart-widget sm-left sml-80">
                            <label class="field prepend-icon">
                                <input type="text" name="securitycode" id="securitycode" class="gui-input" placeholder="Cual es el número?">
                                <label class="field-icon"><i class="fa fa-shield"></i></label>
                            </label>
                            <label for="securitycode" class="button">4 + 12</label>
                        </div><!-- end .smart-widget section -->
                    </div><!-- end section -->

                    <div class="result"></div><!-- end .result  section -->

                </div><!-- end .form-body section -->
                <div class="form-footer">
                    <button type="submit" class="button btn-primary">Enviar</button>
                </div><!-- end .form-footer section -->
            </form>

        </div><!-- end .smart-forms section -->

    </div><!-- FIN PANEL USUARIO LOGIN -->

</aside>