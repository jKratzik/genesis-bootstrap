<?php
//* Start the engine
include_once( get_template_directory() . '/lib/init.php' );

//* Child theme info
define( 'CHILD_THEME_NAME', 'Movelize' );
define( 'CHILD_THEME_URL', 'http://www.movelize.com/' );
define( 'CHILD_THEME_VERSION', '1.0.0' );

//* Include the Bootstrap markup functions
require_once( CHILD_DIR . '/lib/bootstrap/bootstrap-markup.php' );

//* Load styles
add_action( 'wp_enqueue_scripts', 'mov_enqueue_styles_scripts', 0 );
function mov_enqueue_styles_scripts() {
	
    // Bootstrap files: Theme CSS and Jabascript can optionally be included
    wp_enqueue_style( 'mov-bootstrap', CHILD_URL . '/lib/bootstrap/bootstrap.min.css', array(), '3.3.6' );
    //wp_enqueue_style( 'mov-bootstrap-theme', CHILD_URL . '/lib/bootstrap/bootstrap-theme.min.css', array(), '3.3.6' );
    //wp_enqueue_script( 'mov-bootstrap-js', CHILD_URL . '/lib/bootstrap/bootstrap.min.js', array( 'jquery' ), '3.3.6' );
	
    // Elegant icon font
    wp_enqueue_style( 'mov-elegant-font', CHILD_URL . '/lib/elegant-fonts/style.css', array(), CHILD_THEME_VERSION );
	
	// mmenu - Mobile navigation
	wp_enqueue_style( 'mov-mmenu', CHILD_URL . '/lib/mmenu/jquery.mmenu.all.css', array(), '5.5.3' );
	wp_enqueue_script( 'mov-mmenu-js', CHILD_URL . '/lib/mmenu/jquery.mmenu.min.all.js', array( 'jquery' ), '5.5.3' );
	
    // Basic theme CSS and Javascript
    wp_enqueue_style( 'mov-theme', CHILD_URL . '/lib/assets/theme.css', array(), CHILD_THEME_VERSION );
	wp_enqueue_script( 'mov-theme-js', CHILD_URL . '/lib/assets/theme.js', array( 'jquery' ), CHILD_THEME_VERSION );
	
}

//* Add HTML5 markup structure
add_theme_support( 'html5', array( 'comment-list', 'comment-form', 'search-form', 'gallery', 'caption' ) );

//* Add accessibility support
add_theme_support( 'genesis-accessibility', array( 'headings', 'drop-down-menu',  'search-form', 'skip-links', 'rems' ) );

//* Add viewport meta tag
add_theme_support( 'genesis-responsive-viewport' );

//* Add support for 3 footer widget areas
add_theme_support('genesis-footer-widgets', 3 );

//* We need to insert the footer widgets manually
add_action( 'mov_footer_widgets_output', 'mov_footer_widgets' );
function mov_footer_widgets() {
	if( is_active_sidebar( 'footer-1' ) ) {
		echo '<div class="col-md-4 col-sm-12">';
		dynamic_sidebar( 'footer-1' );
		echo '</div>';
	}
	if( is_active_sidebar( 'footer-2' ) ) {
		echo '<div class="col-md-4 col-sm-6">';
		dynamic_sidebar( 'footer-2' );
		echo '</div>';
	}
	if( is_active_sidebar( 'footer-3' ) ) {
		echo '<div class="col-md-4 col-sm-6">';
		dynamic_sidebar( 'footer-3' );
		echo '</div>';
	}
}
?>