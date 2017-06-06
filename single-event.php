<?php
/**
 * General page template
 */

$Event = new Event();
$image = "wp-content/themes/hbsc/assets/images/sample/large.jpg";
get_header();
$postId = null;
?>
	<div class="site-content">
    <?php while ( have_posts() ) : the_post();
        if( null !== the_ID() && null == $postId )
        {
            $postId = the_ID();
            //var_dump(the_ID());
        }
    ?>
        <section id="module-<?php echo preg_replace('/\W+/', '-', strtolower(the_title())); ?>" class="module module--hero has-background" <?php echo ( $image ) ? "style='background-image: url(" . $image . ")'" : ""; ?>>
            <div class="module__content u-container">
                <div class="card-positioner">
                    <div class="card u-bg-dark-gray js-slide-in">
                        <div class="card-title">
                            SALONS AT STOWE
                        </div>

                        <div class="card-event-title">
                            <?php echo the_title() ?>
                        </div>

                        <div class="card-date">
                            <?php echo $Event->getEventDateFormatted() ?>
                        </div>

                        <div class="card-content">
                            <?php echo the_content() ?>
                        </div>

                        <div class="card-event-details">
                            <div class=""><?php echo $Event->getField('event_location');?></div>
                            <div class=""><?php echo $Event->getField('event_doors_open');?></div>
                            <div class=""><?php echo $Event->getField('event_program');?></div>
                        </div>                

                        <div class="card-button">
                            <a href="" class="button module-button">Join the discussion</a>
                            <a href="" class="button module-button">Share</a>
                        </div>

                    </div>
                </div>
            </div>
        </section>
    <?php endwhile; ?>

        <section class="module module--basic u-bg-light-gray">
            <div class="module__content u-container">
                <header class="module__header">
                    <div class="module-title">
                        DISCUSSION LEADERS
                    </div>
                </header>
                <div class="module__body">
                    This is the module content.
                </div>
            </div>
        </section>

        <section class="module module--basic u-bg-white">
            <div class="module__content u-container">
                <header class="module__header">
                    <div class="module-title">
                        ONLINE DISCUSSION
                    </div>
                </header>
                <div class="module__body">
                    Discuss
                </div>
            </div>
        </section>

        <section class="module module--basic u-bg-white">
            <div class="module__content u-container">
                <header class="module__header">
                    <div class="module-title">
                        UPCOMING SALONS
                    </div>
                </header>
                <div class="module__body">
<?php 
    $loop = new WP_Query( array( 
        'post_type'      => 'event',
        'posts_per_page' => 3,
        'order'          => 'DESC',
        'meta_key'		 => 'event_date',
        'orderby'        => 'meta_value',
        'order'          => 'DESC',
         'post__not_in'  => array($postId)
    ));

    while ( $loop->have_posts() ) : $loop->the_post();
        $Event = new Event();
?>
                <div>
                    <div>
                        <div><?php echo $Event->getDateMonth();?></div>
                        <div><?php echo $Event->getDateDay();?></div>
                    </div>
                    <div><?php echo the_title();?></div>
                    <div>-</div>
                    <div><?php echo $Event->getField('event_doors_open') . ', ' . $Event->getField('event_location');?></div>
                </div>
<?php endwhile;?>                    
                </div>
            </div>
        </section>          


    </div>

<?php get_footer(); ?>