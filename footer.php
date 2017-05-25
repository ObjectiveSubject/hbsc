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
                        <address>
                            <span class="u-display-block">77 Forest Street</span>
                            <span class="u-display-block">Hartford, CT 06105</span>
                        </address>
                        <div class="contact-info u-mt-2">
                            <span class="u-display-block"><a href="#">860-522-9258</a></span>
                            <span class="u-display-block"><a href="#">info@stowecenter.org</a></span>
                        </div>
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
                <div class="footer-row">
                    <div class="footer-column">
                        <ul class="social">
                            <li class="social__item">
                                <a href="#" class="icon icon-facebook"></a>
                            </li>
                            <li class="social__item">
                                <a href="#" class="icon icon-instagram"></a>
                            </li>
                            <li class="social__item">
                                <a href="#" class="icon icon-twitter"></a>
                            </li>
                            <li class="social__item">
                                <a href="#" class="icon icon-youtube"></a>
                            </li>
                        </ul>
                    </div>
                    <div class="footer-column">
                        <span>Newsletter</span>
                        <form action="###" method="post" class="u-display-inline">
                            <input type="text">
                            <button class="button">Sign Up</button>
                        </form>
                    </div>
                </div>
                <div class="footer-row">
                    <div class="footer-column">
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
