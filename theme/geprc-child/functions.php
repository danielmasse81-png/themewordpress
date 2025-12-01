<?php
/**
 * GEPRC Child theme functions.
 */

if (!defined('ABSPATH')) {
    exit;
}

const GEPRC_CHILD_VERSION = '1.0.0';

/**
 * Enqueue parent and child styles.
 */
function geprc_child_enqueue_assets(): void
{
    $theme = wp_get_theme('geprc-child');
    $version = $theme->get('Version') ?: GEPRC_CHILD_VERSION;

    wp_enqueue_style('geprc-child-parent', get_template_directory_uri() . '/style.css', [], wp_get_theme(get_template())->get('Version'));
    wp_enqueue_style('geprc-child-fonts', 'https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap', [], $version);
    wp_enqueue_style('geprc-child-style', get_stylesheet_uri(), ['geprc-child-parent', 'geprc-child-fonts'], $version);
}
add_action('wp_enqueue_scripts', 'geprc_child_enqueue_assets');

/**
 * Theme setup.
 */
function geprc_child_setup(): void
{
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('woocommerce');

    register_nav_menus([
        'geprc-primary' => __('Menu principal GEPRC', 'geprc-child'),
    ]);
}
add_action('after_setup_theme', 'geprc_child_setup');

/**
 * Customizer settings for brand accents.
 */
function geprc_child_customize_register(WP_Customize_Manager $wp_customize): void
{
    $wp_customize->add_section('geprc_child_branding', [
        'title' => __('Identité GEPRC', 'geprc-child'),
        'priority' => 30,
    ]);

    $wp_customize->add_setting('geprc_child_accent', [
        'default' => '#0ec1f4',
        'sanitize_callback' => 'sanitize_hex_color',
    ]);

    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'geprc_child_accent', [
        'label' => __('Couleur d\'accent', 'geprc-child'),
        'section' => 'geprc_child_branding',
    ]));

    $wp_customize->add_setting('geprc_child_subaccent', [
        'default' => '#7fffd4',
        'sanitize_callback' => 'sanitize_hex_color',
    ]);

    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'geprc_child_subaccent', [
        'label' => __('Couleur secondaire', 'geprc-child'),
        'section' => 'geprc_child_branding',
    ]));
}
add_action('customize_register', 'geprc_child_customize_register');

/**
 * Inject the customizer colors into the front-end.
 */
function geprc_child_inline_styles(): void
{
    $accent = get_theme_mod('geprc_child_accent', '#0ec1f4');
    $subaccent = get_theme_mod('geprc_child_subaccent', '#7fffd4');

    $custom_css = sprintf(
        ':root { --geprc-accent: %1$s; --geprc-accent-2: %2$s; }',
        esc_html($accent),
        esc_html($subaccent)
    );

    wp_add_inline_style('geprc-child-style', $custom_css);
}
add_action('wp_enqueue_scripts', 'geprc_child_inline_styles');

/**
 * Helper to fetch a curated WooCommerce product query for the home page.
 */
function geprc_child_get_featured_products(int $limit = 6): array
{
    if (!class_exists('WC_Product_Query')) {
        return [];
    }

    $query = new WC_Product_Query([
        'limit' => $limit,
        'return' => 'objects',
        'orderby' => 'date',
        'order' => 'DESC',
        'featured' => true,
        'status' => 'publish',
    ]);

    return $query->get_products();
}
