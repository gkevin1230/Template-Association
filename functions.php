<?php

/* Chargement de la feuille du style du theme parent */
add_action( 'wp_enqueue_scripts', 'wpchild_enqueue_styles' );
function wpchild_enqueue_styles(){
  wp_enqueue_style( 'wpm-wp-bootstrap-starter-style', get_template_directory_uri() . '/style.css' );
}

/*Ajout des menus*/
function register_my_menus() {
  register_nav_menus(
  array(
  'pre-header-menu' => __( 'Menu Pre Header' ),
  )
  );
 }
 add_action( 'init', 'register_my_menus' );