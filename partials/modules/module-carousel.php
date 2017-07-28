
<?php
$moduleCarouselClass = 'module--carousel ' . $color;
$moduleCarouselClass = ( $type == 'module--mediacollection' ? ( $moduleCarouselClass . ' module--mediacollection' ) : $moduleCarouselClass );
$button_link = get_sub_field('module_button_link');
$button_text = get_sub_field('module_button_text');

echo '<!-- ' . $type . ' * ' . $button_link . ' ' , $button_text . ' --><br/>';
?>
<section id="module-<?php echo preg_replace('/\W+/', '-', strtolower($title)); ?>" class="module <?php echo $moduleCarouselClass; ?>">
    <div class="module__content u-container">
        <?php if( $display_title ) : ?>
        <header class="module__header">
            <div class="module-title"><?php echo $title; ?></div>
        </header>
        <?php endif; ?>
        <?php if(have_rows('carousel_slides')) : ?>
        <div class="module__body">
            <ul class="carousel js-carousel u-list-nostyle">
                <?php while( have_rows('carousel_slides') ): the_row();
                
                    $content = get_sub_field('slide_content');
                    $color = get_sub_field('slide_background_color');
                    $image = get_sub_field('slide_image');
                    $slideButtonLink = get_sub_field('slide_button_link');
                    $slideButtonText = get_sub_field('slide_button_text');
                    
                    $badgeLargeText = get_sub_field('slide_badge_large_text');
                    $badgeSmallText = get_sub_field('slide_badge_small_text');
                ?>
                <li class="carousel-slide">
                    <div class="carousel-slide__content">
                        
                        <?php if(( $badgeLargeText || $badgeSmallText ) && $type != 'module--mediacollection' ): ?>
                        <div class="badge-positioner">
                            <div class="badge">
                                <?php if( $badgeSmallText): ?>
                                <span><?php echo $badgeSmallText; ?></span>
                                <?php endif; ?>

                                <?php if( $badgeLargeText): ?>
                                <span><?php echo $badgeLargeText; ?></span>
                                <?php endif; ?>
                            </div>
                        </div>
                        <?php endif; ?>

                        <?php if( !empty($content) || ($slideButtonLink && $slideButtonText) ): ?>
                        <div class="card-positioner">
                            <div class="card <?php echo $color; ?>">
                                <?php if( $content ): ?>
                                <div class="card-content">
                                    <?php echo $content ?>
                                </div>
                                <?php endif; ?>

                                <?php if( $slideButtonLink && $slideButtonText ) : ?>
                                <div class="card-button">
                                    <a href="<?php echo $slideButtonLink; ?>" class="button js-hover-toggle" data-target="#<?php echo preg_replace('/\W+/', '-', strtolower($content)); ?>" data-class="image--grayscale"><?php echo $slideButtonText; ?></a>
                                </div>
                                <?php endif; ?>
                            </div>
                        </div>
                        <?php endif; ?>

                        <div class="image-positioner">
                            <div id="<?php echo preg_replace('/\W+/', '-', strtolower($content)); ?>" class="image image--grayscale" <?php echo "style='background-image: url(" . $image . "')"; ?>></div>
                        </div>

                    </div>
                </li>
                <?php endwhile; ?>
            </ul>
        </div>
        <?php endif; ?>
        <?php if( $button_link && $button_text && $display_button ) : ?>
        <footer class="module__footer">
            <a href="<?php echo $button_link; ?>" class="button module-button"><?php echo $button_text; ?></a>
        </footer>
        <?php endif; ?>
    </div>
</section>
