<?php
function my_wp_theme_setup(){
    add_theme_support('custom-logo');
    add_theme_support('post-thumbnails');
    load_theme_textdomain('akib_rpl');
    $args = array(
      'default-color' => 'ffffff',
      'default-image' => get_template_directory_uri() . '/assets/images/bg_main.gif'
  );
  add_theme_support( 'custom-background', $args );
    register_nav_menus( array(
        'primary_menu' => __( 'Primary Menu', 'akib_rpl' ),
        'footer_menu'  => __( 'Footer Menu', 'akib_rpl' ),
    ) );
}
add_action('after_setup_theme','my_wp_theme_setup');
// extra classes
function add_additional_class_on_li( $classes, $item, $args ) {
 
  if ( 'primary_menu' === $args->theme_location ) {
      $classes[] = "nav-item";
  }
  return $classes;
}
add_filter( 'nav_menu_css_class' , 'add_additional_class_on_li' , 1, 3);

function add_link_atts($atts, $item, $args) {
  if ( 'primary_menu' === $args->theme_location ) {
      $atts['class'] = "nav-link";    //a tag class
  }
return $atts;
}
add_filter( 'nav_menu_link_attributes', 'add_link_atts', 10, 3);
// extra classes

function akib_wp_scripts(){
    wp_enqueue_style('bootstrap-css',get_theme_file_uri().'/assets/bootstrap/css/bootstrap.css','4.6.0' , false);
    wp_enqueue_style('custom-css',get_theme_file_uri().'/assets/css/custom.css','1.0.0' , false);
    wp_enqueue_style( 'style', get_stylesheet_uri() );
    // -------- scripts
    wp_enqueue_script('bootstrap-js',get_theme_file_uri().'/assets/bootstrap/js/bootstrap.min.js',array("jquery"), time() , true);
    wp_enqueue_script('custom-js',get_theme_file_uri().'/assets/js/main.js', array("jquery"), time() , true);
}
add_action('wp_enqueue_scripts','akib_wp_scripts');

// ---------rpl_widgets-----------
function rpl_widgets()
{
	register_sidebar(array(
		'name'          => __('right-sidebar', 'akib_rpl'),
		'id'            => 'right-sidebar',
		'description'   => __('right side bar', 'akib_rpl'),
		'before_widget' => '<div id="%1$s" class="%2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4>',
		'after_title'   => '</h4>',
	));
}
add_action("widgets_init", "rpl_widgets");
// ---------rpl_widgets-----------
function rpl_bottom_widgets()
{
	register_sidebar(array(
		'name'          => __('bottom_widget', 'akib_rpl'),
		'id'            => 'bottom_widget',
		'description'   => __('bottom widget part', 'akib_rpl'),
		'before_widget' => '<div class="col-4"><div id="%1$s" class="%2$s">',
		'after_widget'  => '</div></div>',
		'before_title'  => '<h4>',
		'after_title'   => '</h4>',
	));
}
add_action("widgets_init", "rpl_bottom_widgets");

// register custom post type 'my_custom_post_type'

function create_my_post_type() {
    register_post_type( 'top_banner_slider',
      array(
        'labels' => array(  
            'name' => __( 'Top banner slider' ),
            'singular_name' => __( 'Slider' ) 
        ),
        'public' => true,
        'has_archive' => true,
        'supports' => array( 'title', 'editor', 'post-formats','thumbnail')
    )
  );
}
add_action( 'init', 'create_my_post_type' );
/**
 * Register a Tab post type.
 */
function create_custom_tab() {
    $args = array(
        'public'        => true,
        'label'         => __( 'Tab Post', 'akib_rpl' ),
        'supports'      => array( 'title', 'editor', 'post-formats','thumbnail')
    );
    register_post_type( 'tab_posts', $args );

    register_taxonomy('tab_posts_category', 'tab_posts', 
        array(
          'hierarchical' => true, 
          'label' => __( 'Tab post category', 'akib_rpl' ), 
          'singular_name' => 'Category',
          "rewrite" => true, 
          "query_var" => true
        ));
}
add_action( 'init', 'create_custom_tab' );














/* Portfolio */
// function my_post_type_portfolio() {
// 	register_post_type( 'portfolio',
//         array(
//             'label' => __('Portfolio'),
//             'singular_label' => __('Porfolio Item', 'theme1592'),
//             '_builtin' => false,
//             'public' => true,
//             'show_ui' => true,
//             'show_in_nav_menus' => true,
//             'hierarchical' => true,
//             'capability_type' => 'page',
//             'menu_icon' => get_template_directory_uri() . '/assets/images/youtube-icon.png',
//             'rewrite' => array(
//               'slug' => 'portfolio-view',
//               'with_front' => FALSE,
//             ),
//             'supports' => array(
//                 'title',
//                 'editor',
//                 'thumbnail',
//                 'excerpt',
//                 'custom-fields',
//                 'comments')
//               )
//         );
// 	register_taxonomy('portfolio_category', 'portfolio', 
//         array(
//           'hierarchical' => true, 
//           'label' => 'Portfolio Categories', 
//           'singular_name' => 'Category', 
//           "rewrite" => true, 
//           "query_var" => true
//         ));
// }

// add_action('init', 'my_post_type_portfolio');




