<?php 
/**
 * SKT Fitness functions and definitions
 *
 * @package SKT Fitness
 */

// Set the word limit of post content 
function fitnesslite_content($limit) {
$content = explode(' ', get_the_content(), $limit);
if (count($content)>=$limit) {
array_pop($content);
$content = implode(" ",$content).'...';
} else {
$content = implode(" ",$content);
}	
$content = preg_replace('/\[.+\]/','', $content);
$content = apply_filters('the_content', $content);
$content = str_replace(']]>', ']]&gt;', $content);
return $content;
}

/**
 * Set the content width based on the theme's design and stylesheet.
 */

if ( ! function_exists( 'fitnesslite_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which runs
 * before the init hook. The init hook is too late for some features, such as indicating
 * support post thumbnails.
 */
function fitnesslite_setup() {
	if ( ! isset( $content_width ) )
		$content_width = 640; /* pixels */

	load_theme_textdomain( 'fitness-lite', get_template_directory() . '/languages' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support('woocommerce');
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'custom-header' );
	add_theme_support( 'title-tag' );
	add_image_size('fitness-homepage-thumb',240,145,true);
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'fitness-lite' ),
	) );
	add_theme_support( 'custom-background', array(
		'default-color' => 'ffffff'
	) );
	add_editor_style( 'editor-style.css' );
} 
endif; // fitnesslite_setup
add_action( 'after_setup_theme', 'fitnesslite_setup' );


function fitnesslite_widgets_init() {	
	
	register_sidebar( array(
		'name'          => __( 'Blog Sidebar', 'fitness-lite' ),
		'description'   => __( 'Appears on blog page sidebar', 'fitness-lite' ),
		'id'            => 'sidebar-1',
		'before_widget' => '',		
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3><aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
	) );	
	
}
add_action( 'widgets_init', 'fitnesslite_widgets_init' );


function fitnesslite_font_url(){
		$font_url = '';		
		
		/* Translators: If there are any character that are not
		* supported by Oswald, trsnalate this to off, do not
		* translate into your own language.
		*/
		$roboto_condensed = _x('on','roboto_condensed:on or off','fitness-lite');
		$roboto = _x('on','roboto:on or off','fitness-lite');		
		
		/* Translators: If there has any character that are not supported 
		*  by Scada, translate this to off, do not translate
		*  into your own language.
		*/		
		
		if('off' !== $roboto_condensed || 'off' !== $roboto){
			$font_family = array();
			
			if('off' !== $roboto_condensed){
				$font_family[] = 'Roboto Condensed:300,400,600,700,800,900';
			}
			if('off' !== $roboto){
				$font_family[] = 'Roboto:300,400,600,700,800,900';
			}			
						
			$query_args = array(
				'family'	=> urlencode(implode('|',$font_family)),
			);
			
			$font_url = add_query_arg($query_args,'//fonts.googleapis.com/css');
		}
		
	return $font_url;
	}


function fitnesslite_scripts() {
	wp_enqueue_style('fitness-lite-font', fitnesslite_font_url(), array());
	wp_enqueue_style('fitness-lite-basic-style', get_stylesheet_uri() );
	wp_enqueue_style('fitness-lite-editor-style', get_template_directory_uri().'/editor-style.css' );
	wp_enqueue_style('nivoslider-style', get_template_directory_uri().'/css/nivo-slider.css' );
	wp_enqueue_style('fitness-lite-main-style', get_template_directory_uri().'/css/responsive.css' );		
	wp_enqueue_style('fitness-lite-base-style', get_template_directory_uri().'/css/style_base.css' );
	wp_enqueue_script('nivo-script', get_template_directory_uri() . '/js/jquery.nivo.slider.js', array('jquery') );
	wp_enqueue_script('fitness-lite-custom_js', get_template_directory_uri() . '/js/custom.js' );
	wp_enqueue_style('font-awesome-style', get_template_directory_uri().'/css/font-awesome.css' );
	wp_enqueue_style('animation-style', get_template_directory_uri().'/css/animation.css' );	

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'fitnesslite_scripts' );

function fitnesslite_ie_stylesheet(){
	global $wp_styles;
	
	/** Load our IE-only stylesheet for all versions of IE.
	*   <!--[if lt IE 9]> ... <![endif]-->
	*
	*  Note: It is also possible to just check and see if the $is_IE global in WordPress is set to true before
	*  calling the wp_enqueue_style() function. If you are trying to load a stylesheet for all browsers
	*  EXCEPT for IE, then you would HAVE to check the $is_IE global since WordPress doesn't have a way to
	*  properly handle non-IE conditional comments.
	*/
	wp_enqueue_style('fitness-lite-ie', get_template_directory_uri().'/css/ie.css', array('fitness-style'));
	$wp_styles->add_data('fitness-lite-ie','conditional','IE');
	}
add_action('wp_enqueue_scripts','fitnesslite_ie_stylesheet');

define('SKT_URL','http://www.sktthemes.net');
define('SKT_THEME_DOC','http://sktthemesdemo.net/documentation/skt-fitness-doc/');
define('SKT_PRO_THEME_URL','http://www.sktthemes.net/shop/skt-fitness-pro/');
define('SKT_THEME_FEATURED_SET_VIDEO_URL','https://www.youtube.com/watch?v=310YGYtGLIM');

function fitnesslite_themebytext(){
		return "Theme by <a href=".esc_url(SKT_URL)." target='_blank'>SKT Themes</a>";
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

// get slug by id
function fitnesslite_get_slug_by_id($id) {
	$post_data = get_post($id, ARRAY_A);
	$slug = $post_data['post_name'];
	return $slug; 
}