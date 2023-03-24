<?php
/*
  Template Name: Products
 */
?>

<?php get_header(); ?>
<main>
    <section>
        <?php
        $section_top_products = get_field('section_top_products');

        $args = array(
            'section_data' => $section_top_products
        );
        get_template_part( 'section_top_part', null, $args);
        ?>
    </section>

    <section>
        <div class="products__posts">
            <div class="container">
                <div class="products__posts-wrapper" id="productsPosts">

                </div>
                <div class="products__button">
                    <button class="products__btn-more" id="productsBtnMore">Show more</button>
                </div>
            </div>
        </div>
    </section>
</main>

<section>
    <?php  get_template_part( 'let_is_talk_part' );  ?>
</section>
<section>
    <?php  get_template_part( 'contacts_part' );  ?>
</section>
<?php get_footer(); ?>

