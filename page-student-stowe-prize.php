<?php get_header(); ?>
<div class="site-content">
<?php
while ( have_posts() )
{
    the_post()
?>
    <section class="preface section u-bg-blue">
        <div class="section__content u-container">
            <header class="section__header">
                <h1 class="section-title"><?php the_title(); ?></h1>
            </header>
            <div class="section__body">
                <div class="preface-text">
                    <?php the_content(); ?>
                </div>
            </div>
        </div>
    </section>
<?php
    $img = wp_get_attachment_image_src( get_post_thumbnail_id(), 'large');
    $image = (isset($img[0]) ? $img[0] : '');
?>
    <section id="module-<?php echo $post->ID; ?>" class="module module--entry <?php echo ( $image ) ? ' has-image' : ''; ?>">
        <?php if( $image ) : ?>
        <div class="module__image" <?php echo "style='background-image: url(" . $image . ")'"; ?>></div>
        <?php endif; ?>
        <div class="module__content u-container">
            <header class="module__header">
                <div class="module-title">
                    PRIZES
                </div>
            </header>

            <aside class="module__sidebar">
                <div class="submissions--steps">
                    <div class="submissions--step step--inactive">
                        <div class="submissions--step-marker">
                            <span class="step--marker">
                                <span class="step--marker-inner"></span>
                            </span>
                        </div>
                        <div class="submissions--step-text">
                            <strong>JANUARY 15, 2016</strong>
                            Submissions for 2016 are now closed.
                        </div>
                    </div>

                    <div class="submissions--step step--active">
                        <div class="submissions--step-marker">
                            <span class="step--marker">
                                <span class="step--marker-inner"></span>
                            </span>                        
                        </div>
                        <div class="submissions--step-text">
                            <strong>MARCH 2016</strong>
                            Notification to winners
                        </div>
                    </div>

                    <div class="submissions--step">
                        <div class="submissions--step-marker">
                            <span class="step--marker">
                                <span class="step--marker-inner"></span>
                            </span>                        
                        </div>
                        <div class="submissions--step-text">
                            <strong>JUNE 2016</strong>
                            Student Stowe Prize Award Event and Public Program
                        </div>
                    </div>
                </div>
            </aside>

            <div class="module__body">
                <h5>High School Students</h5>
                <p>The winning student will be featured at a program and award ceremony in Hartford, Connecticut, receive $1,000.00, and have their work published on the Stowe Center website.</p>
                <h5>College Students</h5>
                <p>The winning student will be featured at a program and award ceremony in Hartford, Connecticut, receive $1,000.00, and have their work published on the Stowe Center website.</p>
            </div>
        </div>
    </section>
<?php 
}

wp_reset_postdata();

if( have_rows('module') )
{
    get_template_part( 'partials/page', 'modules' );
}
?>
</div>
<?php get_footer(); ?>