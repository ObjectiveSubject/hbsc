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
?>

<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<?php wp_head(); ?>
</head>

<body <?php body_class( $body_class ); ?>>

    <header id="masthead" class="masthead" role="banner">
        <div class="site-header u-bg-dark-gray">
            <div class="u-container">
                <div class="u-display-flex u-flex-justify-between u-color-tan">
                    <address>77 Forest Street, Hartford</address>
                    <div>Open Today: 9:30AM - 5:00PM</div>
                    <div>
                        <a href="#" class="search-toggle class-toggle" data-target="#masthead" data-class="search-field-open" data-focus="#site-search"><span class="icon icon-search"></span></a>
                        <input id="site-search" type="text" class="u-display-none">
                    </div>
                </div>
            </div>
        </div>
        <nav class="site-nav">
            <div class="u-container">
                <div id="site-menu" class="site-menu">
                    <div class="u-py-1 u-mr-3">
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
                    </div>
                    <button id="site-menu-toggle" class="site-menu-toggle ui-button icon icon-chevron-down class-toggle" data-target="#site-menu" data-class="is-expanded"></button>
                </div>
            </div>
            
        </nav>
	</header>
	
	<div id="page">
	