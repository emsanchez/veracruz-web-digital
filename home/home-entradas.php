<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url')?>/css/component.css" />
<script src="<?php bloginfo('template_url')?>/js/modernizr.custom.js"></script>
<div id="container-fluid">
	<section class="grid-wrap">
		<ul class="grid swipe-right" id="grid">
			<?php  
			    global $query_string;
			    $categoriaNoticias 	= get_category_by_slug('noticias');
			    $categoriaNoticias 	= $categoriaNoticias->term_id;
			        
			    $blog_query 		= new WP_Query('cat=' . $categoriaNoticias . '&post_type=post&posts_per_page=-1&order=ASC');//
			    $contador 			= 0;
			    
			    while (	$blog_query	-> have_posts() ):
			        $contador 	= 	$contador + 1;
			        $blog_query	->	the_post();
			        $wp_query 	->	in_the_loop = true;
			        
			        $obtiene_destacada = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full');
			        $imagen_destacada   = $obtiene_destacada[0];
			?>
			<li>
				<a href="#"><img class="full-img" src="<?php echo $imagen_destacada; ?>" alt="<?php echo the_title(); ?>"></a>
				<div class="container-text">
					<h3><?php echo the_title(); ?></h3>
					<?php
						$category = get_the_category(); 
						$category = $category[0]->cat_name;
						if($category=="infografia"){ $titulo="Ver infografía"; }else if($category=="video"){ $titulo="Ver video";}else{ $titulo="Leer más";}
						if($category!="infografia"){ ?>
							<a target="_blank" href="http://<?php echo get_the_excerpt(); ?>"><?php echo the_excerpt(); ?></a>
						<?php }else{ ?>
							<p><?php echo get_the_excerpt(); ?></p>
						<?php } ?>		
				</div>
				<p class="leer-mas <?php echo $category; ?>"><?php echo $titulo; ?></p>
				<div class="separador"></div>
			</li>
			<?php 
			    endwhile;  //Terminar while de post dentro de BLOG
			    wp_reset_query();
			?>
		</ul>
	</section>
	<script src="<?php bloginfo('template_url')?>/js/masonry.pkgd.min.js"></script>
	<script src="<?php bloginfo('template_url')?>/js/imagesloaded.pkgd.min.js"></script>
	<script src="<?php bloginfo('template_url')?>/js/classie.js"></script>
	<script src="<?php bloginfo('template_url')?>/js/colorfinder-1.1.js"></script>
	<script src="<?php bloginfo('template_url')?>/js/gridScrollFx.js"></script>
	<script>
		$( document ).ready(function() {
			new GridScrollFx( document.getElementById( 'grid' ), {
				viewportFactor : 0.4
			});
		});
	</script>
</div><!-- #main-content -->