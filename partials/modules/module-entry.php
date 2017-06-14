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
            <?php if( $sidebar ) : ?>
            <div class="sidebar">
                <?php echo $sidebar; ?>
            </div>
            <?php endif; ?>
            <?php if( $display_button ) : ?>
                <a href="<?php echo $button_link; ?>" class="button button--red u-caps <?php echo ( $sidebar ) ? 'u-mt-2' : ''; ?>">
                    <?php echo $button_text; ?>
                </a>
            <?php endif; ?>
        </aside>
        <div class="module__body">
            <?php echo $content; ?>
            <?php if( get_sub_field('display_module_table') && have_rows('module_table_row') ): ?>
            <table>
                <tbody>
                    <?php while( have_rows('module_table_row') ): the_row(); ?>
                    <tr>
                        <td><?php the_sub_field('key'); ?></td>
                        <td><?php the_sub_field('value'); ?></td>
                    </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
            <?php endif; ?>
        </div>
    </div>
</section>