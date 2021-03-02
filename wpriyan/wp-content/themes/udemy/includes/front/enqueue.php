<?php

function fz_enqueue() {
    $uri                = get_theme_file_uri();

    wp_register_style( "fz_google_font", "https://fonts.googleapis.com/css?family=Lato:300,400,400i,700|Raleway:300,400,500,600,700|Crete+Round:400i" );
    wp_register_style( "fz_bootstrap", $uri . '/assets/css/bootstrap.css' );
    wp_register_style( "fz_style", $uri . '/assets/css/style.css' );
    wp_register_style( "fz_dark", $uri . '/assets/css/dark.css' );
    wp_register_style( "fz_font_icons", $uri . '/assets/css/font-icons.css' );
    wp_register_style( "fz_animate", $uri . '/assets/css/animate.css' );
    wp_register_style( "fz_magnific_popup", $uri . '/assets/css/magnific_popup.css' );
    wp_register_style( "fz_custom", $uri . '/assets/css/custom.css' );
    wp_register_style( "fz_responsive", $uri . '/assets/css/responsive.css' );

    wp_enqueue_style( 'fz_google_font' );
    wp_enqueue_style( 'fz_bootstrap' );
    wp_enqueue_style( 'fz_style' );
    wp_enqueue_style( 'fz_dark' );
    wp_enqueue_style( 'fz_font_icons' );
    wp_enqueue_style( 'fz_animate' );
    wp_enqueue_style( 'fz_magnific_popup' );
    wp_enqueue_style( 'fz_custom' );
    wp_enqueue_style( 'fz_responsive' );


    wp_register_script( 'fz_plugins', $uri . '/assets/js/plugins.js', [], false, true );
    wp_register_script( 'fz_functions', $uri . '/assets/js/functions.js', [], false, true );

    wp_enqueue_script( 'jquery' );
    wp_enqueue_script( 'fz_plugins' );
    wp_enqueue_script( 'fz_functions' );

}