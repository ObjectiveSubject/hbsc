<section id="module-<?php echo $post->ID;?>" class="module module--people">
    <div class="module__content u-container">
        
        <div class="people--contact">
            <div>CONTACT</div>
            <div class="people--contact-item"><?php echo get_field('people_email');?></div>
            <div class="people--contact-item"><?php echo get_field('people_telephone');?></div>
        </div>
        
        <div class="people--title-name">
            <div class="people--name"><?php echo get_field('people_first_name') . ' ' . get_field('people_last_name');?></div>
            <div class="people--title"><?php echo get_field('people_title');?></div>
        </div>

        <div class="image-positioner">
            <img src="<?php echo get_field('people_picture'); ?>" />
        </div>

        <div class="people--content">
            <?php echo the_content();?>
        </div>                
    </div>
</section>