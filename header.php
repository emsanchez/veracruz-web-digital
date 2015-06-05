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
	<meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0" />
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

    <!-- Footer -->
    <link href="<?php bloginfo('template_url'); ?>/css/footer.css" rel="stylesheet">

	<?php wp_head(); ?>
    
    <script type="text/javascript">
		jQuery(document).ready(function($) {
        	$('li.btn-search').on('click', function(event){
				$('.tap-search').slideToggle('slow');
				event.stopPropagation();
			});    
        });
	</script>
    <script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/jRespond.min.js"></script>
    <script type="text/javascript">
        var jRes = jRespond([
            {
                label: 'less_767',
                enter: 767,
                exit: 2700
            }
        ]);
        jRes.addFunc({
            breakpoint: 'less_767',
            enter: function() {
                 //delegate calls to data-toggle="lightbox"
				$(document).delegate('*[data-toggle="lightbox"]:not([data-gallery="navigateTo"])', 'click', function(event) {
					event.preventDefault();
					return $(this).ekkoLightbox({
						onContentLoaded: function (e){
							if (window.console) {
								var category = this.options.category;
								var selector;
								if( category == 'video'){
									selector = ".lightbox-video-footer";
								}else{
									selector = ".lightbox-img-header";
									//Reajustar tamano de dialog
									var widthHeader = this.widthHeader.width();
									var dialog = $('div.ekko-lightbox .modal-dialog');
									var widthDialog = dialog.width();
									var widthNew = widthHeader + widthDialog;
									dialog.css('max-width', widthNew);
								}
							}
                            //Evento Click
                            $('.ekko-lightbox-nav-overlay').click(function (e){
                                if(e.target!= this) return;
                                $('.close').trigger('click');
                            });
						}
					});
				});
            },
            exit: function() {
                
            }
        });
		$(document).ready(function() {
			$(document).on('click touchstart','.btn-open-nav', function(event){
				$(this).stop().toggleClass('active');
				$('.content-nav-xs').stop().toggle('show');
			});
			
			$(document).on('click','.btn-open-filter', function(event){
				$(this).stop().toggleClass('active');
				var social_bar = $('.bg-texture-header');
				var open_filter = $('.open-filter');
				//$('.content-nav-xs').stop().toggle('show');
				if($(this).hasClass('active')){
					social_bar.removeClass('col-sm-8 col-md-8');
					social_bar.addClass('col-md-5 col-sm-5');
					open_filter.addClass('col-md-3 col-sm-3');
				}else{
					social_bar.removeClass('col-md-5 col-sm-5');
					social_bar.addClass('col-md-8 col-sm-8');
					open_filter.removeClass('col-md-3 col-sm-3');
				}
			});
		});
    </script>
</head>

<body <?php body_class(); ?>>
<div class="wrapper-header bg-purple">
    <div class="container-fluid sin-paddgin-sm">
        <div class="over-flow">
            <div class="col-sm-4 col-md-4 bg-purple-bold">
                <a href="/" class="logo">
                	<img src="<?php bloginfo('template_url')?>/images/logo_hd.png" class="img-full">
                </a>
                <div class="btn-open-nav hidden-sm hidden-md hidden-lg">
                	<span class="icon-nav"></span>
                </div>
                <div class="content-nav-xs hidden-sm hidden-md hidden-lg">
                    <ul class="nav-social">
                        <span class="bd-purple"></span>
                        <div class="clearfix"></div>
                        <li><a class="twitter" href="https://twitter.com/KarimeMacias" target="_blank">@KarimeMacias</a></li>
                        <li><a class="facebook" href="https://www.facebook.com/KarimeMaciasDeDuarte" target="_blank">/KarimeMaciasDeDuarte</a></li>
                        <li class="search hidden-xs">Buscar</li>
                    </ul>
                    <div class="tap-search-xs"><?php get_search_form(); ?></div>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="col-sm-8 col-md-8 bg-texture-header visible-sm visible-md visible-lg">
                <span class="btn-open-filter hidden-sm"><a class="lupa"></a></span>
                <ul class="nav-social">
                    <li><a class="twitter" href="https://twitter.com/KarimeMacias" target="_blank"></a></li>
                    <li><a class="facebook" href="https://www.facebook.com/KarimeMaciasDeDuarte" target="_blank"></a></li>
                    <li class="btn-search"><span>Buscar</span></li>
                </ul>
            </div>
            <div class="open-filter visible-md visible-lg">
            	<ul>
                	<li>Filtrar por:</li>
                	<li><a class="icon-infografia" href="?filter=infografia"></a></li>
                    <li><a class="icon-nota" href="?filter=enlaces-externos"></a></li>
                    <li><a class="icon-video" href="?filter=video"></a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="clearfix"></div>
    <div class="bg-yellow">
        <div class="container-fluid position-relative">
            <p>Por un uso responsable de <strong>internet y redes sociales</strong></p>
            <div class="tap-search"><?php get_search_form(); ?></div>
        </div>
    </div>
</div>

