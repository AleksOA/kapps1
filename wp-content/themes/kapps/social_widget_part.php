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
                        <object class="social__item-img" type="image/svg+xml" data="<?php if( $icon_of_social_network ) { echo $icon_of_social_network ;} ?>"></object>
                    </a>
                </div>
            <?php endif; ?>
        <?php endforeach; ?>
        <?php endif; ?>
    </div>
</div>
