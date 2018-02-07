<?php

@ini_set( 'upload_max_size' , '64M' );
@ini_set( 'post_max_size', '64M');
@ini_set( 'max_execution_time', '300' );

define( 'THEME_DIRECTORY', get_stylesheet_directory() );
define( 'THEME_URI', get_stylesheet_directory_uri() );
define( 'THEME_INCLUDE', THEME_DIRECTORY . '/includes' );
define( 'THEME_IMAGES', THEME_URI . '/assets/images' );
define( 'THEME_LIBS', THEME_URI . '/assets/libs' );
define( 'THEME_CSS', THEME_URI . '/assets/css' );
define( 'THEME_JS', THEME_URI . '/assets/js' );

// Load site Styles
function enqueue_my_styles() {
    wp_enqueue_style( 'min-style', THEME_CSS . '/style.css' );
    wp_enqueue_style( 'bootstrap', THEME_CSS . '/bootstrap.min.css' );
    wp_enqueue_style( 'bootstrap-theme', THEME_CSS . '/bootstrap-theme.min.css' );
    wp_enqueue_style( 'main-style', THEME_URI . '/style.css' );
}
add_action('wp_enqueue_scripts', 'enqueue_my_styles');

// Load header Scripts
function enqueue_header_scripts() {
    wp_deregister_script('jquery');
    wp_deregister_script('jquery-ui-core');
    wp_enqueue_script( 'jquery', 'https://code.jquery.com/jquery-3.1.1.min.js');
    wp_enqueue_script( 'bootstrap', THEME_JS . '/bootstrap.min.js');
    wp_enqueue_script( 'html5-shiv', THEME_JS . '/html5.js');
}
add_action( 'wp_enqueue_scripts', 'enqueue_header_scripts' );

// Load footer Scripts
function enqueue_footer_scripts() {
    wp_enqueue_script( 'scrollto-shiv', THEME_JS . '/jquery.scrollTo.js');
    wp_enqueue_script( 'sticky-script', THEME_JS . '/sticky-kit.js');
    wp_enqueue_script( 'all-scripts', THEME_JS . '/scripts.min.js');
}
add_action( 'wp_enqueue_scripts', 'enqueue_footer_scripts' );

// Load site extended parts
include( THEME_INCLUDE . '/core/extended-cpts.php' );
include( THEME_INCLUDE . '/core/extended-taxos.php' );
foreach (glob( THEME_INCLUDE . '/cpt_files/*.php') as $filename)
 {
    include $filename;
 } 

remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'wp_generator');
remove_action('wp_head', 'feed_links', 2);
remove_action('wp_head', 'index_rel_link');
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'feed_links_extra', 3);
remove_action('wp_head', 'start_post_rel_link', 10, 0);
remove_action('wp_head', 'parent_post_rel_link', 10, 0);

// Removes Emojis
remove_action('wp_head', 'adjacent_posts_rel_link', 10, 0);
remove_action('wp_head', 'print_emoji_detection_script', 7 );
remove_action('admin_print_scripts', 'print_emoji_detection_script' );
remove_action('wp_print_styles', 'print_emoji_styles' );
remove_action('admin_print_styles', 'print_emoji_styles' );

// Enable thumbnails
add_theme_support( 'post-thumbnails' );
// add_image_size( 'gallery-feature', 176, 150);
// add_image_size( 'gallery-grid-large', 540, 540, true);
// add_image_size( 'gallery-grid-normal', 270, 270, true);
// add_image_size( 'gallery-grid', 185, 185);

// add SVG support
function cc_mime_types($mimes) {
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
}
add_filter('upload_mimes', 'cc_mime_types');

/* function category_id_class($classes) {
    global $post;
    foreach((get_the_category($post->ID)) as $category)
        $classes [] = 'cat-' . $category->cat_ID . '-id';
        return $classes;
}
add_filter('post_class', 'category_id_class');
add_filter('body_class', 'category_id_class');
*/

// navigation stuff

add_action( 'after_setup_theme', 'register_my_menu' );

function register_my_menu() {
  register_nav_menu('primary', __('main-nav', 'main-nav'));
}



/* Google Analytics 
add_action('wp_head', 'add_googleanalytics');
function add_googleanalytics() { ?>
  <script>
   add GA here
  </script>

<?php
}
*/

//add dashicons
add_action( 'wp_enqueue_scripts', 'load_dashicons_front_end' );
function load_dashicons_front_end() {
wp_enqueue_style( 'dashicons' );
}

?>
