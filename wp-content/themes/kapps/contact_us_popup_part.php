<div class="popup">
    <div class="popup__body">
        <div class="popup__content">
            <span class="popup__close">
                <span class="popup__close-one"></span>
                <span class="popup__close-two"></span>
                <button class="popup__close-btn"></button>
            </span>
            <section>
                <?php
                $part = $args["section_data"];
                get_template_part( $part );
                ?>
            </section>
        </div>
    </div>
</div>
