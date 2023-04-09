<?php
$title_contacts = get_field('title_contacts', 'options');
$text_one_contacts = get_field('text_one_contacts', 'options');
$text_two_contacts = get_field('text_two_contacts', 'options');
$contacts_contacts = get_field('contacts_contacts', 'options');
$background_image_contacts = get_field('background_image_contcts', 'options')["url"];
?>



<div class="contacts">
    <div class="container">
        <div class="contacts__wrapper">
            <h2 class="contacts__title">
                <?php if( $title_contacts ) { echo $title_contacts ;} ?>
            </h2>
            <?php if( $text_one_contacts ) {
                echo '<p class="contacts__text-one">' . $text_one_contacts . '</p>';
            } ?>
            <?php if( $text_two_contacts ) {
                echo '<p class="contacts__text-two">' . $text_two_contacts . '</p>';
            } ?>
            <div class="contacts__bottom">
                <div class="contacts__bottom-one">
                    <div class="contacts__bottom-one-items">
                        <?php if( $contacts_contacts) : foreach ( $contacts_contacts as $item ) :
                            $icon_contact_contacts = $item["icon_contact_contacts"]["url"];
                            $text_contact_contacts = $item["text_contact_contacts"];
                            $link_contact_contacts = $item["link_contact_contacts"];
                            ?>
                            <div class="contacts__bottom-one-item">
                                <div class="contacts__bottom-one-item-image">
                                    <object class="contacts__bottom-one-item-img" type="image/svg+xml" data="<?php echo $icon_contact_contacts ?>"></object>
                                </div>
                                <a class="contacts__bottom-one-item-link" href="<?php if( $link_contact_contacts ) { echo $link_contact_contacts ;} ?>" target="_blank">

                                    <p class="contacts__bottom-one-item-text"><?php if( $text_contact_contacts ) { echo $text_contact_contacts ;} ?></p>
                                </a>
                            </div>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="contacts__bottom-two">
                    <div class="contacts__bottom-two-items">
                        <div class="contacts__bottom-two-item-image">
                            <?php display_svg( $background_image_contacts, 'contacts__bottom-two-item-img') ?>
                        </div>
                        <div class="contacts__bottom-two-item-form">
                            <?php  get_template_part( 'contact_form_part' );  ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
