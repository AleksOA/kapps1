<?php
/*
  Template Name: Join the team
 */
?>

<?php get_header(); ?>
<main>
    <section>
        <?php
        $section_top_join_the_team = get_field('section_top_join_the_team');

        $args = array(
            'section_data' => $section_top_join_the_team
        );
        get_template_part( 'section_top_part', null, $args);
        ?>
    </section>
    <section>
        <?php
        $column_one_join_the_team = get_field('column_one_join_the_team');
        $column_two_join_the_team = get_field('column_two_join_the_team');
        ?>
        <div class="join-text">
            <div class="container">
                <div class="join-text__wrapper">
                    <div class="join-text__column-one">
                        <?php if( $column_one_join_the_team ) { echo $column_one_join_the_team ;} ?>
                    </div>
                    <div class="join-text__column-two">
                        <?php if( $column_two_join_the_team ) { echo $column_two_join_the_team ;} ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section>
        <?php
        $section_title_openings_join_the_team = get_field('section_title_openings_join_the_team');
        $opening_openings_join_the_team = get_field('opening_openings_join_the_team');
        ?>
        <div class="openings">
            <div class="container">
                <div class="openings__wrapper">
                    <h2 class="openings__title">
                        <?php if( $section_title_openings_join_the_team ) { echo $section_title_openings_join_the_team;} ?>
                    </h2>
                    <div class="openings__items">
                        <?php if( $opening_openings_join_the_team ) : foreach ( $opening_openings_join_the_team as $item ) :
                            $title_opening_openings_join_the_team = $item["title_opening_openings_join_the_team"];
                            $main_content_openings_join_the_team = $item["main_content_openings_join_the_team"];
                            ?>
                            <div class="openings__item">
                                <div class="openings__item-one">
                                    <h3 class="openings__item-title">
                                        <?php if( $title_opening_openings_join_the_team) { echo $title_opening_openings_join_the_team ;} ?>
                                    </h3>
                                    <a class="openings__item-btn openings__item-btn--first btn-primary-link" href="#">apply</a>
                                </div>
                                <div class="openings__item-two">
                                    <div class="openings__item-two-wrapper">
                                        <div class="openings__item-main-content">
                                            <?php if( $main_content_openings_join_the_team ) { echo $main_content_openings_join_the_team  ;} ?>
                                        </div>
                                        <div class="openings__item-btn--second-wrapper">
                                            <a class="openings__item-btn openings__item-btn--second btn-primary-link" href="#">apply</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="popup-current-openings">
        <?php
        $args = array(
            'section_data' => 'contact_form_join'
        );
        get_template_part( 'contact_us_popup_part', null, $args);
        ?>
    </div>


</main>
<?php get_footer(); ?>



