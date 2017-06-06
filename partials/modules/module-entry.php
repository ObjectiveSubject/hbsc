<section id="module-<?php echo preg_replace('/\W+/', '-', strtolower($title)); ?>" class="module module--entry <?php echo ( $image ) ? ' has-image' : ''; ?>">
    <?php if( $image ) : ?>
    <div class="module__image" <?php echo "style='background-image: url(" . $image . ")'"; ?>></div>
    <?php endif; ?>
    <div class="module__content u-container">
        <header class="module__header">
            <div class="module-title">
                <?php echo $title; ?>
            </div>
        </header>
        <aside class="module__sidebar">
            <?php echo $sidebar; ?>
        </aside>
        <div class="module__body">
            <?php echo $content; ?>
        </div>
    </div>
</section>