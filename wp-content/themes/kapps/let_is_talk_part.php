<?php
$text_one_lets_talk = get_field('text_one_lets_talk', 'options');
$text_two_lets_talk = get_field('text_two_lets_talk', 'options');

?>

<div class="let-is-talk">
    <div class="let-is-talk__wrapper">
        <div class="let-is-talk__background-wrapper">
            <object class="let-is-talk__background" type="image/svg+xml" data="<?php echo get_template_directory_uri() . '/assets/images/global/let_is_talk/latis_talk.svg' ?>"></object>
        </div>
        <div class="let-is-talk__background-wrapper-mobile">
            <object class="let-is-talk__background-mobile" type="image/svg+xml" data="<?php echo get_template_directory_uri() . '/assets/images/global/let_is_talk/latis_talk_mobile.svg' ?>"></object>
        </div>
        <div class="container">
            <div class="let-is-talk__content">
                <h1 class="let-is-talk__text-one">
                    <?php if( $text_one_lets_talk ) { echo $text_one_lets_talk ;} ?>
                </h1>
                <p class="let-is-talk__text-two">
                    <?php if( $text_two_lets_talk ) { echo $text_two_lets_talk ;} ?>
                </p>
                <div class="let-is-talk__button">
                    <a class="let-is-talk__btn btn-secondary-link" href="">Let’s talk</a>
                </div>
            </div>
        </div>
    </div>
</div>
