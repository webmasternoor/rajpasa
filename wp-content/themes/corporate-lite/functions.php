<?php
/**
 * Corporate Lite functions and definitions
 *
 * @package Corporate Lite
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */

if ( ! function_exists( 'corporate_lite_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which runs
 * before the init hook. The init hook is too late for some features, such as indicating
 * support post thumbnails.
 */
function corporate_lite_setup() {

	if ( ! isset( $content_width ) )
		$content_width = 640; /* pixels */

	load_theme_textdomain( 'corporate-lite', get_template_directory() . '/languages' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'woocommerce' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'custom-logo', array(
		'height'      => 240,
		'width'       => 240,
		'flex-height' => true,
	) );
	add_image_size('corporate-lite-homepage-thumb',240,145,true);
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'corporate-lite' ),
		'footer'	=> __('Footer Menu', 'corporate-lite'),
	) );
	add_theme_support( 'custom-background', array(
		'default-color' => 'f1f1f1'
	) );
	add_editor_style( 'editor-style.css' );
}
endif; // corporate_lite_setup
add_action( 'after_setup_theme', 'corporate_lite_setup' );


function corporate_lite_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Blog Sidebar', 'corporate-lite' ),
		'description'   => __( 'Appears on blog page sidebar', 'corporate-lite' ),
		'id'            => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	
	register_sidebar( array(
		'name'          => __( 'Page Sidebar', 'corporate-lite' ),
		'description'   => __( 'Appears on page sidebar', 'corporate-lite' ),
		'id'            => 'sidebar-2',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'advertiseus', 'corporate-lite' ),
		'description'   => __( 'Appears on page sidebar', 'corporate-lite' ),
		'id'            => 'advertiseus',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array(
		'name'          => __( 'toprightmenu', 'corporate-lite' ),
		'description'   => __( 'Appears on page sidebar', 'corporate-lite' ),
		'id'            => 'toprightmenu',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

}
add_action( 'widgets_init', 'corporate_lite_widgets_init' );


function corporate_lite_font_url(){
		$font_url = '';
		
		/* Translators: If there are any character that are
		* not supported by PT Sans, translate this to off, do not
		* translate into your own language.
		*/
		$ptsans = _x('on', 'PT Sans font:on or off','corporate-lite');
		
		/* Translators: If there are any character that are
		* not supported by Roboto, translate this to off, do not
		* translate into your own language.
		*/
		$roboto = _x('on', 'Roboto font:on or off','corporate-lite');
		
		/* Translators: If there are any character that are
		* not supported by Roboto Condensed, translate this to off, do not
		* translate into your own language.
		*/
		$roboto_cond = _x('on', 'Roboto Condensed font:on or off','corporate-lite');
		
		if('off' !== $ptsans || 'off' !==  $roboto || 'off' !== $roboto_cond){
			$font_family = array();
			
			if('off' !== $ptsans){
				$font_family[] = 'PT Sans:300,400,600,700,800,900';
			}
			
			if('off' !== $roboto){
				$font_family[] = 'Roboto:400,700';
			}
			
			if('off' !== $roboto_cond){
				$font_family[] = 'Roboto Condensed:400,700';
			}
			
			$query_args = array(
				'family'	=> urlencode(implode('|',$font_family)),
			);
			
			$font_url = add_query_arg($query_args,'//fonts.googleapis.com/css');
		}
		
	return $font_url;
	}
	

function corporate_lite_scripts() {
	wp_enqueue_style( 'corporate-lite-font', corporate_lite_font_url(), array() );
	wp_enqueue_style( 'corporate-lite-basic-style', get_stylesheet_uri() );
	wp_enqueue_style( 'corporate-lite-editor-style', get_template_directory_uri().'/editor-style.css' );
	wp_enqueue_style( 'corporate-lite-responsive-style', get_template_directory_uri().'/css/theme-responsive.css' );
	wp_enqueue_style( 'corporate-lite-nivo-style', get_template_directory_uri().'/css/nivo-slider.css' );
	wp_enqueue_style( 'corporate-lite-nivo-gen', get_template_directory_uri().'/css/genericons/genericons.css' );
	if ( is_home() || is_front_page() ) { 
		wp_enqueue_script( 'corporate-lite-nivo-slider', get_template_directory_uri() . '/js/jquery.nivo.slider.js', array('jquery') );
	}
	wp_enqueue_script( 'corporate-lite-customscripts', get_template_directory_uri() . '/js/custom.js', array('jquery') );
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'corporate_lite_scripts' );

function corporate_lite_ie_stylesheet(){
	global $wp_styles;
	
	/** Load our IE-only stylesheet for all versions of IE.
	*   <!--[if lt IE 9]> ... <![endif]-->
	*
	*  Note: It is also possible to just check and see if the $is_IE global in WordPress is set to true before
	*  calling the wp_enqueue_style() function. If you are trying to load a stylesheet for all browsers
	*  EXCEPT for IE, then you would HAVE to check the $is_IE global since WordPress doesn't have a way to
	*  properly handle non-IE conditional comments.
	*/
	wp_enqueue_style('corporate-lite-ie', get_template_directory_uri().'/css/ie.css', array('corporate-lite-ie-style'));
	$wp_styles->add_data('corporate-lite-ie','conditional','IE');
	}
add_action('wp_enqueue_scripts','corporate_lite_ie_stylesheet');

function corporate_lite_pagination() {
	global $wp_query;
	$big = 12345678;
	$page_format = paginate_links( array(
	    'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
	    'format' => '?paged=%#%',
	    'current' => max( 1, get_query_var('paged') ),
	    'total' => $wp_query->max_num_pages,
	    'type'  => 'array'
	) );
	if( is_array($page_format) ) {
		$paged = ( get_query_var('paged') == 0 ) ? 1 : get_query_var('paged');
		echo '<div class="pagination"><div><ul>';
		echo '<li><span>'. $paged . ' of ' . $wp_query->max_num_pages .'</span></li>';
		foreach ( $page_format as $page ) {
			echo "<li>$page</li>";
		}
		echo '</ul></div></div>';
	}
}
/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';


// URL DEFINES
define('corporate_lite_pro_theme_url','http://flythemes.net/wordpress-themes/corporate-wordpress-theme/');
define('corporate_lite_theme_doc','http://flythemesdemo.net/documentation/corporate-lite-doc/');
define('corporate_lite_site_url','http://flythemes.net/');


function corporate_lite_custom_blogpost_pagination( $wp_query ){
	$big = 999999999; // need an unlikely integer
	if ( get_query_var('paged') ) { $pageVar = 'paged'; }
	elseif ( get_query_var('page') ) { $pageVar = 'page'; }
	else { $pageVar = 'paged'; }
	$pagin = paginate_links( array(
		'base' 			=> str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
		'format' 		=> '?'.$pageVar.'=%#%',
		'current' 		=> max( 1, get_query_var($pageVar) ),
		'total' 		=> $wp_query->max_num_pages,
		'prev_text'		=> '&laquo; Prev',
		'next_text' 	=> 'Next &raquo;',
		'type'  => 'array'
	) ); 
	if( is_array($pagin) ) {
		$paged = ( get_query_var('paged') == 0 ) ? 1 : get_query_var('paged');
		echo '<div class="pagination"><div><ul>';
		echo '<li><span>'. $paged . ' of ' . $wp_query->max_num_pages .'</span></li>';
		foreach ( $pagin as $page ) {
			echo "<li>$page</li>";
		}
		echo '</ul></div></div>';
	} 
}

// get slug by id
function corporate_lite_get_slug_by_id($id) {
	$post_data = get_post($id, ARRAY_A);
	$slug = $post_data['post_name'];
	return $slug; 
}

function corporate_lite_credit_link(){
		return __('Corporate Lite theme by','corporate-lite'). "<a href=".esc_url(corporate_lite_site_url)." target='_blank'> Flythemes</a>";
	}
	
add_action( 'init', 'corporate_lite_register_nav_menus' );

function corporate_lite_register_nav_menus() {
	register_nav_menu( 'social', __( 'Social', 'corporate-lite' ) );
}		