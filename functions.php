<?php

// Stylesheet versioning
    add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );
    function theme_enqueue_styles() {
        wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
        wp_enqueue_style( 'child-style',
            get_stylesheet_directory_uri() . '/style.css',
            array('parent-style'),
            wp_get_theme()->get('Version')
        );
    }


// Custom Image Sizing
  add_image_size( 'anc-object-thumbnail', 350, 420, true );

/**
* Register custom fonts.
*/
// $font_families[] = 'Source Sans Pro:300,300i,400,400i,600,600i,700,700i';
// $font_families[] = 'Merriweather:300,300i,400,400i,600,600i,700,700i';

function wpb_add_google_fonts() {

wp_enqueue_style( 'wpb-google-fonts', 'http://fonts.googleapis.com/css?family=Source+Sans+Pro:300,300i,400,400i,600,600i,700,700i|Merriweather:300,300i,400,400i,600,600i,700,700i', false ); 
}

add_action( 'wp_enqueue_scripts', 'wpb_add_google_fonts' );
