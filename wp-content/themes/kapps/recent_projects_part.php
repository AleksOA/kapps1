<div class="recent-projects">
    <div class="recent-projects__background" style="background-image: url('<?php echo get_template_directory_uri() . '/assets/images/poprtfolio/background_recent_projects.svg' ?>')" >
    <?php  $recent_projects  = new WP_Query(array(
        'post_type' => 'portfolio',
        'orderby' => 'date',
        'posts_per_page' => '10',
        'post_status' => 'publish'
    ));

    $section_title_recent_projects = get_field('section_title_recent_projects', 'options');
    ?>
    <div class="container">
        <h2 class="recent-projects__title">
            <?php if( $section_title_recent_projects) { echo $section_title_recent_projects ;} ?>
        </h2>
        <div class="recent-projects__slick">
            <?php if ( $recent_projects ) : while ( $recent_projects->have_posts() ) : $recent_projects->the_post();?>
                    <div class="recent-projects__slick-item">
                        <div class="recent-projects__slick-item-wrapper">
                            <div class="recent-projects__slick-item-image">
                                <?php the_post_thumbnail( 'thumb-slider' ) ?>
                            </div>
                            <div class="recent-projects__slick-item-content">
                                <a class="recent-projects__slick-item-content-title-link" href="<?php echo get_permalink(36)?>">
                                    <h3 class="recent-projects__slick-item-content-title"><?php if( get_the_title() ) { echo get_the_title();} ?></h3>
                                </a>
                                <p class="recent-projects__slick-item-content-text"><?php if( get_the_excerpt() ) { echo get_the_excerpt() ;} ?></p>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
                <?php wp_reset_query(); ?>
            <?php endif; ?>
        </div>
    </div>
    </div>
</div>
