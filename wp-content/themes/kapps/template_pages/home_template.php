<?php
/*
  Template Name: Home
 */
?>

<?php get_header(); ?>
<main>
    <section>
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

    <section>
        <?php  get_template_part( 'clutch_part' );  ?>
    </section>

    <section>

        <div class="services">
            <div class="container">
                <div class="services__wrapper">
                    <?php $title_section_home_services = get_field('title_section_home_services');?>
                    <h2 class="services__section-title">
                        <?php if($title_section_home_services) {echo $title_section_home_services;} ?>
                    </h2>
                    <?php $service_home_services = get_field('service_home_services');
                    if($service_home_services) :foreach ($service_home_services as $key => $item) : ?>
                        <?php
                        $class = '';
                        if($key % 2 == 0) {
                            $class = 'right';
                        }
                        $image_home_services = $item["imade_home_services"]["url"];
                        $title_home_services = $item["title_home_services"];
                        $description_home_services = $item["description_home_services"];
                        $id_post_home_services = $item["id_post_home_services"];
                        $description_mobile_home_services = $item["description_mobile_home_services"];
                        ?>
                        <div class="services__item">
                            <div class="services__section-text <?php echo $class ?>">
                                <a class="services__title-link" href="<?php echo get_permalink($id_post_home_services); ?>">
                                    <h3 class="services__title">
                                       <?php if($title_home_services) {echo $title_home_services ;} ?>
                                    </h3>
                                </a>
                                <p class="services__text">
                                    <?php if($description_home_services) {echo $description_home_services ;} ?>
                                </p>
                                <p class="services__text-mobile">
                                    <?php if($description_mobile_home_services) {echo $description_mobile_home_services ;} ?>
                                </p>
                            </div>
                            <div class="services__section-image <?php echo $class ?>">
                                <div class="services__image-wrapper">
                                   <?php if($image_home_services) : ?>
                                        <?php display_svg( $image_home_services, 'svgGlasses') ?>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>
    <section>
        <?php  get_template_part( 'let_is_talk_part' );  ?>
    </section>
    <section>
        <div class="achievement">
            <div class="container">
                <?php
                $section_title_home_achievement = get_field('section_title_home_achievement');
                ?>
                <div class="achievement__wrapper">
                    <h2 class="achievement__title">
                        <?php if( $section_title_home_achievement ) { echo $section_title_home_achievement ;} ?>
                    </h2>
                    <div class="achievement__items">
                        <?php
                        $achievement_home_achievement = get_field('achievement_home_achievement');
                        if($achievement_home_achievement) : foreach ($achievement_home_achievement as $item) :
                            $image_home_achievement = $item["image_home_achievement"]["url"];
                            $text_home_achievement = $item["text_home_achievement"];
                            ?>
                            <div class="achievement__item">
                                <div class="achievement__image">
                                    <?php display_svg( $image_home_achievement, 'achievement__img') ?>
                                </div>
                                <div class="achievement__text">
                                    <?php if( $text_home_achievement ) { echo $text_home_achievement ;} ?>
                                </div>
                            </div>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section>
        <?php
        $section_title_home_partners = get_field('section_title_home_partners');
        ?>
        <div class="partners">
            <div class="partner__background-top">
                <img class="partner__background-top-img" src="<?php echo get_template_directory_uri() . '/assets/images/home/background_top.png' ?>" alt="Wave">
            </div>
            <div class="partner__background-center">
                <div class="partners__wrapper">
                    <div class="container">
                        <h2 class="partners__title">
                            <?php if( $section_title_home_partners ) { echo $section_title_home_partners ;} ?>
                        </h2>
                        <div class="partners__items">
                            <?php
                            $logo_home_partners = get_field('logo_home_partners');
                            if($logo_home_partners): foreach ($logo_home_partners as $item) :
                                if($item["logo_image_home_partners"] == false){
                                    $logo_image_home_partners_url = false;
                                    $logo_image_home_partners_alt = false;
                                } else{
                                    $logo_image_home_partners_url = $item["logo_image_home_partners"]["url"];
                                    $logo_image_home_partners_alt = $item["logo_image_home_partners"]["alt"];
                                }

                                ?>
                                    <div class="partner__item hidden">
                                        <div class="partner__item-body">
                                            <div class="partner__item-cover"></div>
                                            <?php if( $logo_image_home_partners_url != false) :
                                                echo '<div class="partner__item-logo">';
                                                    echo '<img class="partner__item-logo-img"';
                                                        echo 'src="' . $logo_image_home_partners_url . '"';
                                                        echo 'alt="' . $logo_image_home_partners_alt . '"';
                                                    echo '>';
                                                echo '</div>';
                                             endif; ?>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </div>
                        <div class="partner__button">
                            <button class="partner__btn-more hidden2">Show more</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="partner__background-bottom">
                <img class="partner__background-bottom-img" src="<?php echo get_template_directory_uri() . '/assets/images/home/background_bottom.png' ?>" alt="Wave">
            </div>
        </div>
    </section>

    <section>
        <?php  get_template_part( 'contacts_part' );  ?>
    </section>

</main>
<?php get_footer(); ?>

