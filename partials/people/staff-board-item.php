<div class="staff-board--item">
    <h2><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php echo get_field('people_first_name') . ' ' . get_field('people_first_name'); ?></a></h2>
    <h3><?php echo get_field('people_title'); ?></h3>
    <div class="image--positionner" style="width:50%;">
        <?php 
            $img = wp_get_attachment_image_src( get_post_thumbnail_id(), 'large');
            $imgSrc = (isset($img[0]) ? $img[0] : '');
        ?>
        <?php if( !empty($imgSrc)) : ?>        
        <img src="<?php echo $imgSrc;?>" />
        <?php endif; ?>
    </div>
</div>