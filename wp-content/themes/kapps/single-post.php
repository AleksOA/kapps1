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
    $social_link_team_post = get_field('social_link_team_post');
    $specialization_team_post = get_field('specialization_team_post');
    $content_team_post = get_field('content_team_post');
    $content_main_team_single = get_field('content_main_team_single');

    if (have_posts()) : while (have_posts()) : the_post(); ?>
        <?php $current_post_ID = get_the_ID(); ?>
        <?php if (function_exists ('the_views')) { the_views (); } ?>
            <div class="blog-post">
                <div class="container">
                    <h2 class="blog-post__title">
                        <?php if( get_the_title() ) { echo get_the_title() ;} ?>
                    </h2>
                    <div class="blog-post__top-content">
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
                                            echo read_time($text, 200 ) ;
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
                                <div class="blog__share">
                                    <div class="blog__share-button">
                                        <button class="blog__share-btn">
                                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <g clip-path="url(#clip0_179_0)">
                                                        <path d="M22.2343 20.0001C22.2343 18.2051 20.7793 16.7499 18.9843 16.7499C17.1893 16.7499 15.7344 18.2051 15.7344 20.0001C15.7344 21.7949 17.1893 23.25 18.9843 23.25C20.7793 23.25 22.2343 21.7949 22.2343 20.0001Z" fill="#B1B1B1"/>
                                                        <path d="M18.9843 15.9999C16.7783 15.9999 14.9844 17.794 14.9844 20.0001C14.9844 22.2059 16.7783 24 18.9843 24C21.1904 24 22.9843 22.2059 22.9843 20.0001C22.9843 17.794 21.1904 15.9999 18.9843 15.9999ZM18.9843 22.5C17.6053 22.5 16.4844 21.3779 16.4844 20.0001C16.4844 18.622 17.6053 17.4999 18.9843 17.4999C20.3633 17.4999 21.4843 18.622 21.4843 20.0001C21.4843 21.3779 20.3633 22.5 18.9843 22.5Z" fill="#B1B1B1"/>
                                                        <path d="M22.2343 3.99988C22.2343 2.20508 20.7793 0.749939 18.9843 0.749939C17.1893 0.749939 15.7344 2.20508 15.7344 3.99988C15.7344 5.79486 17.1893 7.25 18.9843 7.25C20.7793 7.25 22.2343 5.79486 22.2343 3.99988Z" fill="#B1B1B1"/>
                                                        <path d="M18.9843 -6.10352e-05C16.7783 -6.10352e-05 14.9844 1.79401 14.9844 3.99988C14.9844 6.20593 16.7783 8 18.9843 8C21.1904 8 22.9843 6.20593 22.9843 3.99988C22.9843 1.79401 21.1904 -6.10352e-05 18.9843 -6.10352e-05ZM18.9843 6.5C17.6053 6.5 16.4844 5.37793 16.4844 3.99988C16.4844 2.62201 17.6053 1.49994 18.9843 1.49994C20.3633 1.49994 21.4843 2.62201 21.4843 3.99988C21.4843 5.37793 20.3633 6.5 18.9843 6.5Z" fill="#B1B1B1"/>
                                                        <path d="M8.23444 12.0001C8.23444 10.2051 6.7793 8.75012 4.98431 8.75012C3.18951 8.75012 1.73438 10.2051 1.73438 12.0001C1.73438 13.795 3.18951 15.25 4.98431 15.25C6.7793 15.25 8.23444 13.795 8.23444 12.0001Z" fill="#B1B1B1"/>
                                                        <path d="M4.98431 8.00012C2.77844 8.00012 0.984375 9.79401 0.984375 12.0001C0.984375 14.2061 2.77844 16 4.98431 16C7.19037 16 8.98444 14.2061 8.98444 12.0001C8.98444 9.79401 7.19037 8.00012 4.98431 8.00012ZM4.98431 14.5C3.60535 14.5 2.48438 13.3781 2.48438 12.0001C2.48438 10.622 3.60535 9.50012 4.98431 9.50012C6.36346 9.50012 7.48444 10.622 7.48444 12.0001C7.48444 13.3781 6.36346 14.5 4.98431 14.5Z" fill="#B1B1B1"/>
                                                        <path d="M7.34475 12.4797C6.99666 12.4797 6.65865 12.6608 6.47463 12.9847C6.20162 13.4637 6.36971 14.0748 6.84871 14.3489L16.1276 19.6388C16.6066 19.9138 17.2176 19.7457 17.4917 19.2649C17.7647 18.7859 17.5966 18.1749 17.1176 17.9007L7.83858 12.6108C7.68258 12.5218 7.51266 12.4797 7.34475 12.4797Z" fill="#B1B1B1"/>
                                                        <path d="M16.6236 4.22992C16.4555 4.22992 16.2856 4.27203 16.1296 4.36102L6.85053 9.65094C6.37153 9.92395 6.20362 10.535 6.47663 11.0151C6.74854 11.495 7.36048 11.664 7.84058 11.389L17.1196 6.09906C17.5986 5.82605 17.7665 5.21503 17.4935 4.73492C17.3086 4.41101 16.9706 4.22992 16.6236 4.22992Z" fill="#B1B1B1"/>
                                                    </g>
                                                    <defs>
                                                        <clipPath id="clip0_179_0">
                                                            <rect width="24" height="24" fill="white" transform="matrix(1 0 0 -1 0 24)"/>
                                                        </clipPath>
                                                    </defs>
                                                </svg>
                                        </button>
                                    </div>
                                    <ul class="blog__share-items">
                                        <li class="share-item share-item--facebook">
                                            <a href="https://www.facebook.com/sharer.php?u=<?php the_permalink(); ?>&t=<?php the_title(); ?>" class="share-link share-link--facebook" rel="nofollow" target="_blank">
                                                <i class="fa-brands fa-facebook" aria-hidden="true"></i>
                                            </a>
                                        </li>
                                        <li class="share-item share-item--linkedin">
                                            <a class="share-link share-link--linkedin" href="http://www.linkedin.com/shareArticle?mini=true&url=<?php the_permalink() ?>&title=<?php the_title(); ?>&summary=&source=<?php bloginfo('name'); ?>" rel="nofollow" target="_blank">
                                                <i class="fa-brands fa-linkedin" aria-hidden="true"></i>
                                            </a>
                                        </li>
                                        <li class="share-item share-item--tw">
                                            <a href="https://twitter.com/share?url=<?php the_permalink(); ?>&text=<?php the_title(); ?>&hashtags=my_hashtag" class="share-link share-link--tw" rel="nofollow" target="_blank">
                                                <i class="fa fa-twitter" aria-hidden="true"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="blog__post-section-two-center">
                                <div class="blog__post-section-one-image">
                                    <?php the_post_thumbnail( 'thumb-blog-single' ) ?>
                                </div>
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
                    <div class="blog-post__text-content">
                        <div class="blog-post__text-content-text">
                            <?php
                            global $post;
                            echo apply_filters( 'the_content', $post->post_content );
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section>
            <?php
                $section_ratings_title_blog_single = get_field('section_ratings_title_blog_single', 'options');
            ?>
            <div class="ratings-post">
                <div class="container">
                    <div class="ratings-post__wrapper">
                        <div class="ratings-post__post-ratings">
                            <?php echo do_shortcode('[ratemypost]') ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <?php endwhile; ?>
        <?php endif; ?>

    <section>
        <?php
        $team_member = get_field('team_member');
        $team_member_ID = $team_member[0]->ID;

        $args = array(
                'post_type' => 'team',
                'post_status' => 'publish',
                'p' => $team_member_ID,
        );
        $post_member = new WP_Query($args);


        $social_link_team_post = get_field('social_link_team_post',$team_member_ID);
        $specialization_team_post = get_field('specialization_team_post',$team_member_ID);
        $content_team_post = get_field('content_team_post',$team_member_ID);

        $section_title_about_the_author = get_field('section_title_about_the_author', 'options');



        if ( $post_member) : while ( $post_member->have_posts() ) : $post_member->the_post();?>
            <div class="about-author">
                <div class="container">
                    <div class="about-author__wrapper">
                        <h3 class="about-author__section-title">
                            <?php if( $section_title_about_the_author ) { echo $section_title_about_the_author ;} ?>
                        </h3>
                        <div class="about-author__content-wrapper">
                            <div class="about-author__section-one">
                                <div class="about-author__images">
                                    <?php the_post_thumbnail( 'thumbnail') ?>
                                </div>
                            </div>
                            <div class="about-author__section-two">
                                <div class="about-author__top">
                                    <div class="about-author__top-wrapper">
                                        <div class="about-author__item-name">
                                            <h4 class="about-author__name" >
                                                <a href="<?php the_permalink($team_member_ID); ?>">
                                                    <?php if( get_the_title() ) { echo get_the_title() ;} ?>
                                                </a>
                                            </h4>
                                        </div>
                                        <div class="about-author__item-social">
                                            <?php if( $social_link_team_post ) : foreach ( $social_link_team_post as $item ) :
                                                $icon_social_team_post = $item["icon_social_team_post"];
                                                $social_link_team_post = $item["social_link_team_post"];
                                                ?>
                                                <div class="about-author__item-social-item">
                                                    <a class="about-author__item-social-item-link"
                                                       href="<?php if( $social_link_team_post ) { echo $social_link_team_post ;} ?>"
                                                       target="_blank">
                                                        <?php display_svg( $icon_social_team_post, $class = 'about-author__item-social-item-img' ); ?>
                                                    </a>
                                                </div>
                                            <?php endforeach; ?>
                                            <?php endif; ?>
                                        </div>
                                        <div class="about-author__item-specialization">
                                            <p class="about-author__item-specialization-text">
                                                <?php if( $specialization_team_post ) { echo $specialization_team_post;} ?>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="about-author__text-content">
                                    <p class="about-author__text-content-text"><?php if( get_the_excerpt() ) { echo get_the_excerpt() ;} ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endwhile; ?>
            <?php wp_reset_query(); ?>
        <?php endif; ?>
    </section>
</main>
    <section>
        <?php  get_template_part( 'let_is_talk_part' );  ?>
    </section>

    <section>
        <?php
        $recent_articles  = new WP_Query(array(
            'post_type' => 'post',
            'orderby' => 'date',
            'posts_per_page' => '10',
            'post_status' => 'publish',
            'post__not_in' => array( $current_post_ID)
        ));

        $section_title_recent_articles = get_field('section_title_recent_articles_blog_single', 'options');

        $args = array(
            'recent_articles' => $recent_articles,
            'section_title' => $section_title_recent_articles
        );
        get_template_part( 'recent_articles_part', null, $args);
        ?>
    </section>

<?php get_footer(); ?>
