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
        <?php
        $section_title_blog = get_field('section_post_title_blog_page', 'options');;
        ?>
        <div class="blog">
            <div class="blog__wrapper">
                <div class="container">
                    <h1 class="blog__title">
                        <?php if( $section_title_blog ) { echo $section_title_blog ;} ?>
                    </h1>
                </div>
                <div class="blog__posts-wrapper">
                    <div class="blog__posts_background-top">
                        <img class="blog__posts_background-top-img" src="<?php echo get_template_directory_uri() . '/assets/images/blog/background_image_blog_top.png' ?>" alt="Wave">
                    </div>
                    <div class="blog__posts_background-center">
                        <div class="container">
                            <div class="blog__posts">
                                <?php if (have_posts()) : while (have_posts() ) : the_post();?>
                                    <?php if (function_exists ('the_views')) { the_views (); } ?>

                                    <article>
                                        <div class="blog__post">
                                            <div class="blog__post-section-one">
                                                <div class="blog__post-section-one-image">
                                                    <a href="<?php the_permalink(get_the_ID()); ?>">
                                                        <?php the_post_thumbnail( 'thumb-blog-page' ) ?>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="blog__post-section-two">
                                                <div class="blog__post-section-two-top">
                                                    <div class="blog__post-ratings">
                                                        <?php echo do_shortcode('[ratemypost-result]') ?>
                                                    </div>
                                                    <div class="blog__post-read">
                                                        <div class="blog__post-read-icon">
                                                            <img src="<?php echo get_template_directory_uri() . '/assets/images/blog/read.svg' ?>" alt="watch">
                                                        </div>
                                                        <div class="blog__post-read-value">
                                                            <p>
                                                                <?php
                                                                $text = get_the_content();
                                                                echo read_time($text, 200);
                                                                ?>
                                                            </p>
                                                        </div>
                                                        <p class="blog__post-read-label">min read</p>
                                                    </div>
                                                    <div class="blog__post-views">
                                                        <div class="blog__post-views-icon">
                                                            <img src="<?php echo get_template_directory_uri() . '/assets/images/blog/views.svg' ?>" alt="watch">
                                                        </div>
                                                        <div class="blog__post-views-value">
                                                            <?php echo do_shortcode('[post-views]') ?>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="blog__post-section-two-center">
                                                    <h5 class="blog__post-title">
                                                        <?php $arr = get_the_excerpt();?>
                                                        <a href="<?php the_permalink(get_the_ID()); ?>"><?php echo mb_strimwidth($arr , 0, 56); ?></a>
                                                    </h5>
                                                    <p class="blog__post-excerpt">
                                                        <?php if( get_the_excerpt() ) { echo get_the_excerpt() ;} ?>
                                                        <a href="<?php the_permalink(get_the_ID()); ?>">...</a>
                                                    </p>
                                                </div>
                                                <div class="blog__post-section-two-bottom">
                                                    <div class="blog__post-author">
                                                        <div class="blog__post-author-avatar">
                                                            <?php $author_id = get_the_author_meta( 'ID' );
                                                            $author_avatar = get_avatar($author_id,30, '', 'Andrew', array('class' => 'blog__avatar'));
                                                             if( $author_avatar ) { echo $author_avatar ;} ?>
                                                        </div>
                                                        <p class="blog__post-author-name">By <?php if( get_the_author() ) { echo get_the_author() ;} ?></p>
                                                    </div>
                                                    <p class="blog__post-publication-times">
                                                        <?php $item_number = get_the_time('F d, Y', get_the_ID() );
                                                        if( $item_number ) { echo $item_number ;}
                                                        ?>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </article>
                                <?php endwhile; ?>
                                    <?php the_posts_pagination(); ?>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <div class="blog__posts_background-bottom">
                        <img class="blog__posts_background-bottom-img" src="<?php echo get_template_directory_uri() . '/assets/images/blog/background_image_blog_bottom.png' ?>" alt="Wave">
                    </div>
                </div>
            </div>

        </div>
    </section>

</main>
    <?php get_footer(); ?>
