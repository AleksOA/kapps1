<?php
/*
  Template Name: Team
 */
?>

<?php get_header(); ?>
<main>
    <div class="section__top">
        <div class="container">
            <div class="serv-tech__section-one">
                <div class="serv-tech__section-one-left">
                    <?php custom_breadcrumbs(); ?>
                </div>
            </div>
        </div>
    </div>
    <section>
        <?php  $team  = new WP_Query(array(
            'post_type' => 'team',
            'post_status' => 'publish'
        ));

        $section_title_team = get_field('section_title_team');
        ?>
        <div class="team">
            <div class="container">
                <div class="team__wrapper">
                    <h1 class="team__title">
                        <?php if( $section_title_team ) { echo $section_title_team ;} ?>
                    </h1>
                    <div class="team__items">
                        <?php if ( $team  ) : while ( $team->have_posts() ) : $team->the_post();?>
                            <article class="team__item">
                                <div class="team__posts-item-wrapper">
                                    <div class="team__posts-item-image">
                                        <?php the_post_thumbnail( 'thumb-team-page' ) ?>
                                    </div>
                                    <div class="team__posts-item-text">
                                        <h3 class="team__posts-item-section-right-title">
                                            <a href="<?php the_permalink(get_the_ID()); ?>">
                                                <?php if( get_the_title() ) :
                                                    $arr = explode(" ", get_the_title());
                                                    $first_name = $arr[0];
                                                    echo $first_name;
                                                endif;?>
                                            </a>
                                        </h3>
                                        <?php if( get_the_excerpt() ) { echo get_the_excerpt() ;} ?>
                                    </div>
                                </div>
                            </article>
                        <?php endwhile; ?>
                            <?php wp_reset_query(); ?>
                        <?php endif; ?>
                    </div>
                </div>
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
<section>
    <?php  get_template_part( 'recent_projects_part' );  ?>
</section>
<?php get_footer(); ?>


