<?php
/**
 * Andorra functions and definitions
 *
 * @package Andorra
 *
 *
 */
	
/**
 * Loads theme setup functions.
 */
function andorra_setup() {

	/**
 	* Sets up the content width.
 	*/
	global $content_width;
	if ( ! isset( $content_width ) ) { $content_width = 1600; }
	
	/** 
	 * Makes theme available for translation
	 * 
	 */
	load_theme_textdomain( 'andorra', get_template_directory() . '/languages' );

	/** 
 	* This theme styles the visual editor with editor-style.css to match the theme style.
 	*/
	add_editor_style( array( 'css/editor-style.css' ));

	/** 
 	 * Default RSS feed links
	 */
	add_theme_support('automatic-feed-links');
	
	/**
	 * Let WordPress manage the document title.
	 */
	add_theme_support( 'title-tag' );

	/**
 	* Register Navigation
 	*/
	register_nav_menu('main_navigation', __('Primary Menu', 'andorra') );

	/** 
 	* Support a variety of post formats.
 	*/
	add_theme_support( 'post-formats', array( 'aside', 'image', 'video', 'audio', 'gallery' ) );

	/** 
 	* Custom image size for featured images, displayed on "standard" posts.
 	*/
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 1600, 9999 );
	
	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption',
	) );
	
	/**
 	* Sets up theme custom background.
 	*/
	$andorra_color_args = array(
	'default-color' => '312450',
	'default-image' =>  get_template_directory_uri() . '/images/assets/bg.jpg',
	);
	add_theme_support( 'custom-background', $andorra_color_args );
	
	/*
	* Enable support for custom logo.
	*/
	add_theme_support( 'custom-logo' );
	
	/**
	* Sets up theme custom header image.
	*/
	add_theme_support( 'custom-header', apply_filters( 'andorra_custom_header_args', array(
		'width'                  => 1920,
		'height'                 => 200,
		'flex-height'            => true,
		'header-text'            => false,
	) ) );

	/**
	* Indicate widget sidebars can use selective refresh in the Customizer.
	*/	
	add_theme_support( 'customize-selective-refresh-widgets' );
}

add_action( 'after_setup_theme', 'andorra_setup' );

/** 
 * Add scripts function
 */
function andorra_add_script_function() {
	/** 
	* Enqueue css
	*/
	$andorra_theme_options = andorra_get_options( 'andorra_theme_options' );
	wp_enqueue_style ('bootstrap', get_template_directory_uri() . '/css/bootstrap.css');
	wp_enqueue_style('andorra',  get_stylesheet_uri());
	if ($andorra_theme_options['animation'] == '1'):
		wp_enqueue_style ('animate', get_template_directory_uri() . '/css/animate.css');
	endif;
	if ($andorra_theme_options['responsive_design'] == '1'):
		wp_enqueue_style ('responsive', get_template_directory_uri() . '/css/responsive.css');
	endif;
	wp_enqueue_style ('font-awesome', get_template_directory_uri() . '/css/font-awesome.css');
	if( $andorra_theme_options['google_font_body'] !=""):
		wp_enqueue_style ('andorra-body-font', '//fonts.googleapis.com/css?family='. urlencode($andorra_theme_options['google_font_body']) .':400,400italic,700,700italic&subset=latin,greek-ext,cyrillic,latin-ext,greek,cyrillic-ext,vietnamese');
	endif;
	if( $andorra_theme_options['google_font_menu'] != ""):
		wp_enqueue_style ('andorra-menu-font', '//fonts.googleapis.com/css?family='. urlencode($andorra_theme_options['google_font_menu']) .':400,400italic,700,700italic&subset=latin,greek-ext,cyrillic,latin-ext,greek,cyrillic-ext,vietnamese');
	endif;
	if( $andorra_theme_options['google_font_logo'] != ""):
		wp_enqueue_style ('andorra-logo-font', '//fonts.googleapis.com/css?family='. urlencode($andorra_theme_options['google_font_logo']) .':400,400italic,700,700italic&subset=latin,greek-ext,cyrillic,latin-ext,greek,cyrillic-ext,vietnamese');
	endif;

	/** 
	 * Enqueue javascripts
	 */
	wp_enqueue_script('bootstrap', get_template_directory_uri() . '/js/bootstrap.js', array( 'jquery' ),'', false);
	wp_enqueue_script('jquery-smartmenus', get_template_directory_uri() . '/js/jquery.smartmenus.js', array( 'jquery' ),'', false);
	wp_enqueue_script('smartmenus-bootstrap', get_template_directory_uri() . '/js/jquery.smartmenus.bootstrap.js', array( 'jquery' ),'', false);	
	wp_enqueue_script('andorra-custom', get_template_directory_uri() . '/js/andorra-custom.js', array( 'jquery' ),'', true);	
	wp_enqueue_script('imgLiquid', get_template_directory_uri() . '/js/imgLiquid.js', array( 'jquery' ),'', false);
	wp_enqueue_script('modernizr', get_template_directory_uri() . '/js/modernizr.js', array( 'jquery' ),'', false);
	wp_enqueue_script( 'unslider', get_template_directory_uri() . '/js/unslider.js', array( 'jquery' ),'', true);
	wp_enqueue_script( 'flexslider', get_template_directory_uri() . '/js/jquery.flexslider.js', array( 'jquery' ),'', true);
	
	if ( $andorra_theme_options['menu_sticky'] == 1) {
		wp_enqueue_script('stickUp', get_template_directory_uri() . '/js/stickUp.js', array( 'jquery' ),'', false);
		wp_enqueue_script('andorra-sticky', get_template_directory_uri() . '/js/andorra-sticky.js', array( 'jquery' ),'', false);
	}
	if ( $andorra_theme_options['scrollup'] == 1) { 
		wp_enqueue_script('andorra-scroll-on', get_template_directory_uri() . '/js/andorra-scrollup.js', array( 'jquery' ),'', true); 
	}
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
	if ( $andorra_theme_options['animation'] == '1') { 
		wp_enqueue_script('wow', get_template_directory_uri() . '/js/wow.js', array(),'', false);
		wp_enqueue_script('andorra-animation', get_template_directory_uri() . '/js/andorra-animation.js', array(),'', true); 
	}
	wp_enqueue_script( 'andorra-html5', get_template_directory_uri() . '/js/html5.js', array(), '' );
	wp_script_add_data( 'andorra-html5', 'conditional', 'lt IE 9' );
}

add_action('wp_enqueue_scripts','andorra_add_script_function');

/** 
 * Register widgetized locations
 */
function andorra_widgets_init() {
	register_sidebar(array(
		'name' => __( 'Main Sidebar', 'andorra' ),
		'id' => 'main-sidebar',
		'before_widget' => '<div id="%1$s" class="widget wow fadeIn %2$s" data-wow-delay="0.5s">',
		'after_widget' => '</div>',
		'before_title' => '<div class="widget-title clearfix"><h4><span>',
		'after_title' => '</span></h4><div class="widget-separator-holder clearfix"><div class="widget-separator"></div></div></div>',
	));

	register_sidebar(array(
		'name' =>  __( 'Footer Widget 1', 'andorra' ),
		'id' => 'footer-widget-1',
		'before_widget' => '<div id="%1$s" class="footer-widget-col %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4>',
		'after_title' => '</h4>',
	));

	register_sidebar(array(
		'name' => __( 'Footer Widget 2', 'andorra' ),
		'id' => 'footer-widget-2',
		'before_widget' => '<div id="%1$s" class="footer-widget-col %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4>',
		'after_title' => '</h4>',
	));

	register_sidebar(array(
		'name' => __( 'Footer Widget 3', 'andorra' ),
		'id' => 'footer-widget-3',
		'before_widget' => '<div id="%1$s" class="footer-widget-col %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4>',
		'after_title' => '</h4>',
	));

}

add_action( 'widgets_init', 'andorra_widgets_init' );

/** 
 * Function to display image slider in gallery post formats.
*/
function andorra_gallery_post() { 
	global $post;
	?>
	<div class="flexslider">
		<ul class="slides">	
		<?php
			//Pull gallery images from custom meta
			$gallery_image = get_post_gallery_images( $post );
			if($gallery_image !=  ''){
				foreach ($gallery_image as $arr){
					echo '<li><img src="'.esc_url($arr).'" alt="'.esc_attr($arr).'" /></li>';
				}
			}
		?>		
		</ul>
	</div>	
	<?php wp_enqueue_script('andorra-gallery-slides', get_template_directory_uri() . '/js/andorra-gallery-slides.js', array( 'jquery' ),'', true);
}

/** 
 * Function to add ScrollUp to the footer.
*/
function andorra_add_scrollup() { 
	$andorra_theme_options = andorra_get_options( 'andorra_theme_options' );
	if ( $andorra_theme_options['scrollup'] == 1) { 
		echo '<a href="#" class="back-to-top"><i class="fa fa-arrow-circle-up"></i></a>'."\n";
	}
}

add_action('wp_footer', 'andorra_add_scrollup');

/** 
 * Load function to change excerpt length
 * 
 */
function andorra_excerpt_length( $length ) {
	$andorra_theme_options = andorra_get_options( 'andorra_theme_options' );	
	if($andorra_theme_options['blog_excerpt'] !="") {
		$excrpt = $andorra_theme_options['blog_excerpt'];
		return $excrpt;
	} else {
		$excrpt = '50';
		return $excrpt;
	}
}
add_filter('excerpt_length', 'andorra_excerpt_length', 999);

/** 
 * Function for displaying image attachments.
 * 
 */
function andorra_the_attached_image() {
	$post = get_post();
	$attachment_size = apply_filters( 'andorra_attachment_size', array( 1024, 1024 ) );
	$next_attachment_url = wp_get_attachment_url();
	$attachment_ids = get_posts( array(
		'post_parent'    => $post->post_parent,
		'fields'         => 'ids',
		'numberposts'    => -1,
		'post_status'    => 'inherit',
		'post_type'      => 'attachment',
		'post_mime_type' => 'image',
		'order'          => 'ASC',
		'orderby'        => 'menu_order ID',
	) );

	// If there is more than 1 attachment in a gallery...
	if ( count( $attachment_ids ) > 1 ) {
		foreach ( $attachment_ids as $attachment_id ) {
			if ( $attachment_id == $post->ID ) {
				$next_id = current( $attachment_ids );
				break;
			}
		}

		// get the URL of the next image attachment...
		if ( $next_id ) {
			$next_attachment_url = get_attachment_link( $next_id );
		}

		// or get the URL of the first image attachment.
		else {
			$next_attachment_url = get_attachment_link( array_shift( $attachment_ids ) );
		}
	}

	printf( '<a href="%1$s" rel="attachment">%2$s</a>',
		esc_url( $next_attachment_url ),
		wp_get_attachment_image( $post->ID, $attachment_size )
	);
}

/** 
 * Function for displaying custom logo.
 * 
 */
if ( ! function_exists( 'andorra_the_custom_logo' ) ) :
function andorra_the_custom_logo() {
	if ( function_exists( 'the_custom_logo' ) ) {
		the_custom_logo();
	}
}
endif;

add_action( 'init', 'andorra_register_social_menu' );

/** 
 * Function to add social menu.
 * 
 */
function andorra_register_social_menu() {
	register_nav_menu( 'social', __( 'Social', 'andorra' ) );
}