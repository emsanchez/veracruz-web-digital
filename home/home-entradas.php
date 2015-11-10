<?php 
	wp_reset_query();
	$variablephp = string2url($_GET['filter']);
	if($variablephp==""){
		$variablephp = "noticias";
	}
	$paged          = get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1;
	$args = array(
		'category_name'    => $variablephp,
		'posts_per_page'   => 12, 
		'paged'            => $paged
	); 
	$my_query = new WP_Query($args); 
?>

<div id="content-nota" class="grid pagination-params" data-page-max="<?php echo $my_query->max_num_pages; ?>" data-page-start="<?php echo ( get_query_var('paged') > 1 ) ? get_query_var('paged') : 1; ?>" data-page-next="<?php echo next_posts( $my_query->max_num_pages, false ); ?>" data-page-item=".grid-item">
	<?php
	$contador = 0;
	while (	$my_query->have_posts() ){
		        $my_query->the_post();
		        $contador++;
		        $obtiene_destacada = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full');
		        $imagen_destacada_bk   = $obtiene_destacada[0];
 
                $imagen_destacada = get_bloginfo('template_url')."/timthumb.php?&q=100&src=".$imagen_destacada_bk."&w=244";

		        $link = get_post_meta($post->ID, 'video' , true);
		        $category = get_the_category(); 
				$category = $category[0]->cat_name;

	?>

	<div class="grid-item">
    	<div class="content-grid">
			<?php if( $category == "video" ){ ?>
            <a href="<?php echo $link; ?>" data-toggle="lightbox" class="<?php echo $category; ?>" data-title="<?php echo get_the_title(); ?>" data-media="<?php echo $link; ?>" data-permalink="<?php echo get_permalink(); ?>" data-category="<?php echo $category; ?>" data-gallery="gallery" data-excerpt="<?php echo $link; ?>">
            <?php }else if( $category == "enlaces-externos" ){ ?>
            <a target="_blank" href="http://<?php echo get_the_excerpt(); ?>" class="<?php echo $category; ?>">
            <?php }else{?>
            <a href="<?php echo $imagen_destacada_bk; ?>" data-toggle="lightbox" class="<?php echo $category; ?>" data-category="<?php echo $category; ?>" data-title="<?php echo get_the_title(); ?>" data-permalink="<?php echo get_permalink(); ?>" data-gallery="gallery" data-excerpt="http://youtu.be/" data-media="<?php echo $imagen_destacada_bk; ?>">
            <?php } ?><!-- EMPIEZA EL CONTENIDO INTERNO DE LA NOTICIA -->
                <div class="divimageshare" id="<?php echo 'imgshare'.$contador; ?>">
                    <?php if($category == "infografia"){ ?>
                        <h3 class="tituloinfo"><span>#</span>PasaLaVoz<br><span> #</span>Comparte</h3>
                        <button class="linkshare twetter" onclick="window.open('https://twitter.com/intent/tweet?text=<?php echo get_the_title(); ?>','Comparir Veracruz Digital', 'toolbar=0, status=0, width=650, height=450');">Tweet</button>
                        <button class="linkshare faceb" onclick="window.open('http://www.facebook.com/sharer.php?u=<?php echo get_permalink(); ?>','Comparir Veracruz Digital', 'toolbar=0, status=0, width=650, height=450');">Compartir</button>
                        <button class="linkshare pinte" onclick="window.open('https://www.pinterest.com/pin/create/button/?url=<?php echo $imagen_destacada; ?>','Comparir Veracruz Digital', 'toolbar=0, status=0, width=650, height=450');">Pin</button>
                        <button class="linkshare plus" onclick="window.open('https://plus.google.com/share?url=<?php echo get_permalink(); ?>','Comparir Veracruz Digital', 'toolbar=0, status=0, width=650, height=450');">Compartir</button>
                    <?php }else{ ?>
                        <h3 class="titulover"><span>#</span>PasaLaVoz <span>#</span>Comparte</h3>
                        <button class="share-btn twetter-leer" onclick="window.open('https://twitter.com/intent/tweet?text=<?php echo get_the_title(); ?>','Comparir Veracruz Digital', 'toolbar=0, status=0, width=650, height=450');"></button>
                        <button class="share-btn faceb-leer" onclick="window.open('http://www.facebook.com/sharer.php?u=<?php echo get_permalink(); ?>','Comparir Veracruz Digital', 'toolbar=0, status=0, width=650, height=450');"></button>
                        <button class="share-btn pinte-leer" onclick="window.open('https://www.pinterest.com/pin/create/button/?url=<?php echo $imagen_destacada; ?>','Comparir Veracruz Digital', 'toolbar=0, status=0, width=650, height=450');"></button>
                        <button class="share-btn plus-leer" onclick="window.open('https://plus.google.com/share?url=<?php echo get_permalink(); ?>','Comparir Veracruz Digital', 'toolbar=0, status=0, width=650, height=450');"></button>
                    <?php } ?>
                </div>
                <img class="full-img <?php if($category=="infografia"){ echo "curosr"; } ?>" src="<?php echo $imagen_destacada; ?>" alt="<?php echo the_title(); ?>">
            </a>
            <!--<button class="share" id="<?php echo "share".$contador; ?>" onClick="mostrarHover('<?php echo "imgshare".$contador; ?>','<?php echo "share".$contador; ?>')"></button>-->
            <button class="share"></button>
            <div class="container-text">
                <h3><?php echo the_title(); ?></h3>
                <?php
                    if($category=="infografia"){ $titulo="Ver infografía"; }else if($category=="video"){ $titulo="Ver video";}else{ $titulo="Leer más";}
                    if($category=="infografia"){ ?>
                        
                        <p><?php echo get_the_excerpt(); ?></p>
                    <?php } ?>		
            </div>
            <?php ?>
            <p class="leer-mas <?php echo $category; ?>">
                <?php if( $category == "video" ){ ?>
                <a href="<?php echo $link; ?>" data-toggle="lightbox" data-title="<?php echo get_the_title(); ?>" data-media="<?php echo $link; ?>" data-permalink="<?php echo get_permalink(); ?>" data-category="<?php echo $category; ?>" data-gallery="gallery" data-excerpt="<?php echo $link; ?>"><?php echo $titulo; ?></a>
                <?php }else if( $category == "enlaces-externos" ){ ?>
                <a target="_blank" href="http://<?php echo get_the_excerpt(); ?>"><?php echo $titulo; ?></a>
                <?php }else{?>
                <a href="<?php echo $imagen_destacada_bk; ?>" data-toggle="lightbox" data-category="<?php echo $category; ?>" data-title="<?php echo get_the_title(); ?>" data-permalink="<?php echo get_permalink(); ?>" data-gallery="gallery" data-excerpt="http://youtu.be/" data-media="<?php echo $imagen_destacada_bk; ?>"><?php echo $titulo; ?></a>
                <?php } ?>
            </p>
            <div class="separador"></div>
        </div>
    </div>
    <?php 
		}  //Terminar while de post dentro de BLOG
	?>
</div>
<div class="posts-loader">
    <img src="<?php bloginfo( 'template_url' ); ?>/images/loading.gif" />
</div>
<p id="back-top" style="display: block;">
	<a href="#top"><span></span></a>
</p>
<script>
	$( document ).ready(function() {
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
		
		
			/*
			var classe 		= '#'+ident;
			var classeDiv 	= '#'+btnident;
			*/
	});
	
	$( document ).on('ready', function() {
		$('#content-nota').on( 'click' , '.share', function() {
			var checkClass 	= $( this ).hasClass( "shareback" );
			if(checkClass==false){
				$( this ).addClass( "changeback" );
				$( this).addClass( "shareback" );
				$( this ).parent().find('.divimageshare').addClass( "shareback" );
				return false;
			}else{
				
				$( this ).parent().find('.divimageshare').removeClass( "shareback" );
				$( this ).removeClass( "shareback" );
				$( this ).removeClass( "changeback" );
				return false;
			}
		});
	});
	
</script>