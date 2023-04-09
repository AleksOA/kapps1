<?php
$section_title_services = get_field('section_title_services', 'options');
$section_services = get_field('section_services', 'options');
?>
<div class="services-menu">
    <div class="services-menu__wrapper">
        <div class="container">
            <h2 class="services-menu__title">
                <?php if( $section_title_services ) { echo $section_title_services ;} ?>
            </h2>
            <div class="services-menu__items">
                <?php if( $section_services ) : foreach ( $section_services as $item ) :
                    $services_image = $item["services_image"]["url"];
                    $services_text = $item["services_text"];
                    $services_link = $item["services_link"];
                    ?>
                    <div class="services-menu__item">
                        <div class="services-menu__item-body">
                            <a class="services-menu__item-link" href="<?php echo get_permalink($services_link) ?>">
                                <span class="services-menu__item-cover">c</span>
                            </a>
                            <div class="services-menu__item-image">
                                <?php display_svg( $services_image, 'services-menu__item-img') ?>
                            </div>
                            <h4 class="services-menu__item-title">
                                <?php if( $services_text ) { echo $services_text ;} ?>
                            </h4>
                        </div>
                    </div>
                <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
