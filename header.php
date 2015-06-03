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
    <!-- METAS COMPARTIR -->
    <meta property="og:url" content="http://www.veracruzdigital.gob.mx" />
    <meta property="og:title" content="Veracruz Digital" />
    <meta property="og:description" content="Gobierno del EStado de Veracruz" />
    <meta property="og:image" content="<?php bloginfo('template_url')?>/images/logo100X100.png" />
    
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

    <!--Addthis-->
    <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-528bc01961578d5f" async="async"></script>

    <!-- Footer -->
    <link href="<?php bloginfo('template_url'); ?>/css/footer.css" rel="stylesheet">

	<?php wp_head(); ?>
    
    <script type="text/javascript">
		jQuery(document).ready(function($) {
        	$('li.search').on('click', function(event){
				$('.tap-search').slideToggle('slow');
				event.stopPropagation();
			});    
        });
	</script>
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
            <li class="search">Buscar</li>
        </ul>
    </div>
    <div class="clearfix"></div>
    <div class="bg-yellow">
        <div class="container-fluid position-relative">
            <p>Por un uso responsable de <strong>internet y redes sociales</strong></p>
            <div class="tap-search"><?php get_search_form(); ?></div>
        </div>
    </div>
</div>

