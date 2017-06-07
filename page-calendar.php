<?php
/* Template Name: Calendar */
get_header();

    $args = array(
        'name' => 'event',
    );

    $terms = 'salon-at-stowe,school-educators,tour';

    if( array_key_exists('terms',$_GET))
    {
        if( !empty( $_GET[ 'terms' ] ) )
        {
            $terms = $_GET[ 'terms' ];
        }
    }

    $termsList = explode( ',', $terms );

    $loop = new WP_Query( array( 
        'post_type'      => 'event',
        'posts_per_page' => -1,
        'order'          => 'ASC',
        'meta_key'		 => 'event_date',
        'orderby'        => 'meta_value',
        'order'          => 'DESC',
        'tax_query'      => array(
            'relation' => 'AND',
            array(
                'taxonomy' => 'event-type',
                'field'    => 'slug',
                'terms'    => $termsList,
            )
        )        
    ));
?>
<div class="site-content">
    <section class="module u-bg-white">
        <div class="module__content u-container">
            <header class="module__header">
                <div class="module-title">
                    Calendar
                </div>
            </header>
            <div class="module__body">
<?php 
    while ( $loop->have_posts() ) : $loop->the_post();
        $Event = new Event();
        $taxonomies = wp_get_post_terms($post->ID, 'event-type', array(
                'hide_empty' => true,
                'fields' => 'slugs'
        ) );
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