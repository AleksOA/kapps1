<?php
/*
  Template Name: Portfolio
 */
?>

<?php get_header(); ?>
<main>
    <div class="sdsfsdf" style="padding-top: 200px;"></div>

    <div class="posts">
        <?php
        $posts  = new WP_Query(array(
            'post_type' => 'portfolio',
            'post_status' => 'publish'
        ));

        if ( $posts ) :
            while ( $posts->have_posts() ) :
                $posts->the_post();?>
                <h2 class="title"><?php if( get_the_title() ) { echo get_the_title();} ?></h2>
                <p><?php if( get_the_excerpt() ) { echo get_the_excerpt() ;} ?></p>
                <p><?php if( get_the_content() ) { echo get_the_content() ;} ?></p>
                <?php the_post_thumbnail( 'thumb-portfolio' ) ?>
                <?php the_post_thumbnail( 'thumb-slider' ) ?>
              <?php endwhile; ?>
                 <?php wp_reset_query(); ?>
         <?php endif; ?>
    </div>
</main>


<?php get_footer(); ?>

