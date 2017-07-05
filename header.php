<?php
/**
 * The template for displaying the header.
 */

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
<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<base href="/" />
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<?php wp_head(); ?>
</head>

<body <?php body_class( $body_class ); ?>>

    <header id="masthead" class="masthead" role="banner">
        <div class="site-header u-bg-dark-gray">
            <div class="u-container">
                <div class="site-header__content">
                    <address class="u-display-block-md"><?php echo get_option('hbsc_address'); ?></address>
                    <div class="open--hours">
                        <?php if( get_option('hbsc_closed_today') ) : ?>
                        Closed Today
                        <?php else : ?>
                        Open Today: <?php hbsc_opening_hours_today(); ?>
                        <?php endif; ?>
                    </div>
                    <div class="u-display-block-md">
                        <a href="#" class="search-toggle class-toggle" data-target="#masthead" data-class="search-open" data-focus=".search-field"><span class="icon icon-search"></span></a>
                    </div>
                </div>
                <div class="site-search">
                    <?php get_search_form(); ?>
                </div>
            </div>
        </div>
            <div class="u-container">
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
                    <button id="site-menu-toggle" class="site-menu-toggle ui-button icon icon-chevron-down class-toggle" data-target="#site-menu" data-class="is-expanded"></button>
                    <button id="site-mobile-menu-toggle" class="site-mobile-menu-toggle ui-button class-toggle" data-target="#site-menu" data-class="is-expanded">
                        <span></span>
                        <span></span>
                        <span></span>
                    </button>
                </div>
            </div>
	</header>
	
	<div id="page">
	