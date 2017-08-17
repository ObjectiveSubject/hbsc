<?php
/**
 * General page template
 */

get_header();
?>

<section id="error-404" class="module module--hero error-404">
    <div class="module__content u-container u-flex-justify-center">
        <div class="card u-bg-dark-gray">
           
            <div class="card-title">
                <h1>Error</h1>
                <h3>We can't find the page you're looking for.</h3>
            </div>               
            <p>
                Here are some links that may be helpful:
            </p>
            <ul class="useful-links">
                <li>
                    <a href="<?php echo home_url(); ?>" class="button module-button">Home</a>
                </li>
                <li>
                    <a href="<?php echo get_permalink( get_page_by_path( 'faq' ) ); ?>" class="button module-button">FAQ</a>
                </li>
                <li>
                    <a href="<?php echo get_permalink( get_page_by_path( 'salons-at-stowe' ) ); ?>" class="button module-button">Salons at Stowe</a>
                </li>
                <li>
                    <a href="<?php echo get_permalink( get_page_by_path( 'the-stowe-center' ) ); ?>" class="button module-button">The Stowe Center</a>
                </li>
            </ul>

        </div>
    </div>
</section>

<?php get_footer(); ?>
