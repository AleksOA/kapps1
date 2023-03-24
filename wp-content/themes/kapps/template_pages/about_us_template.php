<?php
/*
  Template Name: About us
 */
?>

<?php get_header(); ?>
<main>
    <section>
        <?php
        $section_top_about_us = get_field('section_top_about_us');

        $args = array(
            'section_data' => $section_top_about_us
        );
        get_template_part( 'section_top_part', null, $args);
        ?>
    </section>

    <section>
        <?php
        $image_section_one_story_about_us = get_field('image_section_one_story_about_us')["url"];
        $text_section_one_story_about_us = get_field('text_section_one_story_about_us');
        $image_section_two_story_about_us = get_field('image_section_two_story_about_us')["url"];
        $text_section_two_story_about_us = get_field('text_section_two_story_about_us');

        ?>
        <div class="story">
            <div class="container">
                <div class="story__section-one">
                    <div class="story__section-one-left">
                        <div class="story__section-one-image">
                            <object class="story__section-one-img" type="image/svg+xml" data="<?php if( $image_section_one_story_about_us ) { echo $image_section_one_story_about_us ;} ?>"></object>
                        </div>
                    </div>
                    <div class="story__section-one-right">
                        <?php if( $text_section_one_story_about_us ) { echo $text_section_one_story_about_us ;} ?>
                    </div>
                </div>
                <div class="story__section-two">
                    <div class="story__section-two-left">
                        <?php if( $text_section_two_story_about_us ) { echo $text_section_two_story_about_us ;} ?>
                    </div>
                    <div class="story__section-two-right">
                        <div class="story__section-two-image">
                            <object class="story__section-two-img" type="image/svg+xml" data="<?php if( $image_section_two_story_about_us ) { echo $image_section_two_story_about_us ;} ?>"></object>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section>
        <?php
        $text_mission_about_us = get_field('text_mission_about_us');
        ?>
        <div class="mission">
            <div class="container">
                <div class="mission__wrapper">
                    <div class="mission__content">
                        <?php if( $text_mission_about_us ) { echo $text_mission_about_us ;} ?>
                    </div>
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
<section>
    <?php  get_template_part( 'recent_projects_part' );  ?>
</section>
<?php get_footer(); ?>


