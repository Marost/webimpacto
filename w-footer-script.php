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

<!-- ADDTHIS -->
<script type="text/javascript" src="http://s7.addthis.com/js/300/addthis_widget.js#pubid=ra-50f364066076ff63"></script>

<script type="text/javascript">
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
  ga('create', 'UA-20229980-10', 'impactoevangelistico.net');
  ga('send', 'pageview');
</script>