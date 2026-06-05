<?php
/**
 * Plugin Name: SK Elementor Widgets
 * Description: Custom Elementor widgets for the website.
 * Version: 1.0.2
 * Author: Sujar Khanal
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

function sk_register_elementor_widgets( $widgets_manager ) {
    require_once plugin_dir_path( __FILE__ ) . 'widgets/testimonial-carousel.php';

    $widgets_manager->register( new \SK_Testimonial_Carousel_Widget() );
}
add_action( 'elementor/widgets/register', 'sk_register_elementor_widgets' );

function sk_register_widget_assets() {
    if ( defined( 'ELEMENTOR_ASSETS_URL' ) ) {
        wp_register_style(
            'sk-swiper-css',
            ELEMENTOR_ASSETS_URL . 'lib/swiper/v8/css/swiper.min.css',
            [],
            '8.4.5'
        );
    }

    wp_register_style(
        'sk-testimonial-carousel-css',
        plugin_dir_url( __FILE__ ) . 'assets/css/testimonial-carousel.css',
        defined( 'ELEMENTOR_ASSETS_URL' ) ? [ 'sk-swiper-css' ] : [],
        '1.0.2'
    );

    wp_register_script(
        'sk-testimonial-carousel-js',
        plugin_dir_url( __FILE__ ) . 'assets/js/testimonial-carousel.js',
        [ 'jquery', 'swiper' ],
        '1.0.2',
        true
    );
}
add_action( 'wp_enqueue_scripts', 'sk_register_widget_assets' );
