<?php
    $title = get_sub_field('module_title');
    $moduleId = preg_replace('/\W+/', '-', strtolower($title));
?>
<section id="module-<?php echo $moduleId; ?>" class="module module--entry <?php echo ( $image ) ? ' has-image' : ''; ?>">
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
            <?php if( $sidebar ) : ?>
            <div class="sidebar">
                <?php echo $sidebar; ?>
            </div>
            <?php endif; ?>
            <?php if( $display_button && $buttonLocation == 'sidebar' ) : ?>
                <a href="<?php echo $button_link; ?>" class="button button--red u-caps <?php echo ( $sidebar ) ? 'u-mt-2' : ''; ?>">
                    <?php echo $button_text; ?>
                </a>
            <?php endif; ?>
        </aside>
        <div class="module__body">
            <?php echo $content; ?>
        </div>        
<?php if( $display_button && $button_link && $button_text && ( $buttonLocation == 'footer' || !$buttonLocation ) ) : ?>        
        <footer class="module__footer">            
                <a href="<?php echo $button_link; ?>" class="button module-button"><?php echo $button_text; ?></a>
        </footer>
<?php endif; ?>
    </div>
</section>