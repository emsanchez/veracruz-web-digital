<?php get_header(); ?>
<?php 
function custom_search_where($where){
	global $wpdb;
	if (is_search())
		$where .= "OR (t.name LIKE '%".get_search_query()."%' AND {$wpdb->posts}.post_status = 'publish')";
	return $where;
}
 
function custom_search_join($join){
	global $wpdb;
	if (is_search())
		$join .= "LEFT JOIN {$wpdb->term_relationships} tr ON {$wpdb->posts}.ID = tr.object_id INNER JOIN {$wpdb->term_taxonomy} tt ON tt.term_taxonomy_id=tr.term_taxonomy_id INNER JOIN {$wpdb->terms} t ON t.term_id = tt.term_id";
	return $join;
}
 
function custom_search_groupby($groupby){
	global $wpdb;
 
	$groupby_id = "{$wpdb->posts}.ID";
	if(!is_search() || strpos($groupby, $groupby_id) !== false) return $groupby;
 
 
	if(!strlen(trim($groupby))) return $groupby_id;
 
		return $groupby.", ".$groupby_id;
	}
add_filter('posts_where','custom_search_where');
add_filter('posts_join', 'custom_search_join');
add_filter('posts_groupby', 'custom_search_groupby');
?>
<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url')?>/css/component.css" />
<script src="<?php bloginfo('template_url')?>/js/modernizr.custom.js"></script>
<?php
	$sebusca = $_GET['s'];
	
	$imprimeBusca  = $sebusca;
	$porciones = explode(" ", $imprimeBusca);
	
	wp_reset_query(); 
			    global $query_string;
			    //$categoriaNoticias 	= get_category_by_slug( "'".$variablephp."'" );
			    //$categoriaNoticias 	= $categoriaNoticias->term_id;
			    $args = array(
			    	"category_name" => 	'noticias',
			    	"posts_per_page" => -1,
			    	"post_type" => "post",
			    	"s"			=> $sebusca
			    );
			    $blog_query 		= new WP_Query( $args );
			    $contador 			= 0;
			    $total_results = $blog_query->found_posts;
?>
<div class="container-fluid" id="noticias">
	<section class="grid-wrap">
		<h1 class="titulosearch">Se han encontrado <span><?php echo $total_results;?> resultados</span> de su búsqueda para <span class="ubuntu-ita">"<?php echo $porciones[0];?> ..."</span></h1>
		<div class="separador-titulo"></div>
		<div class="clearfix"></div>
		<div class="grid">
			<?php
            $contador = 0;
            while (	$blog_query->have_posts() ){
                        $blog_query->the_post();
                        $contador++;
                        $obtiene_destacada = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full');
                        $imagen_destacada   = $obtiene_destacada[0];
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
                    <a href="<?php echo $imagen_destacada; ?>" data-toggle="lightbox" class="<?php echo $category; ?>" data-category="<?php echo $category; ?>" data-title="<?php echo get_the_title(); ?>" data-permalink="<?php echo get_permalink(); ?>" data-gallery="gallery" data-excerpt="http://youtu.be/" data-media="<?php echo $imagen_destacada; ?>">
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
                    <button class="share" id="<?php echo "share".$contador; ?>" onClick="mostrarHover('<?php echo "imgshare".$contador; ?>','<?php echo "share".$contador; ?>')"></button>
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
                        <a href="<?php echo $imagen_destacada; ?>" data-toggle="lightbox" data-category="<?php echo $category; ?>" data-title="<?php echo get_the_title(); ?>" data-permalink="<?php echo get_permalink(); ?>" data-gallery="gallery" data-excerpt="http://youtu.be/" data-media="<?php echo $imagen_destacada; ?>"><?php echo $titulo; ?></a>
                        <?php } ?>
                    </p>
                    <div class="separador"></div>
                </div>
            </div>
            <?php 
                }  //Terminar while de post dentro de BLOG
            ?>
        </div>	
        <p id="back-top" style="display: block;">
            <a href="#top"><span></span></a>
        </p>
	</section>
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
</div>
<?php 
if($total_results==0 || $total_results==""){ ?>		
<style>
.wrapper-footer-ver{
	position: fixed !important;
  	bottom: 0 !important;
  	width: 100% !important;
}
</style>
<?php } get_footer(); ?>