<?php
/**
 * General page template
 */
get_header();

$Event = new Event();
$postId = null;
?>
    <div class="site-content">
        <section class="preface section">
            <div class="section__content u-container">
                <header class="section__header">
                    <h1 class="section-title">STAFF MEMBER</h1>
                </header>
            </div>
        </section>    
        <?php 
            while ( have_posts() )
            {
                the_post();
            
                if( null !== $post->ID && null === $postId )
                {
                    $postId = $post->ID;
                }

                include HBSC_PATH . 'partials/people/details-section.php';
            }

            // Other salons led by this member
            include HBSC_PATH . 'partials/people/other-salons-section.php';
        ?>
    </div>
<?php get_footer(); ?>