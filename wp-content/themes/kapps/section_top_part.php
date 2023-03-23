<?php
$section_title = $args["section_data"]["section_top"]["section_title_top"];
$image = $args["section_data"]["section_top"]["image_top"]["url"];
?>

<div class="section__top">
    <div class="container">
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
                        <object class="serv-tech__img" type="image/svg+xml" data="<?php echo $image ?>"></object>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>
