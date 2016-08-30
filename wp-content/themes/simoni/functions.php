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
    wp_enqueue_script("hightlight-js", get_stylesheet_directory_uri() . "/js/highlight.pack.js");

    wp_enqueue_style("highlight-monokai-sublime", get_stylesheet_directory_uri() . "/stylesheets/monokai-sublime.css");
    wp_enqueue_style("bootstrap", get_stylesheet_directory_uri() . "/js/bootstrap-3.3.7-dist/css/bootstrap.min.css");
    wp_enqueue_style("simoni", get_stylesheet_directory_uri() . "/style.css");
}

add_action( 'wp_enqueue_scripts', 'simoni_styles' );


function simoni_theme_setup() {
    register_nav_menus( array(
        'primary' => __( 'Primary Menu', 'twentysixteen' ),
        'social'  => __( 'Social Links Menu', 'twentysixteen' ),
    ) );

    add_theme_support( 'post-thumbnails' );

}


add_action( 'after_setup_theme', 'simoni_theme_setup' );



function create_computer_science_post_type() {
    register_post_type( 'computer-science',
        array(
            'labels' => array(
                'name' => __( 'ComputerScience' ),
                'singular_name' => __( 'ComputerScience' )
            ),
            'public' => true,
            'has_archive' => true,
        )
    );

    $labels = array(
        'name' => __( 'Computer Science' ),
        'singular_name' => __( 'Computer Science' )
    );


    $args = array(
        'labels' => $labels,
        'public' => true,
        'has_archive' => true,
        'supports' => array(
            'title',
            'editor',
            'author',
            'thumbnail',
            'excerpt',
            'comments',
        )
    );

    register_post_type( 'computer-science', $args );
}
add_action( 'init', 'create_computer_science_post_type' );


function create_software_development_post_type() {

    $labels = array(
        'name' => __( 'Software Development' ),
        'singular_name' => __( 'Software Development' )
    );


    $args = array(
        'labels' => $labels,
        'public' => true,
        'has_archive' => true,
        'supports' => array(
            'title',
            'editor',
            'author',
            'thumbnail',
            'excerpt',
            'comments',
        )
    );

    register_post_type( 'software-development', $args );
}
add_action( 'init', 'create_software_development_post_type' );



function create_fire_and_ems_post_type() {

    $labels = array(
        'name' => __( 'Fire and EMS' ),
        'singular_name' => __( 'Fire and EMS' )
    );


    $args = array(
        'labels' => $labels,
        'public' => true,
        'has_archive' => true,
        'supports' => array(
            'title',
            'editor',
            'author',
            'thumbnail',
            'excerpt',
            'comments',
        )
    );

    register_post_type( 'fire-and-ems', $args );
}
add_action( 'init', 'create_fire_and_ems_post_type' );