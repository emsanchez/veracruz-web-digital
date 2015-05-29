<?php
global $themename;
add_action( 'admin_menu', 'theme_options_add_page' );

/**
 * Load up the menu page
 */
function theme_options_add_page() {
	$menu = add_menu_page( __( 'Theme Options', 'sampletheme' ), __( 'Theme Options', 'sampletheme' ), 'edit_theme_options', 'theme_options', 'theme_options_do_page' );
	add_action( 'admin_print_styles-' . $menu, 'admin_theme_style' );
	add_action( 'admin_print_scripts-' . $menu, 'admin_theme_script' );
}
function admin_theme_style(){
	wp_enqueue_style( 'style_theme_option', get_template_directory_uri().'/theme-options/style.css');
}
function admin_theme_script(){
	wp_enqueue_script( 'script_theme_boostrap', get_template_directory_uri().'/js/bootstrap.min.js');
	wp_enqueue_script( 'script_theme_functions', get_template_directory_uri().'/theme-options/js/functions.js');
	wp_enqueue_media();
}

function theme_options_do_page() {
	global $themename;
	?>
	<div class="wrap">
		<div class="col-lg-12">
			<?php echo "<h2 class='title-theme-option'>" . wp_get_theme() . __( ' (Opciones del tema)', 'sampletheme' ) . "</h2>"; ?>
        </div>
		<form class="theme_options" action="<?php echo $_SERVER['REQUEST_URI']; ?>" method="post" id="theme-options-panel">
			<?php get_template_part( 'theme-options/content', 'template' ); ?> 
        </form>
	</div>
	<?php
}

function save_theme_options(){
	global $themename;
	$general_settings = array(
		"logo-url-main"		     => $_POST["logo-url-main"],
		"text-header-title"      => $_POST["text-header-title"],
		"footter-description"  	 => $_POST["footter-description"],
		"code-google-analytics"  => $_POST["code-google-analytics"],
		"status-responsive"    	 => $_POST["status-responsive"],
		"facebook-url"     		 => $_POST["facebook-url"],
		"twitter-url"     		 => $_POST["twitter-url"],
		"youtube-url"     		 => $_POST["youtube-url"],
	);
	$slider_option = array(
		"slide-img"   => array_filter($_POST["slide-img"]),
		"slide-url"   => array_filter($_POST["slide-url"]),
		"slide-title" => array_filter($_POST["slide-title"]),
	);
	
	echo json_encode($_POST);
	update_option($themename. "_general_setting", array_merge($general_settings));
	update_option($themename . "_slider", array_merge($slider_option));
	exit();
}
add_action('wp_ajax_'.$themename.'_save', 'save_theme_options');

function theme_after_setup_theme(){
	global $themename;
	if(!get_option($themename . "_installed")){		
		
		$general_settings = array(
			"logo-url-main" => $_POST["logo-url-main"],
		);
		$slider_option = array(
			"slider1" => "Inspiration",
		);
		
		add_option($themename . "_general_setting", $general_settings);
		add_option($themename . "_slider", $slider_option);
		add_option($themename . "_installed", 1);
	}
}
add_action("after_setup_theme", "theme_after_setup_theme");

function theme_switch_theme($theme_template){
	global $themename;
	delete_option($themename . "_installed");
}
add_action("switch_theme", "theme_switch_theme");