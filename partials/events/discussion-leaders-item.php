<div class="discussion-leader u-mb-2">
    <div class="discussion-leader__content">
        <div class="discussion-leader-name u-mb-1">
            <div class="u-text-center">
                <div class="h2"><?php echo get_field('person_first_name');?></div>
                <div class="h3"><?php echo get_field('person_last_name');?></div>
            </div>
        </div>

        <div class="image-positioner u-mb-2">
            <?php 
                $img = wp_get_attachment_image_src( get_post_thumbnail_id(), 'large');
                $imgSrc = (isset($img[0]) ? $img[0] : '');
            ?>
            <div class="image" <?php echo 'style="background-image: url(\'' . $imgSrc . '\');"'; ?>></div>
        </div>

        <div class="discussion-leader-content u-text-center">
            <?php echo the_content();?>
        </div>        
    </div>
</div>