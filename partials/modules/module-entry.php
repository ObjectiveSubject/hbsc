<?php
    $title = get_sub_field('module_title');
    $moduleId = preg_replace('/\W+/', '-', strtolower($title));
?>
<section id="module-<?php echo $moduleId; ?>" class="module module--entry <?php echo ( $image ) ? ' has-image' : ''; ?>">
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
        <aside class="module__sidebar">
            <?php if( $sidebar ) : ?>
            <div class="sidebar">
                <?php echo $sidebar; ?>
            </div>
            <?php endif; ?>
            <?php if ( $buttonLocation == 'sidebar' ) : ?>
                <?php if ( $display_button ) : ?>
                    <p><a href="<?php echo $button_link; ?>" id="<?php echo $button_link; ?>" class="button button--red u-caps <?php echo ( $sidebar ) ? 'u-mt-2' : ''; ?>">
                        <?php echo $button_text; ?>
                    </a></p>
                <?php endif; ?>
                <?php if ( $display_ext_button ) : ?>
                    <p><a href="<?php echo $ext_button_link; ?>" id="<?php echo $ext_button_link; ?>" class="button button--red u-caps <?php echo ( $sidebar ) ? 'u-mt-2' : ''; ?>" target="_blank">
                        <?php echo $ext_button_text; ?>
                    </a></p>
                <?php endif; ?>
            <?php endif; ?>
        </aside>
        <div class="module__body">
            <?php echo $content; ?>
        </div>
        <?php if ( $buttonLocation == 'footer' || ! $buttonLocation ) : ?>
            <footer class="module__footer">            
                <?php if ( $display_button && $button_link && $button_text ) : ?>  
                    <p><a href="<?php echo $button_link; ?>" class="button module-button"><?php echo $button_text; ?></a></p>
                <?php endif; ?>
                <?php if ( $display_ext_button && $ext_button_link && $ext_button_text ) : ?>  
                    <p><a href="<?php echo $ext_button_link; ?>" class="button module-button" target="_blank"><?php echo $ext_button_text; ?></a></p>
                <?php endif; ?>
            </footer>
        <?php endif; ?>
    </div>
</section>