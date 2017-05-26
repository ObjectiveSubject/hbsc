<section class="preface section u-bg-<?php the_field('preface_background_color'); ?>">
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
    </div>
</section>
