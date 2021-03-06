<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url')?>/css/component.css" />
<link href="<?php bloginfo('template_url'); ?>/css/sidebar.css" rel="stylesheet">
<script src="<?php bloginfo('template_url')?>/js/modernizr.custom.js"></script>
<div class="sidebar-single col-md-3 col-xs-12">
	<h3 class="tituloinfo colorchange quitarborder"><span>#</span>PasaLaVoz<span></h3>
	<h3 class="tituloinfo colorchange otrosBorders"><span>#</span>Comparte</h3>
	<section class="grid-wrap">
		<ul class="grid swipe-right" id="grid" style="margin-bottom:0px;">
		<?php 
			wp_reset_query(); 
		    global $query_string;
		    $categoriaNoticias 	= get_category_by_slug('infografia');
		    $categoriaNoticias 	= $categoriaNoticias->term_id;
		   
		    $blog_query 		= new WP_Query('cat=' . $categoriaNoticias . '&post_type=post&posts_per_page=1&order=DESC');//
		    
		    $contador 			= 0;
		    
		    while (	$blog_query	-> have_posts() ):
		        $contador 	= 	$contador + 1;
		        $blog_query	->	the_post();
		        $wp_query 	->	in_the_loop = true;
		        
		        $obtiene_destacada = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full');
		        $imagen_destacada   = $obtiene_destacada[0];
		        $link = get_post_meta($post->ID, 'video' , true);
		        $category = get_the_category(); 
				$category = $category[0]->cat_name;
		?>
		<li><!-- SE COLOCA UN HREF PARA CADA TIPO DE ENTRADA VIDEO, ENLACE EXTERNO Y OTRAS -->
			<a href="<?php echo $imagen_destacada; ?>" data-toggle="lightbox" class="<?php echo $category; ?>" data-category="<?php echo $category; ?>" data-title="<?php echo get_the_title(); ?>" data-permalink="<?php echo get_permalink(); ?>" data-gallery="gallery" data-excerpt="http://youtu.be/" data-media="<?php echo $imagen_destacada; ?>">
			<!-- EMPIEZA EL CONTENIDO INTERNO DE LA NOTICIA -->
				<div class="divimageshare" id="<?php echo 'imgshare'.$contador; ?>">
					<h3 class="tituloinfo"><span>#</span>PasaLaVoz<br><span> #</span>Comparte</h3>
					<button class="linkshare twetter" onclick="window.open('https://twitter.com/intent/tweet?text=<?php echo get_the_title(); ?>','Comparir Veracruz Digital', 'toolbar=0, status=0, width=650, height=450');">Tweet</button>
					<button class="linkshare faceb" onclick="window.open('http://www.facebook.com/sharer.php?u=<?php echo get_permalink(); ?>','Comparir Veracruz Digital', 'toolbar=0, status=0, width=650, height=450');">Compartir</button>
					<button class="linkshare pinte" onclick="window.open('https://www.pinterest.com/pin/create/button/?url=<?php echo $imagen_destacada; ?>','Comparir Veracruz Digital', 'toolbar=0, status=0, width=650, height=450');">Pin</button>
					<button class="linkshare plus" onclick="window.open('https://plus.google.com/share?url=<?php echo get_permalink(); ?>','Comparir Veracruz Digital', 'toolbar=0, status=0, width=650, height=450');">Compartir</button>
				</div>
				<img class="full-img" src="<?php echo $imagen_destacada; ?>" alt="<?php echo the_title(); ?>">
			</a>
			<button class="share" id="<?php echo "share".$contador; ?>" onClick="mostrarHover('<?php echo "imgshare".$contador; ?>','<?php echo "share".$contador; ?>')"></button>
			<div class="container-text">
				<h3><?php echo the_title(); ?></h3>
				<?php $titulo="Ver infografía"; ?>
				<p><?php echo get_the_excerpt(); ?></p>	
			</div>
			<?php ?>
			<p class="leer-mas <?php echo $category; ?>">
				<a href="<?php echo $imagen_destacada; ?>" data-toggle="lightbox" data-category="<?php echo $category; ?>" data-title="<?php echo get_the_title(); ?>" data-permalink="<?php echo get_permalink(); ?>" data-gallery="gallery" data-excerpt="http://youtu.be/" data-media="<?php echo $imagen_destacada; ?>"><?php echo $titulo; ?></a>
			</p>
			<div class="new-separado" style="border:none;"></div>
		</li>
		<?php 
		    endwhile;  //Terminar while de post dentro de BLOG
		    wp_reset_query();
		?>
		<?php 
			wp_reset_query(); 
		    global $query_string;
		    $categoriaVideo = get_category_by_slug('video');
		    $categoriaVideo = $categoriaVideo->term_id;
		   
		    $blog_query 		= new WP_Query('cat=' . $categoriaVideo . '&post_type=post&posts_per_page=1&order=DESC');//
		    
		    $contador 			= 0;
		    
		    while (	$blog_query	-> have_posts() ):
		        $contador 	= 	$contador + 1;
		        $blog_query	->	the_post();
		        $wp_query 	->	in_the_loop = true;
		        
		        $obtiene_destacada = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full');
		        $imagen_destacada   = $obtiene_destacada[0];
		        $link = get_post_meta($post->ID, 'video' , true);
		        $category = get_the_category(); 
				$category = $category[0]->cat_name;
		?>
		<li><!-- SE COLOCA UN HREF PARA CADA TIPO DE ENTRADA VIDEO, ENLACE EXTERNO Y OTRAS -->
			<a href="<?php echo $link; ?>" data-toggle="lightbox" class="<?php echo $category; ?>" data-title="<?php echo get_the_title(); ?>" data-media="<?php echo $link; ?>" data-permalink="<?php echo get_permalink(); ?>" data-category="<?php echo $category; ?>" data-gallery="gallery" data-excerpt="<?php echo $link; ?>">
			<!-- EMPIEZA EL CONTENIDO INTERNO DE LA NOTICIA -->
				<div class="divimageshare" id="<?php echo 'imgshare'.$contador; ?>">
					<h3 class="titulover"><span>#</span>PasaLaVoz <span>#</span>Comparte</h3>
					<button class="share-btn twetter-leer" onclick="window.open('https://twitter.com/intent/tweet?text=<?php echo get_the_title(); ?>','Comparir Veracruz Digital', 'toolbar=0, status=0, width=650, height=450');"></button>
					<button class="share-btn faceb-leer" onclick="window.open('http://www.facebook.com/sharer.php?u=<?php echo get_permalink(); ?>','Comparir Veracruz Digital', 'toolbar=0, status=0, width=650, height=450');"></button>
					<button class="share-btn pinte-leer" onclick="window.open('https://www.pinterest.com/pin/create/button/?url=<?php echo $imagen_destacada; ?>','Comparir Veracruz Digital', 'toolbar=0, status=0, width=650, height=450');"></button>
					<button class="share-btn plus-leer" onclick="window.open('https://plus.google.com/share?url=<?php echo get_permalink(); ?>','Comparir Veracruz Digital', 'toolbar=0, status=0, width=650, height=450');"></button>
				</div>
				<img class="full-img" src="<?php echo $imagen_destacada; ?>" alt="<?php echo the_title(); ?>">
			</a>
			<button class="share" id="<?php echo "share".$contador; ?>" onClick="mostrarHover('<?php echo "imgshare".$contador; ?>','<?php echo "share".$contador; ?>')"></button>
			<div class="container-text">
				<h3><?php echo the_title(); ?></h3>
				<?php $titulo="Ver video"; ?>
				<a target="_blank" href="http://<?php echo get_the_excerpt(); ?>"><?php echo the_excerpt(); ?></a>		
			</div>
			<?php ?>
			<p class="leer-mas <?php echo $category; ?>">
				<a href="<?php echo $link; ?>" data-toggle="lightbox" data-title="<?php echo get_the_title(); ?>" data-media="<?php echo $link; ?>" data-permalink="<?php echo get_permalink(); ?>" data-category="<?php echo $category; ?>" data-gallery="gallery" data-excerpt="<?php echo $link; ?>"><?php echo $titulo; ?></a>
			</p>
			<div class="new-separado"></div>
		</li>
		<?php 
		    endwhile;  //Terminar while de post dentro de BLOG
		    wp_reset_query();
		?>
		</ul>
	</section>
	<a class="mas-contenido" href="/">Ver más contenido</a>
</div>
<div style="clear:both;"></div>
<p id="back-top" style="display: block;">
	<a href="#top"><span></span></a>
</p>
<script src="<?php bloginfo('template_url')?>/js/masonry.pkgd.min.js"></script>
<script src="<?php bloginfo('template_url')?>/js/imagesloaded.pkgd.min.js"></script>
<script src="<?php bloginfo('template_url')?>/js/classie.js"></script>
<script src="<?php bloginfo('template_url')?>/js/colorfinder-1.1.js"></script>
<script src="<?php bloginfo('template_url')?>/js/gridScrollFx.js"></script>
<script>
$(document).ready(function() {
	$( document ).ready(function() {
		new GridScrollFx( document.getElementById( 'grid' ), {
			viewportFactor : 0.2
		});
		$('.linkshare').click(function() {
			event.stopPropagation();
		  	return false;
		});
		$('.share-btn').click(function() {
			event.stopPropagation();
		  	return false;
		});
		var popup = $('#back-top');
		popup.css({ 
		    'top': '-'+ ($(window).height() * 2 - $(popup).height() / 2) + 'px'
		});
		 // hide #back-top first
	    $("#back-top").hide();
	    // fade in #back-top
	    $(function () {
	        $(window).scroll(function () {
	            if ($(this).scrollTop() > 100) {
	                $('#back-top').fadeIn();
	            } else {
	                $('#back-top').fadeOut();
	            }
	        });
	 
	        // scroll body to 0px on click
	        $('#back-top a').click(function () {
	            $('body,html').animate({
	                scrollTop: 0
	            }, 800);
	            return false;
	        });
	    });
	});
});
	function mostrarHover(ident,btnident){
		var classe 		= '#'+ident;
		var classeDiv 	= '#'+btnident;
		var checkClass 	= $( classe ).hasClass( "shareback" );
		if(checkClass==false){
			$( classe ).addClass( "shareback" );
			$( classeDiv ).addClass( "changeback" );
			return false;
		}else{
			$( classe ).removeClass( "shareback" );
			$( classeDiv ).removeClass( "changeback" );
			return false;
		}
	}
</script>