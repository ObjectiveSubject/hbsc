<?php
/**
 * General page template
 */
get_header(); ?>

    <div class="site-content">
       
        <?php while ( have_posts() ) : the_post(); ?>
        
        <section class="preface section <?php the_field('preface_background_color'); ?>">
            <div class="section__content u-container">
                <div class="section__body">
                    <div id="site-menu" class="site-menu menu--body <?php echo (is_front_page() ? 'is-expanded' : '');?>">
                        <nav class="site-nav">
                            <div class="header-logo">
                                <a id="hbsc-logo" class="hbsc-logo u-display-block" href="<?php echo esc_url( home_url( '/' ) ); ?>">
                                    <?php get_template_part( 'partials/ui', 'logo' ); ?>
                                    <span class="u-display-none"><?php bloginfo( 'name' ); ?></span>
                                </a>
                            </div>
                            <?php
                            $menu_header   = false;
                            if ( has_nav_menu( 'header' ) ) {
                                $menu_header = wp_nav_menu(array(
                                    'theme_location' => 'header',
                                    'container'		 => false,
                                    'menu_class'	 => 'header-menu',
                                    'menu_id'		 => 'header-menu',
                                    'echo'			 => false
                                ));
                                echo $menu_header;
                            }
                            ?>
                        </nav>
                        <button id="site-menu-toggle" class="site-menu-toggle ui-button icon icon-chevron-down"></button>
                        <button id="site-mobile-menu-toggle" class="site-mobile-menu-toggle ui-button">
                            <span></span>
                            <span></span>
                            <span></span>
                        </button>
                    </div>
                    <div class="preface-text">
                        <?php the_content(); ?>
                    </div>
                </div>
            </div>
        </section>
        
        <section class="module module--hero has-background <?php the_field('module_background_color'); ?>" style="background-image: url(<?php the_field('module_image'); ?>)">
            <div class="module__content <?php the_field('card_position'); ?> u-container">
                <div class="card-positioner">
                    <div class="card <?php the_field('card_background_color'); ?> js-slide-in">
                       
                        <div class="card-title">
                            <?php the_field('card_title'); ?>
                        </div>

                        <div class="card-content">
                            <?php the_field('card_content'); ?>
                        </div>

                        <div class="card-button">
                            <a href="<?php the_field('card_button_link'); ?>" class="button module-button"><?php the_field('card_button_text'); ?></a>
                        </div>
                        
                    </div>
                </div>
            </div>
        </section>
        
        <!-- Events/Salons at Stowe (3) -->
        <?php
            // Next 3 salons events
            $carouselUpcomingSectionConfig = array(
                'title'        => 'Salons at Stowe',
                'button_label' => 'Learn More',
                'button_link'  => '#',
                'event-type'   => array(
                    'salon-at-stowe'
                ),
                'from_date' => date('Y-m-d')
            );

            include HBSC_PATH . '/partials/events/carousel-upcoming-section.php';
        ?>
        
        <!-- Links to Life section -->
        <section class="module module--basic u-bg-tan">
            <div class="module__content u-container">
                <header class="module__header">
                    <div class="module-title"><?php echo get_field('life_title');?></div>
                </header>
                <div class="module__body">
                    <ul class="u-text-center u-list-nostyle">
<?php
    $lifeLinks = get_field('life_links');
    $btnUrl = ( empty(get_field('life_link_button_url')) ? '#' : get_field('life_link_button_url') );
    $cnt = 0;    
    foreach($lifeLinks as $lifeLink)
    {
        $linkUrl = ( empty($lifeLink['life_link_url']) ? '#' : $lifeLink['life_link_url'] );
?>                        
                        <li <?php echo $cnt > 0 ? 'class="u-mt-4"' : '';?>>
                            <a href="<?php echo $linkUrl;?>" class="u-display-inline-block"><span class="h2"><?php echo $lifeLink['life_link_title']; ?></span><span class="h3"><?php echo $lifeLink['life_link_subtitle']; ?></span></a>
                        </li>
<?php
        $cnt++;
    }
?>
                    </ul>
                </div>
                <footer class="module__footer">
                    <a href="<?php echo get_field('life_link_button_url'); ?>" class="button"><?php echo get_field('life_link_button_text'); ?></a>
                </footer>
            </div>
        </section>
        
        <?php endwhile; ?>
		
		<?php if( have_rows('module') ): ?>

            <?php get_template_part( 'partials/page', 'modules' ); ?>

        <?php endif; ?>

    </div>

    <?php get_footer();
