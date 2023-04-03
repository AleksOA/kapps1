<div class="recent-articles">
    <?php
    $posts = $args["recent_articles"];
    $section_title = $args["section_title"];
    ?>
    <div class="container">
        <h2 class="recent-articles__title">
            <?php if( $section_title) { echo $section_title ;} ?>
        </h2>
        <div class="recent-articles__slick">
            <?php if ( $posts ) : while ( $posts->have_posts() ) : $posts->the_post();?>
                <div class="recent-articles__slick-item">
                    <div class="recent-articles__slick-item-wrapper">
                        <div class="recent-articles__post-section-two">
                            <div class="recent-articles__post-section-two-top">
                                <div class="recent-articles__post-ratings">
                                    <?php echo do_shortcode('[ratemypost-result]') ?>
                                </div>
                                <div class="recent-articles__post-read">
                                    <div class="recent-articles__post-read-icon">
                                        <img src="<?php echo get_template_directory_uri() . '/assets/images/blog/read.svg' ?>" alt="watch">
                                    </div>
                                    <div class="recent-articles__post-read-value">
                                        <p>
                                            <?php
                                            $text = get_the_content();
                                            echo read_time($text, 200 );
                                            ?>
                                        </p>
                                    </div>
                                    <p class="recent-articles__post-read-label">min</p>
                                </div>
                                <div class="recent-articles__post-views">
                                    <div class="recent-articles__post-views-icon">
                                        <img src="<?php echo get_template_directory_uri() . '/assets/images/blog/views.svg' ?>" alt="watch">
                                    </div>
                                    <div class="recent-articles__post-views-value">
                                        <?php echo pvc_get_post_views(get_the_ID());
                                        ?>
                                    </div>
                                </div>
                            </div>
                            <div class="recent-articles__post-section-two-center">
                                <div class="recent-articles__post-section-one-image">
                                    <?php the_post_thumbnail( 'thumb-slider' ) ?>
                                </div>
                            </div>
                            <div class="recent-articles__post-section-two-bottom">
                                <div class="recent-articles__post-author">
                                    <div class="recent-articles__post-author-avatar">
                                        <?php $author_id = get_the_author_meta( 'ID' );
                                        $author_avatar = get_avatar($author_id,30, '', 'Andrew', array('class' => 'blog__avatar'));
                                        if( $author_avatar ) { echo $author_avatar ;} ?>
                                    </div>
                                    <p class="recent-articles__post-author-name">By <?php if( get_the_author() ) { echo get_the_author() ;} ?></p>
                                </div>
                                <p class="recent-articles__post-publication-times">
                                    <?php $item_number = get_the_time('F d, Y', get_the_ID() );
                                    if( $item_number ) { echo $item_number ;}
                                    ?>
                                </p>
                            </div>
                        </div>
                        <div class="recent-articles__slick-item-content">
                            <h3 class="recent-articles__slick-item-content-title">
                                <a href="<?php the_permalink(get_the_ID()); ?>">
                                    <?php if( get_the_title() ) { echo get_the_title();} ?>
                                </a>
                            </h3>
                            <p class="recent-articles__slick-item-content-text">
                                <?php
                                $arr = get_the_excerpt();
                                if( $arr ) { echo mb_strimwidth($arr , 0, 100);}
                                ?>
                                <a href="<?php the_permalink(get_the_ID()); ?>">...</a>
                            </p>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
                <?php wp_reset_query(); ?>
            <?php endif; ?>
        </div>
    </div>
</div>

