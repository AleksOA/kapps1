        <footer>
            <div class="footer__wrapper">
                <div class="footer__background">
                    <div class="footer__background-one">
                        <svg width="1600" height="653" viewBox="0 0 1600 653" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M15.5695 193.763C-186.579 225.625 -440.391 293.811 -440.391 293.811L-379.136 1044.85C-379.136 1044.85 -186.053 1135.11 -24.3857 1128.46C243.245 1117.47 429.344 957.631 697.084 941.259C994.407 923.078 1140.76 1012.4 1438.09 994.702C1616.94 984.057 1891.24 932.436 1891.24 932.436L1809.48 0.000298666C1809.48 0.000298666 1726.19 41.8836 1663.51 59.3556C1520.96 99.0906 1423.45 57.0947 1270.16 72.4579C994.021 100.133 869.322 206.256 592.419 225.798C362.496 242.024 241.792 158.105 15.5695 193.763Z" fill="#194484" fill-opacity="0.07"/>
                        </svg>
                    </div>
                    <div class="footer__background-two">
                        <svg width="1600" height="606" viewBox="0 0 1600 606" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M281.359 98.7025C114.295 111.243 -102 207.069 -102 207.069L-102 763.729C-102 763.729 49.5401 850.189 181.895 855.527C401.001 864.364 563.486 746.371 783.038 750.828C1026.85 755.778 1140.32 838.369 1384.11 843.714C1530.75 846.93 1758 823.073 1758 823.073L1758 0C1758 0 1687.25 88.6213 1634.95 98.7025C1515.99 121.629 1439.21 80.888 1313.11 83.2215C1085.96 87.425 977.149 165.688 749.909 163.207C561.222 161.146 468.319 84.6682 281.359 98.7025Z" fill="#194484"/>
                        </svg>
                    </div>
                </div>
                <div class="footer__content-wrapper">
                    <div class="container">
                        <div class="footer__content">
                            <div class="footer__section-one">
                                <div class="footer__logo">
                                    <a href="<?php echo get_permalink(12); ?>">
                                        <svg class="footer__logo-icon" width="55" height="52" viewBox="0 0 55 52" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M7.50372 21.5039L20.0037 0.00390625L24.5037 8.00391L17.0037 21.5039L23.5037 33.0039L18.5037 41.0039L7.50372 21.5039Z" fill="white"/>
                                            <path d="M25.5037 10.0039L21.0037 18.0039L22.5037 20.0039H31.5037L25.5037 10.0039Z" fill="white"/>
                                            <path d="M23.0037 29.5039L18.5037 21.5039H41.5037L54.0037 43.0039H45.0037L37.0037 29.5039H23.0037Z" fill="white"/>
                                            <path d="M35.5037 31.0039H27.0037L19.5037 43.0039H4.50372L0.00372314 50.5039L24.5037 51.0039L35.5037 31.0039Z" fill="white"/>
                                            <path d="M38.5037 35.0039H35.0037L30.5037 43.0039H43.0037L38.5037 35.0039Z" fill="white"/>
                                            <path d="M16.0037 39.0039L11.5037 31.5039L5.00372 41.0039H14.5037L16.0037 39.0039Z" fill="white"/>
                                        </svg>
                                        <p class="footer__logo-text">stan’s assets</p>
                                    </a>
                                </div>
                                <div class="footer__social">
                                    <?php
                                    $social_icons_footer = get_field('social_icons_footer', 'options');
                                    if( $social_icons_footer ) : foreach ( $social_icons_footer as $item ) : ?>
                                        <?php
                                            $social_icon = $item["social_icon_footer"];
                                            $social_link = $item["sosial_link-footer"];
                                        if($social_icon && $social_link) {echo '<a class="footer__social-item" target="_blank" href="' . $social_link . '">' . $social_icon . '</a>' ;}
                                        ?>
                                    <?php endforeach; ?>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="footer__section-two">
                                <nav class="footer-menu" id="footerMenu">
                                    <?php wp_nav_menu([
                                        'theme_location' => 'footer_menu',
                                        'container' => null,
                                        'menu_class' => 'nav',
                                        'menu_id' => 'nav'
                                    ]); ?>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="footer__end">
                    <div class="container">
                        <div class="footer__end-content">
                            <?php
                                $end_footer = get_field('end_footer', 'options');
                                $arr = explode(" ", $end_footer);

                            if( $arr ) : foreach ( $arr as $value => $key ) :
                                if ($key == '@year') $arr[$value] = date("Y");
                                if($key != '@year') $arr[$value] = $key;
                             endforeach;
                             endif;
                             $arr = implode(" ", $arr);
                             if($arr) {echo $arr;}
                             ?>
                        </div>
                    </div>
                </div>
            </div>

        </footer>
        <div class="btn-up">
            <a class="btn-up__link btn-primary-link" href="#topHidden">
                <span class="btn-up__span">UP</span>
            </a>
        </div>
        <div>
            <?php  get_template_part( 'social_widget_part' );  ?>
        </div>
        <div class="popup-contact-us">
            <?php
            $args = array(
                'section_data' => 'contact_form_part'
            );
            get_template_part( 'contact_us_popup_part', null, $args);
            ?>
        </div>
    <?php wp_footer(); ?>
    </body>
</html>
