<div class="contacts">
    <?php
    if($args){
        $text_for_form = $args["section_data"];
        if($text_for_form) {echo '<div class="top"><p>' . $text_for_form . '</p></div>';}
    }
    echo do_shortcode('[contact-form-7 id="262" title="Contacts"]')
    ?>
</div>
