<?php

/**
 * safari functions and definitions
 *
 * @package safari
 */
/**
 * Set the content width based on the theme's design and stylesheet.
 */
if (!isset($content_width))
    $content_width = 750; /* pixels */

if (!function_exists('safari_setup')) :

    /**
     * Set up theme defaults and register support for various WordPress features.
     *
     * Note that this function is hooked into the after_setup_theme hook, which runs
     * before the init hook. The init hook is too late for some features, such as indicating
     * support post thumbnails.
     */
    function safari_setup() {
        global $cap, $content_width;

        // This theme styles the visual editor with editor-style.css to match the theme style.
        add_editor_style();

        if (function_exists('add_theme_support')) {

            /**
             * Add default posts and comments RSS feed links to head
             */
            add_theme_support('automatic-feed-links');

            /**
             * Enable support for Post Thumbnails on posts and pages
             *
             * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
             */
            add_theme_support('post-thumbnails');

            // Create an extra image size for the Post featured image
            add_image_size('post_feature_full_width', 769, 440, true);

            // Create an extra image size for the Post thumbnail image
            add_image_size('post_feature_thumb', 368, 243, true);

            add_image_size('single_portfolio_thumb', 1200, 490, true);

            // Create an extra image size for the Post thumbnail image
            add_image_size('portfolio_feature_thumb', 600, 800, true);
            /**
             * Enable support for Post Formats
             */
            add_theme_support('post-formats', array('aside', 'image', 'video', 'quote', 'link'));

            /**
             * Setup the WordPress core custom background feature.
             */
            add_theme_support('custom-background', apply_filters('safari_custom_background_args', array(
                'default-color' => 'ffffff',
                'default-image' => '',
            )));
        }

        /**
         * Make theme available for translation
         * Translations can be filed in the /languages/ directory
         * If you're building a theme based on safari, use a find and replace
         * to change 'safari' to the name of your theme in all the template files
         */
        load_theme_textdomain('safari', get_template_directory() . '/languages');

        /**
         * This theme uses wp_nav_menu() in one location.
         */
        register_nav_menus(array(
            'primary' => __('Main navigation', 'safari'),
        ));
    }

endif; // safari_setup
add_action('after_setup_theme', 'safari_setup');

/**
 * Register widgetized area and update sidebar with default widgets
 */
function safari_widgets_init() {
    register_sidebar(array(
        'name' => __('Sidebar', 'safari'),
        'id' => 'sidebar-1',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ));

    register_sidebar(array(
        'name' => esc_html__('Footer #1', 'safari'),
        'id' => 'sidebar-footer1',
        'description' => esc_html__('Appears in the footer sidebar', 'safari'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget' => '</section>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>'
    ));

    register_sidebar(array(
        'name' => esc_html__('Footer #2', 'safari'),
        'id' => 'sidebar-footer2',
        'description' => esc_html__('Appears in the footer sidebar', 'safari'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget' => '</section>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>'
    ));

    register_sidebar(array(
        'name' => esc_html__('Footer #3', 'safari'),
        'id' => 'sidebar-footer3',
        'description' => esc_html__('Appears in the footer sidebar', 'safari'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget' => '</section>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>'
    ));

    register_sidebar(array(
        'name' => esc_html__('Footer #4', 'safari'),
        'id' => 'sidebar-footer4',
        'description' => esc_html__('Appears in the footer sidebar', 'safari'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget' => '</section>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>'
    ));
}

add_action('widgets_init', 'safari_widgets_init');

/**
 * Enqueue scripts and styles
 */
function safari_scripts() {

    // load bootstrap css
    wp_enqueue_style('safari-bootstrap', get_template_directory_uri() . '/includes/css/bootstrap.css');

    // load safari styles
    wp_enqueue_style('safari-style', get_stylesheet_uri());
    wp_enqueue_style('open-sans');
    wp_enqueue_style('fontawesome', trailingslashit(get_template_directory_uri()) . 'includes/css/font-awesome.min.css', array(), '4.0.3', 'all');
    wp_enqueue_style('flexslider', trailingslashit(get_template_directory_uri()) . 'includes/css/flexslider.css', array(), '1.0', 'all');

    wp_enqueue_script('safari-skip-link-focus-fix', get_template_directory_uri() . '/includes/js/skip-link-focus-fix.js', array(), '20130115', true);

    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }

    if (is_singular() && wp_attachment_is_image()) {
        wp_enqueue_script('safari-keyboard-image-navigation', get_template_directory_uri() . '/includes/js/keyboard-image-navigation.js', array('jquery'), '20120202');
    }

    wp_enqueue_script('jquery');
    // load bootstrap js
    wp_enqueue_script('safari-bootstrapjs', get_template_directory_uri() . '/includes/js/bootstrap.min.js', array('jquery'));

    // load bootstrap wp js
    wp_enqueue_script('safari-bootstrapwp', get_template_directory_uri() . '/includes/js/bootstrap-wp.js', array('jquery'));

    wp_enqueue_script('safari-slider', get_template_directory_uri() . '/includes/js/jquery.flexslider-min.js', array('jquery'));
    wp_enqueue_script('mixitup', get_template_directory_uri() . '/includes/js/jquery.mixitup.js', array('jquery'));
    wp_enqueue_script('safari-custom-scripts', get_template_directory_uri() . '/includes/js/custom-scripts.js', array(), '1.0', 'all', false);

    //wp_enqueue_script('menu-dropdown', get_template_directory_uri() . '/includes/js/bootstrap-hover-dropdown.js', array(), '2.0.10', 'all', false);
}

add_action('wp_enqueue_scripts', 'safari_scripts');

/**
 * Returns a "Continue Reading" link for excerpts
 *
 * @since Safari 1.0
 *
 * @return string The 'Continue reading' link
 */
function safari_continue_reading_link() {
    return '&hellip;<p><a class="more-link" href="' . esc_url(get_permalink()) . '" title="' . esc_html__('Read More', 'safari') . ' &lsquo;' . get_the_title() . '&rsquo;">' . wp_kses(__('Read More', 'safari'), array('span' => array(
                    'class' => array()))) . '</a></p>';
}

/**
 * Replaces "[...]" (appended to automatically generated excerpts) with the safari_continue_reading_link().
 *
 * @since Safari 1.0
 *
 * @param string Auto generated excerpt
 * @return string The filtered excerpt
 */
function safari_auto_excerpt_more($more) {
    return safari_continue_reading_link();
}

add_filter('excerpt_more', 'safari_auto_excerpt_more');


/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/includes/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/includes/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/includes/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/includes/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/includes/jetpack.php';

/**
 * Load custom WordPress nav walker.
 */
require get_template_directory() . '/includes/bootstrap-wp-navwalker.php';

function safari_custom_post_category() {
?>
    <?php

    $terms = get_the_terms($post->ID, 'portfolio_category');
    if ($terms && !is_wp_error($terms)) :

        foreach ($terms as $term) {
            $term_link = get_term_link($term);
            if (is_wp_error($term_link)) {
                continue;
            }

            // We successfully got a link. Print it out.
            echo '<a href="' . esc_url($term_link) . '">' . $term->name . ' '. '</a>';
           
        }

        $tax = $term;
    else :
        $tax = '';
        echo $tax;
    endif;
}

    ?>