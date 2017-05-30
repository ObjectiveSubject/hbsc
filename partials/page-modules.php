<?php while( have_rows('module') ): the_row(); 

$type = get_sub_field('module_type');
$color = get_sub_field('module_background_color');
$display_title = get_sub_field('display_module_title');
$title = get_sub_field('module_title');
$content = get_sub_field('module_content');
$content_position = get_sub_field('module_content_position');
$display_sidebar = get_sub_field('display_module_sidebar');
$sidebar = get_sub_field('module_sidebar');
$display_button = get_sub_field('display_module_button');
$button_link = get_sub_field('module_button_link');
$button_text = get_sub_field('module_button_text');
$image = get_sub_field('module_image');

if( $type == 'module--basic' ) :

?>

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
        <?php if( $display_sidebar && $sidebar ) : ?>
        <aside class="module__sidebar">
            <?php echo $sidebar; ?>
        </aside>
        <?php endif; ?>
        <?php if( $display_button && $button_link && $button_text ) : ?>
        <footer class="module__footer">
            <a href="<?php echo $button_link; ?>" class="button module-button"><?php echo $button_text; ?></a>
        </footer>
        <?php endif; ?>
    </div>
</section>

<?php elseif( $type == 'module--hero' ) : ?>

<section id="module-<?php echo preg_replace('/\W+/', '-', strtolower($title)); ?>" class="module module--hero has-background" <?php echo ( $image ) ? "style='background-image: url(" . $image . ")'" : ""; ?>>
    <div class="module__content u-container <?php echo $content_position; ?>">
        <div class="card-positioner">
            <div class="card <?php echo $color; ?> js-slide-in">
                <?php if( $display_title ) : ?>
                <div class="card-title">
                    <?php echo $title; ?>
                </div>
                <?php endif; ?>
                <div class="card-content">
                    <?php echo $content ?>
                </div>
                <?php if( $display_button && $button_link && $button_text ) : ?>
                <div class="card-button">
                    <a href="<?php echo $button_link; ?>" class="button module-button"><?php echo $button_text; ?></a>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>

<?php elseif( $type == 'module--carousel' ) : ?>

<section id="module-<?php echo preg_replace('/\W+/', '-', strtolower($title)); ?>" class="module module--hero has-background" <?php echo ( $image ) ? "style='background-image: url(" . $image . ")'" : ""; ?>>
    <div class="module__content u-container <?php echo $content_position; ?>">
        <div class="card-positioner">
            <div class="card <?php echo $color; ?> js-slide-in">
                <?php if( $display_title ) : ?>
                <div class="card-title">
                    <?php echo $title; ?>
                </div>
                <?php endif; ?>
                <div class="card-content">
                    <?php echo $content ?>
                </div>
                <?php if( $display_button && $button_link && $button_text ) : ?>
                <div class="card-button">
                    <a href="<?php echo $button_link; ?>" class="button module-button"><?php echo $button_text; ?></a>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>

<section id="module-<?php echo preg_replace('/\W+/', '-', strtolower($title)); ?>" class="module module--carousel <?php echo $color; ?>">
    <div class="module__content u-container">
        <?php if( $display_title ) : ?>
        <header class="module__header">
            <div class="module-title"><?php echo $title; ?></div>
        </header>
        <?php endif; ?>
        <?php if(have_rows('carousel_slides')) : ?>
        <div class="module__body">
            <ul class="carousel js-carousel">
                <?php while( have_rows('carousel_slides') ): the_row();
                
                $content = get_sub_field('slide_content');
                $color = get_sub_field('slide_background_color');
                $image = get_sub_field('slide_image');
                $button_link = get_sub_field('slide_button_link');
                $button_text = get_sub_field('slide_button_text');
                
                ?>
                <li class="carousel-slide">
                    <div class="carousel-slide__content">
                        <div class="badge-positioner">
                            <div class="badge badge--date">
                                <span>Dec</span>
                                <span>30</span>
                            </div>
                        </div>
                        <div class="card-positioner">
                            <div class="card <?php echo $color; ?>">
                                <div class="card-content">
                                    <?php echo $content; ?>
                                </div>
                                <div class="card-button">
                                    <a href="<?php echo $button_link; ?>" class="button js-hover-toggle" data-target="#<?php echo preg_replace('/\W+/', '-', strtolower($content)); ?>" data-class="image--grayscale"><?php echo $button_text; ?></a>
                                </div>
                            </div>
                        </div>
                        <div class="image-positioner">
                            <div id="<?php echo preg_replace('/\W+/', '-', strtolower($content)); ?>" class="image image--grayscale" <?php echo "style='background-image: url(" . $image . "')"; ?>></div>
                        </div>
                    </div>
                </li>
                <?php endwhile; ?>
            </ul>
        </div>
        <?php endif; ?>
        <?php if( $button_link && $button_text ) : ?>
        <footer class="module__footer">
            <a href="<?php echo $button_link; ?>" class="button module-button"><?php echo $button_text; ?></a>
        </footer>
        <?php endif; ?>
    </div>
</section>

<?php endif; endwhile; ?>