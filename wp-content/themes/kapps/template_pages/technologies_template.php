<?php
/*
 Template Name: Technologies
 layout Template Post Type: technologies
 */
?>

<?php get_header(); ?>
<main>
    <section>

        <?php
        $section_technologies_technologies = get_field('section_technologies_technologies');

        $args = array(
            'section_data' => $section_technologies_technologies
        );
        get_template_part( 'service_and_technologies_part', null, $args);
        ?>
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
                        $item_one_technologies_text = get_field('item_one_technologies_text', 'options');
                        if( $item_one_technologies_text ) { echo $item_one_technologies_text;}
                        ?>
                    </div>
                    <div class="services-text__item-two">
                        <?php
                        $item_two_technologies_text = get_field('item_two_technologies_text', 'options');
                        if( $item_two_technologies_text ) { echo $item_two_technologies_text;}
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

