<div class="discussion-leader u-mb-6">
    <div class="discussion-leader__content">
        <div class="discussion-leader-name u-mb-1">
            <div class="u-text-center">
                <div class="h2"><?php the_title();?></div>
                <div class="h3"><?php echo get_field('person_title');?></div>
            </div>
        </div>

        <?php if ( has_post_thumbnail() ) : ?>
        <div class="image-positioner u-mb-2">
            <?php
                $img = wp_get_attachment_image_src( get_post_thumbnail_id(), 'large');
                $imgSrc = (isset($img[0]) ? $img[0] : '');
            ?>
            <div data-href-link="<?php the_permalink();?>" class="image" <?php echo 'style="background-image: url(\'' . $imgSrc . '\');"'; ?>></div>
        </div>
        <?php endif; ?>

        <?php if ( get_the_content() ) : ?>
        <div class="discussion-leader-content u-text-center">
            <?php the_content(); ?>
        </div>
        <?php endif; ?>
    </div>
</div>
