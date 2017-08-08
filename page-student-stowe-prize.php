<?php 
/* Template Name: Student Stowe Prize */
get_header(); ?>
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
                    <?php echo get_field('prize_nomination_title'); ?>
                </div>
            </header>

            <aside class="module__sidebar">
                <div class="submissions--steps">
<?php
    $steps = get_field('prize_nomination_steps');

    if( $steps && is_array($steps) && !empty($steps) )
    {

        foreach( $steps as $step )
        {
?>
                    <div class="submissions--step <?php echo $step['prize_nomination_step_state']; ?>">
                        <div class="submissions--step-marker">
                            <span class="step--marker">
                                <span class="step--marker-inner"></span>
                            </span>
                        </div>
                        <div class="submissions--step-text">
                            <strong><?php echo $step['prize_nomination_step_date']; ?></strong>
                            <?php echo $step['prize_nomination_step_content']; ?>
                        </div>
                    </div>
<?php
        }
    }
?>
                </div>
            </aside>

            <div class="module__body">
                <?php echo get_field('prize_nomination_content'); ?>
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