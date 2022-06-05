<?php
    function contrabanda_theme_scripts() {
        wp_register_style( 'contrabanda-theme-styles', get_stylesheet_directory_uri().'/build/css/style.css' );
        wp_enqueue_style( 'contrabanda-theme-styles' );
        // wp_enqueue_script( 'contrabanda-plugin-scripts', plugin_dir_url(__FILE__).'build/js/main.js',null,null,true);
    }
    // Register style sheet.
    add_action( 'wp_enqueue_scripts', 'contrabanda_theme_scripts' );
    add_filter( 'pre_option_link_manager_enabled', '__return_true' );
?>