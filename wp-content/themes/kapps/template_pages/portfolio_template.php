<?php
/*
  Template Name: Portfolio
 */
?>

<?php get_header(); ?>
<main>
    <section>
        <?php
        $section_top_portfolio = get_field('section_top_portfolio');

        $args = array(
            'section_data' => $section_top_portfolio
        );
        get_template_part( 'section_top_part', null, $args);
        ?>

    </section>

    <section>
        <div class="portfolio">
            <div class="portfolio__posts_background-top">
                <img src="<?php echo get_template_directory_uri() . '/assets/images/portfolio/background_top.png' ?>" alt="Watch">
            </div>
            <div class="portfolio__posts_background-center">
                <div class="portfolio__posts">
                    <div class="container">
                        <div class="portfolio__posts-wrapper">
                            <?php
                            $posts  = new WP_Query(array(
                                'post_type' => 'portfolio',
                                'post_status' => 'publish'
                            ));

                            $class = 'right';
                            if ( $posts ) :
                                while ( $posts->have_posts() ) :
                                    $posts->the_post();

                                    if($class == 'right'){
                                        $class = 'left';
                                    }else if($class == 'left'){
                                        $class = 'right';
                                    }
                                    ?>
                                    <article class="portfolio__posts-item <?php echo $class ?>">
                                        <div class="portfolio__posts-item-section-one">
                                            <div class="portfolio__posts-item-image">
                                                <?php the_post_thumbnail( 'thumb-portfolio' ) ?>
                                            </div>
                                        </div>
                                        <div class="portfolio__posts-item-section-two">
                                            <h3 class="portfolio__posts-item-section-right-title"><?php if( get_the_title() ) { echo get_the_title();} ?></h3>
                                            <?php if( get_the_content() ) { echo get_the_content() ;} ?>
                                        </div>
                                    </article>
                                  <?php endwhile; ?>
                                     <?php wp_reset_query(); ?>
                             <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="portfolio__posts_background-bottom">
                <img src="<?php echo get_template_directory_uri() . '/assets/images/portfolio/background_bottom.png' ?>" alt="Watch">
            </div>
        </div>
    </section>
</main>

<section>
    <?php  get_template_part( 'let_is_talk_part' );  ?>
</section>
<section>
    <?php  get_template_part( 'contacts_part' );  ?>
</section>
<?php get_footer(); ?>

