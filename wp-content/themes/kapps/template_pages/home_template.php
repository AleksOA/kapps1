<?php
/*
  Template Name: Home
 */
?>

<?php get_header(); ?>
<main>
    <section>
<!--        <div class="banner__wrapper">-->
<!---->
<!--        </div>-->

        <div class="banner">
            <?php $slide_home_banner=get_field('slide_home_banner'); ?>
            <div class="banner__slick">
                <?php if($slide_home_banner) :foreach ($slide_home_banner as $item) :
                    $image_url= $item["background_image_home_banner"]["url"];
                    $image_alt= $item["background_image_home_banner"]["alt"];
                    $title_one= $item["title_one_home_banner"];
                    $title_one_colo= $item["title_one_color_home_banner"];
                    $title_two= $item["text_two_home_banner"];
                    $title_two_color= $item["title_two_collor_home_banner"];
                    $text= $item["text_home_banner"];
                    $text_color= $item["text_color_home_banner"];
                    $text_button_one= $item["taxt_button_one"];
                    $link_button_one= $item["link_button_one"];
                    $text_button_two= $item["text_button_two_home_banner"];
                    $link_button_two= $item["link_button_two_home_banner"];
                    ?>
                        <div class="banner__slick-item">
                            <div class="banner__slick-item-wrapper">
                                <div class="banner__slick-item-image">
                                    <img class="banner__slick-item-img"
                                         src="<?php if( $image_url ) { echo $image_url ;} ?>"
                                         alt="<?php if( $image_alt ) { echo $image_alt;} ?>"
                                    >
                                </div>
                                <div class="container">
                                    <div class="banner__slick-item-content">
                                        <?php if( $title_one ) { echo '<h1 class="banner__slick-item-title-one" style="color:' . $title_one_colo .' ">' . $title_one . '</h1>';} ?>
                                        <?php if( $title_two ) { echo '<h2 class="banner__slick-item-title-two" style="color:' . $title_two_color .' ">' . $title_two . '</h2>';} ?>
                                        <?php if( $text ) { echo '<div class="banner__slick-item-text" style="color:' . $text_color .' ">' . $text . '</div>';} ?>
                                    </div>
                                    <?php if( $text_button_one && $link_button_one || $text_button_two && $link_button_two ) : echo
                                    '<div class="banner__slick-item-buttons">';
                                        if( $text_button_one && $link_button_one) { echo '<a class="banner__slick-item-button-one btn-secondary-link" href="' . get_permalink($link_button_one) . '">' . $text_button_one . '</a>' ;}
                                        if( $text_button_two && $link_button_two) { echo '<a class="banner__slick-item-button-two btn-primary-link" href="' . get_permalink($link_button_two) . '">' . $text_button_two . '</a>' ;}
                                    echo '</div>';
                                    endif;?>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
            <div class="container">
                <div class="banner__dots"></div>
            </div>

        </div>
    </section>


    <section>
        <?php
            $title_home_technologies = get_field('title_home_technologies');
            $text_one_home_technologies = get_field('text_one_home_technologies');
            $buttons_home_technologies = get_field('buttons_home_technologies');
            $text_two_home_technologies = get_field('text_two_home_technologies');
        ?>
        <div class="container">
            <div class="technologies">
                <h2 class="technologies__title"><?php if( $title_home_technologies  ) { echo $title_home_technologies  ;} ?></h2>
                <p class="technologies__text-one">
                    <span class="technologies__word-first">Stan's</span> <span class="technologies__word-second">Assets</span> <?php if( $text_one_home_technologies ) { echo $text_one_home_technologies ;} ?>
                </p>
                <div class="technologies__buttons">
                    <?php if( $buttons_home_technologies ) : foreach ( $buttons_home_technologies as $button ) : ?>
                       <?php
                        $url = $button["image_on_the_button_home_technologies"]["url"];
                        $alt = $button["image_on_the_button_home_technologies"]["alt"];
                        $background_color = $button["background_color_button_home_technologies"];
                        $ID_post = $button["id_post_home_technologies"];
                        ?>
                        <div class="technologies__button" style="background-color: <?php if( $background_color ) { echo $background_color ;} ?>">
                            <a class="technologies__button-link" href="<?php if( $ID_post ) { echo get_permalink($ID_post) ;} ?>">

                                <img class="technologies__button-img"
                                        src="<?php if( $url ) { echo $url ;} ?>"
                                        alt="<?php if( $alt ) { echo $alt ;} ?>"
                                >
                            </a>
                        </div>
                    <?php endforeach; ?>
                    <?php endif; ?>

                </div>
                <p class="technologies__text-two"><?php if( $text_two_home_technologies ) { echo $text_two_home_technologies ;} ?></p>
            </div>
        </div>
    </section>

</main>
<?php get_footer(); ?>

