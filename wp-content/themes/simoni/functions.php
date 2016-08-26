<?php
/**
 * Created by PhpStorm.
 * User: brian
 * Date: 8/26/16
 * Time: 12:53 PM
 */

function simoni_styles() {
    wp_enqueue_script("simoni-js", get_stylesheet_directory_uri() . "/js/jquery-3.1.0.min.js");
    wp_enqueue_script("bootstrap-js", get_stylesheet_directory_uri() . "/js/bootstrap-3.3.7-dist/js/bootstrap.min.js");

    wp_enqueue_style("bootstrap", get_stylesheet_directory_uri() . "/js/bootstrap-3.3.7-dist/css/bootstrap.min.css");
    wp_enqueue_style("simoni", get_stylesheet_directory_uri() . "/style.css");
}

add_action( 'wp_enqueue_scripts', 'simoni_styles' );


function simoni_theme_setup() {
    register_nav_menus( array(
        'primary' => __( 'Primary Menu', 'twentysixteen' ),
        'social'  => __( 'Social Links Menu', 'twentysixteen' ),
    ) );

}


add_action( 'after_setup_theme', 'simoni_theme_setup' );