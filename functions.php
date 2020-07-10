<?php
/**
 * Functions
 *
 * @package      Twenty Twenty Child
 * @since        1.0
 * @link         https://rotsenacob.com
 * @author       Rotsen Mark Acob <rotsenacob.com>
 * @copyright    Copyright (c) 2020, Rotsen Mark Acob
 * @license      http://opensource.org/licenses/gpl-2.0.php GNU Public License
 *
*/

add_action( 'after_setup_theme', function() {
  // Enqueue Stylesheet
  add_action( 'wp_enqueue_scripts', 'twentytwentychild_enqueue_scripts' );

  // Unregister Parent Navigation Menus
  add_action( 'init', 'twentytwentychild_unregister_menus' );

  // Unregister Parent Widget Areas & Register New Ones
  add_action( 'widgets_init', 'twentytwentychild_unregister_widgets' );
}, 20 );

// Enqueue stylesheet
function twentytwentychild_enqueue_scripts() {
  $parenthandle = 'parent-style'; // This is 'twentytwenty-style' for the Twenty Twenty theme.
  $theme = wp_get_theme();
  
  // Parent Theme Stylesheet
  wp_enqueue_style( $parenthandle, get_template_directory_uri() . '/style.css', 
      array(),  // if the parent theme code has a dependency, copy it to here
      $theme->parent()->get('Version')
  );

  // Child Theme Stylesheet
  wp_enqueue_style( 'child-style', get_stylesheet_uri(),
      array( $parenthandle ),
      $theme->get('Version') // this only works if you have Version in the style header
  );
}

// Unregister unneeded navigation menus
function twentytwentychild_unregister_menus() {
  // Unregister Footer Navigation
  unregister_nav_menu( 'footer' );

  // Unregister Social Navigation
  unregister_nav_menu( 'social' );
}

// Unregister unneeded widget areas
function twentytwentychild_unregister_widgets() {
  unregister_sidebar( 'sidebar-1' );
  unregister_sidebar( 'sidebar-2' );

  // Register Footer Widget Areas
  $widget_areas = array(
    'footer-1' => __( 'Footer #1', 'twentytwentychild' ),
    'footer-2' => __( 'Footer #2', 'twentytwentychild' ),
    'footer-3' => __( 'Footer #3', 'twentytwentychild' ),
    'footer-4' => __( 'Footer #4', 'twentytwentychild' )
  );

  $shared_args = array(
		'before_title'  => '<h2 class="widget-title subheading heading-size-3">',
		'after_title'   => '</h2>',
		'before_widget' => '<div class="widget %2$s"><div class="widget-content">',
    'after_widget'  => '</div></div>',
  );

  $counter = 1;
  foreach( $widget_areas as $key => $value ) {
    register_sidebar(
      array_merge(
        $shared_args,
        array(
          'name' => $value,
          'id' => $key,
          'description' => __( "This is the {$value} in the footer widget area.", "twentytwentychild" )
        )
      )
    );

    $counter++;
  }
}