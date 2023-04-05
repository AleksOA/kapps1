<div class="social">
    <div class="social__items">
        <?php
        $social_widget = get_field('social_widget', 'options');
        if( $social_widget ) : foreach ( $social_widget as $item ) :
            $icon_of_social_network = $item["icon_of_social_network"]["url"];
            $link_of_social_network = $item["link_of_social_network"];
            if($icon_of_social_network && $link_of_social_network ) :
            ?>
                <div class="social__item">
                    <a class="social__item-link" target=»_blank href="<?php if( $link_of_social_network ) { echo $link_of_social_network ;} ?>">
                        <?php display_svg( $icon_of_social_network, $class = 'social__item-img', $size = 'medium' ) ?>
                    </a>
                </div>
            <?php endif; ?>
        <?php endforeach; ?>
        <?php endif; ?>
    </div>
</div>
