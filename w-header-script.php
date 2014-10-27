<base href="<?php echo $web; ?>"/>

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<link href='http://fonts.googleapis.com/css?family=Oswald:400,300,700' rel='stylesheet' type='text/css'>

<link rel="stylesheet" href="libs/owlcarousel/v1/owl.carousel.css?update=<?php echo date("YmdHi") ?>" media="all">
<link rel="stylesheet" href="libs/owlcarousel/v2/owl.carousel.css?update=<?php echo date("YmdHi") ?>" media="all">
<link rel="stylesheet" href="css/jquery-ui.css?update=<?php echo date("YmdHi") ?>" media="all">
<link rel="stylesheet" href="css/reset.css?update=<?php echo date("YmdHi") ?>" media="all">

<link rel="stylesheet" href="css/superfish.css?update=<?php echo date("YmdHi") ?>" media="all">
<link rel="stylesheet" href="css/navgoco.css?update=<?php echo date("YmdHi") ?>" media="all">

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" media="all">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" media="all">

<link rel="stylesheet" href="css/style.css?update=<?php echo date("YmdHi") ?>" media="all">
<link rel="stylesheet" href="css/responsive.css?update=<?php echo date("YmdHi") ?>" media="all">
<link rel="stylesheet" href="css/responsivo.css?update=<?php echo date("YmdHi") ?>" media="all">

<?php if(isset($header)) { if($header=="home"){ ?>
<link rel="stylesheet" type="text/css" href="libs/revolution-slider/css/settings.css" media="screen" />
<?php }} ?>

<?php if(isset($w_galeria)){ if($w_galeria==true){  ?>
<!-- GALERIA DE FOTOS -->
<link href="libs/royalslider/royalslider.css?update=<?php echo date("YmdHi") ?>" rel="stylesheet">
<link href="libs/royalslider/skins/default/rs-default.css?update=<?php echo date("YmdHi") ?>" rel="stylesheet">
<?php }} ?>

<?php if(isset($w_video)){ if($w_video==true){  ?>
<!-- GALERIA DE VIDEOS -->
<link rel="stylesheet" href="libs/bxslider/css/jquery.bxslider.css?update=<?php echo date("YmdHi") ?>"/>
<?php }} ?>

<!-- POPUP -->
<link rel="stylesheet" href="libs/magnific-popup/css/magnific-popup.css?update=<?php echo date("YmdHi") ?>"/>

<!-- FORMULARIO SALUDO-->
<link rel="stylesheet" href="libs/smartform/css/smart-forms.css?update=<?php echo date("YmdHi") ?>"/>
<!--[if lte IE 8]><link type="text/css" rel="stylesheet" href="libs/smartform/css/smart-forms-ie8.css?update=<?php echo date("YmdHi") ?>"><![endif]-->

<script src="js/modernizr.custom.js"></script>