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

  $args = array( 'numberposts' => 3, 'order'=> 'ASC', 'orderby' => 'date' );
  $postslist = get_posts( $args );

  $output .= '<div class="row">';

  foreach ($postslist as $post) :  setup_postdata($post);

  $output .= $posts;
    $output .= '<div class="last-post col-md">';
      $output .= '<div class="img-last-post">'. get_the_post_thumbnail( $post ) .'</div>';
        $output .= '<div class="text-last-post">';

          $output .= '<date class="date-last-post">' . get_the_date("j F Y",$post ) . '</date>';
          $output .= '<span class="separator-last-post"></span>';
          $output .= '<a href="'. get_the_permalink($post) . '" rel="bookmark" title="' . $post->post_title . '"><h4 class="titre-last-post">' . $post->post_title . '</h4></a>';
          $output.= '<div class="excerpt-last-post">' . get_the_excerpt() . '</div>';

        $output .= '</div>';  
    $output .= '</div>';

  endforeach;

  $output .= '</div>';



  echo $output;
}