<article class="products__posts-item">
    <div class="products__posts-item-wrapper">
        <div class="products__posts-item-image">
            <?php the_post_thumbnail( 'thumb-portfolio' ) ?>
            <span class="products__posts-item-image-cover">q</span>
            <?php
            $links_products_post = get_field('links_products_post');
            ?>
            <div class="products__posts-item-image-link-items">
                <?php if( $links_products_post ) : for ($x = 0; $x < count($links_products_post); $x++) :
                    $image_link = $links_products_post[$x]["image_link_product_post"]["url"];
                    $link = $links_products_post[$x]["link_products_post"];
                    ?>
                    <?php if( $image_link && $link && $x < count($links_products_post)-1 ) : ?>
                    <div class="products__posts-item-image-link-item">
                        <a class="products__posts-item-image-link-item-link" href="<?php echo $link ?>" target="_blank">
                            <div class="products__posts-item-image-link-item-image">
                                <?php display_svg( $image_link,'products__posts-item-image-link-item-link-img' ) ?>
                            </div>
                        </a>
                    </div>
                    <span class="items-separator"></span>
                    <?php endif;
                    if ($image_link && $link && $x == count($links_products_post)-1) : ?>
                        <div class="products__posts-item-image-link-item">
                            <a class="products__posts-item-image-link-item-link" href="<?php echo $link ?>" target="_blank">
                                <div class="products__posts-item-image-link-item-image">
                                    <?php display_svg( $image_link,'products__posts-item-image-link-item-link-img' ) ?>
                                </div>
                            </a>
                        </div>
                    <?php endif; ?>
                    <?php endfor; ?>
                <?php endif; ?>
            </div>
        </div>
        <div class="products__posts-item-text">
            <h3 class="products__posts-item-section-right-title"><?php if( get_the_title() ) { echo get_the_title();} ?></h3>
            <?php if( get_the_content() ) { echo get_the_content() ;} ?>
        </div>
    </div>
</article>
