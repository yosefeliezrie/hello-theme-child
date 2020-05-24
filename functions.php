<?php
/**
 * Theme functions and definitions
 *
 * @package HelloElementorChild
 */

/**
 * Load child theme css and optional scripts
 *
 * @return void
 */
function written_by_chanee_enqueue_scripts()
{
    wp_enqueue_style(
        'hello-elementor-child-style',
        get_stylesheet_directory_uri() . '/style.css',
        [
            'hello-elementor-theme-style',
        ],
        '1.0.0'
    );
}
add_action('wp_enqueue_scripts', 'written_by_chanee_enqueue_scripts');

/**
 * disable default page title from displaying
 *
 * @return false
 */
function written_by_chanee_ele_disable_page_title($return)
{
    return false;
}
add_filter('hello_elementor_page_title', 'written_by_chanee_ele_disable_page_title');

// First Check that ACF (advance custom fields is installed and active)
if (class_exists('acf')) {
    /**
     * ACF (Advanced Custom Fields) functions used in this theme
     * Will only fire if acf is installed and active
     */

    function written_by_chanee_acf_theme_functions()
    {
        // Register themes acf options page.
        $option_page = acf_add_options_page(array(
                'page_title' 	=> 'Theme Settings',
                'menu_title'	=> 'Theme Settings',
                'menu_slug' 	=> 'theme-settings',
                'capability'	=> 'edit_posts',
                'redirect'		=> false
            ));
    }
    // add_action('acf/init', 'written_by_chanee_acf_theme_functions');
}
