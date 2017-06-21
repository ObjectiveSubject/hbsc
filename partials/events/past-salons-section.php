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

    if( !isset($pastSalonsLoop) )
    {
        $pastSalonsLoop = new WP_Query( array( 
            'post_type'      => 'event',
            'posts_per_page' => -1,
            'order'          => 'DESC',
            'meta_key'		 => 'views_count',
            'meta_query' => array(
                'relation' => 'AND',
                array(
                    'key' => 'event_start_date',
                    'value' => get_field('event_end_date'),
                    'compare' => '>=',
                    'type' => 'DATE'
                )
            ),
            'orderby' => array(
                'meta_value_num' => 'DESC',
                'event_start_date' => "DESC"
            ),
            'post__not_in'  => array($post->ID)
        ));
    }

    if($pastSalonsLoop->have_posts())
    {
?>
<section class="module module--basic <?php echo $pastSalonsSectionConfig['classes']; ?>">

    <div class="module__content u-container">
        <header class="module__header">
            <div class="module-title">
                <?php echo $pastSalonsSectionConfig['title']; ?>
            </div>
        </header>

        <div class="module__body">
        <?php
            $cnt = 0;
            while ( $pastSalonsLoop->have_posts() )
            {
                $pastSalonsLoop->the_post();
                $Event = new Event();
                
                $cnt++;

                include HBSC_PATH . 'partials/events/past-salons-item.php';
            }
        ?>
        </div>
    </div>
<?php
    if( $pastSalonsSectionConfig['display_button'] )
    {
?>    
    <footer class="module__footer">
        <a href="<?php echo $pastSalonsSectionConfig['button_href']; ?>" class="button module-button"><?php echo $pastSalonsSectionConfig['button_text']; ?></a>
    </footer>
<?php
    }
?>
</section>
<?php
}
?>