<?php
    $title = get_sub_field('module_title');
    $moduleId = preg_replace('/\W+/', '-', strtolower($title));
?>
<section id="module-<?php echo $moduleId; ?>" class="module module--gallery">
    <div class="module__content u-container">
        <?php if( $display_title ) : ?>
        <header class="module__header">
            <div class="module-title">
                <?php echo $title; ?>
            </div>
        </header>
        <?php endif; ?>
        <aside class="module__sidebar">
            <?php if( $sidebar ) : ?>
            <div class="sidebar">
                <?php echo $sidebar; ?>
            </div>
            <?php endif; ?>
        </aside>
        <div class="module__body">
            <?php echo $content; ?>
        </div>
        <footer class="module__footer">            
                <a href="#" class="button module-button">Load more</a>
        </footer>
    </div>
</section>