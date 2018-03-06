<?php
/**
 * The template for displaying the header.
 */
?>

<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<base href="/" />
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<?php wp_head(); ?>

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-115005127-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag() { dataLayer.push(arguments); }
        gtag('js', new Date());
        gtag('config', 'UA-115005127-1');
    </script>

</head>

<?php
$body_class = ''; 
if ( is_single() || is_page() ) {
    $body_class = get_post_type() . '-' . $post->post_name;
}
   
$is_top_page = ( 0 === $post->post_parent );
if ( $is_top_page ) {
    $id = $post->ID;
} else {
    $parents = array_reverse( get_post_ancestors( $post->ID ) );
    $id = $parents[0];
}

incrementViewsCount($post->ID);
?>

<body <?php body_class( $body_class ); ?>>

    <?php
    $today = get_option('hbsc_hours_'.strtolower(date('l')));
    if ( get_option('hbsc_closed_today') || empty($today) ) {
        $availability_text = 'Closed Today';
        $hours_text = '';
    } else {
        $availability_text = 'Open Today:';
        $hours_text = hbsc_opening_hours_today(false);
    } ?>

    <header id="masthead" class="masthead" role="banner">
        <div class="site-header u-bg-dark-gray">
            <div class="u-container">
                <div class="site-header__content">
                    <address class="u-display-block-md">
                        <a href="#" class="utility-toggle class-toggle u-caps" data-target="#masthead" data-class="utility-location-open" data-remove-on="scroll" data-clear-before="utility-location-open utility-search-open utility-hours-open">
                            <?php echo get_option('hbsc_address'); ?>
                        </a>
                    </address>
                    <div class="u-display-block-md">
                        <a href="#" class="utility-toggle class-toggle" data-target="#masthead" data-class="utility-search-open" data-focus=".search-field" data-remove-on="scroll" data-clear-before="utility-location-open utility-search-open utility-hours-open"><span class="icon icon-search"></span></a>
                    </div>
                    <div class="open--hours">
                        <a href="#" class="utility-toggle class-toggle u-caps" data-target="#masthead" data-class="utility-hours-open" data-remove-on="scroll" data-clear-before="utility-location-open utility-search-open utility-hours-open">
                            <?php echo $availability_text . ' ' . $hours_text; ?>
                        </a>
                    </div>
                </div>
                <div class="utility-item utility-item--location">
                    <div class="u-span-5">
                        <?php 
                        $map_url = "https://api.mapbox.com/styles/v1/objectivesubject/cj3nb9qzp000m2smqxu8q0l3p/static/pin-l+e74949(-72.700373,41.766804)/-72.694771,41.767063,13.09,0.00,0.00/350x200?access_token=pk.eyJ1Ijoib2JqZWN0aXZlc3ViamVjdCIsImEiOiJPY25wYWRjIn0.AFZPHessR_DGefRkzPilDA";
                        $map_url2x = "https://api.mapbox.com/styles/v1/objectivesubject/cj3nb9qzp000m2smqxu8q0l3p/static/pin-l+e74949(-72.700373,41.766804)/-72.694771,41.767063,13.09,0.00,0.00/350x200@2x?access_token=pk.eyJ1Ijoib2JqZWN0aXZlc3ViamVjdCIsImEiOiJPY25wYWRjIn0.AFZPHessR_DGefRkzPilDA"; 
                        ?>
                        <img class="u-display-block" src="<?php echo $map_url; ?>" srcset="<?php echo $map_url; ?> 1x, <?php echo $map_url2x; ?> 2x" width="350"height="200"alt="Harriet Beecher Stowe Center" />
                    </div>
                    <div class="u-span-6">
                        <p>
                            <?php
                            $address = get_option( 'hbsc_address' );
                            $phone = get_option( 'hbsc_phone' );
                            $email = get_option( 'hbsc_email' ); 
                            ?>
                            <strong><?php bloginfo('name') ?></strong><br/>
                            <?php echo nl2br( $address ); ?><br/><br/>
                            <?php echo $phone; ?><br/>
                            <a href="mailto:<?php echo $email; ?>" target="_blank"><?php echo $email; ?></a>
                        </p>
                    </div>
                </div>
                <div class="utility-item utility-item--search">
                    <?php get_search_form(); ?>
                </div>
                <div class="utility-item utility-item--hours">
                    <div class="utility-item--hours-col">
                        <strong><?php echo $availability_text; ?></strong><br/>
                        <em><?php echo $hours_text; ?></em><br/>
                        <a href="<?php echo site_url('visit/the-stowe-center/'); ?>" class="u-font-size-sm">Learn More</a>
                    </div>
                    <div class="utility-item--hours-col">
                        <div class="utility-item--day-col">
                            <span class="utility-item-day"><span class="u-caps">Monday</span> <span><?php echo get_option( 'hbsc_hours_monday' ); ?></span></span></span>
                            <span class="utility-item-day"><span class="u-caps">Tuesday</span> <span><?php echo get_option( 'hbsc_hours_tuesday' ); ?></span></span></span>
                            <span class="utility-item-day"><span class="u-caps">Wednesday</span> <span><?php echo get_option( 'hbsc_hours_wednesday' ); ?></span></span></span>
                            <span class="utility-item-day"><span class="u-caps">Thursday</span> <span><?php echo get_option( 'hbsc_hours_thursday' ); ?></span></span></span>
                        </div>
                        <div class="utility-item--day-col">
                            <span class="utility-item-day"><span class="u-caps">Friday</span> <span><?php echo get_option( 'hbsc_hours_friday' ); ?></span></span></span>
                            <span class="utility-item-day"><span class="u-caps">Saturday</span> <span><?php echo get_option( 'hbsc_hours_saturday' ); ?></span></span></span>
                            <span class="utility-item-day"><span class="u-caps">Sunday</span> <span><?php echo get_option( 'hbsc_hours_sunday' ); ?></span></span></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div id="site-menu" class="site-menu <?php echo (is_front_page() ? 'is-expanded' : '');?>">
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
            
	</header>
	
	<div id="page">
	