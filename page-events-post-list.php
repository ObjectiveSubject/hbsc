<?php
/* Template Name: Events Post List */
get_header();

    $termsType = get_terms( 'event-type', array(
        'hide_empty' => true,
    ) );  

    $termsList = get_terms( 'event-type', array(
        'hide_empty' => false,
        'fields'     => 'slugs'
    ) );        

    $loop = new WP_Query( array( 
        'post_type'      => 'event',
        'posts_per_page' => -1,
        'order'          => 'ASC',
        'meta_key'		 => 'event_start_date',
        'orderby'        => 'meta_value',
        'order'          => 'DESC'       
    ));
?>
<div class="site-content">
    <section class="module module--post-list u-bg-white">
        <div class="module__content u-container">
            <header class="module__header">
                <div class="module-title">
                    <?php echo the_title(); ?>
                </div>
            </header>
            
            <div class="module__body">
                <aside class="post--list-aside">

                    <div class="post--list-terms">
                        <?php 
                            foreach($termsType as $term)
                            {
                                $termChecked = in_array( $term->slug, $termsList );
                    ?>
                                <label class="post--term-item <?php echo $termChecked ? 'post--term-checked' : ''; ?>">
                                    <input type="checkbox" name="posts_categories" value="<?php echo $term->name; ?>" <?php echo $termChecked ? 'checked="checked"' : ''; ?>>  <?php echo $term->name;?>
                                </label>
                    <?php
                            }
                        ?>
                    </div>
                </aside>

                <div class="post--list">
<?php 
    $calendarData = array();

    while ( $loop->have_posts() )
    {
        $loop->the_post();

        $dt     = \DateTime::createFromFormat( 'Y-m-d', get_field('event_start_date') );
        $img    = wp_get_attachment_image_src( get_post_thumbnail_id(), 'large');
        $imgSrc = (isset($img[0]) ? $img[0] : '');

        $postItemData = array(
            'date'     => \DateTime::createFromFormat( 'Y-m-d', get_field('event_start_date') ),
            'title'    => get_field('event_title'),
            'subtitle' => get_field('event_subtitle'),
            'img'      => $imgSrc
        );

        $taxonomies = wp_get_post_terms($post->ID, 'event-type', array(
                'hide_empty' => true,
                'fields' => 'names'
        ) );

        $taxonomiesSlugs = wp_get_post_terms($post->ID, 'event-type', array(
                'hide_empty' => true,
                'fields' => 'slugs'
        ) );        

        $calendarData[] = array(
            'date'  => get_field('event_start_date'),
            'badge' => false
        );
?>
                    <div class="post--list-item">

                        <div class="badge-positioner">
                            <div class="badge">
                                <span><?php echo $postItemData['date']->format('F j, Y'); ?></a></span>
                            </div>
                        </div>

                        <div class="post--item-content u-bg-light-gray">
                            <div class="post--taxonomies">
                                <?php echo implode(', ', $taxonomies);?>
                            </div>
                            <div class="post--item-title">
                                <?php echo implode(', ', $taxonomies);?>
                            </div>

                            <div class="post--title">
                                <a href="<?php echo the_permalink(); ?>"><?php echo $postItemData['title'] . ' ' . $postItemData['subtitle']; ?></a>
                            </div>

                        </div>                      
<?php
                if( $postItemData['img'] != '' )
                {
?>        
                        <div class="image-positioner">
                            <a href="<?php echo the_permalink(); ?>"><div class="image image--grayscale" <?php echo 'style="background-image: url(\'' . $postItemData['img'] . '\');"'; ?>></div></a>
                        </div>
<?php
                }
?>
                    </div>
<?php } ?>
                </div>
            </div>
        </div>
    </section>
</div>
<?php get_footer(); ?>
<script>window.$ = jQuery;</script>

<script type="application/javascript">
    var calEvents;
    var dataCalendar = <?php echo json_encode($calendarData); ?>;

    jQuery(document).ready(function()
    {
        calEvents = new CalendarEvents({
            'checkboxesName'       : 'posts_categories',
            'selectorItems'        : '.post--list-item',
            'selectorItemTaxonomy' : '.post--taxonomies',
        });

        $('input[name="posts_categories"]').on( 'change', function()
        {
            if( $(this).prop('checked') )
            {
                $(this).parent().addClass('post--term-checked');
            }
            else
            {
                $(this).parent().removeClass('post--term-checked');
            }

            calEvents.filterEventsOnTerms();
        } );

        calEvents.filterEventsOnTerms();
    });
</script>
<script>
    var sortByPastEvents;

    var sortByOptions = {
        'defaultSortByKey' : 'recent',
        'sortByKeys'       : ['recent', 'most_viewed', 'most_discussed'],
    };    

    jQuery( document ).ready(function()
    {
        sortByPastEvents = new SortBy( sortByOptions );
    });
</script>