<?php
/**
 * Template Name: Home page
 */
?>
<?php
get_header();
?>

<section>
<div class="container">
    <div class="row">
        <div class="col-8 pl-0">
            <div class="pm_banner">
                <?php
                if(has_post_thumbnail()){
                    the_post_thumbnail();
                }
                ?>
            </div>
            <div class="marque slider">
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
                                    <!-- <h4> -->
                                        <marquee direction="left" scrollamount="4" >
                                            <?php the_content();?>
                                        </marquee>
                                    <!-- </h4> -->
                                </div>
                                <?php
                            endwhile;
                        endif;
                    ?>
            </div>
            <div class="slider">
                <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        <!-- <div class="carousel-item active"> -->
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
                                <div class="carousel-item <?php echo $count==1?'active':'';?>">
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
                        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="tab_section">
                    <div class="container">
                        <div class="row flex-column">
                            <!-- tab buttons -->
                            <ul class="nav nav-tabs">

                                <?php

                                //Display list of all the categories of custom post types
                                
                                $terms = get_terms(
                                        array(
                                                'taxonomy'      => 'tab_posts_category', // Custom Post Type Taxonomy Slug
                                                'hide_empty'    => false,
                                                'order'         => 'asc',
                                            )
                                        );
                                $count_tab = 1;
                                foreach ($terms as $term) {
                                    ?>
                                    <li >
                                        <a data-toggle="tab" class="<?php echo $count_tab==1?'active':'no'; ?>"  href="#<?php echo $term->slug?>"><?php echo $term->name ?></a>
                                    </li>
                                    <?php
                                    $count_tab++;
                                    }
                                
                                ?>
                            </ul>
                            <!-- tab content start -->
                            <div class="tab-content">
                                <?php 
                                $count_tab = 1;
                                    foreach ($terms as $term) {
                                    $args = array(
                                        'post_type'      => 'tab_posts',
                                        'posts_per_page' => 10,
                                        'tax_query' => array(
                                            array(
                                                'taxonomy' => 'tab_posts_category',   // taxonomy name
                                                'field' => $term->slug,           // term_id, slug or name
                                                'terms' => $term->term_id,                  // term id, term slug or term name
                                            )
                                        )
                                    );
                                    $loop = new WP_Query($args);
                                    ?>
                                    <div id="<?php echo $term->slug?>" class="tab-pane fade <?php echo $count_tab==1?'active show':''; ?>">
                                        <div class="row">
                                            <?php
                                                while ( $loop->have_posts() ) {
                                                    $loop->the_post();
                                                    ?>
                                                    <div class="col-2">
                                                        <p><?php the_title(); ?></p>
                                                        <?php
                                                            if(has_post_thumbnail()){
                                                                the_post_thumbnail();
                                                            }
                                                        ?>
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
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="bottom-widgets">
                <div class="row">
                    <?php if ( is_active_sidebar( 'bottom_widget' ) ) : ?>
                        <?php dynamic_sidebar( 'bottom_widget' ); ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <div class="col-4 ">
            <div class="right_widgets">
                <?php if ( is_active_sidebar( 'right-sidebar' ) ) : ?>
                    <?php dynamic_sidebar( 'right-sidebar' ); ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
</section>

<?php 
get_footer();
?>