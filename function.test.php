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