<?php if (!defined('ABSPATH')) { exit; }

function bootstrap_v5_setup() {

    load_theme_textdomain( 'bootstrap_v5' );

    add_theme_support( 'automatic-feed-links' );
    add_theme_support( 'title-tag' );
    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'custom-logo', [
        'height'      => 220,
        'width'       => 400,
        'flex-height' => true,
        'flex-width'  => true,
        'header-text' => [
            'site-title',
            'site-description'
        ],
    ]);

    register_nav_menus([
        'primary' => __( 'Primary Menu', 'bootstrap_v5' ),
        'meta' => __( 'Meta Menu', 'bootstrap_v5' ),
        'contact' => __( 'Contact Menu', 'bootstrap_v5' ),
    ]);

    add_theme_support( 'html5', [
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
        'style',
        'script'
    ]);

    add_theme_support(
        'post-formats', [
            'aside',
            'image',
            'video',
            'quote',
            'link',
            'gallery',
            'status',
            'audio',
            'chat',
        ]
    );


    add_theme_support( 'customize-selective-refresh-widgets' );
    add_theme_support( 'custom-header' );
    add_theme_support( 'post-thumbnails' );
    set_post_thumbnail_size( 1200, 9999 );

    // Add support for responsive embeds.
    add_theme_support( 'responsive-embeds' );

}
add_action( 'after_setup_theme', 'bootstrap_v5_setup' );

function bootstrap_v5_replace_core_jquery_version() {
    wp_deregister_script( 'jquery' );
    wp_register_script( 'jquery', get_template_directory_uri() . '/assets/js/libs/jquery.min.js', [], '3.7.1' );
}
add_action( 'wp_enqueue_scripts', 'bootstrap_v5_replace_core_jquery_version' );

function bootstrap_v5_scripts() {
    wp_enqueue_style( 'bootstrap_v5-style', get_stylesheet_uri() );
    wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/assets/css/libs/bootstrap.min.css', ['bootstrap_v5-style'], '5.3.1' );
    wp_enqueue_style( 'fonts', get_template_directory_uri() . '/assets/css/fonts.css', ['bootstrap_v5-style'], '1.0.0' );
    wp_enqueue_style( 'main', get_template_directory_uri() . '/assets/css/main.css', ['bootstrap_v5-style'], '1.0.0' );
    wp_enqueue_style( 'menu', get_template_directory_uri() . '/assets/css/menu.css', ['bootstrap_v5-style'], '1.0.0' );
    wp_enqueue_style( 'bootstrap-icons', get_template_directory_uri() . '/assets/css/libs/bootstrap-icons.min.css', ['bootstrap_v5-style'], '1.10.5' );

    wp_enqueue_script( 'bootstrap-bundle', get_template_directory_uri() . '/assets/js/libs/bootstrap.bundle.min.js', ['jquery'], '5.3.1', true );
    wp_enqueue_script( 'custom', get_template_directory_uri() . '/assets/js/custom.js', ['jquery'], '1.0.0', true );
}
add_action( 'wp_enqueue_scripts', 'bootstrap_v5_scripts' );

/*
 * Widget Funktion in Wordpress aktivieren.
 */
function bootstrap_v5_widgets_init()
{
    register_sidebar([
        'name' => __('Sidebar', 'bootstrap_v5'),
        'id' => 'custom-sidebar',
        'before_widget' => '<aside id="%1$s" class="sidebar-widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ]);
}
add_action( 'widgets_init', 'bootstrap_v5_widgets_init' );

function add_menu_list_item_class($classes, $item, $args) {
    if (property_exists($args, 'list_item_class')) {
        $classes[] = $args->list_item_class;
    }
    return $classes;
}
add_filter('nav_menu_css_class', 'add_menu_list_item_class', 1, 3);

function add_menu_link_class( $atts, $item, $args ) {
    if( property_exists($args, 'link_class') ) {
        $atts['class'] = $args->link_class;
    }
    return $atts;
}
add_filter( 'nav_menu_link_attributes', 'add_menu_link_class', 1, 3 );

add_filter( 'rest_authentication_errors', function( $result ) {
    if ( ! empty( $result ) ) {
        return $result;
    }
    if ( ! is_user_logged_in() ) {
        return new WP_Error(
            'rest_auth_user',
            'Bitte anmelden um einen Request zu starten.',
            array( 'status' => 401 )
        );
    }
    return $result;
});