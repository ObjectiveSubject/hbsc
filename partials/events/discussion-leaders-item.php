<div class="discussion-leader">
    <div class="discussion-leader__content">
        <div class="discussion-leader-name">
            <div class="discussion-leader-firstname"><?php echo get_field('people_first_name');?></div>
            <div class="discussion-leader-lastname"><?php echo get_field('people_last_name');?></div>
        </div>
        <div class="discussion-leader-picture">
            <img src="<?php echo get_field('people_picture');?>" />
        </div>
        <div class="discussion-leader-content">
            <?php echo the_content();?>
        </div>        
    </div>
</div>