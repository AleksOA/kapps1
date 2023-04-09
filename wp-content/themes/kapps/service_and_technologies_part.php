
<?php
$section_title = $args["section_data"]["section_for_current_post_elements"]["section_title"];
$image = $args["section_data"]["section_for_current_post_elements"]["image_section"]["url"];
$content_one = $args["section_data"]["section_for_current_post_elements"]["item_one"];
$content_two = $args["section_data"]["section_for_current_post_elements"]["item_two"];
?>

<div class="serv-tech">
    <div class="container">
        <div class="serv-tech__wrapper">
            <div class="serv-tech__section-one">
                <div class="serv-tech__section-one-left">
                    <?php custom_breadcrumbs(); ?>
                    <?php if($section_title) : ?>
                        <h1 class="serv-tech__section-title"><?php echo $section_title ?></h1>
                    <?php endif; ?>
                </div>
                <div class="serv-tech__section-one-right">
                    <div class="serv-tech__image-wrapper">
                        <?php if($image) : ?>
                            <?php display_svg( $image, 'serv-tech__img') ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <div class="serv-tech__section-two">
                <?php if($content_one) : ?>
                    <div class="serv-tech__content-one"><?php echo $content_one ?></div>
                <?php endif; ?>

                <?php if($content_two) : ?>
                    <div class="serv-tech__content-two"><?php echo $content_two ?></div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>



