<?php
/*
 Template Name: Services
 layout Template Post Type: services
 */
?>

<?php get_header(); ?>
<main>
    <section>
       <div class="onert" style="width: 100%; height: 180px"></div>
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
                        $item_one_services_text = get_field('item_one_services_text');
                        if( $item_one_services_text ) { echo $item_one_services_text;}
                        ?>
                    </div>
                    <div class="services-text__item-two">
                        <?php
                        $item_two_services_text = get_field('item_two_services_text');
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

</main>
<?php get_footer(); ?>
