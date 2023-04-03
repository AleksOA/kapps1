<?php get_header(); ?>
<main>
    <?php
    $image_404_page = get_field('image_404_page', 'options');
    $text_404_page = get_field('text_404_page', 'options');
    ?>
    <section>
        <div class="top-404">
            <div class="container">
                <div class="top-404__wrapper">
                    <div class="top-404__image">
                        <?php display_svg( $image_404_page, $class = 'top-404__img'); ?>
                    </div>
                    <div class="top-404__content">
                        <h1 class="top-404__text">
                            <?php if( $text_404_page ) { echo $text_404_page;} ?>
                        </h1>
                        <a class="top-404__btn btn-primary-link" href="<?php echo home_url(); ?>">Return to homepage</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section>
        <?php  get_template_part( 'let_is_talk_part' );  ?>
    </section>
    <section>
        <?php  get_template_part( 'contacts_part' );  ?>
    </section>
</main>
<?php get_footer(); ?>


