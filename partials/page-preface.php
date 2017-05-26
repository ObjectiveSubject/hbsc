<section class="preface section <?php the_field('preface_background_color'); ?>">
    <div class="section__content u-container">
        <header class="section__header">
            <h1 class="page-title section-title"><?php the_title(); ?></h1>
        </header>
        <div class="section__body">
            <div class="preface-text">
                <?php the_content(); ?>
            </div>
        </div>
        <?php if( have_rows('module') && get_field('display_module_anchors') ) : ?>
        <footer class="section__footer">
            <ul class="anchors u-display-flex u-flex-justify-center u-flex-wrap">
                <?php while( have_rows('module') ): the_row();
                $title = get_sub_field('module_title');
                ?>
                <li class="anchor preface-button">
                    <a href="#module-<?php echo preg_replace('/\W+/', '-', strtolower($title)); ?>" class="button">
                        <?php echo $title; ?>
                    </a>
                </li>
                <?php endwhile; ?>
            </ul>
        </footer>
        <?php endif; ?>
    </div>
</section>
