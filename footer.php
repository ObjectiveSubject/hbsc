<?php
/**
 * The template for displaying the footer.
 */
?>

	<footer id="footer" class="footer" role="conteninfo">
        <div class="site-footer u-bg-dark-gray u-py-2">
            <div class="u-container">
                <div class="footer-row">
                    <div class="footer-column">
                        <?php
                        $address = get_option( 'hbsc_address' );
                        $phone = get_option( 'hbsc_phone' );
                        $email = get_option( 'hbsc_email' );
                        if( $address ) : ?>
                        <address class="u-font-miller-bold">
                            <?php echo nl2br( $address ); ?>
                        </address>
                        <?php endif;
                        if( $phone || $email ) :
                        ?>
                        <div class="u-font-miller <?php echo ( $address ) ? 'u-mt-2' : ''; ?>">
                            <?php if( $phone ) : ?>
                            <span class="u-display-block"><a href="tel:<?php echo $phone; ?>"><?php echo $phone; ?></a></span>
                            <?php endif; if( $email ) : ?>
                            <span class="u-display-block"><a href="mailto:<?php echo $email; ?>"><?php echo $email; ?></a></span>
                            <?php endif; ?>
                        </div>
                        <?php endif; ?>
                    </div>
                    <div class="footer-column">
                        <nav class="site-nav">
                            <?php
                            $menu_footer = false;
                            if ( has_nav_menu( 'footer' ) ) {
                                $menu_footer = wp_nav_menu(array(
                                    'theme_location' => 'footer',
                                    'container'		 => false,
                                    'menu_class'	 => 'footer-menu',
                                    'menu_id'		 => 'footer-menu',
                                    'echo'			 => false
                                ));
                                echo $menu_footer;
                            }
                            ?>
                        </nav>
                    </div>
                </div>
                <div class="footer-row u-flex-items-center">
                    <div class="footer-column">
                        <?php
                        $facebook = get_option( 'hbsc_facebook' );
                        $instagram = get_option( 'hbsc_instagram' );
                        $twitter = get_option( 'hbsc_twitter' );
                        $youtube = get_option( 'hbsc_youtube' );
                        if( $facebook || $instagram || $twitter || $youtube ) :
                        ?>
                        <ul class="social">
                            <?php if( $facebook ) : ?>
                            <li class="social__item">
                                <a href="<?php echo $facebook; ?>" class="icon icon-facebook"></a>
                            </li>
                            <?php endif; if( $instagram ) : ?>
                            <li class="social__item">
                                <a href="<?php echo $instagram; ?>" class="icon icon-instagram"></a>
                            </li>
                            <?php endif; if( $twitter ) : ?>
                            <li class="social__item">
                                <a href="<?php echo $twitter; ?>" class="icon icon-twitter"></a>
                            </li>
                            <?php endif; if( $youtube ) : ?>
                            <li class="social__item">
                                <a href="<?php echo $youtube; ?>" class="icon icon-youtube"></a>
                            </li>
                            <?php endif; ?>
                        </ul>
                        <?php endif; ?>
                    </div>
                    <div class="footer-column u-display-flex u-flex-items-center u-flex-justify-between">
                        <span class="u-font-miller u-mr-1">Newsletter</span>
                        <form action="###" method="post" class="u-display-inline">
                            <input type="text" class="u-mr-1">
                            <button class="button">Sign Up</button>
                        </form>
                    </div>
                </div>
                <div class="footer-row">
                    <div class="footer-column u-font-miller-bold u-caps u-font-size-xs u-color-tan">
                        <span class="copyright">&copy; <?php echo date('Y'); ?> HBSC</span>
                        <a href="#">Privacy Policy</a>
                        <a href="#">Terms of Use</a>
                    </div>
                </div>
            </div>
        </div>
	</footer>

</div><!-- #page -->

<?php wp_footer(); ?>

<span class="media-size"></span>

</body>
</html>
