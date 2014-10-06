<a id="form_saludos_enlace" class="popup-with-zoom-anim"  href="#form_saludos"><i class="fa fa-comments"></i> Saludos</a>

<div id="form_saludos" class="zoom-anim-dialog mfp-hide">

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