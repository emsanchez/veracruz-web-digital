<?php
	$themename = "Clear theme";
	// Load theme options
	require_once ( get_stylesheet_directory() . '/theme-options/theme-options.php' );
	
	add_theme_support( 'automatic-feed-links' );

	// Enable support for Post Thumbnails, and declare two sizes.
	add_theme_support( 'post-thumbnails' );
	
	// This theme uses wp_nav_menu() in two locations.
	register_nav_menus( array(
		'primary'   => __( 'Top primary menu', 'cleartheme' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form'
	) );

function theme_widgets_init() {

	register_sidebar( array(
		'name'          => __( 'Primary Sidebar', 'theme' ),
		'id'            => 'sidebar-1',
		'description'   => __( 'Main sidebar that appears on the left.', 'theme' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
}
add_action( 'widgets_init', 'theme_widgets_init' );
	

function my_login_logo() { ?>
    <style type="text/css">
        body.login div#login h1 a {
            background-image: url(<?php echo get_stylesheet_directory_uri(); ?>/images/logo-big.png);
            padding-bottom: 30px;
			background-size:100%;
			width: 63%;
        }
    </style>
<?php }
add_action( 'login_enqueue_scripts', 'my_login_logo' );

function change_footer_admin() {  
    echo 'theme 2015';  
}  
add_filter('admin_footer_text', 'change_footer_admin');

//Encontrar categoria
function get_cat_slug_by_id($id) {
	$cat_test = get_the_category( $id );
	$count=0;
	foreach($cat_test as $cat_index){
		if($cat_index->slug == 'infografia'){
   		return 'infografia';
   		break;
  	}else if($cat_index->slug == 'video'){
   		return 'video';
   		break;
  	}else{
   		return 'nota';
   		break;
  	}
  		$count++; 
 	}
}
function string2url($cadena) {
		$cadena = trim($cadena);
		$cadena = strtr($cadena,
	"ÀÁÂÃÄÅàáâãäåÒÓÔÕÖØòóôõöøÈÉÊËèéêëÇçÌÍÎÏìíîïÙÚÛÜùúûüÿÑñ",
	"aaaaaaaaaaaaooooooooooooeeeeeeeecciiiiiiiiuuuuuuuuynn");
		$cadena = strtr($cadena,"ABCDEFGHIJKLMNOPQRSTUVWXYZ","abcdefghijklmnopqrstuvwxyz");
		$cadena = preg_replace('#([^.a-z0-9]+)#i', '-', $cadena);
	        $cadena = preg_replace('#-{2,}#','-',$cadena);
	        $cadena = preg_replace('#-$#','',$cadena);
	        $cadena = preg_replace('#^-#','',$cadena);
		return $cadena;
	}