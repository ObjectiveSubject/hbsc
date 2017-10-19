<?php
    if( !isset($pastSalonsSectionConfig) )
    {
        $pastSalonsSectionConfig = array(
            'classes' => 'module--past-salons u-bg-white',
            'title'   => 'PAST SALONS',
            'display_button' => false,
            'button_text' => '',
            'button_href' => ''
        );
    }

    $pastSalonsItemCardPos = '';

    // For mean time
    $defaultSortByKey = 'recent';

    $postsSortbyList = array(
        'recent' => array(
            'post_type'      => 'event',
            'tax_query' => array(
          		array(
          			'taxonomy' => 'event-type',
          			'field'    => 'slug',
          			'terms'    => 'salons-at-stowe',
          		),
          	),
            'posts_per_page' => -1,
            'order'          => 'DESC',
            'meta_key'		 => 'event_start_date',
            'post__not_in'  => array($post->ID),
            'orderby' => array(
                'event_start_date' => "DESC"
            ),
            'meta_query' => array(
                'relation' => 'AND',
                array(
                    'key' => 'event_start_date',
                    'value' => date('Y-m-d') . ' 00:00:00',
                    'compare' => '<=',
                    'type' => 'DATE'
                )
            )
        ),
        'most_viewed' => array(
            'post_type'      => 'event',
            'tax_query' => array(
          		array(
          			'taxonomy' => 'event-type',
          			'field'    => 'slug',
          			'terms'    => 'salons-at-stowe',
          		),
          	),
            'posts_per_page' => -1,
            'order'          => 'DESC',
            'meta_key'		 => 'views_count',
            'meta_query' => array(
                'relation' => 'AND',
                array(
                    'key' => 'event_start_date',
                    'value' => date('Y-m-d') . ' 00:00:00',
                    'compare' => '<=',
                    'type' => 'DATE'
                )
            ),
            'post__not_in'  => array($post->ID),
            'orderby' => array(
                'meta_value_num' => 'DESC',
                'event_start_date' => "DESC",
                'comment_count' => 'DESC'
            )
        ),
        'most_discussed' => array(
            'post_type'      => 'event',
            'tax_query' => array(
          		array(
          			'taxonomy' => 'event-type',
          			'field'    => 'slug',
          			'terms'    => 'salons-at-stowe',
          		),
          	),
            'posts_per_page' => -1,
            'order'          => 'DESC',
            'meta_key'		 => 'event_start_date',
            'meta_query' => array(
                'relation' => 'AND',
                array(
                    'key' => 'event_start_date',
                    'value' => date('Y-m-d') . ' 00:00:00',
                    'compare' => '<=',
                    'type' => 'DATE'
                )
            ),
            'post__not_in'  => array($post->ID),
            'orderby' => array(
                'comment_count' => 'DESC',
                'event_start_date' => "DESC",
                'meta_value_num' => 'DESC'
            )
        )
    );
?>
<section class="module module--basic <?php echo $pastSalonsSectionConfig['classes']; ?>">

    <div class="module__content u-container">
        <header class="module__header">
            <div class="module-title">
                <?php echo $pastSalonsSectionConfig['title']; ?>
            </div>
            <!-- <ul class="anchors u-display-flex u-flex-justify-center u-flex-wrap u-mt-2 u-text-center">
                <li class="anchor preface-button">
                    <a href="#" class="button module-button btn--sortby btn--sortby-active" data-sortby-key="recent"><span>Recent</span></a>
                </li>
                <li class="anchor preface-button">
                    <a href="#" class="button module-button btn--sortby" data-sortby-key="most_viewed"><span>Most Viewed</span></a>
                </li>
                <li class="anchor preface-button">
                    <a href="#" class="button module-button btn--sortby" data-sortby-key="most_discussed"><span>Most Discussed</span></a>
                </li>
            </ul> -->
        </header>

        <div class="module__body">
<?php
        foreach( $postsSortbyList as $sortByKey => $orderBy )
        {
            $sortByItemActive = ( $sortByKey == $defaultSortByKey );
            $pastSalonsLoop = new WP_Query( $postsSortbyList[$sortByKey] );
            $cnt = 0;

            while( $pastSalonsLoop->have_posts() )
            {
                $pastSalonsLoop->the_post();
                $Event = new Event();
                $sortByClass = 'item--sortby item--sortby-' . $sortByKey;
                $cnt++;

                include HBSC_PATH . 'partials/events/past-salons-item.php';
            }
            wp_reset_postdata();
        }
?>
        </div>
    </div>
<?php
    if( $pastSalonsSectionConfig['display_button'] )
    {
?>
    <footer class="module__footer">
        <a href="<?php echo $pastSalonsSectionConfig['button_href']; ?>" class="button module-button"><span><?php echo $pastSalonsSectionConfig['button_text']; ?></span></a>
    </footer>
<?php
    }
?>
</section>
