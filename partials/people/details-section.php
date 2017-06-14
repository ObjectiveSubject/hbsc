<section id="module-<?php echo $post->ID;?>" class="module module--people">
    <div class="module__content u-container">
        
        <div class="people--contact">
            <div>CONTACT</div>
            <div class="people--contact-item"><?php echo get_field('person_email');?></div>
            <div class="people--contact-item"><?php echo get_field('person_telephone');?></div>
        </div>
        
        <div class="people--title-name">
            <div class="people--name"><?php echo get_field('person_first_name') . ' ' . get_field('person_last_name');?></div>
            <div class="people--title"><?php echo get_field('person_title');?></div>
        </div>

        <div class="image-positioner">
            <?php 
                $img = wp_get_attachment_image_src( get_post_thumbnail_id(), 'large');
                $imgSrc = (isset($img[0]) ? $img[0] : '');
            ?>            
            <img src="<?php echo $imgSrc; ?>" />
        </div>

        <div class="people--content">
            <?php echo the_content();?>
        </div>                
    </div>
</section>