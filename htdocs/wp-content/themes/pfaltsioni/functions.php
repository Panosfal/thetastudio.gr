<?php
// HIDES WORDPRESS HEADER (ADMIN TOOLBAR)
add_filter('show_admin_bar', '__return_false');

// DEFINES PATHS FOR EASE OF USE
define("THEME_DIR_URI", get_template_directory_uri());
define("THEME_IMAGES", THEME_DIR_URI . "/assets/img");


// INITIALIZES STYLES
function pfaltsioni_enqueue_assets() {
    // Bootstrap CSS
    wp_enqueue_style('bootstrap-css', get_template_directory_uri() . '/assets/css/bootstrap.min.css', [], '5.3.0', 'all');

    // Hamburgers CSS
    wp_enqueue_style('hamburgers-css', get_template_directory_uri() . '/assets/css/hamburgers.css', array(), '1.0', 'all' );

    // FontAwesome CSS
    wp_enqueue_style('fontawesome', get_template_directory_uri() . '/assets/css/fontawesome.min.css', [], '6.0.0', 'all');

    // Theme's Main CSS
    wp_enqueue_style('theme-style', get_template_directory_uri() . '/assets/css/style.css', [], false, 'all');

    // jQuery (WordPress includes a version; ensure it's enabled)
    wp_enqueue_script('jquery');

    // GSAP JS
    wp_enqueue_script('gsap', 'https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js', array(), '3.12.2', true );

    // Bootstrap JS
    wp_enqueue_script('bootstrap-js', get_template_directory_uri() . '/assets/js/bootstrap.bundle.min.js', ['jquery'], '5.3.0', true);

    // Theme's Main JS
    wp_enqueue_script('theme-script', get_template_directory_uri() . '/assets/js/script.js', [], false, true);

    // Swiper CSS
    wp_enqueue_style('swiper-css', get_template_directory_uri() . '/assets/css/swiper-bundle.min.css', [], '10.0.0', 'all');

    // Swiper JS
    wp_enqueue_script('swiper-js', get_template_directory_uri() . '/assets/js/swiper-bundle.min.js', [], '10.0.0', true);
}
add_action('wp_enqueue_scripts', 'pfaltsioni_enqueue_assets');


// INITIALIZES MENUS
function register_menus() {
    register_nav_menus(
      array(
        'header-menu' => __( 'Header Menu' ),
        'footer-menu' => __( 'Footer Menu' )
       )
     );
   }
   add_action( 'init', 'register_menus' );