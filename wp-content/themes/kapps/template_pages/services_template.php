<?php
/*
 Template Name: Services
 layout Template Post Type: services
 */
?>

<?php get_header(); ?>
<main>
    <section>

        <?php
        $section_service_services = get_field('section_service_services');

        $args = array(
            'section_data' => $section_service_services
        );
        get_template_part( 'service_and_technologies_part', null, $args);
        ?>
    </section>

    <section>
        <?php  get_template_part( 'clutch_part' );  ?>
    </section>

    <section>
        <?php  get_template_part( 'services_menu_part' );  ?>
    </section>

    <section>
        <?php  get_template_part( 'let_is_talk_part' );  ?>
    </section>

    <section>
        <div class="services-text">
            <div class="container">
                <div class="services-text__wrapper">
                    <div class="services-text__item-one">
                        <?php
                        $item_one_services_text = get_field('item_one_services_text', 'options');
                        if( $item_one_services_text ) { echo $item_one_services_text;}
                        ?>
                    </div>
                    <div class="services-text__item-two">
                        <?php
                        $item_two_services_text = get_field('item_two_services_text', 'options');
                        if( $item_two_services_text ) { echo $item_two_services_text;}
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section>
        <?php  get_template_part( 'contacts_part' );  ?>
    </section>

    <section>
        <?php  get_template_part( 'recent_projects_part' );  ?>
    </section>

    <section>
        <?php  get_template_part( 'faq_part' );  ?>
    </section>

</main>
<?php get_footer(); ?>
