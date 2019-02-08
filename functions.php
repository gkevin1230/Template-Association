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
  'footer1-menu' => __( 'Footer 1 Menu' ),
  'footer2-menu' => __( 'Footer 2 Menu' ),
  )
  );
 }
 add_action( 'init', 'register_my_menus' );

 /* WIDGETS CUSTOM POUR ELEMENTOR */

 /*3 derniers posts*/
 add_action('elementor/widgets/widgets_registered', function (){
  
  require('widgets/lastposts.php');
  \Elementor\Plugin::instance()->widgets_manager->register_widget_type(new LastPostsWidget);

 });

  /* LAST POST*/
 function recent_posts($no_posts = 3, $excerpts = true) {

  global $wpdb;

  $request = "SELECT ID, post_title, post_excerpt FROM $wpdb->posts WHERE post_status = 'publish' AND post_type='post' ORDER BY post_date DESC LIMIT $no_posts";
  $posts = $wpdb->get_results($request);

  $output .= '<div class="row">';

  if($posts) {
    foreach ($posts as $posts) {
      $post_title = stripslashes($posts->post_title);
      $permalink = get_permalink($posts->ID);

      $output .= '<div class="last-post col">';

        $output .= '<div class="img-last-post">image</div>';
        $output .= '<date class="date-last-post">09 janvier 2019</date>';
        $output .= '<span class="separator-last-post"></span>';

        $output .= '<a href="' . $permalink . '" rel="bookmark" title="Permanent Link: ' . htmlspecialchars($post_title, ENT_COMPAT) . '"><h4 class="titre-last-post">' . htmlspecialchars($post_title).'</h4></a>';
        
        $output.= '<div class="excerpt-last-post">' . stripslashes($posts->post_excerpt) . '</div>';
        
      $output .= '</div>';
    }
    $output .= '</div>';
  } else {
          $output .= '<li>No posts found</li>';
  }

  echo $output;
}