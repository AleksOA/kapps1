<?php
/*
 Template Name: Member
 layout Template Post Type: team
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

    <?php
    $social_link_team_post = get_field('social_link_team_post');
    $specialization_team_post = get_field('specialization_team_post');
    $content_team_post = get_field('content_team_post');
    $content_main_team_single = get_field('content_main_team_single');

        if (have_posts()) : while (have_posts()) : the_post(); ?>
        <section>
            <div class="member-top">
                <div class="container">
                    <div class="member-top__wrapper">
                        <div class="member_top__item-name">
                            <h1 class="member_top__name" >
                                <?php if( get_the_title() ) { echo get_the_title() ;} ?>
                            </h1>
                        </div>
                        <div class="member_top__item-social">
                            <?php if( $social_link_team_post ) : foreach ( $social_link_team_post as $item ) :
                                $icon_social_team_post = $item["icon_social_team_post"];
                                $social_link_team_post = $item["social_link_team_post"];
                                ?>
                                <div class="member_top__item-social-item">
                                    <a class="member_top__item-social-item-link"
                                       href="<?php if( $social_link_team_post ) { echo $social_link_team_post ;} ?>"
                                       target="_blank">
                                        <?php display_svg( $icon_social_team_post, $class = 'member_top__item-social-item-img' ); ?>
                                    </a>
                                </div>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </div>
                        <div class="member_top__item-specialization">
                            <h3 class="member_top__item-specialization-text">
                                <?php if( $specialization_team_post ) { echo $specialization_team_post;} ?>
                            </h3>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section>
            <div class="member-content">
                <div class="container">
                    <div class="member-content__wrapper">
                        <div class="member-content__main">
                            <div class="member-content__main-item-one">
                                <div class="member-content__main-item-one-image">
                                    <?php the_post_thumbnail( 'thumb-team-single' ) ?>
                                </div>
                                <div class="member-content__main-item-two">
                                    <?php if( get_the_content() ) { echo get_the_content() ;} ?>
                                </div>
                                <?php if( $content_main_team_single ) { echo $content_main_team_single ;} ?>
                                <div class="member-content__desktop">
                                    <?php if( $content_team_post) { echo $content_team_post;} ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php endwhile; ?>
        <?php endif; ?>
    </section>

    <section>
        <?php  get_template_part( 'let_is_talk_part' );  ?>
    </section>

    <section>
        <?php
        $author_id_team_single = get_field('author_id_team_single');

        $recent_articles  = new WP_Query(array(
            'post_type' => 'post',
            'orderby' => 'date',
            'posts_per_page' => '10',
            'post_status' => 'publish',
            'author' => $author_id_team_single
        ));
        if (get_the_title()) :
            $arr = explode(" ", get_the_title());
            $first_name = $arr[0];
        endif;
        $section_title_recent_articles_team_single = get_field('section_title_recent_articles_team_single', 'options');
        $section_title_recent_articles = $first_name . $section_title_recent_articles_team_single;

        $args = array(
            'recent_articles' => $recent_articles,
            'section_title' => $section_title_recent_articles
        );
        get_template_part( 'recent_articles_part', null, $args);
        ?>
    </section>
</main>
<?php get_footer(); ?>

