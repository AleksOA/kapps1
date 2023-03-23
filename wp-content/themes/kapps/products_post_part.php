<article class="products__posts-item">
    <div class="products__posts-item-wrapper">
        <div class="products__posts-item-image">
            <?php the_post_thumbnail( 'thumb-portfolio' ) ?>
        </div>
        <div class="products__posts-item-text">
            <h3 class="products__posts-item-section-right-title"><?php if( get_the_title() ) { echo get_the_title();} ?></h3>
            <?php if( get_the_content() ) { echo get_the_content() ;} ?>
        </div>
    </div>
</article>
