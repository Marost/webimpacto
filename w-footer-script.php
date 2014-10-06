<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/custom.js"></script>

<!-- FORMULARIO SALUDO -->
<script type="text/javascript" src="libs/smartform/js/jquery-1.9.1.min.js"></script>
<script type="text/javascript" src="libs/smartform/js/jquery.form.min.js"></script>
<script type="text/javascript" src="libs/smartform/js/jquery.validate.min.js"></script>
<script type="text/javascript" src="libs/smartform/js/additional-methods.min.js"></script>
<script type="text/javascript" src="libs/smartform/js/smart-form.js"></script>
<!--[if lte IE 9]><script type="text/javascript" src="libs/smartform/js/jquery.placeholder.min.js"></script><![endif]-->
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