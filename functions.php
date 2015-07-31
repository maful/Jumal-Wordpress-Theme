<?php 
if ( ! isset( $content_width ) ) {
	$content_width = 960;
}

if ( ! function_exists( 'jumal_setup' ) ) :
function jumal_setup(){
	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'automatic-feed-links' );
	// This theme uses wp_nav_menu() in two locations.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu',      'jumal' ),
	) );
}
endif;
add_action( 'after_setup_theme', 'jumal_setup' );

// Register Sidebars
function custom_sidebars() {

	$args = array(
		'id'            => 'home_right',
		'name'          => __( 'Prmary Sidebar', 'text_domain' ),
		'description'   => __( 'For Primary Sidebar', 'text_domain' ),
		'before_widget' => '<div id="%1$s" class="panel widget %2$s">',
		'after_widget'  => '</div></div>',
		'before_title'  => '<div class="heading"><span class="title"><span class="mif-list"></span> ',
		'after_title'   => '</span></div><div class="content">',
	);
	register_sidebar( $args );

}

// Hook into the 'widgets_init' action
add_action( 'widgets_init', 'custom_sidebars' );

/**
 * Enqueue scripts and styles.
 *
 * @since Twenty Fifteen 1.0
 */
function jumal_scripts() {

	wp_enqueue_style( 'metro-ui', get_template_directory_uri() . '/css/metro.css', array(), '3.0.7' );
	wp_enqueue_style( 'metro-icons', get_template_directory_uri() . '/css/metro-icons.css', array(), '3.0.7' );

	// Load our main stylesheet.
	wp_enqueue_style( 'jumal-style', get_stylesheet_uri() );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

}
add_action( 'wp_enqueue_scripts', 'jumal_scripts' );

/**
 * Add featured image as background image to post navigation elements.
 *
 * @since Jumal 1.0
 *
 * @see wp_add_inline_style()
 */
function jumal_post_nav_background() {
	if ( ! is_single() ) {
		return;
	}

	$previous = ( is_attachment() ) ? get_post( get_post()->post_parent ) : get_adjacent_post( false, '', true );
	$next     = get_adjacent_post( false, '', false );
	$css      = '';

	if ( is_attachment() && 'attachment' == $previous->post_type ) {
		return;
	}

	if ( $previous &&  has_post_thumbnail( $previous->ID ) ) {
		$prevthumb = wp_get_attachment_image_src( get_post_thumbnail_id( $previous->ID ), 'post-thumbnail' );
		$css .= '
			.post-navigation .nav-previous { background-image: url(' . esc_url( $prevthumb[0] ) . '); }
			.post-navigation .nav-previous .post-title, .post-navigation .nav-previous a:hover .post-title, .post-navigation .nav-previous .meta-nav { color: #fff; }
			.post-navigation .nav-previous a:before { background-color: rgba(0, 0, 0, 0.4); }
		';
	}

	if ( $next && has_post_thumbnail( $next->ID ) ) {
		$nextthumb = wp_get_attachment_image_src( get_post_thumbnail_id( $next->ID ), 'post-thumbnail' );
		$css .= '
			.post-navigation .nav-next { background-image: url(' . esc_url( $nextthumb[0] ) . '); }
			.post-navigation .nav-next .post-title, .post-navigation .nav-next a:hover .post-title, .post-navigation .nav-next .meta-nav { color: #fff; }
			.post-navigation .nav-next a:before { background-color: rgba(0, 0, 0, 0.4); }
		';
	}

	wp_add_inline_style( 'jumal-style', $css );
}
add_action( 'wp_enqueue_scripts', 'jumal_post_nav_background' );

require get_template_directory() . '/core/template-tags.php';
?>