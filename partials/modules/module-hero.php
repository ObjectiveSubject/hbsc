<section id="module-<?php echo preg_replace('/\W+/', '-', strtolower($title)); ?>" class="module module--hero has-background <?php echo $color; ?>" <?php echo ( $image ) ? "style='background-image: url(" . $image . ")'" : ""; ?>>
    <div class="module__content u-container">
        <div class="card-positioner">
            <div class="card <?php echo $cardColor; ?> js-slide-in">
                <?php if( $display_title ) : ?>
                <div class="card-title">
                    <?php echo $title; ?>
                </div>
                <?php endif; ?>

                <?php if( $content ): ?>
                <div class="card-content">
                    <?php echo $content ?>
                </div>
                <?php endif; ?>

                <?php if( $display_button && $button_link && $button_text ) : ?>
                <div class="card-button">
                    <a href="<?php echo $button_link; ?>" class="button module-button"><?php echo $button_text; ?></a>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>