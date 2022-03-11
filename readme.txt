Conversion processes HTML template to WordPress theme:
A.	Pages setup part: (Edit files name correctly)
1.	Create a style.css file in your theme’s root directory and write the following codes. Or browse the link for more study Main Stylesheet (style.css) | Theme Developer Handbook | WordPress Developer Resources
/*
Theme Name: pencilBox RPL level 4
Author: pencilBox
Description: This is Theme Description
Tags: blog, custom-background, custom-logo, custom-menu, editor-style, featured-images, footer-widgets
Version: 1.3
Requires PHP: 7.0
License: GNU General Public License v2 or latest
License URI: http://www.gnu.org/licenses/gpl-2.0.html
Text Domain: rpl_level_4
This theme, like WordPress, is licensed under the GPL.
*/

2.	Create functions.php in your theme’s root directory. All the functionalities of the theme will be written here.
3.	Add a theme pic and set name screenshot.png 
4.	Create index.php 
5.	Our theme will be appeared. Please Activate the theme.
6.	Create header.php & footer.php 
7.	Create a folder, such as assets. And keep your CSS, JS/Jquery, images files here.

B.	Theme setup: 
1.	Add CSS and JS files to your theme. Edit functions.php 
and add following code to the file.
function my_theme_wp_scripts(){
    wp_enqueue_style('bootstrap-css',get_theme_file_uri().'/assets/bootstrap/css/bootstrap.css','4.6.0' , false);
    wp_enqueue_style('custom-css',get_theme_file_uri().'/assets/css/custom.css','1.0.0' , false);
    wp_enqueue_style( 'style', get_stylesheet_uri() );
    // -------- scripts
    wp_enqueue_script('bootstrap-js',get_theme_file_uri().'/assets/bootstrap/js/bootstrap.min.js',array("jquery"), time() , true);
    wp_enqueue_script('custom-js',get_theme_file_uri().'/assets/js/main.js', array("jquery"), time() , true);
}
add_action('wp_enqueue_scripts','my_theme_wp_scripts');
2.	Now we will copy html code from index.html and paste it to index.php and then collect header part code and paste these code into header.php 
After that paste the following code inside head tag.

<?php wp_head(); ?>
	 

This function is WordPress by-default function to define the header. Please check the following image where to paste the code.

 

3.	Now grab the footer part of code and paste it to footer.php 

<?php wp_footer(); ?>

Add this code in your footer part like the picture inside the body tag like the following image.
 


4.	Now add 
<?php
get_header();
?>
At the top of your theme’s index.php where your header.php code was placed. If this function is called then header.php file will be called by WordPress by default.
Please take a look of the picture.
 
5.	At the bottom of the index.php add the footer.php by calling this function.
<?php 
get_footer();
?>

We can follow this image like, 

 
If all above the coding is correct, WordPress theme will load our given CSS , JS, images file. 

C.	Dynamic content:
1.	Logo add:
a.	Add the following code to functions.php this theme support call the custom-logo support for the theme. 
function my_wp_theme_setup(){
  	 add_theme_support('custom-logo');
	 load_theme_textdomain( 'rpl_level_4');
}
add_action('after_setup_theme','my_wp_theme_setup');
    

b.	To display the logo add the following code where you want to show the logo image.

<a href="<?php home_url(); ?>">
   <?php 
       if(the_custom_logo('the_custom_logo')){
         the_custom_logo();
       }
   ?>
</a>

c.	Here is an example that logo image is in header.php file, to show logo image in heade.php file, look at the image bellow:
    

d.	Now set the logo from Appearance->Customize->Site Identity->logo 
e.	load_theme_textdomain( 'rpl_level_4' );  this is to load textdomain that we have added to the style.css

2.	Header Menu :
a.	Register wp nav menus add by following code inside my_wp_theme_setup() that previously added to the functions.php 

    register_nav_menus( array(
        'primary_menu' => __( 'Primary Menu', 'rpl_level_4' ),
    ) );

b.	To add class in li & a tag then add these codes to the functions.php file

function add_additional_class_on_li( $classes, $item, $args ) {
 
  if ( 'primary_menu' === $args->theme_location ) {
      $classes[] = "nav-item"; // li tag class
  }
  return $classes;
}
add_filter( 'nav_menu_css_class' , 'add_additional_class_on_li' , 1, 3);

function add_link_atts($atts, $item, $args) {
  if ( 'primary_menu' === $args->theme_location ) {
     $atts['class'] = "nav-link";    //a tag class
0000000000000000000000 	}
return $atts;
}
add_filter( 'nav_menu_link_attributes', 'add_link_atts', 10, 3);

c.	To display the dynamic menu add the following code to the header.php or where you want to show the header menus

<?php
     wp_nav_menu(array(
         'menu' => "main_menu",
         'menu_class' => "navbar-nav mr-auto", //ul tag class
         'theme_location' => 'primary_menu', 
     ));
?>

d.	Prime-minister banner:
1.	Add a theme support called post_thumbnails inside the my_wp_theme_setup(); in functions.php    this will activate the wp featured image option.
   
add_theme_support('post-thumbnails');


2.	Create a new file in root directory and name it as home.php & add the following code at the top of home.php file. And then set the page name at Template Name: field.
<?php
/**
 * Template Name: Home page
 */
?>

3.	Now Copy the index.php code and paste the code bellow the Template name of home.php 
4.	Display the featured image by adding the following code to home.php in pm_banner section.
 <?php
 if(has_post_thumbnail()){
   the_post_thumbnail();
 }
?>

5.	Now create a new page name as your choice and set template which we have made recently. Follow the image as example
 

6.	After that add a banner image to featured image option.

7.	Set this page as the front page and check if all tasks working or not.

8.	Now register_widget for right sidebar. Add this code in functions.php

function rpl_widgets()
{
  register_sidebar(array(
    'name'          => __('right-sidebar', 'rpl_level_4'),
    'id'            => 'right-sidebar',
    'description'   => __('right side bar', 'rpl_level_4'),
    'before_widget' => '<div id="%1$s" class="%2$s">',
    'after_widget'  => '</div>',
    'before_title'  => '<h4>',
    'after_title'   => '</h4>',
  ));
}
add_action("widgets_init", "rpl_widgets");

9.	After register sidebar widget we will get widget option in Appearance in admin-panel. Add sidebar widget images or elements.
10.	Display the widgets in sidebar add the following code in home.php
<?php if ( is_active_sidebar( 'right-sidebar' ) ) : ?>
      <?php dynamic_sidebar( 'right-sidebar' ); ?>
<?php endif; ?>

11.	Example: where to paste the code 
 

12.	Add marquee type post. 
a.	Create a marquee post & add a category name marquee_slide 
b.	Call the marquee post by it’s category name
c.	Add the following code to call marquee post in home.php
<?php 
   $args = array(
     'post_type' => 'post',
     'post_status' => 'publish',
     'category_name' => 'marquee_slide',
     'posts_per_page' => 5,
   );
   $arr_posts = new WP_Query( $args );  
     if ( $arr_posts->have_posts() ) : 
         while ( $arr_posts->have_posts() ) :
           $arr_posts->the_post();
?>
           <div class="m-slide">
               <marquee direction="left" scrollamount="4" >
                 <?php the_content();?>
               </marquee>
           </div>
<?php
         endwhile;
     endif;
?>

13.	Slider post
a.	Add following code to the functions.php
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
b.	After adding these code we will get Top banner slider option in admin panel like
 
c.	Add posts and set featured images. We will use these image  to the slider.
d.	Now display the images on the slider section with the following code. copy these code and paste in home.php 
<?php
   $args = array(
       'post_type'      => 'top_banner_slider',
       'posts_per_page' => 10,
     );
   $loop = new WP_Query($args);
   while ( $loop->have_posts() ) {
     $loop->the_post();
     $count;
                                ?>
     <div class="carousel-item <?php  echo $count==1?'active':'';?>">
     <?php 
     if(has_post_thumbnail()){
       the_post_thumbnail();
     } 
    ?>
   </div>
 <?php
$count++;
}
?>

14.	 Tab section
a.	Add these code in functions.php and tab section will be managed by this custom post type.
function create_custom_tab() {
    $args = array(
        'public'        => true,
        'label'         => __( 'Tab Post', 'rpl_level_4' ),
        'supports'      => array( 'title', 'editor', 'post-formats','thumbnail')
    );
    register_post_type( 'tab_posts', $args );

    register_taxonomy('tab_posts_category', 'tab_posts', 
        array(
          'hierarchical' => true, 
          'label' => __( 'Tab post category', ''rpl_level_4' ), 
          'singular_name' => 'Category',
          "rewrite" => true, 
          "query_var" => true
        ));
}
add_action( 'init', 'create_custom_tab' );

b.	After adding these codes in functions.php the custom post type name Tab post will be shown in admin-panel like,
 
c.	Add some category which will be shown in theme’s this section
 
d.	Add category-wise post.
e.	To display tab titles add these codes in home.php file tab sctions in title part.
<?php
   //Display list of all the categories of custom post types
   $terms = get_terms(
     array(
      'taxonomy'  => 'tab_posts_category', // Custom Post Type Taxonomy Slug
      'hide_empty' => false,
      'order'      => 'asc',
       )
     );
   $count_tab = 1;
   foreach ($terms as $term) { 
?><li >
   <a data-toggle="tab" class="<?php echo $count_tab==1?'active':'no'; ?>"  href="#<?php echo $term->slug?>"><?php echo $term->name ?></a>
       </li><?php
      $count_tab++;
     }
?>

f.	Now display tab posts as category name. Add these code in home.php inside tab content



<?php $count_tab = 1;
   foreach ($terms as $term) {
 	$args = array(
     'post_type'      => 'tab_posts',
     'posts_per_page' => 10,
     'tax_query' => array(
  array(
  'taxonomy' => 'tab_posts_category', // taxonomy name
  'field' => $term->slug,   // term_id, slug or name
  'terms' => $term->term_id,// term id, term slug or term name
   )
  )
);
$loop = new WP_Query($args);?>
 <div id="<?php echo $term->slug?>" class="tab-pane fade <?php echo $count_tab==1?'active show':''; ?>">
 <div class="row">
  <?php
   while ( $loop->have_posts() ) {
     $loop->the_post();?>
     <div class="col-2"><p><?php the_title(); ?></p>
     <?php
     if(has_post_thumbnail()){
  the_post_thumbnail();
}?>
</div>
<?php
 }
$count_tab++;
 ?>
 </div>
</div>
<?php
}
?>

g.	Add footer menu 
        'footer_menu'  => __( 'Footer Menu', 'akib_rpl' ),
In functions.php file on this part
 

h.	Show footer menu in footer.php
<?php  wp_nav_menu(array(
       'menu' => "footer_menu",
       'menu_class' => "d-flex",
       'theme_location' => 'footer_menu',
       ));
?>
i.	Example like,
j.	 
