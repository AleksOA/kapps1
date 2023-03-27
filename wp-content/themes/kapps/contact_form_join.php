<div class="form-join-team">
    <?php
    $title_form_join_the_team = get_field('title_form_join_the_team');

    ?>
    <h3 class="form-join-team__title">
        <?php if( $title_form_join_the_team ) { echo $title_form_join_the_team ;} ?>
    </h3>
    <p class="form-join-team__opening-name" id="formJoinOpeningName">Unity Developer</p>
    <?php
    echo do_shortcode('[contact-form-7 id="453" title="form-join-team"]')
    ?>
</div>