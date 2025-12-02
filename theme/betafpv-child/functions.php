<?php
/**
 * BetaFPV Child Theme functions
 */

if (!defined('BETAFPV_CHILD_VERSION')) {
define('BETAFPV_CHILD_VERSION', '1.0.0');
}

/**
 * Enqueue parent and child styles.
 */
function betafpv_child_enqueue_styles() {
$parent_style = 'twentytwentyfour-style';

wp_enqueue_style($parent_style, get_template_directory_uri() . '/style.css', [], wp_get_theme('twentytwentyfour')->get('Version'));
wp_enqueue_style('betafpv-child-style', get_stylesheet_uri(), [$parent_style], BETAFPV_CHILD_VERSION);
}
add_action('wp_enqueue_scripts', 'betafpv_child_enqueue_styles');

/**
 * Theme supports for site editor and WooCommerce.
 */
function betafpv_child_setup() {
add_theme_support('wp-block-styles');
add_theme_support('editor-styles');
add_theme_support('responsive-embeds');
add_theme_support('woocommerce');
add_theme_support('woocommerce-block-theme');
}
add_action('after_setup_theme', 'betafpv_child_setup');

/**
 * Register a pattern category for BetaFPV-specific blocks.
 */
function betafpv_child_register_pattern_categories() {
register_block_pattern_category(
'betafpv-showcase',
[
'label' => __('BetaFPV Vitrine', 'betafpv-child'),
]
);
}
add_action('init', 'betafpv_child_register_pattern_categories');

/**
 * Allow Beaver Builder Lite to edit WooCommerce products and custom landing pages.
 */
function betafpv_child_enable_beaver_builder($post_types) {
$post_types[] = 'product';
return array_unique($post_types);
}
add_filter('fl_builder_post_types', 'betafpv_child_enable_beaver_builder');

/**
 * Add contextual body class for styling hooks.
 */
function betafpv_child_body_class($classes) {
$classes[] = 'betafpv-child';
return $classes;
}
add_filter('body_class', 'betafpv_child_body_class');
