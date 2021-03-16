<?php

// Setup
define( 'FZ_DEV_MODE', true);

// Includes
include( get_theme_file_path( '/includes/front/enqueue.php' ) );
include( get_theme_file_path( '/includes/front/setup.php' ) );
include( get_theme_file_path( '/includes/custom_nav_walker.php' ) );
include( get_theme_file_path( '/includes/widgets.php' ) );

// Hooks
add_action( 'wp_enqueue_scripts', 'fz_enqueue' );
add_action( 'after_setup_theme', 'fz_setup_theme' );
add_action( 'widgets_init', 'fz_widgets' );


// Shortcodes