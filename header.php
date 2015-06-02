<!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) | !(IE 8) ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width">
	<title><?php wp_title( '|', true, 'right' ); ?></title>
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
    <link rel="icon" type="image/png" href="<?php bloginfo('template_url'); ?>/favicon.png" />
	<!--[if lt IE 9]>
	<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js"></script>
	<![endif]-->
    
    <link rel="stylesheet" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
    
    <script src="<?php bloginfo('template_url'); ?>/js/jquery.min.js"></script>
  	
    <!-- Bootstrap -->
    <link href="<?php bloginfo('template_url'); ?>/css/bootstrap.min.3.3.4.css" rel="stylesheet">
    <script src="<?php bloginfo('template_url'); ?>/js/bootstrap.min.3.3.4.js"></script>
	<!-- End Bootstrap -->

    <!-- Responsive -->
    <script src="<?php bloginfo('template_url')?>/picturefill-master/picturefill.js"></script>
    <!-- End Responsive -->
    
    <!--cycle-->
    <script src="<?php bloginfo('template_url'); ?>/js/jquery.cycle2.js"></script>
    <!--End cycle-->

    <!--lightbox-->
    <link href="<?php bloginfo('template_url'); ?>/css/ekko-lightbox.css" rel="stylesheet">
    <script src="<?php bloginfo('template_url'); ?>/js/ekko-lightbox.js"></script>
    <!--End lightbox-->
<<<<<<< HEAD
    <!-- METAS COMPARTIR -->
    <meta property="og:url" content="http://www.veracruzdigital.gob.mx" />
    <meta property="og:title" content="Veracruz Digital" />
    <meta property="og:description" content="Gobierno del EStado de Veracruz" />
    <meta property="og:image" content="<?php bloginfo('template_url')?>/images/logo100X100.png" />
=======

    <!--Addthis-->
    <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-528bc01961578d5f" async="async"></script>

>>>>>>> 26f72a46d51eab0338a9c88355e2b27be150ce7e
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div class="wrapper-header bg-purple">
	<div class="col-md-4 bg-purple-bold">
        <img src="<?php bloginfo('template_url')?>/images/logo.png">
    </div>
    <div class="col-md-7">
        <ul class="nav-social">
            <li class="twitter"><a href="#">@KarimeMacias</a></li>
            <li class="facebook"><a href="#">/KarimeMaciasDeDuarte</a></li>
        </ul>
    </div>
    <div class="clearfix"></div>
    <div class="bg-yellow">
        <div class="container-fluid">
            <p>Por un uso responsable de internet y redes sociales</p>
        </div>
    </div>
</div>

