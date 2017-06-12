<div class="staff-board--item">
    <h2><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php echo get_field('people_first_name') . ' ' . get_field('people_first_name'); ?></a></h2>
    <h3><?php echo get_field('people_title'); ?></h3>
    <div class="image--positionner" style="width:50%;">
        <img src="<?php echo get_field('people_picture');?>" />
    </div>
</div>