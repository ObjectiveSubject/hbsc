<?php while( have_rows('module') ): the_row(); 

$type = get_sub_field('module_type');
$color = get_sub_field('module_background_color');
$display_title = get_sub_field('display_module_title');
$title = get_sub_field('module_title');
$content = get_sub_field('module_content');
$display_sidebar = get_sub_field('display_module_sidebar');
$sidebar = get_sub_field('module_sidebar');
$display_button = get_sub_field('display_module_button');
$button_link = get_sub_field('module_button_link');
$button_text = get_sub_field('module_button_text');
$image = get_sub_field('module_image');

?>

<section id="module-<?php echo preg_replace('/\W+/', '-', strtolower($title)); ?>" class="module <?php echo $type . ' ' . $color; echo ( $image ) ? ' has-image' : ''; ?>">
    <?php if( $image ) : ?>
    <div class="module__image" <?php echo "style='background-image: url(" . $image . ")'" ?>></div>
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

<?php endwhile; ?>