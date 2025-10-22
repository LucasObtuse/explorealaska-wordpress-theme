<?php
/**
 * Explore Alaska Theme Functions
 */

// Theme Setup
function explorealaska_setup() {
    // Add default posts and comments RSS feed links to head
    add_theme_support('automatic-feed-links');

    // Let WordPress manage the document title
    add_theme_support('title-tag');

    // Enable support for Post Thumbnails
    add_theme_support('post-thumbnails');
    set_post_thumbnail_size(1200, 630, true);

    // Enable support for custom logo
    add_theme_support('custom-logo', array(
        'height'      => 100,
        'width'       => 300,
        'flex-height' => true,
        'flex-width'  => true,
    ));

    // Register navigation menus
    register_nav_menus(array(
        'primary' => __('Primary Menu', 'explorealaska'),
    ));

    // Enable HTML5 markup support
    add_theme_support('html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
    ));

    // Add support for responsive embeds
    add_theme_support('responsive-embeds');

    // Add support for editor styles
    add_theme_support('editor-styles');
    add_editor_style('style.css');
}
add_action('after_setup_theme', 'explorealaska_setup');

// Enqueue styles and scripts
function explorealaska_scripts() {
    // Main stylesheet
    wp_enqueue_style('explorealaska-style', get_stylesheet_uri(), array(), '1.0.0');
    
    // Comment reply script
    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}
add_action('wp_enqueue_scripts', 'explorealaska_scripts');

// Default menu fallback
function explorealaska_default_menu() {
    echo '<ul id="primary-menu">';
    echo '<li><a href="' . esc_url(home_url('/')) . '">Home</a></li>';
    echo '<li><a href="' . esc_url(home_url('/blog')) . '">Blog</a></li>';
    echo '<li><a href="' . esc_url(home_url('/about')) . '">About</a></li>';
    echo '<li><a href="' . esc_url(home_url('/contact')) . '">Contact</a></li>';
    echo '</ul>';
}

// Customize excerpt length
function explorealaska_excerpt_length($length) {
    return 40;
}
add_filter('excerpt_length', 'explorealaska_excerpt_length');

// Customize excerpt more
function explorealaska_excerpt_more($more) {
    return '...';
}
add_filter('excerpt_more', 'explorealaska_excerpt_more');

// Add custom image sizes
add_image_size('explorealaska-featured', 1200, 630, true);
add_image_size('explorealaska-thumbnail', 400, 300, true);

// Widget areas
function explorealaska_widgets_init() {
    register_sidebar(array(
        'name'          => __('Sidebar', 'explorealaska'),
        'id'            => 'sidebar-1',
        'description'   => __('Add widgets here to appear in your sidebar.', 'explorealaska'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ));
}
add_action('widgets_init', 'explorealaska_widgets_init');

// Security: Remove WordPress version from header
remove_action('wp_head', 'wp_generator');

// Add security headers
function explorealaska_security_headers() {
    header('X-Frame-Options: SAMEORIGIN');
    header('X-Content-Type-Options: nosniff');
    header('X-XSS-Protection: 1; mode=block');
    header('Referrer-Policy: strict-origin-when-cross-origin');
}
add_action('send_headers', 'explorealaska_security_headers');
