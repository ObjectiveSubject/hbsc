<div class="discussion-leader u-mb-6">
    <div class="discussion-leader__content">
        <div class="discussion-leader-name u-mb-1">
            <div class="u-text-center">
                <div class="h2"><a href="<?php the_permalink();?>"><?php echo get_field('person_first_name');?></a></div>
                <div class="h3"><a href="<?php the_permalink();?>"><?php echo get_field('person_last_name');?></a></div>
            </div>
        </div>

        <div class="image-positioner u-mb-2">
            <?php 
                $img = wp_get_attachment_image_src( get_post_thumbnail_id(), 'large');
                $imgSrc = (isset($img[0]) ? $img[0] : '');
            ?>
            <div data-href-link="<?php the_permalink();?>" class="image" <?php echo 'style="background-image: url(\'' . $imgSrc . '\');"'; ?>></div>
        </div>

        <div class="discussion-leader-content u-text-center">
            <?php echo the_content();?>
        </div>        
    </div>
</div>