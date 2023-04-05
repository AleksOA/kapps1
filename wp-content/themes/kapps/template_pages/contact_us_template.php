<?php
/*
 Template Name: Contact us
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
        <?php
        $section_title_and_text_contact_us = get_field('section_title_and_text_contact_us');
        ?>
        <div class="contact-top">
            <div class="container">
                <div class="contact-top__wrapper">
                    <div class="contact-top__section-one">
                        <?php if( $section_title_and_text_contact_us ) { echo $section_title_and_text_contact_us ;} ?>
                    </div>
                    <div class="contact-top__section-two">
                        <div class="contact-top__section-two-form">

                            <?php
                            $text_for_the_form_contact_us = get_field('text_for_the_form_contact_us');

                            $args = array(
                                'section_data' => $text_for_the_form_contact_us
                            );
                            get_template_part( 'contact_form_part', null, $args );
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="contacts-contact">
            <div class="contacts-contact__wrapper">
                <div class="contacts-contact__background-image">
                    <img class="contacts-contact__background-img"
                         src="<?php echo get_template_directory_uri() . '/assets/images/contacts_page/background_image_contact_us.svg' ?>"
                         alt="Wave background">
                </div>
                <div class="contacts-contact__background-image-mobile">
                    <img class="contacts-contact__background-img"
                         src="<?php echo get_template_directory_uri() . '/assets/images/contacts_page/background_image_mobile_contact_us.svg' ?>"
                         alt="Wave background">
                </div>
                <div class="container">
                    <div class="contacts-contact__contacts-wrapper">
                        <?php
                        $column_one_contact_us = get_field('column_one_contact_us');
                        $column_two_contact_us = get_field('column_two_contact_us');
                        ?>
                        <?php
                        if($column_one_contact_us) : ?>

                        <div class="contacts-contact__contacts-column-one">
                            <?php  foreach ($column_one_contact_us as $item ) :
                                $icon_column_one_contact_us = $item["icon_contacts_us"]["url"];
                                $text_column_one_contact_us = $item["text_contact_us"];
                                $link_contact_us = $item["link_contact_us"];
                                ?>

                                <div class="contacts-contact__contacts-item">
                                    <div class="contacts-contact__contacts-item-image">
                                        <object class="contacts-contact__contacts-item-img" type="image/svg+xml" data="<?php if( $icon_column_one_contact_us ) { echo $icon_column_one_contact_us ;} ?>"></object>
                                    </div>
                                    <a class="contacts-contact__contacts-item-link" href="<?php if( $link_contact_us ) { echo $link_contact_us ;} ?>" target="_blank">
                                        <p class="contacts-contact__contacts-item-text"><?php if( $text_column_one_contact_us ) { echo $text_column_one_contact_us ;} ?></p>
                                    </a>
                                </div>
                                <?php endforeach; ?>
                        </div>
                        <?php endif; ?>

                        <?php if($column_two_contact_us) : ?>

                        <div class="contacts-contact__contacts-column-two">
                            <?php  foreach ($column_two_contact_us as $item ) :
                                $icon_column_two_contact_us = $item["icon_column_two_contact_us"]["url"];
                                $text_column_two_contact_us = $item["text_column_two_contact_us"];
                                $link_column_two_contact_us = $item["link_column_two_contact_us"];
                                ?>

                                <div class="contacts-contact__contacts-item">
                                    <div class="contacts-contact__contacts-item-image">
                                        <object class="contacts-contact__contacts-item-img" type="image/svg+xml" data="<?php if( $icon_column_two_contact_us ) { echo $icon_column_two_contact_us ;} ?>"></object>
                                    </div>
                                    <a class="contacts-contact__contacts-item-link" href="<?php if( $link_column_two_contact_us ) { echo $link_column_two_contact_us ;} ?>" target="_blank">
                                        <p class="contacts-contact__contacts-item-text"><?php if( $text_column_two_contact_us ) { echo $text_column_two_contact_us ;} ?></p>
                                    </a>
                                </div>
                            <?php endforeach; ?>
                        </div>
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
    <?php  get_template_part( 'recent_projects_part' );  ?>
</section>

<?php get_footer(); ?>


