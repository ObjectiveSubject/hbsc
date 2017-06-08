<?php
    $staffBoardSectionLoop = new WP_Query( array( 
        'post_type'      => 'people',
        'posts_per_page' => -1,
        'order'          => 'ASC',
        'tax_query'      => array(
            'relation' => 'AND',
            array(
                'taxonomy' => 'role',
                'field'    => 'slug',
                'terms'    => $staffBoardSectionConfig['people-type'],
            )
        ),
        'orderby' => 'meta_value'
    ));

    if($staffBoardSectionLoop->have_posts())
    {
?>
        <section class="module module--basic u-bg-white">
            <div class="module__content u-container">
                <header class="module__header">
                    <div class="module-title">
                        <?php echo $staffBoardSectionConfig['title']; ?>
                    </div>
                </header>
                <div class="module__body">
                <?php
                    while ( $staffBoardSectionLoop->have_posts() )
                    {
                        $staffBoardSectionLoop->the_post();     
                        include HBSC_PATH . 'partials/people/staff-board-item.php';
                    }
                ?>
                </div>
            </div>
        </section>
<?php
    }
?>