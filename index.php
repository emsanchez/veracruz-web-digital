<?php get_header(); ?>
<div id="main-content">
    <div class="wrapper-slider">
    	<div class="container-fluid sin-paddgin-xs">
        	<?php get_template_part('home/home', 'slider'); ?>
        </div>
    </div>
    <div class="clearfix"></div>
    <div class="container-fluid" id="noticias">
		<?php get_template_part('home/home', 'entradas'); ?>
    </div>
    <div class="clearfix"></div>
</div><!-- #main-content -->
<?php get_footer(); ?>