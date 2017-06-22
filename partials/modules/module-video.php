<section id="module-<?php echo preg_replace('/\W+/', '-', strtolower($title)); ?>" class="module module--video">
    <div class="module__content u-container">
        <?php if( $display_title ) : ?>
        <header class="module__header">
            <div class="module-title">
                <?php echo $title; ?>
            </div>
        </header>
        <?php endif; ?>

        <?php if(!empty(strip_tags($content))) : ?>
        <div class="module__body u-my-4">
            <?php echo $content; ?>
        </div>
        <?php endif; ?>

        <div class="module__body">
            <?php 
                preg_match('/src="(.+?)"/', $videoEmbed, $matches);
                $src = ( isset( $matches[1] ) ? $matches[1] : strip_tags( $videoEmbed ) );

                $videoIframe = sprintf( "<iframe width=\"640\" height=\"360\" src=\"%s\" frameborder=\"0\"></iframe>", $src );
                echo $videoIframe;
            ?>
        </div>
        <?php if( $display_button && $button_link && $button_text ) : ?>
        <footer class="module__footer">
            <a href="<?php echo $button_link; ?>" class="button module-button"><?php echo $button_text; ?></a>
        </footer>
        <?php endif; ?>
    </div>
</section>