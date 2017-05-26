<section class="preface section <?php the_field('preface_background_color'); ?>">
    <div class="section__content u-container">
        <header class="section__header">
            <h1 class="page-title section-title"><?php the_title(); ?></h1>
        </header>
        <div class="section__body">
            <?php
            $title = get_field('preface_title');
            if ( $title ) {
            $split_title = explode("|", $title);
            $count = count($split_title);
            ?>
            <h2 class="preface-title">
                <?php for ($i=0; $i<$count; $i++) {
                echo '<span>' . $split_title[$i] . '</span>';
                } ?>
            </h2>
            <?php } ?>
            <div class="preface-text">
                <?php the_content(); ?>
            </div>
        </div>
        <?php if( have_rows('module') && get_field('display_module_anchors') ) : ?>
        <footer class="section__footer">
            <?php while( have_rows('module') ): the_row();
            $title = get_sub_field('module_title');
            ?>
            <a href="#module-<?php echo preg_replace('/\W+/', '-', strtolower($title)); ?>" class="button button--preface">
                <?php echo $title; ?>
            </a>
            <?php endwhile; ?>
        </footer>
        <?php endif; ?>
    </div>
</section>
