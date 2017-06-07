<section id="module-<?php echo preg_replace('/\W+/', '-', strtolower($title)); ?>" class="module module--basic <?php echo $color; echo ( $image ) ? ' has-image' : ''; echo ( $display_sidebar ) ? ' has-sidebar' : ''; ?>">
    <?php if( $image ) : ?>
    <div class="module__image" <?php echo "style='background-image: url(" . $image . ")'"; ?>></div>
    <?php endif; ?>
    <div class="module__content u-container">
        <?php if( $display_title ) : ?>
        <header class="module__header">
            <div class="module-title">
                <?php echo $title; ?>
            </div>
        </header>
        <?php endif; ?>
        <div class="module__body">
            <?php echo $content; ?>
        </div>
        <?php if( $display_button && $button_link && $button_text ) : ?>
        <footer class="module__footer">
            <a href="<?php echo $button_link; ?>" class="button module-button"><?php echo $button_text; ?></a>
        </footer>
        <?php endif; ?>
    </div>
</section>