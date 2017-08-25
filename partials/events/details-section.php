<?php 
    $img = wp_get_attachment_image_src( get_post_thumbnail_id(), 'large');
    $imgSrc = (isset($img[0]) ? $img[0] : '');
?>

<div class="modal-overlay">
    <div class="modal-container">
        <div class="modal">
            <div class="close-modal">
                <a href="#" class="class-toggle" data-class="modal-active" data-target="body">
                    <svg viewBox="0 0 1000 1000">
                        <path d="M549,500L979.5,69.5c14-14,14-35,0-49c-14-14-35-14-49,0L500,451L69.5,20.5c-14-14-35-14-49,0c-14,14-14,35,0,49L451,500L20.5,930.5c-14,14-14,35,0,49c7,7,17.5,10.5,24.5,10.5c7,0,17.5-3.5,24.5-10.5L500,549l430.5,430.5c7,7,17.5,10.5,24.5,10.5c7,0,17.5-3.5,24.5-10.5c14-14,14-35,0-49L549,500z"/>
                    </svg>
                </a>
            </div>
            <div class="modal-content">
                <div class="modal_item">
                    <a href="mailto:?subject=<?php the_title(); ?>&body=<?php the_permalink(); ?>">
                        <span class="icon icon-mail"></span>
                        Email
                    </a>
                </div>
                <div class="modal_item">
                    <a href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink();?>" target="_blank">
                        <span class="icon icon-facebook"></span>
                        Share
                    </a>
                </div>
                <div class="modal_item">
                    <a href="https://twitter.com/home?status=<?php echo urlencode(get_the_title().' '.get_permalink());?>" target="_blank">
                        <span class="icon icon-twitter"></span>
                        Tweet
                    </a>
                </div>
            </div>
            <div class="modal-content">
                <div class="modal_item">
                    <span class="u-font-miller-bold u-color-dark-gray">Permalink</span>
                    <input type="text" value="<?php the_permalink(); ?>">
                </div>
            </div>
        </div>
    </div>
</div>

<section id="module-<?php echo $post->ID;?>" class="module module--hero has-background" <?php echo 'style="background-image: url(' . $imgSrc . ')"'; ?>>
    <div class="module__content u-container u-flex-justify-center" style="max-width:50.5rem;">
        <div class="card-positioner card-positioner-fullwidth">
            <?php if( get_field('event_registration_open') ) : ?>
            <div class="card-event-register">
                <a href="#" class="button module-button">Register</a>
            </div>
            <?php endif; ?>

            <div class="card u-bg-dark-gray">
                <?php
                    $categories = get_the_terms( get_the_ID(), 'event-type');
                    $eventCat = $categories[0]->name;
                ?>
				<input type='hidden' class='event_cat_name' value='<?php echo trim(strtolower($eventCat))?>'/>
                <div class="card-title">
                    <?php echo $eventCat; ?>
                </div>
                <?php
                    if( get_field('event_registration_open') && !isDateOlderThanNow(get_field('event_start_date')) )
                    {
                ?>
                <?php
                    }
                ?>
                <p>&nbsp;</p>
                <div class="card-event-title">
                    <h2><?php echo get_field('event_title'); ?></h2>
                    <?php
                        if(!empty(get_field('event_subtitle')))
                        {
                    ?>
                        <h3><?php echo get_field('event_subtitle'); ?></h3>
                    <?php
                        }
                    ?>
                </div>

                <div class="card-date">
                    <?php echo humanizeDate(get_field('event_start_date'));?>
                </div>

                <div class="card-content">
                    <?php echo the_content(); ?>
                </div>

                <div class="card-event-details">
                    <div class="card-event-item">
                        <span class="event-item-title">Location</span>
                        <span class="event-item-content"><?php echo get_field('event_location');?></span>
                    </div>
                    <div class="card-event-item">
                        <span class="event-item-title">Doors Open & Reception</span>
                        <span class="event-item-content"><?php echo get_field('event_doors_open');?></span>
                    </div>
                    <div class="card-event-item">
                        <span class="event-item-title">Program</span>
                        <span class="event-item-content"><?php echo get_field('event_program');?></span>
                    </div>
                </div>                

                <div class="card-button">
                <?php
                    if( $eventDisplayDiscussion == 1 )
                    {
                ?>                
                        <a href="#join_the_discussion" class="button module-button u-mb-1">Join the discussion</a>
                <?php
                    }
                ?>
                    <a href="#" class="button module-button class-toggle u-mb-1" data-class="modal-active" data-target="body">Share</a>
                </div>

            </div>
        </div>
    </div>
</section>