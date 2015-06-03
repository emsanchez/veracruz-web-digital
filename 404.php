<?php
/**
 * The template for displaying 404 pages (Not Found)
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */
get_header(); ?>
<link href="<?php bloginfo('template_url'); ?>/css/404.css" rel="stylesheet">
<div id="main-content" class="not-found">
	<div class="bloque-izq col-xs-12 col-sm-6 col-md-6">
		<div class="col-xs-12 col-sm-3 col-md-3"></div>
		<div class="col-xs-12 col-sm-9 col-md-9">
			<img class="cuadro-inferior" src="<?php bloginfo('template_url')?>/images/404/cuadro-inferior.png">
			<div class="lo-sentimos">
				<img class="error-404" src="<?php bloginfo('template_url')?>/images/404/404.png">
				<img class="sentimos" src="<?php bloginfo('template_url')?>/images/404/lo-sentimos.png">
				<h3>No se encontró la página <br/>que buscabas.</h3>
				<a href="/">Página principal</a>
			</div>
			<img class="cuadro-superior" src="<?php bloginfo('template_url')?>/images/404/cuadro-superior.png">
		</div>
	</div>
	<div class="bloque-der col-xs-12 col-sm-6 col-md-6">
		<div class="col-xs-3 col-sm-3 col-md-2"></div>
		<div class="col-xs-7 col-sm-7 col-md-7">
		<a href="/" class="veracruz-digital">
			<img src="<?php bloginfo('template_url')?>/images/404/veracruz-digital.png" alt="Veracruz Digital" >
		</a>
		</div>
		<div class="col-xs-3 col-sm-3 col-md-3"></div>
	</div>
</div>
<?php get_footer(); ?>
